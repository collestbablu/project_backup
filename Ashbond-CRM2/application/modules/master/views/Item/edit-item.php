<?php 
echo $ID=$_GET['ID']."fsd";
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Item</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_product_stock where Product_id='$ID'");
         $fetch_list=$ItemQuery->row();

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Item/Part No.:</label> 
<div class="col-sm-4"> 	
<input type="hidden"  name="Product_id" class="form-control" value="<?php echo $fetch_list->Product_id; ?>" />
<input type="text"  name="sku_no" class="form-control" value="<?php echo $fetch_list->sku_no; ?>" />

</div> 
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $fetch_list->productname; ?>" class="form-control" > 
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category" required  class="form-control ui fluid search dropdown email">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_name != 'Category' ");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if($fetchgroup->prodcatg_id==$fetch_list->category){?>selected<?php }?>><?php echo $fetchgroup->prodcatg_name; ?></option>

    <?php } ?></select>
</div> 
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4" id="regid"> 
<select name="unit" id="contact_id_copy1" required class="form-control" >
					<option value="" selected disabled>----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>" <?php if($fetchunit->serial_number==$fetch_list->usageunit){ ?> selected <?php }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>
</div> 
</div>
<div class="form-group"> 

<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4" id="regid"> 
<textarea type="text" name="description" class="form-control"/><?php  echo $fetch_list->description;?></textarea></div> 
<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" value="<?php echo $fetch_list->unitprice_sale; ?>" class="form-control" required>
</div> 
</div>

<div class="form-group"> 

<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" value="<?php echo $fetch_list->unitprice_purchase; ?>" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">HSN Code:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="hsn_code"  value="<?php echo $fetch_list->hsn_code; ?>" class="form-control">
</div> 
</div>


<div class="form-group"> 

<label class="col-sm-2 control-label">GST Tax:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="gst_tax" value="<?php echo $fetch_list->gst_tax; ?>" class="form-control">
</div> 
<label class="col-sm-2 control-label">Image:</label> 
<div class="col-sm-4" id="regid"> 
<input type="file" name="image_name" accept="image/*" onchange="loadFile(event)" /><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ ?> <img id="output" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$fetch_list->product_image; }?>"  width = "100" height = "100"/><?php } else { ?><img id="output" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$fetch_list->product_image; }?>"  width = "100" height = "100"/><?php }?>
</div>
</div>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>