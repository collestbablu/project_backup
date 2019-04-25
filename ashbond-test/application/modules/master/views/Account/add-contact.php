<?php
error_reporting (E_ALL ^ E_NOTICE);

$tableName='tbl_contact_m';
$location='manage_contact';
$this->load->view('softwareheader'); 
?>
 <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=42epwf1jarbwose89sqt3dztyfu7961g4cs5xoib4kordvbd"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<h1> Contact</h1>
<form action="insert_contact" method="post"> 
<input type="hidden" name="popup" value="<?php echo $_GET['popup'];?>"
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
<a href="" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>
	   	 <?php }else {  ?>
       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>
       <?php } ?><div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<?php if(@$_GET['id']=='' || @$_GET['id']!=''){
$query1 = $this->db->query("SELECT * FROM $tableName where contact_id='".@$_GET['id']."' or contact_id='".@$_GET['view']."'");
$row = $query1->row();
  ?>
<table class="bordered">
<thead>
<tr><th style="text-align:center;color:#000000" colspan="4">
<?php if(@$_GET['view']!=""){?>
<b>View Details</b>
<?php }
elseif(@$_GET['id']!=""){
 ?>
<b>Edit Details</b>      
<?php }else{ ?>
<b>Add  Details </b>        
<?php } ?></th>
</tr>
</thead>
<tr style="display:none">
<?php if(@$_GET['id']!=""){?>
<td><input type="text" name="contact_id" class="span6 "value="<?php echo $row->contact_id ?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A'");
$row1 = $query->row();

?>

    
<?php }?>
</tr><tr>

<input type="hidden" name="party" value="<?php echo $_GET['popup'];?>" />
<td class="text-r"><star>*</star>Name:</td>         
<td><input type="text" name="first_name" onchange="firstnamefunc(this.value)" id="first_name" required class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->first_name;}?>" size="22" tabindex="1" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/><a id="firstnamediv" style="color:#FF0000"></a></td>


<td class="text-r"><star>*</star> Group Name:</td>        

<td>

<?php
	   	 $hdrQuery=$this->db->query("select * from tbl_contact_m where contact_id='".$_GET['id']."' or contact_id='".$_GET['view']."'");
         $hrdrow=$hdrQuery->row();
	  
	  ?>
	  <input type="hidden" name="grpname" value="<?php echo $hrdrow->contact_id;?>" />
	  
<div id="groupdiv">

<select name="maingroupname" required id="contact_id_copy5" <?php if(@$_GET['view']!=''){ ?> disabled <?php }?>>

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
</select></div>
</td>

</tr>
<tr>
<td class="text-r"><star>*</star>Company Name:</td> 
<td><input type="text" name="company_name" required class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo  $row->company_name;}?>" size="3" tabindex="9" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r">Contact Person:</td>
<td><input type="text" name="contact_person" class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo  $row->contact_person;}?>" size="3" tabindex="9" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
</tr>
<tr>

<td class="text-r"><star>*</star> Email ID:</td>

<td><input type="email" name="email" required class="span6 "value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->email;}?>"   size="22"    tabindex="10" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r" style="display:none">Phone:</td>

<td style="display:none"><input type="number"  name="phone" class="span6 "value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->phone;}?>"  size="22"   tabindex="11" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r"><star>*</star>Mobile:</td>

<td><input type="tel" name="mobile" required="true"  class="span6 "value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->mobile;}?>" maxlength="12"  size="22"    tabindex="12" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

</tr>
<tr>

<td class="text-r">IT Pan:</td>
<td><input type="text" name="it_pan" class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->IT_Pan; } ?>" size="3" tabindex="13" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r" style="display:none">Ward</td>
<td style="display:none"><input type="text" name="ward" class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->ward; } ?>" size="3" tabindex="14" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r">LST No</td>
<td><input type="text" name="lst_no" id="lst_no" class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->lst; } ?>" size="3" tabindex="15" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
</tr>
<tr>

<td class="text-r">CST No:</td>
<td><input type="text" name="cst_no" id="cst_no" class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->cst; } ?>" size="3" tabindex="16" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r">Tin No</td>
<td><input type="number" name="tin_no" tabindex="17" class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->tin; } ?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
</tr>
<tr>

<td class="text-r">Fax</td>
<td><input type="text" name="fax" class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->fax; } ?>" size="3" tabindex="18" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
<td class="text-r"><star>*</star>Code:</td> 
<td><input type="text" name="code_name" required class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo  $row->code_name;}?>" size="3" tabindex="9" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
</tr>

<tr style="display:none">
<td class="text-r">Opening balance</td>
<td><input type="number" name="op_bal" tabindex="17" class="span6" value="<?php if(@$_GET['id']!=''|| @$_GET['view']!=''){ echo $row->opening_balance; } ?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r">&nbsp;</td>
<td>&nbsp;</td>
</tr>


</table>

<table class="bordered" id="getAddressdiv">

<?php
$sel=$this->db->query("select * from tbl_address_m where addressid='".@ $row->addres_id."' or addressid='".@$row->addres_id."' ");
$fetchsel= $sel->row();
 ?>

  <thead>



