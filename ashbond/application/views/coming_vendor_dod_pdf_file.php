<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Coming Vendor DOD's</title>
</head>
<body>
<h1><u>Coming Vendor DOD's</u></h1> 
<table width="100%" border="1">
  <tr>
    <th scope="col">Vendor Date</th>
    <th scope="col">Case Id</th>
    <th scope="col">Subject</th>
	<th scope="col">Ref.No.</th>
	<th scope="col">Grand Total</th>    
  </tr>
  <?php
 $now = date('Y-m-d');
$start_date = strtotime($now);
$end_date = strtotime("-7 day", $start_date);
 $dd=date('Y-m-d', $end_date);
 $wwqueryy=$this->db->query("select * from tbl_purchase_order_hdr where vendor_dod>='$dd'");
 foreach($wwqueryy->result() as $fetchvd){
?>
  <tr>
   <td><?php echo $fetchvd->vendor_dod;?></td>
<td><?php echo $fetchvd->case_id;?></td>
<td><?php echo $fetchvd->subject;?></td>
<td><?php echo $fetchvd->refno;?></td>
<td><?php echo $fetchvd->grand_total;?></td>
  </tr>
<?php } ?>  
</table>
</body>
</html>
