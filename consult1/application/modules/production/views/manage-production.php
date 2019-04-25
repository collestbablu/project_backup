<?php
$tableName='tbl_bill_of_material_hdr';
$this->load->view('softwareheader'); 
?>

<h1><b></b>Moulding List</h1> 

<div class="actions">
<div class="blogroll">
<div id="" style="display:none">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->


<div class="add" style="display:none">
<a href="add_production"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add WIP</a>
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

        <th>Lot No.</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
		 <th>Total Quantity</th>
       	 <th>Completed Quantity</th>
		 
      
        
        

        <th style="width:100px;">Action</th>

    </tr>

    <tr>

		<td><input type="checkbox"></td>   
        <td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>
		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>
		
        <td><input type="text" id="id4" onKeyUp="search_row(this.id,4)" class="input-small"></td>
		 <td><input type="text" id="id5" onKeyUp="search_row(this.id,5)" class="input-small"></td>
		  <td><input type="text" id="id5" onKeyUp="search_row(this.id,5)" class="input-small"></td>
		   <td><input type="text" id="id6" onKeyUp="search_row(this.id,6)" class="input-small"></td>
      <td></td>
		
    </tr>
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' and approval_status='Approved' order by bill_of_material_id_hdr desc ";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->wip_hdr_id; ?>">

   <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->wip_hdr_id; ?>"  value="<?php echo $line->wip_hdr_id?>" /></td>

   

                       <td><?php echo  $line->serial_no;?></td>

					   <td><?php echo $line->date; ?></td>
					  <td><?php echo $line->product_type;?></td>
                       <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					   <td><?php echo $line->quantity; ?></td>
					   <?php
$cntQty=$this->db->query("select SUM(quantity) as qty,SUM(rejection_qty) as rejqty from tbl_wip_log where lot_no='$line->serial_no'");
$cntfetch=$cntQty->row();



?>
					    <td><?php echo $cntfetch->qty-$cntfetch->rejqty; ?></td>
						
                     
                   
                        
<td><a target="_blank" style="display:none"><img src="<?php echo base_url();?>/assets/images/view.png" alt="v" border="0" class="icon" title="View" onClick="openpopup('viewWip',1200,600,'id',<?php echo $line->bill_of_material_id_hdr; ?>)"/></a>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('updateWip',1400,800,'id',<?php echo $line->bill_of_material_id_hdr; ?>)" />
<?php
$pri_col='bill_of_material_id_hdr';
$table_name='tbl_bill_of_material_hdr';
$table_name_dtl='tbl_bill_of_material_dtl';
$pri_col_dtl='bill_of_material_hdr_id';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" style="display:none" id="<?php echo $line->bill_of_material_id_hdr."^".$table_name."^".$pri_col."^".$table_name_dtl."^".$pri_col_dtl ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
	</td></tr>
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