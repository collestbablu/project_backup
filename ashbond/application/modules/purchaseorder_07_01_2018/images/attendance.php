<?php include("includes/include.inc.php"); 
protect_admin_page();
$da= @date('Y');
//$tableName="dizypro_invoice_hdr";

//deepak
//this code for vat total changes in table dizypro_invoice_hdr 

@extract($_POST);
//  
if($submit!='')
{
@extract($_POST);
//$cnt=count($emplo_id);
for($i = 0; $i < count($emplo_id); $i++)
 {
$empid=$emplo_id[$i];
$attend_yn=$attend_yesno[$i];

 $todate1=explode("-",$todate3);
 $todate2="$todate1[0]"."-"."$todate1[1]";


$selectData="select attend_date2,attend_empid from cybercodex_attendence_mst where attend_date2='$todate3' and attend_empid='$empid'";
$resultData=mysql_query($selectData);
$rowData=@mysql_fetch_array($resultData);

if($rowData['attend_date2']==$todate3 && $rowData['attend_empid']==$empid)
{

 $updataData="update cybercodex_attendence_mst set attend_yesno='$attend_yn', attend_date='$todate2'  where attend_date2='$todate3' and attend_empid='$empid'";
 mysql_query($updataData);

}
else 
{

$insertquery="insert into cybercodex_attendence_mst set attend_empid='$empid', attend_yesno='$attend_yn', attend_date='$todate2', attend_date2='$todate3', maker_date=NOW(), author_date=now(), author_id='".$_SESSION['ADMIN_GAME_ID']."', maker_id='".$_SESSION['ADMIN_GAME_ID']."', divn_id='".$_SESSION['SESS_Division']."', comp_id='".$_SESSION['SESS_COMPANY']."', zone_id='".$_SESSION['SESS_zone']."', brnh_id='".$_SESSION['SESS_Branch']."'";

mysql_query($insertquery);
}

}


}


?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Welcome to CRM</title>

<link href="css/crm.css" rel="stylesheet" type="text/css" />

<link href="css/styles.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/menu-css/metisMenu.min.css">

<link rel="stylesheet" href="css/menu-css/demo.css">

<link rel="stylesheet" href="css/menu-css/bootstrap.min.css">

</head>

<body>

<div class="wrapper"><!--header close-->

<div class="clear"></div>



<div class="container"> 

<?php  include('includes/sidebar.php') ?>
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<?php if($_REQUEST['saletrc'] =='1') { ?>
<h1>Employee Attendance</h1> 
<?php } else { ?>
<h1>Employee Attendance</h1> 
<?php } ?>
<div class="actions">

<div class="blogroll">

   

	</div>

</div><!--actions close-->





<div class="search-row-to">


</div><!--search-row-to close-->



<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">
<form method="post">
<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Search Employee List </b></th>        
</tr>
</thead>
<tr>
<td class="text-r">Date:</td>
	<td ><input type="date" name="todate" id="todate" size="22" class="rounded"  /> <input type="submit" name="Search" value="Search" class="submit" style=" float:right;"/></td>
 <td style="width:400px;"> </td>
</tr>
 
</table>
<br/>
<div class="table-row" >
<table class="bordered"id="dataTables-example">
    <thead>
    <tr>
<th>Employee Name</th>

<th>Attendance</th>

<th>Date</th>

	</tr>
    </thead>
	<?php
	// this code for searching all Search Employee List on click search button
	 @extract($_POST);
	if($Search!='')
	  {
		  $queryy="select * from dizypro_emp_mst"; /*where status !='in' AND comp_id = '".$_SESSION['SESS_COMPANY']."'"*/
	  
 			$result=mysql_query($queryy);
		
   while(@$line=mysql_fetch_array($result)){

    @extract($line);
   ?>
<?php if($todate!=''){ ?>
<tr>

<td>
<input type="hidden" name="emplo_id[]" size="10" value="<?php echo $emp_id; ?>"><?php echo $emp_name; ?>
</td>
<td>
<select name="attend_yesno[]" >

<?php 
$selectyn= "select attend_date2,attend_empid,attend_yesno from cybercodex_attendence_mst where attend_empid='$emp_id'";
$resuyn=mysql_query($selectyn);
while($rowyn=mysql_fetch_array($resuyn))
{
echo $rowyn['attend_date2'];
 ?>
 <?php if($todate==$rowyn['attend_date2']) { ?>
<option value="<?php echo $rowyn['attend_yesno']; ?>" selected="selected"><?php echo $rowyn['attend_yesno']; ?></option>
<?php } ?>

<?php } ?>
<option value="---Select---">---Select---</option>
<option value="Yes">Yes</option><option value="No">No</option>
</select></td>
<td><input type="hidden" name="todate3" size="10" value="<?php echo $todate; ?>"><?php echo $todate;?></td>

</tr>
<?php } ?>

	<?php } 
	
	}?>
	
</table>
<div id="applyvat" style="width:100px; float: right;">
<input type="submit" name="submit" id="submit" value="Submit" class="submit"> 
</div>
</form>
 </div></div></div>
</div><!--table-row close-->



</div><!--div close-->

</div><!--container close-->



</div><!--paging-right close-->

</div><!--paging-row close-->

<!--paging-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->

</div><!--container close-->



<div class="clear"></div><!--footer--row close-->

<?php include('includes/footer.php') ?>



