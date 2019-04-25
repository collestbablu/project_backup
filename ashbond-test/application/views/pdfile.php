<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dash Board List</title>
</head>
<body>
<h1><u>Dash Board List</u></h1> 
<table width="100%" border="1">
  <tr>
        <th>Date</th>
        <th>Case Id</th>
        <th>Ref.No.</th>
       	<th>Modules</th>      
  </tr>

<?php

		  $queryy="select * from tbl_payment_log ORDER BY p_id DESC";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){

   ?>
  <tr>
  <td><?php echo $line->date;?></td>                
	<td><?php echo $line->case_id;?></td>
	<td><?php echo $line->ref_no;?></td>
	<td><?php if($line->status=='SaleOrdernew'){ echo "	Sales Order";  }else{ echo $line->status; } ?></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>
