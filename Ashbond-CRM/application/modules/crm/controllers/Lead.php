<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Lead extends my_controller {

function __construct()
{
    parent::__construct(); 
   	$this->load->library('pagination');
    $this->load->model('model_crm');	
}  

public function add_contact()
{
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('add-contact');
	}
	else
	{
		redirect('index');
	}
}


public function ajex_nextIncrementId()
{
 	$cust    = $this->input->post('customer');
	$sp    = $this->input->post('sales_person');
 	
	$customer=$this->db->query("select * from tbl_contact_m where group_name='4' AND contact_id = '$cust' ");
	$getCustomer=$customer->row();
	$cust_code=$getCustomer->code_name;
	
	$sales=$this->db->query("select * from tbl_user_mst where comp_id != '1' AND user_id = '$sp' ");
	$getSales=$sales->row();
	$sales_code=$getSales->code_name;
	
    $query    = $this->db->query("SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'tbl_leads' ");
	$result   = $query->row_array();

	if(sizeof($result) > 0)
	{
		 echo $cust_code.'-'.$sales_code.'-'.$result['auto_increment'];
    }
}


public function manage_lead()
{
	
	if($this->session->userdata('is_logged_in'))
	{
		$data = $this->Show_Lead_Data();
		$this->load->view('manage-lead',$data);
	}
	else
	{
		redirect('index');
	}
		
}

public function Show_Lead_Data()
{

		  $table_name='tbl_leads';
		  $data['result'] = "";
		  //$url   = site_url('/crm/Lead/manage_lead?');
		  $sgmnt = "4";
		  
		  if($_GET['entries'] != '')
		  {
			$showEntries = $_GET['entries'];
		  }
		  else
		  {
			$showEntries= 10;
		  }
		  
		  $totalData   = $this->model_crm->count_leads($table_name,'A',$this->input->get());
		  

		  if($_GET['entries'] != '' && $_GET['filter'] != 'filter')
		  {
			 $url = site_url('/crm/Lead/manage_lead?entries='.$_GET['entries']);
		  }
		  elseif($_GET['filter'] == 'filter' || $_GET['entries'] != '')
		  {
			$url = site_url('/crm/Lead/manage_lead?lead_number='.$_GET['lead_number'].'&tour_id='.$_GET['tour_id'].'&user='.$_GET['user'].'&customer='.$_GET['customer'].'&sales_person='.$_GET['sales_person'].'&contact_person='.$_GET['contact_person'].'&subject='.$_GET['subject'].'&priority='.$_GET['priority'].'&closure_date='.$_GET['closure_date'].'&source='.$_GET['source'].'&stage='.$_GET['stage'].'&filter='.$_GET['filter'].'&entries='.$_GET['entries']);
		  }
		  else
		  {
			$url = site_url('/crm/Lead/manage_lead?');
		  }

          $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);

          $data=$this->user_function();
		  $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
		  $data['pagination']        = $this->pagination->create_links();
	
		  if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_crm->filterLeadData($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_crm->getLeadData($pagination['per_page'],$pagination['page']);


	        return $data;

}


public function view_lead_log()
{
	
	if($this->session->userdata('is_logged_in'))
	{
		$data=$this->user_function();// call permission fnctn
		$data['result'] = $this->model_crm->lead_data();
		$this->load->view('view-lead-log',$data);
	}
	else
	{
		redirect('index');
	}
		
}



public function addactivity()
{
	if($this->session->userdata('is_logged_in'))
	{
		$data['ID'] = $_GET['ID'];
		$this->load->view('add-activity',$data);
	}
	else
	{
		redirect('index');
	}
}

public function view_activity()
{
	if($this->session->userdata('is_logged_in'))
	{
		$data['ID'] = $_GET['ID'];
		$this->load->view('view-activity',$data);
	}
	else
	{
		redirect('index');
	}
}


