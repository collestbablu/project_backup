<?php
$tableName='tbl_wing_mst';
$location='manage_wing';
$this->load->view('softwareheader');
?>

<h1>DEPARTMENT/WING DETAILS</h1>

<form action="insert_wing" method="post">



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

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">


<table class="bordered">

<thead>



<tr>

<th colspan="4">DEPARTMENT/WING DETAILS</th>        

</tr>



</thead>

<tr style="display:none">




<td class="text-r"><star>*</star>
Wing ID:</td>
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_wing_mst where status='A' and divn_id='".$_GET['id']."' or divn_id='".$_GET['view']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!='' or @$_GET['view']!=''){
 


  ?>         


<td><input type="text" name="divn_id" class="span6 "value="<?php echo $branchFetch->divn_id;?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by divn_id desc limit 0,1");
$row = $query->row();

?>

    <td><input type="text" name="divn_idd" value="<?php if (count($row)!=''){ echo $row->divn_id+1; } else{ echo 1; }?>" readonly size="22" class="span6 " aria-required='true' /></td>

                <?php }?>
</tr>

<tr>
<td class="text-r"><star>*</star>

  Wing Code:</td>         

<td><input name="code" type="number" class="span6" value="<?php  if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $branchFetch->code; }?>" size="22" maxlength="20" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/></td>

<td class="text-r"><star>*</star>Wing Name</td>

<td><input name="divn_name" type="text" class="span6" value="<?php if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $branchFetch->divn_name; }?>" size="22" maxlength="20" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/></td>
</tr>        

<tr>




<td class="text-r"><star>*</star>
 Branch Name</td>
	<td>

		<select name="brnh_id" class="span6" value="<?php if(@$_GET['view']!='' or @$_GET['id']!=''){echo $branchFetch->brnh_id;}?>" maxlength="20" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> disabled="disabled" <?php } ?>>
		<option value="">-----select----</option>
<?php
$comp_sql = $this->db->query("select * FROM tbl_branch_mst where status='A'");

foreach ($comp_sql->result() as $comp_fetch){

 ?>
		
<option value="<?php  echo @$comp_fetch->brnh_id;?>" <?php if(@$comp_fetch->brnh_id==@$branchFetch->brnh_id){ ?> selected="selected" <?php }?>><?php echo @$comp_fetch->brnh_name;?></option>

<?php } ?>



		</select>
	</td>
	
	<td colspan="2"></td>
</tr>


</table>




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





 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



 <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>



	      <?php }}?>





<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>



</div><!--paging-right close-->

</div><!--paging-row close-->



</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->
<?php $this->load->view('softwarefooter'); ?>