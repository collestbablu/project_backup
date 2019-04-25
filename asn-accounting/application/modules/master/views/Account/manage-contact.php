<?php
$this->load->view("header.php");

?>
	 <!-- Main content -->
	 <div class="main-content">
			<ol class="breadcrumb breadcrumb-2"> 
<li><a href="index.html"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="form-basic.html">Master</a></li> 
<li class="active"><strong>Add Contact</strong></li>
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0"><i class="fa fa-pencil"></i>Add Contact</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<form class="form-horizontal" role="form" method="post" action="insert_contact">	 
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add&nbsp;Contact</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="contact_id" value="<?php echo $branchFetch->contact_id; ?>" />
<input type="text" name="first_name" value="<?php echo $branchFetch->first_name; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
<?php
	   	 $hdrQuery=$this->db->query("select * from tbl_contact_m where contact_id='".$_GET['id']."' or contact_id='".$_GET['view']."'");
         $hrdrow=$hdrQuery->row();
	  
	  ?>
	  <input type="hidden" name="grpname" value="<?php echo $hrdrow->contact_id;?>" />
<select name="maingroupname" class="form-control" required id="contact_id_copy5" <?php if(@$_GET['view']!=''){ ?> disabled <?php }?>>

<option value="">-------select---------</option>

<?php
if($_GET['popup']=='True' and $_GET['con']!=''  ){



$ugroup2=$this->db->query("SELECT * FROM tbl_account_mst where account_id= '".$_GET['con']."' " );

}

else
{


$ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");
}
foreach ($ugroup2->result() as $fetchunit){



?>

<option value="<?php  echo $fetchunit->account_id ;?>"<?php if($fetchunit->account_id==$hrdrow->group_name){ ?> selected <?php } ?>><?php echo $fetchunit->account_name;?></option>
<?php } ?>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person" value="<?php echo $branchFetch->contact_person?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4"> 
<input type="email" name="email" value="<?php echo $branchFetch->email; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="tel" minlength="10" maxlength="10" id="mobile" name="mobile" title="10 digit mobile number"  value="<?php echo $branchFetch->mobile; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 

<label class="col-sm-2 control-label">Phone No.:</label> 
<div class="col-sm-4" id="regid"> 
 <input type="text" maxlength="10"  pattern="[0-9]{10}" title="Enter your 10 phone number" name="phone" value="<?php echo $branchFetch->phone; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Pan No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="pan_no" pattern1=".{10,10}" maxlength="10" id="pan" placeholder="PAN No 10 digist" title="PAN Number must be 10 character" value="<?php echo $branchFetch->pan_no; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?>  class="form-control">
</div> 
<label class="col-sm-2 control-label">GSTIN No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="tin_no" id="gstin"  placeholder="GSTIN" value="<?php echo $branchFetch->tin; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">

</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Basic Salary:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="basic" value="<?php echo $branchFetch->baisc_salary; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
<label class="col-sm-2 control-label">HRA:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="hra" value="<?php echo $branchFetch->hra; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
</div>

<div class="form-group" > 
<label class="col-sm-2 control-label">Conveyance:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="convnc" value="<?php echo $branchFetch->conveyance; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
<label class="col-sm-2 control-label">EPF%:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="epf" value="<?php echo $branchFetch->epf; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">TDS Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="tds_amt" value="<?php echo $branchFetch->tds; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
<label class="col-sm-2 control-label" style="display:none">CST No:</label> 
<div class="col-sm-4" id="regid" style="display:none"> 
<input type="text" name="cst_no" value="<?php echo $branchFetch->cst; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Address1:</label> 
<div class="col-sm-4" id="regid"> 
<textarea class="form-control" name="address1"><?php echo $branchFetch->address1; ?> </textarea>
</div>  
<label class="col-sm-2 control-label">Address2:</label> 
<div class="col-sm-4" id="regid"> 
<textarea class="form-control" name="address3"><?php echo $branchFetch->address3; ?> </textarea>

</div> 
</div>

</div>
<div class="table-responsive">
<INPUT type="button" value="Add Row" class="btn btn-sm" onclick="addRow('dataTable')" />

	<INPUT type="button" class="btn btn-secondary btn-sm" value="Delete Row" onclick="deleteRow('dataTable')" />
<table class="table table-striped table-bordered table-hover" id="dataTable" >
<tbody>
<tr class="gradeA">
<th>Check</th>

<th >Origin</th>
<th >Destination</th>
<th >Air</th>
<th >Train</th>
<th>Surface</th>
</tr>
<tr class="gradeA">
<th >
<input type="checkbox" name="chkbox[]"  />


</th>




<th >
<select name="frmOrg[]" class="form-control" >
<option value="">--Select--</option>
<?php

	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
<option value="<?=$getContact->serial_number;?>"><?=$getContact->keyvalue;?></option>

<?php }?>
</select>

</th>


<th >
<select name="toOrg[]" class="form-control" >
<option value="">--Select--</option>
<?php

	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
<option value="<?=$getContact->serial_number;?>"><?=$getContact->keyvalue;?></option>

<?php }?>
</select>

</th>


