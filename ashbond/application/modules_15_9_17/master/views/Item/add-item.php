<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_product_stock';
$location='manage_item';
$this->load->view('softwareheader'); 
?>

<h1> Product Details</h1>

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
@$branchQuery = $this->db->query("SELECT * FROM $tableName where Product_id='".$_GET['id']."' or Product_id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}


 if(@$_GET['id']!=''){
 


  ?>         
<td><input type="hidden" name="Product_id" class="span6 "value="<?php echo $row->Product_id?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by Product_id desc limit 0,1");
$rowwww = $query->row();
  
?>
<input name="Product_id" type="hidden" class="span6 " value="" readonly size="22" aria-required='true' />
              

                <?php }?>


<tr>
			
            <td class="text-r"><star></star>
            Item/Part No.:</td>
			<p style="color:#FF0000"><?php echo $this->session->flashdata('message_name'); ?></p>
			<td><input type="text" name="sku_no" value="<?=$row->sku_no; ?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?> /></td>
			
			<td class="text-r"><star>*</star>Product Name:</td>
			<td><input type="text" name="item_name" id="itemname"   required value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->productname;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>	
		</tr>
		<tr>
			
		
			
		
			
			<td class="text-r"><star>*</star>
			Category
			:</td>
			<td>
			<select name="category" id="contact_id_copy"  required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> >
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where main_prodcatg_id='121'");
						foreach ($sqlgroup->result() as $fetchgroup){
						
					?>
					
					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchgroup->prodcatg_id==$row->category){ ?> selected <?php } }?>><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select></td>
	
			<td class="text-r"><star></star>
			<star>*</star>Unit:</td>
	
	<td><select name="unit" id="contact_id_copy1" required  <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>>
					<option value="" selected disabled>----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchunit->serial_number==$row->usageunit){ ?> selected <?php } }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>		</td>
		</tr>
		
	
	
	<tr>
	<td class="text-r"><star>*</star>Description:</td>
			<td><textarea type="text" required name="part_no" style="width:390px; height:72px;" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/><?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->part_no;}?></textarea></td>
			
			<td class="text-r"><star></star>Sale Price :</td>
			<td><input type="number" name="unitprice_sale" step="any" value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->unitprice_sale;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

</tr>
<tr>
<td class="text-r"><star></star>Purchase Price:</td>
			
			<td><input type="number" name="unitprice_purchase" step="any"  value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->unitprice_purchase;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
	<td class="text-r">HSN Code</td>
	<td><input type="text" name="hsn_code" step="any"  value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->hsn_code;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

</tr>
<tr>
<td class="text-r"><star></star>GST Tax:</td>			
<td><input type="number" name="gst_tax" step="any"  value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->gst_tax;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
<td class="text-r" ></td>
<td></td>
</tr>
<tr style="display:none">
	
			<td class="text-r" >Image</td>
			<td class="text-r" ><input type="file" name="image_name" <?php if(@$_GET['view']!=""){
?> disabled="disabled" <?php } ?>  id="imgInp" /><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ ?> <img id="blah" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$row->product_image; }?>" alt="your image" width = "100" height = "100"/><?php } ?></td>
			<td class="text-r" style="display:none;" ></td>
			<td style="display:none">
			<select name="mrp_wise_detail">
				<option></option>
			</select>			</td>
			<td class="text-r"></td>
			<td class="text-r"></td>
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