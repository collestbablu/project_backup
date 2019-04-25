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
			 
			<li><a class="btn btn-success" href="<?=base_url();?>master/Account/manage_contact">Manage Consignor/Consignee</a></li> 
			
		</ol>
		<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Master</a></li> 
				<li><a href="#">Consignor/Consignee</a></li> 
				<li class="active"><strong><a href="#">Consignor/Consignee</a></strong></li> 
			</ol>
		<?php }?>
		
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<?php if($_GET['id']!=''){ ?>
		<h4 class="panel-title"><strong>Update Contact</strong></h4>
		<?php }elseif($_GET['view']!=''){ ?>
		<h4 class="panel-title"><strong>View Contact</strong></h4>
		<?php }else{ ?> 
		<h4 class="panel-title"><strong>Add Contact</strong></h4>
		<?php } ?>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="updatecContact">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="contact_id" value="<?php echo $branchFetch->contact_id; ?>" />
<input type="text" name="first_name" value="<?php echo $branchFetch->first_name; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
<?php
	   	 $hdrQuery=$this->db->query("select * from tbl_contact_m where contact_id='".$_GET['id']."' or contact_id='".$_GET['view']."'");
         $hrdrow=$hdrQuery->row();
	  
	  ?>
	  <input type="hidden" name="grpname" value="<?php echo $hrdrow->contact_id;?>" />
<select name="maingroupname" class="form-control" required id="contact_id_copy5" onchange="showHideww();" <?php if(@$_GET['view']!=''){ ?> disabled <?php }?>>

<option value="">-------select---------</option>

<?php
if($_GET['popup']=='True' and $_GET['con']!=''  ){



$ugroup2=$this->db->query("SELECT * FROM tbl_account_mst where account_id= '".$_GET['con']."' " );

}

else
{


$ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");
}
foreach ($ugroup2->result() as $fetchunit){



?>

<option value="<?php  echo $fetchunit->account_id ;?>"<?php if($fetchunit->account_id==$hrdrow->group_name){ ?> selected <?php } ?>><?php echo $fetchunit->account_name;?></option>
<?php } ?>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="text" name="mobile" value="<?php echo $branchFetch->mobile; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email" value="<?php echo $branchFetch->email; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> required class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Address.:</label> 
<div class="col-sm-4" id="regid"> 
<textarea class="form-control"  style="height:100px; width:299px;" name="address"  <?php if(@$_GET['view']!=""){?> readonly <?php } ?>><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $branchFetch->address ;} ?> </textarea>
</div> 
<label class="col-sm-2 control-label">Consignee</label> 
<div class="col-sm-4" id="regid"> 
<select name="consignor_singal_id[]" class="form-control" multiple="multiple">
	<option value="">---select---</option>
    <?php 
	$conqry=$this->db->query("select * from tbl_contact_m where status='A' and group_name='4'");
	foreach ($conqry->result() as $fetchcon){
		$explode=explode(",",$branchFetch->consignor_singal_id);
 ?>
    <option value="<?php  echo $fetchcon->contact_id ;?>"<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ for ($j=0;$j<=count($branchFetch->consignor_singal_id);$j++){  $ex=$explode[$j]; if($fetchcon->contact_id==$ex){ ?> selected <?php } } }?>><?php echo $fetchcon->first_name;?></option>
	<?php  } ?>
