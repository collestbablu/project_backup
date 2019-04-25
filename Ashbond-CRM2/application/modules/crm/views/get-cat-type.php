<?php
 $catType=$_GET['catType']
  ?>

  <Select class="rounded" id="url" name="category_type" required >

    <option value="">--Select--</option>

  <?php
			 $cateQuery=$this->db->query("select *from tbl_producttype_m where Product_Catid='$catType'");
			  foreach($cateQuery->result() as $getTypeQuery ){
			  ?>
			  <option value="<?php echo $getTypeQuery->Product_typeid;?>"><?php echo $getTypeQuery->categoryName;?></option>
              
			  <?php }?>
  </Select>

  