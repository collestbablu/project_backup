<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class dispatch extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_dispatch');
}     

public function add_dispatch(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-dispatch');
	}
	else
	{
	redirect('index');
	}		
}
public function manage_dispatch(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$data['result'] = $this->model_dispatch->getdipatch();
	$this->load->view('manage-dispatch',$data);
	}
	else
	{
	redirect('index');
	}	
}


public function edit_dispatch(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-dispatch');
	}
	else
	{
	redirect('index');
	}		
}

public function reject_qc(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('reject-qc');
	}
	else
	{
	redirect('index');
	}		
}


public function insert_dispatch(){
@extract($_POST);
$table_name ='tbl_dispatch_hdr';
$pri_col='dispatch_id';
$table_name_dtl ='tbl_dispatch_dtl';
$pri_col_dtl ='dispatchhdrId';
//$status='Tailor';
	
	$data = array(
			
	 			 //'item_id'=>$this->input->post('dipatch_item'),
				 'dispatch_status'=>$this->input->post('dispatch'),	
				 'contact_id'=>$this->input->post('contact_id'),		 
				 //'qty'=>$this->input->post('qty'),
				 'date'=>$this->input->post('date'),
				 'remarks'=>$this->input->post('remarks'),
				 'maker_id'=>$this->session->userdata('user_id'),
				 'maker_date'=>date('y-m-d'),
				 'comp_id'=>$this->session->userdata('comp_id'),
				 'zone_id'=>$this->session->userdata('zone_id'),
				 'brnh_id'=>$this->session->userdata('brnh_id'),
				 );
//print_r($data);die;
				 $this->load->model('Model_admin_login');
				 $this->Model_admin_login->insert_user($table_name,$data);	
				$lastid=$this->db->insert_id();
	
			for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($main_id[$i]!=''){

				 $data_dtl['dispatchhdrId']= $lastid;
				 $data_dtl['item_id']= $this->input->post('main_id')[$i];				 
				 $data_dtl['qty']= $this->input->post('qty')[$i];
				 //$data_dtl['tot_qty']=$this->input->post('tot_qty')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				
				$this->db->query("update tbl_product_stock set quantity=quantity-'$qty[$i]' where Product_id='$main_id[$i]'");
				//$this->stock_refill_qty($qn[$i],$product_id[$i]);
				
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
							}
					}
	
	
	
			$rediectInvoice="dispatch/manage_dispatch";
			redirect($rediectInvoice);
	
}
	
public function update_dispatch(){
@extract($_POST);
$table_name ='tbl_dispatch_hdr';
$pri_col='dispatch_id';
$table_name_dtl ='tbl_dispatch_dtl';
$pri_col_dtl ='dispatchhdrId';
$id=$this->input->post('dispatch_id');
	//echo "select * from tbl_dispatch_dtl where dispatchhdrId='$id'";die;
	$queryfech=$this->db->query("select * from tbl_dispatch_dtl where dispatchhdrId='$id'");
	foreach($queryfech->result() as $rowfetch){
	//echo $rowfetch->qty;die;
	//echo "update tbl_product_stock set quantity=quantity+'$rowfetch->qty' where Product_id='$rowfetch->item_id'";die;
		$this->db->query("update tbl_product_stock set quantity=quantity+'$rowfetch->qty' where Product_id='$rowfetch->item_id'");
	}
	
	$this->db->query("delete from $table_name_dtl where $pri_col_dtl='$id'");
	$data = array(
			
	 			 //'item_id'=>$this->input->post('dipatch_item'),
				 'dispatch_status'=>$this->input->post('dispatch'),	
				 'contact_id'=>$this->input->post('contact_id'),		 
				 //'qty'=>$this->input->post('qty'),
				 'date'=>$this->input->post('date'),
				 'remarks'=>$this->input->post('remarks'),
				 'maker_id'=>$this->session->userdata('user_id'),
				 'maker_date'=>date('y-m-d'),
				 'comp_id'=>$this->session->userdata('comp_id'),
				 'zone_id'=>$this->session->userdata('zone_id'),
				 'brnh_id'=>$this->session->userdata('brnh_id'),
				 );
//print_r($data);die;
				 $this->load->model('Model_admin_login');
				 $this->Model_admin_login->update_user($pri_col,$table_name,$id,$data);	
				//$lastid=$this->db->insert_id();
				
		for($i=0; $i<=$rows; $i++)
				{
				 
				
				
				if($main_id[$i]!=''){

				 $data_dtl['dispatchhdrId']= $id;
				 $data_dtl['item_id']= $this->input->post('main_id')[$i];				 
				 $data_dtl['qty']= $this->input->post('qty')[$i];
				 //$data_dtl['tot_qty']=$this->input->post('tot_qty')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				
				$this->db->query("update tbl_product_stock set quantity=quantity-'$qty[$i]' where Product_id='$main_id[$i]'");
				//$this->stock_refill_qty($qn[$i],$product_id[$i]);
				
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
							}
					}
	
					echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
	   
						

}

