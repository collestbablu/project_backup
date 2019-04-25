<?php

defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting (E_ALL ^ E_NOTICE);

class PurchaseOrder extends my_controller {

function __construct(){

   parent::__construct(); 

}     

public function addpurprice(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-price');
	}
	else
	{
	redirect('index');
	}		
}

 public function save_download_pdf_file_code()
  { 

$data = [];

@extract($_POST);
		$ccmail=$this->input->post('ccemail');
		$iddd=$this->input->post('id');


 $url="Purchase Order List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_output', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}


public function costpriceupdate(){
		extract($_POST);
		if($this->session->userdata('is_logged_in')){
		$this->db->query("update tbl_product_stock set unitprice_purchase='$getpricevalue' where Product_id='$productid'");
		echo "<script>";
		echo "window.close()";
		echo "</script>";

		}
		else
		{
		redirect('index');
		}
}	

public function purchaseOrder(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('add-purchase-order');

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


public function insertPurchaseOrder(){

		
		extract($_POST);

		$table_name ='tbl_purchase_order_hdr';

		$table_name_dtl ='tbl_purchase_order_dtl';

		$pri_col ='purchase_order_id';

		$pri_col_dtl ='purchase_order_dtl_id';
		$table_name_comm ='tbl_communication';
		$pri_col_comm ='communication_id';
		$id=$this->input->post('invoiceid');
		$ref=$this->input->post('refno');
		$com= $this->input->post('communication_name');
		$refno=$ref.$com;
		 //$grand= $this->input->post('nett');

			

		if($id!='')

		{

			$this->db->query("delete from tbl_purchase_order_dtl where purchase_order_hdr_id='$id'");

 
$this->db->query("update tbl_communication set date='".$this->input->post('date')."',remark_name='".$this->input->post('remark_name')."',subject='".$this->input->post('subject')."' where communication_type='PurchaseOrder' and updateid='$id'");


			$this->db->query("update tbl_purchase_order_hdr set delivery_date='".$this->input->post('date')."',remark='".$this->input->post('remark_name')."',contant='".$this->input->post('contant_name')."',subject='".$this->input->post('subject')."',sub_total='".$this->input->post('sub_total')."',service_charge_percentage ='".$this->input->post('service_chargeper')."',

					service_charge='".$this->input->post('service_charge')."',gross_discount_percentage='".$this->input->post('installation_chargeper')."',

					gross_discount='".$this->input->post('installation_charge')."',grand_total='".$this->input->post('nett')."',termandcondition='".addslashes($this->input->post('termandcondition'))."',customer_dod='$customer_dod',vendor_dod='$vendor_dod',new_ref_no='$new_ref_no' where purchase_order_id='$id'");	

		

			$this->load->model('Model_admin_login');

			

			for($i=0; $i<=$rows; $i++)

				{

				 				

			    $qunt=$this->input->post('qn')[$i];

			   $piddd=$this->input->post('prdh')[$i];

				$expid=explode('^', $piddd);

				 $expids = $expid[1];

				if($qunt!=''){



				 $data_dtl['purchase_order_hdr_id']= $id;
				 $data_dtl['vendor_id']=$this->input->post('contact_id_copy');

				 $data_dtl['product_id']=$expids;				 

				 $data_dtl['list_price']=$this->input->post('pr')[$i];

				 $data_dtl['quantity']=$qunt;
					 $data_dtl['per_discount']=$this->input->post('discount')[$i];
				 $data_dtl['discountamount']=$this->input->post('discountamount')[$i];
				 $data_dtl['unit']=$this->input->post('unt')[$i];
  				$data_dtl['description']=$this->input->post('desid')[$i];
				 $data_dtl['total']=$this->input->post('tp')[$i];
 				$data_dtl['remark']=$this->input->post('rem')[$i];
				 $data_dtl['net_price']=$this->input->post('np')[$i];

				 $data_dtl['sub_total']=$this->input->post('sub_total');

				 $data_dtl['service_charge_percentage']=$this->input->post('service_chargeper');

				 $data_dtl['service_charge']=$this->input->post('service_charge');

				 $data_dtl['gross_discount_percentage']=$this->input->post('installation_chargeper');

				 $data_dtl['gross_discount']=$this->input->post('installation_charge');

				 $data_dtl['grand_total']=$this->input->post('nett');				

				 $data_dtl['maker_id']=$this->session->userdata('user_id');

				 $data_dtl['maker_date'] =$this->input->post('date_name');

				 $data_dtl['author_date'] = date('y-m-d');

				 $data_dtl['comp_id']=$this->session->userdata('comp_id');

				 $data_dtl['zone_id']=$this->session->userdata('zone_id');

				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');

				

				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				$this->paymentAmountlog($lastHdrId,$case_name,$refno,$nett,$id);	
						

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

	
					'vendor_id' => $this->input->post('contact_id'),
					'case_id' => $this->input->post('case_name'),
					'new_ref_no' => $this->input->post('new_ref_no'),
					'customer_dod' => $this->input->post('customer_dod'),
					'vendor_dod' => $this->input->post('vendor_dod'),
					
					'refno' => $refno,
					'delivery_date' => $this->input->post('date'),
					'remark' => $this->input->post('remark_name'),
					'contant' => $this->input->post('contant_name'),
					'office_remark_name' => $this->input->post('office_remark_name'),
					'subject' => $this->input->post('subject'),
					'contact_person_id' => $this->input->post('person_name'),
					'totalcaseid' =>  $this->input->post('totalcaseid'),			
					'termandcondition' => $this->input->post('termandcondition'),
					'template' => $this->input->post('template'),
					'sub_total' => $this->input->post('sub_total'),
					'service_charge' => $this->input->post('service_charge'),
					'service_charge_percentage' => $this->input->post('service_chargeper'),					
					'gross_discount' => $this->input->post('installation_charge'),
					'gross_discount_percentage' => $this->input->post('installation_chargeper'),
					'grand_total' => $this->input->post('nett')

					

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



				 $data_dtl['purchase_order_hdr_id']= $lastHdrId;
				 $data_dtl['vendor_id'] = $this->input->post('contact_id');
				 $data_dtl['product_id']=$this->input->post('prdids')[$i];				 
				 $data_dtl['per_discount']=$this->input->post('discount')[$i];
				 $data_dtl['discountamount']=$this->input->post('discountamount')[$i];
				 $data_dtl['remark']=$this->input->post('rem')[$i];
				 $data_dtl['list_price']=$this->input->post('pr')[$i];
				 $data_dtl['quantity']=$qunt;
				  $data_dtl['description']=$this->input->post('desid')[$i];
				 $data_dtl['unit']=$this->input->post('unt')[$i];
				 $data_dtl['total']=$this->input->post('tp')[$i];
				 $data_dtl['net_price']=$this->input->post('np')[$i];
				 $data_dtl['sub_total']=$this->input->post('sub_total');
				 $data_dtl['service_charge_percentage']=$this->input->post('service_chargeper');
				 $data_dtl['service_charge']=$this->input->post('service_charge');
				 $data_dtl['gross_discount_percentage']=$this->input->post('installation_chargeper');
				 $data_dtl['gross_discount']=$this->input->post('installation_charge');
				 $data_dtl['grand_total']=$this->input->post('nett');				
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date'] =$this->input->post('date_name');
				 $data_dtl['author_date'] = date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 

				

				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);

						

							}

					}

					$datacomm= array(
					'contact_id' => $this->input->post('contact_id'),
					'case_id' =>  $this->input->post('case_name'),
					'totalcaseid' =>  $this->input->post('totalcaseid'),
					'date' => $this->input->post('date'),
					'remark_name' => $this->input->post('remark_name'),
					'subject' => $this->input->post('subject'),
					'refno' => $refno,
					'updateid' => $lastHdrId,
					'contact_person_id' => $this->input->post('person_name'),
					'communication_type' => 'PurchaseOrder'
						
					
		      	);
		
		$dataall = array_merge($datacomm,$sess);
		$this->load->model('Model_admin_login');
	
	   	$this->Model_admin_login->insert_user($table_name_comm,$dataall);

		$this->paymentAmount($nett,$contact_id,$lastHdrId,$id);
		
		$this->paymentAmountlog($lastHdrId,$case_name,$refno,$nett,$id);	

	    $rediectInvoice="purchaseorder/PurchaseOrder/managePurchaseOrder";

		redirect($rediectInvoice);

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
					'status' => 'Purchaseorder'					
					
		);
	$this->load->model('Model_admin_login');
	if($id!=''){
	
	date_default_timezone_set('Asia/Kolkata');
	$datee=date('Y-m-d H:i:s a');
$mkrdate=date('y-m-d');
$this->db->query("update tbl_payment_log set all_id='". $lastHdrId."',case_id='".$case_id."',ref_no='". $ref_no."',total_amount='". $total_amount."',date='$datee',maker_id='".$this->session->userdata('user_id')."',maker_date='$mkrdate',comp_id='".$this->session->userdata('comp_id')."',status='Purchaseorder' where status='Purchaseorder' and all_id='$id'");	
	}else{
		
	$this->Model_admin_login->insert_user($table_name,$data_pay);
	}	
	return paymentAmountlog; 
}


//========================================================================================================

public function paymentAmount($grand_total,$vendor_id,$lastHdrId,$id){
	
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
	
					'contact_id' => $vendor_id,
					'receive_billing_mount' => $grand_total,
					'invoiceid' => $lastHdrId,					
					'date' =>date('Y-m-d H:i:s'),
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'status' => 'Purchaseorder'					
					
		);
	$this->load->model('Model_admin_login');
	if($id!=''){

		//$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_pay);
	
	$datee=date('Y-m-d H:i:s');
$mkrdate=date('y-m-d');
$this->db->query("update tbl_invoice_payment set contact_id='".$vendor_id."',receive_billing_mount='".$grand_total."',invoiceid='". $lastHdrId."',date='$datee',maker_id='".$this->session->userdata('user_id')."',maker_date='$mkrdate',comp_id='".$this->session->userdata('comp_id')."',status='Purchaseorder' where status='Purchaseorder' and invoiceid='$id'");	
	}else{
		
	$this->Model_admin_login->insert_user($table_name,$data_pay);
	}	
	return paymentAmount; 
}



public function getproduct_fun(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('getproduct');

	}

	else

	{

	redirect('index');

	}

}

	

