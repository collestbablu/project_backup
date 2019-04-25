<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class master extends my_controller {


public function save_download_pdf_file()
  { 

@extract($_POST);

		
		$iddd=$this->input->post('id');


 $url="DashBoard List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('pdfile', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}
//=========
public function coming_vendor_dod_pdf_file_down()
  { 

@extract($_POST);

		
		$iddd=$this->input->post('id');


 $url="Coming Vendor DOD's".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('coming_vendor_dod_pdf_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}
//=======
public function coming_customer_dod_pdf_file_down()
  { 

@extract($_POST);

		
		$iddd=$this->input->post('id');


 $url="Coming Customer DOD's".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('coming_customer_dod_pdf_file', $data, true);

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
?>