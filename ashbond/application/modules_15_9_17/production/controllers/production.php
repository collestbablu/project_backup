<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class production extends my_controller {

//-----------------------------start item function ----------------------------
//---------------------------template start ------------------------------
public function template(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('template');
}
	else
	{
	redirect('/master/index');
	}
}

//---------------------------end template start ------------------------------

//---------------------------------------------------------------- manage sale ----------------------

public function manage_template(){
	//echo "hhh";die;
	if($this->session->userdata('is_logged_in')){
$data=$this->user_function();// call permission fnctn
	$this->load->view('manage-template',$data);
	}
	else
	{
	redirect('/master/index');
	}
	
	
}
//----------------------------------end manage sale ----------------------
//--------------------------------edit template sale ----------------------


public function edit_template(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-template');
}
	else
	{
	redirect('/master/index');
	}
}




public function vender_input(){

	
		$this->load->view('vender_input');

}
//-------------------------------end edit template sale ----------------------
//-------------------------------views template sale ----------------------

public function view_template(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('view_template');
}
	else
	{
	redirect('/production/index');
	}
}
//-------------------------------end view template sale ----------------------
//-------------------------------delete template sale ----------------------

function delete_manage_corporateinvoice(){
	$table_name ='production_production_hdr';
	$table_name_dtl ='production_production_dtl';
	$pri_col ='invoiceid';
	$pri_col_dtl ='invoice_id';
	$this->load->model('Model_admin_login');
		  $id= $_GET['id'];
		$id_dtl= $_GET['id'];
		$Query=$this->db->query("select * from production_production_hdr where invoiceid='".$_GET['id']."'");
		$getp=$Query->row();
			
			
		 $sqlProdLoc123="update tbl_product_stock set templateid='0' where Product_id='$getp->finish_goods'";
						
						$this->db->query($sqlProdLoc123);
		
		
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id_dtl);
	
		redirect('/production/manage_template');
}	
//-------------------------------end delete template sale ----------------------


function delete_manage_production(){
	$table_name ='production_production_hdr';
	$table_name_dtl ='production_production_dtl';
	$pri_col ='invoiceid';
	$pri_col_dtl ='invoice_id';
	$this->load->model('Model_admin_login');
		  $id= $_GET['id'];
		$id_dtl= $_GET['id'];
		//echo "select * from cybercodex_production_hdr where invoiceid='".$_GET['id']."'";
			$Query=$this->db->query("select * from production_production_hdr where invoiceid='".$_GET['id']."'");
			$getp=$Query->row();
			
			
		 $sqlProdLoc123="update tbl_product_stock set templateid='0' where Product_id='$getp->finish_goods'";
						
						$this->db->query($sqlProdLoc123);
		
		
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id_dtl);
	
		redirect('/production/manage_template');
}	
//-------------------------------end delete template sale ----------------------




