<?php
$tableName='tbl_product_stock';
$location='manage_production';
$this->load->view('softwareheader'); 
$hdrQuery=$this->db->query("select *from tbl_bill_of_material_hdr where bill_of_material_id_hdr='".$_GET['id']."'");
$getHdr=$hdrQuery->row();
?>

<h1>Update Moulding</h1>

<form  id="form1" method="post">

<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 { 

 if(@$_GET['id']==''){?>

 <td> <input name="save" type="submit" value="Save" class="submit" style="display:none" /> </td>



	  <?php }else {?>

      <td> <input name="edit" type="submit" value="Save" class="submit" style="display:none" /> </td>



	   <?php } }?>



<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">

<table class="bordered">

<thead>



<tr>

<th colspan="6">Update Moulding</th>        
</tr>
</thead>

<tr>

<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_wip_hdr where status='A' and wip_hdr_id='".$_GET['id']."' or wip_hdr_id='".$_GET['view']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!='' ){
 


  ?>         


<input type="hidden" name="Productss_id" class="span6 "value="<?php echo $branchFetch->wip_hdr_id;?>" readonly size="22" aria-required='true' />

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by wip_hdr_id desc limit 0,1");
$row = $query->row();

}
?>

<td class="text-r"><star>*</star>Product Type:</td>  
<td><select name="product_type"    <?php if(@$_GET['id']!=''){ ?> disabled="disabled" <?php }?> required>
            
              <option value="finish_goods"<?php  if($branchFetch->product_type=='finish_goods'){ ?> selected <?php } ?>>Finish Goods</option>
             
            </select>
 </td>
<td class="text-r"><star>*</star>
 Product Name:</td>     
       
	<td><select name="product_name" id="p_id" <?php if(@$_GET['id']!=''){ ?>  <?php }?> required>
					
				<?php 
							
							$Query=$this->db->query("select * from tbl_product_stock where sku_no='$getHdr->product_name' ");
							$getCycleTime=$Query->row();
							foreach($Query->result() as $fetchQ){

					?>
				<option value="<?php echo $fetchQ->Product_id; ?>" /><?php  echo $fetchQ->productname;  ?></option>
					<?php } ?>
			</select>
	  </td>

<td class="text-r"><star>*</star>
Lot No:</td> 			
<td><input type="text" name="lot_no" id="lot_no" value="<?php echo $getHdr->serial_no; ?>" readonly required/></td>	
</tr>        
<tr>
<td class="text-r"><star>*</star>
Machine Name:</td> 			
<td><select name="machine_name" id="machine_id" <?php if(@$_GET['id']!=''){ ?>  <?php }?> >
					
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_machine where Machine_id='$getHdr->machine_name'");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->Machine_id; ?>" <?php if($branchFetch->machine_name==$fetchQM->Machine_id){?> selected="selected"<?php }?> /><?php  echo $fetchQM->machinename;  ?></option>
					<?php } ?>
			</select>
 </td>
<td class="text-r"><star>*</star>
Date:</td> 			
<td><input type="date" name="date" id="date" value="<?php echo $branchFetch->date; ?>"  /></td>	

<td class="text-r"><star>*</star>
Shift:</td> 			
<td><select name="shift" id="shift" <?php if(@$_GET['id']!=''){ ?>  <?php }?> >
					<option value="">----Select----</option>
					<option value="1" <?php if($branchFetch->shift=='1'){ ?> selected="selected" <?php } ?>>1</option>
					<option value="2" <?php if($branchFetch->shift=='2'){ ?> selected="selected" <?php } ?>>2</option>
			</select>
 </td>

</tr>
<tr>
<td class="text-r"><star>*</star>
Supervisor:</td> 			
<td><select name="supervisor" id="supervisor"  >
					<option value="">----Select----</option>
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='3'");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->contact_id; ?>" /><?php  echo $fetchQM->first_name;  ?></option>
					<?php } ?>
			</select>
 </td>
