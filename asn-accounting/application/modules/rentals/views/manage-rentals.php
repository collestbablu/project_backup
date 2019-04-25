<?php
$this->load->view("header.php");
?>
	 <!-- Main content -->
	 <div class="main-content">
<form class="form-horizontal" role="form" method="post" action="insert_rent" enctype="multipart/form-data">			
			<ol class="breadcrumb breadcrumb-2"> 
<li><a href="index.html"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="#">Rental</a></li> 
<li class="active"><strong>Rental List</strong></li>
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0">Add Rental</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg" style="width:1200px;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Rentale</h4>
</div>
<div class="table-responsive">
<INPUT type="button" value="Add Row" class="btn btn-sm" onclick="addRow('dataTable')" />

	<INPUT type="button" class="btn btn-secondary btn-sm" value="Delete Row" onclick="deleteRow('dataTable')" />
<table class="table table-striped table-bordered table-hover" id="dataTable" >
<tbody>
<tr class="gradeA">
<th>Check</th>
<th>Date</th>
<th>Rental Name</th>
<th>Location</th>
<th >Amount</th>
<th >GST% </th>
<th >GST Amount</th>
<th >TDS%</th>
<th >TDS Amount</th>


<th >Rent Amount</th>
<th>Remarks</th>

<th >Payment Mode</th>
<th id="cheque_dateE" style="display:none" >Cheque Date</th>
<th id="cheque_numberR" style="display:none" >Cheque Number</th>

<th id="paid_toO" style="display:none">Paid To</th>
</tr>

<tr class="gradeA">
<th >
<input type="checkbox" name="chkbox[]"  />


</th>

<th>


<input type="date" name="date[]"       class="form-control" >
</th>

<th>

<select name="rentale_id[]" class="form-control" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='8'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->contact_id;?>"><?=$fetch_protype->first_name;?></option>

<?php }?>
</select>
</th>

<th>

<select name="loc_id[]" class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_master_data where param_id='21'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->serial_number;?>"><?=$getPaymentMode->keyvalue;?></option>

<?php }?>
</select>

</th>
<th ><input type="number" id="amount1" class="form-control" name="amount[]"  /></th>


<th >
<input type="number" id="gstper1" onchange="gst_Cal(this.id);" step="any" min="0"   name="gstper[]"   class="form-control"> 
</th>

<th >
<input type="number" id="gst_amount1" onchange="cal(this.id);" step="any" min="0"   name="gst_amount[]"   class="form-control"> 
</th>

<th >
<input type="number"  id="tdsper1" onchange="cal(this.id);" min="0" maax="100" class="form-control" name="tdsper[]" />

</th>


<th >
<input type="number" id="tds_amount1" readonly="readonly" onchange="cal(this.id);" step="any" min="0"   name="tds_amount[]"   class="form-control"> 
</th>

<th >
<input type="number" id="rent_amount1"  step="any" min="0"   name="rent_amount[]"   class="form-control"> 
</th>


<th >
<input type="text" style="width:250px;"    name="remarks[]"   class="form-control"> 
</th>


<th >


<select name="payment_mode[]" id="pay1" onchange="show(this.id)"  class="form-control">

<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_master_data where param_id='19'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>



<option value="<?=$getPaymentMode->serial_number;?>"><?=$getPaymentMode->keyvalue;?></option>

<?php }?>
</select></th>

<th id="cheque_date1" style="display:none">
<input type="date"    name="cheque_date[]"   class="form-control"> 

</th>

<th id="cheque_number1" style="display:none">
<input type="number" step="any" min="0"   name="cheque_number[]"   class="form-control"> 

</th>


<th id="paid_to1"  style="display:none">
<input type="text"    name="paid_to[]"   class="form-control"> 

</th>

</tr>
</tbody>
</table>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<a href="#/" class="btn btn-secondary btn-sm delete_all"><i class="fa fa-trash-o"></i> Delete</a>
</div>
</ol>
</form>	
<?php
            if($this->session->flashdata('flash_msg')!='')
{
            ?>
<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php }?>		
			<div class="row">
				<div class="col-lg-12">
						<div class="panel-body">
							<div class="table-responsive">
			<form class="form-horizontal" method="post" action="update_item"  enctype="multipart/form-data">					
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	   <th>Date </th>
       <th>Rental Name</th>
       <th>Location</th>
      <th>Amount</th>
		<th>GST%</th>
        <th>GST Amount</th>
        <th>TDS%</th>
        
        <th>TDS Amount</th>
		
		   <th>Rent Amount</th>
           <th>Payment Mode</th>
		 <th>Action</th>