//-------------reject qc----------

public function update_quality_check(){
@extract($_POST);
$table_name ='tbl_tailor';
$pri_col='tailor_id';
$table_name_log ='tbl_production_log';
$pri_col_log ='production_log_id';
$status='Reject Quality';

			//echo "update $table_name set rejct_qty=rejct_qty+'$qty', rejct_date='$date' where tailor_id='$tailor_id'";die;
				$this->db->query("update $table_name set rejct_qty=rejct_qty+'$qty', rejct_date='$date' where tailor_id='$tailor_id'");	
			
			
			$datalog = array(
			
	 			 'tai_id'=>$this->input->post('tailor_id'),
				 'finishProductId'=>$this->input->post('finishProduct'),
				 'customer_name'=>$this->input->post('contact_id'),	
				 'production_status'=>$status,			 
				 'qty'=>$this->input->post('qty'),
				 'date'=>$this->input->post('date'),
				 'maker_id'=>$this->session->userdata('user_id'),
				 'maker_date'=>date('y-m-d'),
				 'comp_id'=>$this->session->userdata('comp_id'),
				 'zone_id'=>$this->session->userdata('zone_id'),
				 'brnh_id'=>$this->session->userdata('brnh_id'),
				 );
				 
			$this->Model_admin_login->insert_user($table_name_log,$datalog);
					 $rediectInvoice="qc/manage_qc";
		redirect($rediectInvoice);	
	   
						

}
//======end============

function delete_updata_stock($qty,$main_id){
	
		 $this->db->query("update tbl_product_stock set quantity=quantity+'$qty' where Product_id='$main_id' and type='13'");
		 //$this->db->query("update tbl_product_serial set quantity=quantity+'$qty' where product_id='$main_id'");
		return;	
	}
	
	
public function insertProduction(){
		
		extract($_POST);
		
		$table_name ='tbl_production_hdr';
		$table_name_dtl ='tbl_production_dtl';
		$pri_col ='productionid';
		$pri_col_dtl ='productionhdr';
		
		
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
	
					'product_id' => $this->input->post('finished_goods'),
					'date' => $this->input->post('date'),
					'qty' => $this->input->post('hdr_qty'),
					
					
					);
			
			$data_merge = array_merge($data,$sess);					
		    $this->load->model('Model_admin_login');	
		    $this->Model_admin_login->insert_user($table_name,$data_merge);
			$lastHdrId=$this->db->insert_id();		
			$this->load->model('Model_admin_login');
		
		for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($tot_qty[$i]!=''){

				 $data_dtl['productionhdr']= $lastHdrId;
				 $data_dtl['product_id']=$this->input->post('product_id')[$i];				 
				 $data_dtl['quantity']=$this->input->post('qn')[$i];
				 $data_dtl['tot_qty']=$this->input->post('tot_qty')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				
				
				$this->stock_refill_qty($qn[$i],$product_id[$i]);
				
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
							}
					}
				
			
			
				//$this->software_log_insert($lastHdrId,$vendor_id,$grand_total,'Template added');
				
	
				
			 $rediectInvoice="production/manage_production";
		redirect($rediectInvoice);	
	   
					
	
	}

	
	public function updateProduction(){
		
		extract($_POST);
		$table_name ='tbl_production_hdr';
		$table_name_dtl ='tbl_production_dtl';
		$pri_col ='productionid';
		$pri_col_dtl ='productionhdr';
		
 
		 $this->db->query("delete from $table_name_dtl where productionhdr='$id'");	
				
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
	
					'product_id' => $this->input->post('product_id'),
					'date' => $this->input->post('date'),
					'qty' => $this->input->post('qty')
					
					);
			
			$data_merge = array_merge($data,$sess);					
		   
			$this->load->model('Model_admin_login');	
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);

		
		for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($qty[$i]!=''){

				 $data_dtl['productionhdr']= $id;
				 $data_dtl['product_id']=$this->input->post('product_idd')[$i];				 
				 $data_dtl['quantity']=$this->input->post('qn')[$i];
				 $data_dtl['tot_qty']=$this->input->post('tot_qty')[$i];
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
	
	
	
	
public function all_product_function(){
	
		$this->load->view('all-product',$data);
	
	}

public function viewSalesOrder(){
	if($this->session->userdata('is_logged_in')){
	
	$this->load->view('view-sales-order');
	}
	else
	{
	redirect('index');
	}
		
}

public function getproduct(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('getproduct');
	}
	else
	{
	redirect('index');
	}
}



