<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Communication List</title>
</head>

<body>
<h1><u>Communication List</u></h1> 
<table width="100%" border="1">
  <tr>
    <td>Contact</td>
    <td>Date</td>
    <td>Remarks</td>
	<td>Subject</td>
	<td>Ref.No</td>
  </tr>
 <?php

@$mod_sql=$this->db->query("select * from tbl_communication where communication_type='Communication' order by communication_id desc");
foreach(@$mod_sql->result() as $line){
		  
   ?>
  <tr>
  <td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->contact_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
					   ?></td>
										<td><?php echo $line->date;?></td>
										<td><?php echo $line->remark_name;?></td>
										<td><?php echo $line->subject;?></td>
										<td><?php echo $line->refno;?></td>
										
  </tr>
  <?php } ?>
</table>

</body>
</html>
