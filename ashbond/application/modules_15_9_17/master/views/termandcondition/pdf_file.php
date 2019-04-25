<?php
$tableName='tbl_termandcondition';

?>
<form method="post">
<h1>Term And Condition List</h1> 
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

        <th>Type</th>	

    </tr>
<tr>
		
		
		<td></td>

    </tr>
    </thead>

	<?php

@$mod_sql=$this->db->query("select * from $tableName order by id desc");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
   <tr class="record" data-row-id="<?php echo $line->id; ?>">

										<td><?php echo $line->type;?></td>
										
																		
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