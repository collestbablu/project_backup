<?php 
		 $id;
		$qury=$this->db->query("select * from tbl_docket_entry where id='$id'");
		$fetchval=$qury->row();
if($bookedStatus=='Not Delivered'){
?>
<table>
<tr>
<td>
<img style="width:400px;" height="100px;" id="image" src="<?php echo base_url();?>assets/images/asn.png"  />
</td>
</tr>
<tr>
<td>This is inform you that subject shipment is expected to be delivered today,if undelivered or any other query for the same.Please feel Free to contact on below contact Details:- </td>

</tr>

<tr>
<td>Mr. Sanjay Karn@7982792990
</td>


</tr>
<tr>
<td>Mr. Kunwar@9250568594
</td>
</tr>
</table>
<?php
}
else{
?>

<table>
<tr>
ASN Logistics & Supply Solutions Pvt. Ltd.
</tr>


</table>
<table border="1">
<tr>
<td>Invoice No.</td>
<td><?=$fetchval->customer_invoice_no;?></td>
</tr>
<tr>
<td>Consignment No</td>
<td><?=$fetchval->docket_no;?></td>
</tr>

<tr>
<td>Booking Date</td>
<td><?=$fetchval->booking_date;?></td>
</tr>

<tr>
<td>Mode Of Transport</td>
<td><?=$fetchval->mode;?></td>
</tr>
<tr>
<td>Origin</td>

<?php
$originQuery=$this->db->query("select *from tbl_master_data where serial_number='$fetchval->origin'");
$getOrigin=$originQuery->row();

?>
<td><?=$getOrigin->keyvalue;?>
</td>
</tr>
<tr>
<?php
$dQuery=$this->db->query("select *from tbl_master_data where serial_number='$fetchval->destination'");
$getd=$dQuery->row();

?>
<td>Destination</td>
<td><?=$getd->keyvalue;?>
</td>
</tr>
<tr>
<td>Forwarding Thru</td>
<td>ASN Logistics & Supply Solutions Pvt. Ltd.</td>
</tr>
<tr>
<?php
$conQuery=$this->db->query("select *from tbl_contact_m where contact_id='$fetchval->consignee'");
$getcon=$conQuery->row();

?>
<td>Consignee Name</td>
<td><?=$getcon->first_name;?></td>
</tr>

<tr>
<td>EDD</td>
<td><?=$fetchval->edd;?></td>
</tr>

<tr>
<td>Shipment Delevered On</td>
<td><?=$fetchval->shipment_delivered_on;?></td>
</tr>

<tr>
<td>Time</td>
<td><?=$fetchval->shipment_delivered_on_time;?></td>
</tr>


<tr>
<td>Status</td>
<td><?=$fetchval->booked_status;?></td>
</tr>
<tr>
<td>Remarks</td>
<td><?=$fetchval->remarkss;?></td>
</tr>



</table>


<table>
<tr>
Thank You For Shipping With ASN Logistics & Supply Solutions Pvt. Ltd.
</tr>


</table>
<?php }?>