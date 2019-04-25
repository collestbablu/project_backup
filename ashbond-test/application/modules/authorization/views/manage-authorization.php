<title>Pending Authorizations List <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php
$tableName='tbl_purchase_order_hdr';
$this->load->view('softwareheader'); 
?>

<h1><b></b>Pending Authorizations List</h1> 

<!--actions close-->

<div class="add">
<a href="save_download_pdf_file"><img src="<?php echo base_url();?>/assets/images/download.png" alt="" border="0" />&nbsp;&nbsp;Pdf Download</a>
</div>





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

        
        <th>Date</th>
        <th>Contact Name</th>
       	<th>Case Id</th>
		<th>Ref.No</th>
		<th>Currency</th>
        <th>Grand Total</th>
		<th>Type</th>
        <th>Status</th>
        

        <th style="width:100px;">Action</th>

    </tr>
    
    </thead>

<?php

		  $queryy="select * from tbl_approve_status where status='A' and dismiss_status='show' order by new_case_id desc ";
		  
			  $result=$this->db->query($queryy);
 $i=1;
   foreach($result->result() as $line){
   
   if($line->type=='Purchase Order')
   {
$poQuery=$this->db->query("select *from tbl_purchase_order_hdr where purchase_order_id='$line->order_id' and send_status='Sent'");
$getPO=$poQuery->row();
}
if($line->type=='Sales Order')
   {
$SOQuery=$this->db->query("select *from tbl_sales_ordernew_hdr where purchase_order_id='$line->order_id' and send_status='Sent'");
$getSO=$SOQuery->row();
}


if($line->type=='Invoice')
   {
$SOQuery=$this->db->query("select *from tbl_sales_order_hdr where salesid='$line->order_id' and send_status='Sent'");
$getSO=$SOQuery->row();
}

if($line->type=='Quotation')
   {
$SOQuery=$this->db->query("select *from tbl_quotation_hdr where quotation_id_hdr='$line->order_id' and send_status='Sent'");
$getSO=$SOQuery->row();
}
if($line->type=='Communication')
   {
$SOQuery=$this->db->query("select *from tbl_communication where communication_id='$line->order_id' and send_status='Sent'");
$getSO=$SOQuery->row();
}

if($line->type=='Letter Head')
   {
$SOQuery=$this->db->query("select *from tbl_letter_head where id='$line->order_id' and send_status='Sent'");
$getSO=$SOQuery->row();
}

   ?>

   <tr class="record" data-row-id="<?php echo $line->purchase_order_id; ?>">

   <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->purchase_order_id; ?>"  value="<?php echo $line->purchase_order_id?>" /></td>

   

                      

					   <td><?php
					   if($line->type=='Sales Order')
   {
					   
					   echo $getSO->delivery_date;
					   
					    }
						 if($line->type=='Invoice')
   {
					   
					   echo $getSO->delivery_date;
					   
					    }
						
						if($line->type=='Purchase Order')
   {
					   echo $getPO->delivery_date;
					    }
						
						if($line->type=='Quotation')
						
						{
						
						 echo $getSO->delivery_date;
						
						}
						if($line->type=='Communication')
   						{
						echo $getSO->date;
						}	
if($line->type=='Letter Head')
   						{
						echo $getSO->date;
						}


						
						?></td>
                      <!-- <a onClick="openpopup('<?php echo base_url();?>Payment/Payment/payment_amount',1000,600,'id',<?php echo $line->vendor_id; ?>)"></a>-->
					   <td>
					   <?php
					   
					   if($line->type=='Sales Order')
   {
					    
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$getSO->vendor_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
						
						}
						if($line->type=='Invoice')
   {
					    
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$getSO->vendor_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
						
						}
						
						if($line->type=='Purchase Order')
   {
					    
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$getPO->vendor_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
						
						}
						if($line->type=='Quotation')
						
						{
						
											    
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$getSO->vendor_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;

						
						}
						

if($line->type=='Communication')
						
						{
						
											    
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$getSO->contact_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;

						
						}
						
						

if($line->type=='Letter Head')
						
						{
						
											    
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$getSO->contact_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;

						
						}
						
					   ?></td>
                      <td><?php
					   if($line->type=='Invoice')
   {
					   
					   echo $getSO->case_id;
					   
					    }
					   if($line->type=='Sales Order')
   {
					   
					   echo $getSO->case_id;
					   
					    }
						
						if($line->type=='Purchase Order')
   {
					   echo $getPO->case_id;
					    }
						if($line->type=='Quotation')
						
						{
						echo $getSO->case_id;
						}
						
						if($line->type=='Communication')
						
						{
						echo $getSO->case_id;
						
						}
						if($line->type=='Letter Head')
						
						{
						echo $getSO->case_id;
						
						}
						?></td>
					  <td><?php
					  
					   if($line->type=='Sales Order')
   {
					   
					   echo $getSO->refno;
					   
					    }
						 if($line->type=='Invoice')
   {
					   
					   echo $getSO->refno;
					   
					    }
						
						if($line->type=='Purchase Order')
   {
					   echo $getPO->refno;
					    }
						if($line->type=='Quotation')
						
						{
						echo $getSO->refno;
						}
						
						if($line->type=='Communication')
						{
						
						echo $getSO->refno;
						}
						if($line->type=='Letter Head')
						{
						
						echo $getSO->refno;
						}
						
						
						?></td>
							
						<td><?php
					  
					   if($line->type=='Sales Order')
   {
					   
					 
					  $qsale=$this->db->query("select * from tbl_sales_ordernew_hdr where purchase_order_id='".$line->order_id."'");
					  $fetchsale=$qsale->row(); 
					  
					  $qnewcase=$this->db->query("select * from tbl_new_case where case_id='".$fetchsale->case_id."'");
					  $fetchnewcase=$qnewcase->row(); 

					   echo $fetchnewcase->currency_name;
					   
					    }
						 if($line->type=='Invoice')
   {
					   
					  $qinvo=$this->db->query("select * from tbl_new_invoice where invoice_id='".$line->order_id."'");
					  $fetchinvoice=$qinvo->row(); 
					  
					  $Quinvoice=$this->db->query("select * from tbl_new_case where case_id='".$fetchinvoice->case_id."'");
					  $fetchinv=$Quinvoice->row(); 

					   echo $fetchinv->currency_name;
  
					    }
						
						if($line->type=='Purchase Order')
   {
					  $Qpo=$this->db->query("select * from tbl_purchase_order_hdr where purchase_order_id='".$line->order_id."'");
					  $fetchpo=$Qpo->row(); 
					  
					  $Querypo=$this->db->query("select * from tbl_new_case where case_id='".$fetchpo->case_id."'");
					  $fetchpurch=$Querypo->row(); 

					   echo $fetchpurch->currency_name;
					    }
						if($line->type=='Quotation')
						
						{
						 $Qques=$this->db->query("select * from tbl_quotation_hdr where quotation_id_hdr='".$line->order_id."'");
					  	 $fetchques=$Qques->row(); 
					  
					  $Queryquesty=$this->db->query("select * from tbl_new_case where case_id='".$fetchques->case_id."'");
					  $fetchquesty=$Queryquesty->row(); 

					   echo $fetchquesty->currency_name;
						}
						
						if($line->type=='Communication')
						{
						$Qcomm=$this->db->query("select * from tbl_communication where communication_id='".$line->order_id."'");
					  	 $fetchcommm=$Qcomm->row(); 
					  
					  $Querycommmmm=$this->db->query("select * from tbl_new_case where case_id='".$fetchcommm->case_id."'");
					  $fetchhomm=$Querycommmmm->row(); 

					   echo $fetchhomm->currency_name;
						}
						if($line->type=='Letter Head')
						{
						$Qlett=$this->db->query("select * from tbl_letter_head where id='".$line->order_id."'");
					  	 $fetchlettt=$Qlett->row(); 
					  
					  $Querylettter=$this->db->query("select * from tbl_new_case where case_id='".$fetchlettt->case_id."'");
					  $fetchllettt=$Querylettter->row(); 

					   echo $fetchllettt->currency_name;
						}
						
						
						?></td>
						
						
						
						<td><?php
					   if($line->type=='Sales Order')
   {
					   
					   echo $getSO->grand_total;
					   
					    }
						 if($line->type=='Invoice')
   {
					   
					   echo $getSO->grand_total;
					   
					    }
						
						if($line->type=='Purchase Order')
   {
					   echo $getPO->grand_total;
					    }
						if($line->type=='Quotation')
						
						{
						echo $getSO->grand_total;
						}
						
						if($line->type=='Communication')
						{
						
						echo "-";
						}
						if($line->type=='Letter Head')
						{
						
						echo "-";
						}
						
						
						?></td>
                        <td><?php echo $line->type;?></td>
     					 <td><?php echo $line->mail_sent_status;?></td>	
<td style="width:225px;" >
                   <?php
					   if($line->type=='Purchase Order')
   {
   ?>

<a target="_blank" href="<?=base_url();?>purchaseorder/PurchaseOrder/viewPurchaseOrder?id=<?php echo $getPO->purchase_order_id ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<?php } ?>

<?php
					   if($line->type=='Invoice')
   {
   ?>

<a target="_blank" href="<?=base_url();?>salesorder/SalesOrder/viewSalesOrder?id=<?php echo $getSO->salesid ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<?php } ?>
 <?php
					   if($line->type=='Sales Order')
   {
   ?>
  <!-- <a target="_blank" href="<?=base_url();?>salesordernew/SalesOrderNew/viewPurchaseOrder?id=<?php echo $getSO->purchase_order_id ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>-->

<?php }?>
<?php
if($line->type=='Quotation')
						
						{
?>
 <a target="_blank" href="<?=base_url();?>Quotation/viewQuotation?id=<?php echo $getSO->quotation_id_hdr; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
<?php }?>
<?php
if($line->type=='Communication')
						{
	?>
	 <a target="_blank" href="<?=base_url();?>master/CreateCommunication/view_letter_head?id=<?php echo $getSO->communication_id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
	
	<?php					
						
						
						}
						if($line->type=='Letter Head')
						{
						?>
						 <a target="_blank" href="<?=base_url();?>master/Letterhead/view_letter_head?id=<?php echo $getSO->id; ?>"><img src="<?php echo base_url();?>/assets/images/print1.png" alt="v" border="0" class="icon" title="View"/></a>
						
						<?php
						
						}
						
						?>



<?php
if($line->type=='Quotation')
						
						{
?>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>Quotation/updateQuotation',1400,600,'id',<?php echo $getSO->quotation_id_hdr; ?>)" />

<?php }?>


<?php
if($line->type=='Invoice')
						
						{
?>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>salesorder/SalesOrder/updateSalesOrder',1400,600,'id',<?php echo $getSO->salesid; ?>)" />

<?php }?>
<?php
if($line->type=='Purchase Order')
   {
   ?>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>purchaseorder/PurchaseOrder/updatePurchaseOrder',1400,600,'id',<?php echo $getPO->purchase_order_id; ?>)" />

<?php }?>

<?php
if($line->type=='Sales Order')
   {
   ?>

<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>salesordernew/SalesOrderNew/updatePurchaseOrder',1400,600,'id',<?php echo $getSO->purchase_order_id; ?>)" />
<?php }?>

<?php
if($line->type=='Communication')
						{
	?>

<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>master/CreateCommunication/add_letterhead',1400,600,'id',<?php echo $getSO->communication_id; ?>)" />


<?php }?>
<?php
if($line->type=='Letter Head')
{
?>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('<?=base_url();?>master/Letterhead/add_letterhead',1400,600,'id',<?php echo $getSO->id; ?>)" />

<?php }?>

<?php
if($line->type=='Quotation')
						
						{
						
?>

<a   href="#" onclick="openpopup('<?=base_url();?>authorization/authorization/send_page',1200,500,'id',<?php echo $getSO->quotation_id_hdr;?>)"><img src="<?php echo base_url();?>assets/images/mail.png" /></a>
<?php }?>

<?php
if($line->type=='Invoice')
						
						{
?>

<a  onclick="openpopup('<?=base_url();?>authorization/authorization/invoice_send_page',1200,500,'id',<?php echo $getSO->salesid;?>)"><img src="<?php echo base_url();?>assets/images/mail.png" /></a>
<?php }?>

<?php
if($line->type=='Sales Order')
   {
   ?>
 <!--  <a onclick="openpopup('<?=base_url();?>authorization/authorization/sale_send_page',1200,500,'id',<?php echo $getSO->purchase_order_id;?>)"><img src="<?php echo base_url();?>assets/images/mail.png" /></a>-->
   <?php }?>
   
   
<?php
if($line->type=='Purchase Order')
   {

   ?>
   <a onclick="openpopup('<?=base_url();?>authorization/authorization/pur_send_page',1200,500,'id',<?php echo $getPO->purchase_order_id ?>)"><img src="<?php echo base_url();?>assets/images/mail.png" /></a>
   <?php }?>

<?php
if($line->type=='Communication')
						{
	?>
	<a onclick="openpopup('<?=base_url();?>authorization/authorization/comm_send_page',1200,500,'id',<?php echo $getSO->communication_id;?>)"><img src="<?php echo base_url();?>assets/images/mail.png" /></a>
	
	<?php }?>

<?php
if($line->type=='Letter Head')
{
?>
<a onclick="openpopup('<?=base_url();?>authorization/authorization/lett_send_page',1200,500,'id',<?php echo $getSO->id;?>)"><img src="<?php echo base_url();?>assets/images/mail.png" /></a>



<?php }?>
<?php
if($line->type=='Letter Head')
   {
   ?>
   
   <a   href="#" onclick="openpopup('<?=base_url();?>authorization/authorization/send_page_letter_pdf',1200,500,'id',<?php echo $getSO->id;?>)"><img src="<?php echo base_url();?>assets/images/pdf.png" /></a>
   
   <?php }?>

<?php
if($line->type=='Sales Order')
   {
   ?>
  <!-- <a href="#" onclick="openpopup('<?=base_url();?>authorization/authorization/send_page_sales_pdf',1200,500,'id',<?php echo $getSO->purchase_order_id;?>)"><img src="<?php echo base_url();?>assets/images/pdf.png" /></a>-->
   <?php }?>
<?php
if($line->type=='Invoice')
   {
   ?>
    <a  href="<?=base_url();?>salesorder/SalesOrder/savedownloadFunction?id=<?php echo $getSO->salesid; ?>"><img src="<?php echo base_url();?>assets/images/pdf.png" /></a>
   <?php }?>
   
<?php
if($line->type=='Quotation')
						
						{
?>

<a   href="#" onclick="openpopup('<?=base_url();?>authorization/authorization/send_page_quation_pdf',1200,500,'id',<?php echo $getSO->quotation_id_hdr;?>)"><img src="<?php echo base_url();?>assets/images/pdf.png" /></a>
<?php
}
   ?>
<?php
if($line->type=='Purchase Order')
   {
   ?>
   
   <a   href="#" onclick="openpopup('<?=base_url();?>authorization/authorization/send_page_purchase_pdf',1200,500,'id',<?php echo $getPO->purchase_order_id;?>)"><img src="<?php echo base_url();?>assets/images/pdf.png" /></a>
   
   <?php }?>
<br />
<!--==============================================================================================-->
<?php
if($line->type=='Purchase Order')
   {
   ?>
 
  <img src="<?php echo base_url();?>/assets/images/dismiss.gif" id="<?php echo $getPO->purchase_order_id."^"."Purchase Order"; ?>" class="delbutton icon"  alt="" border="0"  title="dismiss" />  
   <?php } ?> 

<?php
if($line->type=='Sales Order')
   {
   ?>
  <img src="<?php echo base_url();?>/assets/images/dismiss.gif" id="<?php echo $getSO->purchase_order_id."^"."Sales Order"; ?>" class="delbutton icon"  alt="" border="0"  title="dismiss" />
   <?php } ?> 
 <?php
if($line->type=='Quotation')
   {
   ?>
   
  <img src="<?php echo base_url();?>/assets/images/dismiss.gif" id="<?php echo $getSO->quotation_id_hdr."^"."Quotation"; ?>" class="delbutton icon"  alt="" border="0"  title="dismiss" />
   
   <?php } ?> 
<?php
if($line->type=='Communication')
   {
   ?>
  
   <img src="<?php echo base_url();?>/assets/images/dismiss.gif" id="<?php echo $getSO->communication_id."^"."Communication"; ?>" class="delbutton icon"  alt="" border="0"  title="dismiss" />
    
   <?php } ?> 
 <?php
if($line->type=='Letter Head')
   {
   ?>
      
   <img src="<?php echo base_url();?>/assets/images/dismiss.gif" id="<?php echo $getSO->id."^"."Letter Head"; ?>" class="delbutton icon"  alt="" border="0"  title="dismiss" />
   <?php } ?>            
<!--===============================================================================================  --> 
   </td>
   </tr>
	<?php $i++;} ?>

</table>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</div><!--paging-row close-->

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

 if(confirm("Are you sure you want to Dismiss ?"))
		  {

 $.ajax({
   type: "GET",
   url: "update_authorization_dismiss",
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