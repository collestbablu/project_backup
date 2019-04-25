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
				<div class="col-lg-12">
				
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
	   <th>S. No. </th>	
	   <th>Production Id</th>
	   <th>Finish Goods</th>	
        <th>Date</th>
		<th>Qty</th>
		<th>Remaining Qty</th>
		<th> Status Of QC</th>
          <th>Action</th>
</tr>
</thead>

<tbody>
<?php
$i=1;
	foreach($result as $sales)
  {
$sum=0;
$queryfetch11=$this->db->query("select * from tbl_packing where qc_id='$sales->qc_id'");	
	$fetchqrow11=$queryfetch11->row();
		$sum=$fetchqrow11->qty;
  ?>

<tr class="gradeC record" <?php if($sales->qty==$sum){?>style="display:none"<?php }?>>
<th>
<?php 
echo $i;
$i++;
 ?>

</th>
<th><?php 
$queryfetch1122=$this->db->query("select * from tbl_tailor where tailor_id='$sales->tailor_id'");	
	$fetchqrow1122=$queryfetch1122->row();
	echo $fetchqrow1122->production_id;
?></th>
<th><?php 
$queryfetch11=$this->db->query("select * from tbl_production_hdr where productionid='$fetchqrow1122->production_id'");	
	$fetchqrow11=$queryfetch11->row();
	//echo $fetchqrow11->product_id;

$queryfetch=$this->db->query("select * from tbl_product_stock where Product_id='$fetchqrow11->product_id'");	
	$fetchqrow=$queryfetch->row();
	echo $fetchqrow->productname;
?></th>
<th><?=$sales->date;?></th>
<th><?=$sales->qty;?></th>
<th><?=$sales->qty-$sum;?></th>
<th><?php 
	//echo $sum;
	if($sales->qty==$sum){
		echo "Closed";
	}elseif($sum==''){
		echo "Pending";
	}else{
		echo "Part Pending";
	}
?></th>
<th >
<button class="btn btn-sm modalProduction" data-a="<?php echo $sales->qc_id;?>" href='#editPacking' onclick="addPacking('<?php echo $sales->qc_id;?>')" type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'>Packing</button>

<button class="btn btn-default" style="display:none" onClick="openpopup('<?=base_url();?>production/edit_production',1400,600,'view',<?=$sales->productionid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-eye"></i></button>
<button class="btn btn-default" style="display:none" onClick="openpopup('<?=base_url();?>production/edit_production',1400,600,'id',<?=$sales->productionid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-pencil"></i></button>
<?php
$pri_col='qc_id';
$table_name='tbl_qualitiy_check';
	?>
	<button class="btn btn-default delbutton" id="<?php echo $sales->qc_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>

</th>
</tr>
<?php }  ?>
</tbody>
</table>
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


</script>

<?php
$this->load->view("footer.php");
?>
