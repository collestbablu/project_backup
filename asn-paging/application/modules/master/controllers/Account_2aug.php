<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Account extends my_controller {

public function manage_contact(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('/Account/manage-contact',$data);
}
	else
	{
	redirect('index');
	}
}





public function manage_delivery(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('/Account/manage-delivery',$data);
}
	else
	{
	redirect('index');
	}
}




public function manage_edd_fail(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('/Account/manage-edd-fail',$data);
}
	else
	{
	redirect('index');
	}
}



public function manage_docket(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('/Account/manage-docket',$data);
}
	else
	{
	redirect('index');
	}
}


public function add_docket(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('/Account/add-docket',$data);
}
	else
	{
	redirect('index');
	}
}


public function update_docket(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('/Account/edit-docket',$data);
}
	else
	{
	redirect('index');
	}
}

public function contact_log(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('Account/contact-log',$data);
}
	else
	{
	redirect('index');
	}
}





public function contact_list()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('status','A')
           -> get('tbl_contact_m');
		   
		$i='0';
		
		foreach($res->result() as $row)
		{
	
		  $compQuery = $this -> db
           -> select('*')
           -> where('account_id',$row->group_name)
           -> get('tbl_account_mst');
		  $compRow = $compQuery->row();
		
			$info[$i]['1']=$row->first_name;
			$info[$i]['2']=$compRow->account_name;
			$info[$i]['3']=$row->email;
			$info[$i]['4']=$row->mobile;
			$info[$i]['5']=$row->contact_id;	
			$info[$i]['6']=$row->other_contact;
			$info[$i]['10']=$row->consignor_singal_id;
			
					
				$i++;
			
		}
		return $info;
	
	}
	

public function add_contact(){


	if($this->session->userdata('is_logged_in')){

 



		$this->load->view('Account/add-contact');
}
	else
	{
	redirect('index');
	}
}

public function update_contact(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Account/edit-contact');
	}
	else
	{
	redirect('index');
	}
}
	
public function getcommunicationfun(){
	if($this->session->userdata('is_logged_in')){
	  $data['comm'] = $_GET['comm'];
		$this->load->view('Account/add-consignor',$data);
	}
	else
	{
	redirect('index');
	}
}	


