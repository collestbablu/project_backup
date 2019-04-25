<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>
<body>
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
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->

<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<div class="title">
	<h1>View Template  </h1> 
<form id="f1" name="f1" method="POST" action="" onSubmit="return checkKeyPressed(a)">
<div class="actions-right">
 <div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<div>
<?php
if(@$_GET['id']!=''){
@$branchQuery = $this->db->query("SELECT * from tbl_template_hdr where template_id='".$_GET['id']."'");
$branchFetch = $branchQuery->row();
// echo $branchFetch->invoiceid;
}
?>
		<table class="bordered">
			
				<tr>
					<th class="text-r"> * Finish Goods:-</th>
			<th>
				<select name="finish_goods" id="finish_goods" <?php if($_GET['id']!=''){ ?> disabled="disabled" <?php } ?> required>
						<option value="">--select--</option>
						<?php 
							$Query=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods'");
							foreach($Query->result() as $fetchQ){
						?>
						<option value="<?php echo $fetchQ->Product_id; ?>" <?php if( $fetchQ->Product_id==$branchFetch->finish_goods){ ?> selected="selected" <?php } ?>><?php echo $fetchQ->productname; ?></option>
						<?php } ?> 
				</select>
			</th>
				
				</tr>
				
		</table>
	
<!--===================================== Start search item row======================================================================-->
		
		<table class="table table-bordered blockContainer lineItemTable ui-sortable" id="lineItemTab" style="margin-bottom:1px">

			<tbody>

				<tr>
					<th style="width:30%;"><div align="center"><b>Product Name </b></div></th>
					<th style="width:15%;"></th>
					<th><div align="center"><b>Quantity     </b></div></th>
										
					<th><div align="center"><b>Unit</b></div></th>
					
				
				</tr>
				<tr style="height:20px;">
					<td>
					<input type="hidden" name="productid" id="productid">
					<div style="width:100%; height:28px;" >
					<input type="text" name="prd" readonly  onkeyup="getdata()" onChange="getdataT()" onClick="getdata()" id="prd" style=" width:85%;"  placeholder=" Search Items..." tabindex="5" ><!--<img   src="<?php echo base_url();?>/assets/images/search11.png"  onclick="showxxall()" onMouseOver="szxchowall1()" />-->

					</div>

					<div id="prdsrch" style="color:black;padding-left:0px; width:22%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
					<?php
				
					$this->load->view('getproduct');

					?>
					</div></td>
					<td></td>
					
					<td align="center"><input type="number"  name="qnt" readonly onKeyUp="quan(this.value)" onChange="quan(this.value)" id='qn' value=""   onfocus="this.select()" style="width:80px;"  /><input type="hidden" name="abqt" id="abqt" /></td>

					<td align="center"> 
					<select id="usunit" onFocus="this.select()" style="width:80px;" readonly>
								
								<?php 
								$MasterDataQueryy=$this->db->query("select * from tbl_master_data where status='ffA' order by serial_number DESC");
									  foreach($MasterDataQueryy->result() as $fetchQ){
								?>
								<option value="<?php echo $fetchQ->serial_number;?>"><?php echo $fetchQ->keyvalue;?></option>
								<?php } ?>
					</select>
					
					 <input type="hidden" id="quantity" name="qutyyyyy"  readonly="readonly"></td>
					
					
					</tr>
				
					</tbody>
				</table>
<!--=========================================== close search Items row =============================-->
</div>

<!--bordered close-->
<!--paging-row close-->
</div>
<!--table-row close-->
<div class="clear"></div>

<!---BILL--->
<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
		<table id="invo" style="width:95%;  background:#dddddd;  height:10px;" title="Invoice"  >
			
			<tr>
				
				<td style="width:240px;"><div align="center"><u>Product</u></div></td>
				
				<td style="width:50px;"><div align="right"><u>Quantity</u></div></td>

				<td style="width:70px;"> <div align="right"><u></u></div></td>
				<td style="width:60px;"><div align="right"><u>Unit</u></div></td>
				
				
				<td style="width:70px;"><div align="right"><u></u></div></td>
				<td style="width:70px;"><div align="right"><u>Action</u></div></td>
			</tr>
		
		</table>
		<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
