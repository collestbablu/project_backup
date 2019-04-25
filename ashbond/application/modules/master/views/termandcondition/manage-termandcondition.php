<title>Term And Condition List <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
	extract($_POST);
$tableName='tbl_termandcondition';

$this->load->view('softwareheader'); 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<form method="post">
<h1>Term And Condition List</h1> 
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>

		<ul>        
		</ul>
   </div>
	</div>
</div><!--actions close-->
<div class="add">
<a href="download_pdf_file"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>
<div class="add">
<?php if($add!=''){ ?>

<a href="add_termandcondition"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Term And Condition</a>
<?php } ?>
</div><!--add close-->
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

        <th>Type</th>
		
		
	

        <th>Action</th>

		

    </tr>

    </thead>

	<?php

@$mod_sql=$this->db->query("select * from $tableName order by id desc");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
   <tr class="record" data-row-id="<?php echo $line->id; ?>">

   <td>
<?php
										$productId= $line->Product_id;

										$checkProduct= $obj->product_check($productId);
   if($checkProduct=='1')
{
?>
   <input name="cid[]" class="sub_chk" type="checkbox" id="cid[]" data-id="<?php echo $line->id; ?>" value="<?php echo $line->id; ?>"  />
<?php } else{
	?>
	<spam data-id="" title="Invoice already ctrated for this product.you can not delete ?"   />*</spam>
	
<?php }?>
   </td>

										<td><?php echo $line->type;?></td>
										
										
										
<td>
  <?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onClick="openpopup('add_termandcondition',900,400,'view',<?php echo $line->id ;?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onClick="openpopup('add_termandcondition',900,400,'id',<?php echo $line->id ;?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } 
if($delete!=''){ 
if($checkProduct=='1')
{
$pri_col='id';
$table_name='tbl_termandcondition';
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />

<?php
}
else

{
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('Invoice already ctrated for this product.you can not delete ?');"  alt="" border="0"  title="Delete" />
<?php

}

 } ?>
</td>
    </tr>

	<?php 
	$i++;
	} 
	
	?>
<input type="text" style="display:none;" id="table_name" value="tbl_termandcondition">  
<input type="text" style="display:none;" id="pri_col" value="id">  
</table>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->

</div><!--div close-->
</div><!--container close-->

</div><!--paging-right close-->

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
//alert(info);
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
