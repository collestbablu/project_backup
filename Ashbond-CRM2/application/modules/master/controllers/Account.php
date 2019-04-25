<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Account extends my_controller {

function __construct()
{
	parent::__construct();
	$this->load->library('pagination');
	$this->load->model('model_master');
}

public function manage_contact()
{
	if($this->session->userdata('is_logged_in'))
	{
		//$data=$this->user_function();// call permission fnctn
		//$data['result'] = $this->model_master->contact_data();
		$data =  $this->manage_contactJoin();
		$this->load->view('/Account/manage-contact',$data);
	}
	else
	{
		redirect('index');
	}
}

function manage_contactJoin()
{
  	  $data['result'] = "";
	  ////Pagination start ///
      $table_name  = 'tbl_contact_m';
	  $url        = site_url('/master/Account/manage_contact?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_master->count_contact($table_name,'A',$this->input->get());
      //$showEntries= $_GET['entries']?$_GET['entries']:'12';
      if($_GET['entries']!="")
	  {
         $showEntries = $_GET['entries'];
         $url     = site_url('/master/Account/manage_contact?entries='.$_GET['entries']);
      }
      $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     //////Pagination end ///
   
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     //$data['result']            = $this->model_master->contact_get($pagination['per_page'],$pagination['page']);	
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_master->filterContactList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_master->contact_get($pagination['per_page'],$pagination['page']);
			
     return $data;
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


public function contact_log_pay(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('Account/contact-log-pay',$data);
}
	else
	{
	redirect('index');
	}
}



public function contact_list_pay()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('group_name','5')
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
			$info[$i]['6']=$row->phone;		
				$i++;
			
		}
		return $info;
	
	}
	
public function contact_list()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('group_name','4')
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
			$info[$i]['6']=$row->phone;		
				$i++;
			
		}
		return $info;
	
	}	

public function contact_list_m()
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
			$info[$i]['6']=$row->phone;		
				$i++;
			
		}
		return $info;
	
	}	

public function add_contact()
{
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('Account/add-contact');
	}
	else
	{
		redirect('index');
	}
}

public function view_contact()
{
	if($this->session->userdata('is_logged_in'))
	{	
		$data=$_GET['ID'];
		$this->load->view('Account/view-contact',$data);
	}
	else
	{
		redirect('index');
	}
}


public function updatecontact()
{
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('Account/edit-contact');
	}
	else
	{
		redirect('index');
	}
}
	
