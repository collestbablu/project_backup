 <?php 


    $tableName="tbl_product_stock";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">

<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script>

//////////////////////////////////////

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



</script>



<script>

function showimagepreview(input) {

	if (input.files && input.files[0]) {

	var filerdr = new FileReader();

	filerdr.onload = function(e) {

	$('#imgprvw').attr('src', e.target.result);

	}

	filerdr.readAsDataURL(input.files[0]);

	}

}

</script>




<script>

function getpr1(product_id)

{	

getpr();

 //alert("h");

	//var cat_id=cat_id;
	

	var strURL="get_unit_pos?product_id="+product_id;
	

	

	var req = getXMLHTTP();

	if (req) {

		req.onreadystatechange = function() {

			if (req.readyState == 4) {

				// only if "OK"

				if (req.status == 200) {						

					document.getElementById('unitdiv').innerHTML=req.responseText;						

				} else {

					//alert("There was a problem while using XMLHTTP:\n" + req.statusText);

				}

			}				

		}			

		req.open("GET", strURL, true);

		req.send(null);

	}

				

	}

	</script>

</head>

<body>

<div class="wrapper"><!--header close-->

<div class="clear"></div>

<?php if($_GET['empId']!='' and $_GET['pge_Nm']!=''){ ?>

<?php } else { ?>

<div class="container"><!--container-left close-->
<?php if(@$_GET['popup']=='True') {
	} else { 
	$this->load->view('sidebar');
	  } ?>
<div id="b2" class="right-colum">

 <?php } ?>

<div class="right-colum-text">

<div class="table-row">

<div class="title" style="  background-color: #ffffff;">

<h1>Add Product Quantity </h1> 

<form method="post" action="insert_product_quantity"  enctype="multipart/form-data">

<div class="actions-right">

<?php if($_GET['view']!='' ){

 }

 else

 {

 if($_GET['editId']==''){?> 

 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>

	  <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

    <?php } }?>

<script>      

 function close_window() {	close(); }

</script>

<?php

if($_GET['pge_Nm']!='' && $_GET['prId']!='')

{



?>

<a href="javascript:close_window();" title="Cancel" class="submit"> Cancel</a>

<?php



}

else

{



?>

<a href="<?php echo $location;?>" title="Cancel" class="submit"> Cancel</a>

<?php }?>		



<div class="clear"></div>



</div><!--title close-->

 

<div class="container-right-text">

<div class="table-row">

<?php



$idfetch = "SELECT * FROM $tableName ";



$idfetch1 = $this->db->query($idfetch) or die(mysql_error());

 

	$result21=$idfetch1->row();

 ?>


