<?php
extract($_POST);
$invoiceID=$id;
$invoiceID=$id;
if($invoiceID!="")
{
$invice12=$this->db->query("select * from tbl_purchase_order_hdr where purchase_order_id='$id'");
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
strong{font-weight:600; margin:0 0 2px 0px;}
strong u{font-weight:600; margin:0 0 2px 0px; float:left;}


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
<table id="items" style="border:none">
<tbody>
<tr class="tr-t">
<td colspan="4">
  
   <?php $date_in=explode("-",$inviceres->delivery_date);?>
<?=$inviceres->refno;?></td>
<td colspan="2" rowspan="8" align="left" valign="top">&nbsp;</td>
<td class="td-r" colspan="4" rowspan="8" align="right" valign="top"><img id="image" src="<?php echo base_url();?>assets/po_css/images/logo.png" alt="logo"  /></td>
</tr>

<tr>
<td colspan="4"  height="40">
  
<?php  $monthNum  = $date_in[1];
  $dateObj   = DateTime::createFromFormat('m', $monthNum);
  $monthName = $dateObj->format('F');	  echo $monthName.' '.$date_in[2].', '.$date_in[0]; ?></td>
</tr>

<tr>
<td colspan="4"  height="0">
  
<?php echo $fetchrecords->first_name." ".$fetchrecords->middle_name." ".$fetchrecords->last_name;?></td>
</tr>

<tr>
<td colspan="4" height="20">
<?php  $newout= array();
 echo $outtext=  $fetchrecords->address1;

?></td>
</tr>

<tr>
<td colspan="4" height="30">
   
<strong><b><u style="margin: 0 0 8px 0px;">Kind Attn</u>.&nbsp;:&nbsp;<?=$fetchkind->p_name?></b></strong></td>
</tr>

<tr>
<td colspan="4" height="20">
  
<strong><b><u>Sub</u>.&nbsp;:&nbsp;<?=$inviceres->subject?></b></strong></td>
</tr>

<tr>
<td colspan="4" height="20">
  
<strong><b><u>Ref</u>.&nbsp;:&nbsp;<?=$inviceres->new_ref_no?></b></strong>
</td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
</tbody>
</table>
<table id="items" style="border:none;">
	<tr>
	<td colspan="4"><?=$inviceres->contant?></td>
	</tr>
	<tr>
	<td colspan="4">&nbsp;</td>
	</tr>	
</table>
<table id="items">
<tr>
<?php
// this query is for check part no. is avlaible or not
$inviceQ=$this->db->query("select * from tbl_purchase_order_dtl where purchase_order_hdr_id='$invoiceID'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id' and sku_no!=''");
 $cntPartNo=$productQ->num_rows();
}

// ends
?>
<th style="width:7%">S.NO.</th>
<?php if($cntPartNo>0){?>
<th>ITEM NO.</th>
<?php } else {}?>
<th>DESCRIPTION</th>
<th>QTY</th>
<th style="text-align:center;">UNIT RATE<br /><?php if($fetchnewcase->currency_name=='Euro'){ ?>(&euro;) <?php }else{ ?>(INR)<?php } ?></th>
<th style="text-align:center;">AMOUNT<br /><?php if($fetchnewcase->currency_name=='Euro'){ ?>(&euro;) <?php }else{ ?>(INR)<?php } ?></th>
</tr>


<?php
extract($_POST);
$n=1;
$inviceQ=$this->db->query("select * from tbl_purchase_order_dtl where purchase_order_hdr_id='$invoiceID'");
foreach($inviceQ->result() as $invoiceFetch){

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id'");

$pfetch=$productQ->row();
@extract($invoiceFetch);

//this query for geting usage unit form tbl_master_data

$productQ1=$this->db->query("select *from tbl_master_data where serial_number ='$pfetch->usageunit'");

$pfetch1=$productQ1->row();


?>


<tr class="item-row" height="40">
<td style="text-align:center;padding:3px;" height="40"><?php echo $n;?></td>
<?php
if($cntPartNo>0){
?>
<td style="padding:3px;"><?php echo $pfetch->sku_no;?></td>
<?php } else {}?>
<td style="padding:3px;"><?php echo $pfetch->part_no;?></td>

<td style="text-align:left;padding:3px;"><?php echo  $invoiceFetch->quantity;?>&nbsp;<?php echo $pfetch1->keyvalue ;?></td>
<td style="text-align:center;padding:3px;"><?php echo number_format($invoiceFetch->net_price/$invoiceFetch->quantity,2, '.', ',');  ?></td>
<td style="text-align:center;padding:3px;"><?php echo number_format( $invoiceFetch->net_price,2, '.', ',');  ?></td>
</tr>
<?php 
$n++;}?>
<tr class="item-row">
<td colspan="3" style="text-align:left"><b>AMOUNT : &nbsp;<strong><?php echo  words_repues(number_format((float)$inviceres->grand_total, 0, '.', ''));?><?php if($inviceres->grand_total!=''){ ?>Only <?php } ?></strong></b></td>
<?php
if($cntPartNo>0){
?>

<td>&nbsp;</td>
<?php } else {}?>
<td style="text-align:center"><strong><b>TOTAL</b></strong></td>
<td style="text-align:center"><strong><b><?php echo  number_format( $invoiceFetch->grand_total,2, '.', ','); ?></b></strong></td>
</tr>
</table>

<div id="clear"></div>

<table id="items-to" style="border:none !important;">
<tr class="item-row-to">
<td><?php echo $inviceres->termandcondition;?></td>
<td colspan="3">&nbsp;</td>
</tr>
</table>
<div style="clear:both"></div>
</div>
</body>
</html>