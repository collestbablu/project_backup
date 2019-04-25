<?php
$this->load->view("header.php");
?>
	 <!-- Main content -->
	 <div class="main-content">
<form class="form-horizontal" role="form" method="post" action="insert_branch_delivery" enctype="multipart/form-data">			
			<ol class="breadcrumb breadcrumb-2"> 
<li><a href="index.html"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="#">Branch Delivery</a></li> 
<li class="active"><strong>Branch Delivery Cost</strong></li>
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0">Add Branch Delivery Cost</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg" style="width:1200px;" >
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Branch Delivery</h4>
</div>
<div class="table-responsive">
<INPUT type="button" value="Add Row" class="btn btn-sm" onclick="addRow('dataTable')" />

	<INPUT type="button" class="btn btn-secondary btn-sm" value="Delete Row" onclick="deleteRow('dataTable')" />
<table class="table table-striped table-bordered table-hover" id="dataTable" >
<tbody>
<tr class="gradeA">
<th>Check</th>
<th>Date</th>
<th>Branch</th>
<th>Vol. Weight</th>
<th>Total</th>
</tr>

<tr class="gradeA">
<th><input type="checkbox" name="chkbox[]"  /></th>

<th><input type="date" name="date[]"  class="form-control" ></th>

<th >
<select name="branch[]" class="form-control" >
<option value="">--Select--</option>
<?php

	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
<option value="<?=$getContact->serial_number;?>"><?=$getContact->keyvalue;?></option>

<?php }?>
</select>

</th>
<th><input type="number" name="vol_wt[]"   value="" class="form-control" ></th>
<th><input type="number" name="total[]"    value="" class="form-control" ></th>

</tr>
</tbody>
</table>
<table class="table table-striped table-bordered table-hover">
<tbody>
<tr>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Total Weight</td><td><input type="number" name="total_vol_weight[]" class="form-control" /></td>
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
			<form class="form-horizontal" >					
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
 	   <th> Date </th>
        <th>Branch</th>
		<th>Volume Weight</th>
         <th>Total</th>
		 <th>Total Vol. Weight</th>
		 <th>Action</th>
</tr>
</thead>

<tbody>
<?php  
$i=1;
if( !empty($results) ) {
  foreach($results as $fetch_list)  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->branchd_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->branchd_id; ?>" value="<?php echo $fetch_list->branchd_id;?>" /></th>

<th><?=$fetch_list->date;?></th>
<th><?php 
//echo "select * from tbl_master_data where serial_number='$fetch_list->branch'";
$brnch=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->branch'");
$brnchdata=$brnch->row();
echo $brnchdata->keyvalue;
?></th>
<th><?=$fetch_list->vol_wt;?></th>
<th><?=$fetch_list->total;?></th>
<th><?=$fetch_list->total_vol_weight ?></th>
<th class="bs-example">
<?php if($view!=''){ ?>

<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i;?>" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" data-a="<?php echo $fetch_list->branchd_id;?>" href='#editBranch' onclick="updateBranchDelivery('<?php echo $fetch_list->branchd_id;?>')" type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='branchd_id';
$table_name='tbl_branch_delivery';
?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->branchd_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>		

 
</th>
</tr>
<div id="modal-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Branch Delivery</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">Date:</label> 
<div class="col-sm-4"> 	
<input type="text" class="form-control" name="date[]" value="<?php echo $fetch_list->date; ?>" readonly> 
</div> 
<label class="col-sm-2 control-label">*Branch:</label> 
<div class="col-sm-4"> 
<select name="branch" required class="form-control" disabled="disabled">
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id='18'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->branch){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>

</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Vol. Weight:</label> 
<div class="col-sm-4" > 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->vol_wt; ?>" readonly class="form-control" required></div>

<label class="col-sm-2 control-label">Total:</label> 
<div class="col-sm-4" id="regid"> 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->total; ?>" readonly class="form-control" required></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Total Weight:</label> 
<div class="col-sm-4" > 
<input name="total_vol_weight[]"  type="text" value="<?php echo $fetch_list->total_vol_weight; ?>" readonly class="form-control" required></div>
</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++; } } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_branch_delivery">  
<input type="text" style="display:none;" id="pri_col" value="branchd_id">
</table>
</form>
</div>
</div>
</div>
</div>
</div>
<form class="form-horizontal" role="form" method="post" action="update_branch_delivery" enctype="multipart/form-data">			
<div id="editBranch" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contentitem" id="modal-contentitem">

        </div>
    </div>	 
</div>
</form>
<script>
 
 function updateBranchDelivery(v){

var pro=v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "updateBranch?ID="+pro, false);
  xhttp.send();
  document.getElementById("modal-contentitem").innerHTML = xhttp.responseText;
 } 
 
 
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
			var element2 = document.createElement("input");
			element2.type = "date";
			element2.name = "date[]";
			element2.className="form-control";
			cell3.appendChild(element2);


var cell4 = row.insertCell(2);

    var element3 = document.createElement("select");
	element3.name = "branch[]";
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
			element4.name = "vol_wt[]";
			cell5.appendChild(element4);




var cell8 = row.insertCell(4);
			var element7 = document.createElement("input");
			element7.type = "number";
			element4.setAttribute('step','any');
			element4.setAttribute('min','0');
			element7.name = "total[]";
			//element7.setAttribute("readonly", true);
			element7.id = 'tot'+rowCount;
			element7.className="form-control"
			cell8.appendChild(element7);

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

    
    
    
    
    