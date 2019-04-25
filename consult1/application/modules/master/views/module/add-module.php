<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_module_details';
$location='manage_module';
$this->load->view('softwareheader'); 
?>

<h1> Moulding Details</h1>

<form action="insert_module" method="post" enctype="multipart/form-data">

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
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM $tableName where s_no='".$_GET['id']."' or s_no='".$_GET['view']."'");
$row = $branchQuery->row();
 
}


 if(@$_GET['id']!=''){
 


?>
<td><input type="hidden" name="s_no" value="<?php echo $row->s_no?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by s_no desc limit 0,1");
$rowwww = $query->row();
  
?>
<input name="s_no" type="hidden" value="" readonly size="22" aria-required='true' />
<?php }?>

<tr>
<td class="text-r">Module name</td>
<td><select name="m_name" id="m_name"  required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> >
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_master_data where param_id=18");
						foreach ($sqlgroup->result() as $fetchgroup){
						
					?>
<option value="<?php echo $fetchgroup->serial_number; ?>"<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchgroup->serial_number==$row->module_id){ ?> selected <?php } }?>><?php echo $fetchgroup->keyvalue ; ?></option>

    <?php } ?></select></td>
<td class="text-r">Date</td>
<td><select name="date">
<option value="">--Select--</option>
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>




</select>
</td>
</tr>
<tr>
<td class="text-r">Shot</td>
<td><input type="number" id="shot" onchange="total();" min="0" step="any" name="shot" value="<?php  if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $row->shot;}?>" <?php if(@$_GET['view']!=""){?> readonly <?php } ?>/></td>
<td class="text-r">Total Shot</td>
<?php
$dataQuery=$this->db->query("select SUM(shot) as Sumshot from tbl_module_details ");
$getData=$dataQuery->row();
?>
<td><input type="text" name="totShot" id="totShot" value="<?php  echo $getData->Sumshot;?>"  readonly /></td>
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

<a href="javascript:window.close();" tabindex="10" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" tabindex="10" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

</div><!--paging-right close-->

</div><!--paging-row close-->

</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->

<?php $this->load->view('softwarefooter'); ?>

<script>
function total()
{

var shot= document.getElementById("shot").value;
var tshot= document.getElementById("totShot").value;
var TotSt=Number(shot)+Number(tshot);
document.getElementById("totShot").value=TotSt;

}

</script>