<?php

//include("includes/include.inc.php"); 

//protect_admin_page();

$tableName="tbl_product_stock";

$location="all_product_function";

if($_GET['id']!='')



{



$this->db->query("delete from $tableName");



}





	if($_POST['submit']=='Active'){



	trim(@extract($_POST));



	if(is_array($cid)){



	$mem_id=implode(',',$cid);



	}else{



	$mem_id=$cid;



	}



	if(count($cid)>1){



	



	$sql="update $tableName set status='Active' where product_id in ($mem_id)";



	$res=$this->db->query($sql) or die(mysql_error());



	$_SESSION['SESS_MSG']=count($cid).' Records Activated';



	header("Location: $location");



	}else{



	$sql="update $tableName set status='Active' where product_id='$mem_id'";



	$res=$this->db->query($sql) or die(mysql_error());



	$_SESSION['SESS_MSG']=count($cid).' Records Activated';



	header("Location: $location");



	exit;



 	}



 }



if($_POST['submit']=='Inactive'){



	@extract($_POST);



	if(is_array($cid)){



	$mem_id=implode(',',$cid);



	}else{



	$mem_id=$cid;



	}



	if(count($cid)>1){



	



	$sql="update $tableName set status='Inactive' where product_id in ($mem_id)";



	$res=$this->db->query($sql) or die(mysql_error());



	$_SESSION['SESS_MSG']=count($cid).' Records Inactivated';



	header("Location: $location");



	}else{



	$sql="update $tableName set status='Inactive' where product_id='$mem_id'";



	$res=$this->db->query($sql) or die(mysql_error());



	$_SESSION['SESS_MSG']=count($cid).' Records Inactivated';



	header("Location: $location");



	exit;



 	}



 }







if($_POST['submit']=='Delete')



{



 	@extract($_POST);



	if(is_array($cid))



	{



		$mem_id=implode(',',$cid);



	}



	else



	{



		$mem_id=$cid;



	}



	if(count($cid)>1)



	{



			$sql="delete from $tableName  where product_id	 in ($mem_id)";



		



	}



	else



	{



		$sql="delete from $tableName where product_id='$mem_id'";



	}



	



	$res=$this->db->query($sql) or die(mysql_error());



	$_SESSION['SESS_MSG']=count($cid).' Records Deleted';



	header("Location: manage-company.php");



	exit;



}



 if($_GET['id']!=''){



  	$sql2="select * from $tableName ";



	$res12=$this->db->query($sql2) or die(mysql_error());



	$line=$res12->row();



	@extract($line);



	



 }







$start = intval($start);



$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;



$columns = "select * ";



$sql = "from $tableName  ";



//$sql = apply_filter($sql, $last_name, $phone_name_filter,'last_name');



$order_by == '' ? $order_by = 'product_id' : true;



$order_by2 == '' ? $order_by2 = 'asc' : true;



$sql .= "order by $order_by $order_by2 ";



$sql_count = "select count(*) ".$sql; 



$sql .= "limit $start, $pagesize ";



 $sql = $columns.$sql;



//print $sql;	

//$sql=$this->db->query($sql);

//$result =$sql->row();



//$reccnt = db_scalar($sql_count);



if($reccnt==0)



{



$_SESSION['SESS_MSG']='No Records Found';



}



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