public function insert_contact(){
	
		@extract($_POST);
		$table_name ='tbl_contact_m';
		$table_name_dtl ='tbl_contact_dtl';
		$pri_col ='contact_id';
	 	$id= $this->input->post('contact_id');
		$total='0';
	 $oidVal = implode(",", $this->input->post('consignor_singal_id'));

		$data= array(
					'first_name' => $this->input->post('first_name'),
					'group_name' => $this->input->post('maingroupname'),	
		       		'mobile' => $this->input->post('mobile'),
				    'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'consignor_singal_id' => $oidVal,					
                 	'contact_from_date' => $this->input->post('contact_from_date'),
	                'contact_to_date' => $this->input->post('contact_to_date'),
					'other_contact' => $this->input->post('other_contact'),
	                'fov' => $this->input->post('fov'),
					'docket_charge' => $this->input->post('docket_charge'),
					'cod_charge' => $this->input->post('cod_charge'),
	                'fuel_charge' => $this->input->post('fuel_charge'),
					'cft_train' => $this->input->post('cft_train'),
	                'cft_surface' => $this->input->post('cft_surface'),
					'cft_air' => $this->input->post('cft_air'),
	                'min_weight_air' => $this->input->post('min_weight_air'),
					 'min_weight_train' => $this->input->post('min_weight_train'),
					'min_weight_surface' => $this->input->post('min_weight_surface'),
	                'goods' => $this->input->post('goods')
					
					
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
		
		
		$data_entr = array_merge($data,$sesio);
		
    	$this->load->model('Model_admin_login');
		//echo "sss";die;
		if($id!=''){
		//echo "kk";die;
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_entr);
									$lastHdrId=$this->db->insert_id();
												$this->software_log_insert($lastHdrId,$id,$total,'Contact Updated');
								
								echo "<script type='text/javascript'>";
								echo "window.close();";
								echo "window.opener.location.reload();";
								echo "</script>";
								}
							else
				     		{ 
							
							$this->Model_admin_login->insert_user($table_name,$data_entr);
							$lastid = $this->db->insert_id();
							if($maingroupname=='4')
							{
		$this->software_log_insert($lastid,$lastid,$total,'Consignee added');					
							}
							else
							{
								$this->software_log_insert($lastid,$lastid,$total,'Consignor added');
							}
							for($i=0; $i<=$rows; $i++)
				{
					if($frmOrg[$i]!=''){
					
					$data_dtl= array(
					'frmOrg' => $frmOrg[$i],
					'contact_id' => $lastid,
					'toOrg' => $toOrg[$i],
					'rateAir' => $rateAir[$i],
					'rateTrain' => $rateTrain[$i],
					'rateSurface' => $rateSurface[$i],
					'otherCharge' => $otherCharge[$i],
					'odaCharge' => $odaCharge[$i]
										
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
		
		
		$data_entr_dtl = array_merge($data_dtl,$sesio);

					
					
					
					
							$this->Model_admin_login->insert_user($table_name_dtl,$data_entr_dtl);	
					}
				}
							
							
					if($maingroupname=='8')
					{
		
					}		          
				  //$this->Model_admin_login->insert_user($table_name,$data1,$data);
					redirect('master/Account/manage_contact');
				
	}
	
	}
	

function updatecContact(){
	
	
	
		@extract($_POST);
		$table_name ='tbl_contact_m';
		$table_name_dtl ='tbl_contact_dtl';
		$pri_col ='contact_id';
	 	$id= $this->input->post('contact_id');
		$total='0';
		 $oidVal = implode(",", $this->input->post('consignor_singal_id'));
		 $this->db->query("delete from tbl_contact_dtl where contact_id='$id'");	
		
		$data= array(
					'first_name' => $this->input->post('first_name'),
					'group_name' => $this->input->post('maingroupname'),		    
					'mobile' => $this->input->post('mobile'),
				    'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'consignor_singal_id' => $oidVal,
                 	'contact_from_date' => $this->input->post('contact_from_date'),
	                'contact_to_date' => $this->input->post('contact_to_date'),
					'other_contact' => $this->input->post('other_contact'),
	                'fov' => $this->input->post('fov'),
					'docket_charge' => $this->input->post('docket_charge'),
					'cod_charge' => $this->input->post('cod_charge'),
	                'fuel_charge' => $this->input->post('fuel_charge'),
					'cft_train' => $this->input->post('cft_train'),
	                'cft_surface' => $this->input->post('cft_surface'),
					'cft_air' => $this->input->post('cft_air'),
	                'min_weight_air' => $this->input->post('min_weight_air'),
					 'min_weight_train' => $this->input->post('min_weight_train'),
					'min_weight_surface' => $this->input->post('min_weight_surface'),
	                'goods' => $this->input->post('goods')
					
					
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
		
		
		$data_entr = array_merge($data,$sesio);
		
    	$this->load->model('Model_admin_login');
	
							
							$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_entr);
							$lastid = $id;
							if($maingroupname=='4')
							{
		$this->software_log_insert($lastid,$lastid,$total,'Consignee Update');					
							}
							else
							{
								$this->software_log_insert($lastid,$lastid,$total,'Consignor Update');
							}
							for($i=0; $i<=$rows; $i++)
				{
					
					if($frmOrg[$i]!=''){
					
					$data_dtl= array(
					'frmOrg' => $frmOrg[$i],
					'contact_id' => $lastid,
					'toOrg' => $toOrg[$i],
					'rateAir' => $rateAir[$i],
					'rateTrain' => $rateTrain[$i],
					'rateSurface' => $rateSurface[$i],
					'otherCharge' => $otherCharge[$i],
					'odaCharge' => $odaCharge[$i]
										
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
		
		
		$data_entr_dtl = array_merge($data_dtl,$sesio);
			
							$this->Model_admin_login->insert_user($table_name_dtl,$data_entr_dtl);	
					}
				}
							
							
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
	}
	
	function delete_contact() {
	
	$table_name ='tbl_contact_m';
	$pri_col ='contact_id';
	$this->load->model('Model_admin_login');
		$id= $_GET['id'];
		
		// echo "select * from tbl_invoice_payment where contact_id='$id'"
		
		$querypayment= $this->db->query("select * from tbl_invoice_payment where contact_id='$id'");
		$fetchid=$querypayment->row();
		if($fetchid->contact_id!=''){
		?>	
		<script>
        	
			confirm("You can't delete it because this id is in tbl_invoice_payment"); 
			window.location.href='manage_contact';			
		
        </script>
        <?php	
		}
		
		//echo "select * from tbl_invoice_dtl where productid='$id'";
		
		$queryP=$this->db->query("select * from tbl_invoice_hdr where contactid='$id'");
		$fetchP=$queryP->row();
		
		
		if($fetchP->contactid!=''){
		?>			 
			<script> alert("please delete product in tbl_invoice_dtl table then you can delete this product:"); 
			window.location.href='manage_contact';
			</script>				 
				
		<?php			 
		}else{
		
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		
		$table_name1 ='tbl_address_m';
		$pri_col1 ='entityid';
		$this->load->model('Model_admin_login');
		$id= $_GET['id'];
		$this->Model_admin_login->delete_address($pri_col1,$table_name1,$id);
	    redirect('/index.php/Account/manage_contact');
}
}

public function firstfunction(){
	
		$data['firstid']=$_GET['firstid'];
		$this->load->view('get-alies-itemctg',$data);
	
	}
public function aliesnamefunction(){
	
		$data['aliesnameid']=$_GET['aliesnameid'];
		$this->load->view('get-alies-itemctg',$data);
	
	}

public function getConsinor(){
	

$data['consin']=$_GET['type'];
$this->load->view('Account/get-consiner',$data);
	
}


public function getconsinee(){
	

$contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='".$_GET['type']
."'");
$getContact=$contactQuery->row();

echo $getContact->email."^".$getContact->mobile;

	
}


public function getModeFee(){
	
if($_GET['type']=='Air')
{
$contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='".$_GET['contId']."'   ");
$getContact=$contactQuery->row();

$contactDtlQuery=$this->db->query("select *from tbl_contact_dtl where contact_id='".$_GET['contId']."' and frmOrg='".$_GET['orgi']."' and toOrg='".$_GET['desi']."' ");
$getDtlContact=$contactDtlQuery->row();


echo $getContact->cft_air."^".$getContact->fov."^".$getContact->docket_charge."^".$getContact->cod_charge."^".$getContact->fuel_charge."^".$getDtlContact->rateAir."^".$getContact->goods."^".$getContact->min_weight_air."^".$getDtlContact->otherCharge."^".$getDtlContact->odaCharge;
}
	



if($_GET['type']=='Train')
{
$contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='".$_GET['contId']."'  ");
$getContact=$contactQuery->row();

$contactDtlQuery=$this->db->query("select *from tbl_contact_dtl where contact_id='".$_GET['contId']."' and frmOrg='".$_GET['orgi']."' and toOrg='".$_GET['desi']."' ");
$getDtlContact=$contactDtlQuery->row();


echo $getContact->cft_train."^".$getContact->fov."^".$getContact->docket_charge."^".$getContact->cod_charge."^".$getContact->fuel_charge."^".$getDtlContact->rateTrain."^".$getContact->goods."^".$getContact->min_weight_train."^".$getDtlContact->otherCharge."^".$getDtlContact->odaCharge;
}




if($_GET['type']=='Surface')
{
$contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='".$_GET['contId']."'  ");
$getContact=$contactQuery->row();

$contactDtlQuery=$this->db->query("select *from tbl_contact_dtl where contact_id='".$_GET['contId']."' and frmOrg='".$_GET['orgi']."' and toOrg='".$_GET['desi']."' ");
$getDtlContact=$contactDtlQuery->row();


echo $getContact->cft_surface."^".$getContact->fov."^".$getContact->docket_charge."^".$getContact->cod_charge."^".$getContact->fuel_charge."^".$getDtlContact->rateSurface."^".$getContact->goods."^".$getContact->min_weight_surface."^".$getDtlContact->otherCharge."^".$getDtlContact->odaCharge;
}






}









public function docket_list()
    {
        $info=array();
        /*
        $res = $this -> db
           -> select('*')
           -> where('status','A')
		   -> where('status','A')
           -> get('tbl_docket_entry');
         */
		 $res=$this->db->query("select *from tbl_docket_entry where status='A' and booked_status='Booked' or booked_status='Intransit' or booked_status='Not Delivered'");
		   
        $i='0';
        
        foreach($res->result() as $row)
        {
    
           $compQuery = $this -> db
           -> select('*')
           -> where('serial_number',$row->destination)
           -> get('tbl_master_data');
          $compRow = $compQuery->row();
          
          $compQueryyy = $this -> db
           -> select('*')
           -> where('serial_number',$row->origin)
           -> get('tbl_master_data');
          $compRowww = $compQueryyy->row();
          
          $compQuery1 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignor)
           -> get('tbl_contact_m');
          $compRow1 = $compQuery1->row();
          
          $compQuery11 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignee)
           -> get('tbl_contact_m');
          $compRow11 = $compQuery11->row();
          
          
            $info[$i]['1']=$row->booking_date;
            $info[$i]['2']=$row->docket_no;
            $info[$i]['3']=$compRow1->first_name;
            $info[$i]['4']=$compRow11->first_name;
            $info[$i]['5']=$compRowww->keyvalue;
            $info[$i]['6']=$compRow->keyvalue;    
            $info[$i]['7']=$row->no_of_package;
            $info[$i]['8']=$row->mode_of_payment;
			$info[$i]['9']=$row->edd;
            $info[$i]['12']=$row->booked_status;
            $info[$i]['13']=$row->id;        
                $i++;
            
        }
        return $info;
    
    }




