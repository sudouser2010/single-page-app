<?php
require_once("app/models/Search_Model.php");
require_once("app/controllers/Base_Controller.php");

class Search extends Base_Controller
{

	/*
		this class was built for ajax calls during searching
	*/
	
	public $model;
	
	public function __construct()
	{
		$this->model 	= new Search_Model();		
	}
	
	public function get_search_stories($input)
	{
		$query 			= "http://news.search.yahoo.com/news/rss?p=$input&c=&eo=UTF-8";
		$search_feed 	= $this->model->render_news_feed_html($query, 5);
		
		if($search_feed !='')
		{
			//when results are returned from search query
			$data = array("search_results"=>$search_feed);
		}
		else
		{
			//when nothing is returned from search query
			$data = array("search_results"=>"");				
		}
		
		echo json_encode($data);
	}
	

}


?>