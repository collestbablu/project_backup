<?php
$tableName='tbl_contact_m';

?>

<h1>Contact List </h1> 
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
        
        <th>Company Name</th>
		<th>Primary Contact</th>
		 <th>Group Name</th>
		
        <th>Email</th>

		<th>Mobile</th>
		        
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
   
		  $queryy="select * from $tableName order by contact_id desc";
	
		  $result=$this->db->query($queryy);

  foreach(@$result->result() as $line){

   ?>



   <tr class="record" data-row-id="<?php echo $line->contact_id; ?>">
 
    <td><?php echo $line->first_name;?></td>
	<td><?php echo $line->company_name;?></td>
	
	
	<?php $ugroup1=$this->db->query("SELECT * FROM tbl_account_mst where account_id='".$line->group_name."'" );
			
			$ungroup2 = $ugroup1->row(); 
			?>

 <td><?php echo $ungroup2->account_name;?></td>

    <td><?php echo $line->email;?></td>
  
    <td><?php echo $line->mobile;  ?></td> 
	    

    </td></tr>

	<?php } ?>

</table>

<div class="clear"></div>

</div><!--table-row close-->
</div><!--div close-->