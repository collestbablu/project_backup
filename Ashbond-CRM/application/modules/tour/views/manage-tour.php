<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/tour/controllers/Tour.php');
$objj=new Tour();
$CI =& get_instance();

$list='';

$list=$objj->item_list();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_tour';

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}


?>
<!-- Main content -->
<div class="main-content">
<form class="form-horizontal" role="form" method="post" action="insert_tour" enctype="multipart/form-data">	
<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a>Tour</a></li> 
	<li class="active"><strong><a>Manage Tour</a></strong></li> 
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0">Add Tour</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Tour</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Customer:</label> 
<div class="col-sm-4"> 		
<select name="contact_id" id="contact_id"   class="form-control ui fluid search dropdown email"   required >
			<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
		    <option value="<?php echo $fetchgroup->contact_id; ?>"><?php echo $fetchgroup->first_name ; ?></option>
		    <?php } ?>
</select>
<a  onclick="ItemAddContactList()" href='#LeadAddContact' data-toggle="modal" data-backdrop='static' data-keyboard='false'>
<img src="<?php echo base_url();?>/assets/images/addcontact.png" width="20px" height="20px"/></a>
</div> 
<label class="col-sm-2 control-label">*Sales Person:</label> 
<div class="col-sm-4"> 
<select name="sales_person_id"   class="form-control" required >
						<option value="">----Select ----</option>
					<?php 
						//$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='3'");
						//foreach ($sqlgroup->result() as $fetchgroup){
						
					?>
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

    <?php } ?></select>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person"   class="form-control" value="" required>
