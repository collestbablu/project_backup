
<h1><b></b>Pending Authorizations List</h1> 

<!--actions close-->

<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

        <th>Date</th>
        <th>Contact Name</th>
       	<th>Case Id</th>
		<th>Ref.No</th>
        <th>Grand Total</th>
		<th>Type</th>
        <th>Status</th>
        
    </tr>

    <tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    </thead>


<?php

		  $queryy="select * from tbl_approve_status where status='A' order by new_case_id desc ";
		  
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