<?php if ($_GET['editId'] != '' ) {  

 $abc=$this->db->query("select * from $tableName where serial_number = '".$_GET['editId']."'");

 $EditData = $abc->row();

// @extract($EditData);

?>

<table class="bordered">

<thead>

<tr>

<th colspan="4"><b>Update New Quantity.</b></th>        

</tr>

</thead>

<tr>

<td class="text-r"><star>*</star>Product Name: </td>

 <td><select tabindex="1"  name="product_id" required onChange="getprevquantity(this.value)">

 <option value="">---Select---</option>

  <?php 

  if($_REQUEST["product"] !=''){$product_id = $_REQUEST["product"];}

 		$industry_idQuery=$this->db->query("select * from tbl_product_stock where status='A' and comp_id = '".$_SESSION['SESS_COMPANY']."' order by productname");

 		foreach($industry_idQuery->result() as $industry_idFetch){

   ?>

	<option value="<?php echo $industry_idFetch->Product_id;?>"<?php  if($industry_idFetch->Product_id==$EditData->product_id) {  ?> selected <?php } ?>> <?php echo $industry_idFetch->productname;  ?> </option>

  <?php } ?>

 </select> 

 </td>

 <td class="text-r">Usage Unit:</td>         

<td>

</td>



  

  <td class="text-r"><star></star>Current Stock : </td>

	<td><input type="text" name="prev_quantity" class="span6 "value="<?php echo $EditData->prev_quantity;?>" size="22"  aria-required='true' readonly tabindex="2" /></td>

	</tr><tr>

<td class="text-r"><star>*</star>Quantity : </td>

	<td><input type="text" name="new_quantity" class="span6 "value="<?php echo $EditData->new_quantity;?>" size="22" required aria-required='true'  tabindex="2" /></td>

	

</tr>

</table>

<?php }

	elseif($_GET['view']!='') { 

		$abcView=$this->db->query("select * from $tableName where serial_number = '".$_GET['view']."'");

		$ViewData = $abcView->row();

		//@extract($ViewData);

 ?>

<table class="bordered">

<thead>

<tr>

<th colspan="4"><b>Update New Quantity.</b></th>        

</tr>

</thead>

<tr>

<td class="text-r"><star>*</star>Product Name: </td>

 <td>

 

  <select tabindex="1"  name="product_id" required onChange="getprevquantity(this.value)">

 <option value="">---Select---</option>

  <?php 

  if($_REQUEST["product"] !=''){$product_id = $_REQUEST["product"];}

 		$industry_idQuery=$this->db->query("select * from tbl_product_stock where status='A' and comp_id = '".$_SESSION['SESS_COMPANY']."' order by productname ");

 		foreach($industry_idQuery->result() as $industry_idFetch){

   ?>

	<option value="<?php echo $industry_idFetch->Product_id;?>"<?php  if($industry_idFetch->Product_id==$ViewData->product_id) {  ?> selected <?php } ?>> <?php echo $industry_idFetch->productname;  ?> </option>

  <?php } ?>

 </select> 

 

 </td>

 <td class="text-r"><star>*</star>Usage Unit:</td>         

<td>



<?php //echo param_dropdown('Usage Unit','usageunit',$usageunit); ?>

</td>



  

  <td class="text-r"><star></star>Current Stock : </td>

	<td><input type="text" name="prev_quantity" class="span6 "value="<?php echo $ViewData->prev_quantity;?>" size="22"  aria-required='true' readonly tabindex="2" /></td>

	</tr><tr>

<td class="text-r"><star>*</star>Quantity : </td>

	<td><input type="text" name="new_quantity" class="span6 "value="<?php echo $ViewData->new_quantity;?>" size="22" required aria-required='true'  tabindex="2" /></td>

</tr>

</table>





<?php }else{  ?>





<table class="bordered">

<thead>

<tr>

<th colspan="4">





<input type="radio" name="u" id="nq" checked="checked"   />
<b>Update New Quantity.</b> 
<input type="radio" name="u" id="cq" onClick="sq(this)"  style="display:none"  />
<b style="display:none">Update chalan Quantity</b>
</th> 
</tr>
</thead>
</table>

<table class="bordered" id="tn">

<thead>

<tr>

<th colspan="4"></th>        
</tr>
</thead>

<tr>

<td class="text-r"><star>*</star>Product Name: </td>

 <td><input name="text" type="text" id="srch" style="width:20%" onKeyUp = "FilterItems(this.value,this)" onkeydown="CacheItems()"/>
   <select name="product_id" id="product_id" style="width:50%" required onChange='getpr1(this.value);' >
     <option value="">---Select---</option>
     <?php 

 $selectemp=$this->db->query("select * from tbl_product_stock where status='A'");

 foreach($selectemp->result() as $catFetch){ 
 
 $sizeQ1=$this->db->query("select * from tbl_master_data where serial_number='$catFetch->size'");
	$fetchSize1=$sizeQ1->row();?>
 
     <option value="<?php echo $catFetch->Product_id;?>"<?php if($catFetch->Product_id == $product_detail) { ?> selected="selected" <?php } ?>><?php echo $catFetch->productname; ?><?php //echo "(".$fetchSize1->keyvalue.")";?> </option>
     <?php } ?>
   </select>
   <select name="droprawcache" id="droprawcache" style="display:none">
<option value="">---Select---</option>
<?php $selectempl = "select * from tbl_product_stock where status='A'";

 $selectemp=$this->db->query($selectempl);

 foreach($selectemp->result() as $catFetch){ 

	$sizeQ=$this->db->query("select * from tbl_master_data where serial_number='$catFetch->size'");
	$fetchSize=$sizeQ->row();?>
<option value="<?php echo $catFetch->Product_id;?>"<?php if($catFetch->Product_id == $product_det) { ?> selected="selected" <?php } ?>><?php echo $catFetch->productname;?><?php echo "(".$fetchSize->keyvalue.")";?> </option>
<?php } ?>
</select>
  <br/> 
   



 </td>

 <td class="text-r"><star>*</star>Usage Unit:
 </td>         

<td id="unitdiv">





</td>
	</tr>

	<tr>

	<td class="text-r"><star>*</star>Location : </td>

	<td><select tabindex="5" name="location_id"  required onChange="getpr()">

	<option value="">---Select---</option>

	  <?php 

			$industry_idQuery=$this->db->query("select * from tbl_location where status='A'");

			foreach($industry_idQuery->result() as $industry_idFetch){

	   ?>

		<option value="<?php echo $industry_idFetch->id;?>"<?php if($industry_idFetch->id==$location_id) {  ?> selected <?php } ?>> <?php echo $industry_idFetch->location_name;  ?> </option>

	  <?php } ?>

 </select> </td>

	

<td class="text-r"><star></star>Current Stock : </td>

	<td><input type="text" name="prev_quantity" class="span6 " size="22"  aria-required='true' tabindex="2" /></td>
</tr>

	<tr>

	<td class="text-r"><star>*</star>Quantity : </td>

	<td><input type="text" name="new_quantity" class="span6 " size="22" required aria-required='true' tabindex="3" onKeyUp="document.getElementsByName('total')[0].value=Number(document.getElementsByName('prev_quantity')[0].value)+Number(this.value);"/></td>

	<td class="text-r"><star>*</star>Total Quantity : </td>

	<td><input type="text" name="total" class="span6 " size="22" required aria-required='true' tabindex="4" readonly /></td>
	</tr>
</table>

<?php }?>

