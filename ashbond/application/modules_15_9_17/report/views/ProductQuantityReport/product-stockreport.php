<?php 
$tableName="tbl_product_serial_log";
$this->load->view('softwareheader');
?>
<h1>Product Quantity Summary Report </h1> 
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
<th colspan="4"><b>Search Product Serial Report </b></th>        
</tr>
</thead>
<tr style="display:none;">
<td style="text-align:right">Category</td>
  <td><select name="Product_Catid" id="url" <?php if($_GET['view']){ ?> disabled="disabled" <?php }?>  class="rounded" onChange="getadd(this.value)" tabindex="3" > 

<option value="">---Select--</option>
    <?php 
		$sql = $this->db->query("select * from tbl_prodcatg_mst where status ='A' order by prodcatg_name asc");
		foreach($sql->result() as $linecategory){
	?>
    <option value="<?php echo $linecategory->prodcatg_id;?>"><?php echo $linecategory->prodcatg_name;?></option>
    <?php } ?>
</select></td>



<td style="text-align:right"></td>
<td></td>
</tr>
<tr>
<td width="19%" class="text-r">
Product Name:</td>
 <td width="33%"><input type="text" name="productname"   id="id3" onKeyUp="search_row(this.id,4)"  value="<?php if($_REQUEST['productname']!=''){echo $_REQUEST['productname'];}  ?>" /></td>
<td width="19%" class="text-r">
Product Code:</td>
<td width="29%"><input type="text" name="product_code"  id="id1" onKeyUp="search_row(this.id,2)" value="<?php if($_REQUEST['product_code']!=''){echo $_REQUEST['product_code'];}  ?>"/></td></tr>        
<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22"  id="id3" onKeyUp="search_row(this.id,3)" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22"  id="id4" onKeyUp="search_row(this.id,4)" class="rounded" value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
</tr>
<tr>
    <td class="text-r" align="right">Total Quantity</td>
	<td><input type = "text" id = "tol1" name = "tol"/> 
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
<th>Serial No:</th>
<th>Date</th>
<th>Product Code</th>
<th>Category</th>
<th>Product Name</th>
<!-- <th>Color Name</th> -->
<th>Quantity</th>
<th>Location</th>
</tr>
</thead>
	<?php
	@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($productname!='') {
		//echo "select * from tbl_product_stock where productname like '%$productname%'";
			$proNameQ1 = $this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
			$fproNQ1 = $proNameQ1->row();
	        $proid = $fproNQ1->Product_id;
		
		    $queryy.=" and product_id='$proid'";
		 
		 }
		if($product_code!=''){
		
		$queryy.=" and serial_code like '%$product_code%'";
		
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
   	<td><?php echo $i;?></td>
	<td><?php echo $line->maker_date;?></td>
   <?php  $proNameQ1=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
			$fproNQ1=$proNameQ1->row();	
		?>
	<td><?php echo $fproNQ1->sku_no;?></td>
    	<td>
    	<?php 
			
	$sql1 = $this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='".$fproNQ1->category."' ");
			$sql2 = $sql1->row();
			echo $sql2->prodcatg_name;
		?>
    </td>

  <td><?php 
			$proNameQ=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
			$fproNQ=$proNameQ->row();
	echo $fproNQ->productname;?></td>

<!--	<td><?php /* 
	
	$qurty1=$this->db->query("select * from tbl_master_data where serial_number='$line->color'");
	$qq1 = $qurty1->row();
	echo $qq1->keyvalue;
 */	?></td> -->
	<td><?php echo $line->quantity;
	
	$tt = $tt + $line->quantity;
	?></td>
	<td><?php
			$locQ=$this->db->query("select * from tbl_location where id='$line->location_id'");
			$flocQ=$locQ->row();
	 echo $flocQ->location_name; ?></td>

    </tr>

	<?php } ?>

	     <input type = "hidden" value ="<?php  echo $tt;?>" id = "tol" />
		 <script>
		 var total = document.getElementById('tol').value;
		 
		 document.getElementById('tol1').value = total;
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