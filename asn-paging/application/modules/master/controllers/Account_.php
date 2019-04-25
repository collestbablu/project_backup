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
		
		$data= array(
					'first_name' => $this->input->post('first_name'),
					'group_name' => $this->input->post('maingroupname'),		       		'mobile' => $this->input->post('mobile'),
				    'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
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
		
		 $this->db->query("delete from tbl_contact_dtl where contact_id='$id'");	
		
		$data= array(
					'first_name' => $this->input->post('first_name'),
					'group_name' => $this->input->post('maingroupname'),		    
					'mobile' => $this->input->post('mobile'),
				    'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
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
$contactQuery=$this->db->query("select *from tbl_contact_m  ");
$getContact=$contactQuery->row();

echo $getContact->cft_air."^".$getContact->fov."^".$getContact->docket_charge."^".$getContact->cod_charge."^".$getContact->fuel_charge;
}
	
}










public function docket_list()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('status','A')
           -> get('tbl_docket_entry');
		   
		$i='0';
		
		foreach($res->result() as $row)
		{
	
		  $compQuery = $this -> db
           -> select('*')
           
           -> get('tbl_docket_entry');
		  $compRow = $compQuery->row();
		
			$info[$i]['1']=$row->first_name;
			$info[$i]['2']=$compRow->account_name;
			$info[$i]['3']=$row->email;
			$info[$i]['4']=$row->mobile;
			$info[$i]['5']=$row->contact_id;	
			$info[$i]['6']=$row->other_contact;		
				$i++;
			
		}
		return $info;
	
	}

















}
?>