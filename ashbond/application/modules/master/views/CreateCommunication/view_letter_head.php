<?php
extract($_POST);
if($_GET['id']!='')
{
	$id=$_GET['id'];
}
else{
	$id=$id;
}
$invoiceID=$id;
$invoiceID=$id;
if($invoiceID!="")
{
$invice12=$this->db->query("select * from tbl_communication where communication_id='$id'");
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

* { margin: 0; padding: 0; }
body { font-size:12px; font-family:Arial, Helvetica, sans-serif; }
#page-wrap { width:800px; margin: 0 auto; }

textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
table { border-collapse: collapse; }
table td, table th { padding:3px; }

#header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

#line{width:100%; float:left; height:7px;}
#clear{clear:both;}
strong{font-weight:600; margin:0 0 2px 0px;}
strong u{font-weight:600; margin:0 0 2px 0px; float:left;}

#header-to{
 width:100%;
 margin:0 0 0 0px;
 text-align:center;
 }

#header-to h1{margin:0 0 5px 0px;}  
#header-to h3{font-weight:normal; margin:0 0 7px 0px; line-height:17px;} 
#header-to h4{margin:0 0 7px 0px; font-weight:bold; line-height:17px;} 
#border-row{width:100%; line-height:25px; margin:10px 0 10px 0px;}


#address { width: 260px; height:auto; float: left; }
#customer { overflow: hidden; }

#logo { text-align: right; float: right; position: relative; margin-top:0px; max-width: 540px; max-height: 100px; overflow: hidden; }

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

#items { clear: both; width: 100%; margin:5px 0 0 0; }
#items th { background: #eee; text-align: left; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { border: 0; vertical-align: top; }
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
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center;}

textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
</style>
</head>

<body>

<div id="page-wrap">
<div id="customer">


<div style="clear:both"></div>
<div id="customer-left" style="width: 100%;">
<?=$inviceres->office_ref_no;?>

<?=$inviceres->refno;?>
<table id="items-to">
<tr id="line">
	<td colspan="4">&nbsp;</td>
</tr>
<tr class="item-row-to">
<td><?=$inviceres->termandcondition;?></td>
<td></td>
</tr>
</table>

<div id="clear"></div>
<div id="line"></div>

</div>
</div>

</div>
</body>
</html>
