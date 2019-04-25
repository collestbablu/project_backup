<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Product</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_product_stock where Product_id='$ID'");
         $fetch_list=$ItemQuery->row();

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Code:</label> 
<div class="col-sm-4"> 	
<input type="hidden"  name="Product_id" class="form-control" readonly="" value="<?php echo $fetch_list->Product_id; ?>" />
<input type="text" class="form-control" name="sku_no" value="<?php echo $fetch_list->sku_no; ?>" readonly> 
</div> 
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $fetch_list->productname; ?>" class="form-control" required> 
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Type:</label> 
<div class="col-sm-4"> 
<select name="type" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=17");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->type){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category" class="form-control ui fluid search dropdown email1">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id!='121'");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>" <?php if($fetchgroup->prodcatg_id==$fetch_list->category){?>selected<?php }?>><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4" > 
<select name="unit" class="form-control">
					<option value="">----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>" <?php if($fetchunit->serial_number==$fetch_list->usageunit){ ?> selected <?php }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>
</div> 
<label class="col-sm-2 control-label">Size:</label> 
<div class="col-sm-4" id="regid"> 
<select name="size"  class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=18");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->size;?>" <?php if($fetch_list->size==$fetch_protype->serial_number){?> selected="selected"<?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" value="<?php echo $fetch_list->unitprice_sale; ?>" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" value="<?php echo $fetch_list->unitprice_purchase; ?>" class="form-control" required>
</div> 
</div>
<div class="form-group" style="display:none"> 
<label class="col-sm-2 control-label">*GST Tax:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="gst_tax" value="<?php echo $fetch_list->gst_tax; ?>" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*HSN Code:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="hsn_code"  value="<?php echo $fetch_list->hsn_code; ?>" class="form-control" required>
</div> 
</div>
<div class="form-group" style="display:none"> 
<label class="col-sm-2 control-label">Minimum Reorder Level:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="min_re_order_level" value="<?php echo $fetch_list->min_re_order_level; ?>" class="form-control">
</div> 
<label class="col-sm-2 control-label">&nbsp;</label> 
<div class="col-sm-4" id="regid"> 
&nbsp;
</div> 
</div>
<div class="form-group" style="display:none"> 
<label class="col-sm-2 control-label">Image:</label> 
<div class="col-sm-4" id="regid"> 
<input type="file" name="image_name" accept="image/*" onchange="loadFile(event)" /><?php if($fetch_list->product_image!=''){ ?> <img id="output" src="<?php echo base_url().'assets/image_data/'.$fetch_list->product_image; ?>"  height="38" width="50"/><?php } else { ?><img src="<?php echo base_url()?>assets/images/no_image.png" height="38" width="50" /><?php }?>
</div> 
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>