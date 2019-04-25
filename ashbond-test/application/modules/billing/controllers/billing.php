<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class billing extends my_controller {
function __construct(){
   parent::__construct(); 
}     

//---------------------------------------------------------------- start billing corpotateInvoice winter----------------------

		public function billing_corporateInvoice_winter(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-NewInvoice-winter');
	}
	else
	{
	redirect('/billing/index');
	}
	
	
}

public function add_contact_fun(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-contact');
	}
	else
	{
	redirect('/billing/index');
	}
	
	
}
public function get_cid(){
	$data=$this->user_function();// call permission function
	
		$this->load->view('get_cid',$data);
	
	}
public function getproduct_fun(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('getproduct');
	}
	else
	{
	redirect('/billing/index');
	}
	
	
}

public function sale2(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('sale2');
	}
	else
	{
	redirect('/billing/index');
	}
	
	
}






public function edit_sale2(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-sale2');
}
	else
	{
	redirect('/master/index');
	}
}




public function manage_corporateinvoice2(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('manage-corporateinvoice2');
	}
	else
	{
	redirect('/billing/index');
	}
	
	
}

function delete_manage_corporateinvoice2(){
	$table_name ='tbl_production_hdr';
	$table_name_log ='tbl_production_log';
	$table_name_dtl ='tbl_production_dtl';
	$pri_col ='invoiceid';
	$pri_col1 ='invoice_id';
	$pri_col_dtl ='invoice_id';
	$this->load->model('Model_admin_login');
		  $id= $_GET['id'];
		$id_dtl= $_GET['id'];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col1,$table_name_log,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id_dtl);
		redirect('/index.php/billing/manage_corporateinvoice2');
}

public function edit_corporateinvoice_winter(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-corporateinvoice-winter');
	}
	else
	{
	redirect('/billing/index');
	}
	
	
}

public function get_pro_typ_function(){
	
		$data['Productctg_id']=$_GET['Productctg_id'];
		$this->load->view('get_pro_typ',$data);
	
	}
	
public function all_product_function(){
	
		$this->load->view('all-product',$data);
	
	}

