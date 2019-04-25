<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class pickup extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_pickup');
}     

public function manage_pickup(){
	if($this->session->userdata('is_logged_in')){
		$data=$this->user_function();// call permission fnctn
		$data['result'] = $this->model_pickup->pickup_data();	
		$this->load->view('manage-pickup',$data);
	}
	else
	{
	redirect('index');
	}		
}


public function insert_pickup()
{
@extract($_POST);
$table_name ='tbl_pick_up';
$cnt=count($date);
for($i=0;$i<$cnt;$i++){
if($date[$i]!='')
{
$this->db->query("insert into tbl_pick_up set date='$date[$i]',contact_id='$contact_id[$i]',no_of_box='$no_of_box[$i]',cost='$cost[$i]',conveyance='$conveyance[$i]',total='$total[$i]',vol_wt='$vol_wt[$i]',name_of_person='$name_of_person[$i]',origin='$origin[$i]',desination='$desination[$i]',maker_id='".$this->session->userdata('user_id')."',total_vol_weight='$total_vol_weight',maker_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."'");
}
}
redirect('pickup/manage_pickup');
}


public function updateItem(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('pickup/edit-pickup',$data);
	}
	else
	{
	redirect('index');
	}
}


public function update_pickup(){

		@extract($_POST);
		$table_name ='tbl_pick_up';
		$pri_col ='pickup_id';
		$this->load->model('Model_admin_login');
		
					$dataarr= array(
					'date' => $this->input->post('date'),
					'contact_id' => $this->input->post('contact_id'),
					'origin' => $origin,
					
					'desination' => $desination,
					
					'no_of_box' => $this->input->post('no_of_box'),
					'cost' => $cost,
					'conveyance' => $this->input->post('conveyance'),
					'total' => $total,
					'vol_wt' => $this->input->post('vol_wt'),
					'total_vol_weight' =>$total_vol_weight,
					'name_of_person' => $this->input->post('name_of_person'),
					
					
				
		      	);
					

				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataarr);

		$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
	 redirect('pickup/manage_pickup');
					
}


}