</select>
</div> 
</div>
<?php if($branchFetch->group_name==5){ ?> 
<div id="show">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Contract From Date.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="contact_from_date" value="<?php echo $branchFetch->contact_from_date; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">Contract To Date.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="contact_to_date" value="<?php echo $branchFetch->contact_to_date; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Other Contact.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="other_contact" value="<?php echo $branchFetch->other_contact; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">FOV(%).:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" min="0" name="fov" value="<?php echo $branchFetch->fov; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Docket Charge.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="docket_charge" value="<?php echo $branchFetch->docket_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">DOD / COD Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="cod_charge" value="<?php echo $branchFetch->cod_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Fuel Charge(%):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="fuel_charge" value="<?php echo $branchFetch->fuel_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">CFT Train:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="cft_train" value="<?php echo $branchFetch->cft_train; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*CFT Surface:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="cft_surface" value="<?php echo $branchFetch->cft_surface; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">CFT Air:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="cft_air" value="<?php echo $branchFetch->cft_air; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Minimum weight(Air):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="min_weight_air" value="<?php echo $branchFetch->min_weight_air; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">Minimum weight(Train):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="min_weight_train" value="<?php echo $branchFetch->min_weight_train; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Minimum weight(Surface):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="min_weight_surface" value="<?php echo $branchFetch->min_weight_surface; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Goods:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" min="0" step="any" name="goods" value="<?php echo $branchFetch->goods; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<div class="well">
<div class="col-sm-12">Destination & Rate Charge</div>
</div> 
</div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >
<tbody>
<tr class="gradeA">
<th>From(Origin)</th>
<th>To(Destination)</th>
<th>Rate/Kg(Air)</th>
<th>Rate/Kg(Train</th>
<th>Rate/Kg(Surface)</th>
<th>Other Charges</th>
<th>ODA Charget</th>

</tr>

<tr class="gradeA">
<th style="width:280px;">
<div class="input-group"> 
<div style="width:100%; height:28px;" >
<!--<input type="text"  name="prd"   id="frmOrg" style=" width:190px;" class="form-control" placeholder=" Search Items..." tabindex="5" >-->
<select name="frmOrg"   id="frmOrg" style=" width:190px;" class="form-control" placeholder=" Search Items..." tabindex="5">
		<option value="">---select---</option>
        <?php
		 $masterdata=$this->db->query("select * from tbl_master_data where param_id='16'");
		 foreach($masterdata->result() as $fetchq){				 
		?>
        <option value="<?php echo $fetchq->serial_number; ?>"><?php echo $fetchq->keyvalue; ?></option>
        <?php } ?>
</select>
 <input type="hidden"  name="pri_id" id='pri_id'  value="" style="width:80px;"  />
<img style="display:none"   src="<?php echo base_url();?>/assets/images/search11.png"  onClick="openProduct();" /></div>

</div>
<div id="prdsrch" style="color:black;padding-left:0px; width:30%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
<?php
//include("getproduct.php");
//$this->load->view('getproduct');

?>
</div>
</th>
<th>
<!--<input type="text"  name="prd"   id="toOrg" style=" width:230px;" class="form-control" placeholder=" Search Items..." tabindex="5" >-->
<select name="toOrg"   id="toOrg" style=" width:230px;" class="form-control"  tabindex="6">
		<option value="">---select---</option>
        <?php
		 $masterdata=$this->db->query("select * from tbl_master_data where param_id='16'");
		 foreach($masterdata->result() as $fetchq){				 
		?>
        <option value="<?php echo $fetchq->serial_number; ?>"><?php echo $fetchq->keyvalue; ?></option>
        <?php } ?>
</select>
</th>
<th>
<b id="lpr"></b>
<input type="number" step="any" id="rateAir" min="1"  value="" class="form-control" style="width:70px;" tabindex="7"></th>
<th><input type="number" step="any" id="rateTrain" min="1" style="width:100px;"   class="form-control" tabindex="8"></th>
<th><input type="number" step="any" id="rateSurface" min="1" style="width:100px;"   class="form-control" tabindex="9"></th>

<th><input type="number" step="any" name="saleamnt" id="otherCharge"  style="width:70px;" tabindex="10"/ ></th>
<th><input type="number" step="any" name="saleamnt" id="odaCharge"   style="width:70px;" tabindex="11"/ ></th>

</tr>

</tbody>
</table>
</div>
<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
<table id="invo" style="width:100%;  background:#dddddd;  height:70%;" title="Invoice"  >
<tr>
<td style="width:1%;"><div align="center"><u>Sl No</u>.</div></td>
<td style="width:11%;"><div align="center"><u>From(Origin)</u></div></td>
<td style="width:3%;"> <div align="center"><u>To(Destination)</u></div></td>
<td style="width:3%;"><div align="center"><u>Rate/Kg(Air)</u></div></td>
<td style="width:3%;"> <div align="center"><u>Rate/Kg(Train)</u></div></td>
<td style="width:3%;"> <div align="center"><u>Rate/Kg(Surface)</u></div></td>
<td style="width:3%;"> <div align="center"><u>Other Charges</u></div></td>
<td style="width:3%;"> <div align="center"><u>ODA Charget</u></div></td>
<td style="width:3%;"> <div align="center"><u>Action</u></div></td>
</tr>
</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

<tr></tr>
<?php
$z=1;
$query_dtl=$this->db->query("select * from tbl_contact_dtl where contact_id='".$_GET['id']."' or contact_id='".$_GET['view']."' ");
foreach($query_dtl->result() as $invoiceFetch)
{

$productQuery=$this->db->query("select *from tbl_master_data where serial_number='$invoiceFetch->frmOrg'");
$getProductName=$productQuery->row();

$toOrgQuery=$this->db->query("select *from tbl_master_data where serial_number='$invoiceFetch->toOrg'");
$gettoOrg=$toOrgQuery->row();
?>
<tr>
<td align="center" style="width: 0.2%;"><?php echo $z;?></td>

<td align="center" style="width: 6%;">
<input type="hidden" name="frmOrg[]" id="frmOrg<?php echo $z;?>" value="<?php echo $getProductName->serial_number;?>">
<input type="text" name="frmOrgddd[]" id="frmOrgx<?php echo $z;?>" value="<?php echo $getProductName->keyvalue;?>" readonly="" style="text-align: center; width: 100%; border: hidden;">
</td>
<td align="center" style="width: 5%;">
<input type="hidden" name="toOrg[]" id="toOrg<?php echo $z;?>" value="<?php echo $gettoOrg->serial_number;?>">
<input type="text" name="toOrgss[]" id="toOrgd<?php echo $z;?>" value="<?php echo $gettoOrg->keyvalue;?>"readonly="" style="text-align: center; width: 100%; border: hidden;">
</td>

<td align="center" style="width: 5%;"><input type="text" name="rateAir[]" id="rateAir<?php echo $z;?>" value="<?php echo $invoiceFetch->rateAir;?>"readonly="" style="text-align: center; width: 100%; border: hidden;">
</td>

<td align="center" style="width: 4%;"><input type="text" name="rateTrain[]" id="rateTrain<?php echo $z;?>" value="<?php echo $invoiceFetch->rateTrain;?>"readonly="" style="text-align: center; width: 100%; border: hidden;">
</td>

<td align="center" style="width: 4%;"><input type="text" name="rateSurface[]" id="rateSurface<?php echo $z;?>" value="<?php echo $invoiceFetch->rateSurface;?>"readonly="" style="text-align: center; width: 100%; border: hidden;">
</td>


<td align="center" style="width: 3%;">
<input type="text" name="otherCharge[]" id="otherCharge<?php echo $z;?>" value="<?php echo $invoiceFetch->otherCharge;?>" readonly="" style="text-align: center; width: 100%; border: hidden;">

</td>

<td align="center" style="width: 3%;">

<input type="text" name="odaCharge[]" id="odaCharge<?php echo $z;?>" value="<?php echo $invoiceFetch->odaCharge;?>"readonly="" style="text-align: center; width: 100%; border: hidden;">
</td>

<td align="center" style="width: 3%;"><img src="<?php echo base_url();?>assets/images/delete.png" border="0" name="dlt" id="dlt<?php echo $z;?>" onclick="deleteselectrow(this.id,this);"  readonly style="width: 30%; height: 20%; border: hidden;">



<img style="display:none" src="<?php echo base_url();?>assets/images/edit.png" border="0" name="ed" id="ed<?php echo $z;?>" onclick="editselectrow(this.id,this);" style="width: 30%; height: 20%; border: hidden;"></td>
</tr>
<?php $row=$z; $z++;  } ?>
</table>


<input type="hidden" name="rows" id="rows" value="<?php echo $row;?>">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />

</div>


</div>
<div class="form-group">

</div>
</div>
<?php } ?>
<div class="form-group">
<div class="col-sm-4 col-sm-offset-2">
<?php if(@$_GET['popup'] == 'True') {
if($_GET['id']!=''){
?>
<input type="button" id="sv1" onclick="fsv(this)" class="btn btn-primary" value="Save">
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
function showHide()
{
var cont=document.getElementById("contact_id_copy5").value;
var pro=cont;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getcommunicationfun?comm="+pro, false);
  xhttp.send();
  document.getElementById("show").innerHTML = xhttp.responseText;

}

</script>

<script>
//add item into showling list
window.addEventListener("keydown", checkKeyPressed, false);
//funtion to select product
function checkKeyPressed(e) {
var s=e.keyCode;

var ppp=document.getElementById("frmOrg").value;
var sspp=document.getElementById("spid").value;//
var ef=document.getElementById("ef").value;
		ef=Number(ef);
		


//if(countids==''){
//countids=1;
//}


document.getElementById("frmOrg").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("toOrg").focus();
}
}



document.getElementById("toOrg").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
	
document.getElementById("rateAir").focus();
}
}

