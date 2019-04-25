<?php
$this->load->view("header.php");
$tableName='tbl_contact_m';
$location='manage_contact';
		
		$userQuery = $this -> db
           -> select('*')
		   -> where('contact_id',$_GET['id'])
		   -> or_where('contact_id',$_GET['view'])
           -> get('tbl_contact_m');
		  $branchFetch = $userQuery->row();
$quryinv=$this->db->query("select *from tbl_bookong_order_hdr");
$getInv=$quryinv->row();

?>
<form id="f1" name="f1" method="POST" action="insertBooking" onSubmit="return checkKeyPressed(a)">
<!-- Main content -->
<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=42epwf1jarbwose89sqt3dztyfu7961g4cs5xoib4kordvbd"></script>
  <script>tinymce.init({ selector:'#tem' });</script>

	<div class="main-content">
		<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Connection Sheet</a></li> 
				
				<li class="active"><strong><a href="#">Manage Connection Sheet</a></strong></li> 
				<div class="pull-right">
				<a class="btn btn-sm" href="<?=base_url();?>booking/manage_booking">Manage Connection Sheet</a>
				</div>
			</ol>
		
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						
							<h4 class="panel-title"><strong>Add Connection Sheet</strong></h4>
							
						
<div class="panel-body">
<div class="table-responsive-">
<table class="table table-striped table-bordered table-hover" >
<thead>
<tr>
<th>CD No.</th>
<th><input type="text" name="cd_no" class="form-control"  required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>></th>
<th>Vendor Name</th>
<th>
<div class="field">
	<select name="vendor_id" style="width:80%" required id="contact_id_copy" class="form-control" onChange="document.getElementsByName('contactid')[0].value=this.value;"   <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>>
		<option value="" selected disabled>Select</option>
		<?php
		$contQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='5'");
		foreach($contQuery->result() as $contRow)
		{
		?>
			<option value="<?php echo $contRow->contact_id; ?>">
			<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?>
			</option>
			<?php } ?>
	</select>
    <a style="display:none1" onClick="openpopup('<?=base_url();?>master/Account/add_contact',900,630,'','')"><img src="<?php echo base_url();?>/assets/images/addcontact.png" width="25px" height="25px"/></a>
</div>

</th>



<th>Date Of Booking</th>
<th>
<input type="date"  class="form-control" required name="date_of_booking" value="<?php echo $detail->date_of_booking;?>" />
</th>
</tr>
<tr>
<th>Exp. Reach Date</th>
<th>
<input type="date"  class="form-control"  name="exp_reach_date" value="<?php echo $detail->exp_reach_date;?>" />
</th>


<th>Transit Mode</th>
<th>
<select name="mode" id="mode" class="form-control">
<option value="">--Select--</option>
<option value="Air">Air</option>
<option value="Train">Train</option>
<option value="Surface">Surface</option>

</select>

</th>

<th>Vendor Weight</th>
<th>
<input type="number" step="any"  class="form-control"  name="vendor_weight" value="<?php echo $detail->vendor_weight;?>" />
</th>


</tr>
<tr>

<th>
Remarks
</th>
<th>
<input type="text"   class="form-control"  name="remarks" value="<?php echo $detail->remarks;?>" />
</th>

</tr>

</thead>


</table>
</div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >
<tbody>
<tr class="gradeA">
<th>AWB No.</th>

<th>Origin</th>
<th>Destination</th>
<th>Rate</th>
<th>Special Rate</th>
<th>Char. wt (kg)</th>

<th>Total</th>
<th>Box</th>
<th>Bag</th>

</tr>

<tr class="gradeA">
<th style="width:280px;">
<div class="input-group"> 
<div style="width:100%; height:28px;" >
<input type="text" name="prd"  id="prd" style=" width:230px;" class="form-control"  placeholder=""  >
 
<img  style="display:none" src="<?php echo base_url();?>/assets/images/search11.png"  onClick="openpopup('<?=base_url();?>SalesOrder/all_product_function',1200,500,'view',<?=$sales[$i]['1'];?>)" /></div>

