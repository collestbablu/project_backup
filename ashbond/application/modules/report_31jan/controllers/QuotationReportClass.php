<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class QuotationReportClass extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function quotationReport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('QuotationReportClass/QuotationReport');
	}
	else
	{
	redirect('/QuotationReportClass/index');
	}
}

public function printQuotationReport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('QuotationReportClass/PrintQuotationReport');
	}
	else
	{
	redirect('/QuotationReportClass/index');
	}
}
public function allCsvPurchaseOrder(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('QuotationReportClass/all-csv-quotation');
	}
	else
	{
	redirect('/QuotationReportClass/index');
	}
}

}

?>