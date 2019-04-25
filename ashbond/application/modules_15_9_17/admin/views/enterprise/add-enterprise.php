<?php
error_reporting (E_ALL ^ E_NOTICE);

$tableName='tbl_enterprise_mst';

$location='manage_enterprise';
$this->load->view('softwareheader');  
?>

<h1> Enterprise Details</h1>

<form action="insert_enterprise" method="post">



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

<a href="" onclick="popupclose(this.value)" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">
<?php if(@$_GET['id']=='' or @$_GET['id']!=''){  ?>

<table class="bordered">

<thead>




<tr style="display:none">

<td class="text-r"><star>*</star>Enterprise ID:</td>

 <?php if(@$_GET['id']!='' || @$_GET['view']!='' ){
 
 @$enterpriseQuery = $this->db->query("SELECT * FROM tbl_enterprise_mst where status='A' and comp_id='".@$_GET['id']."' or comp_id='".@$_GET['view']."' ");
 @$enterpriseFetch = @$enterpriseQuery->row();
 
  ?>         

<td> <input type="text" name="comp_id" class="span6" value="<?php echo $enterpriseFetch->comp_id;?>"  size="22" aria-required='true'  readonly  /></td>

<?php } else {
$query1 = $this->db->query("SELECT * FROM $tableName order by comp_id desc");
$row = $query1->row();
?>

    <td><input type="text" name="comp_idd" value="<?php echo $row->comp_id+1;?>"  size="22" class="span6" readonly aria-required='true' /></td>
                <?php  }?>





</tr>        

<tr>

<td class="text-r"><star>*</star>Enterprise Code:</td>

<td><input type="number" name="code" class="span6" value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo  $enterpriseFetch->code; }?>"  size="22" required aria-required='true'
 <?php  if(@$_GET['view']!=''){?> readonly="true"  <?php }?> /></td>
 
 <td class="text-r"><star>*</star> Enterprise Name:</td>         

<td><input name="comp_name" type="text" class="span6 "value="<?php if(@$_GET['id']!=''  || @$_GET['view']!=''){ echo  $enterpriseFetch->comp_name; }?>" <?php  if(@$_GET['view']!=''){?> readonly="true"  <?php }?>  size="22" maxlength="50" required aria-required='true'/></td></tr>
</table>
<?php } ?>


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

<a href="" onclick="popupclose(this.value)" title="Cancel" class="submit"> Cancel</a>

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