<table id="invoice2"  style="width:97.6%;  background:white; border-collapse: separate; border-spacing: 3px 10px;" title="Invoice"  cellspacing="2" cellpadding="0" border="0" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

	<caption> Old Items </caption>

<?php

$inviceQ=$this->db->query("select * from tbl_template_dtl where template_id='".$_GET['id']."'");

foreach($inviceQ->result() as $invoiceFetch)
			{


			?>
			<tr>
			<?php

			$query_dtl=$this->db->query("select * from tbl_master_data where serial_number='$invoiceFetch->unit'");
			$query_fetch_dtl=$query_dtl->row();

			$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id'");
			$pfetch=$productQ->row();

			@extract($pfetch);

			?>

			

			<td width="122" style="width:30%; ">
				<div align="center">
				<input type="hidden" name="productid" id="productid">
				<input type="text"  name="<?php $pname="prdh[]"; $pname.=$i; echo $pname;?>" id='<?php $pnameD="prdhD"; $pnameD.=$i; echo $pnameD;?>' value="<?php echo $pfetch->productname;?>^<?php echo $pfetch->Product_id;?>" readonly onblur='testRate<?php echo $i?>();' style="width:100%;border:none" />
				</div>
			</td>

			
<td align="left" style="width:40px;border:none;">&nbsp;</td>	
			<td width="185" align="right" style="width:30px;border:none;">
			
				<input type="number"  name="<?php $qunt="qn[]"; $qunt.=$i; echo $qunt;?>" id='<?php $quntD="qnD"; $quntD.=$i; echo $quntD;?>' onKeyUp="quandata(this.id)" readonly value="<?php echo $invoiceFetch->qnty; ?>" style="width:100%;" />

			</td>

			
			<td align="left" style="width:40px;border:none;">&nbsp;</td>	
			
			<td align="left" style="width:40px;border:none;">
				
				<span id="netPrice0" class="pull-right netPrice">
				<input type="text" name="unt[]" id="<?php $quantyD="unt"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $query_fetch_dtl->keyvalue;?>"   readonly   style="width:100%;" />
		
			</td>
			
			

			<td width="15" align="RIGHT" style="width:20px;border:none;">
				<span id="netPrice0" class="pull-right netPrice">
				<!--<img src="<?php echo base_url();?>/assets/images/edit.png" alt="" border="0" class="icon"  onclick=" editdata('<?php echo $pnameD;?>','<?php echo $ppriceD;?>','<?php echo $quntD;?>','<?php echo $quantyD;?>','<?php echo $total;?>','<?php echo $netD;?>','<?php echo $i;?>',<?php echo $invoiceFetch->purchase_order_dtl_id; ?>,this)")"/>-->
			</td>

			<td width="25" align="center" style="width:20px;border:none; ">
				<span id="netPrice0" class="pull-right netPrice">
				<img src="<?php echo base_url();?>/assets/images/delete.png" alt="" border="0" class="icon" onClick="deletedata(<?php echo $invoiceFetch->purchase_order_dtl_id; ?>,<?php echo $i; ?>,<?php echo $invoiceFetch->total;?>,this)" />
			</td>
			</tr>

			<?php

			 $i=$i+1;

			$subt=$subt+$invoiceFetch->net_price; 

			 } 
			 
			 ?>

</table>



		<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice"   class="table table-bordered blockContainer lineItemTable ui-sortable"  >

			<caption>New Items</caption>

		</table>
<?php		

$q=$row->invoiceid;
$invoiceID=$q+1;

