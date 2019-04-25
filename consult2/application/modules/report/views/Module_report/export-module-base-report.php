<?php
$contents="S. No.,Date,Module Name,Shot \n";	
@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_module_details where status='A' ";

	 	
		  if($m_name!=''){
	  	 $queryy.=" and module_id  = '$m_name'";

		  }
		  
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and m_date >='$fdate1' and m_date <='$todate1' ";
		}		  
		 
		 $queryy  = $queryy . "group by shot";
		 
		}
if($Search==''){
		  $queryy="select * from tbl_module_details where status='A' group by module_id";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){
$Query=$this->db->query("select * from tbl_master_data where serial_number='$line->module_id'");
						    $fetchQ=$Query->row();
	
	

							
$contents.=str_replace(',',' ',$i).",";
$contents.=str_replace(',',' ',$line->m_date).",";
$contents.=str_replace(',',' ',$fetchQ->keyvalue).",";
$contents.=str_replace(',',' ',$line->shot).",\n";
	$i++;
}  
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
