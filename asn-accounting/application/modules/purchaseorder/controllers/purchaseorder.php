<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class purchaseorder extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_purchaseorder');
}     

public function add_purchase_order(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-purchase-order');
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

public function print_new_invoice(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-new-invoice');
	}
	else
	{
	redirect('index');
	}		
}

public function purchase_order_details(){
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
		$this->load->view('purchase-order-details',$data);
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


public function edit_purchase_order(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-purchase-order');
	}
	else
	{
	redirect('index');
	}		
}

	
public function manage_purchase_order(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$data['result'] = $this->model_purchaseorder->purchaseorder_data();
	$this->load->view('manage-purchase-order',$data);
	}
	else
	{
	redirect('index');
	}	
}

public function purchase_order_list()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('status','A')
           -> get('tbl_purchase_order_hdr');
		   
		$i='0';
		
		foreach($res->result() as $row)
		{
	
		  $compQuery = $this -> db
           -> select('*')
           -> where('contact_id',$row->vendor_id)
           -> get('tbl_contact_m');
		  $compRow = $compQuery->row();
		
			$info[$i]['1']=$row->purchaseorderid;
			$info[$i]['2']=$row->invoice_date;
			$info[$i]['3']=$compRow->first_name;
			$info[$i]['4']=$row->grand_total;
			$info[$i]['5']=$row->due_date;			
			$info[$i]['16']=$compRow->contact_id;	
				$i++;
			
		}
		return $info;
	
	}


