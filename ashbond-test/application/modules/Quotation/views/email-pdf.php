<?php
extract($_POST);
$invoiceID=$id;
$invoiceID=$id;
if($invoiceID!="")
{
$invice12=$this->db->query("select * from tbl_quotation_hdr where quotation_id_hdr='$id'");
$inviceres=$invice12->row();

$qnewcase=$this->db->query("select * from tbl_new_case where case_id='".$inviceres->case_id."'");
$fetchnewcase=$qnewcase->row(); 


$fetchrecord=$this->db->query("select * from tbl_contact_m where contact_id='".$inviceres->vendor_id."'");
$fetchrecords=$fetchrecord->row();
 
$fetchcomp=$this->db->query("select * from tbl_contact_m where contact_id='".$fetchrecords->company_id."'");
$fetchcompany=$fetchcomp->row(); 
  
$fetchaddress=$this->db->query("select * from tbl_address_m where entityid='".$inviceres->vendor_id."'");
$fetchaddresss=$fetchaddress->row();

$fetchkindss=$this->db->query("select * from tbl_contact_person where person_id='".$inviceres->contact_person_id."'");
$fetchkind=$fetchkindss->row();

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


if($fetchnewcase->currency_name=='Euro'){

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
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' And ' : null;
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
   ucfirst($result . "Euros " . $points . " Cents");
      $grandexplode=number_format((float)$num, 2, '.', '');
 	  $action23=explode(".",$grandexplode);
	  $groundA=$action23[0];
	  $groundV=$action23[1];	
	if($groundV >=1 ){
	$goundStr=ucfirst("Euros And " . $points . " Cents".$result);
			
	}else{
		  $goundStr=ucfirst("Euros ".$result);
	}	
	 return $goundStr;
	}


}else{

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
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' And ' : null;
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
   ucfirst($result . "Rupees " . $points . " Paise");
      $grandexplode=number_format((float)$num, 2, '.', '');
 	  $action23=explode(".",$grandexplode);
	  $groundA=$action23[0];
	  $groundV=$action23[1];	
	if($groundV >=1 ){
	$goundStr=ucfirst("Rupees And " . $points . " Paise".$result);
			
	}else{
		  $goundStr=ucfirst("Rupees ".$result);
	}	
	 return $goundStr;
	}
}


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice</title>
<style>
/*
	 CSS-Tricks Example
	 by Chris Coyier
	 http://css-tricks.com
*/

* { margin: 0; padding: 0; }
body { font-size:12px; font-family:Arial, Helvetica, sans-serif; }
#page-wrap { width:700px; margin: 0 auto; }
#line{width:100%; float:left; height:7px;}
#clear{clear:both;}
strong{font-weight:600; margin:0 0 2px 0px; font-weight: bold; }
strong u{font-weight:600; margin:0 0 2px 0px; float:left; font-weight: bold; }


textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
table { border-collapse: collapse; }
table th { border: 1px solid black; padding:4px; }

#header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

#address { width: 260px; height:auto; float: left; }
#customer { overflow: hidden;}

#logo { text-align: right; float: right; position: relative; margin-top:0px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }

#logoctr { display: none; }
#logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
#logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
#logohelp input { margin-bottom: 5px; }
.edit #logohelp { display: block; }
.edit #save-logo, .edit #cancel-logo { display: inline; }
.edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
#customer-title { font-size: 20px; font-weight: bold; float: left; }
#customer-left{ float:left; width:50%; margin:30px 0 0 0px; line-height:20px;}
#customer-right{ float:right; width:45%; margin:5px 0 0 0px; line-height:20px;}
#customer-row{ float:right; width:100%; margin:5px 0 0 0px; line-height:20px;}

#meta { margin-top: 1px; width: 300px; float: right; }
#meta td { text-align: right;  }
#meta td.meta-head { text-align: left; background: #eee; }
#meta td textarea { width: 100%; height: 20px; text-align: right; }

#items { clear: both; width: 100%; margin:5px 0 0 0; border: 1px solid black; }
#items th { background: #eee; text-align: left; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { border: 0; vertical-align: top; border: 1px solid black; }
#items td.description { width: 300px; }
#items td.item-name { width: 175px; }
#items td.description textarea, #items td.item-name textarea { width: 100%; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }

#items-to { clear: both; width: 100%; margin:5px 0 0 0;}
#items-to tr.item-row-to td { border: 0; vertical-align: top; border:none;}

#items-to p{margin:0 0 10px 0px;}

#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center;}

textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
</style>


</head>

<body>

<div id="page-wrap">
<div id="customer">


<div id="customer-left">
 <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:none!important;">
  <tr style="border:none!important;">
    <td style="border:none!important;" scope="col" style="padding: 30px 0 0 0px;">&nbsp;</td>
  </tr>
 </table>-->
