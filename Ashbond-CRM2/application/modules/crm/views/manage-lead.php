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
<form class="form-horizontal" role="form" method="post" action="insert_lead_and_activity" enctype="multipart/form-data">	
<ol class="breadcrumb breadcrumb-2"> 
<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="#">Crm</a></li> 
 
<li class="active"><strong><a href="#">Manage Lead</a></strong></li> 
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0">Add Lead</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Lead</h4>
</div>

<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Customer:</label> 
<div class="col-sm-4"> 
<select name="contact_id" id="contact_id"   class="form-control ui fluid search dropdown email"  onchange="genrateLeadNo();" required >
	<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
	<option value="<?php echo $fetchgroup->contact_id; ?>"><?php echo $fetchgroup->first_name ; ?></option>
    <?php } ?>
</select>
<a  onclick="DataAddContactList()" href='#LeadAddContact' data-toggle="modal" data-backdrop='static' data-keyboard='false'>
<img src="<?php echo base_url();?>/assets/images/addcontact.png" width="20px" height="20px"/></a>

</div> 
<label class="col-sm-2 control-label">*Sales Person:</label> 
<div class="col-sm-4"> 
<select name="sales_person_id" id="sales_person_id"  class="form-control" onchange="genrateLeadNo();" required >
	<option value="">----Select ----</option>
					<?php 
						if($this->session->userdata('user_id')=='1')
						{
						 	$sqlgroup=$this->db->query("select * from tbl_user_mst where comp_id !='1' ");
						}
						else
						{
							$sqlgroup=$this->db->query("select * from tbl_user_mst where comp_id='".$this->session->userdata('comp_id')."' ");
						}
						foreach ($sqlgroup->result() as $fetchgroup){
						
					?>
    <option value="<?php echo $fetchgroup->user_id; ?>"><?php echo $fetchgroup->user_name ; ?></option>
    <?php } ?>
</select>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Lead Number:</label> 
<div class="col-sm-4"> 
<input type="text" name="lead_number" id="lead_number" class="form-control" value="" readonly required>
</div>
<label class="col-sm-2 control-label">*Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person"   class="form-control" value="" required>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email_id"   class="form-control" value="" required>
</div> 
<label class="col-sm-2 control-label">*Phone:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="phone"   class="form-control" value="" required>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Potential Revenue:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="potential_revenue" value="" class="form-control" >
</div>  
<label class="col-sm-2 control-label">Expected Closure Date:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="exptd_closer_date"   class="form-control" value="">
</div> 

</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Priority:</label> 
<div class="col-sm-4" id="regid"> 
<select name="priority"  class="form-control" required>
<option value="">--Select--</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='17'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div> 
<label class="col-sm-2 control-label">*Source:</label> 
<div class="col-sm-4" id="regid"> 
<select name="source"  class="form-control" onChange="SourceOthers(this.value)" required>
<option value="">--Select--</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='18'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div>
</div>

<div class="form-group" id="sourceid" style="display:none;">  
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
</div> 
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
<input name="source_others" type="text"  class="form-control" value="">
</div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">Price List:</label> 
<div class="col-sm-4" id="regid"> 
<select name="price_list" class="form-control">
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='20'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div>
<label class="col-sm-2 control-label">Competitor:</label> 
<div class="col-sm-4" id="regid"> 
<input name="competitor" type="text"  class="form-control" value="">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Stage:</label> 
<div class="col-sm-4" id="regid"> 
<select name="stage" class="form-control" required>
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='21'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div>
<label class="col-sm-2 control-label">Industry:</label> 
<div class="col-sm-4" id="regid"> 
<select name="industry" class="form-control" >
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='22'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Subject:</label> 
<div class="col-sm-4"> 
<textarea name="subject"   class="form-control" required></textarea>
</div>
<label class="col-sm-2 control-label">Remarks:</label> 
<div class="col-sm-4" id="regid"> 
<textarea name="remarks" class="form-control"></textarea>
</div>
</div>

</div>


<div class="modal-header">
<h4 class="modal-title">Add Activity</h4>
</div>

<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Next Action:</label> 
<div class="col-sm-4"> 
<select name="nxt_action" class="form-control"   required >
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

<!--<div class="form-group"> 
<label class="col-sm-2 control-label">*Communication:</label> 
<div class="col-sm-4"> 
<textarea name="communication" class="form-control" required ></textarea>
</div> 
<label class="col-sm-2 control-label">*Plan Next Activity:</label> 
<div class="col-sm-4"> 
<textarea name="plan_nxt_activity" class="form-control" required></textarea>
</div> 
</div>-->

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
</div>

