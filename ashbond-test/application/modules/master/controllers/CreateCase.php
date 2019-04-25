<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class CreateCase extends my_controller {

public function manage_case(){

	if($this->session->userdata('is_logged_in')){
	


		$this->load->view('/CreateCase/manage-case');
}
	else
	{
	redirect('/CreateCase/index');
	}
}

public function download_pdf_file_case()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Case List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('/CreateCase/pdf_case_file', $data, true);

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
		$this->load->view('CreateCase/getproduct',$data);
	}
	else
	{
	redirect('/CreateCase/index');
	}
}

public function add_case(){


	if($this->session->userdata('is_logged_in')){

		$this->load->view('CreateCase/add-case');
}
else
{
	redirect('/Case/index');
	}
}

public function actionfunopen(){
$id=$_GET['id'];
$this->db->query("update tbl_new_case set action_status='Budgetary-Offer-Sent' where new_case_id='$id'");
redirect('master/CreateCase/manage_case');
}	

public function actionfunclose(){
//echo "hellcl";
 $id=$_GET['id'];

 $this->db->query("update tbl_new_case set action_status='close' where new_case_id='$id'");

redirect('master/CreateCase/manage_case');

}

public function updatechoosestatus(){
			$getdata=$_GET['data'];
			$ex=explode("^",$getdata);
			$exft_id=$ex['0'];
			$exft_data=$ex['1'];
			$exft_data_case=$ex['2'];
			
	$this->db->query("update tbl_new_case set action_status='$exft_data' where new_case_id='$exft_id'");	

	//$this->paymentAmountlog($exft_id,$exft_data_case,$exft_data,$exft_id);
	
	redirect('master/CreateCase/manage_case');	
}


//========================================================================================================
public function paymentAmountlog($lastHdrId,$case_id,$module,$id){
	
	$table_name='tbl_payment_log';
	$pri_col='p_id';
	date_default_timezone_set('Asia/Kolkata');
	$datee=date('Y-m-d H:i:s a');

	if($id!=''){
	$lastHdrId=$id;
	}
	else
	{
		$lastHdrId;
	}
	$data_pay = array(
	
					'all_id' => $lastHdrId,					
					'date' => $datee,
					'case_id' => $case_id,
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'status' => $module					
					
		);
	$this->load->model('Model_admin_login');
		
	$this->Model_admin_login->insert_user($table_name,$data_pay);
		
	return paymentAmountlog; 
}


//========================================================================================================


public function insert_case(){
			
		@extract($_POST);
		$table_name ='tbl_new_case';
		$pri_col ='new_case_id';
	 	$popcaseidd= $this->input->post('popcaseid');
		
		 $category_string = implode(', ', $_POST['category_name']);
		
		  $data = array(
					'vendor_id' => $this->input->post('vendor_id'),
					'customer_id' => $this->input->post('customer_id'),
					'category_name' => $category_string,
					'currency_name' => $this->input->post('currency_name'),
					'case_id' => $this->input->post('case_id'),
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_id' => $this->session->userdata('user_id'),
					'author_id' => $this->session->userdata('user_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
					
		$this->load->model('Model_admin_login');
		$this->Model_admin_login->insert_user($table_name,$data);
		
		if($popcaseidd=='case'){
					
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";	
		}else{
		redirect('master/CreateCase/manage_case');
		}
}
}
?>