<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">

<div class="paging-right">

<div class="actions-right">

<?php if($_GET['view']!='' ){ } else {

if($_GET['editId']==''){?> 

 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>

	  <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

   <?php } }?>



<?php

if($_GET['pge_Nm']!='' && $_GET['prId']!='')

{

?>

<a href="javascript:close_window();" title="Cancel" class="submit"> Cancel</a>

<?php

}

else

{

?>

<a href="<?php echo $locationurl;?>" title="Cancel" class="submit"> Cancel</a>

<?php }?>

</form>

</div><!--paging-right close-->
</div><!--paging-row close-->
<br/><br/>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div>
<div class="clear"></div><!--footer--row close-->

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
function popupclose(){
window.close();
}
</script>
<!--left-menu-js-close-->
 <!-- Page-Level Plugin Scripts - Tables -->
<script src="<?php echo base_url();?>/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>/assets/js/sb-admin.js"></script>
 
    <script>

    $(document).ready(function() {

        $('#dataTables-example').dataTable();

    });
   </script>

<script>


function showchalan() {

	  var soid=document.getElementById("soid").value;

	 uid= soid.split(',');

	 var url='inventory-check_meterial.php?soid='+uid[0]+'&brid='+uid[1]+'&add=true'; 

	var width = 400;

    var height = 600;

    var left = parseInt((screen.availWidth/2) - (width/2));

    var top = parseInt((screen.availHeight/2) - (height/2));

    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;

    myWindow = window.open(url, "subWind", windowFeatures);



 }

	



function getprevquantity(val)

{

  if (val.length != 0) 

  { 

	var xmlhttp = new XMLHttpRequest();

	xmlhttp.open("GET", "getprevproduct.php?prid=" + val, true);

    

	    xmlhttp.onreadystatechange = function() 

		{

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 

			{

                var pr=eval(xmlhttp.responseText);

//alert(pr);

				if(pr>=0)

				{

					document.getElementsByName("prev_quantity")[0].value=pr;

					

					

				}

            }

        }

    

    xmlhttp.send();

  }

}



function getpr()

{



//alert(pr);
	var v = document.getElementsByName("product_id")[0].value;
	var loc = document.getElementsByName("location_id")[0].value;

var lv=loc+"~"+v;
//alert(lv);
	//var lv = document.getElementsByName(loc)[0].value;

	//var v = document.getElementsByName(pr)[0].value;

    var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){

		  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 

			{

				var pr = (xmlhttp.responseText);

			if(pr.length>0){

				document.getElementsByName("prev_quantity")[0].value=pr;



		    }else{

				document.getElementsByName("prev_quantity")[0].value=0;

				

			}

			if(document.getElementsByName('new_quantity')[0].value.length <=0){document.getElementsByName('new_quantity')[0].value=0;}

			document.getElementsByName('total')[0].value=parseFloat(document.getElementsByName('prev_quantity')[0].value)+parseFloat(document.getElementsByName('new_quantity')[0].value);

		  }

        }

    xmlhttp.open("GET", 'getProdTransf?locid='+lv, true);

    xmlhttp.send();

}

</script>

<script>

function sq(t)

{

	

	var tc=document.getElementById("tc");

	var tn=document.getElementById("tn");

	

	var a=t.id;

	if(a=='cq')

	{

		

		tn.style.display="none";

		tc.style.display="inline";

		

	}

	else

	{

		tn.style.display="inline";

		tc.style.display="none";

	}


}



/*searching in Materials*/

    var ddlText, ddlValue, ddl,ddl1, lblMesg;

    function CacheItems() {

        ddlText = new Array();

        ddlValue = new Array();
		//getpr1();	
        ddl1 = document.getElementById("droprawcache");
			
        //lblMesg = document.getElementById("lblMessage");

        for (var i = 0; i < ddl1.options.length; i++) {

            ddlText[ddlText.length] = ddl1.options[i].text;

            ddlValue[ddlValue.length] = ddl1.options[i].value;

        }

    }

  // window.onload = CacheItems;
	

    function FilterItems(value,ctl) {

	var x = ctl.parentNode;

	ddl = x.getElementsByTagName("select")[0];
	
		
	//alert(ddl.innerHTML);

        ddl.options.length = 0;
		
        for (var i = 0; i < ddlText.length; i++) {

            if (ddlText[i].toLowerCase().indexOf(value) != -1) {

                AddItem(ddlText[i], ddlValue[i]);

            }
			
		
        }
		getpr1(document.getElementById("product_id").value);
        lblMesg.innerHTML = ddl.options.length + " items found.";

        if (ddl.options.length == 0) {

            AddItem("No items found.", "");

        }


    }

   

    function AddItem(text, value) {

        var opt = document.createElement("option");

        opt.text = text;

        opt.value = value;
			//alert(opt.value);
		//document.getElementById("droprawcache").onload = function() {getpr1(v)};		
        
		ddl.options.add(opt);
		//alert():
		//window.onload.getpr1(opt);
    }

/*searching in Materials*/

</script>
</body>
</html>