</div>
</th>
<th>
<input type="hidden" id="originSel" value="" />
 <select name="origin" id="origin" class="form-control" >
<option value="">--Select--</option>
<?php

	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
<option value="<?=$getContact->serial_number;?>"><?=$getContact->keyvalue;?></option>

<?php }?>
</select>



</th>

<th>
<input type="hidden" id="destinationSel"  value="" />
<select name="destination" id="destination" onchange="getRate(this.value);" class="form-control" >
<option value="">--Select--</option>
<?php

	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
<option value="<?=$getContact->serial_number;?>"><?=$getContact->keyvalue;?></option>

<?php }?>
</select> 
</th>
<th>
<b style="display:none" id="lpr"></b>
<input type="number" readonly="readonly" step="any" id="rate" min="1"  value="" class="form-control" style="width:70px;">
</th>

<th><input type="number" step="any" id="srate" min="1"  value="" class="form-control" style="width:70px;"></th>

<th><input type="number" step="any" id="char_wt" min="1"  value="" class="form-control" style="width:70px;"></th>
<th>
<input type="number" step="any" id="total" min="1"  value="" class="form-control" style="width:70px;">


<th><input type="number" step="any" name="saleamnt" id="box" class="form-control" style="width:70px;"/ ></th>
<th><input type="number" step="any" name="saleamnt" id="bag" class="form-control" style="width:70px;"/ ></th>

</tr>
</tbody>
</table>
</div>

<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
<table id="invo" style="width:100%;  background:#dddddd;  height:70%;" title="Invoice"  >
<tr>
<td style="width:1%;"><div align="center"><u>Sl No</u>.</div></td>
<td style="width:4%;"><div align="center"><u>AWB No.</u></div></td>
<td style="width:3%;"> <div align="center"><u>Origin</u></div></td>
<td style="width:3%;"> <div align="center"><u>Destination</u></div></td>
<td style="width:3%;"> <div align="center"><u>rate</u></div></td>
<td style="width:3%;"> <div align="center"><u>Special Rate</u></div></td>


<td style="width:3%;"> <div align="center"><u>Char. wt (kg)</u></div></td>

<td style="width:3%;"> <div align="center"><u>Total</u></div></td>
<td style="width:3%;"> <div align="center"><u>Box</u></div></td>
<td style="width:3%;"> <div align="center"><u>Bag</u></div></td>

<td style="width:3%;"> <div align="center"><u>Action</u></div></td>
</tr>
</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

<tr></tr>
</table>



</div>


</div>

<input type="hidden" name="rows" id="rows">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />


<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >

<tr class="gradeA" style="display:none;">
<th>Sub Total</th>
<th>&nbsp;</th>
<th><input type="text" placeholder="Placeholder" id="sub_total" readonly="" name="sub_total" class="form-control"></th>
</tr>

<tr class="gradeA" style="display:none">
<th>Service Charge</th>
<th><input type="number" step="any" min="1" id="service_charge" onKeyUp="serviceChargeCal();" name="service_charge_per" placeholder="0%" class="form-control"></th>
<th><input type="text" readonly="" id="service_charge_total" name="service_charge_total" placeholder="Placeholder" class="form-control"></th>
</tr>

<tr class="gradeA" style="display:none">
<th>Gross Discount</th>
<th><input type="number" name="gross_discount_per" onKeyUp="grossDiscountCal()" id="gross_discount_per" step="any" min="1" placeholder="%" class="form-control"></th>
<th><input type="number" readonly="" name="gross_discount_total" id="gross_discount_total" step="any" placeholder="Placeholder" class="form-control"></th>
</tr>

<tr class="gradeA" >
<th>Grand Total</th>
<th>&nbsp;</th>
<th><input type="number" readonly="" step="any" id="grand_total" name="grand_total" placeholder="Placeholder" class="form-control"></th>
</tr>

<tbody>
























<tr class="gradeA">
<th>Total Weight</th>
<th></th>
<th><input type="text" name="total_weight" value="" class="form-control" />


</th>
</tr>
<tr class="gradeA">
<th>

