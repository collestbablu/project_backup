<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="<?php echo base_url();?>assets/css/style-login.css" rel="stylesheet" type="text/css" />
</head>
<body style="background: #035f84;
    background: -moz-linear-gradient(top, #035f84 0%, #053549 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#035f84), color-stop(100%,#053549));
    background: -webkit-linear-gradient(top, #035f84 0%,#053549 100%);
    background: -o-linear-gradient(top, #035f84 0%,#053549 100%);
    background: -ms-linear-gradient(top, #035f84 0%,#053549 100%);
    background: linear-gradient(to bottom, #038423 0%,#053549 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#035f84', endColorstr='#053549',GradientType=0 );
">

<div class="login-bg">
<div class="login-container">
<div class="login-logo"><img src="<?php echo base_url();?>assets/images/techvyas.png" width="95" height="85" alt="" border="0" /></div>
</div><!--login-container close-->

<div class="line"></div>

<div class="clear"></div>

<div class="login-container">

<div class="login-l">
</div>

<div class="login-r">

<div class="login-box">

<div class="login-row">
<b id="loginDisplay">
Login here
</b>
<b id="forgotDisplay" style="display:none">
Forgot Password
</b>
</div><!--login-row close-->

<div class="clear"></div>

<div class="login-center">

<form method="post" action="master/Item/dashboard">

<font color="#FF0000" style="display:marker"><b><?php // echo validation_errors(); //include('includes/error.msg.inc.php'); ?></b> 



			



		<font color="#000" style="display:marker"><b><?php echo $this->session->flashdata('message');?></b> </font> 



						



						





<table width="100%" border="0" cellspacing="0" cellpadding="5" id="tbl">

<div>

  <tr>



    <td width="33%" class="login-text">User Name:</td>



    <td width="67%"><input name="username" type="text" class="span6" required /></td>



  </tr>



  <tr>



    <td class="login-text">Password:</td>



    <td><input name="password" type="password" class="span6"  required/></td>



  </tr>



  <tr>



    <td>&nbsp;</td>



    <td>







	<div class="actions-right">



<input type="submit" name="Submit" value="Login" class="login-submit"><br />
<a style="color:#FFFFFF" onclick="show();"  >Forget Password</a>




</div>


	</td>



  </tr>



</table>



</form>
<form action="master/Item/forgotPassword" method="post">

<table width="100%" border="0" cellspacing="0" cellpadding="5" id="tbl1" style="display:none" >

  <tr>



    <td width="33%" class="login-text">Email-Id:</td>



    <td width="67%"><input name="email_id" type="text" class="span6" required /></td>



  </tr>
  
  <tr>



    <td width="33%" class="login-text">&nbsp;</td>



    <td width="67%"><input name="submit" type="submit"  class="login-submit" value="Submit" /><a href="index" style="color:#FFFFFF; display:none" id="loginA" onclick="show();"  >Login</a></td>



  </tr>

</table>


</form>

</div><!--login-center close-->







</div><!--login-box close-->



</div><!--login-r close-->



</div><!--login-containe close-->



<div class="login-footer">



<div class="login-container">



<div class="footer-left"><p></p></div>



<div class="footer-right"><!--<img src="images/footer-logo.png" alt="" border="0" />--></div>



</div><!--login-container close-->



</div><!--login-footer close-->



</div><!--login-bg close-->



</body>



</html>


<script>
function show()
{

document.getElementById("tbl").style.display="none";
document.getElementById("tbl1").style.display="";
document.getElementById("forgotDisplay").style.display="";
document.getElementById("loginDisplay").style.display="none";
document.getElementById("loginA").style.display="";


}

</script>