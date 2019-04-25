<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Router class */

class my_controller extends MX_Controller {
function __construct(){
   parent::__construct();        
}
	
public function page_protection(){
	
	
$mod_sql2 = $this->db->query("select distinct f.function_url from tbl_module_function f  join tbl_role_func_action rf on f.func_id=rf.function_url where rf.role_id='".$this->session->userdata('role')."' and rf.action_id !='Inactive'");
  $CUrl="../".$this->uri->segment(1)."/".$this->uri->segment(2);
foreach($mod_sql2->result() as $mdd_f)

{
	
	
	  $geturl=$mdd_f->function_url;
	 
	if($CUrl==$geturl)
	{
	
	
	$active='1';
	//redirect("/report/report_function");
	
	}
	
$active;
	
}

return $active;
	
}


public function user_function(){
if($this->session->userdata('is_logged_in')){
$userRole=$this->db->query("select * from tbl_user_role_mst where user_id='".$this->session->userdata('user_id')."' ");
$userRoleFetch=$userRole->row();
$userRoleFetch->role_id;
$userRole1=$this->db->query("select * from tbl_role_mst where role_id='".$userRoleFetch->role_id."'");
$userRoleFetch1=$userRole1->row();
$userRoleFetch1->role_id;
$data_user=$userRoleFetch1->action;
$action=explode("-",$data_user);
$kk['edit']=$action[0];
$kk['view']=$action[1];
$kk['delete']=$action[2];
$kk['add']=$action[3];
return $kk;
 }

}

////////////function to give permission(add,edit,delete) to users starts///////////////
public function dashboard(){
			//$this->load->model('Model_admin_login');
			//$this->Model_admin_login->can_log_in();
			
			$user_name = $this->input->post('username');
			$password = $this->input->post('password');
			$userQuery = $this->db->query("SELECT * FROM tbl_user_mst where status='A' and user_name='$user_name' and password='$password' ");
			$fetchUser = $userQuery->row();
			$roleQuery = $this->db->query("SELECT * FROM tbl_user_role_mst where   user_id='".$fetchUser->user_id."'");
			$fetchRole = $roleQuery->row();
			$cnt = $roleQuery->num_rows();
			$sess_array = array(
         				'user_id' => $fetchUser->user_id,
		 				'is_logged_in'=>1,
         				'user_name' => $fetchUser->user_name,
		 				'user_type' => $fetchUser->user_type,
		 				'comp_id' 	=> $fetchUser->comp_id,
		 				'zone_id' 	=> $fetchUser->zone_id,
		 				'brnh_id' 	=> $fetchUser->brnh_id,
		 				'divn_id' 	=> $fetchUser->divn_id,
		  				'divn_id' 	=> $fetchUser->divn_id,
		  				'role' 	  	=> @$fetchRole->role_id
       				);
				if($cnt>0){
				$this->session->set_userdata(@$sess_array);
				redirect('master/Item/dashboar');
				//redirect('dashboard');
				}	else{
					$this->session->set_flashdata('error', 'Invalid username/password');

	redirect('/master/index');
	}
					
				
				
}

 function index() {
	if($this->session->userdata('is_logged_in')){
		redirect('master/dashboar');
		}	else{
	redirect('index');
	}
}



public function dashboar(){

if($this->session->userdata('is_logged_in')){
	$this->load->view('dashboard');
    }else{	
		redirect('index');
	}
		}

public function logout(){

		$this->session->sess_destroy();
		redirect('/index');
}







public function popupclose(){
echo "<script type='text/javascript'>";
echo "window.close();";
echo "window.opener.location.reload();";
echo "</script>";
}

public function get_cid() {
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();
		$this->load->view('get_cid',$data); 
	
	}	else{
	
		$this->load->view('index');
	
	}
		}
		
		
public function error_page() {
	if($this->session->userdata('is_logged_in')){
			$this->load->view('invalid_url');
		}	else{
		$this->load->view('index');
	}
		}
		
