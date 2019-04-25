<?php
$contact_id_copy;
$selectin1="select * from tbl_invoice_payment where contact_id='$contact_id_copy'";
 $resultin1=$this->db->query($selectin1);
 foreach($resultin1->result() as $rowin1)
 {
 
 
 
 if($rowin1->status=='invoice')
 {
   $invoiceSum=$invoiceSum+$rowin1->receive_billing_mount;
 }
 else
 {
  $paySum=$paySum+$rowin1->receive_billing_mount;
 
 }
 
 
 
 
 
 
 
 
 

 
 
 

 }


 $remaining_amt=$invoiceSum-$paySum;
?>
Due Amount:<input type="text" style="width:80px;" name="total_billamt" value="<?php echo $remaining_amt;?>" readonly="true"/>
 



  