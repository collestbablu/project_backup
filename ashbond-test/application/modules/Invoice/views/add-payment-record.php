<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_product_stock';
$location='Invoice/manageInvoice';
$this->load->view('softwareheader'); 
$amt=explode("^",$_GET['amt']);


$amtt=$amt[0];
$inv=$amt[1];
$cont=$amt[2];



$slectInvQuery=$this->db->query("select * from tbl_new_invoice where invoice_id='$inv' ");
$getInvTot=$slectInvQuery->row();




$slectQuery=$this->db->query("select SUM(billamount) as Tsum from tbl_invoice_report where invoiceid='$inv' and contact_id='$cont' ");
$getTot=$slectQuery->row();



$slectQuery1=$this->db->query("select * from tbl_invoice_report where invoiceid='$inv' and contact_id='$cont' and type='Invoice'");
$getTot1=$slectQuery1->row();
?>

<h1> Payment for <?=$getInvTot->invoice_no;?></h1>

<form action="insert_payment" method="post" enctype="multipart/form-data">

<input type="hidden"  name="id" value="<?=$_GET['id'];?>" />
<!--title close-->
<input type="hidden" name="inv" value="<?=$inv;?>" />
<input type="hidden" name="cont" value="<?=$cont;?>" />


<div class="container-right-text">

<div class="table-row">

 <table class="bordered">

<thead>
<td></td>
<tr>
			
            <td class="text-r"><star></star>
            Invoice Amount:</td>
			
			<td><input type="text" name="inamount" readonly="readonly"  value="<?=$amtt; ?>" /></td>
             <td class="text-r"><star></star>
            Received  Amount:</td>
		
			<td><input type="text" name="nnamount" readonly="readonly"  value="<?=$getTot->Tsum; ?>" /></td>
			
            <td class="text-r"><star></star>
            Input  Amount:</td>
		
			<td><input type="number" step="any" name="amount" <?php if($getTot->Tsum==$amtt){?> onclick="return confirm('Full paymnet has been received');" readonly="readonly"<?php }?>  value="<?=$getTot1->billamount;?>" /></td>
			
            
			<td class="text-r"><star>*</star>Payment Date:</td>
			<td><input type="date" name="date"   required value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $getTot1->date;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>	
				
<td class="text-r"><star>*</star>Payment Mode:</td>
			<td><select name="pay_modes">
	<option value="">--select--</option>
<?php
$querypayModel=$this->db->query("select * from tbl_invoice_payment where status='paymentReceived' and contact_id='".$_GET['id']."' and comp_id = '".$this->session->userdata('comp_id')."'");

foreach($querypayModel->result() as $fetchModel)
{
}
?>
	<option value="Cash" <?php if($getTot1->pay_modes=='Cash'){?> selected="selected" <?php }?>>Cash</option>
	<option value="Cheque" <?php if($getTot1->pay_modes=='Cheque'){?> selected="selected" <?php }?>>Cheque</option>
	<option value="Debit" <?php if($getTot1->pay_modes=='Debit'){?> selected="selected" <?php }?>>Debit Card</option>
	<option value="Credit" <?php if($getTot1->pay_modes=='Credit'){?> selected="selected" <?php }?>>Credit Card</option>
		<option value="Transfer" <?php if($getTot1->pay_modes=='Transfer'){?> selected="selected" <?php }?>>Transfer</option>
	
</select></td>	

<td class="text-r">Reference</td>
 <td><input type="text" name="ref"  size="22" class="rounded" value="<?=$getTot1->ref;?>" /></td>
		</tr>
		
</table>






<table class="bordered"id="dataTables-example">

    <thead>

    <tr>

       <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>    

        <th>Invoice No.</th>
        <th>Payment Date</th>
		<th>Amount</th>
		<th>Payment Mode</th>
        <th>Ref.</th>
        <th>Action</th>
       
    </tr>

   
    </thead>


<?php

		  $queryy="select * from tbl_invoice_report where invoiceid='$inv' and contact_id='$cont' order by invoice_rid desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->invoice_id; ?>">

   <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->invoice_id; ?>"  value="<?php echo $line->invoice_id?>" /></td>

   

                       <td><?php echo 
					   $line->invoiceid;?></td>

					   <td><?php echo $line->date; ?></td>
					
                         <td><?php echo $line->billamount;?></td>
						    <td><?php echo $line->pay_modes;?></td>
							<td><?php echo $line->ref;?></td>
                            <td><a href="<?=base_url();?>Invoice/addPayment?amt=<?=$_GET['amt'];?> && id=<?=$line->invoice_rid;?> ">Edit</a></td>
                        
    </td></tr>
	<?php } ?>
	

</table>
<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">

<div class="paging-right">

<div class="actions-right">

<?php 

 if(@$_GET['view']!='' ){

 }

 else

 {

if(@$_GET['id']==''){?>

 <td> <input  name="save" <?php if($getTot->Tsum==$amtt){?> onclick="return confirm('Full paymnet has been received');" type="button"  <?php } else {?> type="submit" <?php }?> value="Save" class="submit" /> </td>

 <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

	      <?php }}?>


<?php if(@$_GET['popup'] == 'True') {?>

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

</div><!--paging-right close-->

</div><!--paging-row close-->

</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->

<?php $this->load->view('softwarefooter'); ?>