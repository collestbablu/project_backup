<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Category List</title>
</head>

<body>
<h1><u>Category List</u></h1> 
<table width="100%" border="1">
  <tr>
    <td>Group Name</td>
    <td>Primary</td>
    <td>Under Group</td>
	
  </tr>
  <?php
	
		  @$queryy="select * from tbl_prodcatg_mst where status='A' and comp_id = '".$this->session->userdata('comp_id')."' order by prodcatg_id desc";
		
$mod_sql = $this->db->query($queryy);

foreach ($mod_sql->result() as $line){
		 
   ?>
  <tr>
   <td><?php echo $line->prodcatg_name;?></td>
		
		 <?php if(
$line->main_prodcatg_id==1){$Primary="Y";}else{$Primary="N";}?>
	<td><?php echo $Primary; ?></td>

		 <td><?php if($line->main_prodcatg_id!='1'){ @$ugrou="select * from tbl_prodcatg_mst where status='A' and prodcatg_id='".@$line->main_prodcatg_id."'"; 
   
@$ung = $this->db->query(@$ugrou);
@$row = @$ung->row();

		?><?php echo @$row->prodcatg_name; }?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>
