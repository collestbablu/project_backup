<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class CostomerPaymentReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function monthly_payment_receive_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('CostomerPaymentReport/monthly-payment-receive-report');
	}
	else
	{
	redirect('/CostomerPaymentReport/index');
	}
}

public function print_monthly_payment_receive_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('CostomerPaymentReport/print-monthly-payment-receive-report');
	}
	else
	{
	redirect('/CostomerPaymentReport/index');
	}
}

public function export_csv_monthly_pay_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('CostomerPaymentReport/export-csv-monthly-pay-report');
	}
	else
	{
	redirect('/CostomerPaymentReport/index');
	}
}

}

?>