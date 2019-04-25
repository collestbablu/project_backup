<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$table_name='tbl_product_stock';
$pri_id='Product_id';
$field_name='productname';


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
				<div class="col-lg-12">
				
						<div class="panel-body">
							<div class="table-responsive">
                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
	   <th>Dispatched Id</th>
	   <th>Customer Name</th>	
        <th>Date</th>
         <th>Action</th>
</tr>
</thead>

<tbody>
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

<th >
<button class="btn btn-default modalEditItem" onClick="openpopup('<?=base_url();?>dispatch/edit_dispatch',1400,600,'view',<?=$sales->dispatch_id;?>)"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-eye"></i></button>

<button class="btn btn-default modalEditItem" onClick="openpopup('<?=base_url();?>dispatch/edit_dispatch',1400,600,'id',<?=$sales->dispatch_id;?>)"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php

$pri_col='dispatch_id';
$table_name='tbl_dispatch_hdr';
	?>
	<button class="btn btn-default delbuttondispatch" id="<?php echo $sales->dispatch_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
</th>
</tr>
<?php } ?>
</tbody>
</table>
</form>
</div>
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