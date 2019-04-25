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

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}


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
<input type="hidden" name="contact_id" value="" />
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
<label class="col-sm-2 control-label">Primary Contact:</label> 
<div class="col-sm-4"> 
<input type="text" name="primary_contact" value=""class="form-control">
</div>
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4"> 
<input type="text" name="email" value="" class="form-control">
</div>  
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="number" name="mobile" value="" class="form-control" required>
</div>  
<label class="col-sm-2 control-label">Fax:</label> 
<div class="col-sm-4"> 
<input type="text" name="fax" value="" class="form-control">
</div>
</div>

<div class="form-group"> 
<!--<label class="col-sm-2 control-label">Gst No:</label> 
<div class="col-sm-4"> 
<input type="text" name="gst_no" value="" class="form-control">
</div>  -->
<!--<label class="col-sm-2 control-label">IT Pan:</label> 
<div class="col-sm-4"> 
<input type="text" name="it_pan" value=""  class="form-control">
</div> -->

</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Code:</label> 
<div class="col-sm-4"> 
<input type="text" name="code" value="" class="form-control" required>
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
<?php } ?>
</select>
</div>
</div>

<div class="form-group"> 
<!--<label class="col-sm-2 control-label">Currency:</label> 
<div class="col-sm-4"> 
<select name="currency" class="form-control">
<option value="">--Select--</option>
<option value="USD $">USD $</option>
<option value="EUR &euro;">EUR &euro;</option>
<option value="GBP &pound;">GBP &pound;</option>
<option value="INR &#8377;">INR &#8377;</option>
</select>
</div>
-->
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Address1:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" style="height:150px;" name="address1" ></textarea>
</div>  
<!--<label class="col-sm-2 control-label">Address2:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="address3" style="height:150px;"></textarea>
</div>-->
</div>

<div class="form-group">
<table id='input_1' class="table table-striped table-bordered table-hover button_pro" style="width:96%; margin:auto;">
<tr>
	<th>Name</th>
	<th>Email Address</th>
	<th>Mobile</th>
	<th>Designation</th>
	<th></th>
</tr>
<tr id="input_1">
<th><input type="text" id="input_1" name="val[]" class='form-control' /></th> 
<th><input type="email" id="input_1" name="valemail[]" class='form-control'/></th>
<th><input type="text" id="input_1" name="valmobile[]" class='form-control'/></th>
<th><input type="text" id="input_1" name="desi[]" class='form-control'/></th>
<th><img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" /></th>
</tr>	

</table>

</div>

