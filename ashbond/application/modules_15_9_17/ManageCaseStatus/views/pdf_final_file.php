
<h1>Final Offer Sent List </h1> 
<div class="actions">
<div class="blogroll">

	</div>
</div><!--actions close-->

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
        <th>Vendor Name</th>
		 <th>Customer Name</th>
        <th>Case Id</th>
		<th>Status</th>
		        
    </tr>
 <tr>
		<td></td>
        <td></td>
        <td></td>  
        <td></td>
    </tr>
    </thead>

	<?php
   
		  $queryy="select * from tbl_new_case where action_status='Final-Offer-Sent' order by new_case_id desc";
	
		  $result=$this->db->query($queryy);

  foreach(@$result->result() as $line){

   ?>

   <tr class="record" data-row-id="<?php echo $line->new_case_id; ?>">
 
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

</table>
<div class="clear"></div>

</div><!--table-row close-->
</div><!--div close-->
