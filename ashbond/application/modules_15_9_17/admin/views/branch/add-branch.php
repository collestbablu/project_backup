<?php
$tableName='tbl_branch_mst';
$location='manage_branch';
$this->load->view('softwareheader'); 
?>

<script>



function getXMLHTTP() { //fuction to return the xml http object



var xmlhttp=false;



try{



xmlhttp=new XMLHttpRequest();



}



catch(e) {



try{



xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");



}



catch(e){



try{



xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");



}



catch(e1){



xmlhttp=false;



}



}



}







return xmlhttp;



}

function getregion(comp_id) {	
		var strURL="getregion?zone_id="+comp_id;
		//
		var req = getXMLHTTP();
		//alert(comp_id);
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
						document.getElementById('regiondiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}

</script>

<h1> Branch Details</h1>

<form action="insert_branch" method="post">



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



<tr>

<th colspan="4"><b>Add  Branch Details</b></th>        

</tr>

</thead>

<tr style="display:none">
<td class="text-r"><star>*</star>
Branch ID:</td>
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_branch_mst where status='A' and brnh_id='".$_GET['id']."' or brnh_id='".$_GET['view']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!=''){
 


  ?>         


<td><input type="text" name="brnh_id" class="span6 "value="<?php echo $branchFetch->brnh_id?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by brnh_id desc limit 0,1");
$row = $query->row();

?>

    <td><input type="text" name="brnh_idd" value="<?php echo $row->brnh_id+1?>" readonly size="22" class="span6 " aria-required='true' />         </td>

                <?php }?>
				<td colspan="2"></td> </tr>
				<tr>

<td class="text-r"><star>*</star>

  Branch Code:</td>         

<td><input name="code" type="text" class="span6" value="<?php  if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $branchFetch->code; }?>" size="22" maxlength="20" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/></td>

<td class="text-r"><star>*</star>Branch Name</td>

<td><input name="brnh_name" type="text" class="span6" value="<?php if(@$_GET['view']!='' or @$_GET['id']!=''){ echo $branchFetch->brnh_name; }?>" size="22" maxlength="20" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> readonly <?php } ?>/></td>
</tr>        

<tr>




<td class="text-r"><star>*</star>
 Enterprise Name</td>
	<td>

		<select name="comp_id" class="span6" value="<?php if(@$_GET['view']!='' or @$_GET['id']!=''){echo $branchFetch->comp_id;}?>" maxlength="20" required aria-required='true' <?php if(@$_GET['view']!=""){ ?> disabled="disabled" <?php } ?>onChange="getregion(this.value)">
		<option value="">-----select----</option>
<?php
$comp_sql = $this->db->query("select * FROM tbl_enterprise_mst where status='A'");

foreach ($comp_sql->result() as $comp_fetch){

 ?>
		
<option value="<?php  echo @$comp_fetch->comp_id;?>" <?php if(@$comp_fetch->comp_id==@$branchFetch->comp_id){ ?> selected="selected" <?php }?>><?php echo @$comp_fetch->comp_name;?></option>

<?php } ?>



		</select>
	</td>
	<td class="text-r"><star>*</star>Region Name</td>

<td>
<div id="regiondiv">

<select name="zone_id" required <?php if($_GET['view']!=""){ ?> disabled="disabled" <?php } ?>>

<option value="">--Select--</option>

<?php
$zone_sql = $this->db->query("select * FROM tbl_region_mst where status='A'");

foreach ($zone_sql->result() as $zone_fetch){

 ?>

<option value="<?php  echo @$zone_fetch->zone_id;?>" <?php if(@$zone_fetch->zone_id==@$branchFetch->zone_id){ ?> selected="selected" <?php }?>><?php echo @$zone_fetch->zone_name;?></option>

<?php } ?>

</select>
</div>

</td>

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