public function insert_corporateinvoice_Sale(){
		
		extract($_POST);
		
		 $id= $this->input->post('invoiceid');
		 $grand= $this->input->post('nett');
		
		if($id!='')
		{
		
		$ref1=$this->db->query("select * from tbl_invoice_dtl where invoiceid='$id'");


 		foreach($ref1->result() as $ref){
   $this->db->query("update tbl_product_stock set quantity=quantity+'$ref->qty' where Product_id='$ref->productid'");
   $this->db->query("update tbl_product_serial set quantity=quantity+'$ref->qty' where product_id='$ref->productid'");
  
  		}

		
		
		
			$this->db->query("delete from tbl_invoice_dtl where invoiceid='$id'");
 

			$this->db->query("update tbl_invoice_hdr set grand_total='$grand' ,installation_charge_per ='$installation_chargeper',
					installation_charge= '$installation_charge',service_tax_per='$service_chargeper',service_tax='$service_charge', balance_total='$sub_total',contactid = '$contact_id_copy',invoice_date='$delivery_date_copy', tax_retail='$tax_retail' where invoiceid='$id'");	

		$table_name_dtl ='tbl_invoice_dtl';
		$pri_col ='invoiceid';
		$pri_col_dtl ='invoice_dtl_id';
	 	
		//$id_dtl= $this->input->post('invoiceid');
		$this->load->model('Model_admin_login');
		for($i=0; $i<=$rows; $i++)
				{
				//echo $rows;die;
				$pname="prdh";
				$pname.=$i;
				$pname=$_REQUEST[$pname];
				$pname1=explode("^",$pname);
				 $pname2=$pname1[1];
				 
				
				$qunt="qn";
				$qunt.=$i;
				$qunt=$_REQUEST[$qunt];
			    //echo $qunt;die;
				$invoiceID=$_REQUEST['invoiceID'];
				
				$pprice="pr";
				$pprice.=$i;
				$pprice=$_REQUEST[$pprice];
				
				$disP="dispr";
				$disP.=$i;
				$disP=$_REQUEST[$disP];
				
				$disA="disa";
				$disA.=$i;
				$disA=$_REQUEST[$disA];
				
				$total="tt";
				$total.=$i;
				$total=$_REQUEST[$total];
				

				$tax="tx";
				$tax.=$i;
				$tax=$_REQUEST[$tax];

				$net="np";
				$net.=$i;
				$net=$_REQUEST[$net];

				$dis="tds";
				$dis.=$i;
				$dis=$_REQUEST[$dis];
				
				$dvatAb="dvatA";
				$dvatAb.=$i;
				$dvatAb=$_REQUEST[$dvatAb];
	
					
								
				$selectQ=$this->db->query("select *from tbl_product_stock where Product_id='$pname2'");
				$fetchQ=$selectQ->row();
				
			    $pid=$fetchQ->Product_id;
				
				if($qunt!=''){

				 $data_dtl['invoiceid']= $id;
				 $data_dtl['productid']=$pid;
				 $data_dtl['qty']= $qunt;
				 $data_dtl['list_price']=$pprice;
				 $data_dtl['discount_percent_on_item']=$disP;
				 $data_dtl['discount_item_amt']=$disA;
				 $data_dtl['total_price']=$total;
				 $data_dtl['total_tax']=$tax;
				 $data_dtl['net_price_after_discount']=$net;
				 $data_dtl['direct_discount_amt']=$dis;
				 $data_dtl['net_price']=$nett;
				 //$data_dtl['main_catg_id']=$mcat;
				 $data_dtl['vat_on_item']=$dvatAb;
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 //$data_dtl['divn_id']=;
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				$this->db->query("update tbl_product_stock set quantity=quantity-'$qunt' where Product_id='$pid'");
				$this->db->query("update tbl_product_serial set quantity=quantity-'$qunt' where product_id='$pid'");
				
				
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";	

				
				
							}
					}
					$this->db->query("update  tbl_invoice_payment set receive_billing_mount='$nett',contact_id='".$this->input->post('contact_id_copy')."' where invoiceid='$id' ");	
						
		}
		else
		{
		$table_name ='tbl_invoice_hdr';
		$table_name_dtl ='tbl_invoice_dtl';
		$pri_col ='invoiceid';
		$pri_col_dtl ='invoice_dtl_id';
		
		
		
		
		
		//echo $this->input->post('tax_retail');die;	
		$data = array(
	
					'tax_retail' => $this->input->post('tax_retail'),
					'schoolname' => $this->input->post('Productctg_id'),
					'state_id' => $this->input->post('state_id'),
					'company_id' => $this->input->post('company_id'),
					'invoice_date' => date('y-m-d'),
					'contactid' => $this->input->post('contact_id_copy'),
					
					'installation_charge_per' => $this->input->post('installation_chargeper'),
					'installation_charge' => $this->input->post('installation_charge'),
					
					'service_tax_per' => $this->input->post('service_chargeper'),
					'service_tax' => $this->input->post('service_charge'),
					
					'season' => 'winter',
					'due_date' => date('y-m-d'),
					//'direct_dicount_amt' => $this->input->post('installation_charge'),
					'service_rate_on_total' => $this->input->post('service_charge'),
					'grand_total' => $this->input->post('nett'),
					'advance_total' => $this->input->post('advance_total'),
					'balance_total' => $this->input->post('sub_total'),
					'delivery_date' => $this->input->post('delivery_date'),
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'Invoice done',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'generated_status' => 'Direct'
					
					);
					
				//print_r($data);
		$this->load->model('Model_admin_login');	
		$this->Model_admin_login->insert_user($table_name,$data);
		
		 $lastHdrId=$this->db->insert_id();
		
		
		
		
		
		
		
		
		
		
		
		
		//$id_dtl= $this->input->post('invoiceid');
		$this->load->model('Model_admin_login');
		for($i=1; $i<=$rows; $i++)
				{
				$pname="prdh";
				$pname.=$i;
				$pname=$_REQUEST[$pname];
				$pname1=explode("^",$pname);
				$pname2=$pname1[1];
				 
				
				$qunt="qn";
				$qunt.=$i;
				$qunt=$_REQUEST[$qunt];				
				$invoiceID=$_REQUEST['invoiceID'];
				
				$pprice="pr";
				$pprice.=$i;
				$pprice=$_REQUEST[$pprice];
				
				$disP="dispr";
				$disP.=$i;
				$disP=$_REQUEST[$disP];
				
				$disA="disa";
				$disA.=$i;
				$disA=$_REQUEST[$disA];
				
				$total="tt";
				$total.=$i;
				$total=$_REQUEST[$total];
				

				$tax="tx";
				$tax.=$i;
				$tax=$_REQUEST[$tax];

				$net="np";
				$net.=$i;
				$net=$_REQUEST[$net];

				$dis="tds";
				$dis.=$i;
				$dis=$_REQUEST[$dis];
				
				$dvatAb="dvatA";
				$dvatAb.=$i;
				$dvatAb=$_REQUEST[$dvatAb];
				
				$selectQ=$this->db->query("select *from tbl_product_stock where Product_id='$pname2'");
				$fetchQ=$selectQ->row();
				
			    $pid=$fetchQ->Product_id;
				
		$this->db->query("update tbl_product_serial set quantity=quantity-'$qunt' where product_id='$pid'");
		$this->db->query("update tbl_product_stock set quantity=quantity-'$qunt' where product_id='$pid'");
		
		
			
				
				if($qunt!=''){

				 $data_dtl['invoiceid']= $lastHdrId;
				 $data_dtl['productid']=$pid;
				 $data_dtl['qty']= $qunt;
				 $data_dtl['list_price']=$pprice;
				 $data_dtl['discount_percent_on_item']=$disP;
				 $data_dtl['discount_item_amt']=$disA;
				 $data_dtl['total_price']=$total;
				 $data_dtl['total_tax']=$tax;
				 $data_dtl['net_price_after_discount']=$net;
				 $data_dtl['direct_discount_amt']=$dis;
				 $data_dtl['net_price']=$net;
				$data_dtl['main_catg_id']=$installation_chargeper;
				 $data_dtl['vat_on_item']=$dvatAb;
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 //$data_dtl['divn_id']=;
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
						
							}
					}
				$this->db->query("insert into tbl_invoice_payment set invoiceid='$lastHdrId',status='invoice',receive_billing_mount='$net',contact_id='".$this->input->post('contact_id_copy')."',maker_date=NOW(),date=NOW(),comp_id='".$this->session->userdata('comp_id')."',maker_id='".$this->session->userdata('user_id')."'");	
	    $rediectInvoice="/index.php/billing/manage_corporateinvoice?id=$invoiceID";
		redirect($rediectInvoice);
					
	
	}
}	
		
public function view_corporateinvoice(){
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();
	$this->load->view('view-corporateinvoice',$data);
	}
	else
	{
	redirect('/billing/index');
	}
	
	
}