public function session_data() {
	$data = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_id' => $this->session->userdata('user_id'),
					'author_id' => $this->session->userdata('user_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
	return $data;
		}	
			

 function load_page1($page){
	if($this->session->userdata('is_logged_in')){
		$this->load->view($page);
	}
	else
	{
	redirect('/master/index');
	}
}	




function parseWord($filename) 
{

    $striped_content = '';
    $content = '';

    if(!$filename || !file_exists($filename)) return false;

    $zip = zip_open($filename);

    if (!$zip || is_numeric($zip)) return false;

    while ($zip_entry = zip_read($zip)) {

        if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

        if (zip_entry_name($zip_entry) != "word/document.xml") continue;

        $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

        zip_entry_close($zip_entry);
    }// end while

    zip_close($zip);

    //echo $content;
    //echo "<hr>";
    //file_put_contents('1.xml', $content);

    $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    $content = str_replace('</w:r></w:p>', "\r\n", $content);
    $striped_content = strip_tags($content);

    return $striped_content;
} 
	
	
	

 function load_page($page){
	 $pageActive=$this->page_protection();
	
	if($this->session->userdata('is_logged_in')){
		
		$data=$this->user_function();
		
			$this->load->view($page,$data);
		
		
	}
	else
	{
	redirect('/master/index');
	}
}	

 public function product_check($productId){
 //echo $productId;die;
   $this->db->where('productid', $productId);

    $query = $this->db->get('tbl_invoice_dtl');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	  return prodductActive;
		

       //redirect('/master/add_category');
     } else {
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }

 
 }

//=============================enter price=======================
 
 public function enterPriceCheck($compId){
 //echo $productId;die;
   $this->db->where('comp_id', $compId);

    $query = $this->db->get('tbl_region_mst');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	  return prodductActive;
		

       //redirect('/master/add_category');
     } else {
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }

 
 }
 
//=================================Close enter price ===============================

//=============================Start Region =======================
 
 public function regionCheck($zoneid){
 //echo $productId;die;
   $this->db->where('zone_id', $zoneid);

    $query = $this->db->get('tbl_branch_mst');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	  return prodductActive;
		

       //redirect('/master/add_category');
     } else {
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }

 
 }
 
//=================================Close Region===============================
 
 
//=============================Start Branch =======================
 
 public function branchCheck($brnhid){
 //echo $productId;die;
   $this->db->where('brnh_id', $brnhid);

    $query = $this->db->get('tbl_wing_mst');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	  return prodductActive;
		

       //redirect('/master/add_category');
     } else {
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }

 
 }
 
//=================================Close Branch===============================
 
 
//=============================Start Department =======================
 
 public function departmentCheck($divnid){
 //echo $productId;die;
   $this->db->where('divn_id', $divnid);

    $query = $this->db->get('tbl_user_mst');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	  return prodductActive;
		

       //redirect('/master/add_category');
     } else {
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }

 
 }
 
//=================================Close Department===============================
 
 
//=============================Start Role =======================
 
 public function roleCheck($roleid){
 //echo $productId;die;
   $this->db->where('role_id', $roleid);

    $query = $this->db->get('tbl_role_func_action');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	  return prodductActive;
		

       //redirect('/master/add_category');
     } else {
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }

 
 }
 
//=================================Close Role===============================
 
 
//=============================Start User =======================
 
 public function userCheck($userid){
 //echo $productId;die;
   $this->db->where('user_id', $userid);

    $query = $this->db->get('tbl_user_role_mst');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	  return prodductActive;
		

       //redirect('/master/add_category');
     } else {
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }

 
 }
 
//=================================Close User===============================
 
//================================*Anoj*Start delete data ============== 
 function delete_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];		
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		
}
//================================Close delete data ============== 

 
//================================*Anoj* Start Multiple delete table data ============== 
 function delete_multiple_table_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		$table_name_dtl =$dataex[3];
		$pri_col_dtl =$dataex[4];
		
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id);
		
				
}
//================================Close Multiple delete table data ============== 

//================================*Anoj* Start Multiple Purchase delete table data ============== 
 function delete_multiple_purchase_table_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		$table_name_dtl =$dataex[3];
		$pri_col_dtl =$dataex[4];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id);	
		
		$this->db->query("delete from tbl_communication where communication_type='PurchaseOrder' and updateid='$id'");
		$this->db->query("delete from tbl_payment_log where status='Purchaseorder' and all_id='$id'");
		$this->db->query("delete from tbl_invoice_payment where status='Purchaseorder' and invoiceid='$id'");
		$this->db->query("delete from tbl_approve_status where type='Purchase Order' and order_id='$id'");

			
}
//================================Close Multiple Purchase delete table data ============== 


