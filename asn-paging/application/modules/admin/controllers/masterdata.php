<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Masterdata extends my_controller {

function __construct(){
   parent::__construct(); 
    $this->load->model('model_admin_master');	
	$this->load->library('pagination'); 
}
	

//----------------------------------start master data function-----------------------

	public function masterdata_list()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('status','A')
           -> get('tbl_master_data');
		   
		$i='0';
		
		foreach($res->result() as $row)
		{
	
		  $compQuery = $this -> db
           -> select('*')
           -> where('param_id',$row->param_id)
           -> get('tbl_master_data_mst');
		  $compRow = $compQuery->row();
	
			$info[$i]['1']=$compRow->keyname;
			$info[$i]['2']=$row->keyvalue;
			$info[$i]['3']=$row->description;
			$info[$i]['4']=$row->serial_number;
			
				$i++;
			
		}
		return $info;
	
	}
	
	public function insert_master_data(){
		
		extract($_POST);
		$table_name ='tbl_master_data';
		 $pri_col ='serial_number';
	 	$id= $this->input->post('serial_number');
		$data = array(
					
					'param_id' => $this->input->post('param_id'),
					'keyvalue' => $this->input->post('keyvalue'),
					'description' => $this->input->post('description')
					
					);
		$sesio = array(
					
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_id' => $this->session->userdata('user_id'),
					'author_id' => $this->session->userdata('user_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
			$dataall=array_merge($data,$sesio);
			
					
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
				redirect('/admin/masterdata/manage_master_data');
				}
				
			}	
			
		public function add_master_data(){
	
	if($this->session->userdata('is_logged_in')){
		$this->load->view('/masterdata/add-master-data');
	}
	else
	{
	redirect('index');
	}
	
	
}
	
	public function manage_master_data(){
	
	
	if($this->session->userdata('is_logged_in')){
	
	//$data=$this->user_function();// call permission fnctn
	
	$data = $this->manageMasterJoin();
	
	$this->load->view('/masterdata/manage-master-data',$data);
	}
	else
	{
	redirect('index');
	}
	
	
}

function manageMasterJoin(){

       $table_name='tbl_master_data';
	   
       $data['result'] = "";
	   ////Pagination start ///
	   $url   = site_url('/admin/masterdata/manage_master_data?');
	   $sgmnt = "4";
	   $showEntries =10;
       $totalData   = $this->model_admin_master->count_all($table_name,'A',$this->input->get());
       //$showEntries= $_GET['entries']?$_GET['entries']:'12';
       if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url   = site_url('/admin/masterdata/manage_master_data?entries='.$_GET['entries']);
       }
         $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
         $data=$this->user_function();
        //////Pagination end ///
		$data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
		$data['pagination']        = $this->pagination->create_links();
	
		if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_admin_master->FilterMasterData($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_admin_master->master_data_get($pagination['per_page'],$pagination['page']);


	       // call permission fnctn
	      return $data;
}

	//--------------------------close master data -----------------------------------	



	
}


?>