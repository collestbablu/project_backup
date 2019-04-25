<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_product_stock';
$location='manage_item';
$this->load->view('softwareheader'); 
?>

<h1> Heading Details</h1>

<form action="insertHeading" method="post" enctype="multipart/form-data">

<!--title close-->

<div class="container-right-text">

<div class="table-row">
 <table class="bordered">
 	<tr>
		<td><textarea name="heading_name" style="width: 400px; height: 72px; margin: 0px;" required></textarea></td>
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