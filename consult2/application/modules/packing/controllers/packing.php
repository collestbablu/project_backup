<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class packing extends my_controller {

public function add_production(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-qa');
}
	else
	{
	redirect('/master');
	}
	
}


public function updatePacking(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-packing');
}
	else
	{
	redirect('/master');
	}
	
}

public function viewWip(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('viewwip');
}
	else
	{
	redirect('/master');
	}
	
}


public function manage_packing(){

	if($this->session->userdata('is_logged_in')){
		$this->load->view('manage-packing');
}


	else
	{
	redirect('/master');
	}
	
}


//===============================================Anoj 17/02/2017=================

public function insert_production_stock_out(){
	
			extract($_POST);
		
		$table_name ='tbl_wip_hdr';
		$table_name_dtl ='tbl_wip_dtl';
		$table_name_log ='tbl_wip_log';
		$pri_col ='wip_hdr_id';
		$pri_col_dtl ='wip_dtl_id';
		$pri_col_log ='wip_log_id';
		$rows=$this->input->post('rowiddd');
		
		$finishqq=$this->input->post('finishg');
		
		$id=$this->input->post('Productss_id');
		
		if($id!=''){
			
			for($i=0; $i<$rows; $i++)
				{
					
			 $enterQty=$this->input->post('new_quantity')[$i];
		
			 
			if($enterQty!='')
			{
			$raw_materials=$this->input->post('product_id')[$i];
			$scrap= $this->input->post('scrap')[$i];	
			$completed=$this->input->post('completed')[$i];
			$not_completed=$this->input->post('not_completed')[$i];
			$lot=$this->input->post('lot_id')[$i];
		
			
			
				$selectQ=$this->db->query("select * from tbl_product_serial where product_id='$raw_materials'");
				$fetchQ=$selectQ->row();
				$cnt=$selectQ->num_rows();
			    
				
				
				if($cnt>0)
				{
		
		$this->db->query("update tbl_product_serial set quantity=quantity-'$enterQty' where product_id='$raw_materials'");
		
		$this->db->query("update tbl_product_stock set quantity=quantity-'$enterQty' where Product_id='$raw_materials'");
		
		
				}
				else
				{
					$this->db->query("update tbl_product_serial set quantity=quantity-'$enterQty' where product_id='$raw_materials'");
		
		$this->db->query("update tbl_product_stock set quantity=quantity-'$enterQty' where Product_id='$raw_materials'");
					
				}
				
				if($raw_materials!=''){
				
				 $data_log['product_type']= $this->input->post('product_type');
				 $data_log['product_name']= $this->input->post('product_id')[$i];
				 $data_log['lot_no']= $this->input->post('lot_no');
				 $data_log['machine_name']=$this->input->post('machine_name');
				 $data_log['date']= $this->input->post('date');
				 $data_log['shift']= $this->input->post('shift');
				 $data_log['quantity']= $this->input->post('quantity');
				 $data_log['unit']= $this->input->post('unit')[$i];  				  				
				 $data_log['total_quantity']= $this->input->post('total_quantity')[$i];
				 $data_log['gross_weight']=$this->input->post('gross_weight')[$i];
				 $data_log['net_weight']= $this->input->post('net_weight')[$i];
				 $data_log['scrap_weight']= $this->input->post('scrap_weight')[$i];	
				 $data_log['new_quantity']=$this->input->post('new_quantity')[$i];				 	
				 $data_log['scrap']=$this->input->post('scrap')[$i];
				 $data_log['completed']=$this->input->post('completed')[$i];
				 $data_log['not_completed']=$this->input->post('not_completed')[$i];				 		
				 $data_log['maker_id']=$this->session->userdata('user_id');
				 $data_log['comp_id']=$this->session->userdata('comp_id');
				 $data_log['zone_id']=$this->session->userdata('zone_id');
				 $data_log['brnh_id']=$this->session->userdata('brnh_id');
					
	//$this->db->query("update tbl_wip_dtl set new_quantity=new_quantity+'$enterQty',scrap=scrap+'$scrap',completed=completed+'$completed',not_completed=not_completed+'$not_completed' where product_name='$raw_materials' and lot_no='$lot'");	
		
		echo $data_log;die;
		
			
				$this->load->model('Model_admin_login');
				$this->Model_admin_login->insert_user($table_name_log,$data_log);
				
					}
			
				
				}
				 
				}



				echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";				
			
		}else{
		
		$finishId=$this->input->post('product_name');
		
		$data = array(
	
					'product_type' => $this->input->post('product_type'),
					'product_name' => $this->input->post('product_name'),
					'date' => $this->input->post('date'),
					'lot_no' => $this->input->post('lot_no'),
					'machine_name' => $this->input->post('machine_name'),
					'shift' => $this->input->post('shift'),
					'quantity' => $this->input->post('qnty'),					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'A',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					
					
					);
					
			
		$this->load->model('Model_admin_login');	
		$this->Model_admin_login->insert_user($table_name,$data);
		
		$lastHdrId=$this->db->insert_id();
		
		$selectQ=$this->db->query("select * from tbl_product_serial where product_id='$finishId'");
				$fetchQ=$selectQ->row();
				$cnt=$selectQ->num_rows();
			    
				
				if($cnt>0)
				{
		
		$this->db->query("update tbl_product_serial set quantity=quantity+'$qty' where product_id='$finishId'");
		
		$this->db->query("update tbl_product_stock set quantity=quantity+'$qty',templateid='2' where Product_id='$finishId'");
		
				}
				else
				{
					$this->db->query("update tbl_product_serial set quantity=quantity+'$qty' where product_id='$finishId'");
		
		$this->db->query("update tbl_product_stock set quantity=quantity+'$qty',templateid='2' where Product_id='$finishId'");
					
				}

		
		
		$this->load->model('Model_admin_login');
		for($i=0; $i<$rows; $i++)
				{
				
			$enterQty=$this->input->post('enter_qty')[$i];
			
			$prod_id=$this->input->post('product_id')[$i];
			$req_qty=$this->input->post('total_quantity')[$i];
			
				$selectQ=$this->db->query("select * from tbl_product_serial where product_id='$prod_id'");
				$fetchQ=$selectQ->row();
				$cnt=$selectQ->num_rows();
			    
				
				if($cnt>0)
				{
		
		$this->db->query("update tbl_product_serial set quantity=quantity-'$req_qty' where product_id='$prod_id'");
		
		$this->db->query("update tbl_product_stock set quantity=quantity-'$req_qty' where Product_id='$prod_id'");
		
				}
				else
				{
					$this->db->query("update tbl_product_serial set quantity=quantity-'$req_qty' where product_id='$prod_id'");
		
		$this->db->query("update tbl_product_stock set quantity=quantity-'$req_qty' where Product_id='$prod_id'");
					
				}
			
				

				 $data_dtl['wip_hdr_id']= $lastHdrId;
				 $data_dtl['product_name']= $prod_id;
				 $data_dtl['lot_no']=$this->input->post('lot_no');
				 $data_dtl['quentity']=$this->input->post('total_quantity')[$i];
				 $data_dtl['unit']= $this->input->post('unit')[$i];
				 $data_dtl['gross_weight']= $this->input->post('gross_weight')[$i];	
				 $data_dtl['net_weight']= $this->input->post('net_weight')[$i];
				 $data_dtl['scrap_weight']= $this->input->post('scrap_weight')[$i];
				 $data_dtl['new_quantity']= $this->input->post('new_quantity')[$i];	
				 $data_dtl['scrap']= $this->input->post('scrap')[$i];					 			    			
				 $data_dtl['maker_id']=$this->session->userdata('user_id');
				 $data_dtl['comp_id']=$this->session->userdata('comp_id');
				 $data_dtl['zone_id']=$this->session->userdata('zone_id');
				 $data_dtl['brnh_id']=$this->session->userdata('brnh_id');
				
				 
				 $data_log['product_type']= $this->input->post('product_type');
				 $data_log['product_name']= $prod_id;
				 $data_log['lot_no']= $this->input->post('lot_no');
				 $data_log['machine_name']=$this->input->post('machine_name');
				 $data_log['date']= $this->input->post('date');
				 $data_log['shift']= $this->input->post('shift');
				 $data_log['quantity']= $this->input->post('quantity');
				 $data_log['unit']= $this->input->post('unit')[$i];  				  				
				 $data_log['total_quantity']= $this->input->post('total_quantity')[$i];
				 $data_log['gross_weight']=$this->input->post('gross_weight')[$i];
				 $data_log['net_weight']= $this->input->post('net_weight')[$i];
				 $data_log['scrap_weight']= $this->input->post('scrap_weight')[$i];	
				 $data_log['new_quantity']=$this->input->post('new_quantity')[$i];			
				 $data_log['maker_id']=$this->session->userdata('user_id');
				 $data_log['comp_id']=$this->session->userdata('comp_id');
				 $data_log['zone_id']=$this->session->userdata('zone_id');
				 $data_log['brnh_id']=$this->session->userdata('brnh_id');
				 
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);
						
				$this->Model_admin_login->insert_user($table_name_log,$data_log);
				
					
				}
	    $rediectInvoice="/QA/manage_production";
		redirect($rediectInvoice);
					
		}
	
		
}

