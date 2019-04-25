<?php 
$tableName="tbl_new_invoice";
$this->load->view('softwareheader');
?>
<h1>SALE RECORDS</h1> 
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
<th colspan="4"><b>Search Sale Records </b></th>        
</tr>
</thead>

<tr>

<td class="text-r">Customer:</td>							
<td>

<select name="contact_id">
					<option value="">---select---</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='4'  order by first_name");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
						<option value="<?php echo $contRow->contact_id; ?>">
						<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
						<?php } ?>
			</select>

</td>					
										
<td class="text-r"></td>
					<td> 
				
						</td>			
</tr>        
<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22"  id="id3" onKeyUp="search_row(this.id,3)" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22"  id="id4" onKeyUp="search_row(this.id,4)" class="rounded" value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
</tr>
<tr>
   <td class="text-r" >Grand Total:</td>
	<td><input type="text" name="g_total" id="g_total" class="rounded" value="" readonly /> </td>
	<td class="text-r">&nbsp;</td>
	
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>
<a href="print_product_stockreport<?php echo $_SERVER['REQUEST_URI'];?>" target="_blank" class="submit"><strong>Print</strong></a>&nbsp;<a href="export_csv_product_serial_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered"id="dataTables-example">
<thead>
<tr>
<th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th> 
<th>Invoice ID.</th>   
<th>Invoice No. & Date</th>
<th>S.O. No. & Date</th>
<th>Customer</th>
<th>Description</th>
<th>Basic Amount</th>
<th>GST</th>
<th>Total Amount</th>
<th>Payment Details</th>
</tr>
</thead>
	<?php
	@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where choose_status='A' ";
		if($contact_id!=''){
						
							$queryy.="and contact_id='$contact_id'";
			 		}
		
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and n_date >='$fdate1' and n_date <='$todate1'";
		}
		$queryy.="order by invoice_id desc ";
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where choose_status='A' order by invoice_id desc";
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
  	<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->invoice_id; ?>"value="<?php echo $line->invoice_id?>" /></td>							
								<td style="width:7%"><?php echo $line->invoice_id;?></td>
								<td><?php echo $line->invoice_no." & ".$line->n_date;?></td> 
								<td><?php echo $line->so_no." & ".$line->so_date;?></td> 
								<td><?php 
										 $contQuery=$this->db->query("select * from tbl_contact_m where contact_id='$line->contact_id'");
										 $contRow=$contQuery->row();
								echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name;?></td> 
								
								<td><?php 
								
								$cateQuery=$this->db->query("select * from tbl_new_case where case_id='$line->case_id'");
								$categoryRow=$cateQuery->row();
								
								echo $categoryRow->category_name;?></td>
								 
								<td><?php echo $line->basic_amt;?></td>
								<td><?php echo $line->tax;?></td>
								<td><?php echo $line->total_amt;?></td>
								
								<td><?php 	
										$sumbill='';							
			  						$Qresult=$this->db->query("select * from tbl_invoice_report where invoiceid='$line->invoice_id' and type='Invoice'");
									foreach($Qresult->result() as $fetchQlist){
								
										$sumbill +=$fetchQlist->billamount;
										
										}
								if($sumbill!=''){
										
									echo $sumbill;	
								}else{
								
								echo $line->payment_status;
								}
								?></td> 
								

    </tr>

	<?php  $sum = $sum + $line->total_amt; } ?>
	<input type="hidden" name="g_total" id="g_total1" class="form-control" value="<?php echo $sum;?>" readonly /></th>   
	
</table>
</form>
<script>
var id=document.getElementById("g_total1").value;
document.getElementById("g_total").value = id;
//alert(id);
</script>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
<?php $this->load->view('softwarefooter'); ?>