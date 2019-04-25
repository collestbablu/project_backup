<?php
$this->load->view("header.php");
?>
	 <!-- Main content -->
	 <div class="main-content">
<form class="form-horizontal" role="form" method="post" action="insert_salary" enctype="multipart/form-data">			
			<ol class="breadcrumb breadcrumb-2"> 
<li><a href="index.html"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="#">Salary</a></li> 
<li class="active"><strong>Salary List</strong></li>
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0">Add Salary</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg" style="width:1200px;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Salary</h4>
</div>
<div class="table-responsive">
<INPUT type="button" value="Add Row" class="btn btn-sm" onclick="addRow('dataTable')" />

	<INPUT type="button" class="btn btn-secondary btn-sm" value="Delete Row" onclick="deleteRow('dataTable')" />
<table class="table table-striped table-bordered table-hover" id="dataTable" >
<tbody>
<tr class="gradeA">
<th>Check</th>
<th>Name of Employee</th>

<th >Department</th>
<th >Location</th>
<th >Basic Salary</th>
<th >HRA</th>
<th >Conveyance</th>
<th >EPF%</th>

<th >TDS Amount</th>
<th >Working Days</th>
<th >Total EPF</th>
<th>Advance</th>
<th>Deduction</th>
<th >Net to Pay</th>
<th >Payment Mode</th>
<th id="cheque_dateE" style="display:none" >Cheque Date</th>
<th id="cheque_numberR" style="display:none" >Cheque Number</th>

<th id="paid_toO" style="display:none">Paid To</th>
</tr>

<tr class="gradeA">
<th >
<input type="checkbox" name="chkbox[]"  />


</th>


<th >

<select name="contact_id[]" id="con1" class="form-control" onchange="basicCal(this.id);" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='7'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->contact_id;?>"><?=$fetch_protype->first_name;?></option>

<?php }?>
</select>
</th>

<th ><select name="department[]" class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_master_data where param_id='22'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->serial_number;?>"><?=$getPaymentMode->keyvalue;?></option>

<?php }?>
</select></th>


<th >
<select name="loc_id[]" class="form-control" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id='21'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->serial_number;?>"><?=$fetch_protype->keyvalue;?></option>

<?php }?>
</select>


</th>


<th >
<input type="number" style="width:100px;" step="any" min="0" id="basic_salary1" readonly="readonly"    name="basic_salary[]"   class="form-control"> 
</th>
<th><input type="number" style="width:100px;" step="any" min="0" id="hra1" class="form-control" readonly="readonly" name="hra[]" /></th>
<th><input type="number" style="width:100px;" step="any" min="0" readonly="readonly" id="conveyance1"  class="form-control" name="conveyance[]" /></th>
<th><input style="width:50px;" type="text" name="epf[]" step="any" min="0" id="epf1" readonly="readonly" value=""  class="form-control"  /></th>
<th><input type="text" class="form-control" id="tds_amount1" readonly="readonly" name="tds_amount[]" /></th>
<th><input type="text" class="form-control" value="30" id="work_days1" onkeyup="sal_cal(this.id);" name="work_days[]" /></th>
<th><input type="number" style="width:100px;" step="any" min="0" readonly="readonly" id="epf_amount1" class="form-control" name="epf_amount[]" /></th>

<th><input style="width:100px;" type="number" class="form-control" id="advance1" onkeyup="calAdv(this.id)" name="advance[]"  /></th>

<th><input style="width:100px;" type="number" class="form-control" id="deduction1" onkeyup="calDed(this.id)" name="deduction[]"  /></th>


<th><input type="text"  style="width:100px;"class="form-control" id="net_pay1" name="net_pay[]" readonly="readonly" /></th>
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


<th id="paid_to1"  style="display:none;">
<input type="text"    name="paid_to[]" style="width:100px;"   class="form-control"> 

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
       <th>Name of Employee</th>
       
       <th>Department</th>
		<th>Location</th>
        <th>Basic Salary</th>
		<th>HR</th>
        <th>Conveyance</th>
        <th>EPF</th>
        <th>EPF Total</th>
        <th>TDS Amount</th>
        <th>Working Days</th>
        <th>Advance</th>
        <th>Deduction</th>
        <th >Net to Pay</th>
		  <th >Payment Mode</th>
		 <th style="width:200px;">Action</th>
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

<th><?=$fetch_list->maker_date;?></th>

<?php
$paymentQuery=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->contact_id'");
$getPayment=$paymentQuery->row();
?>
<th><?=$getPayment->first_name;?></th>

<?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->department'");
$getPayment=$paymentQuery->row();
?>
<th><?=$getPayment->keyvalue;?> </th>
<?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->loc_id'");
$getPayment=$paymentQuery->row();
?>

