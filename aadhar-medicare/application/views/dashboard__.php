<?php $this->load->view("header.php");?>
<div class="main-content">

<h1 class="page-title">Dashboard</h1>
<br>
<?php 

		$grandtotalAmount='';
		$currentcount='';
		$overduecount='';
		$amountcounttt='';
		$amountcountto='';
		$amountcountab='';
		$todayreceipts_amt='';
		$weekreceipts_amt='';
		$monthreceipts_amt='';
		$quarterreceipts_amt='';
		$yearreceipts_amt='';
		$thistodaydueamount='';
		$thistodaysale='';
		$thisweekdueamount='';
		$thisweeksale='';
		$thismonthdueamount='';
		$thismonthsale='';
		$thisquarterdueamount='';
		$thisquartersale='';
		$thisyeardueamount='';
		$thisyearsale='';
	$jandata=''; $febdata=''; $mardata=''; $aprdata=''; $maydata=''; $jundata=''; $juldata=''; $augdata='';
	$sepdata=''; $octdata=''; $novdata=''; $decdata='';
		
	$query=$this->db->query("select * from tbl_invoice_hdr");
	foreach($query->result() as $fetch_list){
					$grandtotalAmount +=$fetch_list->grand_total;
					
					$idt=$fetch_list->invoice_date;
					$date = new DateTime("$idt");
					$fdate=$date->format("Y-m-d");
					$dt=$fetch_list->due_date;
					//echo $idate= date('Y-m-d', strtotime($fdate. " + $dt days"));

					  $d=date_parse_from_format("d-m-y",$idt);
				
					  $monthd = $d["month"];
						
					if($monthd==1){
						 $jandata +=$fetch_list->grand_total;
					}
					if($monthd==2){
					     $febdata +=$fetch_list->grand_total;
					}
					if($monthd==3){
					      $mardata +=$fetch_list->grand_total;
					}
					if($monthd==4){
						  $aprdata +=$fetch_list->grand_total;
					}
					if($monthd==5){
					      $maydata +=$fetch_list->grand_total;
					}
					if($monthd==6){
					      $jundata +=$fetch_list->grand_total;
					}
					if($monthd==7){
					      $juldata +=$fetch_list->grand_total;
					}
					if($monthd==8){
					      $augdata +=$fetch_list->grand_total;
					}
					if($monthd==9){
					       $sepdata +=$fetch_list->grand_total;
					}
					if($monthd==10){
					       $octdata +=$fetch_list->grand_total;
					}
					if($monthd==11){
					        $novdata +=$fetch_list->grand_total;
					}
					if($monthd==12){
					        $decdata +=$fetch_list->grand_total;
					}
						
   						
					
					$cdate = date("Y-m-d");
					$idate= date('Y-m-d', strtotime($fdate. " + $dt days"));
					$theRequestMadeDateTime = strtotime($idate);
					$theCurrentDateTime = strtotime($cdate);
					$theDifferenceInSeconds = 600 - ($theCurrentDateTime - $theRequestMadeDateTime);
					$minutesLeft = (floor ($theDifferenceInSeconds / (60*60*24)));
					
				    $datecount=abs($minutesLeft);
					
					if($datecount<=0){					
						$currentcount +=$fetch_list->amount_due;		
					}else if($datecount<=15){
						$overduecount +=$fetch_list->amount_due;
					}else if(16<=$datecount){
						  $amountcounttt +=$fetch_list->amount_due;
					}else if(31<=$datecount){
						  $amountcountto +=$fetch_list->amount_due;						
						}else if(46<=$datecount){
						   $amountcountab +=$fetch_list->amount_due;
						}
						
		
$receiptsQ=$this->db->query("select * from tbl_invoice_payment where status='PaymentReceived' and invoiceid='$fetch_list->invoiceid'");	
$fetch_receipts=$receiptsQ->row();
		
		 					
						
					if($datecount<=0){
							 $thistodaydueamount +=$fetch_list->amount_due;
							 $thistodaysale +=$fetch_list->grand_total;
							 $todayreceipts_amt +=$fetch_receipts->receive_billing_mount;
					}
					if($datecount<=7){
							 $thisweekdueamount +=$fetch_list->amount_due;
							 $thisweeksale +=$fetch_list->grand_total;
							 $weekreceipts_amt +=$fetch_receipts->receive_billing_mount;
					}
					if($datecount<=30){
							 $thismonthdueamount +=$fetch_list->amount_due;
							 $thismonthsale +=$fetch_list->grand_total;
							 $monthreceipts_amt +=$fetch_receipts->receive_billing_mount;
															
					}
					if($datecount<=90){
							 $thisquarterdueamount +=$fetch_list->amount_due;
							 $thisquartersale +=$fetch_list->grand_total;
							 $quarterreceipts_amt +=$fetch_receipts->receive_billing_mount;
															
					}
					if($datecount<=365){
							 $thisyeardueamount +=$fetch_list->amount_due;
							 $thisyearsale +=$fetch_list->grand_total;
							 $yearreceipts_amt +=$fetch_receipts->receive_billing_mount;
															
					}		
					
						
						
				}	
					

	$purjandata=''; $purfebdata=''; $purmardata=''; $puraprdata=''; $purmaydata=''; $purjundata=''; $purjuldata=''; $puraugdata='';
	$pursepdata=''; $puroctdata=''; $purnovdata=''; $purdecdata='';