<td class="text-r"><star>*</star>
Operator:</td> 			
<td><select name="operator"  id="operator" multiple="multiple" >
					<option value="">----Select----</option>
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='4'");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->contact_id; ?>" /><?php  echo $fetchQM->first_name;  ?></option>
					<?php } ?>
			</select></td>	

<td class="text-r"><star>*</star>
Hours:
<br />
Break Down Hours<br />
Break Down Reason<br />
Remarks</td> 			
<td><input type="number" step="any" min="1" name="hours" id="hours" /><br />

<input type="number" step="any" min="1" name="breakdown_hour" id="breakdown_hour" /><br />
<select name="brkdown_reason" id="brkdown_reason" <?php if(@$_GET['id']!=''){ ?>  <?php }?> >
					<option value="">--Select--</option>
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_master_data where param_id='17'");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->serial_number; ?>"  /><?php  echo $fetchQM->keyvalue;  ?></option>
					<?php } ?>
			</select>
			<br />
<input type="text"  name="brkdown_remaks" id="brkdown_remaks" />
 </td>

</tr>
<tr>
<td class="text-r"><star>*</star>Quantity</td>

<td><input name="qnty" type="number" id="actQty" required value="<?php echo $getHdr->quantity; ?>" readonly /></td>
<td>Required Qty<br />Completed Qty</td>
<?php
$cntQty=$this->db->query("select SUM(quantity) as qty,SUM(rejection_qty) as rejqty from tbl_wip_log where bom_id='".$_GET['id']."'");
$cntfetch=$cntQty->row();



?>
	<td ><input type="number" value="<?php echo ($getHdr->quantity+$cntfetch->rejqty)-$cntfetch->qty?>" id="reqQty" readonly=""  /><br /><input type="number" value="<?php echo $cntfetch->qty-$cntfetch->rejqty;?>" readonly=""  /></td>	
<td class="text-r">Enter Qty</td>
<td ><input type="number" name="newqty" id="newqty" onchange="scrapTot();" value="" placeholder="Enter Qty" /><br /><input type="number" id="scrap" value="" placeholder="Runner Qty" /><br /><input type="number" id="rejection" value="" placeholder="Rejection Qty" /><br /><input type="number" step="any" id="lumbs" value="" placeholder="Lumps Qty" /><br /><input type="number"  step="any" id="act_hour" value="" placeholder="Hours" readonly="" /></td>
		
	
</tr>

<tr>
<td class="text-r">&nbsp;</td>
<td>&nbsp;</td>
<td class="text-r">&nbsp;</td>
<td >&nbsp;</td>
		
	
	<td class="text-r"><input name="Show" type="submit" value="Show"  class="submit" /></td>	
	<td><input name="Show" type="button" value="Save"  class="submit" onclick="var el = document.getElementsByTagName('select')[5];addWIP(el);"/></td>
</tr>
</table>
<table class="bordered">

  <?php 
extract(@$_POST);
 	
	@$cybercodex_sql="select * from tbl_bill_of_material_dtl where bill_of_material_hdr_id='".$_GET['id']."'";

	@$mod_sql = $this->db->query($cybercodex_sql);
	
	?>
	 
	 <tr>
