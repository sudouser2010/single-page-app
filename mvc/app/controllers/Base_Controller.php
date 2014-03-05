<?php

class Base_Controller
{
	/*
		This is where I place functions that are used by more than one controller
	*/

	//---------------------------------------------------------------------------------
	public function redirect($url)
	{
		//only works before anything is echoed to screen
		$url = rtrim($url,"/");
		header('location: '.$url);
	}
	//---------------------------------------------------------------------------------

	//-------------------------------------------------------	
	public function request_is_ajax()
	{
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) and 
		$_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')
		{
			return true;
			//this is an ajax call
		}
		return false;
	}
	//-------------------------------------------------------	

	//---------------------------------------------------------------------------------	
	public function if_not_ajax_redirect_to_base_url()
	{
		if($this->request_is_ajax() == false)
		{
			$this->redirect(_base_url);
		}
	}
	//---------------------------------------------------------------------------------	


}


?>