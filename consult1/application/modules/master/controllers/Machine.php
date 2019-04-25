<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Machine extends my_controller {

public function manage_machine(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('Machine/manage-machine',$data);
	}
	else
	{
	redirect('index');
	}
		
}

public function add_machine(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Machine/add-machine');
}
	else
	{
	redirect('index');
	}
}


public function insert_machine(){
	
		@extract($_POST);
		$table_name ='tbl_machine';
		$pri_col ='Machine_id';
	 	$id= $this->input->post('Machine_id');
		
		$shifid=$this->input->post('supervisor_shift_two');
		if($shifid!=''){
				$shift_data=1;
				$shift_two_data=2;
		}else{
			$shift_data=1;
		}
		
		if($id!=''){
				$shift_data=$this->input->post('shift');
				$shift_two_data=$this->input->post('shift_two');	
		}
		
		$data= array(
					'machinename' => $this->input->post('machinename'),
					'machinecode' => $this->input->post('machinecode'),					
					'hours' => $this->input->post('hours'),
					'shift' => $shift_data,
					'supervisor' => $this->input->post('supervisor'),
					'operator_one' => $this->input->post('operator_one'),
					'operator_two' => $this->input->post('operator_two'),
					'shift_two' => $shift_two_data,
					'supervisor_shift_two' => $this->input->post('supervisor_shift_two'),
					'operator_one_shift_two' => $this->input->post('operator_one_shift_two'),
					'operatortwo_shift_two' => $this->input->post('operatortwo_shift_two'),
										
					'machinedes' => $machinedes,
		      	);

	$sesio = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
		
		$dataall = array_merge($data,$sesio);

	$this->load->model('Model_admin_login');
	
		if($id!=''){
		
					$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					}             
				else
				{
				
					
		    	$this->Model_admin_login->insert_user($table_name,$dataall);
			
			 redirect('master/Machine/manage_machine');
		
		
	}
	}

	
}

?>