<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class production extends my_controller {

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

public function manage_production(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('manage-production');
}


	else
	{
	redirect('/master');
	}
	
}


public function insert_stock_out(){

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

}



?>