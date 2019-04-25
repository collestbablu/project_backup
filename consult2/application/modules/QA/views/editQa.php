<?php
$tableName='tbl_product_stock';
$location='manage_production';
$this->load->view('softwareheader'); 
$hdrQuery=$this->db->query("select *from tbl_defleshing_hdr where wip_hdr_id='".$_GET['id']."'");
$line=$hdrQuery->row();
?>

<h1>Update QA</h1>

<form  id="form1" method="post" action="qa_rejection">

<div class="container-right-text">
<div class="table-row">
 <table class="bordered" id="dataTables-example">
 <tr>
<th>Date</th><th>Finish Goods</th><th>Unit</th><th>Total Qty</th><th>Completed Qty</th><th>Enter Completed Qty</th><th>Rejected Qty</th><th>Enter Rejected Qty</th>
</tr> 
	
	 <?php 
	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->product_name'");
	$getproduct=$productQuery->row();
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	?>	
	<tr>
	
	<td>
	
	<input type="text" name="lot_no" id="lot_no" value="<?php echo $line->lot_no; ?>" readonly="" style="display:none" />	
	<input value="<?php echo $line->date; ?>" id="date" name="date" readonly="" />
	 
	</td>
	<?php
	$qaQuery=$this->db->query("select SUM(rejection_qty) as rejQty,SUM(quantity) as comQty from tbl_qa_log where lot_no='$line->lot_no'");
	$getData=$qaQuery->row();
	
	?>
	<td>
	<input type="hidden" name="p_id" value="<?php echo $getproduct->Product_id; ?>" id="p_id" readonly="" />
	<input type="text" name="p_idp" value="<?php echo $getproduct->productname; ?>" id="p_id" readonly="" />
	
	</td>
	<td><input type="text" name="net_weight" readonly value="<?php echo $getunit->keyvalue; ?>"></td>
	<?php 
	
//	echo $getData->comQty+$getData->lot_no;
	
	 ?>
	<td><input type="text" name="totQty" id="totQty" readonly value="<?php echo $line->quantity; ?>"></td>
	
	<td><input type="number" name="com_qty1" id="com_qty1" readonly="" value="<?php echo $getData->comQty; ?>" >
	<td><input type="number" name="com_qty" id="com_qty" onkeyup="checkqty(this.value)" value="" >
    <p id="error" style="display:none; font-size:12px">*Completed Qty Not Greater Than Remaining Qty.</p></td>
	
	<td><input type="text" name="rejQty1" id="rejQty1" readonly value="<?php echo $getData->rejQty; ?>"></td>	
	<td><input type="number" name="rejQty" id="rejQty" onkeyup="checkqty111(this.value)" value="" >
	<p id="error1" style="display:none; font-size:12px">*Rejected Qty Not Greater Than Remaining Qty.</p></td>
	
	
	
	</tr>

 </table>

<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">

<div class="paging-right">

<div class="actions-right">

<input type="button" class="submit" name="sub" id="sub" value="Update" onclick="fsv(this)" />

</div><!--paging-right close-->
</div><!--paging-row close-->
</div><!--table-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
</form>

<table class="bordered">
 <tr style="border-bottom:#fff solid 1px">
<th colspan="15">Log</th>
 </tr>
 <tr>
<th>Date</th><th>Finish Goods</th><th>Unit</th><th>Completed Qty</th><th>Rejected Qty</th>
</tr> 
	
	 <?php 
	 @extract($_POST);
	
	$compedqty='';
	$rejqtysum='';
	$wipLogQuery=$this->db->query("select * from tbl_qa_log where stage='QA' and lot_no='".$line->lot_no."' ");
	
	foreach($wipLogQuery->result() as $linedddd){
		
	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$linedddd->p_id'");
	$getproduct=$productQuery->row();
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	?>	

	<tr>
	
	<td>
	<input value="<?php echo $linedddd->date; ?>" />	</td>
	<td>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $getproduct->productname;?>">	</td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $getunit->keyvalue; ?>"></td>	
	<td>
	<input type="text" name=""readonly="" value="<?php echo $linedddd->quantity; ?>">	</td>
	<td>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $linedddd->rejection_qty;?>">	</td>
		
	</tr>
<?php
	$compedqty +=$linedddd->quantity;
	$rejqtysum +=$linedddd->rejection_qty;

 } ?>

 <tr>