<script>
$('document').ready(function(){
    var id=3,txt_box;
	$('.button_pro').on('click','.add',function(){
	//alert();
		  $(this).remove();
		  txt_box='<tr id="input_'+id+'"><th><input type="text" name="val[]" class="form-control"/></th><th><input type="email" name="valemail[]" class="form-control"/></th><th><input type="text" name="valmobile[]" class="form-control"/></th><th><input type="text" name="desi[]" class="form-control"/></th><th><img src="<?php echo base_url();?>assets/image_icon/remove.png" style="width:20px;float: none;" class="remove"/><img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" /></th></tr>';
		  $(".button_pro").append(txt_box);
		  id++;
	});

	$('.button_pro').on('click','.remove',function(){
	        var parent=$(this).parents("tr").prev().attr("id");
			//alert(parent);
			var parent_im=$(this).parents("tr").attr("id");
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
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<button class="dt-button buttons-excel buttons-html5" onclick="exportTableToExcel('tblData')">Excel</button> 
<a class="dt-button buttons-excel buttons-html5" style="display:none" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('master/Account/manage_contact');?>" class="form-control input-sm">
	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
</select>
Entries</label>

<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -8px;margin-left: 12px;float: right;">
	Showing <?=$dataConfig['page']+1;?> to 
	<?php
	$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
	echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
	?> of <?php echo $dataConfig['total'];?> Entries
</div>
</div>
<div id="DataTables_Table_0_filter" class="dataTables_filter">
<label>Search:
<input type="text" class="form-control input-sm" id="searchTerm"  onkeyup="doSearch()" placeholder="What you looking for?">
</label>
</div>
</div>
</div>
</div>
<br />

<div class="row">
<div class="col-lg-12">
<div class="panel-body">
<div class="table-responsive">
<form1 class="form-horizontal" method="post" action="<?=base_url();?>master/Account/insert_contact">	
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead style="background: beige;">
<tr>
<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
<th>Company Name</th>
<th>Primary Contact</th>
<th><div style="width:100px;">Group Name</div></th>
<th>Email Id</th>
<th><div style="width:110px;">Mobile No.</div></th>
<th><div style="width:100px;">Action</div></th>
</tr>
</thead>

<tbody id="getDataTable">
<form method="get">
<tr>
	<td>&nbsp;</td>
	<td><input name="company_name"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="primary_contact"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="group_name"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="email_id"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="mobile_no"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><button type="submit" class="btn btn-secondary btn-sm" name="filter" value="filter"><span>FILTER</span></button></td>
</tr>
</form>

<?php
foreach($result as $fetch_list){
  
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
<th><?=$compRow->account_name;?></th>
<th><?=$fetch_list->email;?></th>
<th><i class="fa fa-phone" aria-hidden="true"></i>
<a href="tel:9716127292"><?=$fetch_list->mobile;?></a></th>

<th>
<button class="btn btn-default" style="display:none;" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="fa fa-eye"></i></button>

<button class="btn btn-default" onclick="viewContact('<?php echo $fetch_list->contact_id;?>')" href='#contactview' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="fa fa-eye"></i></button>

<button class="btn btn-default modalEditContact" onclick="contactedit('<?php echo $fetch_list->contact_id;?>')" href='#editContact' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>
<?php
$pri_col='contact_id';
$table_name='tbl_contact_m';
?>
<button class="btn btn-default delbutton" id="<?=$fetch_list->contact_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>	
</th>
</tr>

<?php $i++;} ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_contact_m">  
<input type="text" style="display:none;" id="pri_col" value="contact_id">
</table>
</form1>
<div class="row">
     <div class="col-md-12 text-right">
    	  <div class="col-md-6 text-left"> 
    	  </div>
    	  <div class="col-md-6"> 
             <?=$pagination; ?>
          </div>

          <div class="popover fade right in displayclass" role="tooltip" id="popover" style=" background-color: #ffffff;border-color: #212B4F;">
		<div class="popover-content" id="showParent"></div>
		</div>
     </div>
</div>

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
<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">			
<div id="contactview" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="contactitemview">

        </div>
    </div>	 
</div>
</form>
<script>
function contactedit(v){
//alert(v);
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "updatecontact?ID="+v, false);
 xhttp.send();
 document.getElementById("contentitem").innerHTML = xhttp.responseText;
}

function viewContact(v){
//alert(v);
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "view_contact?ID="+v, false);
 xhttp.send();
 document.getElementById("contactitemview").innerHTML = xhttp.responseText;
}
 

var id=2;
function addRow(tableID) {
			//alert(id);
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);			

			
var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.name = "val[]";
			element1.id = "input_"+id;
			element1.className="form-control";
			cell1.appendChild(element1);

var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
			element2.type = "text";
			element2.name = "valemail[]";
			element2.id = "input_"+id;
			element2.className="form-control";
			cell2.appendChild(element2);

var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
			element3.type = "text";
			element3.name = "valmobile[]";
			element3.id = "input_"+id;
			element3.className="form-control";
			cell3.appendChild(element3);
			
var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
			element4.type = "text";
			element4.name = "desi[]";
			element4.id = "input_"+id;
			element4.className="form-control";
			cell4.appendChild(element4);		

var cell5 = row.insertCell(4);
			var element5 = document.createElement("img");
			element5.src = "<?php echo base_url();?>assets/image_icon/remove.png";
			element5.style = "width:20px;float: none;";
			element5.className="remove11";
			element5.onclick=function() { deleteRow('button_pro1'); };
			cell5.appendChild(element5);
			
			var element6 = document.createElement("img");
			element6.src = "<?php echo base_url();?>assets/image_icon/add.png";
			element6.style = "width:20px;float: none;";
			element6.className="add right";
			element6.onclick=function() { addRow('button_pro1'); };
			cell5.appendChild(element6);
		
id++;

function deleteRow(id){

	var i = row.parentNode.parentNode.rowIndex;
	alert(id);
	document.getElementById("button_pro1").deleteRow(i);
}
}
</script>	
<?php
$this->load->view("footer.php");
?>
<script>

function exportTableToExcel(tableID, filename = ''){
 
 	//alert();
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'ContactList_<?php echo date('d-m-Y'); ?>.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{

        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>