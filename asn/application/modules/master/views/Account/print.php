<?php
$docketQuery=$this->db->query("select *from tbl_docket_entry where id='".$_GET['id']."'");
$getDocket=$docketQuery->row();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: INVOICE DETAILS ::</title>


<style type="text/css">
#wrapper{
		width:800px;
		margin:0px auto;
		font:11px tahoma, Arial, Helvetica, sans-serif;
		}

        .style1
        {
            height: 63px;
        }

    </style>
    
</head>

<body>

<div id="wrapper">
<table width="100%" cellpadding="2" cellspacing="0" style=" border: 1px solid #8C8C8C;padding:2px 2px 2px 2px; font-size:11px ">
<tbody><tr>
<td valign="top" style="text-align:center">
<table>
<tbody><tr>
<td valign="middle" style="width:400px; text-align:left; padding-left:5px">
<img alt="" src="<?=base_url()?>assets/images/asn.png" width="130px" height="60px">
<p style="font-family:Calibri; font-size:14px; font-weight:bold; margin-top:4px; text-align:left; padding-left:20px">  </p>

</td>
<td valign="middle" style="width:400px; text-align:left; padding:0px 10px 0px 380px">
B-116 , 117 (Ist Floor),DDA Sheds <br>
Okhla Ind. Area - I , <br>
New Delhi India 110020 <br>
Tel: 011-41326501 <br>
Email : info@asnlog.com<br>
Website : www.asnlog.com<br>

</td>
</tr>
</tbody></table>

</td>
</tr>

<tr>
<td>


<table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #8C8C8C">
<tbody><tr>
<td colspan="2" style="padding-bottom:2px; text-align:left; font-size:12px; padding-left:2px; text-align:left; padding-top:3px; background-color:#987D16; border-bottom:1px solid #8C8C8C"><b>Billing Details</b>
<b style="padding-left:225px">INVOICE DETAILS</b>
</td>
</tr>

<tr>
<td valign="middle" style="width:480px; padding-left:5px; padding-top:10px; padding-bottom:10px; text-align:left">
<table cellspacing="0" cellpadding="4" style="float:left; width:325px; line-height:16px" border="1" bordercolor="#8C8C8C">
<tbody><tr>
<td width="110" valign="top" bgcolor="#CECECE">Docket No. : </td>
<td width="225" valign="top"><span id="lbldocketno"><?=$getDocket->docket_no;?></span></td>
</tr>
<?php
$originQuery=$this->db->query("select *from tbl_master_data where serial_number='$getDocket->origin'");
$getOrigin=$originQuery->row();

?>
<tr>
<td width="110" valign="top" bgcolor="#CECECE">Origin :</td>
<td width="225" valign="top"><span id="lblorigin"><?=$getOrigin->keyvalue;?></span></td>
</tr><?php
$dQuery=$this->db->query("select *from tbl_master_data where serial_number='$getDocket->destination'");
$getd=$dQuery->row();

?>

<tr>
<td width="110" valign="top" bgcolor="#CECECE">Destination :</td>
<td width="225" valign="top"><span id="lbldestination"><?=$getd->keyvalue;?></span></td>
</tr>
<tr>
<td width="110" valign="top" bgcolor="#CECECE">Date :</td>
<td width="225" valign="top"><span id="lbldate"><?=$getDocket->booking_date;?>          </span></td>
</tr>

</tbody></table>
</td>
<td valign="top" style="width:400px; padding-right:5px; padding-top:10px; padding-bottom:10px; text-align:left">
<table cellspacing="0" cellpadding="4" style="float:right; width:325px; line-height:16px" border="1" bordercolor="#8C8C8C">

<tbody><tr>
<td width="110" valign="top" bgcolor="#CECECE">Mode Of Transport  :</td>
<td valign="top"><span id="lbltransport"><?=$getDocket->mode;?></span></td>
</tr>

<tr>
<td width="110" valign="top" bgcolor="#CECECE">Invoice No.:</td>
<td valign="top">
<span id="lblsno">INV-<?=$getDocket->invoice_value?></span>

</td>
</tr>

<tr>
<td width="110" valign="top" bgcolor="#CECECE">Mode Of Payment :</td>
<td valign="top"><span id="lblpaymode"><?=$getDocket->mode_of_payment?></span></td>
</tr>

<tr>
<td width="110" valign="top" bgcolor="#CECECE">Rate :</td>
<td valign="top"><span id="lblrate"><?=$getDocket->rate?></span></td>
</tr>
<tr>
<td width="110" valign="top" bgcolor="#CECECE">Min Weight :</td>
<td valign="top"><span id="lblhandlingcharge">30.00</span></td>
</tr>
</tbody></table>
</td>
</tr>

