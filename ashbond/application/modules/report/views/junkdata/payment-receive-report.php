<?php 
$tableName="tbl_invoice_hdr";
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to CRM</title>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
</head>
<body>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"> 
<?php if(@$_GET['popup']=='True') {
	} else { 

	$this->load->view('sidebar');

	  } ?>

<div class="container-left"><!--left-menu close-->
</div><!--container-left close-->
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>Payment Report </h1> 
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
<form method="post">
<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Search Payment Receive Report </b></th>        
</tr>
</thead>
<tr>
<td width="19%" class="text-r">
Company Name :</td>
 <td width="33%">
 <select name="company_name" class="rounded"  >
<option value="">---select---</option>
 
    <option value="Decent_Palastic">Decent Palastic</option>
    <option value="Elite_India_Enterprises">Elite India Enterprises</option>
	<option value="L_K_Enterprises">L K Enterprises</option>
</select>
 </td>
<td width="19%" class="text-r">
</td>
<td width="29%"></td></tr>        
<tr>
	<td class="text-r">&nbsp;</td>
	<td>&nbsp; 
	</td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>
<table class="bordered"id="dataTables-example">
    <thead>
    <tr>
   <th width="13%">Customer Name</th>
<th width="24%">Debit Amount</th>
<th width="37%">Credit Amount</th>
<th width="36%">Closing Balance </th>
    </tr>
    </thead>
	<?php
	
	@extract($_POST);
	if($Search!='')
	{
        	
		 $queryy="select company_name,invoiceid,contactid,balance_total,sum(balance_total) as tot from $tableName where status='Invoice done'";
		
		if($company_name=='')
		{
		 $queryy  = $queryy . " group by contactid";
		}
		
		if($company_name!='')
		{
		$queryy  = $queryy . "and company_name ='$company_name' group by contactid ";
		}
		/*if($fdate!='')
		{
			$todate=explode("-",$_REQUEST['todate']);
			$fdate=explode("-",$_REQUEST['fdate']);
			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
			$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
		}*/
	}
	$result=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	$total_billamt=0;
	
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
   <?php  $selectramt="select * from tbl_contact_m where contact_id='$line->contactid'";
	      $resultramt=$this->db->query($selectramt);
		  $rowramt=$resultramt->row();
	?>
	
   	<td><a href="#" onclick="openpopup('invoice-payment-report',900,630,'id','<?php echo $rowramt->contact_id."^".$company_name;?>')" ><?php echo $rowramt->first_name." ".$rowramt->middle_name." ".$rowramt->last_name; ?></a><!--<input type="text" name="tg" value="<?php //echo $rowramt['first_name']." ".$rowramt['middle_name']." ".$rowramt['last_name']; ?>" readonly />--></td>
	
	<td><input type="text" name="billamount[]" value="<?php echo $tot;?>" readonly /></td>
	
	<?php 
	$rem_amt=0;
	$idcount=0;
	$selectramt1="select * from tbl_invoice_report where contact_id='$contactid' and company_name='$company_name'";
	      $resultramt1=$this->db->query($selectramt1);
		  foreach($resultramt1->result() as $rowramt1)
		  { 
		  $rem_amt=$rem_amt+$rowramt1['remaining_amt'];
		  $idcount=$idcount+$rowramt1['billamount'];
		  }
		
	?>
<td><input type="text" name="debit[]" value="<?php if($rem_amt==''){ if($idcount!=0){ echo $idcount; }else{echo $debit=$tot-$tot;} }else { echo $total_billdue=$idcount-$rem_amt;}?>" readonly /></td> 
	
	<td><input type="text" name="credit[]" value="<?php if($rem_amt=='' ){ if($idcount!=0){
	
	 echo $rem_amt; }else{ echo $tot;} }else {  $total_billdue=$idcount-$rem_amt; $totaldue_amount=$tot-$total_billdue;
	  echo  $totaldue_amount;} ?>" readonly /></td>
	
	</tr>
	<?php } ?>
</table>
</form>
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</div><!--paging-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
<div class="clear"></div><!--footer--row close-->
</div><!--wrapper close-->
</body>
</html>

