<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Quotation List</title>
</head>

<body>
<h1><u>Quotation List</u></h1> 
<table width="100%" border="1">
  <tr>
    	<th>Quotation. No</th>
        <th>Date</th>
        <th>Customer Name</th>
       	<th>Case Id</th>
		<th>Ref.No</th>
        <th>Grand Total</th>
  </tr>

<?php

		  $queryy="select * from tbl_quotation_hdr where status='A' order by quotation_id_hdr desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

  <tr>
    <td style="text-align:center"><?php echo $line->quotation_id_hdr;?></td>
   <td><?php echo $line->delivery_date; ?></td>
   <td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->vendor_id."'");
	$resultname = $sql->row();
	echo $resultname->first_name;?>
	</td>
    <td><?php echo $line->totalcaseid;?></td>
	<td><?php echo $line->refno;?></td>
    <td><?php echo $line->grand_total;?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>
