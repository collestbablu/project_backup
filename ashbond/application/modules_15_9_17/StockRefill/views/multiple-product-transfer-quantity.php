
<?php

$location_id1='1';

extract($_POST);
if($save!=''){
$a=sizeof($product_id);
for($i=0; $i<$a; $i++){
if($new_quantity[$i]!='')
{
//$sts=sizeof($new_quantity);
/*if($new_quantity[$i]<=$quantity[$i]){*/
//echo $product_id[$i]."|";die;
//echo $new_quantity[$i];

		 $selectQuery = "select quantity from tbl_product_serial where product_id='$product_id[$i]' and location_id='$location_id1'";
		$selectQuery1=$this->db->query($selectQuery);

		 $num= $selectQuery1->num_rows();

		if($num >0)

		{	

		$secode=$product_id[$i]."_".$location_id1;
	
$this->db->query("update tbl_product_serial set quantity =quantity+$new_quantity[$i], serial_code='$secode', aval_status='Yes' where product_id='".$product_id[$i]."' and location_id='".$location_id1."'");

$p_Q=$this->db->query("update tbl_product_stock set quantity =quantity+$new_quantity[$i] where Product_id='".$product_id[$i]."' ");

 $sqlProdLoc1="insert into tbl_product_serial_log set quantity ='$new_quantity[$i]',location_id='$location_id1',product_id='$product_id[$i]', maker_date=NOW(), author_date=now(), author_id='".$this->session->userdata('user_id')."', maker_id='".$this->session->userdata('user_id')."', divn_id='".$this->session->userdata('divn_id')."', comp_id='".$this->session->userdata('comp_id')."', zone_id='".$this->session->userdata('zone_id')."', brnh_id='".$this->session->userdata('brnh_id')."',color='$color[$i]' ";
$this->db->query($sqlProdLoc1);



 		}else{
			$sqlProdLoc2="insert into tbl_product_serial set product_id='$product_id[$i]',serialno='$serialno', serial_code='$secode', aval_status='Yes', quantity ='$new_quantity[$i]', location_id='$location_id1', maker_date=NOW(), author_date=now(), author_id='".$this->session->userdata('user_id')."', maker_id='".$this->session->userdata('user_id')."', divn_id='".$this->session->userdata('divn_id')."', comp_id='".$this->session->userdata('comp_id')."', zone_id='".$this->session->userdata('zone_id')."', brnh_id='".$this->session->userdata('brnh_id')."',color='$color[$i]'"; 
$this->db->query($sqlProdLoc2);

 $this->db->query("update tbl_product_stock set quantity =quantity+$new_quantity[$i] where Product_id='".$product_id[$i]."' ");

 
$sqlProdLoc1="insert into tbl_product_serial_log set quantity ='$new_quantity[$i]',location_id='$location_id1',product_id='$product_id[$i]', maker_date=NOW(), author_date=now(), author_id='".$this->session->userdata('user_id')."', maker_id='".$this->session->userdata('user_id')."', divn_id='".$this->session->userdata('divn_id')."', comp_id='".$this->session->userdata('comp_id')."', zone_id='".$this->session->userdata('zone_id')."', brnh_id='".$this->session->userdata('brnh_id')."' ";
$this->db->query($sqlProdLoc1);
 
 
  			
				}

	 $lastHdrId=$this->db->insert_id();
		//echo $sqlProdLoc;



		/*}*/

}
}
//$lastHdrId=$this->db->insert_id();
			// echo $lastHdrId;die;
			// $rediectItem="itemChallan?id=".$lastHdrId;
?>
<script>
alert('Quantity Added Successfully ');
//window.location.href = "itemChallan?id=<?php echo $lastHdrId ?>";
</script>
<?php }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Welcome to CRM</title>

<link href="<?php echo base_url();?>assets/css/crm.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet" type="text/css" />



<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/metisMenu.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/demo.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/bootstrap.min.css">



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

<form method="post">


<div class="wrapper"><!--header close-->
<div class="clear"></div>

<div class="container"> 

<?php
$this->load->view('sidebar');

 ?>
<div class="container-left"><!--left-menu close-->

</div><!--container-left close-->

<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<div class="title">
<h1>Product List</h1> 
<div class="actions">

</div><!--actions close-->