</tbody></table>


</td>
</tr>

<tr>
<td>


<table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #8C8C8C">
<tbody><tr>
<td colspan="2" style="padding-bottom:2px; text-align:left; font-size:12px; padding-left:2px; text-align:center; padding-top:3px; background-color:#987D16; border-bottom:1px solid #8C8C8C">
<b>SHIPPING DETAILS</b>
</td>
</tr>

<tr>
<td valign="middle" style="width:480px; padding-left:5px; padding-top:10px; padding-bottom:10px; text-align:left">
<table cellspacing="0" cellpadding="4" style="float:left; width:325px; line-height:20px" border="1" bordercolor="#8C8C8C">
<tbody><tr>
<?php
$conQuery=$this->db->query("select *from tbl_contact_m where contact_id='$getDocket->consignor'");
$getcon=$conQuery->row();

?>
<td valign="top" bgcolor="#CECECE" style="text-align:center; font-size:12px"> <b> S &nbsp; H &nbsp; I &nbsp; P &nbsp; P &nbsp; E &nbsp; R &nbsp; </b> </td>
</tr>
<tr>
<td width="325" valign="top">
<textarea name="txtFromAddress" rows="2" cols="20" id="txtFromAddress" class="textbox" style="border-color:White;height:60px;width:300px;"><?=$getcon->first_name;?></textarea>
</td>
</tr>

</tbody></table>
</td>
<td valign="top" style="width:400px; padding-right:5px; padding-top:10px; padding-bottom:10px; text-align:left">
<table cellspacing="0" cellpadding="4" style="float:right; width:325px; line-height:16px" border="1" bordercolor="#8C8C8C">
<tbody><tr>
<?php
$conQuery=$this->db->query("select *from tbl_contact_m where contact_id='$getDocket->consignee'");
$getcon=$conQuery->row();

?>
<td valign="top" bgcolor="#CECECE" style="text-align:center; font-size:12px"> <b>  C &nbsp; O &nbsp; N &nbsp; S &nbsp; I &nbsp; G &nbsp; N &nbsp; E &nbsp; E </b></td>
</tr>
<tr>
<td width="325" valign="top">
<textarea name="txt_tolocation" rows="2" cols="20" id="txt_tolocation" class="textbox" style="border-color:White;height:60px;width:300px;"><?=$getcon->first_name;?></textarea>

</td>
</tr>

</tbody></table>
</td>
</tr>

</tbody></table>


</td>
</tr>

<tr>
<td valign="middle">



<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid #8C8C8C">
<tbody><tr>
<td colspan="5" style="padding-bottom:5px; text-align:left; font-size:12px; padding-left:5px; text-align:left; padding-top:5px; background-color:#987D16; border-bottom:1px solid #8C8C8C"><b>Order  Details</b></td>
</tr>
<tr style="height:23px">
<td style="border:1px solid #8C8C8C; text-align:center; width:300px"><b>No. Of Packages</b></td>
<td style="border:1px solid #8C8C8C; text-align:center; width:400px"><b>Description Of Goods </b></td> 
<td style="border:1px solid #8C8C8C; text-align:center; width:200px"><b>Actual Weight</b></td> 
<td style="border:1px solid #8C8C8C; text-align:center; width:400px"><b>Dimension Weight </b></td> 
<td style="border:1px solid #8C8C8C; text-align:center; width:300px"><b>Invoice Value</b></td>

</tr>

<tr style="height:25px">
<td style="border:1px solid #8C8C8C; text-align:center; width:200px"> <span id="lblnoofpackage"><?=$getDocket->no_of_package;?></span> </td> 
<td style="border:1px solid #8C8C8C; text-align:center; width:200px"><span id="lblgoodsdesc"><?=$getDocket->goods;?></span></td>
<td style="border:1px solid #8C8C8C; text-align:center; width:400px"><span id="lblactualweight"><?=$getDocket->actual_weight;?></span></td> 
<td style="border:1px solid #8C8C8C; text-align:center; width:200px"><span id="lblchargigweight"><?=$getDocket->dimension_weight;?></span></td>
<td style="border:1px solid #8C8C8C; text-align:center; width:400px"><span id="lblinvoicevalue"><?=$getDocket->invoice_value;?></span></td> 

</tr>

<tr>
<td valign="top" colspan="5" style="text-align:left;">
<table width="100%" cellpadding="0" cellspacing="0" style="margin-top:-2px">
<tbody><tr>
<td valign="top" style="padding:5px; width:388px;border-top:1px solid #8C8C8C;">

