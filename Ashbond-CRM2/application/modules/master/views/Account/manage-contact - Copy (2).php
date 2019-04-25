<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/Account.php');
$objj=new Account();
$CI =& get_instance();

$list='';

$list=$objj->contact_list_m();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_contact_m';

?>
	 <!-- Main content -->
	 <div class="main-content">
		<form class="form-horizontal" method="post" action="<?=base_url();?>master/Account/insert_test">	
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Master</a></li> 
				<li><a href="#">Contact</a></li> 
				<li class="active"><strong><a href="#">Manage Contact</a></strong></li> 
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0"><i class="fa fa-plus" aria-hidden="true"></i>Add Contact</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Contact</h4>
</div>
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Company Name:</label> 
<div class="col-sm-4"> 						
<input type="text" name="contact_id" value="" />
<input type="text" class="form-control" name="first_name" required value=""> 
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
<select name="maingroupname" class="form-control" required id="contact_id_copy5">

<option value="">-------select---------</option>
<?php $ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");
foreach ($ugroup2->result() as $fetchunit){
?>
<option value="<?php  echo $fetchunit->account_id ;?>"><?php echo $fetchunit->account_name;?></option>
<?php } ?>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Primary Contact:</label> 
<div class="col-sm-4"> 
<input type="text" name="primary_contact" value=""class="form-control">
</div>
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4"> 
<input type="text" name="email" value="" class="form-control"></div>  
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="text" name="mobile" value="" class="form-control" required>
</div>  
<label class="col-sm-2 control-label">IT Pan:</label> 
<div class="col-sm-4"> 
<input type="text" name="it_pan" value=""  class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Gst No:</label> 
<div class="col-sm-4"> 
<input type="text" name="gst_no" value="" class="form-control">
</div>  
<label class="col-sm-2 control-label">Fax:</label> 
<div class="col-sm-4"> 
<input type="text" name="fax" value="" class="form-control">
</div>
</div>
<div class="form-group"> 
 <label class="col-sm-2 control-label">Currency:</label> 
<div class="col-sm-4"> 
<select name="currency" class="form-control">
<option value="">--Select--</option>
<option value="USD $">USD $</option>
<option value="EUR &euro;">EUR &euro;</option>
<option value="GBP &pound;">GBP &pound;</option>
<option value="INR &#8377;">INR &#8377;</option>
</select>
</div>
<label class="col-sm-2 control-label">*State:</label> 
<div class="col-sm-4"> 
<select name="state_id" class="form-control" required>
<option value="">--Select--</option>
<?php
$stateQquery=$this->db->query("select * from tbl_state_m where status='A'");
foreach($stateQquery->result() as $getState){
?>

<option value="<?=$getState->stateid;?>"><?=$getState->stateName;?></option>
<?php
}
?>
</select>
</div>
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Address1:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" style="height:150px; width:280px;" name="address1" ></textarea>
</div>  
<label class="col-sm-2 control-label">Address2:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="address3" style="height:150px; width:280px;"></textarea>
</div>
</div>
</div>

<div id="advice">
<div class="form-group">
<th style="width: 20%;">Name</th>
<th style="width: 39%;">Email Address</th>
<th style="width: 39%;">Mobile</th>
<th style="width: 39%;">Designation</th>
</tr>

</tbody>    
</table>




  <div class="button_pro" style="width:1000px;">
	<div class='space' id='input_1' style="width:94%;">
		<star>*</star>&nbsp;<input id="input_1" style="width:20%;" type="text" name="val[]" class='form-control' />&nbsp;<input id="input_1" style="width:20%;" type="email" name="valemail[]" class='form-control'/>&nbsp;<input id="input_1" style="width:20%;" type="text" name="valmobile[]" class='form-control'/>&nbsp;<input id="input_1" style="width:20%;" type="text" name="desi[]" class='form-control'/>&nbsp;<img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" />
	</div>
   </div>	
	</table>

</div>

