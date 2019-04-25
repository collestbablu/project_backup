
<?php

$tableName='cybercodex_production_hdr';
$location='manage_production';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php //include("includes/title.php"); ?>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
        $('#prodcatg_name').change(function(){
            var val = $('#prodcatg_name').val();
            $('#print_name').val(val);
        });
     });
</script>


<body>
<script>








function getBranch(zone_id) {	



	

///alert(zone_id);

		var strURL="getBranch?zone_id="+zone_id;



		



		var req = getXMLHTTP();



		



		if (req) {



			



			req.onreadystatechange = function() {



				if (req.readyState == 4) {



					// only if "OK"



					if (req.status == 200) {						



						document.getElementById('branchdiv').innerHTML=req.responseText;						



					} else {



						alert("There was a problem while using XMLHTTP:\n" + req.statusText);



					}



				}				



			}			



			req.open("GET", strURL, true);



			req.send(null);



		}



				



	}











function getDivision(branch_id) {	



		var strURL="getDivision?branch_id="+branch_id;


//alert(strURL);
		



		var req = getXMLHTTP();



		



		if (req) {



			



			req.onreadystatechange = function() {



				if (req.readyState == 4) {



					// only if "OK"



					if (req.status == 200) {						



						document.getElementById('divndiv').innerHTML=req.responseText;						



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
<!--hide nad show password-->

<script src="js/menu-js/jquery.min.js"></script>

<script src="js/menu-js/bootstrap.min.js"></script>

<script src="js/menu-js/metisMenu.min.js"></script>



<script>
(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };
}(jQuery));
<!--calling above fucntion to field-->
$.toggleShowPassword({
    field: '#pass',
    control: '#test2'
});
</script>

<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->
<?php if(@$_GET['popup']=='True') {
	} else { 

	$this->load->view('sidebar');

	  } ?><div id="b2" class="right-colum">

<div class="right-colum-text">

<div class="table-row">

<div class="title">

<div class="title">

<h1>Complete Production Status</h1>

<form  method="post" action="complete_production" id="form1">



<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 { 

 if(@$_GET['id']==''){?>


 <td> 
<input type="button" value="Save" class="submit" name="save" onClick="submitfun();">
 
 </td>



	  <?php }else {?>

      <td> 
	   <input type="button" value="Save" class="submit" name="edit" onClick="submitfun();">
	  </td>



	   <?php } }?>



<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">

<?php 
 @$cybercodex_sql1= ("select * from $tableName where invoiceid='".$_GET['id']."'");
				@$mod_sql1 = $this->db->query($cybercodex_sql1) ;
				 @$mod_sql12=@$mod_sql1->row();
				 
				 

$sql1 = $this->db->query("select * from cybercodex_production_dtl where finish_goods='$mod_sql12->finish_goods'");
					@$mod_s12=$sql1->row();
									

$Query=$this->db->query("select * from cybercodex_product_stock where Product_id='$mod_s12->finish_goods'");
					
					
				     $pro_name = $Query->row();
?>
<table class="bordered">

<thead>



<tr>

<th colspan="4">Complete Production Status</th>        
</tr>
</thead>

<tr>




















	 <tr>
	 <th>Product Name&nbsp;:-&nbsp;<?php  echo $pro_name->productname; ;?>
	  <input type="text" name="qty" id="" value="<?php echo @$mod_sql12->qty;?>"/>
	   <input type="text" name="finishg" id="" value="<?php echo @$mod_sql12->finish_goods;?>"/>
	 </th>
	 <th colspan="2">
	 
	 </th>
	 
	 </tr>
<tr>
	 
<th>Production Name</th><th>Row Matrial</th><th>Required Matrial</th><th>Available Matrial</th>

</tr> 
	 
	 
	 

	<?php
	$i=0;
	$j=0;
	
	foreach(@$sql1->result() as $fetch){
	
	$Query=$this->db->query("select * from cybercodex_product_stock where product_id='$fetch->product_id'");
						   $fetchQ=$Query->row();
							
	
	
	
	?>				<?php echo $nn=$i++;?>
							<tr>
								
								
								<td>
								<?php echo $fetchQ->productname;?></td>
								
								<td>
							
								<input type="text" value="<?php echo $fetch->qnty*$mod_sql12->qty;?>"  id="rqty<?php echo $i; ?>"  >
								</td> 
								<td>
							<?php echo $fetchQ->qtyinstock;?></td> 
							
						<?php 
						
						
						
							$Query9=$this->db->query("select * from cybercodex_stock_in_dtl where product_id='$fetch->product_id'");
						   $fetchQ9=$Query9->row();
						   
						   ?>
							<td> 
								<input type="text"  value="<?php echo $fetchQ9->qntyt; ?>" id="enterqty<?php echo $i; ?>" onload="checkvalue(this.id);" readonly/>
								
							<?php if($fetch->qnty*$mod_sql12->qty==$fetchQ9->qntyt){
							
							$mm=$j++;
							?>
							
							<div style="display:inline-block;float:right;" id="comp<?php echo $i; ?>"><strong>Complete</strong><img src="<?php echo base_url()?>assets/images/right.png" /></div>
							
							<?php }else{?>
							
							
							<div style="display:inline-block;float:right;" id="comp<?php echo $i; ?>"><img src="<?php echo base_url()?>assets/images/wrong.jpg" /></div>
							
							
						<?php  }?>
						
							
							</td>
								
								</tr>
							



  </tr>

	<?php }  ?>

	
	<input type="text" value="<?php echo $nn;?>" id="getva" />
	<input type="text" value="<?php echo $mm;?>" id="comvalue" />
	
 </table>

<script>





function submitfun(){




var getva1=document.getElementById('getva').value;
var comvalue1=document.getElementById('comvalue').value;


	if(getva1==comvalue1){
	
	document.getElementById('form1').submit();
	}else{
	
	alert('Uncomplete Production');
	
	}
	
	
	
	
var pid=document.getElementById("enterqty"+asx).value;
var pidrqty=document.getElementById("rqty"+asx).value;
var pidcheckqty=document.getElementById("checkqty"+asx).value;







}



</script>
		
<!--bordered close-->

<div class="clear"></div>



<div class="paging-row">

<div class="paging-right">



<div class="actions-right">

<?php 



 if(@$_GET['view']!='' ){

 

 }

 else

 {

if(@$_GET['id']==''){?>





 <td><input type="button" value="Save" class="submit" name="save2" onClick="submitfun();" /></td>



 <?php }else {?>

	   <td> 
	    <input type="button" value="Save" class="submit" name="edit" onClick="submitfun();">
	   
	   </td>



	      <?php }}?>





<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>



</div><!--paging-right close-->

</div><!--paging-row close-->



</div><!--table-row close-->

</div><!--container-right-text close-->





</div><!--container-right close-->







</div><!--container close-->



<div class="clear"></div><!--footer--row close-->



</div><!--wrapper close-->





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
<!--hide nad show password-->
<script>
(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };
}(jQuery));
<!--calling above fucntion to field-->
$.toggleShowPassword({
    field: '#pass',
    control: '#test2'
});
</script>


<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>

<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>








</body>

</html>

<?php //include('includes/footer.php') ?>
												