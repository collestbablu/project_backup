<?php
extract($_POST);
$invoiceID=$_REQUEST['id'];
$invoiceID=$_GET['id'];
if($invoiceID!="")
{
$invice12=$this->db->query("select * from tbl_purchase_order_hdr where purchase_order_id='".$_GET['id']."'");
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice</title>


<style>

/*
	 CSS-Tricks Example
	 by Chris Coyier
	 http://css-tricks.com
*/

* { margin: 0; padding: 0; }
body { font-size:13px; font-family:Arial, Helvetica, sans-serif; }
#page-wrap { width:800px; margin: 0 auto; }

textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
table { border-collapse: collapse; }
table td, table th { border: 1px solid black; padding:3px; }

#header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

#address { width: 260px; height:auto; float: left; }
#customer { overflow: hidden; }

#logo { text-align: right; float: right; position: relative; margin-top:0px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }

#logoctr { display: none; }
#logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
#logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
#logohelp input { margin-bottom: 5px; }
.edit #logohelp { display: block; }
.edit #save-logo, .edit #cancel-logo { display: inline; }
.edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
#customer-title { font-size: 20px; font-weight: bold; float: left; }
#customer-left{ float:left; width:50%; margin:5px 0 0 0px; line-height:20px;}
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
<br />
AEP/NTPC VINDHYACHAL/16-17/803
</div>

<div id="customer-right">
<img id="image" src="<?php echo base_url();?>assets/po_css/images/logo.png" alt="logo" />
</div>

<div style="clear:both"></div>

<div id="customer-left">
<?php $date_in=explode("-",$inviceres->maker_date); 
  $monthNum  = $date_in[1];
  $dateObj   = DateTime::createFromFormat('!m', $monthNum);
  $monthName = $dateObj->format('F');	  echo $date_in[2].'-'.$monthName.'-'.$date_in[0]; ?><br />
<strong><?php echo $fetchrecords->first_name." ".$fetchrecords->middle_name." ".$fetchrecords->last_name;?></strong><br />
<?php  $newout= array();
echo  $outtext=  $fetchrecords->address1;
echo "<br/>";?>
</div>

<div id="customer-right">
B-9/3, Mianwali Nagar, Rohtak Road, New Delhi - 110087<br />
Ph.:011-25264696, 25271161 Fax:011-25264696<br />
E-mail:sales@ashdond.in, info@ashbond.in<br />
Website:www.ashbond.in
</div>

<div style="clear:both"></div>

<div id="customer-left">

<strong>Kind Attn.:-<?=$fetchrecords->contact_person?><br />
<strong>Sub. : <?=$inviceres->subject?><br />
Ref. : <?=$inviceres->refno?></strong>
</div>

<div style="clear:both"></div>

<div id="customer-row">
<strong>Dear Sir,<br /></strong>
We have pleased to place an order for the following material as per details given here under:-
</div>

</div>

<table id="items">
<tr>
<th>SL.NO</th>
<th>ITEM DESCRIPTION</th>
<th>QUANTITY</th>
<th>UNIT PRICE IN RS.</th>
<th>TOTAL PRICE</th>
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

$productQ1=$this->db->query("select *from tbl_master_data where serial_number ='$invoiceFetch->unit'");

$pfetch1=$productQ1->row();


?>


<tr class="item-row">
<td><?php echo $n;?></td>
<td><?php echo $pfetch->productname;?></td>
<td><?php echo  $invoiceFetch->quantity;?>&nbsp;<?php echo $pfetch1->keyvalue ;?></td>
<td><?php echo number_format( $invoiceFetch->list_price,2, '.', '');  ?></td>
<td><?php echo number_format( $invoiceFetch->total,2, '.', '');  ?></td>
</tr>
<?php 
$n++;}?>
<tr class="item-row">
<td>&nbsp;</td>
<td><strong><?php echo  words_repues(number_format((float)$inviceres->grand_total, 2, '.', ''));?></strong></td>
<td>&nbsp;</td>
<td><strong>Total</strong></td>
<td><strong><?php echo  number_format( $invoiceFetch->grand_total,2, '.', ''); ?></strong></td>
</tr>
</table>

<div style="clear:both"></div>

<div id="customer-row">

<strong>TERMS ANDCONDITIONS:</strong>

</div>

<div style="clear:both"></div>

<table id="items-to">
<tr class="item-row-to">
<td><?=$inviceres->termandcondition;?></td>
<td colspan="3">04 NOS275.001,100.00</td>
</tr>

</table>
<div style="clear:both"></div>

<div id="customer-row">
Our Tin No:-<strong>0733014955</strong><br />

Thanking you,<br />

Yours faithfully<br /><br />

<strong>For ASHBOND ENGINEERS PRIVATE LIMITED</<br /><br /><br />
<strong>(ASHISH DHAMIJA)<br />DIRECTOR</strong>


</div>

</div>

</body>
</html>