</div>  
<label class="col-sm-2 control-label">*Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email_id"   class="form-control" value="" required>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Phone:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="phone"   class="form-control" value="" required>
</div> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="date" value="" class="form-control" required>
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
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*State:</label> 
<div class="col-sm-4" id="regid"> 
<select name="state_id" class="form-control" required>
	<option value="">--Select--</option>
	 <?php
		$stateQquery=$this->db->query("select * from tbl_state_m where status='A' ORDER BY stateName ASC ");
		foreach($stateQquery->result() as $getState){
	 ?>
	<option value="<?=$getState->stateid;?>"><?=$getState->stateName;?></option>
	<?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">*Source:</label> 
<div class="col-sm-4" id="regid"> 
<select name="source"  class="form-control" onChange="SourceAddOthers(this.value)" required>
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

<div class="form-group" id="sourcebyid" style="display:none"> 
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4"> 
</div>
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4"> 
<input name="source_others" type="text"  class="form-control" value="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">*Subject:</label> 
<div class="col-sm-4"> 
<textarea name="subject"   class="form-control" required></textarea>
</div> 
<label class="col-sm-2 control-label">Remarks:</label> 
<div class="col-sm-4"> 
<textarea name="remarks"   class="form-control" ></textarea>
</div> 
</div>


<div class="modal-footer">
<input type="submit" class="btn btn-sm" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<a href="#/" class="btn btn-secondary btn-sm delete_all"><i class="fa fa-trash-o"></i>Delete All</a>
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
<select name="DataTables_Table_0_length" url="<?=base_url('tour/Tour/manage_tour').'?tour_id='.$_GET['tour_id'].'&user='.$_GET['user'].'&date='.$_GET['date'].'&contact_id='.$_GET['contact_id'].'&sales_person='.$_GET['sales_person'].'&priority='.$_GET['priority'].'&source='.$_GET['source'].'&lead_status='.$_GET['lead_status'].'&state='.$_GET['state'].'&filter='.$_GET['filter'];?>" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
	<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
	<option value="<?=$dataConfig['total'];?>" <?=$entries==$dataConfig['total']?'selected':'';?>>ALL</option>
</select>
entries</label>
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="margin-top: -6px;margin-left: 12px;float: right;">Showing <?=$dataConfig['page']+1;?> to 
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
<form1 class="form-horizontal" method="post" action="update_tour">
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead style="background: #e4e4e0;">
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th><div style="width:60px;">Tour Id</div></th>
		<th><div style="width:80px;">User Name</div></th>
		<th style="text-align:center;"><div style="width:80px;">Date</div></th>
		<th><div style="width:130px;">Customer Name</div></th>
        <th><div style="width:80px;">Sales Person</div></th>
		<th><div style="width:80px;">Priority</div></th>
		<th><div style="width:80px;">Source</div></th>
		<th><div style="width:90px;">Stage</div></th>
		<th><div style="width:100px;">State</div></th>
		<th style="display:none;"><div style="width:80px;">Subject</div></th>
    	<th><div style="width:100px;">Action</div></th>
</tr>
</thead>

<tbody id="getDataTable">
<form>
<tr>
	<td>&nbsp;</td>
	<td><input name="tour_id"  type="text"  class="form-control"  value="" /></td>
	<td><input name="user"  type="text"  class="form-control"  value="" /></td>
	<td><input name="date"  type="date"  class="form-control"  value="" style="width: 155px;" /></td>
	<td><input name="contact_id"  type="text"  class="form-control"  value="" /></td>
	<td><input name="sales_person"  type="text"  class="form-control"  value="" /></td>
	<td><input name="priority"  type="text"  class="form-control"  value="" /></td>
	<td><input name="source"  type="text"  class="form-control"  value="" /></td>
	<td><input name="lead_status"  type="text"  class="form-control"  value="" /></td>
	<td><input name="state"  type="text"  class="form-control"  value="" /></td>
	<td><button type="submit" class="btn btn-secondary btn-sm" name="filter" value="filter"><span>FILTER</span></button></td>
</tr>
</form>

<?php
$i=1;
$i++;
foreach($result as $fetch_list)
{
?>
<tr class="gradeC record" data-row-id="<?php echo $fetch_list->tour_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->tour_id; ?>" value="<?php echo $fetch_list->tour_id;?>" /></th>

<th><?=$fetch_list->tour_id;?></th>

<th><?php 
	$user=$this->db->query("select * from tbl_user_mst where comp_id='".$fetch_list->comp_id."' ");
	$getUser=$user->row();
	echo $getUser->user_name; ?>
</th>
<th><?=$fetch_list->date;?></th>
<th><?php
	$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4' and contact_id='$fetch_list->contact_id' ");
	$res1 = $sqlgroup->row();
	echo $res1->first_name;	?>
</th>
<th><?php
	$sqlgroup=$this->db->query("select * from tbl_user_mst where user_id='$fetch_list->sales_person_id;' ");
	$fetchQ=$sqlgroup->row();
	echo $fetchQ->user_name;?>
</th>
<th><?php 
	$sqlproit=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->priority'");
	$res1111 = $sqlproit->row();
	echo $res1111->keyvalue; ?>
</th>
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

<th><?php
	$stateQquery=$this->db->query("select * from tbl_state_m where status='A' and stateid='$fetch_list->state;'");
	$fetchQ=$stateQquery->row();
	echo $fetchQ->stateName;?>
</th>

<th style="display:none;"><?php echo $fetch_list->subject;?></th>

<th>
<?php
$pri_col='tour_id';
$table_name='tbl_tour';
?>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="fa fa-eye"></i></button>

<?php if($fetch_list->tour_converted_status!='Converted')
{
?>
<button class="btn btn-default modalEditContact" onclick="touredit('<?php echo $fetch_list->tour_id;?>')" href='#editTour' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>
<button class="btn btn-default delbutton" id="<?=$fetch_list->tour_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<?php } 

if($fetch_list->tour_converted_status=='Converted')
{
?>
<a onclick="return confirm('This Tour Already Converted Into Lead');" href="#" class="btn btn-secondary btn-sm">Converted into Lead</a>
<?php
}
else
{
?>
<button  class="btn btn-sm" onclick="ConvertTour('<?php echo $fetch_list->tour_id;?>')">Convert To Lead</button>
<button style="display:none;" id="popup_button" class="btn btn-sm" href='#converttour' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'></button>
<!--<a onclick="return confirm('Are You Sure! You Want To Convert Tour To Lead?');" href="<?=base_url();?>crm/Lead/edit_tour_lead?id=<?=$fetch_list->tour_id;?>" class="btn btn-sm">Convert To Lead</a>-->
<?php } ?>

</th>
</tr>
<div id="modal-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Tour</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Customer:</label> 
<div class="col-sm-4"> 	
<select name="contact_id"   class="form-control"   disabled="disabled" >
		<option value="">----Select ----</option>
				<?php 
				 $sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4'");
				 foreach ($sqlgroup->result() as $fetchgroup){
				?>
	    <option value="<?php echo $fetchgroup->contact_id; ?>"<?php if($fetchgroup->contact_id==$fetch_list->contact_id){?>selected<?php }?>><?php echo $fetchgroup->first_name ; ?>				        </option>
        <?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">*Sales Person:</label> 
<div class="col-sm-4"> 
<select name="sales_person_id" disabled="disabled"  class="form-control">
	<option value="">----Select ----</option>
			<?php 
				//$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='3'");
				//foreach ($sqlgroup->result() as $fetchgroup){						
			?>		
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
	<option value="<?php echo $fetchgroup->user_id; ?>"<?php if($fetchgroup->user_id==$fetch_list->sales_person_id){?>selected<?php }?>><?php echo $fetchgroup->user_name; ?>
	</option>
    <?php } ?>
</select>

</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person"   class="form-control" value="<?php echo $fetch_list->contact_person; ?>" readonly>
</div>  
<label class="col-sm-2 control-label">*Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email_id"   class="form-control" value="<?php echo $fetch_list->email_id; ?>" readonly>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Phone:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="phone"   class="form-control" value="<?php echo $fetch_list->phone; ?>" readonly>
</div> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="date" value="<?php echo $fetch_list->date; ?>" class="form-control" readonly>
</div>
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">*Priority:</label> 
<div class="col-sm-4" id="regid"> 
<select name="priority"  class="form-control" disabled="disabled">
<option value="">--Select--</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='17'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->priority){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div> 
<label class="col-sm-2 control-label">*Stage:</label> 
<div class="col-sm-4" id="regid"> 
<select name="stage" class="form-control" disabled="disabled">
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='21'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->lead_status){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div>
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*State:</label> 
<div class="col-sm-4" id="regid"> 
<select name="state_id" id="contact_id_copy1" required class="form-control" disabled="disabled" >
			<option value="" selected disabled>----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_state_m where status='A'");
						foreach ($sqlunit->result() as $fetchunit){
 				 ?>
			<option value="<?php echo $fetchunit->stateid;?>" <?php if($fetchunit->stateid==$fetch_list->state){ ?> selected <?php }?>><?php echo $fetchunit->stateName; ?></option>
			<?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">*Source:</label> 
<div class="col-sm-4" id="regid"> 
<select name="source"  class="form-control" disabled="disabled">
<option value="">--Select--</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='18'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->source){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div> 
</div>

<div class="form-group" <?php if($fetch_list->source == 15){} else { ?> style="display:none" <?php } ?>> 
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
</div>
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
<input name="source_others" type="text"  class="form-control" value="<?=$fetch_list->source_others?>" readonly="">
</div>
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Subject:</label> 
<div class="col-sm-4"> 
<textarea name="subject"   class="form-control" readonly><?php echo $fetch_list->subject; ?></textarea>
</div> 
<label class="col-sm-2 control-label">Remarks:</label> 
<div class="col-sm-4"> 
<textarea name="remarks"   class="form-control" readonly><?php echo $fetch_list->remarks; ?></textarea>
</div> 
</div>



<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++;} ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_tour">  
<input type="text" style="display:none;" id="pri_col" value="tour_id">
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
</div>
<form class="form-horizontal" role="form" method="post" action="update_tour" enctype="multipart/form-data">			
<div id="editTour" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="contentitem">

        </div>
    </div>	 
</div>
</form>
<form class="form-horizontal" role="form" method="post" action="<?=base_url();?>crm/Lead/insert_lead_and_activity" enctype="multipart/form-data">			
<div id="converttour" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="convertTourLead">

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

function ItemAddContactList()
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


function genrateLeadNoTour()
{
  var contact = $('#contact_id_tour').val();
  var sales = $('#sales_person_id_tour').val();
    ur = "<?=base_url('crm/Lead/ajex_nextIncrementId');?>";
    $.ajax({
      url: ur,
      data:{'customer':contact,'sales_person':sales},
      type: "POST",
      success: function(data){
      	//alert(data);
      	if(data != ""){
      	  $("#lead_number_tour").val(data);
      	}
       }
    });
}

function SourceAddOthers(v)
{
//alert(v);
	if(v==15){
		document.getElementById("sourcebyid").style.display="Block";
	}else{
		document.getElementById("sourcebyid").style.display="none";
	}
}


function SourceEditOthers(v)
{
//alert(v);
	if(v==15){
		document.getElementById("sourceidedit").style.display="Block";
	}else{
		document.getElementById("sourceidedit").style.display="none";
	}
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

function touredit(v){
//alert(v);
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "updatetour?ID="+v, false);
 xhttp.send();
 document.getElementById("contentitem").innerHTML = xhttp.responseText;
}

function ConvertTour(v){

var con = confirm('Are You Sure! You Want To Convert Tour To Lead?');
//alert(con);
if(con === true)
{
	$('#popup_button').click();
	var xhttp = new XMLHttpRequest();
 	xhttp.open("GET", "convert_tour?ID="+v, false);
 	xhttp.send();
 	document.getElementById("convertTourLead").innerHTML = xhttp.responseText;	
	genrateLeadNoTour();
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
    filename = filename?filename+'.xls':'TourData_<?php echo date('d-m-Y');?>.xls';
    
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