public function docket_list_edd_fail()
    {
        $info=array();
        /*
        $res = $this -> db
           -> select('*')
           -> where('status','A')
		   -> where('status','A')
           -> get('tbl_docket_entry');
         */
		 $res=$this->db->query("select *from tbl_docket_entry where status='A' and booked_status!='Delivered' ");
		   
        $i='0';
        
        foreach($res->result() as $row)
        {
    
           $compQuery = $this -> db
           -> select('*')
           -> where('serial_number',$row->destination)
           -> get('tbl_master_data');
          $compRow = $compQuery->row();
          
          $compQueryyy = $this -> db
           -> select('*')
           -> where('serial_number',$row->origin)
           -> get('tbl_master_data');
          $compRowww = $compQueryyy->row();
          
          $compQuery1 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignor)
           -> get('tbl_contact_m');
          $compRow1 = $compQuery1->row();
          
          $compQuery11 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignee)
           -> get('tbl_contact_m');
          $compRow11 = $compQuery11->row();
          
          
            $info[$i]['1']=$row->booking_date;
            $info[$i]['2']=$row->docket_no;
            $info[$i]['3']=$compRow1->first_name;
            $info[$i]['4']=$compRow11->first_name;
            $info[$i]['5']=$compRowww->keyvalue;
            $info[$i]['6']=$compRow->keyvalue;    
            $info[$i]['7']=$row->no_of_package;
            $info[$i]['8']=$row->mode_of_payment;
			$info[$i]['9']=$row->edd;
            $info[$i]['12']=$row->booked_status;
            $info[$i]['13']=$row->id;        
                $i++;
            
        }
        return $info;
    
    }








