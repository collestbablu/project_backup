<?php 
error_reporting (E_ALL ^ E_NOTICE);
$tableName="tbl_user_role_mst";
$location="mapped_user_role";
  //primary ref id 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php //$this->load->view('common/title'); ?>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">

<body>
<form action="insert_user_role" method="post">
<div class="wrapper"><!--header close-->
<div class="clear"></div>

<div class="container"><!--container-left close-->

<?php
$this->load->view('sidebar');

 ?>

<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<div class="title">
<h1> User Role</h1> 

   <td> <div class="actions-right"></td>
 <?php if($_GET['view']!='' ){
 
 }
 else
 {
if($_GET['id']==''){?>
 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>
	  <?php }else {?>
	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

	   <?php } }?>

<a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div class="table-row">

<?php
$idfetch = "SELECT * FROM $tableName  where user_role_id='".$_GET['id']."' || user_role_id='".$_GET['view']."'";
$idfetch1 = $this->db->query($idfetch) ;
$result21 = $idfetch1->row();
  if($_GET['id']!='' || $_GET['id']==''){
	
?>

<table class="bordered">
<thead>

<tr>
<th colspan="4"><b>Add User Role</b></th>        
</tr>

</thead>
<tr>
<td class="text-r"><star>*</star>
User Name:</td>
<td><select  placeholder="Enter text" name="user_id" required <?php if($_GET['view']!=''){?>disabled<?php } ?>>

<option value="">--Select--</option>
<?php
 $user=$this->db->query("select * from tbl_user_mst");

foreach ($user->result() as $user_add){
?>
<option value="<?php echo $user_add->user_id;?>" <?php if($_GET['id']!='' || $_GET['view']!=''){ if($user_add->user_id==$user_add->user_id){ ?> selected <?php }}?>><?php echo $user_add->user_name;?>(<?php echo $user_add->user_id ?>)</option>
<?php }?>
</select>
</td>



<td class="text-r"><star>*</star>
Role Name:</td>
<td><select  placeholder="Enter text" name="role_id" required <?php if($_GET['view']!=''){?>disabled<?php } ?>>

<option value="">--Select--</option>
<?php
$ro= $this->db->query("select * from tbl_role_mst");
	foreach ($ro->result() as $role){
?>
<option value="<?php echo $role->role_id;?>" <?php if($_GET['id']!='' || $_GET['view']!=''){ if($role->role_id==$role->role_id){ ?> selected <?php }}?>><?php echo $role->role_name;?>(<?php echo $role->role_id;?>)</option>
<?php }?>
</select> </td>
               

</tr>        
       
</table>
<?php } ?>
<!--bordered close-->
<div class="clear"></div>

<div class="paging-row">
<div class="paging-right">
<div class="actions-right">
<?php if($_GET['view']!='' ){ ?>
 
 
 
<?php }
 else
 {
if($_GET['id']==''){?>

 
 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>

	  <?php }else {?>
	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

	   <?php } }?>

<a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>
</div></div></div></div>
<?php $this->load->view('softwarefooter'); ?>