?>
			<input type="hidden" name="rows" id="rows">
			<input type="hidden" name="invoiceID" id="invoiceID" value="<?php echo $invoiceID; ?>">
			<input type="hidden" name="c_name2" id="cn">
			<input type="hidden" name="cust_phone2" id="cmob" />
			<input type="hidden" name="cust_address" id="cadrs">
			<!--//////////ADDING TEST/////////-->
			<input type="hidden" name="spid" id="spid" value="d1"/>
			<input type="hidden" name="ef" id="ef" value="0" />
			<input type="hidden" name="Input" id="did1" value="d1" />
			<input type="hidden" name="dddd1" id="d" value="0" />
			<input type="hidden" name="alal" id="dd1" value="0" />
			<input type="hidden" name="all" id="all" value="0" />
			
</div>

</div>

<!----BILL CLOSE------>
<div class="table-row">

		<table class="bordered"> 

   			<tr> 
				
				<td style="width:70%"></td>
				<td>
				<input type="button" value="SAVE"  tabindex="8" id="sv1" onClick="fsvdfdf(this)" class="submit">
				<a><input type="button" value="Cancel"  tabindex="8" onClick="closeWinCan()" class="submit"></a>
				</td>
			</tr>
		</table>

<!--bordered close-->
<div class="clear"></div>
<div class="paging-row">
<div class="paging-right">
<div class="actions-right">

</form>

</div></div></div></div>
</div><!--paging-right close-->
</div><!--paging-row close-->
</div>
<!--table-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
<div class="clear"></div><!--footer--row close-->
</div><!--wrapper close-->


<script>
//======================================================*Anoj* Start Save Function ============================================
function fsv(v)
{
var rc=document.getElementById("invoice").rows.length;
//alert(rc);

if(rc!=0)
{
v.type="submit";
}
else
{
	alert('No Item To Save..');	
}
}
//======================================================close Save Function ==================================================

//======================================================Start Cancel Function ================================================
function closeWinCan(){
    window.close(); 
}
//======================================================Close Cancel Function ================================================

//======================================================Start Search Images Function ============================================

function showall()
		{

	 var w = 200;

        var h = 200;

        var left = Number((screen.width/2)-(w/2));

        var tops = Number((screen.height/2)-(h/2));
   var myWindow = window.open('all_product_function', "myWindow", "width=600, height=600,top=10, left=500");
  
   }
   
//======================================================Close Search Images Function ============================================

//======================================================Start Fillter Search Function ============================================
function getdata(v)
		  {
		 
		 currentCell = 0;		
		 var tp='Contact';
		 var product1=document.getElementById("prd").value;
		 var product=product1;
		
		    if(xobj)
			 {
			 var obj=document.getElementById("prdsrch");
			 xobj.open("GET","getproduct_fun?con="+product,true);
			
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
			   }
			  }
			  			  
			 }
			 xobj.send(null);
		  }

//======================================================Close Fillter Search Function ============================================


//======================================================Start Enter Function ============================================

window.addEventListener("keydown", checkKeyPressed, false);
//Anoj///
function checkKeyPressed(e) {
	
var s=e.keyCode; 
 
var ppp=document.getElementById("prd").value;
var sspp=document.getElementById("spid").value;

var sspp=document.getElementById(sspp).value;

var ef=document.getElementById("ef").value;
		ef=Number(ef);

var countids=document.getElementById("countid").value;

for(n=1;n<=countids;n++)
{

document.getElementById("tyd"+n).onkeyup = function (e) {

document.getElementById("qn").focus();
document.getElementById("prdsrch").innerHTML=" ";
}
}

//alert("gfhgfh");
document.getElementById("qn").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
document.getElementById("usunit").focus();
}
}
document.getElementById("usunit").onkeydown = function (e) {


  if (e.keyCode == "13")
	 {		 
	 e.preventDefault();
       e.stopPropagation();
	
       if(ppp==sspp || df==1)
		 {
       
         adda();
	
		document.getElementById("ef").value=0;	
		document.getElementById("usunit").value="";					
			document.getElementById("prd").focus;	
var ddid=document.getElementById("spid").value;
var ddi=document.getElementById(ddid);
ddi.id="d";
				
			}
			
	       else
			{
			
	   alert("Enter Correct Product");
			
			}
						
		return false;							
				
    	}
}
}
//======================================================Close Enter Function ============================================

