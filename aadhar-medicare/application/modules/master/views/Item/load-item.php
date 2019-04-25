<table class="table table-striped table-bordered table-hover dataTables-example-"  >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	   <th>Product Code </th>
       <th>Product Type </th>
		<th>Category</th>
        <th>Bar Code Name</th>
		<th>Usages Unit</th>
        <th>Sales Price</th>
		<th>Purchase Price</th>
		 <th>Action</th>
</tr>
</thead>

<tbody id="getDataTable" >

<?php  
$i=1;
  foreach($result as $fetch_list)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->Product_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->Product_id; ?>" value="<?php echo $fetch_list->Product_id;?>" /></th>
<?php
$queryType=$this->db->query("select *from tbl_master_data where serial_number='$fetch_list->type'");
$getType=$queryType->row();


?>

<th><?=$fetch_list->sku_no;?></th>
<th><?=$getType->keyvalue;?></th>
<th>
<?php 
 $compQuery = $this -> db
           -> select('*')
           -> where('prodcatg_id',$fetch_list->category)
           -> get('tbl_prodcatg_mst');
		  $compRow = $compQuery->row();

echo $compRow->prodcatg_name;
?>

 </th>
 
<?php 
$size=$this->db->query("select *from tbl_master_data where serial_number='$fetch_list->size'");
$psize=$size->row();
if($psize->keyvalue !='')
{
?>
<th><?php echo $fetch_list->productname .'   ( '.$psize->keyvalue .')' ; } else { ?></th>
<th><?php echo $fetch_list->productname; } ?></th>

<th><?php
$compQuery1 = $this -> db
           -> select('*')
           -> where('serial_number',$fetch_list->usageunit)
           -> get('tbl_master_data');
		  $keyvalue1 = $compQuery1->row();
echo $keyvalue1->keyvalue;		  

?></th>
<th><?=$fetch_list->unitprice_sale;?></th>
<th><?=$fetch_list->unitprice_purchase;?></th>

<th class="bs-example">
<?php if($view!=''){ ?>

<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i;?>" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" data-a="<?php echo $fetch_list->Product_id;?>" href='#editItem' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='Product_id';
$table_name='tbl_product_stock';
?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->Product_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>		
<?php
  ?>
 
</th>
</tr>
<div id="modal-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">VIew Product</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Code:</label> 
<div class="col-sm-4"> 	
<input type="text" class="form-control" name="sku_no[]" value="<?php echo $fetch_list->sku_no; ?>" readonly> 
</div> 
<label class="col-sm-2 control-label">*Bar Code Name:</label> 
<div class="col-sm-4"> 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->productname; ?>" readonly class="form-control" required> 
</div> 
</div>
<div class="form-group"> 

<label class="col-sm-2 control-label">*Product Type:</label> 
<div class="col-sm-4"> 
<select name="type" required class="form-control" disabled="disabled" >
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=17");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->type){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
<div  <?php if($fetch_list->type==14){}else{?> style="display:none"<?php }?>>
<label class="col-sm-2 control-label">Via:</label> 
<div class="col-sm-4"> 
<select name="via_type" required class="form-control" disabled="disabled">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=19");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->via_type){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>

</div>
</div>

</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category[]" class="form-control ui fluid search dropdown email1" disabled="disabled">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id!='121'");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if($fetchgroup->prodcatg_id==$fetch_list->category){?>selected<?php }?>><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select>
</div>
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4" > 
<select name="unit[]" class="form-control" disabled="disabled">
					<option value="">----Select Unit----</option>
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
<label class="col-sm-2 control-label">Size:</label> 
<div class="col-sm-4" id="regid"> 
<select name="size[]"  class="form-control" disabled="disabled">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=18");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_list->size==$fetch_protype->serial_number){?> selected="selected"<?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div>

<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale[]" value="<?php echo $fetch_list->unitprice_sale; ?>" readonly="" class="form-control" required>
</div> 


</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase[]" value="<?php echo $fetch_list->unitprice_purchase; ?>" readonly="" class="form-control" required>
</div> 

<label class="col-sm-2 control-label">Minimum Reorder Level:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="min_re_order_level[]" value="<?php echo $fetch_list->min_re_order_level; ?>" readonly="" class="form-control" required>
</div> 
 
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_product_stock">  
<input type="text" style="display:none;" id="pri_col" value="Product_id">
</table>