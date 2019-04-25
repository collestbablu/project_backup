<?php
$this->load->view("header.php");
?>
	 <!-- Main content -->
	 <div class="main-content">
<form class="form-horizontal" role="form" method="post" action="insert_expense" enctype="multipart/form-data">			
			<ol class="breadcrumb breadcrumb-2"> 
<li><a href="index.html"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="#">Voucher</a></li> 
<li class="active"><strong>Voucher List</strong></li>
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0">Add Voucher</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg" style="width:1200px;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Voucher</h4>
</div>
<div class="table-responsive">
<INPUT type="button" value="Add Row" class="btn btn-sm" onclick="addRow('dataTable')" />

	<INPUT type="button" class="btn btn-secondary btn-sm" value="Delete Row" onclick="deleteRow('dataTable')" />
<table class="table table-striped table-bordered table-hover" id="dataTable" >
<tbody>
<tr class="gradeA">
<th>Check</th>
<th>Voucher No.</th>
<th>Date</th>
<th>Expense Type</th>
<th>Expense Account</th>
<th >Name Of Person</th>
<th>Paid To</th>
<th >Goods Des.</th>
<th >Amount</th>
<th >Provisional Amount</th>
<th >Payment Mode</th>

<th id="cheque_numberR" style="display:none" >Cheque Number</th>
<th id="cheque_dateE" style="display:none" >Cheque Date</th>
<th id="paid_toO" style="display:none">Paid To</th>
</tr>

<tr class="gradeA">
<th ><input type="checkbox" name="chkbox[]"  /></th>
<th><input type="number" name="v_no[]" class="form-control"></th>
<th><input type="date" name="date[]" class="form-control" ></th>
<th>
<select name="exp_type[]" class="form-control" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id='20'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->serial_number;?>"><?=$fetch_protype->keyvalue;?></option>

<?php }?>
</select>
</th>

<th>
<select name="exp_account[]" class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_contact_m where group_name='4'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->contact_id;?>"><?=$getPaymentMode->first_name;?></option>

<?php }?>
</select>
</th>

<th>
<select name="contact_id[]" class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_contact_m where group_name='7'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->contact_id;?>"><?=$getPaymentMode->first_name;?></option>

<?php }?>
</select>
</th>
<th>
<select name="paidto[]" class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_contact_m ");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->contact_id;?>"><?=$getPaymentMode->first_name;?></option>

<?php }?>
</select>

</th>
<th><input type="text" class="form-control" name="goods_name[]" /></th>
<th><input type="number" step="any" min="0"   name="amount[]"   class="form-control"> </th>
<th><input type="number" step="any" min="0"   name="provisional_amount[]"   class="form-control"></th>
<th>
<select name="payment_mode[]" id="pay1" onchange="show(this.id)"  class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_master_data where param_id='19'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{
?>
<option value="<?=$getPaymentMode->serial_number;?>"><?=$getPaymentMode->keyvalue;?></option>
<?php }?>
</select>
</th>

<th id="cheque_number1" style="display:none">
<input type="number" step="any" min="0"   name="cheque_number[]"   class="form-control"> 
</th>

<th id="cheque_date1" style="display:none">
<input type="date"    name="cheque_date[]"   class="form-control"> 
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
       <th>Expense Type</th>
       <th>Expense Account</th>
       <th>Person Name</th>
	   <th>Paid To</th>
	   <th>Goods Des.</th>        
       <th>Amount</th>
	   <th>Provisional Amount</th>
	   <th >Payment Mode</th>
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
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->id; ?>" value="<?php echo $fetch_list->id;?>" /></th>

<th><?=$fetch_list->date;?></th>
<?php
$contactQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->exp_type'");
$getContact=$contactQuery->row();
?>

<th><?=$getContact->keyvalue;?></th>
<?php
$paymentQuery=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->exp_account'");
$getPayment=$paymentQuery->row();
?>
<th><?=$getPayment->first_name;?></th>

