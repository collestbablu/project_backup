<?php 
error_reporting (E_ALL ^ E_NOTICE);
$tableName="tbl_invoice_dtl";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to crm</title>
<link href="cotation-css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body onload="window.print() " >



<table align="center"  cellpadding="0" cellspacing="0" bordercolor="#000000">
<tr>
<td><table width="100%" border="0" class="text" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="top" class="text"><span>Customer Sale Report </span></td>
</tr>
<tr>
<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="middle">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td height="1" align="left" valign="top" class="line"></td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top"><table class="table table-striped table-bordered table-hover" border="2%" id="dataTables-example">
<thead>
<tr>
 <th>Date</th>
<th>Invoice Detail Id</th>
<th>Product Code</th>
        <th>Product Name</th>

		<th>Customer Name</th>



		<th>Rate Per Piece</th>

		<th>Sale Qty</th>
		<th>Amount</th>

       
</thead>
<tbody>
<?php
	@extract($_GET);

if($Search!='')
	{
	
	     $queryy="select * from tbl_invoice_dtl where status='A'";
		
		 if($productname!='') 
		
		{
		$productName = array();
		
		
		$quw=$this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
			foreach($quw->result() as $resultp){
			
		   $productName[]=$resultp->Product_id;
		  
		  }
		  $productId45 = implode(',', $productName);
		  
		 $queryy.=" and productid in ($productId45)"; 
		
		 
	   }
	


		
		   if($company_name!='')


  {
  
  

  $sql00=$this->db->query("select * from tbl_invoice_hdr where contactid = '$company_name'");
  
			$result2=$sql00->row();
			$ress=$result2->invoiceid;
			$queryy.=" and invoiceid = '$ress'";
  
          
     //$queryy;
}
if($fdate!='')
		{
			
		
			$todate=explode("/",$_REQUEST['todate']);
			$fdate=explode("/",$_REQUEST['fdate']);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . " and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
		
	}
		if($Search=='')
	   {	   
	     $queryy="select * from tbl_invoice_dtl where status='A'";
		 }
		 
	$result=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	$m =0;
	foreach(@$result->result() as $line){
	$i++;
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }

   @extract($line);
  
   ?>


  

   <tr>
 
     
     <td><?php
					  //contact query
					// echo "select *from tbl_invoice_hdr where invoiceid = $invoiceid";
					$contactQuery14=$this->db->query("select *from tbl_invoice_hdr where invoiceid = '$line->invoiceid'");
					   $contactFetch14=$contactQuery14->row();
					   
					   
					    
					   echo $contactFetch14->due_date; 
					   ?>
					   
					  </td>
  
   
	<td><?php echo $line->invoiceid;?></td>
		<td><?php 
				
			$quer22=$this->db->query("select * from tbl_product_serial where product_id = '$line->productid' ");
			$quer223=$quer22->row();
		echo $quer223->serial_code;?></td>
	
	<td><?php
	

	$contactQuery12=$this->db->query("select * from tbl_product_stock where Product_id='$line->productid'");
					   $contactFetch12=$contactQuery12->row();
					   ?>
		<?php echo $contactFetch12->productname;?>  </td>

  <td><?php 
  
					   
					   
				   	   $contactQuery11=$this->db->query("select *from tbl_contact_m where contact_id='$contactFetch14->contactid'");
					   $contactFetch11=$contactQuery11->row();
					   
					   
					    
					   echo $contactFetch11->first_name." ".$contactFetch11->last_name;
					   ?>
					   
					  </td>
	 
<td><?php 
  
				   
					   
				   	   
					   
					   
					    
					   echo $line->list_price;?>
					   
					  </td>

	<td><?php echo $line->qty ;?></td>
	<td><?php echo $qt = $line->qty*$line->list_price ;
	  $m=$m + $qt;  
	?>
	</td>



    </tr>

	<?php } ?>
	<tr>
		
	<td colspan="7" align ="right">Total :-</td>	
	<td><?php  echo $m; ?> </td>	
	
	</tr>

</tbody>
</table></td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top" class="line"></td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
</table></td>
</tr>
</table>
</body>
</html>
