<?php 
error_reporting (E_ALL ^ E_NOTICE);
$tableName="tbl_user_role_mst";
$location="map_user_role";
$this->load->view('softwareheader'); 
?>

<h1>User Roll List</h1> 
<div class="actions">

<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>

   </div>

	</div>

</div><!--actions close-->



<div class="add">
<a href="<?php echo $location; ?>"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add User Role</a>

</div><!--add close-->

<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">
<form method="post">
<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

        <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>         

        <th>User Name</th>

        

		<th>Role Name</th>

        
<th>Action</th>
		

    </tr>
<tr>

      <td><input type="checkbox"  ></td>  

        <td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>

		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>

        <td></td>

    </tr>
    </thead>

<?php

		  $queryy="select * from tbl_user_role_mst";
	
		  $result=$this->db->query($queryy);

foreach (@$result->result() as $line){

   ?>

   <tr class="record" data-row-id="<?php echo $line->user_role_id; ?>">
   <td> <input name="cid" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->user_role_id; ?>" value="<?php echo $line->user_role_id ;?>"/>
   </td><?php 
    $usrrol = $this->db->query("select * from tbl_user_mst where status ='A' and user_id='".$line->user_id."' "); 
   $usrdata = $usrrol->row();
  
   ?>
   <td><?php echo $usrdata->user_name; ?></td>
   <?php
  
    $rolfet = $this->db->query("select * from tbl_role_mst where status ='A' and role_id='".$line->role_id."' ");
 
    $roledata1 = $rolfet->row();?>
        <td><?php echo $roledata1->role_name; ?></td> 

              
   <td>
           <a href="<?php echo $location; ?>?view=<?php echo $line->user_role_id ?>"><img src="<?php echo base_url();?>/assets/images/view.png" alt="" border="0" class="icon" /></a>
		    <a href="<?php echo $location ?>?id=<?php echo $line->user_role_id ?>"><img src="<?php echo base_url();?>/assets/images/edit.png" alt="" border="0" class="icon" /></a> 
	<?php		
$pri_col='user_role_id';
$table_name='tbl_user_role_mst';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->user_role_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
		 </td>
		   </td>

    </tr>

	<?php } ?>

<input type="text" style="display:none;" id="table_name" value="tbl_user_role_mst">  
<input type="text" style="display:none;" id="pri_col" value="user_role_id">         

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
