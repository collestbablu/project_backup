<?php
$tableName="tbl_bill_of_material_hdr";
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
<h1>PART PRODUCTION  REPORT </h1> 
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
<th colspan="4"><b>Search Part Production  Report </b></th>        
</tr>
</thead>
<td width="19%" class="text-r">Product Name:</td>
<td width="29%"><select name="product_name" id="prdidd" class="rounded" >
					<option value="">--select--</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods'");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
					  
						<option value="<?php echo $contRow->Product_id; ?>">
						<?php echo $contRow->productname; ?></option>
						<?php } ?>
					</select></td>
					
					<td>&nbsp;</td>
					</tr>  
<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>


     <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded"  value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
 
</tr>
<tr>
 <td class="text-r">&nbsp;</td>
	<td>&nbsp;</td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>

<a href="print_part_purduction_report<?php echo $_SERVER['REQUEST_URI'];?>" target="_blank" class="submit"><strong>Print</strong></a>&nbsp; <a href="export_part_purduction_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>

<div class="table-row">
<table class="bordered"id="dataTables-example">
    <thead>
    <tr>
	<th>Sr. No.</th>  
	<th>Part Name</th> 
	<th>Production Planning</th>
	<th>Moulding</th>
	<th>Defeleshing Quantity</th>
	<th>Inspection</th>
	<th>Packing</th>
	<th>Sales Qty</th>
	<th>WIP</th>
    </tr>
    </thead>
<?php

@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_production_log where status='A' ";

	 	
		  if($product_name!=''){
	  	 $queryy.=" and p_id  = '$product_name'";

		  }
		  
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and date >='$fdate1' and date <='$todate1' ";
		}		  
		 
		 $queryy  = $queryy . "group by p_id";
		 
		}
if($Search==''){
		  $queryy="select * from tbl_production_log where status='A' group by p_id";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){

	

?>

<tr>	<?php						
							$Query=$this->db->query("select * from tbl_product_stock where product_id='$line->p_id'");
						    $fetchQ=$Query->row();
							
							
							$Query1=$this->db->query("select SUM(quantity) as Msum from tbl_production_log where p_id='$line->p_id' and stage='Moulding'");
						    $fetchQ1=$Query1->row();
							
							$Query2=$this->db->query("select SUM(quantity) as Dsum from tbl_production_log where p_id='$line->p_id' and stage='Defleshing'");
						    $fetchQ2=$Query2->row();
							$Query3=$this->db->query("select SUM(quantity) as Psum from tbl_production_log where p_id='$line->p_id' and stage='Packing'");
						    $fetchQ3=$Query3->row();
							
							$Query4=$this->db->query("select SUM(quantity) as Qsum from tbl_production_log where p_id='$line->p_id' and stage='QA'");
						    $fetchQ4=$Query4->row();
							
							$Query5=$this->db->query("select * from tbl_finish_goods_order where product_id='$line->p_id'");
						    $fetchQ5=$Query5->row();
							
							$Query6=$this->db->query("select * from tbl_product_stock  where Product_id='$line->p_id'");
						    $fetchQ6=$Query6->row();
							$Query7=$this->db->query("select * from tbl_bill_of_material_hdr  where product_name='$fetchQ6->sku_no'");
						    $fetchQ7=$Query7->row();
							
							
							foreach($Query5->result() as $fetchQ5)
							{
							
							$ttlqty=$ttlqty + $fetchQ5->qty;
							
							}
							
							?>
							
							
								<td><?php echo $i;?></td>
								<td><?php echo $fetchQ->productname;?></td>
								<td><?php echo $fetchQ7->quantity;?></td>
								<td><?php echo $fetchQ1->Msum;?></td> 
								<td><?php echo $fetchQ2->Dsum; ?></td> 
								<td><?php echo $fetchQ4->Qsum; ?></td> 
								<td><?php echo $fetchQ3->Psum; ?></td> 
								<td><?php echo $ttlqty; ?></td>
								<td><?php echo $fetchQ1->Msum - $fetchQ5->qty; ?></td> 
								

    </tr>

<?php
$i++;
$ttlqty=0;
 } ?>
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