//-------------------------- start insert template-------------------------
public function insert_sale(){
			
		extract($_POST);
		  $id= $this->input->post('invoiceid1');
	
		 $saletype = $this->input->post('order_type');
		 
		 $this->db->query("update tbl_product_stock set templateid='1' where Product_id='$finish_goods'");
		// print_r($process);die;
		//  $prosecc1=implode('^',$process);
		 
		if($id!='')
		{
			$this->db->query("delete from production_production_dtl where invoice_id='$id'");
			
		$table_name ='production_production_hdr';
		$pri_col ='invoiceid';
		$table_name_dtl ='production_production_dtl';
		$pri_col_dtl ='invoice_dtl_id';
		
		//echo $this->input->post('finish_goods');
		$data = array(
	
					'finish_goods' => $this->input->post('finish_goods'),
				    'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data);		
		
		
				$countPid=count($pid);		
				
				$countbid=count($bid);
				
		for($i=0; $i<$countPid; $i++)
				{
				
		        $pidd=$this->input->post('item')[$i];
				$finish=$this->input->post('finish_goods');
				if($pidd!=''){
				 $data_dtl['invoice_id']=$id;	
				 $data_dtl['finish_goods']=$finish;
				
				 $data_dtl['product_id']=$this->input->post('pid')[$i];
				 
				 $data_dtl['unit']=$this->input->post('qnty')[$i];
				 $data_dtl['qnty']=$this->input->post('unit')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']= date('y-m-d');
				 $data_dtl['author_date']= date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				
				}	
						
	}
	
	
		echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";		

		
		}else{
		$table_name ='production_production_hdr';
		$table_name_dtl ='production_production_dtl';
		$pri_col ='invoiceid';
		$pri_col_dtl ='invoice_dtl_id';
	 	$ida= $this->input->post('invoiceid');
	//echo $ida;die;
		$data = array(
	
					'finish_goods' => $this->input->post('finish_goods'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
		$this->Model_admin_login->insert_user($table_name,$data);
	    $lastid=$this->db->insert_id();
		$countPid=count($pid);
		
		for($i=0; $i<$countPid; $i++)
				{
				$pidd=$this->input->post('pid')[$i];
				
				if($pidd!=''){
				 $data_dtl['invoice_id']=$lastid;	
				 $data_dtl['finish_goods']=$this->input->post('finish_goods');
				 $data_dtl['product_id']=$this->input->post('pid')[$i];
				 
				 $data_dtl['unit']=$this->input->post('qnty')[$i];
				 $data_dtl['qnty']=$this->input->post('unit')[$i];
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['author_id']=$this->session->userdata('user_id');
				 $data_dtl['maker_date']= date('y-m-d');
				 $data_dtl['author_date']= date('y-m-d');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				 $data_dtl['divn_id']=$this->session->userdata('divn_id');
				 
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
				
				
				}
				//print_r( $data_dtl);			
	}
			
						
			redirect('/index.php/production/manage_template');
	}
	}
	
	
	//--------------------------end insert template-------------------------
///------------------------------------------------------start stock in Finish Goods -----------------------------------------
public function add_production(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-production');
}
	else
	{
	redirect('/master');
	}
	
}



public function show_qty(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('show-qty',$data);
	}
	else
	{
	redirect('/master/index');
	}
	}

///------------------------start Manage stock in and out production Finish Goods ---------------------------------------

public function manage_production(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('manage-production');
}


	else
	{
	redirect('/master');
	}
	
}


public function production_qty_in(){
	//echo "hhh";die;
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('production-qty-in',$data);
	}
	else
	{
	redirect('/master/index');
	}
	
	
}



//-----------------------------------Start Add Row Matrial-------------------------



public function matrial_qty_add(){
	//echo "hhh";die;
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('matrial-qty-add',$data);
	}
	else
	{
	redirect('/master/index');
	}
	
	
}


//--------------------------------------------End Add Row /matrial----------------------

public function complete_process(){
	//echo "hhh";die;
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('complete-process',$data);
	}
	else
	{
	redirect('/production/index');
	}
	
	
}






