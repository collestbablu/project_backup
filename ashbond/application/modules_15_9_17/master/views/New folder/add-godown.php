<?php
$tableName='tbl_godown_mst';
$location='manage_godown'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php //$this->load->view('common/title'); ?>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
        $('#godown_name').change(function(){
            var val = $('#godown_name').val();
            $('#print_name').val(val);
        });
     });
</script>


<body>
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







function getBranch(zone_id) {	



	

///alert(zone_id);

		var strURL="getBranch?zone_id="+zone_id;



		



		var req = getXMLHTTP();



		



		if (req) {



			



			req.onreadystatechange = function() {



				if (req.readyState == 4) {



					// only if "OK"



					if (req.status == 200) {						



						document.getElementById('branchdiv').innerHTML=req.responseText;						



					} else {



						alert("There was a problem while using XMLHTTP:\n" + req.statusText);



					}



				}				



			}			



			req.open("GET", strURL, true);



			req.send(null);



		}



				



	}











function getDivision(branch_id) {	



		var strURL="getDivision?branch_id="+branch_id;


//alert(strURL);
		



		var req = getXMLHTTP();



		



		if (req) {



			



			req.onreadystatechange = function() {



				if (req.readyState == 4) {



					// only if "OK"



					if (req.status == 200) {						



						document.getElementById('divndiv').innerHTML=req.responseText;						



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
<!--hide nad show password-->

<script src="js/menu-js/jquery.min.js"></script>

<script src="js/menu-js/bootstrap.min.js"></script>

<script src="js/menu-js/metisMenu.min.js"></script>



<script>
(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };
}(jQuery));
<!--calling above fucntion to field-->
$.toggleShowPassword({
    field: '#pass',
    control: '#test2'
});
</script>

<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->
<?php if(@$_GET['popup']=='True') {
	} else { 

	$this->load->view('sidebar');

	  } ?><div id="b2" class="right-colum">

<div class="right-colum-text">

<div class="table-row">

<div class="title">

<div class="title">

<h1>Godwn Group DETAILS</h1>

<form action="insert_godown" method="post">



<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 { 

 if(@$_GET['id']==''){?>

 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



	  <?php }else {?>

      <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>



	   <?php } }?>



<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">


<table class="bordered">

<thead>



<tr>

<th colspan="4">Godwn DETAILS</th>        

</tr>



</thead>

<tr>




<?php
if(@$_GET['id']!='' or @$_GET['mid']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_godown_mst where status='A' and godown_id='".$_GET['id']."' or godown_id='".$_GET['mid']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!='' ){
 


  ?>         


<td style="display:none"><input type="text" name="godown_id" class="span6 "value="<?php echo $branchFetch->godown_id;?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by godown_id desc limit 0,1");
$row = $query->row();

?>

    <td style="display:none"><input type="text" name="godown_idd" value="<?php if (count($row)!=''){ echo $row->godown_id+1; } else{ echo 1; }?>" readonly size="22" class="span6 " aria-required='true' /></td>

                <?php }?>

<td class="text-r"><star>*</star>
  Godwn Name:</td>     
        
<td>
<?php if($_GET['mid1']==1) { ?>
<input type="hidden" name="midd1" value="<?php  echo $mid=2;?>">
<?php }else { ?>
<input type="hidden" name="mid" value="<?php if(@$_GET['mid']==''){ echo $mid=1;}else{echo $midd=@$_GET['mid'];}?>">
<?php } ?>
<input name="godown_name" onChange="godownfun(this.value)" type="text" class="span6" id="godown_name"  size="22"  aria-required='true' value="<?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->godown_name; }?>"/><a id="godowndiv" style="color:#FF0000"></a></td>



 <?php if(@$_GET['mid']!='' or (@$branchFetch->main_godown_id!='') ){
 $ugroup=$this->db->query("SELECT * FROM tbl_godown_mst where godown_id='".@$_GET['mid']."'" );
		$ungroup=$ugroup->row();
	//$ugroup=mysql_query("SELECT * FROM tbl_godown_mst where godown_id='".$ungroup['godown_name']."'" );
 ?>
 
 <td class="text-r"><?php $az=0; if(@$ungroup->godown_name!='' or (@$branchFetch->main_godown_id!='1') ){ $az=1; echo "Under Group:";}?></td>         

<td ><input name="undergroup" id="undergroup" type="<?php if($az==1){ echo "text";}else{echo"hidden";} ?>" class="span6" value="<?php if(@$ungroup->godown_name!='') { echo $ungroup->godown_name;}else{ 

@$ugrou="select * from $tableName where status='A' and godown_id='".$branchFetch->main_godown_id."'"; 
   
$ung = $this->db->query($ugrou);
$row = $ung->row();

echo @$row->godown_name;} ?>"  size="22"  aria-required='true' /><input name="mid1" type="hidden"  class="span6" size="22"  aria-required='true'  value="<?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->main_godown_id; }?>"/></td>
<?php }?>


</tr>        

<tr>

<td class="text-r"><star>*</star>Print Name</td>

<td><input name="printname" type="text" id="print_name" class="span6" size="22"  aria-required='true'  value="<?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->printname; }?>"/></td>
<td class="text-r"><star>*</star>Alias</td>

<td><input name="alias" onChange="aliesfun(this.value)" type="text" class="span6" size="22" aria-required='true'  value="<?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->alias; }?>" /><a id="aliesdiv" style="color:#FF0000"></a></td>
</tr>
<tr>
<td class="text-r"><star>*</star>
 Description</td>
	<td><textarea name="description" type="text" cols="80" rows="6"><?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->Description; }?></textarea></td>
</tr>
</table>


<!--bordered close-->

<div class="clear"></div>



<div class="paging-row">

<div class="paging-right">



<div class="actions-right">

<?php 



 if(@$_GET['view']!='' ){

 

 }

 else

 {

if(@$_GET['id']==''){?>





 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



 <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>



	      <?php }}?>





<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>



</div><!--paging-right close-->

</div><!--paging-row close-->



</div><!--table-row close-->

</div><!--container-right-text close-->





</div><!--container-right close-->







</div><!--container close-->



<div class="clear"></div><!--footer--row close-->



</div><!--wrapper close-->





<!--left-menu-js-->

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
<!--hide nad show password-->
<script>
(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };
}(jQuery));
<!--calling above fucntion to field-->
$.toggleShowPassword({
    field: '#pass',
    control: '#test2'
});
</script>



<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>

<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>

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



function aliesfun(alias) {
		
		var strURL="alies_godown?alias_godowid="+alias;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
				
						document.getElementById('aliesdiv').innerHTML=req.responseText;
												
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}



function godownfun(godown_name) {
		
		var strURL="godownfunction?godown_id="+godown_name;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
				
						document.getElementById('godowndiv').innerHTML=req.responseText;
												
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




</body>

</html>

<?php //include('includes/footer.php') ?>

