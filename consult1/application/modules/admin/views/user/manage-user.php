<?php
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
$tableName='tbl_user_mst';
$this->load->view("softwareheader.php");
?>
<h1>User List</h1> 
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->

<div class="add">
<?php if($add!=''){ ?>
<a href="add_user"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add User</a>
<?php } ?>
</div><!--add close-->

<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">


<table class="bordered" id="dataTables-example">
    <thead>

    <tr>
        <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>        
        <th>User Name</th>
		<th>Division Name</th>
		<th>Email Id</th>
        <th>Phone No</th>

        <th>Action</th>
		
		
    </tr>
	<tr>
      <td><input type="checkbox"></td>  
       	<td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" name="user_name" class="input-small"></td>
		<td><input type="text" name="divn_id" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>
		<td><input type="text" name="email_id" id="id3" onKeyUp="search_row(this.id,3)" class="input-small"></td>
		<td><input type="text" name="phone_no" id="id4" onKeyUp="search_row(this.id,4)" class="input-small"></td>
        <td></td>
		
    </tr>
    </thead>
    
	<?php
	
	
		  @$queryy="select * from $tableName where status='A' order by user_id DESC"; 
 
$mod_sql = $this->db->query($queryy);

foreach ($mod_sql->result() as $line){
		 
   ?>
   <tr class="record" data-row-id="<?php echo $line->user_id; ?>">
   <td>
 <?php
										$userid= $line->user_id;

										$checkUser= $obj->userCheck($userid);
   if($checkUser=='1')
		{
		?>
   <input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->user_id; ?>" value="<?php echo $line->user_id;?>" />
    <?php } else{
	?>
	<spam data-id="" title="User Role already created for this User.you can not delete ?"   />*</spam>
	
<?php } ?> 
   </td>
    <td><?php echo $line->user_name;?></td>
<?php
//this query is for getting division name from tbl_wing_mst 
$divQuery=$this->db->query("select *from tbl_wing_mst where divn_id='".$line->divn_id."'");
$divRow = $divQuery->row();

?>
        <td><?php echo $divRow->divn_name;?></td>
	    <td><?php echo $line->email_id;?></td>
	 <td><?php echo $line->phone_no;?></td>

        
                     
<td>
<?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onClick="openpopup('add_user',900,400,'view',<?php echo $line->user_id ?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onClick="openpopup('add_user',900,400,'id',<?php echo $line->user_id ?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } if($delete!=''){ 
if($checkUser=='1')
{
$pri_col='user_id';
$table_name='tbl_user_mst';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->user_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php
}
else
{
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('User Role already Created for this User.you can not delete ?');"  alt="" border="0"  title="Delete" />
<?php } } ?>

</td>
    </td></tr>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_user_mst">  
<input type="text" style="display:none;" id="pri_col" value="user_id">      
</table>
</form>
<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->

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