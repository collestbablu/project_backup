<?php
//$tableName="tbl_purchase_order_hdr";
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
<h1>All PRODUCT  REPORT </h1> 
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
<th colspan="4"><b>Search All Product  Report </b></th>        
</tr>
</thead>
<td width="19%" class="text-r">Product Name:</td>
<td width="29%"><select name="product_name" style="width:200px;" class="rounded" >
					<option value="">--select--</option>
					 <?php
					 
					 $stockQuery=$this->db->query("select * from tbl_product_stock ");
					 foreach($stockQuery->result() as $stockRow)
					{
					  ?>
					  
						<option value="<?php echo $stockRow->Product_id; ?>"><?php echo $stockRow->productname; ?></option>
						<?php } ?>
					</select></td>
					
<td width="19%" class="text-r">Status</td>
<td width="29%">
		<select name="Status_name" style="width:150px;" class="rounded" >
			<option value="">--select--</option>								  
				<option value="Quotation">Quotation</option>
                <option value="Purchase_order">Purchase Order</option>
                <option value="Sales_order">Sales Order</option>
		</select>
</td>
</tr>  
<tr>
	<td class="text-r" >&nbsp;</td>
	<td>&nbsp;</td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>

<a href="print_part_purduction_report<?php echo $_SERVER['REQUEST_URI'];?>" target="_blank" class="submit"><strong>Print</strong></a>&nbsp;  <a href="export_part_purduction_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>

<div class="table-row">
<!--<center><h3>PRODUCT BY REPORT</h3></center>-->
<table class="bordered" id="dataTables-example">
    <thead>
    <tr>
		<th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th> 
		<th>Date.</th>   
		<th>Customer / Vendor Name</th>  
		<th>Product Name</th>   
		<th>Description</th>
		<th>Remarks</th>
		<th>Subject</th>
		<th>Ref.No.</th>
		<th>Price</th>
		<th>Status</th>
    </tr>
    </thead>
<?php

@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_quotation_dtl where status='A'";
	   
	   $queryyone="select * from tbl_purchase_order_dtl where status='A'";
	   
	   $queryytwo="select * from tbl_sales_ordernew_dtl where status='A'";
	 	
		  if($product_name!=''){
	  	 		
				$queryy.=" and product_id = '$product_name'";
				
				$queryyone.=" and product_id = '$product_name'";
				
				$queryytwo.=" and product_id = '$product_name'";

		  }
		  
		  if($Status_name=='Quotation'){
		  
	  	 		$queryy.=" and report_status = 'A'";	
				$queryyone.=" and report_status = 'NoResult'";		
		  		$queryytwo.=" and report_status = 'NoResult'";
		  }
		 
		  
		  if($Status_name=='Purchase_order'){
		  			
			$queryy.=" and report_status = 'NoResult'";	
			$queryyone.=" and report_status = 'A'";		
		  	$queryytwo.=" and report_status = 'NoResult'";
			
		  }
		  
		  if($Status_name=='Sales_order'){
		  
			$queryy.=" and report_status = 'NoResult'";	
			$queryyone.=" and report_status = 'NoResult'";		
		  	$queryytwo.=" and report_status = 'A'";

		  }
		  
		}
