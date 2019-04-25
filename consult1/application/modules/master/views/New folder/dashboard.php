<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php $this->load->view('title');?>
<link href="<?php echo base_url();?>assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jsapi.js"></script>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/bootstrap.min.css">
</head>

<body>

<div class="wrapper"><!--header close-->
 
<?php $this->load->view('sidebar');?>

<div class="container-left"><!--left-menu close-->

</div><!--container-left close-->

<div id="b2" class="right-colum" style="width:95%">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>
DASH BOARD LIST
</h1>
<!--
<div class="search-row-to">
<div class="search-row-l"><input type="text" readonly="readonly" placeholder="Search here..." required=""></div>
<div class="search-row-r"><button type="submit">Go</button>
</div>
</div><!--search-row-to close-->

</div>
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text" >

</div><!--two-colum-->


</div><!--two-colum-->

<!--two-colum close-->


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
<script src="<?php echo base_url();?>assets/js/jquery.dragscroll.js"></script>
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
<script src="<?php echo base_url();?>assets/js/menu-js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/menu-js/metisMenu.min.js"></script>

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

    <script src="<?php echo base_url();?>js/plugins/dataTables/jquery.dataTables.js"></script>

    <script src="<?php echo base_url();?>js/plugins/dataTables/dataTables.bootstrap.js"></script>



    <!-- SB Admin Scripts - Include with every page -->

    <script src="<?php echo base_url();?>js/sb-admin.js"></script>



    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script>

    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });

    $(document).ready(function() {
        $('#dataTables-example1').dataTable();
    });
    </script>

<script type="text/javascript">
   /* var theButton = document.getElementById('pursal');

    theButton.onclick = function() { 
        if(document.getElementById('divps').style.visibility='hidden'=true){
			document.getElementById('divps').style.visibility='visible';
		}else if(document.getElementById('divps').style.visibility='visible'=true){
			document.getElementById('divps').style.visibility='hidden';
		}   
    }*/

   function showhide(id)
     {
        var div = document.getElementById(id);
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "";
    }
     }


	 	 function hidealldiv(id1,id2,id3,id4)
     {
    var div1 = document.getElementById(id1);
    var div2 = document.getElementById(id2);
    var div3 = document.getElementById(id3);
	var div4 = document.getElementById(id4);
    if (div2.style.display !== "none" && div3.style.display !== "none" && div3.style.display !== "none" && div1.style.width != '100%') {
        div2.style.display = "none";
        div3.style.display = "none";
        div4.style.display = "none";
		
		
	  document.getElementById(id1).style.width = '100%';
    }
    else {
        div2.style.display = "block";
        div3.style.display = "block";
        div4.style.display = "block";
	  document.getElementById(id1).style.width = '47%';
    }
	 }




</script>

</body>
</html>
