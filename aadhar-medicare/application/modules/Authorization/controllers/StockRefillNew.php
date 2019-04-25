<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class StockRefillNew extends my_controller {

function __construct(){
   parent::__construct();
   $this->load->model('model_stock_refill');
   $this->load->library('pagination'); 
    $this->load->model('model_admin_login');
}     


public function manage_stock_refill(){
		if($this->session->userdata('is_logged_in')){
		$data =  $this->manage_stockRefillJoin();	
		$this->load->view('Stock-Refill/manage-stock-refill',$data);
}
else{
	 redirect('index');
	}
}

function manage_stockRefillJoin(){
  		$data['result'] = "";
	////Pagination start ///
      $table_name  = 'tbl_refill_hdr';
	  $url        = site_url('/Authorization/StockRefillNew/manage_stock_refill?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->Model_admin_login->count_all($table_name,'A');
      //$showEntries= $_GET['entries']?$_GET['entries']:'12';
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/Authorization/StockRefillNew/manage_stock_refill?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     //////Pagination end ///
   
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     //$data['result']            = $this->model_template->contact_get($pagination['per_page'],$pagination['page']);	
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_stock_refill->filterStockRefillList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_stock_refill->getRefill($pagination['per_page'],$pagination['page']);
			
     return $data;
}

public function edit_refill(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Authorization/Stock-Refill/edit-refill');
	}
	else
	{
	redirect('index');
	}		
}


public function add_product_qty(){

	
	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('add-product-quantity');
}

else{
redirect('index');

}

}

public function getproduct(){
	if($this->session->userdata('is_logged_in')){
//$this->getSelect();
		$this->load->view('getproduct');
	}
	else
	{
	redirect('index');
	}
}

//--
public function insertStockRefill(){
		
		extract($_POST);
		$table_name ='tbl_refill_hdr';
		$table_name_dtl ='tbl_refill_dtl';
		$pri_col ='rflhdrid';
		$pri_col_dtl ='refillhdr';
		$rows = $this->input->post('rows');
		
		$sess = array(
					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'A',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
		);
	
		$data = array(
	
					'remarks' => $this->input->post('remarks'),
					'date' => $this->input->post('rdate'),
					
					
					);
			
			$data_merge = array_merge($data,$sess);					
		    $this->load->model('Model_admin_login');	
		    $this->Model_admin_login->insert_user($table_name,$data_merge);
			$lastHdrId11=$this->db->insert_id();
			//$this->db->query("update tbl_product_stock set templateid='1' where Product_id='$product_id'");		
			$this->load->model('Model_admin_login');
		
						
		for($i=0; $i<=$rows; $i++)
				{
				
				if($new_quantity[$i]!=''){

				 $data_dtl['refillhdr']= $lastHdrId11;
				 $data_dtl['product_id']=$this->input->post('product_id')[$i];				 
				 //$data_dtl['list_price']=$this->input->post('list_price')[$i];
				 $data_dtl['quantity']=$this->input->post('new_quantity')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
							}
					}
				
			redirect('/StockRefillNew/manage_stock_refill');
}


public function updateStockRefill(){
		
		extract($_POST);
		$table_name ='tbl_refill_hdr';
		$table_name_dtl ='tbl_refill_dtl';
		$pri_col ='rflhdrid';
		$pri_col_dtl ='refillhdr';
		//$rows = $this->input->post('rows');
		//echo $id = $this->input->post('id');die;
 
		 $this->db->query("delete from tbl_refill_dtl where refillhdr='$id'");	
				
		$sess = array(
					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'A',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
		);
	
		$data = array(
					
					'remarks' => $this->input->post('remarks'),
					'date' => $this->input->post('rdate'),
					
					);
			
			$data_merge = array_merge($data,$sess);					
		   
			$this->load->model('Model_admin_login');	
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);

		
		for($i=0; $i<=$rows; $i++)
				{
				
				if($new_quantity[$i]!=''){

				 $data_dtl['refillhdr']= $id;
				 $data_dtl['product_id']=$this->input->post('product_id')[$i];				 
				 //$data_dtl['list_price']=$this->input->post('list_price')[$i];
				 $data_dtl['quantity']=$this->input->post('new_quantity')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
				
						}
					}
					
					
	   echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
		
}
	
	
public function insertstockreff(){

extract($_POST);

$a=sizeof($product_id);
for($i=0; $i<$a; $i++)
	{
		$this->db->query("update tbl_product_stock set quantity =quantity+$new_quantity[$i] where Product_id='".$product_id[$i]."' ");
	}
	$this->db->query("update tbl_refill_hdr set stock_status='Completed' where rflhdrid='$id' ");
				   
				   
				   echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";	
	} 


}
?>