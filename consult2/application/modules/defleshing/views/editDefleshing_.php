<?php
$tableName='tbl_product_stock';
$location='manage_production';
$this->load->view('softwareheader'); 
$hdrQuery=$this->db->query("select *from tbl_bill_of_material_hdr where bill_of_material_id_hdr='".$_GET['id']."'");
$getHdr=$hdrQuery->row();
?>

<h1>Update QA</h1>

<form  id="form1" method="post" action="qa_rejection">

<!--title close-->



<div class="container-right-text">

<div class="table-row">



 
 <table class="bordered" id="dataTables-example">
 
 <tr>
<th>Date</th><th>Machine Name</th><th>Shift</th><th>Finish Goods</th><th>Unit</th><th>Total Qty</th><th>Completed</th><th>Rejection</th><th>Status</th>
</tr> 
	
	 <?php 
	 @extract($_POST);
	 if($Show!='')
	 {
	$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='".$_GET['id']."' and shift='$shift'");
	}
	else
	{
	$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='".$_GET['id']."' and stage='WIP' ");
	}
	foreach($wipLogQuery->result() as $line){
	
	
	$machineQuery=$this->db->query("select *from tbl_machine where Machine_id='$line->machine_id'");
	$getMachine=$machineQuery->row();
	
	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->p_id'");
	$getproduct=$productQuery->row();
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	?>	
	<tr>
	
	<td>
	<input type="hidden" name="bom_id[]" value="<?php echo $_GET['id'];?>" />
	<input type="hidden" name="lot_no[]" value="<?php echo $line->lot_no; ?>" />
	<input type="hidden" name="wip_log_id[]" value="<?php echo $line->wip_log_id; ?>" />
	
	<input value="<?php echo $line->date; ?>" />
	 
	</td>
	<td>
	<input type="hidden" name="machine_id[]" value="<?php echo $line->machine_id; ?>" />
	<input type="text" name="" readonly value="<?php echo $getMachine->machinename; ?>"></td>
	
	<td>
	<input type="text" name="shift[]" readonly="" value="<?php echo $line->shift; ?>">
	</td>
	<td>
	<input type="hidden" name="p_id[]" value="<?php echo $getproduct->Product_id; ?>" />
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $getproduct->productname;?>">
	</td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $getunit->keyvalue; ?>"></td>
	
	<td><input type="text" name="totQty[]" readonly value="<?php echo $line->quantity; ?>"></td>
	<td><input type="text" name="com_qty[]" readonly value="<?php echo $line->quantity-$line->rejection_qty; ?>"></td>
	
	<td><input type="text" name="rejQty[]"  value=""></td>
	<td ><?php echo $line->rejection_status; ?></td>
	
	
	</tr>
<?php }?>
 </table>

<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">

<div class="paging-right">

<div class="actions-right">


<input type="submit" class="submit" name="sub" value="Update" />
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


var newqty=document.getElementById("newqty").value;
var rejection=document.getElementById("rejection").value;

	var scrap=document.getElementById("scrap").value;
	var p_id=document.getElementById("p_id").value;
	var lot_no=document.getElementById("lot_no").value;
	var machine_id=document.getElementById("machine_id").value;
	var shift_1=document.getElementById("shift").value;
	var actQty=document.getElementById("actQty").value;
	var id=<?php echo $_GET['id'];?>;
	var newqty=document.getElementById("newqty").value;
	var reqQty=document.getElementById("reqQty").value;
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
	var strURL="<?php echo base_url();?>production/insert_wip?id="+id+"&p_id="+p_id+"&machine_id="+machine_id+"&shift_1="+shift_1+"&actQty="+actQty+"&newqty="+newqty+"&scrap="+scrap+"&lot_no="+lot_no+"&rejection="+rejection;





		



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
	
	function scrapTot()
	{
	
	var totalScrap =document.getElementById("totalScrap").value;
	var newqty =document.getElementById("newqty").value;
	
	Tot=Number(newqty)*Number(totalScrap);
	document.getElementById("scrap").value=Tot;

	}
</script>
<?php $this->load->view('softwarefooter'); ?>