<th><?=$getPayment->keyvalue;?></th>
<th><?=$fetch_list->basic_salary;?></th>
<th><?=$fetch_list->hra;?></th>
<th><?=$fetch_list->conveyance;?></th>
<th><?=$fetch_list->epf;?></th>
<th><?=$fetch_list->epf_amount;?></th>
<th><?=$fetch_list->tds_amount;?></th>
<th><?=$fetch_list->work_days;?></th>
<th><?=$fetch_list->advance;?></th>
<th><?=$fetch_list->deduction;?></th>
<th><?=$fetch_list->net_pay;?></th>
<?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->payment_mode'");
$getPayment=$paymentQuery->row();
?>

<th><?=$getPayment->keyvalue;?></th>
<th class="bs-example">
<?php if($view!=''){ ?>

<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i;?>" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" data-a="<?php echo $fetch_list->id;?>" href='#editItem' type="button" onclick="updatePickup('<?php echo $fetch_list->id;?>')" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='id';
$table_name='tbl_salary';
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
<h4 class="modal-title">VIew Salary</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">Name of Employee:</label> 
<div class="col-sm-4"> 	
<select name="contact_id" class="form-control" disabled="disabled" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='7'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->contact_id){?> selected="selected" <?php }?>><?=$fetch_protype->first_name;?></option>

<?php }?>
</select>
</div> 
<label class="col-sm-2 control-label">Department:</label> 
<div class="col-sm-4"> 
<select name="department" class="form-control" disabled="disabled">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_master_data where param_id='22'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->serial_number;?>" <?php if($getPaymentMode->serial_number==$fetch_list->department){?> selected="selected" <?php }?>><?=$getPaymentMode->keyvalue;?></option>

<?php }?>
</select>

</div> 
</div>
<div class="form-group"> 

<label class="col-sm-2 control-label">Location:</label> 
<div class="col-sm-4"> 
<select name="loc_id" class="form-control" disabled="disabled" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id='21'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->loc_id){?> selected="selected" <?php }?>><?=$fetch_protype->keyvalue;?></option>

<?php }?>
</select>

</div> 

<label class="col-sm-2 control-label">Basic Salary:</label> 
<div class="col-sm-4"> 
<input type="text" required  name="basic_salary" id="basic_salary" onkeyup="cal();" value="<?=$fetch_list->basic_salary;?>" readonly="readonly" class="form-control"/>
 </div> 
 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">HRA:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="hra" readonly="readonly"  id="hra" value="<?=$fetch_list->hra;?>" class="form-control"/></div>

<label class="col-sm-2 control-label">Conveyance:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number"  name="conveyance" readonly="readonly" id="conveyance" value="<?=$fetch_list->conveyance;?>" class="form-control" required/></div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">EFP%:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="epf"  value="<?=$fetch_list->epf;?>" class="form-control" readonly="readonly"/></div>

<label class="col-sm-2 control-label">TDS Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number"  name="tds_amount"  readonly="readonly" value="<?=$fetch_list->tds_amount;?>" class="form-control" required/></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Work Days:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="work_days"  readonly="readonly" value="<?=$fetch_list->work_days;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">EPF Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" readonly="readonly"  value="<?=$fetch_list->epf_amount;?>" class="form-control" required/>

</div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">Advance:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="advance"  readonly="readonly" value="<?=$advance->advance;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">Deduction:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" readonly="readonly"  value="<?=$fetch_list->deduction;?>" class="form-control" required/>

</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Net Pay:</label> 
<div class="col-sm-4" > 
<input type="text" required readonly="readonly" id="net_pay"  name="net_pay" value="<?=$fetch_list->net_pay;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">&nbsp;</label> 
<div class="col-sm-4" id="regid"> 
&nbsp;

</div> 
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
<input type="text" style="display:none;" id="table_name" value="tbl_expense">  
<input type="text" style="display:none;" id="pri_col" value="id">
</table>
</form>
</div>
</div>
</div>
</div>
</div>
<form class="form-horizontal" role="form" method="post" action="update_salary" enctype="multipart/form-data">			
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
			

			


var cell3 = row.insertCell(1);
//onchange="basicCal(this.id);"

	var element3 = document.createElement("select");
	element3.name = "contact_id[]";
	element3.onchange= function() { basicCal(this.id); };
	element3.id = "con"+rowCount;
	element3.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element3.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_contact_m where group_name='7'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->first_name;?>";
    option2.value = "<?=$getContact->contact_id;?>";
    element3.appendChild(option2, null);
    
	<?php }?>


cell3.appendChild(element3);




