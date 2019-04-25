<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class StockRefill extends my_controller {

public function add_multiple_qty(){

	
	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('multiple-product-transfer-quantity');
}

else{
redirect('/StockRefill/index');

}

}

}
?>