</tr>
</thead>

<tbody>
<?php  
$i=1;
  foreach($result as $fetch_list)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->id; ?>">
<th >
<?php
										//$productId= $fetch_list->Product_id;

										//$checkProduct=$productId;
  // if($checkProduct=='1')
//{
?><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->id; ?>" value="<?php echo $fetch_list->id;?>" />
<?php //} else{
	?>

 	
<?php //}?>
</th>

<th><?=$fetch_list->date;?></th>
<?php
$contactQuery=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->rentale_id'");
$getContact=$contactQuery->row();
?>

<th><?=$getContact->first_name;?></th>
<?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->loc_id'");
$getPayment=$paymentQuery->row();
?>
<th><?=$getPayment->keyvalue;?></th>
<th><?=$fetch_list->amount;?> </th>
<th><?=$fetch_list->tdsper;?> </th>
<th><?=$fetch_list->tds_amount;?></th>
<th><?=$fetch_list->gstper;?></th>
<th><?=$fetch_list->gst_amount;?></th>
<th><?=$fetch_list->rent_amount;?></th>

<?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->payment_mode'");
$getPayment=$paymentQuery->row();
?>

<th><?=$getPayment->keyvalue;?></th>
<th class="bs-example">
<?php if($view!=''){ ?>

<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i;?>" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" data-a="<?php echo $fetch_list->id;?>" href='#editItem' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='id';
$table_name='tbl_rentale';
?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>		
<?php
  ?>
 
</th>
</tr>
<div id="modal-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" >
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">VIew Rentale</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">Date:</label> 
<div class="col-sm-4"> 	
<input type="text" class="form-control" name="date[]" value="<?php echo $fetch_list->date; ?>" readonly> 
</div> 
<label class="col-sm-2 control-label">Rentale Type:</label> 
<div class="col-sm-4"> 
<select name="Product_type" required class="form-control" disabled="disabled">
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where contact_id='$fetch_list->rentale_id'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->conatact_id;?>" <?php if($fetch_protype->conatact_id==$fetch_list->rentale_id){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>

</div> 
</div>
<div class="form-group"> 

<label class="col-sm-2 control-label">Location:</label> 
<div class="col-sm-4"> 
<select name="Product_type" required class="form-control" disabled="disabled">
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->loc_id){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>

</div> 

<label class="col-sm-2 control-label">Amount:</label> 
<div class="col-sm-4"> 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->amount; ?>" readonly class="form-control" required>
 </div> 
 
 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">TDS%:</label> 
<div class="col-sm-4" > 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->tdsper; ?>" readonly class="form-control" required></div>

<label class="col-sm-2 control-label">TDS Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->tds_amount; ?>" readonly class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">GST%:</label> 
<div class="col-sm-4" > 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->gstper; ?>" readonly class="form-control" required></div>

<label class="col-sm-2 control-label">GST Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->gst_amount; ?>" readonly class="form-control" required></div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">Rent Amount:</label> 
<div class="col-sm-4" > 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->rent_amount; ?>" readonly class="form-control" required></div>

<label class="col-sm-2 control-label">&nbsp;</label> 
<div class="col-sm-4" id="regid"> 
&nbsp;</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Payment Mode:</label> 
<div class="col-sm-4" > 
<select name="Product_type" required class="form-control" disabled="disabled">
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->payment_mode){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div>

<label class="col-sm-2 control-label"><?php if($fetch_list->payment_mode=='26')
{
	?>
Paid To <?php }?></label> 
<div class="col-sm-4" id="regid"> 
<?php if($fetch_list->payment_mode=='26')
{
	?>
<input type="text" value="<?=$fetch_list->paid_to;?>" readonly="readonly" class="form-control" /><?php }?></div> 
</div>

<?php
if($fetch_list->payment_mode=='27')
{

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">Cheque Date:</label> 
<div class="col-sm-4" > 
<input type="text" value="<?=$fetch_list->cheque_date;?>" readonly="readonly" class="form-control" />
</div>

<label class="col-sm-2 control-label">Cheque Number</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" value="<?=$fetch_list->cheque_number;?>" readonly="readonly" class="form-control" /></div> 
</div>
<?php }?>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_rentale">  
<input type="text" style="display:none;" id="pri_col" value="id">
</table>
</form>
</div>
</div>
</div>
</div>
</div>
<form class="form-horizontal" role="form" method="post" action="update_rent" enctype="multipart/form-data">			
<div id="editItem" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contentitem">

        </div>
    </div>	 
</div>
</form>
<script>
    $('.modalEditItem').click(function(){
        var ID=$(this).attr('data-a');
	    $.ajax({url:"updateItem?ID="+ID,cache:true,success:function(result){
            $(".modal-contentitem").html(result);
        }});
    });
</script>	<?php

$this->load->view("footer.php");
?>



<SCRIPT language="javascript">
		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "checkbox";
			element1.name="chkbox[]";
			cell1.appendChild(element1);
			

			
			var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
			element2.type = "date";
			element2.name = "date[]";
			element2.className="form-control";
			cell2.appendChild(element2);


var cell3 = row.insertCell(2);
	var element3 = document.createElement("select");
	element3.name = "rentale_id[]";
	element3.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element3.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_contact_m where group_name='8'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->first_name;?>";
    option2.value = "<?=$getContact->contact_id;?>";
    element3.appendChild(option2, null);
    
	<?php }?>


