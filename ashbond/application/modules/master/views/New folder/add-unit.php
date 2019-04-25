<?php
  @$tableName="tbl_unit";
  @$location="manage_unit";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php // include('includes/title.php') ?>

<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">

<!--input type shadow-->

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

<script>
function percantageval()
{
	
	var perval=document.getElementById("precentage").value;
	if(perval>100)
	{
		alert("given percantage is greater then 100");
		document.getElementById("precentage").value="";
		
	}
	
}

</script>




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript">

    $(function () {

	$("#employee_name123").hide();

	        $("#Expense_Type").change(function () {

            var selectedText = $("#Expense_Type").find("option:selected").text();

			

            var selectedValue = $("#Expense_Type").val();

			if(selectedText=='Employee')

			{

			$("#employee_name123").show();

			}

			

			if(selectedText=='Office')

			{

			$("#employee_name123").hide();

			}

          

        });

    });

	

	

	$(function () {

	$("#Employee_Name").hide();

	

        $("#Expense_Type").change(function () {

            var selectedText = $("#Expense_Type").find("option:selected").text();

			

            var selectedValue = $("#Expense_Type").val();

			if(selectedText=='Employee')

			{

			$("#Employee_Name").show();

			}

			

			if(selectedText=='Office')

			{

			$("#Employee_Name").hide();

			}

          

        });

    });

	

	 $(function () {

	$("#item123").hide();

        $("#Expense_Type").change(function () {

            var selectedText = $("#Expense_Type").find("option:selected").text();

			

            var selectedValue = $("#Expense_Type").val();

			if(selectedText=='Office')

			{

			$("#item123").show();

			}

			

			if(selectedText=='Employee')

			{

			$("#item123").hide();

			}

          

        });

    });

	

	

	$(function () {

	$("#item_name123").hide();

        $("#Expense_Type").change(function () {

            var selectedText = $("#Expense_Type").find("option:selected").text();

			

            var selectedValue = $("#Expense_Type").val();

			if(selectedText=='Office')

			{

			$("#item_name123").show();

			}

			

			if(selectedText=='Employee')

			{

			$("#item_name123").hide();

			}

          

        });

    });

</script>



<body>



<div class="wrapper"><!--header close-->

<div class="clear"></div>



<div class="container"><!--container-left close-->



<?php if(@$_GET['popup']=='True') {
	} else { 

	$this->load->view('sidebar');

	  } ?>
<div id="b2" class="right-colum" >

<div class="right-colum-text">

<div class="table-row">

<div class="title">

<h1>AGENT PRECENTAGE DETAILS</h1> 

<form action="insert_unit" method="post">

<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 {

if(@$_GET['id']==''){?>

     <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



	  <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>



	   <?php } }?>



<?php if(@$_GET['popup'] == 'True') {?>

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?>

<div class="clear"></div>

</div><!--title close-->



<div  class="container-right-text">

<div  class="table-row">




<table class="bordered">
<thead>

<tr>

<th colspan="4"><b>Unit Detail</b></th>        

</tr>

</thead>


<?php

  if(@$_GET['id']!='' or @$_GET['view']!=''){
	@$userQuery = $this->db->query("SELECT * FROM $tableName where status='A' and unit_id='".@$_GET['id']."' or unit_id='".@$_GET['view']."'");
	@$userFetch = $userQuery->row();
 
}
  
@$userQuery1 = $this->db->query("SELECT * FROM $tableName ORDER BY unit_id desc limit 0 ,1 ");

@$userFetch1 = $userQuery1->row();

	
?>


<tr>

  

  <td class="text-r"><star></star>
  Unit Name:</td>



  <td>

		<input type="text" name="unit_name" onchange="unitfun(this.value)" value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo @$userFetch->unit_name; } ?>" <?php  if(@$_GET['view']!=''){?> readonly="true"  <?php }?> />
	<a id="unitdiv" style="color:#FF0000"></a>
  </td>

  

  

<td class="text-r"><star></star>
Print Name:</td>

<td>

<input type="hidden" name="unit_id" class="span6 "value="<?php echo @$userFetch->unit_id;?>" readonly size="22" aria-required='true' />
<input type="text" name="print_name" value="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo @$userFetch->print_name; } ?>"  <?php  if(@$_GET['view']!=''){?> readonly="true"  <?php }?>/></td>

</tr>         

</table>

<!--bordered close-->

<div class="clear"></div>



<div class="paging-row">

<div class="paging-right">

<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 {

if(@$_GET['id']==''){?>



     <td><input name="save" tabindex="3" type="submit" value="Save" accesskey="s" class="submit" /></td>
     <?php }else {?>

	   <td> <input name="edit" type="submit"  value="Save" accesskey="s" class="submit" /> </td>



	   <?php }}?>



<?php if(@$_GET['popup'] == 'True') {?>

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?>

</form>
</div></div></div></div>



</div><!--paging-right close-->

</div><!--paging-row close-->



</div><!--table-row close-->

</div><!--container-right-text close-->





</div><!--container-right close-->







</div><!--container close-->



<div class="clear"></div><!--footer--row close-->



</div><!--wrapper close-->




<!--onload focus-->
<script>
function tab(){
  document.getElementById("customer").focus();
}
</script>

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



function unitfun(unit_name) {
		
		var strURL="unitfunction?unitid="+unit_name;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
				
						document.getElementById('unitdiv').innerHTML=req.responseText;
												
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

<?php // include('includes/footer.php') ?>



