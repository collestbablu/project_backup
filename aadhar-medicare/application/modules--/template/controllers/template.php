<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class template extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_template');
}     

public function add_template(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-template');
	}
	else
	{
	redirect('index');
	}		
}
public function manage_template(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$data['result'] = $this->model_template->getTemplate();
	$this->load->view('manage-template',$data);
	}
	else
	{
	redirect('index');
	}	
}


public function edit_template(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-template');
	}
	else
	{
	redirect('index');
	}		
}

	



public function insertTemplate(){
		
		extract($_POST);
		$table_name ='tbl_template_hdr';
		$table_name_dtl ='tbl_template_dtl';
		$pri_col ='templateid';
		$pri_col_dtl ='templatehdr';
		
		
		$sess = array(
					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'A',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
		);
	
		$data = array(
	
					'product_id' => $this->input->post('product_id'),
					'date' => $this->input->post('date'),
					
					
					);
			
			$data_merge = array_merge($data,$sess);					
		    $this->load->model('Model_admin_login');	
		    $this->Model_admin_login->insert_user($table_name,$data_merge);
			$lastHdrId11=$this->db->insert_id();
			$this->db->query("update tbl_product_stock set templateid='1' where Product_id='$product_id'");		
			$this->load->model('Model_admin_login');
		
		for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($qty[$i]!=''){

				 $data_dtl['templatehdr']= $lastHdrId11;
				 $data_dtl['product_id']=$this->input->post('main_id')[$i];				 
				 $data_dtl['list_price']=$this->input->post('list_price')[$i];
				 $data_dtl['quantity']=$this->input->post('qty')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				
				
				
				
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
						
							}
					}
				
			
			
				//$this->software_log_insert($lastHdrId,$vendor_id,$grand_total,'Template added');
				
	
				
			 $rediectInvoice="template/manage_template";
		redirect($rediectInvoice);	
	   
					
	
	}

	
	public function updateTemplate(){
		
		extract($_POST);
		$table_name ='tbl_template_hdr';
		$table_name_dtl ='tbl_template_dtl';
		$pri_col ='templateid';
		$pri_col_dtl ='templatehdr';
		
 
		 $this->db->query("delete from $table_name_dtl where templatehdr='$id'");	
				
		$sess = array(
					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'A',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
		);
	
		$data = array(
					
					'product_id' => $this->input->post('product_id'),
					'date' => $this->input->post('date')
					
					);
			
			$data_merge = array_merge($data,$sess);					
		   
			$this->load->model('Model_admin_login');	
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);

		
		for($i=0; $i<=$rows; $i++)
				{
				
				if($qty[$i]!=''){

				 $data_dtl['templatehdr']= $id;
				 $data_dtl['product_id']=$this->input->post('main_id')[$i];				 
				 $data_dtl['list_price']=$this->input->post('list_price')[$i];
				 $data_dtl['quantity']=$this->input->post('qty')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
				
						}
					}
					
					
	   echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
		
	}
	
	
	
	
public function all_product_function(){
	
		$this->load->view('all-product',$data);
	
	}

public function viewSalesOrder(){
	if($this->session->userdata('is_logged_in')){
	
	$this->load->view('view-sales-order');
	}
	else
	{
	redirect('index');
	}
		
}

public function getproduct(){
	if($this->session->userdata('is_logged_in')){
//$this->getSelect();
		$this->load->view('getproduct');
	}
	else
	{
	redirect('index');
	}
}

function getMakeFun()
{
	
	$data=array(
	'id' => $_GET['con']
	);
	
	$this->load->view("get-make",$data);
}
		
}