<?php

$this->load->view('softwareheader'); 
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
	extract($_POST);
	

$tableName1='tbl_template_hdr';

?>

<h1><b></b>Template List</h1> 

<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->


<div class="add">
<a href="addTemplate"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Template</a>
</div>



<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

       <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>    

         <th>Finish Goods</th>
        <th>Raw Materials </th>
        <th>Unit</th>
        
        

        <th style="width:100px;">Action</th>

    </tr>

    <tr>

		<td><input type="checkbox"></td>   
        <td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>
		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>
        <td><input type="text" id="id3" onKeyUp="search_row(this.id,3)" class="input-small"></td>
	
      
		<td></td>
    </tr>
    </thead>


<?php

		  $queryy="select * from $tableName1 where status='A' order by template_hdr_id desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){
   	// this query is for validation of template
	$tableName='tbl_bill_of_material_hdr';
	$pri_id='product_name';
	$globleId= $line->product_name;

										 $validation= $obj->globle_check($tableName,$pri_id,$globleId);
// ends

   ?>
<?php 
			$Query12=$this->db->query("select * from tbl_template_dtl where template_hdr_id='$line->template_hdr_id'");
						$fetchQ123=$Query12->row();
	
		?>
   <tr class="record" data-row-id="<?php echo $line->template_hdr_id; ?>">

  <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->template_hdr_id; ?>"  value="<?php echo $line->template_hdr_id?>" /></td>

   

                       <td><?php 
					  
					  			
					
					    $Query=$this->db->query("select * from tbl_product_stock where sku_no='$fetchQ123->product_name'");
						$fetchQ=$Query->row();
					    echo $fetchQ->productname; ?></td>

					   <td>
					  
					    <a target="_blank"><i onClick="openpopup('show_qty',1000,300,'show_row',<?php echo $fetchQ123->template_hdr_id; ?>)"  alt="v" border="0" class="icon" title="show row matrial"/>Show Raw Materials</i></td>
                       <td><?php 

						echo $fetchQ123->unit;
					   ?></td>
                      
                       
                        
<td><a target="_blank"><img src="<?php echo base_url();?>/assets/images/view.png" alt="v" border="0" class="icon" title="View" onClick="openpopup('viewPurchaseOrder',1000,600,'id',<?php echo $line->template_hdr_id; ?>)"/></a>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('updatePurchaseOrder',1000,600,'id',<?php echo $line->template_hdr_id; ?>)" />
<?php
$pri_col='template_hdr_id';
$table_name='tbl_template_hdr';
$table_name_dtl='tbl_template_dtl';
$pri_col_dtl='template_hdr_id';
$p_id=$fetchQ123->product_name;
if($validation=='1')
{

?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->template_hdr_id."^".$table_name."^".$pri_col."^".$table_name_dtl."^".$pri_col_dtl."^".$p_id ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />

<?php
}
else
{
	?>
	<img src="<?php echo base_url();?>/assets/images/delete.png" onClick='alert("Production already starts. You can not delete this template..")'    alt="" border="0"  title="Delete" />
<?php }?>
	</td></tr>
	<div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1210px;height:200px;; margin-left:-302px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">BOM Details</h4>
      </div>
      <div class="modal-body">
	  <div  class="border row">
     
	  <div class="border col-lg-2">
	  <strong>S.No.&nbsp;Row Material</strong>
	  </div>
	  <div class="border col-lg-2">
	  <strong>Unit</strong>
	  </div>
	  <div class="border col-lg-2">
	 <strong>Qty</strong>
	  </div>
	   <div class="border col-lg-2">
	 <strong>Gross Weight</strong>
	  </div>
	  
	   <div class="border col-lg-2">
	 <strong>Net Weight</strong>
	  </div>
	   <div class="border col-lg-2">
	 <strong>Scrap Weight</strong>
	  </div>
	  
	  </div>
	  	
	  
	  <?php
						$queryProduct=$this->db->query("select *from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$line->bill_of_material_id_hdr'");
						$i=1;
						foreach($queryProduct->result() as $getProduct){
						$productName=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->item_name'");
						$getProductName=$productName->row();
						?>
      <div class="row">
	  <div class="border col-lg-2">
	  <?=$i;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$getProductName->productname;?>
	  </div>
	
	  <div class="border col-lg-2">
	  <?=$getProduct->unit;?>
	  </div>
	  <div class="border col-lg-2">
	   <?=$getProduct->quentity;?>
	  </div>
	  <div class="border col-lg-2">
	   <?=$getProduct->gross_weight;?>
	  </div>
	  <div class="border col-lg-2">
	   <?=$getProduct->net_weight;?>
	  </div>
	   <div class="border col-lg-2">
	   <?=$getProduct->scrap_weight;?>
	  </div>
	 
	  </div>
<?php $i++;}?>	  
	  </div>

	  
     
    </div>
  </div>
</div>

	</div>
</div>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_template_hdr^tbl_template_dtl">  
<input type="text" style="display:none;" id="pri_col" value="template_hdr_id^template_hdr_id"> 	
</table>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</div><!--paging-row close-->

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
   url: "delete_data_template",
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