<th >
<input type="number" step="any" min="0"   name="rateAir[]"   class="form-control"> 
</th>


<th >
<input type="number" step="any" min="0"   name="rateTrain[]"   class="form-control"> 
</th>

<th >
<input type="number" step="any" min="0"   name="rateSurface[]"   class="form-control"> 
</th>
</tr>

</tbody>
</table>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" value="Save" />
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</form>
</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<a href="#/" class="btn btn-secondary btn-sm"><i class="fa fa-trash-o"></i> Delete</a>

</div>
</ol>
<script>
	function contactcode(){
		var contactidd=document.getElementById("location_id").value;
		if(contactidd!=''){
		var pro=contactidd;
		 var xhttp = new XMLHttpRequest();
		  xhttp.open("GET", "getdata_fun?con="+pro, false);
		  xhttp.send();
		  document.getElementById("dataiddiv").innerHTML = xhttp.responseText;
		}else{
			
			alert("Please Select Location");
				
		}
		} 
		

</script>		



<div class="row">
				<div class="col-lg-12">
						<div class="panel-body">
							<div class="table-responsive">
<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data">											
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th> Name</th>
		<th>Group Name</th>
        <th>Email Id</th>
		<th>Mobile No.</th>
		<th>Phone No.</th>
      	 <th>Action</th>
</tr>
</thead>

<tbody>

<?php

$i=1;
  foreach($result as $fetch_list)
  {

  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->contact_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->contact_id; ?>" value="<?php echo $fetch_list->contact_id;?>" /></th>

<th onClick="openpopup('update_contact',1200,500,'view',<?=$fetch_list->contact_id;?>)">

<?=$fetch_list->first_name;?>
</th>

<?php

$contactQuery=$this->db->query("select *from tbl_account_mst where account_id='$fetch_list->group_name'");
$getContact=$contactQuery->row();

?>

<th>
<?php if($fetch_list->group_name=='4')
{
	?>
<a href="<?=base_url();?>master/Account/contact_log?id=<?=$fetch_list->contact_id?>"><?php echo $getContact->account_name;?></a>    
    <?php
	
}
else
{
echo $getContact->account_name;

  }?></th>
<th onclick="contactDetails('<?php echo $urlvc ?>')"><?=$fetch_list->email;?></th>
<th onclick="contactDetails('<?php echo $urlvc ?>')"><i class="fa fa-phone" aria-hidden="true"></i>
<a href="tel:9716127292"><?=$fetch_list->mobile;?></a></th>
<th onclick="contactDetails('<?php echo $urlvc ?>')"><?=$fetch_list->phone;?></th>
<th>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i;?>" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<button class="btn btn-default modalEditcontact" data-a="<?php echo $fetch_list->contact_id;?>" href='#editcontact' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php
$pri_col='contact_id';
$table_name='tbl_contact_m';
	?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->contact_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>	
</th>
</tr>

<div id="modal-<?php echo $i;?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View&nbsp;Contact</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Name:</label> 
<div class="col-sm-4"> 				
<input type="text" name="first_name" value="<?php echo $fetch_list->first_name; ?>" readonly="" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
<select name="maingroupname" class="form-control" required id="contact_id_copy5" disabled="disabled">

<option value="">-------select---------</option>

<?php

$ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");

foreach ($ugroup2->result() as $fetchunit){

?>
<option value="<?php  echo $fetchunit->account_id ;?>"<?php if($fetchunit->account_id==$fetch_list->group_name){ ?> selected <?php } ?>><?php echo $fetchunit->account_name;?></option>
<?php } ?>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person" value="<?php echo $fetch_list->contact_person;?>"  readonly="" class="form-control">
</div> 
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4"> 
<input type="email" name="email" value="<?php echo $fetch_list->email; ?>" readonly="" class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="tel" minlength="10" maxlength="10" id="mobile" name="mobile" title="10 digit mobile number"  value="<?php echo $fetch_list->mobile; ?>" readonly="" class="form-control" >
</div> 

<label class="col-sm-2 control-label">Phone No.:</label> 
<div class="col-sm-4" id="regid"> 
 <input type="text" maxlength="10"  pattern="[0-9]{10}" title="Enter your 10 phone number" name="phone" value="<?php echo $fetch_list->phone; ?>" readonly=""  class="form-control">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Pan No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="pan_no" pattern=".{10,10}" maxlength="10" id="pan" placeholder="PAN No 10 digist" title="PAN Number must be 10 character" value="<?php echo $fetch_list->pan_no; ?>" readonly="" class="form-control">
</div> 
<label class="col-sm-2 control-label">GSTIN No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="tin_no" id="gstin"  placeholder="GSTIN" value="<?php echo $fetch_list->tin; ?>"  readonly="" class="form-control">

</div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">Basic Salary:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="basic" value="<?php echo $fetch_list->basic_salary; ?>" readonly="" class="form-control">
</div> 
<label class="col-sm-2 control-label">HRA:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="hra" value="<?php echo $fetch_list->hra; ?>" readonly="" class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Conveyance:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="convnc" value="<?php echo $fetch_list->conveyance; ?>" readonly="" class="form-control">
</div> 
<label class="col-sm-2 control-label">EPF%:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="epf" value="<?php echo $fetch_list->epf; ?>" readonly="" class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">TDS Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="tds_amt" value="<?php echo $fetch_list->tds; ?>" readonly="" class="form-control">
</div> 
<label class="col-sm-2 control-label" style="display:none">CST No:</label> 
<div class="col-sm-4" id="regid" style="display:none"> 
<input type="text" name="cst_no" value="<?php echo $fetch_list->cst; ?>" readonly="" class="form-control">
</div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">Address1:</label> 
<div class="col-sm-4" id="regid"> 
<textarea  name="address1" readonly="" class="form-control"><?php echo $fetch_list->address1; ?></textarea>
</div>  
<label class="col-sm-2 control-label">Address2:</label> 
<div class="col-sm-4" id="regid"> 
<textarea class="form-control" name="address3" readonly ><?php echo $fetch_list->address1 ; ?> </textarea>
</div> 
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_contact_m">  
<input type="text" style="display:none;" id="pri_col" value="contact_id">
</table>
</form>
</div>
</div>
</div>
</div>


</div>			
<form class="form-horizontal" role="form" method="post" action="insert_contact" enctype="multipart/form-data">			
<div id="editcontact" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contenttt">

        </div>
    </div>	 
</div>
</form>
<script>
    $('.modalEditcontact').click(function(){
        var ID=$(this).attr('data-a');
	    $.ajax({url:"updateContact?ID="+ID,cache:true,success:function(result){
            $(".modal-contenttt").html(result);
        }});
    });
</script>	
<?php
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
			







var cell4 = row.insertCell(1);

    var element3 = document.createElement("select");
	element3.name = "frmOrg[]";
	element3.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element3.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serial_number;?>";
    element3.appendChild(option2, null);
    
	<?php }?>
	
	
	cell4.appendChild(element3);
	
	


