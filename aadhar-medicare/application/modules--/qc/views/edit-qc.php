<?php
//$this->load->view("header.php");
$id=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Quality Check</h4>
</div>
<div class="modal-body overflow">
<?php 

	$query=$this->db->query("select * from tbl_tailor where tailor_id='".$_GET['ID']."'");	
	$fetchq=$query->row();
	
	$queryfetch=$this->db->query("select * from tbl_qualitiy_check where tailor_id='".$_GET['ID']."'");	
	$fetchqrow=$queryfetch->row();
	$rows=$queryfetch->num_rows();
	

?>
<input type="hidden"  class="form-control" name="qc_id" value="<?php echo $fetchqrow->qc_id;?>" />
<input type="hidden"  class="form-control" name="finishProduct" value="<?php echo $fetchq->finishProductId;?>" />
<input type="hidden"  class="form-control" name="tailor_id" value="<?php echo $_GET['ID'];?>" />
<table class="table table-striped table-bordered table-hover"  >
<thead>
<tr>
<th>Tailor Name</th>
<th>Checked Qty</th>
<th>Remaning Qty</th>
<th width="200px">Fill Qty</th>
<th>Date</th>
</tr>
</thead>
<tr>
<th>
<input type="hidden" name="contact_id" value="<?php echo $fetchq->customer_name;?>" />
<select name="contact_id1"  required id="contact_id_copy" class="form-control ui fluid search dropdown email" disabled="disabled">
		<option value="">Select</option>
		<?php
		$contQuery=$this->db->query("select * from tbl_contact_m where group_name='6'");
		foreach($contQuery->result() as $contRow)
		{
		?>
			<option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$fetchq->customer_name){ ?> selected="selected" <?php }?>>
			<?php echo $contRow->first_name; ?>
			</option>
			<?php } ?>
	</select>
</th>
<th>
<?php 
//echo $rows;
if($rows==0){?>0<?php }else{echo $check=$fetchqrow->qty;}
$tot=$fetchq->qty;
$rest=$tot-$check;
?>
</th>
<th><?php echo $rest;?>
<input type="hidden" name="rest" id="rest" class="form-control" value="<?php echo $rest;?>" ></th>
<th>
<input type="number" step="any" class="form-control" onkeyup="checkvalue(this.value)" required name="qty" id="qty" value="" />
<p id="error<?=$j;?>" style="display:none">*Qty Not Greater Than Remaining Value.</p>
</th>
<th>
<input type="date"  class="form-control" required name="date" value="" />
</th>
</tr>
</table>
</div>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" id="sv1" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
