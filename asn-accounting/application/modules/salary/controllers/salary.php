<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class salary extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_salary');
}     

public function manage_salary(){
	if($this->session->userdata('is_logged_in')){
		$data=$this->user_function();// call permission fnctn
		$data['result'] = $this->model_salary->salary_data();	
		$this->load->view('manage-salary',$data);
	}
	else
	{
	redirect('index');
	}		
}


public function insert_salary()
{
@extract($_POST);
$table_name ='tbl_salary';


$cnt=count($contact_id);
for($i=0;$i<$cnt;$i++){
if($contact_id[$i]!='')
{
$this->db->query("insert into tbl_salary set contact_id='$contact_id[$i]',department='$department[$i]',loc_id='$loc_id[$i]',basic_salary='$basic_salary[$i]',hra='$hra[$i]',conveyance='$conveyance[$i]',epf='$epf[$i]',tds_amount='$tds_amount[$i]',epf_amount='$epf_amount[$i]',work_days='$work_days[$i]',net_pay='$net_pay[$i]',payment_mode='$payment_mode[$i]',cheque_date='$cheque_date[$i]',cheque_number='$cheque_number[$i]',paid_to='$paid_to[$i]',advance='$advance[$i]',deduction='$deduction[$i]',maker_id='".$this->session->userdata('user_id')."',maker_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."'");


 
}
}
redirect('salary/manage_salary');
}


public function updateItem(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('salary/edit-salary',$data);
	}
	else
	{
	redirect('index');
	}
}


public function update_salary(){

		@extract($_POST);

		$table_name ='tbl_salary';
		$pri_col ='id';
		$this->load->model('Model_admin_login');
		
		

		
					$dataarr= array(
					'contact_id' => $contact_id,
					'department' => $department,
					'loc_id' => $loc_id,
					'basic_salary' => $basic_salary,
					'hra' => $hra,
					'conveyance' => $conveyance,
					'epf' => $epf,
					'tds_amount' => $tds_amount,
					'work_days' => $work_days,
					'epf_amount' => $epf_amount,
					'net_pay' => $net_pay,
					'advance' => $advance,
					'deduction' => $deduction,
					'payment_mode' => $payment_mode
										
				
		      	);
					

				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataarr);

		$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
	 redirect('salary/manage_salary');
					
}


public function getBasicSal()
{
	
//echo $_GET['con'];

$basicQuery=$this->db->query("select *from tbl_contact_m where contact_id='".$_GET['con']."'");
$getBasic=$basicQuery->row();

echo $getBasic->basic_salary."^".$getBasic->hra."^".$getBasic->conveyance."^".$getBasic->epf."^".$getBasic->tds;
	
}




}