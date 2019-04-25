<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_letter_head';
$location='manage_letterhead';
$this->load->view('softwareheader'); 
?>
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<h1>Letter Head</h1>

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
@$branchQuery = $this->db->query("SELECT * FROM $tableName where id='".$_GET['id']."' or id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}

?>
<input type="hidden" name="id" class="span6 "value="<?php echo $row->id?>" readonly size="22" aria-required='true' />

<tr>

<td class="text-r"><star>*</star>Contact Name:</td>
			<td>
		 <?php if(@$_GET['id']!=''){ ?>
		 			<select name="contact_id" style="width:100px;" required id="contact_id_copy">
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' and contact_id='$row->contact_id'  order by first_name");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
						<option value="<?php echo $row->contact_id ?>">
						<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
						<?php } ?>
			</select>		
		 <?php }else{ ?>
		 
			<select name="contact_id" style="width:100px;" <?php if(@$_GET['view']!=''){ ?> disabled="disabled"<?php } ?> required id="contact_id_copy" onChange="contactfun()" class="rounded" tabindex="1" onClick="contactperson()">
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
			<?php } ?>
			</td>	
				
<td class="text-r"><star>*</star>Case Id:</td>

<td id="caseiddiv">

<select id="case_id" name="case_name" onChange="loadDoc()" <?php if(@$_GET['view']!=''){ ?> disabled="disabled"<?php } ?>>
	<?php if(@$_GET['id']!='' or @$_GET['view']!=''){ ?>
		<option value="<?php echo $row->case_id; ?>"><?php echo $row->totalcaseid; ?></option>
	<?php }else{ ?>
	<option value="">---select---</option>
	<?php }
	/*				 
					 $caseQuery=$this->db->query("select * from tbl_new_case where status='A'  order by new_case_id");
					 foreach($caseQuery->result() as $caseRow)
					{
					 $Queryww=$this->db->query("select * from tbl_contact_m where status='A' and contact_id='$caseRow->vendor_id'");
					  $fetch=$Queryww->row();
					  
					   $query=$this->db->query("SELECT * FROM tbl_contact_m where contact_id='$caseRow->customer_id'" );
			
						$fetchq=$query->row(); 
	
					  ?>
						<option value="<?php echo $caseRow->case_id; ?>" <?php if($caseRow->new_case_id==$row->contact_id){?> selected="selected" <?php }?>>
						<?php echo $caseRow->case_id."(".$fetch->first_name.")"." (".$fetchq->first_name.")"; ?></option>
						<?php } */ ?>
</select></td>				
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
	
	<?php if(@$_GET['id']!=''){ ?>
			<td><select name="person_name" required>
	
	<?php
					 
					 $caseQuery=$this->db->query("select * from tbl_contact_person where status='A' and person_id='$row->contact_person_id'");
					 foreach($caseQuery->result() as $caseRow)
					{
					
	
					  ?>
						<option value="<?php echo $row->contact_person_id ?>">
						<?php echo $caseRow->p_name; ?></option>
						<?php } ?>
	</select></td>
	<?php }else{ ?>
	
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
	<?php } ?>
		</tr>
			
			
<tr>

<td class="text-r">Content</td>  
		<?php if($_GET['id']!='' or $_GET['view']!='')
			{?> <td colspan="3"><textarea name="termandcondition" style="height:500px;width:auto;"  id="tem"><?php echo $row->termandcondition;?></textarea></td><?php } else {?>       
		<td colspan="3"><textarea name="termandcondition" style="height:500px;width:auto;"  id="tem"><?php echo $row->termandcondition;?></textarea></td>
		<?php } ?>
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
            CKEDITOR.replace( 'termandcondition' );
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