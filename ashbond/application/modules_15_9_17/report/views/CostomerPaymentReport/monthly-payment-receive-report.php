<?php 
$tableName="tbl_invoice_payment";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<script src="<?php echo base_url();?>assets/js/jst/jquery.min.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php $this->load->view('title'); ?>
<style>
p{font-size: 40px;}
.loader1 {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url("<?php echo base_url();?>assets/images/ajax-loader.gif") 50% 50% no-repeat #ffffff;
    opacity: .8;
}

</style>
<script>
$(window).load(function() {
	$(".loader1").fadeOut("fast");
});

</script>
<?php $this->load->view('phpfunction'); ?>

<body>
<div class="loader1" id=></div>
<?php $this->load->view('all_js'); ?>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->
<?php 
	$this->load->view('sidebar');
  ?>
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<script>
function search_row(id,row)
{

var value= document.getElementById(id).value;

var table = $('#dataTables-example').DataTable();
$('#'+id).on( 'keyup', function () {
    table
        .columns( row )
        .search( this.value )
        .draw();
});

} 	
</script>
<form method="get">
<h1>Payment Received Report </h1> 
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

<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Search Customer List</b></th>        
</tr>
</thead>

<tr>
<td width="19%" class="text-r">
Customer Name:</td>
 <td width="33%">
 <select name ="productname">
 <option value="">--select--</option>
 <?php $selectrr1="select * from tbl_contact_m where group_name='4'";
 
  $resultrr1 = $this->db->query($selectrr1);
foreach($resultrr1->result() as $rowramtt1 ){ 

		
	 	?>

 <option value = "<?php echo $rowramtt1->contact_id; ?>" ><?php echo $rowramtt1->first_name."  ".$rowramtt1->last_name;  ?> </option>
 
 
 <?php } ?>
 
</select>
 
 </td>   
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
<a href="print_monthly_payment_receive_report<?php echo $_SERVER['REQUEST_URI'];?>" target="_blank" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export_csv_monthly_pay_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered"id="dataTables-example">
<thead>
 <tr>
	
   <th width="13%">Customer Name</th>
	<th width="24%"> Amount</th>
	<th>Received Amount</th>
	<th width="28%"> Opening Balance </th>
    </tr>
</thead>

	<?php
@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where status='paymentReceived'";
		
		 if($productname!=''){
	       	
	//echo $productname;die;
										
	   $queryy = $queryy. " and contact_id = $productname ";
	   }
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy.=" and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
		
		  $queryy  = $queryy . " GROUP BY contact_id";
	}
	
	if($Search=='')
	{
		
		 $queryy="select * from $tableName where status='paymentReceived' GROUP BY contact_id";
		
		}
	
	$result1=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	$i=1;
	foreach(@$result1->result() as $line){
	
    @extract($line);
   ?>
   
   <tr>
   	
	
	<td><a onClick="openpopup('<?php echo base_url();?>Payment/PaymentReceived/invoicereport',1000,600,'id',<?php echo $line->contact_id; ?>)">
	<?php 
		$sql = $this->db->query("select * from tbl_contact_m where group_name ='4' and contact_id='$line->contact_id'");
		$linecategory=$sql->row();
			echo $linecategory->first_name;
		
	?>
	</a>
	</td>
  
	<td><?php
	$b1=$this->db->query("select sum(receive_billing_mount) as sum1 from $tableName where contact_id ='".$line->contact_id."' and status='invoice' ") ;
 $b2 = $b1->row();
 echo $b = $b2->sum1;
	
	?></td>
    	

  <td><?php 
  
   $a1=$this->db->query("select sum(receive_billing_mount) as sum1 from $tableName where contact_id ='".$line->contact_id."' and status='paymentReceived'");
	 $a2=$a1->row();
	echo $a = $a2->sum1;
	
  ?></td>

	<td><?php echo  $b-$a;?></td>

    </tr>


						<?php 
						
						$i++;
						}?>
					

</table>


<!--bordered close-->

<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</form>
<?php $this->load->view('softwarefooter'); ?>
