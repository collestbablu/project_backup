<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/Account.php');
$objj=new Account();
$CI =& get_instance();

$list='';

$list=$objj->contact_list();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_contact_m';

?>
	 <!-- Main content -->
	 <div class="main-content">
			
			<ol class="breadcrumb breadcrumb-2"> 
				
				<li><a class="btn btn-success" href="<?=base_url();?>master/Account/add_contact">Add Consignor/Consignee</a></li> 
			<li>
				<a type="button" class="btn btn-danger delete_all">Delete Selected</a>
			</li>	
			</ol>
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Master</a></li> 
				<li><a href="#">Consignor/Consignee</a></li> 
				<li class="active"><strong><a href="#">Manage Consignor/Consignee</a></strong></li> 
			</ol>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>Manage Consignor/Consignee</strong></h4>
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
	    <th> Name</th>
		<th>Group Name</th>
        <th>Email Id</th>
		<th>Mobile No.</th>
		<th>Other No.</th>
		 <th>Action</th>
</tr>
</thead>

<tbody>
<?php
  for($i=0,$j=1;$i<count($list);$i++,$j++)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $list[$i]['5']; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $list[$i]['5']; ?>" value="<?php echo $list[$i]['5'];?>" /></th>
<th><?=$list[$i]['1'];?></th>
<th><?=$list[$i]['2'];?></th>
<th><?=$list[$i]['3'];?></th>
<th><i class="fa fa-phone" aria-hidden="true"></i>
<a href="tel:9716127292"><?=$list[$i]['4'];?></a></th>
<th><?=$list[$i]['6'];?></th>


<th>
<a href="#" onClick="openpopup('update_contact',1200,500,'view',<?=$list[$i]['5'];?>)"><i class="glyphicon glyphicon-zoom-in"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" onClick="openpopup('update_contact',1200,500,'id',<?=$list[$i]['5'];?>)"><i class="glyphicon glyphicon-pencil"></i>
<?php
$pri_col='contact_id';
$table_name='tbl_contact_m';
	?>
	&nbsp;&nbsp;&nbsp;<a href="#" id="<?php echo $list[$i]['5']."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"><i class="glyphicon glyphicon-remove"></i></a> 
	
</th>
</tr>
<?php } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_contact_m">  
<input type="text" style="display:none;" id="pri_col" value="contact_id">
</table>
</div>
</div>
</div>
</div>
</div>
<?php

$this->load->view("footer.php");
?>