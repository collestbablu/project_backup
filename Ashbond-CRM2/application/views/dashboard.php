<?php 
$this->load->view("header.php");

$co = $this->session->userdata('comp_id');

?>
<div class="main-content">

<h1 class="page-title" style="display:none">Dashboard</h1>
<br>

<!-- Row-->
<div class="row">


<div class="col-md-12"> 
<div class="panel panel-default">

<!-- calendar body --> 
<div class="panel-body"> 
<?php //include("includes/include.inc.php"); 

@extract($_POST);

function curPageName() 
{
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
if($save =='')
{
	$month=@date("n")."|".@date("F");
	$year=@date("Y");
}
$mon=explode('|',$month);
/* draws a calendar */
function draw_calendar($month1,$year1,$monthname,$co)
{
	
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
	/* table headings */
	$headings = array('SUNDAY','MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head" colspan="7" style="font-size:20px;">'.$monthname.' '.$year1.'</td></tr>';
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = @date('w',mktime(0,0,0,$month1,1,$year1,$co));
	$days_in_month = @date('t',mktime(0,0,0,$month1,1,$year1,$co));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';
			$calendar.='<div class="inner-div">';
  			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$filterdate = $year1."-".$month1."-".$list_day;
			//$now=date("Y-m-d");
			
			if($co=='1')
			{
				$qry="select * from tbl_activity A, tbl_leads L,tbl_contact_m C where L.lead_id=A.lead_id AND L.contact_id=C.contact_id  AND A.nxt_action_date='$filterdate' ";	
			}
			else
			{
				$qry="select * from tbl_activity A, tbl_leads L,tbl_contact_m C where L.lead_id=A.lead_id AND L.contact_id=C.contact_id AND A.nxt_action_date='$filterdate' AND A.comp_id='$co' ";	
			}
			
			$idfetch1 = mysql_query($qry) or die($qry."<br>".mysql_error());
			$i=1;
			while($result21=mysql_fetch_array($idfetch1))
			{
				 $sales_id=mysql_query("select first_name from tbl_contact_m where contact_id='".$result21['sales_person_id']."' and group_name='3' ");
				 $getName=mysql_fetch_array($sales_id);
				 $sname = $getName['first_name'];
				 //$sp_name=$getName->first_name;
				$t="Task ".$i;
				if($result21["nxt_action_date"] !=''){$t=$result21["first_name"]."_".$sname."(".$result21["lead_number"].")";}
				$url=$result21["lead_id"];
				//Printing the Link
				//$calendar.= "<button class='btn btn-sm modalAddActivity' onclick='addActivity()' id='".$url."' href='#addactivity' type='button' data-toggle='modal' data-backdrop='static' data-keyboard='false'>Add Activity</button>";
				//$calendar.= '<a href="#" id="'.$url.'" onclick="addActivity(this.id);" data-toggle="modal" data-backdrop="static" data-keyboard="false">'.$t.'</a><br>';
				$calendar.= '<a href="#" data-toggle="modal" onclick="ViewActivityData('.$url.');" data-target="#modal-1">'.$t.'</a><br>';
				//End Printing the Link
				$i++;
			}
			$calendar.='</div>';
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8  && $days_in_this_week > 1 ):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php //include('includes/title.php') ?>
<link href="css/crm.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="css/menu-css/demo.css">
<link rel="stylesheet" href="css/menu-css/bootstrap.min.css">
<style>
/* calendar */
table.calendar		{ border-left:1px solid #E3EBF4;color:#FFF; width:100%; }
tr.calendar-row	{  }
td.calendar-day	{ font-size:14px; position:relative; } 
td.calendar-day:hover	{ background:#eceff5; }
td.calendar-day-np	{ background:#FAFAFA; min-height:80px; } 
td.calendar-day-head { background:#F1F5FA; font-weight:bold; text-align:center; width:70px; padding:10px; border-bottom:1px solid #E3EBF4; border-top:1px solid #E3EBF4; border-right:1px solid #E3EBF4; color:#333333; }
div.day-number{  padding:2px; color:#000; font-weight:bold; float:left; width:20px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np 
{ height:90px; padding:0px; border-bottom:1px solid #E3EBF4; border-right:1px solid #E3EBF4; vertical-align: top;text-align:center;}

div.inner-div
{
height:60px;/*overflow:auto;*/text-align:left;padding:0px 0px 0px 5px;
}

.table-row {
    width: 100%;
    height: auto;
    float: left;
    margin: 0 0 20px 0px;
}

.container-right-text {
    width: 100%;
    height: auto;
    float: left;
    margin: 0 0 0 0px;
    padding: 10px;
}


</style>
<script>
function popup(url){
	var width = 700;
    var height = 500;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
 var myWindow = window.open(url, "Dizypro", windowFeatures);
	}
</script>
</head>
<body>
<div class="wrapper_"><!--header close-->
<div class="clear"></div>
<div class="container_"><!--container-left close-->
<?php //include('includes/sidebar.php') ?>
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<div class="title">
<h1> Activity Calendar</h1> 
<form action="" method="post">
<div class="actions-right">

<div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<form action="" method="post">
<?php

	//if($_GET['id']=='')
{
?>
<table class="bordered table table-striped table-bordered table-hover dataTables-example">

<tr>
<td>Select Month</td>
<td>
<select name="month" class="form-control">
<option value="1|January" <?php if($month=='1|January'){echo 'selected';}?>>January</option>
<option value="2|February" <?php if($month=='2|February'){echo 'selected';}?> >February</option>
<option value="3|March" <?php if($month=='3|March'){echo 'selected';}?> >March</option>
<option value="4|April" <?php if($month=='4|April'){echo 'selected';}?> >April</option>
<option value="5|May" <?php if($month=='5|May'){echo 'selected';}?> >May</option>
<option value="6|June" <?php if($month=='6|June'){echo 'selected';}?> >June</option>
<option value="7|July" <?php if($month=='7|July'){echo 'selected';}?> >July</option>
<option value="8|August" <?php if($month=='8|August'){echo 'selected';}?> >August</option>
<option value="9|September" <?php if($month=='9|September'){echo 'selected';}?> >September</option>
<option value="10|October" <?php if($month=='10|October'){echo 'selected';}?> >October</option>
<option value="11|November" <?php if($month=='11|November'){echo 'selected';}?> >November</option>
<option value="12|December" <?php if($month=='12|December'){echo 'selected';}?> >December</option>
</select>
</td>
<td>Select Year</td>
<td>
<select name="year" class="form-control">
<option value="2015"<?php if($year=='2015'){echo 'selected';}?> >2015</option>
<option value="2016"<?php if($year=='2016'){echo 'selected';}?> >2016</option>
<option value="2017"<?php if($year=='2017'){echo 'selected';}?> >2017</option>
<option value="2018"<?php if($year=='2018'){echo 'selected';}?> >2018</option>
<option value="2019"<?php if($year=='2019'){echo 'selected';}?> >2019</option>
<option value="2020"<?php if($year=='2020'){echo 'selected';}?> >2020</option>
<option value="2021"<?php if($year=='2021'){echo 'selected';}?> >2021</option>
<option value="2022"<?php if($year=='2022'){echo 'selected';}?> >2022</option>
<option value="2023"<?php if($year=='2023'){echo 'selected';}?> >2023</option>
<option value="2024"<?php if($year=='2024'){echo 'selected';}?> >2024</option>
<option value="2025"<?php if($year=='2025'){echo 'selected';}?> >2025</option>

</select>
</td>
<td> <input name="save" type="submit" value="show" class="btn btn-sm" /> </td>
</tr>
</table>
<div >

<?php
//echo '<h2>'.$mon[1].' '.$year.'</h2>';
echo "<br>".draw_calendar($mon[0],$year,$mon[1],$co);
?>
</div>
<?php } ?>
<!--bordered close-->
<div class="clear"></div>
<div class="paging-row">
<div class="paging-right">
<div class="actions-right">

</form></div>
</div></div></div>
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
        $('#menu2').metisMenu({ toggle: false});
         $('#menu3').metisMenu({doubleTapToGo: true});
    });
</script>
<!--<form class="form-horizontal" role="form" method="post" action="<?=base_url();?>crm/Lead/update_activity" enctype="multipart/form-data">			
<div id="modal-1" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
        <div id="contentactivity">

        </div>
    </div>	 
</div>
</form>-->
<script>
/*function addActivity(v){
//alert(v);
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "addactivity?ID="+v, false);
 xhttp.send();
 //alert(xhttp.responseText);
 document.getElementById("contentactivity").innerHTML = xhttp.responseText;
}*/

/*function view_activity(v){
//alert(v);

var ur = "<?=base_url('crm/Lead/view_activity');?>"
$.ajax({   
				  
					type: "GET",  
					url: ur,  
				    data: {"ID":v},  
					success: function(data)  
					{   
						document.getElementById("contentactivity").innerHTML = data;
					}   
				});

}
*/
</script>
<!--left-menu-js-close-->
</body>
</html>
<?php //include('includes/footer.php') ?>

</div> 
</div> 
<!-- /calendar body close -->
</div>
</div>
</div>
<?php $this->load->view("footer.php");?>