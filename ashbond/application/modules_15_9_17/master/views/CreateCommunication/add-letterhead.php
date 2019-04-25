<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_communication';
$location='manage_letterhead';
$this->load->view('softwareheader'); 
?>
 <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<h1> Communication Details</h1>

<form id="f1" name="f1" action="insert_item" method="post" enctype="multipart/form-data">

<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 { 

 if(@$_GET['id']==''){?>

 <td> <input name="save" type="button" onclick="savefun(this)" value="Save" class="submit" /> </td>



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
@$branchQuery = $this->db->query("SELECT * FROM $tableName where communication_id='".$_GET['id']."' or communication_id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}

?>
<input type="hidden" name="id" class="span6 "value="<?php echo $row->communication_id?>" readonly size="22" aria-required='true' />

<tr>

<td class="text-r"><star>*</star>Contact Name:</td>
			<td>
		
			<select name="contact_id" style="width:100px;" <?php if(@$_GET['view']!=''){ ?> disabled="disabled"<?php } ?> required id="contact_id_copy" <?php if(@$_GET['id']!=''){ ?> <?php }else{ ?> onChange="contactfun()" <?php } ?> class="rounded" <?php if(@$_GET['id']!=''){ ?> <?php }else{ ?> onClick="contactperson()" <?php } ?>>
					<option value="">---select---</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_contact_m where status='A'  order by first_name");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
						<option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$row->contact_id){?> selected="selected" <?php }?>>
						<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
						<?php } ?>
			</select>	
			<a onClick="openpopup('<?php echo base_url(); ?>master/Contact/add_contact',900,630,'add','add')"><img src="<?php echo base_url();?>/assets/images/addcontact.png" width="25px" height="25px"/></a>		
			</td>	
				
<td class="text-r"><star>*</star>Case Id:</td>

<td id="caseiddiv">

<select id="case_id" name="case_name" onChange="loadDoc()" <?php if(@$_GET['view']!=''){ ?> disabled="disabled"<?php } ?>>
	<?php if(@$_GET['id']!='' or @$_GET['view']!=''){ ?>
		<option value="<?php echo $row->case_id; ?>"><?php echo $row->totalcaseid; ?></option>
	<?php }else{ ?>
	<option value="">---select---</option>
	<?php }
	 ?>
</select>
<a onClick="openpopup('<?php echo base_url(); ?>master/CreateCase/add_case',900,300,'add','case')"><img src="<?php echo base_url();?>/assets/images/add.png" width="25px" height="25px"/></a>	
</td>				
</tr>
		<tr>
			
			<td class="text-r"><star>*</star>Ref.No:</td>
				<td>
				<div id="demo">
				<input type="text" required name="refno" readonly id="refno_id" value="<?php echo $row->refno;?>" style="width: 85%;float: left;border: none;"/>
				</div>				</td>
			<input type="hidden" name="totalcaseid" id="totalcaseid" value="<?php echo $row->totalcaseid;?>"/>
				<td id="commiddiv" style="color:red"></td>
				<td></td>
		</tr>
	<tr>
	
	<td class="text-r"><star>*</star>Date</td>
	
	<td>
	<input type="date" required name="date" <?php if(@$_GET['view']!=''){ ?> readonly <?php } ?> value="<?php echo $row->date;?>"  style="width:120px;;"/></td>
			
			<td class="text-r">
			 Remarks
			:</td>
			<td>
			<input type="text"  name="remark_name" <?php if(@$_GET['view']!=''){ ?> readonly <?php } ?> value="<?php echo $row->remark_name;?>"/></td>
	</tr>		
	<tr>	
	
			<td class="text-r"><star>*</star>Subject</td>
	
	<td>
	<input type="text" required name="subject" <?php if(@$_GET['view']!=''){ ?> readonly <?php } ?> value="<?php echo $row->subject;?>" style="width:400px;"/>	</td>
	<td class="text-r"><star>*</star>Contact Person:</td>
	<td id="periddiv"><select name="person_name" required <?php if(@$_GET['view']!=''){ ?> disabled="disabled"<?php } ?>>
	<option value="">--select--</option>
	<?php
					 
					 $caseQuery=$this->db->query("select * from tbl_contact_person where status='A'");
					 foreach($caseQuery->result() as $caseRow)
					{
					
	
					  ?>
						<option value="<?php echo $caseRow->person_id; ?>" <?php if($caseRow->person_id== $row->contact_person_id){?> selected="selected" <?php }?>>
						<?php echo $caseRow->p_name; ?></option>
						<?php } ?>
	</select></td>
		</tr>
			
			
<tr>

<td class="text-r">Content</td>  
		
	      <!--  <td style="height:500px;width:auto;"><textarea name="termandcondition" style="height:500px;width:auto;"  id="tem"></td>-->
		<td colspan="3"><textarea name="des" style="height:500px;width:auto;"  id="tem"><?php echo $row->termandcondition;?></textarea></td>	
		
		
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

 <td> <input name="save" type="button" onclick="savefun(this)" value="Save" class="submit" /> </td>

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
            CKEDITOR.replace( 'des' );
        </script>
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