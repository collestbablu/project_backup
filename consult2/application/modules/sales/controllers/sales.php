<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class sales extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_sales_order');
}     

public function add_sales(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-sales');
	}
	else
	{
	redirect('index');
	}		
}

public function edit_invoice_order(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-invoice-order');
	}
	else
	{
	redirect('index');
	}		
}

	
public function manage_sales_order(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	//$data['result'] = $this->model_sales_order->sales_order_data();
	$this->load->view('manage-sales',$data);
	}
	else
	{
	redirect('index');
	}	
}



	
public function all_product_function(){
	
		$this->load->view('all-product',$data);
	
	}


public function insert_item(){
	
		@extract($_POST);
		$table_name ='tbl_finish_goods_order';
		$pri_col ='id';
	 	$id= $this->input->post('id');
	
		$this->load->model('Model_admin_login');
	
		if($id!=''){

					//echo "aaaaa"; die;		
					$data= array(
					'product_id' => $this->input->post('fnsh_gds'),
					'qty' => $qty,
					//'bill_no' => $bill_no,
					'date' => $s_date,
					//'rack_id' => $rack_id,
					//'total_amount' => $total_amount,
					
					
					
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
		
		
		
		
		
					$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					}             
				else
				{
					
					
		$data= array(
					'product_id' => $this->input->post('fnsh_gds'),
					'qty' => $qty,
					//'bill_no' => $bill_no,
					'date' => $s_date,
					//'rack_id' => $rack_id,
					//'total_amount' => $total_amount,
					
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

					//$this->db->query("update tbl_product_stock set quantity=quantity+$qty where Product_id='$product_id'");
					//$this->db->query("update tbl_product_serial set quantity=quantity+$qty where Product_id='$product_id' and location_id='rack_id'");
					
		    	$this->Model_admin_login->insert_user($table_name,$dataall);
			
			 redirect('sales/manage_sales_order');
		
		
	}
	}

















function deleteSalesOrder(){
	$table_name ='tbl_purchase_order_hdr';
	$table_name_dtl ='tbl_purchase_order_dtl';
	$pri_col ='purchase_order_id';	
	$pri_col_dtl ='purchase_order_hdr_id';
	$this->load->model('Model_admin_login');
		$id= $_GET['id'];
		$id_dtl= $_GET['id'];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id_dtl);
		redirect('SalesOrder/managePurchaseOrder');
}

function delete_updata_stock($qty,$main_id){
	
		 $this->db->query("update tbl_product_stock set quantity=quantity+'$qty' where Product_id='$main_id'");
		 $this->db->query("update tbl_product_serial set quantity=quantity+'$qty' where product_id='$main_id'");
		return;	
	}	
		
}