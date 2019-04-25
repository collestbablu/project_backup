<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice List</title>
</head>

<body>
<h1><u>Invoice List</u></h1> 
<table width="100%" border="1">
  <tr>

        <th>Invoice No.</th>
        <th>Date</th>
		<th>Case Id</th>
		<th>Basic Amount</th>
        <th>Tax</th>
        <th>Total Amount</th>
    </tr>
<?php

		  $queryy="select * from tbl_new_invoice order by invoice_id desc";
		  
		  $result=$this->db->query($queryy);
 
          foreach($result->result() as $line){

   ?>

  <tr>
    <td style="text-align:center"><?php echo $line->invoice_no;?></td>
   
   <td><?php echo $line->n_date; ?></td>
   <td><?php echo $line->case_id;?></td>
   <td><?php echo $line->basic_amt;?></td>
   <td><?php echo $line->tax;?></td>
   <td><?php echo $line->total_amt;?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>
