<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/ProductCategory.php');
$objj=new ProductCategory();
$CI =& get_instance();

$list='';

$list=$objj->pcategory_list();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_prodcatg_mst';

?>
	 <!-- Main content -->
<div class="main-content">
			
<ol class="breadcrumb breadcrumb-2"> 
<li><a href="index.html"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="form-basic.html">Master</a></li> 
<li class="active"><strong>Add Product</strong></li>
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-2">Modal</button>
<div id="modal-2" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Large modal</h4>
</div>
<div class="modal-body overflow">
<form class="form-horizontal" method="post" action="insert_contact">
<h5>Registration Form</h5>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="contact_id" value="">
<input type="text" name="first_name" value="" class="form-control" required="">
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
      
      <input type="hidden" name="popup" value="">
	  <input type="hidden" name="grpname" value="">
<select name="maingroupname" class="form-control" required="" id="contact_id_copy5">

<option value="">-------select---------</option>


<option value="4">Contact</option>

<option value="5">Vendor</option>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person" value="" class="form-control">
</div> 
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email" value="" class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Mobile No.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="mobile" value="" class="form-control" required="">
</div> 
<label class="col-sm-2 control-label">Phone No.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="phone" value="" class="form-control">
</div>  
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Gst No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="gst_no" value="" class="form-control">
</div> 
<label class="col-sm-2 control-label">Fax:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="fax" value="" class="form-control">
</div> 
</div>
</form>

<form class="form-horizontal" method="post" action="insert_contact">
<h5>Registration Form</h5>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="contact_id" value="">
<input type="text" name="first_name" value="" class="form-control" required="">
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
      
      <input type="hidden" name="popup" value="">
	  <input type="hidden" name="grpname" value="">
<select name="maingroupname" class="form-control" required="" id="contact_id_copy5">

<option value="">-------select---------</option>


<option value="4">Contact</option>

<option value="5">Vendor</option>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person" value="" class="form-control">
</div> 
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email" value="" class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Mobile No.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="mobile" value="" class="form-control" required="">
</div> 
<label class="col-sm-2 control-label">Phone No.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="phone" value="" class="form-control">
</div>  
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Gst No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="gst_no" value="" class="form-control">
</div> 
<label class="col-sm-2 control-label">Fax:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="fax" value="" class="form-control">
</div> 
</div>
</form>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-sm" data-dismiss="modal">Save</button>
<button type="button" class="btn btn-secondary btn-sm">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<a href="#/" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add Purchase Order</a>
<a href="#/" class="btn btn-secondary btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
</div>
</ol>

<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Well done!</strong> You successfully read this important alert message. 
</div>	
			
			
<div class="row">
				<div class="col-lg-12">
				<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables-example" >
									<thead>
										<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	   <th>Group Name</th>
		<th>Primary</th>
        <th>Under Group</th>
		 <th>Action</th>
</tr>
									</thead>
									<tbody>
										<?php
  for($i=0,$j=1;$i<count($list);$i++,$j++)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $list[$i]['4']; ?>">
<?php
if($list[$i]['4']!='121')
{
?>
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $list[$i]['4']; ?>" value="<?php echo $list[$i]['4'];?>" /></th>
<?php } else { ?>
<th>*</th>
<?php } ?>
<th><?=$list[$i]['1'];?></th>
<th><?=$list[$i]['2'];?></th>
<th><?=$list[$i]['3'];?></th>
<th>
<?php
if($list[$i]['4']=='121')
{
?>
<a href="#" onClick="openpopup('add_itemctg',1200,500,'mid',<?=$list[$i]['4'];?>)"><i class="fa fa-plus-square"></i></a>
<?php } else { ?>
<?php }?>
&nbsp;&nbsp;&nbsp;<a href="#" onClick="openpopup('add_itemctg',1200,500,'id',<?=$list[$i]['4'];?>)"><i class="glyphicon glyphicon-pencil"></i>


<?php

if($list[$i]['4']!='121')
{



 if($delete!=''){
$pri_col='prodcatg_id';
$table_name='tbl_prodcatg_mst';
	?>
	&nbsp;&nbsp;&nbsp;<a href="#" id="<?php echo $list[$i]['4']."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"><i class="glyphicon glyphicon-remove"></i></a> 
	<?php }} 
	else {}
	?>
</th>
</tr>
<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_prodcatg_mst">  
<input type="text" style="display:none;" id="pri_col" value="prodcatg_id">
										
										
										
										
										
</tbody>
</table>
							</div>
						</div>	
                    
				</div>
			</div>


<?php

$this->load->view("footer.php");
?>