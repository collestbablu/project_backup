<?php

defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting (E_ALL ^ E_NOTICE);

class Template extends my_controller {

function __construct(){

   parent::__construct(); 

}     



public function addTemplate(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('billMaterial');

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

		$pri_col ='template_hdr_id';

		$pri_col_dtl ='template_dtl_id';

		

		 $id= $this->input->post('invoiceid');

		 //$grand= $this->input->post('nett');

			 $this->db->query("update tbl_product_stock set templateid='1' where Product_id='$product_name'");	

		if($id!='')

		{
			
				$this->db->query("delete from tbl_template_dtl where template_hdr_id='$id'");
			
			
		
		    $this->load->model('Model_admin_login');	
			

			for($i=0; $i<=$rows; $i++)

				{

				 				

			    $qunt=$this->input->post('qn')[$i];

			   $piddd=$this->input->post('prdh')[$i];

				$expid=explode('^', $piddd);

				 $expids = $expid[1];

				if($qunt!=''){


 				 $data_dtl['template_hdr_id']= $id;

				 $data_dtl['item_name']=$expids;	
				 
				 $data_dtl['product_name']=$this->input->post('product_name');
				 			 
				 $data_dtl['quentity']=$qunt;

				 $data_dtl['unit']=$this->input->post('unt')[$i];

				 $data_dtl['gross_weight']=$this->input->post('rem')[$i];

				 $data_dtl['net_weight']=$this->input->post('tp')[$i];
				 
				 $data_dtl['scrap_weight']=$this->input->post('np')[$i];				 

				 $data_dtl['sub_total']=$this->input->post('sub_total');

				 $data_dtl['service_charge_percentage']=$this->input->post('service_chargeper');

				 $data_dtl['service_charge']=$this->input->post('service_charge');

				 $data_dtl['gross_discount_percentage']=$this->input->post('installation_chargeper');

				 $data_dtl['gross_discount']=$this->input->post('installation_charge');

				 $data_dtl['grand_total']=$this->input->post('nett');				

				 $data_dtl['maker_id']=$this->session->userdata('user_id');

				 $data_dtl['maker_date'] =$this->input->post('delivery_date_copy');

				 $data_dtl['author_date'] = date('y-m-d');

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

		else

		{

		

		$sess = array(

					

					'maker_id' => $this->session->userdata('user_id'),

					'maker_date' => date('y-m-d'),

					'author_date' => date('y-m-d'),

					'status' => 'A',

					'comp_id' => $this->session->userdata('comp_id'),

					'zone_id' => $this->session->userdata('zone_id'),

					'brnh_id' => $this->session->userdata('brnh_id'),

					'divn_id' => $this->session->userdata('divn_id')

		);

	

		$data = array(

	
					'product_code' => $this->input->post('product_name'),
					'product_name' => $this->input->post('product_name')
										

					);

			

			$data_merge = array_merge($data,$sess);					

		    $this->load->model('Model_admin_login');	

		    $this->Model_admin_login->insert_user($table_name,$data_merge);

		

		 $lastHdrId=$this->db->insert_id();		

		$this->load->model('Model_admin_login');

		for($i=0; $i<=$rows; $i++)

				{

				 				

			    $qunt=$this->input->post('qn')[$i];

				

				if($qunt!=''){



				 $data_dtl['template_hdr_id']= $lastHdrId;

				 $data_dtl['item_name']=$this->input->post('prdids')[$i];				 
				 
				  $data_dtl['product_name']=$this->input->post('product_name');
				 
				 $data_dtl['quentity']=$qunt;

				 $data_dtl['unit']=$this->input->post('unt')[$i];

				 $data_dtl['gross_weight']=$this->input->post('rem')[$i];

				 $data_dtl['net_weight']=$this->input->post('tp')[$i];
				 
				 $data_dtl['scrap_weight']=$this->input->post('np')[$i];				 

				 $data_dtl['sub_total']=$this->input->post('sub_total');

				 $data_dtl['service_charge_percentage']=$this->input->post('service_chargeper');

				 $data_dtl['service_charge']=$this->input->post('service_charge');

				 $data_dtl['gross_discount_percentage']=$this->input->post('installation_chargeper');

				 $data_dtl['gross_discount']=$this->input->post('installation_charge');

				 $data_dtl['grand_total']=$this->input->post('nett');				

				 $data_dtl['maker_id']=$this->session->userdata('user_id');

				 $data_dtl['maker_date'] =$this->input->post('delivery_date_copy');

				 $data_dtl['author_date'] = date('y-m-d');

				 $data_dtl['comp_id']=$this->session->userdata('comp_id');

				 $data_dtl['zone_id']=$this->session->userdata('zone_id');

				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');

				

				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);

						

							}

					}

					

	    $rediectInvoice="Template/Template/manageTamplate";

		redirect($rediectInvoice);

					

	

	}

}	



public function getproduct_fun(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('getproduct');

	}

	else

	{

	redirect('/Template/index');

	}

}


public function getproductcode(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('getproductcode');

	}

	else

	{

	redirect('/Template/index');

	}

}
	

public function all_product_function(){

	

		$this->load->view('all-product',$data);

	

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


public function manageTamplate(){

	

	if($this->session->userdata('is_logged_in')){

	$this->load->view('manageBillOfMaterial');

	}

	else

	{

	redirect('index');

	}	

}



public function viewPurchaseOrder(){

	if($this->session->userdata('is_logged_in')){

	

	$this->load->view('view-purchase-order');

	}

	else

	{

	redirect('index');

	}

		

}

public function updatePurchaseOrder(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('edit-purchase-order');

	}

	else

	{

	redirect('index');

	}



}

}