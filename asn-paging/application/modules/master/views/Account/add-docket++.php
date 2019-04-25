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
			 
			<li><a class="btn btn-success" href="<?=base_url();?>master/Account/manage_docket">Manage Docket</a></li> 
			
		</ol>
		<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Master</a></li> 
				 
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
<form class="form-horizontal" method="post" action="insert_docket">
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
<input type="text" id="length" placeholder="L" class="form-control"  <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div>

<div class="col-sm-1" id="regid"> 
<input type="text" id="width" placeholder="W" class="form-control"  <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div>

<div class="col-sm-1" id="regid"> 
<input type="text" id="height" placeholder="H" class="form-control"  <?php if(@$_GET['view']!=''){ ?>  readonly="" <?php }?>>
</div>

<div class="col-sm-1" id="regid"> 
<input type="text"  id="cftAir" placeholder="D" class="form-control"  <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div>

<div class="col-sm-1" id="regid"> 
<input type="text"  id="qty" placeholder="D" class="form-control"  value="1" <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div>

<div class="col-sm-2" id="regid"> 
<input type="button" onclick="adda()" value="Next">

</div> 
 
 
</div>
<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
<table id="invo" style="width:100%;  background:#dddddd;  height:70%;" title="Invoice"  >
<tr>
<td style="width:1%;"><div align="center"><u>Sl No</u>.</div></td>
<td style="width:11%;"><div align="center"><u>Length</u></div></td>
<td style="width:3%;"> <div align="center"><u>Width</u></div></td>
<td style="width:3%;"><div align="center"><u>Height</u></div></td>
<td style="width:3%;"> <div align="center"><u>Dimension</u></div></td>
<td style="width:3%;"> <div align="center"><u>Quantity</u></div></td>
<td style="width:3%;"> <div align="center"><u>Total</u></div></td>
<td style="width:3%;"> <div align="center"><u>Action</u></div></td>
</tr>
</table>


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
<input type="number" name="no_of_package" id="no_of_package"  value="<?php echo $branchFetch->no_of_package; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
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
<input type="number" step="any" min="0" name="dimension_weight" id="dimension_weight" value="<?php echo $branchFetch->dimension_weight; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
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
<input type="number" min="0" step="any" name="rate" id="rate" value="<?php echo $branchFetch->rate; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
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
<input type="date"  name="edd" value="<?php echo $branchFetch->edd; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<div class="well">
<div class="col-sm-12">Payment</div>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Frieght Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" name="frieght_charge" id="frieght_charge" value="<?php echo $branchFetch->frieght_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">FOV(in %):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" id="fov" step="any" onkeyup="cal();" name="fov" value="<?php echo $branchFetch->fov; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Docket Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" id="docketCharge" name="docket_charge" value="<?php echo $branchFetch->docket_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Minimum Weight:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="minimum_weight" value="<?php echo $branchFetch->minimum_weight; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Other Charges:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" id="other_charges" name="other_charges" value="<?php echo $branchFetch->other_charges; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">DOD / COD Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" id="codCharge" name="dod_cod_charge" value="<?php echo $branchFetch->dod_cod_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Fuel Charge(%):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" id="fuelCharge" name="fuel_charge" value="<?php echo $branchFetch->fuel_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">ODA Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" name="oda_charge" id="oda_charge" value="<?php echo $branchFetch->oda_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Total Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" name="total_amount" id="Ttotal" value="<?php echo $branchFetch->total_amount; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Chargeable Weight:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" name="chargeable_weight" id="chargeable_weight" value="<?php echo $branchFetch->chargeable_weight; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*GSTIN(in%):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="gst" onkeyup="cal();" id="gst" value="<?php echo $branchFetch->gst; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
</div> 
<label class="col-sm-2 control-label">Other Tax( in % ):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" onkeyup="cal();" name="other_tax" id="other_tax" value="<?php echo $branchFetch->other_tax; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Grand Total:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="grand_total" id="grand_total" value="<?php echo $branchFetch->grand_total; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" >
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
       <a href="<?=base_url();?>master/Account/manage_docket" class="btn btn-blue">Cancel</a>

       <?php } ?>

</div>
</div>
</form>
</div>
</div>
</div>

