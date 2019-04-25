<html>
<head>
<script language="Javascript" type="text/javascript">

function credit()
{
if(document.getElementById("enable").checked){
window.opener.document.getElementById("ab").value = document.getElementById("enable").value;
}else{window.opener.document.getElementById("ab").value ='0';}
if(document.getElementById("credit1").checked){
window.opener.document.getElementById("cd").value = document.getElementById("credit1").value;
}else{window.opener.document.getElementById("cd").value ='0';}
if(document.getElementById("credit2").checked){
window.opener.document.getElementById("ef").value = document.getElementById("credit2").value;
}else{window.opener.document.getElementById("ef").value ='0';}
if(document.getElementById("credit3").checked){
window.opener.document.getElementById("gh").value = document.getElementById("credit3").value;
}else{window.opener.document.getElementById("gh").value ='0';}
if(document.getElementById("credit4").checked){
window.opener.document.getElementById("ij").value = document.getElementById("credit4").value;
}else{window.opener.document.getElementById("ij").value ='0';}
if(document.getElementById("credit5").checked){
window.opener.document.getElementById("kl").value = document.getElementById("credit5").value;
}else{window.opener.document.getElementById("kl").value ='0';}
if(document.getElementById("credit6").checked){
window.opener.document.getElementById("mn").value = document.getElementById("credit6").value;
}else{window.opener.document.getElementById("mn").value ='0';}
if(document.getElementById("credit7").checked){
window.opener.document.getElementById("op").value = document.getElementById("credit7").value;
}else{window.opener.document.getElementById("op").value ='0';}

window.close();

}


</script>

</head>
<body>
<form action="" id="fg" method="post">
<table>
<?php
$queryAA=$this->db->query("select * from tbl_account");
$row=$queryAA->row();
?>
<input type='hidden' name='hiddenaccount' value="<?php echo $row->account_id;?>"/>
<tr>
	<td class="text-r"><input type="checkbox" id="enable" value="1" <?php if($row->enab_group_reference==1){?> checked="checked"<?php }if($row->enab_group_reference==0){ }?>/></td>
	<td>Enable grouping of Reference</td>
</tr>
<tr>	
	<td class="text-r"><input id="credit1" type="checkbox" value="1" <?php if($row->tag_bill_refe_group_with==1){?> checked="checked"<?php }if($row->tag_bill_refe_group_with==0){ }?>/></td>
	<td>Tag Bill Reference Group With</td>

</tr>
<tr>
	<td class="text-r"><input id="credit2" type="checkbox" value="1" <?php if($row->enforce_amount_alloct_references==1){?> checked="checked"<?php }if($row->enforce_amount_alloct_references==0){ }?>/></td>
	<td>Enforce Full amount alloction to References</td>
</tr>
<tr>	
	<td class="text-r"><input id="credit3" type="checkbox" value="1" <?php if($row->show_pen_till_vouch_date_only==1){?> checked="checked"<?php }if($row->show_pen_till_vouch_date_only==0){ }?>/></td>
	<td>Show Pending References till Voucher Date only</td>

</tr>
<tr>
	<td class="text-r"><input id="credit4" type="checkbox" value="1" <?php if($row->enable_bill_ref_narration==1){?> checked="checked"<?php }if($row->enable_bill_ref_narration==0){ }?>/></td>
	<td>Enable Bill References Narration</td>
</tr>
<tr>
	<td class="text-r"><input id="credit5" type="checkbox" value="1" <?php if($row->enable_by_bill_for_all_acco==1){?> checked="checked"<?php }if($row->enable_by_bill_for_all_acco==0){ }?>/></td>
	<td>Enable Bill by Bill for all Accounts</td>

</tr>
<tr>
	<td class="text-r"><input id="credit6" type="checkbox" value="1" <?php if($row->auto_party_Ref_sale_voucher==1){?> checked="checked"<?php }if($row->auto_party_Ref_sale_voucher==0){ }?>/></td>
	<td>Auto Create Party References in sales Voucher</td>
</tr>
<tr>	
	<td class="text-r"><input id="credit7" type="checkbox" value="1" <?php if($row->auto_party_ref_purch_voucher==1){?> checked="checked"<?php }if($row->auto_party_ref_purch_voucher==0){ }?>/></td>
	<td>Auto Create Party References in purchase Voucher</td>

</tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr>
	<td></td>
	<td><input type="button" onClick="credit()" value="Ok" /></td>
</tr>
</table>
</form>
</body>
</html>