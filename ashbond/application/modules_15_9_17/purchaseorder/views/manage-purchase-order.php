<?php
$tableName='tbl_purchase_order_hdr';
$this->load->view('softwareheader'); 
?>

<h1><b></b>Purchase Order List</h1> 

<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->

<div class="add">
<a href="save_download_pdf_file_code"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>


<div class="add">
<a href="purchaseOrder"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Purchase Order</a>
</div>

<?php 		  
  $qty=$this->db->query("select * from tbl_payment_log where status='Purchaseorder'");
  	
	$totalamt="";
  foreach($qty->result() as $fetchq){
  		
	  $totalamt +=$fetchq->total_amount;
		
  }
  
?>
<div class="addinvoicetotal">
<a href="#">Total Purchases Amount : <?php echo $totalamt; ?></a>
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

        <th>S. No</th>
        <th>PO. Date</th>
        <th>Vendor Name</th>
       	<th>Case Id</th>
		<th>Ref.No</th>
        <th>Grand Total</th>
        
        

        <th style="width:100px;">Action</th>

    </tr>

    <tr>

		<td><input type="checkbox"></td>   
        <td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>
		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>
        <td><input type="text" id="id3" onKeyUp="search_row(this.id,3)" class="input-small"></td>
        <td><input type="text" id="id4" onKeyUp="search_row(this.id,4)" class="input-small"></td>
		 <td><input type="text" id="id5" onKeyUp="search_row(this.id,5)" class="input-small"></td>
		  <td><input type="text" id="id6" onKeyUp="search_row(this.id,6)" class="input-small"></td>
		<td></td>
    </tr>
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by purchase_order_id desc";
		  
			  $result=$this->db->query($queryy);
 $s=1;
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->purchase_order_id; ?>">

   <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->purchase_order_id; ?>"  value="<?php echo $line->purchase_order_id?>" /></td>

   

                       <td><?php echo 
					   $s++;?></td>

					   <td><?php echo $line->delivery_date; ?></td>
                      <!-- <a onClick="openpopup('<?php echo base_url();?>Payment/Payment/payment_amount',1000,600,'id',<?php echo $line->vendor_id; ?>)"></a>-->
					   <td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->vendor_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
					   ?></td>
                      <td><?php echo $line->totalcaseid;?></td>
					  <td><?php echo $line->refno;?></td>
                        <td><?php echo $line->grand_total;?></td>
                        
<td style="width:225px;" ><a target="_blank" href="viewPurchaseOrder?id=<?php echo $line->purchase_order_id ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('updatePurchaseOrder',1400,600,'id',<?php echo $line->purchase_order_id; ?>)" />
<?php
$pri_col='purchase_order_id';
$table_name='tbl_purchase_order_hdr';
$table_name_dtl='tbl_purchase_order_dtl';
$pri_col_dtl='purchase_order_hdr_id';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->purchase_order_id."^".$table_name."^".$pri_col."^".$table_name_dtl."^".$pri_col_dtl ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php 
if($line->send_status=='Send')
{
?>
<a class="submit" style="background-color:#FF0000"  href="send_approval?id=<?php echo $line->purchase_order_id; ?>">Send</a>  
<?php } else{?>
<a class="submit" style="background-color:#00FF00"  href="send_approval?id=<?php echo $line->purchase_order_id; ?>">Re-Send</a>  
<?php }?>


 </tr>


	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_purchase_order_hdr^tbl_purchase_order_dtl">  
<input type="text" style="display:none;" id="pri_col" value="purchase_order_id^purchase_order_hdr_id"> 	
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