<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Item extends my_controller {


function __construct(){
   parent::__construct(); 
    $this->load->model('model_master');	
}

public function updateItem(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('/Item/edit-item',$data);
	}
	else
	{
	redirect('index');
	}
}

public function manage_item(){
	
	if($this->session->userdata('is_logged_in')){

	$data=$this->user_function();// call permission fnctn
	$data['result'] = $this->model_master->product_get();	
	$this->load->view('Item/manage-item',$data);
	}
	else
	{
	redirect('index');
	}
		
}

public function test_3(){
	
	if($this->session->userdata('is_logged_in')){
	$this->load->view('Item/test_3');
	}
	else
	{
	redirect('index');
	}
		
}

public function item_list()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('status','A')
           -> get('tbl_product_stock');
		   
		$i='0';
		
		foreach($res->result() as $row)
		{		 
		  
		  $compQuery1 = $this -> db
           -> select('*')
           -> where('serial_number',$row->usageunit)
           -> get('tbl_master_data');
		  $keyvalue1 = $compQuery1->row();
		  
		
			$info[$i]['1']=$row->Product_id;
			$info[$i]['2']=$row->category;
			$info[$i]['3']=$row->productname;
			$info[$i]['4']=$row->unitprice_purchase;
			$info[$i]['5']=$row->unitprice_sale;
			$info[$i]['6']=$row->mrp;
			$info[$i]['7']=$row->Product_id;		
			$info[$i]['8']=$keyvalue1->keyvalue;
			$info[$i]['9']=$row->product_image;
				
				$i++;
			
		}
		return $info;
	
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
//=========================================================================================

public function update_item(){

		@extract($_POST);
		
		$table_name ='tbl_product_stock';
		$pri_col ='Product_id';
		$this->load->model('Model_admin_login');
		$id= $this->input->post('Product_id');
		//echo $id; die;
		@$branchQuery2 = $this->db->query("SELECT * FROM $table_name where status='A' and Product_id='$id'");
		$branchFetch2 = $branchQuery2->row();
	
		
				if($_FILES['image_name']['name']!='')
				{
						$target = "assets/image_data/"; 
						$target1 =$target . @date(U)."_".( $_FILES['image_name']['name']);
						$image_name=@date(U)."_".( $_FILES['image_name']['name']);
						move_uploaded_file($_FILES['image_name']['tmp_name'], $target1);
				}
				else
				{
					$image_name=$branchFetch2->product_image;
					
				}		
					$dataarr= array(
					'productname' => $this->input->post('item_name'),
					'category' => $this->input->post('category'),
					'product_image' => $image_name,
					'type' =>$type,
					'size' => $size,
					
					
					'Product_typeid' => $Product_typeid,
					'sku_no' => $this->input->post('sku_no'),
					'gst_tax' => $gst_tax,
					'hsn_code' => $this->input->post('hsn_code'),
					'min_re_order_level' => $this->input->post('min_re_order_level'),
					
					'unitprice_purchase' => $this->input->post('unitprice_purchase'),
					
					'unitprice_sale' => $this->input->post('unitprice_sale'),
					'usageunit' => $this->input->post('unit'),
				
		      	);
					$idE=$Product_id[$i];
					//echo $idE;die;

				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataarr);

		$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
		 redirect('master/Item/manage_item');
					
}

//============================================================================================

public function insert_item(){
		
		@extract($_POST);
		$table_name ='tbl_product_stock';
		$pri_col ='Product_id';
	 	$id= $this->input->post('Product_id');
		$addpro= $this->input->post('add_new_product');
		@$branchQuery2 = $this->db->query("SELECT * FROM $table_name where status='A' and Product_id='$id'");
		$branchFetch2 = $branchQuery2->row();
		$this->load->model('Model_admin_login');
			if($_FILES['image_name']['name']!='')
					{
						$target = "assets/image_data/"; 
						$target1 =$target . @date(U)."_".( $_FILES['image_name']['name']);
						$image_name=@date(U)."_".( $_FILES['image_name']['name']);
						move_uploaded_file($_FILES['image_name']['tmp_name'], $target1);
					}
					else
					
					{
					$image_name=$branchFetch2->product_image;
					
					}		
					$data= array(
					'productname' => $this->input->post('item_name'),
					'type' => $this->input->post('type'),
					'category' => $this->input->post('category'),
					'product_image' => $image_name,
					'size' => $this->input->post('size'),
					'Product_typeid' => $Product_typeid,
					'sku_no' => $this->input->post('sku_no'),
					'gst_tax' => $gst_tax,
					'hsn_code' => $this->input->post('hsn_code'),
					'min_re_order_level' => $this->input->post('min_re_order_level'),
					
					'unitprice_purchase' => $this->input->post('unitprice_purchase'),
					
					'unitprice_sale' => $this->input->post('unitprice_sale'),
					'usageunit' => $this->input->post('unit'),
					'pic_per_box' => $this->input->post('pic_per_box'),
					'mrp' => $this->input->post('mrp'),
					'style_no' => $this->input->post('style'),	
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

					
		    	$this->Model_admin_login->insert_user($table_name,$dataall);
		$this->session->set_flashdata('flash_msg', 'Record Added Successfully.'); 
		 redirect('master/Item/manage_item');
	}


	private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	
	
	public function bar()
	{
		//I'm just using rand() function for data example
		$temp = rand(10000, 99999);
		$this->set_barcode($temp);
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
 @extract($_POST);
 $filename=$_FILES["file"]["tmp_name"];
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($filename, "r");
	         while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
//select id of category
 $catId=$this->db->query("select *from tbl_prodcatg_mst where prodcatg_name='".$getData[0]."'");
 $catRow=$catId->row();
 
//select id of unit id
 $unitId=$this->db->query("select *from tbl_master_data where keyvalue='".$getData[2]."'");
 $unitRow=$unitId->row();
	         
if($getData[0]!='Category Name')
{
	
	           
			   $this->db->query("insert into tbl_product_stock set productname='".$getData[1]."',category='".$catRow->prodcatg_id."',usageunit='".$unitRow->serial_number."',hsn_code='".$getData[3]."',gst_tax='".$getData[4]."',min_re_level='".$getData[6]."',p_p_unit='".$getData[5]."',unitprice_purchase='".$getData[7]."',unitprice_sale='".$getData[8]."',comp_id='".$this->session->userdata('comp_id')."'");
			   
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



public function item_t()
{
	
		if($this->session->userdata('is_logged_in')){

	$data=$this->user_function();// call permission fnctn
	$data['result'] = $this->model_master->product_get();	
	$this->load->view('Item/manage-item-test',$data);
	}
	else
	{
	redirect('index');
	}
		

}




}

?>