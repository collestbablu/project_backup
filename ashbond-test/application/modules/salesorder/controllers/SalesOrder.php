<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class SalesOrder extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function salesOrderNew(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-sales-order');
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

public function addpurprice(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-price');
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

public function getsofunction(){

	if($this->session->userdata('is_logged_in')){
	 $data['id'] = $_GET['con'];
		$this->load->view('getservice',$data);
	}
	else
	{
	redirect('index');
	}
}


public function insertSalesOrder(){
		
		extract($_POST);
		$table_name ='tbl_sales_order_hdr';
		$table_name_dtl ='tbl_sales_order_dtl';
		$pri_col ='salesid';
		$pri_col_dtl ='sales_dtl_id';
		$table_name_comm ='tbl_communication';
		$pri_col_comm ='communication_id';
		 $id= $this->input->post('invoiceid');
		 $grand= $this->input->post('nett');
		$ref=$this->input->post('refno');
		$com= $this->input->post('communication_name');
		$refno=$ref.$com;	
		if($id!='')
		{
			$ref1=$this->db->query("select * from tbl_sales_order_dtl where salesid='$id'");


 		foreach($ref1->result() as $ref){
   $this->db->query("update tbl_product_stock set quantity=quantity+'$ref->quantity' where Product_id='$ref->product_id'");
   $this->db->query("update tbl_product_serial set quantity=quantity+'$ref->quantity' where product_id='$ref->product_id'");
  
  		}
			$this->db->query("delete from tbl_sales_order_dtl where salesid='$id'");
 
	$this->db->query("update tbl_communication set date='".$this->input->post('date')."',remark_name='".$this->input->post('remark_name')."',subject='".$this->input->post('subject')."' where communication_type='SaleOrder' and updateid='$id'");
	
			$this->db->query("update tbl_sales_order_hdr set vendor_id='".$this->input->post('contact_id')."',delivery_date='".$this->input->post('date')."',agent_id='".$this->input->post('agent_name')."',remark='".$this->input->post('remark_name')."',office_remark_name='$office_remark_name',subject ='".$this->input->post('subject')."',refno='".$this->input->post('refno')."',sub_total='".$this->input->post('sub_total')."',service_charge_percentage ='".$this->input->post('service_chargeper')."',
					service_charge='".$this->input->post('service_charge')."',gross_discount_percentage='".$this->input->post('installation_chargeper')."',
					gross_discount='".$this->input->post('installation_charge')."',cgst_per_total='".$this->input->post('cgst_per_total')."',cgst_per_total_two='".$this->input->post('cgst_per_total_two')."',sgst_per_total='".$this->input->post('sgst_per_total')."',sgst_per_total_two='".$this->input->post('sgst_per_total_two')."',igst_per_total='".$this->input->post('igst_per_total')."',igst_per_total_two='".$this->input->post('igst_per_total_two')."',gst_total_two='".$this->input->post('gst_total_two')."',discount_amount_total='".$this->input->post('discount_amount_total')."',grand_total='".$this->input->post('nett')."',contant='$contant_name' where salesid='$id'");	
		
			$this->load->model('Model_admin_login');
			
			for($i=0; $i<=$rows; $i++)
				{
				 				
			    $qunt=$this->input->post('qn')[$i];
			   $piddd=$this->input->post('prdh')[$i];
				$expid=explode('^', $piddd);
				 $expids = $expid[1];
				if($qunt!=''){

				 $data_dtl['salesid']= $id;
				 $data_dtl['product_id']=$expids;				 
				 $data_dtl['vendor_id']=$this->input->post('contact_id_copy');
				 $data_dtl['list_price']=$this->input->post('pr')[$i];
				 $data_dtl['quantity']=$qunt;
				 $data_dtl['igst']=$this->input->post('igst')[$i];
				 $data_dtl['sgst']=$this->input->post('sgst')[$i];
				 $data_dtl['cgst']=$this->input->post('cgst')[$i];
				 $data_dtl['gstTotal']=$this->input->post('gstTotal')[$i];
				  $data_dtl['per_discount']=$this->input->post('discount')[$i];
				 $data_dtl['discountamount']=$this->input->post('discountamount')[$i];
				 $data_dtl['remark']=$this->input->post('rem')[$i];
				 $data_dtl['unit']=$this->input->post('unt')[$i];
				 $data_dtl['total']=$this->input->post('tp')[$i];
				 $data_dtl['net_price']=$this->input->post('np')[$i];
				 $data_dtl['sub_total']=$this->input->post('sub_total');
				 $data_dtl['service_charge_percentage']=$this->input->post('service_chargeper');
				 $data_dtl['service_charge']=$this->input->post('service_charge');
				 $data_dtl['gross_discount_percentage']=$this->input->post('installation_chargeper');
				 $data_dtl['gross_discount']=$this->input->post('installation_charge');
				 $data_dtl['cgst_per_total']=$this->input->post('cgst_per_total');
				 $data_dtl['cgst_per_total_two']=$this->input->post('cgst_per_total_two');
				 $data_dtl['sgst_per_total']=$this->input->post('sgst_per_total');
				 $data_dtl['sgst_per_total_two']=$this->input->post('sgst_per_total_two');
				 $data_dtl['igst_per_total']=$this->input->post('igst_per_total');	
				 $data_dtl['igst_per_total_two']=$this->input->post('igst_per_total_two');
				 $data_dtl['gst_total_two']=$this->input->post('gst_total_two');
				 $data_dtl['discount_amount_total']=$this->input->post('discount_amount_total');
				 $data_dtl['grand_total']=$this->input->post('nett');				
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				  $data_dtl['maker_date']=$this->input->post('delivery_date_copy');
				 $data_dtl['author_date'] = date('y-m-d');
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
						
							}
					}
				
				$grandtotal=$grand;
			$this->paymentAmount($grandtotal,$contact_id_copy,$lastHdrId,$id);		
					
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";	
		//$this->db->query("update  tbl_invoice_payment set receive_billing_mount='$grand',contact_id='".$this->input->post('contact_id_copy')."' where invoiceid='$id' ");
			
			
		}
		else
		{
			$grandtotal=$this->input->post('nett');
			
		$sess = array(
					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => $this->input->post('delivery_date_copy'),
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
					'delivery_date' => $this->input->post('date'),
					'remark' => $this->input->post('remark_name'),
					'office_remark_name' => $this->input->post('office_remark_name'),
					
					'subject' => $this->input->post('subject'),
					'contant' => $this->input->post('contant_name'),
					'contact_person_id' => $this->input->post('person_name'),
					'totalcaseid' =>  $this->input->post('totalcaseid'),	
					'termandcondition' => $this->input->post('termandcondition'),
					'template' => $this->input->post('template'),
					'sub_total' => $this->input->post('sub_total'),
					'service_charge' => $this->input->post('service_charge'),
					'service_charge_percentage' => $this->input->post('service_chargeper'),					
					'gross_discount' => $this->input->post('installation_charge'),
					'gross_discount_percentage' => $this->input->post('installation_chargeper'),
					'cgst_per_total' => $this->input->post('cgst_per_total'),
					'cgst_per_total_two' => $this->input->post('cgst_per_total_two'),
					'sgst_per_total' => $this->input->post('sgst_per_total'),
					'sgst_per_total_two' => $this->input->post('sgst_per_total_two'),
					'igst_per_total' => $this->input->post('igst_per_total'),
					'igst_per_total_two' => $this->input->post('igst_per_total_two'),
					'gst_total_two' => $this->input->post('gst_total_two'),
					'discount_amount_total' => $this->input->post('discount_amount_total'),					
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
				$proid=$this->input->post('prdids')[$i];
				$untD=$this->input->post('unt')[$i];
				$selectQ=$this->db->query("select * from tbl_product_stock where Product_id='$proid'");
				$fetchQ=$selectQ->row();
				
			    $pid=$fetchQ->Product_id;
				
				if($qunt!=''){

				 $data_dtl['salesid']= $lastHdrId;
				 $data_dtl['product_id']=$this->input->post('prdids')[$i];				 
				 $data_dtl['vendor_id']=$this->input->post('contact_id');
				 $data_dtl['list_price']=$this->input->post('pr')[$i];
				 $data_dtl['quantity']=$qunt;
				  $data_dtl['igst']=$this->input->post('igst')[$i];
				 $data_dtl['sgst']=$this->input->post('sgst')[$i];
				 $data_dtl['cgst']=$this->input->post('cgst')[$i];
				 $data_dtl['gstTotal']=$this->input->post('gstTotal')[$i];
				  $data_dtl['per_discount']=$this->input->post('discount')[$i];
				 $data_dtl['discountamount']=$this->input->post('discountamount')[$i];
				  $data_dtl['description']=$this->input->post('desid')[$i];	
				  $data_dtl['remark']=$this->input->post('rem')[$i];
				 $data_dtl['unit']=$this->input->post('unt')[$i];
				 $data_dtl['total']=$this->input->post('tp')[$i];
				 $data_dtl['net_price']=$this->input->post('np')[$i];
				 $data_dtl['sub_total']=$this->input->post('sub_total');
				 $data_dtl['service_charge_percentage']=$this->input->post('service_chargeper');
				 $data_dtl['service_charge']=$this->input->post('service_charge');
				 $data_dtl['gross_discount_percentage']=$this->input->post('installation_chargeper');
				 $data_dtl['gross_discount']=$this->input->post('installation_charge');				 
				 $data_dtl['cgst_per_total']=$this->input->post('cgst_per_total');
				 $data_dtl['cgst_per_total_two']=$this->input->post('cgst_per_total_two');
				 $data_dtl['sgst_per_total']=$this->input->post('sgst_per_total');
				 $data_dtl['sgst_per_total_two']=$this->input->post('sgst_per_total_two');
				 $data_dtl['igst_per_total']=$this->input->post('igst_per_total');	
				 $data_dtl['igst_per_total_two']=$this->input->post('igst_per_total_two');
				 $data_dtl['gst_total_two']=$this->input->post('gst_total_two');
				 $data_dtl['discount_amount_total']=$this->input->post('discount_amount_total');				 			 
				 $data_dtl['grand_total']=$this->input->post('nett');				
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				  $data_dtl['maker_date']=$this->input->post('delivery_date_copy');
				 $data_dtl['author_date'] = date('y-m-d');
				
		$serialQ=$this->db->query("select * from tbl_product_serial where product_id='$pid'");
		$num=$serialQ->num_rows();
		
		if($num>0){
			
			
				$this->db->query("update tbl_product_serial set quantity=quantity-'$qunt' where product_id='$pid'");
				$this->db->query("update tbl_product_stock set quantity=quantity-'$qunt' where product_id='$pid'");
			
		}else{
			
				$this->db->query("insert into tbl_product_serial set quantity='-$qunt',product_id='$pid'");
				$this->db->query("update tbl_product_stock set quantity=quantity-'$qunt' where product_id='$pid'");	
		}
		
		$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
		$this->paymentAmount($grandtotal,$contact_id_copy,$lastHdrId,$id);
//$this->db->query("insert into tbl_invoice_payment set receive_billing_mount='$grandtotal',contact_id='".$this->input->post('contact_id_copy')."'");		
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
					'communication_type' => 'SaleOrder'
						
					
		      	);
		
		$dataall = array_merge($datacomm,$sess);
		$this->load->model('Model_admin_login');
	
	   	$this->Model_admin_login->insert_user($table_name_comm,$dataall);	
					
	    $rediectInvoice="salesorder/SalesOrder/manageSalesOrder";
		redirect($rediectInvoice);
					
	
	}
}	

public function paymentAmount($grandtotal,$contact_id_copy,$lastHdrId,$id){
	
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
	
					'contact_id' => $this->input->post('contact_id_copy'),
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

public function getproduct_fun(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('getproduct');
	}
	else
	{
	redirect('/SalesOrder/index');
	}
}
	
public function all_product_function(){
	
		$this->load->view('all-product',$data);
	
	}
	
public function manageSalesOrder(){
	
	if($this->session->userdata('is_logged_in')){
	$this->load->view('manage-sales-order');
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
		redirect('/index.php/SalesOrder/managePurchaseOrder');
}
public function price_history(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('price_histroy/pricehistory');
	}
	else
	{
	redirect('index');
	}

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
		$this->email->subject('Invoice Order');
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

	

$id=$_GET['id'];



 $url="assets/sales_order_pdf/invoice_order'".$id."'.pdf";

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
			 'id' => $_GET['id']
			 );
		$this->load->library('email', $config);
		$this->email->from('info@techvyaserp.in');
		$this->email->to('collestbablu@gmail.com');
		 $this->email->cc('collestbablu@gmail.com');
		$this->email->subject('Invoice Order');
		$this->email->message($template);
		 $this->email->attach($url);
		if ($this->email->send()) {
			redirect('authorization/manage_authorization');
		} else {
	redirect('authorization/manage_authorization');
		}


  }



public function send_approval()
{
$id=$_GET['id'];

$selectQuery=$this->db->query("select *from tbl_approve_status where order_id='$id' and type='Invoice' ");
$selctcnt=$selectQuery->num_rows();
if($selctcnt>0)
{
$this->db->query("update tbl_sales_order_hdr set send_status='Sent' where salesid='$id'");
redirect('salesorder/SalesOrder/manageSalesOrder');	
}
else
{

$this->db->query("insert into tbl_approve_status set type='Invoice',order_id='$id'");
$this->db->query("update tbl_sales_order_hdr set send_status='Sent' where salesid='$id'");
redirect('salesorder/SalesOrder/manageSalesOrder');	
}

}		
}