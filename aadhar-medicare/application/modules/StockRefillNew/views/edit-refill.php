<?php
$this->load->view("header.php");
$id=$_GET['id'];

if($_GET['id']!='' or $_GET['view']!=''){
	$query=$this->db->query("select * from tbl_refill_hdr where rflhdrid='$id' or rflhdrid='".$_GET['view']."'");	
	$fetchq=$query->row();
}

?>
<form id="f1" name="f1" method="POST" action="updateStockRefill" onSubmit="return checkKeyPressed(a)" enctype="multipart/form-data">
<!-- Main content -->
	<div class="main-content">
		
		<!-- Breadcrumb -->
		<?php if(@$_GET['popup'] == 'True') {} else {?>
		<ol class="breadcrumb breadcrumb-2"> 
			<li><a class="btn btn-success" href="<?=base_url();?>master/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
			<li><a class="btn btn-success" href="<?=base_url();?>StockRefillNew/manage_stock_refill">Manage Stock Refill </a></li> 
			
		</ol>
		<?php }?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>Update Stock Refill</strong></h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" <?php if($_GET['view']!=''){?> oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' <?php }?> >
<thead>
<tr>
<th>Date</th>
<th>
<input type="date"  class="form-control" required name="rdate" value="<?php echo $fetchq->date;?>" />
<input type="hidden"  class="form-control" required name="id" value="<?php echo $_GET['id'];?>" />
</th>
<th>Remarks</th>
<th><textarea name="remarks" class="form-control" ><?php echo $fetchq->remarks;?></textarea></th>
</tr>
</thead>


</table>
</div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" <?php if($_GET['view']!=''){?> oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' <?php }?> >
<tbody>
<tr class="gradeA">
<th>Product Name </th>
<th>Qty in Stock</th>
<th>Usages Unit</th>

<th style="display:none;">Rate</th>

<th>Quantity</th>
<th></th>
</tr>

<tr class="gradeA">
<th style="width:280px;">
<div class="input-group"> 
<div style="width:100%; height:28px;" >
<input type="text" name="prd"  onkeyup="getdata()" class="form-control" onClick="getdata()" id="prd" style=" width:230px;"  placeholder=" Search Items..." tabindex="5" >
 <input type="hidden"  name="pri_id" id='pri_id'  value="" style="width:80px;"  />
 <input type="hidden"  name="dtl_idd" id='dtl_idd'  value="" style="width:80px;"  />
</div>

</div>
<div id="prdsrch" style="color:black;padding-left:0px; width:30%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
<?php
//include("getproduct.php");
$this->load->view('getproduct');

?>
</div>
</th>

<th><input type="text" readonly="" id="quantity" style="width:70px;" class="form-control"></th>

<th>
<input type="text" readonly="" id="usunit" style="width:70px;" class="form-control"> 
</th>
<th style="display:none;">
<b style="display:none" id="lpr"></b>
<input type="number" step="any" id="lph" min="1"  value="" class="form-control" style="width:70px;"></th>
<th><input type="number" id="qn" min="1" style="width:70px;"   class="form-control"></th>
<th><a href="#" onclick="adda();" class="btn btn-sm">Add</a></th>
</tr>
</tbody>
</table>
</div>

<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
<table id="invo" style="width:100%;  background:#dddddd;  height:70%;" title="Invoice"  >
<tr>
<td style="width:1%;"><div align="center"><u>Sl No</u>.</div></td>
<td style="width:9%;"><div align="center"><u>Raw Material</u></div></td>

<td style="width:3%; display:none;"> <div align="center"><u>Rate</u></div></td>

<td style="width:3%;"><div align="center"><u>Quantity</u></div></td>
<td style="width:3%;"> <div align="center"><u>Action</u></div></td>
</tr>
</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

