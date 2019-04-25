<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class expense extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_expense');
}     

public function manage_expense(){
	if($this->session->userdata('is_logged_in')){
		$data=$this->user_function();// call permission fnctn
		$data['result'] = $this->model_expense->expense_data();	
		$this->load->view('manage-expense',$data);
	}
	else
	{
	redirect('index');
	}		
}


public function insert_expense()
{
@extract($_POST);
$table_name ='tbl_pick_up';


$cnt=count($date);
for($i=0;$i<$cnt;$i++){
if($date[$i]!='')
{
$this->db->query("insert into tbl_expense set date='$date[$i]',voucherno='$v_no[$i]',exp_account='$exp_account[$i]',contact_id='$contact_id[$i]',paidTo='$paidto[$i]',goods_name='$goods_name[$i]',amount='$amount[$i]',payment_mode='$payment_mode[$i]',exp_type='$exp_type[$i]',cheque_date='$cheque_date[$i]',cheque_number='$cheque_number[$i]',paid_to='$paid_to[$i]',provisional_amount='$provisional_amount[$i]',maker_id='".$this->session->userdata('user_id')."',maker_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."'");


 
}
}
redirect('expense/manage_expense');
}


public function updateItem(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('expense/edit-expense',$data);
	}
	else
	{
	redirect('index');
	}
}


public function update_expense(){

		@extract($_POST);

		$table_name ='tbl_expense';
		$pri_col ='id';
		$this->load->model('Model_admin_login');
		
		

		
					$dataarr= array(
					'voucherno'=>$v_no,
					'date' => $date,
					'exp_account' => $exp_account,
					'contact_id' => $contact_id,
					'paidTo'=>$paidto,
					'goods_name' => $goods_name,
					'amount' => $amount,
					'provisional_amount' => $provisional_amount,
					'payment_mode' => $payment_mode,
					'exp_type' => $exp_type,
					'cheque_date' => $cheque_date,
					'cheque_number' => $cheque_number,
					'paid_to' => $paid_to					
				
		      	);
					

				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataarr);

		$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
	 redirect('expense/manage_expense');
					
}


}