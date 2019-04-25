<?php
$tableName='tbl_communication';
?>

<form method="post">
<h1>Communication List</h1> 
<!--actions close-->

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

        <th>Contact</th>
		 <th>Date</th>
		 <th>Remarks</th>
	 <th>Subject</th>
 <th>Ref. No.</th>
      
    </tr>
<tr>
     	
		<td></td>
        <td></td>
        <td></td>
        <td></td>
		<td></td>

    </tr>
    </thead>

	<?php

@$mod_sql=$this->db->query("select * from $tableName where communication_type='Communication' order by communication_id desc");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
   <tr class="record" data-row-id="<?php echo $line->communication_id; ?>">

   
										<td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->contact_id."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
					   ?></td>
										<td><?php echo $line->date;?></td>
										<td><?php echo $line->remark_name;?></td>
										<td><?php echo $line->subject;?></td>
										<td><?php echo $line->refno;?></td>
										
										
		    </tr>

	<?php 
	$i++;
	} 
	
	?>

</table>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->

</div><!--div close-->
</div><!--container close-->

</div><!--paging-right close-->
