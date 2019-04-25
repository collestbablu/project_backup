<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contact List</title>
</head>

<body>
<h1><u>Contact List</u></h1> 
<table width="100%" border="1">
  <tr>
    <td>Company Name</td>
    <td>Primary Contact</td>
    <td>Group Name</td>
	<td>Email</td>
	<td>Mobile</td>
  </tr>
 <?php
   
		  $queryy="select * from tbl_contact_m order by contact_id desc";
	
		  $result=$this->db->query($queryy);

  foreach(@$result->result() as $line){

   ?>
  <tr>
    <td><?php echo $line->first_name;?></td>
	<td><?php echo $line->company_name;?></td>
	
	
	<?php $ugroup1=$this->db->query("SELECT * FROM tbl_account_mst where account_id='".$line->group_name."'" );
			
			$ungroup2 = $ugroup1->row(); 
			?>

 <td><?php echo $ungroup2->account_name;?></td>

    <td><?php echo $line->email;?></td>
  
    <td><?php echo $line->mobile;  ?></td> 
  </tr>
  <?php } ?>
</table>

</body>
</html>
