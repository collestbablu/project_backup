<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Contact extends my_controller {

public function manage_contact(){

	if($this->session->userdata('is_logged_in')){
	
$data=$this->user_function();// call permission fnctn

		$this->load->view('/Contact/manage-contact',$data);
}
	else
	{
	redirect('/Contact/index');
	}
}

public function download_pdf_file()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Contact List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('/Contact/pdf_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}

public function add_contact(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('Contact/add-contact');
	}
	else
	{
	redirect('/Contact/index');
	}
}
public function updateContact(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('Contact/edit-contact');
	}
	else
	{
	redirect('/Contact/index');
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
					'first_name' => $this->input->post('primary_contact'),
					'state_id' => $this->input->post('state_id'),
					
					'address1' => $this->input->post('address'),
                 	'address3' => $this->input->post('address3'),
	 				'group_name' => $this->input->post('maingroupname'),
					'company_name' => $this->input->post('company_name'),	
					'code_name'	=> $this->input->post('code_name'),       
					'email' => $this->input->post('email'),
					'IT_Pan' => $this->input->post('it_pan'),
				    'lst' => $this->input->post('lst_no'),
					'cst' => $this->input->post('cst_no'),
	                'tin' => $this->input->post('tin_no'),
					'fax' => $this->input->post('fax'),
					'fax' => $this->input->post('state_id'),
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
	
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
	
		}else{
			$data= array(		
					'first_name' => $this->input->post('primary_contact'),
					'address1' => $this->input->post('address'),
                 	'address3' => $this->input->post('address3'),
	 				'group_name' => $this->input->post('maingroupname'),
					'state_id' => $this->input->post('state_id'),
					'company_name' => $this->input->post('company_name'),	
					'code_name'	=> $this->input->post('code_name'),       
					'email' => $this->input->post('email'),
					'IT_Pan' => $this->input->post('it_pan'),
				    'lst' => $this->input->post('lst_no'),
					'cst' => $this->input->post('cst_no'),
	                'tin' => $this->input->post('tin_no'),
					'fax' => $this->input->post('fax'),
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
	redirect('master/Contact/manage_contact');
	}
	}
}
public function insert_contact(){
	
		@extract($_POST);
		$table_name ='tbl_contact_m';
		$pri_col ='contact_id';
	 	$id= $this->input->post('contact_id');
		//echo  $this->input->post('DynamicTextBoxName');die;
		echo $numFields = count($_POST['fields']['pname']);
		
		for ($i = 0; $i < $numFields; $i++) {

    // Pack the field up in an array for ease-of-use.
   echo $_POST['fields']['pname'][$i];
  echo $_POST['fields']['pemail'][$i];
	echo $_POST['fields']['pmobile'][$i];			
				$data['contact_persons_name'] =$_POST['fields']['pname'][$i];	
				$data['contact_persons_emailid'] =$_POST['fields']['pemail'][$i];	
				$data['contact_persons_phone'] = $_POST['fields']['pmobile'][$i];
 
}
	
	
		$data= array(
					'first_name' => $this->input->post('first_name'),
					'ledgertype' => $this->input->post('ledgertype'),	
					'address1' => $address1,
                 	'address3' => $address3,
	 				'group_name' => $this->input->post('maingroupname'),
					'company_name' => $this->input->post('company_name'),	
					'code_name'	=> $this->input->post('code_name'),       
					'accunt' => $this->input->post('groupname'),
				     'alias' => $this->input->post('alias_name'),
					'printname' => $this->input->post('print_name'),
                 	'email' => $this->input->post('email'),
	                'phone' => $this->input->post('phone'),
					'station' => $this->input->post('station'),
	                'contact_person' => $this->input->post('contact_person'),
					'IT_Pan' => $this->input->post('it_pan'),
					'ward' => $this->input->post('ward'),
	                'lst' => $this->input->post('lst_no'),
					'cst' => $this->input->post('cst_no'),
	                'tin' => $this->input->post('tin_no'),
					'fax' => $this->input->post('fax'),
	                'opening_balance' => $this->input->post('op_bal'),
					 'previous_balance' => $this->input->post('prev_bal'),
					'transport' => $this->input->post('transport'),
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
		//echo "sss";die;
		if($id!=''){
		//echo "kk";die;
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_entr);
					
		            $table_name ='tbl_contact_m';
		            $pri_col ='contact_id';
	 	            $id= $this->input->post('contact_id');
		            $data= array(
					'first_name' => $this->input->post('first_name'),
					'address1' => $address1,
                 	'address3' => $address3,
					
					'ledgertype' => $this->input->post('ledgertype'),	
	 				'group_name' => $this->input->post('maingroupname'),
					'company_name' => $this->input->post('company_name'),	
					'code_name'	=> $this->input->post('code_name'),		       
					'accunt' => $this->input->post('groupname'),
				    'alias' => $this->input->post('alias_name'),
					'printname' => $this->input->post('print_name'),
                 	'email' => $this->input->post('email'),
	                'phone' => $this->input->post('phone'),
					'station' => $this->input->post('station'),
	                'contact_person' => $this->input->post('contact_person'),
					'IT_Pan' => $this->input->post('it_pan'),
					'ward' => $this->input->post('ward'),
	                'lst' => $this->input->post('lst_no'),
					'cst' => $this->input->post('cst_no'),
	                'tin' => $this->input->post('tin_no'),
					'fax' => $this->input->post('fax'),
	                'opening_balance' => $this->input->post('op_bal'),
					'previous_balance' => $this->input->post('prev_bal'),
					'transport' => $this->input->post('transport'),
	                'mobile' => $this->input->post('mobile')
					);
		
					//print_r ($data_entr);
					$table_name1 ='tbl_address_m';
		          	 $pri_col1 ='addressid';
	 	            $id1 = $this->input->post('adress_id');			

					$data1= array(					
								'address1' => $this->input->post('address1'),
								'address3' => $this->input->post('address3'),
								'City' => $this->input->post('City'),
								'state' => $this->input->post('state'),
								'country' => $this->input->post('country'),
								'Street' => $this->input->post('Street'),
								'pobox' => $this->input->post('pobox'),
								'zip' => $this->input->post('zip'),
								'description' => $this->input->post('textarea')
								);					
								$this->Model_admin_login->update_user($pri_col1,$table_name1,$id1,$data1);					
									//this data is for inserting in tbl_invoice_payment for opening balance
									
												
								
								echo "<script type='text/javascript'>";
								echo "window.close();";
								echo "window.opener.location.reload();";
								echo "</script>";
								}
							else
				     		{ 
							
							
							$this->Model_admin_login->insert_user($table_name,$data_entr);
							$lastid = $this->db->insert_id();
							if($popup=='True'){ //
							$name=$this->input->post('first_name'); 
				 //$this->insert_data($table_name,$data_entr);
				 $lastid = $this->db->insert_id();
				
				
				 $this->fillselect($name,$lastid,'contact_id_copy');
				}
				else{
					if($maingroupname=='8')
					{
		$ContactLastid=$lastid;
		$openingBal=$this->input->post('op_bal');
		$this->insertOpeningBal($ContactLastid,$openingBal);
					}		          
				  //$this->Model_admin_login->insert_user($table_name,$data1,$data);
					redirect('master/Contact/manage_contact');
				
	}
	}
	}
	
	function insertOpeningBal($ContactLastid,$openingBal)
	{
		
		$table_name='tbl_invoice_payment';
		$data= array(
					
					'contact_id' => $ContactLastid,
                 	'receive_billing_mount' => $openingBal,
	                'remarks' => 'Opening Balance',
                 	'comp_id' => $this->session->userdata('comp_id'),
					
					'date' =>  date('y-m-d'),
					
					'maker_id' => $this->session->userdata('user_id'),
					
					'maker_date'=> date('y-m-d'),
					'status'=> 'invoice'
					
						
					);
	$this->Model_admin_login->insert_user($table_name,$data);
			 return;
	
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
	    redirect('/index.php/Contact/manage_contact');
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