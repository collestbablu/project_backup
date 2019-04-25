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

<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>/assets/latter_head_css/css/invoice-to.css' />
</head>

<body>

<div id="page-wrap">
<div id="customer">


<div style="clear:both"></div>
<div id="customer-left" style="width: 100%;">
<?=$inviceres->office_ref_no;?>

<b><?=$inviceres->refno;?></b>
<div id="clear"></div>
<div id="line"></div>
<table id="items-to">
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
