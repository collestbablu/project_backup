<?php
$tableName='tbl_bill_of_material_hdr';
$this->load->view('softwareheader'); 
?>

<h1><b></b>Production Planning  List</h1> 

<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->


<div class="add">
<a href="billMaterial"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Production Planning </a>
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

        <th>Lot. No</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
		<th>Machine Name</th>
       	 <th>Status</th>
      
        
        

        <th style="width:100px;">Action</th>

    </tr>

    <tr>

		<td><input type="checkbox"></td>   
        <td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>
		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>
        <td><input type="text" id="id3" onKeyUp="search_row(this.id,3)" class="input-small"></td>
		 <td><input type="text" id="id4" onKeyUp="search_row(this.id,4)" class="input-small"></td>
		 <td><input type="text" id="id4" onKeyUp="search_row(this.id,4)" class="input-small"></td>
		  <td><input type="text" id="id5" onKeyUp="search_row(this.id,5)" class="input-small"></td>
      
		<td></td>
    </tr>
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by bill_of_material_id_hdr desc limit 500";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){

$machineNameQuery=$this->db->query("select *from tbl_machine where Machine_id='$line->machine_name'");

$getMachineName=$machineNameQuery->row();
   ?>

   <tr class="record" data-row-id="<?php echo $line->bill_of_material_id_hdr; ?>">

   <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->bill_of_material_id_hdr; ?>"  value="<?php echo $line->bill_of_material_id_hdr?>" /></td>

   

                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo"> <?php echo $line->serial_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
                       
                       <td><?php 
												if($line->product_type=='finish_goods'){
										
										echo "Finish Goods"; }elseif($line->product_type=='row_material'){ echo "Row Material"; }
										elseif($line->product_type=='semi_finish_goods'){ echo "Semi Finish Goods";}
										else{}?></td>
										
                      <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					   <td><?=$getMachineName->machinename;?></td>
					    <td <?php if($line->approval_status=='Approved'){ ?> style="background:#00FF00"<?php } else {?> style="background:#FF0000" <?php }?>><?php 
	
						echo $line->approval_status;
					   ?></td>
					   
                        
<td style="width:220px;">
<?php if($line->approval_status=='Approved'){ ?>

<a class="submit" href="approval_update?idd=<?php echo $line->bill_of_material_id_hdr; ?>">Dis-Approve</a>
<?php } else {?>
<a class="submit" href="approval_update?id=<?php echo $line->bill_of_material_id_hdr; ?>">Approve</a>
<?php }?>
<a target="_blank"><img src="<?php echo base_url();?>/assets/images/view.png" alt="v" border="0" class="icon" title="View" onClick="openpopup('viewPurchaseOrder',1200,600,'id',<?php echo $line->bill_of_material_id_hdr; ?>)"/></a>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('updatePurchaseOrder',1200,600,'id',<?php echo $line->bill_of_material_id_hdr; ?>)" />
<?php
$pri_col='bill_of_material_id_hdr';
$table_name='tbl_bill_of_material_hdr';
$table_name_dtl=' tbl_bill_of_material_dtl';
$pri_col_dtl='bill_of_material_hdr_id';
	if($line->approval_status=='Approved')
	{}else {
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->bill_of_material_id_hdr."^".$table_name."^".$pri_col."^".$table_name_dtl."^".$pri_col_dtl ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" /><?php }?>
	</td></tr>
	<div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:931px;height:200px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">BOM Details</h4>
      </div>
      <div class="modal-body">
	  <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong>Raw Material</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong>Unit</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong>Qty</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Gross Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Net Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
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
	    <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong><?=$getProductName->productname;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong><?=$getProduct->unit;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong><?=$getProduct->quentity;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong><?=$getProduct->gross_weight;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->net_weight;?> </strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->scrap_weight;?></strong>
	  </div>
	  </div>
	
      <?php }?>

	  </div>

	  
     
    </div>
  </div>
</div>

	</div>
</div>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_bill_of_material_hdr^tbl_bill_of_material_dtl">  
<input type="text" style="display:none;" id="pri_col" value="bill_of_material_id_hdr^bill_of_material_hdr_id"> 	
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
   url: "delete_multiple_table_data",
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