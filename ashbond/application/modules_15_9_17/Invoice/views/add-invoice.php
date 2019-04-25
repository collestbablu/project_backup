<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_new_invoice';
$location='manageInvoice';
$this->load->view('softwareheader'); 
?>
<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=42epwf1jarbwose89sqt3dztyfu7961g4cs5xoib4kordvbd"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<?php
if($_GET['id']!=''){
?>
<h1>UPDATE INVOICE</h1>
<?php }else{ ?>
<h1>NEW INVOICE</h1>

<?php } ?>

<form id="f1" name="f1" action="insertInvoice" method="post" enctype="multipart/form-data">

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

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">

 <table class="bordered">

<thead>
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM $tableName where invoice_id='".$_GET['id']."' or invoice_id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}

?>
<input type="hidden" name="id" class="span6 "value="<?php echo $row->invoice_id;?>" readonly size="22" aria-required='true' />

<tr>
			
<td class="text-r"><star>*</star>Case Id:</td>

<td>
<select id="case_id" name="case_name" required>
	<option value="">---select---</option>
	<?php
					 
					 $caseQuery=$this->db->query("select * from tbl_new_case where status='A'  order by new_case_id desc");
					 foreach($caseQuery->result() as $caseRow)
					{
					 $Queryww=$this->db->query("select * from tbl_contact_m where status='A' and contact_id='$caseRow->vendor_id'");
					  $fetch=$Queryww->row();
					  
					   $query=$this->db->query("SELECT * FROM tbl_contact_m where contact_id='$caseRow->customer_id'" );
			
						$fetchq=$query->row(); 
	
					  ?>
						<option value="<?php echo $caseRow->case_id; ?>" <?php if($caseRow->case_id==$row->case_id){?> selected="selected" <?php }?>>
						<?php echo $caseRow->case_id."(".$fetch->first_name.")"." (".$fetchq->first_name.")"; ?></option>
						<?php } ?>
</select>
</td>				

<td class="text-r"><star>*</star>Invoice No.:</td>
<td><input type="number" name="invoice_no" value="<?php echo $row->invoice_no;?>" required></td>
</tr>
		
	<tr>
	
	<td class="text-r"><star>*</star>Date</td>
	
	<td>
	<input type="date" required name="n_date" <?php if(@$_GET['view']!=''){ ?> readonly <?php } ?> value="<?php echo $row->n_date;?>"  /></td>
			
			<td class="text-r"><star>*</star>Basic Amount:</td>
			<td><input type="number" step="any" id="basic_amt"  name="basic_amt" <?php if(@$_GET['view']!=''){ ?> readonly <?php } ?> value="<?php echo $row->basic_amt;?>" required/></td>
	</tr>		
	<tr>	
	
			<td class="text-r"><star>*</star>Tax:</td>
	
	<td>
	<input type="number" step="any" onkeyup="totalsumfun(this.value)" required name="tax" id="tax_id" <?php if(@$_GET['view']!=''){ ?> readonly <?php } ?> value="<?php echo $row->tax;?>"/>	</td>
	<td class="text-r"><star>*</star>Total Amount:</td>
	<td>
	<input type="number" step="any" required id="total_amt" readonly name="total_amt"  value="<?php echo $row->total_amt;?>"/>	</td>
		</tr>
			
	<tr>
				<td class="text-r"><star>*</star>Upload:</td>
				
				<td><input type="file" name="image_name" value="" required></td>			
				<td>&nbsp;</td>
				
				<td>&nbsp;</td>			
			</tr>		

</table>
<script>
function totalsumfun(v){

var bamt=document.getElementById("basic_amt").value; 
if(bamt!=''){
//alert(bamt);
var btamt=Number(bamt);
var tamt=Number(v);
var sdispr=(btamt+tamt);
var bamt=document.getElementById("total_amt").value=sdispr; 
}else{
alert("please Enter Basic Amount");
document.getElementById("tax_id").value=""; 
document.getElementById("basic_amt").focus();; 
}
}

</script>
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

 <td> <input name="save" type="submit"  value="Save" class="submit" /> </td>

 <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

	      <?php }}?>


<?php if(@$_GET['popup'] == 'True') {?>

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

</div><!--paging-right close-->

</div><!--paging-row close-->

</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->
<script>
function contactfun(){
var contactid=document.getElementById("contact_id_copy").value;
var pro=contactid;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getproductcont_fun?con="+pro, false);
  xhttp.send();
  document.getElementById("caseiddiv").innerHTML = xhttp.responseText;
 } 
 
function contactperson(){
var contactid=document.getElementById("contact_id_copy").value;
var pro=contactid;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getcontactper_fun?con="+pro, false);
  xhttp.send();
  document.getElementById("periddiv").innerHTML = xhttp.responseText;
  
} 

function communication_fun(){
var contactid=document.getElementById("caseiddd").value;
var v=document.getElementById("commid").value;
var pro=contactid+"^"+v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getcommunicationfun?comm="+pro, false);
  xhttp.send();
  document.getElementById("commiddiv").innerHTML = xhttp.responseText;
  
} 

function loadDoc() {
var sel = document.getElementById("case_id");
var text= sel.options[sel.selectedIndex].text;

var contactid=document.getElementById("contact_id_copy").value;
var caseid=document.getElementById("case_id").value;
var pro=contactid+"^"+caseid;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getproduct_fun?con="+pro, false);
  xhttp.send();
  document.getElementById("demo").innerHTML = xhttp.responseText;
  //abcde();
  document.getElementById("totalcaseid").value=text;
}

function savefun(v){
var rc=document.getElementById("caseiddd").value;
var commid=document.getElementById("commid").value;

if(rc<=commid)
{
v.type="submit";
}
else
{
	alert('Communication Id Aready Exits.');	
}
}
</script>
<?php $this->load->view('softwarefooter'); ?>