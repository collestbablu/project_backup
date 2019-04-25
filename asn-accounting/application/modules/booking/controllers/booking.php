<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class booking extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_booking');
}     

public function add_booking(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-booking');
	}
	else
	{
	redirect('index');
	}		
}


public function invoice_details(){
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
		$this->load->view('invoice-details',$data);
	}
	else
	{
	redirect('index');
	}		
}

public function salesOrder_details_mail(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('invoice-details-mail');
	}
	else
	{
	redirect('index');
	}		
}

			
			
			
			
			




public function edit_booking(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-booking');
	}
	else
	{
	redirect('index');
	}		
}

	
public function manage_booking(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$data['result'] = $this->model_booking->booking_data();
	$this->load->view('manage-booking',$data);
	}
	else
	{
	redirect('index');
	}	
}

public function getproduct(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('getproduct');
	}
	else
	{
	redirect('index');
	}
}






public function insertBooking(){
		
		extract($_POST);
		$table_name ='tbl_bookong_order_hdr';
		$table_name_dtl ='tbl_bookong_order_dtl';
		$pri_col ='bookingrid';
		$pri_col_dtl ='bookinghdr';
		
		$sess = array(
					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
		);
	
		$data = array(
	
					'cd_no' => $this->input->post('cd_no'),
					'date_of_booking' => $this->input->post('date_of_booking'),
					'exp_reach_date' => $this->input->post('exp_reach_date'),
					'vendor_id' => $this->input->post('vendor_id'),
					'vendor_weight' => $this->input->post('vendor_weight'),
					'remarks' => $this->input->post('remarks'),
					'booking_date' => $this->input->post('booking_date'),
					'total_weight' => $this->input->post('total_weight'),
					'actual_weight' => $this->input->post('actual_weight'),
					'sub_total' => $this->input->post('sub_total'),
					'grand_total' => $this->input->post('grand_total'),
					
					
					'mode' => $this->input->post('mode')
										
					);
			
			$data_merge = array_merge($data,$sess);					
		    $this->load->model('Model_admin_login');	
		    $this->Model_admin_login->insert_user($table_name,$data_merge);
			$lastHdrId=$this->db->insert_id();		
			$this->load->model('Model_admin_login');
		
		for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($pd[$i]!=''){

				 $data_dtl['bookinghdr']= $lastHdrId;
				 $data_dtl['awbno']=$pd[$i];
				 $data_dtl['origin']=$origin[$i];				 
				 $data_dtl['destination']=$destination[$i];
				 $data_dtl['rate']=$rate[$i];
				 $data_dtl['srate']=$srate[$i];
				 $data_dtl['char_wt']=$char_wt[$i];
				 $data_dtl['total']=$total[$i];
				 $data_dtl['box']=$box[$i];
				
				 $data_dtl['bag']=$bag[$i];
				
				 
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
						
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
							}
					}
				
				
			 $rediectInvoice="booking/manage_booking";
		redirect($rediectInvoice);	
	   
					
	
	}



public function updateBooking(){
		
		extract($_POST);
		$table_name ='tbl_bookong_order_hdr';
		$table_name_dtl ='tbl_bookong_order_dtl';
		$pri_col ='bookingrid';
		$pri_col_dtl ='bookinghdr';
		//$id= $this->input->post('id');
		//echo $id;die;
 //$this->refil_qnty_del($id);
//echo "delete from tbl_bookong_order_dtl where bookinghdr='$id'";die;
		 $this->db->query("delete from tbl_bookong_order_dtl where bookinghdr='$id'");	
				
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
	
					'cd_no' => $this->input->post('cd_no'),
					'date_of_booking' => $this->input->post('date_of_booking'),
					'exp_reach_date' => $this->input->post('exp_reach_date'),
					'vendor_id' => $this->input->post('vendor_id'),
					'vendor_weight' => $this->input->post('vendor_weight'),
					'remarks' => $this->input->post('remarks'),
					'booking_date' => $this->input->post('booking_date'),
					'total_weight' => $this->input->post('total_weight'),
					'actual_weight' => $this->input->post('actual_weight'),
					'mode' => $this->input->post('mode')
					
					);
			
			$data_merge = array_merge($data,$sess);					
		   
			$this->load->model('Model_admin_login');	
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);

		
		for($i=0; $i<$rows; $i++)
				{
				
			    
			
				
				if($pd[$i]!=''){

				 
				
$data_dtl['bookinghdr']= $id;
				
				 $data_dtl['awbno']=$pd[$i];				 
				 $data_dtl['destination']=$destination[$i];
				 $data_dtl['origin']=$origin[$i];
				 $data_dtl['rate']=$rate[$i];
				 $data_dtl['srate']=$srate[$i];
				 $data_dtl['char_wt']=$char_wt[$i];
				 $data_dtl['total']=$total[$i];
				 
				 $data_dtl['box']=$box[$i];
				
				 $data_dtl['bag']=$bag[$i];
				
				 
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
				//$this->updata_stock($qty[$i],$main_id[$i],$sizeval[$i]);
	
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

function delete_updata_stock($qty1,$main_id){
	
		 $this->db->query("update tbl_product_stock set quantity=quantity-'$qty1' where Product_id='$main_id'");
		 $this->db->query("update tbl_product_serial set quantity=quantity-'$qty1' where product_id='$main_id'");
		return;	
	}	

public function getRate()
{
	  
//@extract($_POST);	  
  $rateQuery=$this->db->query("select *from tbl_contact_dtl where contact_id='".$_GET['con']."' and frmOrg='".$_GET['origin']."' and toOrg='".$_GET['destination']."'");	
	  $getRate=$rateQuery->row();

if($_GET['mode']=='Air')
{
	echo $getRate->rateAir;
}
	

if($_GET['mode']=='Train')
{
	echo $getRate->rateTrain;
}	  

if($_GET['mode']=='Surface')
{
	echo $getRate->rateSurface;
}	  


	
}

		
}