$purchaseQ=$this->db->query("select * from tbl_purchase_order_hdr");	
foreach($purchaseQ->result() as $fetch_purchasess){
		
					 $idtt=$fetch_purchasess->invoice_date;
		  			 $dss=date_parse_from_format("d-m-y",$idtt);
				
					 $monthpur = $dss["month"];
						
					if($monthpur==1){
						 $purjandata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==2){
					     $purfebdata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==3){
					      $purmardata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==4){
						  $puraprdata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==5){
					      $purmaydata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==6){
					      $purjundata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==7){
					      $purjuldata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==8){
					      $puraugdata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==9){
					       $pursepdata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==10){
					       $puroctdata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==11){
					        $purnovdata +=$fetch_purchasess->grand_total;
					}
					if($monthpur==12){
					        $purdecdata +=$fetch_purchasess->grand_total;
					}
						
		 
		 
}	
?>
<!-- Row-->

<div class="lib-panel">
<div class="row">
<!-- Online Signup -->
<div class="col-lg-3">
<div class="panel minimal secondary-bg">
<div class="panel-body">
<p>CURRENT</p>
<h2 class="no-margins"><strong><i class="fa fa-inr"></i> <?php if($currentcount!=''){ 
echo number_format($currentcount,2, '.', ',');
}else{
 echo "0.00";
}
?></strong></h2>
</div>
</div>
</div>
<!-- /Online Signup -->

<!-- Online Signup -->
<div class="col-lg-3">
<div class="panel minimal royalblue-bg">
<div class="panel-body">
<p>OVERDUE</p>
<h2 class="no-margins"><strong><i class="fa fa-inr"></i> <?php		 if($overduecount!=''){
echo number_format($overduecount,2, '.', ',');
}else{
echo "0.00";
}
?></strong></h2>
<br />
<p>1-15 Days</p>
</div>
</div>
</div>
<!-- /Online Signup -->

<!-- Online Signup -->
<div class="col-lg-3">
<div class="panel minimal teal-bg">
<div class="panel-body">
<p>&nbsp;</p>
<h2 class="no-margins"><strong><i class="fa fa-inr"></i> <?php if($amountcounttt!=''){
echo number_format($amountcounttt,2, '.', ',');
}else{
	echo "0.00";
} ?>
</strong></h2>
<br />
<p>16-30 Days</p>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="panel minimal teal-bg">
<div class="panel-body">
<p>&nbsp;</p>
<h2 class="no-margins"><strong><i class="fa fa-inr"></i> <?php if($amountcounttt!=''){
echo number_format($amountcounttt,2, '.', ',');
}else{
	echo "0.00";
} ?>
</strong></h2>
<br />
<p>16-30 Days</p>
</div>
</div>
</div>
<!-- /Online Signup -->

