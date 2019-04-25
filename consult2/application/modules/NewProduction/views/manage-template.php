<?php 
 
  $tableName="production_production_hdr";
  $location="manage_template";
  @extract($_POST);
if(@$del!='')

{
 	

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

$Query=$this->db->query("select * from production_production_hdr where invoiceid in ($mem_id)");

		foreach($Query->result() as $getp){
			
		 $sqlProdLoc123="update tbl_product_stock set templateid='0' where Product_id='$getp->finish_goods'";
						
						$this->db->query($sqlProdLoc123);
				}		
			$production_sql="delete from $tableName  where invoiceid	 in ($mem_id)";

			$production_sql1="delete from production_production_dtl  where invoice_id	 in ($mem_id)";
		

	}

	else

	{

     $Query=$this->db->query("select * from production_production_hdr where invoiceid ='$mem_id'");
			$getp=$Query->row();
			
			
		 $sqlProdLoc123="update tbl_product_stock set templateid='0' where Product_id='$getp->finish_goods'";
						
						$this->db->query($sqlProdLoc123);
						
		$production_sql="delete from $tableName where invoiceid='$mem_id'";
		$production_sql1="delete from production_production_dtl where invoice_id='$mem_id'";

	}

	

	$production_res=$this->db->query($production_sql);
	$production_res=$this->db->query($production_sql1);


}

	
if($_POST['submit']=='Active'){



	@extract($_POST);



	if(is_array($cid)){


echo "helo";die;
	$mem_id=implode(',',$cid);



	}else{



	$mem_id=$cid;



	}



	if(count($cid)>1){



	



	$sql="update $tableName set status='Active' where invoiceid in ($mem_id)";



	$res=$this->db->query($sql);



	$_SESSION['SESS_MSG']=count($cid).' Records Activated';



	header("Location: $location");



	}else{



	$sql="update $tableName set status='Active' where invoiceid='$mem_id'";



	$res=$this->db->query($sql);



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



	



	$sql="update $tableName set status='Inactive' where invoiceid in ($mem_id)";



	$res=$this->db->query($sql);



	$_SESSION['SESS_MSG']=count($cid).' Records Inactivated';



	header("Location: $location");



	}else{



	$sql="update $tableName set status='Inactive' where invoiceid='$mem_id'";



	$res=$this->db->query($sql);



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



			$sql="delete from $tableName  where invoiceid	 in ($mem_id)";



		



	}



	else



	{



		$sql="delete from $tableName where invoiceid='$mem_id'";



	}



	



	$res=$this->db->query($sql);



	$_SESSION['SESS_MSG']=count($cid).' Records Deleted';



	header("Location: manage-leads.php");



	exit;



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



		//alert(strURL);



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

<?php $season=$_GET['season'];?>

<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<?php 
if($_GET['type']=='sale_order'){
?>
<h1><b></b>sale Invoice Order List</h1> 
<?php }
if($_GET['type']=='sale_return'){ ?>
<h1><b></b>sale Invoice Return List</h1> 
<?php } ?>
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
<a href="template"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Template </a>
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

      
		
        <th>Finish Goods</th>		
        <th>Raw Material & Process</th>	
		<th>Unit</th>
		
        
        

        <th style="width:100px;">Action</th>
    </tr>
    </thead>

    <tr>

      <td><input type="checkbox"></td>   

         <td><input type="text" name="finish_good" class="input-small"></td>

		<td><input type="text" name="row_meterial" class="input-small" readonly></td>
		
        <td><input type="text" name="unit" class="input-small"></td>
       

		 <td><input type="submit" name="Search" value="Search" class="submit" /></td>
    </tr>

<?php

@extract($_POST);
if($Search!='')
{
$queryy="select * from $tableName where status='A'";
	  
		    if($finish_good!='')

		  {
 					 $Query1=$this->db->query("select * from tbl_product_stock where productname like '%$finish_good%'");
						$fetchQ1=$Query1->row();
		  

		  		  $queryy.=" and finish_goods = '$fetchQ1->Product_id'";



		  }
		  
		  
 
  if($unit!='')

		  {
      $Query124=$this->db->query("select * from production_production_dtl where unit='$unit'");
						$fetchQ1234=$Query124->row();
		  

		  		  	$queryy.=" and invoiceid like '%$fetchQ1234->invoice_id%'";



		  }
 /*if($quantity!='')

		  {
      



		  }*/
 
}
if($Search=='')



	  {

	 
		
				 $queryy="select * from production_production_hdr ";
			
//	echo $queryy;
	
			}	
 

		  $result=$this->db->query($queryy);

		
					//echo $queryy;
		  
   $i=$start;

    $j=1;

   foreach($result->result() as $line){



   $i++;



   if($i%2!=0){



   	$color='#ECE9D8';



   }else{



   	$color='#F1FEFD';



   }

   ?>

   <tr>
		<?php 
			$Query12=$this->db->query("select * from production_production_dtl where invoice_id='$line->invoiceid'");
						$fetchQ123=$Query12->row();
	
		?>
   <td><input name="cid[]" type="checkbox" id="cid[]" value="<?php echo $fetchQ123->invoice_id?>" onclick="getCid(this.value)" /></td>

   

                      <td><?php 
					  
					  			
					
					    $Query=$this->db->query("select * from tbl_product_stock where Product_id='$fetchQ123->finish_goods'");
						$fetchQ=$Query->row();
					    echo $fetchQ->productname; ?></td>
					   <td>
					  
					    <a target="_blank"><i onClick="openpopup('show_qty',400,300,'show_row',<?php echo $fetchQ123->invoice_id; ?>)"  alt="v" border="0" class="icon" title="show row matrial"/>Show Raw Materials</i></td>
                        <td><?php echo $fetchQ123->unit;?></td>
						  
                        
<td><a target="_blank"><img src="<?php echo base_url();?>/assets/images/view.png" onClick="openpopup('view_template',1000,600,'view',<?php echo $fetchQ123->invoice_id; ?>)"  alt="v" border="0" class="icon" title="View"/></a><img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('edit_template',1000,600,'id',<?php echo $fetchQ123->invoice_id; ?>)" /> <!--<a href="#edit-invoice?id=<?php echo $invoiceid ?>"><img src="images/edit.png" alt="" border="0" class="icon" title="Edit"/></a> <a href="#manage-posinvoice.php?id=<?php echo $Xinvoiceid ?>"> <img src="images/delete.png" onclick="return confirm('Are you sure you want to Delete. ?');" alt="" border="0" class="icon" title="Delete"/></a>-->
  <a href="delete_manage_corporateinvoice?id=<?php  echo $fetchQ123->invoice_id; ?>"><img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('Are you sure you want to Delete. ?');" alt="" border="0" class="icon" title="Delete"/></a>
 </td>
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

