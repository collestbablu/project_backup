<?php
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
$tableName='tbl_enterprise_mst';
$this->load->view('softwareheader'); 
?>

<h1>Enterprise List</h1> 
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>

   </div>
	</div>
</div><!--actions close-->

<div class="add">
<?php if($add!=''){ ?>

<a href="add_enterprise"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Enterprise</a>
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
        <th>Company ID</th>
        <th >Enterprise Code</th>
		<th >Enterprise Name</th>
		
        <th>Action</th>
		
    </tr>
	 <tr>
      <td><input type="checkbox"></td>  
        <td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>
		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>
		<td><input type="text" id="id3" onKeyUp="search_row(this.id,3)" class="input-small"></td>
		<td></td>
		
    </tr>
    </thead>
   
	<?php
	 

		  @$queryy="select * from $tableName where status='A' and compa_id='".$this->session->userdata('comp_id')."' order by comp_id DESC"; 
	 
$mod_sql = $this->db->query($queryy);

foreach ($mod_sql->result() as $line){
		  

   ?>
   <tr class="record" data-row-id="<?php echo $line->comp_id; ?>">
   <td>
   <?php
										$compId= $line->comp_id;

										$checkEnterPrice= $obj->enterPriceCheck($compId);
   if($checkEnterPrice=='1')
{
?>
    <input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->comp_id; ?>" value="<?php echo $line->comp_id;?>" onclick="getCidfdsd(this.value)" />
   <?php } else{
	?>
	<spam data-id="" title="Region already created for this Enterprice.you can not delete ?"   />*</spam>
	
<?php }?>
   </td>
   <td><?php echo  $line->comp_id;?></td>
    <td><?php echo $line->code;?></td>
	<td><?php echo $line->comp_name;?></td>
<td>
<?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onclick="openpopup('add_enterprise',900,400,'view',<?php echo $line->comp_id ;?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onclick="openpopup('add_enterprise',900,400,'id',<?php echo $line->comp_id ;?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } if($delete!=''){
if($checkEnterPrice=='1')
{

$pri_col='comp_id';
$table_name='tbl_enterprise_mst';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->comp_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php
}
else
{
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('Region already Created for this Enterprice.you can not delete ?');"  alt="" border="0"  title="Delete" />
<?php } } ?>
</td>
    </tr>
	<?php } ?>
	     
<input type="text" style="display:none;" id="table_name" value="tbl_enterprise_mst">  
<input type="text" style="display:none;" id="pri_col" value="comp_id">  
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