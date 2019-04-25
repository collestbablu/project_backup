<title>Invoice Raised List <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php
$tableName='tbl_new_case';
$this->load->view('softwareheader'); 
?>

<h1>Invoice Raised List </h1> 
<div class="actions">
<div class="blogroll">

	</div>
</div><!--actions close-->
<div class="add">
<a href="download_pdf_file_invoice_raised"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
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

        <th>Vendor Name</th>
		 <th>Customer Name</th>
		
        <th>Case Id</th>
		<th>Status</th>
		
    </tr>
     </thead>

	<?php
   
		  $queryy="select * from $tableName where action_status='Invoice-Raised' order by new_case_id desc";
	
		  $result=$this->db->query($queryy);

  foreach(@$result->result() as $line){

   ?>



   <tr class="record" data-row-id="<?php echo $line->new_case_id; ?>">
 
   
<td><input name="cid[]" type="checkbox" id="checkbox-1" class="sub_chk" data-id="<?php echo $line->new_case_id; ?>"  value="<?php echo $line->new_case_id?>" /></td>

	<?php $ugroup1=$this->db->query("SELECT * FROM tbl_contact_m where contact_id='".$line->vendor_id."'" );
			
			$ungroup2 = $ugroup1->row(); 
			?>

 <td><?php echo $ungroup2->first_name;?></td>

    <td><?php 
	 $query=$this->db->query("SELECT * FROM tbl_contact_m where contact_id='".$line->customer_id."'" );
			
	$fetchq=$query->row(); 
	
	echo $fetchq->first_name;?></td>
  
    <td><?php echo $line->case_id;  ?></td> 
	 <td><?php echo $line->action_status;  ?></td> 
     
    </td></tr>

	<?php } ?>

<input type="text" style="display:none;" id="table_name" value="tbl_contact_m">  
<input type="text" style="display:none;" id="pri_col" value="contact_id"> 	
</table>
<script>
function statusfun(d){

 var sid=document.getElementById('choose_status'+d).value;
	
	if(sid!=''){
	
		var condata=d+"^"+sid;
		
		window.location.href = "updatechoosestatus?data="+condata;
		alert("Update Successful");
	}else{
		alert("Please Select Option");
	}
}
</script>
<div class="clear"></div>

</div><!--table-row close-->
</div><!--div close-->

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