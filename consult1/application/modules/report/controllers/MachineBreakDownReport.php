<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class MachineBreakDownReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function machine_breakdown_report(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('MachineBreakDownReport/machine-breakdown-report');
	}
	else
	{
	redirect('index');
	}
}
public function print_machine_performance_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('MachinePerformanceReport/print-machine-performance-report');
	}
	else
	{
	redirect('index');
	}
}
public function export_machine_performance_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('MachinePerformanceReport/export-machine-performance-report');
	}
	else
	{
	redirect('index');
	}
}

}

?>