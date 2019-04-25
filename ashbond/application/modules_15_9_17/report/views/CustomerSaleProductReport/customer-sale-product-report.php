<?php 
error_reporting (E_ALL ^ E_NOTICE);
$tableName="tbl_invoice_hdr";
$this->load->view('softwareheader');
?>

<h1>Customer Sale Product Report </h1> 
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
<th colspan="4"><b>Search Lead Report </b></th>        
</tr>
</thead>
<tr>
<td width="19%" class="text-r">Invoice No.:</td>
 <td width="33%"><input type="text" id="inc" name="invoice_no" value="" /></td>
 <td width="19%" class="text-r">Customer Name</td>
 <td>
 	<select name="cutomer_name">
    	<option value="">--select--</option>
        <?php 
		$sql = $this->db->query("select * from tbl_contact_m where status = 'A' order by first_name asc");
		foreach($sql->result() as $sqlline){ ?>
			<option value="<?php echo $sqlline->contact_id;?>"><?php echo $sqlline->first_name;?></option>
        
        <?php } ?>
    </select>
 </td>
 </tr>
 <tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>


     <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded"  value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
 
</tr>
<tr>
<td class="text-r" align="right">Grand Total:</td>
<td ><input type="text" name="grand_total" value="" id = "tol1" /></td>
     <td class="text-r"></td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr> 
</table>
<a href="print_customer_sale_product_report<?php echo $_SERVER['REQUEST_URI'];?>"  target="_blank" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export_csv_customer_sale_product_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered" id="dataTables-example">
    <thead>
    <tr>
             
        <th>Invoice No</th>
		<th>Customer Name</th>
        <th>Invoice Date</th>
		<th>Service Tax</th>
		 <!-- <th>Balance</th>-->
		  <th>Grand Total</th>
    </tr>
    </thead>
	<?php
	  @extract($_GET);
	if(@$Search!=''){

 		$queryy="select * from $tableName where status='Invoice done'";
		    if($invoice_no!=''){
		  		  	$queryy.=" and invoiceid like '%$invoice_no%'";

		  }
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
	if($cutomer_name!='')
		{
			
			$queryy  = $queryy . "and contactid = '$cutomer_name'";
		}

 
}

if($Search=='')
	{
		$queryy="select * from $tableName where status='Invoice done'";
		}

		  @$result=$this->db->query($queryy);
   $i=$start;
    $j=1;
   foreach(@$result->result() as $line){
   $i++;
   if($i%2!=0){
   	$color='#ECE9D8';
   }else{
   	$color='#F1FEFD';
   }
   ?>
   <tr>
  
                    <td><?php echo $line->invoiceid;?></td>
					  <td><?php
					  
					   $contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->contactid'");
					   $contactFetch=$contactQuery->row();
					    echo $contactFetch->first_name." ".$contactFetch->last_name;
					   
					  ?></td>
					   <td><?php echo $line->invoice_date; ?></td>
					   <td><?php echo 			   
			     			number_format((float)$line->service_tax, 2, '.', '');
			   			?></td>
					   
                          <!--<td><?php //echo number_format((float)$line->balance_total, 2, '.', '');
						 ?></td>-->
						  <td><?php echo
						 $gg = number_format((float)$line->grand_total, 2, '.', '');
						 $tt = $tt +$gg;
						 ?></td>
             </td></tr>
<?php } ?>
 <input type = "hidden" value ="<?php  echo number_format((float)$tt, 2, '.', '');?>" id = "tol" />
		 <script>
		 var total = document.getElementById('tol').value;
		 
		 document.getElementById('tol1').value = total;
		 </script>  
</table>
</form>
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
<?php $this->load->view('softwarefooter'); ?>