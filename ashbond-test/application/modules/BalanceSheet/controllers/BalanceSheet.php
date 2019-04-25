<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class BalanceSheet extends my_controller {

public function balanceSheetPay(){

	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('BalanceSheet/invoice-payment-report');
}
else{
redirect('/BalanceSheet/index');

}
}

}
?>