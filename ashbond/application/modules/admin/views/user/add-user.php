<?php
$tableName='tbl_user_mst';
$location='manage_user'
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
		var req = getXMLHTTP();
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




function getBranch(zone_id) {

getdata()	
		var strURL="getBranch?zone_id="+zone_id;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
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
		getdata();	
		var strURL="getDivision?branch_id="+branch_id;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
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
	
function getdata()
		  {
		 var div=document.getElementById("divn_id").value;
		// var com=document.getElementById("comp_id").value;
		 var zone=document.getElementById("zone_id").value;
		 var brach=document.getElementById("branch_id").value;
		 if(brach=='')
		 {
		 alert("Please select Zone .");
		 document.getElementById("zone_id").focus;
		 return false;
		 }
		
		
		  if(div=='')
		 {
		 alert("Please select Company Name.");
		 document.getElementById("branch_id").focus;
		 return false;
		 
		 }
		 if(zone=='')
		 {
		 alert("Please select enterprise.");
		 document.getElementById("comp_id").focus;
		 return false;
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
});</script>
<script>
function popupclose(){
window.close();
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

<h1> User Details</h1>

<form action="insert_user" method="post">



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

<a href="" onclick="popupclose(this.value)" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">


<table class="bordered">

<thead>



<tr>

<th colspan="4"><b>Add  User Details</b></th>        

</tr>



</thead>

<tr>




<td class="text-r"><star>*</star>

User Name:</td>
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$userQuery = $this->db->query("SELECT * FROM tbl_user_mst where status='A' and user_id='".$_GET['id']."' or user_id='".$_GET['view']."'");
$userFetch = $userQuery->row();
 
}


 if(@$_GET['id']!=''){
 


  ?>         


<td style="display:none"><input type="text" name="user_id" class="span6 "value="<?php echo $userFetch->user_id?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by user_id desc limit 0,1");
$row = $query->row();

?>

    <td style="display:none"><input type="text" name="user_idd" value="<?php echo $row->user_id+1?>" readonly size="22" class="span6 " aria-required='true' />         </td>

                <?php }?>

<td><input name="user_name" type="text" class="span6" value="<?php if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $userFetch->user_name; }?>" size="22" maxlength="35" <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?> required aria-required='true' /></td>

<td class="text-r"><star>*</star>

  Password:</td>         

<td><input name="password" type="password" class="span6" value="<?php  if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $userFetch->password; }?>" size="22" maxlength="20" id="pass" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/><br/><input id="test2" type="checkbox" />Show Password</td>


</tr>        

<tr>

<td class="text-r"><star>*</star>Email</td>

<td><input name="email_id" type="email" class="span6" value="<?php if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $userFetch->email_id; }?>" size="22"  required aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/></td>


<td class="text-r"><star>*</star>

		Phone Number

	</td>



	<td>

		<input name="phone_no" type="number" class="span6" value="<?php if(@$_GET['view']!='' or @$_GET['id']!=''){echo $userFetch->phone_no;}?>" size="22" maxlength="20" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/>

	</td>
</tr>

<tr>

<td class="text-r"><star>*</star>Company Name</td>

<td>

<select name="comp_id" id="comp_id"  onChange="getregion(this.value)" required <?php if($_GET['view']!=""){ ?> disabled="disabled" <?php } ?> >

<option value="">--Select--</option>

<?php
$comp_sql = $this->db->query("select * FROM tbl_enterprise_mst where status='A'");

foreach ($comp_sql->result() as $comp_fetch){

 ?>

<option value="<?php  echo @$comp_fetch->comp_id;?>" <?php if(@$comp_fetch->comp_id==@$userFetch->comp_id){ ?> selected="selected" <?php }?>><?php echo @$comp_fetch->comp_name;?></option>

<?php } ?>

</select>

</td>

<td class="text-r"><star>*</star>Zone Name</td>

<td>
<div id="regiondiv">

<select name="zone_id" id="zone_id" onClick="getdata()" onchange="getBranch(this.value)" required <?php if($_GET['view']!=""){ ?> disabled="disabled" <?php } ?>>

<option value="">--Select--</option>

<?php

//$sqlzone = mysql_query("SELECT * FROM  tbl_region_mst where status='A' and comp_id='".$_SESSION['SESS_COMPANY']."'");

$sqlzone = $this->db->query("select * FROM tbl_region_mst where status='A'");

foreach ($sqlzone->result() as $zone_fetch){

//while($fetzone = mysql_fetch_array($sqlzone)) {



 ?>

<option value="<?php echo @$zone_fetch->zone_id;?>" <?php if(@$zone_fetch->zone_id==@$userFetch->zone_id){ ?> selected="selected" <?php }?> ><?php echo $zone_fetch->zone_name;?></option>

<?php } ?>

</select>
</div>
</td>
</tr>

<tr>

<td class="text-r"><star>*</star>Branch Name</td>

<td>

<div id="branchdiv">

<select name="brnh_id" id="branch_id" onClick="getdata()" onChange="getDivision(this.value)" required <?php if($_GET['view']!=""){ ?> disabled="disabled" <?php } ?>>

<option >--Select--</option>

<?php
$sqlBrnch = $this->db->query("SELECT * FROM tbl_branch_mst where status='A' and comp_id=comp_id='".$this->session->userdata('comp_id')."'");

foreach ($sqlBrnch->result() as $sqlBrcFetch){


 ?>

<option value="<?php echo @$sqlBrcFetch->brnh_id;?>" <?php if(@$sqlBrcFetch->brnh_id==@$userFetch->brnh_id){ ?> selected <?php }?>><?php echo @$sqlBrcFetch->brnh_name;?></option>

<?php } ?>

</select>

  </div>

</td>
<td class="text-r"><star>*</star>

Division Name:</td>



<td>

<div id="divndiv">

 <select  placeholder="Enter text" onchange="getdata()" onClick="getdata()" name="divn_id"  id="divn_id" required <?php if($_GET['view']!=""){ ?> disabled="disabled" <?php } ?>>



<option value="">--Select--</option>

<?php

$sqlDiv = $this->db->query("select divn_id,divn_name from tbl_wing_mst where  status='A'");

foreach ($sqlDiv->result() as $sqlDivFetch){

?>

<option value="<?php echo @$sqlDivFetch->divn_id;?>" <?php if(@$sqlDivFetch->divn_id==@$userFetch->divn_id){ ?> selected <?php }?>><?php echo @$sqlDivFetch->divn_name;?></option>

<?php }?>

</select></div>

              </td>

     </tr>
     
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





 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



 <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>



	      <?php }}?>





<?php if(@$_GET['popup'] == 'True') {?>

<a href="" onclick="popupclose(this.value)"  title="Cancel" class="submit"> Cancel</a>

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

</body>
</html>

<?php //include('includes/footer.php') ?>

