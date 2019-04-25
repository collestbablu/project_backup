<?php
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
	extract($_POST);
$tableName='tbl_finish_goods_order';

$this->load->view('softwareheader'); 
?>

<div id="load_me"></div>
<form method="post">
<h1>Sales List</h1> 
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

<a href="add_sales"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Sales </a>
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

        <th>Date </th>
		<th>Finished Goods Name</th>
		<th>Qty</th>
        <th>Action</th>
    </tr>
<tr>
      <td><input type="checkbox"></td>  
        <td><input type="text" name="sku_no" id="id1" onKeyUp="search_row(this.id,1)"  class="input-small"></td>
		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)"  name="" class="input-small"></td>
		<td><input type="text" name="category_name" id="id3" onKeyUp="search_row(this.id,3)"  class="input-small"></td>
        <td style="display:none"><input type="text" name="item_name" id="id4" onKeyUp="search_row(this.id,4)"  class="input-small"></td>
		<td style="display:none"><input type="text" name="unitprice_purchase" id="id5" onKeyUp="search_row(this.id,5)"  class="input-small"></td>
		<td style="display:none"><input type="text" name="unitprice_sale" id="id6" onKeyUp="search_row(this.id,6)"  class="input-small"></td>
		<td style="display:none"><input type="text" name="quy_in_stock" id="id7" onKeyUp="search_row(this.id,7)"  class="input-small"></td>
		<td></td>

    </tr>
    </thead>

	<?php

@$mod_sql=$this->db->query("select * from $tableName order by id desc ");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
   <tr class="record" data-row-id="<?php echo $line->id; ?>">

   <td>
<?php
										$productId= $line->id;

										$checkProduct= $obj->product_check($productId);
   if($checkProduct=='1')
{
?>
   <input name="cid[]" class="sub_chk" type="checkbox" id="cid[]" data-id="<?php echo $line->id; ?>" value="<?php echo $line->id; ?>"  />
<?php } else{
	?>
	<spam data-id="" title="Invoice already ctrated for this product.you can not delete ?"   />*</spam>
	
<?php }?>
   </td>

										<td><?php echo $line->date;?></td>
										
										<td><?php 
										$fnsh_goods=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
										$rowss=$fnsh_goods->row();
										echo $rowss->productname;?></td>

										<td><?php echo $line->qty;?></td>
										
										<td style="display:none"><?php echo $line->productname;?></td>
										
										<td style="display:none"><?php echo $line->unitprice_purchase;?></td>
										
                                       <td style="display:none"><?php echo $line->unitprice_sale;?></td>
										
										<td style="display:none"><?php  echo $line->mrp;?></td>
										
<td>
  <?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onClick="openpopup('add_sales',900,400,'view',<?php echo $line->id ;?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onClick="openpopup('add_sales',900,400,'id',<?php echo $line->id ;?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } 
if($delete!=''){ 
if($checkProduct=='1')
{
$pri_col='id';
$table_name='tbl_finish_goods_order';
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
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
<input type="text" style="display:none;" id="table_name" value="tbl_finish_goods_order">  
<input type="text" style="display:none;" id="pri_col" value="id">  
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
//alert("sss");
//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
//alert(info);
 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_data",
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