public function all_product_function(){

	

		$this->load->view('all-product',$data);

	

	}

	

public function managePurchaseOrder(){

	

	if($this->session->userdata('is_logged_in')){

	$this->load->view('manage-purchase-order');

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





function deletePurchaseOrder(){

	$table_name ='tbl_purchase_order_hdr';

	$table_name_dtl ='tbl_purchase_order_dtl';

	$pri_col ='purchase_order_id';	

	$pri_col_dtl ='purchase_order_hdr_id';

	$this->load->model('Model_admin_login');

		$id= $_GET['id'];

		$id_dtl= $_GET['id'];

		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);

		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id_dtl);

		redirect('/PurchaseOrder/managePurchaseOrder');

}







//mail send



public function send_mail_functionss(){

@extract($_POST);
		$ccmail=$this->input->post('ccemail');
		$iddd=$this->input->post('id');
		  $config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'wordwrap' => TRUE
		);
		
		$data = array(
			 'id' => $this->input->post('id')
			 );
		$this->load->library('email', $config);
		$this->email->from('info@techvyaserp.in');
		$list = array('ashbond100@gmail.com', 'jyoti@ashbond.in');
		$this->email->to($list);
		$this->email->bcc('collestbablu@gmail.com');
		$this->email->cc($ccmail);
		$this->email->subject('Purchase Order');
		$template = $this->load->view('email', $data, true);
		$this->email->message($template);
		if ($this->email->send()) {
		$this->db->query("update tbl_approve_status set mail_sent_status='Sent' where order_id='$iddd'");
				    echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
		} else {
	                echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
	}
}

