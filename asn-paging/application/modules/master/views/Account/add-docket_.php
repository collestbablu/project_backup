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

?>
	<!-- Main content -->
	<div class="main-content">
		
		<?php if(@$_GET['popup'] == 'True') {} else {?>
		<ol class="breadcrumb breadcrumb-2"> 
			 
			<li><a class="btn btn-success" href="<?=base_url();?>master/Account/manage_contact">Manage Docket</a></li> 
			
		</ol>
		<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Master</a></li> 
				<li><a href="#">Docket</a></li> 
				<li class="active"><strong><a href="#">Docket</a></strong></li> 
			</ol>
		<?php }?>
		
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<?php if($_GET['id']!=''){ ?>
		<h4 class="panel-title"><strong>Update Docket</strong></h4>
		<?php }elseif($_GET['view']!=''){ ?>
		<h4 class="panel-title"><strong>View Docket</strong></h4>
		<?php }else{ ?> 
		<h4 class="panel-title"><strong>Add Docket</strong></h4>
		<?php } ?>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="insert_contact">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Docket No.:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="contact_id" value="<?php echo $branchFetch->contact_id; ?>" />
<input type="text" name="docket_no" value="<?php echo $branchFetch->docket_no; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Consignor:</label> 
<div class="col-sm-4"> 
<?php
	   	 $hdrQuery=$this->db->query("select * from tbl_contact_m where contact_id='".$_GET['id']."' or contact_id='".$_GET['view']."'");
         $hrdrow=$hdrQuery->row();
	  
	  ?>
	  
<select name="consignor" onchange="getConsinor(this.value);" id="consignor" class="form-control" required <?php if(@$_GET['view']!=''){ ?> disabled <?php }?>>

<option value="">-------select---------</option>

<?php
$ugroup2=$this->db->query("select * from tbl_contact_m where status='A' and group_name='5'");
foreach ($ugroup2->result() as $fetchunit){



?>

<option value="<?php  echo $fetchunit->contact_id ;?>"<?php if($fetchunit->contact_id==$hrdrow->contact_id){ ?> selected <?php } ?>><?php echo $fetchunit->first_name;?></option>
<?php } ?>
</select>
</div> 
</div>
<div id="catTypeDiv">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Origin:</label> 
<div class="col-sm-4"> 
<select name="origin" class="form-control" required <?php if(@$_GET['view']!=''){ ?> disabled <?php }?>>

<option value="">-------select---------</option>
</select>
</div> 
<label class="col-sm-2 control-label">*Destination:</label> 
<div class="col-sm-4" id="regid"> 
<select name="destination" class="form-control" required <?php if(@$_GET['view']!=''){ ?> disabled <?php }?>>
<option value="">-------select---------</option>
</select>

</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Consignee:</label> 
<div class="col-sm-4" id="regid"> 


<select name="consignee" class="form-control" required <?php if(@$_GET['view']!=''){ ?> disabled <?php }?>>

<option value="">-------select---------</option>
<?php
$ugroup2=$this->db->query("select * from tbl_contact_m where status='A' and group_name='4'");
foreach ($ugroup2->result() as $fetchunit){



?>

<option value="<?php  echo $fetchunit->contact_id ;?>"<?php if($fetchunit->contact_id==$hrdrow->contact_id){ ?> selected <?php } ?>><?php echo $fetchunit->first_name;?></option>
<?php } ?>
</select>

</div> 
<label class="col-sm-2 control-label">Consignor Mobile No.</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="consignor_mobile" class="form-control" value="<?php $branchFetch->consignor_mobile; ?>" required />
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Consignor Email Id.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="email" name="consignor_email_id" class="form-control" required <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div> 
<label class="col-sm-2 control-label">Consignee Mobile No.</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="consignee_mobile" class="form-control" value="<?php $branchFetch->consignee_mobile; ?>" required />
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Consignee Email Id.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="email" name="consignee_email_id" class="form-control" required <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div> 
<label class="col-sm-2 control-label">Mode</label> 
<div class="col-sm-4" id="regid"> 
<select name="mode" class="form-control">
<option value="">--Select--</option>
<option value="Air">Air</option>
<option value="Train">Train</option>
<option value="Surface">Surface</option>
</select></div> 
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*CFT:</label> 
<div class="col-sm-1" id="regid"> 
<input type="text" name="length" id="length" placeholder="L" class="form-control" required <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div>