var cell4 = row.insertCell(2);

    var element3 = document.createElement("select");
	element3.name = "toOrg[]";
	element3.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element3.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serial_number;?>";
    element3.appendChild(option2, null);
    
	<?php }?>
	
	
	cell4.appendChild(element3);
		



var cell5 = row.insertCell(3);
			var element4 = document.createElement("input");
			element4.type = "number";
			element4.setAttribute('step','any');
			element4.setAttribute('min','0');
			element4.className="form-control";
			element4.name = "rateAir[]";
			cell5.appendChild(element4);


var cell6 = row.insertCell(4);
			var element5 = document.createElement("input");
			element5.type = "number";
			element5.setAttribute('step','any');
			element5.setAttribute('min','0');
			element5.name = "rateTrain[]";
			element5.id = 'cost'+rowCount;
			element5.className="form-control";
			cell6.appendChild(element5);


var cell7 = row.insertCell(5);
			var element6 = document.createElement("input");
			element6.type = "number";
			element6.setAttribute('step','any');
			element4.setAttribute('min','0');
			element6.name = "rateSurface[]";
			element6.id = 'conveyance'+rowCount;
			element6.onchange= function() { cal(this.id); };
			element6.className="form-control"
			cell7.appendChild(element6);




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
		
		
		

	</SCRIPT>
    
    
    
    
    
    
<SCRIPT language="javascript">
		function addRow1(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);



			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "checkbox";
			element1.name="chkbox[]";
			cell1.appendChild(element1);
			







var cell4 = row.insertCell(1);

    var element3 = document.createElement("select");
	element3.name = "frmOrg[]";
	element3.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element3.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serial_number;?>";
    element3.appendChild(option2, null);
    
	<?php }?>
	
	
	cell4.appendChild(element3);
	
	


var cell4 = row.insertCell(2);

    var element3 = document.createElement("select");
	element3.name = "toOrg[]";
	element3.className="form-control";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element3.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->keyvalue;?>";
    option2.value = "<?=$getContact->serial_number;?>";
    element3.appendChild(option2, null);
    
	<?php }?>
	
	
	cell4.appendChild(element3);
		



var cell5 = row.insertCell(3);
			var element4 = document.createElement("input");
			element4.type = "number";
			element4.setAttribute('step','any');
			element4.setAttribute('min','0');
			element4.className="form-control";
			element4.name = "rateAir[]";
			cell5.appendChild(element4);


var cell6 = row.insertCell(4);
			var element5 = document.createElement("input");
			element5.type = "number";
			element5.setAttribute('step','any');
			element5.setAttribute('min','0');
			element5.name = "rateTrain[]";
			element5.id = 'cost'+rowCount;
			element5.className="form-control";
			cell6.appendChild(element5);


var cell7 = row.insertCell(5);
			var element6 = document.createElement("input");
			element6.type = "number";
			element6.setAttribute('step','any');
			element4.setAttribute('min','0');
			element6.name = "rateSurface[]";
			element6.id = 'conveyance'+rowCount;
			element6.onchange= function() { cal(this.id); };
			element6.className="form-control"
			cell7.appendChild(element6);




		}






		function deleteRow1(tableID) {
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
		
		
		

	</SCRIPT>
    
    