<th>Item Name</th><th>Unit</th><th>Quantity</th><th>Gross Weight</th><th>Net Weight</th><th>Runner Weight</th>
</tr> 
	
	 <?php 
		foreach (@$mod_sql->result() as $line)
			{
			$i=1;	
				$sum +=$i;
	?>	
	<tr>
	
	<td>
	<?php
	@$cybercodex_sql1="select * from tbl_product_stock where sku_no='$line->item_name'";
	@$mod_sql1 = $this->db->query($cybercodex_sql1);
	 @$mod_sql12=@$mod_sql1->row();
	 
	 $wipNewQty=$this->db->query("select * from tbl_wip_dtl where product_name='$line->bill_of_material_dtl_id' and lot_no='$branchFetch->lot_no'");
	$fetchWipNewQty=$wipNewQty->row();
	
	
	$q=$fetchWipNewQty->quentity;
	 $n=$fetchWipNewQty->new_quantity;
	 $enterq=$q-$n;
	
	
	 ?>
	 <input type="hidden" name="lot_id[]" readonly value="<?php echo $fetchWipNewQty->lot_no; ?>">
	 
	 <input type="hidden" name="product_id[]" readonly value="<?php echo $line->bill_of_material_dtl_id; ?>">
	 
		<input type="text" name="" readonly value="<?php echo $mod_sql12->productname; ?>">
	
	</td>
	<td><input type="text" name="unit[]" readonly value="<?php echo $line->unit; ?>"></td>
	
	<td>
	<input type="text" name="total_quantity[]" id="available_quantity<?php echo $sum; ?>" readonly="" value="<?php echo $line->quentity; ?>">
	</td>
	<td>
	<input type="text" name="net_weight[]" readonly value="<?php echo $line->net_weight; ?>KG">
	</td>
	<td><input type="text" name="gross_weight[]"  readonly value="<?php echo $line->gross_weight;?>KG"></td>
	<td><input type="text" name="scrap_weight[]" readonly value="<?php echo $line->scrap_weight; ?>KG"></td>
	
	</tr>
	
			<?php
			
			$scrapSum=$scrapSum+$line->scrap_weight;
			$weightSum=$weightSum+$line->net_weight;
			$i++;
			 }
			 $scrapSum;
		?>	
		
<input type="hidden" id="submitval" name="rowiddd" value="<?php echo $sum; ?>">
 
 <input type="hidden" id="totalScrap" value="<?=$scrapSum;?>" />
 
 
 	
 </table>
 
 <table class="bordered">
 <tr style="border-bottom:#fff solid 1px">
<th colspan="15">Work In Progress</th>
 </tr>
 <tr>
<th>Date</th><th>Finish Goods</th><th>Unit</th><th>Machine Name</th><th>Shift</th><th>Supervisor</th><th>Operator</th><th>Hours</th><th>Act Hours</th><th>Total Qty</th><th>Completed</th><th>Runner Weight</th><th>Lumps</th><th>Rejection</th><th>Stage</th>
</tr> 
	
	 <?php 
	 @extract($_POST);
	 if($Show!='')
	 {
	$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='".$_GET['id']."' and shift='$shift'");
	}
	else
	{
	$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='".$_GET['id']."' ");
	}
	foreach($wipLogQuery->result() as $line){
	
	
	$machineQuery=$this->db->query("select *from tbl_machine where Machine_id='$line->machine_id'");
	$getMachine=$machineQuery->row();
	
	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->p_id'");
	$getproduct=$productQuery->row();
	$supervisorQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->supervisor'");
	$getSupervisor=$supervisorQuery->row();
	
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	?>	
	<tr>
	
	<td>
	<input value="<?php echo $line->date; ?>" />	</td>
	<td>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $getproduct->productname;?>">	</td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $getunit->keyvalue; ?>"></td>	
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $getMachine->machinename; ?>"></td>
	<td>
	<input type="text" name=""readonly="" value="<?php echo $line->shift; ?>">	</td>
	<td>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $getSupervisor->first_name;?>">	</td>
	<td>
	<?php
	 $dataID=$line->operator;
	//print_r($dataID);
	$operatorQuery=$this->db->query("select *from tbl_contact_m where  contact_id in ($dataID)");
	foreach ($operatorQuery->result() as $getOperator){
	?>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $getOperator->first_name;?>">
	<?php }?>	</td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $hour=$line->hours; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $actHour=$line->act_hour; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $getHdr->quantity; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $compl=$line->quantity-$line->rejection_qty." ".$getunit->keyvalue; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $runner=$line->scrap; ?> &nbsp;KG"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $line->lumbs; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $reg=$line->rejection_qty." ".$getunit->keyvalue; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $line->stage; ?>"></td>
	</tr>
<?php 
$regSum=$regSum+$reg;
$CompSum=$CompSum+$compl;
$RunnerSum=$RunnerSum+$runner;
$HourSum=$HourSum+$hour;
$ActSum=$ActSum+$actHour;
$rawMatTot=$regSum*$weightSum;


}?>

 <tr>
