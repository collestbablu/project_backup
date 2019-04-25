<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class ModuleBaseReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function module_performance_report(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Module_report/module-base-report');
	}
	else
	{
	redirect('index');
	}
}
public function print_module_performance_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Module_Report/print-module-base-report');
	}
	else
	{
	redirect('index');
	}
}
public function export_module_performance_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Module_Report/export-module-base-report');
	}
	else
	{
	redirect('index');
	}
}

}

?>