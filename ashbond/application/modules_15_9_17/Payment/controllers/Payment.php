<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Payment extends my_controller {

public function payment_amount(){

	if($this->session->userdata('is_logged_in')){
	$this->load->view('Payment/Payment/invoice-payment');
	}
	else
	{
	redirect('/payment/index');
	}	
}


public function invoicereport(){

	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('Payment/payment/invoice-payment-report');
}
else{
redirect('/payment/index');

}
}
public function invoice_correction(){

	
	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('Payment/payment/invoice-payment-correction');
}

else{
redirect('/payment/index');

}

}

}
?>