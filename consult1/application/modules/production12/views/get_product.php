<?php

$product_id=$type;
  


 ?>
 <select name="product_id" id="product_id" style="width:50%" required onChange='getpr1(this.value);' onclick='getpr1(this.value);' onkeyup='getpr1(this.value);'>
     <option value="">---Select---</option>
     <?php 

 $selectemp=$this->db->query("select * from cybercodex_product_stock where status='A' and Product_typeid='$product_id'");

 foreach($selectemp->result() as $catFetch){ 
 ?>
     <option value="<?php echo $catFetch->Product_id;?>"<?php if($catFetch->Product_id == $product_detail) { ?> selected="selected" <?php } ?>><?php echo $catFetch->productname; ?> </option>
     <?php } ?>
   </select>