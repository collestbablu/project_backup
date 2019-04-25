<?php 
$tableName="tbl_template_hdr";
$this->load->view('softwareheader');
?>
<h1>Template Report </h1> 
<div class="actions">
<div class="blogroll">
</div>
</div><!--actions close-->
<div class="search-row-to">
</div><!--search-row-to close-->
<div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">
<form method="get">
<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Search Template Report </b></th>        
</tr>
</thead>

<tr>

<td class="text-r">Search Product Code:</td>							
<td><input type="text" name="product_code" id="product_code" placeholder="Product Code" style="width:80px;" onKeyUp="filterProductCode()"></td>					
										
<td class="text-r">Finish Goods</td>
					<td> 
				<div id="divprocode">
					<select name="product_name" class="rounded">
					<option value="">--select--</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_product_stock where Product_typeid!='row_material' and templateid='1'");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
					  
						<option value="<?php echo $contRow->sku_no; ?>">
						<?php echo $contRow->productname; ?></option>
						<?php } ?>
					</select></div>
						</td>			
</tr>        
<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22"  id="id3" onKeyUp="search_row(this.id,3)" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22"  id="id4" onKeyUp="search_row(this.id,4)" class="rounded" value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
</tr>
<tr>
    <td class="text-r" align="right"></td>
	<td> 
	</td>
	<td class="text-r">&nbsp;</td>
	
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>
<a href="print_product_stockreport<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export_csv_product_serial_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered"id="dataTables-example">
<thead>
<tr>
<th>Raw Material Name</th>   
<th>Quantity</th>
<th>Unit</th>
<th>Gross Weight</th>
<th>Net Weight</th>
<th>Runner</th>
</tr>
</thead>
	<?php
	@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($product_name!='') {
		
		
		    $queryy.=" and product_name='$product_name'";
		 
		 }
		
		//echo $todate;die;
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where status='A'";
		}
	$result=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	foreach(@$result->result() as $line){
	$i++;
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }
    @extract($line);
   ?>
   
   <tr>
   	<?php	$sql1 = $this->db->query("select * from tbl_template_dtl where template_hdr_id='$line->template_hdr_id'");
					   			$fetch=$sql1->row();
															
							
							$Query=$this->db->query("select * from tbl_product_stock where product_id='$fetch->item_name'");
						    $fetchQ=$Query->row();?>
							
								<td><?php echo $fetchQ->productname;?></td>
								<td><?php echo $fetch->quentity;?></td> 
								<td><?php echo $fetch->unit;?></td> 
								<td><?php echo $fetch->gross_weight;?>KG</td> 
								<td><?php echo $fetch->net_weight;?>KG</td> 
								<td><?php echo $fetch->scrap_weight;?>KG</td> 
								

    </tr>

	<?php } ?>

	     <input type = "hidden" value ="<?php  echo $tt;?>" id = "tol" />
		 <script>
		 var total = document.getElementById('tol').value;
		 
		 document.getElementById('tol1').value = total;
		 </script>   
<script>
		function filterProductCode(){		 
		 currentCell = 0;		
		 var tp='Contact';
		 var product1=document.getElementById("product_code").value;
		 var product=product1;
		
		    if(xobj)
			 {
			 var obj=document.getElementById("divprocode");
			 xobj.open("GET","getproductcode?con="+product,true);
			
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
			   }
			  }
			  			  
			 }
			 xobj.send(null);
		  }
</script>	
</table>

</form>
<!--bordered close-->

<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
<?php $this->load->view('softwarefooter'); ?>