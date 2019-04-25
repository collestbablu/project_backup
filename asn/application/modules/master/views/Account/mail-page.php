
<table>
<tr>
ASN Logistics & Supply Solutions Pvt. Ltd.
</tr>


</table>

<table border="1">
<tr>
<td>Invoice No.</td>
<td><?=$customer_invoice_no;?></td>
</tr>
<tr>
<td>Consignment No</td>
<td><?=$docket_no;?></td>
</tr>

<tr>
<td>Booking Date</td>
<td><?=$booking_date;?></td>
</tr>

<tr>
<td>Mode Of Transport</td>
<td><?=$mode;?></td>
</tr>
<tr>
<td>Origin</td>

<?php
$originQuery=$this->db->query("select *from tbl_master_data where serial_number='$origin'");
$getOrigin=$originQuery->row();

?>
<td><?=$getOrigin->keyvalue;?>
</td>
</tr>
<tr>
<?php
$dQuery=$this->db->query("select *from tbl_master_data where serial_number='$destination'");
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
$conQuery=$this->db->query("select *from tbl_contact_m where contact_id='$consignee'");
$getcon=$conQuery->row();

?>
<td>Consignee Name</td>
<td><?=$getcon->first_name;?></td>
</tr>

<tr>
<td>EDD</td>
<td><?=$edd?></td>
</tr>

<tr>
<td>Status</td>
<td>Booked</td>
</tr>




</table>


<table>
<tr>
Thank You For Shipping With ASN Logistics & Supply Solutions Pvt. Ltd.
</tr>


</table>
