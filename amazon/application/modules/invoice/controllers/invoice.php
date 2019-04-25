<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class invoice extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_invoice');
}     

public function add_invoice(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-invoice');
	}
	else
	{
	redirect('index');
	}		
}



public function case_memo(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('case-memo');
	}
	else
	{
	redirect('index');
	}		
}


public function print_sales(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('email');
	}
	else
	{
	redirect('index');
	}		
}

public function print_invoice(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-invoice');
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


public function insert_invoice(){
		extract($_POST);
		$table_name ='tbl_sales_order_hdr';
		$pri_col ='salesid';
		 $id=$this->input->post('id');
		
		$data = array(
	
					'from' => $this->input->post('from'),
					'send_to' => $this->input->post('send_to'),
					'cc' => $this->input->post('cc'),
					'subject' => $this->input->post('subject'),	
					'content' => $this->input->post('content'),					
					);
					
			$this->load->model('Model_admin_login');	
		    $this->Model_admin_login->update_user($pri_col,$table_name,$id,$data);
			
			$querySalesQuery=$this->db->query("select *from tbl_sales_order_hdr where salesid='$id'");
			
		$getSales=$querySalesQuery->row();
			$cont=$getSales->content;
			
			
			
		
$data = array(
'id' => $id
);

	
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
		$this->email->to($send_to);
		 $this->email->cc('collestbablu@gmail.com');
		$this->email->subject($subject);
		$this->email->message($cont);
		 $this->email->attach($url);
		if ($this->email->send()) {
			
			  echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";

			//redirect("salesorder/SalesOrder/manageSalesOrder");
		} else {
	//redirect("salesorder/SalesOrder/manageSalesOrder");
		
		  echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";

		}

		
}




public function testdrop(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('test');
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

public function edit_invoice_order_1(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-invoice-order-1');
	}
	else
	{
	redirect('index');
	}		
}
	
public function manage_invoice()
{
	
	if($this->session->userdata('is_logged_in')){
	//$data=$this->user_function();// call permission fnctn
	//$data['result'] = $this->model_invoice->invoice_data();
	$data = $this->Manage_Invoice_Data();
	$this->load->view('manage-invoice',$data);
	}
	else
	{
	redirect('index');
	}	
}

public function Manage_Invoice_Data()
{


  	  $data['result'] = "";
 	  ////Pagination start ///
      $table_name  = 'tbl_invoice_hdr';
	  $url        = site_url('/invoice/manage_invoice?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_invoice->count_invoice($table_name,'A',$this->input->get());
      //$showEntries= $_GET['entries']?$_GET['entries']:'12';
      if($_GET['entries']!="")
	  {
         $showEntries = $_GET['entries'];
         $url     = site_url('/invoice/manage_invoice?entries='.$_GET['entries']);
      }
      $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
      //////Pagination end ///
   
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     //$data['result']            = $this->model_template->contact_get($pagination['per_page'],$pagination['page']);	
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_invoice->filterInvoice($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_invoice->getInvoice($pagination['per_page'],$pagination['page']);
			
     return $data;


}

/*public function sales_order_list()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('status','A')
           -> get('tbl_sales_order_hdr');
		   
		$i='0';
		
		foreach($res->result() as $row)
		{
	
		  $compQuery = $this -> db
           -> select('*')
           -> where('contact_id',$row->vendor_id)
           -> get('tbl_contact_m');
		  $compRow = $compQuery->row();
		
			$info[$i]['1']=$row->salesid;
			$info[$i]['2']=$row->invoice_date;
			$info[$i]['3']=$compRow->first_name;
			$info[$i]['4']=$row->grand_total;
			$info[$i]['5']=$row->due_date;			
			$info[$i]['16']=$compRow->contact_id;	
				$i++;
			
		}
		return $info;
	
	}*/


public function insertInvoice(){
		
		extract($_POST);
		$table_name ='tbl_invoice_hdr';
		$table_name_dtl ='tbl_invoice_dtl';
		$pri_col ='invoiceid';
		$pri_col_dtl ='invoice_dtl_id';
		
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
	
					'sales_id' => $this->input->post('iddd'),
					'proforma_hdr_id' => $this->input->post('proforma_hdr_id'),
					'vendor_id' => $this->input->post('vendor_id'),
					'invoice_status' => $this->input->post('invoice_type'),
					'invoice_date' => $this->input->post('date'),
					'due_date' => $this->input->post('due_date'),
					'sub_total' => $this->input->post('sub_total'),
					'total_cgst' => $this->input->post('total_cgst'),	
					'total_tax_cgst_amt' => $this->input->post('total_tax_cgst_amt'),
					'total_sgst' => $this->input->post('total_sgst'),
					'total_tax_sgst_amt' => $this->input->post('total_tax_sgst_amt'),
					'total_igst' => $this->input->post('total_igst'),
					'total_tax_igst_amt' => $this->input->post('total_tax_igst_amt'),
					'total_gst_tax_amt' => $this->input->post('total_gst_tax_amt'),
					'total_dis' => $this->input->post('total_dis'),
					'total_dis_amt' => $this->input->post('total_dis_amt'),
					'grand_total' => $this->input->post('grand_total'),
					'Transportation' => $this->input->post('Transportation'),
					'Vehicle_Number' => $this->input->post('Vehicle_Number'),
					'Date_of_Supply' => $this->input->post('Date_of_Supply'),
					'Place_of_Supply' => $this->input->post('Place_of_Supply'),
					'store_no' => $this->input->post('storeno'),
					'po_no' => $this->input->post('pono'),
					'po_date' => $this->input->post('podate'),
					'eway_bill_no' => $this->input->post('ewaybillno'),
					'eway_bill_date' => $this->input->post('ewaybilldate'),
					'schedule' => $this->input->post('schedule'),
					'weight' => $this->input->post('weight'),
					'no_of_begs' => $this->input->post('no_of_begs'),
					'dispatch_document_no' => $this->input->post('dispatch_document_no'),
					'dispatch_document_date' => $this->input->post('dispatch_document_date'),
					'remarks' => $this->input->post('remarks'),
					'gr_no' => $this->input->post('gr_no'),
					'status' => 'Draft',
					'state_id' => $state_id,
					'invoice_no' => $invoice_no
					
					);
			
			$data_merge = array_merge($data,$sess);					
			$this->db->query("update tbl_proforma_invoice_hdr set invoice_coverted_status='Converted' where invoiceid='$id'");
		    $this->load->model('Model_admin_login');	
		    $this->Model_admin_login->insert_user($table_name,$data_merge);
			$lastHdrId=$this->db->insert_id();	
			$this->load->model('Model_admin_login');
		
		for($i=0; $i<$rows; $i++)
				{
				 				
			    
				
				
				if($qty[$i]!=''){

				 $data_dtl=array(
				 'invoiceid' => $lastHdrId,
				 'productid' => $main_id[$i],				 
				 'list_price' => $list_price[$i],
				 'qty' => $qty[$i],
				 'discount' => $discount[$i],
				 'discount_amount' => $disAmount[$i],
				 'cgst' => $cgst[$i],
				 'sgst' =>$sgst[$i],
				 'igst' => $igst[$i],
				 'gstTotal' => $gstTotal[$i],
				 'total_price' => $tot[$i],
				 'net_price' => $nettot[$i],
				 'maker_id' => $user_id,
				 'maker_date' => date('y-m-d'),
				 'comp_id' => $this->session->userdata('comp_id'),
				 'zone_id' => $this->session->userdata('zone_id'),
				 'brnh_id' => $this->session->userdata('brnh_id')
				);
					
				
				$this->stock_refill_qty($qty[$i],$main_id[$i],$sizeval[$i]);
				
				
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
							}
					}
				//$this->paymentAmount($grand_total,$vendor_id,$lastHdrId,$id);	
			$this->paymentAmountInsert($grand_total,$vendor_id,$lastHdrId,$id);	
			$this->updateTermAndCondition($lastHdrId,$vendor_id,$grand_total,$date);
				$this->software_log_insert($lastHdrId,$vendor_id,$grand_total,'Invoice added');
	
				
	 $rediectInvoice="invoice/invoice/manage_invoice";
	redirect($rediectInvoice);	
	   
					
	
	}

	public function updateTermAndCondition($lastHdrId,$vendor_id,$grand_total,$date)
	{
	$contactQuey=$this->db->query("select *from tbl_contact_m where contact_id='$vendor_id'");
	$getContact=$contactQuey->row();
	
	
	$termandcondition=" 	
<p>&nbsp;</p>
<div style='font-family: 'Times New Roman'; font-size: medium; background: #fbfbfb;'>
<div style='padding: 25.6094px; text-align: center; background: #4190f2;'>
<div style='color: #ffffff; font-size: 20px;'>Invoice # $lastHdrId</div>
</div>
<div style='max-width: 560px; margin: auto; padding: 0px 25.6094px;'>
<div style='padding: 30px 0px; color: #555555; line-height: 1.7;'>Dear $getContact->first_name,&nbsp;<br /><br />Your invoice $lastHdrId is attached.

Thank you for your business.&nbsp;</div>
<br />
<div style='padding: 16.7969px 0px; line-height: 1.6;'>Thanks & Regards
<div style='color: #8c8c8c;'>Gaurav Taneja</div>
<div style='color: #b1b1b1;'>Tech Vyas Solutions Pvt Ltd.</div>
<div style='color: #b1b1b1;'>9990455812</div>
</div>
</div>
</div>
<p>&nbsp;</p>";		
$this->db->query("update tbl_sales_order_hdr set termandcondition='".addslashes($termandcondition)."' where salesid='$lastHdrId'");

	}
	
	public function updateInvoice(){
		
		extract($_POST);
		$table_name ='tbl_invoice_hdr';
		$table_name_dtl ='tbl_invoice_dtl';
		$pri_col ='invoiceid';
		$pri_col_dtl ='invoice_dtl_id';
		
		
 $this->refil_qnty_del($id);

		 $this->db->query("delete from tbl_invoice_dtl where invoiceid='$id'");	
				
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
					'invoiceid' => $this->input->post('id'),
					'vendor_id' => $this->input->post('vendor_id'),
					'invoice_status' => $this->input->post('invoice_type'),
					'invoice_date' => $this->input->post('date'),
					'due_date' => $this->input->post('due_date'),
					'sub_total' => $this->input->post('sub_total'),
					'total_cgst' => $this->input->post('total_cgst'),	
					'total_tax_cgst_amt' => $this->input->post('total_tax_cgst_amt'),
					'total_sgst' => $this->input->post('total_sgst'),
					'total_tax_sgst_amt' => $this->input->post('total_tax_sgst_amt'),
					'total_igst' => $this->input->post('total_igst'),
					'total_tax_igst_amt' => $this->input->post('total_tax_igst_amt'),
					'total_gst_tax_amt' => $this->input->post('total_gst_tax_amt'),
					'total_dis' => $this->input->post('total_dis'),
					'total_dis_amt' => $this->input->post('total_dis_amt'),
					'grand_total' => $this->input->post('grand_total'),
					'Transportation' => $this->input->post('Transportation'),
					'Vehicle_Number' => $this->input->post('Vehicle_Number'),
					'Date_of_Supply' => $this->input->post('Date_of_Supply'),
					'Place_of_Supply' => $this->input->post('Place_of_Supply'),
					'store_no' => $this->input->post('store_no'),
					'po_no' => $this->input->post('po_no'),
					'po_date' => $this->input->post('po_date'),
					'eway_bill_no' => $this->input->post('eway_bill_no'),
					'eway_bill_date' => $this->input->post('eway_bill_date'),
					'schedule' => $this->input->post('schedule'),
					'weight' => $this->input->post('weight'),
					'no_of_begs' => $this->input->post('no_of_begs'),
					'dispatch_document_no' => $this->input->post('dispatch_document_no'),
					'dispatch_document_date' => $this->input->post('dispatch_document_date'),
					'remarks' => $this->input->post('remarks'),
					'gr_no' => $this->input->post('gr_no'),
					'status' => 'Draft',
					'state_id' => $state_id,
					
					);
			
			$data_merge = array_merge($data,$sess);					
		   
			$this->load->model('Model_admin_login');	
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);

		
		for($i=0; $i<$rows; $i++)
				{
				 				
			    
				
				
				if($qty[$i]!=''){
					
				$data_dtl= array(	
				 'invoiceid' => $id,
				 'productid' => $main_id[$i],				 
				 'list_price' => $list_price[$i],
				 'qty' => $qty[$i],
				 'discount' => $discount[$i],
				 'discount_amount' => $disAmount[$i],
				 'cgst' => $cgst[$i],
				 'sgst' => $sgst[$i],
				 'igst' => $igst[$i],
				 'gstTotal' => $gstTotal[$i],
				 'total_price' => $tot[$i],
				 'net_price' => $nettot[$i],
				 'maker_id' => $this->session->userdata('user_id'),
				 'maker_date' => date('y-m-d'),
				 'comp_id' => $this->session->userdata('comp_id'),
				 'zone_id' => $this->session->userdata('zone_id'),
				 'brnh_id' =>$this->session->userdata('brnh_id')
				);
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
				$this->updata_stock($qty[$i],$main_id[$i]);
	
							}
					}
					$this->paymentAmount($grand_total,$vendor_id,$lastHdrId,$id);
					$this->software_log_insert($id,$vendor_id,$grand_total,'Invoice Updated');
	   echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					
	
	}
	
	function refil_qnty_del($id){
	
		 $data= $this->db->query("select * from tbl_invoice_dtl where invoiceid='$id'");
		foreach($data->result() as $update){
		$this->db->query("update tbl_product_stock set quantity=quantity+'".$update->qty."' where   Product_id='".$update->productid."'");
		  
		
		}
return;	
	}
	
	
	
	public function stock_refill_qty($qty,$main_id)
	{
	
	
				$this->db->query("update tbl_product_stock set quantity=quantity-'$qty' where Product_id='$main_id'");
	
				
	
	}
	
	
	function updata_stock($qty,$main_id){
	
		 $this->db->query("update tbl_product_stock set quantity=quantity-'$qty' where Product_id='$main_id'");
		
		return;	
	}	
