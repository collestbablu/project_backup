<?php
$tableName='tbl_new_case';
$this->load->view('softwareheader'); 
?>

<h1>Budgetary Offer Sent List </h1> 
<div class="actions">
<div class="blogroll">

	</div>
</div><!--actions close-->

<div class="add">
<a href="save_download_pdf_file_budgetary"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>
<!--add close-->
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

        <th>Vendor Name</th>
		 <th>Customer Name</th>
		
        <th>Case Id</th>
		<th>Status</th>
		        
    </tr>
 <tr>
		<td><input type="checkbox"></td>  
		<td><input type="text"  id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>
		<td><input type="text"  id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>
		<td><input type="text" id="id3" onKeyUp="search_row(this.id,3)" class="input-small"></td>
        <td><input type="text" id="id4" onKeyUp="search_row(this.id,4)" class="input-small"></td>
        
    </tr>
    </thead>

	<?php
   
		  $queryy="select * from tbl_new_case where action_status='Budgetary-Offer-Sent' order by new_case_id desc";
	
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