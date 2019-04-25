<?php
$id=$_GET['id'];
if($id!="")
{
$invice12=$this->db->query("select * from tbl_invoice_hdr where invoiceid='$id'");
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

<title>Invoice</title>

<link rel='stylesheet' type='text/css' href='<?=base_url();?>assets/inv_css/css/style.css' />
<link rel='stylesheet' type='text/css' href='<?=base_url();?>assets/inv_css/css/print.css' media="print" />
<script type='text/javascript' src='<?=base_url();?>assets/inv_css/js/jquery-1.3.2.min.js'></script>
<script type='text/javascript' src='<?=base_url();?>assets/inv_css/js/example.js'></script>
</head>

<body>

<div id="page-wrap">









<table id="items">
<tbody><tr>
<td colspan="2" class="blank" align="center">
<img src="<?=base_url();?>assets/inv_css/images/2805747.png" alt=""></td>
<td colspan="14" align="center" class="blank">
 <h1>Karamchari Laghu Udyog</h1> 
 <h2>Manufacturer of high quality melamine</h2> 
  <h3>Plot No.3, Thakur Complex, Mujessar (Opp. Escort Crane Shart Div.) <br>Sector-24, Faridabad
   GSTIN No. 06ARFPS0542R1ZB  </h3></td>
</tr>


<tr>
  <td colspan="16" class="blank">  </td>
</tr>



<tr class="tr-t">
<td colspan="12" rowspan="3" class="td-r"><h2>INVOICE</h2></td>
<td colspan="4"><strong>Original for Receipient</strong></td>
</tr>
<tr class="tr-t">
<td colspan="4"><strong>Duplicate for Supplier/Transporter</strong></td>
</tr>
<tr class="tr-t">
<td colspan="4"><strong>Triplicate for Supplier</strong></td>
</tr>



<tr class="tr-t">
  <td colspan="2"><strong>Reverse Charge: </strong></td>
  <td colspan="3">Yes/No</td>
  <td colspan="2">&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="3" class="td-l"><strong>Transportation:</strong></td>
  <td colspan="2"><?=$inviceres->Transportation;?></td>
  <td colspan="3">&nbsp;</td>
</tr>

<tr>
<td colspan="2"><strong>Invoice No. :</strong></td>
<td colspan="3"><?=$id;?></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" class="td-l"><strong>Vehicle Number :</strong></td>
<td colspan="2"><?=$inviceres->Vehicle_Number;?></td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td colspan="2"><strong>Invoice Date:</strong></td>
<td colspan="3"><?php $date_in=explode("-",$inviceres->maker_date); 
  $monthNum  = $date_in[1];
  $dateObj   = DateTime::createFromFormat('!m', $monthNum);
  $monthName = $dateObj->format('F');	  echo $date_in[2].'-'.$monthName.'-'.$date_in[0]; ?></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" class="td-l"><strong>Date of Supply :</strong></td>
<td colspan="2"><?=$inviceres->Date_of_Supply;?></td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td colspan="2"><strong>State:</strong></td>
<td colspan="3">HARYANA</td>
<td colspan="2" class="td-rl tr-t"><strong>State Code:</strong></td>
<td class="td-rl tr-t">06</td>
<td colspan="3"><strong>Place of Supply :</strong></td>
<td colspan="2"><?=$inviceres->Place_of_Supply;?></td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td colspan="16" class="tr-t tr-b">&nbsp;</td>
</tr>

<tr id="bg" class="tr-b">
<td colspan="8"><strong>Details of Receiver</strong></td>
<td colspan="8"><strong>Details of Consignee Shipped to</strong></td>
</tr>

<tr>
<td class="td-r"><strong>Name:</strong></td>
<td colspan="7"><?php echo $fetchrecords->first_name." ".$fetchrecords->middle_name." ".$fetchrecords->last_name;?></td>
<td class="td-rl"><strong>Name:</strong></td>
<td colspan="7"><?php echo $fetchrecords->first_name." ".$fetchrecords->middle_name." ".$fetchrecords->last_name;?></td>
</tr>

<tr>
<td class="td-r"><strong>Address:</strong></td>
<td colspan="7"><?php  
  $newout= array();
echo  $outtext=  $fetchrecords->address1;
echo "<br/>";
	//echo  $outtext1=  $fetchaddresss->address3;
?></td>

<td class="td-rl"><strong>Address:</strong></td>
<td colspan="7">
<?php  
  $newout= array();
echo  $outtext=  $fetchrecords->address1;
echo "<br/>";
	//echo  $outtext1=  $fetchaddresss->address3;
?></td>
</tr>

<tr>
<td class="td-r"><strong>GSTIN:</strong></td>
<td colspan="7"><?php echo $fetchrecords->gst;?></td>
<td class="td-rl"><strong>GSTIN:</strong></td>
<td colspan="7"><?php echo $fetchrecords->gst;?></td>
</tr>
<?php

$stateQuery=$this->db->query("select *from tbl_state_m where stateid='$fetchrecords->state_id' ");
$getState=$stateQuery->row();
?>
<tr>
<td class="td-r"><strong>State:</strong></td>
<td colspan="3"><?=$getState->stateName;?></td>
<td colspan="3" class="td-rl tr-t">State Code:</td>
<td class="td-rl tr-t"><?php echo $fetchrecords->state_id;?></td>
<td class="td-rl"><strong>State:</strong></td>
<td colspan="3"><?=$getState->stateName;?></td>
<td colspan="3" class="td-rl tr-t">State Code:</td>
<td class="tr-t"><?php echo $fetchrecords->state_id;?></td>
</tr>

<tr id="bg" class="tr-t tr-b">
<td rowspan="2" class="td-rl"><strong>Sr.No.</strong></td>
<td rowspan="2" class="td-rl"><strong>Name of Product/Service</strong></td>
<td rowspan="2" class="td-rl"><strong>HSN/ACS</strong></td>
<td rowspan="2" class="td-rl"><strong>UOM</strong></td>
<td rowspan="2" class="td-rl"><strong>Qty</strong></td>
<td rowspan="2" class="td-rl"><strong>Rate</strong></td>
<td rowspan="2" class="td-rl"><strong>Amount</strong></td>
<td rowspan="2" class="td-rl"><strong>Less:Discount</strong></td>
<td rowspan="2" class="td-rl"><strong>Taxable Value</strong></td>
<td colspan="2" class="td-rl" align="center"><strong>CGST</strong></td>
<td colspan="2" class="td-rl" align="center"><strong>SGST</strong></td>
<td colspan="2" class="td-rl" align="center"><strong>IGST</strong></td>
<td rowspan="2" class="td-rl" ><strong>Total</strong></td>
</tr>

<tr>
<td id="bg" class="tr-b"><strong>Rate</strong></td>
<td id="bg" class="tr-b"><strong>Amount</strong></td>
<td id="bg" class="tr-b"><strong>Rate</strong></td>
<td id="bg" class="tr-b"><strong>Amount</strong></td>
<td id="bg" class="tr-b"><strong>Rate</strong></td>
<td id="bg" class="tr-b"><strong>Amount</strong></td>
</tr>
 <?php
extract($_POST);
$n=1;
$inviceQ=$this->db->query("select * from tbl_invoice_dtl where invoiceid='$id'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->productid'");

$pfetch=$productQ->row();
@extract($invoiceFetch);

//this query for geting usage unit form tbl_master_data

$productQ1=$this->db->query("select *from tbl_master_data where serial_number ='$pfetch->usageunit'");

$pfetch1=$productQ1->row();


?>
<tr class="th-border">
<td class="td-rl"><?=$n;?></td>
<td class="td-rl"><?php
echo $pfetch->productname;
?></td>
<td class="td-rl"><?php
echo $pfetch->hsn_code;
?></td>
<td class="td-rl"><?=$pfetch1->keyvalue;?></td>
<td class="td-rl"><?php echo  $invoiceFetch->qty;?></td>
<td class="td-rl"><?php echo  $invoiceFetch->list_price;?></td>
<td class="td-rl"><?php echo number_format( $invoiceFetch->list_price*$invoiceFetch->qty,2, '.', '');  ?></td>
<td class="td-rl"><?php echo  $invoiceFetch->discount_amount;?></td>
<td class="td-rl"><?php echo number_format( $invoiceFetch->list_price*$invoiceFetch->qty,2, '.', '')-$invoiceFetch->discount_amount;?></td>
<td class="td-rl"><?php echo  $invoiceFetch->cgst;?></td>
<td class="td-rl"><?php   if($invoiceFetch->cgst!=''){ echo $invoiceFetch->gstTotal/2; }?></td>
<td class="td-rl"><?php echo  $invoiceFetch->sgst;?></td>
<td class="td-rl"><?php if($invoiceFetch->sgst!=''){  echo $invoiceFetch->gstTotal/2; }?></td>
<td class="td-rl"><?php echo  $invoiceFetch->igst;?></td>
<td class="td-rl"><?php if($invoiceFetch->igst!=''){  echo number_format($invoiceFetch->gstTotal,2, '.', '');}?></td>
<td class="td-rl"><?php echo number_format( $invoiceFetch->net_price,2, '.', ''); ?></td>
</tr>

<?php
$listPrice=$listPrice+number_format( $invoiceFetch->net_price,2, '.', '');
$taxableVal=$taxableVal+number_format( $invoiceFetch->list_price*$invoiceFetch->qty,2, '.', '')-$invoiceFetch->discount_amount;
$total=$total+number_format( $invoiceFetch->list_price*$invoiceFetch->qty,2, '.', '');
$totQty=$totQty+$invoiceFetch->qty;
$n++;

?>
<?php
$n++;
}
?>









