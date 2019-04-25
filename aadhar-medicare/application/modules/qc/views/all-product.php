<?php
$this->load->view("header.php");
?>
<script>


function getCid(pnm,pr,pp,unt)
{

	window.close();
	var pid=pnm.split("^");
	var pids=pid[1];
	window.opener.document.getElementById("search_id").value=pnm;
	window.opener.document.getElementById("select_id").value=pids;
	
	window.opener.document.getElementById("qn").focus();
	
	
}
</script>
	 <!-- Main content -->
	 <div class="main-content">
			
			<!-- Breadcrumb -->
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title">Finish Goods  List</h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
	   <th>&nbsp;</th>
	   <th>Product Code </th>
		<th>Category</th>
        <th>Product Name</th>
      	<th>Purchase Price</th>
        <th>Sale Price</th>
		
</tr>
</thead>

<tbody>
<?php
$finishGoodsQuery=$this->db->query("select *from tbl_product_stock where status='A' and type='14' and via_type='23'");

  foreach($finishGoodsQuery->result() as $getFinishGoods)
  {
 
  
  ?>

<tr class="gradeC record">
<td><input type="radio"  onclick="getCid('<?=$getFinishGoods->productname."^".$getFinishGoods->Product_id;?>','<?php echo $list[$i]['4'];?>','<?php echo $list[$i]['5'];?>','<?php echo $list[$i]['8'];?>')" name="p" /></td>
<th><?=$getFinishGoods->Product_id;?></th>
<th><?=$list[$i]['2'];?></th>
<th><?=$getFinishGoods->productname;?></th>
<th><?=$getFinishGoods->unitprice_purchase;?></th>
<th><?=$getFinishGoods->unitprice_sale;?></th>

</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php

$this->load->view("footer.php");
?>