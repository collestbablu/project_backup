<?php
$tableName='tbl_quotation_hdr';

?>

<h1><b></b>Quotation List</h1> 


<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

        <th>Quotation. No</th>
        <th>Date</th>
        <th>Customer Name</th>
       	<th>Case Id</th>
		<th>Ref.No</th>
        <th>Grand Total</th>

    </tr>

    <tr>

		<td></td>   
        <td></td>
        <td></td>
        <td></td>
        <td></td>
		<td></td>
    </tr>
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by quotation_id_hdr desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->quotation_id_hdr; ?>">

                       <td><?php echo $line->quotation_id_hdr;?></td>
					   <td><?php echo $line->delivery_date; ?></td>
                       <td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->vendor_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
					   ?></td>
                      <td><?php echo $line->totalcaseid;?></td>
					  <td><?php echo $line->refno;?></td>
                        <td><?php echo $line->grand_total;?></td>
                        
</tr>
	<?php } ?>
</table>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</div><!--paging-row close-->