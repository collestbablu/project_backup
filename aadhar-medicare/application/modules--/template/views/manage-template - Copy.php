<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$table_name_1='tbl_product_stock';
$pri_id='Product_id';
$field_name='productname';



?>
	 <!-- Main content -->
	 <div class="main-content">
			
			<ol class="breadcrumb breadcrumb-2"> 
				
				<?php 
				if($add!='')
				{ ?>
				<li><a class="btn btn-success" href="<?=base_url();?>template/add_template">Add Template</a></li> 
				<?php }?>
				 
			</ol>
			
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Template</a></li> 
				
				<li class="active"><strong><a href="#">Manage Template</a></strong></li> 
			</ol>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>Template</strong></h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
                            
						</div>
                
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
	   <th>Templte Id</th>
		
        <th>Date</th>
        <th>Production Goods </th>
		
        
         <th>Action</th>
</tr>
</thead>

<tbody>
<?php
$i=1;
	foreach($result as $sales)
  {
  ?>

<tr class="gradeC record">
<th><?=$sales->templateid;?></th>

<th><?=$sales->date;?></th>
<?php
$id=$sales->product_id;


?>
<th><?php echo $obj->getManagePageData($table_name_1,$pri_id,$id,$field_name);?></th>


<th>
<a href="#" onClick="openpopup('<?=base_url();?>template/edit_template',1400,600,'view',<?=$sales->templateid;?>)"><i class="glyphicon glyphicon-zoom-in"></i>
</a>&nbsp;&nbsp;&nbsp;<a href="#" onClick="openpopup('<?=base_url();?>template/edit_template',1400,600,'id',<?=$sales->templateid;?>)"><i class="glyphicon glyphicon-pencil"></i>
<?php
$pri_col='templateid';
$table_name='tbl_template_hdr';
	?>
	&nbsp;&nbsp;&nbsp;<a href="#" id="<?php echo $sales->templateid."^".$table_name."^".$pri_col ; ?>" class="delbuttonTemplate icon"><i class="glyphicon glyphicon-remove"></i></a> 

</th>
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