<script type="text/javascript">

  var rw=0;
	 
 function adda()
		  { 
		  		 
				var length=document.getElementById("length").value;
				var width=document.getElementById("width").value;
				var height=document.getElementById("height").value;
				var cftAir=document.getElementById("cftAir").value;	
				var qty=document.getElementById("qty").value;
				
				if(length!=''){
						
						var mtx=Number(length)*Number(width)*Number(height);
						var div=Number(mtx)/Number(cftAir);						
						var total=Number(div)*Number(qty);
						
				}
						
				//default
				var rows=document.getElementById("rows").value;
				
		   	   var table = document.getElementById("invoice");
					var rid =Number(rows)+1;
					
					document.getElementById("rows").value=rid;			
					
							cal();	
							totalSum();
			 				clear();
				
					 currentCell = 0;
	if(length!="" && width!=0)
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
							prd.name='length[]';//
							prd.id='length'+rid;//
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
							salepr.name ='width[]';
							salepr.id='width'+rid;
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
							heightamt.name ='height[]';
							heightamt.id='height'+rid;
							heightamt.readOnly = true;
							heightamt.style="text-align:center";
							heightamt.style.width="100%";
							heightamt.style.border="hidden"; 
							cell.appendChild(heightamt);
	
		//==============================close 3th cell =========================================
		
		
		//#################cell 4th starts here####################//
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
				

				var heightamt = document.createElement("input");
							heightamt.type="text";
							heightamt.border ="0";
							heightamt.value=cftAir;	    
							heightamt.name ='cftAir[]';
							heightamt.id='cftAir'+rid;
							heightamt.readOnly = true;
							heightamt.style="text-align:center";
							heightamt.style.width="100%";
							heightamt.style.border="hidden"; 
							cell.appendChild(heightamt);
	
		//==============================close 4th cell =========================================
		
		//#################cell 5th starts here####################//
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
				

				var heightamt = document.createElement("input");
							heightamt.type="text";
							heightamt.border ="0";
							heightamt.value=qty;	    
							heightamt.name ='qty[]';
							heightamt.id='qty'+rid;
							heightamt.readOnly = true;
							heightamt.style="text-align:center";
							heightamt.style.width="100%";
							heightamt.style.border="hidden"; 
							cell.appendChild(heightamt);
	
		//==============================close 6th cell =========================================
		
		//#################cell 5th starts here####################//
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
				

				var totalamt = document.createElement("input");
							totalamt.type="text";
							totalamt.border ="0";
							totalamt.value=total;	    
							totalamt.name ='totalname[]';
							totalamt.id='total'+rid;
							totalamt.readOnly = true;
							totalamt.style="text-align:center";
							totalamt.style.width="100%";
							totalamt.style.border="hidden"; 
							cell.appendChild(totalamt);
	
		//==============================close 6th cell =========================================
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
						delt.style.width="30%";
						delt.style.height="20%";
						delt.name ='dlt';
						delt.id='dlt'+rid;
						delt.style.border="hidden"; 
						delt.onclick= function() { deleteselectrow(delt.id,delt); };
					    cell.appendChild(delt);
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
			
function totalSum(){

var subb=document.getElementById("dimension_weight").value;
var nopackage=document.getElementById("no_of_package").value;
			var tol=(Number(total));
			var totaldim=Number(tol)+Number(subb);
	
			var qnty=(Number(qty));
			var totalqty=Number(qnty)+Number(nopackage);
			document.getElementById("dimension_weight").value=totaldim.toFixed(2);
			document.getElementById("no_of_package").value=totalqty.toFixed(2);
			
}


function clear()
{

		document.getElementById("length").value='';
		document.getElementById("width").value='';
		document.getElementById("height").value='';
		//document.getElementById("cftAir").value='';
		//document.getElementById("qty").value='';
		document.getElementById("length").focus();	
		
		
}


////////////////////////////////// starts delete code ////////////////////////////////

function deleteselectrow(d,r) //delete dyanamicly created rows or product detail
 {
 
var regex = /(\d+)/g;

nn= d.match(regex)
	id=nn;
	if(document.getElementById("length").value!=''){
 		document.getElementById("length").focus();
     alert("Product already in edit Mode");
return false;
}




		var length=document.getElementById("length"+id).value;
	//	var unit=document.getElementById("unit"+id).value;
		var width=document.getElementById("width"+id).value;
		var height=document.getElementById("height"+id).value;
		var cftAir=document.getElementById("cftAir"+id).value;
		var qty=document.getElementById("qty"+id).value;
		var total=document.getElementById("total"+id).value;
		
	//	var pri_id=document.getElementById("main_id"+id).value;

	    var i = r.parentNode.parentNode.rowIndex;
     var cnf = confirm('Are You Sure..??? you want to Delete line no1.'+(id));
if (cnf== true)
 {
 document.getElementById("invoice").deleteRow(i);
 
	deletetotalSum();
	}
	
	}
////////////////////////////////// ends delete code ////////////////////////////////

function deletetotalSum(){

var subb=document.getElementById("dimension_weight").value;
var nopackage=document.getElementById("no_of_package").value;
			var tol=(Number(total));
			var totaldim=Number(subb)-Number(tol);
	
			var qnty=(Number(qty));
			var totalqty=Number(nopackage)-Number(qnty);
			document.getElementById("dimension_weight").value=totaldim.toFixed(2);
			document.getElementById("no_of_package").value=totalqty.toFixed(2);
			
}						
		}
		

function fsv(v)
{
var rc=document.getElementById("rows").value;
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
</script>

<?php
$this->load->view("footer.php");

?>

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
var rate=conatctData[5];

document.getElementById("cftAir").value=cftAir;						
document.getElementById("fov").value=fov;
document.getElementById("docketCharge").value=docketCharge;
document.getElementById("codCharge").value=docketCharge;
document.getElementById("fuelCharge").value=fuelCharge;		
document.getElementById("rate").value=rate;		
				


cal();



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



function cal()
{

var rate=document.getElementById("rate").value;
var frieght_charge=document.getElementById("frieght_charge").value;
var fov=document.getElementById("fov").value;
var other_charges=document.getElementById("other_charges").value;
var codCharge=document.getElementById("codCharge").value;
var fuelCharge=document.getElementById("fuelCharge").value;
var oda_charge=document.getElementById("oda_charge").value;
var total_amount=document.getElementById("Ttotal").value;
var other_tax=document.getElementById("other_tax").value;
var gst=document.getElementById("gst").value;

var gTot=Number(rate)+Number(frieght_charge)+Number(fov)+Number(other_charges)+Number(codCharge)+Number(fuelCharge)+Number(oda_charge)+Number(other_tax);


document.getElementById("Ttotal").value=gTot;

var TotalAfterGstCat=Number(gTot)*Number(gst)/100;

var totalAfterGST=Number(gTot)+TotalAfterGstCat;


document.getElementById("grand_total").value=totalAfterGST;

}


</script>

