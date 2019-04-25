<?php 
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
$tableName="tbl_role_mst";
$location="add_role";

$this->load->view('softwareheader'); 
?>

<h1>Role List</h1> 

<div class="actions">

<div class="blogroll">

<div id="">

  <a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>


   </div>

	</div>

</div><!--actions close-->





<div class="add">
<?php if($add!=''){ ?>
<a href="add_role"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Role</a>
<?php } ?>

</div><!--add close-->


<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

         <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>   

      

        <th>Role Code</th>

		<th>Role Name</th>

        <th>Action</th>

		

    </tr>

    <tr>

      <td><input type="checkbox"></td>  
		<td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>

		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>

        <td></td>

		

    </tr>

    </thead>

   

	<?php

			
		 $mod_sql = $this->db->query("select * from $tableName  where status='A' and comp_id='".$this->session->userdata('comp_id')."' ");
   
foreach ($mod_sql->result() as $line){
		
   ?>

   <tr class="record" data-row-id="<?php echo $line->role_id; ?>">

 <?php 
 
 
  $divQuery=$this->db->query("select role_id from tbl_role_mst where role_id='".$line->role_id."'");

  $divRow = $divQuery->row();

	?>



   <td> 
    <?php
										$roleid= $line->role_id;

										$checkRole= $obj->roleCheck($roleid);
   if($checkRole=='1')
		{
		?>
   <input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->role_id; ?>" value="<?php echo $line->role_id;?>" />
   <?php } else{
	?>
	<spam data-id="" title="Role Function Action already created for this Role.you can not delete ?"   />*</spam>
	
<?php } ?>   
   </td>

    <td><?php echo $line->code; ?></td>

    <td><?php echo $line->role_name;?>


<td>
<?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onclick="openpopup('add_role',900,400,'view',<?php echo $line->role_id;?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>

<img src="<?php echo base_url();?>/assets/images/edit.png" onclick="openpopup('add_role',900,400,'id',<?php echo $line->role_id;?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } if($delete!=''){ 
if($checkRole=='1')
{
$pri_col='role_id';
$table_name='tbl_role_mst';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->role_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php
}
else
{
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('Role Function Action already Created for this Role.you can not delete ?');"  alt="" border="0"  title="Delete" />
<?php } } ?>
</td>
    </td></tr>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_role_mst">  
<input type="text" style="display:none;" id="pri_col" value="role_id">   

</table>


<!--bordered close-->

<div class="clear"></div>

</div><!--table-row close-->



</div><!--div close-->

</div><!--container close-->

<script src="<?php echo base_url();?>/assets/jsw/jquery.js"></script>
<script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;

 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_data",
   data: info,
   success: function(){
  
   }
 });

         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
 
<?php $this->load->view('softwarefooter'); ?>