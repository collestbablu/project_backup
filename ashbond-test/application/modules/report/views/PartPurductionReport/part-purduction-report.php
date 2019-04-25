<?php
$tableName="tbl_purchase_order_hdr";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to ERP</title>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>

<script>

    $(function () {



        $('#menu').metisMenu();



        $('#menu2').metisMenu({

            toggle: false

        });



         $('#menu3').metisMenu({

            doubleTapToGo: true

        });

    });

</script>
<script>
function popupclose(){
window.close();
}
</script>
</head>
<body>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"> 
<?php $this->load->view('sidebar'); ?>
<div class="container-left"><!--left-menu close-->
</div><!--container-left close-->
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>PURCHASE ORDER  REPORT </h1> 
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
<th colspan="4"><b>Search Purchase order  Report </b></th>        
</tr>
</thead>
<td width="19%" class="text-r">P.O NO.:</td>
<td width="29%"><select name="po_no" class="rounded" >
					<option value="">--select--</option>
					 <?php
					 
					 $purQuery=$this->db->query("select * from tbl_purchase_order_hdr ");
					 foreach($purQuery->result() as $purRow)
					{
					  ?>
					  
						<option value="<?php echo $purRow->refno; ?>">
						<?php echo $purRow->refno; ?></option>
						<?php } ?>
					</select></td>
					
<td width="19%" class="text-r">Vendor:</td>
<td width="29%"><select name="customer_name" id="prdidd" class="rounded" >
					<option value="">---select---</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='3'  order by first_name");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
						<option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$row->contact_id){?> selected="selected" <?php }?>>
						<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
						<?php } ?>
					</select></td>

					</tr>  
<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>


     <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded"  value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
 
</tr>

<tr>
	<td class="text-r" >Grand Total:</td>
	<td><input type="text" name="g_total" id="g_total" class="rounded" value="" readonly /> </td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>

<a href="print_part_purduction_report<?php echo $_SERVER['REQUEST_URI'];?>" target="_blank" class="submit"><strong>Print</strong></a>&nbsp;  <a href="export_part_purduction_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>

<div class="table-row">
<table class="bordered"id="dataTables-example">
    <thead>
    <tr>
		<th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th> 
		<th>Purchase Order Id.</th>   
		<th>P.O NO.</th>  
		<th>P.O Date</th>   
		<th>Vendor</th>
		<th>S.O NO.</th>
		<th>DOD OF P.O</th>
		<th>DOD OF S.O</th>
		<th>S.O Value</th>
		<th>P.O Value</th>

		
    </tr>
    </thead>
<?php

@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_purchase_order_hdr where status='A'  ";

	 	
		  if($po_no!=''){
	  	 	$queryy.=" and refno = '$po_no'";

		  }
		  
		  if($customer_name!=''){
	  	 	$queryy.=" and vendor_id = '$customer_name'";

		  }
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and delivery_date >='$fdate1' and delivery_date <='$todate1' ";
		}		  
		 $queryy.=" order by purchase_order_id desc ";
		 
		}
if($Search==''){
		  $queryy="select * from tbl_purchase_order_hdr where status='A' order by purchase_order_id desc ";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){

	

?>

<tr>	<?php						

							$Query=$this->db->query("select * from tbl_product_stock where product_id='$line->product_name'");
						    $fetchQ=$Query->row();?>
							
							<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->purchase_order_id; ?>"value="<?php echo $line->purchase_order_id?>" /></td>
							<td><?php echo $line->purchase_order_id;?></td>
							<td><?php echo $line->refno;?></td>
								<td style="width: 8%;"><?php echo $line->delivery_date;?></td>
								<td><?php 
								 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' and contact_id='$line->vendor_id'");
					 			 $contRow=$contQuery->row();
								
								echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></td> 
								
								<td><?php
								 $saleQuery=$this->db->query("select * from tbl_sales_ordernew_hdr where case_id='$line->case_id'");
					 			 $saleRow=$saleQuery->row();
								
								 echo $saleRow->ponew_no;?></td> 
								<td><?php echo $line->vendor_dod; ?></td> 
								<td><?php echo $saleRow->ponew_date; ?></td> 
								<td style="width: 8%;"><?php echo $saleRow->grand_total; ?></td> 
								<td style="width: 8%;"><?php echo $line->grand_total; ?></td> 
								
								
								

    </tr>

<?php
$i++;
$sum = $sum + $saleRow->grand_total;
 } ?>
 <input type="hidden" name="g_total" id="g_total1" class="form-control" value="<?php echo $sum;?>" readonly /></th>   
</table>
</form>
<script>
var id=document.getElementById("g_total1").value;
document.getElementById("g_total").value = id;
//alert(id);
</script>

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

    <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>/assets/js/sb-admin.js"></script>
    <script>

    $(document).ready(function() {

        $('#dataTables-example').dataTable();

    });

    </script>

</body>
</html>