<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class MachineBreakdown extends my_controller {
   function __construct(){
     parent::__construct(); 
   
     $this->load->model('model_admin_login_1');

   }
public function manage_machine_breakdown(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$this->load->view('/MachineBreakdown/manage-machine-breakdown',$data);
	}
	else
	{
	redirect('index');
	}
		
}

public function view_machine_breakdown(){
	
		if($this->session->userdata('is_logged_in')){
		$this->load->view('MachineBreakdown/view-machine-breakdown');
}
	else
	{
	redirect('index');
	}
}

public function edit_machine_breakdown(){
	
		if($this->session->userdata('is_logged_in')){
		$this->load->view('MachineBreakdown/edit-machine-breakdown');
}
	else
	{
	redirect('index');
	}
}


public function add_machine_breakdown(){
	
		if($this->session->userdata('is_logged_in')){
		$this->load->view('MachineBreakdown/add-machine-breakdown');
}
	else
	{
	redirect('index');
	}
}


public function insert_machine_breakdown(){
	
		@extract($_POST);
		
		$table_name ='tbl_machine_breakdown';
		$pri_col ='mb_id';
	 	$id = $this->input->post('mb_id');
		$mb_date = $this->input->post('machine_date');	
			
			$tdata=$this->db->query("select * from tbl_machine_breakdown where machine_date='$mb_date' ");
			$cntdata=$tdata->num_rows();
			//echo $cntdata; die;
						
						if($cntdata>0){
					
							echo "<script>
								alert('This Date Breakdown List is Already Created !!');
								window.location.href='add_machine_breakdown';
								</script>";

						}
						
			else{
			
		$countrw     = count($this->input->post('m_b_d_name'));	
		$countclm    = $this->input->post('machine_id');
      // echo $machine_id  = count($this->input->post('machine_id'));
        $hoursname   = $this->input->post('hoursname');
        $hoursname[19];
		$i=0;
	    $total = 0;
		foreach ($this->input->post('machine_id') as  $dt) {
			$j=$total;//45
			$m=0;
			$explod = array();
			$explod2 = array();
			foreach ($this->input->post('m_b_d_name') as  $row) {
				
				$explod[] = $this->input->post('hoursname')[$j];
                $explodStr= implode("^",$explod);
                $explod2[]= $row[$i];
				$explodStr2= implode("^",$explod2);

			$j++; 
			$m++; 
			} 
			$total = $j;
			$this->model_admin_login_1->insert_user($table_name,$dt,$this->input->post('machine_date'),$explodStr2,$explodStr);
    }
	redirect('master/MachineBreakdown/manage_machine_breakdown');	
 }
	
}


public function update_machine_breakdown(){
	
		@extract($_POST);
		
		$table_name ='tbl_machine_breakdown';
		$pri_col ='mb_id';
	 	$id = $this->input->post('mb_id');
		$mb_date = $this->input->post('mb_date');
			
			$dltdata=$this->db->query("delete from tbl_machine_breakdown where machine_date='$mb_date'");
			
			
		$countrw     = count($this->input->post('m_b_d_name'));	
		$countclm    = $this->input->post('machine_id');
      // echo $machine_id  = count($this->input->post('machine_id'));
        $hoursname   = $this->input->post('hoursname');
        $hoursname[19];
		$i=0;
	    $total = 0;
		foreach ($this->input->post('machine_id') as  $dt) {
			$j=$total;//45
			$m=0;
			$explod = array();
			$explod2 = array();
			foreach ($this->input->post('m_b_d_name') as  $row) {
				
				$explod[] = $this->input->post('hoursname')[$j];
                $explodStr= implode("^",$explod);
                $explod2[]= $row[$i];
				$explodStr2= implode("^",$explod2);

			$j++; 
			$m++; 
			} 
			$total = $j;
			$this->model_admin_login_1->insert_user($table_name,$dt,$this->input->post('machine_date'),$explodStr2,$explodStr);
    }	
	//redirect('master/MachineBreakdown/manage_machine_breakdown');
		/*echo "<script type='text/javascript'>";

					echo "window.close();";

					echo "window.opener.location.reload();";

					echo "</script>";*/
					
					echo "
						<script>
						alert('Updated Successfully');
						window.close();
						</script>
						
						";

}


}
?>