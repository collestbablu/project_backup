<title>Category List <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php
$tableName='tbl_prodcatg_mst';
$this->load->view('softwareheader'); 
?>

<h1>Category LIST</h1> 
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->
<div class="add">
<a href="download_pdf_file"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>
<!--add close-->
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">


<table class="bordered table-hover dataTables-example">
    <thead>

    <tr>
        <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>        
      
        <th style="width: 200px;">Group Name</th>
		<th>Primary</th>
		<th>Under Group</th>
        <th style="display:none">Alias Name</th>
		<th style="display:none">Print Name</th>
        <th>Action</th>
		
    </tr>
	
    </thead>
   
	<?php
	
		  @$queryy="select *from $tableName where status='A' and comp_id = '".$this->session->userdata('comp_id')."' order by prodcatg_id desc";
		
$mod_sql = $this->db->query($queryy);

foreach ($mod_sql->result() as $line){
		 
   ?>
   <tr class="record" data-row-id="<?php echo $line->prodcatg_id; ?>">
   <td>
  <?php 
   if($line->prodcatg_id!='121')
{


?>
   <input name="cid[]" type="checkbox" id="cid[]" value="<?php echo $line->prodcatg_id;?>" class="sub_chk" data-id="<?php echo $line->prodcatg_id; ?>" /><?php } else
{
?>
 <input name="cid[]" disabled="disabled"  type="checkbox" id="cid[]" value="<?php echo $line->prodcatg_id;?>" onclick="getCid(this.value)" />
<?php
 }?> </td>
 	  	
    	<td><?php echo $line->prodcatg_name;?></td>
		
		 <?php if(
$line->main_prodcatg_id==1){$Primary="Y";}else{$Primary="N";}?>
	<td><?php echo $Primary; ?></td>

		 <td><?php if($line->main_prodcatg_id!='1'){ @$ugrou="select * from $tableName where status='A' and prodcatg_id='".@$line->main_prodcatg_id."'"; 
   
@$ung = $this->db->query(@$ugrou);
@$row = @$ung->row();

		?><?php echo @$row->prodcatg_name; }?></td>
		 <td style="display:none"><?php echo $line->alias;?></td>
		<td style="display:none"><?php echo $line->printname;?></td>
	 	
                     
<td>
<?php if($view!=''){ ?>
<?php
if($line->prodcatg_id=='121')
{
?>

<img src="<?php echo base_url();?>/assets/images/add.png" onclick="openpopup('add_itemctg',900,400,'mid',<?php echo $line->prodcatg_id; ?>)"  alt="" border="0" class="icon" title="add" />
<?php } else {?>
<?php }?>
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onclick="openpopup('add_itemctg',900,400,'id',<?php echo $line->prodcatg_id; ?>)"  alt="" border="0" class="icon" title="Edit" />


<?php } if($delete!=''){

if($line->prodcatg_id!='121')
{
$pri_col='prodcatg_id';
$table_name='tbl_prodcatg_mst';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->prodcatg_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php } 
 } else { }?>

</td>
    </td></tr>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_prodcatg_mst">  
<input type="text" style="display:none;" id="pri_col" value="prodcatg_id">  	       
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