<div class="col-sm-1" id="regid"> 
<input type="text" name="width" id="width" placeholder="W" class="form-control" required <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div>

<div class="col-sm-1" id="regid"> 
<input type="text" name="height" id="height" placeholder="H" class="form-control" required <?php if(@$_GET['view']!=''){ ?>  readonly="" <?php }?>>
</div>

<div class="col-sm-1" id="regid"> 
<input type="text" name="diamantion" id="cftAir" placeholder="D" class="form-control" required <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div>

<div class="col-sm-1" id="regid"> 
<input type="text" name="qty" id="qty" placeholder="D" class="form-control" required value="1" <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div>

<div class="col-sm-2" id="regid"> 
<input type="button" onclick="adda()" class="btn btn-primary" value="Next">

</div> 
 
 
</div>
<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">

<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

<tr></tr>
</table>

<input type="hidden" name="rows" id="rows">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />

</div>


</div>
<div id="show" >

<div class="form-group"> 
<label class="col-sm-2 control-label">*No. Of Package:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="no_of_package"  value="<?php echo $branchFetch->no_of_package; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Goods:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="goods" value="<?php echo $branchFetch->goods; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Actual Weight:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="actual_weight" value="<?php echo $branchFetch->actual_weight; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Dimension Weight:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" min="0" name="dimension_weight" value="<?php echo $branchFetch->dimension_weight; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Invoice Value:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="invoice_value" value="<?php echo $branchFetch->invoice_value; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Customer Invoice No.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="customer_invoice_no" value="<?php echo $branchFetch->customer_invoice_no; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Rate:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="rate" value="<?php echo $branchFetch->rate; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Mode Of Payment:</label> 
<div class="col-sm-4" id="regid"> 
<select name="mode_of_payment" class="form-control" >
<option value="">Payment Mode</option>
<option value="Paid">Paid</option>
<option value="To Pay">To Pay</option>
<option value="TBB">TBB</option>

</select></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Booking Date:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date"  name="booking_date" value="<?php echo $branchFetch->booking_date; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">EDD:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text"  name="edd" value="<?php echo $branchFetch->edd; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<div class="well">
<div class="col-sm-12">Payment</div>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Frieght Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="frieght_charge" value="<?php echo $branchFetch->frieght_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">FOV(in %):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" id="fov" step="any" name="fov" value="<?php echo $branchFetch->fov; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Docket Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" id="docketCharge" name="docket_charge" value="<?php echo $branchFetch->docket_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Minimum Weight:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="minimum_weight" value="<?php echo $branchFetch->minimum_weight; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Other Charges:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="other_charges" value="<?php echo $branchFetch->other_charges; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">DOD / COD Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" id="codCharge" name="dod_cod_charge " value="<?php echo $branchFetch->dod_cod_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Fuel Charge(%):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" id="fuelCharge" name="fuel_charge" value="<?php echo $branchFetch->fuel_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">ODA Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="oda_charge " value="<?php echo $branchFetch->oda_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Total Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="total_amount" value="<?php echo $branchFetch->total_amount; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Chargeable Weight:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="chargeable_weight " value="<?php echo $branchFetch->chargeable_weight; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*GTS(in%):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="swach_bhart_tax" value="<?php echo $branchFetch->swach_bhart_tax; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Other Tax( in % ):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="krishi_cess" value="<?php echo $branchFetch->krishi_cess; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Grand Total:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="grand_total" value="<?php echo $branchFetch->grand_total; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Remarks:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text"  name="remarks" value="<?php echo $branchFetch->remarks; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>



<div class="form-group">

</div>
</div>
<div class="form-group">
<div class="col-sm-4 col-sm-offset-2">
<?php if(@$_GET['popup'] == 'True') {
if($_GET['id']!=''){
?>
<input type="submit" class="btn btn-primary" value="Save">
<?php } ?>
<a href="" onclick="popupclose(this.value)"  title="Cancel" class="btn btn-blue"> Cancel</a>

	   	 <?php }else {  ?>
		 
		<input  type="button"   id="sv1" onclick="fsv(this)" class="btn btn-primary" value="Save">
       <a href="<?=base_url();?>master/Account/manage_contact" class="btn btn-blue">Cancel</a>

       <?php } ?>

