<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_product_stock';
$location='manage_item';
$this->load->view('softwareheader'); 
?>

<h1> Change Password</h1>

<form action="qureychange_pass" method="post" enctype="multipart/form-data">
<input type="hidden" name="userId" value="<?php echo $this->session->userdata('user_id');?>" />
<div class="actions-right">

 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>
<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">

 <table class="bordered">

<thead>
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM $tableName where Product_id='".$_GET['id']."' or Product_id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}


 if(@$_GET['id']!=''){
 


  ?>         
<td><input type="hidden" name="Product_id" class="span6 "value="<?php echo $row->Product_id?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by Product_id desc limit 0,1");
$rowwww = $query->row();
  
?>
<input name="Product_id" type="hidden" class="span6 " value="" readonly size="22" aria-required='true' />
              

                <?php }?>


<tr>
			
            <td class="text-r"><star>*</star>
            Current Password:</td>
			<p style="color:#FF0000"><?php echo $this->session->flashdata('message_name'); ?></p>
			<td><input type="password" name="oldpass" class="span6" required /></td>
			
			<td class="text-r"><star>*</star>New Password:</td>
			<td><input type="password" name="newpass" class="span6" required /></td>	
		</tr>
		<tr>
			
		
			
		
			
			<td class="text-r"><star>*</star>
			Repeat Password
			:</td>
			<td>
			<input type="password" name="confirmpass" class="span6" required /></td>
	
			<td class="text-r">&nbsp;</td>
	
	<td>&nbsp;		</td>
		</tr>
		
	
	
	


</table>

<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">

<div class="paging-right">

<div class="actions-right">

 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>
</form>

</div><!--paging-right close-->

</div><!--paging-row close-->

</div><!--table-row close-->

</div><!--container-right-text close-->

</div><!--container-right close-->

<?php $this->load->view('softwarefooter'); ?>