<?php
extract($_POST);
$invoiceID=$_REQUEST['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="<?php //echo base_url();?>/assets/css/crm1.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/assets/css/featherlight.min.css" />
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>Invoice</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>/assets/invoicecss/style.css' />
	<link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>

 <style>
    @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
      div.page
      {
        page-break-after: always;
      }
td{
font-size: 14px;
}
th{
font-size: 13px;
}
select {
  -webkit-appearance: button;
  -webkit-border-radius: 2px;
  -webkit-padding-end: 20px;
  -webkit-padding-start: 2px;
  -webkit-user-select: none;
  background-repeat: no-repeat;
  border: 1px solid #AAA;
  color: #555;
  font-size: inherit;
  margin: 0;
  overflow: hidden;
  padding-top: 2px;
  padding-bottom: 2px;
  text-overflow: ellipsis;
  white-space: nowrap;
  }
</style>
</head>
<body >
<?php
 $invoiceID=$_GET['id'];

if($invoiceID!="")
{
$invice12=$this->db->query("select * from tbl_invoice_hdr where invoiceid='".$_GET['id']."'");
$inviceres=$invice12->row();

$fetchrecord=$this->db->query("select * from tbl_contact_m where contact_id='".$inviceres->contactid."'");
$fetchrecords=$fetchrecord->row();
 
$fetchcomp=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchrecords->company_id."'");
$fetchcompany=$fetchcomp->row(); 
  
$fetchaddress=$this->db->query("select * from tbl_address_m where entityid='".$inviceres->contactid."'");
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


?>  
<form method="post">
<div id="page-wrap" style="margin-top:13%">
<!--<input type="submit" name="update" value="print" onClick="window.print()" class="no-print submit">--><h1 style="text-align:center;"><?php echo tax($inviceres->tax_retail);?> </h1>

      <!--Deltail part started-->
<table id="items" style="">
<tr>
<td colspan="" style="padding:0px;width:20%;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2" style="border:none;">

<p align="center"><strong>INVOICE</strong></p>
<p align="center">(ISSUE OF INVOICE UNDER RULE 11 OF CENTRAL EXCISE RULES 2002)</p></td>
</tr>
</table></td>
<td colspan="2" style="vertical-align:top; padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="55%" style="border:none;"></td>
<td width="50%" style="border:none;"><select style="border:hidden" name="dropDown">
          <option value="Original For Buyer" <?php if($inviceres->dropDown =='Original For Buyer'){ ?> selected="selected" <?php }?>>Original For Buyer</option>
          <option value="Duplicate for Transporter" <?php if($inviceres->dropDown=='Duplicate for Transporter'){ ?> selected="selected" <?php }?>>Duplicate for Transporter</option>
          <option value="Triplicate for Assesse" <?php if($inviceres->dropDown=='Triplicate for Assesse'){ ?> selected="selected" <?php }?>>Triplicate for Assesse</option>
          <option value="Fix Copy  Office Record" <?php if($inviceres->dropDown=='Fix Copy  Office Record'){ ?> selected="selected" <?php }?>>Fix Copy  Office Record</option>
        </select></td>
</tr>
</table></td>
</tr>
<tr>
<td colspan="2" style="padding:0px; vertical-align:top;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
</table></td>
</tr>
</table>
</td>
</tr>
</table>

	  
	  
	  
	  
 <!--Deltail part started-->	  
	  
  <table width="100%" id="items" style="">
  <tr>
    <th width="3%" >S.NO</th>
    <th colspan="2">Product</th>
    <th width="8%">Quantity</th>
	<th width="13%" colspan="2">Usage Unit</th>
   
  </tr>
  <?php
extract($_POST);
$n=1;
$inviceQ=$this->db->query("select * from tbl_product_stock where Product_id='$invoiceID'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->productid'");

$pfetch=$productQ->row();
@extract($invoiceFetch);

//this query for geting usage unit form tbl_master_data

$productQ1=$this->db->query("select *from tbl_master_data where serial_number ='$pfetch->usageunit'");

$pfetch1=$productQ1->row();


?>
  <tr>
    <td style= "border: none;border-left:1px solid black; text-align:center"><?php echo $n;?>
        <input type="checkbox"  checked="checked" name="invoice_dtl_id1[]" id='quantity<?php echo $j?>' value="<?php echo $invoice_dtl_id;?>" readonly onblur='testRate<?php echo $i?>();' style="width:4em;border:none;display:none" /></td>
    <td style= "border: none;border-left:1px solid black;" colspan="2"><?php
echo $invoiceFetch->productname;
?></td>
    <td style="text-align:center; border: none; border-left:1px solid black;"><?php echo  $invoiceFetch->quantity;?></td>
	<td class="total-line" style= "border: none;border-left:1px solid black;text-align:center;" colspan="2"><?php echo $invoiceFetch->usageunit ;?></td>
   
    <?php $n++;}?>
  </tr>
  <!--Deltail part ended-->
    <!--sub total and discount print part star-->
  
  <!--grand total print part entd-->
  <?php }?>
</table>
</form>

<?php  ////return rupee in words
	?>
</body>

</html>