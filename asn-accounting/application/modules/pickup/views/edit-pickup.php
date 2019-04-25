<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Pick Up</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_pick_up where pickup_id='$ID'");
         $fetch_list=$ItemQuery->row();

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4"> 	
<input type="hidden"  name="id" class="form-control" readonly="" value="<?php echo $fetch_list->pickup_id; ?>" />
<input type="date" class="form-control" name="date" value="<?php echo $fetch_list->date; ?>" > 
</div> 
<label class="col-sm-2 control-label">*Customer Name:</label> 
<div class="col-sm-4"> 
<select name="contact_id" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='4'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->contact_id){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>

</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Origin:</label> 
<div class="col-sm-4"> 
<select name="origin" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=18");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->origin){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
<label class="col-sm-2 control-label">*Destination:</label> 
<div class="col-sm-4"> 
<select name="desination" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype1=$this->db->query("select * from tbl_master_data where param_id=18");
						foreach ($sqlprotype1->result() as $fetch_protype1){
						
					?>
				<option value="<?php echo $fetch_protype1->serial_number;?>" <?php if($fetch_protype1->serial_number==$fetch_list->desination){ ?> selected <?php }?>><?php echo $fetch_protype1->keyvalue; ?></option>
					<?php } ?>

					</select>

</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*No. Of Box:</label> 
<div class="col-sm-4" > 
<input type="number" step="any" min="0" name="no_of_box" value="<?=$fetch_list->no_of_box;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">Cost:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" min="0" id="cost" name="cost" onchange="call();" value="<?=$fetch_list->cost;?>" class="form-control"/></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Conveyance:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" id="conveyance" name="conveyance" value="<?php echo $fetch_list->conveyance; ?>" class="form-control" required onchange="call();">
</div> 
<label class="col-sm-2 control-label">*Total:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" id="tot" name="total" value="<?php echo $fetch_list->total; ?>" class="form-control" required readonly="readonly">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Total Vol. Weight</label> 
<div class="col-sm-4" id="regid"> 
<input type="text"  name="total_vol_weight" value="<?php echo $fetch_list->total_vol_weight; ?>" class="form-control" >

<input type="text" style="display:none" name="vol_wt" value="<?php echo $fetch_list->vol_wt; ?>" class="form-control" >
</div> 
<label class="col-sm-2 control-label">*Name Of Person:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="name_of_person"  value="<?php echo $fetch_list->name_of_person; ?>" class="form-control" required>
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