<!--add close-->
<!--
<div class="search-row-to">
<div class="search-row-l"><input type="text" placeholder="Search here..." required=""></div>
<div class="search-row-r"><button type="submit">Go</button>
</div>
</div><!--search-row-to close-->

<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">
<form method="get">

<table class="bordered" id="dataTables-example" >
<div style="float:right;"><input name="save" type="submit" value="Save" class="submit" /> </div>
    <thead>
    

</br>    <tr>
<th style="display:none;"><input type="checkbox" /></th>   
        <th>Location</th>        

       

                                            

                                            <th>Category Name</th>                                     

                                            <th>Product Name</th>
<th style="display:none;">Color</th>
                                 <th>New Quantity</th>
								  <th>Total Quantity</th>


                                           

        <!--<th style="width: 100px;">Action</th>-->

		

    </tr>
    </thead>

    

   
<?php
	$seQu=$this->db->query("select * from tbl_product_stock where status='A'");
$i=1;
foreach($seQu->result() as $fetch){


	  $rp = "SELECT * FROM tbl_product_serial WHERE Product_id ='".$Product_id."' and  comp_id='".$this->session->userdata('comp_id')."' and location_id='".$location_id1."'"; 
		  $leadSourceQuery=$this->db->query($rp);

  $leadSourceRow=$leadSourceQuery -> row();
 		
			$industry_idQuery=$this->db->query("select * from tbl_location where status='A' and comp_id = '".$this->session->userdata('comp_id')."' limit 0,1");

		$industry_idFetch=$industry_idQuery -> row();	
		

	 $fetchschool="select *from tbl_prodcatg_mst where prodcatg_id='$fetch->category'";
 $fetchschool2=$this->db->query($fetchschool);
 $school3=$fetchschool2->row();
							

?>


  <tr>

   <td style="display:none;"><input type="checkbox" name="product_id[]" value="<?php echo $fetch->Product_id; ?>" checked="checked" style="display:none;" /></td>
<td><?php echo $industry_idFetch->location_name;  ?></td>

<td><?php echo $school3->prodcatg_name;  ?></td>
    <td><?php echo $fetch->productname; ?></td> 
                                         <td style="display:none">
										 <select name="color[]"   <?php if(@$_GET['view']!=''){ ?>  <?php }?>>

<option value="">-------select---------</option>

<?php

$ugroup2=$this->db->query("SELECT * FROM tbl_master_data where param_id= '23' " );
foreach ($ugroup2->result() as $fetchunit){



?>

<option value="<?php  echo $fetchunit->serial_number ;?>"<?php if($fetchunit->serial_number==$fetchunit->keyvalue){ ?> selected <?php } ?>><?php echo $fetchunit->keyvalue;?></option>
<?php } ?>
</select>
										 </td>

                                            <td><input type="text" name="new_quantity[]" onChange="qun(this.id)" id="newquantity<?php echo $i;?>"  value="" /></td>
                                           
                                            <?php $selid=$this->db->query("select * from tbl_product_stock where  Product_id='$fetch->Product_id'");
     $selfetch=$selid -> row();
	
	// print_r($selfetch);
 ?>
   
                            <td><input type="hidden" name="quantity[]" id="quantity<?php echo $i;?>_" value="<?php echo $selfetch->quantity;?>"><?php echo $selfetch->quantity;?></td>
    </tr>

	<?php $i++; }  ?>
</table>
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



    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>



    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>







    <!-- SB Admin Scripts - Include with every page -->



    <script src="<?php echo base_url();?>assets/js/sb-admin.js"></script>







    <!-- Page-Level Demo Scripts - Tables - Use for reference -->



    <script>



    $(document).ready(function() {



        $('#dataTables-example').dataTable();



    });



    </script>
<script>
function qun(q)

  {	

  	//var abq=document.getElementById("abqt").value; 
//alert(q);
	var zz=document.getElementById(q).id;
//alert(zz);
	var myarra = zz.split("newquantity");

	var asx= myarra[1];

	//alert(asx);

	var pri=document.getElementById("newquantity"+asx).value;

	var qnty=document.getElementById("quantity"+asx).value;
	//alert(qnty);
//	alert(pri);

if(Number(pri)>Number(qnty)){
alert("***New Quantity Exceed The Actual Quantity In Stock***");
document.getElementById("newquantity"+asx).focus();
}
}

</script>

</body>
</html>