<tr class="tr-t tr-b">
<td colspan="4" align="right" class="td-rl"><strong>Total</strong></td>
<td class="td-rl"><strong><?=$totQty;?></strong></td>
<td>&nbsp;</td>
<td class="td-rl"><strong><?=$total;?></strong></td>
<td>&nbsp;</td>
<td class="td-rl"><strong><?=$taxableVal;?></strong></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td class="td-rl"><strong><?=$listPrice;?></strong></td>
</tr>

<tr>
<td colspan="9" rowspan="4" class="td-r tr-b"><p>Total Gst Amount in Words: </p>
  <p><?php echo  words_repues(number_format((float)$inviceres->total_gst_tax_amt, 2, '.', '')); ?></p>
  <p>Total Invoice In Worrds:<?php echo  words_repues(number_format((float)$inviceres->grand_total, 2, '.', '')); ?></p></td>
<td colspan="5" class="tr-b"><strong>Total Amount Before Tax:</strong></td>
<td colspan="2" align="right" class="tr-b td-l"><strong><?=$total;?></strong></td>
</tr>

<tr>
<td colspan="5" class="tr-b">Add: CGST</td>
<td colspan="2" align="right" class="tr-b td-l"><strong><?php echo number_format((float)$inviceres->total_tax_cgst_amt, 2, '.', '')?></strong></td>
</tr>

