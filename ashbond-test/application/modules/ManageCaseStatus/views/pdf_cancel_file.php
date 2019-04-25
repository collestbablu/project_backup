<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cancel List</title>
</head>

<body>
<h1><u>Cancel List</u></h1> 
<table width="100%" border="1">
  <tr>
    <td>Vendor Name</td>
    <td>Customer Name</td>
    <td>Case Id</td>  
  </tr>
 <?php
   
		  $queryy="select * from tbl_new_case where action_status='Cancel' order by new_case_id desc";
	
		  $result=$this->db->query($queryy);

  foreach(@$result->result() as $line){

   ?>
  <tr>
   <?php $ugroup1=$this->db->query("SELECT * FROM tbl_contact_m where contact_id='".$line->vendor_id."'" );
			
			$ungroup2 = $ugroup1->row(); 
			?>

 <td><?php echo $ungroup2->first_name;?></td>

    <td><?php 
	 $query=$this->db->query("SELECT * FROM tbl_contact_m where contact_id='".$line->customer_id."'" );
			
	$fetchq=$query->row(); 
	
	echo $fetchq->first_name;?></td>
  
    <td><?php echo $line->case_id;  ?></td> 
  </tr>
  <?php } ?>
</table>

</body>
</html>