public function insert_stock_out(){/*

		@extract($_POST);
		if($checkqty==0)
		{
		Response.Redirect("./production/add_production?al=3");
		}
		else{
		$table_name='cybercodex_product_serial_log';
	    $finishg=$this->input->post('finishg');
		$qty=$this->input->post('qty');
		
		$Qserialfinish=$this->db->query("select * from cybercodex_product_serial where finish_goods='$finishg'");
		$count=$Qserialfinish->num_rows();
		 
		$fetchQserialFinish=$Qserialfinish->row(); 
		$finishid=$fetchQserialFinish->quantity;
		
		$data = array(
					 
					 'aval_status' => 'Yes',	
					'product_id' => $this->input->post('finishg'),
					'quantity' => $this->input->post('qty'),
					'location_id' => $location_id,
					'product_type' => 'finish_goods',
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
			
		//echo $count;die;
		
		
//echo "ssss";die;
//echo "select * from cybercodex_production_dtl where finish_goods='$finishg' ";
//echo "select * from cybercodex_production_hdr where finish_goods='$finishg' ";
	  $ewww = $this->db->query("select * from cybercodex_production_hdr where finish_goods='$finishg' ");
	  
	  $rowfetch=$ewww->num_rows();
	  $rowfet=$ewww->row();
	  if($rowfetch>0){
	  
	   $this->db->query("update cybercodex_production_hdr set qty=qty+'$qty' where finish_goods='$finishg'");
	  // echo "update cybercodex_production_hdr set qty=qty+'$qty' where finish_goods='$finishg'";
	   	   	  }
		
	Response.Redirect("./production/add_production?al=1");


}*/





		@extract($_POST);
		if($checkqty==0)
		{
		Response.Redirect("./production/add_production?al=3");
		}
		else{
		$location_id='1';
		$table_name='cybercodex_product_serial_log';
	    $finishg=$this->input->post('finishg');
		$qty=$this->input->post('qty');
		
		$Qserialfinish=$this->db->query("select * from cybercodex_product_serial where finish_goods='$finishg' and location_id ='$location_id'");
		 $count=$Qserialfinish->num_rows();
		 
		$fetchQserialFinish=$Qserialfinish->row(); 
		$finishid=$fetchQserialFinish->quantity;
		
		$data = array(
					 
					 'aval_status' => 'Yes',	
					'product_id' => $this->input->post('finishg'),
					'quantity' => $this->input->post('qty'),
					'location_id' => $location_id,
					'product_type' => 'finish_goods',
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
			
		//echo $count;die;
		
		
//echo "ssss";die;
//echo "select * from cybercodex_production_dtl where finish_goods='$finishg' ";
	  $ewww = $this->db->query("select * from cybercodex_production_dtl where finish_goods='$finishg' ");
	 
	  
	  $rowfetch=$ewww->num_rows();
	  $rowfet=$ewww->row();
	  if($rowfetch>0){
	  
	   $this->db->query("update cybercodex_production_hdr set qty=qty+'$qty' where finish_goods='$finishg'");
	  // echo "update cybercodex_production_hdr set qty=qty+'$qty' where finish_goods='$finishg'";
	   	   	  }
	  
		foreach($ewww->result() as $rew){
		
		 $ewww1 = $this->db->query("select * from cybercodex_product_serial where product_id='$rew->product_id' and location_id ='$location_id'");
		 $fe=$ewww1->row();
		 $qq=$rew->qnty*$qty;
		 
//echo $fe->quantity;die;
		
		 if($fe->quantity>=$qq)
		 {
		 
		 
		 
		// echo  $count;die;
		 if($count>0){
		//echo "ss";die;
		//echo "update cybercodex_product_serial set quantity='$qq' where product_id='$fe->product_id' and location_id ='$location_id'";
		//echo "update cybercodex_product_stock set qtyinstock=qtyinstock+'$qq' where Product_id='$fe->product_id' ";
			$this->db->query("update cybercodex_product_serial set quantity=quantity-'$qq' where product_id='$fe->product_id' and location_id ='$location_id'");
			
			$this->db->query("update cybercodex_product_stock set qtyinstock=qtyinstock-'$qq' where Product_id='$fe->product_id' ");
			
			
			
	
		}else{ 
	//echo "hj";die;	
	//echo "insert into  cybercodex_product_serial set quantity='$qq', finish_goods='$finishg',  product_id='$finishg' ,location_id ='$location_id'";	

		
				
		
		 
		 
		 
		 
		 
		 
		 
		 
		  $rowid=$rew->product_id;
		  //echo $rowid;die;
		 	  $pre_qty=$rew->qnty;
		 $multi=$pre_qty*$qty;
	
	// echo $rowid; 
	//echo "update cybercodex_product_stock set qtyinstock=qtyinstock-'$multi' where Product_id='$fe->product_id' ";
	//echo "update cybercodex_product_serial set quantity=quantity-'$multi' where product_id='$rowid' and location_id ='$location_id'";
		$this->db->query("update cybercodex_product_serial set quantity=quantity-'$multi' where product_id='$rowid' and location_id ='$location_id'");
	   
	$this->db->query("update cybercodex_product_stock set qtyinstock=qtyinstock-'$multi' where Product_id='$fe->product_id'");
		
		
	
		}		 
		 }
		 else
		 {
		
	Response.Redirect("./production/add_production?al=2");
		
		 }
	
	
	}
	
	if($count>0){
	
	
	
	
	$this->db->query("update cybercodex_product_serial set quantity=quantity+'$qty' where finish_goods='$finishg' and product_id='$finishg' and location_id ='$location_id'");
	//$this->db->query("update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg' ");
	//print_r($data);
	$this->Model_admin_login->insert_user($table_name,$data);
	
	//echo "hello1";
	Response.Redirect("./production/add_production?al=1");
	
	
	}else{

	$this->Model_admin_login->insert_user($table_name,$data);
    //echo "update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg'";
    //echo "insert into  cybercodex_product_serial set quantity='$qty', finish_goods='$finishg',  product_id='$finishg' ,location_id ='$location_id'";
	//$this->db->query("update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg'");
    $this->db->query("insert into  cybercodex_product_serial set quantity='$qty', finish_goods='$finishg',  product_id='$finishg' ,location_id ='$location_id'");
	//echo "hello2";
    Response.Redirect("./production/add_production?al=1");
	}
	}

}


// ------------------------    Start insert_stockin_qty   ---------------------------------------
public function insert_stockout_qty(){


			
		extract($_POST);
		 @$vender_input=implode(',',$vender_input);
		  @$vend=implode(',',$vender);
		
		  $table_name_hdr ='cybercodex_stock_in_hdr';
		  $table_name_dtl ='cybercodex_stock_in_dtl';
		  $table_name_dtl_log ='cybercodex_stock_in_log';
		
		  $table_name_pro_serial_log ='cybercodex_product_serial_log';
		 
		   
		  $pri_col='serial_number';
		   $countrow=$this->input->post('countrow');
			$id = $this->input->post('serial_number');	
			$process = $this->input->post('process');
			$vender1 = $vend;	
			
			
			$sessi = array(
	
					
				    'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
				
				
				$data=array(
		        'contact_id'=>$vend,
				'finish_goods'=>$this->input->post('finish_goods'),
				'process'=>$process,
				'serial_number'=>$id,
				'date'=>$this->input->post('date'),
				'statusf'=>'out',
				'price_rate' => $vender_input,
				);
				
				$dataall=array_merge($data,$sessi);	
				
				
				$this->load->model('Model_admin_login');
				
				if($id!=''){
				//echo "select * from $table_name_hdr where serial_number='$id' and contact_id='$vend' and process='$process' and statusf='out'";
				
				for($jj=0;$jj<count($vender);$jj++){
				
				//echo "select * from $table_name_hdr where serial_number='$id' and FIND_IN_SET('$vender[$jj]',contact_id) and process='$process' and statusf='out'";
				
				$Query=$this->db->query("select * from $table_name_hdr where serial_number='$id' and FIND_IN_SET('$vender[$jj]',contact_id) and process='$process' and statusf='out'");
				
			$row2=$Query->num_rows();
			$row222=$Query->row();
				
					
				
			// "select * from $table_name_hdr where serial_number='$id' and contact_id='$vender' and process='$process'";
			
			
			// $row2;
	      
			

			if($row2>0){
			
			
			
			
					
			}
			
			else{
					
				 $this->Model_admin_login->insert_user($table_name_hdr,$dataall);
				 
				 $insert_id=$this->db->insert_id();
				 
				 }
				}				
				
				
				for($i=0;$i<=($countrow);$i++){
				
				
			
			
			//print_r($data1);
				
				
				
				
				
			
	
	////---------------- check row 	'cybercodex_stock_in_dtl num rows--------------------------------	
	
	 
		// echo "select * from $table_name_dtl where product_id='$product_id' and finish_goods='$finish_goods' and process='$process' and stockin_id='$row222->stockin_id'";
		//echo count($vender); 
		
 for($jj=0;$jj<count($vender);$jj++){
 

 $qntyt = $this->input->post('qty')[$i][$jj];
 //echo $i.$jj;
 $name_vender = $this->input->post('n_vender')[$i][$jj];

 $data1=array(
				//'finish_goods'=>$this->input->post('finish_goods'),
		        'product_id'=>$this->input->post('product_id')[$i],
				'qntyt'=>$this->input->post('qty')[$i][$jj],
				'finish_goods'=>$this->input->post('finish_goods'),
				'process'=>$process,
				'stockin_id'=>$insert_id,
				
				);
 	
   $finish_goods=$this->input->post('finish_goods');
   $product_id=$this->input->post('product_id')[$i];
    $qnty=$this->input->post('qty')[$i][$jj];
   //echo $name_vender=$this->input->post('vender')[$i][$jj];
 	$this->load->model('Model_admin_login');
					
	$dataall2=array_merge($data1,$sessi);
 
$Query3=$this->db->query("select * from $table_name_dtl where product_id='$product_id' and finish_goods='$finish_goods' and process='$process' and stockin_id='$row222->stockin_id' and contact_id='$name_vender'");
			$row23=$Query3->num_rows();
			
		
			
			if($row23>0){
			
 ////---------------- update 'cybercodex_stock_in_dtl and insert cybercodex_stock_in_log---------------------
 
$sqlProdLoc1234="update $table_name_dtl set qntyt=qntyt+'$qntyt' where product_id='$product_id' and finish_goods='$finish_goods' and process='$process' and stockin_id='$row222->stockin_id' and contact_id='$name_vender' ";
						
						$this->db->query($sqlProdLoc1234);
						
						
						 $loginsert ="insert into $table_name_dtl_log set product_id='$product_id',finish_goods='$finish_goods',process='$process',stockin_id='$row222->stockin_id',qntyt='$qnty',maker_id ='".$this->session->userdata('user_id')."',maker_date='".date('y-m-d')."',author_id='".$this->session->userdata('user_id')."',author_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."',divn_id='".$this->session->userdata('divn_id')."'";
						
		$this->db->query($loginsert);				
//$this->db->query("insert into $table_name_dtl_log set product_id='$product_id' and finish_goods='$finish_goods' and process='$process' and stockin_id='$row222->stockin_id' and qntyt='$qnty'");

			
			}
			else{
			  ////---------------- update	'cybercodex_stock_in_dtl and  cybercodex_stock_in_log-------------------------------- 
			
			$loginsert1 ="insert into $table_name_dtl set product_id='".$this->input->post('product_id')[$i]."',qntyt='".$this->input->post('qty')[$i][$jj]."',finish_goods='".$this->input->post('finish_goods')."',process='".$process."',stockin_id='$insert_id',contact_id='$name_vender',maker_id ='".$this->session->userdata('user_id')."',maker_date='".date('y-m-d')."',author_id='".$this->session->userdata('user_id')."',author_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."',divn_id='".$this->session->userdata('divn_id')."'";
						
		$this->db->query($loginsert1);
			 
			
		    //$this->Model_admin_login->insert_user($table_name_dtl,$dataall2);
			
			$this->Model_admin_login->insert_user($table_name_dtl_log,$dataall2);
//$insert1="insert into $table_name_dtl set product_id='$product_id',quantity='$qnty',product_type='row_material'";
			  //$this->db->query($insert1);
			
			}
			
			}
				
				}
			
			
			
				
			
		
echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";	

	

	
	}

}


///------------------------------------------------close insert_stockin_qty-----------------------------------


// ------------------------    Start insert_stockin_qty   ---------------------------------------
public function insert_stockin_qty(){


			
		extract($_POST);
		  $table_name_hdr ='cybercodex_stock_in_hdr';
		  $table_name_dtl ='cybercodex_stock_in_dtl';
		   $table_name_dtl_log ='cybercodex_stock_in_log';
		
		  $table_name_pro_serial_log ='cybercodex_product_serial_log';
		 
		   
		  $pri_col='serial_number';
		   $countrow=$this->input->post('countrow');
			$id = $this->input->post('serial_number');	
			$process = $this->input->post('process');
			$vender = $this->input->post('vender');	
			
			
			$sessi = array(
	
					
				    'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
				
				
				$data=array(
		        'contact_id'=>$this->input->post('vender'),
				'finish_goods'=>$this->input->post('finish_goods'),
				'process'=>$process,
				'serial_number'=>$id,
				'date'=>$this->input->post('date'),
				'statusf'=>'in',
				
				
				);
				
				$dataall=array_merge($data,$sessi);	
				
				
				$this->load->model('Model_admin_login');
				
				if($id!=''){
				//echo ("select * from $table_name_hdr where serial_number='$id' and contact_id='$vender' and process='$process' and statusf='in'");
				$Query=$this->db->query("select * from $table_name_hdr where serial_number='$id' and contact_id='$vender' and process='$process' and statusf='in'");
				
			$row2=$Query->num_rows();
			$row222=$Query->row();
				
					
				
			// "select * from $table_name_hdr where serial_number='$id' and contact_id='$vender' and process='$process'";
			
			
			// $row2;
	      
			
 if($row2>0){
			
					
			}else{
					
				$this->Model_admin_login->insert_user($table_name_hdr,$dataall);
				$insert_id=$this->db->insert_id();
				
				
				}
				
					
								
				
				
				for($i=0;$i<=($countrow);$i++){
				
				$data1=array(
				
				//'finish_goods'=>$this->input->post('finish_goods'),
		        'product_id'=>$this->input->post('product_id')[$i],
				'qntyt'=>$this->input->post('qty')[$i],
				'finish_goods'=>$this->input->post('finish_goods'),
				'process'=>$process,
				'stockin_id'=>$insert_id,
				
				);
				//print_r($data1);
				$finish_goods=$this->input->post('finish_goods');
			    $product_id=$this->input->post('product_id')[$i];
				$qnty=$this->input->post('qty')[$i];
				
				
				
				
				$this->load->model('Model_admin_login');
				
					
				$dataall2=array_merge($data1,$sessi);
				
				
				
				

	
	
	
						
						
 
 $Query3=$this->db->query("select * from $table_name_dtl where product_id='$product_id' and finish_goods='$finish_goods' and process='$process' and stockin_id='$row222->stockin_id'");
			$row23=$Query3->num_rows();
			
			
			
			if($row23>0){
			
 ////---------------- update'cybercodex_stock_in_dtl and insert cybercodex_stock_in_log---------------------
 
$sqlProdLoc1234="update $table_name_dtl set qntyt=qntyt+'$qnty' where product_id='$product_id' and finish_goods='$finish_goods' and process='$process' and stockin_id='$row222->stockin_id' and contact_id='$vender'";
						
						$this->db->query($sqlProdLoc1234);
						
						
						 $loginsert ="insert into $table_name_dtl_log set product_id='$product_id',finish_goods='$finish_goods',process='$process',stockin_id='$row222->stockin_id',qntyt='$qnty',maker_id ='".$this->session->userdata('user_id')."',maker_date='".date('y-m-d')."',author_id='".$this->session->userdata('user_id')."',author_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."',divn_id='".$this->session->userdata('divn_id')."'";
						
		$this->db->query($loginsert);				
//$this->db->query("insert into $table_name_dtl_log set product_id='$product_id' and finish_goods='$finish_goods' and process='$process' and stockin_id='$row222->stockin_id' and qntyt='$qnty'");

			
			}
			else{
			  ////---------------- update	'cybercodex_stock_in_dtl and  cybercodex_stock_in_log-------------------------------- 
			
			
		$loginsert1 ="insert into $table_name_dtl set product_id='".$this->input->post('product_id')[$i]."',qntyt='".$this->input->post('qty')[$i]."',finish_goods='".$this->input->post('finish_goods')."',process='".$process."',stockin_id='$insert_id',contact_id='$vender',maker_id ='".$this->session->userdata('user_id')."',maker_date='".date('y-m-d')."',author_id='".$this->session->userdata('user_id')."',author_date='".date('y-m-d')."',comp_id='".$this->session->userdata('comp_id')."',zone_id='".$this->session->userdata('zone_id')."',brnh_id='".$this->session->userdata('brnh_id')."',divn_id='".$this->session->userdata('divn_id')."'";
			
			$this->db->query($loginsert1);
			
			
			$this->Model_admin_login->insert_user($table_name_dtl_log,$dataall2);
//$insert1="insert into $table_name_dtl set product_id='$product_id',quantity='$qnty',product_type='row_material'";
			  //$this->db->query($insert1);
			
			}
			
				}
			
			
			
				
			
		
echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";					

	

	
	}

} 


///------------------------------------------------close insert_stockin_qty-----------------------------------




public function complete_production(){

		@extract($_POST);
		
	
		$table_name='cybercodex_product_serial_log';
	    $finishg=$this->input->post('finishg');
		$qty=$this->input->post('qty');
		
		$Qserialfinish=$this->db->query("select * from cybercodex_product_serial where finish_goods='$finishg'");
		 $count=$Qserialfinish->num_rows();
		 
		$fetchQserialFinish=$Qserialfinish->row(); 
		$finishid=$fetchQserialFinish->quantity;
		
		$data = array(
					 
					 'aval_status' => 'Yes',	
					'product_id' => $this->input->post('finishg'),
					'quantity' => $this->input->post('qty'),
					//'location_id' => $location_id,
					'product_type' => 'finish_goods',
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
			
		//echo $count;die;
		
		
//echo "ssss";die;
//echo "select * from cybercodex_production_dtl where finish_goods='$finishg' ";
	  
		
		 $ewww1 = $this->db->query("select * from cybercodex_product_serial where finish_goods='$finishg'");
		 $fe=$ewww1->row();
		 
		 
//echo $fe->quantity;die;
		
		
		 
		 
		// echo  $count;die;
		 if($count>0){
		//echo "ss";die;
		//echo "update cybercodex_product_serial set quantity='$qq' where product_id='$fe->product_id' and location_id ='$location_id'";
		//echo "update cybercodex_product_stock set qtyinstock=qtyinstock+'$qq' where Product_id='$fe->product_id' ";
			$this->db->query("update cybercodex_product_serial set quantity=quantity+'$qq' where product_id='$fe->product_id'");
			
			$this->db->query("update cybercodex_product_stock set qtyinstock=qtyinstock+'$qq' where Product_id='$fe->product_id' ");
		}else{ 
	//echo "hj";die;	
	//echo "insert into  cybercodex_product_serial set quantity='$qq', finish_goods='$finishg',  product_id='$finishg' ,location_id ='$location_id'";	

		$this->Model_admin_login->insert_user($table_name,$data);
    //echo "update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg'";
    //echo "insert into  cybercodex_product_serial set quantity='$qty', finish_goods='$finishg',  product_id='$finishg' ,location_id ='$location_id'";
	$this->db->query("update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg'");
    $this->db->query("insert into  cybercodex_product_serial set quantity='$qty', finish_goods='$finishg',product_id='$finishg'");
	
    Response.Redirect("./master/stock_in_finish_goods?al=1");
		
	
			 
		 }
		
	
	
}




public function get_qtyinstock(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('get_qtyinstock');
}
	else
	{
	redirect('/index.php/master');
	}
	
}


public function get_color(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('get_color');
}
	else
	{
	redirect('/index.php/master');
	}
	
}

public function com_production(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('complete_production');
       }
	else
	{
	redirect('/index.php/master');
	}
	
}


public function aliesfunction(){
	
		$data['alias_idd']=$_GET['alias_idd'];
		$this->load->view('get-alies-itemctg',$data);
	
	}

public function insert_complete_production(){

		@extract($_POST);
		
		
		$table_name='cybercodex_product_serial_log';
	    $finishg=$this->input->post('finishg');
		$qty=$this->input->post('qty');
		//echo "select * from cybercodex_product_serial where finish_goods='$finishg' ";
		$Qserialfinish=$this->db->query("select * from cybercodex_product_serial where finish_goods='$finishg' ");
		 $count=$Qserialfinish->num_rows();
		 
		$fetchQserialFinish=$Qserialfinish->row(); 
		$finishid=$fetchQserialFinish->quantity;
		
		$data = array(
					 
					 'aval_status' => 'Yes',	
					'product_id' => $this->input->post('finishg'),
					'quantity' => $this->input->post('qty'),
					'location_id' => $location_id,
					'product_type' => 'finish_goods',
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'author_id' => $this->session->userdata('user_id'),
					'author_date'=> date('y-m-d'),
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					);
	
		$this->load->model('Model_admin_login');	
		
				
	if($count>0){
	
	
	
	//echo "update cybercodex_product_serial set quantity=quantity+'$qty' where finish_goods='$finishg' and product_id='$finishg' and location_id ='1'";
	$this->db->query("update cybercodex_product_serial set quantity=quantity+'$qty' where finish_goods='$finishg' and product_id='$finishg' and location_id ='1'");
	//echo "update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg' ";
	$this->db->query("update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg' ");
	$this->Model_admin_login->insert_user($table_name,$data);
		Response.Redirect("./production/com_production?al=1");
	
	
	}else{

	$this->Model_admin_login->insert_user($table_name,$data);
    //echo "update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg'";
    //echo "insert into  cybercodex_product_serial set quantity='$qty', finish_goods='$finishg',  product_id='$finishg' ,location_id ='$location_id'";
	//echo "update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg'";
	$this->db->query("update cybercodex_product_stock set qtyinstock=qtyinstock+'$qty' where Product_id='$finishg'");
	//echo "insert into  cybercodex_product_serial set quantity='$qty', finish_goods='$finishg',  product_id='$finishg' ,location_id ='1'";
    $this->db->query("insert into  cybercodex_product_serial set quantity='$qty', finish_goods='$finishg',  product_id='$finishg' ,location_id ='1'");
	
    Response.Redirect("./production/com_production?al=1");
	}
	
}
///------------------------------------------------------close stock in Finish Goods -----------------------------------------



}



?>