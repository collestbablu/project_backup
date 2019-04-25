<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$table_name='tbl_product_stock';
$pri_id='Product_id';
$field_name='productname';

$entries = "";
if($this->input->get('entries')!=""){
  $entries = $this->input->get('entries');
}


?>
<!-- Main content -->
<div class="main-content">
	<form class="form-horizontal" role="form" method="post" action="insert_dispatch" enctype="multipart/form-data">
	<ol class="breadcrumb breadcrumb-2"> 
		<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
		<li><a href="#">Dispatch</a></li> 
		<li class="active"><strong><a href="#">Dispatch List</a></strong></li> 
		<div class="pull-right">
		<a class="btn btn-sm" href="<?=base_url();?>dispatch/add_dispatch">Add Dispatch</a>
		
		</div>
	</ol>
    </form>
	
<div class="row">
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
  <a class="dt-button buttons-excel buttons-html5" style="display:none" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/dispatch/manage_dispatch');?>" class="form-control input-sm">
	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
</select>
entries</label>

<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -5px;margin-left: 12px;float: right;">
	Showing <?=$dataConfig['page']+1;?> to 
	<?php
	$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
	echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
	?> of <?php echo $dataConfig['total'];?> entries
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

<div class="row">
	<div class="col-lg-12">
			<div class="panel-body">
				<div class="table-responsive">
				<form1 class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
<table class="table table-striped table-bordered table-hover dataTables-example1" >
<thead>
<tr>
	   <th>Dispatched Id</th>
	   <th>Customer Name</th>	
       <th>Date</th>
       <th>Action</th>
</tr>
</thead>

<tbody id="getDataTable">
<form method="get">
<tr>
	<td><input name="d_id"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="c_name"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="date"  type="date"  class="search_box form-control input-sm"  value="" /></td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>

<?php
$i=1;
	foreach($result as $sales){

  ?>
<tr class="gradeC record">
<th><?=$sales->dispatch_id;?></th>
<?php 
$queryfetch=$this->db->query("select * from tbl_contact_m where contact_id='$sales->contact_id'");	
$fetchqrow=$queryfetch->row();
	//echo $fetchqrow->productname;
?>
<th><?php echo $fetchqrow->first_name ;?></th>


<th><?=$sales->date;?></th>

<th>
<button class="btn btn-default modalEditItem" onClick="openpopup('<?=base_url();?>dispatch/edit_dispatch',1400,600,'view',<?=$sales->dispatch_id;?>)"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-eye"></i></button>
<?php 
if($sales->dispatched_status==Pending)
{
?>
<button class="btn btn-default modalEditItem" onClick="openpopup('<?=base_url();?>dispatch/edit_dispatch',1400,600,'id',<?=$sales->dispatch_id;?>)"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>
<?php
$pri_col='dispatch_id';
$table_name='tbl_dispatch_hdr';
?>
<button class="btn btn-default delbuttondispatch" id="<?php echo $sales->dispatch_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<?php } else { ?>
<button class="btn btn-default" onClick="dispatchfun()"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>
<button class="btn btn-default" onClick="dispatchfun()" type="button"><i class="icon-trash"></i></button>
<?php } ?>

</th>
</tr>
<?php } ?>
</tbody>
</table>
</form1>

<div class="row">
       <div class="col-md-12 text-right">
    	  <div class="col-md-6 text-left"> 
    		<!-- <h6>Showing 1 to 10 of <?php echo $totalrow; ?> entries</h6> -->
    	  </div>
    	  <div class="col-md-6"> 
             <?=$pagination; ?>
          </div>

          <div class="popover fade right in displayclass" role="tooltip" id="popover" style=" background-color: #ffffff;border-color: #212B4F;"><!-- <div class="arrow" style="top: 50%;"></div>  -->
		<div class="popover-content" id="showParent"></div>
		</div>
     </div>
</div>

</div>
<script>
function dispatchfun()
{
	alert("Product Has Been Dispatched");
}
</script>
</div>
</div>
</div>
</div>
<form class="form-horizontal" role="form" method="post" action="update_dispatch" enctype="multipart/form-data">			
<div id="editQc" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contentProduction" id="modal-contentProduction">

        </div>
    </div>	 
</div>
</form>
<script>
//--------------------------add Tailor start----------------------------
function addQC(v){
//alert(v);
var pro=v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "edit_dispatch?ID="+pro, false);
  xhttp.send();
  document.getElementById("modal-contentProduction").innerHTML = xhttp.responseText;
 } 
//--------------------------add Tailor end----------------------------


function checkCust(v){

if(v!="23"){
document.getElementById("check").style.display= "none";
document.getElementById("cont_id").value = '';
}else{
//alert(ID);
document.getElementById("check").style.display = "";
//document.getElementById("sv1").disabled = true;
}
}
function checkCust1(v){

if(v!="23"){
document.getElementById("check1").style.display= "none";
document.getElementById("cont_id1").value = '';
}else{
//alert(ID);
document.getElementById("check1").style.display = "";
//document.getElementById("sv1").disabled = true;
}
}


function CompareDate(v) {
		//alert(v);
		var adate=v;
       var qdate = document.getElementById("qdate").value;
		//alert(qdate);

       if (adate < qdate) {
	   			
			alert("QC Date Should be Greater Than or Equal to Tailor Date");
			document.getElementById("date").value=null;
            //document.getElementById("errordate"+ID).style.display= "none";
			//document.getElementById("sv1").disabled = false;

        }else {
	
			//alert("Tailor Date Should be Greater Than Equal to Master Cutting Date");
            //document.getElementById("errordate"+ID).style.display = "Block";
			//document.getElementById("sv1").disabled = true;
			
        }

    }


</script>
<script type="text/javascript">

function abcd(v){
	var actiontaken=v.split(",");
	var val1=actiontaken[0];
	var val2=actiontaken[1];
var info = 'id=' + val1;
//alert(info);
 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_log_data",
   data: info,
   success: function(){
  
   }
 });

 document.getElementById("record"+val2).style.display = 'none';
 //location.reload();
 }

}

</script>
<?php

$this->load->view("footer.php");
?>