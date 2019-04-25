<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Tour extends my_controller {

function __construct()
{
    parent::__construct(); 
    $this->load->library('pagination');
    $this->load->model('model_tour');	
}


public function manage_tour()
{
	
	if($this->session->userdata('is_logged_in'))
	{
		$data = $this->Manage_Tour_Data();
		$this->load->view('manage-tour',$data);
	}
	else
	{
		redirect('index');
	}
		
}

public function Manage_Tour_Data()
{

		  $table_name='tbl_tour';
		  $data['result'] = "";
		  ////Pagination start ///
		  $url   = site_url('/tour/Tour/manage_tour?');
		  $sgmnt = "4";
		  $showEntries =10;
		  $totalData   = $this->model_tour->count_tour($table_name,'A',$this->input->get());
		  //$showEntries= $_GET['entries']?$_GET['entries']:'12';
		  if($_GET['entries']!="")
		  {
			 $showEntries = $_GET['entries'];
			 $url   = site_url('/tour/Tour/manage_tour?entries='.$_GET['entries']);
		  }
          $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
          $data=$this->user_function();
     	  //////Pagination end ///
		  $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
		  $data['pagination']        = $this->pagination->create_links();
	
		  if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_tour->filterTourData($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_tour->getTourData($pagination['per_page'],$pagination['page']);


	        // call permission fnctn
	        return $data;

}

public function test_3(){
	
	if($this->session->userdata('is_logged_in')){
	$this->load->view('test_3');
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
           -> get('tbl_tour');
		   
		$i='0';
		
		foreach($res->result() as $row)
		{		 
		  
		  $compQuery1 = $this -> db
           -> select('*')
           -> where('serial_number',$row->usageunit)
           -> get('tbl_master_data');
		  $keyvalue1 = $compQuery1->row();
		  
		
			$info[$i]['1']=$row->tour_id;
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
	
public function get_cid()
{
	$this->load->view('get_cid');
}

public function add_item()
{
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('add-tour');
	}
	else
	{
		redirect('index');
	}
}


public function insert_tour(){
	
	@extract($_POST);
	$table_name ='tbl_tour';
	$pri_col ='tour_id';
	$id= $this->input->post('tour_id');
	

	$this->load->model('Model_admin_login');

	
	$data= array(
			
					'contact_id' => $this->input->post('contact_id'),
					'sales_person_id' => $this->input->post('sales_person_id'),
					'contact_person'  => $this->input->post('contact_person'),
					'email_id'  => $this->input->post('email_id'),
					'phone'  => $this->input->post('phone'),
					'priority' => $this->input->post('priority'),
					'source' => $this->input->post('source'),
					'source_others' => $this->input->post('source_others'),
					'lead_status' => $this->input->post('stage'),
					'state' => $this->input->post('state_id'),
					'date' => $this->input->post('date'),
					'subject' => $this->input->post('subject'),
					'remarks' => $this->input->post('remarks')
					
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
				redirect('tour/Tour/manage_tour');
	

}

public function updatetour()
{
	//echo "";die;
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('edit-tour');
	}
	else
	{
		redirect('index');
	}
}

public function convert_tour()
{
   if($this->session->userdata('is_logged_in'))
	{	
		$data['ID']=$_GET['ID'];
		$this->load->view('edit-tour-lead',$data);	
	}
   else
    {
		redirect('index');
    }
}

public function update_tour(){
	
	@extract($_POST);
	$table_name ='tbl_tour';
	$pri_col ='tour_id';
	$id= $this->input->post('tour_id');
	$this->load->model('Model_admin_login');
	
	$dataarr= array(
	
					'contact_id' => $this->input->post('contact_id'),
					'sales_person_id' => $this->input->post('sales_person_id'),
					'contact_person'  => $this->input->post('contact_person'),
					'email_id'  => $this->input->post('email_id'),
					'phone'  => $this->input->post('phone'),
					'priority' => $this->input->post('priority'),
					'source' => $this->input->post('source'),
					'source_others' => $this->input->post('source_others'),
					'lead_status' => $this->input->post('stage'),
					'state' => $this->input->post('state_id'),
					'date' => $this->input->post('date'),
					'subject' => $this->input->post('subject'),
					'remarks' => $this->input->post('remarks')
		
				  );
	$sesio = array(
				
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					 
				  );
	
	$dataall = array_merge($dataarr,$sesio);
	
				$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
				
				$this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
				redirect('tour/Tour/manage_tour');
	

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

	
public function import_product()
{
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('import-product');
	}
	else
	{
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
	
	           
			   $this->db->query("insert into tbl_tour set productname='".$getData[1]."',category='".$catRow->prodcatg_id."',usageunit='".$unitRow->serial_number."',hsn_code='".$getData[3]."',gst_tax='".$getData[4]."',min_re_level='".$getData[6]."',p_p_unit='".$getData[5]."',unitprice_purchase='".$getData[7]."',unitprice_sale='".$getData[8]."',comp_id='".$this->session->userdata('comp_id')."'");
			   
}		
	         }
			 fclose($file);
		
		 }
	         //fclose($file);
echo "<script>
alert('Product Imported Successfully');




window.location.href = 'manage_tour';


</script>";
			 
	 
//redirect('/master/manage_item');
	
}


}

?>