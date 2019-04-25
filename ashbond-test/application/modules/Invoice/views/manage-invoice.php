<title>Invoice List <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php
$tableName='tbl_new_invoice';
$this->load->view('softwareheader'); 
?>

<h1>Invoice List</h1> 
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
<a href="addInvoice"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Invoice</a>
</div>
<?php 		  
  $qty=$this->db->query("select * from tbl_payment_log where status='Invoice'");
  	
	$totalamt="";
	$rupeetotalamt="";
  foreach($qty->result() as $fetchq){
  		
		 $qnewcase=$this->db->query("select * from tbl_new_case where case_id='".$fetchq->case_id."'");
					  $fetchnewcase=$qnewcase->row(); 

					    $fetchnewcase->currency_name;	
					
					if($fetchnewcase->currency_name=='Euro'){
	 			 $totalamt +=$fetchq->total_amount;
		}
		
		if($fetchnewcase->currency_name=='Rupee'){
	 			 $rupeetotalamt +=$fetchq->total_amount;
		}			
  }
  
?>
<div class="addinvoicetotal">
<a href="#">Total Sales : <img src="<?php echo base_url();?>/assets/images/rupee.png" style="width: 20px;height: 15px;" alt="" border="0" /><?php echo $rupeetotalamt; ?></a>
</div>

<div class="addinvoicetotal">
<a href="#">Total Sales : <img src="<?php echo base_url();?>/assets/images/euro_silver.svg" style="width: 20px;height: 14px;" alt="" border="0" /><?php echo $totalamt; ?></a>
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

        <th>Invoice No.</th>
        <th>Date</th>
		<th>Case Id</th>
		<th>Currency</th>
		<th>Basic Amount</th>
        <th>Tax</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

   
    </thead>


<?php

		  $queryy="select * from $tableName order by invoice_id desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->invoice_id; ?>">

   <td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->invoice_id; ?>"  value="<?php echo $line->invoice_id?>" /></td>

   

                       <td><?php echo 
					   $line->invoice_no;?></td>

					   <td><?php echo $line->n_date; ?></td>
					
                         <td><?php echo $line->case_id;?></td>
						  <td><?php
					  
					  $qnewcase=$this->db->query("select * from tbl_new_case where case_id='".$line->case_id."'");
					  $fetchnewcase=$qnewcase->row(); 

					   echo $fetchnewcase->currency_name;?></td>
						    <td><?php echo $line->basic_amt;?></td>
							<td><?php echo $line->tax;?></td>
                        <td><?php echo $line->total_amt;?></td>
                         <td><?php 	
										$sumbill='';							
			  						$Qresult=$this->db->query("select * from tbl_invoice_report where invoiceid='$line->invoice_id' and type='Invoice'");
									foreach($Qresult->result() as $fetchQlist){
								
										$sumbill +=$fetchQlist->billamount;
										
										}
								if($sumbill!=''){
										
									echo $sumbill;	
								}else{
								
								echo $line->payment_status;
								}
								?></td> 
                        
<td style="width:200px;">

<a target="_blank" href="<?=base_url()?>assets/invoice_image/<?php echo $line->invoice_image; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('addInvoice',1000,600,'id',<?php echo $line->invoice_id; ?>)" />


 
<?php
$pri_col='invoice_id';
$table_name='tbl_new_invoice';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->invoice_id."^".$table_name."^".$pri_col; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
    &nbsp;
    <?php
	if($line->payment_status=='Payment Done'){
	?>
    <a href="#" onclick="return confirm('Paymnet has been received');">Record Payment</a>
    <?php } else {?>
    <a href="<?=base_url();?>Invoice/addPayment?amt=<?php echo $line->total_amt;?>^<?php echo $line->invoice_id;?>^<?php echo $line->contact_id;?>">Record Payment</a>
    <?php }?>
    
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
   url: "delete_invoice_table_data",
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