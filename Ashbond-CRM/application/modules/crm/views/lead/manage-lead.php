<?php
$this->load->view("header.php");
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_product_stock';

?>
	 <!-- Main content -->
	 <div class="main-content">
			
			<ol class="breadcrumb breadcrumb-2"> 
				 
				<?php 
				if($add!='')
				{ ?>
				<li><a class="btn btn-success" href="<?=base_url();?>Crm/Lead/add_lead">Add Lead</a></li> 
				<?php }?>
				<li> <a type="button" class="btn btn-danger delete_all">Delete Selected</a></li>
			</ol>
			
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Crm</a></li> 
				 
				<li class="active"><strong><a href="#">Manage Leads</a></strong></li> 
			</ol>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>Manage Leads</strong></h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	  
		<th>Sr. NO.</th>
		<th>Contact Name</th>
        <th>Sales Person</th>
		<th>Communication</th>
		<th>Date</th>
      	<th >Next Action</th>
         <th>Next Action Date</th>
		 <th>Action</th>
</tr>
</thead>

<tbody>
<?php
	$i=1;
  foreach($result as $fetch_list)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->lead_id; ?>">
<th>
<?php
										$productId= $fetch_list->lead_id;

										$checkProduct= $obj->product_check($productId);
   if($checkProduct=='1')
{
?><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->lead_id; ?>" value="<?php echo $fetch_list->lead_id;?>" />
<?php } else{
	?>
	<spam data-id="" title="Invoice already ctrated for this product.you can not delete ?"   />*</spam>
	
<?php }?>
</th>
<th>
<?php echo  $i; ?>
</th>
<th>
<?php
										$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$fetch_list->contact_id'");
										$res1 = $sqlgroup->row();
										
							echo $res1->first_name;
										
										?>
</th>
<th>
<?php
			$sqlgroup1=$this->db->query("select * from tbl_contact_m where contact_id='$fetch_list->sales_person_id'");
										$res11 = $sqlgroup1->row();
										
									echo  $res11->first_name;
			
			//echo $fetch_list->lead_type_id;
									
										?>

</th>
<th><?php echo $fetch_list->communication;?></th>
<th><?php echo $fetch_list->date;?></th>
<th>
<?php //select id of unit id
 echo $fetch_list->next_action;
?>

</th>
<th><?php echo $fetch_list->next_act_date;?></th>
<th >
<?php if($view!=''){ ?>
<a href="#" onClick="openpopup('add_lead',1200,500,'view',<?=$fetch_list->lead_id;?>)"><i class="glyphicon glyphicon-zoom-in"></i></a>&nbsp;&nbsp;&nbsp;
<?php } if($edit!=''){ ?>
<a href="#" onClick="openpopup('add_lead',1200,500,'id',<?=$fetch_list->lead_id;?>)"><i class="glyphicon glyphicon-pencil"></i>
<?php }
$pri_col='lead_id';
$table_name='tbl_leads';
if($delete!=''){ 
if($checkProduct=='1')
{
?>
	&nbsp;&nbsp;&nbsp;<a href="#" id="<?php echo $fetch_list->lead_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"><i class="glyphicon glyphicon-remove"></i></a> 
<?php
}
else

{
?>
<a href="#" id="<?php echo $fetch_list->lead_id."^".$table_name."^".$pri_col ; ?>" onclick="return confirm('Invoice already ctrated for this product.you can not delete ?');" class="delbutton icon"><i class="glyphicon glyphicon-remove"></i></a>
<?php

}

 } ?>

</th>
</tr>
<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_leads">  
<input type="text" style="display:none;" id="pri_col" value="lead_id">
</table>
</div>
</div>
</div>
</div>
</div>
<?php

$this->load->view("footer.php");
?>