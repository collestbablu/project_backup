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
<h1>SALE ORDER </h1> 
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
<th colspan="4"><b>Search Sale Order </b></th>        
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
						<option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$row->contact_id){?> selected="selected" <?php }?>>
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
    <td class="text-r" align="right"></td>
	<td> 
	</td>
	<td class="text-r">&nbsp;</td>
	
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>

<a href="print_customer_sale_product_report<?php echo $_SERVER['REQUEST_URI'];?>" target="_blank" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export_csv_customer_sale_product_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>

<div class="table-row">
<table class="bordered"id="dataTables-example">
    <thead>
    <tr>
		<th>Sl. No.</th>   
		<th>Sale Order No.</th>
		<th>Sale Order Date</th>
		<th>Customer</th>
		<th>Description</th>
		<th>Amount</th>
		<th>GST</th>
		<th>Total Amount</th>
    </tr>
    </thead>
<?php

@extract($_GET);

if(@$Search!=''){

	  $queryy="select * from tbl_sales_ordernew_hdr where status='A'";

	 	 if($contact_id!=''){
		
	  	$queryy.=" and vendor_id ='$contact_id'";

		  }
		 
		 if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and delivery_date >='$fdate1' and delivery_date <='$todate1'";
		}
		 
		}
if($Search==''){
		  $queryy="select * from tbl_sales_ordernew_hdr where status='A'";
}		

		  $result=$this->db->query($queryy);

		   $i=$start;

    $j=1;

    $srn=1;
   foreach(@$result->result() as $line){

	$i++;

  if($i%2!=0){

   	$color='#ECE9D8';

   }else{

   	$color='#F1FEFD';

   }

?>

													
<tr>	<?php						
							$Query=$this->db->query("select * from tbl_contact_m where contact_id='$line->vendor_id'");
						    $fetchQ=$Query->row();?>
							
								<td><?php echo $i;?></td>
								<td><?php echo $line->ponew_no;?></td> 
								<td><?php echo $line->delivery_date;?></td> 
								<td><?php echo $fetchQ->first_name;?></td> 
								<td><?php 
								$cateQuery=$this->db->query("select * from tbl_new_case where case_id='$line->case_id'");
								$categoryRow=$cateQuery->row();
								
								echo $categoryRow->category_name;
								
								?></td> 
								<td><?php //echo $line->scrap_weight;?></td>
								<td><?php //echo $line->scrap_weight;?></td>
								<td><?php echo $line->grand_total;?></td> 
								

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