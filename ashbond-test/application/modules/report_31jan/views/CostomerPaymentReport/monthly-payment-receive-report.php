<?php 
error_reporting (E_ALL ^ E_NOTICE);
$tableName="tbl_wip_hdr";
$this->load->view('softwareheader');
?>

<h1>DEFLESHING LIST REPORT </h1> 
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
<th colspan="4"><b>Search Defleshing  List Report </b></th>        
</tr>
</thead>
<tr>
<td class="text-r">Lot No:</td>
<td><input type="text"  name="serial_no" value="<?php //echo $_REQUEST ["serial_no"]; ?>" /></td>
<td width="19%" class="text-r" style="display:none">Product Type:</td>
<td width="33%" style="display:none"><select name="Product_typeid">
              <option value="">----Select ----</option>
              <option value="finish_goods">Finish Goods</option>
            </select></td>
<td width="19%" class="text-r">Product Name:</td>
<td width="29%"><select name="product_name" id="prdidd" class="rounded" >
					<option value="">--select--</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods'");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
					  
						<option value="<?php echo $contRow->sku_no; ?>">
						<?php echo $contRow->productname; ?></option>
						<?php } ?>
					</select></td></tr>  
					<tr style="display:none">
					<td class="text-r">
Machine Name:</td> 			
<td><select name="machine_name" id="machine_id" <?php if(@$_GET['id']!=''){ ?>  <?php }?> >
					<option value="">----Select----</option>
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_machine");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->Machine_id; ?>" <?php if($branchFetch->machine_name==$fetchQM->Machine_id){?> selected="selected"<?php }?> /><?php  echo $fetchQM->machinename;  ?></option>
					<?php } ?>
			</select>
 </td>
					<td class="text-r">
Supervisor:</td> 			
<td><select name="supervisor" id="supervisor"  >
					<option value="">----Select----</option>
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='3'");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->contact_id; ?>" /><?php  echo $fetchQM->first_name;  ?></option>
					<?php } ?>
			</select>
 </td>
					</tr>
		<tr style="display:none">
		<td class="text-r">
Date:</td> 			
<td><input type="date" name="date" id="date" value="<?php echo $branchFetch->date; ?>"  /></td>	

<td class="text-r">
Shift:</td> 			
<td><select name="shift" id="shift" <?php if(@$_GET['id']!=''){ ?>  <?php }?> >
					<option value="">----Select----</option>
					<option value="1" <?php if($branchFetch->shift=='1'){ ?> selected="selected" <?php } ?>>1</option>
					<option value="2" <?php if($branchFetch->shift=='2'){ ?> selected="selected" <?php } ?>>2</option>
			</select>
 </td>
		</tr>			
<tr>
 	<td class="text-r">&nbsp;</td>
	<td class="text-r">&nbsp;</td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>
<a href="print_monthly_payment_receive_report<?php echo $_SERVER['REQUEST_URI'];?>"  target="_blank" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export_csv_monthly_pay_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered">
    <thead>
	 <tr style="border-bottom:#fff solid 1px">
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>Defleshing In Progress</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
</tr>
 <tr>
<th>Date</th><th>Finish Goods</th><th>Unit</th><th>Shift</th><th>Supervisor</th><th>Operator</th><th>Hours</th><th>Act Hours</th><th>Total Qty</th><th>Completed</th><th>Rejection</th><th>&nbsp;</th><th>&nbsp;</th>
</tr> 
    </thead>
	<?php
	  @extract($_GET);
	if(@$Search!=''){

	  $queryy="select * from tbl_wip_hdr where status='A'";

		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and lot_no like '%$serial_no%'";

		  } 

		}

if($Search==''){
		  $queryy="select * from tbl_wip_hdr where status='A'";
}

		  @$result=$this->db->query($queryy);
   $i=$start;
    $j=1;
   foreach(@$result->result() as $liness){
   $i++;
   if($i%2!=0){
   	$color='#ECE9D8';
   }else{
   	$color='#F1FEFD';
   }
   if($Search!='')
	 {
	$wipLogQuery=$this->db->query("select *from tbl_defleshing_log where bom_id='$liness->wip_hdr_id'");
	}
	else
	{
	$wipLogQuery=$this->db->query("select *from tbl_defleshing_log where bom_id='$liness->wip_hdr_id' ");
	}
	foreach($wipLogQuery->result() as $line){
	
	
	$machineQuery=$this->db->query("select *from tbl_machine where Machine_id='$line->machine_id'");
	$getMachine=$machineQuery->row();
	
	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->p_id'");
	$getproduct=$productQuery->row();
	$supervisorQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->supervisor'");
	$getSupervisor=$supervisorQuery->row();
	
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	?>	
	<tr>
	
	<td>
	<input value="<?php echo $line->date; ?>" />
	 
	</td>
	<td>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $getproduct->productname;?>">
	</td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $getunit->keyvalue; ?>"></td>	
	
	<td>
	<input type="text" name=""readonly="" value="<?php echo $line->shift; ?>">
	</td>
	<td>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $getSupervisor->first_name;?>">
	</td>
	<td>
	<?php
	
	 $dataID=$line->operator;
	if($dataID!='')
	{
	//print_r($dataID);
	$operatorQuery=$this->db->query("select *from tbl_contact_m where  contact_id in ($dataID)");
	foreach ($operatorQuery->result() as $getOperator){
	?>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $getOperator->first_name;?>">
	<?php }}?>
	</td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $hour=$line->hours; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $actHour=$line->act_hour; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $liness->quantity; ?>"></td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $compl=$line->quantity-$line->rejection_qty." ".$getunit->keyvalue; ?>"></td>
	
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $reg=$line->rejection_qty." ".$getunit->keyvalue; ?>"></td>
	
	
	</tr>
<?php 
$regSum=$regSum+$reg;
$CompSum=$CompSum+$compl;
$RunnerSum=$RunnerSum+$runner;
$HourSum=$HourSum+$hour;
$ActSum=$ActSum+$actHour;

} }?>

 <tr style="border-bottom:#fff solid 1px">
<th>&nbsp;</th><th>Total Qty</th><th><?php echo $liness->quantity; ?></th><th>Completed Qty</th><th><?=$CompSum;?></th><th>Rejected Qty</th><th><?=$regSum;?></th><th>Hours Taken</th>
<th><?=$HourSum;?></th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
</tr> 


</table>
</form>
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
<?php $this->load->view('softwarefooter'); ?>