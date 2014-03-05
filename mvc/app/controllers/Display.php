<?php

require_once("app/controllers/Base_Controller.php");
class Display extends Base_Controller
{

	/*
		this class was built for displaying the view
	*/
	
	public function run()
	{
		$news_feed_html='<h1 style="text-align:center; color:red;">Loading Stories</h1>';
		require_once("app/views/View1.php");	
	}
	
}


?>