//================================

public function paymentAmountInsert($grand_total,$vendor_id,$lastHdrId,$id){
	
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
					'status' => 'invoice'					
					
		);
	$this->load->model('Model_admin_login');
	
	$this->Model_admin_login->insert_user($table_name,$data_pay);
		
	return paymentAmountInsert; 
}

//===============================	

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
					'status' => 'invoice'					
					
		);
	$this->load->model('Model_admin_login');
	if($id!=''){

//		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_pay);

$datee=date('Y-m-d H:i:s');
$mkrdate=date('y-m-d');
$this->db->query("update tbl_invoice_payment set contact_id='".$vendor_id."',receive_billing_mount='".$grand_total."',invoiceid='". $lastHdrId."',date='$datee',maker_id='".$this->session->userdata('user_id')."',maker_date='$mkrdate',comp_id='".$this->session->userdata('comp_id')."',status='invoice' where status='invoice' and invoiceid='$id'");	
	
	}
	return paymentAmount; 
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

function delete_updata_stock($qty,$main_id){
	
		 $this->db->query("update tbl_product_stock set quantity=quantity+'$qty' where Product_id='$main_id'");
		 $this->db->query("update tbl_product_serial set quantity=quantity+'$qty' where product_id='$main_id'");
		return;	
	}	