public function sendMailManage(){

echo "kkkk";die;

}
 public function savedownloadFunction()

  { 

$data = [];

@extract($_POST);
		$ccmail=$this->input->post('ccemail');
		$iddd=$this->input->post('id');


 $url="assets/purchase_order_pdf/purchase_order".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('email', $data, true);



        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;



        //load mPDF library

		$this->load->library('m_pdf');



       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);



        //download it.

		$this->m_pdf->pdf->Output($pdfFilePath, "f");	
	$config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'wordwrap' => TRUE
		);
		$data = array(
			 'id' => $this->input->post('id')
			 );
		$this->load->library('email', $config);
		$this->email->from('info@techvyaserp.in');
		$list = array('ashbond100@gmail.com', 'jyoti@ashbond.in');
		
		$this->email->to($list);
		 $this->email->cc($ccmail);
		 
		 $this->email->bcc('collestbablu@gmail.com');
		$this->email->subject('Purchase Order');
		$this->email->message($template);
		 $this->email->attach($url);
		if ($this->email->send()) {
				echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";	
		} else {
	echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";	
		}
}		

public function send_approval()
{
$id=$_GET['id'];

$selectQuery=$this->db->query("select *from tbl_approve_status where order_id='$id' and type='Purchase Order' ");
$selctcnt=$selectQuery->num_rows();
if($selctcnt>0)
{
$this->db->query("update tbl_purchase_order_hdr set send_status='Sent' where purchase_order_id='$id'");
redirect('purchaseorder/PurchaseOrder/managePurchaseOrder');	
}
else
{

$this->db->query("insert into tbl_approve_status set type='Purchase Order',order_id='$id'");
$this->db->query("update tbl_purchase_order_hdr set send_status='Sent' where purchase_order_id='$id'");
redirect('purchaseorder/PurchaseOrder/managePurchaseOrder');	
}


}

}