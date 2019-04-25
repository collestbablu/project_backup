<?php  $con; 
	 $today=date("Y/m/d");
				$amt="";
$qty=$this->db->query("select * from tbl_new_invoice where contact_id='$con'");
	foreach($qty->result() as $fetchlist)
		{
		
				 $amt +=$fetchlist->amount_due;
		
		}
//echo $amt;
?>
<table class="bordered">
 <tr>
 <td class="text-r">Amount</td>
 <td>
 <input type="text" name="amtid" id="amtid"   class="rounded" value="" />
 <input name="checkj_all" type="checkbox" onClick="payamtfun(this.checked)" value="" />Pay full amount(Rs.<?php echo $amt; ?>)
  <input type="hidden" name="" class="rounded" id="payidd" value="<?php echo $amt; ?>" />
 </td>
 
</tr>

<tr>
 <td class="text-r">Payment Date</td>
 <td><input type="date"  name="pay_date"  class="rounded" value="" /></td>
	
</tr>
<tr>
 <td class="text-r">Payment Mode</td>
 <td>
 	<select name="pay_modes">
	<option value="">--select--</option>
<?php
$querypayModel=$this->db->query("select * from tbl_invoice_payment where status='paymentReceived' and contact_id='".$_GET['id']."' and comp_id = '".$this->session->userdata('comp_id')."'");

foreach($querypayModel->result() as $fetchModel)
{
}
?>
	<option value="Cash" <?php if($fetchModel->pay_modes=='Cash'){?> selected="selected" <?php }?>>Cash</option>
	<option value="Cheque" <?php if($fetchModel->pay_modes=='Cheque'){?> selected="selected" <?php }?>>Cheque</option>
	<option value="Debit" <?php if($fetchModel->pay_modes=='Debit'){?> selected="selected" <?php }?>>Debit Card</option>
	<option value="Credit" <?php if($fetchModel->pay_modes=='Credit'){?> selected="selected" <?php }?>>Credit Card</option>
		<option value="Transfer" <?php if($fetchModel->pay_modes=='Transfer'){?> selected="selected" <?php }?>>Transfer</option>
	
</select>
 </td>
	
</tr>
<tr>
 <td class="text-r">Refecence</td>
 <td><input type="text" name="todate"  size="22" class="rounded" value="" /></td>
	
</tr>

</table>
<h3><b>Unpaid Invoices</b></h3>
<table class="bordered" id="dataTables-example1">

    <thead>
    	<th>Date</th>
		<th>Invoice Number</th>
		<th>Invoice Amount</th>
		<th>Amount Due</th>
		<th>Payment</th>
    </thead>
<?php
	$p=0;
	$qty=$this->db->query("select * from tbl_new_invoice where contact_id='$con'");
	foreach($qty->result() as $fetchlist)
		{

?>
	<tr>
		<td><?php echo $fetchlist->n_date; ?></td>
		<td><?php echo $fetchlist->invoice_no; ?></td>
		<td><input type="text" style="border:none" readonly name="invamt[]" value="<?php echo $fetchlist->total_amt; ?>" /></td>
		<td><input type="text" name="amtdue[]" style="border:none" readonly value="<?php echo $fetchlist->amount_due; ?>" /></td>
		<td><input type="text" name="paymentid[]" id="paymm<?php echo $p; ?>"  onChange="GrandTotal()" value="" /></td>
	</tr>
	
<?php $p++; } ?>
<tr>
		<td colspan="4" align="right"><b>Total</b></td>
		<td><input type="text" id="totalamt" value="" /></td>
	</tr>	
</table>
