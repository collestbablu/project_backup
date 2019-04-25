<title>Case List <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php
$tableName='tbl_new_case';
$this->load->view('softwareheader'); 
?>

<h1>Case List </h1> 
<div class="actions">
<div class="blogroll">
<!--
<div id="">
	<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>-->
</div><!--actions close-->
<div class="add">
<a href="download_pdf_file_case"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>
<div class="add">
<a href="add_case"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Case</a>

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

        <th>Vendor Name</th>
		 <th>Customer Name</th>
		<th>Category Name</th>
		<th>Currency</th>
        <th>Case Id</th>
		<th>Status</th>
		<th>Choose Status</th>
        
    </tr>
 
    </thead>

	<?php
   
		  $queryy="select * from $tableName order by new_case_id desc";
	
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
  <td><?php echo $line->category_name;?></td>
  <td><?php echo $line->currency_name;?></td>
     <td><?php echo $line->case_id;?></td> 
	<input type="hidden" style="border:none" readonly id="caidd<?php echo $line->new_case_id; ?>" value="<?php echo $line->case_id;?>" /> 
	 <td><?php echo $line->action_status;  ?></td> 

           <td>
		   <select name="choose_status[]" id="choose_status<?php echo $line->new_case_id; ?>" >
<option value="">---select--</option>

<option value="Budgetary-Offer-Sent">Budgetary Offer Sent</option>
<option value="Final-Offer-Sent">Final Offer Sent</option>
<option value="Sale-Order-Received">Sale Order Received</option>
<option value="Purchase-Order-Sent">Purchase Order Sent</option>
<option value="Invoice-Raised">Invoice Raised</option>
<option value="Payment-Received">Payment Received</option>
<option value="Cancel">Cancel</option>
<option value="Completed">Completed</option>
</select>
<button onclick="statusfun('<?php echo $line->new_case_id; ?>')">Update</button>

<?php

$selectCase1=$this->db->query("select * from tbl_communication  where  case_id='$line->case_id'");
$cnt1=$selectCase1->num_rows();
$selectCase2=$this->db->query("select * from tbl_quotation_hdr  where  case_id='$line->case_id'");
$cnt2=$selectCase2->num_rows();
$selectCase3=$this->db->query("select * from tbl_sales_ordernew_hdr  where  case_id='$line->case_id'");
$cnt3=$selectCase3->num_rows();
$selectCase4=$this->db->query("select * from tbl_new_invoice  where  case_id='$line->case_id'");
$cnt4=$selectCase4->num_rows();
$selectCase5=$this->db->query("select * from tbl_purchase_order_hdr  where  case_id='$line->case_id'");
$cnt5=$selectCase5->num_rows();
$selectCase6=$this->db->query("select * from tbl_letter_head  where  case_id='$line->case_id'");
$cnt6=$selectCase6->num_rows();
if($cnt1>0 or $cnt2>0 or $cnt3>0 or $cnt4>0 or $cnt5>0 or $cnt6>0)
{


?>
<img src="<?php echo base_url();?>/assets/images/delete.png"  onclick="return confirm('Please first delete case against this case id');" class="icon"  alt="" border="0"  title="Delete" />
<?php
}
else
{
$pri_col='new_case_id';
$table_name='tbl_new_case';
?>

<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->new_case_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />

<?php }?>
</td>

    </td></tr>

	<?php } ?>

<input type="text" style="display:none;" id="table_name" value="tbl_contact_m">  
<input type="text" style="display:none;" id="pri_col" value="contact_id"> 	
</table>
<script>
function statusfun(d){

 var sid=document.getElementById('choose_status'+d).value;

 var caid=document.getElementById('caidd'+d).value;
 	
	if(sid!=''){
	
		var condata=d+"^"+sid+"^"+caid;
		
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