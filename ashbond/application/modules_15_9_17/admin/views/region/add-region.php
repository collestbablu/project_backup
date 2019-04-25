<?php
@$tableName="tbl_region_mst";
@$location="manage_region";
$this->load->view('softwareheader');  
?>

<h1>Region Details</h1> 
<form action="insert_region" method="post">
<div class="actions-right">
<?php if(@$_GET['view']!='' ){
 	
 }
 else
 {
if(@$_GET['id']==''){?>

  
 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>

	  <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

	   <?php } }?>

<?php if(@$_GET['popup'] == 'True') {?>

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>
       <?php } ?>
	   <div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div class="table-row">

<?php
@$userQuery = $this->db->query ("SELECT zone_id FROM $tableName ORDER BY zone_id DESC limit 0 ,1 ");

@$userFetch1 = $userQuery->row();

?>

<table class="bordered">
<thead>

<tr>
<th colspan="4"><b>Add Region Details</b></th>        
</tr>

</thead>
  <?php

@$userQuery = $this->db->query("SELECT * FROM $tableName where zone_id='".@$_GET['id']."' or zone_id='".@$_GET['view']."'");
@$userFetch = $userQuery->row();

	// @extract($result21);
if(@$_GET['id']!='' || @$_GET['id']=='')

{	
	
?>
<tr style="display:none">

<td class="text-r"><star>*</star>
Region ID:</td>
<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ ?>         
<td><input type="text" name="zone_id" class="span6 "value="<?php  echo @$userFetch->zone_id; ?>" readonly size="22" aria-required='true' 
<?php if(@$_GET['view']!=''){ ?>readonly<?php } ?>
/></td>
<?php } else {?>
    <td><input type="text" name="zone_idd" value="<?php echo @$userFetch1->zone_id+1?>" readonly size="22" class="span6 " aria-required='true' />                 </td>
                <?php }?>
				</tr>
<tr>
<td class="text-r"><star>*</star>
Region Code:</td>
<td><input type="text" name="code" class="span6 "value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo @$userFetch->code; }?>"  size="22" required aria-required='true' <?php if(@$_GET['view']!=''){ ?>readonly<?php } ?> /></td>
<td colspan="2"></td>
</tr>        
<tr>
<td class="text-r"><star>*</star> Region Name:</td>         
<td><input type="text" name="zone_name" class="span6 "value="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo @$userFetch->zone_name; }?>" size="22" required aria-required='true' <?php if(@$_GET['view']!=''){ ?>readonly<?php } ?> /></td>
<td class="text-r">Enterprise</td>
<td><select name="comp_id" required <?php if(@$_GET['view']!=''){ ?>disabled <?php } ?>>
<option value="">--select--</option><?php

@$comp_sql = $this->db->query("SELECT * FROM tbl_enterprise_mst");



foreach (@$comp_sql->result() as $comp_fetch){



 ?>

<option value="<?php echo @$comp_fetch->comp_id;?>" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if(@$comp_fetch->comp_id==@$userFetch->comp_id){ ?> selected <?php }}?>><?php echo @$comp_fetch->comp_name;?></option>

<?php } ?>

</select></td>
</table>
<?php

}
?>
<!--bordered close-->
<div class="clear"></div>

<div class="paging-row">
<div class="paging-right">
<div class="actions-right">

<?php 

 if(@$_GET['view']!='' ){
 
 }
 else
 {
if(@$_GET['id']==''){?>
    <td> <input name="save" class="submit" type="submit" value="Save" /> </td>
    
	  <?php }else {?>
     
	   <td> <input name="edit" class="submit" type="submit" value="Save" /> </td>
	   <?php }}?>

<?php if(@$_GET['popup'] == 'True') {?>
<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>
	   	 <?php }else {  ?>
       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>
       <?php } ?></form>

</div><!--paging-right close-->
</div><!--paging-row close-->

</div><!--table-row close-->
</div><!--container-right-text close-->

</div><!--container-right close-->

</div><!--container close-->
<?php $this->load->view('softwarefooter'); ?>