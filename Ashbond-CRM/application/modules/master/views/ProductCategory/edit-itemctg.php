<?php
$abc=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id = '".$_GET[ID]."' "); 
$fetch_list=$abc->row();
?>
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Product Category</h4>
</div>
<div class="modal-body overflow">

<div class="form-group form-group-to"> 
<label class="col-sm-2 control-label">*Category Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="prodcatg_id" value="<?php echo $fetch_list->prodcatg_id; ?>" />
<input type="text" class="form-control" name="prodcatg_name"  value="<?=$fetch_list->prodcatg_name;?>" required> 
</div> 
<?php 
$ugroup=$this->db->query("SELECT * FROM tbl_prodcatg_mst where prodcatg_id='121'" );
$ungroup=$ugroup->row();	
?>
<label class="col-sm-2 control-label">*Under Group :</label> 
<div class="col-sm-4"> 
<input name="undergroup"  type="text" value="<?php echo $ungroup->prodcatg_name ; ?>" class="form-control" readonly=""> 
</div> 
</div>

<div class="form-group form-group-to"> 
<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="description" ><?php echo $fetch_list->Description; ?></textarea>
</div>  
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>