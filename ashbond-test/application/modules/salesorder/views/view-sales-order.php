<?php
extract($_POST);
$invoiceID=$_REQUEST['id'];
$invoiceID=$_GET['id'];
if($invoiceID!="")
{
$invice12=$this->db->query("select * from tbl_sales_order_hdr where salesid='".$_GET['id']."'");
$inviceres=$invice12->row();

$fetchrecord=$this->db->query("select * from tbl_contact_m where contact_id='".$inviceres->vendor_id."'");
$fetchrecords=$fetchrecord->row();
 
$fetchcomp=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchrecords->company_id."'");
$fetchcompany=$fetchcomp->row(); 
  
$fetchaddress=$this->db->query("select * from tbl_address_m where entityid='".$inviceres->vendor_id."'");
$fetchaddresss=$fetchaddress->row();


function tax($tax_retail){
if($tax_retail=='retail_invoice') {  $tax="Retail Invoice";  }
if($tax_retail=='tax_invoice') {  $tax="Tax Invoice";  }
if($tax_retail=='normal_invoice') {  $tax="Normal Invoice";  }
if($tax_retail=='performa_invoice') {  $tax="Performa Invoice";  }
if($tax_retail=='delivery_invoice') {  $tax="Delivery Invoice";  }
if($tax_retail=='sale_invoice') {  $tax="Sale Invoice";  }
return $tax;
}


function getSingleResult($sql){
 	$ci =& get_instance();
	$class = $ci->db->query($sql);
    $class = $class->result_array();
    $ac =$class->keyvalue;
	return $ac;
}



function words_repues($num)
{ 
  $numberF=$num;
   $action34=explode(".",$numberF);
$balance10=$action34[0];
   $balance11=$action34[1];
   $no = $balance10;
   $point = $balance11;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    " " . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
   strtoupper($result . "Rupees " . $points . " Paise");
      $grandexplode=number_format((float)$num, 2, '.', '');
 	  $action23=explode(".",$grandexplode);
	  $groundA=$action23[0];
	  $groundV=$action23[1];	
	if($groundV >=1 ){
	$goundStr=strtoupper($result . "Rupees and" . $points . " Paise");
			
	}else{
		  $goundStr=strtoupper($result . "Rupees");
	}	
	 return $goundStr;
	}


}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>AshBond Invoice</title>
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/css/invoice-gst-style.css' />
</head>

<body>

<div id="page-wrap">
<div id="customer">
<table id="meta">
<tr>
<td width="62%" rowspan="3"><h1 style="text-align: center;">TAX INVOICE</h1></td>
<td width="14%">&nbsp;</td>
<td width="24%"><strong>Original for Receipent</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><strong>Duplicate for supplier/Transporter</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><strong>Triplicate for Supplier</strong></td>
</tr>

<tr>
<td colspan="3"><img src="<?php echo base_url();?>assets/invoice-gst-images/logo.png" width="552" height="95" alt="" /></td>
</tr>

<tr>
<td>P.O. NO. & Date :1 & 17/08/17</td>
<td>Tax invoice no. :<?=$inviceres->salesid?></td>
<td>Invoice Dt.:
<?php $date_in=explode("-",$inviceres->author_date); 
  $monthNum  = $date_in[1];
  $dateObj   = DateTime::createFromFormat('!m', $monthNum);
  $monthName = $dateObj->format('F');	  echo $date_in[2].'-'.$monthName.'-'.$date_in[0]; ?>
</td>
</tr>
<tr>
<td>Details of Receiver/ Billed To:</td>
<td colspan="2">Details of Consignee/ Shipped To:</td>
</tr>
<tr>
<td style="height:100px;"><?php echo $fetchrecords->address1; ?></td>
<td colspan="2"><?php echo $fetchrecords->address3; ?></td>
</tr>
<tr>
<td>State Code :<?php echo $fetchrecords->state_id; ?></td>
<td colspan="2">State Code :<?php echo $fetchrecords->state_id; ?></td>
</tr>
<tr>
<td>GSTIN : 07AAACA6708JIZQ</td>
<td colspan="2">GSTIN :<?php echo $fetchrecords->cst; ?></td>
</tr>
</table>
		
</div>
		
<table id="items">

<tr>
<th>Sl.No</th>
<th>Description of Goods or / and Services</th>
<th>HSN/SAC Code</th>
<th>Qty</th>
<th>CGST@</th>
<th>SGST@</th>
<th>IGST@</th>
<th>Unit Rate (In Rs.)</th>
<th>Total Value (In Rs.)</th>
</tr>

<?php
extract($_POST);
$n=1;
$inviceQ=$this->db->query("select * from tbl_sales_order_dtl where salesid='$invoiceID'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id'");

$pfetch=$productQ->row();
@extract($invoiceFetch);

//this query for geting usage unit form tbl_master_data

$productQ1=$this->db->query("select *from tbl_master_data where serial_number ='$invoiceFetch->unit'");

$pfetch1=$productQ1->row();


?>

