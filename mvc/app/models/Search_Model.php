<?php
require_once("app/models/Base_Model.php");

class Search_Model extends Base_Model
{

	//================================================================================================
	
	public function render_news_feed_html($url, $size)
	{
		/*
			this functions takes a list of Simple XML objects and uses it to 
			create html for each item in the list
			
			A string of html is returned
			Note, size is the maximum number of top stories in the news feed
			when size=5, that means there will be 5 top stories in the news feed
		*/
		$news_stories = parent::get_rss_feed($url);
		
		//-----------------------------------when search results bring up nothing
		$array_size = count($news_stories);
		if( $array_size == 0 )
		{
			return "";
		}
		//-----------------------------------when search results bring up nothing
		
		
		$size = min($array_size, $size);	//just in case the array size was smaller than size
		
		$html = "";
		for ($i=0; $i<$size; $i++)
		{
			$object			= $news_stories[$i];
			$title 			= (string) $object->title;
			$pubdate		= (string) $object->pubDate;
			$link			= (string) $object->link;
			$description	= (string) $object->description;
		
			$title			= "<div class='title'>".$title."</div>";
			$pubdate		= parent::alter_date_format($pubdate);			
			$pubdate		= "<div class='date'>$pubdate</div>";
			
			$local_html		= "<div class='story'>".$title."<hr>".$description.$pubdate."</div>";
			$local_html		= "<a href='$link' target='blank' class='no_line'>".$local_html."</a>";			
		
			$html 			= $html.$local_html;
		}
		return $html;
	}
	//================================================================================================
	


}

?>