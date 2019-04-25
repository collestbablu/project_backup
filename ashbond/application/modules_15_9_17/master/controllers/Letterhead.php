<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Letterhead extends my_controller {

public function manage_letterhead(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('Letterhead/manage-letterhead',$data);
	}
	else
	{
	redirect('index');
	}
		
}


public function add_letterhead(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Letterhead/add-letterhead');
}
	else
	{
	redirect('index');
	}
}


public function download_pdf_file()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Letter Head List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('/Letterhead/pdf_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}


public function getproduct_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['main_menu'] = $_GET['con'];
		$this->load->view('Letterhead/getproduct',$data);
	}
	else
	{
	redirect('/Letterhead/index');
	}
}


public function getproductcont_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['con'] = $_GET['con'];
		$this->load->view('Letterhead/getcontact',$data);
	}
	else
	{
	redirect('/Letterhead/index');
	}
}

public function getcommunicationfun(){
	if($this->session->userdata('is_logged_in')){
	  $data['comm'] = $_GET['comm'];
		$this->load->view('Letterhead/getcommunicationpage',$data);
	}
	else
	{
	redirect('/Letterhead/index');
	}
}

public function getcontactper_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['id'] = $_GET['con'];
		$this->load->view('Letterhead/getcontactper',$data);
	}
	else
	{
	redirect('/Letterhead/index');
	}
}

public function insert_item(){
	
		@extract($_POST);
		$table_name ='tbl_letter_head';
		$pri_col ='id';
		$table_name_comm ='tbl_communication';
		$pri_col_comm ='communication_id';
	 	$id= $this->input->post('id');
		$ref=$this->input->post('refno');
		$com= $this->input->post('communication_name');
		$refno=$ref.$com;
		$data= array(
					'contact_id' => $this->input->post('contact_id'),
					'case_id' =>  $this->input->post('case_name'),
					'totalcaseid' =>  $this->input->post('totalcaseid'),
					'date' => $this->input->post('date'),
					'remark_name' => $this->input->post('remark_name'),
					'subject' => $this->input->post('subject'),
					'contact_person_id' => $this->input->post('person_name'),
					'refno' => $refno,
					'termandcondition' => $this->input->post('termandcondition'),
					'template' => $this->input->post('template'),
					'des' => $this->input->post('des')
					
						
					
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

	$this->load->model('Model_admin_login');
	
		if($id!=''){
					
	$this->db->query("update tbl_communication set date='".$this->input->post('date')."',remark_name='".$this->input->post('remark_name')."',subject='".$this->input->post('subject')."' where communication_type='letterhead' and updateid='$id'");
	
					$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
					
					$this->paymentAmountlog($lastHdrId,$case_name,$refno,$id);
					
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					}             
				else
				{
				
			
			 $this->Model_admin_login->insert_user($table_name,$dataall);
			 
			 $lastHdrId=$this->db->insert_id();	
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
					'communication_type' => 'letterhead'
						
					
		      	);
		
		$dataall22 = array_merge($datacomm,$sesio);
		$this->load->model('Model_admin_login');
		$this->Model_admin_login->insert_user($table_name_comm,$dataall22);
		$this->paymentAmountlog($lastHdrId,$case_name,$refno,$id);
			 redirect('master/Letterhead/manage_letterhead');
		
		
	}
	}

//========================================================================================================
public function paymentAmountlog($lastHdrId,$case_id,$ref_no,$id){
	
	$table_name='tbl_payment_log';
	$pri_col='p_id';
	date_default_timezone_set('Asia/Kolkata');
	$dataaee=date('Y-m-d H:i:s a');
	
	if($id!=''){
	$lastHdrId=$id;
	}
	else
	{
		$lastHdrId;
	}
	$data_pay = array(
	
					'all_id' => $lastHdrId,					
					'date' => $dataaee,
					'case_id' => $case_id,
					'ref_no' => $ref_no,
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'status' => 'letterhead'					
					
		);
	$this->load->model('Model_admin_login');
	if($id!=''){
	
	date_default_timezone_set('Asia/Kolkata');
	$datee=date('Y-m-d H:i:s a');
$mkrdate=date('y-m-d');
$this->db->query("update tbl_payment_log set all_id='". $lastHdrId."',case_id='".$case_id."',ref_no='". $ref_no."',date='$datee',maker_id='".$this->session->userdata('user_id')."',maker_date='$mkrdate',comp_id='".$this->session->userdata('comp_id')."',status='letterhead' where status='letterhead' and all_id='$id'");	
	}else{
		
	$this->Model_admin_login->insert_user($table_name,$data_pay);
	}	
	return paymentAmountlog; 
}


//========================================================================================================


public function view_letter_head(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Letterhead/view_letter_head');
}
	else
	{
	redirect('index');
	}
}
	
	
	
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
		$this->email->subject('Letter Head');
		$template = $this->load->view('Letterhead/view_letter_head', $data, true);
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

public function savedownloadFunction()

  { 

$data = [];

@extract($_POST);
		$ccmail=$this->input->post('ccemail');
		$iddd=$this->input->post('id');


 $url="assets/latter_head_pdf/letter_head".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('Letterhead/email', $data, true);



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
			 'id' => $this->input->post('id')
			 );
		$this->load->library('email', $config);
		$this->email->from('info@techvyaserp.in');
		$list = array('ashbond100@gmail.com', 'jyoti@ashbond.in');
		
		$this->email->to($list);
		 $this->email->cc($ccmail);
		 
		 $this->email->bcc('collestbablu@gmail.com');
		$this->email->subject('Letter Head');
		$this->email->message($template);
		 $this->email->attach($url);
		if ($this->email->send()) {
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


public function send_approval()
{
$id=$_GET['id'];

$selectQuery=$this->db->query("select *from tbl_approve_status where order_id='$id' ");
$selctcnt=$selectQuery->num_rows();
if($selctcnt>0)
{
$this->db->query("update tbl_letter_head set send_status='Sent' where id='$id'");
redirect('master/Letterhead/manage_letterhead');	
}
else
{

$this->db->query("insert into tbl_approve_status set type='Letter Head',order_id='$id'");
$this->db->query("update tbl_letter_head set send_status='Sent' where id='$id'");
redirect('master/Letterhead/manage_letterhead');	
}

}


}

?>