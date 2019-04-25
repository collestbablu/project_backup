<?php
extract($_POST);

if($_GET['id']!='')
{
$id=$_GET['id'];	
}
else
{
	$id=$id;
}
$invoiceID=$id;
$invoiceID=$id;
if($invoiceID!="")
{
$invice12=$this->db->query("select * from tbl_letter_head where id='$id'");
$inviceres=$invice12->row();

$fetchrecord=$this->db->query("select * from tbl_contact_m where contact_id='".$inviceres->contact_id."'");
$fetchrecords=$fetchrecord->row();
 
$fetchkindss=$this->db->query("select * from tbl_contact_person where person_id='".$inviceres->contact_person_id."'");
$fetchkind=$fetchkindss->row();



}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>latterhad</title>
<style>
/*
	 CSS-Tricks Example
	 by Chris Coyier
	 http://css-tricks.com
*/

* { padding: 0; }
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
<table id="items-to" style="border:none!important;">
<tbody>
<tr class="tr-t">
<td colspan="4">
 
   <?php $date_in=explode("-",$inviceres->maker_date);?>
<?=$inviceres->refno;?></td>
<td colspan="2" rowspan="8" align="left" valign="top">&nbsp;</td>
<td class="td-r" colspan="4" rowspan="8" align="right" valign="top">
<img id="image" src="<?php echo base_url();?>assets/po_css/images/logo.png" alt="logo"  />
</td>
</tr>

<tr>
<td colspan="4" height="40">

<?php  $monthNum  = $date_in[1];
  $dateObj   = DateTime::createFromFormat('m', $monthNum);
  $monthName = $dateObj->format('F');	  echo $monthName.' '.$date_in[2].', '.$date_in[0]; ?></td>
</tr>

<tr>
<td colspan="4">
  
<?php echo $fetchrecords->first_name." ".$fetchrecords->middle_name." ".$fetchrecords->last_name;?></td>
</tr>

<tr>
<td colspan="4">
<?php  $newout= array();
echo  $outtext=  $fetchrecords->address1;
?></td>
</tr>

<tr>
<td colspan="4" height="40">
  
<strong><b><u style="margin: 0 0 8px 0px;">Kind Attn</u>.&nbsp;:&nbsp;<?=$fetchkind->p_name?></b></strong></td>
</tr>

<tr>
<td colspan="4" height="20">
<strong><b><u>Sub</u>.&nbsp;:&nbsp;<?=$inviceres->subject?></b></strong></td>
</tr>

<tr>
	<td colspan="4">&nbsp;</td>
</tr>
</tbody>

</table>
<table id="items" style="border:none;">
	<tr>
	<td colspan="4"><?=$inviceres->termandcondition;?></td>
	</tr>
	<tr>
	<td colspan="4">&nbsp;</td>
	</tr>	
</table>
<div style="clear:both"></div>

</div>

</body>
</html>
