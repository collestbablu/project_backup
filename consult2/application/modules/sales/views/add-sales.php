<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_finish_goods_order';
$location='manage_sales_order';
$this->load->view('softwareheader'); 
?>

<h1> Add Sales </h1>

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
<td style="display:none"><input type="hidden" name="id" class="span6 "value="<?php echo $row->id?>" readonly size="22" aria-required='true' /></td>



<tr>
		
            <td class="text-r"><star>*</star>Finish Goods Name:</td>
			<td>
			<select name="fnsh_gds" tabindex="3" id="fnsh_gds"  required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> >
					<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods'");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
					<option value="<?php echo $fetchgroup->Product_id; ?>"<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchgroup->Product_id==$row->product_id){ ?> selected <?php } }?>><?php echo $fetchgroup->productname ; ?></option>

    <?php } ?></select></td>	

			
			<td class="text-r"><star>*</star>Qty:</td>
			<td><input type="number" name="qty" id="qty" tabindex="2"  required value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->qty;}?>" <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/></td>	
</tr>

<tr>
<td class="text-r"><star></star>Date:</td>
			
			<td><input type="date" name="s_date" id="s_date" step="any" tabindex="6" value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->date;}?>" <?php if(@$_GET['view']!=""){?> readonly <?php } ?>/></td>

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

 <td> <input name="save" type="submit" tabindex="9" value="Save" class="submit" /> </td>

 <?php }else {?>

	   <td> <input name="edit" type="submit" tabindex="9" value="Save" class="submit" /> </td>

	      <?php }}?>


<?php if(@$_GET['popup'] == 'True') {?>

<a href="javascript:window.close();" tabindex="10" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" tabindex="10" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

</div><!--paging-right close-->

</div><!--paging-row close-->

</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->

<?php $this->load->view('softwarefooter'); ?>