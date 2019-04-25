<?php include("includes/include.inc.php"); 
protect_admin_page();



 
 	  $tableName="dizypro_branch_m";

  $location="manage-branch.php";
  //primary ref id 

	if($save!=''){

		trim(@extract($_POST));
trim('$brnh_id');
		

	$sql_c="select code from $tableName where code='$code'";

		$result_c=mysql_query($sql_c) or die(mysql_error());

		if(mysql_num_rows($result_c)>0)

		{

			$_SESSION['SESS_MSG']='Code Name Already Exist!';

			header("Location: $location");

			exit;

		}

		else

		{

			   $sql="insert into $tableName set
brnh_id='$brnh_id',code='$code',brnh_name='$brnh_name',comp_id='$comp_id',zone_id='$zone_id'";

			mysql_query($sql) or die(mysql_error());

			$_SESSION['SESS_MSG']='Added Successfully!';

			header("Location: $location");

			exit;

			}

	}

	

	if($edit!=''){

		trim(@extract($_POST));

		$user_namee=strtolower ($user_name);

	   $sql="update $tableName  set

brnh_id = '$brnh_id',code='$code',brnh_name='$brnh_name',comp_id,='$comp_id',zone_id='$zone_id'
					 where brnh_id='".$_GET['id']."'";

		 

		mysql_query($sql) or die(mysql_error());

		$_SESSION['SESS_MSG']=' Edited Successfully!';

		header("Location: $location");

		exit;

	}



	if($_POST['submit']=='Active'){

	trim(@extract($_POST));

	if(is_array($cid)){

	$mem_id=implode(',',$cid);

	}else{

	$mem_id=$cid;

	}

	if(count($cid)>1){

	

	$sql="update $tableName set status='Active' where brnh_id in ($mem_id)";

	$res=mysql_query($sql) or die(mysql_error());

	$_SESSION['SESS_MSG']=count($cid).' Records Activated';

	header("Location: $location");

	}else{

	$sql="update $tableName set status='Active' where brnh_id='$mem_id'";

	$res=mysql_query($sql) or die(mysql_error());

	$_SESSION['SESS_MSG']=count($cid).' Records Activated';

	header("Location: $location");

	exit;

 	}

 }

if($_POST['submit']=='Inactive'){

	trim(@extract($_POST));

	if(is_array($cid)){

	$mem_id=implode(',',$cid);

	}else{

	$mem_id=$cid;

	}

	if(count($cid)>1){

	

	$sql="update $tableName set status='Inactive' where brnh_id in ($mem_id)";

	$res=mysql_query($sql) or die(mysql_error());

	$_SESSION['SESS_MSG']=count($cid).' Records Inactivated';

	header("Location: $location");

	}else{

	$sql="update $tableName set status='Inactive' where brnh_id='$mem_id'";

	$res=mysql_query($sql) or die(mysql_error());

	$_SESSION['SESS_MSG']=count($cid).' Records Inactivated';

	header("Location: $location");

	exit;

 	}

 }



if($_POST['submit']=='Delete')

{

 	trim(@extract($_POST));

	if(is_array($cid))

	{

		$mem_id=implode(',',$cid);

	}

	else

	{

		$mem_id=$cid;

	}

	if(count($cid)>1)

	{

			$sql="delete from $tableName  where brnh_id	 in ($mem_id)";

		

	}

	else

	{

		$sql="delete from $tableName where brnh_id='$mem_id'";

	}

	

	$res=mysql_query($sql) or die(mysql_error());

	$_SESSION['SESS_MSG']=count($cid).' Records Deleted';

	header("Location: $location");

	exit;

}







 if($_GET['id']!=''){

  	$sql2="select brnh_id,code,brnh_name from $tableName where brnh_id='".$_GET['id']."'";

	$res12=mysql_query($sql2) or die(mysql_error());

	$line=mysql_fetch_array($res12);

	trim(@extract($line));

	

 }



$start = intval($start);

$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;

$columns = "select brnh_id,code,brnh_name  ";

$sql = "from $tableName where 1 ";

//$sql = apply_filter($sql, $last_name, $phone_name_filter,'last_name');

$order_by == '' ? $order_by = 'brnh_id' : true;

$order_by2 == '' ? $order_by2 = 'asc' : true;

