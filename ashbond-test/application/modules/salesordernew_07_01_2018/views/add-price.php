<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?php 
$idd=$_GET['view'];
$extract=explode("^",$idd);
$price=$extract[0];
$proid=$extract[1];
?>
<center>
<form method="post" action="costpriceupdate">
<table>
<h4>Do You Want To Update Your Cost Price</h4>

<tr>
<input type="hidden" name="productid" value="<?php echo $proid; ?>" />
<input type="hidden" name="getpricevalue" value="<?php echo $price; ?>" />
<td><input type="submit" name="" value="Yes" /></td><td></td>
<td><input type="button" onclick="pupclose()" value="No" /></td>
</tr>
</table>
</form>
<script>
function pupclose(){
window.close();
}
</script>
</center>
</body>
</html>