<th>&nbsp;</th><th>Total Qty</th><th><?php echo $getHdr->quantity; ?></th><th>Completed Qty</th><th><?=$CompSum;?></th><th>Rejected Qty</th><th><?=$regSum;?></th><th>Total Runner</th><th><?=$RunnerSum/100?></th><th>Hours Taken</th><th><?=$HourSum;?></th><th>Act Hours</th><th><?=$ActSum; ?></th><th>Total Raw Materail</th><th><?php echo $rawMatTot;?></th>
</tr> 
 </table>

<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">

<div class="paging-right">

<div class="actions-right">

<?php 

 if(@$_GET['view']!='' ){

 

 }

 else

 {

if(@$_GET['id']==''){?>


 <td> <input name="save" type="submit" value="Save" class="submit" onClick="submitfun();" style="display:none" /> </td>

 <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" onClick="submitfun();" style="display:none" /> </td>



	      <?php }}?>

<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>
	   
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


function addWIP(select) {	

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
	var date=document.getElementById("date").value;
	var operator=document.getElementById("operator").value;
	var supervisor=document.getElementById("supervisor").value;
	var hours=document.getElementById("hours").value;
	var lumbs=document.getElementById("lumbs").value;
	var act_hour=document.getElementById("act_hour").value;
	var breakdown_hour=document.getElementById("breakdown_hour").value;
	var brkdown_remaks=document.getElementById("brkdown_remaks").value;
	var brkdown_reason=document.getElementById("brkdown_reason").value;



	if(machine_id=='')
	{
	alert("Please select Machine Name ");
	document.getElementById("machine_id").focus();
	return false;


	
	}

	

	if(date=='')
	{
		alert("Please select date  ");
	document.getElementById("date").focus();
	return false;

	
	}
	if(shift_1=='')
	{
	alert("Please select Shift  ");
	document.getElementById("shift_1").focus();
	return false;


	
	}
	if(supervisor=='')
{
alert("Please select Supervisor ");
	document.getElementById("supervisor").focus();
	return false;
}

if(hours=='')
{
alert("Please enter hours");
	document.getElementById("hours").focus();
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


 var result = [];
  var options = select && select.options;
  var opt;

  for (var i=0, iLen=options.length; i<iLen; i++) {
    opt = options[i];

    if (opt.selected) {
      result.push(opt.value || opt.text);
    }
  }
  
 var operator=result;
 
 if(operator=='')
 {
alert("Please select Operrator");
	document.getElementById("scrap").focus();
	return false;
 
 
 }

alert("added sucessfully");

window.location.reload(true);
	var strURL="<?php echo base_url();?>production/insert_wip?id="+id+"&p_id="+p_id+"&machine_id="+machine_id+"&shift_1="+shift_1+"&actQty="+actQty+"&newqty="+newqty+"&scrap="+scrap+"&lot_no="+lot_no+"&rejection="+rejection+"&date="+date+"&operator="+operator+"&supervisor="+supervisor+"&hours="+hours+"&lumbs="+lumbs+"&act_hour="+act_hour+"&breakdown_hour="+breakdown_hour+"&brkdown_remaks="+brkdown_remaks+"&brkdown_reason="+brkdown_reason;



//window.close();

		



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
	
	var varCycleTime ='<?php echo $getCycleTime->cycle_time?>';
	var scrapVat= totalScrap;
	
	Tot=Number(newqty)*Number(scrapVat)/1000;
	getCycleTimeTot=(Number(newqty)*Number(varCycleTime)/3600);
	document.getElementById("act_hour").value=Number((getCycleTimeTot).toFixed(2));

	document.getElementById("scrap").value=Tot;

	}
/*	
function getSelectValues(select) {
  var result = [];
  var options = select && select.options;
  var opt;

  for (var i=0, iLen=options.length; i<iLen; i++) {
    opt = options[i];

    if (opt.selected) {
      result.push(opt.value || opt.text);
    }
  }
  
  return result;
}*/	
</script>
<?php $this->load->view('softwarefooter'); ?>