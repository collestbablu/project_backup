<?php
$tableName="tbl_bill_of_material_hdr"; 
$supplier='MOULDING LIST ReportCSV';

$contentmanage="Lot. No:,Date,Product Type,Product Name,Quantity, \n\n";

$contents="Item Name:,Quantity,Unit,Gross Weight,Net Weight,Runner Weight, \n\n";

$contentsw="Date:,Finish Goods,Unit,Machine Name,Shift,Supervisor,Operator,Hours,Act Hours,Total Qty,Completed,Runner Weight,Lumps,Rejection,Stage, \n\n";
	 @extract($_GET);
	if(@$Search!=''){

	  $queryy="select * from tbl_bill_of_material_hdr where status='A'";

	 	 if($Product_typeid!=''){
		
	  	$queryy.=" and product_type like '%$Product_typeid%'";

		  }
		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and serial_no like '%$serial_no%'";

		  } 

		}
	if($Search==''){
		  $queryy="select * from tbl_bill_of_material_hdr where status='A'";
}		

		  @$result=$this->db->query($queryy);
		  
 foreach(@$result->result() as $line){
 
 $sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
	
 $contentmanage.=str_replace(',',' ',$line->serial_no).",";
$contentmanage.=str_replace(',',' ',$line->date).",";
$contentmanage.=str_replace(',',' ',$line->product_type).",";
$contentmanage.=str_replace(',',' ',$resultname->productname).",";
$contentmanage.=str_replace(',',' ',$line->quantity).", \n";

}
$contentmanage.=str_replace(',',' ','').",";
$contentmanage.=str_replace(',',' ','').",";
$contentmanage.=str_replace(',',' ','Raw Material').",";
$contentmanage.=str_replace(',',' ','').",";
$contentmanage.=str_replace(',',' ','').",";
$contentmanage.=str_replace(',',' ','').", \n";
   $i=$start;
    $j=1;
   foreach(@$result->result() as $line){
   $i++;
   if($i%2!=0){
   	$color='#ECE9D8';
   }else{
   	$color='#F1FEFD';
   }
 $sql1 = $this->db->query("select * from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$line->bill_of_material_id_hdr'");
					   			foreach($sql1->result() as $fetch){
								
					$Query=$this->db->query("select * from tbl_product_stock where product_id='$fetch->item_name'");
						    $fetchQ=$Query->row();
	
	
$contents.=str_replace(',',' ',$fetchQ->productname).",";
$contents.=str_replace(',',' ',$fetch->quentity).",";
$contents.=str_replace(',',' ',$fetch->unit).",";
$contents.=str_replace(',',' ',$fetch->gross_weight).",";
//$contents.=str_replace(',',' ',$line->balance_total).",";
$contents.=str_replace(',',' ',$fetch->net_weight).",";
$contents.=str_replace(',',' ',$fetch->scrap_weight).",\n";
//$tt = $tt + $line->grand_total;
} }
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
//$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','Work In Progress').", \n";

  @extract($_GET);
	if(@$Search!=''){

	  $queryy="select * from tbl_bill_of_material_hdr where status='A'";

	 	 if($Product_typeid!=''){
		
	  	$queryy.=" and product_type like '%$Product_typeid%'";

		  }
		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and serial_no like '%$serial_no%'";

		  } 

		}

if($Search==''){
		  $queryy="select * from tbl_bill_of_material_hdr where status='A'";
}

	  foreach(@$result->result() as $bom){
	
	
	 if($bom=='')
	 {
	$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='$bom->bill_of_material_id_hdr' and shift='$shift'");
	}
	else
	{
	$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='$bom->bill_of_material_id_hdr' ");
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

$contentsw.=str_replace(',',' ',$line->date).",";
$contentsw.=str_replace(',',' ',$getproduct->productname).",";
$contentsw.=str_replace(',',' ',$getunit->keyvalue).",";
$contentsw.=str_replace(',',' ',$getMachine->machinename).",";
$contentsw.=str_replace(',',' ',$line->shift).",";
$contentsw.=str_replace(',',' ',$getSupervisor->first_name).",";
 $dataID=$line->operator;
	//print_r($dataID);
	$operatorQuery=$this->db->query("select *from tbl_contact_m where  contact_id in ($dataID)");
	foreach ($operatorQuery->result() as $getOperator){
	$kk=$getOperator->first_name;
 $mmm=str_replace(',',' ',$kk)." / ";
$contentsw.=$mmm;
}
$contentsw.=str_replace(',',' ','').",";

$contentsw.=str_replace(',',' ',$hour=$line->hours).",";
$contentsw.=str_replace(',',' ',$actHour=$line->act_hour).",";
$contentsw.=str_replace(',',' ',$bom->quantity).",";
$contentsw.=str_replace(',',' ',$compl=$line->quantity-$line->rejection_qty." ".$getunit->keyvalue).",";
$contentsw.=str_replace(',',' ',$runner=$line->scrap).",";
$contentsw.=str_replace(',',' ',$line->lumbs).",";
$contentsw.=str_replace(',',' ',$reg=$line->rejection_qty." ".$getunit->keyvalue).",";
$contentsw.=str_replace(',',' ',$line->stage).", \n";
$regSum=$regSum+$reg;
$CompSum=$CompSum+$compl;
$RunnerSum=$RunnerSum+$runner;
$HourSum=$HourSum+$hour;
$ActSum=$ActSum+$actHour;
} }
$contentsw.=str_replace(',',' ','').", \n";
$contentsw.=str_replace(',',' ','Total Qty').",";
$contentsw.=str_replace(',',' ',$bom->quantity).",";
$contentsw.=str_replace(',',' ','Completed Qty').",";
$contentsw.=str_replace(',',' ',$CompSum).",";
$contentsw.=str_replace(',',' ','Rejected Qty').",";
$contentsw.=str_replace(',',' ',$regSum).",";
$contentsw.=str_replace(',',' ','Total Runner').",";
$contentsw.=str_replace(',',' ',$RunnerSum/100).",";
$contentsw.=str_replace(',',' ','Hours Taken').",";
$contentsw.=str_replace(',',' ',$HourSum).",";
$contentsw.=str_replace(',',' ','Act Hours').",";
$contentsw.=str_replace(',',' ',$ActSum).", \n";

$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contentmanage;
print $contents;
print $contentsw;
exit;
?>		
	
