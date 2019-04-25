<?php
$tableName='tbl_prodcatg_mst';
$location='manage_itemctg';
$this->load->view('softwareheader'); 
?>

<h1>PRODUCT CATEGORY DETAILS</h1>

<form action="insert_itemctg" method="post">



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

<th colspan="4">PRODUCT CATEGORY DETAILS</th>        

</tr>



</thead>

<tr>




<?php
if(@$_GET['id']!='' or @$_GET['mid']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_prodcatg_mst where status='A' and prodcatg_id='".$_GET['id']."' or prodcatg_id='".$_GET['mid']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!='' ){
 


  ?>         


<td style="display:none"><input type="text" name="prodcatg_id" class="span6 "value="<?php echo $branchFetch->prodcatg_id;?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by prodcatg_id desc limit 0,1");
$row = $query->row();

?>

    <td style="display:none"><input type="text" name="prodcatg_idd" value="<?php if (count($row)!=''){ echo $row->prodcatg_id+1; } else{ echo 1; }?>" readonly size="22" class="span6 " aria-required='true' /></td>

                <?php }?>

<td class="text-r"><star>*</star>
  Category Name:</td>     
        
<td>
<?php if($_GET['mid1']==1) { ?>
<input type="hidden" name="midd1" value="<?php  echo $mid=2;?>">
<?php }else { ?>
<input type="hidden" name="mid" value="<?php if(@$_GET['mid']==''){ echo $mid=1;}else{echo $midd=@$_GET['mid'];}?>">
<?php } ?>


<input name="prodcatg_name" onChange="prodcatfun(this.value)" type="text" class="span6" id="prodcatg_name"  size="22"  aria-required='true' value="<?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->prodcatg_name; }?>"/><a id="categorydiv" style="color:#0000FF"></a></td>



 <?php if(@$_GET['mid']!='' or (@$branchFetch->main_prodcatg_id!='') ){
 $ugroup=$this->db->query("SELECT * FROM tbl_prodcatg_mst where prodcatg_id='".@$_GET['mid']."'" );
		$ungroup=$ugroup->row();
	//$ugroup=mysql_query("SELECT * FROM tbl_prodcatg_mst where prodcatg_id='".$ungroup['prodcatg_name']."'" );
 ?>
 
 <td class="text-r"><?php $az=0; if(@$ungroup->prodcatg_name!='' or (@$branchFetch->main_prodcatg_id!='1') ){ $az=1; echo "Under Group:";}?></td>         

<td><input name="undergroup" id="undergroup" type="<?php if($az==1){ echo "text";}else{echo"hidden";} ?>" class="span6" value="<?php if(@$ungroup->prodcatg_name!='') { echo $ungroup->prodcatg_name;}else{ 

@$ugrou="select * from $tableName where status='A' and prodcatg_id='".$branchFetch->main_prodcatg_id."'"; 
   
$ung = $this->db->query($ugrou);
$row = $ung->row();

echo @$row->prodcatg_name;} ?>"  size="22"  aria-required='true' /><input name="mid1" type="hidden"  class="span6" size="22"  aria-required='true'  value="<?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->main_prodcatg_id; }?>"/></td>
<?php } ?>


</tr>        

<tr style="display:none">

<td class="text-r"><star>*</star>Print Name</td>

<td><input name="printname" type="text" id="print_name" class="span6" size="22"  aria-required='true'  value="<?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->printname; }?>"/></td>
<td class="text-r"><star>*</star>Alias</td>

<td><input name="alias" type="text" onChange="aliesfun(this.value)" class="span6" size="22" aria-required='true'  value="<?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->alias; }?>" /><br/><a id="aliesdiv" style="color:#FF0000"></a></td>
</tr>
<tr>
<td class="text-r"><star>*</star>
 Description</td>
	<td><textarea name="description" type="text" cols="80" rows="6"><?php if(@$_GET['mid']=='' && @$_GET['id']!=''){ echo $branchFetch->Description; }?></textarea></td>
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
<?php $this->load->view('softwarefooter'); ?>