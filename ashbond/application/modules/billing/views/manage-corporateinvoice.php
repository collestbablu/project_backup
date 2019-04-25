<?php
$tableName='tbl_invoice_hdr';

if(@$_POST['del']!='')
{
	
require_once(APPPATH.'modules/billing/controllers/billing.php');
	$obj=new billing();
extract($_POST);
$CI =& get_instance();
if($cid!=''){
$obj->multipledele($cid);
}
}




 if($_GET['id']!=''){



  	$sql2="select * from $tableName where invoiceid='".$_GET['id']."'";



	$res12=$this->db->query($sql2);



	$line=$res12->row();



	@extract($line);
 }



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- input type shadow-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>

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

function getXMLHTTP() { //fuction to return the xml http object

var xmlhttp=false;

try{

xmlhttp=new XMLHttpRequest();

}

catch(e) {

try{

xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

}

catch(e){

try{

xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

}

catch(e1){

xmlhttp=false;

}

}

}



return xmlhttp;

}



function getCid(cid) {	

	

		var strURL="get_cid?cid="+cid;

		

		var req = getXMLHTTP();

		

		if (req) {

			

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {						

						document.getElementById('ciddiv').innerHTML=req.responseText;						

					} else {

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}

				

	}



</script>

<script>

function checkall(objForm)

{

	//alert(objForm);
getCid(this.value);
	var ele,len,i;

	ele= document.getElementsByTagName("input");

	len=ele.length;

	for(i=0;i<len;i++){

	if(ele[i].type=='checkbox'){

		ele[i].checked=objForm;

		}

	}

	

}



</script>

</head>



<body>
<form method="post">


<div class="wrapper"><!--header close-->

<div class="clear"></div>



<div class="container"> 


<?php if(@$_GET['popup']=='True') {

	} else { 



	$this->load->view('sidebar');



	  } ?>

<div class="container-left"><!--left-menu close-->



</div><!--container-left close-->

<?php //$season=$_GET['season'];?>

<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1><b></b>Invoice List</h1> 

<div class="actions">
<div class="blogroll">
<div id="ciddiv">
		<p>Actions <img src="<?php echo base_url();?>/assets/images/arrow.png" alt="" /></p>



		<ul>
        
		</ul>
   </div>
	</div>
</div><!--actions close-->


<div class="add">
<a href="billing_corporateInvoice_winter"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Invoice</a>
</div>



<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

       <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>    

        <th>Invoice No</th>
        <th>Invoice Date</th>
        <th>Customer Name</th>
        <th>Invoice Type</th>		
        <th>Grand Total</th>
        
        

        <th style="width:100px;">Action</th>

		

    </tr>

    </thead>

    <tr>

      <td><input type="checkbox"></td>   

         <td><input type="text" name="invoice_no" class="input-small"></td>

		<td><input type="date" name="invoice_date" class="input-small"></td>
        <td><input type="text" name="customer_name" class="input-small"></td>
        <td><input type="text" name="invoice_type" class="input-small"></td>
		
        <td><input type="text" name="balance_total" class="input-small"></td>
        
		<td><input type="submit" name="Search" value="Search" class="submit" /></td>


		
		

    </tr>

<?php

@extract($_POST);
if($Search!='')
{
  $queryy="select * from $tableName  where invoice_type='Invoice'";
	  
		    if($invoice_no!='')

		  {

		  

		  		  	$queryy.=" and invoiceid ='$invoice_no'";



		  }
		  
		   if($invoice_date!='')

		  {
		  

		  		  	$queryy.=" and invoice_date like '%$invoice_date%'";

		  }
		   if($customer_name!='')

		  {
		  	$sql1 = $this->db->query("select * from tbl_contact_m where first_name like '%$customer_name%'");
			$sql23 = $sql1->row();
			$contact_id = $sql23->contact_id;

		  		  	$queryy.=" and contactid = '$contact_id'";

		  }
 if($invoice_type!='')

		  {		  
		  		    $queryy.=" and tax_retail like '%$invoice_type%'";

		  }

		  

 if($service_tax!='')

		  {

		  

		  		  	$queryy.=" and service_tax like '%$service_tax%'";



		  }
 
 
  if($balance_total!='')

		  {

		  

		  		  	$queryy.=" and balance_total like '%$balance_total%'";



		  }
 
 
}
if($Search=='')



	  {

	 



		  $queryy="select * from $tableName where invoice_type='Invoice' order by invoiceid desc";
		  
		
	//echo $queryy;
	
			}	
 

		  $result10=$this->db->query($queryy);

		
					//echo $queryy;
		  
   $i=$start;

    $j=1;

   foreach($result10->result() as $line){



   $i++;



   if($i%2!=0){



   	$color='#ECE9D8';



   }else{



   	$color='#F1FEFD';



   }

   ?>

   <tr>

   <td><input name="cid[]" type="checkbox" id="cid[]" value="<?php echo $line->invoiceid?>" onclick="getCid(this.value)" /></td>

   

                       <td><?php echo 
					   $line->invoiceid;?></td>

					   <td><?php echo $line->invoice_date; ?></td>
                       <td><?php 
	$sql =$this->db->query("select * from tbl_contact_m where contact_id ='".$line->contactid."'");
	$resultname = $sql->row();
						echo $resultname->first_name;
					   ?></td>
                       <td><?php echo $line->tax_retail; ?></td>
                        <td><?php echo $line->grand_total;?></td>
                        
<td><a target="_blank" href="view_corporateinvoice?id=<?php echo $line->invoiceid ?>"><img src="<?php echo base_url();?>/assets/images/view.png" alt="v" border="0" class="icon" title="View"/></a><img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('edit_corporateinvoice_winter',1000,600,'id',<?php echo $line->invoiceid; ?>)" /><a href="delete_manage_corporateinvoice?id=<?php  echo $line->invoiceid ?>"> <img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('Are you sure you want to Delete. ?');" alt="" border="0" class="icon" title="Delete"/></a></td>
    </td></tr>
	<?php } ?>
</table>

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


<script src="<?php echo base_url();?>/assets/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->



    <script>



    $(document).ready(function() {



        $('#dataTables-example').dataTable();



    });



    </script>


</form>
</body>

</html>