public function insertPurchaseOrder(){
		
		extract($_POST);
		$table_name ='tbl_purchase_order_hdr';
		$table_name_dtl ='tbl_purchase_order_dtl';
		$pri_col ='purchaseorderid';
		$pri_col_dtl ='purchaseorderdtlid';
		
		
		
		if($_FILES['image_name']['name']!='')
	{
		$target = "assets/image_data/"; 
		$target1 =$target . @date(U)."_".( $_FILES['image_name']['name']);
		$image_name=@date(U)."_".( $_FILES['image_name']['name']);
		move_uploaded_file($_FILES['image_name']['tmp_name'], $target1);
	}	

		
		
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
	
					'vendor_id' => $this->input->post('vendor_id'),
					'invoice_date' => $this->input->post('date'),
					'sub_total' => $this->input->post('sub_total'),
					'service_charge_per' => $this->input->post('service_charge_per'),	
					'service_charge_total' => $this->input->post('service_charge_total'),
					'gross_discount_per' => $this->input->post('gross_discount_per'),
					'gross_discount_total' => $this->input->post('gross_discount_total'),
					'grand_total' => $this->input->post('grand_total'),
					'due_date' => $this->input->post('due_date'),
					'status' => 'Draft',
					'image' => $image_name,
					'invoice_type' => $invoice_type
					
					
					);
			
			$data_merge = array_merge($data,$sess);					
		    $this->load->model('Model_admin_login');	
		    $this->Model_admin_login->insert_user($table_name,$data_merge);
			$lastHdrId=$this->db->insert_id();		
			$this->load->model('Model_admin_login');
		
		for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($qty[$i]!=''){

				 $data_dtl['purchaseorderhdr']= $lastHdrId;
				 $data_dtl['product_id']=$this->input->post('main_id')[$i];				 
				 $data_dtl['list_price']=$this->input->post('list_price')[$i];
				 $data_dtl['quantity']=$this->input->post('qty')[$i];
				 $data_dtl['discount']=$this->input->post('discount')[$i];
				 $data_dtl['discount_amount']=$this->input->post('disAmount')[$i];
				 $data_dtl['total']=$this->input->post('tot')[$i];
				 
				 $data_dtl['net_price']=$this->input->post('nettot')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				
				
				
				$this->stock_refill_qty($qty[$i],$main_id[$i]);
				
				
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
							}
					}
				//$this->paymentAmount($grand_total,$vendor_id,$lastHdrId,$id);	
			$this->paymentAmount($grand_total,$vendor_id,$lastHdrId,$id);	
			$this->updateTermAndCondition($lastHdrId,$vendor_id,$grand_total,$date);
				$this->software_log_insert($lastHdrId,$vendor_id,$grand_total,'Purchase Order added');
				
		/*$cont=" 	
<p>&nbsp;</p>
<div style='font-family: 'Times New Roman'; font-size: medium; background: #fbfbfb;'>
<div style='padding: 25.6094px; text-align: center; background: #4190f2;'>
<div style='color: #ffffff; font-size: 20px;'>Invoice # $lastHdrId</div>
</div>
<div style='max-width: 560px; margin: auto; padding: 0px 25.6094px;'>
<div style='padding: 30px 0px; color: #555555; line-height: 1.7;'>Dear $getContact->safi,&nbsp;<br /><br />Your invoice $lastHdrId is attached.

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
			
				
				
						
$data = array(
'id' => $lastHdrId
);

	





 $url="assets/sales_order_pdf/invoice_order'".$lastHdrId."'.pdf";

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
		$this->email->to("gauravtaneja1801@gmail.com");
		 $this->email->cc('collestbablu@gmail.com');
		$this->email->subject("Invoice");
		$this->email->message($cont);
		 $this->email->attach($url);
		if ($this->email->send()) {
			 $rediectInvoice="salesorder/SalesOrder/manageSalesOrder";
		redirect($rediectInvoice);
		} else {
	 $rediectInvoice="salesorder/SalesOrder/manageSalesOrder";
		redirect($rediectInvoice);
		}
*/
				
			 $rediectInvoice="purchaseorder/purchaseorder/manage_purchase_order";
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
	
	public function updatePurchaseOrder(){
		
		extract($_POST);
		$table_name ='tbl_purchase_order_hdr';
		$table_name_dtl ='tbl_purchase_order_dtl';
		$pri_col ='purchaseorderid';
		$pri_col_dtl ='purchaseorderdtlid';
		$img=$this->input->post('image_name');
	
		
		if($_FILES['image_name']['name']!='')
	{
		$target = "assets/image_data/"; 
		$target1 =$target . @date(U)."_".( $_FILES['image_name']['name']);
		$image_name=@date(U)."_".( $_FILES['image_name']['name']);
		move_uploaded_file($_FILES['image_name']['tmp_name'], $target1);
	}else{
		$old_img=$this->db->query("select * from tbl_purchase_order_hdr where purchaseorderid='$id'");
		$fetchq=$old_img->row();
		 $image_name=$fetchq->image;
	}
		
 $this->refil_qnty_del($id);

		 $this->db->query("delete from tbl_purchase_order_dtl where purchaseorderhdr='$id'");	
				
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
	
					'vendor_id' => $this->input->post('vendor_id'),
					'invoice_date' => $this->input->post('date'),
					'sub_total' => $this->input->post('sub_total'),
					'service_charge_per' => $this->input->post('service_charge_per'),	
					'service_charge_total' => $this->input->post('service_charge_total'),
					'gross_discount_per' => $this->input->post('gross_discount_per'),
					'gross_discount_total' => $this->input->post('gross_discount_total'),
					'grand_total' => $this->input->post('grand_total'),
					'image' => $image_name,
					'invoice_type' => $invoice_type
					
					
					);
			
			$data_merge = array_merge($data,$sess);					
		   
			$this->load->model('Model_admin_login');	
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);

		
		for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($qty[$i]!=''){

				 $data_dtl['purchaseorderhdr']= $id;
				 $data_dtl['product_id']=$this->input->post('main_id')[$i];				 
				 $data_dtl['list_price']=$this->input->post('list_price')[$i];
				 $data_dtl['quantity']=$this->input->post('qty')[$i];
				 $data_dtl['discount']=$this->input->post('discount')[$i];
				 $data_dtl['discount_amount']=$this->input->post('disAmount')[$i];
				 $data_dtl['total']=$this->input->post('tot')[$i];
				
				 $data_dtl['net_price']=$this->input->post('nettot')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
				$this->updata_stock($qty[$i],$main_id[$i]);
				
			
							}
					}
					$this->paymentAmount($grand_total,$vendor_id,$lastHdrId,$id);
					$this->software_log_insert($id,$vendor_id,$grand_total,'Purchase Order Updated');
	   echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					
	
	}
	function refil_qnty_del($id){
	
		 $data= $this->db->query("select * from tbl_purchase_order_dtl where purchaseorderhdr='$id'");
		foreach($data->result() as $update){
		$this->db->query("update tbl_product_stock set quantity=quantity-'".$update->quantity."' where   Product_id='".$update->product_id."'");
		  
		
		
		}
return;	
	}
	
	
	
	
	public function stock_refill_qty($qty,$main_id)
	{
	
	
				$this->db->query("update tbl_product_stock set quantity=quantity+'$qty' where product_id='$main_id'");
	
				
	
	}	
	
	
		
	function updata_stock($qty,$main_id){
	
		 $this->db->query("update tbl_product_stock set quantity=quantity+'$qty' where Product_id='$main_id'");
		
		return;	
	}	
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
	
		 $this->db->query("update tbl_product_stock set quantity=quantity-'$qty' where Product_id='$main_id'");
		 $this->db->query("update tbl_product_serial set quantity=quantity-'$qty' where product_id='$main_id'");
		return;	
	}	
		
}