<th>&nbsp;</th>
<th>
<input class="btn btn-sm" type="button" value="SAVE"   id="sv1" onclick="fsv(this)" >
&nbsp;<a href="<?=base_url();?>booking/manage_booking" class="btn btn-secondary btn-sm">Cancel</a>
</th></th>
</tr>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
<script>
//add item into showling list
window.addEventListener("keydown", checkKeyPressed, false);
//funtion to select product
function checkKeyPressed(e) {
var s=e.keyCode;

var ppp=document.getElementById("prd").value;
var sspp=document.getElementById("spid").value;//
var ef=document.getElementById("ef").value;
		ef=Number(ef);
		
document.getElementById("prd").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){


document.getElementById("origin").focus();
}
}



document.getElementById("origin").onkeydown = function (e) {
var entr =(e.keyCode);
if(entr==13){

var dest=document.getElementById("origin").value;


if(dest=='')
{
alert("Please select origin");
document.getElementById("destination").focus();
}
else
{
var destinationval=document.getElementById('origin').options[document.getElementById('origin').selectedIndex].text;


document.getElementById("originSel").value=destinationval;

document.getElementById("destination").focus();
}
}
}



document.getElementById("destination").onkeydown = function (e) {
var entr =(e.keyCode);
if(entr==13){

var dest=document.getElementById("destination").value;
if(dest=='')
{
alert("Please select destination");
document.getElementById("destination").focus();
}
else
{
var destinationval=document.getElementById('destination').options[document.getElementById('destination').selectedIndex].text;


document.getElementById("destinationSel").value=destinationval;

document.getElementById("srate").focus();
}
}
}



document.getElementById("srate").onkeydown = function (e) {
var entr =(e.keyCode);
if(entr==13){
	

document.getElementById("char_wt").focus();
}
}




document.getElementById("char_wt").onkeydown = function (e) {
var entr =(e.keyCode);
if(entr==13){
	
	
	
	
var char_wt=document.getElementById("char_wt").value;
var rate=document.getElementById("rate").value;

	
var srate=document.getElementById("srate").value;

if(srate!='')
{
	var srate=document.getElementById("srate").value;
	var char_wt=document.getElementById("char_wt").value;
	
	var tot=Number(srate)*Number(char_wt);
	document.getElementById("total").value=tot;
}
else
{
var tot=Number(char_wt)*Number(rate);
document.getElementById("total").value=tot;
	
}


document.getElementById("total").focus();
}
}


document.getElementById("total").onkeydown = function (e) {
var entr =(e.keyCode);
if(entr==13){
	

document.getElementById("box").focus();
}
}



document.getElementById("box").onkeydown = function (e) {
var entr =(e.keyCode);
if(entr==13){
	
document.getElementById("bag").focus();
}
}


