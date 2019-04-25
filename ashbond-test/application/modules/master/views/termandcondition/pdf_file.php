<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Term And Condition List</title>
</head>

<body>
<h1><u>Term And Condition List</u></h1> 
<table width="100%" border="1">
  <tr>
    <td>Type</td>  
  </tr>
<?php

@$mod_sql=$this->db->query("select * from tbl_termandcondition order by id desc");
foreach(@$mod_sql->result() as $line){
		  
   ?>  <tr>
  <td><?php echo $line->type;?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>
