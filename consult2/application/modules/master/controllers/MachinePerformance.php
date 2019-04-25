<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class MachinePerformance extends my_controller {

public function manage_machine_performance(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('Machine_Performance/manage-machine-performance',$data);
	}
	else
	{
	redirect('index');
	}
		
}

public function add_machine_performance(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Machine_Performance/add-machine-performance');
}
	else
	{
	redirect('index');
	}
}


public function insert_machine_performance(){
	
		@extract($_POST);
		$table_name ='tbl_machine_prformance';
		$pri_col ='m_id';
	 	$id= $this->input->post('m_id');
		
		
		
		$data= array(
					'machine_id' => $this->input->post('machine_id'),
					'machine_date' => $this->input->post('machine_date'),					
					'm_b_d_name' => $this->input->post('m_b_d_name'),
					'hours' => $this->input->post('hours')
					
		      	);

	

	$this->load->model('Model_admin_login');
	
		if($id!=''){
		
					$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data);
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					}             
				else
				{
				
					
		    	$this->Model_admin_login->insert_user($table_name,$data);
			
			 redirect('master/MachinePerformance/manage_machine_performance');
		
		
	}
	}

	
}

?>