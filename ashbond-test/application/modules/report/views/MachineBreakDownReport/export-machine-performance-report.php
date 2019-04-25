<?php
$contents="Sr. No.,Machine Name,Available Hrs,Breakdown Hrs,Hrs. Use Iin Production(As per cycle time),Machine Utilization,Operator Efficiency \n";	
@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_wip_hdr where status='A' ";

	 	
		  if($product_name!=''){
	  	 $queryy.=" and machine_id  = '$product_name'";

		  }
		  
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and date >='$fdate1' and date <='$todate1' ";
		}		  
		 
		 $queryy  = $queryy . "group by product_name";
		 
		}
if($Search==''){
		  $queryy="select * from tbl_wip_hdr where status='A' group by product_name";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){
$Query=$this->db->query("select * from tbl_machine where Machine_id='$line->machine_id'");
						    $fetchQ=$Query->row();
	
	

							
$contents.=str_replace(',',' ',$i).",";
$contents.=str_replace(',',' ',$fetchQ->machinename).",";
$contents.=str_replace(',',' ',$line->hours).",";
$contents.=str_replace(',',' ',$line->breakdown_hour).",";
$contents.=str_replace(',',' ',$line->act_hour).",";
$contents.=str_replace(',',' ',$line->act_hour/$line->hours*100).",";
$contents.=str_replace(',',' ',($line->act_hour-$line->breakdown_hour)/$line->hours*100).",\n";
	$i++;
}  
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
