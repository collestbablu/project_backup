<?php 


error_reporting (E_ALL ^ E_NOTICE);

$tableName="tbl_product_stock";

@extract($_POST);
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
<h1>Customer Payment Report</h1> 
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

<th colspan="4"><b>Product Reorder Report </b></th>        

</tr>



</thead>

 <td width="19%" class="text-r">Product Name:</td>

 <td width="33%"><input type="text" name="productname" value="<?php if($_REQUEST['productname']!=''){echo $_REQUEST['productname'];}  ?>" /></td>

<td width="19%" class="text-r">Product Code:</td>

<td width="29%"><input type="text" name="product_code" value="<?php if($_REQUEST['product_code']!=''){echo $_REQUEST['product_code'];}  ?>"/></td></tr>  

 <tr>

 <td class="text-r">Min Lable From</td>

	<td><input type="text"  name = "minfrom" /></td>



    <td class="text-r">Min Lable TO</td>

	<td><input type="text"  name = "minto" /></td>

</tr>
<tr>

 <td class="text-r">Max Lable From</td>

	<td><input type="text"  name = "maxfrom" /></td>



    <td class="text-r">Max Lable TO</td>

	<td><input type="text"  name = "maxto" /></td>

</tr>

 <tr>

 <td class="text-r">&nbsp;</td>

	<td>&nbsp;</td>



    <td class="text-r">&nbsp;</td>

	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>

</tr>

 

</table>

<a href="print-product-max.php<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export-csv-product-max.php<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>

<div class="table-row">

<table class="bordered"id="dataTables-example">



    <thead>







    <tr>



      

<th>Serial No:</th>

<th>Product Code</th>

        <th>Product Name</th>

        

        <th>Min lebel:</th>

<th>Max lebel:</th>

       

       



		<th>Quantity In Stock</th>



	<!--<th>Unit In Stock</th>-->

	





		



    </tr>



    </thead>



    



<?php

@extract($_POST);

if($Search!='')

{

	  $queryy="select * from $tableName where status='A' AND comp_id = '".$_SESSION['SESS_COMPANY']."'";



	 



  

		    if($productname!='')



		  {



		  



		  		  	$queryy.=" and productname like '%$productname%'";







		  }

		  
		if($minfrom!=''){
			
			
			$min =$minfrom;
			$max =$minto;
			
			$queryy.= " AND reorderlevelqty >= $min and reorderlevelqty <= $max";
			
			
			}
			if($maxfrom!=''){
			
			
			$min1 =$maxfrom;
			$max1 =$maxto;
			
			$queryy.= " AND maxorderlevelqty >= $min1 and maxorderlevelqty <= $max1";
			
			
			}
		


		   if($product_code!='')



		  {



		  



		  		  	$queryy.=" and product_code like '%$product_code%'";







		  }

		  

		 if($Productctg_id!='')



		  {



		  



		  		  	$queryy.=" and Productctg_id = '$Productctg_id'";







		  }

		   if($Product_typeid!='')



		  {



		  



		  		  	$queryy.=" and Product_typeid = '$Product_typeid'";







		  }

		  

   if($vendorid!='')



		  {


		  		  	$queryy.=" and vendorid = '$vendorid'";

		  }

		 if($fdate!='')



{
 $todate=explode("-",$_REQUEST['todate']);

$fdate=explode("-",$_REQUEST['fdate']);





//echo $todate[2];

    $todate1=$todate[0]."-".$todate[1]."-".$todate[2];
   $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];

   $queryy  = $queryy . "and makerdate >='$fdate1' and makerdate <='$todate1'";

}

}

		$result=$this->db->query($queryy);
			//echo $queryy;

		  

   $i=$start;



    $j=1;

    $srn=1;



foreach($result->result() as $line){


   $i++;

   if($i%2!=0){
 	$color='#ECE9D8';

   }else{
	$color='#F1FEFD';
 }
 @extract($line);
  ?>

<tr>

<td><?php echo $line->srn++;?></td>

<td><?php echo $line->product_code;?></td>

<td><?php echo $line->$productname;?></td>

<td><?php echo $line->reorderlevelqty; ?></td>

<td><?php echo $line->maxorderlevelqty;?></td>

<td><?php echo $line->qtyinstock; 

?></td>

           

    </tr>



	<?php } ?>



	       



</table>

</form>

<!--bordered close-->


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



