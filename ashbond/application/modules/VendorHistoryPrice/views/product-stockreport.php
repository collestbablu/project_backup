<title>Vendor Price List History <?php date_default_timezone_set("Asia/Kolkata"); echo $date = date("d-m-Y");   ?></title>
<?php 
$tableName="tbl_purchase_order_dtl";
$this->load->view('softwareheader');

?>
<h1>Vendor Price List History</h1> 
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
<th colspan="4"><b>Search Vendor Price List History</b></th>        
</tr>
</thead>
<tr>
<td style="text-align:right">Vendor</td>
<input type="hidden" name="product_id" id="product_id" value=""/>
  <td><select name="vendor_id" > 
<option value="">--Select--</option>
    <?php 
		$sql = $this->db->query("select * from tbl_contact_m where status ='A' and group_name='3'");
		foreach($sql->result() as $linecategory){
	?>
    <option value="<?php echo $linecategory->contact_id;?>"><?php echo $linecategory->first_name;?></option>
    <?php } ?>
</select></td>
<td style="text-align:right">Product Name</td>
<td>
<select name="product_iddd" id='standard' class='custom-select'> 
<option value="">--Select--</option>
    <?php 
		$sql = $this->db->query("select * from tbl_product_stock where status ='A'");
		foreach($sql->result() as $linecategory){
	?>
    <option value="<?php echo $linecategory->Product_id;?>"><?php echo $linecategory->productname;?></option>
    <?php } ?>
</select>
</td>
</tr>
     
<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate" size="22" class="rounded"/> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate" size="22" class="rounded"/> </td>
</tr>
<tr>
    <td class="text-r" align="right"></td>
	<td>&nbsp;
	</td>
	<td class="text-r">&nbsp;</td>
	
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>

<div class="table-row">
<table class="bordered table-hover dataTables-example">
<thead>
<tr>
<th>Date</th>
<th>Vendor Name</th>
<th>Product Name</th>
<th>Remarks</th>
<th>Subject</th>
<th>Ref.No.</th>
<th>List Price</th>
</tr>
</thead>
	<?php
	@extract($_GET);
	if($Search!='')
	{
	$queryy="select * from $tableName where status='A'";
		
		if($vendor_id!='')
		{
		 $queryy.=" and vendor_id = '$vendor_id'";
		
		}
		
		if($product_id!='')
		{
		 $queryy.=" and product_id = '$product_id'";
		
		}
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy.=" and author_date >='$fdate1' and author_date <='$todate1'";
		}
				
	}
	
	if($Search=='')
	{
		
		$queryy="select * from $tableName where status='A'";
		 
		}
	
	$result=$this->db->query($queryy);
	//echo $queryy;
	$i=1;
	$j=1;
	foreach(@$result->result() as $line){
	?>
   
   <tr>
   	
	<td>
	<?php echo $line->author_date;?>
	
                        </td>
	
	<td >
	<?php 
	
		
		$sql = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$line->vendor_id'");
		$linecategory=$sql->row();
			
		
	?>
	<?php echo $linecategory->first_name;?>
	</td>
  
  <?php $productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->product_id'");
  $getProduct=$productQuery->row();
  ?>
 <td> <?php echo $getProduct->productname;?></td>
	 <?php $hdrQuery=$this->db->query("select *from tbl_purchase_order_hdr where purchase_order_id='$line->purchase_order_hdr_id'");
  $getDataHdr=$hdrQuery->row();
  ?>
	<td><?php echo $getDataHdr->remark;?></td>
    	

  <td><?php echo $getDataHdr->subject;?></td>

	<td><?php echo $getDataHdr->refno;?></td>	<td><?php echo $line->list_price; ?></td>

    </tr>
 <div class="container">
	<div class="row">
		
<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1210px;height:200px;; margin-left:-302px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">View</h4>
      </div>
      <div class="modal-body">
	  <div  class="border row">
      <div class="border col-lg-3">
	  <strong>Date</strong>
	  </div>
	  <div class="border col-lg-3">
	  <strong>Product Name</strong>
	  </div>
	  <div class="border col-lg-3">
	  <strong>Qty</strong>
	  </div>
	  <div class="border col-lg-3">
	 <strong>List Price</strong>
	  </div>
	  
	  </div>
	  	
	  
	  <?php
						$queryProduct=$this->db->query("select *from tbl_purchase_order_dtl where purchase_order_hdr_id='$line->purchase_order_id'");
						
						foreach($queryProduct->result() as $getProduct){
						$productName=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->product_id'");
						$getProductName=$productName->row();
						
						$sqlwwww = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$getProduct->vendor_id'");
		$linecategorywww=$sqlwwww->row();
						?>
      <div class="row">
	  <div class="border col-lg-3">
	  <?php echo $getProduct->author_date;?>
	  </div>
	  <div class="border col-lg-3">
	  <?php echo $linecategorywww->first_name;?>
	  </div>
	  <div class="border col-lg-3">
	  <?php echo $getProduct->quantity;?>
	  </div>
	  <div class="border col-lg-3">
	   <?php echo $getProduct->list_price;?>
	  </div>
	  </div>
<?php }?>	  
	  </div>
     
    </div>
  </div>
</div>

	</div>
</div>
	<?php
	$i++;
	 } ?>

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