<?php
@$tableName="tbl_role_mst";
@$location="manage_role";
$this->load->view('softwareheader');
?>

<h1> Role Details</h1> 
<form action="insert_role" method="post">
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
<table class="bordered">
<thead>

<tr>
<th colspan="4"><b>Add Role Details</b></th>        
</tr>
</thead>
  
  
  
 <?php
  if(@$_GET['id']!='' or @$_GET['view']!=''){
	@$userQuery = $this->db->query("SELECT * FROM $tableName where status='A' and role_id='".@$_GET['id']."' or role_id='".@$_GET['view']."'");
	@$userFetch = $userQuery->row();
 
}
  
@$userQuery1 = $this->db->query("SELECT role_id FROM $tableName ORDER BY role_id DESC limit 0 ,1 ");

@$userFetch1 = $userQuery1->row();


	
?>
<tr style="display:none">

<td class="text-r"><star>*</star>
Role ID:</td>

<td> <?php if(@$_GET['id']!=''){ ?>         
<input type="text" name="role_id" class="span6 "value="<?php echo @$userFetch->role_id;?>" readonly size="22" aria-required='true' />
  <?php } else {?><input type="text" id="role" tabindex="1" name="role_id2" value="<?php echo @$userFetch1->role_id+1; ?>" readonly size="22" class="span6 " aria-required='true' />

   
                <?php }?>
</td><tr>
<td class="text-r"><star>*</star>
Role Code:</td>
<td><span class="text-r">
<input type="text" tabindex="2" name="code" class="span6 "value="<?php echo @$userFetch->code;?>"  size="22" required aria-required='true' />
</span></td>
<td class="text-r"><star>*</star> 
Role Name:</td>         
<td><input name="role_name" type="text" tabindex="3" class="span6 "value="<?php echo @$userFetch->role_name;?>" size="22" maxlength="50" required aria-required='true' /></td>

</tr>        
<tr>

<td class="text-r"><star>*</star> 
Action  Permission:</td> 
<?php 
@$a= @$userFetch->action;
@$data100=explode("-",$a);
 @$edit=$data100[0];
  @$view=$data100[1];
 @$delete=$data100[2];
 @$add=$data100[3];
?>

        
<td>Add:
  <input type="checkbox" name="action4" <?php if($add=='Add'){?> checked="checked"<?php }?> value="Add" tabindex="4"/>  &nbsp;Edit:
  <input type="checkbox" name="action1"  <?php if($edit=='edit'){?> checked="checked"<?php }?> value="edit" tabindex="5" />&nbsp;View:<input type="checkbox" name="action2" <?php if($view=='view'){?> checked="checked"<?php }?> value="view" tabindex="6"/>&nbsp;Delete:<input type="checkbox" name="action3" <?php if($delete=='delete'){?> checked="checked"<?php }?> value="delete" tabindex="7" />&nbsp;</td>
  <td colspan="2"></td>
</tr>
 
<tr style="display:none;">
<td class="text-r"><star>*</star> 
Approval:</td>         
<td><a href="#" class="submit" tabindex="8">Approval List</a></td>

<td class="text-r">&nbsp;</td>         
<td>&nbsp;</td>
</tr>
</style>
</table>
<div class="clear"></div>

<div class="paging-row">
<div class="paging-right">
<div class="actions-right">
<?php if(@$_GET['view']!='' ){
 
 }
 else
 {
if(@$_GET['id']==''){?>


 <td> <input name="save" tabindex="9" type="submit" value="Save" class="submit" /> </td>

	  <?php }else {?>
	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

	   <?php } }?>


<?php if(@$_GET['popup'] == 'True') {?>
<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>
	   	 <?php }else {  ?>
       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>
       <?php } ?></form>

</div><!--paging-right close-->
</div><!--paging-row close-->

</div><!--table-row close-->
<?php $this->load->view('softwarefooter'); ?>