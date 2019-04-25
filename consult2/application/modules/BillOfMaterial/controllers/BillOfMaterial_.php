<?php

defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting (E_ALL ^ E_NOTICE);

class BillOfMaterial extends my_controller {

function __construct(){

   parent::__construct(); 

}     



public function billMaterial(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('billMaterial');

	}

	else

	{

	redirect('/BillOfMaterial/index');

	}		

}



public function insertBillOfMaterial(){

		

		extract($_POST);

		$table_name ='tbl_bill_of_material_hdr';

		$table_name_dtl ='tbl_bill_of_material_dtl';

		$pri_col ='bill_of_material_id_hdr';

		$pri_col_dtl ='bill_of_material_dtl_id';

		

		 $id= $this->input->post('invoiceid');

		 //$grand= $this->input->post('nett');

			

		if($id!='')

		{
			
				$this->db->query("delete from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$id'");
			
			
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

	
					'product_type' => $this->input->post('Product_typeid'),
					'product_code' => $this->input->post('product_code'),
					'product_name' => $this->input->post('product_name'),
					'bom_no' => $this->input->post('bom_no'),
					'date' => $this->input->post('date_name'),
					'remark' => $this->input->post('remark_name'),
					
					'quantity' => $this->input->post('quantity'),

					'serial_no' => $this->input->post('serial_no'),
					
					'machine_name' => $this->input->post('machine_name')

					

					);

			

			$data_merge = array_merge($data,$sess);					

		    $this->load->model('Model_admin_login');	

		    $this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);
		

			//$this->load->model('Model_admin_login');

			

			for($i=0; $i<=$rows; $i++)

				{

				 				

			    $qunt=$this->input->post('qn')[$i];

			   $piddd=$this->input->post('prdh')[$i];

				$expid=explode('^', $piddd);

				 $expids = $expid[1];

				if($qunt!=''){


 				 $data_dtl['bill_of_material_hdr_id']= $id;

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

	

					'product_type' => $this->input->post('Product_typeid'),
					'product_code' => $this->input->post('product_code'),
					'product_name' => $this->input->post('product_name'),
					'bom_no' => $this->input->post('bom_no'),
					'date' => $this->input->post('date_name'),
					'remark' => $this->input->post('remark_name'),
					
					'quantity' => $this->input->post('quantity'),

					'serial_no' => $this->input->post('serial_no'),
					'machine_name' => $this->input->post('machine_name')

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



				 $data_dtl['bill_of_material_hdr_id']= $lastHdrId;

				 $data_dtl['item_name']=$this->input->post('prdids')[$i];				 
				 
				  $data_dtl['product_name']=$this->input->post('product_name');
				 
				 $data_dtl['quentity']=$qunt;

				 $data_dtl['unit']=$this->input->post('unt')[$i];

				 $data_dtl['gross_weight']=$this->input->post('rem')[$i];

				 $data_dtl['net_weight']=$this->input->post('tp')[$i];
				 
				 $data_dtl['scrap_weight']=$this->input->post('np')[$i];				 			

				 $data_dtl['maker_id']=$this->session->userdata('user_id');

				 $data_dtl['maker_date'] =$this->input->post('delivery_date_copy');

				 $data_dtl['author_date'] = date('y-m-d');

				 $data_dtl['comp_id']=$this->session->userdata('comp_id');

				 $data_dtl['zone_id']=$this->session->userdata('zone_id');

				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');

				

				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);

						

							}

					}

					

	    $rediectInvoice="BillOfMaterial/BillOfMaterial/manageBillMaterial";

		redirect($rediectInvoice);

					

	

	}

}	



public function getRowData(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('getRowData');

	}

	else

	{

	redirect('/BillOfMaterial/index');

	}

}



public function getproduct_fun(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('getproduct');

	}

	else

	{

	redirect('/BillOfMaterial/index');

	}

}


public function getproductcode(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('getproductcode');

	}

	else

	{

	redirect('/BillOfMaterial/index');

	}

}
	

public function all_product_function(){

	

		$this->load->view('all-product',$data);

	

	}

	

public function manageBillMaterial(){

	

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


public function approval_update(){

		

		extract($_POST);

		$table_name ='tbl_bill_of_material_hdr';
		$pri_col='bill_of_material_id_hdr';
		if($_GET['id']!='')
		{
		$id=$_GET['id'];
		$Approved='Approved';
		}
		else
		{
		$id=$_GET['idd'];
		$Approved='Not Approved';
		}

		$data=array(
		'approval_status' => $Approved
		);		
			$this->load->model('Model_admin_login');	

		    $this->Model_admin_login->update_user($pri_col,$table_name,$id,$data);

redirect("BillOfMaterial/manageBillMaterial");

	}




}