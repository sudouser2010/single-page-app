<?php
require_once("app/models/Base_Model.php");

class Update_Model extends Base_Model
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
		
		$html = "";
		for ($i=0; $i<$size; $i++)
		{
			$object			= $news_stories[$i];
			$title 			= (string) $object->title;
			$pubdate		= (string) $object->pubDate;
			$link			= (string) $object->link;
			$description	= (string) $object->description;
			
			//-----------------------------------------------------------
			/*
			note the description wasn't really in html or xml format
			and I wanted to rid it of the verbose text description, so
			I modified the string by only including everything inside the link
			*/
			$end_of_link 	= strpos($description, "</a>");
			$description	= substr($description, 0, $end_of_link);
			//------------------------------------------------------------
			
			$title			= "<div class='title'>".$title."</div>";
			$pubdate		= parent::alter_date_format($pubdate);
			$pubdate		= "<div class='date no_line'>$pubdate</div>";
			
			$local_html		= $title."<hr>".$description.$pubdate;
			
			$local_html		= "<div class='story'>".$local_html."</div>";
			$local_html		= "<a href='$link' target='blank' class='no_line'>".$local_html."</a>";			
		
			$html 			= $html.$local_html;
		}
		return $html;
	}
	//================================================================================================
	


}

?>