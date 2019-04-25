<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Activity extends my_controller {

function __construct(){
    parent::__construct(); 
	$this->load->library('pagination');
    $this->load->model('model_activity');	
}  

public function manage_activity()
{
	
	if($this->session->userdata('is_logged_in')){
	//$data=$this->user_function();// call permission fnctn
	//$data['result'] = $this->model_activity->activity_data();
	$data = $this->Manage_Activity_Data();
	$this->load->view('manage-activity',$data);
	}
	else
	{
	redirect('index');
	}
		
}

public function Manage_Activity_Data()
{


		  $table_name='tbl_activity';
		  $data['result'] = "";
		  ////Pagination start ///
		  $url   = site_url('/activity/Activity/manage_activity?');
		  $sgmnt = "4";
		  $showEntries =10;
		  $totalData   = $this->model_activity->count_activity($table_name,'A',$this->input->get());
		  //$showEntries= $_GET['entries']?$_GET['entries']:'12';
		  if($_GET['entries']!="")
		  {
			 $showEntries = $_GET['entries'];
			 $url   = site_url('/activity/Activity/manage_activity?entries='.$_GET['entries']);
		  }
          $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
          $data=$this->user_function();
     	  //////Pagination end ///
		  $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
		  $data['pagination']        = $this->pagination->create_links();
	
		  if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_activity->filterActivityData($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_activity->getActivityData($pagination['per_page'],$pagination['page']);


	        // call permission fnctn
	        return $data;


}

public function addactivity(){
	//echo "ssss";die;
	if($this->session->userdata('is_logged_in')){
	$data['ID'] = $_GET['ID'];
		$this->load->view('edit-activity', $data);
}
	else
	{
	redirect('index');
	}
}

public function getcoust(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
	$ID = $_GET['ID'];
		$sqlgroup=$this->db->query("select * from tbl_leads where lead_id='$ID'");
		$rowCheck=$sqlgroup->row();
		echo $rowCheck->contact_id;
}
	else
	{
	redirect('index');
	}
}

public function update_activity()
{
		//echo "ddsc";die;
		@extract($_POST);
		$table_name_log ='tbl_activity_log';
		$table_name ='tbl_activity';
		$pri_col ='activity_id';
	 	$id= $this->input->post('lead_id');
		//echo $id;die;
		//$pupaction=$this->input->post('pupaction');
		
		$sqlgroup=$this->db->query("select * from tbl_activity where lead_id='$id'");
		$rowCheck=$sqlgroup->num_rows();
		//echo $rowCheck;die;
		
		$this->load->model('Model_admin_login');
		
					$data= array(
					
					'lead_id' => $this->input->post('lead_id'),
					'nxt_action' => $this->input->post('nxt_action'),
					'nxt_action_date' => $this->input->post('nxt_action_date'),
					'crnt_date' => $this->input->post('crnt_date'),
					'communication' => $this->input->post('communication'),
					'plan_nxt_activity' => $this->input->post('plan_nxt_activity'),
					//'remarks' => $this->input->post('remarks')
					
					
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
		if($rowCheck==0)
		{
			$this->Model_admin_login->insert_user($table_name,$dataall);
		}
		else
		{
		
			//echo $id;
			//print_r($dataaa11);die;
			$this->db->query("UPDATE $table_name SET nxt_action='$nxt_action', nxt_action_date='$nxt_action_date', crnt_date='$crnt_date', communication='$communication', plan_nxt_activity='$plan_nxt_activity' WHERE lead_id='$lead_id'");
			//echo $sql; die;
			//$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataaa11);
		}
					//print_r($dataall);die;
					$this->Model_admin_login->insert_user($table_name_log,$dataall);
					$this->session->set_flashdata('flash_msg', 'Activity Added Successfully.');
					redirect('activity/Activity/manage_activity');

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

	


}

?>