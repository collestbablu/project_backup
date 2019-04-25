<title>Communication List <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
	extract($_POST);
$tableName='tbl_communication';

$this->load->view('softwareheader'); 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<form method="post">
<h1>Communication List</h1> 
<!--
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>

		<ul>        
		</ul>
   </div>
	</div>
</div><!--actions close
<div class="add">
<a href="download_pdf_file"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>-->

<div class="add">
<?php if($add!=''){ ?>

<a href="add_letterhead"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Create Communication</a>
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

        <th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>        

        <th>Contact</th>
		 <th>Date</th>
		 <th>Remarks</th>
	 <th>Subject</th>
 <th>Ref. No.</th>
 <th>Currency</th>
        <th>Action</th>

		

    </tr>

    </thead>

	<?php

@$mod_sql=$this->db->query("select * from $tableName where communication_type='Communication' order by communication_id desc");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
   <tr class="record" data-row-id="<?php echo $line->communication_id; ?>">

   <td style="display:none">
<?php
										$productId= $line->Product_id;

										$checkProduct= $obj->product_check($productId);
   if($checkProduct=='1')
{
?>
   <input name="cid[]" class="sub_chk" type="checkbox" id="cid[]" data-id="<?php echo $line->communication_id; ?>" value="<?php echo $line->communication_id; ?>"  />
<?php } else{
	?>
	<spam data-id="" title="Invoice already ctrated for this product.you can not delete ?"   />*</spam>
	
<?php }?>
   </td>

										<td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->contact_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
					   ?></td>
										<td><?php echo $line->date;?></td>
										<td><?php echo $line->remark_name;?></td>
										<td><?php echo $line->subject;?></td>
										<td><?php echo $line->refno;?></td>
										 <td><?php
					  
					  $qnewcase=$this->db->query("select * from tbl_new_case where case_id='".$line->case_id."'");
					  $fetchnewcase=$qnewcase->row(); 

					   echo $fetchnewcase->currency_name;?></td>
										
										
										
<td style="width:175px;">
  <?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onClick="openpopup('add_letterhead',1200,600,'view',<?php echo $line->communication_id ;?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onClick="openpopup('add_letterhead',1200,600,'id',<?php echo $line->communication_id ;?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } 
if($delete!=''){ 
if($line->send_status=='Send')
{
if($checkProduct=='1')
{
$pri_col='communication_id';
$table_name='tbl_communication';
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->communication_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />

<?php
} }
else

{
?>
<!--<img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('Invoice already ctrated for this product.you can not delete ?');"  alt="" border="0"  title="Delete" />-->
<?php

}

 } ?>
 
 <a target="_blank" href="view_letter_head?id=<?php echo $line->communication_id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" /></a>
<br /> 
<?php 
if($line->send_status=='Send')
{
?>
<a class="submit" style="background-color:#FF0000"  href="send_approval?id=<?php echo $line->communication_id; ?>">Send</a>  
<?php } else{?>

<a class="btn btn-primary pull-left"   href="send_approval?id=<?php echo $line->communication_id; ?>">Re-Send</a>  
<?php }?>
</td>
    </tr>

	<?php 
	$i++;
	} 
	
	?>
<input type="text" style="display:none;" id="table_name" value="tbl_letter_head">  
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
   url: "delete_communication_data",
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