<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_machine';
$location='manage_machine';
$this->load->view('softwareheader'); 
?>

<h1> Machine Details</h1>

<form action="insert_machine" method="post" enctype="multipart/form-data">

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
@$branchQuery = $this->db->query("SELECT * FROM $tableName where Machine_id='".$_GET['id']."' or Machine_id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}


 if(@$_GET['id']!=''){
 


  ?>         
<td><input type="hidden" name="Machine_id" class="span6 "value="<?php echo $row->Machine_id?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by Machine_id desc limit 0,1");
$rowwww = $query->row();
  
?>
<input name="Machine_id" type="hidden" class="span6 " value="" readonly size="22" aria-required='true' />
              

                <?php }?>


<tr>
			
            <td class="text-r"><star>*</star>
            Machine Code:</td>
			<p style="color:#FF0000"><?php echo $this->session->flashdata('message_name'); ?></p>
			<td><input type="text" name="machinecode" required value="<?=$row->machinecode?>"  <?php if(@$_GET['view']!=""){
?> readonly <?php } ?> /></td>
			
			<td class="text-r"><star>*</star>Machine Name:</td>
			<td><input type="text" name="machinename" id="itemname"   required value="<?=$row->machinename?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>	
		</tr>
		
		<tr>
			
            <td class="text-r"><star>*</star>
            Hours:</td>
			
			<td><input type="number" name="hours" required value="<?=$row->hours?>"  <?php if(@$_GET['view']!=""){
?> readonly <?php } ?> /></td>
			
			<td class="text-r"><star>*</star>Shift:</td>
			<td><select id="shiftid" name="shift" <?php if(@$_GET['view']!=""){ ?> disabled="disabled" <?php } ?>>
					<?php if(@$_GET['view']!="" || $_GET['id']!=""){ ?>
								<option value="1"><?php if($row->shift=='1'){ echo 1; }else{ }?></option>	
					<?php }else{ ?>
				<option value="">--select--</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<?php } ?>
			</select>
			</td>	
		</tr>
		
		
		<tr  <?php if(@$_GET['view']!="" || $_GET['id']!=""){ }else {?> id="trsupervisor" <?php } ?>>
			
            <td class="text-r"><star>*</star>
            Supervisor:</td>
			
			<td><input type="text" name="supervisor" required value="<?=$row->supervisor?>"  <?php if(@$_GET['view']!=""){
?> readonly <?php } ?> /></td>
			
			<td class="text-r"><star>*</star>Operator One</td>
			<td><input type="text" name="operator_one" required value="<?=$row->operator_one?>"  <?php if(@$_GET['view']!=""){
?> readonly <?php } ?> /></td>	 
		</tr>
		
		<tr  <?php if(@$_GET['view']!="" || $_GET['id']!=""){ }else {?> class="trtwol" <?php } ?>>
		
		<td class="text-r" <?php if(@$_GET['view']!="" || $_GET['id']!=""){ }else {?> id="operator_two1" <?php } ?>><star>*</star>Operator Two</td>
			<td <?php if(@$_GET['view']!="" || $_GET['id']!=""){ }else {?> id="operator_two2" <?php }  ?>><input type="text" name="operator_two" value="<?=$row->operator_two?>"  <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?> /></td>	
		<?php if(@$_GET['view']!="" || $_GET['id']!=""){ ?>
					<td class="text-r"><star>*</star>Shift:</td>
			<td><select id="shiftid" name="shift_two" <?php if(@$_GET['view']!=""){ ?> disabled="disabled" <?php } ?>>
					<?php if(@$_GET['view']!="" || $_GET['id']!=""){ ?>
								<option value="2"><?php if($row->shift!=''){ echo 2; }else{ } ?></option>	
					<?php }else{ ?>
				
				<?php } ?>
			</select>
			</td>
			<?php }else{ } ?>	
		</tr>
		
			<tr  <?php if(@$_GET['view']!="" || $_GET['id']!=""){ }else {?> class="trtwo" <?php } ?>>
			
            <td class="text-r"><star>*</star>
            Supervisor:</td>
			
			<td><input type="text" name="supervisor_shift_two" value="<?=$row->supervisor_shift_two?>"  <?php if(@$_GET['view']!=""){
?> readonly <?php } ?> /></td>
			
			<td class="text-r"><star>*</star>Operator One</td>
			<td><input type="text" name="operator_one_shift_two" value="<?=$row->operator_one_shift_two?>"  <?php if(@$_GET['view']!=""){
?> readonly <?php } ?> /></td>	 
	
		</tr>

<tr>
			<td class="text-r"  <?php if(@$_GET['view']!="" || $_GET['id']!=""){ }else {?> id="operator_two3" <?php } ?>><star>*</star>Operator Two</td>
			<td  <?php if(@$_GET['view']!="" || $_GET['id']!=""){ }else {?> id="operator_two4" <?php } ?>><input type="text" name="operatortwo_shift_two"  value="<?=$row->operatortwo_shift_two?>"  <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?> /></td>	 
			
			
			<td class="text-r">Machine Description</td>
			<td><textarea name="machinedes" style="width:200px;" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>><?=$row->machinedes?></textarea></td>
			
			
			
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

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

</div><!--paging-right close-->

</div><!--paging-row close-->

</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    
	$("#trsupervisor").hide();
	$("#operator_two1").hide();
	$("#operator_two2").hide();
	$("#operator_two3").hide();
	$("#operator_two4").hide();
	$(".trtwo").hide();
	
	$("#shiftid").change(function(){
   
        $shiftval=$("#shiftid").val();
   			//alert($shiftval);
			if($shiftval==''){
			$("#trsupervisor").hide();
			$("#operator_two1").hide();
			$("#operator_two2").hide();
			$("#operator_two3").hide();
			$("#operator_two4").hide();
			}
			if($shiftval=='1'){
			$("#trsupervisor").show();
			$("#operator_two1").show();
			$("#operator_two2").show();
			$("#operator_two3").hide();
			$("#operator_two4").hide();
			$(".trtwo").hide();
			  //$('.operator_val').val("");
			  //$('.operator_two').val("");
			}
			
			if($shiftval=='2'){
			$("#trsupervisor").hide();
			$("#operator_two1").hide();
			$("#operator_two2").hide();
			$("#operator_two3").show();
			$("#operator_two4").show();
			$(".trtwo").show();
			  //$('.operator_val').val("");
			  //$('.operator_two').val("");
			}
	    });
   
});
</script>

<?php $this->load->view('softwarefooter'); ?>