cell3.appendChild(element3);




var cell4 = row.insertCell(3);
	var element4 = document.createElement("select");
	element4.name = "exp_account[]";
	element4.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element4.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='21'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serial_number;?>";
    element4.appendChild(option2, null);
    
	<?php }?>


cell4.appendChild(element4);



var cell5 = row.insertCell(4);
			var element5 = document.createElement("input");
			element5.type = "number";
			element5.id = "amount"+rowCount;
			element5.name = "amount[]";
			element5.className="form-control";
			cell5.appendChild(element5);


var cell6 = row.insertCell(5);
			var element6 = document.createElement("input");
			element6.type = "number";
			element6.id = "tdsper"+rowCount;
			
			element6.onchange= function() { cal(this.id); };
			element6.name = "tdsper[]";
			element6.className="form-control";
			cell6.appendChild(element6);



var cell7 = row.insertCell(6);
			var element7 = document.createElement("input");
			element7.type = "number";
			element7.id = "tds_amount"+rowCount;
			element7.name = "tds_amount[]";
			element7.setAttribute("readonly", true);
			element7.className="form-control";
			cell7.appendChild(element7);



var cell25 = row.insertCell(7);
			var element25 = document.createElement("input");
			element25.type = "number";
			element25.onchange= function() { gst_Cal(this.id); };
			element25.name = "gstper[]";
			element25.id = "gstper"+rowCount;
			element25.className="form-control";
			cell25.appendChild(element25);



var cell26 = row.insertCell(8);
			var element26 = document.createElement("input");
			element26.type = "number";
			element26.id = "gst_amount"+rowCount;
			element26.setAttribute("readonly", true);
			element26.name = "gst_amount[]";
			element26.className="form-control";
			cell26.appendChild(element26);
			










			
var cell27 = row.insertCell(9);
			var element27 = document.createElement("input");
			element27.type = "number";
			element27.setAttribute("readonly", true);
			element27.id = "rent_amount"+rowCount;
			element27.name = "rent_amount[]";
			element27.className="form-control";
			cell27.appendChild(element27);
			
			
			
var cell27 = row.insertCell(10);
			var element27 = document.createElement("input");
			element27.type = "text";
			//element27.setAttribute("readonly", true);
			//element27.id = "remarks"+rowCount;
			element27.name = "remarks[]";
			element27.className="form-control";
			cell27.appendChild(element27);
						



var cell8 = row.insertCell(11);
	var element8 = document.createElement("select");
	element8.name = "payment_mode[]";
	element8.id="pay"+rowCount;
	element8.onchange= function() { show(this.id); };
	element8.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element8.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='19'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serial_number;?>";
    element8.appendChild(option2, null);
    
	<?php }?>


cell8.appendChild(element8);

