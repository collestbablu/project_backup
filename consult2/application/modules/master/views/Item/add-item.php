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
			<?php 
					$query=$this->db->query("select * from tbl_product_stock order by Product_id desc");
					$fetchR=$query->row();
					
					$productId=$fetchR->Product_id+1;
			?>
            <td class="text-r"><star>*</star>
            SKU Code:</td>
			<p style="color:#FF0000"><?php echo $this->session->flashdata('message_name'); ?></p>
			<td><input type="text" name="sku_no"  value="<?php echo $row->sku_no?>" required /></td>
			
			<td class="text-r"><star>*</star>Product Name:</td>
			<td><input type="text" name="item_name" id="itemname" tabindex="2"  required value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->productname;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>	
		</tr>
		<tr>
			
		
			
		
			
			<td class="text-r"><star>*</star>
			Category
			:</td>
			<td>
			<select name="category" tabindex="3" id="contact_id_copy"  required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> >
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where main_prodcatg_id='121'");
						foreach ($sqlgroup->result() as $fetchgroup){
						
					?>
					
					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchgroup->prodcatg_id==$row->category){ ?> selected <?php } }?>><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select></td>
	
			<td class="text-r"><star>*</star>
			Unit
			:</td>
	
	<td><select name="unit" tabindex="4" id="contact_id_copy1"  <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> required>
					<option value="" selected disabled>----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchunit->serial_number==$row->usageunit){ ?> selected <?php } }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select><a href="#" onClick="openpopup('../admin/add_master_data',900,630,'mid=16','')"> </a>			</td>
		</tr>
		<tr>
		
       <td class="text-r" style="display:none"><star></star>Size :</td>
			<td style="display:none"><select name="size" id="contact_id_copy2"  <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>>
					<option value="" >----Select Size----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=22");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchunit->serial_number==$row->size){ ?> selected <?php } }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>			
			
						</td>
			
			
			
       <td class="text-r"><star>*</star> Product Type</td>
	  
			<td><select name="Product_typeid" tabindex="5"   <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> required>
              <option value="">----Select ----</option>
              <option value="finish_goods"<?php  if($row->Product_typeid=='finish_goods'){ ?> selected <?php } ?>>Finish Goods</option>
              <option value="row_material"<?php if($row->Product_typeid=='row_material'){ ?> selected <?php } ?>>Raw Material</option>
			  <option value="semi_finish_goods"<?php if($row->Product_typeid=='semi_finish_goods'){ ?> selected <?php } ?>>Semi Finish Goods</option>
            </select></td>
			
	
<td class="text-r"><star></star>Purchase Price:</td>
			
			<td><input type="number" name="unitprice_purchase" step="any" tabindex="6" value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->unitprice_purchase;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

</tr>
<tr>
<td class="text-r"><star></star>Sale Price:</td>
			<td><input type="number" name="unitprice_sale" step="any" tabindex="7" value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->unitprice_sale;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
<td class="text-r">Cycle Time</td>
<td ><input type="text" name="cycle_time" tabindex="8" value="<?php echo $row->cycle_time; ?>" <?php if(@$_GET['view']!=""){?> readonly <?php } ?> />In seconds</td>
	<td class="text-r" style="display:none">Mrp</td>
	<td style="display:none"><input type="number" name="mrp" value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->mrp;}?>" step="any" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
</tr>
<tr style="display:none">
	
			<td class="text-r" >Image</td>
			<td class="text-r" ><input type="file" name="image_name" id="imgInp" /><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ ?> <img id="blah" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$row->product_image; }?>" alt="your image" width = "100" height = "100"/><?php } ?></td>
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