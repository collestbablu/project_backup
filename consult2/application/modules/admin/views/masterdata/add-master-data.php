<?php
$tableName='tbl_wing_mst';
$location='manage_master_data';
$this->load->view('softwareheader');
?>

<h1>MASTER DATA</h1>

<form action="insert_master_data" method="post">



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

<th colspan="4">MASTER DATA DETAILS</th>        

</tr>



</thead>

<tr>




<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_master_data where status='A' and serial_number='".$_GET['id']."' or serial_number='".$_GET['view']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!='' or @$_GET['view']!=''){
 


  ?>         


<td style="display:none"><input type="text" name="serial_number" class="span6 "value="<?php echo $branchFetch->serial_number;?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by divn_id desc limit 0,1");
$row = $query->row();

?>

    <td style="display:none"><input type="text" name="serial_numberd" value="<?php if (count($row)!=''){ echo $row->serial_number+1; } else{ echo 1; }?>" readonly size="22" class="span6 " aria-required='true' /></td>

                <?php }?>

<td class="text-r"><star>*</star>

  Value Name:</td>         
<td>

		<select name="param_id" required maxlength="20" <?php if(@$_GET['view']!=""){ ?> disabled="disabled" <?php } ?>>
		<option value="">-----select----</option>
<?php
$comp_sql = $this->db->query("select * FROM tbl_master_data_mst where status='A'");

foreach ($comp_sql->result() as $comp_fetch){

 ?>
		
<option value="<?php  echo @$comp_fetch->param_id;?>" <?php if(@$comp_fetch->param_id==@$branchFetch->param_id){ ?> selected="selected" <?php }?>><?php echo @$comp_fetch->keyname;?></option>

<?php } ?>



		</select>
	</td>
<td class="text-r"><star>*</star>Added Value</td>

<td><input name="keyvalue" type="text" class="span6" value="<?php if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $branchFetch->keyvalue; }?>" size="22" maxlength="20" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/></td>

</tr>        

<tr>

<td class="text-r">
 Description</td>
	<td><textarea name="description" type="text" class="span6"   aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>><?php if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $branchFetch->description; }?></textarea></td>
	
<td class="text-r">&nbsp;</td>	
<td class="text-r">&nbsp;</td>	
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
<?php $this->load->view('softwarefooter'); ?>