<?php
//$this->load->view("header.php");
$id=$_GET['ID'];
//echo $id;
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Packing</h4>
</div>
<div class="modal-body overflow">
<?php 

	$query=$this->db->query("select * from tbl_qualitiy_check where qc_id='".$_GET['ID']."'");	
	$fetchq=$query->row();
	
	$queryfetch=$this->db->query("select * from tbl_packing where qc_id='".$_GET['ID']."'");	
	$fetchqrow=$queryfetch->row();
	$rows=$queryfetch->num_rows();
	
	$query111=$this->db->query("select * from tbl_tailor where tailor_id='$fetchq->tailor_id'");	
	$fetchqrow111=$query111->row();
	$fetchqrow111->production_id;
?>
<input type="hidden" value="<?=$fetchq->date;?>" name="pkdate" id="pkdate" />
<input type="hidden"  class="form-control" name="production_id" value="<?php echo $fetchqrow111->production_id;?>" />
<input type="hidden"  class="form-control" name="packing_id" value="<?php echo $fetchqrow->packing_id;?>" />
<input type="hidden"  class="form-control" name="finishProduct" value="<?php echo $fetchq->finishProductId;?>" />
<input type="hidden"  class="form-control" name="qc_id" value="<?php echo $_GET['ID'];?>" />
<table class="table table-striped table-bordered table-hover"  >
<thead>
<tr>
<th>Packed Qty</th>
<th>Remaining Qty</th>
<th>Fill Qty</th>
<th>Date</th>
</tr>
</thead>
<tr>
<th><?php 
//echo $rows;
if($rows==0){?>0<?php }else{echo $check=$fetchqrow->qty;}
$tot=$fetchq->qty;
$rq=$fetchq->reject_qty;
$rest=$tot-$check-$rq;
?></th>
<th><?php echo $rest;?>
<input type="hidden" name="rest" id="rest" class="form-control" value="<?php echo $rest;?>" ></th>
<th>
<input type="hidden" name="contact_id" value="<?php echo $fetchq->customer_name;?>" />
<input type="number" step="any"  class="form-control" onkeyup="checkvalue(this.value)" required name="qty" id="qty" value="" />
<p id="error<?=$j;?>" style="display:none">*Qty Not Greater Than Remaining Value.</p>
</th>
<th>
<input type="date"  class="form-control" required name="date" id="date" onchange="CompareDate(this.value)" value="" />
</th>
</tr>
</table>
<table class="table table-striped table-bordered table-hover"  >
<thead>
<tr>
<th>Sl. No.</th>
<th>Packed Qty</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<?php 
$i=1;
if($fetchqrow->packing_id!='')
{
$getlog=$this->db->query("select * from tbl_production_log where packing_id='$fetchqrow->packing_id' and production_status='packing'");

foreach($getlog->result() as $gtlg)
{

?>
<tr id="record<?=$i;?>">
<th><?php echo $i; ?></th>
<th><?=$gtlg->qty;?></th>
<th><?=$gtlg->date;?></th>
<th><?php
$pri_col='production_log_id';
$table_name='tbl_production_log';
//echo $gtlg->production_log_id;
	?>
	<button id="<?php echo $gtlg->production_log_id."^".$table_name."^".$pri_col."^".$gtlg->qty."^".$gtlg->packing_id.",".$i ; ?>" onclick="abcd(this.id)" type="button"><i class="icon-trash"></i></button>
</th>
</tr>
<?php $i++;} } ?>
</table>
</div>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" id="sv1" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>


