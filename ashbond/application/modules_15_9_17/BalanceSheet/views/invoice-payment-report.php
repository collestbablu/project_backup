<?php 
$tableName="tbl_invoice_payment";	

$this->load->view('softwareheader'); 
?>

<?php 
//$contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='".$_GET['id']."'");
//$contactFetch=$contactQuery->row();

?>
<?php //echo $contactFetch->first_name." ".$contactFetch->middle_name." ".$contactFetch->last_name; ?>  
<h1>Balance Sheet</h1>
<div class="actions">

<div class="blogroll">

	</div>

</div><!--actions close-->

<div class="search-row-to">

</div><!--search-row-to close-->

<div class="clear"></div>

</div><!--title close-->

<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<form method="post">

<!--<a href="print-product-stockreport.php<?php //echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export-csv-product-stock-report.php<?php //echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">-->
<table class="bordered" id="dataTables-example1">

    <thead>
	<tr>
		<td width="19%" class="text-r">Customer Name :</td>
	 <td width="33%">
	 <select name="customerfname" class="rounded">
	 <option value="">---select---</option>
	 <?php
	 $contQuery=$this->db->query("select * from tbl_contact_m where comp_id='".$this->session->userdata('comp_id')."' and group_name='8' order by first_name");
	 foreach($contQuery->result() as $contRow)
	{

	  ?>
		<option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$customerfname){?> selected="selected" <?php }?>>
		<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
		<?php } ?>
	</select>
	 </td>
		<td width="19%" class="text-r"><td>
		<td></td>
 </tr>
 <tr>
 <td class="text-r">&nbsp;</td>
	<td>&nbsp; 
	</td>
	
	
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
	<td></td>
</tr>
    <tr>
	<th width="13%">Date</th>
   
<th width="24%">Debit Amount</th>

<th>Credit Amount</th>

<th width="28%">Closing Balance  </th>
<th>Remarks</th>
    </tr>
    </thead>
	<?php
	@extract($_POST);
	if($Search!='')
	{
			
		$queryy="select * from tbl_invoice_payment where contact_id='$customerfname'";

		
	}
	if($Search==''){
		$queryy="select * from tbl_invoice_payment";
	}
	
	@$result=$this->db->query($queryy);
	
	$i=$start;
	$j=1;
	$total_billamt=0;
	$z=1;
	
	
	foreach($result->result() as $line) {    //while(@$line=mysql_fetch_array($result)){
	$i++;   
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }
   @extract($line);
   
 if($line->status=='invoice'){
    $c+=$line->receive_billing_mount; 
 
}
 $dd=$line->date;
   ?>
   <tr>
  
	<td><?php echo $dd; ?></td>
   
	<td><?php if($line->status=='invoice'){?><input type="text" name="billamount[]" id="billamount<?php echo $z;?>" value="<?php echo $line->receive_billing_mount;?>" readonly /><?php } else{?><input type="text" name="billamount[]" id="billamount<?php echo $z;?>" value="0" readonly /><?php }?></td>
	</td>

	<td><?php if($line->status=='payment'){?>
	    <input type="text" name="billamount[]2" id="billamount[]" value="<?php echo $line->receive_billing_mount;?>" readonly />
	   </td>
	<?php } else{?><input type="text" name="billamount[]" id="billamount <?php echo $z;?>" value="0" readonly /><?php }?>
	
	
	<td><?php if($line->status=='payment'){?><input type="text" name="billamount[]" id="billamount<?php echo $z;?>" value="<?php echo $c-=$line->receive_billing_mount;?>" readonly /><?php }else {?><input type="text" name="billamount[]" id="billamount<?php echo $z;?>" value="<?php echo $c;?>" readonly /><?php } ?>	</td>
	<td>
	<p style="color:#FF0000;"><?php echo $line->remarks?></p>
	</td>
	</tr>
 
	<?php
	$debit_total=$debit_total+$balance_total;
	$credit_totals=$credit_totals+$rem_amt12;
	$closing_bal=$closing_bal+$rem_amt;
	 $z++;   
	 }
	 
	 
	?>
	
<input type="text" id="countin" style="display:none;" value="<?php echo $countin;?>" />
</table>
<table class="bordered" style="display:none">
<tr>
<td width="10%"></td>
<td  width="15%"></td>
<td width="25%"><input type="text" name="debit_totals" value="<?php echo $debit_total;?>" style="width:140px" /></td>
<td width="15%"><input type="text" name="credit_totals" value="<?php echo $idcount1;?>" style="width:140px" /></td>
<td></td>
<td></td>
</tr>
<tr>
<td width="10%"></td>
<td  width="15%"></td>
<td width="25%"><font size="+1">Closing Balance</font></td>
<td width="15%"><?php echo $idcount1;?></td>
<td></td>
<td></td>
</tr>
<tr>
<td width="10%"></td>
<td  width="15%"></td>
<td width="25%"><font size="+1"><?php echo $debit_total;?></font></td>
<td width="25%"><font size="+1"><?php echo $debit_total;?></font></td>
<td></td>
<td></td>
</tr>
</table>
</form>
<!--bordered close-->

<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
<?php $this->load->view('softwarefooter'); ?>