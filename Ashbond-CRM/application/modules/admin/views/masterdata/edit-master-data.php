<?php
$abc=$this->db->query("select * from tbl_master_data where serial_number = '".$_GET[ID]."'  ");
$fetch_list=$abc->row();
?>

<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Master Data</h4>
</div>
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Value Name:</label> 
<div class="col-sm-4"> 				
		
<input type="hidden" name="serial_number" value="<?php echo $fetch_list->serial_number; ?>" />
<select name="param_id" class="form-control" requried>
	<option value="">----Select----</option>
	<?php 
	$comp_sql = $this->db->query("select * FROM tbl_master_data_mst where status='A'");
	foreach ($comp_sql->result() as $comp_fetch){
	?>
	<option value="<?php echo $comp_fetch->param_id;?>"<?php if($comp_fetch->param_id==$fetch_list->param_id){?>selected<?php }?>><?php echo @$comp_fetch->keyname;?></option>
	<?php } ?>
</select>
</div> 

<label class="col-sm-2 control-label">*Key Value</label> 
<div class="col-sm-4"> 
<input name="keyvalue"  type="text" value="<?=$fetch_list->keyvalue;?>" class="form-control" required> 
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="description"><?=$fetch_list->description;?></textarea>
</div>  
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div>