<tr>
<td colspan="5"  class="tr-b">Add: SGST</td>
<td colspan="2" align="right" class="tr-b td-l"><strong><?php  echo number_format((float)$inviceres->total_tax_sgst_amt, 2, '.', '')?></strong></td>
</tr>



<tr>
<td colspan="5" class="tr-b">Add:IGST</td>
<td colspan="2" align="right" class="tr-b td-l"><strong><?php echo number_format((float)$inviceres->total_tax_igst_amt, 2, '.', '')?></strong></td>
</tr>

<tr>
<td colspan="6" align="center"><strong>Our Bank: Punjab National Bank. </strong><br></td>
<td colspan="3" rowspan="6" align="center" valign="bottom" class="td-r td-l">(Common Seal)</td>
<td colspan="5" class="tr-b">Tax Amount: GST</td>
<td colspan="2" align="right" class="tr-b td-l"><strong><?php echo number_format((float)$inviceres->total_gst_tax_amt, 2, '.', '')?></strong></td>
</tr>

<tr>
<td colspan="2"><strong>Bank Account Name</strong></td>
<td colspan="4">M/S SHANTI TRADERS</td>


<td colspan="5" class="tr-b">Total Amount After Tax</td>
<td colspan="2" align="right" class="tr-b td-l"><strong><?php echo number_format((float)$inviceres->grand_total, 2, '.', '')?></strong></td>
</tr>

<tr>
<td colspan="2"><strong>Bank Account Number</strong></td>
<td colspan="4">1111005501005305</td>
<td colspan="7">&nbsp;</td>
</tr>

<tr>
<td colspan="2"><strong>IFSC CODE</strong></td>
<td colspan="4">PUNB0111100</td>
<td colspan="7">&nbsp;</td>
</tr>

<tr>
<td colspan="6" rowspan="2" align="center" class="tr-t">SUBJECT TO FARIDABAD JURISDITION<br />
This is a Computer Generated Invoice</td>
<td colspan="5" class="tr-b tr-t">GST Payable on Charge:</td>
<td colspan="2" align="right" class="tr-b tr-t td-l">&nbsp;</td>
</tr>

<tr>
<td colspan="7" align="center">Certified that the particulars given above are true and correct<br>
  <strong>For, KARAMCHARI LAGHU UDHYOG</strong><br><br><br>
  Authorised Signatory</td>
</tr>
<tr class="tr-t">
<td colspan="16" align="right"><strong>[E&amp;OE]</strong></td>
</tr>
</tbody>
</table>

<div id="terms">
<div id="terms-l"><h5>Contributed by <strong>KARAMCHARI LAGHU UDHYOG</strong></h5></div>
<div id="terms-r"><h5><strong>E-mail: klu1111@gmail.com</strong></h5></div>
</div>

</div>

</body>
</html>