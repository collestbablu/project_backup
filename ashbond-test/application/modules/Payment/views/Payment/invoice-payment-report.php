<?php 

$tableName="tbl_invoice_payment";
 
	
@extract($_POST);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

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

function openpopup(url,width,height,ev,id) {

      //   newWindow = window.open("add-address.php", null, "height=400,width=1000,status=yes,toolbar=no,menubar=no,location=");  

	var width = width;

    var height = height;

    var left = parseInt((screen.availWidth/2) - (width/2));

    var top = parseInt((screen.availHeight/2) - (height/2));

    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;

    myWindow = window.open(url+".php?&popup=True&"+ev+"="+id, "subWind"+url, windowFeatures);



 }

	



function getCid(cid) {	

	

		var strURL="get_cid.php?cid="+cid;

		

		var req = getXMLHTTP();

		

		if (req) {

			

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {						

						document.getElementById('ciddiv').innerHTML=req.responseText;						

					} else {

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}

				

	}

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("select").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("select").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>

<script>
function grater()
{
var countin=document.getElementById("countin").value;

var y;
for(y=1;y<=countin;y++)
{

var billamount_receive=document.getElementById("billamount_receive"+y).value;
billamount_receive=Number(billamount_receive);
var billamount=document.getElementById("billamount"+y).value;
billamount=Number(billamount);
var remaining=document.getElementById("remaining"+y).value;
remaining=Number(remaining);
var tg=document.getElementById("tg"+y).value;

if(billamount_receive>billamount && remaining=='')
{
alert("Given amount is grater in Invoice No.:- "+tg);
}
else if(remaining!='' && billamount_receive>remaining)
{
alert("Given amount is grater in Invoice No.:- "+tg);
}
}
}
</script>
<script>

function receivealert()
{

var tot_bill_rec=document.getElementById("total_billamt_receive").value;
tot_bill_rec=Number(tot_bill_rec);
var tot_bill_amt=document.getElementById("total_billamt").value;
tot_bill_amt=Number(tot_bill_amt);
var due_amnt=document.getElementById("due_amount").value;
due_amnt=Number(due_amnt);


if(tot_bill_rec>tot_bill_amt && due_amnt=='')
{
alert("given amount is grater");
}
else if(tot_bill_rec>due_amnt && due_amnt!='' )
{
alert("given amount is grater");
}

}

</script>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Welcome to CRM</title>

<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />



<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">

</head>



<body>



<div class="wrapper"><!--header close-->

<div class="clear"></div>



<div class="container"> 

<?php //include('includes/sidebar.php') ?>

<div class="container-left"><!--left-menu close-->



</div><!--container-left close-->




<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">

<div class="title">
<?php 
$contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='".$_GET['id']."'");
$contactFetch=$contactQuery->row();

?>
<h1>(<?php echo $contactFetch->first_name." ".$contactFetch->middle_name." ".$contactFetch->last_name; ?> )  </h1> 

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

<!--<a href="print-product-stockreport.php<?php //echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export-csv-product-stock-report.php<?php //echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">-->
<table class="bordered" id="dataTables-example1">

    <thead>
    <tr>
	<th width="13%">Date</th>
   
<th width="24%">Debit Amount</th>

<th>Credit Amount</th>

<th width="28%">Closing Balance  </th>
<th>Modes</th>
    </tr>
    </thead>
	<?php
	@extract($_POST);
	if($_GET['id']!='')
	
	
	
	{
       
	
	    	
		$queryy="select * from $tableName where  contact_id='".$_GET['id']."' order by id asc ";
		
		if($fdate!='')
		{
			$todate=explode("-",$_REQUEST['todate']);
			$fdate=explode("-",$_REQUEST['fdate']);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";    //$queryy  = $queryy . "and maker_date >='$fdate' and maker_date <='$todate'";
		}
	}
	
	
	
	
	
	@$result=$this->db->query($queryy);
	
	$i=$start;
	$j=1;
	$total_billamt=0;
	$z=1;
	
	
	foreach($result->result() as $line) {    //while(@$line=mysql_fetch_array($result)){
	$i++;   
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }
   @extract($line);
   
 if($line->status=='Purchaseorder'){
    $c+=$line->receive_billing_mount; 
 
}
 $dd=$line->date;
   ?>
   <tr>
  
	<td><?php echo $dd; ?></td>
   
	<td><?php if($line->status=='Purchaseorder'){?><input type="text" name="billamount[]" id="billamount<?php echo $z;?>" value="<?php echo $line->receive_billing_mount;?>" readonly /><?php } else{?><input type="text" name="billamount[]" id="billamount<?php echo $z;?>" value="0" readonly /><?php }?></td>
	</td>
	
	
	<?php 
	
	
		
	?>
	<td><?php if($line->status=='payment'){?>
	    <input type="text" name="billamount[]2" id="billamount[]" value="<?php echo $line->receive_billing_mount;?>" readonly />
	   <!-- <a ><img src="<?php echo base_url();?>/assets/images/edit.png" alt="" border="0" class="icon" title="Delete" onclick="openpopup('invoice_correction',650,400,'id=','<?php echo $line->id;?>')" /></a>--></td>
	<?php } else{?><input type="text" name="billamount[]" id="billamount <?php echo $z;?>" value="0" readonly /><?php }?>
	
	
	<td><?php if($line->status=='payment'){?><input type="text" name="billamount[]" id="billamount<?php echo $z;?>" value="<?php echo $c-=$line->receive_billing_mount;?>" readonly /><?php }else {?><input type="text" name="billamount[]" id="billamount<?php echo $z;?>" value="<?php echo $c;?>" readonly /><?php } ?>	</td>
	<td>
	<p><?php echo $line->pay_modes;?></p>
	</td>
	</tr>
 
	<?php
	$debit_total=$debit_total+$balance_total;
	$credit_totals=$credit_totals+$rem_amt12;
	$closing_bal=$closing_bal+$rem_amt;
	 $z++;   
	 }
	 
	 
	?>
	
<input type="text" id="countin" style="display:none;" value="<?php echo $countin;?>" />
</table>
<table class="bordered" style="display:none">
<tr>
<td width="10%"></td>
<td  width="15%"></td>
<td width="25%"><input type="text" name="debit_totals" value="<?php echo $debit_total;?>" style="width:140px" /></td>
<td width="15%"><input type="text" name="credit_totals" value="<?php echo $idcount1;?>" style="width:140px" /></td>
<td></td>
<td></td>
</tr>
<tr>
<td width="10%"></td>
<td  width="15%"></td>
<td width="25%"><font size="+1">Closing Balance</font></td>
<td width="15%"><?php echo $idcount1;?></td>
<td></td>
<td></td>
</tr>
<tr>
<td width="10%"></td>
<td  width="15%"></td>
<td width="25%"><font size="+1"><?php echo $debit_total;?></font></td>
<td width="25%"><font size="+1"><?php echo $debit_total;?></font></td>
<td></td>
<td></td>
</tr>
</table>
</form>
<!--bordered close-->

<div class="clear"></div>

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










 var myWindow;
function openpopup(url,width,height,ev,id) {
      //   newWindow = window.open("add-address.php", null, "height=400,width=1000,status=yes,toolbar=no,menubar=no,location=");  
	var width = width;
    var height = height;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open(url+"?&popup=True&"+ev+""+id, "subWind"+url, windowFeatures);
 }



    </script>



</body>

</html>

