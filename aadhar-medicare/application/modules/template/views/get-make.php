<?php
$makeQuery=$this->db->query("select *from tbl_product_stock where Product_id='$id'");
$getMake=$makeQuery->row();
?>
<select>
<?php
$makeLoopQuery=$this->db->query("select *from tbl_master_data where serial_number in($getMake->make1)");
foreach($makeLoopQuery->result() as $getLoopMake){
?>
<option value="<?=$getLoopMake->serial_number;?>"><?=$getLoopMake->keyvalue;?></option>
<?php }?>
</select>