</div><!--wrapper close-->

<!--Scroll js-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="js/jquery.dragscroll.js"></script>

<script>

		$(document).ready(function() { 

			$('#container').dragScroll({});

		});

	</script>

    <script type="text/javascript">



  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-36251023-1']);

  _gaq.push(['_setDomainName', 'jqueryscript.net']);

  _gaq.push(['_trackPageview']);



  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();



</script>

<!--Scroll js close-->



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



 <!-- Page-Level Plugin Scripts - Tables -->



    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>



    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>



    <!-- SB Admin Scripts - Include with every page -->



    <script src="js/sb-admin.js"></script>



    <!-- Page-Level Demo Scripts - Tables - Use for reference -->




    <script>



    $(document).ready(function() {



        $('#dataTables-example').dataTable();



    });



function PeriodChanged(val){
	
	if(val == 'Month'){
		{
        // Create an Option object
 document.getElementById("DropDownList").innerHTML='';
       
        var opt = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt);
        // Assign text and value to Option object
        opt.text = 'January';
        opt.value = '01';
	
               
     var opt2 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt2);
        // Assign text and value to Option object
        opt2.text = 'February';
        opt2.value = '02';
		
		
		 var opt3 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt3);
        // Assign text and value to Option object
        opt3.text = 'March';
        opt3.value = '03';
		
		
		 var opt4 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt4);
        // Assign text and value to Option object
        opt4.text = 'April';
        opt4.value = '04';
		
		
		 var opt5 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt5);
        // Assign text and value to Option object
        opt5.text = 'May';
        opt5.value = '05';
		
		
		 var opt6 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt6);
        // Assign text and value to Option object
        opt6.text = 'June';
        opt6.value = '06';
		
		
		 var opt7 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt7);
        // Assign text and value to Option object
        opt7.text = 'July';
        opt7.value = '07';
		
		
		 var opt8 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt8);
        // Assign text and value to Option object
        opt8.text = 'August';
        opt8.value = '08';
		
		
		 var opt9 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt9);
        // Assign text and value to Option object
        opt9.text = 'September';
        opt9.value = '09';
		
		
		 var opt10 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt10);
        // Assign text and value to Option object
        opt10.text = 'October';
        opt10.value = '10';
		
		
		 var opt11 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt11);
        // Assign text and value to Option object
        opt11.text = 'November';
        opt11.value = '11';
		
		
		 var opt12 = document.createElement("option");
        
		
		//var a = array.split(",");		
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt12);
        // Assign text and value to Option object
        opt12.text = 'December';
        opt12.value = '12';
		
		
		}
}
		
	
	if(val == 'Year'){
		{
        // Create an Option object
 document.getElementById("DropDownList").innerHTML='';
       
        var opt = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt);
        // Assign text and value to Option object
        opt.text = '2010';
        opt.value = '2010';
		
		var opt1 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt1);
        // Assign text and value to Option object
        opt1.text = '2011';
        opt1.value = '2011';
		
		var opt2 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt2);
        // Assign text and value to Option object
        opt2.text = '2012';
        opt2.value = '2012';
		
		var opt3 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt3);
        // Assign text and value to Option object
        opt3.text = '2013';
        opt3.value = '2013';
		
		var opt4 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt4);
        // Assign text and value to Option object
        opt4.text = '2014';
        opt4.value = '2014';
		
		var opt5 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt5);
        // Assign text and value to Option object
        opt5.text = '2015';
        opt5.value = '2015';
		
		var opt6 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt6);
        // Assign text and value to Option object
        opt6.text = '2016';
        opt6.value = '2016';
		
		var opt7 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt7);
        // Assign text and value to Option object
        opt7.text = '2017';
        opt7.value = '2017';
		
		var opt8 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt8);
        // Assign text and value to Option object
        opt8.text = '2018';
        opt8.value = '2018';
		
		var opt9 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt9);
        // Assign text and value to Option object
        opt9.text = '2019';
        opt9.value = '2019';
		
		var opt10 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt10);
        // Assign text and value to Option object
        opt10.text = '2020';
        opt10.value = '2020';
		
		
               
    }
	}
	
	
	if(val == 'Quarter_year'){
	{
        // Create an Option object
 
    document.getElementById("DropDownList").innerHTML='';   
        var opt = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt);
        // Assign text and value to Option object
        opt.text = '1st';
        opt.value = '0103';
		
		var opt1 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt1);
        // Assign text and value to Option object
        opt1.text = '2st';
        opt1.value = '0306';
		
		var opt2 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt2);
        // Assign text and value to Option object
        opt2.text = '3st';
        opt2.value = '0609';
		
		var opt3 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt3);
        // Assign text and value to Option object
        opt3.text = '4st';
        opt3.value = '0912';
               
    }
	}
	if(val == 'Half_year'){
	{
        // Create an Option object
 
    document.getElementById("DropDownList").innerHTML='';   
        var opt = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt);
        // Assign text and value to Option object
        opt.text = '1st Half';
        opt.value = '0106';
		
		 var opt1 = document.createElement("option");
        
        // Add an Option object to Drop Down/List Box
        document.getElementById("DropDownList").options.add(opt1);
        // Assign text and value to Option object
        opt1.text = '2st Half';
        opt1.value = '0612';
		
               
    }
	}
}



    </script>




</body>

</html>

