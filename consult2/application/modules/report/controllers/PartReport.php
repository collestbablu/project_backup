<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class PartReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function part_purduction_report(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('PartReport/part-purduction-report');
	}
	else
	{
	redirect('index');
	}
}
public function print_part_purduction_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('PartReport/print-part-purduction-report');
	}
	else
	{
	redirect('index');
	}
}
public function export_part_purduction_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('PartReport/export-part-purduction-report');
	}
	else
	{
	redirect('index');
	}
}

}

?>