//================================*Anoj* Start Multiple Quotation delete table data ============== 
 function delete_multiple_quotation_table_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		$table_name_dtl =$dataex[3];
		$pri_col_dtl =$dataex[4];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id);	
		
		$this->db->query("delete from tbl_communication where communication_type='Quotation' and updateid='$id'");
		$this->db->query("delete from tbl_payment_log where status='Quotation' and all_id='$id'");
		$this->db->query("delete from tbl_approve_status where type='Quotation' and order_id='$id'");

			
}
//================================Close Multiple Quotation delete table data ============== 

//================================*Anoj* Start Multiple Sale Order New delete table data ============== 
 function delete_multiple_newsale_table_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		$table_name_dtl =$dataex[3];
		$pri_col_dtl =$dataex[4];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id);	
		
		$this->db->query("delete from tbl_communication where communication_type='SaleOrdernew' and updateid='$id'");
		$this->db->query("delete from tbl_payment_log where status='SaleOrdernew' and all_id='$id'");
		$this->db->query("delete from tbl_approve_status where type='Sales Order' and order_id='$id'");

			
}
//================================Close Multiple Sale Order New delete table data ============== 

//================================*Anoj* Start Multiple invoice delete table data ============== 
 function delete_invoice_table_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		
		$this->db->query("delete from tbl_communication where communication_type='invoice' and updateid='$id'");
		$this->db->query("delete from tbl_payment_log where status='Invoice' and all_id='$id'");
		$this->db->query("delete from tbl_invoice_payment where status='invoice' and invoiceid='$id'");
			
}
//================================Close Multiple Invoice delete table data ============== 

//================================*Anoj* Start Multiple Communication delete table data ============== 
 function delete_communication_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		//$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		
		$this->db->query("delete from tbl_communication where communication_type='Communication' and communication_id='$id'");
		$this->db->query("delete from tbl_payment_log where status='Communication' and all_id='$id'");
		$this->db->query("delete from tbl_approve_status where type='Communication' and order_id='$id'");
			
}
//================================Close Multiple Communication delete table data ============== 

//================================*Anoj* Start Multiple Letter delete table data ============== 
 function delete_letterhead_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		
		$this->db->query("delete from tbl_communication where communication_type='letterhead' and updateid='$id'");
		$this->db->query("delete from tbl_payment_log where status='letterhead' and all_id='$id'");
		$this->db->query("delete from tbl_approve_status where type='letterhead' and order_id='$id'");
			
}
//================================Close Multiple Letter delete table data ============== 

//================================*Anoj* Start Multiple Letter delete table data ============== 
 function delete_contact_data() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		
		$this->db->query("delete from tbl_contact_person where contact_id='$id'");
				
}
//================================Close Multiple Letter delete table data ============== 


//================================*Anoj* Authorization po dismiss ============== 
 function update_authorization_dismiss() {
 
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$statustype =$dataex[1];
		
	$this->db->query("update tbl_approve_status set dismiss_status='dismiss' where 	type='$statustype' and order_id='$id'");	

}
//================================Close Multiple Letter delete table data ============== 

 
//================================*Anoj* Start Sales order Multiple delete table data ============== 
 function delete_multiple_table_data_sales_order() {
	
	$this->load->model('Model_admin_login');
		$getdata= $_GET['id'];
		$dataex=explode("^",$getdata);
		$id=$dataex[0];
		$table_name =$dataex[1];
		$pri_col =$dataex[2];
		$table_name_dtl =$dataex[3];
		$pri_col_dtl =$dataex[4];
				
		if($table_name=='tbl_sales_order_hdr' && $pri_col=='salesid'){
		
		$salesQuery=$this->db->query("select * from tbl_sales_order_dtl where salesid='$id'");
		foreach($salesQuery->result() as $fetchQ){
			$proid=$fetchQ->product_id;
			$qnty=$fetchQ->quantity;
			
		$salesOrderReturnQ=$this->db->query("select * from tbl_sales_order_return_hdr where so_no='$id'");	
		$numrow=$salesOrderReturnQ->num_rows();
		if($numrow>0){
			
		}else{
		$this->db->query("update tbl_product_serial set quantity=quantity+'$qnty' where product_id='$proid'");
		$this->db->query("update tbl_product_stock set quantity=quantity+'$qnty' where Product_id='$proid'");	
			  }
			}
		}
	$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
	$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id);	
}
//================================Close Sales order Multiple delete table data ============== 