<script>
$('document').ready(function(){
    var id=3,txt_box;
	$('.button_pro').on('click','.add',function(){
	//alert();
		  $(this).remove();
		  txt_box='<div class="space" style="width:94%;" id="input_'+id+'" ><input style="width:20%;" type="text" name="val[]" class="form-control"/>&nbsp<input type="email" name="valemail[]" style="width:20%;" class="form-control"/>&nbsp<input type="text" style="width:20%;" name="valmobile[]" class="form-control"/>&nbsp<input type="text" name="desi[]" style="width:20%;" class="form-control"/>&nbsp;<img src="<?php echo base_url();?>assets/image_icon/remove.png" style="width:20px;float: none;" class="remove"/><img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" /></div>';
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
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<a href="#/" class="btn btn-secondary btn-sm delete_all"><i class="fa fa-trash-o"></i>Delete all</a>
</div>
			</ol>
			</form>
			<?php
            if($this->session->flashdata('flash_msg')!='')
{
            ?>
<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php }?>	
			<div class="row">
				<div class="col-lg-12">
					
						<div class="panel-body">
							<div class="table-responsive">
					<form class="form-horizontal" method="post" action="<?=base_url();?>master/Account/insert_contact">	
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th>Company Name</th>
		<th>Primary Contact</th>
		<th>Group Name</th>
        <th>Email Id</th>
		<th>Mobile No.</th>
		 <th>Action</th>
</tr>
</thead>

<tbody>
<?php
  foreach($result as $fetch_list)
  {
  
   $compQuery = $this -> db
    -> select('*')
    -> where('account_id',$fetch_list->group_name)
    -> get('tbl_account_mst');
	$compRow = $compQuery->row();
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->contact_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->contact_id; ?>" value="<?php echo $fetch_list->contact_id; ?>" /></th>
<th><?=$fetch_list->first_name;?></th>
<th><?=$fetch_list->contact_person;?></th>
<th>
<?php if($compRow->account_name=='Vendor'){ ?>
<a href="<?=base_url();?>master/Account/contact_log_pay?id=<?php echo $fetch_list->contact_id; ?>">
<?php }else{ ?>
 <a href="<?=base_url();?>master/Account/contact_log?id=<?php echo $fetch_list->contact_id; ?>">
 <?php } ?>
 <u>
<?=$compRow->account_name;?></u></a></th>
<th><?=$fetch_list->email;?></th>
<th><i class="fa fa-phone" aria-hidden="true"></i>
<a href="tel:9716127292"><?=$fetch_list->mobile;?></a></th>

<th>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="fa fa-eye"></i></button>
<button class="btn btn-default modalEditContact" onclick="contactedit('<?php echo $fetch_list->contact_id;?>')" href='#editContact' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>
<?php
$pri_col='contact_id';
$table_name='tbl_contact_m';
	?>
	<button class="btn btn-default delbutton" id="<?=$fetch_list->contact_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>	
</th>
</tr>
<div id="modal-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Contact</h4>
</div>


</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++;} ?>
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
<form class="form-horizontal" role="form" method="post" action="insert_test" enctype="multipart/form-data">			
<div id="editContact" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="contentitem">

        </div>
    </div>	 
</div>
</form>
<script>
function contactedit(v){
//alert(v);
//var customerandloc=document.getElementById("customer_id").value;     

//var pro=v+'^'+customerandloc;
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "updatecontact?ID="+v, false);
 xhttp.send();
 document.getElementById("contentitem").innerHTML = xhttp.responseText;
} 

function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);			

			
var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.name = "val[]";
			element1.className="form-control";
			cell1.appendChild(element1);

var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
			element2.type = "text";
			element2.name = "valemail[]";
			element2.className="form-control";
			cell2.appendChild(element2);

var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
			element3.type = "text";
			element3.name = "valmobile[]";
			element3.className="form-control";
			cell3.appendChild(element3);
			
var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
			element4.type = "text";
			element4.name = "desi[]";
			element4.className="form-control";
			cell4.appendChild(element4);		

var cell5 = row.insertCell(4);
			var element5 = document.createElement("img");
			element5.src = "<?php echo base_url();?>assets/image_icon/remove.png";
			element5.style = "width:20px;float: none;";
			element5.className="remove";
			element5.onclick=function() { deleteRow('button_pro'); };
			cell5.appendChild(element5);
			
			var element6 = document.createElement("img");
			element6.src = "<?php echo base_url();?>assets/image_icon/add.png";
			element6.style = "width:20px;float: none;";
			element6.className="add right";
			element6.onclick=function() { addRow('button_pro'); };
			cell5.appendChild(element6);
		


function deleteRow(tableID) {
alert('hghg');
		var i = tableID.parentNode.parentNode.rowIndex;
		document.getElementById("button_pro").deleteRow(i);
}
}
</script>	
<?php

$this->load->view("footer.php");
?>