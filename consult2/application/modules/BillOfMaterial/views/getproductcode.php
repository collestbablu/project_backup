<?php

 $con1=$_GET['con'];
 ?>
	
			 <select name="product_name" id="prdidd" class="rounded" required>
			 <option value="">--select--</option>
		<?php				
			
			 $contQuery=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods'");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
					  
						<option value="<?php echo $contRow->sku_no; ?>" <?php if($contRow->sku_no==$con1){ ?> selected="selected" <?php } ?>>
						<?php echo $contRow->productname; ?></option>
						<?php } ?>
</select>