<tr><th colspan="4">
<?php if(@$_GET['id']==''){?>
<b>Add Address Details</b>       

<?php }elseif(@$_GET['id']!=''){?>

<b>Edit Address Details</b>   
<?php }else{ ?>
<b>View Address Details</b>      
<?php } ?></th>  
</tr>
</thead>
<tr style="display:none" >
<?php if(@$_GET['id']!=""){?>
<td><input type="text" name="adress_id" class="span6 "value="<?php if(@$_GET['id']!=''|| @$_GET['view']!='') {  echo $row->addres_id; }?>" readonly size="22" aria-required='true' /></td>

<?php } else {

@$query = $this->db->query("SELECT * FROM tbl_address_m where status='A' order by entityid desc limit 0,1");
@$row1 = $query->row();

?>

    <td><input type="text" name="adress_idd" value="<?php echo @$row1->entityid+1?>" readonly size="22" class="span6 " aria-required='true' />         </td>
<?php }?>
</tr>
<tr>
<td class="text-r"><star></star> Address1:</td>         

<td><textarea name="address1"  style="height:100px;" class="span6" <?php if(@$_GET['view']!=""){?> readonly <?php } ?> cols="10" rows="10" tabindex="18"><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->address1 ;} ?> 
</textarea></td>
<td style="display:none" class="text-r"><star></star> Address2:</td>         


<td style="display:none"><textarea name="address3" style="height:100px;"  class="span6" <?php if(@$_GET['view']!=""){?> readonly <?php } ?> cols="10" rows="10" tabindex="18"><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->address3 ;} ?> 
</textarea></td></tr>

<tr style="display:none">
<td class="text-r" style="display:none">Country</td>
<td>
<select name="country" id="url" class="rounded" tabindex="20" onChange="getState(this.value)" <?php if(@$_GET['view']!=""){?> disabled <?php } ?> style="display:none">
		<option value="">---select---</option>
				 
                 <?php


  @$industryNameQuery=$this->db->query("select * from tbl_country_m");
  foreach($industryNameQuery->result() as $industryNameRow){


   ?>


      <option value="<?php echo @$industryNameRow->contryid; ?>"<?php if(@$industryNameRow->contryid==@$fetchsel->country){?> selected <?php }?>><?php echo @$industryNameRow->countryName; ?>



                <?php }?>
                 </select>                </td>

		<td class="text-r" style="display:none"><star></star>State:</td>		

<td>

<div id="statediv">

<select name="state"  class="rounded" tabindex="22" onChange="getCity(this.value)"<?php if(@$_GET['view']!=""){?> disabled <?php } ?> style="display:none" >



                 <option value="">---select---</option>

                 <?php
  @$industryNameQuery=$this->db->query("select * from tbl_state_m");
foreach(@$industryNameQuery->result() as $industryNameRow ){
  ?>
                <option value="<?php echo @$industryNameRow->stateid ; ?>" <?php if(@$industryNameRow->stateid==@$fetchsel->state){?> selected <?php }?>><?php echo @$industryNameRow->stateName ; ?></option>
                <?php }?>
                 </select>
         </div>                </td>
</tr>
<tr>


				 <td class="text-r" style="display:none" ><star></star>Street:</td>

<td style="display:none"><input type="text" name="Street" class="span6 "value="<?php echo @$fetchsel->Street;?>"  size="22"   tabindex="26" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td><td class="text-r" style="display:none"><star></star> City:</td>         
<td style="display:none" >
<div id="citydiv" style="display:none">
<select name="City" id="url" class="rounded" tabindex="24" <?php if(@$_GET['view']!=""){?> disabled <?php } ?> style="display:none">
                 <option value="">---select---</option>
                 <?php

  @$industryNameQuery=$this->db->query("select * from tbl_city_m ");
foreach(@$industryNameQuery->result() as $industryNameRow )


 {

  ?>
                <option value="<?php echo @$industryNameRow->cityid; ?>" <?php if(@$industryNameRow->cityid==@$fetchsel->City){?> selected <?php }?>><?php echo @$industryNameRow->city_name; ?>
                <?php }?>
</option>
                 </select>
         </div>                </td>
		 
		 <td class="text-r"></td>
		 <td></td>

</tr>

<tr style="display:none">

		<td class="text-r" style="display:none"><star></star>Post Box:</td>         
		<td><input type="text" name="pobox" class="span6 "value="<?php echo @$fetchsel->pobox;?>" size="22" style="display:none"   tabindex="28" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>



<td class="text-r" style="display:none"><star></star>Pin Code:</td>

<td><input type="text" name="zip" style="display:none" class="span6 "value="<?php echo @$fetchsel->zip;?>"  size="22"   tabindex="29" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
</tr>







<tr style="display:none">

<td class="text-r" style="display:none"><star></star>Description:</td>         

<td colspan="3" style="display:none">&nbsp;<textarea name="textarea" cols="100" rows="6" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>><?php echo  @$fetchsel->description;?></textarea></td>
</tr>
</table>


<?php } ?>




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

<a href="" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>


	   	 <?php }else {  ?>

       <a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>

       

       <?php } ?>


</div><!--paging-right close-->

</div>

<!--paging-row close-->

</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->

</div><!--container close-->

<div class="clear"></div><!--footer--row close-->

</div>

<!--wrapper close-->
<?php $this->load->view('softwarefooter'); ?>
