<?php
require_once("app/controllers/Base_Controller.php");

class Router_Controller extends Base_Controller
{
	/*
		this class serves as a router,
		the run_router function calls the update_controller or the search_controller
		depending on the url requested
		
		I made this method an extension of the base class so I could access any useful functions 
		from the base class such as the "if_not_ajax_redirect_to_base_url" function
	*/


	public function run_router()
	{	
		$url			= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$segments		= explode("/", $url);
		$last_segment 	= end($segments);
		
		if( $last_segment 		== 'update')
		{
			//ajax calls for update end up here
			parent::if_not_ajax_redirect_to_base_url();
			
			require_once("app/controllers/Update.php");
			$controller = new Update();
			$controller->get_latest_stories();
			
		}
		elseif($last_segment 	== 'search')
		{
			//ajax calls for search end up here
			//note I would normally do validation here and check the Csrf token
			parent::if_not_ajax_redirect_to_base_url();

			$input		= $_POST['input'];
			
			require_once("app/controllers/Search.php");
			$controller = new Search();
			$controller->get_search_stories($input);			
		}
		elseif( in_array($last_segment, array("","index.php","index.html")) )
		{
			require_once("app/controllers/Display.php");
			$controller = new Display();
			$controller->run();
		}
		else
		{
			//page does not exist
			require_once("app/views/Error1.php");
		}
		
		

	}
	
	

	



}


?>