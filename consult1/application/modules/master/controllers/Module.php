<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class module extends my_controller {

public function manage_module(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('module/manage-module',$data);
	}
	else
	{
	redirect('index');
	}
		
}



public function production_details(){
	
	if($this->session->userdata('is_logged_in')){
	
	$this->load->view('Item/production-details');
	}
	else
	{
	redirect('index');
	}
		
}


public function get_cid(){
	//$data=$this->user_function();// call permission function
	
		$this->load->view('get_cid');
	
	}

public function add_module(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('module/add-module');
}
	else
	{
	redirect('index');
	}
}


public function insert_module(){
	
		@extract($_POST);
		$table_name ='tbl_module_details';
		$pri_col ='s_no';
	 	$id= $this->input->post('s_no');
		
		
		 @$branchQuery2 = $this->db->query("SELECT * FROM $table_name where status='A' and s_no='$id'");
					$branchFetch2 = $branchQuery2->row();
		   
	
			if(!empty($_FILES['image_name']['name'])){
			
			$ff = $branchFetch2->product_image;
			
					
				@unlink('assets/image_data/'.$ff);
				
		
                $config['upload_path'] = 'assets/image_data/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|csv|xlsx|pdf|xls';
              	$config['file_name'] = $_FILES['image_name']['name'];
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
              
				
                if($this->upload->do_upload('image_name')){
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                }else{
                    $picture2 = '';
                }
		}
		
			
		

		
		
		$data= array(
					's_no' => $this->input->post('s_no'),
					'module_id' => $this->input->post('m_name'),
					'm_date' => $this->input->post('date'),
					'shot' => $this->input->post('shot'),
					'totShot' => $this->input->post('totShot'),
					
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
			
			 redirect('master/Module/manage_module');
		
		
	}
	}

	
}

?>