public function insert_test(){	
		
		@extract($_POST);
		$table_name ='tbl_contact_m';
		$table_name_dtl='tbl_contact_person';
		$pri_col ='contact_id';
		$pri_col_dtl ='person_id';
	 	$id= $this->input->post('contact_id');
		$popcloses=$this->input->post('popclose');
		
		if($id!=''){
		
			
		$data= array(		
					'first_name' => $this->input->post('first_name'),
	 				'group_name' => $this->input->post('maingroupname'),		       
	                
					'contact_person' => $this->input->post('primary_contact'),
					'email' => $this->input->post('email'),
					
	                'mobile' => $this->input->post('mobile'),
					'fax' => $this->input->post('fax'),
					
					'code_name' => $this->input->post('code'),
					'state_id' => $this->input->post('state_id'),

					'address1' => $this->input->post('address1')

					//'gst' => $this->input->post('gst_no'),
					//'address3' => $address3,
					//'IT_Pan' => $this->input->post('it_pan'),	
	                //'opening_balance' => $this->input->post('open_bal'),					
					//'currency' => $this->input->post('currency'),
					//'currency' => $this->input->post('currency'),
						
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
		
		$namecont=count($val);
		for ($i = 0; $i < $namecont; $i++) {
					
					$con_id=$this->input->post('contact_person_id')[$i];
					
					$queryconPer=$this->db->query("select * from tbl_contact_person where contact_id='$id' and person_id='$con_id'");
					$num= $queryconPer->num_rows();
					
					if($num >0)
				{
				
			$this->db->query("update tbl_contact_person set customer_id='".$this->input->post('maingroupname')."',contact_id='$id', p_name='$val[$i]',p_email='$valemail[$i]',p_phone='$valmobile[$i]',designation='$desi[$i]',maker_id='".$this->session->userdata('user_id')."',maker_date='".$this->input->post('date_name')."',author_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."' where contact_id='$id' and person_id='$con_id'");
			
						
				}else{
	
					
					$data_dtl['customer_id']=$this->input->post('maingroupname');
					$data_dtl['contact_id']=$id;
					$data_dtl['p_name']=$val[$i];
					$data_dtl['p_email']=$valemail[$i];
					$data_dtl['p_phone']=$valmobile[$i];
					$data_dtl['designation']=$desi[$i];
					$data_dtl['maker_id']=$this->session->userdata('user_id');
					$data_dtl['maker_date'] =$this->input->post('date_name');
					$data_dtl['author_date'] = date('y-m-d');
					$data_dtl['comp_id']=$this->session->userdata('comp_id');
					$data_dtl['zone_id']=$this->session->userdata('zone_id');
					$data_dtl['brnh_id']=$this->session->userdata('brnh_id');

				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				}
			}
	
					$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
					redirect('master/Account/manage_contact');
	
		}else{
			$data= array(		
					'first_name' => $this->input->post('first_name'),
	 				'group_name' => $this->input->post('maingroupname'),
					
					'contact_person' => $this->input->post('primary_contact'),		       
					'email' => $this->input->post('email'),
					
					'mobile' => $this->input->post('mobile'),
					'fax' => $this->input->post('fax'),

					'code_name' => $this->input->post('code'),
					'state_id' => $this->input->post('state_id'),
					
					'address1' => $this->input->post('address1')
					
	                //'currency' => $this->input->post('currency'),
	                //'address3' => $address3,
					//'IT_Pan' => $this->input->post('it_pan'),
	                //'gst' => $this->input->post('gst_no'),
	                //'opening_balance' => $this->input->post('open_bal'),
					//'currency' => $this->input->post('currency'),
	                
						
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
		$customer=$this->input->post('maingroupname');
	
		 $namecont=count($val);
for ($i = 0; $i < $namecont; $i++) {

				
					$data_dtl['customer_id']=$this->input->post('maingroupname');
					$data_dtl['contact_id']=$lastid;
					$data_dtl['p_name']=$val[$i];
					$data_dtl['p_email']=$valemail[$i];
					$data_dtl['p_phone']=$valmobile[$i];
					$data_dtl['designation']=$desi[$i];
					$data_dtl['maker_id']=$this->session->userdata('user_id');
					$data_dtl['maker_date'] =$this->input->post('date_name');
					$data_dtl['author_date'] = date('y-m-d');
					$data_dtl['comp_id']=$this->session->userdata('comp_id');
					$data_dtl['zone_id']=$this->session->userdata('zone_id');
					$data_dtl['brnh_id']=$this->session->userdata('brnh_id');

				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);

		}
		
		if($popcloses=='add'){
			echo "<script type='text/javascript'>";
			echo "window.close();";
			echo "window.opener.location.reload();";
			echo "</script>";
			}else{
					$this->session->set_flashdata('flash_msg', 'Record Added Successfully.');
					redirect('master/Account/manage_contact');
	}
	}
}


public function insert_contact(){
	
		@extract($_POST);
		//print_r($_POST);
		$table_name ='tbl_contact_m';
		$pri_col ='contact_id';
	 	$id= $this->input->post('contact_id');

		$data= array(
					'first_name' => $this->input->post('first_name'),
	 				'group_name' => $this->input->post('maingroupname'),
					
					'contact_person' => $this->input->post('primary_contact'),		       
					'email' => $this->input->post('email'),
					
					'mobile' => $this->input->post('mobile'),
					'fax' => $this->input->post('fax'),

					'code_name' => $this->input->post('code'),
					'state_id' => $this->input->post('state_id'),
					
					'address1' => $this->input->post('address1')
					
					
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
		
		echo "";
		
		?>
		<select name="contact_id" id="contact_id"   class="form-control ui fluid search dropdown email">
			<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_contact_m  ");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
			<option value="<?php echo $fetchgroup->contact_id; ?>" ><?php echo $fetchgroup->first_name ; ?></option>
		<!--<option value="<?php echo $fetchgroup->contact_id; ?>"<?php if($fetchgroup->contact_id==$lastid){?>selected<?php }?>><?php echo $fetchgroup->first_name; ?></option>-->
    				<?php } ?>
		</select>

		<?php 

		/*$lastid = $this->db->insert_id();
							
		$this->software_log_insert($lastid,$lastid,$total,'Contact added');
		
								
						
					if($maingroupname=='4')
					{
						$ContactLastid=$lastid;
						$openingBal=$this->input->post('open_bal');
						$this->insertOpeningBal($ContactLastid,$openingBal);
					}		          
					
				  //$this->Model_admin_login->insert_user($table_name,$data1,$data);
				  if($popup=='True'){
						$this->fillselect($first_name,$lastid,$field='contact_id_copy');
								echo "<script type='text/javascript'>";
								echo "window.close();";
								//echo "window.opener.location.reload();";
								echo "</script>";
					}else{
					$this->session->set_flashdata('flash_msg', 'Record Added Successfully.');
					redirect('master/Account/manage_contact');
					}*/
	
}


public function update_contact(){
	
		@extract($_POST);
		$table_name ='tbl_contact_m';
		$pri_col ='contact_id';
	 	$id= $this->input->post('contact_id');
		$count=count($id);
		$total='0';

		$data= array(
					'first_name' => $this->input->post('first_name'),
					'address1' => $address1,
                 	'address3' => $address3,
	 				'group_name' => $this->input->post('maingroupname'),		       
					'email' => $this->input->post('email'),
	                'phone' => $this->input->post('phone'),
	                'contact_person' => $this->input->post('contact_person'),
					'IT_Pan' => $this->input->post('it_pan'),
	                'gst' => $this->input->post('gst_no'),
					'state_id' => $this->input->post('state_id'),
					'fax' => $this->input->post('fax'),
	                'opening_balance' => $this->input->post('open_bal'),
					'currency' => $this->input->post('currency'),
	                'mobile' => $this->input->post('mobile')
					
					
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
							//this data is for inserting in tbl_invoice_payment for opening balance
									$openingBal=$this->input->post('open_bal')[$i];
										$lastHdrId=$this->db->insert_id();
												//$this->software_log_insert($lastHdrId,$idE,$total,'Contact Updated');
											//$this->insertOpeningBal($idE,$openingBal);

		$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');						
		redirect('master/Account/manage_contact');						
	
	}
	
	function insertOpeningBal($ContactLastid,$openingBal)
	{
		
		$table_name='tbl_invoice_payment';
		//echo $ContactLastid.",".$openingBal;die;
		$query=$this->db->query("select * from tbl_invoice_payment where contact_id='$ContactLastid' and status='Opening Balance'");
		$rows=$query->num_rows();
		if($rows>0){
		//echo "vdfvd";die;
			$querypayment= $this->db->query("update tbl_invoice_payment set receive_billing_mount='$openingBal' where contact_id='$ContactLastid' and status='Opening Balance'");
		}else{
		//echo $ContactLastid;die;
		$data= array(
					
					'contact_id' => $ContactLastid,
                 	'receive_billing_mount' => $openingBal,
	                'status' => 'Opening Balance',
                 	'comp_id' => $this->session->userdata('comp_id'),
					
					'date' =>  date('y-m-d'),
					
					'maker_id' => $this->session->userdata('user_id'),
					
					'maker_date'=> date('y-m-d'),
					
					
						
					);
				$this->Model_admin_login->insert_user($table_name,$data);
			 return;
		}
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

}
?>