<?php
$paymentQuery=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->contact_id'");
$getPayment=$paymentQuery->row();
?>
<th><?=$getPayment->first_name;?> </th>
<?php
$paid=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->paidTo'");
$paidto=$paid->row();
?>
<th><?=$paidto->first_name?></th>
<th><?=$fetch_list->goods_name;?></th>
<th><?=$fetch_list->amount;?></th>
<th><?=$fetch_list->provisional_amount;?></th>
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
$table_name='tbl_expense';
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
<h4 class="modal-title">VIew Expense</h4>
</div>
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">Voucher No.</label> 
<div class="col-sm-4" > 
<input name="v_no[]"  type="number" value="<?php echo $fetch_list->voucherno; ?>" readonly class="form-control" required>
</div>
<label class="col-sm-2 control-label">&nbsp;</label> 
<div class="col-sm-4" id="regid"> 
&nbsp;
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Date:</label> 
<div class="col-sm-4"> 	
<input type="text" class="form-control" name="date[]" value="<?php echo $fetch_list->date; ?>" readonly> 
</div> 
<label class="col-sm-2 control-label">Expense Type:</label> 
<div class="col-sm-4"> 
<select name="Product_type" required class="form-control" disabled="disabled">
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id='20'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->exp_type){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>

</div> 
</div>
<div class="form-group"> 

<label class="col-sm-2 control-label">Expense Account:</label> 
<div class="col-sm-4"> 
<select name="Product_type" required class="form-control" disabled="disabled">
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->exp_account){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>

</div> 

<label class="col-sm-2 control-label">Name Of Person:</label> 
<div class="col-sm-4"> 
<select name="Product_type" required class="form-control" disabled="disabled">
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->contact_id){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>
 </div> 
 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Goods Des.:</label> 
<div class="col-sm-4" > 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->goods_name; ?>" readonly class="form-control" required></div>

<label class="col-sm-2 control-label">Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->amount; ?>" readonly class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Provisional Amt:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="provisional_amount" readonly="readonly" value="<?=$fetch_list->provisional_amount;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">Paid To</label> 
<div class="col-sm-4" id="regid"> 
<select name="paidto" required class="form-control" disabled="disabled">
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->paidTo){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>

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
<form class="form-horizontal" role="form" method="post" action="update_expense" enctype="multipart/form-data">			
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
			
var cell71 = row.insertCell(1);
			var element71 = document.createElement("input");
			element71.type = "number";
			element71.name = "v_no[]";
			element71.className="form-control";
			cell71.appendChild(element71);

			
var cell2 = row.insertCell(2);
			var element2 = document.createElement("input");
			element2.type = "date";
			element2.name = "date[]";
			element2.className="form-control";
			cell2.appendChild(element2);


var cell3 = row.insertCell(3);
	var element3 = document.createElement("select");
	element3.name = "exp_type[]";
	element3.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element3.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='20'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serial_number;?>";
    element3.appendChild(option2, null);
    
	<?php }?>


cell3.appendChild(element3);




var cell4 = row.insertCell(4);
	var element4 = document.createElement("select");
	element4.name = "exp_account[]";
	element4.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element4.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_contact_m where group_name='5'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->first_name;?>";
    option2.value = "<?=$getContact->contact_id;?>";
    element4.appendChild(option2, null);
    
	<?php }?>


cell4.appendChild(element4);



var cell5 = row.insertCell(5);
	var element5 = document.createElement("select");
	element5.name = "contact_id[]";
	element5.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element5.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_contact_m where group_name='7'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->first_name;?>";
    option2.value = "<?=$getContact->contact_id;?>";
    element5.appendChild(option2, null);
    
	<?php }?>


cell5.appendChild(element5);


var cell51 = row.insertCell(6);
	var element51 = document.createElement("select");
	element51.name = "paidto[]";
	element51.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element51.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_contact_m where group_name='7'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->first_name;?>";
    option2.value = "<?=$getContact->contact_id;?>";
    element51.appendChild(option2, null);
    
	<?php }?>


cell51.appendChild(element51);



var cell6 = row.insertCell(7);
			var element6 = document.createElement("input");
			element6.type = "text";
			element6.name = "goods_name[]";
			element6.className="form-control";
			cell6.appendChild(element6);



var cell7 = row.insertCell(8);
			var element7 = document.createElement("input");
			element7.type = "number";
			element7.name = "amount[]";
			element7.className="form-control";
			cell7.appendChild(element7);


var cell7 = row.insertCell(9);
			var element7 = document.createElement("input");
			element7.type = "number";
			element7.name = "provisional_amount[]";
			element7.className="form-control";
			cell7.appendChild(element7);



var cell8 = row.insertCell(10);
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



var cell10 = row.insertCell(11);
			var element10 = document.createElement("input");
			element10.type = "text";
			element10.setAttribute("style","display:none;");
			element10.id = "cheque_number"+rowCount;
			element10.name = "cheque_number[]";
			element10.className="form-control";
			cell10.appendChild(element10);

var cell9 = row.insertCell(12);
			var element9 = document.createElement("input");
			element9.type = "date";
			element9.id = "cheque_date"+rowCount;
			element9.setAttribute("style","display:none;");
			element9.name = "cheque_date[]";
			element9.className="form-control";
			cell9.appendChild(element9);





var cell11 = row.insertCell(13);
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
		
		
		
		
		
		
		

	</SCRIPT>