<!-- Online Signup -->
<div class="col-lg-3 col-sm-6">
<div class="panel minimal info-bg">
<div class="panel-body">
<p>&nbsp;</p>
<h2 class="no-margins"><strong><i class="fa fa-inr"></i> <?php
	if($amountcountto!=''){
 echo number_format($amountcountto,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?></strong></h2><br />
<p>31-45 Days</p>
</div>
</div>
</div>
<!-- /Online Signup -->
</div>
</div>



<div class="row">

<div class="col-md-9"> 
<div class="panel panel-default">
<!-- Panel body --> 
<div class="panel-body"> 
<h4 style="margin-top: 0;">Sales and Purchases</h4>
<div class="table-responsive">
<!-- chart -->
<canvas id="clients" width="720" height="400"></canvas>

<?php 
//number_format($overduecount,2, '.', ',');
	//$datedata= new date();
	//echo $datedata;
?>

<script src="<?=base_url();?>assets/js/barchart.js"></script>
<script>
 var datedata = new Date();
    var currentyears = datedata.getFullYear();
var nextyear=new Date().getFullYear()+1;

var barData = {
     labels: ['Apr '+currentyears, 'May '+currentyears, 'Jun '+currentyears, 'Jul '+currentyears, 'Aug '+currentyears, 'Sep '+currentyears, 'Oct '+currentyears, 'Nov '+currentyears, 'Dec '+currentyears, 'Jan '+nextyear, 'Feb '+nextyear, 'Mar '+nextyear],
    datasets: [
        {
            label: '2010 customers #',
            fillColor: '#382765',
            data: ['<?php if($aprdata!=''){ echo number_format($aprdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($maydata!=''){ echo number_format($maydata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($jundata!=''){ echo number_format($jundata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($juldata!=''){ echo number_format($juldata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($augdata!=''){ echo number_format($augdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($sepdata!=''){ echo number_format($sepdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($octdata!=''){ echo  number_format( $octdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($novdata!=''){ echo number_format($novdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($decdata!=''){ echo number_format($decdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($jandata!=''){ echo number_format($jandata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($febdata!=''){ echo number_format($febdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($mardata!=''){ echo number_format($mardata,2, '.', ''); }else{ echo '0.00'; } ?>']
        },
        {
            label: '2014 customers #',
            fillColor: '#7BC225',
            data: ['<?php if($puraprdata!=''){ echo number_format($puraprdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($purmaydata!=''){ echo number_format($purmaydata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($purjundata!=''){ echo number_format($purjundata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($purjuldata!=''){ echo number_format($purjuldata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($puraugdata!=''){ echo  number_format($puraugdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($pursepdata!=''){ echo number_format($pursepdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($puroctdata!=''){ echo number_format($puroctdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($purnovdata!=''){ echo number_format($purnovdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($purdecdata!=''){ echo number_format($purdecdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($purjandata!=''){ echo number_format($purjandata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($purfebdata!=''){ echo number_format($purfebdata,2, '.', ''); }else{ echo '0.00'; } ?>', '<?php if($purmardata!=''){ echo number_format($purmardata,2, '.', ''); }else{ echo '0.00'; } ?>']
        }
    ]
};

var context = document.getElementById('clients').getContext('2d');
var clientsChart = new Chart(context).Bar(barData);
</script>
<!-- chart -->
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-3">
<div class="panel minimal">
<div class="panel-body">
<p>Above 45 Days</p>
<h2 class="no-margins"><strong><img src="/sharma-heels//assets/images/Indian_Rupee.png" width="25px" height="25px"><?php
	if($amountcountab!=''){
 echo number_format($amountcountab,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?></strong></h2>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-3">
<div class="panel minimal">
<div class="panel-body">
<?php 
$rec_amt="";
$conQ=$this->db->query("select * from tbl_invoice_payment where status='PaymentReceived'");	
foreach($conQ->result() as $fetch_rec){
		
		 $rec_amt +=$fetch_rec->receive_billing_mount;
}
//echo $rec_amt	
?>
<p>Total Receivables</p>
<h2 class="no-margins"><strong><img src="/sharma-heels//assets/images/Indian_Rupee.png" width="25px" height="25px"><?php
	
	$totalrece=$grandtotalAmount-$rec_amt;
	
	if($totalrece!=''){
 echo number_format($totalrece,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?></strong></h2>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-3">
<div class="panel minimal">
<div class="panel-body">
<p>Total sales</p>
<h2 class="no-margins"><strong><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="25px" height="25px"/><?php
	if($grandtotalAmount!=''){
 echo number_format($grandtotalAmount,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?></strong></h2>
</div>
</div>
</div>
</div>
<!-- /row-->

<!-- Row-->
<div class="row">

<div class="col-md-9"> 
<div class="panel panel-default">

<!-- Panel body --> 
<div class="panel-body"> 
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >

<tr>
		<th></th>
	    <th>Sales</th>
		<th>Receipts</th>
        <th>Due</th>
		
</tr>

<tbody>
<tr>
<th>Today</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thistodaysale!=''){
 echo number_format($thistodaysale,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($todayreceipts_amt!=''){
 echo number_format($todayreceipts_amt,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thistodaydueamount!=''){
 echo number_format($thistodaydueamount,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
</tr>
<tr>
<th>This Week</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thisweeksale!=''){
 echo number_format($thisweeksale,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($weekreceipts_amt!=''){
 echo number_format($weekreceipts_amt,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thisweekdueamount!=''){
 echo number_format($thisweekdueamount,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
</tr>
<tr>
<th>This Month</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thismonthsale!=''){
 echo number_format($thismonthsale,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($monthreceipts_amt!=''){
 echo number_format($monthreceipts_amt,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thismonthdueamount!=''){
 echo number_format($thismonthdueamount,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
</tr>
<tr>
<th>This Quarter</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thisquartersale!=''){
 echo number_format($thisquartersale,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($quarterreceipts_amt!=''){
 echo number_format($quarterreceipts_amt,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thisquarterdueamount!=''){
 echo number_format($thisquarterdueamount,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
</tr>
<tr>
<th>This Year</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thisyearsale!=''){
 echo number_format($thisyearsale,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($yearreceipts_amt!=''){
 echo number_format($yearreceipts_amt,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
<th><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="15px" height="15px"/>&nbsp;
<?php
	if($thisyeardueamount!=''){
 echo number_format($thisyeardueamount,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?>
</th>
</tr>
</tbody>
</table>
</div>

</div> 
<!-- /panel body -->
</div> 
</div>
<div class="col-lg-3 col-sm-3">
<div class="panel minimal">
<div class="panel-body">
<p>Total Receipts</p>
<h2 class="no-margins"><strong><img src="<?php echo base_url();?>/assets/images/Indian_Rupee.png" width="25px" height="25px"/><?php
	if($rec_amt!=''){
 echo number_format($rec_amt,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?></strong></h2>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-3">
<div class="panel minimal">
<div class="panel-body">
<p>Total Purchases</p>
<?php 
$pur_amt="";
$purQ=$this->db->query("select * from tbl_purchase_order_hdr");	
foreach($purQ->result() as $fetch_pur){
		
		 $pur_amt +=$fetch_pur->grand_total;
}
?>
<h2 class="no-margins"><strong><img src="/sharma-heels//assets/images/Indian_Rupee.png" width="25px" height="25px"><?php
	if($pur_amt!=''){
 echo number_format($pur_amt,2, '.', ',');
 }else{
 	echo "0.00";
 }
 ?></strong></h2>
</div>
</div>
</div>
</div>
<!-- /row-->

<!-- Row-->

<?php $this->load->view("footer.php");?>