public function manage_corporateinvoice(){
	
	$data=$this->user_function();
	
	if($this->session->userdata('is_logged_in')){

	$this->load->view('manage-corporateinvoice',$data);
	}
	else
	{
	redirect('/billing/index');
	}
	
	
}


//===================================================================================
	
function delete_manage_corporateinvoice(){
		$id= $_GET['id'];
		$this->singledele($id);
		redirect('/billing/manage_corporateinvoice');
}	
function singledele($id){

$table_name ='tbl_invoice_hdr';
	$table_name_dtl ='tbl_invoice_dtl';
	$pri_col ='invoiceid';
	$pri_col_dtl ='invoiceid';
	$table_payment ='tbl_invoice_payment';
		$pri_hrd='invoiceid';
	
	$this->load->model('Model_admin_login');
		$id= $id;
		$id_dtl= $id;
		$this->refil_qnty_del($id);
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id_dtl);
		$this->Model_admin_login->delete_user($pri_hrd,$table_payment,$id);
		return;
}
function multipledele($cid){
	
	foreach($cid as $invoice){
	$this->singledele($invoice);	
}	
	
}

function refil_qnty_del($id){
	
		 $data= $this->db->query("select productid,qty from tbl_invoice_dtl where invoiceid='".$id."'");
		foreach($data->result() as $update){
			
		$this->db->query("update tbl_product_stock set quantity=quantity+'".$update->qty."' where   Product_id='".$update->productid."'");
		 $this->db->query("update tbl_product_serial set quantity=quantity+'".$update->qty."' where Product_id='".$update->productid."'");
		}
return;	
	}
	public function insert_contact(){
		
		extract($_POST);
		$table_name ='tbl_contact_m';
		$table_name_address ='tbl_address_m';
		$pri_col ='addressid';
		$pri_col ='contact_id';
		$data = array(
					
					'salatutaion' => $this->input->post('salatutaion'),
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),					
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'mobile' => $this->input->post('mobile')
										
					   );
		$data_address =	array(
							'entitytypeid' => $this->input->post('entitytypecode'),
							'entityid' => $this->input->post('contact_id'),
							'addresstype' => $this->input->post('addresstype'),
							'address1' => $this->input->post('address1'),
							'address3' => $this->input->post('address3'),
							'country' => $this->input->post('country'),
							'state' => $this->input->post('state'),
							'City' => $this->input->post('City'),
							'Street' => $this->input->post('Street'),
							'zip' => $this->input->post('zip'),
							'pobox' => $this->input->post('pobox'),
							'description' => $this->input->post('description'),
							'comp_id' => $this->session->userdata('comp_id'),
							'divn_id' => $this->session->userdata('divn_id'),
							'zone_id' => $this->session->userdata('zone_id'),
							'brnh_id' => $this->session->userdata('brnh_id'),
							'maker_id' => $this->session->userdata('user_id'),
							'author_id' => $this->session->userdata('user_id'),
							'maker_date'=> date('y-m-d'),
							'author_date'=> date('y-m-d')
		);		
		$sesio = array(
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_id' => $this->session->userdata('user_id'),
					'author_id' => $this->session->userdata('user_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
			$dataall=array_merge($data,$sesio);
					
		$this->load->model('Model_admin_login');
			
		$this->Model_admin_login->insert_user($table_name,$dataall);
		$this->Model_admin_login->insert_user($table_name_address,$data_address);
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";

				
				
				
			}	
			
public function get_inpayment(){
	
		$data['contact_id_copy']=$_GET['contact_id_copy'];
		$this->load->view('get_inpayment',$data);
	
	}

//---------------------------------------------------------------- close billing corpotateInvoice winter----------------------
///-------------------------------------------------------------------start product quantity-----------------------------------

public function add_product_quantity(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-product-quantity');
}
	else
	{
	redirect('/billing/index');
	}
}
public function get_unit_pos(){
	
		$data['product_id']=$_GET['product_id'];
		$this->load->view('get_unit_pos',$data);
	
	}