<?php $date_in=explode("-",$inviceres->delivery_date);?>
  <?=$inviceres->refno;?>
   <div id="clear"></div>
  <div id="line"></div>
  
 <?php  $monthNum  = $date_in[1];
  $dateObj   = DateTime::createFromFormat('m', $monthNum);
  $monthName = $dateObj->format('F');	  echo $monthName.' '.$date_in[2].', '.$date_in[0]; ?>
  
   <div id="clear"></div>
  <div id="line"></div>
   <div id="line"></div>
<?php echo $fetchrecords->first_name." ".$fetchrecords->middle_name." ".$fetchrecords->last_name;?>
 <div id="clear"></div>
 
<?php  $newout= array();
echo  $outtext=  $fetchrecords->address1;
?>


</div><!--customer-left close-->

<div id="customer-right">
<img id="image" src="<?php echo base_url();?>assets/po_css/images/logo.png" alt="logo"  />
</div><!--customer-right close-->




</div>
<style>
.dear{
 width:100%;
 float:left;
 margin:0 0 0 0px;
 } 

</style>

<table style="border:none;">
  <tr>
  <td valign="top"><strong><b><u>Kind Attn</u>.&nbsp;:&nbsp;</b></strong></td>  
  <td colspan="4"><strong><b><?=$fetchkind->p_name?></b></strong></td>
  </tr>
  <tr>
  <td colspan="4">&nbsp;</td>
  </tr> 
</table>

<table style="border:none;">
  <tr>
  <td valign="top" style="width: 40px;"><strong><b><u>Sub</u>.&nbsp;:&nbsp;</b></strong></td>  
  <td colspan="4"><strong><b><?=$inviceres->subject?></b></strong></td>
  </tr>
  <tr>
  <td colspan="4">&nbsp;</td>
  </tr> 
</table>

<table style="border:none;">
  <tr>
  <td valign="top" style="width: 40px;"><strong><b><u>Ref</u>.&nbsp;:&nbsp;</b></strong></td>  
  <td colspan="4"><strong><b><?=$inviceres->new_ref?></b></strong></td>
  </tr>
  <tr>
  <td colspan="4">&nbsp;</td>
  </tr> 
</table>

<div class="dear">
<?=$inviceres->contant?>

</div>


<table id="items" style="margin:20px 0 0 0px;">
<?php
if($cntPartNo>0)
{
?>

<tr>
<?php
// this query is for check part no. is avlaible or not
$inviceQ=$this->db->query("select * from tbl_quotation_dtl where quotation_id='$invoiceID'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id' and sku_no!=''");
 $cntPartNo=$productQ->num_rows();
}

// ends
?>
<th style="width:1%">S.NO</th>
<?php
if($cntPartNo>0)
{
?>

<th>PART.NO</th>
<?php } else {}?>
<th>DESCRIPTION</th>
<th>HSN CODE</th>
<th>QTY</th>
<th align="center" style="text-align:center;">UNIT RATE<br /><?php if($fetchnewcase->currency_name=='Euro'){ ?>(&euro;) <?php }else{ ?>(INR)<?php } ?></th>
<th align="left" style="text-align:center;">AMOUNT<br /><?php if($fetchnewcase->currency_name=='Euro'){ ?>(&euro;) <?php }else{ ?>(INR)<?php } ?></th>
</tr>

<?php
extract($_POST);
$n=1;
$inviceQ=$this->db->query("select * from tbl_quotation_dtl where quotation_id='$invoiceID'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id' ");

$pfetch=$productQ->row();
@extract($invoiceFetch);

//this query for geting usage unit form tbl_master_data

$productQ1=$this->db->query("select *from tbl_master_data where serial_number ='$pfetch->usageunit'");

$pfetch1=$productQ1->row();


?>

<tr class="item-row"  height="40">
<td style="text-align:center;padding:3px;"  height="40"><?php echo $n;?></td>
<?php if($cntPartNo>0){?>
<td style="padding:3px;"><?php echo $pfetch->sku_no;?></td>
<?php } else {}?>
<td style="padding:3px;"><?php echo $invoiceFetch->description;?></td>
<td style="padding:3px;"><?php echo $pfetch->hsn_code;?></td>
<td align="left" style="text-align:left;padding:3px;"><?php echo  $invoiceFetch->quantity;?>
&nbsp;<?php echo $pfetch1->keyvalue ;?></td>
<td style="text-align:center;padding:3px;"><?php echo number_format($invoiceFetch->net_price/$invoiceFetch->quantity,2, '.', ',');  ?></td>

<td style="text-align:center;padding:3px;"><?php echo number_format( $invoiceFetch->net_price,2, '.', ',');  ?></td>
</tr>


<?php $n++;}?>




