<?php
$tableName="tbl_product_stock"; 
$supplier='Product Color Stock Report CSV';
$contents="Serial No:,Product Code,Product Name,Usage Unit,Color,Quantity,Quantity In Stock, \n";

	
	
				
				 @extract($_GET);
	


if(@$Search!=''){

	  $queryy="select * from tbl_product_stock where status='A'";

		    if($productname!=''){
	  	$queryy.=" and productname like '%$productname%'";

		  }

	   if($product_code!='')
		  {
		$proQ1=$this->db->query("select * from tbl_product_serial where serial_code like '%$product_code%'");
		$fProQ1=$proQ1->row();
		$pro=$fProQ1->product_id;
	  	$queryy.=" and Product_id='$pro'";

		  }

		}


		  $result=$this->db->query($queryy);

		
					//echo $queryy;
		  
   $i=$start;

    $j=1;
    $srn=1;

   foreach(@$result->result() as $line){



   $i++;



   if($i%2!=0){



   	$color='#ECE9D8';



   }else{



   	$color='#F1FEFD';



   }

    $proQ=$this->db->query("select * from tbl_product_serial where product_id='$line->Product_id'");
		$fProQ=$proQ->row();
  $pro=$fProQ->serial_code;
 
$contents.=str_replace(',',' ',$srn++).",";
$contents.=str_replace(',',' ',$pro).",";
$contents.=str_replace(',',' ',$line->productname).",";

$proQ1=$this->db->query("select * from tbl_master_data where serial_number='$line->usageunit'");
		$fProQ12=$proQ1->row();

$contents.=str_replace(',',' ',$fProQ12->keyvalue).",";




$array=$line->color;      // explode function is used to print the color name



 $g= explode(",", $array);
 
 //print_r($g);die;
 $pros1234=array();
 for($m=0;$m<count($g);$m++)
 {
 
 
 //echo $m;
 //echo "select * from tbl_master_data where serial_number='$g[$m]'";
 $proQ1=$this->db->query("select * from tbl_master_data where serial_number='$g[$m]'");
		$fProQ12=$proQ1->row();
 $pros1234[]=$fProQ12-> keyvalue ;
$mm=implode('|',$pros1234);
 
 } 
 $contents.=str_replace(',',' ',$mm).",";
 


// print_r($g);die;
$pros12345=array();
	 for($mk=0;$mk<count($g);$mk++)
 {
//echo  "select sum(quantity) as nat from tbl_product_serial_log where product_id='$line->Product_id' and color='$g[$m]'";
$proQ123=$this->db->query("select sum(quantity) as nat from tbl_product_serial_log where product_id='$line->Product_id' and color='$g[$mk]'");
	$fProQ122=$proQ123->row();
$pros12345[]=$fProQ122->nat;
$mms=implode('|',$pros12345);

}

$contents.=str_replace(',',' ',$mms).",";



$proQ1235=$this->db->query("select sum(quantity) as qstock from tbl_product_serial_log where product_id='$line->Product_id'");   //added quantity stock
	$fProQ1225=$proQ1235->row();
 $quant= $fProQ1225->qstock;

$contents.=str_replace(',',' ',$quant).",\n";
 
 
 
} 
 

/*$contents.=str_replace(',',' ',$line->unitprice_purchase).",";
$contents.=str_replace(',',' ',$line->unitprice_sale).",";
$contents.=str_replace(',',' ',$line->quantity).",\n";
*/

$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		