public function docket_list_deliver()
    {
        $info=array();
        /*
        $res = $this -> db
           -> select('*')
           -> where('status','A')
		   -> where('status','A')
           -> get('tbl_docket_entry');
         */
		 $res=$this->db->query("select *from tbl_docket_entry where status='A' and booked_status='Delivered' ");
		   
        $i='0';
        
        foreach($res->result() as $row)
        {
    
           $compQuery = $this -> db
           -> select('*')
           -> where('serial_number',$row->destination)
           -> get('tbl_master_data');
          $compRow = $compQuery->row();
          
          $compQueryyy = $this -> db
           -> select('*')
           -> where('serial_number',$row->origin)
           -> get('tbl_master_data');
          $compRowww = $compQueryyy->row();
          
          $compQuery1 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignor)
           -> get('tbl_contact_m');
          $compRow1 = $compQuery1->row();
          
          $compQuery11 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignee)
           -> get('tbl_contact_m');
          $compRow11 = $compQuery11->row();
          
          
            $info[$i]['1']=$row->booking_date;
            $info[$i]['2']=$row->docket_no;
            $info[$i]['3']=$compRow1->first_name;
            $info[$i]['4']=$compRow11->first_name;
            $info[$i]['5']=$compRowww->keyvalue;
            $info[$i]['6']=$compRow->keyvalue;    
            $info[$i]['7']=$row->no_of_package;
            $info[$i]['8']=$row->mode_of_payment;
			$info[$i]['9']=$row->edd;
            $info[$i]['12']=$row->booked_status;
            $info[$i]['13']=$row->id;        
			$info[$i]['18']=$row->shipment_delivered_on;
			        $info[$i]['19']=$row->shipment_delivered_on_time;
					$info[$i]['20']=$row->remarkss;
			
                $i++;
            
        }
        return $info;
    
    }