<p align="left" style="margin-left:5px; margin-top:10px"> <br>
<strong>Uniex Courier &amp; Cargo Services</strong>
</p>
<p align="left" style="font-size:11px; margin-top:-10px; margin-left:5px; line-height:20px">
B-116 , 117 (Ist Floor),DDA Sheds <br>
Okhla Ind. Area - I , <br>
New Delhi India 110020 <br>
Tel: 011-41326501 <br>
Email : info@asnlog.com<br>
Website : www.asnlog.com<br>

</p> 

</td>
<td valign="top" style="border-top:1px solid #8C8C8C; text-align:right; padding-left:140px;">
<table cellpadding="0" cellspacing="0" style="width:250px; line-height:20px; margin-right:-3px; margin-bottom:-3px">
<tbody><tr>
<td width="60%" align="left" bgcolor="#E1E1E1" style="border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px"> Freight :</td>
<td width="40%" style="border-right:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; border-left:2px solid #8C8C8C" align="center"><span id="lblfreight"><?=$getDocket->frieght_charge;?></span></td>
</tr>





<tr>
<td width="60%" align="left" bgcolor="#E1E1E1" style="border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px"> F.O.V Charge :</td>
<td width="40%" style="border-right:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; border-left:2px solid #8C8C8C" align="center"><span id="lblfov"><?=$getDocket->fov;?></span></td>
</tr>

<tr>
<td bgcolor="#E1E1E1" width="60%" align="left" style=" border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px">D/C :</td>
<td style=" border-right:2px solid #8C8C8C; border-bottom:2px solid #8C8C8C;border-left:2px solid #8C8C8C" align="center"><span id="lbldc"><?=$getDocket->docket_charge;?></span></td>
</tr>


<tr>
<td bgcolor="#E1E1E1" width="46%" align="left" style=" border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px">DOD / DACC Sr. Charge : </td>
<td style=" border-right:2px solid #8C8C8C; border-bottom:2px solid #8C8C8C;border-left:2px solid #8C8C8C" align="center"><span id="lbldod"><?=$getDocket->dod_cod_charge;?></span></td>
</tr>

<tr>
<td bgcolor="#E1E1E1" width="46%" align="left" style=" border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px">Fuel Charge : </td>
<td style=" border-right:2px solid #8C8C8C; border-bottom:2px solid #8C8C8C;border-left:2px solid #8C8C8C" align="center"><span id="lblFuel"><?=$getDocket->fuel_charge;?></span></td>
</tr>



<tr>
<td bgcolor="#E1E1E1" width="46%" align="left" style=" border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px">Total : </td>
<td style=" border-right:2px solid #8C8C8C; border-bottom:2px solid #8C8C8C;border-left:2px solid #8C8C8C" align="center"><span id="lbltotal"><?=$getDocket->total_amount;?></span></td>
</tr>

<tr>
<td bgcolor="#E1E1E1" width="46%" align="left" style=" border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px">CGST : </td>
<td style=" border-right:2px solid #8C8C8C; border-bottom:2px solid #8C8C8C;border-left:2px solid #8C8C8C" align="center"><span id="lblservicetax"><?=$getDocket->gst;?></span></td>
</tr>

<tr>
<td bgcolor="#E1E1E1" width="46%" align="left" style=" border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px">IGST : </td>
<td style=" border-right:2px solid #8C8C8C; border-bottom:2px solid #8C8C8C;border-left:2px solid #8C8C8C" align="center"><span id="lblservicetax"><?=$getDocket->other_tax;?></span></td>
</tr>
<tr>
<td bgcolor="#E1E1E1" width="46%" align="left" style=" border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px">SGST : </td>
<td style=" border-right:2px solid #8C8C8C; border-bottom:2px solid #8C8C8C;border-left:2px solid #8C8C8C" align="center"><span id="lblservicetax"><?=$getDocket->sgst;?></span></td>
</tr>
<tr>
<td bgcolor="#E1E1E1" width="46%" align="left" style=" border-left:2px solid #8C8C8C;border-bottom:2px solid #8C8C8C; padding-left:5px">Grand Total : </td>
<td style=" border-right:2px solid #8C8C8C; border-bottom:2px solid #8C8C8C;border-left:2px solid #8C8C8C" align="center"><span id="lblgrandtotal"><?php echo round($getDocket->grand_total,2);?></span></td>
</tr>
</tbody></table>

</td>
</tr></tbody></table>
</td>
</tr>

</tbody></table>

</td>
</tr>



<tr>
<td valign="top">
<table width="100%" cellpadding="0" cellspacing="0" style=" border:1px solid #8C8C8C ; background-color:#E1E1E1">
<tbody><tr>
<td valign="middle" width="55%" style="text-align:center">

<b>This is Computer Generated Invoice </b>

</td>

</tr>
</tbody></table>
</td>
</tr>

</tbody></table>



</div>

</body>
</html>
