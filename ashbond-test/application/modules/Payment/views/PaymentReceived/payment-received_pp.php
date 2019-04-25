<?php
$tableName='tbl_new_invoice';
@extract($_POST);
if($save!='')
{

if($_GET['id']!=''){

$contact=$_GET['id'];

$selQuery=$this->db->query("select * from tbl_invoice_payment where contact_id='$contact' and comp_id='".$this->session->userdata('comp_id')."' and status='paymentReceived'");

$fetchselQ=$selQuery->row();

if($fetchselQ->contact_id!='' && $fetchselQ->status=='paymentReceived'){
if($date123==''){
$date123=date('d-m-y');}

$this->db->query("update tbl_invoice_payment set receive_billing_mount=receive_billing_mount+'$rec_amount12',pay_modes='$pay_modes',date='$date123' where contact_id='$contact' and comp_id='".$this->session->userdata('comp_id')."' and status='paymentReceived'");
	
	}else{
	
	if($date123==''){
$date123=date('d-m-y');}
	$sqlinsert="insert into tbl_invoice_payment set contact_id='$customerfname',receive_billing_mount='$rec_amount12',pay_modes='$pay_modes',date='$date123',maker_id='".$this->session->userdata('user_id')."',maker_date=NOW(),comp_id='".$this->session->userdata('comp_id')."', status='paymentReceived'";
$this->db->query($sqlinsert);
	}

echo "<script>window.close()</script>";
	
}else{

	if($date123==''){
$date123=date('d-m-y');}
	$sqlinsert="insert into tbl_invoice_payment set contact_id='$customerfname',receive_billing_mount='$rec_amount12',pay_modes='$pay_modes',date='$date123',maker_id='".$this->session->userdata('user_id')."',maker_date=NOW(),comp_id='".$this->session->userdata('comp_id')."', status='paymentReceived'";
$this->db->query($sqlinsert);
}
//redirect('Payment/PaymentReceived/payment_amount');
}
$this->load->view('softwareheader'); 
?>

<script>

function getXMLHTTP() { //fuction to return the xml http object

var xmlhttp=false;

try{

xmlhttp=new XMLHttpRequest();

}

catch(e) {

try{

xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

}

catch(e){

try{

xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

}

catch(e1){

xmlhttp=false;

}

}

}



return xmlhttp;

}



function getCid(cid) {	

	

		var strURL="get_cid.php?cid="+cid;

		

		var req = getXMLHTTP();

		

		if (req) {

			

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {						

						document.getElementById('ciddiv').innerHTML=req.responseText;						

					} else {

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}

				

	}

</script>

<script>
function grater()
{
var countin=document.getElementById("countin").value;

var y;
for(y=1;y<=countin;y++)
{

var billamount_receive=document.getElementById("billamount_receive"+y).value;
billamount_receive=Number(billamount_receive);
var billamount=document.getElementById("billamount"+y).value;
billamount=Number(billamount);
var remaining=document.getElementById("remaining"+y).value;
remaining=Number(remaining);
var tg=document.getElementById("tg"+y).value;

if(billamount_receive>billamount && remaining=='')
{
alert("Given amount is grater in Invoice No.:- "+tg);
}
else if(remaining!='' && billamount_receive>remaining)
{
alert("Given amount is grater in Invoice No.:- "+tg);
}
}
}
</script>
<script>

function receivealert()
{

var tot_bill_rec=document.getElementById("total_billamt_receive").value;
tot_bill_rec=Number(tot_bill_rec);
var tot_bill_amt=document.getElementById("total_billamt").value;
tot_bill_amt=Number(tot_bill_amt);
var due_amnt=document.getElementById("due_amount").value;
due_amnt=Number(due_amnt);


if(tot_bill_rec>tot_bill_amt && due_amnt=='')
{
alert("given amount is grater");
}
else if(tot_bill_rec>due_amnt && due_amnt!='' )
{
alert("given amount is grater");
}

}

</script>


<h1>Payment Received</h1> 

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
<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Payment Received</b></th>        
</tr>
</thead>
<tr>
<?php if($_GET['id']!=''){ ?>
<td width="19%" class="text-r">
Customer Name :</td>
 <td width="33%">
 <select name="customerfname" id="cf" class="rounded" required >
<option value="">---select---</option>
 <?php
 $contQuery=$this->db->query("select * from tbl_contact_m where comp_id='".$this->session->userdata('comp_id')."' and group_name='4' order by first_name");
 foreach($contQuery->result() as $contRow)
{

  ?>
    <option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$_GET['id']){?> selected="selected" <?php }?>>
    <?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
    <?php } ?>
</select>
 </td>
<?php }else{ ?>
<td width="19%" class="text-r">
Customer Name :</td>
 <td width="33%">
 <select name="customerfname" id="cf" class="rounded" required >
<option value="">---select---</option>
 <?php
 $contQuery=$this->db->query("select * from tbl_contact_m where comp_id='".$this->session->userdata('comp_id')."' and group_name='4' order by first_name");
 foreach($contQuery->result() as $contRow)
{

  ?>
    <option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$customerfname){?> selected="selected" <?php }?>>
    <?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
    <?php } ?>
