<?php
@session_start();
@$main=$_session['main'];
@$submain=$_session['submain'];
@$sub=$_session['sub'];
@$page0=$_SERVER["PHP_SELF"];
@$page=explode('/',$page0);
@$page2=$page[count($page)-1];
@$page1=$page[count($page)-1]."?".$_SERVER['QUERY_STRING'];
 
$query = $this->db->query("SELECT * FROM cybercodex_module_function where status='A' and function_url='$page1' || function_url='$page2' ");
$row = $query->row();
@$MN=$row->module_name;
@$UR=$row->func_id;
@$GP=$row->function_group;
$role = $this->session->userdata('role');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php //include('includes/title.php') ?>
</head>
<body onLoad="aaa()">
<div class="header">
<div class="header-row">
<div class="clear"></div>

<div class="container">
<div class="logo"><a href="dashboar"><img src="<?php echo base_url()?>assets/images/cybercodex-logo.png" alt="" border="0" style="height:45px;width:70px;position:absolute;" />
<a href="dashboard.php"></a></div>
<div class="header-right">
<div class="blogroll">

<p><?php echo $this->session->userdata('user_name');?><img src="<?php echo base_url()?>assets/images/arrow.png" alt="" /></p>
<ul>
<li><a href="./change-password.php">Change Password</a></li>
<li><a href="logout">Logout</a></li>
</ul></div>
</div>

</div></div>
<div class="wrapper">


<div class="search-row">
<div class="select-row">
<select name="menu1" disabled onChange="MM_jumpMenu('parent',this,0)">
    <option>All Records</option>
	<option>1</option>
	<option>1</option>
	<option>1</option>
	<option>1</option>
	<option>1</option>
	<option>1</option>
	<option>1</option>
  </select>
</div><!--select-row close-->
<div class="search-row-l"><input type="text" readonly placeholder="Type keyword and press enter" ></div>
<div class="search-row-r"><button type="submit"><img src="<?php echo base_url()?>assets/images//search.png" alt="" border="0" /></button>
</div>
</div><!--search-row close-->
<div class="advanced-row">
<a href="#">Advanced</a>
</div><!--advanced-row close-->
<div class="header-right">

</div><!--header-right close-->
</div><!--header-row close-->
</div><!--header close-->
<div class="clear"></div>
<div class="container">
<div class="container-left">
<div id="b" class="menu-clum">
<div class="left-menu">
<aside class="sidebar">
<nav class="sidebar-nav">

<?php
echo "<ul id='menu'>";
$mod_sql = $this->db->query("select module_id,module_name,module_url from cybercodex_module_mst where status='A' order by Order_id");
$countsss=1;
foreach ($mod_sql->result() as $mod_fetch){
$module_sqldata = $this->db->query("select COUNT(function_url) as ct from cybercodex_role_func_action where role_id='".$role."' and module_id='".$mod_fetch->module_id."' and action_id !='Inactive'");
$module_fetchdata = $module_sqldata->row();
$module_fetchdata->ct;
  if($module_fetchdata->ct >0) {

?>

<li <?php if($mod_fetch->module_id==$MN){ ?> class="active" <?php }?>>

<?php
	echo "<a href='#'>".$mod_fetch->module_name."<span class='glyphicon arrow'></span></a>";
	echo "<ul class='collapse'>";
	//echo "select distinct f.function_group from cybercodex_module_function f  join cybercodex_role_func_action rf on f.func_id=rf.function_url where rf.role_id='".$role."' and rf.action_id !='Inactive' and f.module_name='".$mod_fetch->module_id."'";
	$mod_sql2 = $this->db->query("select distinct f.function_group from cybercodex_module_function f  join cybercodex_role_func_action rf on f.func_id=rf.function_url where rf.role_id='".$role."' and rf.action_id !='Inactive' and f.module_name='".$mod_fetch->module_id."'");
	foreach ($mod_sql2->result() as $mod_fetch2){
			$mod_sql3 = $this->db->query("select func_id,function_name,function_url from cybercodex_module_function where status='A' and module_name='".$mod_fetch->module_id."' and function_group='".$mod_fetch2->function_group."'");
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
                if( @$rr != 'Inactive')
                {
?>					<li><a href="<?php echo $mod_fetch3->function_url; ?>" <?php if($mod_fetch3->func_id==$UR){  ?>style="background-color:white;
color:black;"<?php }?>>
<?php echo $mod_fetch3->function_name; ?>
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
<input type="button" id="b1" class="menu-icon" onClick="aaa();"  title="Hide Menu"/>
<input type="button" id="b3" class="menu-icon-2" onClick="aaa();" style="display:none;" title="Show Menu"/>
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
 document.getElementById("b2").style.width="71%";
 hide('b3');
 show('b1');
}
}
function show(id){document.getElementById(id).style.display="block";}
function hide(id){document.getElementById(id).style.display="none";}
</script>
</nav>
</aside>
<!--left-menu-js-->
<script src="<?php echo base_url();?>assets/js/menu-js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/menu-js/metisMenu.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
 var myWindow;
function openpopup(url,width,height,ev,id) {

//bipin
aaa();

      //   newWindow = window.open("add-address.php", null, "height=400,width=1000,status=yes,toolbar=no,menubar=no,location=");  
	var width = width;
    var height = height;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open(url+"?&popup=True&"+ev+"="+id, "subWind"+url, windowFeatures);
 }
    </script>
<script>
    $(function () {
        $('#menu').metisMenu();
        $('#menu2').metisMenu({ toggle: false});
        $('#menu3').metisMenu({doubleTapToGo: true});
    });
</script>
</body>
</html>