public function insert_docket()
{
		@extract($_POST);
		$table_name ='tbl_docket_entry';
		$table_name_dtl ='tbl_docket_entry_dtl';
		
	 	
		$total='0';
		
		$data= array(
					'docket_no' => $this->input->post('docket_no'),
					'consignor' => $this->input->post('consignor'),
					'consignee' => $this->input->post('consignee'),		
					       		
					'origin' => $this->input->post('origin'),
				    'destination' => $this->input->post('destination'),
					'consignor_mobile' => $this->input->post('consignor_mobile'),
                 	'consignor_email_id' => $this->input->post('consignor_email_id'),
	                'consignee_mobile' => $this->input->post('consignee_mobile'),
					'consignee_email_id' => $this->input->post('consignee_email_id'),
	                'mode' => $this->input->post('mode'),
					'no_of_package' => $this->input->post('no_of_package'),
					'goods' => $this->input->post('goods'),
	                'actual_weight' => $this->input->post('actual_weight'),
					'dimension_weight' => $this->input->post('dimension_weight'),
	                'invoice_value' => $this->input->post('invoice_value'),
					'customer_invoice_no' => $this->input->post('customer_invoice_no'),
	                'rate' => $this->input->post('rate'),
					 'mode_of_payment' => $this->input->post('mode_of_payment'),
					'booking_date' => $this->input->post('booking_date'),
	                'edd' => $this->input->post('edd'),
					'frieght_charge' => $this->input->post('frieght_charge'),
					'fov' => $this->input->post('fov'),
					'docket_charge' => $this->input->post('docket_charge'),
					'minimum_weight' => $this->input->post('minimum_weight'),
					'other_charges' => $this->input->post('other_charges'),
					'dod_cod_charge' => $this->input->post('dod_cod_charge'),
					'fuel_charge' => $this->input->post('fuel_charge'),
					'oda_charge' => $this->input->post('oda_charge'),
					'total_amount' => $this->input->post('total_amount'),
					'chargeable_weight' => $this->input->post('chargeable_weight'),
					'gst' => $this->input->post('gst'),
					'other_tax' => $this->input->post('other_tax'),
					'grand_total' => $this->input->post('grand_total'),
					'remarks' => $this->input->post('remarks'),
					'sgst' => $this->input->post('sgst')
					
					
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
				$data_entr = array_merge($data,$sesio);
		    	$this->load->model('Model_admin_login');
		
				$this->Model_admin_login->insert_user($table_name,$data_entr);
				$lastid = $this->db->insert_id();
				$this->software_log_insert($lastid,$lastid,$total,'Docket added');
	
						for($i=0; $i<=$rows; $i++)
						{
							if($length[$i]!=''){
							$data_dtl= array(
											'length' => $length[$i],
											'docket_id' => $lastid,
											'width' => $width[$i],
											'height' => $height[$i],
											'cftAir' => $cftAir[$i],
											'qty' => $qty[$i],
											'total' => $totalname[$i],
											
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
		
		
											$data_entr_dtl = array_merge($data_dtl,$sesio);

												$this->Model_admin_login->insert_user($table_name_dtl,$data_entr_dtl);	
					}
				}
				
				//  $this->Model_admin_login->insert_user($table_name,$data1,$data);
				  
				  
				  
				  
				  $config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'wordwrap' => TRUE
		);
		$sub='Regarding AWB-'.$docket_no;
		$connor=$this->input->post('consignor_email_id');
		$conee=$this->input->post('consignee_email_id');
		$list = array($connor, $conee);


		$this->load->library('email', $config);
		$this->email->from('info@techvyaserp.in');
		$this->email->to($list);
	 $this->email->bcc('collestbablu@gmail.com'); 
		$this->email->subject($sub);
		$template = $this->load->view('Account/mail-page', $data, true);
		$this->email->message($template);
		if ($this->email->send()) {
		
		
				redirect('master/Account/manage_docket');
		} else {
			redirect('master/Account/manage_docket');
		}
				
				
	}

//=================	

public function update_docket_insert()
{
		@extract($_POST);
		$table_name ='tbl_docket_entry';
		$table_name_dtl ='tbl_docket_entry_dtl';
		$pri_col ='id';
		$id= $this->input->post('contact_id');
		
		 $this->db->query("delete from tbl_docket_entry_dtl where docket_id='$id'");	
		
	 	
		$total='0';
		
		$data= array(
					'docket_no' => $this->input->post('docket_no'),
					'consignor' => $this->input->post('consignor'),
					'consignee' => $this->input->post('consignee'),		
					       		
					'origin' => $this->input->post('origin'),
				    'destination' => $this->input->post('destination'),
					'consignor_mobile' => $this->input->post('consignor_mobile'),
                 	'consignor_email_id' => $this->input->post('consignor_email_id'),
	                'consignee_mobile' => $this->input->post('consignee_mobile'),
					'consignee_email_id' => $this->input->post('consignee_email_id'),
	                'mode' => $this->input->post('mode'),
					'no_of_package' => $this->input->post('no_of_package'),
					'goods' => $this->input->post('goods'),
	                'actual_weight' => $this->input->post('actual_weight'),
					'dimension_weight' => $this->input->post('dimension_weight'),
	                'invoice_value' => $this->input->post('invoice_value'),
					'customer_invoice_no' => $this->input->post('customer_invoice_no'),
	                'rate' => $this->input->post('rate'),
					 'mode_of_payment' => $this->input->post('mode_of_payment'),
					'booking_date' => $this->input->post('booking_date'),
	                'edd' => $this->input->post('edd'),
					'frieght_charge' => $this->input->post('frieght_charge'),
					'fov' => $this->input->post('fov'),
					'docket_charge' => $this->input->post('docket_charge'),
					'minimum_weight' => $this->input->post('minimum_weight'),
					'other_charges' => $this->input->post('other_charges'),
					'dod_cod_charge' => $this->input->post('dod_cod_charge'),
					'fuel_charge' => $this->input->post('fuel_charge'),
					'oda_charge' => $this->input->post('oda_charge'),
					'total_amount' => $this->input->post('total_amount'),
					'chargeable_weight' => $this->input->post('chargeable_weight'),
					'gst' => $this->input->post('gst'),
					'other_tax' => $this->input->post('other_tax'),
					'grand_total' => $this->input->post('grand_total'),
					'remarks' => $this->input->post('remarks'),
					'sgst' => $this->input->post('sgst')
					
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
				$data_entr = array_merge($data,$sesio);
		    	$this->load->model('Model_admin_login');
		
				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_entr);
				
				$lastid=$id;
				$this->software_log_insert($lastid,$lastid,$total,'Docket Update');
	
						for($i=0; $i<=$rows; $i++)
						{
							if($length[$i]!=''){
							$data_dtl= array(
											'length' => $length[$i],
											'docket_id' => $lastid,
											'width' => $width[$i],
											'height' => $height[$i],
											'cftAir' => $cftAir[$i],
											'qty' => $qty[$i],
											'total' => $totalname[$i],
											
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
		
		
											$data_entr_dtl = array_merge($data_dtl,$sesio);

												$this->Model_admin_login->insert_user($table_name_dtl,$data_entr_dtl);	
					}
				}
			
				  
				
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
				
				
	}
//==============
public function print_docket()
{
	
	$this->load->view("Account/print.php");
	
}

public function delivery_mail(){
  		
		 $data=$_GET['comm'];
		//echo $data;die;
		$ex=explode("^",$data);
		 $upstatus=$ex[0];
		 $upstatus_id=$ex[1];
		 $shipment_delivered_on=$ex[2];
		 $shipment_delivered_on_time=$ex[3];
		 $remarkss=$ex[4];
		 
		if($upstatus=="Intransit" or $upstatus=="OFD" or $upstatus=='Not Delivered Return'){
			$this->db->query("update tbl_docket_entry set booked_status='$upstatus',shipment_delivered_on='$shipment_delivered_on',shipment_delivered_on_time='$shipment_delivered_on_time',remarkss='$remarkss' where id='$upstatus_id'");
			redirect('master/Account/manage_docket');
		}else{
			
			$this->db->query("update tbl_docket_entry set booked_status='$upstatus',shipment_delivered_on='$shipment_delivered_on',shipment_delivered_on_time='$shipment_delivered_on_time',remarkss='$remarkss' where id='$upstatus_id'");
			
		$qry=$this->db->query("select * from tbl_docket_entry where id='$upstatus_id'");
		$fetchdata=$qry->row();
		$connor=$fetchdata->consignor_email_id;
		$conee=$fetchdata->consignee_email_id;
		$dataaa=array( 'id' => $fetchdata->id);
		
				  $config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'wordwrap' => TRUE
		);
		
		$list = array($connor, $conee);

		$this->load->library('email', $config);
		$this->email->from('info@techvyaserp.in');
		$this->email->to($list);
		 $this->email->bcc('collestbablu@gmail.com'); 
		 $sub='Regarding AWB'.$fetchdata->docket_no;
		$this->email->subject($sub);
		$template = $this->load->view('Account/mail-page-booked-status', $dataaa, true);
		$this->email->message($template);
		if ($this->email->send()) {
		
		
				redirect('master/Account/manage_docket');
		} else {
			redirect('master/Account/manage_docket');
		}
		
		}
				
}


public function manage_not_delivery_or_return(){

    if($this->session->userdata('is_logged_in')){
    
$data=$this->user_function();// call permission fnctn

        $this->load->view('/Account/manage-not-delivery-or-return',$data);
}
    else
    {
    redirect('index');
    }
}


public function manage_booked(){

    if($this->session->userdata('is_logged_in')){
    
$data=$this->user_function();// call permission fnctn

        $this->load->view('/Account/manage-booked',$data);
}
    else
    {
    redirect('index');
    }
}


public function docket_list_not_deliver_return()
    {
        $info=array();
        /*
        $res = $this -> db
           -> select('*')
           -> where('status','A')
           -> where('status','A')
           -> get('tbl_docket_entry');
         */
         $res=$this->db->query("select *from tbl_docket_entry where status='A' and booked_status='Not Delivered Return' ");
          
        $i='0';
        
       foreach($res->result() as $row)
        {
    
          $compQuery = $this -> db
           -> select('*')
           -> where('serial_number',$row->destination)
           -> get('tbl_master_data');
          $compRow = $compQuery->row();
          
         $compQueryyy = $this -> db
           -> select('*')
           -> where('serial_number',$row->origin)
           -> get('tbl_master_data');
          $compRowww = $compQueryyy->row();
          
         $compQuery1 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignor)
           -> get('tbl_contact_m');
          $compRow1 = $compQuery1->row();
          
         $compQuery11 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignee)
           -> get('tbl_contact_m');
          $compRow11 = $compQuery11->row();
          
         
           $info[$i]['1']=$row->booking_date;
            $info[$i]['2']=$row->docket_no;
            $info[$i]['3']=$compRow1->first_name;
            $info[$i]['4']=$compRow11->first_name;
            $info[$i]['5']=$compRowww->keyvalue;
            $info[$i]['6']=$compRow->keyvalue;    
           $info[$i]['7']=$row->no_of_package;
            $info[$i]['8']=$row->mode_of_payment;
            $info[$i]['9']=$row->edd;
            $info[$i]['12']=$row->booked_status;
            $info[$i]['13']=$row->id;        
               $i++;
            
       }
        return $info;
    
   }