public function getProdTransf(){
	
		$data['locid']=$_GET['locid'];
		$this->load->view('getProdTransf',$data);
	
	}
public function insert_product_quantity(){
		
			@extract($_POST);
		$table_name ='tbl_product_serial_log';
		$pri_col ='serial_number';
		
		$table_name_serial='tbl_product_serial';
		
	 $product_id=$this->input->post('product_id');
		$location_id=$this->input->post('location_id');
		$new_quantity=$this->input->post('new_quantity');
		
		$selectQuery = $this->db->query("select quantity from tbl_product_serial where product_id='$product_id' and location_id='$location_id'");

		$num= $selectQuery->num_rows();

		if($num > 0)

		{	

			$secode=$product_id."_".$location_id;
			 //$secode;
		

			$sqlProdLoc=$this->db->query("update tbl_product_serial set quantity =quantity+'$new_quantity', serial_code='$secode', aval_status='Yes' where product_id='$product_id' and location_id='$location_id'");

$sqlProdLoc1="update tbl_product_stock set quantity =quantity+'$new_quantity' where product_id='$product_id'";
$this->db->query($sqlProdLoc1);
			//echo "ffff";
			$data = array(
	
					'product_id' => $this->input->post('product_id'),
					'serialno' => $this->input->post('serialno'),
					'serial_code' => $secode,
					'aval_status' => 'Yes',
					'color' => $this->input->post('color'),
					'quantity' => $this->input->post('new_quantity'),
					'location_id' => $this->input->post('location_id'),
					'no_of_tray' => $this->input->post('no_of_tray'),
					'weight' => $this->input->post('weight'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->insert_user($table_name,$data);
				
		redirect('/index.php/billing/add_product_quantity');
		
			
}else{

		$secode=$product_id."_".$location_id;
		//echo "hhh";
					$data = array(
	
					'product_id' => $this->input->post('product_id'),
					'serialno' => $this->input->post('serialno'),
					'serial_code' => $secode,
					'aval_status' => 'Yes',
					'quantity' => $this->input->post('new_quantity'),
					'color' => $this->input->post('color'),                      // color field added
					'location_id' => $this->input->post('location_id'),
					'no_of_tray' => $this->input->post('no_of_tray'),
					'weight' => $this->input->post('weight'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		//print_r($data);
		$this->Model_admin_login->insert_user($table_name,$data);

		$data_serial = array(
	
					'product_id' => $this->input->post('product_id'),
					'serialno' => $this->input->post('serialno'),
					'serial_code' => $secode,
					'aval_status' => 'Yes',
					'quantity' => $this->input->post('new_quantity'),
					'location_id' => $this->input->post('location_id'),
					'no_of_tray' => $this->input->post('no_of_tray'),
					'weight' => $this->input->post('weight'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->insert_user($table_name_serial,$data_serial);

		$sqlProdLoc1="update tbl_product_stock set quantity =quantity+'$new_quantity' where product_id='$product_id'";
		$this->db->query($sqlProdLoc1);
redirect('/index.php/billing/add_product_quantity');
}

}
///-------------------------------------------------------------------close product quantity-----------------------------------
//---------------------------------------------------------------- new billing sale ----------------------

public function sale(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('sale');
}
	else
	{
	redirect('/billing/index');
	}
}
public function edit_sale(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-sale');
}
	else
	{
	redirect('/billing/index');
	}
}
public function header(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('header');
}
	else
	{
	redirect('/billing/index');
	}
}

public function insert_sale2(){
			
		extract($_POST);
	    $id= $this->input->post('invoiceid1');
		 $saletype = $this->input->post('order_type');
		
		if($id!='')
		{
			$this->db->query("delete from tbl_production_dtl where invoice_id='$id'");
			
		$table_name ='tbl_production_hdr';
		
		$pri_col ='invoiceid';
		$table_name_dtl ='tbl_production_dtl';
		$table_name_log ='tbl_production_log';
		$pri_col_dtl ='invoice_dtl_id';
		
		//echo $this->input->post('finish_goods');
		$data = array(
	
					'finish_goods' => $this->input->post('finish_goods'),
					'fabricator' => $this->input->post('fabricator'),
					'rollno' => $this->input->post('roll_no'),
					'caseno' => $this->input->post('case_no'),
				    'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
					
					//print_r($data);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data);		
		
		
				 $countPid=count($pid);		
				
				$countbid=count($bid);
				
		for($i=0; $i<$countPid; $i++)
				{
				
		        $pidd=$this->input->post('item')[$i];
				$finish=$this->input->post('finish_goods');
				if($pidd!=''){
				 $data_dtl['invoice_id']=$id;	
				 $data_dtl['finish_goods']=$finish;
				 
				 
				 $data_dtl['product_id']=$this->input->post('pid')[$i];
				 $data_dtl['unit']=$this->input->post('qnty')[$i];
				 $data_dtl['qnty']=$this->input->post('unit')[$i];
				 $data_dtl['quantity_ready']=$this->input->post('quantity_ready')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']= date('y-m-d');
				 $data_dtl['author_date']= date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				$this->Model_admin_login->insert_user($table_name_log,$data_dtl);
				
				
				}	
					
	}
	
	echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";

		
		}else{
		$table_name ='tbl_production_hdr';
		$table_name_dtl ='tbl_production_dtl';
		$pri_col ='invoiceid';
		$pri_col_dtl ='invoice_dtl_id';
	 	$ida= $this->input->post('invoiceid');
	//echo $ida;die;
		$data = array(
	
					'finish_goods' => $this->input->post('finish_goods'),
					'fabricator' => $this->input->post('fabricator'),
					'rollno' => $this->input->post('roll_no'),
					'caseno' => $this->input->post('case_no'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
					
	//print_r($data);
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->insert_user($table_name,$data);
	    $lastid=$this->db->insert_id();
		$countPid=count($pid);
		
		for($i=0; $i<$countPid; $i++)
				{
				$pidd=$this->input->post('pid')[$i];
				if($pidd!=''){
				 $data_dtl['invoice_id']=$lastid;	
				 $data_dtl['finish_goods']=$this->input->post('finish_goods');
				 $data_dtl['product_id']=$this->input->post('pid')[$i];
				 $data_dtl['unit']=$this->input->post('qnty')[$i];
				 $data_dtl['qnty']=$this->input->post('unit')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']= date('y-m-d');
				 $data_dtl['author_date']= date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				
				}			
	}
			
						
			redirect('/index.php/billing/manage_corporateinvoice2');
	}
	}
		

public function insert_sale(){

		extract($_POST);
		 $id= $this->input->post('invoiceid1');
		if($id!='')
		{
			$this->db->query("delete from tbl_newinvoice_dtl where invoice_id='$id'");
			
			$this->db->query("delete from tbl_newbill_sundry where invoice_id='$id'");
		
		$table_name ='tbl_newinvoice_hdr';
		$pri_col ='invoiceid';
		$table_name_dtl ='tbl_newinvoice_dtl';
		$table_name_bill ='tbl_newbill_sundry';
		$pri_col_bill ='billsundry_id';
		$pri_col_dtl ='invoice_dtl_id';
		
		
		$data = array(
	
					'series' => $this->input->post('series'),
					'new_date' => $this->input->post('date'),
					'voucher' => $this->input->post('voucher'),
					'qty' => $this->input->post('totalqnty'),
					'grand_total' => $this->input->post('totalamnt'),
					'type' => $this->input->post('sale_type'),
					'party' => $this->input->post('party'),
					'mat_cent' => $this->input->post('mcentr'),
					'naration' => $this->input->post('naration'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'status' => 'Invoice done',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data);		
		
		
				$countPid=count($pid);		
				
				$countbid=count($bid);
				
		for($i=0; $i<$countPid; $i++)
				{
				
				$pidd=$this->input->post('item')[$i];
				
				if($pidd!=''){
				 $data_dtl['invoice_id']=$id;	
				 $data_dtl['product_id']=$this->input->post('item')[$i];
				 $data_dtl['qnty']=$this->input->post('qnty')[$i];
				 $data_dtl['unit']=$this->input->post('unit')[$i];
				 $data_dtl['price']=$this->input->post('price')[$i];
				 $data_dtl['amount']=$this->input->post('amt')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']= date('y-m-d');
				 $data_dtl['author_date']= date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				
				}			
	}
	for($j=0; $j<$countbid; $j++){
	
	 			$billidd=$this->input->post('bil')[$j];
				
				if($billidd!=''){
				 $data_bill['invoice_id']=$id;	
				$data_bill['billsundry']=$this->input->post('bil')[$j];
				 $data_bill['naration']=$this->input->post('natation')[$j];
				 $data_bill['percentage']=$this->input->post('nart')[$j];
				 $data_bill['amount']=$this->input->post('dis')[$j];
				 $data_bill['maker_id']=$this->session->userdata('user_id');
				 $data_bill['author_id']=$this->session->userdata('user_id');
				 $data_bill['maker_date']= date('y-m-d');
				  $data_bill['author_date']= date('y-m-d');
				 $data_bill['comp_id']=$this->session->userdata('comp_id');
				 $data_bill['zone_id']=$this->session->userdata('zone_id');
				 $data_bill['brnh_id']=$this->session->userdata('brnh_id');
				 $data_bill['divn_id']=$this->session->userdata('divn_id');
				
				$this->Model_admin_login->insert_user($table_name_bill,$data_bill);
				}				
			}
			echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";		

		
		}else{
		$table_name ='tbl_newinvoice_hdr';
		$table_name_dtl ='tbl_newinvoice_dtl';
		$table_name_bill ='tbl_newbill_sundry';
		$pri_col_bill ='billsundry_id';
		$pri_col ='invoiceid';
		$pri_col_dtl ='invoice_dtl_id';
	 	$ida= $this->input->post('invoiceid');
	
		$data = array(
	
					'series' => $this->input->post('series'),
					'new_date' => $this->input->post('date'),
					'voucher' => $this->input->post('voucher'),
					'qty' => $this->input->post('totalqnty'),
					'grand_total' => $this->input->post('totalamnt'),
					'type' => $this->input->post('sale_type'),
					'party' => $this->input->post('party'),
					'mat_cent' => $this->input->post('mcentr'),
					'naration' => $this->input->post('naration'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'status' => 'Invoice done',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->insert_user($table_name,$data);
	    
		$countPid=count($pid);
		
		$countbid=count($bid);

		
		
		for($i=0; $i<$countPid; $i++)
				{
				$pidd=$this->input->post('pid')[$i];
				if($pidd!=''){
				 $data_dtl['invoice_id']=$ida;	
				 $data_dtl['product_id']=$this->input->post('pid')[$i];
				 $data_dtl['qnty']=$this->input->post('qnty')[$i];
				 $data_dtl['unit']=$this->input->post('unit')[$i];
				 $data_dtl['price']=$this->input->post('price')[$i];
				 $data_dtl['amount']=$this->input->post('amt')[$i];
				 $data_dtl['grand_total']=$this->input->post('totalamnt')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']= date('y-m-d');
				 $data_dtl['author_date']= date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				
				}			
	}
	for($j=0; $j<$countbid; $j++){
	 			$billidd=$this->input->post('bil')[$j];

				if($billidd!=''){
				 $data_bill['invoice_id']=$ida;	
				$data_bill['billsundry']=$this->input->post('bil')[$j];
				 $data_bill['naration']=$this->input->post('natation')[$j];
				 $data_bill['percentage']=$this->input->post('nart')[$j];
				 $data_bill['amount']=$this->input->post('dis')[$j];
				 $data_bill['maker_id']=$this->session->userdata('user_id');
				 $data_bill['author_id']=$this->session->userdata('user_id');
				 $data_bill['maker_date']= date('y-m-d');
				  $data_bill['author_date']= date('y-m-d');
				 $data_bill['comp_id']=$this->session->userdata('comp_id');
				 $data_bill['zone_id']=$this->session->userdata('zone_id');
				 $data_bill['brnh_id']=$this->session->userdata('brnh_id');
				 $data_bill['divn_id']=$this->session->userdata('divn_id');
				
				$this->Model_admin_login->insert_user($table_name_bill,$data_bill);
				}				
			}
			
						
			redirect('/index.php/billing/manage_corporateinvoice');
	}
	}
public function item_data(){
 	$return_arr = array();
    $fetch =$this->db->query("SELECT * FROM tbl_product_stock limit 3");
	foreach($fetch->result() as $row)
    {
	
	
	 		 $row_array['id']= $row->Product_id;
        $row_array['label']= $row->productname."^".$row->Product_id;
		
        $row_array['pname']= $row->productname;
		$row_array['qnty']= $row->quantity_stock;
        $row_array['amnt']= $row->sales_price;
		 $row_array['unt']= $row->alt_unit;
		
        array_push( $return_arr, $row_array );
    }

	 $array_final= json_encode($return_arr);  
   $array_final = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9]*)":/','$1:' , $array_final).';';
    ($array_final);
}

public function bilsndry_data(){
 	$return_arr = array();
    $param = $_GET["term"];	
    $fetch =$this->db->query("SELECT * FROM tbl_bill_sundry WHERE  bill_name like '%$param%' or alias_name like '%$param%'");
	foreach($fetch->result() as $row)
    {
		 $row_array['bill_sundry_id'] = $row->bill_sundry_id;
        $row_array['bill_name'] = $row->bill_name;
		
        $row_array['sundry_to_be_fed'] = $row->sundry_to_be_fed;
		$row_array['default_value']	= $row->default_value;
		$row_array['bill_type']= $row->bill_type;
        
      array_push( $return_arr, $row_array );
    }
	if($fetch->result()==null){
	 $row_array['bill_sundry_ida'] = "No Item";
	}

   json_encode($return_arr);
}


public function data1(){

	 $queryy="select * from tbl_product_stock limit 3"; 
	$line=$this->db->query($queryy);
	
	
	
	foreach($line->result() as $line){ 
     echo " {";
      echo  'id:'."'".$line->Product_id."'".',';
     	 echo 'label:'."'".$line->productname.'^'.$line->Product_id."'".',';
     	echo 'pname:'."'".$line->productname."'".',';
       echo 'qnty:'."'".$line->quantity_stock."'".',';
		echo 'amnt:'."'".$line->sales_price."'".',';
		echo 'unt:'."'".$line->alt_unit."'";
      echo " },";
	    }
	
}

public function data(){
if($this->session->userdata('is_logged_in')){
		$this->load->view('dat');
}
	else
	{
	redirect('/billing/index');
	}

}
public function test(){
if($this->session->userdata('is_logged_in')){
		$this->load->view('test1');
}
	else
	{
	redirect('/billing/index');
	}

}
//----------------------------------------------------------------close new billing sale ----------------------

}

