<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Item extends my_controller {


function __construct(){
   parent::__construct(); 
    $this->load->model('model_master');	
	$this->load->library('pagination'); 
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
	   $data = $this->manageItemJoin();
	   //print_r($data);
       $this->load->view('Item/manage-item',$data);
	}
	else
	{
	redirect('index');
	}
}

function manageItemJoin(){
     $table_name='tbl_product_stock';
     $data['result'] = "";
	////Pagination start ///
	  $url   = site_url('/master/Item/manage_item?');
	  $sgmnt = "4";
	  $showEntries =10;
      $totalData   = $this->model_master->count_all($table_name,'A',$this->input->get());
      //$showEntries= $_GET['entries']?$_GET['entries']:'12';
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url   = site_url('/master/Item/manage_item?entries='.$_GET['entries']);
      }
         $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
         $data=$this->user_function();
     //////Pagination end ///
		$data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
		$data['pagination']        = $this->pagination->create_links();
	
		 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_master->filterProductList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_master->product_get($pagination['per_page'],$pagination['page']);


	       // call permission fnctn
	       return $data;
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
	
		
					$dataarr= array(
					'sku_no' => $this->input->post('sku_no'),
					'productname' => $this->input->post('item_name'),
					'type' => $this->input->post('type'),
					'via_type' => $this->input->post('via_type'),
					'category' => $this->input->post('category'),
					'usageunit' => $this->input->post('unit'),
					'size' => $this->input->post('size'),
					'unitprice_purchase' => $this->input->post('unitprice_purchase'),			
					'unitprice_sale' => $this->input->post('unitprice_sale'),
					'min_re_order_level' => $this->input->post('min_re_order_level'),
				
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
					
					$data= array(
					
					'sku_no' => $this->input->post('sku_no'),
					'productname' => $this->input->post('item_name'),
					'type' => $this->input->post('type'),
					'via_type' => $this->input->post('via_type'),
					'category' => $this->input->post('category'),
					'usageunit' => $this->input->post('unit'),
					'size' => $this->input->post('size'),
					'unitprice_purchase' => $this->input->post('unitprice_purchase'),			
					'unitprice_sale' => $this->input->post('unitprice_sale'),
					'min_re_order_level' => $this->input->post('min_re_order_level'),
					
					
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
 

//select id of via
 $viaId=$this->db->query("select *from tbl_master_data where keyvalue='".$getData[2]."'");
 $viaRow=$viaId->row();



//select id of type
 $catId=$this->db->query("select *from tbl_master_data where keyvalue='".$getData[1]."'");
 $catRow=$catId->row();
 
//select id of unit id

 $unitId=$this->db->query("select *from tbl_master_data where keyvalue like '%$getData[4]%'");
 $unitRow=$unitId->row();
	         
if($getData[0]!='Bar Code Name')
{
	//echo $getData[4];
	           //echo "insert into tbl_product_stock set productname='".$getData[0]."',type='".$catRow->serial_number."',usageunit='".$unitRow->serial_number."',min_re_level='".$getData[7]."',comp_id='".$this->session->userdata('comp_id')."',via_type='".$viaRow->serial_number."'";
			   $this->db->query("insert into tbl_product_stock set productname='".$getData[0]."',type='".$catRow->serial_number."',usageunit='".$unitRow->serial_number."',min_re_order_level='".$getData[7]."',comp_id='".$this->session->userdata('comp_id')."',via_type='".$viaRow->serial_number."'");
			   
}		
	         }
			 fclose($file);
		
		 }
	     
	
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


public function test_crone()
{
	@extract($_POST);



	
	$this->load->library('email');
	$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => '103.211.216.225',
			'smtp_user' => 'info@techvyaserp.in',
			'smtp_pass' => 'info@123#',
			'smtp_port' => 587,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'wordwrap' => TRUE
		));	
		
		$this->email->from('info@techvyaserp.in');
		$this->email->to('collestbablu@gmail.com');
		//$this->email->to('RAGHUVENDERA.YADAV.EXT@GEODIS.COM');
		$this->email->cc('collestbablu@gmail.com');
		$this->email->subject('Mail');
		$template="jkhjkg";
		$this->email->message($template);

if($this->email->send()) {
echo 'sss'; 	
}
else
{
echo "d";	
}
	
}

}

?>