public function docket_list_booked()
    {
        $info=array();
        /*
        $res = $this -> db
           -> select('*')
           -> where('status','A')
           -> where('status','A')
           -> get('tbl_docket_entry');
         */
         $res=$this->db->query("select *from tbl_docket_entry where status='A' and booked_status='Booked'");
          
        $i='0';
        
       foreach($res->result() as $row)
        {
    
          $compQuery = $this -> db
           -> select('*')
           -> where('serial_number',$row->destination)
           -> get('tbl_master_data');
          $compRow = $compQuery->row();
          
         $compQueryyy = $this -> db
           -> select('*')
           -> where('serial_number',$row->origin)
           -> get('tbl_master_data');
          $compRowww = $compQueryyy->row();
          
         $compQuery1 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignor)
           -> get('tbl_contact_m');
          $compRow1 = $compQuery1->row();
          
         $compQuery11 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignee)
           -> get('tbl_contact_m');
          $compRow11 = $compQuery11->row();
          
         
           $info[$i]['1']=$row->booking_date;
            $info[$i]['2']=$row->docket_no;
            $info[$i]['3']=$compRow1->first_name;
            $info[$i]['4']=$compRow11->first_name;
            $info[$i]['5']=$compRowww->keyvalue;
            $info[$i]['6']=$compRow->keyvalue;    
           $info[$i]['7']=$row->no_of_package;
            $info[$i]['8']=$row->mode_of_payment;
            $info[$i]['9']=$row->edd;
            $info[$i]['12']=$row->booked_status;
            $info[$i]['13']=$row->id;        
               $i++;
            
       }
        return $info;
    
}
}
?>