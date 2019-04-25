<?php
$tableName="tbl_wip_hdr"; 
$supplier='DEFLESHING LIST ReportCSV';

$contents="Date,Finish Goods,Unit,Shift,Supervisor,Operator,Hours,Act Hours,Total Qty,Completed,Rejection, \n\n";

	 @extract($_GET);
	if(@$Search!=''){

	  $queryy="select * from tbl_wip_hdr where status='A'";

	 	 if($Product_typeid!=''){
		
	  	$queryy.=" and product_type like '%$Product_typeid%'";

		  }
		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and lot_no like '%$serial_no%'";

		  } 

		}
	if($Search==''){
		  $queryy="select * from tbl_wip_hdr where status='A'";
}		

		  @$result=$this->db->query($queryy);
		  
 foreach(@$result->result() as $liness){
 
if($Search!='')
	 {
	$wipLogQuery=$this->db->query("select *from tbl_defleshing_log where bom_id='$liness->wip_hdr_id'");
	}
	else
	{
	$wipLogQuery=$this->db->query("select *from tbl_defleshing_log where bom_id='$liness->wip_hdr_id' ");
	}
	foreach($wipLogQuery->result() as $line){
	
	
	$machineQuery=$this->db->query("select *from tbl_machine where Machine_id='$line->machine_id'");
	$getMachine=$machineQuery->row();
	
	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->p_id'");
	$getproduct=$productQuery->row();
	$supervisorQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->supervisor'");
	$getSupervisor=$supervisorQuery->row();
	
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	
$contents.=str_replace(',',' ',$line->date).",";
$contents.=str_replace(',',' ',$getproduct->productname).",";
$contents.=str_replace(',',' ',$getunit->keyvalue).",";
//$contents.=str_replace(',',' ',$getMachine->machinename).",";
$contents.=str_replace(',',' ',$line->shift).",";
$contents.=str_replace(',',' ',$getSupervisor->first_name).",";
 $dataID=$line->operator;
	//print_r($dataID);
	$operatorQuery=$this->db->query("select *from tbl_contact_m where  contact_id in ($dataID)");
	foreach ($operatorQuery->result() as $getOperator){
	$kk=$getOperator->first_name;
 $mmm=str_replace(',',' ',$kk)." / ";
$contents.=$mmm;
}
$contents.=str_replace(',',' ','').",";

$contents.=str_replace(',',' ',$hour=$line->hours).",";
$contents.=str_replace(',',' ',$actHour=$line->act_hour).",";
$contents.=str_replace(',',' ',$liness->quantity).",";
$contents.=str_replace(',',' ',$compl=$line->quantity-$line->rejection_qty." ".$getunit->keyvalue).",";
$contents.=str_replace(',',' ',$reg=$line->rejection_qty." ".$getunit->keyvalue).", \n";

$regSum=$regSum+$reg;
$CompSum=$CompSum+$compl;
$RunnerSum=$RunnerSum+$runner;
$HourSum=$HourSum+$hour;
$ActSum=$ActSum+$actHour;
} }
$contents.=str_replace(',',' ','').", \n";
$contents.=str_replace(',',' ','Total Qty').",";
$contents.=str_replace(',',' ',$liness->quantity).",";
$contents.=str_replace(',',' ','Completed Qty').",";
$contents.=str_replace(',',' ',$CompSum).",";
$contents.=str_replace(',',' ','Rejected Qty').",";
$contents.=str_replace(',',' ',$regSum).",";
$contents.=str_replace(',',' ','Hours Taken').",";
$contents.=str_replace(',',' ',$HourSum).", \n";
 
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
