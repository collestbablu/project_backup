<?php
$this->load->view("header.php");
?>
<div class="main-content">

<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a>Master</a></li> 
	<li><a>Porduct Group</a></li> 
	<li class="active"><strong>Manage Product Group</strong></li>
<div class="pull-right">
 <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0"><i class="fa fa-plus" aria-hidden="true"></i>Add Product Category</button> 
 <a class="btn btn-secondary btn-sm delete_all"><i class="fa fa-trash-o"></i>Delete all</a>
</div>
</ol>

<form class="form-horizontal" method="post" action="<?=base_url();?>master/ProductCategory/insert_itemctg">		
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Product Category</h4>
</div>
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Category Name :</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="prodcatg_id" value="" />
<input type="text" class="form-control" name="prodcatg_name" required value=""> 
</div> 
<?php 
$ugroup=$this->db->query("SELECT * FROM tbl_prodcatg_mst where prodcatg_id='121'" );
$ungroup=$ugroup->row();
?>
<label class="col-sm-2 control-label">*Under Group :</label> 
<div class="col-sm-4"> 
<input name="undergroup"  type="text" value="<?php echo $ungroup->prodcatg_name; ?>" class="form-control" readonly=""> 
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="description"></textarea>
</div>  
</div>

</div>

<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>

</div>
</div>
</div>
</form>

<?php
if($this->session->flashdata('flash_msg')!='')
{
?>
<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php }?>		
			
<div class="row">
<div class="col-lg-12">
<div class="panel-body">
<div class="table-responsive">

<form class="form-horizontal">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead style="background: #e4e4e0;">
<tr>
	<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	<th>Group Name</th>
	<th>Description</th>
	<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$i=2;
foreach($result as $fetch_list){
?>

<tr  class="gradeC record" data-row-id="<?php echo $fetch_list->prodcatg_id; ?>" <?php if($fetch_list->prodcatg_name=='Category'){ ?> style="display:none;"<?php }?> >
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->prodcatg_id; ?>" value="<?php echo $fetch_list->prodcatg_id; ?>" /></th>

<th><?=$fetch_list->prodcatg_name;?></th>
<th><?=$fetch_list->Description;?></th>

<th>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="fa fa-eye"></i> </button>
<button class="btn btn-default modalEditCatg" href='#editcatg' type="button" data-toggle="modal" data-a="<?php echo $fetch_list->prodcatg_id; ?>"> <i class="icon-pencil"></i></button>
<?php
$pri_col='prodcatg_id';
$table_name='tbl_prodcatg_mst';
?>
<button class="btn btn-default delbutton" id="<?=$fetch_list->prodcatg_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
</th>
</tr>


<div id="modal-<?php  echo $i;?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Product Category</h4>
</div>
<div class="modal-body overflow">

<div class="form-group form-group-to"> 
<label class="col-sm-2 control-label">*Category Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="prodcatg_id" value="<?php echo $fetch_list->prodcatg_id; ?>" />
<input type="text" class="form-control" name="prodcatg_name"  value="<?=$fetch_list->prodcatg_name;?>" readonly=""> 
</div> 
<?php 
$ugroup=$this->db->query("SELECT * FROM tbl_prodcatg_mst where prodcatg_id='121'" );
$ungroup=$ugroup->row();	
?>
<label class="col-sm-2 control-label">*Under Group :</label> 
<div class="col-sm-4"> 
<input name="undergroup"  type="text" value="<?php echo $ungroup->prodcatg_name ; ?>" class="form-control" readonly=""> 
</div> 
</div>

<div class="form-group form-group-to"> 
<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="description" readonly="readonly"><?php echo $fetch_list->Description; ?></textarea>
</div>  
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php 
$i++;
} ?>

<input type="text" style="display:none;" id="table_name" value="tbl_prodcatg_mst">  
<input type="text" style="display:none;" id="pri_col" value="prodcatg_id">

</tbody>
</table>
</form>
</div>

</div>	
</div>
</div>
</div>

<form class="form-horizontal" role="form" method="post" action="<?=base_url();?>master/ProductCategory/insert_itemctg">
<div id="editcatg" class="modal fade modal" role="dialog">
   <div class="modal-dialog modal-lg">
       <div class="modal-contenttt">

       </div>
   </div>    
</div>
</form>

</div>

<?php
$this->load->view("footer.php");
?>

<script>
$('.modalEditCatg').click(function(){
       var ID=$(this).attr('data-a');
        $.ajax({url:"edit_category?ID="+ID,cache:true,success:function(result){
           $(".modal-contenttt").html(result);
       }});
   });
</script>