document.getElementById("rateAir").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("rateTrain").focus();
}
}

document.getElementById("rateTrain").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("rateSurface").focus();
}
}


document.getElementById("rateSurface").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("otherCharge").focus();
}
}



document.getElementById("otherCharge").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("odaCharge").focus();
}
}




document.getElementById("odaCharge").onkeyup = function (e) {
var entr =(e.keyCode);
if(document.getElementById("odaCharge").value=="" && entr==08){

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
var groupid=document.getElementById("contact_id_copy5").value;

if(groupid==4){
	v.type="submit";
}else{
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
		 
		  		 

				var frmOrg=document.getElementById("frmOrg").value;
				var toOrg=document.getElementById("toOrg").value;
				var rateAir=document.getElementById("rateAir").value;
				var rateTrain=document.getElementById("rateTrain").value;	
				var rateSurface=document.getElementById("rateSurface").value;		
		        var otherCharge=document.getElementById("otherCharge").value;
				var odaCharge=document.getElementById("odaCharge").value;
			 
				//default
				var rows=document.getElementById("rows").value;
				var pri_id=document.getElementById("pri_id").value;
				var frmOrg=document.getElementById("frmOrg").value;
				
					var frmOrgname=document.getElementById('frmOrg').selectedOptions[0].text;
				var toOrgname=document.getElementById('toOrg').selectedOptions[0].text;
				
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
				cell.style.width="6%";
				cell.align="center";
				
				
				
				
				//============================item text ============================
				var prd = document.createElement("input");
							prd.type="hidden";
							prd.border ="0";
							prd.value=frmOrg;	
							prd.name='frmOrg[]';//
							prd.id='frmOrg'+rid;//
							prd.readOnly = true;
							prd.style="text-align:center";  
							prd.style.width="100%";
							prd.style.border="hidden"; 
							cell.appendChild(prd);
							
						var prd = document.createElement("input");
							prd.type="text";
							prd.border ="0";
							prd.value=frmOrgname;	
							prd.name='frmOrgdsd[]';//
							prd.id='frmOrg'+rid;//
							prd.readOnly = true;
							prd.style="text-align:center";  
							prd.style.width="100%";
							prd.style.border="hidden"; 
							cell.appendChild(prd);			
							
				var priidid = document.createElement("input");
							priidid.type="hidden";
							priidid.border ="0";
							priidid.value=pri_id;	
							priidid.name='main_id[]';//
							priidid.id='main_id'+rid;//
							priidid.readOnly = true;
							priidid.style="text-align:center";  
							priidid.style.width="100%";
							priidid.style.border="hidden"; 
							cell.appendChild(priidid);
							
							
							
					
						// ends here
	
	
	//#################cell 2nd starts here####################//
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="5%";
				cell.align="center"
				var salepr = document.createElement("input");
							salepr.type="hidden";
							salepr.border ="0";
							salepr.value=toOrg;	    
							salepr.name ='toOrg[]';
							salepr.id='toOrg'+rid;
							salepr.readOnly = true;
							salepr.style="text-align:center";
							salepr.style.width="100%";
							salepr.style.border="hidden"; 
							cell.appendChild(salepr);
					

	var salepr = document.createElement("input");
							salepr.type="text";
							salepr.border ="0";
							salepr.value=toOrgname;	    
							salepr.name ='toOrgss[]';
							salepr.id='toOrg'+rid;
							salepr.readOnly = true;
							salepr.style="text-align:center";
							salepr.style.width="100%";
							salepr.style.border="hidden"; 
							cell.appendChild(salepr);
	
	
	
	
	
		//==============================close 2nd cell =========================================
		
		//#################cell 3rd starts here####################//					
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="5%";
				cell.align="center"
		//========================================start qnty===================================	
				var qtty = document.createElement("input");
							qtty.type="text";
							qtty.border ="0";
							qtty.value=rateAir;	    
							qtty.name ='rateAir[]';
							qtty.id='rateAir'+rid;
							qtty.readOnly = true;
							qtty.style="text-align:center";
							qtty.style.width="100%";
							qtty.style.border="hidden"; 
							cell.appendChild(qtty);
								
		//======================================close 3rd cell========================================
		

//===================================start 5th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="4%";
				cell.align="center"	
				
												
				var disAmtt = document.createElement("input");
							disAmtt.type="text";
							disAmtt.border ="0";
							disAmtt.value=rateTrain;	
							disAmtt.name ='rateTrain[]';
							disAmtt.id='rateTrain'+rid;
							disAmtt.readOnly = true;
							disAmtt.style="text-align:center";
							disAmtt.style.width="100%";
							disAmtt.style.border="hidden"; 
							cell.appendChild(disAmtt);
		//===============================close 5th cell=================================
		
				
		//===================================start 6th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"	
				
												
				var vatamt = document.createElement("input");
							vatamt.type="text";
							vatamt.border ="0";
							vatamt.value=rateSurface;	
							vatamt.name ='rateSurface[]';
							vatamt.id='rateSurface'+rid;
							vatamt.readOnly = true;
							vatamt.style="text-align:center";
							vatamt.style.width="100%";
							vatamt.style.border="hidden"; 
							cell.appendChild(vatamt);
		//===============================close 5th cell=================================
					
									
	
	
				
		//===================================start 6th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"	
				
												
				var otherChargeAmt = document.createElement("input");
							otherChargeAmt.type="text";
							otherChargeAmt.border ="0";
							otherChargeAmt.value=otherCharge;	
							otherChargeAmt.name ='otherCharge[]';
							otherChargeAmt.id='otherCharge'+rid;
							otherChargeAmt.readOnly = true;
							otherChargeAmt.style="text-align:center";
							otherChargeAmt.style.width="100%";
							otherChargeAmt.style.border="hidden"; 
							cell.appendChild(otherChargeAmt);
		//===============================close 5th cell=================================





	//===================================start 6th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"	
				
												
				var odaChargeAmt = document.createElement("input");
							odaChargeAmt.type="text";
							odaChargeAmt.border ="0";
							odaChargeAmt.value=odaCharge;	
							odaChargeAmt.name ='odaCharge[]';
							odaChargeAmt.id='odaCharge'+rid;
							odaChargeAmt.readOnly = true;
							odaChargeAmt.style="text-align:center";
							odaChargeAmt.style.width="100%";
							odaChargeAmt.style.border="hidden"; 
							cell.appendChild(odaChargeAmt);
		//===============================close 5th 


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
						delt.style.width="30%";
						delt.style.height="20%";
						delt.name ='dlt';
						delt.id='dlt'+rid;
						delt.style.border="hidden"; 
						delt.onclick= function() { deleteselectrow(delt.id,delt); };
					    cell.appendChild(delt);
	var edt = document.createElement("img");
						edt.src ="<?=base_url();?>/assets/images/edit.png";
						edt.class ="icon";
						edt.style.width="60%";
						edt.style.height="40%";
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
		document.getElementById("frmOrg").value='';
		document.getElementById("toOrg").value='';
		document.getElementById("rateAir").value='';
		document.getElementById("rateTrain").value ='';
		document.getElementById("rateSurface").value='';
		document.getElementById("otherCharge").value='';
		document.getElementById("odaCharge").value='';
		document.getElementById("frmOrg").focus();	
		
		
}






////////////////////////////////// starts edit code ////////////////////////////////


function editselectrow(d,r) //modify dyanamicly created rows or product detail
 {
 
var regex = /(\d+)/g;
nn= d.match(regex)
id=nn;
if(document.getElementById("prd").value!=''){
document.getElementById("qn").focus();
alert("Product already in edit Mode");
return false;
}


// ####### starts ##############//
var pd=document.getElementById("pd"+id).value;
		var unit=document.getElementById("unit"+id).value;
		var qn=document.getElementById("qnty"+id).value;
		var lph=document.getElementById("lph"+id).value;
		var discount=document.getElementById("dis"+id).value;
		var disAmt=document.getElementById("disAmount"+id).value;
		var tot=document.getElementById("tot"+id).value;
		var nettot=document.getElementById("nettot"+id).value;
		
		var pri_id=document.getElementById("main_id"+id).value;
// ####### ends ##############//

// ####### starts ##############//
document.getElementById("pri_id").value=pri_id;
document.getElementById("qn").focus();
document.getElementById("prd").value=pd;
document.getElementById("usunit").value=unit;
document.getElementById("qn").value=qn;
document.getElementById("lpr").innerHTML=lph;
document.getElementById("lph").value=lph;
document.getElementById("discount").value=discount;
document.getElementById("disAmt").value=disAmt;
document.getElementById("tot").value=tot;
document.getElementById("nettot").value=nettot;

// ####### ends ##############//
editDeleteCalculation();

    var i = r.parentNode.parentNode.rowIndex;
	document.getElementById("invoice").deleteRow(i);
}

////////////////////////////////// ends edit code ////////////////////////////////




////////////////////////////////// starts delete code ////////////////////////////////


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

      function deleteselectrow(d,r) //delete dyanamicly created rows or product detail
 {
 
var regex = /(\d+)/g;

nn= d.match(regex)
	id=nn;
	if(document.getElementById("frmOrg").value!=''){
 		document.getElementById("toOrg").focus();
     alert("Product already in edit Mode");
return false;
}




		var pd=document.getElementById("frmOrg"+id).value;
		var unit=document.getElementById("toOrg"+id).value;
		var qn=document.getElementById("rateAir"+id).value;
		var lph=document.getElementById("rateTrain"+id).value;
		
		var disAmt=document.getElementById("rateSurface"+id).value;
		var tot=document.getElementById("otherCharge"+id).value;
		var nettot=document.getElementById("odaCharge"+id).value;

	    var i = r.parentNode.parentNode.rowIndex;
     var cnf = confirm('Are You Sure..??? you want to Delete line no1.'+(id));
if (cnf== true)
 {
 document.getElementById("invoice").deleteRow(i);
  slr();
  
 editDeleteCalculation();
	serviceChargeCal();	
	grossDiscountCal();
	}
	
	}
</script>