function getCid(pnm,pr,pp,u,qty)

 {	

		            window.close();

						var pid=pnm.split("^");
		  				var pids=pid[1];
						
					window.opener.document.getElementById("all").value=1;

					window.opener.document.getElementById("qn").value=1;

					window.opener.document.getElementById("lpr").innerHTML=pr;

					window.opener.document.getElementById("lph").value=pr;

					window.opener.document.getElementById("spid").value='d1';

				   

					window.opener.document.getElementById("tpr").innerHTML=pr;

                    window.opener.document.getElementById("tph").value=pr;

					window.opener.document.getElementById("np").innerHTML=pr;

                    window.opener.document.getElementById("nph").value=pr;

					window.opener.document.getElementById("prd").value=pnm;
					
					
					window.opener.document.getElementById("productid").value=pids;

					

                 

				window.opener.document.getElementById("qn").focus();







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

<div class="title">

<h1>Product List</h1> 



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

        <th><input type="checkbox"></th>        

        <th>Product Code</th>

                                            <!--<th>Product Type</th>-->

                                            <!--<th>Manufacturer</th>-->                                       

                                            <th>Product No</th>

                                 <th style="width: 100px;">Sale Price</th>

                                           

        <!--<th style="width: 100px;">Action</th>-->

		

    </tr>

    </thead>

    <!--<tr>

      <td><input type="checkbox"></td>  

        <td><input type="text" name="product_code" class="input-small"></td>

		<td><input type="text" name="Product_typeid" class="input-small"></td>

		<td><input type="text"  name="manufacturer_id" class="input-small"></td>

        <td><input type="text" name="productname" class="input-small"></td>

		<td><input type="text" name="Description" class="input-small"></td>

		<td><input type="text" name="serialno" class="input-small"></td>

        	<td><input type="text" name="partno" class="input-small"></td>

		<td><input type="text" name="vendorid" class="input-small"></td>

      

		<td><input type="text" name="qtyperunit" class="input-small"></td>

        <!--<td><input type="submit" class="submit" name="Search" value="Search" /></td>-->

    

   </form>

	<?php
				  extract($_POST);


	if($Search!='')

	  {

		  $queryy="select * from $tableName where status='A'   and comp_id = '".$this->session->userdata('comp_id')."'";

		    if($product_code!='')
		  {
		  		  	$queryy.=" and product_code like '%$product_code%'";

		  }
		
 if($manufacturer_id!='')
		  {

 				   $selectqq12=$this->db->query("select * from dizypro_manufacturer_m where manufacturer_name like  '%$manufacturer_id%'");

					$selectF12=$selectqq12->row();
					@extract($selectF12);

		  		  	  //echo "hi".$manufacturer_name;		  
		  		  	$queryy.=" and manufacturer_id like '%$manufacturer_id%'";

		  }

 if($productname!='')

		  {

		  		  	$queryy.=" and productname like '%$productname%'";

		  }

 if($Description!='')

		  {

		  		  	$queryy.=" and Description like '%$Description%'";
		  }

 if($serialno!='')

		  {

		  		  	$queryy.=" and serialno like '%$serialno%'";

		  }

 if($partno!='')

		  {

		  		  	$queryy.=" and partno like '%$partno%'";
		  }

 if($vendorid!='')

     	  {

			 		$selectqq12=$this->db->query("select * from tbl_vendor_mst  where vendorname like '%$vendorid%'");

					$selectF12=$selectqq12->row();

					@extract($selectF12);

		  		  	// echo "hi".$vendorname;
		  		  	$queryy.=" and vendorid like '%$vendorid%'";

		  }

 if($qtyperunit!='')

		  {

		  		  	$queryy.=" and qtyperunit like '%$qtyperunit%'";

		  }

		   if($Product_typeid!='')
		  {

				   $selectqq12=$this->db->query("select * from tbl_producttype_m where categoryName = '$Product_typeid'");

					$selectF12=$selectqq12->row();

					@extract($selectF12);

		  		  	 //echo "hi".$categoryName;

					//@extract($queryy11);
		  		  	$queryy.=" and Product_typeid like '%$Product_typeid%'";

		  }

}

if($Search=='')

	  {
//		  $queryy="select *from $tableName where type='product'  and comp_id = '".$_SESSION['SESS_COMPANY']."'";

	//echo "select *from $tableName where status='A'  and comp_id = '".$_SESSION['SESS_COMPANY']."' and Product_id in(select Product_id from dizypro_product_serial where location_id in(select id from dizyporo_location where branch_id='".$_SESSION['SESS_Branch']."' ))";die;
			
		  $queryy="select * from $tableName where status='A' ";

	//echo $queryy;
			}	
		  $result=$this->db->query($queryy);
					//echo $queryy;
   $i=$start;

   foreach($result->result() as $line){

   $i++;

   if($i%2!=0){
   	$color='#ECE9D8';

   }else{

   	$color='#F1FEFD';
   }
   //@extract($line);

$product_det1 = $this->db->query("Select * from tbl_master_data where serial_number= '$usageunit'");

										 	$prod_Details1 =$product_det1->row();

	$usunit=$prod_Details1->keyvalue;			


$squry=$this->db->query("select * from tbl_product_serial where product_id='$Product_id' and location_id in(select id from tbl_location where branch_id='".$this->session->userdata('brnh_id')."' and status='A')");

$squryF=$squry->row();	
										

   ?>

  <tr>

   <td><input type="radio" id="cid[]" value="<?php echo $location?>?id=<?php echo $line->Product_id?>" onclick="getCid('<?php echo $line->productname."^".$line->Product_id;?>','<?php echo $line->unitprice_sale;?>','<?php echo $line->unitprice_purchase;?>','<?php echo $usunit->usunit;?>','<?php echo $squryF->quantity; ?>')" name="p" /></td>

    <td><?php echo $line->product_code; ?></td>

                                         <?php $product_det = $this->db->query("Select categoryName from tbl_producttype_m where Product_typeid = '$Product_typeid'");

										 	$prod_Details =$product_det->row();

										  ?>

                                          <?php /*?><td><?php echo $prod_Details['categoryName']; ?></td><?php */?>

<?php $manuf_det = $this->db->query("Select keyvalue from  tbl_master_data where serial_number = '$manufacturer_id'");

$manuf_detail = $manuf_det->row();	?>

<?php /*?><td><?php echo $manuf_detail['keyvalue']; ?></td><?php */?>

                                            <td><?php echo $line->productname; ?></td>

                                             <td><?php echo $line->unitprice_sale; ?></td>

                                             </tr>

	<?php } ?>

	      

</table></form>

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

