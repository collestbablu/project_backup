<?php
$tableName='tbl_role_func_action';
$location='role_function_action'
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
<body>
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







function getregion(comp_id) {	
		var strURL="getregion?zone_id="+comp_id;
		//
		var req = getXMLHTTP();
		//alert(comp_id);
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
						document.getElementById('regiondiv').innerHTML=req.responseText;						
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
<script>
function myfunction() {
document.getElementById("form_id").action = "role_function_permision"; // Setting form action to "role_function_permision" page
document.getElementById("form_id").submit();
}
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


<form name="form_id"  id="form_id" method="post">

<h1> Role Function Action Details</h1>
<?php if(@$_GET['id']==''){?>
    <div class="actions-right" >
 <td> <input name="save" type="button" value="Save" onClick="myfunction()" class="submit" /> </td>
	  <?php } else {?>
<td> <div class="actions-right"></td>
	   <td> <input name="edit" type="submit" value="Save"  class="submit" /> </td>
	   <?php  } ?>
<a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>
</div>
<div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<table class="bordered" style="margin-bottom: 55px;">
<thead>
<tr>
<th colspan="4"><b>Select Role And Module </b></th>        
<th></th>
</tr>
</thead>

<tr>

<td class="text-r"><star>*</star>

Role:</td>


<td>

<select name="role_id" id="role_id">

<option value="">--Select--</option>

<?php
@$sqlrole = $this->db->query("select role_id, role_name from tbl_role_mst where status='A'and comp_id='".$this->session->userdata('comp_id')."'order by role_id ");
foreach (@$sqlrole->result() as $role_fetch){
 ?>
<option value="<?php echo @$role_fetch->role_id ; ?>"><?php echo @$role_fetch->role_name ; ?></option>
<?php } ?>
</select>
</td>
<td class="text-r"><star>*</star>
Module:</td>
<td>
<select name="module_id" id="module_id">
<option value="">--Select--</option>
<?php
	@$sqlmodule = $this->db->query("select * from tbl_module_mst where status='A' ");
foreach (@$sqlmodule->result() as $module_fetch){
 ?>
<option value="<?php echo @$module_fetch->module_id ; ?>"><?php echo @$module_fetch->module_name ; ?></option>
<?php } ?>
</select>
</td>
<td><input name="Show" type="submit" value="Show" onClick="myFunction()" class="submit" /> </td>
</table>
<table class="bordered">
<tr>
<th>Product Name</th><th>Status</th>
</tr> 
  <?php 
extract(@$_POST);
  if(@$Show!='')
  {
    @$tbl_sql= ("select * from tbl_module_function where module_name='$module_id' and status='A'");
	@$mod_sql = $this->db->query($tbl_sql) ;
		foreach (@$mod_sql->result() as $line)
			{
	?>	
	<tr>
	<td>
	<?php echo @$line->function_name ;?>
	</td>
	<td>
	<?php 
	 @$qqq="select action_id from $tableName where function_url='". $line->func_id."' and module_id='$module_id' and role_id='$role_id' and status='A'";
	@$sr=$this->db->query($qqq);
	@$linesr=@$sr->row();
	?>
	<select name="drid[]">
            <option value="Inactive" <?php if(@$linesr->action_id =='Inactive'){ echo "selected" ; } ?>>Inactive</option >
	<option value="Active" <?php if(@$linesr->action_id =='Active'){ echo "selected";} ?> >Active</option>
	</select>
	<input name="cid[]" type="hidden" value="<?php echo @$line->func_id ;?>"/>
	
	<input name="module_id" type="hidden" value="<?php echo $module_id ;?>"/>
	<input name="role_id" type="hidden" value="<?php echo $role_id ;?>"/>
	</td>
	</tr>
	<?php } }
  ?>

 </table>
 <div class="paging-row">

<div class="paging-right">




 <?php if(@$_GET['id']==''){?>
   <div class="actions-right">
 <td> <input name="save" type="button" value="Save" onClick="myfunction()" class="submit" /> </td>
	  <?php } else {?>
<td></td>
	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>
	   <?php  } ?>
<a href="<?php echo @$location ; ?>" title="Cancel" class="submit"> Cancel</a>

<!--bordered close-->
</form>



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






</body>

</html>

<?php //include('includes/footer.php') ?>

