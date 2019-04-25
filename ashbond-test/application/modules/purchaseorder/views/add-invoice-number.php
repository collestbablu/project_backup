<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
@font-face{font-family: Lobster;src: url('Lobster.otf');}
body{margin:0px auto;}
.space{margin-bottom: 4px;}
.txt{width:250px;border:1px solid #00BB64; height:30px;border-radius:3px;font-family: Lobster;font-size:20px;color:#00BB64;}
#advice{
     width:83%!important;
    height: auto;
    margin:auto;
	}
</style>
<script src='<?php echo base_url();?>assets/js/jquery-1.9.1.min.js'></script>
</head>
<body>
<?php 
$idd=$_GET['view'];
$extract=explode("^",$idd);
$price=$extract[0];
$proid=$extract[1];
?>
<center>
<form method="post" action="updateInvoice">
<tbody>
<h1>Add Invoice No.</h1>
	

<div id="advice">
 
  <table>
  <table class="bordered">
<tbody>

<tr>
<th style="width: 25%;">Invoice No.</th>
<th style="width: 70%;">Date</th>
<input type="hidden" name="po_iddd" value="<?php echo $_GET['addInvoice']; ?>" />
</tr>

</tbody>    
</table>
<div class="button_pro" style="width:400px;">

<?php 
	
	$sql =$this->db->query("select * from tbl_po_invoice_no where po_id ='".$_GET['addInvoice']."'");
	$num= $sql->num_rows();
	
	if($num >0){
	
	foreach($sql->result() as $resultname){
	
?>
<input type="hidden" name="po_in_id[]" value="<?php if($resultname->po_invoice_id!=''){ echo $resultname->po_invoice_id; } ?>" />

	<div class='space' id='input_1' style="width:94%;">
		<input id="input_1" style="width:35%;" type="text" name="val[]" class='left txt' value="<?php echo $resultname->invoice_no; ?>"/>&nbsp;<input id="input_1" style="width:48%;" type="date" name="valemail[]" class='left txt' value="<?php echo $resultname->invoice_date; ?>"/>&nbsp;<img src="<?php echo base_url();?>assets/image_icon/remove.png" style="width:20px;float: none;" class="removeffs"/>&nbsp;<img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" />
	</div>
<?php } }else{ ?>

	<div class='space' id='input_1' style="width:94%;">
		<input id="input_1" style="width:35%;" type="text" name="val[]" class='left txt' />&nbsp;<input id="input_1" style="width:48%;" type="date" name="valemail[]" class='left txt' />&nbsp;<img src="<?php echo base_url();?>assets/image_icon/remove.png" style="width:20px;float: none;" class="removeffs"/>&nbsp;<img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" />
	</div>
<?php } ?>	
   </div>
 <br />
<tr>
<td><input type="submit" name="" value="Save" />&nbsp;&nbsp;<input type="button" onclick="pupclose()" value="Cancel" /></td>
<td>&nbsp;</td>
</tr>
	</table>

</div>
</tbody>
<script>
$('document').ready(function(){
    var id=3,txt_box;
	$('.button_pro').on('click','.add',function(){
		  $(this).remove();
		  txt_box='<div class="space" style="width:94%;" id="input_'+id+'" ><input style="width:35%;" type="text" name="val[]" class="left txt"/>&nbsp<input type="date" name="valemail[]" style="width:48%;" class="left txt"/>&nbsp;<img src="<?php echo base_url();?>assets/image_icon/remove.png" style="width:20px;float: none;" class="remove"/><img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" /></div>';
		  $(".button_pro").append(txt_box);
		  id++;
	});

	$('.button_pro').on('click','.remove',function(){
	        var parent=$(this).parent().prev().attr("id");
			var parent_im=$(this).parent().attr("id");
			$("#"+parent_im).slideUp('medium',function(){
				$("#"+parent_im).remove();
				if($('.add').length<1){
					$("#"+parent).append('<img src="<?php echo base_url();?>assets/image_icon/add.png" style="width:20px;float: none;" class="add right"/> ');
				}
			});
			});


});
</script>
</form>
<script>
function pupclose(){
window.close();
}
</script>
</center>
</body>
</html>
