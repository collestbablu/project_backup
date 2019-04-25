<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class branch_delivery extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_branch_delivery');
}     

public function manage_branch_delivery(){
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
		$data['results'] = $this->model_branch_delivery->branch_data();	
		$this->load->view('manage-branch-delivery',$data);
	}
	else
	{
	redirect('index');
	}		
}


public function insert_branch_delivery()
{
@extract($_POST);
$table_name ='tbl_branch_delivery';
$cnt=count($date);
for($i=0;$i<$cnt;$i++){
if($date[$i]!='')
{
$this->db->query("insert into tbl_branch_delivery set date='$date[$i]',branch='$branch[$i]',total='$total[$i]',vol_wt='$vol_wt[$i]',total_vol_weight='$total_vol_weight[$i]',maker_id='".$this->session->userdata('user_id')."',maker_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."'");
}
}
redirect('branch_delivery/manage_branch_delivery');
}


public function updateBranch(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('edit-branch-delivery',$data);
	}
	else
	{
	redirect('index');
	}
}


public function update_branch_delivery(){

		@extract($_POST);
		$table_name ='tbl_branch_delivery';
		$pri_col ='branchd_id';
		$this->load->model('Model_admin_login');
		
					$dataarr= array(
					'date' => $this->input->post('date'),
					'branch' => $this->input->post('branch'),
						//'total' => $total,
					'vol_wt' => $this->input->post('vol_wt'),
					'total' => $this->input->post('total'),
					'total_vol_weight' =>$total_vol_weight,
			
		      	);
					

				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataarr);

		$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
	 redirect('branch_delivery/manage_branch_delivery');
					
}


}