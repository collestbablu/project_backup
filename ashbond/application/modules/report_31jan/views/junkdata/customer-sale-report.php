<?php 
error_reporting (E_ALL ^ E_NOTICE);
$tableName="tbl_invoice_dtl";
?>
<head>
<title>Welcome to CRM</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
<?php //include('includes/sidebar.php') ?>

<div class="container-left"><!--left-menu close-->



</div><!--container-left close-->




<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">

<div class="title">

<h1>Customer Sales Report </h1> 

<div class="actions">

<div class="blogroll">	</div>

</div><!--actions close-->





<div class="search-row-to">


</div><!--search-row-to close-->



<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">
<form method="get" action ="">
<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Search Product Sale Report </b></th>        
</tr>
</thead>
<tr>
<td width="19%" class="text-r">
Product Name:</td>
 <td width="33%"><input type="text" name="productname" value="" /></td>

 <td class="text-r">Customer Name:</td>

    <td><select name="company_name">
    
    
    <option value="">--Select--</option>

<?php
 $contactQuery=$this->db->query("select *from tbl_contact_m");

foreach(@$contactQuery->result() as $result){

//@extract($contactFetch);

?>





<option value="<?php echo $result->contact_id ;?>"><?php echo $result->first_name." ".$result->last_name;?> </option>



<?php }?>

</select>
    
    </td>        

 <tr>
 <tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded" value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
	
</tr>

	
	
<td class="text-r">Total:-</td>
    <td ><input type="text" name="tol1" id="tol1" value="<?php  ?>" /></td>
    <td class="text-r"></td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>
<a href="print_customer_sale_report<?php echo $_SERVER['REQUEST_URI'];?>"  target="_blank" class="submit"><strong>Print</strong></a>&nbsp; | <a href=
"export_csv_customer_sale_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

      
<th>Date</th>
<th>Invoice Detail Id</th>
<th>Product Code</th>
<th>Product Name</th>

<th>Customer Name</th>

<th>Rate Per Piece</th>
      

		<th>Sale</th>
<th>Amount</th>

	<!--<th>Unit In Stock</th>-->
	



    </tr>
    </thead>
	<?php
	@extract($_GET);

if($Search!='')
	{
	
	     $queryy="select * from tbl_invoice_dtl where status='A'";
		
		 if($productname!='') 
		
		{
		$productName = array();
		
		
		$quw=$this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
			foreach($quw->result() as $resultp){
			
		   $productName[]=$resultp->Product_id;
		  
		  }
		  $productId45 = implode(',', $productName);
		  
		 $queryy.=" and productid in ($productId45)"; 
		
		 
	   }
	


		
		   if($company_name!='')


  {
  
  

  $sql00=$this->db->query("select * from tbl_invoice_hdr where contactid = '$company_name'");
  
			$result2=$sql00->row();
			$ress=$result2->invoiceid;
			$queryy.=" and invoiceid = '$ress'";
  
          
     //$queryy;
}
if($fdate!='')
		{
			
		
			$todate=explode("/",$_REQUEST['todate']);
			$fdate=explode("/",$_REQUEST['fdate']);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . " and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
		
	}
		if($Search=='')
	   {	   
	     $queryy="select * from tbl_invoice_dtl where status='A'";
		 }
		 
	$result=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	$m =0;
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
   
     <td><?php
					  //contact query
					// echo "select *from tbl_invoice_hdr where invoiceid = $invoiceid";
					$contactQuery14=$this->db->query("select *from tbl_invoice_hdr where invoiceid = '$line->invoiceid'");
					   $contactFetch14=$contactQuery14->row();
					   
					   
					    
					   echo $contactFetch14->due_date; 
					   ?>
					   
					  </td>
  
   
	<td><?php echo $line->invoiceid;?></td>
		<td><?php 
				
			$quer22=$this->db->query("select * from tbl_product_serial where product_id = '$line->productid' ");
			$quer223=$quer22->row();
		echo $quer223->serial_code;?></td>
	
	<td><?php
	

	$contactQuery12=$this->db->query("select * from tbl_product_stock where Product_id='$line->productid'");
					   $contactFetch12=$contactQuery12->row();
					   ?>
		<?php echo $contactFetch12->productname;?>  </td>

  <td><?php 
  
					   
					   
				   	   $contactQuery11=$this->db->query("select *from tbl_contact_m where contact_id='$contactFetch14->contactid'");
					   $contactFetch11=$contactQuery11->row();
					   
					   
					    
					   echo $contactFetch11->first_name." ".$contactFetch11->last_name;
					   ?>
					   
					  </td>
	 
<td><?php 
  
				   
					   
				   	   
					   
					   
					    
					   echo $line->list_price;?>
					   
					  </td>

	<td><?php echo $line->qty ;?></td>
	<td><?php echo $qt = $line->qty*$line->list_price ;
	  $m=$m + $qt;  
	?>
	</td>



    </tr>

	<?php } ?>

	   
	   
	   <input type="hidden" name="tol" id="tol" value="<?php echo $m; ?>" />
	   
	       

</table>
<script>

var seltol = document.getElementById('tol').value;
document.getElementById('tol1').value = seltol; 
</script>
</form>
<!--bordered close-->

<div class="clear"></div>

</div><!--table-row close-->



</div><!--div close-->

</div><!--container close-->



</div><!--paging-right close-->

</div><!--paging-row close-->

<!--paging-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->

</div><!--container close-->



<div class="clear"></div><!--footer--row close-->

<?php //include('includes/footer.php') ?>



</div><!--wrapper close-->

<!--Scroll js-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="js/jquery.dragscroll.js"></script>

<script>

		$(document).ready(function() { 

			$('#container').dragScroll({});

		});

	</script>

    <script type="text/javascript">



  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-36251023-1']);

  _gaq.push(['_setDomainName', 'jqueryscript.net']);

  _gaq.push(['_trackPageview']);



  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();



</script>

<!--Scroll js close-->



<!--left-menu-js-->

<script src="js/menu-js/jquery.min.js"></script>

<script src="js/menu-js/bootstrap.min.js"></script>

<script src="js/menu-js/metisMenu.min.js"></script>



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

<!--left-menu-js-close-->



 <!-- Page-Level Plugin Scripts - Tables -->



    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>



    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>



    <!-- SB Admin Scripts - Include with every page -->



    <script src="js/sb-admin.js"></script>



    <!-- Page-Level Demo Scripts - Tables - Use for reference -->



    <script>



    $(document).ready(function() {



        $('#dataTables-example').dataTable();



    });



    </script>



</body>

</html>

