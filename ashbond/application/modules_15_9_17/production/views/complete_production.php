<?php
if($_GET['al']==1){
?>
<script>alert('Production complete successfully');


					window.close();
					window.opener.location.reload();
					


</script>;
<?php } ?>




<?php

$tableName='cybercodex_production_hdr';
$location='manage_production';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
$(window).load(function() {

	$(".loader1").fadeOut("slow");
});
</script>
<style>
p{font-size: 40px;}
.loader1 {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url("<?php echo base_url();?>assets/images/Preloader_8.gif") 50% 50% no-repeat #ffffff;
    opacity: .8;
}
</style>
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
<div class="loader1"></div>
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

<h1>Production Complete</h1>

<form action="" method="post" id="form1" name="com">



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


<table class="bordered">

<thead>



<tr>

<th colspan="4">Production Complete</th>        

</tr>




</thead>

<tr>




<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
$Query1=$this->db->query("select * from $tableName where invoiceid='".$_GET['id']."'");
							
$branchFetch = $Query1->row();
 
}


 if(@$_GET['id']!='' ){
 


  ?>         


<input type="hidden" name="Product_id" class="span6 "value="<?php echo $branchFetch->Product_id;?>" readonly size="22" aria-required='true' />

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by Product_id desc limit 0,1");
$row = $query->row();

}
?>

 
<td class="text-r"><star>*</star>
 Finish Goods:</td>     
        
	<td><select name="finishg" <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> required  id = "finishg">
					<option value="">----Select----</option>
				<?php 
							
							
							foreach($Query1->result() as $fetchQ){
							
$Query=$this->db->query("select * from cybercodex_product_stock where Product_id='$fetchQ->finish_goods' and templateid='1'");
					$fetch1=$Query->row();
					
					?>
				<option value="<?php echo $fetch1->Product_id; ?>"><?php echo $fetch1->productname; ?></option>
					<?php } ?>
			</select><a id="finishdiv"></a>
			<div id="stockqty"></div>	</td>
		<td class="text-r" style="display:none"><star>*</star>Location:-</td>
		<td><select tabindex="5" name="location_id" style="display:none">

	<option value="">---Select---</option>

	  <?php 

			$industry_idQuery=$this->db->query("select * from cybercodex_location where status='A'");

			foreach($industry_idQuery->result() as $industry_idFetch){

	   ?>

		<option value="<?php echo $industry_idFetch->id;?>"<?php if($industry_idFetch->id==$location_id) {  ?> selected <?php } ?>> <?php echo $industry_idFetch->location_name;  ?> </option>

	  <?php } ?>

 </select> </td>

</tr>        

<tr>





<?php 

$Query1=$this->db->query("select * from cybercodex_product_stock where Product_id='$branchFetch->finish_goods' and qtyinstock!=''");
							
$branchFetch2 = $Query1->row();

$branchFetch1=$Query1->num_rows();						

?>

<td class="text-r"><star>*</star>Quantity Instock:-</td>

<td><input name="qty" id ="qty"  required type="number" step="any" class="span6"  size="22" onChange="myfun(this.value);"  aria-required='true'  value="" /><br />

</td>
<td class="text-r">Quantity</td>
		<td><input  id ="qty4"  required type="text" step="any" class="span6"  size="22"  aria-required='true'  value="<?php if($branchFetch1>0){echo $branchFetch->qty-$branchFetch2->qtyinstock;}else{echo $branchFetch->qty;}?>"  readonly="readonly"/><br/></td>
</tr>

</table>
<script>
function myfun(q){


var check2=document.getElementById('qty4').value;
//alert(check1);
//alert(check2);
if(parseInt(q)>parseInt(check2)){

alert('check production value ');
document.getElementById('qty').value='';

}
else{



}

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





 <td> 
 <input type="button" value="Save" class="submit" name="save" onClick="submitfun();">
 
 </td>



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



function submitfun(){



var x = document.forms["com"]["finishg"].value;
var y = document.forms["com"]["qty"].value;

    if (x == null || x == "") 
	{
        alert("Please select Finish Goods");
          return false;
     }
	 
	 if (y == null || y == "") 
	{
        alert("Please select quantity");
          return false;
     }
	
	   
//$("#form_id").submit();
document.getElementById("form1").action="insert_complete_production"; // Setting form action to "role_function_permision" page
document.getElementById("form1").submit();
//window.close();






}


</script>


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



function aliesfun(alias) {
		
		var strURL="aliesfunction?alias_idd="+alias;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
				
						document.getElementById('aliesdiv').innerHTML=req.responseText;
												
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}



function prodcatfun(prodcatg_name) {
		
		var strURL="prodcatefunction?prodcatg_id="+prodcatg_name;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
				
						document.getElementById('categorydiv').innerHTML=req.responseText;
												
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}

function finish(){
	var ab=document.getElementById("finishg").value;
	//alert(ab);
	var strURL="stock_finish?finishiddddd="+ab;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
				
						document.getElementById('finishdiv').innerHTML=req.responseText;
												
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






</body>

</html>

<?php //include('includes/footer.php') ?>