<div class="row">
<div class="col-sm-12" id="listingData">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<button class="dt-button buttons-excel buttons-html5" onclick="exportTableToExcel('tblData')">Excel</button>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" url="<?=base_url();?>crm/Lead/manage_lead" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
	<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
</select>
Entries</label>
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="margin-top: -6px;margin-left: 12px;float: right;">
	Showing <?=$dataConfig['page']+1;?> To 
	<?php
		$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
		echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
	?> of <?=$dataConfig['total'];?> Entries
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

<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead style="background: beige;">
<tr>
<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>  
<th><div style="width:200px;">Lead Number</div></th>
<th><div style="width:70px;">Tour Id</div></th>
<th><div style="width:80px;">User Name</div></th>
<th><div style="width:150px;">Customer Name</div></th>
<th><div style="width:80px;">Sales Person</div></th>
<th><div style="width:90px;">Contact Person</div></th>
<th><div style="width:200px;">Subject</div></th>
<th><div style="width:80px;">Priority</div></th>
<th><div style="width:105px;">Exptd Closure Date</div></th>
<th><div style="width:80px;">Source</div></th>
<th><div style="width:90px;">Stage</div></th>
<th><div style="width:235px;">Action</div></th>
</tr>
</thead>

<tbody id="getDataTable">
<form>
<tr>
	<td>&nbsp;</td>
	<td><input name="lead_number"  type="text"  class="form-control"  value="" /></td>
	<td><input name="tour_id"  type="text"  class="form-control"  value="" /></td>
	<td><input name="user"  type="text"  class="form-control"  value="" /></td>
	<td><input name="customer"  type="text"  class="form-control"  value="" /></td>
	<td><input name="sales_person"  type="text"  class="form-control"  value="" /></td>
	<td><input name="contact_person"  type="text"  class="form-control"  value="" /></td>
	<td><input name="subject"  type="text"  class="form-control"  value="" /></td>
	<td><input name="priority"  type="text"  class="form-control"  value="" /></td>
	<td><input name="closure_date"  type="date"  class="form-control"  value=""  style="width: 155px;"/></td>
	<td><input name="source"  type="text"  class="form-control"  value="" /></td>
	<td><input name="stage"  type="text"  class="form-control"  value="" /></td>
	<td><button type="submit" class="btn btn-secondary btn-sm" name="filter" value="filter"><span>FILTER</span></button></td>
</tr>
</form>

<?php
$i=2;
foreach($result as $fetch_list)
{
?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->lead_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->lead_id; ?>" value="<?php echo $fetch_list->lead_id;?>" /></th>
<th><?php echo  $fetch_list->lead_number;; ?></th>
<th><?php echo  $fetch_list->tour_id;; ?></th>
<th><?php
	$user=$this->db->query("select * from tbl_user_mst where comp_id='".$fetch_list->comp_id."' ");
	$getUser=$user->row();
	echo $getUser->user_name; ?>
</th>
<th><?php 
	$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$fetch_list->contact_id' and group_name='4'");
	$res1 = $sqlgroup->row();
	echo $res1->first_name; ?>
</th>
<th><?php
	$sqlgroup1=$this->db->query("select * from tbl_user_mst where user_id='$fetch_list->sales_person_id' ");
	$res11 = $sqlgroup1->row();
	echo  $res11->user_name;
	//echo $fetch_list->lead_type_id; ?>
</th>
<th><?php echo $fetch_list->contact_person;?></th>
<th><?php echo $fetch_list->subject;?></th>
<th><?php 
	$sqlproit=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->priority'");
	$res1111 = $sqlproit->row();
	echo $res1111->keyvalue; ?>
</th>
<th style="text-align:center;"><?php echo $fetch_list->exptd_closer_date;?></th>
<th>
<?php 
	$sqlproit22=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->source'");
	$res111122 = $sqlproit22->row();
	echo $res111122->keyvalue; ?>
</th>

<th><?php 
	$sqlstatus=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->lead_status'");
	$fecthStatus = $sqlstatus->row();
	echo $fecthStatus->keyvalue; ?>
</th>

<th>

<button class="btn btn-default" onclick="viewLead('<?php echo $fetch_list->lead_id;?>')" href='#viewlead' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="fa fa-eye"></i></button>

<button class="btn btn-default" onclick="leadedit('<?php echo $fetch_list->lead_id;?>')" href='#editLead' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>


<?php 
$pri_col='lead_id';
$table_name='tbl_leads';
?>
<button class="btn btn-default delbuttonlead" id="<?php echo $fetch_list->lead_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>

<a class="btn btn-sm" href="<?=base_url();?>crm/Lead/view_all_data?lead_id=<?=$fetch_list->lead_id;?>" target="_blank">View</a>
 
 
<button class="btn btn-sm" onclick="openpopup('<?=base_url();?>crm/Lead/add_productlead',1200,500,'id',<?php echo $fetch_list->lead_id;?>);" type="button" data-toggle="modal">Add Item</button>
 
</th>
</tr>

<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_leads">  
<input type="text" style="display:none;" id="pri_col" value="lead_id">
</table>


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

<form class="form-horizontal" role="form" method="post" action="update_lead_and_activity" enctype="multipart/form-data">			
<div id="editLead" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="contentlead">

        </div>
    </div>	 
</div>
</form>


<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">			
<div id="viewlead" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="contentViewLead">

        </div>
    </div>	 
</div>
</form>

<form class="form-horizontal" role="form" id="contactForm"  enctype="multipart/form-data">			
<div id="LeadAddContact" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="AddContactList">

        </div>
    </div>	 
</div>

</form>

<script>

function DataAddContactList()
{

//alert(v);
var ur = "<?=base_url('master/Account/add_contact');?>"
$.ajax({   
				  
					type: "POST",  
					url: ur,  
				    success: function(data)  
					{   
						document.getElementById("AddContactList").innerHTML = data;
					}   
				});

}


/*function AddContactList()
{
//alert(v);
var xhttp = new XMLHttpRequest();
 xhttp.open("POST","add_contact", false);
 xhttp.send();
 document.getElementById("contact_add").innerHTML = xhttp.responseText;
} */

function viewLead(v){
//alert(v);
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "viewLead?ID="+v, false);
 xhttp.send();
 document.getElementById("contentViewLead").innerHTML = xhttp.responseText;
} 