//================================*Anoj*Start Select All delete data==================
function multiple_delete_two_table(){		
$id=$_POST['ids'];

	$tabledata =$_POST['table_name'];
	$table_name_ex=explode("^",$tabledata);
	$table_name=$table_name_ex[0];
	$table_name_dtl=$table_name_ex[1];
	
	$pri_data =$_POST['pri_col'];
	$pri_col_ex =explode("^",$pri_data);
	$pri_col =$pri_col_ex[0];
	$pri_col_dtl =$pri_col_ex[1];

	$this->db->query("delete from $table_name where $pri_col in($id)");
		
	$query=$this->db->query("select * from $table_name where $pri_col in($id)");
		
	$deleteid=$query->num_rows();		
		
			for($i=0;$i<=$deleteid;$i++){
			
			$this->db->query("delete from $table_name_dtl where $pri_col_dtl in($id)");
			
			}
			
}

//===============================Close Select All delete data==========================



function multiple_delete_item(){		
$id=$_POST['ids'];
//$this->db->query("delete from $_POST['table_name'] where $_POST['pri_col'] in($id)");	

	
	
	

	$table_name =$_POST['table_name'];
	$table_name1 ='tbl_product_serial';
	$table_name2 ='tbl_product_serial_log';
	$pri_coll =$_POST['pri_col'];
	$pri_col ='product_id';
	$this->db->query("delete from $table_name where $pri_coll in($id)");
$this->db->query("delete from $table_name1 where $pri_coll in($id)");	
$this->db->query("delete from $table_name2 where $pri_coll in($id)");
	
	/*
	$this->load->model('Model_admin_login');
	
		
		$this->Model_admin_login->delete_user($pri_col,$table_name1,$id);
		$this->Model_admin_login->delete_user($pri_col,$table_name2,$id);
		return;
		*/
	
}


public function template()
{
$getId=$_GET['id'];
$templateQuery=$this->db->query("select *from tbl_termandcondition where id='$getId'");
$getTemplate=$templateQuery->row();
echo $getTemplate->des;

}



function fillselect($name,$id,$field='contact_id_copy'){

	echo "<script>
			foropener('".$name."','".$id."','".$field."');
function foropener(text,value,field)
{
	var openerWindow= window.opener;
	if (openerWindow != null && !openerWindow.closed) 
    {
		try{
		var selectcopy = window.opener.document.getElementById(field);
		var option = window.opener.document.createElement('option');
		option.text = text;
		option.value = value;
		selectcopy.add(option, selectcopy[1]);
		selectcopy.value=option.value;
		window.close();
		}catch(ex){}
	}
	else {
    alert('Parent closed/does not exist.'); 
	}
}
			</script>";
			return;
	}
	
public function send_mail_functionss(){

    

 $ci->load->library('email');

 $this->email->from("info@techvyaserp.in",'info@techvyaserp.in');

 $this->email->to("anojk1996@gmail.com");

 $this->email->subject('Quotation Order');

 $this->email->message("Quotation Order");

 
 $result=$this->email->send();  
       echo $this->email->print_debugger();
}


// forgot password

public function forgotPassword()
{

$userQuery=$this->db->query("select *from tbl_user_mst where email_id='$email_id'");
$cnt=$userQuery->num_rows();
if($cnt>0)
{
$getUser=$userQuery->row();


$msg="Your Password Is:-$password";
					$this->load->library('email');
$name=$first_name." ".$last_name;
$this->email->from('info@techvyas.com', 'Techcyas');
$this->email->to($email_id);
$this->email->bcc('collestbablu@gmail.com');

$this->email->subject('Password Details');
$this->email->message($msg);

$this->email->send();
$this->session->set_flashdata('message', 'Please check your mail for password ');
redirect('index');
}
else
{

$this->session->set_flashdata('message', 'Email Id do not match to admin account.');
redirect('index');
}
}


// ends
}