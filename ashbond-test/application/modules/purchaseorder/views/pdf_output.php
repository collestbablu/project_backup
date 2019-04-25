<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PURCHASE ORDER LIST</title>
</head>

<body>
<h1><u>Purchase Order List</u></h1> 
<table width="100%" border="1">
  <tr>
    <td>S.No</td>
    <td>PO.Date</td>
    <td>Vendor Name</td>
	<td>Case Id</td>
	<td>Ref.No</td>
	<td>Grand Total</td>  
  </tr>
  <?php

		  $queryy="select * from tbl_purchase_order_hdr where status='A' order by purchase_order_id desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>
  <tr>
    <td style="text-align:center"><?php echo $line->purchase_order_id;?></td>

   <td><?php echo $line->delivery_date; ?></td>
   <td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->vendor_id."'");
	$resultname = $sql->row();
	echo $resultname->first_name; ?>
	</td>
    <td><?php echo $line->totalcaseid;?></td>
	<td><?php echo $line->refno;?></td>
    <td><?php echo $line->grand_total;?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>
