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

<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>/assets/latter_head_css/css/invoice-to.css' />
</head>

<body>

<div id="page-wrap">
<div id="customer">
<div id="customer-right">
<img id="image" src="<?php echo base_url();?>assets/po_css/images/logo.png" alt="logo"  />
</div>

<div id="customer-left">
<?=$inviceres->office_ref_no;?>
<b><?=$inviceres->refno;?></b>
  <div id="clear"></div>
  <div id="line"></div>
  
<?php $date_in=explode("-",$inviceres->date); 
  $monthNum  = $date_in[1];
  $dateObj   = DateTime::createFromFormat('!m', $monthNum);
  $monthName = $dateObj->format('F');	  echo $date_in[2].'-'.$monthName.'-'.$date_in[0]; ?>
<div id="clear"></div>
  <div id="line"></div>
  
<strong>To</strong>
<div id="clear"></div>
<div id="line"></div>

<?php 
echo $fetchrecords->first_name." ".$fetchrecords->middle_name." ".$fetchrecords->last_name;?></strong><br />
<?php  $newout= array();
echo  $outtext=  $fetchrecords->address1;
?>
<div id="clear"></div>
  <div id="line"></div>

Kind Attn.<strong>: <?=$fetchkind->p_name;?></strong>
<div style="clear:both"></div>
Sub.<strong>: <?=$inviceres->subject;?></strong>
</div>
</div>

<div style="clear:both"></div>

<!--<div id="customer-row">
Ref.: <?=$inviceres->refno;?>-->
<div style="clear:both"></div>
<table id="items-to">
<tr class="item-row-to">
<td><?=$inviceres->termandcondition;?></td>
<td></td>
</tr>
</table>

</div>
</body>
</html>
