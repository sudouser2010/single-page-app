<?php

class Base_Model
{
	/*
		this is where I place functions that are used by more than one model
	*/
	

	//===================================================================
	public function get_rss_feed($url)
	{
		/*
		this function will load data from the yahoo site with cURL
		and return an list of Simple XML objects
		
		Note each Simple XML object in the array is actually a news story
		*/
		$url			= str_replace(" ", "+", $url);	//so query can work with url that has spaces
		$xml			= file_get_contents($url);		//if https, I would use curl
		$feed 			= new SimpleXMLElement($xml); 
		
		$news_stories 	= (array) $feed->channel;		//turns object into associative array by type casting
		
		if (array_key_exists('item', $news_stories)) 
		{
			$news_stories	= $news_stories["item"];	//refers only to the item key in array which contains all the news stories
		}
		else
		{
			$news_stories = array();
		}
	
		return $news_stories;
	}
	//===================================================================
	
	
	public function alter_date_format($date_string)
	{
		/*
			This function takes the date_string and processes it so the 
			format becomes: <month> <ordinal date>"," <year> <hour>":"<minute><am|pm>
			ex: November 1st, 2011 2:21pm
		*/
		
		//note I'm dumping the -#### part of the date, b/c it resulted in the wrong time
		$date_array 	= explode("-", $date_string);
		
		$date			= $date_array[0];

		$date =strtotime($date);
		$date = date("F dS, Y g:ia",$date);

		return $date;
	}
	
	
}



?>