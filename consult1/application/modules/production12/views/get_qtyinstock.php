<?php 

$product_id=$_GET['product_id'];
//echo $product_id;
$Query=$this->db->query("select * from procution_production_hdr where finish_goods='$product_id'");

$row1=$Query->row();
echo "Quantity in Stock(".$row1->qty.")";
?>