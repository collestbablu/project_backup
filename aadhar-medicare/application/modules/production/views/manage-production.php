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
	<li><a href="#">Production</a></li> 
	<li class="active"><strong><a href="#">Manage Master Cutting</a></strong></li> 
	<div class="pull-right">
	<?php 
	if($add!='')
	{ ?>
	<li><a class="btn btn-sm" href="<?=base_url();?>production/add_production">Add Master Cutting</a></li> 
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
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('production/manage_production');?>" class="form-control input-sm">
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
	    <th style="width: 111px;">Production Id</th>
        <th>Date</th>
        <th>Production Goods</th>
		<th style="width: 70px;">Qty</th>
		<th style="width: 111px;">Remaining Qty</th>
        <th>Status Of Assigning</th>
        <th style="width: 247px;">Action</th>
</tr>
</thead>

<tbody id="getDataTable">
<form method="get">
<tr>
	<td><input name="p_id"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="date"  type="date"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="goods"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="qty"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>

<?php
$i=1;
	foreach($result as $sales)
  {
$sum=0;
$queryfetch11=$this->db->query("select * from tbl_tailor where production_id='$sales->productionid'");	
	foreach($queryfetch11->result() as $fetchqrow11){
		$sum+=$fetchqrow11->qty;
	}
  ?>

<tr class="gradeC record" <?php if($sales->qty==$sum){?>style="display:none"<?php }?>>
<th><?=$sales->productionid;?></th>
<th><?=$sales->date;?></th>
<?php
$queryfetch=$this->db->query("select * from tbl_product_stock where Product_id='$sales->product_id'");	
$fetchqrow=$queryfetch->row();

$size=$this->db->query("select *from tbl_master_data where serial_number='$fetchqrow->size'");
$psize=$size->row();
if($psize->keyvalue !='')
{
?>
<th><?php echo $fetchqrow->productname .'   ( '.$psize->keyvalue .')' ; } else { ?></th>
<th><?php echo $fetchqrow->productname; } ?></th>

<th><?=$sales->qty;?></th>
<th><?=$sales->qty-$sum;?></th>
<th><?php 
	//echo $sum;
	if($sales->qty==$sum){
		echo "Closed";
	}elseif($sum=='0'){
		echo "Pending";
	}else{
		echo "Part Pending";
	}
?></th>
<th >
<button class="btn btn-sm modalProduction" data-a="<?php echo $sales->productionid;?>" href='#editProduction' onclick="addTail('<?php echo $sales->productionid;?>')" type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'>Assign To Tailor</button>

<button class="btn btn-default" onClick="openpopup('<?=base_url();?>production/edit_production',1400,600,'view',<?=$sales->productionid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-eye"></i></button>
<button class="btn btn-default" onClick="openpopup('<?=base_url();?>production/edit_production',1400,600,'id',<?=$sales->productionid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-pencil"></i></button>

<?php
if($sum=='0'){
$pri_col='productionid';
$table_name='tbl_production_hdr';
	?>
	<button class="btn btn-default delbuttonProduction" id="<?php echo $sales->productionid."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<?php }else{?>
	<button class="btn btn-default" id="<?php echo $sales->productionid."^".$table_name."^".$pri_col ; ?>" onclick="return confirm('This Master Cutting is allready Assign the Tailor. You Can not deleted.');" type="button"><i class="icon-trash"></i></button>
<?php }?>
</th>
</tr>
<?php } ?>
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
</div>
</div>
</div>
<form class="form-horizontal" role="form" method="post" action="insert_Tailor" enctype="multipart/form-data">			
<div id="editProduction" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contentProduction"  id="modal-contentProduction">

        </div>
    </div>	 
</div>
</form>
<script>

//--------------------------add Tailor start----------------------------
function addTail(v){

var pro=v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "add_tailor?ID="+pro, false);
  xhttp.send();
  document.getElementById("modal-contentProduction").innerHTML = xhttp.responseText;
 } 
//--------------------------add Tailor end----------------------------
 
function checkvalue(v){
//alert(v);
var spliii=v.split("qty");
var ID=spliii[1];
//alert(ID);
var rows=document.getElementById("rows").value;
//alert(rows);
var sum=0;
for(i=1;i<=rows;i++){
	var qty11=document.getElementById("qty"+i).value;
	var sum=Number(sum)+Number(qty11);
	//alert(sum);
}
var resttt=document.getElementById("restttt").value;
var rest=document.getElementById("rest").value;

	var actuval=Number(resttt)-Number(sum);

document.getElementById("actuvalrest").value=actuval;
//alert(actuval);
if(Number(resttt)>=Number(sum)){
//alert();
document.getElementById("error"+ID).style.display= "none";
//document.getElementById("error"+ID).style.width = "347px";
document.getElementById("sv1").disabled = false;
}else{
//alert(ID);
document.getElementById("error"+ID).style.display = "Block";
document.getElementById("error"+ID).style.width = "100%";
document.getElementById("error"+ID).style.border = "none";
document.getElementById("sv1").disabled = true;
}
}