var cell4 = row.insertCell(2);
	var element4 = document.createElement("select");
	element4.name = "department[]";
	element4.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element4.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='22'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serial_number;?>";
    element4.appendChild(option2, null);
    
	<?php }?>


cell4.appendChild(element4);



var cell5 = row.insertCell(3);
	var element5 = document.createElement("select");
	element5.name = "loc_id[]";
	element5.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element5.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='21'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serail_number;?>";
    element5.appendChild(option2, null);
    
	<?php }?>


cell5.appendChild(element5);


var cell6 = row.insertCell(4);
			var element6 = document.createElement("input");
			element6.type = "number";
			element6.name = "basic_salary[]";
			element6.id = "basic_salary"+rowCount;
			element6.setAttribute('step','any');
			element6.setAttribute('min','0');
			element6.className="form-control";
			cell6.appendChild(element6);



var cell7 = row.insertCell(5);
			var element7 = document.createElement("input");
			element7.type = "number";
			element7.name = "hra[]";
			element7.setAttribute('step','any');
			element7.setAttribute('min','0');
			element7.id = "hra"+rowCount;
			element7.className="form-control";
			cell7.appendChild(element7);



var cell50 = row.insertCell(6);
			var element50 = document.createElement("input");
			element50.type = "number";
			element50.setAttribute('step','any');
			element50.setAttribute('min','0');
			element50.name = "conveyance[]";
			element50.id = "conveyance"+rowCount;
			element50.className="form-control";
			cell50.appendChild(element50);


var cell50 = row.insertCell(7);
			var element50 = document.createElement("input");
			element50.type = "number";
			element50.setAttribute('step','any');
			element50.setAttribute('min','0');
			element50.name = "epf[]";
			element50.id = "epf"+rowCount;
			element50.className="form-control";
			cell50.appendChild(element50);



var cell50 = row.insertCell(8);
			var element50 = document.createElement("input");
			element50.type = "number";
			element50.setAttribute('step','any');
			element50.setAttribute('min','0');
			element50.name = "tds_amount[]";
			element50.id = "tds_amount"+rowCount;
			element50.className="form-control";
			cell50.appendChild(element50);


var cell50 = row.insertCell(9);
			var element50 = document.createElement("input");
			element50.type = "number";
			element50.setAttribute('step','any');
			element50.setAttribute('min','0');
			element50.onchange= function() { sal_cal(this.id); };
			element50.name = "work_days[]";
			element50.id = "work_days"+rowCount;
			element50.className="form-control";
			cell50.appendChild(element50);
			
			var cell50 = row.insertCell(10);
			var element50 = document.createElement("input");
			element50.type = "number";
			element50.setAttribute('step','any');
			element50.setAttribute('min','0');
			element50.name = "epf_amount[]";
			element50.id = "epf_amount"+rowCount;
			element50.setAttribute("readonly", true);
			element50.className="form-control";
			cell50.appendChild(element50);
			

var cell50 = row.insertCell(11);
			var element50 = document.createElement("input");
			element50.type = "number";
			
			element50.onkeyup= function() { calAdv(this.id); };
			element50.name = "advance[]";
			element50.id = "advance"+rowCount;
			element50.setAttribute('step','any');
			element50.setAttribute('min','0');
			//element50.setAttribute("readonly", true);
			element50.className="form-control";
			cell50.appendChild(element50);



var cell50 = row.insertCell(12);
			var element50 = document.createElement("input");
			element50.type = "number";
			
			element50.onkeyup= function() { calDed(this.id); };
			element50.name = "deduction[]";
			element50.id = "deduction"+rowCount;
			element50.setAttribute('step','any');
			element50.setAttribute('min','0');
			//element50.setAttribute("readonly", true);
			element50.className="form-control";
			cell50.appendChild(element50);


var cell50 = row.insertCell(13);
			var element50 = document.createElement("input");
			element50.type = "number";
			
			element50.name = "net_pay[]";
			element50.id = "net_pay"+rowCount;
			element50.setAttribute('step','any');
			element50.setAttribute('min','0');
			element50.setAttribute("readonly", true);
			element50.className="form-control";
			cell50.appendChild(element50);





var cell8 = row.insertCell(14);
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

var cell9 = row.insertCell(15);
			var element9 = document.createElement("input");
			element9.type = "date";
			element9.id = "cheque_date"+rowCount;
			element9.setAttribute("style","display:none;");
			element9.name = "cheque_date[]";
			element9.className="form-control";
			cell9.appendChild(element9);

var cell10 = row.insertCell(16);
			var element10 = document.createElement("input");
			element10.type = "text";
			element10.setAttribute("style","display:none;");
			element10.id = "cheque_number"+rowCount;
			element10.name = "cheque_number[]";
			element10.className="form-control";
			cell10.appendChild(element10);



