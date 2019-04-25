<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class VendorHistoryPrice extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function vendor_history_price_function(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('VendorHistoryPrice/product-stockreport');
	}
	else
	{
	redirect('/VendorHistoryPrice/index');
	}
}
public function price_history_function(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('VendorHistoryPrice/pricehistory');
	}
	else
	{
	redirect('/VendorHistoryPrice/index');
	}
}

}

?>