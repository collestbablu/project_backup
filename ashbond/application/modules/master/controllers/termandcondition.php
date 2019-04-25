<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class termandcondition extends my_controller {

public function manage_termandcondition(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('termandcondition/manage-termandcondition',$data);
	}
	else
	{
	redirect('index');
	}
		
}
public function add_termandcondition(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('termandcondition/add-termandcondition');
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


 $url="Term And Condition List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('/termandcondition/pdf_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}

public function insert_item(){
	
		@extract($_POST);
		$table_name ='tbl_termandcondition';
		$pri_col ='id';
	 	$id= $this->input->post('id');
		
		$data= array(
					'type' => $this->input->post('type'),
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
		
					$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					}             
				else
				{
				
					
		    	$this->Model_admin_login->insert_user($table_name,$dataall);
			
			 redirect('master/termandcondition/manage_termandcondition');
		
		
	}
	}

	
}

?>