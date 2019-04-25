<?php
$tableName='tbl_product_stock';
?>
<form method="post">
<h1>Product List</h1> 
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

        <th>Part No. </th>
         <th>HSN Code</th>
		<th>Product Name</th>
		<th>Description</th>
		<th>Category</th>
        <th>Unit</th>
      	<th>Purchase Price</th>
        <th>GST Tax</th>
        <th>Sale Price</th>
		 	

    </tr>
<tr>
  
		<td></td>
        <td></td>
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

@$mod_sql=$this->db->query("select * from $tableName order by Product_id desc");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
   <tr class="record" data-row-id="<?php echo $line->Product_id; ?>">

  

										<td><?php echo $line->sku_no;?></td>
                                        <td><?php echo $line->hsn_code;?></td>
										<td><?php echo $line->productname;?></td>
										<td><?php echo $line->part_no;?></td>
										
										<td>
										<?php
										$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='$line->category'");
										$res1 = $sqlgroup->row();
										
										?>
										
										<?php echo $res1->prodcatg_name;?></td>
										
										
										<td><?php $sqlgroup=$this->db->query("select * from tbl_master_data where serial_number='".$line->usageunit."'");
										$res2 = $sqlgroup->row();?>
										<?php echo $res2->keyvalue;?></td>
										<td><?php echo $line->unitprice_purchase;?></td>
                                         <td><?php echo $line->gst_tax;?></td>
										
                                       <td><?php echo $line->unitprice_sale;?></td>
                                        
									 
										
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
