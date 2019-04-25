<?php
$tableName='tbl_account_mst';
$location='manage_case';
$this->load->view('softwareheader'); 
?>

<h1>New Case</h1>

<form action="insert_case" method="post" enctype="multipart/form-data">
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

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">


<table class="bordered">

<thead>



<tr>

<th colspan="10">CASE DETAILS</th>        

</tr>



</thead>

<tr>




<?php
if(@$_GET['id']!='' or @$_GET['mid']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_account_mst where status='A' and account_id='".$_GET['id']."' or account_id='".$_GET['mid']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!='' ){
 


  ?>         


<td style="display:none"><input type="text" name="account_id" class="span6 "value="<?php echo $branchFetch->account_id;?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by account_id desc limit 0,1");
$row = $query->row();

?>

    <td style="display:none"><input type="text" name="account_idd" value="<?php if (count($row)!=''){ echo $row->account_id+1; } else{ echo 1; }?>" readonly size="22" class="span6 " aria-required='true' /></td>

                <?php }?>
				
     
<td class="text-r"><star>*</star>
			Vendor Company
			:</td>
			<td>
		
			<select name="vendor_id" style="width:100px;" required id="contact_id_copy" onChange="vendorfun()" class="rounded" >
					<option value="">---select---</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='3' order by first_name");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
						<option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$row->contact_id){?> selected="selected" <?php }?>>
						<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
						<?php } ?>
			</select>
			
		
			</td>	
<td class="text-r"><star>*</star>
			Customer Company
			:</td>
			<td>
		
			<select name="customer_id" style="width:100px;" required id="" onChange="loadDoc()" class="rounded" >
					<option value="">---select---</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='4'  order by first_name");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
						<option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$row->contact_id){?> selected="selected" <?php }?>>
						<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
						<?php } ?>
			</select>
			
		
			</td>
	
	<td class="text-r"><star>*</star>
			Category Name
			:</td>
			<td>
		
			<select name="category_name[]" style="width:100px;" class="rounded" multiple="multiple" required>
					<option value="">---select---</option>
						<option value="Supply">Supply</option>
						<option value="Reconditioning">Reconditioning/Repair</option>
						<option value="Ovehauling">Ovehauling</option>
						<option value="Rental">Rental</option>
                        <option value="Commision">Commision</option>
					
			</select>
			
		
			</td>
	<td class="text-r"><star>*</star>Currency:</td>
					<td>
							<select name="currency_name" required>
									<option value="">---select---</option>
									<option value="Rupee">Rupee</option>
									<option value="Euro">Euro</option>
							</select>
					</td>	
			
			<td class="text-r"><star>*</star>
  Case Id:</td>     
 <td><div id="codediv"><input type="text" name="" required value="" /></div></td>  
 <input type="hidden" name="popcaseid" value="<?php echo $_GET['add'] ?>" />	
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





 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



 <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>



	      <?php }}?>

<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

</div><!--paging-right close-->
</div><!--paging-row close-->
</div><!--table-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
<script>
function vendorfun() {
var contactid=document.getElementById("contact_id_copy").value;
var pro=contactid;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getproduct_fun?con="+pro, false);
  xhttp.send();
  document.getElementById("codediv").innerHTML = xhttp.responseText;
 
}
function abcde(){
var caseiddd=document.getElementById("caseiddd").value;
document.getElementById("case_id").value=caseiddd;
}
</script>
<?php $this->load->view('softwarefooter'); ?>