<?php
$tableName='tbl_new_invoice';
$this->load->view('softwareheader'); 
?>

<h1>Invoice List</h1> 

<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->
<div class="add">
<a href="save_download_pdf_file"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>
<div class="add">
<a href="addInvoice"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Invoice</a>
</div>
<?php 		  
  $qty=$this->db->query("select * from tbl_payment_log where status='Invoice'");
  	
	$totalamt="";
  foreach($qty->result() as $fetchq){
  		
	  $totalamt +=$fetchq->total_amount;
		
  }
  
?>
<div class="addinvoicetotal">
<a href="#">Total Sales Amount : <?php echo $totalamt; ?></a>
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

        <th>Invoice No.</th>
        <th>Date</th>
		<th>Case Id</th>
		<th>Basic Amount</th>
        <th>Tax</th>
        <th>Total Amount</th>
        <th>Action</th>
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

		  $queryy="select * from $tableName order by invoice_id desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->invoice_id; ?>">

   <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->invoice_id; ?>"  value="<?php echo $line->invoice_id?>" /></td>

   

                       <td><?php echo 
					   $line->invoice_no;?></td>

					   <td><?php echo $line->n_date; ?></td>
					
                         <td><?php echo $line->case_id;?></td>
						    <td><?php echo $line->basic_amt;?></td>
							<td><?php echo $line->tax;?></td>
                        <td><?php echo $line->total_amt;?></td>
                        
<td style="width:200px;">

<a target="_blank" href="<?=base_url()?>assets/invoice_image/<?php echo $line->invoice_image; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('addInvoice',1000,600,'id',<?php echo $line->invoice_id; ?>)" />
<?php
$pri_col='invoice_id';
$table_name='tbl_new_invoice';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->invoice_id."^".$table_name."^".$pri_col; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
    </td></tr>
	<?php } ?>
	<input type="text" style="display:none;" id="table_name" value="tbl_new_invoice">  
<input type="text" style="display:none;" id="pri_col" value="invoice_id"> 	
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
   url: "delete_multiple_table_data_sales_order",
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