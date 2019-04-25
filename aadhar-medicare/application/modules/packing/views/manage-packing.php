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
	
	<ol class="breadcrumb breadcrumb-2"> 
		<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
		<li><a href="#">Packing</a></li> 
		<li class="active"><strong><a href="#">Manage Packing</a></strong></li> 
		<div class="pull-right">
		<?php 
		if($add!='')
		{ ?>
		<li style="display:none"><a class="btn btn-sm" href="<?=base_url();?>production/add_production">Add Master Cutting</a></li> 
		<?php }?>
		</div>
	</ol>

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
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/packing/manage_packing');?>" class="form-control input-sm">
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
<table class="table table-striped table-bordered table-hover dataTables-example1" >
<thead>
<tr>
	   	<th style="width: 53px;">S. No. </th>	
	    <th style="display:none">Production Id</th>
	    <th>Finish Goods</th>	
        <th style="width: 100px;">Date</th>
		<th style="width: 60px;">Qty</th>
		<th style="width: 120px;">Remaining Qty</th>
		<th style="width: 85px;">Reject Qty</th>
		<th> Status Of QC</th>
        <th>Action</th>
</tr>
</thead>

<tbody id="getDataTable">
<form method="get">
<tr>
	<td>&nbsp;</td>
	<td><input name="f_goods"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="date"  type="date"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="qty"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td>&nbsp;</td>
	<td><input name="rej_qty"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td>&nbsp;</td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>

<?php
$i=1;
	foreach($result as $sales)
  {
$sum=0;
$queryfetch11=$this->db->query("select * from tbl_packing where qc_id='$sales->qc_id'");	
	$fetchqrow11=$queryfetch11->row();
		$sum=$fetchqrow11->qty;
  ?>

<tr class="gradeC record" >
<th>
<?php 
echo $i;
$i++;
 ?>

</th>
<th style="display:none"><?php 
$queryfetch1122=$this->db->query("select * from tbl_tailor where tailor_id='$sales->tailor_id'");	
	$fetchqrow1122=$queryfetch1122->row();
	echo $fetchqrow1122->production_id;
?></th>
<?php 

$queryfetch=$this->db->query("select * from tbl_product_stock where Product_id='$fetchqrow1122->finishProductId'");	
	$fetchqrow=$queryfetch->row();
	//echo $fetchqrow->productname;
	$size=$this->db->query("select *from tbl_master_data where serial_number='$fetchqrow->size'");
$psize=$size->row();
if($psize->keyvalue !='')
{
?>
<th><?php echo $fetchqrow->productname .'   ( '.$psize->keyvalue .')' ; } else { ?></th>
<th><?php echo $fetchqrow->productname; } ?></th>

	
<th><?=$sales->date;?></th>
<th><?=$sales->qty;?></th>
<th><?php
$qcqty=$sales->qty;
$pqty=$sales->reject_qty + $sum;
echo $remainqty=$qcqty-$pqty;
?></th>
<?php if($sales->reject_qty!='') { ?>
<th><?php echo $sales->reject_qty; } else { ?></th>
<th>0</th>
<?php } ?>
<th><?php 
	//echo $sum;
	if($qcqty==$pqty){
		echo "Closed";
	}elseif($sum==''){
		echo "Pending";
	}else{
		echo "Part Pending";
	}
?></th>
<th>
<button class="btn btn-sm modalProduction" data-a="<?php echo $sales->qc_id;?>" href='#editPacking' onclick="addPacking('<?php echo $sales->qc_id;?>')" type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'>Packing</button>
<button class="btn btn-sm modalProductions" data-a="<?php echo $sales->qc_id;?>" href='#rejectPkg' onclick="rejectPacking('<?php echo $sales->qc_id;?>')" type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'>Reject</button>

<button class="btn btn-default" style="display:none" onClick="openpopup('<?=base_url();?>production/edit_production',1400,600,'view',<?=$sales->productionid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-eye"></i></button>
<button class="btn btn-default" style="display:none" onClick="openpopup('<?=base_url();?>production/edit_production',1400,600,'id',<?=$sales->productionid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-pencil"></i></button>
<?php
$pri_col='qc_id';
$table_name='tbl_qualitiy_check';
if($sum==''){
	?>
	<button class="btn btn-default delbuttonpacking" id="<?php echo $sales->qc_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
	<?php }else{?>
	<button class="btn btn-default" id="<?php echo $sales->qc_id."^".$table_name."^".$pri_col ; ?>"  onclick="return confirm('This Quality Check is allready Packed. You Can not deleted.');" type="button"><i class="icon-trash"></i></button>
	<?php }?>
</th>
</tr>
<?php }  ?>
</tbody>
</table>

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
</div>


<form class="form-horizontal" role="form" method="post" action="insert_packing" enctype="multipart/form-data">			
<div id="editPacking" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contentProduction" id="modal-contentProduction">

        </div>
    </div>	 
</div>
</form>
<form class="form-horizontal" role="form" method="post" action="update_packing" enctype="multipart/form-data">			
<div id="rejectPkg" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contentReject" id="modal-contentReject">

        </div>
    </div>	 
</div>

<script>
//--------------------------add Tailor start----------------------------
function addPacking(v){

var pro=v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "edit_packing?ID="+pro, false);
  xhttp.send();
  document.getElementById("modal-contentProduction").innerHTML = xhttp.responseText;
 } 
//--------------------------add Tailor end----------------------------

//--------------------------reject start----------------------------
function rejectPacking(v){

var pro=v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "reject_packing?ID="+pro, false);
  xhttp.send();
  document.getElementById("modal-contentReject").innerHTML = xhttp.responseText;
 } 
//--------------------------reject end----------------------------


function checkvalue(v){
//alert();
/*var spliii=v.split("qty");
var ID=spliii[1];
*/

var qty11=document.getElementById("qty").value;
var rest=document.getElementById("rest").value;
//alert(rest);
if(Number(rest)>=Number(qty11)){
document.getElementById("error").style.display= "none";
document.getElementById("sv1").disabled = false;
}else{
//alert(ID);
document.getElementById("error").style.display = "";
document.getElementById("sv1").disabled = true;
}
}

function CompareDate(v) {
		//alert(v);
		var adate=v;
       var pkdate = document.getElementById("pkdate").value;
		//alert(pkdate);

       if (adate < pkdate) {
	   			
			alert("Packing Date Should be Greater Than or Equal to QC Date");
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
   url: "delete_packed_log_data",
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