<tr>
<td><?=$n;?></td>
<td><?=$pfetch->productname;?></td>
<td><?=$pfetch->hsn_code;?></td>
<td><?=$invoiceFetch->quantity;?></td>
<td>
<?php
if($invoiceFetch->cgst!=''){
	echo $invoiceFetch->cgst;
	
}
?>
</td>
<td>
<?php
if($invoiceFetch->sgst!=''){
	echo $invoiceFetch->sgst;
	
}
?>
</td>
<td>
<?php
if($invoiceFetch->igst!=''){
	echo $invoiceFetch->igst;
	
}
?>
</td>
<td><?php echo number_format( $invoiceFetch->list_price,2, '.', '');  ?></td>
<td><?php echo number_format( $invoiceFetch->net_price,2, '.', '');  ?></td>
</tr>
<?php $n++; }?>

<tr>
<td colspan="7"> </td>
<td class="total-value"><strong>Total</strong></td>
<td><?php echo  @number_format((float)$inviceres->grand_total, 0, '.', ''); ?></td>
</tr>
<tr>
<td colspan="7" class="blank"> <strong>Less :</strong></td>
<td class="total-value"><strong>Discount</strong></td>
<td><?php echo  @number_format((float)$inviceres->discount_amount_total, 0, '.', ''); ?></td>
</tr>


<tr>
<td colspan="8" style="text-align:right;"><strong>TOTAL TAXBLE VALUE FOR GOODS & SERVICES</strong></td>
<td><strong>TRUE</strong></td>
</tr>
<?php
	if($inviceres->sgst_per_total!='' or $inviceres->sgst_per_total_two!=''){
?>
<tr>
<td colspan="7" class="total-line" style="text-align:right;">SGST @</td>
<td class="total-value">
<?php
if($inviceres->sgst_per_total!=''){
	echo 18;
}else if($inviceres->sgst_per_total_two!=''){
	echo 28;
}?>
% Total</td>
<td>
<?php 
if($inviceres->sgst_per_total!=''){
	echo $inviceres->sgst_per_total;
}else if($inviceres->sgst_per_total_two!=''){
	echo $inviceres->sgst_per_total_two;
}else{
}
?>
</td>
</tr>
<?php } ?>
<?php
	if($inviceres->cgst_per_total!='' or $inviceres->cgst_per_total_two!=''){
?>
<tr>
<td colspan="7" class="total-line" style="text-align:right;"> CGST @</td>
<td class="total-value">
<?php 
if($inviceres->cgst_per_total!=''){
	echo 18;
}else if($inviceres->cgst_per_total_two!=''){
	echo 28;
}
?>
% Total</td>
<td>
<?php 
if($inviceres->cgst_per_total!=''){
	echo $inviceres->cgst_per_total;
}else if($inviceres->cgst_per_total_two!=''){
	echo $inviceres->cgst_per_total_two;
}else{
}
?>
</td>
</tr>
<?php } ?>
<?php
	if($inviceres->igst_per_total!='' or $inviceres->igst_per_total_two!=''){
?>
<tr>
<td colspan="7" class="total-line" style="text-align:right;"> IGST @</td>
<td class="total-value">
<?php 
if($inviceres->igst_per_total!=''){
	echo 18;
}else if($inviceres->igst_per_total_two!=''){
	echo 28;
}
?>
% Total</td>
<td>
<?php 
if($inviceres->igst_per_total!=''){
	echo $inviceres->igst_per_total;
}else if($inviceres->igst_per_total_two!=''){
	echo $inviceres->igst_per_total_two;
}else{
}
?>
</td>
</tr>
<?php } ?>
<tr>
<td colspan="8" style="text-align:right;"> <strong>Round Off Value</strong></td>
<td><?php echo  @number_format((float)$inviceres->gst_total_two, 0, '.', ''); ?></td>
</tr>
<tr>
<td colspan="8" style="text-align:right;"> <strong>Total Amount After GST</strong></td>
<td><?php echo  @number_format((float)$inviceres->grand_total, 0, '.', ''); ?></td>
</tr>
<tr>
<td colspan="8" style="text-align:right;"> <strong>Tax Is Payable On Reverse Charge</strong></td>
<td><strong>No</strong></td>
</tr>
<tr>
<td colspan="9"> <strong>Rupees</strong></td>
</tr>


<tr>
<td colspan="5" rowspan="6" valign="top">
Certied that the particulars given abovn are true and correct 
<br /><br /><br /><br />



<h3>For Ashbond Engineers Pvt. Ltd.</h3>
<br /><br /><br /><br /><br /><br /><br />



<h3>Authorised Signatory</h3> 
</td>
<td colspan="4" style="text-align:center;"><strong>Bank Details:</strong></td>
</tr>
<tr>
<td colspan="2" class="total-line">Account Name : </td>
<td colspan="2" class="total-value">Ashbond Engineers Pvt. Ltd</td>
</tr>
<tr>
<td colspan="2" class="total-line">Bank Name : </td>
<td colspan="2" class="total-value">State Bank Of India</td>
</tr>
<tr>
<td colspan="2" class="total-line">Account No : </td>
<td colspan="2" class="total-value">54006819546</td>
</tr>
<tr>
<td colspan="2" class="total-line">Bank's Branch IFSC : </td>
<td colspan="2" class="total-value">SBIN0040506</td>
</tr>
<tr>
<td colspan="4" class="total-line" style="text-align:left;">
  <?=$inviceres->termandcondition;?>
</td>
</tr>

</table>
</div>
</body>
</html>