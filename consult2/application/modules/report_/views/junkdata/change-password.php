<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to CRM</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!-----menu js----->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<!-----menu js----->

<!--banner-->
<script type="text/javascript" src="js/js-banner/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/js-banner/jssor.js"></script>
<script type="text/javascript" src="js/js-banner/jssor.slider.js"></script>
<script type="text/javascript" src="js/js-banner/demo.js"></script>
<!--banner close-->

<!--Scrolling project-->
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
<script type="text/javascript">document.body.className = document.body.className.replace('jsDisabled', '');</script>

<!--Scrolling project close-->

</head>

<body>
<div class="wrapper">

<div class="clear"></div>

<div class="clear"></div>

<div class="clear"></div>

<div class="conatiner">
<?php
$this->load->view('sidebar');
 ?>

<!--conatiner-left close-->

<div class="conatiner-right">
<div class="product-scroller">
<div class="welcome-text">
<h1 style="width:60%;">Change Password</h1>
<span style="margin-left:300px;">
<?php if(@$_GET['sucessful']=='sucss'){?>
				
				<font color="#FF0000"><b>Your Password has been updated sucessfully!</b></font>
				<?php }?>
				<?php
			
				if(@$_GET['notmatch']=='notmat'){?>
				
				<font color="#FF0000"><b>Password do not match!</b></font>
				<?php }?>
				<?php
		
				if(@$_GET['cur']=='invalid'){?>
				
				<font color="#FF0000"><b>your current password is invalid!</b></font>
				<?php }?>
                </span>	
					<form class="login active" id="pass" method="post" action="insert_pass">
						
						<div>
                        
							<label style="width:27%; margin-bottom: 19px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Password:</label>
							<input type="password" name="password" value=""  id="poft" style="width:20%;" required />
							
						</div>
						<div>
							<label style="width:27%; margin-bottom: 19px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Password: </label>
							<input type="password" name="new_password" value="" style="width:20%;" required />
							
						</div>
						
						<div>
							<label style="width:27%; margin-bottom: 19px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirm New Password: </label>
							<input type="password" name="cp_password" value="" id="chang" style="width:20%;" required />
							
						</div>
						<div class="bottom">
							
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="Change"  onclick="chanpass()" name="change"style="width:6%;">
							
							<div class="clear"></div>
						</div>
					</form>
					<div class="clear"></div>
<div class="welcome-text-right">
<div id="form_wrapper" class="form_wrapper">
				</div><!--form_wrappe close-->
		
</div><!--welcome-text-left close-->

<div class="welcome-text-right">


</div><!--welcome-text-right close-->

</div><!--welcome-text close-->



</div><!--product-scroller close-->
<div class="clear"></div>


</div><!--conatiner-right close-->
</div><!--conatiner close-->

</div><!--wrapper close-->
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

<script>
function popupclose(){
window.close();
}
</script>


</body>
</html>