public function getContact()
{
	
$conQuery=$this->db->query("select *from tbl_contact_m where state_id='".$_GET['state']."' and group_name='4'");	
echo "
select name='vendor_id'>

<option value=''>--Select--</option>
";
foreach($conQuery->result() as $getCon){
echo "
<option value=$getCon->contact_id>$getCon->first_name</option>
";
}
echo "
</select>
";



	
}


public function getInvoiceCode()
{
	if($_GET['state']=='07')
	{
	$delhiQuery=$this->db->query("select *from tbl_invoice_hdr where state_id='".$_GET['state']."' order by invoiceid desc limit 0,1");
	$getDelhi=$delhiQuery->row();
		echo "DL/000".$getCode=$getDelhi->invoice_no+"1"."/".date("Y",strtotime("-1 year"))."-".date("Y");
	}
	
	if($_GET['state']=='29')
	{
	$delhiQuery=$this->db->query("select *from tbl_invoice_hdr where state_id='".$_GET['state']."' order by invoiceid desc limit 0,1");
	$getDelhi=$delhiQuery->row();
		echo "KR/000".$getCode=$getDelhi->invoice_no+"1"."/".date("Y",strtotime("-1 year"))."-".date("Y");
	}
	
	
	if($_GET['state']=='06')
	{
	$delhiQuery=$this->db->query("select *from tbl_invoice_hdr where state_id='".$_GET['state']."' order by invoiceid desc limit 0,1");
	$getDelhi=$delhiQuery->row();
		echo "HR/000".$getCode=$getDelhi->invoice_no+"1"."/".date("Y",strtotime("-1 year"))."-".date("Y");
	}
	
	
	if($_GET['state']=='08')
	{
	$delhiQuery=$this->db->query("select *from tbl_invoice_hdr where state_id='".$_GET['state']."' order by invoiceid desc limit 0,1");
	$getDelhi=$delhiQuery->row();
		echo "RJ/000".$getCode=$getDelhi->invoice_no+"1"."/".date("Y",strtotime("-1 year"))."-".date("Y");
	}
	
	
	if($_GET['state']=='09')
	{
	$delhiQuery=$this->db->query("select *from tbl_invoice_hdr where state_id='".$_GET['state']."' order by invoiceid desc limit 0,1");
	$getDelhi=$delhiQuery->row();
		echo "UP/000".$getCode=$getDelhi->invoice_no+"1"."/".date("Y",strtotime("-1 year"))."-".date("Y");
	}
	
}

		
}