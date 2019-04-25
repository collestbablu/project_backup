<?php
extract($_POST);
$invoiceID=$_REQUEST['id'];
$invoiceID=$_GET['id'];
if($invoiceID!="")
{
$invice12=$this->db->query("select * from tbl_purchase_order_hdr where purchase_order_id='".$_GET['id']."'");
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
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/po_css/css/invoice.css' />
</head>

<body>

<div id="page-wrap">
<div id="customer">
<div id="customer-right">
<img id="image" src="<?php echo base_url();?>assets/po_css/images/logo.png" alt="logo"  />
</div><!--customer-right-->

<div id="customer-left">
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
<?php echo $fetchrecords->first_name." ".$fetchrecords->middle_name." ".$fetchrecords->last_name;?><br />
<?php  $newout= array();?>
<div id="clear"></div>
<?php 
echo  $outtext=  $fetchrecords->address1;
?>
  <div id="clear"></div>
  <div id="line"></div>
  <div id="line"></div>

<strong><u style="margin: 0 0 8px 0px;">Kind Attn</u>.&nbsp;:&nbsp; <?=$fetchkind->p_name?></strong>
<div id="clear"></div>
<strong><u>Sub</u>.&nbsp;:&nbsp;<?=$inviceres->subject?></strong>
<div id="clear"></div>
<strong><u>Ref</u>.&nbsp;:&nbsp;<?=$inviceres->new_ref_no;?></strong>
<div id="clear"></div>
<div id="line"></div>
<div id="line"></div>

</div><!--customer-left-->
</div>
<style>
.dear{
 width:100%;
 float:left;
 margin:0 0 0 0px;
 } 

</style>
<div class="dear">
<?=$inviceres->contant?>
</div>
<div id="line"></div>
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
<th style="width:1%">S.NO.</th>
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
<td style="text-align:center;padding:3px;"><?php echo $n;?></td>
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
<td colspan="3" style="text-align:left"><b>AMOUNT : </b>&nbsp;<strong><?php echo  words_repues(number_format((float)$inviceres->grand_total, 0, '.', ''));?><?php if($inviceres->grand_total!=''){ ?>Only <?php } ?></strong></td>
<?php
if($cntPartNo>0){
?>

<td>&nbsp;</td>
<?php } else {}?>
<td style="text-align:center"><strong>TOTAL</strong></td>
<td style="text-align:center"><strong><?php echo  number_format($invoiceFetch->grand_total,2,'.',','); ?></strong></td>
</tr>
</table>

<div id="clear"></div>

<table id="items-to">
<tr class="item-row-to">
<td><?=$inviceres->termandcondition;?></td>
<td colspan="3">&nbsp;</td>
</tr>

</table>
<div style="clear:both"></div>



</div>

</body>
</html>