public function update_activity(){
		//echo "abc";die;
		@extract($_POST);
		$table_name_log ='tbl_activity_log';
		$table_name ='tbl_activity';
		$pri_col ='activity_id';
	 	$id= $this->input->post('leadid');
		//$pupaction=$this->input->post('pupaction');
		
		$sqlgroup=$this->db->query("select * from tbl_activity where lead_id='$id'");
		$rowCheck=$sqlgroup->num_rows();
		//echo $rowCheck;die;
		
		$this->load->model('Model_admin_login');
	
	$data= array(
					
					'lead_id' => $this->input->post('leadid'),
					'nxt_action' => $this->input->post('nxt_action'),
					'nxt_action_date' => $this->input->post('nxt_action_date'),
					
					//'communication' => $this->input->post('communication'),
					//'plan_nxt_activity' => $this->input->post('plan_nxt_activity'),
					
					
		      	);
	$sesio = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
		
		$dataall = array_merge($data,$sesio);
		
		if($rowCheck == 0){
			$this->Model_admin_login->insert_user($table_name,$dataall);
		}else{
			//$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
			$this->db->query("UPDATE $table_name SET nxt_action='$nxt_action', nxt_action_date='$nxt_action_date' WHERE lead_id='$id'");
			
		}
		
		$this->Model_admin_login->insert_user($table_name_log,$dataall);
		$this->session->set_flashdata('flash_msg', 'Activity Added Successfully.');
		redirect('crm/Lead/manage_lead');

}


public function get_pro_typ(){

	if($this->session->userdata('is_logged_in')){
		
		$data['catType']=$_GET['catType'];
		$this->load->view('Item/get-cat-type',$data);
	}
	else
	{
	redirect('master/index');
	}
}
	
public function get_cid(){
	//$data=$this->user_function();// call permission function
	
		$this->load->view('get_cid');
	
	}

public function add_productlead()
{
	//echo "";die;
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('add-productLead');
	}
	else
	{
		redirect('index');
	}
}

public function getproduct(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('getproduct');
}
	else
	{
	redirect('index');
	}
}

public function insertLeadProduct()
{
	@extract($_POST);
	$table_name ='tbl_lead_product';
	$pri_col ='leadProdid';
	
	//$count=count($rows);
	$this->load->model('Model_admin_login');
		
	  for($i=0; $i<=$rows; $i++)
		 {
				
			if($qty[$i]!='')
			  {

				 $data_dtl['lead_id']= $lead_id;
				 $data_dtl['product_id']=$this->input->post('main_id')[$i];				 
				 $data_dtl['qty']=$this->input->post('qty')[$i];
				 $data_dtl['total']=$this->input->post('tot')[$i];
				 $data_dtl['unit']=$this->input->post('unit')[$i];
				 $data_dtl['rate']=$this->input->post('list_price')[$i];
				 //$data_dtl['grand_total']=$this->input->post('grand_total')[$i];
				 
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['author_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				
				
				
				
				$this->Model_admin_login->insert_user($table_name,$data_dtl);		
				
			 }
		}
		
		$this->session->set_flashdata('flash_msg', 'Product Added in this Lead Successfully.');
		echo "<script>";
		echo "window.close();";
		echo "window.opener.location.reload();</script>";
	
}

public function itemLead(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('item-lead',$data);
	}
	else
	{
	redirect('index');
	}
}

public function updateLead(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('edit-lead',$data);
	}
	else
	{
	redirect('index');
	}
}

public function viewLead(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('view-lead',$data);
	}
	else
	{
	redirect('index');
	}
}