function leadedit(v){
//alert(v);

var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "updateLead?ID="+v, false);
 xhttp.send();
 document.getElementById("contentlead").innerHTML = xhttp.responseText;
} 


function SourceOthers(v)
{
//alert(v);
	if(v==15){
		document.getElementById("sourceid").style.display="Block";
	}else{
		document.getElementById("sourceid").style.display="none";
	}
}

function SourceOthersEdit(v)
{
//alert(v);
	if(v==15){
		document.getElementById("sourceidedit").style.display="Block";
	}else{
		document.getElementById("sourceidedit").style.display="none";
	}
}


</script>	
<?php
$this->load->view("footer.php");
?>

<script type="text/javascript">

function xyz(v){

//alert(v);
	var actiontaken=v.split("_");
	var val1=actiontaken[0];
	var val2=actiontaken[1];
var id = val2;	
var com = $('#com_'+val2).val();
var plan = $('#plan_'+val2).val();
if(confirm("Are You Sure! You Want To Update Log ?"))
		  {
      $.ajax({
		   type: "GET",
		   url: "update_activity_log_data",
		   data: {'id':id,'com':com,'plan':plan},
		   success: function(data){
		   
		   $('#editLead .close').click();
		   //alert(data);
  			}
 		});

 //document.getElementById("record"+val2).style.display = 'none';
 //location.reload();
 }

}

function abcd(v){

//alert(v);
	var actiontaken=v.split(",");
	var val1=actiontaken[0];
	var val2=actiontaken[1];
	
var info = 'id=' + val1;
//alert(info);
 if(confirm("Are You Sure! You Want To Delete Log ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_activity_log_data",
   data: info,
   success: function(){
  
   }
 });

 document.getElementById("record"+val2).style.display = 'none';
 //location.reload();
 }

}


function genrateLeadNo()
{
  var contact = $('#contact_id').val();
  var sales = $('#sales_person_id').val();
    ur = "<?=base_url('crm/Lead/ajex_nextIncrementId');?>";
    $.ajax({
      url: ur,
      data:{'customer':contact,'sales_person':sales},
      type: "POST",
      success: function(data){
      	//alert(data);
      	if(data != ""){
      	  $("#lead_number").val(data);
      	}
       }
    });
}

function genrateLeadNoEdit()
{
	//alert();
  var contact = $('#contact_id_edit').val();
  var sales = $('#sales_person_id_edit').val();
    ur = "<?=base_url('crm/Lead/ajex_nextIncrementId');?>";
    $.ajax({
      url: ur,
      data:{'customer':contact,'sales_person':sales},
      type: "POST",
      success: function(data){
      
      	if(data != ""){
			//alert(data);
      	  $("#lead_number_edit").val(data);
      	}
       }
    });
}

</script>



<script>
function exportTableToExcel(tableID, filename = ''){
 
 	//alert();
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'LeadData_<?php echo date('d-m-Y');?>.xls';
    
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