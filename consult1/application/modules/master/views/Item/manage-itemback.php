<?php
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
	extract($_POST);
$tableName='tbl_product_stock';

$this->load->view('softwareheader'); 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<form method="post">
<h1>Product List</h1> 
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>

		<ul>        
		</ul>
   </div>
	</div>
</div><!--actions close-->

<div class="add">
<?php if($add!=''){ ?>

<a href="add_item"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Product</a>
<?php } ?>
</div><!--add close-->
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">


<table class="bordered" id="dataTables-example">

    <thead>
    <tr>

        <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>        

        <th>Product Code </th>
		<th style="display:none">Product Type</th>
		<th>Category</th>
        <th>Product Name</th>

      	<th>Purchase Price</th>
        <th>Sale Price</th>
		  <th>Mrp</th>
	

        <th>Action</th>

		

    </tr>
<tr>
      <td><input type="checkbox"></td>  
        <td><input type="text" name="sku_no" id="id1" onKeyUp="search_row(this.id,1)"  class="input-small"></td>
		<td style="display:none"><input type="text" id="id2" onKeyUp="search_row(this.id,2)"  name="" class="input-small"></td>
		<td><input type="text" name="category_name" id="id3" onKeyUp="search_row(this.id,3)"  class="input-small"></td>
        <td><input type="text" name="item_name" id="id4" onKeyUp="search_row(this.id,4)"  class="input-small"></td>
		<td><input type="text" name="unitprice_purchase" id="id5" onKeyUp="search_row(this.id,5)"  class="input-small"></td>
		<td><input type="text" name="unitprice_sale" id="id6" onKeyUp="search_row(this.id,6)"  class="input-small"></td>
		<td><input type="text" name="quy_in_stock" id="id7" onKeyUp="search_row(this.id,7)"  class="input-small"></td>
		<td></td>

    </tr>
    </thead>

	<?php

@$mod_sql=$this->db->query("select * from $tableName ");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
   <tr class="record" data-row-id="<?php echo $line->Product_id; ?>">

   <td>
<?php
										$productId= $line->Product_id;

										$checkProduct= $obj->product_check($productId);
   if($checkProduct=='1')
{
?>
   <input name="cid[]" class="sub_chk" type="checkbox" id="cid[]" data-id="<?php echo $line->Product_id; ?>" value="<?php echo $line->Product_id; ?>"  />
<?php } else{
	?>
	<spam data-id="" title="Invoice already ctrated for this product.you can not delete ?"   />*</spam>
	
<?php }?>
   </td>

										<td><?php echo $line->sku_no;?></td>
										<td style="display:none"><?php 
												if($line->Product_typeid=='finish_goods'){
										
										echo "Finish Goods"; }elseif($line->Product_typeid=='row_material'){ echo "Row Material"; }else{}?></td>
										<td>
										<?php
										$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='$line->category'");
										$res1 = $sqlgroup->row();
										
										?>
										
										<?php echo $res1->prodcatg_name;?></td>
										
										<td><?php echo $line->productname;?></td>
										
										<td><?php echo $line->unitprice_purchase;?></td>
										
                                       <td><?php echo $line->unitprice_sale;?></td>
									 <?php  $sqlstock=$this->db->query("select sum(quantity) as qnty from tbl_product_serial where serialno ='".$line->Product_id."'");
										$sqlstock = $sqlstock->row(); 
									    ?>
										
										<td><?php  echo $line->mrp; 
										
										
										?></td>
										
<td>
  <?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onClick="openpopup('add_item',900,400,'view',<?php echo $line->Product_id ;?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onClick="openpopup('add_item',900,400,'id',<?php echo $line->Product_id ;?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } 
if($delete!=''){ 
if($checkProduct=='1')
{
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->Product_id ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />

<?php
}
else

{
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('Invoice already ctrated for this product.you can not delete ?');"  alt="" border="0"  title="Delete" />
<?php

}

 } ?>
</td>
    </tr>

	<?php 
	$i++;
	} 
	
	?>
<input type="text" style="display:none;" id="table_name" value="tbl_product_stock">  
<input type="text" style="display:none;" id="pri_col" value="Product_id">  
</table>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->

</div><!--div close-->
</div><!--container close-->

</div><!--paging-right close-->

<script src="<?php echo base_url();?>/assets/jsw/jquery.js"></script>





<script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;

 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_item",
   data: info,
   success: function(){
  
   }
 });

         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>


<?php $this->load->view('softwarefooter'); ?>