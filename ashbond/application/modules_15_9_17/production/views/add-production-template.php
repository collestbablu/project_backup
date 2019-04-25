<?php
//Ignore Error 269
error_reporting (E_ALL ^ E_NOTICE);
$tableName="cybercodex_production_template";
$location="manage_production_template";
  //primary ref id 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php //include('includes/title.php'); ?>

<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">




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
function getpr1(Product_id)
{	
 //alert("h");
	//var cat_id=cat_id;
	var strURL="get_unit_pos.php?Product_id="+Product_id;
	
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {						
					document.getElementById('unitdiv').innerHTML=req.responseText;						
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
	
	
</head>
<body>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->

<?php if(@$_GET['popup']=='True') {

	} else { 



	$this->load->view('sidebar');



	  } ?>
	  
	  <div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<div class="title">
<h1 >Production Template</h1> 
<form action="insert_production" method="post">

<div class="actions-right">
<?php if($_GET['view']!='' ){
 }
 else
 {
if($_GET['id']==''){?>
 <td> <input name="save" type="submit" value="Save" class="submit"  onclick="return cc('tbl');" /></td>
	  <?php }else {?>
	   <td> <input name="edit" type="submit" value="Save" class="submit"  onclick="return cc('tbl');"/> </td>
	   <?php } }?>

<?php if($_GET['popup'] == 'True') {?>
<a href="javascript:closepopup();" title="Cancel" class="submit"> Cancel</a>
	   	 <?php }else {  ?>
       <a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>
       <?php } ?><div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<?php

  if(@$_GET['id']!='' or @$_GET['view']!=''){

	@$userQuery = $this->db->query("SELECT * FROM $tableName where template_id='".@$_GET['id']."' or template_id='".@$_GET['view']."'");

	@$userFetch = $userQuery->row();
}else{
@$userQuery1 = $this->db->query("SELECT * FROM $tableName ");

	@$userFetch1 = $userQuery1->row();}

?>

<div id="maindiv" >
<table class="bordered">
<thead>
<tr>
<th colspan="5"><b>Create New Production Template</b></th>        </tr>
</thead>
<tr>
<td class="text-r"><star>*</star>BOM Name:</td>
<td style="width:300px; ">
<input type="text" name="bom_name"  id="address_1" class="rounded" value="" />
</td>
<td class="text-r"><star>*</star>Product:
</td>

 <td style="width:300px;">
 <select name="product_id" id="url" class="rounded" tabindex="20"  <?php if(@$_GET['view']!=""){?> disabled <?php } ?> >
		<option value="">---select---</option>
		<option value="xyz"><?php if(@$userFetch->product_id=="xyz"){?> selected="selected" <?php } ?>XYZ</option>
		<option value="">twadasgk</option>
				 
                 <?php
$unitQ=$this->db->query("select * from cybercodex_master_data where key1='Usage Unit' ");
 foreach(@$unitQ->result() as $unitF){
//while($unitF=mysql_fetch_array($unitQ)){?>

<option value="<?php echo $unitF->serial_number;?>"<?php if($unitF->serial_number==$line->unit_type){?> selected <?php }?>><?php echo $unitF->keyvalue?></option>
                <?php }?>
                 </select>            
				     </td>
					 
					 <td style="width:300px;"></td>
</tr>
<tr>
<td class="text-r"> <star>*</star>
Quantity:</td>
 <td id="unitdiv" >
 <input type="text" name="address_1"  id="Quantity" class="rounded" value="" /></td>					 
					 
<td class="text-r"> <star>*</star>
Expenses:</td>
<td colspan="2"><input type="text" name="expenses"  id="address_1" class="rounded" style="width:200px;"  value="" /></td>
</tr> 
<tr>
<td class="text-r"> <star>*</star>
Specify:</td>
 <td id="unitdiv">
 <select name="specify" id="url" class="rounded" tabindex="20"  <?php if(@$_GET['view']!=""){?> disabled <?php } ?> >
<option value="">---select---</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
 </td>
<td class="text-r"> <star>*</star>
Specify Consumed:</td>
 <td id="unitdiv" >
 <select name="	Specify_consumed" id="url" class="rounded" tabindex="20"  <?php if(@$_GET['view']!=""){?> disabled <?php } ?> >
 
<option value="">---select---</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
 </td>
       
</table>
<?php if($_GET['id']==''){?>
<table class="bordered">
<tr>
<td>
<span style="width:250px;border:1px solid;background: #ccc;cursor:pointer;padding:9px;margin:5px;" onClick="insertnewrow('tbl',0);">
INSERT ROWS<!--<input type="button" value="Insert 1 Row" id="nh" onclick="insertnewrow('tbl');" style="width:200px"></input>--></span>
<select id="irow" style="width:50px">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
<span id="msg" style="color:red;font:16px bold;"></span>
</td>
<!--<td>
<input type="button" value="Delete last row" onclick="deletelastrow('tbl');"></input></td>
<td>
<input type="button" value="Check" onclick="check('tbl');"></input></td>
<td>
<input type="button" value="Get Data" onclick="getData('tbl');"></input></td>
-->

</tr>
</table>
<?php }?>

<table class="bordered" id='tbl'>
<thead>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>Raw Material </th>
<th>Quantity</th>
<th>Unit Type</th>
<th>Action</th>
</thead>
<tr id="tblrow" >
<td name="count">0</td>
<td>


<select name="rawmaterial_id[]" onchange='getpr2(this.value);'>
<option value="">--Select Material--</option>
<?php
$mod_sql2 = $this->db->query("select * from cybercodex_product_stock");
	foreach ($mod_sql2->result() as $mod_fetch2){
	
	?>
<option value="<?php echo $mod_fetch2->Product_id; ?>"><?php echo $mod_fetch2->productname;?></option>

<?php }?>
</select>



</td>
<td>
<input type="text" name="rawmaterial_quantity[]" style="width:75px" />
</td>
<div id="unitdiv2" >
<td >
<select name="rawmaterial_id[]" onchange='getpr2(this.value);'>
<option value="">--Select Material--</option>
<?php
$mod_sql2 = $this->db->query("select * from cybercodex_master_data");
	foreach ($mod_sql2->result() as $mod_fetch2){
	
	?>
<option value="<?php echo $mod_fetch2->serial_no; ?>"><?php echo $mod_fetch2->keyvalue;?></option>

<?php }?>
</select>
 <?php //echo param_dropdown('Usage Unit','rawmaterial_unittype','','onchange="getData(\'tbl\')"'); ?>

 </td>
</div>
<td>
<input type='button' value='Delete' onclick='deleteselectrow(this,0)'/>
</td>
</tr>

</table>
</div>
<div>
</div>

<!--bordered close-->
<div class="clear"></div>
<div class="paging-row">
<div class="paging-right">
<div class="actions-right">
<?php if($_GET['view']!='' ){
 }
 else
 {
if($_GET['id']==''){?>
 <td> <input name="save" type="submit" value="Save" class="submit"/> </td>
	  <?php }else {?>
	   <td> <input  name="edit" type="submit" value="Save" class="submit"  /> </td>
	   <?php  }}?>

<?php if($_GET['popup'] == 'True') {?>
<a href="javascript:closepopup();" title="Cancel" class="submit"> Cancel</a>
	   	 <?php }else {  ?>
       <a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>
       <?php } ?></form></div>
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

<script>
/* Table Insertion Editing deletion */
function deletelastrow(tableid) {
	if(document.getElementById(tableid).rows.length>2)
	{
		document.getElementById(tableid).deleteRow(-1);
	}
}

function deleteselectrow(r,v) {
    var i = r.parentNode.parentNode.rowIndex+v;
    document.getElementById("tbl").deleteRow(i);
	var le=document.getElementById("tbl").rows.length;
	
	for(var i=1;i < le;i++)
	{
		try{
		document.getElementById("tbl").rows[i+1].cells[0].innerHTML = i-v;
		}catch(Ex){}
	}
	getData('tbl');
	check('tbl');
}

function insertnewrow(tableid,v) {
var p=0;
var x = document.getElementsByName("rawmaterial_id")[0].length;
var table = document.getElementById(tableid);
var getrow =document.getElementById("tblrow");
var rc =eval(document.getElementById("irow").value);
for(var i=0;i < rc;i++)
{
	if(table.rows.length <= x+v)
	{
		var lastRow = table.rows[table.rows.length - 1 ];
		var c=eval(lastRow.cells[0].innerHTML);
		var row = table.insertRow(-1);
		for(var j=0;j<getrow.cells.length;j++)
		{
			row.insertCell(0);
		}
		row.cells[0].innerHTML  = c+1;
		for(var j=1;j<getrow.cells.length;j++)
		{
			row.cells[j].innerHTML = getrow.cells[j].innerHTML;
		}
		//alert("");
	}else{
		//alert("");
		p=1;}
}
if(p==1){alert("Row cant Be Exceeded by total No. of materials");}
check(tableid);
for(var i=0;i < table.rows.length;i++)
{
	var le=document.getElementById(tableid).rows.length;
	for(var i=1;i< le-1;i++)
	{
		document.getElementsByName("rawmaterial_id")[i].setAttribute("required", true);
		document.getElementsByName("rawmaterial_quantity")[i].setAttribute("required", true);
		document.getElementsByName("rawmaterial_unittype")[i].setAttribute("required", true);
	}
}
//alert(p);

}


function cc(tableid)
{
	getData(tableid);	
	var p =check(tableid);
   if(p=="false")
   {
	alert("Same Materials not Allowed Same in Rows");
	return false;
   }else{return true;}
}

function getData(tableid)
{
//	alert("getdata");
	var le=document.getElementById(tableid).rows.length;
	getelebyid("pqry").value="";
	for(var i=1;i< le;i++)
	{
		try{
		getelebyid("pqry").value+=getelebyname("rawmaterial_id")[i].value+"^";
		getelebyid("pqry").value+=getelebyname("rawmaterial_quantity")[i].value+"^";
		getelebyid("pqry").value+=getelebyname("rawmaterial_unittype")[i].value;
		if(i<(le-2)){	getelebyid("pqry").value+="|";	}
		}catch(ex){}
	}
	//getelebyid("p").innerHTML="hello";
}
/* Table Insertion Editing deletion */
/*----------------------------------------------------------------------------*/
/*searching in Materials*/
    var ddlText, ddlValue, ddl,ddl1, lblMesg;
    function CacheItems() {
        ddlText = new Array();
        ddlValue = new Array();
        ddl1 = document.getElementById("rawmaterial_idcache");
        //lblMesg = document.getElementById("lblMessage");
        for (var i = 0; i < ddl1.options.length; i++) {
            ddlText[ddlText.length] = ddl1.options[i].text;
            ddlValue[ddlValue.length] = ddl1.options[i].value;
        }
    }
	
    window.onload = CacheItems;
    function FilterItems(value,ctl) {
	var x = ctl.parentNode;
	ddl = x.getElementsByTagName("select")[0];
	//alert(ddl.innerHTML);
        ddl.options.length = 0;
        for (var i = 0; i < ddlText.length; i++) {
            if (ddlText[i].toLowerCase().indexOf(value.toLowerCase()) != -1) {
                AddItem(ddlText[i], ddlValue[i]);
            }
        }
		check('tbl');
        //lblMesg.innerHTML = ddl.options.length + " items found.";
        //if (ddl.options.length == 0) { AddItem("No items found.", "");}
		
    }
   
    function AddItem(text, value) {
        var opt = document.createElement("option");
        opt.text = text;
        opt.value = value;
        ddl.options.add(opt);
    }
/*searching in Materials*/
/*----------------------------------------------------------------------------*/
/*Basic Functions*/
	function getelebyid(id)	{		 return document.getElementById(id);	}
	
	function getelebyname(name)	{		 return document.getElementsByName(name);	}
	
	function getelebytagname(Tagname)	{		 return document.getElementsByTagName(Tagname);	}
/*Basic Functions*/
</script>

<script type="text/javascript">
function divDisabled(ctl) {
var inp=document.getElementsByTagName(ctl);
for(var i=0;i<inp.length;i++){	inp[i].setAttribute('disabled',false);}	
}

function alldisabled()
{
	divDisabled('*');
	//divDisabled('input');
	//divDisabled('select');
	//divDisabled('textarea');
}

//check('tbl');

</script>

 <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/jquery.dataTables.js"></script>

  <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<script src="<?php echo base_url();?>/assets/js/sb-admin.js"></script>
<script>
    $(function () {
        $('#menu').metisMenu();
        $('#menu2').metisMenu({ toggle: false});
         $('#menu3').metisMenu({doubleTapToGo: true});
    });
</script>

<script>
function getpr2(Product_id)
{	

	
  //alert(Product_id);
	//var cat_id=cat_id;
	var strURL="get_unit_pos.php?Product_id="+Product_id;
	
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {						
					document.getElementById('unitdiv2').innerHTML=req.responseText;						
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


<!--left-menu-js-close-->
<?php if($_GET["view"] !=''){echo "<script>alldisabled();</script>";} ?>
</body>
</html>

<?php // include('includes/footer.php') ?>