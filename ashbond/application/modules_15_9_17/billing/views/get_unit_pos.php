<?php

$product_id=$product_id;

$seQu=$this->db->query("select * from tbl_product_stock where Product_id='$product_id'");
$fetch=$seQu->row();
?>

<select name="unit_type" required>
<?php
	$qurty=$this->db->query("select * from tbl_master_data where serial_number='".$fetch->usageunit."'  ");
	$qurtyf=$qurty->row();
?>
<option value="<?php echo $qurtyf->serial_number;?>"><?php echo $qurtyf->keyvalue; ?></option>
</select>

