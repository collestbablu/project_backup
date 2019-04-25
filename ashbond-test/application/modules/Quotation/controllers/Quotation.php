<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Quotation extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function addQuotation(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-quotation');
	}
	else
	{
	redirect('index');
	}		
}

public function save_download_pdf_file()
  { 

$data = [];

@extract($_POST);
		$ccmail=$this->input->post('ccemail');
		$iddd=$this->input->post('id');


 $url="Quotation List".$idd."'.pdf";

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

public function edititembyquotation(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-item-by-quotation');
	}
	else
	{
	redirect('index');
	}		
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

public function addpurchaseprice(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-purchase-price');
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

public function insertQuotation(){
		
		extract($_POST);
		$table_name ='tbl_quotation_hdr';
		$table_name_dtl ='tbl_quotation_dtl';
		$pri_col ='quotation_id_hdr';
		$pri_col_dtl ='quotation_id_dtl';
		$table_name_comm ='tbl_communication';
		$pri_col_comm ='communication_id';
		 $id= $this->input->post('invoiceid');
		
		$ref=$this->input->post('refno');
		$com= $this->input->post('communication_name');
		$refno=$ref.$com;
			
		if($id!='')
		{
			$this->db->query("delete from tbl_quotation_dtl where quotation_id='$id'");
 
 			
	$this->db->query("update tbl_communication set date='".$this->input->post('date')."',remark_name='".$this->input->post('remark_name')."',subject='".$this->input->post('subject')."' where communication_type='Quotation' and updateid='$id'");
					
			
			$this->db->query("update tbl_quotation_hdr set delivery_date='".$this->input->post('date')."',remark='".$this->input->post('remark_name')."',office_remark_name='$office_remark_name',subject ='".$this->input->post('subject')."',refno='".$refno."',termandcondition='".$this->input->post('termandcondition')."',template='$template',sub_total='".$this->input->post('sub_total')."',service_charge_percentage ='".$this->input->post('service_chargeper')."',
service_charge='".$this->input->post('service_charge')."',gross_discount_percentage='".$this->input->post('installation_chargeper')."',gross_discount='".$this->input->post('installation_charge')."',grand_total='".$this->input->post('nett')."',contant='$contant_name',new_ref='$new_ref',contact_person_id='".$this->input->post('person_name')."' where quotation_id_hdr='$id'");	
		
			$this->load->model('Model_admin_login');
			
			for($i=0; $i<=$rows; $i++)
				{
				 				
			    $qunt=$this->input->post('qn')[$i];
			   $piddd=$this->input->post('prdh')[$i];
				$expid=explode('^', $piddd);
				 $expids = $expid[1];
				if($qunt!=''){

				 $data_dtl['quotation_id']= $id;
				 $data_dtl['product_id']=$expids;	
				   $data_dtl['per_discount']=$this->input->post('discount')[$i];
				 $data_dtl['discountamount']=$this->input->post('discountamount')[$i];
				  $data_dtl['description']=$this->input->post('desid')[$i];					 
				 $data_dtl['remark']=$this->input->post('rem')[$i];
				 $data_dtl['list_price']=$this->input->post('pr')[$i];
				 $data_dtl['quantity']=$qunt;
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
				 $data_dtl['maker_date'] =$this->input->post('delivery_date_copy');
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
					
					'refno' => $refno,
					'new_ref' =>$new_ref,
					'delivery_date' => $this->input->post('date'),
					'remark' => $this->input->post('remark_name'),
	
					'subject' => $this->input->post('subject'),
					'contant' => $this->input->post('contant_name'),
					'contact_person_id' => $this->input->post('person_name'),
					
					'termandcondition' => $this->input->post('termandcondition'),
					'template' => $this->input->post('template'),
					'totalcaseid' =>  $this->input->post('totalcaseid'),
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

				 $data_dtl['quotation_id']= $lastHdrId;
				 $data_dtl['vendor_id'] = $this->input->post('contact_id');
				 $data_dtl['product_id']=$this->input->post('prdids')[$i];
				  $data_dtl['per_discount']=$this->input->post('discount')[$i];
				 $data_dtl['discountamount']=$this->input->post('discountamount')[$i];
				  $data_dtl['description']=$this->input->post('desid')[$i];				 
				 $data_dtl['remark']=$this->input->post('rem')[$i];
				 $data_dtl['list_price']=$this->input->post('pr')[$i];
				 $data_dtl['quantity']=$qunt;
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
				 $data_dtl['maker_date'] =$this->input->post('delivery_date_copy');
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
					'communication_type' => 'Quotation'
						
					
		      	);
		
		$dataall = array_merge($datacomm,$sess);
		$this->load->model('Model_admin_login');
	
	   	$this->Model_admin_login->insert_user($table_name_comm,$dataall);
		
		$this->paymentAmountlog($lastHdrId,$case_name,$refno,$nett,$id);
					
			 $rediectInvoice="Quotation/Quotation/manageQuotation";
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
					'status' => 'Quotation'					
					
		);
	$this->load->model('Model_admin_login');
	if($id!=''){
	date_default_timezone_set('Asia/Kolkata');
	$datee=date('Y-m-d H:i:s a');
	
$mkrdate=date('y-m-d');
$this->db->query("update tbl_payment_log set all_id='". $lastHdrId."',case_id='".$case_id."',ref_no='". $ref_no."',total_amount='". $total_amount."',date='$datee',maker_id='".$this->session->userdata('user_id')."',maker_date='$mkrdate',comp_id='".$this->session->userdata('comp_id')."',status='Quotation' where status='Quotation' and all_id='$id'");	
	}else{
		
	$this->Model_admin_login->insert_user($table_name,$data_pay);
	}	
	return paymentAmountlog; 
}


//========================================================================================================


public function getproduct_fun(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('getproduct');
	}
	else
	{
	redirect('index');
	}
}

public function costpriceupdate(){
		extract($_POST);
		if($this->session->userdata('is_logged_in')){
		$this->db->query("update tbl_product_stock set unitprice_sale='$getpricevalue' where Product_id='$productid'");
		echo "<script>";
		echo "window.close()";
		echo "</script>";

		}
		else
		{
		redirect('index');
		}
}	

public function editquotationitem(){
		extract($_POST);
		if($this->session->userdata('is_logged_in')){
		
		$this->db->query("update tbl_quotation_hdr set sub_total='$sub_name',grand_total='$grand_name'  where quotation_id_hdr='$quotation_id'");
		
		$this->db->query("update tbl_quotation_dtl set description='$desss',list_price='$sellingprice_name',quantity='$qty_name',per_discount='$disc_name',discountamount='$disc_amt_name',remark='$remark_name',total='$total_name',net_price='$net_name',sub_total='$sub_name',grand_total='$grand_name' where quotation_id_dtl='$quotation_id_dtl'");

		$this->db->query("update tbl_quotation_dtl set sub_total='$sub_name',grand_total='$grand_name' where quotation_id='$quotation_id'");

		echo "<script>";
		echo "window.close()";
		echo "</script>";
				
		}
		else
		{
		redirect('index');
		}
}	

public function purchasepriceupdate(){
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

public function all_product_function(){
	
		$this->load->view('all-product',$data);
	
	}
	
public function manageQuotation(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('manage-quotation',$data);
	}
	else
	{
	redirect('index');
	}	
}

public function viewQuotation(){
	if($this->session->userdata('is_logged_in')){
	
	$this->load->view('view-quotation');
	}
	else
	{
	redirect('index');
	}
		
}
public function updateQuotation(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-quotation');
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
		redirect('/Quotation/managePurchaseOrder');
}

public function send_mail_functions(){
			
			@extract($_POST);
		
		$ccmail=$this->input->post('ccemail');
		$iddd=$this->input->post('id');
				
		$this->load->library('email');
		$this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => '103.211.216.225',
		  'smtp_user' => 'info@techvyaserp.in',
		  'smtp_pass' => 'info@12345##',
		  'smtp_port' => 587,
		  'mailtype' => 'html',
				'charset' => 'utf-8',
				'wordwrap' => TRUE
		));
		
		
		$data = array(
			 'id' => $this->input->post('id')
			 );
		//$this->load->library('email', $config);
		$this->email->from('info@techvyaserp.in');
		$list = array('jyoti@ashbond.in', 'ashbond100@gmail.com');
		//$list = array('ashbond100@gmail.com', 'jyoti@ashbond.in');
		$this->email->to($list);
		$this->email->bcc('gaurav.taneja1801@gmail.com');
		$this->email->cc($ccmail);
		$this->email->subject('Quotation');
		$template=$this->load->view('email', $data, true);
		$this->email->message($template);
		if($this->email->send()) {
			
		$this->db->query("update tbl_approve_status set mail_sent_status='Sent' where order_id='".$iddd."'");
				
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

//mail send

public function send_mail(){
//echo $_GET['id'];die;
$this->load->library('email');
 $config = array(
   'mailtype' => 'html',
   'charset'  => 'utf-8',
   'priority' => '1'
    );
 $this->email->initialize($config);
 $this->email->from("info@techvys.com",'Purchase Order');
 $this->email->to("gauravtaneja1801@gmail.com");
 $this->email->subject('Purchase Order');
 $data = array(
 'id' => $_GET['id']
 );
 $emaildescription=$this->load->view('email_template',$data,TRUE);
 $this->email->message($emaildescription);
 $result=$this->email->send();   
 redirect('Quotation/Quotation/managePurchaseOrder');
}


 public function save_download()
  { 
$data = [];
@extract($_POST);
		$ccmail=$this->input->post('ccemail');
		$iddd=$this->input->post('id');

$url="assets/quotation_order_pdf/Quotation".$idd."'.pdf";
	//load the view and saved it into $html variable
		$html=$this->load->view('email-pdf', $data, true);

        //this the the PDF filename that user will get to download
		$pdfFilePath =$url;

        //load mPDF library
		$this->load->library('m_pdf');

       //generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($html);

        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "f");	
		$this->load->library('email');
		$this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => '103.211.216.225',
		  'smtp_user' => 'info@techvyaserp.in',
		  'smtp_pass' => 'info@12345##',
		  'smtp_port' => 587,
		  'mailtype' => 'html',
				'charset' => 'utf-8',
				'wordwrap' => TRUE
		));

		$data = array(
			 'id' => $this->input->post('id')
			 );
		//$this->load->library('email', $config);
		
		$this->email->from('info@techvyaserp.in');
		$list = array('jyoti@ashbond.in', 'ashbond100@gmail.com');
		//$list = array('ashbond100@gmail.com', 'jyoti@ashbond.in'); 
		
		$this->email->to($list);
		$this->email->cc($ccmail);
		 $this->email->bcc('gaurav.taneja1801@gmail.com');
		$this->email->subject('Quotation');
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
public function price_history(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('price_histroy/pricehistory');
	}
	else
	{
	redirect('/SalesOrder/index');
	}

}