<th>Total Qty &nbsp;= &nbsp; <?php echo $line->quantity; ?></th><th>Total Completed Qty &nbsp;= &nbsp; <?=$compedqty;?></th><th>Total Rejected Qty &nbsp;= &nbsp; <?=$rejqtysum;?></th><th>Remaining Qty &nbsp;=&nbsp;<?php echo $remainqty=$line->quantity - $compedqty - $rejqtysum;?></th><th><input type="hidden" name="remnqty" id="remnqty" value="<?php echo $remainqty; ?>" readonly="" /></th>
</tr> 
 </table>
 <script>

function fsv(v)
{
	//alert();
	var compqty11=document.getElementById("com_qty").value;
	var rejQty11=document.getElementById("rejQty").value;
	if(compqty11 != '' || rejQty11 != '')
	{
		v.type="submit";
	}
	else
	{
		alert('Nothing To Update');
	}
	
}

function checkqty(v){
	
	var compqty=document.getElementById("com_qty").value;
	var rmnqty=document.getElementById("remnqty").value;

	if(Number(compqty)>Number(rmnqty)){
		document.getElementById("error").style.display= "Block";
		document.getElementById("sub").disabled = true;
	}else{
		document.getElementById("error").style.display= "None";
		document.getElementById("sub").disabled = false;
	}
}

function checkqty111(){
	
	var rejQty=document.getElementById("rejQty").value;
	var rmnqty1=document.getElementById("remnqty").value;

	if(Number(rejQty)>Number(rmnqty1)){
		document.getElementById("error1").style.display= "Block";
		document.getElementById("sub").disabled = true;
	}else{
		document.getElementById("error1").style.display= "None";
		document.getElementById("sub").disabled = false;
	}
}


function submitfun(){

var submitval=document.getElementById("submitval").value;
for(var i=1;i<=submitval;i++)
{

var req=document.getElementById("required_quantity"+i).value;
var ent=document.getElementById("enter_quantity"+i).value;
//alert(ent);
var avl=document.getElementById("available_quantity"+i).value;
//alert(avl);
var equl=Number(avl)-Number(ent);
//alert(equl);
if(Number(ent)>=Number(req))
{


}
else
{
var ab='1';

}

}

if(ab=='1')
{
alert("Quantity Is Less Then New Quantity");
}
else
{
//alert("ss");
document.getElementById("form1").action="insert_production_stock_out"; // Setting form action to "role_function_permision" page
document.getElementById("form1").submit();
}
}


function addWIP() {	

var rejection=document.getElementById("rejQty").value;
	var p_id=document.getElementById("p_id").value;
	var lot_no=document.getElementById("lot_no").value;
var scrap=document.getElementById("scrap").value;
	if(machine_id=='')
	{
	alert("Please select Machine Name ");
	document.getElementById("machine_id").focus();
	return false;


	
	}
	if(shift_1=='')
	{
	alert("Please select Shift  ");
	document.getElementById("shift_1").focus();
	return false;

	}
	
	
	if(newqty=='')
	{
	alert("Please enter new qty");
	document.getElementById("newqty").focus();
	return false;
	}
	
	
	if(Number(reqQty)<Number(newqty))
	{
	alert("Qty should be less then required qty");
	document.getElementById("newqty").focus();
	return false;
	}

	if(scrap=='')
	{
	alert("Please enter scrap qty");
	document.getElementById("scrap").focus();
	return false;
	
	}

alert("added sucessfully");
window.location.reload(true);
	var strURL="<?php echo base_url();?>QA/insert_wip?id="+id+"&p_id="+p_id+"&actQty="+actQty+"&newqty="+newqty+"&scrap="+scrap+"&lot_no="+lot_no+"&rejection="+rejection;

		var req = getXMLHTTP();
		if (req) {

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {

						//alert(req.responseText);

						document.getElementById('cartDiv').innerHTML=req.responseText;						

					} else {

						//alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}
	}
	
</script>
<?php $this->load->view('softwarefooter'); ?>