public function add_inspection()
{
	
		if($this->session->userdata('is_logged_in')){
		$this->load->view('add-inspection');
	}
	else
	{
	redirect('index');
	}
	
}
		
public function insert_insepction()
{
extract($_POST);

		$table_name ='tbl_product_inspection';
		
 
		 $this->db->query("delete from $table_name where productionid='$productionid' and type ='$type'");	
				/*
		
		$data = array(
	
					'product_id' => $this->input->post('product_id'),
					'test_param' => $this->input->post('test_param')[$i],
					'specification' => $this->input->post('specification')[$i],
					'insp1' => $this->input->post('insp1')[$i],
					'insp2' => $this->input->post('insp2')[$i],
					'insp3' => $this->input->post('insp3')[$i],
					'insp4' => $this->input->post('insp4')[$i],
					'insp5' => $this->input->post('insp5')[$i],
					'insp6' => $this->input->post('insp6')[$i],
					'insp7' => $this->input->post('insp7')[$i],
					'insp8' => $this->input->post('insp8')[$i],
					'insp9' => $this->input->post('insp9')[$i],
					'insp10' => $this->input->post('insp10')[$i],
					
					);
			
			$data_merge = array_merge($data,$sess);					
		   
			
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);
*/
$this->load->model('Model_admin_login');	
		
		$rows=count($test_param);
		for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($insp1[$i]!=''){
				 $data_dtl['productionid']= $productionid;
				 $data_dtl['product_id']= $p_id[$i];
				 $data_dtl['type']= $type;
				 
				 $data_dtl['test_param']=$this->input->post('test_param')[$i];				 
				 $data_dtl['specification']=$this->input->post('specification')[$i];
				 $data_dtl['specification2']=$this->input->post('specification2')[$i];
				 $data_dtl['insp1']=$this->input->post('insp1')[$i];
				 $data_dtl['insp2']=$this->input->post('insp2')[$i];
				 $data_dtl['insp3']=$this->input->post('insp3')[$i];
				 $data_dtl['insp4']=$this->input->post('insp4')[$i];
				 $data_dtl['insp5']=$this->input->post('insp5')[$i];
				 $data_dtl['insp6']=$this->input->post('insp6')[$i];
				 $data_dtl['insp7']=$this->input->post('insp7')[$i];
				 $data_dtl['insp8']=$this->input->post('insp8')[$i];
				 $data_dtl['insp9']=$this->input->post('insp9')[$i];
				 $data_dtl['insp10']=$this->input->post('insp10')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']=date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				$this->Model_admin_login->insert_user($table_name,$data_dtl);		
				
				
			
							}
					}
					
					
	   echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "alert('Inspection Added Successfully')";
					echo "</script>";
		
		
		
		
}
		

public function print_inspection()
{
	$data=array(
	'id' => $_GET['id']
	);
	
$this->load->view("print-inspection",$data);	
	
}


