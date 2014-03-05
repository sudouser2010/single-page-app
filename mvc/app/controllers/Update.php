<?php
require_once("app/models/Update_Model.php");
require_once("app/controllers/Base_Controller.php");

class Update extends Base_Controller
{
	
	/*
		this class was built for ajax calls during updating the feed
		I made it so it updates every 12 seconds via javascript
	*/
	
	public $model;
	
	public function __construct()
	{
		$this->model 	= new Update_Model();		
	}
	
	public function get_latest_stories()
	{
		$news_feed_html = $this->model->render_news_feed_html("http://news.yahoo.com/rss/", 5);
		$data = array("feed"=>$news_feed_html);
		echo json_encode($data);
	}
	

}


?>