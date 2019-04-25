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
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Template</a></li> 
				<li class="active"><strong><a href="#">Manage Template</a></strong></li> 
				<div class="pull-right">
				<?php 
				if($add!='')
				{ ?>
				<li><a class="btn btn-sm" href="<?=base_url();?>template/add_template">Add Template</a></li> 
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





<th class="bs-example">
<?php if($view!=''){ ?>

<button class="btn btn-default" type="button" data-toggle="modal" onClick="openpopup('<?=base_url();?>template/edit_template',1400,600,'view',<?=$sales->templateid;?>)" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" onClick="openpopup('<?=base_url();?>template/edit_template',1400,600,'id',<?=$sales->templateid;?>)"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='templateid';
$table_name='tbl_template_hdr';
?>
<button class="btn btn-default delbuttonTemplate" id="<?php echo $sales->templateid."^".$table_name."^".$pri_col ; ?>" type="button" ><i class="icon-trash"></i></button>		
<?php
  ?>
 
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