if($Search==''){
	
	$queryy="select * from tbl_quotation_dtl where status='A' order by quotation_id_dtl desc";
	
	$queryyone="select * from tbl_purchase_order_dtl where status='A' order by purchase_order_dtl_id desc";
	   
	$queryytwo="select * from tbl_sales_ordernew_dtl where status='A' order by purchase_order_dtl_id desc";
}		

 	$result=$this->db->query($queryy);   
   foreach(@$result->result() as $line){

?>

		<tr>						
							<?php						
							$Query=$this->db->query("select * from tbl_quotation_hdr where quotation_id_hdr='$line->quotation_id'");
						    $fetchQ=$Query->row();?>
							
							<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" value="<?php echo $line->quotation_id_dtl?>" /></td>
							<td style="width:80px;"><?php echo $line->author_date;?></td>
							<td style="width:180px;">
							<?php 
                                $sql = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ->vendor_id'");
                                $linecategory=$sql->row();		
                            ?>
                            <?php echo $linecategory->first_name;?>
                            </td>
							<td>
							  <?php $productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->product_id'");
                              $getProduct=$productQuery->row();
                              ?>
                              <?php echo $getProduct->productname;?>
                              </td>
							<td style="width: 250px;"><?php echo $line->description; ?></td> 
								
							<td><?php echo $fetchQ->remark;?></td> 
							<td><?php echo $fetchQ->subject; ?></td> 
							<td><?php echo $fetchQ->refno; ?></td> 
							<td style="width: 6%;"><?php echo $line->list_price; ?></td> 
							<td style="width: 6%;"><?php echo "Quotation"; ?></td> 			
								
    	</tr>

<?php } ?>
<?php
  
   $resultone=$this->db->query($queryyone); 
   foreach(@$resultone->result() as $fetch_list){

?>

		<tr>						
							<?php						
							$Query2=$this->db->query("select * from tbl_purchase_order_hdr where purchase_order_id='$fetch_list->purchase_order_hdr_id'");
						    $fetchQ2=$Query2->row();?>
							
							<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" value="<?php echo $fetch_list->purchase_order_dtl_id?>" /></td>
							<td style="width:80px;"><?php echo $fetch_list->author_date;?></td>
							<td style="width:180px;">
							<?php 
                                $sql2 = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ2->vendor_id'");
                                $linecategory2=$sql2->row();		
                            ?>
                            <?php echo $linecategory2->first_name;?>
                            </td>
							<td>
							  <?php $productQuery2=$this->db->query("select *from tbl_product_stock where Product_id='$fetch_list->product_id'");
                              $getProduct2=$productQuery2->row();
                              ?>
                              <?php echo $getProduct2->productname;?>
                              </td>
							<td style="width: 250px;"><?php echo $fetch_list->description; ?></td> 
								
							<td><?php echo $fetchQ2->remark;?></td> 
							<td><?php echo $fetchQ2->subject; ?></td> 
							<td><?php echo $fetchQ2->refno; ?></td> 
							<td style="width: 6%;"><?php echo $fetch_list->list_price; ?></td> 
							<td style="width: 6%;"><?php echo "Purchase Order"; ?></td> 			
								
    	</tr>
<?php } ?>

<?php
   $resulttwo=$this->db->query($queryytwo);
   foreach(@$resulttwo->result() as $fetch_data){

?>

		<tr>						
							<?php						
							$Query3=$this->db->query("select * from tbl_sales_ordernew_hdr where purchase_order_id='$fetch_data->purchase_order_hdr_id'");
						    $fetchQ3=$Query3->row();?>
							
							<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" value="<?php echo $fetch_data->purchase_order_dtl_id?>" /></td>
							<td style="width:80px;"><?php echo $fetch_data->author_date;?></td>
							<td style="width:180px;">
							<?php 
                                $sql3 = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ3->vendor_id'");
                                $linecategory3=$sql3->row();		
                            ?>
                            <?php echo $linecategory3->first_name;?>
                            </td>
							<td>
							  <?php $productQuery3=$this->db->query("select * from tbl_product_stock where Product_id='$fetch_data->product_id'");
                              $getProduct3=$productQuery3->row();
                              ?>
                              <?php echo $getProduct3->productname;?>
                              </td>
							<td style="width: 250px;"><?php echo $fetch_data->description; ?></td> 
								
							<td><?php echo $fetchQ3->remark;?></td> 
							<td><?php echo $fetchQ3->subject; ?></td> 
							<td><?php echo $fetchQ3->refno; ?></td> 
							<td style="width: 6%;"><?php echo $fetch_data->list_price; ?></td> 
							<td style="width: 6%;"><?php echo "Sales Order"; ?></td> 			
								
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