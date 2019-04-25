<?php 
$tableName="tbl_payment_log";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<script src="<?php echo base_url();?>assets/js/jst/jquery.min.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php $this->load->view('title'); ?>
<style>
p{font-size: 40px;}
.loader1 {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url("<?php echo base_url();?>assets/images/ajax-loader.gif") 50% 50% no-repeat #ffffff;
    opacity: .8;
}


/* Switch button */
.btn-default.btn-on.active{background-color: #5BB75B;color: white;}
.btn-default.btn-off.active{background-color: #DA4F49;color: white;}

.btn-default.btn-on-1.active{background-color: #006FFC;color: white;}
.btn-default.btn-off-1.active{background-color: #DA4F49;color: white;}

.btn-default.btn-on-2.active{background-color: #00D590;color: white;}
.btn-default.btn-off-2.active{background-color: #A7A7A7;color: white;}

.btn-default.btn-on-3.active{color: #5BB75B;font-weight:bolder;}
.btn-default.btn-off-3.active{color: #DA4F49;font-weight:bolder;}

.btn-default.btn-on-4.active{background-color: #006FFC;color: #5BB75B;}
.btn-default.btn-off-4.active{background-color: #DA4F49;color: #DA4F49;}

</style>
<script>
$(window).load(function() {
	$(".loader1").fadeOut("fast");
});

</script>
<?php $this->load->view('phpfunction'); ?>

<body>
<div class="loader1" id=></div>
<?php $this->load->view('all_js'); ?>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->
<?php 
	$this->load->view('sidebar');
  ?>
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<script>
function search_row(id,row)
{

var value= document.getElementById(id).value;

var table = $('#dataTables-example').DataTable();
$('#'+id).on( 'keyup', function () {
    table
        .columns( row )
        .search( this.value )
        .draw();
});

} 	
</script>
<form method="post">
<h1>DASH BOARD LIST</h1> 

<div class="actions">
<div class="blogroll">
</div>
</div><!--actions close-->

<?php 		  
  $qty=$this->db->query("select * from tbl_payment_log where status='Invoice'");
  	
	$totalamt="";
  foreach($qty->result() as $fetchq){
  		
	  $totalamt +=$fetchq->total_amount;
		
  }
  
?>
<!--<div class="addinvoicetotal">
<a href="#">Total Sales Amount : <?php echo $totalamt; ?></a>
</div>-->

<?php 		  
  $qty=$this->db->query("select * from tbl_payment_log where status='Purchaseorder'");
  	
	$totalamt="";
  foreach($qty->result() as $fetchq){
  		
	  $totalamt +=$fetchq->total_amount;
		
  }
  
?>
<!--<div class="addinvoicetotal">
<a href="#">Total Purchases Amount : <?php echo $totalamt; ?></a>
</div>-->
<div class="search-row-to">
</div><!--search-row-to close-->
<div class="clear"></div>
</div><!--title close-->

<br />
<div class="table-row">
<table class="bordered table-hover dataTables-example">
<thead>
<tr>
<th><b>Coming Vendor DOD'S</b></th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
</thead>
<thead>
<tr>
<th style="width: 15%; text-align:center;">Vendor Date</th>
<th style="width:20%; text-align:center;">Case Id</th>
<th style="width: 17%; text-align:center;">Subject</th>
<th style="width: 10%; text-align:center;">Ref.No.</th>
<th style="text-align:center;">Grand Total</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>

	<?php
$queryyyy=$this->db->query("select * from tbl_purchase_order_hdr");
$num=$queryyyy->num_rows();
if($num>0)
{
  foreach($queryyyy->result() as $fetchvdd)
  {
	$delivery=$fetchvdd->vendor_dod;
	$reminder=$fetchvdd->reminder_date;
	 $curdate = date("Y-m-d");

  if($reminder<=$curdate && $delivery>=$curdate)
  {
  
  $now =$fetchvdd->ignores_date;
  $ignorestatus =$fetchvdd->ignores;
  $dismissstatus =$fetchvdd->dismiss;

  $sqlTime = date('Y-m-d H:i:s', strtotime('+24 hours', strtotime($now)));

date_default_timezone_set('Asia/Kolkata');
$dt = new DateTime();
$mdate=$dt->format('d/m/Y H:i:s');

if(strtotime($sqlTime)<=strtotime($mdate) && $ignorestatus=='ignore'){


   ?>
   
   <tr>
<td style="text-align:center;"><?php echo $fetchvdd->vendor_dod;?></td>  
<td style="text-align:center;"><?php echo $fetchvdd->case_id;?></td>  
<td style="text-align:center;"><?php echo $fetchvdd->subject;?></td>  
<td style="text-align:center;"><?php echo $fetchvdd->refno;?></td>  
<td style="text-align:center;"><?php echo $fetchvdd->grand_total;?></td>  
<td style="text-align:center;"><a target="_blank" href="<?=base_url();?>purchaseorder/PurchaseOrder/viewPurchaseOrder?id=<?php echo $fetchvdd->purchase_order_id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>&nbsp;<a onclick="purchaseignores('<?php echo $fetchvdd->purchase_order_id;?>')"><img src="<?php echo base_url();?>/assets/images/innore.gif" alt="" border="0" /></a><a onclick="purchasedismiss('<?php echo $fetchvdd->purchase_order_id;?>')"> <img src="<?php echo base_url();?>/assets/images/dismiss.gif" alt="" border="0" /></a>

		</td>
   </tr>
<?php

}else{
	
	if($ignorestatus=='IGN' && $dismissstatus=='DIS'){

	//	echo "by";
?>
  <tr>
<td style="text-align:center;"><?php echo $fetchvdd->vendor_dod;?></td>  
<td style="text-align:center;"><?php echo $fetchvdd->case_id;?></td>  
<td style="text-align:center;"><?php echo $fetchvdd->subject;?></td>  
<td style="text-align:center;"><?php echo $fetchvdd->refno;?></td>  
<td style="text-align:center;"><?php echo $fetchvdd->grand_total;?></td>  
<td style="text-align:center;"><a target="_blank" href="<?=base_url();?>purchaseorder/PurchaseOrder/viewPurchaseOrder?id=<?php echo $fetchvdd->purchase_order_id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>&nbsp;<a onclick="purchaseignores('<?php echo $fetchvdd->purchase_order_id;?>')"><img src="<?php echo base_url();?>/assets/images/innore.gif" alt="" border="0" /></a><a onclick="purchasedismiss('<?php echo $fetchvdd->purchase_order_id;?>')"> <img src="<?php echo base_url();?>/assets/images/dismiss.gif" alt="" border="0" /></a>

		</td>
   </tr>

<?php

	}else{

	}

} } } }?>		
</table>
<table class="bordered table-hover dataTables-example">
<thead>
<tr>
<th><b>Coming Customer DOD's</b></th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
</thead>
<thead>
<tr>
<th style="width: 12%; background-color: #2f4d65; text-align:center;">Customer Date</th>
<th style="width: 8%; background-color: #2f4d65; text-align:center;">Case Id</th>
<th style="width: 17%; background-color: #2f4d65; text-align:center;">Subject</th>
<th style="background-color: #2f4d65; text-align:center;">Ref.No.</th>
<th style="width: 15%; background-color: #2f4d65; text-align:center;">Grand Total</th>
<th style="width:200px; background-color: #2f4d65; text-align:center;">Action</th>
</tr>

</thead>
<?php
$queryyyyyy=$this->db->query("select * from tbl_sales_ordernew_hdr");
$numm=$queryyyyyy->num_rows();
if($numm>0){
foreach($queryyyyyy->result() as $fetchvdddd){

$deliverysale=$fetchvdddd->customer_dod;
	$remindersale=$fetchvdddd->reminder_date;
	$curdatesale = date("Y-m-d");

  if($remindersale<=$curdatesale && $deliverysale>=$curdatesale)
  {


  		$nowsale =$fetchvdddd->ignores_date;
  $ignorestatussale =$fetchvdddd->ignores;
  $dismissstatussale =$fetchvdddd->dismiss;

  $sqlTimesale = date('Y-m-d H:i:s', strtotime('+24 hours', strtotime($nowsale)));

date_default_timezone_set('Asia/Kolkata');
$dt = new DateTime();
$mdate=$dt->format('d/m/Y H:i:s');

if(strtotime($sqlTimesale)<=strtotime($mdate) && $ignorestatussale=='ignore'){


?>
<tr>
<td align="center"><?php echo $fetchvdddd->customer_dod;?></td>
<td align="center"><?php echo $fetchvdddd->case_id;?></td>
<td align="center"><?php echo $fetchvdddd->subject;?></td>
<td align="center"><?php echo $fetchvdddd->refno;?></td>
<td align="center"><?php echo $fetchvdddd->grand_total;?></td>
<td style="width:17%;"><?php if($fetchvdddd->upload_image!=''){ ?>
<a target="_blank" href="<?=base_url()?>assets/image_data/<?php echo $fetchvdddd->upload_image; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>&nbsp; <?php }else{ ?> <?php } ?> <a onclick="salesignores('<?php echo $fetchvdddd->purchase_order_id;?>')"><img src="<?php echo base_url();?>/assets/images/innore.gif" alt="" border="0" /></a>&nbsp; <a onclick="saledismiss('<?php echo $fetchvdddd->purchase_order_id;?>')"> <img src="<?php echo base_url();?>/assets/images/dismiss.gif" alt="" border="0" /></a>
</td>

</tr> 
<?php

}else{
	
	if($ignorestatussale=='IGN' && $dismissstatussale=='DIS'){

	//	echo "by";
?>

<tr>
<td align="center"><?php echo $fetchvdddd->customer_dod;?></td>
<td align="center"><?php echo $fetchvdddd->case_id;?></td>
<td align="center"><?php echo $fetchvdddd->subject;?></td>
<td align="center"><?php echo $fetchvdddd->refno;?></td>
<td align="center"><?php echo $fetchvdddd->grand_total;?></td>
<td style="width:17%;"><?php if($fetchvdddd->upload_image!=''){ ?>
<a target="_blank" href="<?=base_url()?>assets/image_data/<?php echo $fetchvdddd->upload_image; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>&nbsp; <?php }else{ ?> <?php } ?> <a onclick="salesignores('<?php echo $fetchvdddd->purchase_order_id;?>')"><img src="<?php echo base_url();?>/assets/images/innore.gif" alt="" border="0" /></a>&nbsp; <a onclick="saledismiss('<?php echo $fetchvdddd->purchase_order_id;?>')"> <img src="<?php echo base_url();?>/assets/images/dismiss.gif" alt="" border="0" /></a>
</td>

</tr> 
  <?php }else{

	}

} } } }else{  } ?>
</table>
<table class="bordered table-hover dataTables-example">
<thead>
<tr>
<th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th> 
<th style="width: 15%; text-align:center;">Date</th>
<th style="width:20%; text-align:center;">Contact Name</th>
<th style="width: 10%; text-align:center;">Case Id</th>
<th style="width: 10%; text-align:center;">Currency</th>
<th style="text-align:center;">Ref.No.</th>
<th style="width:10%; text-align:center;">Modules</th>
<th style="text-align:center;">Action</th>

</tr>
</thead>

	<?php

	
	if($Search=='')
	{
		
		 $queryy="select * from $tableName ORDER BY p_id DESC limit 50";
		
		}
	
	$result1=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	$i=1;
	foreach(@$result1->result() as $line){
	
    @extract($line);
   ?>
   
   <tr>
   	<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->p_id; ?>"value="<?php echo $line->p_id?>" /></td>
	<td style="text-align:center;"><?php echo $line->date;?></td> 
<!--================================-->
<td style="text-align:center;">
	    <?php
					   if($line->status=='Purchaseorder')
						 {
						  
						$Qpurchase=$this->db->query("select * from tbl_purchase_order_hdr where purchase_order_id='".$line->all_id."'");
					    $fetchPurchase=$Qpurchase->row();
 						
						$Qcontact=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchPurchase->vendor_id."'");
					    $fetchCon=$Qcontact->row();
						
						echo $fetchCon->first_name;
						   
						 } 
						   
					   if($line->status=='Invoice')
   						{
						
						$Qinvoice=$this->db->query("select * from tbl_new_invoice where invoice_id='".$line->all_id."'");
					    $fetchinvoiceOne=$Qinvoice->row();
 						
						$QcccontactOne=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchinvoiceOne->contact_id."'");
					    $fetchcconn=$QcccontactOne->row();
						
						echo $fetchcconn->first_name;
						
						
						} 
						
					   if($line->status=='SaleOrdernew')
   						{
						
						$Qpurchasess=$this->db->query("select * from tbl_sales_ordernew_hdr where purchase_order_id='".$line->all_id."'");
					    $fetchsaleOne=$Qpurchasess->row();
 						
						$QcontactsaleOne=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchsaleOne->vendor_id."'");
					    $fetchConnn=$QcontactsaleOne->row();
						
						echo $fetchConnn->first_name;
						
						}
						
					  if($line->status=='Quotation')
						
						{
						
						$Qquotationss=$this->db->query("select * from tbl_quotation_hdr where quotation_id_hdr='".$line->all_id."'");
					    $fetchQuotationOne=$Qquotationss->row();
 						
						$QcontactQuotationOne=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchQuotationOne->vendor_id."'");
					    $fetchConnnn=$QcontactQuotationOne->row();
						
						echo $fetchConnnn->first_name;
						
						}
						
					  if($line->status=='Communication')
						{
						
						$QCommunicationss=$this->db->query("select * from tbl_communication where communication_id='".$line->all_id."'");
					    $fetchCommunicationss=$QCommunicationss->row();
 						
						$QcontactCommOne=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchCommunicationss->contact_id."'");
					    $fetchComm=$QcontactCommOne->row();
						
						echo $fetchComm->first_name;
						
						}
						
						if($line->status=='letterhead')
						{
						
						$QLetterss=$this->db->query("select * from tbl_letter_head where id='".$line->all_id."'");
					    $fetchlettss=$QLetterss->row();
 						
						$QcontactlettOne=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchlettss->contact_id."'");
					    $fetchLetter=$QcontactlettOne->row();
						
						echo $fetchLetter->first_name;
						
						}
						
						
						?>
	 </td>  
<!--==========================================-->	 
	           
	<td style="text-align:center;"><?php echo $line->case_id;?></td>
	<td style="text-align:center;"><?php 
	
		$qnewcase=$this->db->query("select * from tbl_new_case where case_id='".$line->case_id."'");
					  $fetchnewcase=$qnewcase->row(); 

					   echo $fetchnewcase->currency_name;
	
	?></td>
	<td style="text-align:center;"><?php echo $line->ref_no;?></td>
	<td style="text-align:center;"><?php if($line->status=='SaleOrdernew'){ echo "	Sales Order";  }else{ echo $line->status; } ?></td>
	 <td>
	    <?php
					   if($line->status=='Purchaseorder')
   {
   ?>

<a target="_blank" href="<?=base_url();?>purchaseorder/PurchaseOrder/viewPurchaseOrder?id=<?php echo $line->all_id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<?php } ?>

<?php
					   if($line->status=='Invoice')
   {
	
	$qtyss=$this->db->query("select * from tbl_new_invoice where invoice_id='$line->all_id'");
	$fetchq=$qtyss->row();
   if($fetchq->invoice_image!=''){
   ?>

<a target="_blank" href="<?=base_url()?>assets/invoice_image/<?php echo $fetchq->invoice_image; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<?php } } ?>
 <?php
					   if($line->status=='SaleOrdernew')
   {
   
   $qtysssd=$this->db->query("select * from tbl_sales_ordernew_hdr where purchase_order_id='$line->all_id'");
	$fetchqas=$qtysssd->row();
   ?>
  <?php if($fetchqas->upload_image!=''){ ?>
<a target="_blank" href="<?=base_url()?>assets/image_data/<?php echo $fetchqas->upload_image; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<?php } ?>
<?php }?>
<?php
if($line->status=='Quotation')
						
						{
?>
 <a target="_blank" href="<?=base_url();?>Quotation/viewQuotation?id=<?php echo $line->all_id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<?php }?>
<?php
if($line->status=='Communication')
						{
	?>
	 <a target="_blank" href="<?=base_url();?>master/CreateCommunication/view_letter_head?id=<?php echo $line->all_id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
	
	<?php					
						
						
						}
						if($line->status=='letterhead')
						{
						?>
						 <a target="_blank" href="<?=base_url();?>master/Letterhead/view_letter_head?id=<?php echo $line->all_id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
						
						<?php
						
						}
						
						?>



<?php
if($line->status=='Quotation')
						
						{
?>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>Quotation/updateQuotation',1400,600,'id',<?php echo $line->all_id; ?>)" />

<?php }?>


<?php
if($line->status=='Invoice')
						
						{
?>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?php echo base_url();?>Invoice/Invoice/addInvoice',1000,600,'id',<?php echo $line->all_id; ?>)" />
<?php }?>
<?php
if($line->status=='Purchaseorder')
   {
   ?>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>purchaseorder/PurchaseOrder/updatePurchaseOrder',1400,600,'id',<?php echo $line->all_id; ?>)" />

<?php }?>

<?php
if($line->status=='SaleOrdernew')
   {
   ?>

<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>salesordernew/SalesOrderNew/updatePurchaseOrder',1400,600,'id',<?php echo $line->all_id; ?>)" />
<?php }?>

<?php
if($line->status=='Communication')
						{
	?>

<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>master/CreateCommunication/add_letterhead',1400,600,'id',<?php echo $line->all_id; ?>)" />


<?php }?>
<?php
if($line->status=='letterhead')
{
?>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>master/Letterhead/add_letterhead',1400,600,'id',<?php echo $line->all_id; ?>)" />

<?php }?>
	 </td>	
    </tr>

	
						
					
                       <div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1200px;height:200px;; margin-left:-297px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">View</h4>
      </div>
      <div class="modal-body">
	  <div  class="border row">
      <div class="border col-lg-3">
	  <strong>Date</strong>
	  </div>
	  <div class="border col-lg-3">
	  <strong>Product Name</strong>
	  </div>
	  <div class="border col-lg-3">
	  <strong>Qty</strong>
	  </div>
	  <div class="border col-lg-3">
	 <strong>List Price</strong>
	  </div>
	  
	  
	  
	  </div>
	  	
	  
	  <?php
						$queryProduct=$this->db->query("select *from tbl_sales_ordernew_dtl where purchase_order_hdr_id='$line->purchase_order_id'");
						
						foreach($queryProduct->result() as $getProduct){
						$productName=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->product_id'");
						$getProductName=$productName->row();
						?>
      <div class="row">
	  <div class="col-lg-3">
	  <?=$line->maker_date;?>
	  </div>
	  <div class="col-lg-3">
	  <?=$getProductName->productname;?>
	  </div>
	  <div class="col-lg-3">
	  <?=$getProduct->quantity;?>
	  </div>
	  <div class="col-lg-3">
	   <?=$getProduct->list_price;?>
	  </div>
	  </div>
<?php }?>	  
	  </div>

	  
     
    </div>
  </div>
</div>

	</div>
</div>
						<?php 
						
						$i++;
						}?>
						
	     <input type = "hidden" value ="<?php  echo $tt;?>" id = "tol" />
		 <script>
		 var total = document.getElementById('tol').value;
		 
		 document.getElementById('tol1').value = total;
		 </script>   

</table>
<script>

function purchaseignores(v){
			//alert(v);
		location.href = "<?=base_url();?>purchaseorder/PurchaseOrder/purchaseeignoress?id="+v;
}

function salesignores(v){

		location.href = "<?=base_url();?>salesordernew/SalesOrderNew/saleorderignoress?id="+v;
}

function purchasedismiss(v){

	location.href = "<?=base_url();?>purchaseorder/PurchaseOrder/purchaseedismiss?id="+v;
}

function saledismiss(v){

	location.href = "<?=base_url();?>salesordernew/SalesOrderNew/saleorderdismiss?id="+v;
}
</script>

<!--bordered close-->

<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</form>
<?php $this->load->view('softwarefooter'); ?>