$sql .= "order by $order_by $order_by2 ";

$sql_count = "select count(*) ".$sql; 

$sql .= "limit $start, $pagesize ";

 $sql = $columns.$sql;

//print $sql;	

$result = mysql_query($sql) or die(db_error($sql));

$reccnt = db_scalar($sql_count);

if($reccnt==0)

{

$_SESSION['SESS_MSG']='No Records Found';

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("includes/title.php"); ?>
<link href="css/crm.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="css/menu-css/demo.css">
<link rel="stylesheet" href="css/menu-css/bootstrap.min.css">


<body>

<div class="wrapper"><!--header close-->
<div class="clear"></div>

<div class="container"><!--container-left close-->
<?php include('includes/sidebar.php') ?>
<div class="container-right">
<div class="title">
<h1> Company Details</h1> 
<span> <a href="#" title="Save"> Save</a> <a href="#" title="Cancel"> Cancel</a></span>
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div class="table-row">
<form action="" method="post">
<?php
$idfetch = "SELECT brnh_id,code,brnh_name FROM $tableName ";
$idfetch1 = mysql_query($idfetch) or die(mysql_error());

	$result21=mysql_fetch_array($idfetch1);
	
?>

<table class="bordered">
<thead>

<tr>
<th colspan="4"><b>Add Company Details</b></th>        
</tr>

</thead>
  <?php
$idfetch = "SELECT brnh_id FROM $tableName ORDER BY brnh_id DESC limit 0 ,1 ";
$idfetch1 = mysql_query($idfetch) or die(mysql_error());

	$id_fetch=mysql_fetch_array($idfetch1);
	
?>
<tr>

<td class="text-r"><star>*</star>
Branch ID:</td>
 <?php if($_GET['id']!=''){ ?>         
<td><input type="text" name="brnh_id" class="span6 "value="<?php echo $brnh_id;?>" readonly size="22" aria-required='true' /></td>
<?php } else {?>
    <td><input type="text" name="brnh_id" value="<?php echo $id_fetch['brnh_id']+1;?>" readonly size="22" class="span6 " aria-required='true' />                 </td>
                <?php }?>

<td class="text-r"><star>*</star>
Branch Name:</td>
<td><input name="code" type="text" class="span6 "value="<?php echo $code;?>"  size="22" maxlength="35" required aria-required='true' /></td>
</tr>        
<tr>
<td class="text-r"><star>*</star> 
Branch Code:</td>         
<td><input name="brnh_name" type="text" class="span6 "value="<?php echo $brnh_name;?>" size="22" maxlength="20" required aria-required='true' /></td>

<td class="text-r"><star>*</star>
Company Name:</td>
<td><select  placeholder="Enter text" name="comp_id" required>

<option value="">--Select--</option>
<?php
$company=mysql_query("select comp_id,comp_name from dizypro_company_m");
while($comp=mysql_fetch_array($company)){
?>


<option value="<?php echo $comp['comp_id'];?>" <?php if($comp['comp_id']==$comp_id){ ?> selected <?php }?>><?php echo $comp['comp_name'];?>(<?php echo $comp['comp_id'] ?> )</option>
<?php }?>
</select></td>
</tr>        
 <tr>
 <td></td>
 <td></td>
    <td width="116" class="td">Zone Name:</td>
    <td width="210"> <select  placeholder="Enter text" name="zone_id" required>

<option value="">--Select--</option>
<?php
$zon=mysql_query("select zone_id,zone_name from dizypro_zone_m");
while($zone=mysql_fetch_array($zon)){
?>
<option value="<?php echo $zone['zone_id'];?>" <?php if($zone['zone_id']==$zone_id){ ?> selected <?php }?>><?php echo $zone['zone_name'];?>(<?php echo $zone['zone_id'] ?>)</option>
<?php }?>
</select>
              </td>
  </tr>
</table>
<!--bordered close-->
<div class="clear"></div>

<div class="paging-row">
<div class="paging-right">
<?php if($_GET['id']==''){?>
    <td> <input name="save" type="submit" value="Save" /> </td>
	  <?php }else {?>
	   <td> <input name="edit" type="submit" value="Save" /> </td>
	   <?php }?>

<a href="$location" title="Cancel"> Cancel</a>
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



</body>
</html>
<?php include('includes/footer.php') ?>