//====================================================
public function qa_rejection(){

extract($_POST);

$table_name_1='tbl_packing_hdr';
$table_name_log='tbl_production_log';
$pri_col ='lot_no';
$id= $lot_no;

$data = array(
	
					'lot_no' => $id,
					'p_id' => $p_id,
					'quantity' => $comQty,					
					
					'stage' => 'Packing',
					'date' => $date,
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'Packing Done',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
					
					
					);
		$this->load->model('Model_admin_login');				
		$this->Model_admin_login->insert_user($table_name_1,$data);
		$this->Model_admin_login->insert_user($table_name_log,$data);
		
		##this query is for checking in wip hdr lot no is avlaible or not
		
		$lotQuery=$this->db->query("select *from tbl_qa_hdr where lot_no='$lot_no'");
		$cntLotNo=$lotQuery->num_rows();
		$getLot=$lotQuery->row();
		
		
		if($cntLotNo>0)
		{
		$qty=$getLot->rejection_qty+$rejQty;
		
		
			$dataHdr=array(
		

					'quantity' => $com_qty,	
					'lot_no' => $lot_no,				
					
					'rejection_qty' => $qty,
					'date' => date('y-m-d'),
					
					'product_name' => $p_id
					
		
							);	
							echo "
<script>
alert('updated Successfully');
window.close();
</script>

";
		
		$this->Model_admin_login->update_user($pri_col,$table_name_1,$id,$dataHdr);
		
		}
		
		else
		
		{
		
		$dataHdr=array(
		
					'quantity' => $com_qty,					
					'lot_no' => $lot_no,
					'rejection_qty' => $rejQty,
					'date' => date('y-m-d'),
					
					'product_name' => $p_id,
					
					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'A',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
		
							);	
				
					$this->Model_admin_login->insert_user($table_name_1,$dataHdr);
		

echo "
<script>
alert('updated Successfully');
window.close();
</script>

";

}

}



}

?>