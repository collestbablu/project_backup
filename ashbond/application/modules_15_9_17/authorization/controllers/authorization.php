<?php

defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting (E_ALL ^ E_NOTICE);

class authorization extends my_controller {

function __construct(){

   parent::__construct(); 

}     
public function manage_authorization(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('manage-authorization');

	}

	else

	{

	redirect('index');

	}		

}

public function save_download_pdf_file()
  { 

$data = [];

@extract($_POST);
		$ccmail=$this->input->post('ccemail');
		$iddd=$this->input->post('id');


 $url="Pending Authorizations List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_output', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}








public function send_page_quation_pdf(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('send-page-quation-pdf');

	}

	else

	{

	redirect('index');

	}		

}





public function send_page_sales_pdf(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('send-page-sales-pdf');

	}

	else

	{

	redirect('index');

	}		

}



public function send_page_letter_pdf(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('send-page-letter-pdf');

	}

	else

	{

	redirect('index');

	}		

}







public function send_page_purchase_pdf(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('send-page-purchase-pdf');

	}

	else

	{

	redirect('index');

	}		

}












public function send_page(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('send_page');

	}

	else

	{

	redirect('index');

	}		

}

public function invoice_send_page(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('invoice_send_page');

	}

	else

	{

	redirect('index');

	}		

}

public function comm_send_page(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('comm_send_page');

	}

	else

	{

	redirect('index');

	}		

}


public function lett_send_page(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('lett_send_page');

	}

	else

	{

	redirect('index');

	}		

}

public function pur_send_page(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('pur_send_page');

	}

	else

	{

	redirect('index');

	}		

}

public function sale_send_page(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('sale_send_page');

	}

	else

	{

	redirect('index');

	}		

}





}