<tr class="item-row">
<?php
if($cntPartNo>0)
{

?>
<td style="text-align:left;" colspan="2"><b>AMOUNT :<?php echo  words_repues(number_format((float)$inviceres->grand_total, 0, '.', ''));?><?php if($inviceres->grand_total!=''){ ?>Only <?php } ?></b></td>

<?php } else {}?>

<?php
if($cntPartNo>0)
{
}
else
{
?>

<td colspan="2"><b>AMOUNT : <strong> <?php echo  words_repues(number_format((float)$inviceres->grand_total, 0, '.', ''));?><?php if($inviceres->grand_total!=''){ ?>Only <?php } ?></strong></b></td>
<?php }?>
<td>&nbsp;</td>
<td style="text-align:center;"><strong><b>TOTAL</b></strong></td>
<td style="text-align:center"><strong><b><?php echo  number_format( $invoiceFetch->grand_total,2, '.', ','); ?></b></strong></td>
<?php if($cntPartNo>0){?>
<td><strong><b><?php echo  number_format( $invoiceFetch->grand_total,2, '.', ','); ?></b></strong></td>
<?php }?>
</tr>



<?php } else {?>


<tr>
<?php
// this query is for check part no. is avlaible or not
$inviceQ=$this->db->query("select * from tbl_quotation_dtl where quotation_id='$invoiceID'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id' and sku_no!=''");
 $cntPartNo=$productQ->num_rows();
}

// ends
?>
<th style="width:6%">S.NO</th>
<?php
if($cntPartNo>0)
{
?>

<th>PART.NO</th>
<?php } else {}?>
<th>DESCRIPTION</th>
<th>HSN CODE</th>
<th>QTY</th>

<th style="text-align:center;">UNIT RATE<br /><?php if($fetchnewcase->currency_name=='Euro'){ ?>(&euro;) <?php }else{ ?>(INR)<?php } ?></th>
<th style="text-align:center;">AMOUNT<br /><?php if($fetchnewcase->currency_name=='Euro'){ ?>(&euro;) <?php }else{ ?>(INR)<?php } ?></th>
</tr>

<?php
extract($_POST);
$n=1;
$inviceQ=$this->db->query("select * from tbl_quotation_dtl where quotation_id='$invoiceID'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id' ");

$pfetch=$productQ->row();
@extract($invoiceFetch);

//this query for geting usage unit form tbl_master_data

$productQ1=$this->db->query("select *from tbl_master_data where serial_number ='$pfetch->usageunit'");

$pfetch1=$productQ1->row();


?>

<tr class="item-row" height="40">
<td style="text-align:center;padding:3px;" height="40"><?php echo $n;?></td>
<?php if($cntPartNo>0){?>
<td style="padding:3px;"><?php echo $pfetch->sku_no;?></td>
<?php } else {}?>
<td style="padding:3px;"><?php echo $invoiceFetch->description;?></td>
<td style="padding:3px;"><?php echo $pfetch->hsn_code;?></td>
<td style="text-align:left;padding:3px;"><?php echo  $invoiceFetch->quantity;?>&nbsp;<?php echo $pfetch1->keyvalue ;?></td>
<td style="text-align:center;padding:3px;"><?php echo number_format($invoiceFetch->net_price/$invoiceFetch->quantity,2, '.', ',');  ?></td>

<td style="text-align:center;padding:3px;"><?php echo number_format( $invoiceFetch->net_price,2, '.', ',');  ?></td>
</tr>


<?php $n++;}?>




<tr class="item-row">
<?php
if($cntPartNo>0)
{

?>
<td colspan="3" style="text-align:left"><b>AMOUNT :<?php echo  words_repues(number_format((float)$inviceres->grand_total, 0, '.', ''));?> <?php if($inviceres->grand_total!=''){ ?>Only <?php } ?> </b></td>

<?php } else {}?>

<?php
if($cntPartNo>0)
{
}
else
{
?>

<td colspan="3" style="text-align:left"><b>AMOUNT : <strong> <?php echo  words_repues(number_format((float)$inviceres->grand_total, 0, '.', ''));?><?php if($inviceres->grand_total!=''){ ?>Only <?php } ?></strong></b></td>
<?php }?>
<td>&nbsp;</td>
<td style="text-align:center;"><strong><?php if($cntPartNo==0){?><b>TOTAL</b><?php }?></strong></td>
<td style="text-align:center"><strong><b><?php if($cntPartNo==0){?><?php echo  number_format( $inviceres->grand_total,2, '.', ','); ?><?php } else {?>Total <?php }?></b></strong></td>
<?php if($cntPartNo>0){?>
<td style="text-align:center"><strong><b><?php echo  number_format( $inviceres->grand_total,2, '.', ','); ?></b></strong></td>
<?php }?>
</tr>
<?php }?>
</table>
<br>
<div style="clear:both"></div>
<div><?=$inviceres->termandcondition;?></div>
<td colspan="3">&nbsp;</td>
<div style="clear:both"></div>
</div>
</body>
</html>

