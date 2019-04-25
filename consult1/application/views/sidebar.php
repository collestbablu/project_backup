<div class="header">
<div class="header-row">
<div class="container">
<div class="logo"><a href="<?php echo base_url(); ?>master/dashboar"><img src="<?php echo base_url()?>assets/images/compamy-name.gif" alt="" border="0" /></a>
<a href="dashboard.php"></a></div>
<div class="header-right">
<div class="blogroll">

<p><?php echo $this->session->userdata('user_name');?><img src="<?php echo base_url()?>assets/images/arrow.png" alt="" /></p>
<ul>
<!--<li><a href="../user_profile/profile">Profile</a></li>-->
<li><a href="<?php echo base_url(); ?>master/changePassword/changepwd">Change Password</a></li>
<li><a href="<?php echo base_url(); ?>master/Item/logout">Logout</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php
@session_start();
@$main=$_session['main'];
@$submain=$_session['submain'];
@$sub=$_session['sub'];
@$page0=$_SERVER['REQUEST_URI'];
@$page=explode('/',$page0);
@$page1=@$page[2]."/".@$page[3]."/".@$page[4];
@$page2=@$page[2]."/".@$page[3];
//@$page2="../".@$page[3]."/".@$page[4];
$query = $this->db->query("SELECT * FROM tbl_module_function where status='A' and function_url='$page1' or function_url='$page2' ");
$row = $query->row();
 @$MN=$row->module_name;
 @$UR=$row->func_id;
 @$GP=$row->function_group;
$role = $this->session->userdata('role');
?>
<body onLoad="aaa()">
<div class="container-left">
<div id="b" class="menu-clum">
<div class="left-menu">
<aside class="sidebar">
<nav class="sidebar-nav">
<?php
echo "<ul id='menu'>";
$mod_sql = $this->db->query("select module_id,module_name,module_url from tbl_module_mst where status='A' order by Order_id");
$countsss=1;
foreach ($mod_sql->result() as $mod_fetch){
$module_sqldata = $this->db->query("select COUNT(function_url) as ct from tbl_role_func_action where role_id='".$role."' and module_id='".$mod_fetch->module_id."' and action_id !='Inactive'");
$module_fetchdata = $module_sqldata->row();
 $module_fetchdata->ct;
  if($module_fetchdata->ct >0) {

?>

<li <?php if($mod_fetch->module_id==$MN){ ?> class="active" <?php }?>>
<?php
	
if($mod_fetch->module_name=='Report')
{
?>
<li ><a href="<?php echo base_url()?>report/Report/report_function<?php echo $mod_fetch->function_url; ?>"><?php echo $mod_fetch->module_name; ?><span class='glyphicon arrow'></span></a></li>
<?php
}
else
{
if($mod_fetch->module_name=='Logout')
{
	
}else{
echo "<a href='#'>".$mod_fetch->module_name."<span class='glyphicon arrow'></span></a>";
}
} 
if($mod_fetch->module_name=='Logout')
{

?>	
<li ><a href="<?php echo base_url()?>master/Item/logout<?php echo $mod_fetch->function_url; ?>"><?php echo $mod_fetch->module_name; ?><span class='glyphicon arrow'></span></a></li>

<?php
 }

	//echo "<a href='#'>".$mod_fetch->module_name."<span class='glyphicon arrow'></span></a>";
	echo "<ul class='collapse'>";
	//echo "select distinct f.function_group from tbl_module_function f  join tbl_role_func_action rf on f.func_id=rf.function_url where rf.role_id='".$role."' and rf.action_id !='Inactive' and f.module_name='".$mod_fetch->module_id."'";
	$mod_sql2 = $this->db->query("select distinct f.function_group from tbl_module_function f  join tbl_role_func_action rf on f.func_id=rf.function_url where rf.role_id='".$role."' and rf.action_id !='Inactive' and f.module_name='".$mod_fetch->module_id."'");
	foreach ($mod_sql2->result() as $mod_fetch2){
			$mod_sql3 = $this->db->query("select func_id,function_name,function_url from tbl_module_function where status='A' and module_name='".$mod_fetch->module_id."' and function_group='".$mod_fetch2->function_group."'");
			
            if($mod_fetch2->function_group !='' )
            {
?>
					<li  <?php if($mod_fetch2->function_group==$GP){  ?> class="active" <?php }?>>
  					<a href='#' <?php if($mod_fetch2->function_group==$GP){  ?>style="background-color:#999;
					color:white;" <?php }?> ><?php echo $mod_fetch2->function_group; ?>
					<span class='a plus-minus'></span></a>
<?php
            echo "<ul class='collapse'>";
            }
foreach ($mod_sql3->result() as $mod_fetch3){
$rr1=$this->db->query("select action_id from tbl_role_func_action where function_url='".$mod_fetch3->func_id."' and role_id='".$role."' and module_id='".$mod_fetch->module_id."'");
$rr = $rr1->row();
 $rr->action_id;
                if( $rr->action_id != 'Inactive')
                {
?>					<li ><a href="<?php echo base_url();?><?php echo $mod_fetch3->function_url; ?>" <?php if($mod_fetch3->func_id==$UR){ ?>style="background:#000!important"<?php }?> ><?php echo $mod_fetch3->function_name; ?>
</a> </li>
<?php
    }
    }
      if($mod_fetch2->function_group !='')
    {
       echo "</ul>
       </li>";
echo @$mod_fetch3->module_name;
    }
	}
	echo "</ul></li>";
}
}
echo "</ul>";
 ?>
 
</nav>
</aside><!--sidebar close-->
</div><!--left-menu close-->
</div>
</div><!--container-left close--><!--container-right close-->
<div class="menu-icon">
<input type="text" id="b1" class="menu-icon" onClick="aaa();"  title="Hide Menu"/>
<input type="text" id="b3" class="menu-icon-2" onClick="aaa();" style="display:none;" title="Show Menu"/>
</div>
<script>
function aaa()
{
 if(document.getElementById("b").style.display!="none")
{
 hide('b');
 document.getElementById("b2").style.width="95%";
 hide('b1');
 show('b3');
}else{
 show('b');
 document.getElementById("b2").style.width="75%";
 hide('b3');
 show('b1');
}
}
function show(id){document.getElementById(id).style.display="block";}
function hide(id){document.getElementById(id).style.display="none";}
 $(document).ready(function() {
	//aaa();
         });
		 
		 
		 
		 
		 
		 
		 
		
var myWindow;

 

	 

function openpopup(url,width,height,ev,id) {

      //   newWindow = window.open("add-address.php", null, "height=400,width=1000,status=yes,toolbar=no,menubar=no,location=");  

	var width = width;

    var height = height;

    var left = parseInt((screen.availWidth/2) - (width/2));

    var top = parseInt((screen.availHeight/2) - (height/2));

    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;

    myWindow = window.open(url+"?&popup=True&"+ev+"="+id, "subWind"+url, windowFeatures);



 }

	

    </script>

</script>

