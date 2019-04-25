<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_termandcondition';
$location='manage_termandcondition';
$this->load->view('softwareheader'); 
?>
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<h1> Term and condition Details</h1>

<form action="insert_item" method="post" enctype="multipart/form-data">

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

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">

 <table class="bordered">

<thead>
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM $tableName where id='".$_GET['id']."' or id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}

?>
<input type="hidden" name="id" class="span6 "value="<?php echo $row->id?>" readonly size="22" aria-required='true' />


		<tr>
			
		
			
		
			
			<td class="text-r"><star>*</star>
			Template Name
			:</td>
			<td>
			<input type="text" required name="type" value="<?=$row->type;?>" /></td>
	
			<td class="text-r"><star></star>Term And Condition</td>
	
	        <td style="height:500px;width:auto;"><textarea name="des" style="height:500px;width:auto;"  id="tem">
	
	<?php echo $row->des;?></textarea></td>
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

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

</div><!--paging-right close-->

</div><!--paging-row close-->

</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->

<?php $this->load->view('softwarefooter'); ?>
<script>
            CKEDITOR.replace( 'des' );
        </script>