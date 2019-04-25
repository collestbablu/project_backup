<?php
@extract($_GET);
$contents="Sr. No.,Part Name,Moulding,Defeleshing,Inspection,Packing \n";	

if(@$Search!=''){

	   $queryy="select * from tbl_production_log where status='A' ";

	 	
		  if($product_name!=''){
	  	 $queryy.=" and p_id  = '$product_name'";

		  }
		  
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and date >='$fdate1' and date <='$todate1' ";
		}		  
		 
		 $queryy  = $queryy . "group by p_id";
		 
		}
if($Search==''){
		  $queryy="select * from tbl_production_log where status='A' group by p_id";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){

	



							$Query=$this->db->query("select * from tbl_product_stock where product_id='$line->p_id'");
						    $fetchQ=$Query->row();
							
							
							$Query1=$this->db->query("select SUM(quantity) as Msum from tbl_production_log where p_id='$line->p_id' and stage='Moulding'");
						    $fetchQ1=$Query1->row();
							
							$Query2=$this->db->query("select SUM(quantity) as Dsum from tbl_production_log where p_id='$line->p_id' and stage='Defleshing'");
						    $fetchQ2=$Query2->row();
							$Query3=$this->db->query("select SUM(quantity) as Psum from tbl_production_log where p_id='$line->p_id' and stage='Packing'");
						    $fetchQ3=$Query3->row();
							
							$Query4=$this->db->query("select SUM(quantity) as Qsum from tbl_production_log where p_id='$line->p_id' and stage='QA'");
						    $fetchQ4=$Query4->row();
							
							

							
$contents.=str_replace(',',' ',$i).",";
$contents.=str_replace(',',' ',$fetchQ->productname).",";
$contents.=str_replace(',',' ',$fetchQ1->Msum).",";
$contents.=str_replace(',',' ',$fetchQ2->Dsum).",";
$contents.=str_replace(',',' ',$fetchQ4->Qsum).",";

$contents.=str_replace(',',' ',$fetchQ3->Psum).",\n";
	$i++;
}  
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
