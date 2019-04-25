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













public function production_details(){
	
	if($this->session->userdata('is_logged_in')){
	
	$this->load->view('Item/production-details');
	}
	else
	{
	redirect('index');
	}
		
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
					'Product_typeid' => $Product_typeid,
					'sku_no' => $this->input->post('sku_no'),
					'cycle_time' => $this->input->post('cycle_time'),
					//'quantity_stock' => $this->input->post('quantity_stock'),
					
					'unitprice_purchase' => $this->input->post('unitprice_purchase'),
					
					'unitprice_sale' => $this->input->post('unitprice_sale'),
					'usageunit' => $this->input->post('unit'),
					'pic_per_box' => $this->input->post('pic_per_box'),
					'mrp' => $this->input->post('mrp'),
					'style_no' => $this->input->post('style'),	
					//'mrp' => $this->input->post('mrp'),
					//'reorderlevelqty' => $this->input->post('reorderlevelqty'),
					//'product_status' => $this->'A',
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
			
			 redirect('master/Item/manage_item');
		
		
	}
	}

	
}

?>