<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
 
class NewPayment extends my_controller {

public function payment_amount(){
	if($this->session->userdata('is_logged_in')){
	$this->load->view('NewPayment/invoice-payment');
	}
	else
	{
	redirect('index');
	}	
}
public function payment_amount_po(){
	if($this->session->userdata('is_logged_in')){
	$this->load->view('NewPayment/getdata-po');
	}
	else
	{
	redirect('index');
	}	
}

public function getdata_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['id'] = $_GET['con'];
		$this->load->view('getdata',$data);
	}
	else
	{
	redirect('index');
	}
}
public function insert_payment()
{
	
		@extract($_POST);
		$table_name ='tbl_invoice_payment';
		$pri_col ='id';
		$po=$this->input->post('po');
			$data=array(
					
					'contact_id' => $this->input->post('contactname'),
					'receive_billing_mount' => $this->input->post('receive_amount'),
					'date' => $this->input->post('datename'),
					'payment_mode' => $this->input->post('payment_mode'),
					'status' => 'payment'
					
					);
					
			$sesio = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date'=> date('y-m-d'),
					
					);
			$dataall=array_merge($data,$sesio);
					$this->load->model('Model_admin_login');
					$this->Model_admin_login->insert_user($table_name,$dataall);
		if($po=='purchase order'){
		echo "<script>alert('payment added');";
		echo "window.close();</script>";
		
		}else{
			redirect('/NewPayment/payment_amount');
		}
				
					
}

}
?>