<tr></tr>
<?php
$z=1;
$query_dtl=$this->db->query("select * from tbl_refill_dtl where refillhdr='".$_GET['id']."' or refillhdr='".$_GET['view']."' ");
foreach($query_dtl->result() as $invoiceFetch)
{

$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id'");
$getProductName=$productQuery->row();

//$typeQuery=$this->db->query("select *from tbl_master_data where serial_number='$getProductName->type'");
//$gettype=$typeQuery->row();

?>
<tr>
<td align="center" style="width: 0.2%;"><?php echo $z;?></td>

<td align="center" style="width: 11%;"><input type="text" name="pd[]" id="pd<?php echo $z;?>" value="<?php echo $getProductName->productname;?>^<?php echo $invoiceFetch->product_id;?>" readonly="" style="text-align: center; width: 100%; border:hidden;">
<input type="hidden" name="product_id[]" id="main_id<?php echo $z;?>" value="<?php echo $invoiceFetch->product_id;?>" readonly="" style="text-align: center; width: 100%; border:hidden;"><input type="hidden" value="Box" name="unit[]" id="unit<?php echo $z;?>" readonly="" style="text-align: center; width: 100%; border: hidden;">
</td>

<td align="center" style="width: 3%; display:none;">
<input type="text" name="list_price[]" id="lph<?php echo $z;?>" value="<?php echo $invoiceFetch->list_price;?>" readonly="" style="text-align: center; width: 100%; border: hidden;"></td>


<td align="center" style="width: 3%;"><input type="text" name="new_quantity[]" id="qnty<?php echo $z;?>" value="<?php echo $invoiceFetch->quantity;?>"readonly="" style="text-align: center; width: 100%; border: hidden;"></td>



<td align="center" style="width: 3%;"><img src="<?php echo base_url();?>assets/images/delete.png" border="0" name="dlt" id="dlt<?php echo $z;?>" onclick="deleteselectrowtest(this.id,this);"  readonly style="border: hidden;"><img src="<?php echo base_url();?>assets/images/edit.png" border="0" name="ed" id="ed<?php echo $z;?>" onclick="editselectrowtest(this.id,this);" style="border: hidden;"></td>
</tr>
<?php $row=$z; $z++;  } ?>

</table>



</div>


</div>

<input type="hidden" name="rows" id="rows" value="<?php echo $row;?>">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />


<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" <?php if($_GET['view']!=''){?> oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' <?php }?> >


<tbody>

<tr class="gradeA">
<th>

<th>&nbsp;</th>
<th>
<?php if($_GET['view']!='')
{} else {?>
<input class="btn btn-sm" type="button" value="SAVE"   id="sv1" onclick="fsv(this)" >&nbsp;
<?php }?>
<a onclick="popupclose(this.value)" class="btn btn-secondary  btn-sm">Cancel</a></th></th>
</tr>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
<script>

////////////////////////////////// starts delete code ////////////////////////////////

function deleteselectrowtest(d,r) //delete dyanamicly created rows or product detail
 {
 //alert(d);
	var regex = /(\d+)/g;
	nn= d.match(regex)
	id=nn;
	if(document.getElementById("prd").value!=''){
 		document.getElementById("qn").focus();
    	 alert("Product Already In Edit Mode");
		return false;
}

		var pd=document.getElementById("pd"+id).value;
		var unit=document.getElementById("unit"+id).value;
		var qn=document.getElementById("qnty"+id).value;
		var pri_id=document.getElementById("main_id"+id).value;

	    var i = r.parentNode.parentNode.rowIndex;
		     var cnf = confirm('Are You Sure..??? You want to Delete line No '+(id));
		if (cnf== true)
		 {
		 document.getElementById("invoice").deleteRow(i);
		  slr();
		  
		 //editDeleteCalculation();
			//serviceChargeCal();	
			//grossDiscountCal();
			}
}
////////////////////////////////// ends delete code ////////////////////////////////


////////////////////////////////// starts edit code ////////////////////////////////


function editselectrowtest(d,r) //modify dyanamicly created rows or product detail
 {
	 
	var regex = /(\d+)/g;
	
	nn= d.match(regex)
	id=nn;
	
	if(document.getElementById("prd").value!=''){
		document.getElementById("qn").focus();
	alert("Product Already In Edit Mode");
	return false;
}


		// ####### starts ##############//
		var pd=document.getElementById("pd"+id).value;
		var unit=document.getElementById("unit"+id).value;
		var qn=document.getElementById("qnty"+id).value;
		var lph=document.getElementById("lph"+id).value;
		var pri_id=document.getElementById("main_id"+id).value;
		//var qnttyy=document.getElementById("qttyyyy"+id).value;
		
		// ####### ends ##############//

		// ####### starts ##############//
		document.getElementById("pri_id").value=pri_id;
		document.getElementById("prd").value=pd;
		document.getElementById("usunit").value=unit;
		document.getElementById("lph").value=lph;
		//document.getElementById("quantity").value=qnttyy;
		document.getElementById("qn").value=qn;
		document.getElementById("qn").focus();
		
		// ####### ends ##############//
		//editDeleteCalculation();

		var i = r.parentNode.parentNode.rowIndex;
		document.getElementById("invoice").deleteRow(i);
}