var cell11 = row.insertCell(17);
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
		
		
		
		
		function sal_cal(id)
		{
			
			var zz=document.getElementById(id).id;
				
		var myarra = zz.split("work_days");
		var asx= myarra[1];
		
		
		
		
		var basic_salary=document.getElementById("basic_salary"+asx).value;
		
		var hra=document.getElementById("hra"+asx).value;
		
		var conveyance=document.getElementById("conveyance"+asx).value;
		var tds_amount=document.getElementById("tds_amount"+asx).value;
		var work_days=document.getElementById("work_days"+asx).value;
		var net_pay=document.getElementById("net_pay"+asx).value;
		var epf=document.getElementById("epf"+asx).value;
		var epfPer=Number(basic_salary)*Number(epf)/100;	
		
		var totalSal=Number(basic_salary)+Number(hra)+Number(conveyance);
		document.getElementById("epf_amount"+asx).value=epfPer;
		
		var totCal=Number(totalSal) / 30;
		
		var totalPay=Number(work_days)*Number(totCal)-Number(tds_amount);
		document.getElementById("net_pay"+asx).value=totalPay.toFixed(2);
		
		
		}
		







function cal()
		{
			
			
		
	var basic_salary=document.getElementById("basic_salary").value;
		
		var hra=document.getElementById("hra").value;
		
		var conveyance=document.getElementById("conveyance").value;
		var tds_amount=document.getElementById("tds_amount").value;
		var work_days=document.getElementById("work_days").value;
		var net_pay=document.getElementById("net_pay").value;
		
		var epf=document.getElementById("epf").value;
		var epfPer=Number(basic_salary)*Number(epf)/100;	
		
		var totalSal=Number(basic_salary)+Number(hra)+Number(conveyance);
		//document.getElementById("epf_amount").value=epfPer;
		
		var totCal=Number(totalSal) / 30;
		
		
	
		var totalPay=Number(work_days)*Number(totCal)-Number(tds_amount);
			
		
		document.getElementById("net_pay500").value=totalPay.toFixed(2);
		
		
		}

		
		
		function Advcal()
		{
			
		var advance=document.getElementById("advance").value;
		var net_pay500=document.getElementById("net_pay500").value;
		var total=Number(net_pay500)+Number(advance);
		document.getElementById("net_pay500").value=total;
		

		}
		
		
		function Dedcal()
		{
			
		var deduction=document.getElementById("deduction").value;
		var net_pay500=document.getElementById("net_pay500").value;
		var total=Number(net_pay500)-Number(deduction);
		document.getElementById("net_pay500").value=total;
		

		}
		
		function basicCal(id)
		{
		var zz=document.getElementById(id).id;
		var myarra = zz.split("con");
		var asx= myarra[1];	
		
		var con=document.getElementById("con"+asx).value;
	 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getBasicSal?con="+con, false);
  xhttp.send();
  var mystr=xhttp.responseText;
  var myarr = mystr.split("^");

  //alert(myarr[3]);
  
  
  document.getElementById("basic_salary"+asx).value = myarr[0];
document.getElementById("hra"+asx).value = myarr[1];
document.getElementById("conveyance"+asx).value = myarr[2];
document.getElementById("epf"+asx).value=myarr[3];
//document.getElementById("epf"+asx).value = myarr[3];
document.getElementById("tds_amount"+asx).value = myarr[4];
			var epfT=Number(myarr[0])*Number(myarr[3])/100;
			//alert(epfT);
			var net_pay=Number(myarr[0])+Number(myarr[1])+Number(myarr[2])-Number(myarr[4]);
			document.getElementById("net_pay"+asx).value = net_pay;
			document.getElementById("epf_amount"+asx).value = epfT;
			
		}
		
		
		
		
		
		
		
		
		
		
		function calAdv(id)
		{
			
		var zz=document.getElementById(id).id;
		var myarra = zz.split("advance");
		var asx= myarra[1];	
		
  
  var advance=document.getElementById("advance"+asx).value;
  var net_pay=document.getElementById("net_pay"+asx).value;
  
	
			document.getElementById("net_pay"+asx).value = Number(net_pay)+Number(advance);
			
			
		}
		
		
		
		function calDed(id)
		{
			
		var zz=document.getElementById(id).id;
		var myarra = zz.split("deduction");
		var asx= myarra[1];	
		
  
  var advance=document.getElementById("deduction"+asx).value;
  var net_pay=document.getElementById("net_pay"+asx).value;
  
	
			document.getElementById("net_pay"+asx).value = Number(net_pay)-Number(advance);
			
			
		}
		
		
		
		
		
		
		
		
		

	</SCRIPT>