//======================================================ADD ROW FUNCTION===================================================
  var rw=0;	
		var rows=document.getElementById("rows").value;
function adda()
		  {  
		  currentCell = 0;
                  var subtl=0;                                               
				var pd=document.getElementById("prd").value;
				
				var pidss=document.getElementById("productid").value;
				
		        var qn=document.getElementById("qn").value;
			    //var pr=document.getElementById("lph").value;
				var unt=document.getElementById("usunit").value;			  
						
						var e = document.getElementById("usunit");
						var untname = e.options[e.selectedIndex].text;
						//alert(text);
						
          	   var table = document.getElementById("invoice");
			
var qtyInStk=document.getElementById("quantity").value;
var qty=document.getElementById("qn").value;

					if(pd!=""  && Number(qty)!=0)
					{	
						
						var row = table.insertRow(-1);
						rw=rw+1;
        	
						var cell0 = row.insertCell(0);
						//cell0.innerHTML="1";
						var cell1 = row.insertCell(1);
						var cell2 = row.insertCell(2);
			            var cell3 = row.insertCell(3);
				     	 var cell4 = row.insertCell(4);
						var cell5 = row.insertCell(5);
				     	 var cell6 = row.insertCell(6);
						var cell7 = row.insertCell(7);
				     	 var cell8 = row.insertCell(8);
						  var cell9 = row.insertCell(9);
						   var cell10= row.insertCell(10);
						 cell0.style.width="4%";
						  cell1.style.width="30%"; //cell1.style.backgroundColor="red";
						   cell2.style.width="60px";
						    cell3.style.width="60px";
							 cell4.style.width="8%";
							  cell5.style.width="8%";
							   cell6.style.width="8%";   
							   cell7.style.width="60px"; cell7.align="center";
							cell8.style.width="20px";
							cell9.style.width="20px";
							cell10.style.width="40px";
								
   cell1.align="center";cell2.align="left";cell3.align="left"; cell4.align="right" ; cell5.align="left" ; cell6.align="center" ;
		 cell7.align="center" ;  cell8.align="center" ; cell9.align="center" ;
//====================================START SERIAL Number ===========================================================	
							
							cell0.innerHTML=rw;
							
//====================================CLOSE SERIAL NUMBER ===========================================================							
//====================================START PRODUCT Name===========================================================

	var prd = document.createElement("input");
						prd.type="text"; prd.value=pd;	    
			            prd.name='a'+rw;
		   				prd.readOnly = true;
						prd.style.width="100%";
						cell1.appendChild(prd);
						
	//==========================HIDDEN PRODUCT Name========================
			var prdh = document.createElement("input");
					  		  prdh.type = "hidden";
		    					prdh.value =pd;
						  		  prdh.name ='prdh[]'+rw;
			    			  		prdh.id='prdh'+rw;
									cell1.appendChild(prdh);			
										
	//==========================HIDDEN PRODUCT ID ========================									
				var prdid = document.createElement("input");
					  		  prdid.type = "hidden";
		    					prdid.value =pidss;
						  		  prdid.name ='prdids[]'+rw;
			    			  		prdid.id='productid'+rw;
										cell1.appendChild(prdid);						
										
//====================================CLOSE PRODUCT ID===========================================================
					
//========================================START UNIT TEXT BOX ================================================
							
							var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='unt[]'+rw;
							  element10.id='unt'+rw;
							   element10.value=unt;
							  element10.readOnly = true;
								element10.style.width="105%";
								element10.style.display="none";//2015
								cell6.appendChild(element10);
	//===================================== UNIT TEXT NAME =======================================		
			var element11 = document.createElement("input");
							    element11.type = "text";
							  element11.name ='untname[]'+rw;
							  element11.id='untname'+rw;
							   element11.value=untname;
							  element11.readOnly = true;
								element11.style.width="105%";
								//element10.style.display="none";//2015
								cell6.appendChild(element11);							
								
//========================================ClOSE UNIT TEXT BOX ================================================
					
//========================================START QUANTITY TEXT BOX ================================================	
	
	var element2 = document.createElement("input");
							   element2.type = "text";
							    element2.name ='qn[]'+rw;
							    element2.id='qn'+rw;
							element2.readOnly = true;
							element2.value =qn;
							element2.onkeyup = function() { billQunt(element2.id,rw,element2.value); };								
							element2.style.width="105%";
							cell3.appendChild(element2);
							
//========================================CLOSE QUANTITY TEXT BOX ================================================
	
//====================================START DELETE BUTTON ===========================================================
		
		var delt =document.createElement("img");						
			delt.src ="<?php echo base_url();?>/assets/images/delete.png";
			delt.class ="icon";
			delt.border ="0";
			delt.name ='dlt'+rw;
			delt.id='dlt'+rw;
			delt.onclick= function() { deleteselectrow(delt.id,delt); };				   
			cell9.appendChild(delt);											
		
//====================================ClOSE DELETE BUTTON ===========================================================

//=====================================START EDIT BUTTON=============================================================
		var edt = document.createElement("img");
			edt.src ="<?php echo base_url();?>/assets/images/edit.png";
			edt.class ="icon";
			edt.border ="0";
			edt.name ='ed'+rw;
			edt.id='ed'+rw;
			edt.onclick= function() { editselectrow(delt.id,delt); };			
			cell8.appendChild(edt);
														
//=====================================ClOSE EDIT BUTTON=============================================================
	
	//==================================== scroll Top =================================							          
			document.getElementById('m').scrollTop = 9999999;
 							
//==========================================*START INITIOLIZING** ALL VALUE*=============================================

				document.getElementById("prd").value="";				
		        document.getElementById("qn").value=0;
			    document.getElementById("usunit").value="";
			 
//==========================================*CLOSE INITIOLIZING** ALL VALUE*=============================================						
														
		var rows=document.getElementById("rows").value;
		rows=Number(rows);
		rows=rows+rw;	
		rows=Number(rows);
		document.getElementById("rows").value=rows;			
			document.getElementById("prd").focus();
			}
			else
			{						
			alert('***PRODUCT qty in less then in stock ***');
			 document.getElementById("qn").focus();				
			}
				
   }