public function update_lead_and_activity(){
	
		@extract($_POST);
		
		$table_name_log ='tbl_leads_log';
		$table_name ='tbl_leads';
		$pri_col ='lead_id';
		
	 	$id= $this->input->post('leadid');

	$this->load->model('Model_admin_login');
	
	$data= array(
					
					'contact_id' => $this->input->post('contact_id'),
					'lead_number' => $this->input->post('lead_number'),
					'sales_person_id' => $this->input->post('sales_person_id'),
					'contact_person' => $this->input->post('contact_person'),
					'email_id' => $this->input->post('email_id'),
					'phone' => $this->input->post('phone'),
					'potential_revenue' => $this->input->post('potential_revenue'),
					'exptd_closer_date' => $this->input->post('exptd_closer_date'),
					'priority' => $this->input->post('priority'),
					
					'source' => $this->input->post('source'),
					'source_others' => $this->input->post('source_others'),
					
					'price_list' => $this->input->post('price_list'),
					'competitor' => $this->input->post('competitor'),
					'lead_status' => $this->input->post('stage'),
					'industry' => $this->input->post('industry'),
					'subject' => $this->input->post('subject'),
					'remarks' => $this->input->post('remarks')
					
					
		      	);


	$sesio = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
		
	$dataall = array_merge($data,$sesio);
	
	
	$datalog= array(
				
					'contact_id' => $this->input->post('contact_id'),
					'lead_log_id' => $id,
					'competitor' => $this->input->post('competitor'),
					'subject' => $this->input->post('subject'),
					'priority' => $this->input->post('priority'),
					'exptd_closer_date' => $this->input->post('exptd_closer_date'),
					'source' => $this->input->post('source'),
					'potential_revenue' => $this->input->post('potential_revenue'),
					//'cust_ref' => $this->input->post('cust_ref'),
					//'dlvry_date' => $this->input->post('dlvry_date'),
					'remarks' => $this->input->post('remarks'),
					'price_list' => $price_list,
					'sales_person_id' => $sales_person_id
									
		      	);
				
				$datalog = array_merge($datalog,$sesio);
				
				$this->Model_admin_login->insert_user($table_name_log,$datalog);
				
				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
					
		//====================Activity=================

		$table_name_log2 ='tbl_activity_log';
		$table_name2 ='tbl_activity';
		$pri_col2 ='activity_id';
	 	$id2= $this->input->post('leadid');
		$nxt_action = $this->input->post('nxt_action');
		
			$sqlgroup=$this->db->query("select * from tbl_activity where lead_id='$id2'");
			$rowCheck=$sqlgroup->num_rows();
			//echo $rowCheck;die;
	
	$this->load->model('Model_admin_login');
	
	$data_activity= array(
					
					'lead_id' => $this->input->post('leadid'),
					'nxt_action' => $this->input->post('nxt_action'),
					'nxt_action_date' => $this->input->post('nxt_action_date'),
					//'communication' => $this->input->post('communication'),
					//'plan_nxt_activity' => $this->input->post('plan_nxt_activity'),
					
					
		      	);
	$sesio_activity = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
		
		$dataall_activity = array_merge($data_activity,$sesio_activity);
		
		if($nxt_action != '')
		{
		
			if($rowCheck > 0){
				$this->db->query("UPDATE $table_name2 SET nxt_action='$nxt_action', nxt_action_date='$nxt_action_date' WHERE lead_id='$id2'");
				//$this->Model_admin_login->update_user($pri_col2,$table_name2,$id2,$dataall_activity);
			}else{
				$this->Model_admin_login->insert_user($table_name2,$dataall_activity);	
			}
		
		}
		
		if($nxt_action != '')
		{
			$this->Model_admin_login->insert_user($table_name_log2,$dataall_activity);
		}
		
		$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
		redirect('crm/Lead/manage_lead');
					
}



public function insert_lead_and_activity(){
		
		//echo "abccc";die;	
		@extract($_POST);
		
		$table_name_log ='tbl_leads_log';
		$table_name ='tbl_leads';
		$pri_col ='lead_id';
		
		if($this->input->post('tour_id') != '')
		{
			$tour_id = $this->input->post('tour_id');
		}
		
	$this->load->model('Model_admin_login');
		
	$data= array(
					
					'tour_id' => $tour_id,
					'contact_id' => $this->input->post('contact_id'),
					'lead_number' => $this->input->post('lead_number'),
					'sales_person_id' => $this->input->post('sales_person_id'),
					'contact_person' => $this->input->post('contact_person'),
					'email_id' => $this->input->post('email_id'),
					'phone' => $this->input->post('phone'),
					'potential_revenue' => $this->input->post('potential_revenue'),
					'exptd_closer_date' => $this->input->post('exptd_closer_date'),
					'priority' => $this->input->post('priority'),
					
					'source' => $this->input->post('source'),
					'source_others' => $this->input->post('source_others'),
					
					'price_list' => $this->input->post('price_list'),
					'competitor' => $this->input->post('competitor'),
					'lead_status' => $this->input->post('stage'),
					'industry' => $this->input->post('industry'),
					'subject' => $this->input->post('subject'),
					'remarks' => $this->input->post('remarks')				
					
		      	);


	$sesio = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
		
		
		$dataall = array_merge($data,$sesio);

		    	$this->Model_admin_login->insert_user($table_name,$dataall);
				$lastid=$this->db->insert_id();
				
				
 $datalog= array(
				
					'contact_id' => $this->input->post('contact_id'),
					'lead_log_id' => $lastid,
					'competitor' => $this->input->post('competitor'),
					'subject' => $this->input->post('subject'),
					'priority' => $this->input->post('priority'),
					'exptd_closer_date' => $this->input->post('exptd_closer_date'),
					'source' => $this->input->post('source'),
					'potential_revenue' => $this->input->post('potential_revenue'),
					//'cust_ref' => $this->input->post('cust_ref'),
					//'dlvry_date' => $this->input->post('dlvry_date'),	
					'remarks' => $this->input->post('remarks'),
					'price_list' => $price_list,
					'sales_person_id' => $sales_person_id
									
		      	);
				
				$datalog = array_merge($datalog,$sesio);
				$this->Model_admin_login->insert_user($table_name_log,$datalog);
			
			  
		//================================Activity=========================		  

		$table_name_log2 ='tbl_activity_log';
		$table_name2 ='tbl_activity';
		$pri_col2 ='activity_id';
	 	$id2= $lastid;
		
		$sqlgroup=$this->db->query("select * from tbl_activity where lead_id='$id2'");
		$rowCheck=$sqlgroup->num_rows();
		//echo $rowCheck;die;
		
	$this->load->model('Model_admin_login');
	
	$data_activity= array(
					
							'lead_id' => $lastid,
							'nxt_action' => $this->input->post('nxt_action'),
							'nxt_action_date' => $this->input->post('nxt_action_date'),
							//'communication' => $this->input->post('communication'),
							//'plan_nxt_activity' => $this->input->post('plan_nxt_activity'),
							
		      			);
	$sesio_activity = array(
					
							'comp_id' => $this->session->userdata('comp_id'),
							'divn_id' => $this->session->userdata('divn_id'),
							'zone_id' => $this->session->userdata('zone_id'),
							'brnh_id' => $this->session->userdata('brnh_id'),
							'maker_date'=> date('y-m-d'),
							'author_date'=> date('y-m-d')
						  );
		
		$dataall_activity = array_merge($data_activity,$sesio_activity);
		
		if($rowCheck > 0){
			$this->Model_admin_login->update_user($pri_col2,$table_name2,$id2,$dataall_activity);
		}else{
			$this->Model_admin_login->insert_user($table_name2,$dataall_activity);
		}
		
					$this->Model_admin_login->insert_user($table_name_log2,$dataall_activity);
					$this->db->query("update tbl_tour set tour_converted_status='Converted' where tour_id='$tour_id'");
					$this->session->set_flashdata('flash_msg', 'Record Added Successfully.');
		
	redirect('crm/Lead/manage_lead');
		
}



