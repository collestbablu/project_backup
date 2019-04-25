<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class PaymentReceived extends my_controller {

public function payment_amount(){

	if($this->session->userdata('is_logged_in')){
	$this->load->view('PaymentReceived/payment-received');
	}
	else
	{
	redirect('/PaymentReceived/index');
	}	
}

public function getproductcont_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['con'] = $_GET['con'];
		$this->load->view('PaymentReceived/get-customer-data',$data);
	}
	else
	{
	redirect('index');
	}
}

public function invoicereport(){

	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('PaymentReceived/payment-received-report');
}
else{
redirect('/PaymentReceived/index');

}
}
public function invoice_correction(){

	
	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('PaymentReceived/invoice-payment-correction');
}

else{
redirect('/PaymentReceived/index');

}

}

}
?>