</select>
 </td>
 <?php } ?>
<td width="19%" class="text-r">
<!--Customer Last Name--></td>
<td width="29%"><!--<input type="text" name="customerlname" value="<?php /*if($_REQUEST['product_code']!=''){echo $_REQUEST['product_code'];}  */?>"/>--></td></tr>        
<tr style="display:none">
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded" value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
	
</tr>
 <tr>
 <td class="text-r">&nbsp;</td>
	<td>&nbsp; 
	</td>
	
	
    <td class="text-r">&nbsp;</td>
	<?php if($_GET['id']!=''){ ?>
	<td><input type="button" name="Search" value="Search" class="submit" /> </td>
	<?php }else{ ?>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
	<?php } ?>
</tr>
</table>
<!--<a href="print-product-stockreport.php<?php //echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export-csv-product-stock-report.php<?php //echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">-->
<table class="bordered"id="dataTables-example1" style="display:none">

    <thead>
    <tr>
	<th width="13%">Date</th>
   <th width="13%">Invoice no.</th>
<th width="24%">Bill Amount</th>
<th width="28%" style="display:none">Advance Received Amount</th>
<th>Remaining Amount</th>
<th width="28%">Status </th>
<th width="7%"></th> 
    </tr>
    </thead>
	<?php
	@extract($_POST);
	if($Search!='' || $_GET['id']!='')
	{
			if($_GET['id']!=''){
					$customerfname=$_GET['id'];
			}
        	
		 $queryy="select * from $tableName where contact_id='$customerfname' and comp_id = '".$this->session->userdata('comp_id')."'";
		
		
	
	$result=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	$total_billamt=0;
	$z=1;
	
	$countin=@mysql_num_rows($result);
	foreach(@$result->result() as $line)
	{
	$i++;
   
   @extract($line);
   
   ?>
   <tr>
   <?php  $selectramt="select * from tbl_invoice_report where invoiceid='$invoiceid'";
	      $resultramt=$this->db->query($selectramt);
		  $rowramt=$resultramt->row();
	?>
	<td><?php echo  $line->maker_date; ?> <input type="text" name="company_name[]" value="<?php echo $company_name;?>" style="display:none" /> </td>
   	<td><input type="text" name="tg" id="tg<?php echo $z;?>" value="<?php echo $invoiceid; ?>" readonly /></td>
	<td><input type="hidden" name="billamount[]" id="billamount<?php echo $z;?>" value="<?php echo $balance_total;?>" readonly />
	<input type="text" name="ttyu" id="billamount<?php echo $z;?>" value="<?php echo number_format((float)$netprice, 2, '.', '');;?>" readonly />
	</td>
	<td style="display:none"><input type="text" name="advance_receive_amt[]" value="<?php echo $advance_total;?>" readonly /></td>
	
	<td><input type="text" name="remaining[]" id="remaining<?php echo $z;?>" value="<?php echo $rowramt->remaining_amt; ?>" readonly /></td>
	<td>
	<?php if($rowramt->invoiceid!=''){if($rowramt->remaining_amt==0){?>
	<input type="text"  name="billamount_receive[]" id="billamount_receive<?php echo $z;?>"   value="Invoice Done" readonly size="10" />
	<?php }}
	if($rowramt->invoiceid!='' || $rowramt->invoiceid=='' ){if($rowramt->remaining_amt>0 || $rowramt->remaining_amt=='' ){
	?>
	<input type="number" step="any" name="billamount_receive[]" id="billamount_receive<?php echo $z;?>" onchange="grater()"    size="10" readonly />
	<?php }}?>
	</td>
	<td><input type="textbox" name="checkbox1[]" checked="checked" style="display:none;" value="<?php echo $invoiceid;?>"  /></td>
	<?php //$total_billamt+=$balance_total;?>
	
	</tr>

	<?php $z++;  }}   ?>
      
