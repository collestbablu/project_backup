<?php
if($_GET['al']==1){
?>
<script>alert('production successfully');window.location='manage_production';</script>;
<?php } ?>

<?php
if($_GET['al']==2){
?>
<script>alert('Raw Material Less Then');window.location='manage_production';</script>;
<?php } ?>

<?php
if($_GET['al']==3){
?>
<script>alert('Raw Material Less Then Compare to Stock');window.location='manage_production';</script>;
<?php } ?>
<?php

$tableName='tbl_product_stock';
$location='manage_production';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
$(window).load(function() {

	$(".loader1").fadeOut("fast");
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
</head>
<body>
<div class="loader1"></div>
<script>

function getBranch(zone_id) {	

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

<h1>Production </h1>

<form  method="post" id="form1">



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

<th colspan="4">Production</th>        
</tr>
</thead>

<tr>




<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_product_stock where status='A' and Product_id='".$_GET['id']."' or Product_id='".$_GET['view']."'");
$branchFetch = $branchQuery->row();
 
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
        <?php //onchange="get2();"  ?>
	<td><select name="finishg" <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> required onChange1="get2();get21();" id = "idpro1">
					<option value="">----Select----</option>
				<?php 
							$Query=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods' and templateid='1'");
							foreach($Query->result() as $fetchQ){

					?>
				<option value="<?php echo $fetchQ->Product_id; ?>" <?php if($_REQUEST['finishg']==$fetchQ->Product_id){?> selected="selected"<?php }?> /><?php echo $fetchQ->productname; ?></option>
					<?php } ?>
			</select>
			<a id="finishdiv"></a>
			<div id="stockqty"></div></td>
		<td class="text-r"></td>
		<td></td>
</tr>        

<tr>
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

function get21(){


var id = document.getElementById('idpro').value;



		var strURL="get_qtyinstock?product_id="+id;
		//alert(strURL);
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {
					//var aa=req.responseText;
					//alert(aa)		;				
				document.getElementById('stockqty').innerHTML=req.responseText;
					
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

function get2(){

var value = document.getElementById('qty').value;
var id = document.getElementById('idpro').value;


if(id!='' && value!=''){

		var strURL="get_color?product_id="+id+","+value;
		//alert(strURL);
		var req = getXMLHTTP();
		
		if (req) {
		
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {
					//var aa=req.responseText;
					//alert(aa)		;				
				document.getElementById('checkqty').value=req.responseText;
					
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
	}

	</script>
<script>
function myqty(){
var qtyamount =document.getElementById('qty').value;
if(qtyamount==0){
//document.getElementById("Show").type="hidden";
alert('Fill value more than 0');
document.getElementById('qty').value='';

}
var qtyamount1 =document.getElementById('checkqty').value;
if(qtyamount1==0){
alert('row matrial value is less and add  row matrial quantity');

}
}



if(qtyamount1!=''){



function submitfun1(){
var qtyamount1 =document.getElementById('checkqty').value;




document.getElementById("form1").action=""; // Setting form action to "role_function_permision" page
document.getElementById("form1").submit();

}
}


function submitfun(){

var qtyamount1 =document.getElementById('checkqty').value;

if(qtyamount1!=''){
//alert(qtyamount1);
document.getElementById("form1").action="insert_stock_out"; // Setting form action to "role_function_permision" page
document.getElementById("form1").submit();

//document.form1.submit();

}

}



</script>


<td class="text-r"><star>*</star>Quantity</td>

<td><input name="qty" id ="qty12" onchange = "myqty();"  onkeyup="get2();" required type="number" step="any" class="span6"  size="22"  aria-required='true'  value="<?php if(isset($_REQUEST['qty'])){ echo $_REQUEST['qty']; } ?>" />
  <br/></td><td class="text-r"></td>
		<td><input type = "hidden"  value ="<?php if(isset($_REQUEST['checkqty'])){ echo $_REQUEST['checkqty']; } ?>" id = "checkqty"  name ="checkqty"  />
		
		<input name="Show" type="submit" value="Show" id="Show1" onClick="submitfun1()" class="submit" /></td>
		
</tr>
</table>
<table class="bordered">

  <?php 
extract(@$_POST);
  if(@$Show!='')
  {

   
  
    @$cybercodex_sql= ("select * from production_production_dtl where finish_goods='$finishg'");
	@$mod_sql = $this->db->query($cybercodex_sql) ;
	
	
	
	
	
	?>
	
	<?php
	$pro[]=array();
	$process=@$mod_sql->row();
	$pro=explode('^',$process->process);
	$pro1=implode(',',$pro);
	
	 ?>
	 <?php /*?><tr>
	 <th>Process</th>
	 <th colspan="2"><?php 
	 
	 
	
	$process11 =$this->db->query("select * from tbl_master_data where serial_number in ($pro1)");
	  
	foreach( $process11->result() as $proc1){
	
	echo $proc1->keyvalue."&nbsp;|&nbsp;";
	
	}
	 
	?>
	 
	 </th>
	 
	 </tr><?php */?>
	 <tr>
<th>Raw Material</th><th>Required Material</th><th>Available Material</th>
</tr> 
	 
	 <?php 
		foreach (@$mod_sql->result() as $line)
			{
	?>	
	<tr>
	<td>
	<?php
	@$cybercodex_sql1= ("select * from tbl_product_stock where Product_id='$line->product_id'");
	@$mod_sql1 = $this->db->query($cybercodex_sql1) ;
	 @$mod_sql12=@$mod_sql1->row();
	 echo $mod_sql12->productname;
	 
	 
	 $abc=$this->db->query("select * from tbl_product_serial where product_id = '$mod_sql12->Product_id'");

 $EditData = $abc->row();
	 ?>
	</td>
	<td>
	<?php echo $line->qnty*$qty;?>
	</td>
	<td>
	<?php echo @$EditData->quantity;?>
	</td>
	</tr>
			<?php }} 
  ?>

 </table>


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

<!--left-menu-js-close-->




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



<script>




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
												