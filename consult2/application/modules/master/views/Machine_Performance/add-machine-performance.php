<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_machine_prformance';
$location='manage_machine_performance';
$this->load->view('softwareheader'); 
?>

<h1> Add Breakdown Details</h1>

<form action="insert_machine_performance" method="post" enctype="multipart/form-data">

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
@$branchQuery = $this->db->query("SELECT * FROM $tableName where m_id='".$_GET['id']."' or m_id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}


 if(@$_GET['id']!=''){
 


  ?>         
<input type="hidden" name="m_id" class="span6 "value="<?php echo $row->m_id?>" readonly size="22" aria-required='true' />

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by m_id desc limit 0,1");
$rowwww = $query->row();
  
?>
<input name="m_id" type="hidden" class="span6 " value="" readonly size="22" aria-required='true' />
              

                <?php }?>


<tr>
			
            <td class="text-r"><star>*</star>
            Machine Name:</td>
			
			<td><select name="machine_id" id="itemname"  <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> required>
					<option value="" selected disabled>----Select----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_machine where status='A'");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->Machine_id;?>" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchunit->Machine_id==$row->machine_id){ ?> selected <?php } }?>><?php echo $fetchunit->machinename; ?></option>
					<?php } ?>
			</select></td>
			
			<td class="text-r"><star>*</star>Date:</td>
			<td><input type="date" name="machine_date" id="itemdate"   required value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->machine_date;}?>" <?php if(@$_GET['view']!=""){
?> readonly <?php } ?>/></td>	
		</tr>
		
		<tr>
			
            <td class="text-r"><star>*</star>Machine BreakDown Name</td>
			
			<td><select name="m_b_d_name" <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> required>
					<option value="" selected disabled>----Select----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=17");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchunit->serial_number==$row->m_b_d_name){ ?> selected <?php } }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select></td>
			
			<td class="text-r"><star>*</star>Minutes</td>
			<td><input type="number" step="any" required name="hours" value="<?php echo $row->hours;?>" /></td>	
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


<?php $this->load->view('softwarefooter'); ?>