<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Item extends my_controller {

public function manage_item(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('Item/manage-item',$data);
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


 $url="Product List".$idd."'.pdf";

	//load the view and saved it into $html variable

		$html=$this->load->view('/Item/pdf_file', $data, true);

        //this the the PDF filename that user will get to download

		$pdfFilePath =$url;

        //load mPDF library

		$this->load->library('m_pdf');

       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($html);
        //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	
}

public function get_cid(){
	//$data=$this->user_function();// call permission function
	
		$this->load->view('get_cid');
	
	}

public function add_item(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Item/add-item');
}
	else
	{
	redirect('index');
	}
}

public function insert_item(){
	
		@extract($_POST);
		$table_name ='tbl_product_stock';
		$pri_col ='Product_id';
	 	$id= $this->input->post('Product_id');
		$addpro= $this->input->post('add_new_product');
		
		 @$branchQuery2 = $this->db->query("SELECT * FROM $table_name where status='A' and Product_id='$id'");
					$branchFetch2 = $branchQuery2->row();
		   
	
			if(!empty($_FILES['image_name']['name'])){
			
			$ff = $branchFetch2->product_image;
			
					
				@unlink('assets/image_data/'.$ff);
				
		
                $config['upload_path'] = 'assets/image_data/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|csv|xlsx|pdf|xls';
              	$config['file_name'] = $_FILES['image_name']['name'];
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
              
				
                if($this->upload->do_upload('image_name')){
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                }else{
                    $picture2 = '';
                }
		}
		
			
		 count($this->input->post('color')); 
		  // implode function is used here
 $bb=$this->input->post('color');
  @$ab=implode(',',$bb);  
 $count=sizeof('color');

		
		
		$data= array(
					'productname' => $this->input->post('item_name'),
					'category' => $this->input->post('category'),
					'product_image' => $picture2,
					
					
					'color' => $ab,
					'sku_no' => $this->input->post('sku_no'),
					//'quantity_stock' => $this->input->post('quantity_stock'),
					
					'unitprice_purchase' => $this->input->post('unitprice_purchase'),
					'hsn_code' => $this->input->post('hsn_code'),
					'gst_tax' => $this->input->post('gst_tax'),
					'unitprice_sale' => $this->input->post('unitprice_sale'),
					'usageunit' => $this->input->post('unit'),
					'part_no' => $this->input->post('part_no'),
					'mrp' => $this->input->post('mrp'),
						
					
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
			if($addpro!=''){
					echo "<script type='text/javascript'>";
					echo "window.close();";
					//echo "window.opener.location.reload();";
					echo "</script>";
			}else{
			
			 redirect('master/Item/manage_item');
		}
		
	}
	}
	
	
public function import_product(){

	
	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('Item/import-product');
}

else{
redirect('index');

}

}

public function import_item(){
	
 $filename=$_FILES["file"]["tmp_name"];
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($filename, "r");
	         while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
//select id of category
 $catId=$this->db->query("select *from tbl_prodcatg_mst where prodcatg_name='".$getData[2]."'");
 $catRow=$catId->row();

 

 
//select id of unit id
 $unitId=$this->db->query("select *from tbl_master_data where keyvalue='".$getData[4]."'");
 $unitRow=$unitId->row();
	         
if($getData[0]!='Part No.')
{
	           
			   $this->db->query("insert into tbl_product_stock set sku_no='".$getData[0]."',part_no='".$getData[1]."',category='".$catRow->prodcatg_id."',productname='".$getData[3]."',usageunit='".$unitRow->serial_number."',unitprice_purchase='".$getData[5]."',unitprice_sale='".$getData[6]."',mrp='".$getData[7]."',comp_id='".$this->session->userdata('comp_id')."'");
			   
}		
	         }
			 fclose($file);
		 }
	         //fclose($file);
echo "<script>
alert('Product Imported Successfully');




window.location.href = 'manage_item';


</script>";
			 
	 
//redirect('/master/manage_item');
	
}
public function send_mail() { 
         $from_email = "info@techvyaserp.in"; 
         $to_email = 'collestbablu@gmail.com'; 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Safi'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); 
   
         //Send mail 
        $this->email->send();
      } 

	
}

?>