var cell9 = row.insertCell(12);
			var element9 = document.createElement("input");
			element9.type = "date";
			element9.id = "cheque_date"+rowCount;
			element9.setAttribute("style","display:none;");
			element9.name = "cheque_date[]";
			element9.className="form-control";
			cell9.appendChild(element9);

var cell10 = row.insertCell(13);
			var element10 = document.createElement("input");
			element10.type = "text";
			element10.setAttribute("style","display:none;");
			element10.id = "cheque_number"+rowCount;
			element10.name = "cheque_number[]";
			element10.className="form-control";
			cell10.appendChild(element10);



var cell11 = row.insertCell(14);
			var element11 = document.createElement("input");
			element11.type = "text";
			element11.setAttribute("style","display:none;");
			element11.id = "paid_to"+rowCount;
			element11.name = "paid_to[]";
			element11.className="form-control";
			cell11.appendChild(element11);



		}






		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					table.deleteRow(i);
					rowCount--;
					i--;
				}


			}
			}catch(e) {
				alert(e);
			}
		}
		
		
		
		
		function show(id)
		{
			
				var zz=document.getElementById(id).id;
				
		var myarra = zz.split("pay");
		var asx= myarra[1];
		
	var payVal=document.getElementById('pay'+asx).value;
			
			if(payVal=='27')
			{
				
			 document.getElementById('cheque_dateE').style.display = "";
			document.getElementById('cheque_numberR').style.display = "";
			 document.getElementById('cheque_date'+asx).style.display = "";
			document.getElementById('cheque_number'+asx).style.display = "";

			//document.getElementById("cheque_date").innerHTML='';
			
			document.getElementById('paid_to'+asx).style.display = "none";
				document.getElementById('paid_toO').style.display = "none";
			}
			
			if(payVal=='25')
			{
				
				
			
		
			document.getElementById('cheque_dateE').style.display = "none";
			 document.getElementById('cheque_date'+asx).style.display = "none";
			document.getElementById('cheque_number'+asx).style.display = "none";
			document.getElementById('cheque_numberR').style.display = "none";
			document.getElementById("cheque_date").innerHTML='';
			document.getElementById('paid_to'+asx).style.display = "none";
			document.getElementById('paid_toO').style.display = "none";
			}
			
			if(payVal=='26')
			{
				document.getElementById('paid_to'+asx).style.display = "";
				document.getElementById('paid_toO').style.display = "";
			 document.getElementById('cheque_dateE').style.display = "none";
			 document.getElementById('cheque_date'+asx).style.display = "none";
document.getElementById('cheque_number'+asx).style.display = "none";
document.getElementById('cheque_numberR').style.display = "none";
			//document.getElementById("cheque_date").innerHTML='';
			}
			
		}
		
		
		
		
		
function cal(id)
{
	

var zz=document.getElementById(id).id;
var myarra = zz.split("tdsper");
var asx= myarra[1];

	//document.getElementById("amount"+asx).value;
var amount=document.getElementById("amount"+asx).value;


var tdsper=document.getElementById("tdsper"+asx).value;	
var totPer=Number(amount)*Number(tdsper)/100;
var totCal=Number(amount)-Number(totPer);

document.getElementById("tds_amount"+asx).value=totPer;	
var tds_amount=document.getElementById("tds_amount"+asx).value;	
var sumAmt=Number(amount)+Number(totGstPer)-Number(totPer);
var gst_amount=document.getElementById("gst_amount"+asx).value;	
var rent_amount=document.getElementById("rent_amount"+asx).value=sumAmt;

}
		
		
		
function gst_Cal(id)
{

var zz=document.getElementById(id).id;
var myarra = zz.split("gstper");
var asx= myarra[1];
var amount=document.getElementById("amount"+asx).value;
var gstper=document.getElementById("gstper"+asx).value;	
var totGstPer=Number(gstper)*Number(amount)/100;

document.getElementById("gst_amount"+asx).value=totGstPer;	
var tds_amount=document.getElementById("tds_amount"+asx).value;	
var sumAmt=Number(amount)+Number(totGstPer)-Number(tds_amount);

//alert(
//var gst_amount=document.getElementById("gst_amount"+asx).value;	
var rent_amount=document.getElementById("rent_amount"+asx).value=sumAmt;
			
		}
			
		

	</SCRIPT>