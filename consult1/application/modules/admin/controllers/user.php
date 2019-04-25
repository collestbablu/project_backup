<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class User extends my_controller {

	public function manage_user(){
	
	$data=$this->user_function();// call permission fnctn
	
	if($this->session->userdata('is_logged_in')){

	$this->load->view('/user/manage-user',$data);
	}
	else
	{
	redirect('/admin/user/index');
	}
	
	
}
	public function add_user(){
	
	//echo "hello";die;
	
	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('/user/add-user');
	}
	else
	{
	redirect('/admin/user/index');
	}
	
	
}
	
	public function insert_user(){
	
	
		extract($_POST);
		$table_name ='tbl_user_mst';
		$pri_col ='user_id';
	 	$id= $this->input->post('user_id');
		$data = array(
					//$sesio,
					'user_name' => $this->input->post('user_name'),
					'password' => $this->input->post('password'),
					'comp_id' => $this->input->post('comp_id'),
					'phone_no' => $this->input->post('phone_no'),
					'zone_id' => $this->input->post('zone_id'),
					'brnh_id' => $this->input->post('brnh_id'),
					'divn_id' => $this->input->post('divn_id'),
					'email_id' => $this->input->post('email_id')
					);
					
			$sesio = array(
					
					'compa_id' => $this->session->userdata('comp_id'),
					'divna_id' => $this->session->userdata('divn_id'),
					'zonea_id' => $this->session->userdata('zone_id'),
					'brnha_id' => $this->session->userdata('brnh_id'),
					'maker_id' => $this->session->userdata('user_id'),
					'author_id' => $this->session->userdata('user_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
			$dataall=array_merge($data,$sesio);
				
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
				redirect('/admin/user/manage_user');
				}
	}
	
//-----------------------------start item function ----------------------------

		public function getregion(){
	
		$data['zone_id']=$_GET['zone_id'];
		$this->load->view('admin/user/get-zone',$data);
	
	}
		
		
	public function getBranch(){
	
		$data['zone_id']=$_GET['zone_id'];
		$this->load->view('admin/user/get_branch',$data);
	
	}
	
	public function getDivision(){
	
		$data['branch_id']=$_GET['branch_id'];
		$this->load->view('admin/user/get_division',$data);
	
	}
	public function get_cid(){
	$data=$this->user_function();// call permission function
	
		$this->load->view('get_cid',$data);
	
	}
	

	
}


?>