<?php
$tableName='tbl_contact_m';
$location='manage_contact';
$this->load->view('softwareheader'); 
?>

<h1>CONTACT</h1>
<style>
@font-face{font-family: Lobster;src: url('Lobster.otf');}
body{margin:0px auto;}
.space{margin-bottom: 4px;}
.txt{width:250px;border:1px solid #00BB64; height:30px;border-radius:3px;font-family: Lobster;font-size:20px;color:#00BB64;}
#advice{
     width:83%!important;
    height: auto;
    margin:auto;
	}
</style>
<script src='<?php echo base_url();?>assets/js/jquery-1.9.1.min.js'></script>
<form method="post" action="insert_test">


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

<th colspan="4">ADD CONTACT DETAILS</th>        

</tr>



</thead>

<tr>
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_contact_m where status='A' and contact_id='".$_GET['id']."' or contact_id='".$_GET['view']."'");
$branchFetch = $branchQuery->row();
 
}

 if(@$_GET['id']!='' ){
 
  ?>         

<td style="display:none"><input type="text" name="contact_id" class="span6 "value="<?php echo $branchFetch->contact_id;?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by contact_id desc limit 0,1");
$row = $query->row();

?>

    <td style="display:none"><input type="text" name="account_idd" value="<?php if (count($row)!=''){ echo $row->contact_id+1; } else{ echo 1; }?>" readonly size="22" class="span6 " aria-required='true' /></td>

<?php }?>

<td class="text-r"><star>*</star>Company Name:</td>     
<td><input type="text" required name="primary_contact" value="<?php echo $branchFetch->first_name;?>"  <?php if($_GET['view']!=''){ ?> readonly <?php } ?>></td>

<input type="hidden" name="popclose" value="<?php echo $_GET['add'];?>">

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
<td class="text-r"><star>*</star>Primary Contact:</td> 
<td><input type="text" name="company_name" required class="span6" value="<?php  echo  $branchFetch->company_name; ?>" size="3" tabindex="9" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r"><star></star> Email ID:</td>

<td><input type="email" name="email" class="span6 "value="<?php echo $branchFetch->email; ?>"   size="22"    tabindex="10" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

</tr>
<tr>

<td class="text-r" style="display:none">Phone:</td>

<td style="display:none"><input type="number"  name="phone" class="span6 "value="<?php echo $branchFetch->phone; ?>"  size="22"   tabindex="11" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r"><star></star>Mobile:</td>

<td><input type="number" name="mobile" class="span6 "value="<?php echo $branchFetch->mobile; ?>" maxlength="12"  size="22"    tabindex="12" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r">IT Pan:</td>
<td><input type="text" name="it_pan" class="span6" value="<?php echo $branchFetch->IT_Pan;  ?>" size="3" tabindex="13" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
</tr>
<tr>
<td class="text-r">GSTIN No:</td>
<td><input type="text" name="cst_no" id="cst_no" class="span6" value="<?php echo $branchFetch->cst; ?>" size="3" tabindex="16" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
<td class="text-r">Fax</td>
<td><input type="text" name="fax" class="span6" value="<?php echo $branchFetch->fax; ?>" size="3" tabindex="18" min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>
</tr>
<tr>
<td class="text-r"><star>*</star>Code:</td> 
<td><input type="text" name="code_name" required class="span6" value="<?php echo $branchFetch->code_name; ?>" size="3"  min="1" max="100" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>

<td class="text-r"><star>*</star>State:</td>
<td><select name="state_id">
<option value="">--Select--</option>
<?php
$stateQquery=$this->db->query("select *from tbl_state_m where status='A'");
foreach($stateQquery->result() as $getState){
?>

<option value="<?=$getState->stateid;?>" <?php if($getState->stateid==$branchFetch->state_id){?> selected="selected"<?php }?>><?=$getState->stateName;?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td class="text-r"><star>*</star>Address 1 :</td> 
<td><textarea name="address" ><?php echo $branchFetch->address1; ?></textarea></td>

<td class="text-r">Address 2 :</td>
<td><textarea name="address3" ><?php echo $branchFetch->address3; ?></textarea></td>
</tr>
<tbody>

	<th style="width: 20%;">Name</th>
	<th style="width: 20%;">Email Address</th>
	<th style="width: 20%;">Mobile</th>
	<th style="width: 39%;">Designation</th>
	<th></th>
<table>
 <div class="button_pro" style="width:1000px;">
 <?php
$preQuery=$this->db->query("SELECT * FROM tbl_contact_person where contact_id='".$_GET['id']."' or contact_id='".$_GET['view']."'");
foreach($preQuery->result() as $preFetch){  ?>

	<div class='space' id='input_1' style="width:94%;">
		<input id="input_1" style="width:20%;" type="text" name="val[]" class='left txt' <?php if($_GET['view']!=''){ ?> readonly <?php } ?> value="<?php echo $preFetch->p_name; ?>"/>&nbsp;<input id="input_1" style="width:20%;"  <?php if($_GET['view']!=''){ ?> readonly <?php } ?> style="width:20%;" type="email" name="valemail[]" class='left txt' value="<?php echo $preFetch->p_email; ?>"/>&nbsp;<input id="input_1" style="width:20%;"  type="text"  <?php if($_GET['view']!=''){ ?> readonly <?php } ?> name="valmobile[]" class='left txt' value="<?php echo $preFetch->p_phone; ?>"/>&nbsp;<input id="input_1" style="width:20%;" type="text" name="desi[]" value="<?php echo $preFetch->designation; ?>" class='left txt'/>&nbsp;<img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" />
	</div>
<?php } ?>
 </div>	
	</table>

</tbody>
</table>
<script>
$('document').ready(function(){
    var id=3,txt_box;
	$('.button_pro').on('click','.add',function(){
		  $(this).remove();
		  txt_box='<div class="space" style="width:94%;" id="input_'+id+'" ><input type="text" style="width:20%;" name="val[]" class="left txt"/>&nbsp<input type="email" name="valemail[]" style="width:20%;" class="left txt"/>&nbsp<input type="text" name="valmobile[]" style="width:20%;" class="left txt"/>&nbsp<input type="text" name="desi[]" style="width:20%;" class="left txt"/><img src="<?php echo base_url();?>assets/image_icon/remove.png" style="width:20px;float: none;" class="remove"/><img class="add right" style="width:20px;float: none;" src="<?php echo base_url();?>assets/image_icon/add.png" /></div>';
		  $(".button_pro").append(txt_box);
		  id++;
	});

	$('.button_pro').on('click','.remove',function(){
	        var parent=$(this).parent().prev().attr("id");
			var parent_im=$(this).parent().attr("id");
			$("#"+parent_im).slideUp('medium',function(){
				$("#"+parent_im).remove();
				if($('.add').length<1){
					$("#"+parent).append('<img src="<?php echo base_url();?>assets/image_icon/add.png" style="width:20px;float: none;" class="add right"/> ');
				}
			});
			});


});
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
<?php $this->load->view('softwarefooter'); ?>