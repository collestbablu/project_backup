<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Invoice extends my_controller {
function __construct(){
   parent::__construct(); 
}     


public function getproductcont_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['con'] = $_GET['con'];
		$this->load->view('getcontact',$data);
	}
	else
	{
	redirect('index');
	}
}

public function getcommunicationfun(){
	if($this->session->userdata('is_logged_in')){
	  $data['comm'] = $_GET['comm'];
		$this->load->view('getcommunicationpage',$data);
	}
	else
	{
	redirect('index');
	}
}

public function getproductcase_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['main_menu'] = $_GET['con'];
		$this->load->view('getproductone',$data);
	}
	else
	{
	redirect('index');
	}
}

public function getcontactper_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['id'] = $_GET['con'];
		$this->load->view('getcontactper',$data);
	}
	else
	{
	redirect('index');
	}
}


public function addInvoice(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-invoice');
	}
	else
	{
	redirect('index');
	}		
}

public function addPayment(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-payment-record');
	}
	else
	{
	redirect('index');
	}		
}












public function save_download_pdf_file()
  { 


@extract($_POST);

		$iddd=$this->input->post('id');


 $url="Invoice List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}


public function insertInvoice(){
	
		@extract($_POST);
		$table_name ='tbl_new_invoice';
		$pri_col ='invoice_id';
		$table_name_comm ='tbl_communication';
		$pri_col_comm ='communication_id';
	 	$id= $this->input->post('id');
		$ref=$this->input->post('refno');
		$com= $this->input->post('communication_name');
		$refnon=$ref.$com;
		
		if($_FILES['image_name']['name']!='')
	{
		$target = "assets/invoice_image/"; 
		$target1 =$target . @date(U)."_".( $_FILES['image_name']['name']);
		$image_name=@date(U)."_".( $_FILES['image_name']['name']);
		move_uploaded_file($_FILES['image_name']['tmp_name'], $target1);
	}	

		
		$data= array(
					'contact_id' => $this->input->post('contact_id'),
					'case_id' => $this->input->post('case_name'),
					'totalcaseid' => $this->input->post('totalcaseid'),
					'refno' => $refnon,
					'person_id' => $this->input->post('person_name'),
					'invoice_no' =>  $this->input->post('invoice_no'),
					'n_date' =>  $this->input->post('n_date'),
					'so_no' =>  $this->input->post('so_no'),
					'so_date' =>  $this->input->post('so_date'),
					'basic_amt' => $this->input->post('basic_amt'),
					'tax' => $this->input->post('tax'),
					'total_amt' => $this->input->post('total_amt'),
					'invoice_image' => $image_name			
					
		      	);


	$sesio = array(
					
					'maker_id' => $this->session->userdata('user_id'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
			
	
		$dataall = array_merge($data,$sesio);

	$this->load->model('Model_admin_login');
	
		if($id!=''){
					
	$this->db->query("update tbl_communication set date='".$this->input->post('n_date')."' where communication_type='invoice' and updateid='$id'");
					
					$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
					 $this->paymentAmount($total_amt,$contact_id,$lastHdrId,$id);
					$this->paymentAmountlog($lastHdrId,$case_name,$refnon,$total_amt,$id);
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					}             
				else
				{
					
			 $this->Model_admin_login->insert_user($table_name,$dataall);
			  $lastHdrId=$this->db->insert_id();
			
			$datacomm= array(
					'contact_id' => $this->input->post('contact_id'),
					'case_id' =>  $this->input->post('case_name'),
					'totalcaseid' =>  $this->input->post('totalcaseid'),
					'date' => $this->input->post('n_date'),
					'refno' => $refnon,
					'updateid' => $lastHdrId,
					'contact_person_id' => $this->input->post('person_name'),
					'communication_type' => 'invoice'
						
					
		      	);
		
		$dataallcom=array_merge($datacomm,$sesio);
		$this->load->model('Model_admin_login');
	
	   	$this->Model_admin_login->insert_user($table_name_comm,$dataallcom);

			  $this->paymentAmount($total_amt,$contact_id,$lastHdrId,$id);	
			 $this->paymentAmountlog($lastHdrId,$case_name,$refnon,$total_amt,$id);
			 redirect('Invoice/Invoice/manageInvoice');
		
		
	}
	}	


//========================================================================================================
public function paymentAmountlog($lastHdrId,$case_id,$ref_no,$total_amount,$id){
	
	$table_name='tbl_payment_log';
	$pri_col='p_id';
	date_default_timezone_set('Asia/Kolkata');
	$dataaee=date('Y-m-d H:i:s a');
	if($id!=''){
	$lastHdrId=$id;
	}
	else
	{
		$lastHdrId;
	}
	$data_pay = array(
	
					'all_id' => $lastHdrId,					
					'date' => $dataaee,
					'case_id' => $case_id,
					'ref_no' => $ref_no,
					'total_amount' => $total_amount,
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'status' => 'Invoice'					
					
		);
	$this->load->model('Model_admin_login');
	if($id!=''){
	date_default_timezone_set('Asia/Kolkata');
	$datee=date('Y-m-d H:i:s a');

$mkrdate=date('y-m-d');
$this->db->query("update tbl_payment_log set all_id='". $lastHdrId."',case_id='".$case_id."',ref_no='". $ref_no."',total_amount='". $total_amount."',date='$datee',maker_id='".$this->session->userdata('user_id')."',maker_date='$mkrdate',comp_id='".$this->session->userdata('comp_id')."',status='Invoice' where status='Invoice' and all_id='$id'");	
	}else{
		
	$this->Model_admin_login->insert_user($table_name,$data_pay);
	}	
	return paymentAmountlog; 
}


//========================================================================================================

public function paymentAmount($grandtotal,$contact_id,$lastHdrId,$id){
	
	$table_name='tbl_invoice_payment';
	$pri_col='invoiceid';
	if($id!=''){
	$lastHdrId=$id;
	}
	else
	{
		$lastHdrId;
	}
	$data_pay = array(
	
					'contact_id' => $contact_id,
					'receive_billing_mount' => $grandtotal,
					'invoiceid' => $lastHdrId,					
					'date' =>date('Y-m-d H:i:s'),
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'status' => 'invoice'					
					
		);
	$this->load->model('Model_admin_login');
	if($id!=''){

		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_pay);
	}else{
		
	$this->Model_admin_login->insert_user($table_name,$data_pay);
	}	
	return paymentAmount; 
}

	
public function manageInvoice(){
	
	if($this->session->userdata('is_logged_in')){
	$this->load->view('manage-invoice');
	}
	else
	{
	redirect('index');
	}	
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
public function updateSalesOrder(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-sales-order');
	}
	else
	{
	redirect('index');
	}

}










public function insert_payment(){
	
		@extract($_POST);
		$table_name ='tbl_invoice_report';
		$pri_col ='invoice_rid';
$id=$id;	 	
		
		
		$data= array(
					'billamount' => $this->input->post('amount'),
					'invoiceid' => $this->input->post('inv'),
					'contact_id' => $cont,
					'date' => $date,
					'ref' => $ref,
					'pay_modes' => $pay_modes,
					'type' => 'Invoice',
					
					
					
		      	);


	$sesio = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					
					'maker_date'=> date('y-m-d'),
					
					);
		
		$dataall = array_merge($data,$sesio);

	$this->load->model('Model_admin_login');
	if($id!='')
	{
		
	 	    	
			$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
			
			 redirect('Invoice/Invoice/manageinvoice');
	}
	else
	{
				
					
	 	    	$this->Model_admin_login->insert_user($table_name,$dataall);
			
			
			 redirect('Invoice/Invoice/manageinvoice');
	
	}
	
	}
	



}