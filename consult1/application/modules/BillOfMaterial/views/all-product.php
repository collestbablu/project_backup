<?php

$tableName="tbl_product_stock";

$location="all_product_function";

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
						
					window.opener.document.getElementById("prd").value=pnm;
					window.opener.document.getElementById("usunit").value=u;	
					window.opener.document.getElementById("all").value=1;

					window.opener.document.getElementById("qn").value=1;
				
					window.opener.document.getElementById("spid").value='d1';
			
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

<h1>Item List</h1> 



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

                                            <th>Raw Material Name</th>

                                 <th style="width: 100px;">Purchase Price</th>

                                           

        <!--<th style="width: 100px;">Action</th>-->

		

    </tr>

    </thead>

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
			
		  $queryy="select * from $tableName where status='A' and Product_typeid='row_material'";

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

$product_det1 = $this->db->query("Select * from tbl_master_data where serial_number= '$line->usageunit'");

										 	$prod_Details1 =$product_det1->row();

	$usunit=$prod_Details1->keyvalue;			


$squry=$this->db->query("select * from tbl_product_serial where product_id='$Product_id' and location_id in(select id from tbl_location where branch_id='".$this->session->userdata('brnh_id')."' and status='A')");

$squryF=$squry->row();	
										

   ?>

  <tr>

   <td><input type="radio" id="cid[]" value="<?php echo $location?>?id=<?php echo $line->Product_id?>" onclick="getCid('<?php echo $line->productname."^".$line->Product_id;?>','<?php echo $line->unitprice_sale;?>','<?php echo $line->unitprice_purchase;?>','<?php echo $usunit;?>','<?php echo $squryF->quantity; ?>')" name="p" /></td>

    <td><?php echo $line->Product_id; ?></td>

                                         <?php $product_det = $this->db->query("Select categoryName from tbl_producttype_m where Product_typeid = '$Product_typeid'");

										 	$prod_Details =$product_det->row();

										  ?>

                                          <?php /*?><td><?php echo $prod_Details['categoryName']; ?></td><?php */?>

<?php $manuf_det = $this->db->query("Select keyvalue from  tbl_master_data where serial_number = '$manufacturer_id'");

$manuf_detail = $manuf_det->row();	?>

<?php /*?><td><?php echo $manuf_detail['keyvalue']; ?></td><?php */?>

                                            <td><?php echo $line->productname; ?></td>

                                             <td><?php echo $line->unitprice_purchase; ?></td>

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
</body>
</html>

