<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class rentals extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_rentals');
}     

public function manage_rentals(){
	if($this->session->userdata('is_logged_in')){
		$data=$this->user_function();// call permission fnctn
		$data['result'] = $this->model_rentals->rentals_data();	
		$this->load->view('manage-rentals',$data);
	}
	else
	{
	redirect('index');
	}		
}


public function insert_rent()
{
@extract($_POST);
$table_name ='tbl_pick_up';


$cnt=count($date);
for($i=0;$i<$cnt;$i++){
if($date[$i]!='')
{
$this->db->query("insert into tbl_rentale set date='$date[$i]',rentale_id='$rentale_id[$i]',remarks='$remarks[$i]',loc_id='$loc_id[$i]',amount='$amount[$i]',rent_amount='$rent_amount[$i]',tdsper='$tdsper[$i]',tds_amount='$tds_amount[$i]',gstper='$gstper[$i]',gst_amount='$gst_amount[$i]',payment_mode='$payment_mode[$i]',cheque_date='$cheque_date[$i]',cheque_number='$cheque_number[$i]',paid_to='$paid_to[$i]',maker_id='".$this->session->userdata('user_id')."',maker_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."'");


 
}
}
redirect('rentals/manage_rentals');
}


public function updateItem(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('rentals/edit-rentals',$data);
	}
	else
	{
	redirect('index');
	}
}


public function update_rent(){

		@extract($_POST);

		$table_name ='tbl_rentale';
		$pri_col ='id';
		$this->load->model('Model_admin_login');
		
		

		
					$dataarr= array(
					'date' => $date,
					'rentale_id' => $rentale_id,
					'loc_id' => $loc_id,
					'amount' => $amount,
					'rent_amount' => $rent_amount,
					'tdsper' => $tdsper,
					'tds_amount' => $tds_amount,
					'gstper' => $gstper,
					'gst_amount' => $gst_amount,
					'remarks'=> $remarks,
					'cheque_date' => $cheque_date,
					'cheque_number' => $cheque_number,
					'paid_to' => $paid_to					
				
		      	);
					

				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataarr);

		$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
	 redirect('rentals/manage_rentals');
					
}


}