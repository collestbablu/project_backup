<?php
$tableName='tbl_master_data';
$this->load->view('softwareheader'); 
?>

<h1>MANAGE MASTER DATA LIST</h1> 
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->

<div class="add">
<?php if($add!=''){ ?>
<a href="add_master_data"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Master Data</a>
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
      
        <th style="width: 200px;">Value Name</th>
		<th>Added Value</th>
		<th>Description</th>
        
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
	
	
		  @$queryy="select * from $tableName where status='A' order by serial_number DESC"; 

$mod_sql = $this->db->query($queryy);

foreach ($mod_sql->result() as $line){

   ?>
   <tr class="record" data-row-id="<?php echo $line->serial_number; ?>">
   <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->serial_number; ?>" value="<?php echo $line->serial_number;?>" /></td>
 	  	
		<?php
		$compQuery=$this->db->query("select * from tbl_master_data_mst where param_id='".$line->param_id."'");
		$compRow = $compQuery->row();

		?>

		
		<td><?php echo  $compRow->keyname;?></td>
    	<td><?php echo $line->keyvalue;?></td>       
	    <td><?php echo $line->description;?></td>
	 	
                     
<td>
<?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onclick="openpopup('add_master_data',900,400,'view',<?php echo $line->serial_number ?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>

<img src="<?php echo base_url();?>/assets/images/edit.png" onclick="openpopup('add_master_data',900,400,'id',<?php echo $line->serial_number ?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } if($delete!=''){ 

$pri_col='serial_number';
$table_name='tbl_master_data';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->serial_number."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php } ?>
</td>
    </td></tr>
	<?php } ?>
	<input type="text" style="display:none;" id="table_name" value="tbl_master_data">  
<input type="text" style="display:none;" id="pri_col" value="serial_number">        
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