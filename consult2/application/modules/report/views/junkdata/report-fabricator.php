<?php 
$tableName="tbl_production_dtl";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php $this->load->view('title'); ?>
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
<?php $this->load->view('sidebar'); ?>
<div class="container-left"><!--left-menu close-->
</div><!--container-left close-->
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>Product Fabricator Report </h1> 
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

<!--Fillteration part Start-->
<tr>
<th colspan="4"><b>Search Product Fabricator Report </b></th>        
</tr>
</thead>
<tr>
<td width="19%" class="text-r">
Product Name:</td>
 <td width="33%"><input type="text" name="productname" value="<?php if($_REQUEST['productname']!=''){echo $_REQUEST['productname'];}  ?>" /></td>
<td width="19%" class="text-r">
Cas No.:</td>
<td width="29%"><input type="text" name="casno" value="<?php if($_REQUEST['location']!=''){echo $_REQUEST['location'];}  ?>"/></td></tr>        
<tr>

<tr>
<td width="19%" class="text-r">
invoice Id:</td>
 <td width="33%"><input type="text" name="invoice" value="<?php if($_REQUEST['invoice']!=''){echo $_REQUEST['invoice'];}  ?>" /></td>
<td width="19%" class="text-r">
Fabricator</td>
<td width="29%"><input type="text" name="fabricator" value="<?php if($_REQUEST['fabricator']!=''){echo $_REQUEST['fabricator'];}  ?>" /></td></tr>        
<tr>

 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded" value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
</tr>
<tr>
    <td class="text-r"></td>
	<td></td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
<!--Fillteration part ended-->


</table>
<a href="print_fabricator_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Print</strong></a>&nbsp;  <a href="export_product_fabricator_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered" id="dataTables-example">
    <thead>
<!-- Report Coloum part Started-->	
	
<tr>
	<th>Date</th>
	<th>Invoice Id</th>
	<th>Fabricator Name</th>
	<th>Product Code</th>
   <th>Product Name</th>
    <th>Quantity</th>
    <th>Completed Quantity</th>
</tr>

<!-- Report Coloum part ended-->	

</thead>

<!--Report Genration  part started--> 
	<?php
	@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($productname!='') {
		$productname1=$this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
		$fetchproductname1=$productname1->row();
		@extract($fetchproductname1);
		$queryy.="and product_id like '$fetchproductname1->Product_id'";
		 }
		if($casno!=''){
		$ss =array();
	
		  	$industry_idQuery1=$this->db->query("select * from tbl_production_hdr where caseno like'%$casno%'");
        	foreach($industry_idQuery1->result() as $industryidFetch){
			
			
		
			$ss[]=$industryidFetch->invoiceid;
			$aa=implode(',',$ss);
		
			} 
     if($aa!=''){
		$queryy.=" and invoice_id in ($aa)";
	 }else{
		$queryy.=" and invoice_id in (NULL)";
		}
		}
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
		
		if($invoice!='')
	{
		$queryy.=" and invoice_id ='$invoice'";
	
	}
	if($fabricator!='')
	{
	$ee=array();
//echo	"select * from tbl_contact_m where status ='A' and group_name=9 and first_name like '%$fabricator%'";
	$slect1 = $this->db->query("select * from tbl_contact_m where status ='A' and group_name=9 and first_name like '%$fabricator%'");
		 $fect=$slect1->row();
		//echo "select * from tbl_production_hdr where fabricator='$fect->contact_id'";
		$Query12=$this->db->query("select * from tbl_production_hdr where fabricator='$fect->contact_id'"); 
						 
		foreach($Query12->result() as $fetchQ12){  
		$ee[]=$fetchQ12->invoiceid;
		
		 $feb=implode(',',$ee);	
		//print_r($ee);
		}
	if($feb!=''){	
	$queryy.=" and invoice_id in($feb)";
	}else{$queryy.=" and invoice_id in(NULL)";}
	
	}
		
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where status='A'";
	
	}
	
?>
 <!--Report Genration  part ended--> 
	
<?php 	
	
	$results=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	foreach($results->result() as $line){
	$i++;
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }
   
   ?>
   
<!--Report output part Start-->    
   <tr>
   
   
   
   
 	<td><?php echo $line->maker_date;?></td>
	<td><?php echo $line->invoice_id;?></td>
	<td><?php 
					  	
						  $Query1=$this->db->query("select * from tbl_production_hdr where invoiceid='$line->invoice_id'"); 
						  $fetchQ1=$Query1->row();		
					  //echo "select * from tbl_contact_m where contact_id='".$line->fabricator."'";die; 
					  	  $Query=$this->db->query("select * from tbl_contact_m where contact_id='$fetchQ1->fabricator'"); 
						$fetchQ=$Query->row();
					    echo $fetchQ->first_name; ?></td>
	
	<td><?php echo $line->product_id; ?></td>
	
<td><?php 
					   			 $QueryP=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
						$fetchQP=$QueryP->row();
					   		   echo $fetchQP->productname; ?></td>
		
		<td><?php echo $line->qnty;?></td>	
		<td><?php echo $line->quantity_ready;?></td>	
	
	 </tr>
	<?php } ?> 
	
 <!--Report output part Ended--> 	
	
	
	    
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