<input type="text" id="countin" style="display:none;" value="<?php echo $countin;?>" />
</table>
<table class="bordered">
<?php 
$due_amount=0;
$selectin1="select * from tbl_invoice_report where contact_id='$customerfname'";
$resultin1=$this->db->query($selectin1);
foreach($resultin1->result() as $rowin1){
$due_amount=$due_amount+$rowin1->remaining_amt;
$due_amount12=$due_amount12+$rowin1->billamount;
}

?>
<?php 
if($customerfname!='')
{

$total_bill=0;
 $queryy1="select * from tbl_invoice_payment where status='invoice' and contact_id='$customerfname' and comp_id = '".$this->session->userdata('comp_id')."'";
$result1=$this->db->query($queryy1);
foreach($result1->result() as $line1){
$total_bill=$total_bill+$line1->receive_billing_mount;
}


$queryy123="select * from tbl_invoice_payment where status='paymentReceived' and contact_id='$customerfname' and comp_id = '".$this->session->userdata('comp_id')."'";
$result123=$this->db->query($queryy123);
foreach(@$result123->result() as $line123){
$receive_bill_amount=$receive_bill_amount+$line123->receive_billing_mount;
}

}

 $total_billdue=$total_bill-$receive_bill_amount;
//$totaldue_amount=$total_billdue+$due_amount;

?>
<tr>
<td width="20%" class="text-r">Total Billing Amount : </td>
<td width="30%"><input type="text" id="total_billamt" name="total_billamt" size="10" value="<?php echo $total_bill; ?>" readonly /></td>
<td class="text-r">Enter Amount : </td><td><input type="hidden" id="total_billamt_receive" name="total_billamt_receive" value="<?php if($total_billamt!=''){ echo $rowin1->total_billamt_receive;} ?>" onchange="receivealert()" size="10" />
<input type="number" step="any" id="rec12" name="rec_amount12" onkeyup="rmnamnt();" size="10" value=""  />
<input type="hidden" step="any" id="bal12" name="bal12" size="10" />
</td>
</tr> 
<tr>

 <?php 
 //echo $contactid;
         $selectramt="select * from tbl_contact_m where contact_id='$contactid'";
	      $resultramt=$this->db->query($selectramt);
		  $rowramt=$resultramt->row();
	?>
	
<td width="23%"  class="text-r">
	<?php if($customerfname!=''){ ?>
 <a href="#" onclick="openpopup('invoicereport',900,630,'id','<?php echo $customerfname;?>')" >Paid Amount</a>
	<?php }else{ ?>
	Paid Amount
	<?php } ?>
</td>
<td width="27%"><input type="text" id="rec" name="rec_amount" size="10" value="<?php if($receive_bill_amount!=''){ echo $receive_bill_amount;} ?>" readonly /></td>
<td class="text-r">Date</td>
<td><input type="date" name="date123" value="<?php  ?>" /></td>
</tr> 
<tr>
<td width="23%"  class="text-r">Due Amount :</td>
<td width="27%"><input type="text" id="due_amount" name="due_amount" size="10" value="<?php if($total_billdue!=''){ echo $total_billdue;} ?>" readonly /></td>
<td class="text-r">Modes :</td>
<td><select name="pay_modes">
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
	
</select></td>
<input type="hidden" name="date12">
</tr> 
<script>function rmnamnt(){
var rec12=document.getElementById("rec12").value;
var due_amount=document.getElementById("due_amount").value;
document.getElementById("bal12").value="0.00";
rec12=Number(rec12);
due_amount=Number(due_amount);
if(rec12>due_amount){
document.getElementById("total_billamt_receive").value=due_amount;
document.getElementById("bal12").value=rec12-due_amount;
}else{document.getElementById("total_billamt_receive").value=rec12;}
} </script>
<tr>
<td class="text-r">&nbsp; </td><td><input type="submit" name="save" id="save" class="submit" value="Save" /></td><td>&nbsp;</td><td>&nbsp;</td>
</tr> 
</table>
</form>
<!--bordered close-->

<div class="clear"></div>

</div><!--table-row close-->



</div><!--div close-->

</div><!--container close-->
<?php $this->load->view('softwarefooter'); ?>