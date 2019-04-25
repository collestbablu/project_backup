<?php
$tableName='tbl_product_stock';
$location='manage_production';
$this->load->view('softwareheader'); 
$hdrQuery=$this->db->query("select *from tbl_qa_hdr where lot_no='".$_GET['id']."'");
$line=$hdrQuery->row();

$billHdr=$this->db->query("select *from tbl_bill_of_material_hdr where serial_no='".$_GET['id']."'");
$getBillHdr=$billHdr->row();


$queryHdr=$this->db->query("select *from tbl_qa_hdr where lot_no='".$_GET['id']."'");
$cntData=$queryHdr->num_rows();
$getQueryHdr=$queryHdr->row();


$queryPackingHdr=$this->db->query("select *from tbl_packing_hdr where lot_no='".$_GET['id']."'");

$getqueryPackingHdr=$queryPackingHdr->row();

?>

<h1>Update Packing</h1>

<form  id="form1" method="post" action="qa_rejection">

<!--title close-->



<div class="container-right-text">

<div class="table-row">


<?php if($cntData>0){?>
 
 <table class="bordered" id="dataTables-example">
 
 <tr>
<th>Date</th><th>Finish Goods</th><th>Unit</th><th>Total Qty</th><th>Status</th>
</tr> 
	
	 <?php 
	
	
	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->product_name'");
	$getproduct=$productQuery->row();
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	?>	
	<tr>
	
	<td>
	
	<input type="text" name="lot_no" id="lot_no" value="<?php echo $line->lot_no; ?>" readonly="" />
	
	
	<input value="<?php echo $line->date; ?>" id="date" name="date" style="display:none" />
	 
	</td>
	<?php
	$qaQuery=$this->db->query("select SUM(rejection_qty) as rejQty,SUM(quantity) as comQty from tbl_qa_hdr where lot_no='$line->lot_no'");
	$getData=$qaQuery->row();
	
	?>
	<td>
	<input type="text" name="p_id" value="<?php echo $getproduct->Product_id; ?>" id="p_id" readonly="" />
	
	</td>
	<td><input type="text" name="net_weight" readonly value="<?php echo $getunit->keyvalue; ?>"></td>
	
	<td><input type="text" name="comQty" readonly value="<?php echo $line->quantity-$line->rejection_qty; ?>"></td>
	<td><input type="text" name="comQty1" readonly value="<?php echo $getqueryPackingHdr->status; ?>" /></td>
	
	
	
	</tr>

 </table>
<?php } else {?>No Record Found <?php }?>
<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">

<div class="paging-right">

<div class="actions-right">
<?php

if($getqueryPackingHdr->status=='Packing Done' or $cntData=='0'){?>

<a onClick="window.close()">Close</a>
<?php } else {?>
<input type="submit" class="submit" name="sub" value="Update" />
<?php }?>
</form>
	   
</div><!--paging-right close-->
</div><!--paging-row close-->
</div><!--table-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
 
 <script>

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
	var strURL="<?php echo base_url();?>packing/insert_wip?id="+id+"&p_id="+p_id+"&actQty="+actQty+"&newqty="+newqty+"&scrap="+scrap+"&lot_no="+lot_no+"&rejection="+rejection;





		



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