function changethevalue(v){
	//alert();
	var spliiit=v.split("btn");
	var ID=spliiit[1];
	//alert(ID);
	var qty=document.getElementById("ed"+ID).value;
	document.getElementById("qty"+ID).value=qty;
	document.getElementById("forfun1"+ID).style.display="Block";
	document.getElementById("forfun"+ID).style.display="none";
}
</script>
	
<SCRIPT language="javascript">

		function addRow(tableID) {
		
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

var pvrsval=rowCount-1;
//alert(pvrsval);
var rest11 = document.getElementById("rest").value;
var sum=0;
for(i=1;i<=pvrsval;i++){
	var qtyyyt = document.getElementById("qty"+i).value;
	var sum=Number(sum)+Number(qtyyyt);
	//alert(sum);
}
var resttt=document.getElementById("restttt").value;
var qtyyyt1 = document.getElementById("qty"+pvrsval).value;
//alert(qtyyyt1);
	var actuval=Number(resttt)-Number(sum);

document.getElementById("rest").value=actuval;
//alert(actuval);
var actuvalrest=document.getElementById("actuvalrest").value;
//if(qtyyyt!=''){
if(actuvalrest!=0){
document.getElementById("rows").value=rowCount;

var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "checkbox";
			element1.name="chkbox[]";
			cell1.appendChild(element1);
			

		

var cell2 = row.insertCell(1);

    var element3 = document.createElement("select");
	element3.name = "contact_id[]";
	element3.required = true;
	element3.className="form-control ui fluid search dropdown email";
	var option1 = document.createElement("option");
    option1.innerHTML = "--Select--";
    option1.value = "";
    element3.appendChild(option1, null);
	<?php
	$contactQuery=$this->db->query("select *from tbl_contact_m where group_name='6'");
	foreach($contactQuery->result() as $getContact){
	?>
	
    var option2 = document.createElement("option");
    option2.innerHTML = "<?=$getContact->first_name;?>";
    option2.value = "<?=$getContact->contact_id;?>";
    element3.appendChild(option2, null);
    
	<?php }?>
	cell2.appendChild(element3);
	var element5 = document.createElement("input");
	element5.type = "hidden";
	element5.name = "tailor_id[]";
	element5.className="form-control";
	cell2.appendChild(element5);
	

var cell3 = row.insertCell(2);
			var element4 = document.createElement("input");
			element4.type = "hidden";
			element4.name = "text";
			element4.id = "text";
			element4.value = "text";
			cell3.appendChild(element4);
			
var cell3 = row.insertCell(3);
			var element4 = document.createElement("input");
			element4.type = "number";
			element4.setAttribute('step','any');
			element4.setAttribute('min','0');
			element4.className="form-control";
			element4.name = "qty[]";
			element4.required = true;
			element4.id = "qty"+rowCount;
			element4.onkeyup = function() { checkvalue(element4.id); };
			cell3.appendChild(element4);
			
			var element5 = document.createElement("input");
			element5.style.display="none";
			element5.name = "error[]";
			//element5.style.width = 400;
			element5.setAttribute("readonly", "readonly");
			element5.value = "*Qty Not Greater Than Rest Value.";
			element5.id = "error"+rowCount;
			cell3.appendChild(element5);
			
			


var cell4 = row.insertCell(4);
			var element2 = document.createElement("input");
			element2.type = "date";
			element2.name = "date[]";
			element2.required = true;
			element2.className="form-control";
			cell4.appendChild(element2);

		}else{
			alert("All Quantities Are Filled.");
		}
/*}else{
	alert("first fill Qty.");
	document.getElementById("qty"+pvrsval).focus();
}*/
		
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



function fsv(v)
{
var sum=0;
var tableID = document.getElementById("rows").value;
var totQty = document.getElementById("totQty").value;
//alert(totQty);
for(i=1;i<=tableID;i++){
//alert(i);
	var qqttyy=document.getElementById("qty"+i).value;
	//alert(qqttyy);
	var sum=Number(sum)+Number(qqttyy);
}
if(totQty>=sum)
{
//alert();
v.type="submit";
}
else
{
	alert('Total Quantity is Greater than Tailor Sum Quantity.');	
}
}
		

function CompareDate(v) {
		//alert(v);
		var adate=v;
       var pdate = document.getElementById("pdate").value;
		

       if (adate < pdate) {
	   			
			alert("Tailor Date Should be Greater Than or Equal to Cutting Date");
			document.getElementById("date").value=null;
            //document.getElementById("errordate"+ID).style.display= "none";
			//document.getElementById("sv1").disabled = false;

        }else {
	
			//alert("Tailor Date Should be Greater Than Equal to Master Cutting Date");
            //document.getElementById("errordate"+ID).style.display = "Block";
			//document.getElementById("sv1").disabled = true;
			
        }

    }

		
	</SCRIPT>
<?php

$this->load->view("footer.php");
?>