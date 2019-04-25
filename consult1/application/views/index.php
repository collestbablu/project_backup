<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="<?php echo base_url();?>assets/css/style-login.css" rel="stylesheet" type="text/css" />
</head>
<body>

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

Login here

</div><!--login-row close-->

<div class="clear"></div>

<div class="login-center">

<form method="post" action="master/Item/dashboard">

<font color="#FF0000" style="display:marker"><b><?php // echo validation_errors(); //include('includes/error.msg.inc.php'); ?></b> 



			



		<font color="#FF0000" style="display:marker"><b><?php echo $this->session->flashdata('error');?></b> </font> 



						



						





<table width="100%" border="0" cellspacing="0" cellpadding="5">



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



<input type="submit" name="Submit" value="Login" class="login-submit">



</div>


	</td>



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



