<title>Sales Order List <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php
$tableName='tbl_sales_ordernew_hdr';
$this->load->view('softwareheader'); 
?>

<h1><b></b>Sales Order List</h1> 
<!--
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close

<div class="add">
<a href="save_download_pdf_file"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>-->

<div class="add">
<a href="purchaseOrder"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Sales Order</a>
</div>



<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<table class="bordered table-hover dataTables-example">

    <thead>



    <tr>

       <th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>    

        <th>Sales Order No.</th>
        <th>Date</th>
        <th>Customer Name</th>
       	<th>Case Id</th>
		<th>Ref.No</th>
		<th>Currency</th>
        <th>Grand Total</th>
        
        

        <th style="width:100px;">Action</th>

    </tr>

    
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by purchase_order_id desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->purchase_order_id; ?>">

   <td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->purchase_order_id; ?>"  value="<?php echo $line->purchase_order_id?>" /></td>

   

                       <td><?php echo 
					   $line->purchase_order_id;?></td>

					   <td><?php echo $line->delivery_date; ?></td>
                      <!-- <a onClick="openpopup('<?php echo base_url();?>Payment/Payment/payment_amount',1000,600,'id',<?php echo $line->vendor_id; ?>)"></a>-->
					   <td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->vendor_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
					   ?></td>
                      <td><?php echo $line->totalcaseid;?></td>
					  <td><?php echo $line->refno;?></td>
					   <td><?php
					  
					  $qnewcase=$this->db->query("select * from tbl_new_case where case_id='".$line->case_id."'");
					  $fetchnewcase=$qnewcase->row(); 

					   echo $fetchnewcase->currency_name;?></td>
                        <td><?php echo $line->grand_total;?></td>
                        
<td style="width: 26%;"><!--<a target="_blank" href="viewPurchaseOrder?id=<?php echo $line->purchase_order_id ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>-->

<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('updatePurchaseOrder',1400,600,'id',<?php echo $line->purchase_order_id; ?>)" />
<?php
$pri_col='purchase_order_id';
$table_name='tbl_sales_ordernew_hdr';
$table_name_dtl='tbl_sales_ordernew_dtl';
$pri_col_dtl='purchase_order_hdr_id';
	?>
	<?php 
if($line->send_status=='Send')
{
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->purchase_order_id."^".$table_name."^".$pri_col."^".$table_name_dtl."^".$pri_col_dtl ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php } else {?>
<!--
<img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('It is already sent. You can not delete it');"  class="icon"  alt="" border="0"  title="Delete" />
-->
<?php }?>

<?php 
if($line->send_status=='Send')
{
?>
<a class="submit" style="background-color:#FF0000"  href="send_approval?id=<?php echo $line->purchase_order_id; ?>">Send</a>  
<?php } else{?>
<a class="submit" style="background-color:#00FF00"  href="send_approval?id=<?php echo $line->purchase_order_id; ?>">Re-Send</a>  
<?php } 
if($line->upload_image!=''){
?>

<a class="submit" target="_blank"  href="<?=base_url()?>assets/image_data/<?php echo $line->upload_image; ?>">View Upload</a>
<?php }else{ ?>

<?php } ?>
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
   url: "delete_multiple_newsale_table_data",
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