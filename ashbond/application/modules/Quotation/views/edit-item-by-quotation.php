<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<h4>Edit Quotation Item</h4>
<?php 
$idd=$_GET['view'];
$query_dtl=$this->db->query("select * from tbl_quotation_dtl where quotation_id_dtl='$idd'");
$query_fetch_dtl=$query_dtl->row();

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$query_fetch_dtl->product_id'");
			$pfetch=$productQ->row();

?>
<center>
<form method="post" action="editquotationitem">
<input type="hidden" name="quotation_id_dtl" value="<?php echo $idd;?>" readonly="readonly" />
<input type="hidden" name="quotation_id" value="<?php echo $query_fetch_dtl->quotation_id;?>" readonly="readonly" />
<div style="width:190%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
<table style="width:95%;  background:#dddddd;  height:10px;">
<tr>
	<td><div align="center"><u>Product</u></div></td>
    <td><div align="center"><u>Description</u></div></td>
	<td> <div align="center"><u>Selling Price</u></div></td>
	<td><div align="center"><u>Quantity</u></div></td>
	<td> <div align="center"><u>Unit</u></div></td>
	<td> <div align="center"><u>Discount</u></div></td>
    <td> <div align="center"><u>Dis.Amt</u></div></td>
	<td><div align="center"><u>Remark</u></div></td>
	<td><div align="center"><u>Total</u></div></td>			
	<td><div align="center"><u>Net Price</u></div></td>
</tr>
<tr>
    <td><input type="text" name="" value="<?php echo $pfetch->productname;?>" readonly="readonly" /></td>
    <td><textarea name="desss" id="desssid"  style="width: 259px; margin: 0px; height: 26px;"><?php echo $query_fetch_dtl->description;?></textarea></td>
    <td><input type="number" name="sellingprice_name" id="sellingpriceid" onkeyup="selling()" value="<?php echo $query_fetch_dtl->list_price;?>" /></td>
    <td><input type="number" name="qty_name" id="qtyid" onkeyup="selling()" value="<?php echo $query_fetch_dtl->quantity;?>" /></td>
    <td><input type="text" name="" value="<?php echo $query_fetch_dtl->unit;?>" readonly="readonly"  /></td>
    <td><input type="number" name="disc_name" id="discid" onkeyup="selling()" value="<?php echo $query_fetch_dtl->per_discount;?>" /></td>
    <td><input type="text" name="disc_amt_name" id="disc_amt_id" value="<?php echo $query_fetch_dtl->discountamount;?>" readonly="readonly" /></td>
    <td><input type="text" name="remark_name" value="<?php echo $query_fetch_dtl->remark;?>" /></td>
    <td><input type="text" name="total_name" id="totalid" value="<?php echo $query_fetch_dtl->total;?>" readonly="readonly" /></td>
    <td><input type="text" name="net_name" id="netid" value="<?php echo $query_fetch_dtl->net_price;?>" readonly="readonly" /></td>
    
    <input type="hidden" name="" id="prenetid" value="<?php echo $query_fetch_dtl->net_price;?>" readonly="readonly" />
    <input type="hidden" name="" id="subid" value="<?php echo $query_fetch_dtl->sub_total;?>" readonly="readonly" />
    <input type="hidden" name="sub_name" id="subtoid" value="<?php echo $query_fetch_dtl->sub_total;?>" readonly="readonly" />
    <input type="hidden" name="" id="grandid" value="<?php echo $query_fetch_dtl->grand_total;?>" readonly="readonly" />
    <input type="hidden" name="grand_name" id="grandtoid" value="<?php echo $query_fetch_dtl->grand_total;?>" readonly="readonly" />
</tr>
</table>
</div>
<table>
<tr>
<td>&nbsp;</td><td></td>
</tr>
<tr>
<td><input type="submit" name="" value="Save" /></td><td></td>
<td><input type="button" onclick="pupclose()" value="Cancel" /></td>
</tr>
</table>
</form>
<script>
function selling(){

 var sellid=document.getElementById("sellingpriceid").value;
 var qtyid=document.getElementById("qtyid").value;
 var discid=document.getElementById("discid").value;
  
  var totalq=Number(sellid)*Number(qtyid);
  	
	dispr=(totalq*discid)/100;
	//alert(dispr);	
	subdis=totalq-dispr;
	document.getElementById("disc_amt_id").value=dispr;
	document.getElementById("totalid").value=totalq;
	document.getElementById("netid").value=subdis;
	
var prenetamt=document.getElementById("prenetid").value;
var netamt=document.getElementById("netid").value;
var subid=document.getElementById("subid").value;
var grandid=document.getElementById("grandid").value;	

var subtractamttot=Number(subid)-Number(prenetamt);
var sub_samamttot=Number(subtractamttot)+Number(netamt);
document.getElementById("subtoid").value=sub_samamttot;

var grandamttot=Number(grandid)-Number(prenetamt);
var grand_samamttot=Number(grandamttot)+Number(netamt);
document.getElementById("grandtoid").value=grand_samamttot;

}
</script>
<script>
function pupclose(){
window.close();
}
</script>
</center>
</body>
</html>
