<?php
$this->load->view("header.php");
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_product_stock';

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}


?>
<!-- Main content -->
<div class="main-content">
<form class="form-horizontal" role="form" method="post" action="update_activity" enctype="multipart/form-data">	
<ol class="breadcrumb breadcrumb-2"> 
<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="#">Activity</a></li> 
<li class="active"><strong><a href="#">Manage Activity</a></strong></li> 
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0">Add Activity</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Activity</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Lead No:</label> 
<div class="col-sm-4"> 
<select name="lead_id" class="form-control ui fluid search dropdown email" required onchange="getcust(this.value)">
			<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_leads where status='A'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
			 <option value="<?php echo $fetchgroup->lead_id; ?>"><?php echo $fetchgroup->lead_id; ?></option>
			    <?php } ?>
</select>
</div>
<label class="col-sm-2 control-label">*Customer Name:</label>
<div class="col-sm-4"> 
<select name="customer" id="customer" class="form-control" disabled="disabled" >
			<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_contact_m where status='A'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
		    <option value="<?php echo $fetchgroup->contact_id; ?>"><?php echo $fetchgroup->first_name ; ?></option>
			<?php } ?>
</select>
</div>
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">*Next Action:</label>
<div class="col-sm-4"> 
<select name="nxt_action" class="form-control ui fluid search dropdown email"   required >
				<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_master_data where status='A' and param_id='23'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
                <option value="<?php echo $fetchgroup->serial_number; ?>"><?php echo $fetchgroup->keyvalue ; ?></option>
			    <?php } ?>
</select>
</div> 
<input type="hidden" name="popup" value="<?php echo $_GET['popup'];?>" />
<input type="hidden" name="leadid" value="<?php echo $ID;  ?>" />
<label class="col-sm-2 control-label">*Next Action Date:</label> 
<div class="col-sm-4"> 
<input type="date" name="nxt_action_date" class="form-control" required >
</div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">*Current Date:</label> 
<div class="col-sm-4"> 
<input type="date" name="crnt_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required >
</div> 
<label class="col-sm-2 control-label">*Communication:</label> 
<div class="col-sm-4"> 
<textarea name="communication" class="form-control" required ></textarea>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Plan Next Activity:</label> 
<div class="col-sm-4"> 
<textarea name="plan_nxt_activity" class="form-control" required></textarea>
</div> 
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<a type="button" class="btn btn-secondary btn-sm delete_all">Delete Selected</a>
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
<div class="col-sm-12" id="listingData">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<a class="dt-button buttons-excel buttons-html5" style="display:none;" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
<button class="dt-button buttons-excel buttons-html5" onclick="exportTableToExcel('tblData')">Excel</button>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show
<select name="DataTables_Table_0_length" url="<?=base_url();?>activity/Activity/manage_activity" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
	<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
</select>
entries</label>
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -8px;margin-left: 12px;float: right;">Showing <?=$dataConfig['page']+1;?> to 
<?php
$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
?> of <?=$dataConfig['total'];?> entries
</div>
</div>

<div id="DataTables_Table_0_filter" class="dataTables_filter">
<label>Search:
<input type="text" id="searchTerm"  class="search_box form-control input-sm" onkeyup="doSearch()"  placeholder="What you looking for?">
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
<form1 class="form-horizontal" role="form" method="post" action="update_lead" enctype="multipart/form-data">	
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData">
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
		<th><div style="width:45px;">Sr. No.</div></th>
		<th><div style="width:70px;">User Name</div></th>
		<th><div style="width:90px;">Date</div></th>
		<th><div style="width:50px;">Lead No.</div></th>
        <th><div style="width:70px;">Next Action</div></th>
		<th><div style="width:100px;">Next Action Date</div></th>
		<th><div style="width:100px;">Communication</div></th>
		<th><div style="width:100px;">Plan Next Activity</div></th>
		<th><div style="width:100px;">Action</div></th>
</tr>
</thead>

<tbody id="getDataTable">
<form>
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><input name="user"  type="text"  class="form-control"  value="" /></td>
	<td><input name="date"  type="date"  class="form-control"  value="" /></td>
	<td><input name="lead_id"  type="text"  class="form-control"  value="" /></td>
	<td><input name="next_action"  type="text"  class="form-control"  value="" /></td>
	<td><input name="next_action_date"  type="date"  class="form-control"  value="" /></td>
	<td><input name="communication"  type="text"  class="form-control"  value="" /></td>
	<td><input name="plan_nxt_activity"  type="text"  class="form-control"  value="" /></td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>

<?php
	$i=1;
  foreach($result as $fetch_list)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->activity_id; ?>">
<th>
<?php
$productId= $fetch_list->activity_id;

$checkProduct= $obj->product_check($productId);
if($checkProduct=='1')
{
?><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->activity_id; ?>" value="<?php echo $fetch_list->activity_id;?>" />
<?php } else{
?>
<spam data-id="" title="Invoice already ctrated for this product.you can not delete ?"   />*</spam>

<?php }?>
</th>
<th><?php echo  $i; //echo  $fetch_list->activity_id; ?></th>
<th><?php
$user=$this->db->query("select * from tbl_user_mst where comp_id='".$fetch_list->comp_id."' ");
$getUser=$user->row();
echo $getUser->user_name; ?>
</th>
<th><?=$fetch_list->maker_date; ?></th>
<th><?php echo $fetch_list->lead_id;?></th>
<th><?php 
$sqlproit=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->nxt_action'");
$res1111 = $sqlproit->row();
echo $res1111->keyvalue; ?>
</th>
<th><?php echo  $fetch_list->nxt_action_date;?></th>
<th><?php echo  $fetch_list->communication;?></th>
<th><?php echo  $fetch_list->plan_nxt_activity;?></th>
<th>
<button class="btn btn-default modalAddActivity" onclick="addActivity('<?php echo $fetch_list->lead_id;?>')" href='#addactivity' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>
<?php 
$pri_col='activity_id';
$table_name='tbl_activity';
if($delete!=''){ 
if($checkProduct=='1')
{
?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->activity_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<?php
}
else
{
?>
<button class="btn btn-default " onclick="return confirm('Invoice already ctrated for this product.you can not delete ?');" type="button"><i class="icon-trash"></i></button> 
<?php } } ?>
</th>
</tr>
<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_activity">  
<input type="text" style="display:none;" id="pri_col" value="activity_id">
</table>
</form1>
<div class="row">
 <div class="col-md-12 text-right">
  <div class="col-md-6 text-left"> 
  </div>
 	<div class="col-md-6"> 
		<?php echo $pagination; ?>
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

<form class="form-horizontal" role="form" method="post" action="update_activity" enctype="multipart/form-data">			
<div id="addactivity" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="contentactivity1111">

        </div>
    </div>	 
</div>
</form>

<script>

function addActivity(v){
//alert(v);
//var customerandloc=document.getElementById("customer_id").value;     

//var pro=v+'^'+customerandloc;
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "addactivity?ID="+v, false);
 xhttp.send();
 //alert(xhttp.responseText);
 document.getElementById("contentactivity1111").innerHTML = xhttp.responseText;
}


function getcust(v){
//alert(v);
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "getcoust?ID="+v, false);
 xhttp.send();
 //alert(xhttp.responseText);
 document.getElementById("customer").value = xhttp.responseText;
}

   
//##########################################################################

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
    filename = filename?filename+'.xls':'ActivityData_<?php echo date('d-m-Y');?>.xls';
    
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