private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	
	
	public function bar()
	{
		//I'm just using rand() function for data example
		$temp = rand(10000, 99999);
		$this->set_barcode($temp);
	}

	
public function import_product(){

	
	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('Item/import-product');
}

else{
redirect('index');

}

}



public function import_item(){
 @extract($_POST);
 $filename=$_FILES["file"]["tmp_name"];
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($filename, "r");
	         while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
//select id of category
 $catId=$this->db->query("select *from tbl_prodcatg_mst where prodcatg_name='".$getData[1]."'");
 $catRow=$catId->row();

//select id of color
 $unitColor=$this->db->query("select *from tbl_master_data where keyvalue='".$getData[4]."'");
 $unitColor=$unitColor->row(); 

 
//select id of unit id
 $unitId=$this->db->query("select *from tbl_master_data where keyvalue='".$getData[2]."'");
 $unitRow=$unitId->row();
	         
if($getData[1]!='Category')
{
	           
			   $this->db->query("insert into tbl_product_stock set productname='".$getData[0]."',category='".$catRow->prodcatg_id."',usageunit='".$unitRow->serial_number."',size='".$getData[3]."',color='".$unitColor->serial_number."',unitprice_purchase='".$getData[5]."',unitprice_sale='".$getData[6]."',comp_id='".$this->session->userdata('comp_id')."'");
			   
}		
	         }
			 fclose($file);
		 }
	         //fclose($file);
echo "<script>
alert('Product Imported Successfully');




window.location.href = 'manage_item';


</script>";
			 
	 
//redirect('/master/manage_item');
	
}

public function view_all_data(){
	if($this->session->userdata('is_logged_in')){
	//$data['ID'] = $_GET['ID'];
		$this->load->view('view-all-data');
	}
	else
	{
	redirect('index');
	}
}


public function update_view_lead(){
	
	@extract($_POST);
	$leadid= $this->input->post('leadid');
	$status= $this->input->post('lead_status');
	//$cancel= $this->input->post('cancel');
	
	if($status=='Close')
	{
	 $this->db->query("update tbl_leads set lead_status=20 where lead_id='$leadid'");
	}
	
	else if($status=='Cancel')
	{
	 $this->db->query("update tbl_leads set lead_status=21 where lead_id='$leadid'");
	}
	
	redirect('crm/Lead/manage_lead');
}


}

?>