////////////////////////////////// ends edit code ////////////////////////////////


//add item into showling list
window.addEventListener("keydown", checkKeyPressed, false);
//funtion to select product
function checkKeyPressed(e) {
var s=e.keyCode;

var ppp=document.getElementById("prd").value;
var sspp=document.getElementById("spid").value;//
var ef=document.getElementById("ef").value;
		ef=Number(ef);
		
var countids=document.getElementById("countid").value;

//if(countids==''){
//countids=1;
//}

for(n=1;n<=countids;n++)
{


document.getElementById("tyd"+n).onkeyup  = function (e) {
var entr =(e.keyCode);
if(entr==13){
document.getElementById("qn").focus();
document.getElementById("prdsrch").innerHTML=" ";

}
}
}

/*document.getElementById("lph").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("make").focus();
}
}
*/




document.getElementById("qn").onkeydown = function (e) {
var entr =(e.keyCode);
if(document.getElementById("qn").value=="" && entr==08){

}
   if (e.keyCode == "13")
	 {
	
	 e.preventDefault();
     e.stopPropagation();
	
	  if(ppp!=='' || ef==1)
	 {

	
			adda();	  	
			
		
			
		
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
/////////////////////////////////////////////

function fsv(v)
{
var rc=document.getElementById("rows").value;

if(rc!=0)
{
v.type="submit";
}
else
{
	alert('No Item To Save..');	
}
}


function getdata()
		  {
		  
		  
		  
		 currentCell = 0;
		 var product1=document.getElementById("prd").value;	 
		 var product=product1;
		 
		    if(xobj)
			 {
			 var obj=document.getElementById("prdsrch");
			
			 xobj.open("GET","getproduct?con="+product,true);
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
  
////////////////////////////////////////////////////

 function slr(){
		var table = document.getElementById('invoice');
        var rowCount = table.rows.length;
		  for(var i=1;i<rowCount;i++)
		  {    
              table.rows[i].cells[0].innerHTML=i;
		  }
			 
			  
}  



//////////////////////////////////////////////////////////////



     var rw=0;
	 
 function adda()
		  { 
		 
		  		 

				var qn=document.getElementById("qn").value;
				var unit=document.getElementById("usunit").value;
				var lph=document.getElementById("lph").value;
				var quantity=document.getElementById("quantity").value;
			  	
			
				
				//default
				var rows=document.getElementById("rows").value;
				var pri_id=document.getElementById("pri_id").value;
				var pd=document.getElementById("prd").value;
		   	   var table = document.getElementById("invoice");
					var rid =Number(rows)+1;
					document.getElementById("rows").value=rid;
					
						
							//totalSum();	
							//serviceChargeCal();
							//grossDiscountCal();				
             				clear();
				
					 currentCell = 0;
	if(pd!="" && qn!=0)
					{
				     var indexcell=0;
								var row = table.insertRow(-1);
						rw=rw+0;
						
						//cell 0st
	 var cell=cell+indexcell;		
 	 cell = row.insertCell(0);
	 cell.style.width=".20%";
	 cell.align="center"
	cell.innerHTML=rid;
				
				
				//cell 1st item name
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;	
			
	    cell = row.insertCell(indexcell);
				cell.style.width="9%";
				cell.align="center";
				
				
				
				
				//============================item text ============================
				var prd = document.createElement("input");
							prd.type="text";
							prd.border ="0";
							prd.value=pd;	
							prd.name='pd[]';//
							prd.id='pd'+rid;//
							prd.readOnly = true;
							prd.style="text-align:center";  
							prd.style.width="100%";
							prd.style.border="hidden"; 
							cell.appendChild(prd);
				var priidid = document.createElement("input");
							priidid.type="hidden";
							priidid.border ="0";
							priidid.value=pri_id;	
							priidid.name='product_id[]';//
							priidid.id='main_id'+rid;//
							priidid.readOnly = true;
							priidid.style="text-align:center";  
							priidid.style.width="100%";
							priidid.style.border="hidden"; 
							cell.appendChild(priidid);
							
							
							var unitt = document.createElement("input");
							unitt.type="hidden";
							unitt.border ="0";
							unitt.value=unit;	
							unitt.name='unit[]';//
							unitt.id='unit'+rid;//
							unitt.readOnly = true;
							unitt.style="text-align:center";  
							unitt.style.width="100%";
							unitt.style.border="hidden"; 
							cell.appendChild(unitt);
							
							
							var qttyyy = document.createElement("input");
							qttyyy.type="hidden";
							qttyyy.border ="0";
							qttyyy.value=quantity;	
							qttyyy.name='qttyyyy[]';//
							qttyyy.id='qttyyyy'+rid;//
							qttyyy.readOnly = true;
							qttyyy.style="text-align:center";  
							qttyyy.style.width="100%";
							qttyyy.style.border="hidden"; 
							cell.appendChild(qttyyy);
					
						// ends here
	
	
					
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";
				var salepr = document.createElement("input");
							salepr.type="text";
							salepr.border ="0";
							salepr.value=lph;	    
							salepr.name ='list_price[]';
							salepr.id='lph'+rid;
							salepr.readOnly = true;
							salepr.style="text-align:center";
							salepr.style.width="100%";
							salepr.style.border="hidden"; 
							cell.appendChild(salepr);
					

	
	
	
	
		
		
		//#################cell 3rd starts here####################//					
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
		//========================================start qnty===================================	
				var qtty = document.createElement("input");
							qtty.type="text";
							qtty.border ="0";
							qtty.value=qn;	    
							qtty.name ='new_quantity[]';
							qtty.id='qnty'+rid;
							qtty.readOnly = true;
							qtty.style="text-align:center";
							qtty.style.width="100%";
							qtty.style.border="hidden"; 
							cell.appendChild(qtty);
								
		//======================================close 3rd cell========================================
		
		
		
				
			
		//cell 3st
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
	var imageloc="/mr_bajaj/";
	var cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				var delt =document.createElement("img");
						delt.src ="<?=base_url();?>assets/images/delete.png";
						delt.class ="icon";
						delt.border ="0";
						//delt.style.width="30%";
						//delt.style.height="20%";
						delt.name ='dlt';
						delt.id='dlt'+rid;
						delt.style.border="hidden"; 
						delt.onclick= function() { deleteselectrow(delt.id,delt); };
					    cell.appendChild(delt);
	var edt = document.createElement("img");
						edt.src ="<?=base_url();?>/assets/images/edit.png";
						edt.class ="icon";
						//edt.style.width="60%";
						//edt.style.height="40%";
						edt.border ="0";
						edt.name ='ed';
						edt.id='ed'+rid;
						edt.style.border="hidden"; 
						edt.onclick= function() { editselectrow(delt.id,edt); };
						cell.appendChild(edt);
			

			
			}
			else
			{
			if(qn==0)
				{
					alert('***Quantity Can not be Zero ***');
					
					
				}
				else
				{
				
			alert('***Please Select PRODUCT ***');
			
			}
			}

function clear()
{

// this finction is use for clear data after adding invoice
		document.getElementById("prd").value='';
		document.getElementById("prdsrch").innerHTML='';
		document.getElementById("usunit").value='';
		document.getElementById("lph").value='';
		document.getElementById("lpr").innerHTML ='';
		document.getElementById("qn").value='';
		document.getElementById("quantity").value='';
		document.getElementById("pri_id").value='';
		
		document.getElementById("prd").focus();	
		
		
}






////////////////////////////////// starts edit code ////////////////////////////////


function editselectrow(d,r) //modify dyanamicly created rows or product detail
 {
 
	var regex = /(\d+)/g;
	nn= d.match(regex)
	id=nn;
	if(document.getElementById("prd").value!=''){
	document.getElementById("qn").focus();
	alert("Product Already In Edit Mode");
	return false;
}


		// ####### starts ##############//
		var pd=document.getElementById("pd"+id).value;
		var unit=document.getElementById("unit"+id).value;
		var qn=document.getElementById("qnty"+id).value;
		var lph=document.getElementById("lph"+id).value;
		var pri_id=document.getElementById("main_id"+id).value;
		var qnttyy=document.getElementById("qttyyyy"+id).value;
		// ####### ends ##############//

		// ####### starts ##############//
		document.getElementById("pri_id").value=pri_id;
		document.getElementById("prd").value=pd;
		document.getElementById("usunit").value=unit;
		document.getElementById("lph").value=lph;
		document.getElementById("quantity").value=qnttyy;
		document.getElementById("qn").value=qn;
		document.getElementById("qn").focus();
		
		// ####### ends ##############//
		//editDeleteCalculation();

		var i = r.parentNode.parentNode.rowIndex;
		document.getElementById("invoice").deleteRow(i);
}

////////////////////////////////// ends edit code ////////////////////////////////




////////////////////////////////// starts delete code ////////////////////////////////

function deleteselectrow(d,r) //delete dyanamicly created rows or product detail
 {
 //alert(d);
	var regex = /(\d+)/g;
	nn= d.match(regex)
	id=nn;
	if(document.getElementById("prd").value!=''){
 		document.getElementById("qn").focus();
    	 alert("Product Already In Edit Mode");
		return false;
}

		var pd=document.getElementById("pd"+id).value;
		var unit=document.getElementById("unit"+id).value;
		var qn=document.getElementById("qnty"+id).value;
		var pri_id=document.getElementById("main_id"+id).value;

	    var i = r.parentNode.parentNode.rowIndex;
		     var cnf = confirm('Are You Sure..??? You want to Delete line No '+(id));
		if (cnf== true)
		 {
		 document.getElementById("invoice").deleteRow(i);
		  slr();
		  
		 //editDeleteCalculation();
			//serviceChargeCal();	
			//grossDiscountCal();
			}
}
////////////////////////////////// ends delete code ////////////////////////////////


function totalSum(){

var subb=document.getElementById("sub_total").value;
			var tol=(Number(nettot));
			var total=Number(tol)+Number(subb);
	
			document.getElementById("sub_total").value=total.toFixed(2);
			document.getElementById("grand_total").value=total.toFixed(2);	

}




// ###### starts when item we edit or delete ##########//
function editDeleteCalculation()
{
var sub_total=document.getElementById("sub_total").value;

sub_total_cal=sub_total-nettot;
document.getElementById("sub_total").value=sub_total_cal.toFixed(2);
document.getElementById("grand_total").value=sub_total_cal.toFixed(2);
}
// ##### ends ###########

}

// ###### starts service charge calculation ##########//
function serviceChargeCal()
{

var sub_total=document.getElementById("sub_total").value;
var service_charge=document.getElementById("service_charge").value;

service_total_per=Number(sub_total)*Number(service_charge)/100;
service_total_cal=Number(sub_total)+Number(service_total_per);

document.getElementById("service_charge_total").value=service_total_per.toFixed(2);
document.getElementById("grand_total").value=service_total_cal.toFixed(2);
return service_total_cal.toFixed(2);
}
// ##### ends ###########
  

// ###### starts gross discount calculation ##########//
function grossDiscountCal()
{

var serviceTotl=serviceChargeCal();

var gross_discount_per=document.getElementById("gross_discount_per").value;
var gross_discount_total=document.getElementById("gross_discount_total").value;
var grand_total=document.getElementById("grand_total").value;


service_total_per=Number(serviceTotl)*Number(service_charge)/100;
service_total_cal=Number(sub_total)+Number(service_total_per);

var totalGross=Number(serviceTotl)*Number(gross_discount_per)/100;
var totalGrossCal=Number(grand_total)-Number(totalGross);

document.getElementById("gross_discount_total").value=totalGross.toFixed(2);
document.getElementById("grand_total").value=totalGrossCal.toFixed(2);
}
// ##### ends ###########

  
 
      
</script>
</form>
<?php
$this->load->view("footer.php");
?>