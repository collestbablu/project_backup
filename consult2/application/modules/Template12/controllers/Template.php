<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Template extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function addTemplate(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-template');
	}
	else
	{
	redirect('/Template/index');
	}		
}

public function insertTemplate(){
		
		extract($_POST);
			
		$table_name ='tbl_template_hdr';
		$table_name_dtl ='tbl_template_dtl';
		$pri_col ='template_id';
		$pri_col_dtl ='template_id_dtl';
		
		  $id= $this->input->post('invoiceid');
 
		 $this->db->query("update tbl_product_stock set templateid='1' where Product_id='$finish_goods'");
			
		if($id!='')
		{
			$this->db->query("delete from tbl_template_dtl where template_id='$id'");
			
		$data = array(
	
					'finish_goods' => $this->input->post('finish_goods'),
				    'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data);		
		
		
			
				
		for($i=0; $i<=$rows; $i++)
				{
				
		      
			   $qunt=$this->input->post('qn')[$i];
			    $piddd=$this->input->post('prdh')[$i];
				$expid=explode('^', $piddd);
				 $expids = $expid[1];
				//$finish=$this->input->post('finish_goods');
				if($qunt!=''){
				 $data_dtl['template_id']=$id;	
				  $data_dtl['finish_goods']=$this->input->post('finish_goods');
				 $data_dtl['product_id']=$expids;
				 
				 $data_dtl['unit']=$this->input->post('unt')[$i];
				 $data_dtl['qnty']=$this->input->post('qn')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']= date('y-m-d');
				 $data_dtl['author_date']= date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				 
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				
				}	
						
	}
	
	
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";		

		
		}
		else
		{
	
		$data = array(
	
					'finish_goods' => $this->input->post('finish_goods'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->insert_user($table_name,$data);
	    $lastid=$this->db->insert_id();
		$countPid=count($prdids);
		
		for($i=0; $i<$countPid; $i++)
				{
				$pidd=$this->input->post('prdids')[$i];
				
				if($pidd!=''){
				 $data_dtl['template_id']=$lastid;	
				 $data_dtl['finish_goods']=$this->input->post('finish_goods');
				 $data_dtl['product_id']=$this->input->post('prdids')[$i];
				 
				 $data_dtl['unit']=$this->input->post('unt')[$i];
				 $data_dtl['qnty']=$this->input->post('qn')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']= date('y-m-d');
				 $data_dtl['author_date']= date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				 
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				
				}
			
	}
			
						
			redirect('/Template/manageTamplate');
	}
}	

public function getproduct_fun(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('getproduct');
	}
	else
	{
	redirect('/PurchaseOrder/index');
	}
}


public function show_qty(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('show-qty',$data);
	}
	else
	{
	redirect('/Template/index');
	}
	}
	
public function all_product_function(){
	
		$this->load->view('all-product',$data);
	
	}
	
public function manageTamplate(){
	
	if($this->session->userdata('is_logged_in')){
	$this->load->view('manage-template');
	}
	else
	{
	redirect('/Template/index');
	}	
}

public function viewTemplate(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('view-Template');
}
	else
	{
	redirect('/Template/index');
	}
		
}
public function updateTempalte(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-template');
	}
	else
	{
	redirect('/Template/index');
	}

}
		
}