document.getElementById("bag").onkeydown = function (e) {
var entr =(e.keyCode);
if(document.getElementById("bag").value=="" && entr==08){

}
   if (e.keyCode == "13")
	 {

	 e.preventDefault();
     e.stopPropagation();
	

	
			adda();	  	
			
		
	
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
		 	
			 var conatctId=document.getElementById("contact_id_copy").value;
			 
			 var invoice_type=document.getElementById("invoice_type").value;
		if(conatctId=='')
		{
		alert('Plase Select Contact First');
		document.getElementById("contact_id_copy").focus();
		}	
		if(invoice_type=='')
		{
		alert('Plase Select Invoice Type');
		document.getElementById("invoice_type").focus();
		}
		
		
		    
		    if(xobj)
			 {
			 var obj=document.getElementById("prdsrch");
			
			 xobj.open("GET","getproduct?con="+product+"&con_id="+conatctId+"&invoice_type="+invoice_type,true);
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
		 
		  		 


				var destination=document.getElementById("destination").value;
				var origin=document.getElementById("origin").value;
				var destinationSel=document.getElementById("destinationSel").value;
				var originSel=document.getElementById("originSel").value;
				var srate=document.getElementById("srate").value;
				
				
				var rate=document.getElementById("rate").value;
				var char_wt=document.getElementById("char_wt").value;	
				
				var total=document.getElementById("total").value;		
		       
			   var box=document.getElementById("box").value;		
			   var bag=document.getElementById("bag").value;		
			 	//default
				var rows=document.getElementById("rows").value;
				var pd=document.getElementById("prd").value;
		
		   	   var table = document.getElementById("invoice");
					var rid =Number(rows)+1;
					document.getElementById("rows").value=rid;
					
						
							totalSum();	
							//serviceChargeCal();
							//grossDiscountCal();				
             				clear();
				
					 currentCell = 0;
	if(pd!="" )
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
				cell.style.width="4%";
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
					
						// ends here
	
	
	
	
	
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				
				cell.align="center"
				var qty_org = document.createElement("input");
							qty_org.type="text";
							qty_org.border ="0";
							qty_org.value=originSel;	    
							qty_org.name ='originSel[]';
							qty_org.id='originSel'+rid;
							qty_org.readOnly = true;
							qty_org.style="text-align:center";
							qty_org.style.width="100%";
							qty_org.style.border="hidden"; 
							cell.appendChild(qty_org);
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.style.display="none";
				cell.align="center"
				var originN = document.createElement("input");
							originN.type="text";
							originN.border ="0";
							originN.value=origin;	    
							originN.name ='origin[]';
							originN.id='origin'+rid;
							originN.readOnly = true;
							originN.style="text-align:center";
							originN.style.width="100%";
							originN.style.border="hidden"; 
							cell.appendChild(originN);
	
	//#################cell 2nd starts here####################//
	
	
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.style.display="none";
				cell.align="center"
				var qty_stockK = document.createElement("input");
							qty_stockK.type="text";
							qty_stockK.border ="0";
							qty_stockK.value=destination;	    
							qty_stockK.name ='destination[]';
							qty_stockK.id='destination'+rid;
							qty_stockK.readOnly = true;
							qty_stockK.style="text-align:center";
							qty_stockK.style.width="100%";
							qty_stockK.style.border="hidden"; 
							cell.appendChild(qty_stockK);
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				
				cell.align="center"
				var qty_stockK = document.createElement("input");
							qty_stockK.type="text";
							qty_stockK.border ="0";
							qty_stockK.value=destinationSel;	    
							qty_stockK.name ='destinationSel[]';
							qty_stockK.id='destinationSel'+rid;
							qty_stockK.readOnly = true;
							qty_stockK.style="text-align:center";
							qty_stockK.style.width="100%";
							qty_stockK.style.border="hidden"; 
							cell.appendChild(qty_stockK);
	
	
	
	
	
	
	

	
	
	
	
	
		
		
		indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
				var salepr = document.createElement("input");
							salepr.type="text";
							salepr.border ="0";
							salepr.value=rate;	    
							salepr.name ='rate[]';
							salepr.id='rate'+rid;
							salepr.readOnly = true;
							salepr.style="text-align:center";
							salepr.style.width="100%";
							salepr.style.border="hidden"; 
							cell.appendChild(salepr);
					
		
		
			
		indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
				var sRate = document.createElement("input");
							sRate.type="text";
							sRate.border ="0";
							sRate.value=srate;	    
							sRate.name ='srate[]';
							sRate.id='srate'+rid;
							sRate.readOnly = true;
							sRate.style="text-align:center";
							sRate.style.width="100%";
							sRate.style.border="hidden"; 
							cell.appendChild(sRate);
					
		
		
		
	
		//==============================close 2nd cell =========================================
		
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
							qtty.value=char_wt;	    
							qtty.name ='char_wt[]';
							qtty.id='char_wt'+rid;
							qtty.readOnly = true;
							qtty.style="text-align:center";
							qtty.style.width="100%";
							qtty.style.border="hidden"; 
							cell.appendChild(qtty);
								
		//======================================close 3rd cell========================================	
		
		//===================================start 4th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				//cell.style.display="none";
				cell.align="center"	
				
												
				var discount = document.createElement("input");
							discount.type="text";
							discount.border ="0";
							discount.value=total;	
							discount.name ='total[]';
							discount.id='total'+rid;
							discount.readOnly = true;
							discount.style="text-align:center";
							discount.style.width="100%";
							discount.style.border="hidden"; 
							cell.appendChild(discount);
		//===============================close 4th cell=================================
		
		
		
		
		

//===================================start 5th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"	
				
												
				var disAmtt = document.createElement("input");
							disAmtt.type="text";
							disAmtt.border ="0";
							disAmtt.value=box;	
							disAmtt.name ='box[]';
							disAmtt.id='box'+rid;
							disAmtt.readOnly = true;
							disAmtt.style="text-align:center";
							disAmtt.style.width="100%";
							disAmtt.style.border="hidden"; 
							cell.appendChild(disAmtt);
		//===============================close 5th cell=================================
		
		







//===================================start 5th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"	
				
												
				var cgstt = document.createElement("input");
							cgstt.type="text";
							cgstt.border ="0";
							cgstt.value=bag;	
							cgstt.name ='bag[]';
							cgstt.id='bag'+rid;
							cgstt.readOnly = true;
							cgstt.style="text-align:center";
							cgstt.style.width="100%";
							cgstt.style.border="hidden"; 
							cell.appendChild(cgstt);
		//===============================close 5th cell=================================
		




		
		
		
		
									
		//============================================start 7th price====================================							
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
			
			}

function clear()
{

// this finction is use for clear data after adding invoice
				document.getElementById("destination").value='';
				document.getElementById("origin").value='';
				
				document.getElementById("char_wt").value='';	
				document.getElementById("rate").value='';	
				document.getElementById("total").value='';	
		       	document.getElementById("box").value='';		
			  	document.getElementById("bag").value='';		
			 	document.getElementById("prd").value='';	
				document.getElementById("prd").focus();	
		
		
}






////////////////////////////////// starts edit code ////////////////////////////////


function editselectrow(d,r) //modify dyanamicly created rows or product detail
 {
 
var regex = /(\d+)/g;
nn= d.match(regex)
id=nn;
if(document.getElementById("prd").value!=''){
document.getElementById("prd").focus();
alert("Product already in edit Mode");
return false;
}


// ####### starts ##############//
var destination=document.getElementById("destination"+id).value;

				var rate=document.getElementById("rate"+id).value;
				var char_wt=document.getElementById("char_wt"+id).value;	
				var total=document.getElementById("total"+id).value;		
		       
			   var box=document.getElementById("box"+id).value;		
			   var bag=document.getElementById("bag"+id).value;		
			 	//default

				var pd=document.getElementById("pd"+id).value;
				// ####### ends ##############//

// ####### starts ##############//
destination=document.getElementById("destination").value=destination;
origin=document.getElementById("origin").value=origin;
				
				rate=document.getElementById("rate").value=rate;
				char_wt=document.getElementById("char_wt").value=char_wt;	
				total=document.getElementById("total").value=total;		
		       
			   document.getElementById("box").value=box;		
			   document.getElementById("bag").value=bag;		
			 	//default
				
				document.getElementById("prd").value=pd;
document.getElementById("prd").focus();
var grand_total=document.getElementById("grand_total").value;	

var gs=Number(grand_total)-Number(total);
document.getElementById("grand_total").value=gs;
document.getElementById("sub_total").value=gs;

// ####### ends ##############//
//editDeleteCalculation();

    var i = r.parentNode.parentNode.rowIndex;
	document.getElementById("invoice").deleteRow(i);
}

////////////////////////////////// ends edit code ////////////////////////////////




////////////////////////////////// starts delete code ////////////////////////////////

function deleteselectrow(d,r) //delete dyanamicly created rows or product detail
 {
 
var regex = /(\d+)/g;

nn= d.match(regex)
	id=nn;
	if(document.getElementById("prd").value!=''){
 		document.getElementById("prd").focus();
     alert("Product already in edit Mode");
return false;
}




		var destination=document.getElementById("destination"+id).value;
var origin=document.getElementById("origin"+id).value;
				var total=document.getElementById("total"+id).value;
				var char_wt=document.getElementById("char_wt"+id).value;	
				var rate=document.getElementById("rate"+id).value;		
		       
			   var box=document.getElementById("box"+id).value;		
			   var bag=document.getElementById("bag"+id).value;		
			 	//default

				var pd=document.getElementById("pd"+id).value;

		var grand_total=document.getElementById("grand_total").value;	

var gs=Number(grand_total)-Number(total);
document.getElementById("grand_total").value=gs;
document.getElementById("sub_total").value=gs;

	    var i = r.parentNode.parentNode.rowIndex;
     var cnf = confirm('Are You Sure..??? you want to Delete line no1.'+(id));
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


var total=document.getElementById("total").value;
var subb=document.getElementById("sub_total").value;
var gt=document.getElementById("grand_total").value;

			var total=(Number(total));
			
			var total=Number(total)+Number(gt);
			
			var Stotal=Number(total)+Number(gt);
			
			
			document.getElementById("grand_total").value=total.toFixed(2);	
			document.getElementById("sub_total").value=total.toFixed(2);
			
			
			
			}


		
			




// ###### starts when item we edit or delete ##########//
function editDeleteCalculation()
{
	
var sub_total=document.getElementById("sub_total").value;
var grand_total=document.getElementById("grand_total").value;
var total_gst_tax_amt=document.getElementById("total_gst_tax_amt").value;
var total_tax_cgst_amt=document.getElementById("total_tax_cgst_amt").value;

var total_cgst=document.getElementById("total_cgst").value;
var total_sgst=document.getElementById("total_sgst").value;
var total_igst=document.getElementById("total_igst").value;

var total_tax_cgst_amt=document.getElementById("total_tax_cgst_amt").value;

var total_tax_sgst_amt=document.getElementById("total_tax_sgst_amt").value;

var total_tax_igst_amt=document.getElementById("total_tax_igst_amt").value;




if(Number(total_igst)!='')
{

total_igst_cal=total_igst-igst;	
document.getElementById("total_igst").value=total_igst_cal;







total_tax_igst_amt_cal=total_tax_igst_amt-gstTotal;	
document.getElementById("total_tax_igst_amt").value=total_tax_igst_amt_cal;



}
else
{
total_cgst_cal=total_cgst-cgst;
total_sgst_cal=total_sgst-sgst;
total_tax_cgst_amt_cal=total_tax_cgst_amt-gstTotal/2;
total_tax_sgst_amt_cal=total_tax_sgst_amt-gstTotal/2;

document.getElementById("total_cgst").value=total_cgst_cal;
document.getElementById("total_sgst").value=total_sgst_cal;
document.getElementById("total_tax_cgst_amt").value=total_tax_cgst_amt_cal;
document.getElementById("total_tax_sgst_amt").value=total_tax_sgst_amt_cal;

}

sub_total_cal=sub_total-tot;
grand_total_cal=grand_total-nettot;

total_dis_cal=total_dis-discount;
total_dis_amt_cal=total_dis_amt-disAmt;

total_gst_tax_amt_cal=total_gst_tax_amt-gstTotal;




document.getElementById("sub_total").value=sub_total_cal.toFixed(2);
document.getElementById("grand_total").value=grand_total_cal.toFixed(2);

document.getElementById("total_gst_tax_amt").value=total_gst_tax_amt_cal;



document.getElementById("total_dis").value=total_dis_cal;
document.getElementById("total_dis_amt").value=total_dis_amt_cal;

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

  function getRate(v)
  {
	  
	  var mode=document.getElementById("mode").value;
	  
	  var contact_id_copy=document.getElementById("contact_id_copy").value;
	  var origin=document.getElementById("origin").value;
	  var destination=document.getElementById("destination").value;

/*
if(mode=='')
{
alert("Please select Mode");
document.getElementById("mode").focus();
return false;
	
}
*/
	  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getRate?con="+contact_id_copy+"&mode="+mode+"&origin="+origin+"&destination="+destination, false);
  xhttp.send();
  
  //alert(xhttp.responseText);
  
  
  document.getElementById("lpr").innerHTML  = xhttp.responseText;
  document.getElementById("rate").value = xhttp.responseText;
	  
  }
</script>
</form>
<?php
$this->load->view("footer.php");
?>