//mail send

public function sendMailManage(){

echo "kkkk";die;

}
 public function savedownloadFunction()

  { 

$data = [];

	

$id=$_GET['id'];



 $url="assets/quotation Order'".$id."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('view-quotation', $data, true);



        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;



        //load mPDF library

		$this->load->library('m_pdf');



       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);



        //download it.

		$this->m_pdf->pdf->Output($pdfFilePath, "f");	

		

 $ci = get_instance();

 $ci->load->library('email');

 $this->email->from("info@techvys.com",'Quotation Order');

 $this->email->to("collestbablu@gmail.com");

 $this->email->subject('Quotation Order');

 $this->email->message("Quotation Order");

 $ci->email->attach($url);

 $result=$this->email->send();   

 redirect('Quotation/manageQuotation');	 

  }


public function send_approval()
{
$id=$_GET['id'];

$selectQuery=$this->db->query("select *from tbl_approve_status where order_id='$id' and type='Quotation' ");
$selctcnt=$selectQuery->num_rows();
if($selctcnt>0)
{

$this->db->query("update tbl_approve_status set mail_sent_status='Sent',dismiss_status='show' where order_id='$id' and type='Quotation'");

$this->db->query("update tbl_quotation_hdr set send_status='Sent' where quotation_id_hdr='$id'");
redirect('Quotation/manageQuotation');	
}
else
{

$this->db->query("insert into tbl_approve_status set type='Quotation',order_id='$id'");
$this->db->query("update tbl_quotation_hdr set send_status='Sent' where quotation_id_hdr='$id'");
redirect('Quotation/manageQuotation');	
}

}
}