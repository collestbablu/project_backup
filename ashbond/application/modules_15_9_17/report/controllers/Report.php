<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Report extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function report_function(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-report');
	}
	else
	{
	redirect('/report/index');
	}
}

}

?>