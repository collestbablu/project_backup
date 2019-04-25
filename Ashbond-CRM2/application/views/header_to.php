
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<title>Tech Vyas Software</title>
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='<?=base_url();?>assets/images/favicon.ico' />
<!-- /site favicon -->

<!-- Entypo font stylesheet -->
<link href="<?=base_url();?>assets/css/entypo.css" rel="stylesheet">
<!-- /entypo font stylesheet -->

<!-- Font awesome stylesheet -->
<link href="<?=base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
<!-- /font awesome stylesheet -->

<!-- Bootstrap stylesheet min version -->
<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- /bootstrap stylesheet min version -->
<!------------------------report menu-------------------------->

<link href="<?php echo base_url();?>assets/report/report.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>assets/report-js/jquery.min.js" type="text/javascript"></script>

<!------------------------report menu close-------------------------->
<!-- Integral core stylesheet -->
<link href="<?=base_url();?>assets/css/integral-core.css" rel="stylesheet">
<!-- /integral core stylesheet -->

<!--Jvector Map-->
<link href="<?=base_url();?>assets/plugins/jvectormap/css/jquery-jvectormap-2.0.3.css" rel="stylesheet">

<link href="<?=base_url();?>assets/css/integral-forms.css" rel="stylesheet">

<link href="<?=base_url();?>assets/css/invoice.css" rel="stylesheet">
 
<link rel='stylesheet' type='text/css' href='<?=base_url();?>assets/inv_css/css/style.css' />

</head>
<?php $this->load->view("javascriptPage.php");?>
<body <?php if($_GET['view']!=''){?> oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' <?php }?> onLoad="notify()">

<!-- Loader Backdrop -->
	<div class="loader-backdrop">           
	  <!-- Loader -->
		<div class="loader">
			<div class="bounce-1"></div>
			<div class="bounce-2"></div>
		</div>
	  <!-- /loader -->
	</div>
<!-- loader backgrop -->
	
<!-- Page container -->
<div class="page-container">
<?php if($_GET['popup']=='True'){} else {?>

<!-- Page Sidebar -->
<?php 
//require_once(APPPATH.'views/side.php');
//$this->load->view("side.php");?>
<!-- /page sidebar -->

  <!-- Main container -->
<div class="main-container">

<!-- Main header -->
<div class="main-header row" style="display:none">

<div class="col-sm-6 col-xs-7"></div>

<div class="col-sm-6 col-xs-5" >
<div class="pull-right" >
<!-- User alerts -->
<!-- /user alerts -->

<ul class="user-info pull-left">  

<li class="notifications dropdown">
<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-attention"></i><span class="badge badge-info" id="putting">1</span></a>
<ul class="dropdown-menu pull-right">
<li class="first">
<div class="small"><a class="pull-right" href="#" style="display:none">Mark all Read</a> You have <strong id="putthe"></strong> new notifications.</div>
</li>
<li>
<ul class="dropdown-list">
<?php 
$crrdt=date("Y-m-d");

if($this->session->userdata('user_id')=='1')
{
	$qry=$this->db->query("select * from tbl_activity where nxt_action_date='$crrdt'");
}
else
{
	$qry=$this->db->query("select * from tbl_activity where nxt_action_date='$crrdt' and comp_id='".$this->session->userdata('comp_id')."' ");
}

$i=1;
foreach($qry->result() as $rows){
$qryfetch=$this->db->query("select * from tbl_master_data where serial_number='$rows->nxt_action'");
$rowFetch=$qryfetch->row();
?>
<li class="unread notification-success"><a href="#" data-toggle="modal" onClick="addActivity('<?php echo $rows->lead_id;?>');" data-target="#modal-1"><i class="icon-user-add pull-right"></i><span class="block-line strong">Next Action (<?php echo $rowFetch->keyvalue;?>)</span><span style="display:none" class="block-line small">30 seconds ago </span></a></li>
<?php $i++;}?>
<input type="hidden" name="notic" id="notic" value="<?=$i-1;?>">
<!---------
<li class="unread notification-secondary"><a href="#"><i class="icon-heart pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
<li class="unread notification-primary"><a href="#"><i class="icon-user pull-right"></i><span class="block-line strong">Privacy settings have been changed</span><span class="block-line small">2 hours ago</span></a></li>
<li class="notification-danger"><a href="#"><i class="icon-cancel-circled pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
<li class="notification-info"><a href="#"><i class="icon-info pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
<li class="notification-warning"><a href="#"><i class="icon-rss pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>------------------>
</ul>
</li>
<li class="external-last"> <a href="<?=base_url();?>crm/Lead/manage_lead">View all notifications</a> </li>
</ul>
</li>
&nbsp;&nbsp;     
<li class="profile-info dropdown"><a  data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url(); ?>master/Item/dashboar" aria-expanded="false"> <img style="display:none1" width="44" class="img-circle avatar" alt="" src="<?=base_url();?>assets/images/man-3.jpg"><strong><?php
$user=$this->db->query("select * from tbl_user_mst where comp_id='".$this->session->userdata('comp_id')."' ");
$getUser=$user->row();
echo $getUser->user_name;
 ?></strong><span class="caret"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<!-- User action menu -->
<ul class="dropdown-menu">
<li style="display:none"><a href="<?php echo base_url();?>master/Item/profile"><i class="icon-user" ></i>My profile</a></li>
<li><a href="<?php echo base_url();?>master/changePassword/changepwd"><i class="icon-cog"></i>Change Password</a></li>
<li><a href="<?php echo base_url();?>master/Item/logout"><i class="icon-logout"></i>Logout</a></li>
</ul>
<!-- /user action menu -->

</li>
</ul>


</div>
</div>
</div>
<?php }?>
<!-- /main header -->
<form class="form-horizontal" role="form" method="post" action="Lead/update_activity" enctype="multipart/form-data">			
<div id="modal-1" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
        <div id="contentactivity">

        </div>
    </div>	 
</div>
</form>
<script>
function addActivity(v){
//alert(v);
//var customerandloc=document.getElementById("customer_id").value;     

//var pro=v+'^'+customerandloc;
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "addactivity?ID="+v, false);
 xhttp.send();
 //alert(xhttp.responseText);
 document.getElementById("contentactivity").innerHTML = xhttp.responseText;
}


function notify(){
//alert();
var not=document.getElementById("notic").value;
document.getElementById("putthe").innerHTML=not;
if(not!=0){
	document.getElementById("putting").innerHTML=not;
}else{
	document.getElementById("putting").style.display="none";
}
}
</script>