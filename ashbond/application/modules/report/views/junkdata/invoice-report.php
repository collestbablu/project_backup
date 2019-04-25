<?php 
error_reporting (E_ALL ^ E_NOTICE);
$tableName="tbl_invoice_hdr";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script>
function tab(){
  document.getElementById("inc").focus();
}
</script>
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

<!--left-menu-js-close-->

<script>
function popupclose(){
window.close();
}
</script>
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
<div class="title">
<h1>Invoice Report </h1> 
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
<th colspan="4"><b>Search Lead Report </b></th>        
</tr>
</thead>
<tr>
<td width="19%" class="text-r">Invoice No.:</td>
 <td width="33%"><input type="text" id="inc" name="invoice_no" value="" /></td>
 <td width="19%" class="text-r">Customer Name</td>
 <td>
 	<select name="cutomer_name">
    	<option value="">--select--</option>
        <?php 
		$sql = $this->db->query("select * from tbl_contact_m where status = 'A' order by first_name asc");
		foreach($sql->result() as $sqlline){ ?>
			<option value="<?php echo $sqlline->contact_id;?>"><?php echo $sqlline->first_name;?></option>
        
        <?php } ?>
    </select>
 </td>
 </tr>
 <tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>


     <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded"  value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
 
</tr>
<tr>
<td class="text-r" align="right">Grand Total:</td>
<td ><input type="text" name="grand_total" value="" id = "tol1" /></td>
     <td class="text-r"></td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr> 
</table>
<a href="print_invoice_rep<?php echo $_SERVER['REQUEST_URI'];?>"  target="_blank" class="submit"><strong>Print</strong></a>&nbsp; | <a href="all_csv_invoice<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered" id="dataTables-example">
    <thead>
    <tr>
             
        <th>Invoice No</th>
		<th>Customer Name</th>
        <th>Invoice Date</th>
		<th>Service Tax</th>
		 <!-- <th>Balance</th>-->
		  <th>Grand Total</th>
    </tr>
    </thead>
	<?php
	  @extract($_GET);
	if(@$Search!=''){

 		$queryy="select * from $tableName where status='Invoice done'";
		    if($invoice_no!=''){
		  		  	$queryy.=" and invoiceid like '%$invoice_no%'";

		  }
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
	if($cutomer_name!='')
		{
			
			$queryy  = $queryy . "and contactid = '$cutomer_name'";
		}

 
}

if($Search=='')
	{
		$queryy="select * from $tableName where status='Invoice done'";
		}

		  @$result=$this->db->query($queryy);
   $i=$start;
    $j=1;
   foreach(@$result->result() as $line){
   $i++;
   if($i%2!=0){
   	$color='#ECE9D8';
   }else{
   	$color='#F1FEFD';
   }
   ?>
   <tr>
  
                    <td><?php echo $line->invoiceid;?></td>
					  <td><?php
					  
					   $contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->contactid'");
					   $contactFetch=$contactQuery->row();
					    echo $contactFetch->first_name." ".$contactFetch->last_name;
					   
					  ?></td>
					   <td><?php echo $line->invoice_date; ?></td>
					   <td><?php echo 			   
			     			number_format((float)$line->service_tax, 2, '.', '');
			   			?></td>
					   
                          <!--<td><?php //echo number_format((float)$line->balance_total, 2, '.', '');
						 ?></td>-->
						  <td><?php echo
						 $gg = number_format((float)$line->grand_total, 2, '.', '');
						 $tt = $tt +$gg;
						 ?></td>
             </td></tr>
<?php } ?>
 <input type = "hidden" value ="<?php  echo number_format((float)$tt, 2, '.', '');?>" id = "tol" />
		 <script>
		 var total = document.getElementById('tol').value;
		 
		 document.getElementById('tol1').value = total;
		 </script>  
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery.dragscroll.js"></script>
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
<!--left-menu-js-close-->

 <!-- Page-Level Plugin Scripts - Tables -->

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