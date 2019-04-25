<?php

//include("includes/include.inc.php"); 

//protect_admin_page();

$tableName="tbl_product_stock";

$location="all_product_function";

$_GET['id']!=''

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




<script>
function getCid(pnm,pr,pp,u,qty,disc,purprice)

 {	

		            window.close();
					//alert(pnm);
					var explode=pnm.split("^");
					var proid=explode[1];
					//alert(proid);
					
					window.opener.document.getElementById("all").value=1;
					window.opener.document.getElementById("productid").value=proid;
					window.opener.document.getElementById("qn").value=1;
					window.opener.document.getElementById("desss").innerHTML=disc;
					window.opener.document.getElementById("lpr").innerHTML=pr;
					window.opener.document.getElementById("purchasepid").value=purprice;
					window.opener.document.getElementById("lph").value=pr;
					window.opener.document.getElementById("usunit").value=pp;

					window.opener.document.getElementById("spid").value='d1';

				   

					window.opener.document.getElementById("tpr").innerHTML=pr;

                    window.opener.document.getElementById("tph").value=pr;

					window.opener.document.getElementById("np").innerHTML=pr;

                    window.opener.document.getElementById("nph").value=pr;

					window.opener.document.getElementById("prd").value=pnm;

					window.opener.document.getElementById("lph").focus();

window.opener.document.getElementById("ef").value=1;

var ddid=window.opener.document.getElementById("d");



ddid.id=window.opener.document.getElementById("spid").value;



//document.getElementByName("did").value=document.getElementById("spid").value;



//alert(ddid.id);

ddid.value=pnm;

 window.opener.document.getElementById("useunit").value=u;		

try

{

// window.opener.document.getElementById("abqt").value=q;

window.opener.document.getElementById("abqt").value=qty;
}

catch(exception){ 
}

finally {

   window.close();

}
	}
</script>



</head>



<body>



<div class="wrapper"><!--header close-->

<div class="clear"></div>

<div class="table-row">

<div class="title">

<h1>Send Information</h1> 
</div>


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
<?php
$SOQuery=$this->db->query("select *from tbl_sales_ordernew_hdr where purchase_order_id='$line->order_id' and send_status='Sent'");
$getSO=$SOQuery->row();
?>
<form method="post" action="<?=base_url();?>master/Letterhead/send_mail_functionss">
<div id="container">
<div class="table-row" style="text-align: center;">
<label>Cc</label>
<input type="email" name="ccemail" value="" />
<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
</div>
<center><label><input type="submit" class="submit" name="send" value="Send" /></label></center>
</div>

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

