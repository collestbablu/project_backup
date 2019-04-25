
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

<div class="table-row">

<div class="title">

<div class="title">

<h1>Raw Materials</h1> 



<div class="actions">



</div><!--actions close-->





<!--<div class="add">

<a href="add-product.php"><img src="images/plus.png" alt="" border="0" /> Add Product</a>

</div>--><!--add close-->



<!--search-row-to close-->



<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<form method="post">

<table class="bordered" id="dataTables-example">

    <thead>



    <tr>

                

        <th>Raw Materials Name</th>

                                            <!--<th>Product Type</th>-->

                                                                                  

                                            <th>Quantity</th>
											<th>Unit</th>
											<th>Gross Weight</th>
											<th>Net Weight</th>
											<th>Runner</th>
											


                                           

        <!--<th style="width: 100px;">Action</th>-->

		

    </tr>

    </thead>

    

   </form>

	<?php if($_GET['show_row']!=''){
			
						$sql1 = $this->db->query("select * from tbl_template_dtl where template_hdr_id='".$_GET['show_row']."'");
					   			foreach($sql1->result() as $fetch){
								//echo "select * from tbl_product_stock where product_id='$fetch->product_id'"; 
								
							
							$Query=$this->db->query("select * from tbl_product_stock where product_id='$fetch->item_name'");
						    $fetchQ=$Query->row();
							
							
							$unitQuery=$this->db->query("select * from tbl_master_data where serial_number='$fetchQ->usageunit'");
						    $unitfetchQ=$unitQuery->row();
							?>
								<tr>
								<td><?php echo $fetchQ->productname;?></td>
								<td><?php echo $fetch->quentity;?></td> 
								<td><?php echo $unitfetchQ->keyvalue;?></td> 
								<td><?php echo $fetch->gross_weight;?>KG</td> 
								<td><?php echo $fetch->net_weight;?>KG</td> 
								<td><?php echo $fetch->scrap_weight;?>KG</td> 
								
								
						
								</tr>
							

<?php
$totalWeight=$totalWeight+$fetch->gross_weight;
$totalNeWeight=$totalNeWeight+$fetch->net_weight;
$totalScrapWeight=$totalScrapWeight+$fetch->scrap_weight
?>

  
	<?php } } ?>

	      
<tr>
<td>
</td>
<td>
</td>
<td></td>

<td><strong>Total:-<?php echo $totalWeight?>KG</strong>
</td>
<td><strong>Total:<?php echo $totalNeWeight;?>KG</strong>
</td>
<td><strong>Total:<?php echo $totalScrapWeight;?>KG</strong>
</td>


</tr>
</form>

<!--bordered close-->

<div class="clear"></div>

</div><!--table-row close-->



</div><!--div close-->

</div><!--container close-->



</div><!--paging-right close-->

</div><!--paging-row close-->

<!--paging-row close-->

</div>

<div class="container"> 

<?php // include('includes/sidebar.php') ?>

<div class="container-left"><!--left-menu close-->
</div><!--container-left close-->
<div id="b2" class="right-colum">

<div class="right-colum-text">

<!--container-right-text close-->

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