</div>
</div>
</form>
</div>
</div>
</div>

<?php
$this->load->view("footer.php");

?>
<script>
  var rw=0;
	 
 function adda()
		  { 
		 alert();
		  		 

				var length=document.getElementById("length").value;
				var width=document.getElementById("width").value;
				var height=document.getElementById("height").value;
				var cftAir=document.getElementById("cftAir").value;	
				var qty=document.getElementById("qty").value;		
		       
				//default
				var rows=document.getElementById("rows").value;
				
		   	   var table = document.getElementById("invoice");
					var rid =Number(rows)+1;
					document.getElementById("rows").value=rid;
					
						
			 				clear();
				
					 currentCell = 0;
	if(frmOrg!="" && toOrg!=0)
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
				cell.style.width="8%";
				cell.align="center";
				
				
				
				
				//============================item text ============================
				var prd = document.createElement("input");
							prd.type="text";
							prd.border ="0";
							prd.value=length;	
							prd.name='frmOrg[]';//
							prd.id='frmOrg'+rid;//
							prd.readOnly = true;
							prd.style="text-align:center";  
							prd.style.width="100%";
							prd.style.border="hidden"; 
							cell.appendChild(prd);
							
		
			
								// ends here
	
	
	//#################cell 2nd starts here####################//
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
				

				var salepr = document.createElement("input");
							salepr.type="text";
							salepr.border ="0";
							salepr.value=width;	    
							salepr.name ='toOrgss[]';
							salepr.id='toOrg'+rid;
							salepr.readOnly = true;
							salepr.style="text-align:center";
							salepr.style.width="100%";
							salepr.style.border="hidden"; 
							cell.appendChild(salepr);
	
		//==============================close 2nd cell =========================================
		
		//#################cell 3th starts here####################//
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
				

				var heightamt = document.createElement("input");
							heightamt.type="text";
							heightamt.border ="0";
							heightamt.value=height;	    
							heightamt.name ='toOrgss[]';
							heightamt.id='toOrg'+rid;
							heightamt.readOnly = true;
							heightamt.style="text-align:center";
							heightamt.style.width="100%";
							heightamt.style.border="hidden"; 
							cell.appendChild(heightamt);
	
		//==============================close 3th cell =========================================
		
		}
		
</script>

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

function getConsinor(consignor) {	



		var strURL="getConsinor?type="+consignor;



		



		var req = getXMLHTTP();



		



		if (req) {



			



			req.onreadystatechange = function() {



				if (req.readyState == 4) {



					// only if "OK"



					if (req.status == 200) {



						//alert(req.responseText);



						document.getElementById('catTypeDiv').innerHTML=req.responseText;						
//alert(conn);


					} else {



						alert("There was a problem while using XMLHTTP:\n" + req.statusText);



					}



				}				



			}			



			req.open("GET", strURL, true);



			req.send(null);



		}


	}
















function consinee(consi) {	

		var strURL="getconsinee?type="+consi;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						var data=req.responseText;

var conatctData=data.split("^");
var contactEmail=conatctData[0];
var contactMobile=conatctData[1];

document.getElementById("idMobile").value=contactMobile;						
document.getElementById("idEmail").value=contactEmail;						
//document.getElementById('catTypeDiv').innerHTML=req.responseText;						
//alert(conn);


					} else {



						alert("There was a problem while using XMLHTTP:\n" + req.statusText);



					}



				}				



			}			



			req.open("GET", strURL, true);



			req.send(null);



		}


	}







function getModeFee(mode) {	

var conId=document.getElementById("consignor").value;

		var strURL="getModeFee?type="+mode+"&contId="+conId;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						var data=req.responseText;
var conatctData=data.split("^");
var cftAir=conatctData[0];
var fov=conatctData[1];
var docketCharge=conatctData[2];
var codCharge=conatctData[3];
var fuelCharge=conatctData[4];

document.getElementById("cftAir").value=cftAir;						
document.getElementById("fov").value=fov;
document.getElementById("docketCharge").value=docketCharge;
document.getElementById("codCharge").value=docketCharge;
document.getElementById("fuelCharge").value=fuelCharge;						



//document.getElementById('catTypeDiv').innerHTML=req.responseText;						
//alert(conn);


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
