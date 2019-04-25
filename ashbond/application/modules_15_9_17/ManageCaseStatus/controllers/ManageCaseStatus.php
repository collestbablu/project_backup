<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);

class ManageCaseStatus extends my_controller {

function __construct(){
   parent::__construct(); 
}     

public function manageBudgetaryOfferSent(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Budgetary-Offer-Sent');
	}
	else
	{
	redirect('index');
	}		
}

public function manageFinalOfferSent(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('final-offer-sent');
	}
	else
	{
	redirect('index');
	}		
}

public function save_download_pdf_file_budgetary()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Budgetary Offer Sent List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_budgetary_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}

public function save_download_pdf_file_final()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Final Offer Sent List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_final_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}

public function manageSaleOrderReceived(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('sale-order-received');
	}
	else
	{
	redirect('index');
	}		
}

public function download_pdf_file_sale_order_received()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Sale Order Received List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_sale_order_received_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}

public function managePurchaseOrderSent(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('purchase-order-sent');
	}
	else
	{
	redirect('index');
	}		
}

public function download_pdf_file_purchase_order()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Purchase Order Sent List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_purchase_order_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}


public function manageInvoiceRaised(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('invoice-raised');
	}
	else
	{
	redirect('index');
	}		
}

public function download_pdf_file_invoice_raised()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Invoice Raised List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_invoice_raised_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}


public function managePaymentReceived(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('payment-received');
	}
	else
	{
	redirect('index');
	}		
}

public function download_pdf_file_payment_received()
  { 

@extract($_POST);
		
		$iddd=$this->input->post('id');


 $url="Payment Received List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdf_payment_received_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}



}