//====================================START DELETE ROW ===========================================================
function deleteselectrow(d,r)
 {  
var regex = /(\d+)/g;
nn= d.match(regex)
id=nn;

    var i = r.parentNode.parentNode.rowIndex;
	     var cnf = confirm('Are You Sure..??? you want to Delete line no.'+(id));
if (cnf== true)
 {
	document.getElementById("invoice").deleteRow(i);	
	
 
	}
	
}
//====================================CLOSE DELETE ROW ===========================================================

function editselectrow(d,r)
 {
var regex = /(\d+)/g;
nn= d.match(regex)
//ssalert(nn);
id=nn;
//alert(id);
 var pnm=document.getElementById("prdh"+id).value;
  var usunit=document.getElementById("unt"+id).value;
  var qn=document.getElementById("qn"+id).value;
  var ef=document.getElementById("ef").value=1;
var ddid=document.getElementById("d");

ddid.id=document.getElementById("spid").value;

ddid.value=pnm;
		
document.getElementById("prd").value=pnm;
document.getElementById("usunit").value=usunit;
document.getElementById("qn").value=qn;
document.getElementById("qn").focus();

    var i = r.parentNode.parentNode.rowIndex;
	document.getElementById("invoice").deleteRow(i);	
			
}

</script>
</body>
</html>