public function stock_refill_qty($qty,$main_id)
	{
	
	
				$this->db->query("update tbl_product_stock set quantity=quantity-'$qty' where Product_id='$main_id'");
	
				
	
	}
	
	
	
	function approve_production_order(){
	
	$approveQuery=$this->db->query("select *from tbl_production_hdr where productionid='".$_GET['id']."'");
	$getAprove=$approveQuery->row();
	if($getAprove->approve_status=='Approve')
	{
		$this->db->query("update tbl_production_hdr set approve_status='Not Approve' where productionid='".$_GET['id']."'");
	}
	else
	{
	$this->db->query("update tbl_production_hdr set approve_status='Approve' where productionid='".$_GET['id']."'");
	}
	
	
redirect('production/manage_production');
}


public function stockIn(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	
	$this->load->view('stockInProduct',$data);
	}
	else
	{
	redirect('index');
	}	
}

public function getRackQty()
{
$rackQty=$this->db->query("select SUM(quantity) as s from tbl_product_serial where location_id='".$_GET['location_rack_id']."' and product_id='".$_GET['pid']."'");
$getQty=$rackQty->row();
echo $getQty->s;


}		

public function insertstockreff(){



extract($_POST);
if($save!=''){
//echo "hell";die;

 $a=sizeof($product_id);
for($i=0; $i<$a; $i++){
if($new_quantity[$i]!='')
{

//echo $product_id[$i];

		 $selectQuery = "select * from tbl_product_serial where product_id='$product_id[$i]' and  location_id='$rack_id[$i]' ";
		$selectQuery1=$this->db->query($selectQuery);

		 $num= $selectQuery1->num_rows();

		if($num >0)

		{	

		$secode=$product_id[$i]."_".$location_id1;
	
$this->db->query("update tbl_product_serial set quantity =quantity+$new_quantity[$i] where product_id='".$product_id[$i]."'  and location_id='$rack_id[$i]'");

$p_Q=$this->db->query("update tbl_product_stock set quantity =quantity+$new_quantity[$i] where Product_id='".$product_id[$i]."' ");

 $sqlProdLoc1="insert into tbl_product_serial_log set quantity ='$new_quantity[$i]',location_id='$rack_id[$i]',type='Production_stockIn',product_id='$product_id[$i]',f_id='$inbound_id', maker_date=NOW(), author_date=now(), author_id='".$this->session->userdata('user_id')."', maker_id='".$this->session->userdata('user_id')."', divn_id='".$this->session->userdata('divn_id')."', comp_id='".$this->session->userdata('comp_id')."', zone_id='".$this->session->userdata('zone_id')."', brnh_id='".$this->session->userdata('brnh_id')."' ";
$this->db->query($sqlProdLoc1);



 		}else{
			$sqlProdLoc2="insert into tbl_product_serial set product_id='$product_id[$i]',serial_number='$serialno', quantity ='$new_quantity[$i]', location_id='$rack_id[$i]', maker_date=NOW(), author_date=now(), author_id='".$this->session->userdata('user_id')."', maker_id='".$this->session->userdata('user_id')."', divn_id='".$this->session->userdata('divn_id')."', comp_id='".$this->session->userdata('comp_id')."', zone_id='".$this->session->userdata('zone_id')."', brnh_id='".$this->session->userdata('brnh_id')."'"; 
$this->db->query($sqlProdLoc2);

 $this->db->query("update tbl_product_stock set quantity =quantity+$new_quantity[$i] where Product_id='".$product_id[$i]."' ");

 
$sqlProdLoc1="insert into tbl_product_serial_log set quantity ='$new_quantity[$i]',location_id='$rack_id[$i]',type='Production_stockIn',product_id='$product_id[$i]', maker_date=NOW(), author_date=now(), author_id='".$this->session->userdata('user_id')."',f_id='$inbound_id', maker_id='".$this->session->userdata('user_id')."', divn_id='".$this->session->userdata('divn_id')."', comp_id='".$this->session->userdata('comp_id')."', zone_id='".$this->session->userdata('zone_id')."', brnh_id='".$this->session->userdata('brnh_id')."' ";
$this->db->query($sqlProdLoc1);
 
 
  			
				}

	 $lastHdrId=$this->db->insert_id();
		
}
}

?>
<script>
alert('Quantity Added Successfully ');
window.close();
</script>

<?php

 }
//redirect('/StockRefill/add_multiple_qty');
} 


		
}