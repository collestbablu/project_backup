<?php
$this->load->view("header.php");
$tableName='tbl_leads';
$location='manage_item';
		
		$userQuery = $this -> db
           -> select('*')
		   -> where('lead_id',$_GET['id'])
		   -> or_where('lead_id',$_GET['view'])
           -> get('tbl_leads');
		  $branchFetch = $userQuery->row();

?>
	<!-- Main content -->
	<div class="main-content">
		
		<?php if(@$_GET['popup'] == 'True') {} else {?>
		<ol class="breadcrumb breadcrumb-2"> 
			
			<li><a class="btn btn-success" href="<?=base_url();?>Crm/Lead/manage_lead">Manage Leads</a></li> 
			
		</ol>
		<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Crm</a></li> 
				
				<li class="active"><strong><a href="#">Add Lead</a></strong></li> 
			</ol>
		<?php }?>
		
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<?php if($_GET['id']!=''){ ?>
		<h4 class="panel-title">Update Lead</h4>
		<?php }elseif($_GET['view']!=''){ ?>
		<h4 class="panel-title">View Lead</h4>
		<?php }else{ ?> 
		<h4 class="panel-title"><strong>Add Lead</strong></h4>
		<?php } ?>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="insert_lead" enctype="multipart/form-data">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Contact:</label> 
<div class="col-sm-4"> 
<select name="contact_id"   class="form-control ui fluid search dropdown email"   required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> >
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4'");
						foreach ($sqlgroup->result() as $fetchgroup){
						
					?>
					
					
    <option value="<?php echo $fetchgroup->contact_id; ?>"<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchgroup->contact_id==$branchFetch->contact_id){ ?> selected <?php } }?>><?php echo $fetchgroup->first_name ; ?></option>

    <?php } ?></select>
	
</div> 
<input type="hidden" name="leadid" value="<?php echo $branchFetch->lead_id;  ?>" />
<label class="col-sm-2 control-label">*Sales Person:</label> 
<div class="col-sm-4" id="regid"> 
<select name="sales_person_id"   class="form-control"   required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> >
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='5'");
						foreach ($sqlgroup->result() as $fetchgroup){
						
					?>
					
					
    <option value="<?php echo $fetchgroup->contact_id; ?>"<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchgroup->contact_id==$branchFetch->sales_person_id){ ?> selected <?php } }?>><?php echo $fetchgroup->first_name ; ?></option>

    <?php } ?></select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Communication:</label> 
<div class="col-sm-4"> 
<textarea name="communication"   class="form-control" <?php if($_GET['view']!='') {?> readonly="" <?php }?> required><?php echo $branchFetch->communication; ?></textarea>
</div> 
<label class="col-sm-2 control-label">*Requirement Des.:</label> 
<div class="col-sm-4"> 
<textarea name="requirement_des"   class="form-control" <?php if($_GET['view']!='') {?> readonly="" <?php }?> required> <?php echo $branchFetch->requirement_des; ?></textarea>
				
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4"> 
<input type="date" name="date"   class="form-control" <?php if($_GET['view']!='') {?> readonly="" <?php }?> required value="<?php echo $branchFetch->date; ?>">
</div> 
<label class="col-sm-2 control-label">*Remarks:</label> 
<div class="col-sm-4"> 
<textarea name="remarks"   class="form-control" <?php if($_GET['view']!='') {?> readonly="" <?php }?> required><?php echo $branchFetch->remarks; ?> </textarea>
				
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Next Action:</label> 
<div class="col-sm-4" id="regid"> 
<select name="next_action"  class="form-control" required>
<option value="">--Select--</option>
<option value="Email" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($branchFetch->next_action=='Email'){ ?> selected <?php } }?>>Email</option>
<option value="Phone" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($branchFetch->next_action=='Phone'){ ?> selected <?php } }?>>Phone</option>
<option value="F2F" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($branchFetch->next_action=='F2F'){ ?> selected <?php } }?>>F2F</option>
</select>
</div> 
<label class="col-sm-2 control-label">*Next Action Date:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="next_act_date" min="1" step="any" value="<?php echo $branchFetch->next_act_date; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Budget:</label> 
<div class="col-sm-4" id="regid"> 
<input name="budget" type="number" step="any"  class="form-control" required value="<?php echo $branchFetch->budget; ?>">
</div> 
<label class="col-sm-2 control-label">*Attachment:</label> 
<div class="col-sm-4" id="regid"> 
<input name="image_name" type="file"   class="form-control">
<?php if($branchFetch->attachment_name!=''){?><img src="<?php echo base_url().'assets/image_data/'.$branchFetch->attachment_name;?>" height="100" width="100" /> <?php }?>
</div> 
</div>
<div class="form-group">
<div class="col-sm-4 col-sm-offset-2">
<?php if(@$_GET['popup'] == 'True') {
if($_GET['id']!=''){
?>
<input type="submit" class="btn btn-primary" value="Save">
<?php } ?>
<a href="" onclick="popupclose(this.value)"  title="Cancel" class="btn btn-blue"> Cancel</a>

	   	 <?php }else {  ?>
		 
		<input type="submit" class="btn btn-primary" value="Save">
       <a href="<?=base_url();?>Crm/Lead/manage_lead" class="btn btn-blue">Cancel</a>

       <?php } ?>

</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php

if($_GET['id']!='' or $_GET['view']!='')
{
?>
<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>Manage Leads</strong></h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	  
		<th>Sr. NO.</th>
		<th>Contact Name</th>
        <th>Sales Person</th>
		<th>Communication</th>
		<th>Date</th>
      	<th >Next Action</th>
         <th>Next Action Date</th>
		  
		 <th>Action</th>
</tr>
</thead>

<tbody>
<?php
	$i=1;
  $queryLead=$this->db->query("select *from tbl_leads_log where lead_log_id='".$_GET['id']."' or lead_log_id='".$_GET['view']."'");
  foreach($queryLead->result() as $fetch_list)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->lead_id; ?>">
<th>
<?php
									
?><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->lead_id; ?>" value="<?php echo $fetch_list->lead_id;?>" />
</th>
<th>
<?php echo  $i; ?>
</th>
<th>
<?php
										$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$fetch_list->contact_id'");
										$res1 = $sqlgroup->row();
										
							echo $res1->first_name;
										
										?>
</th>
<th>
<?php
			$sqlgroup1=$this->db->query("select * from tbl_contact_m where contact_id='$fetch_list->sales_person_id'");
										$res11 = $sqlgroup1->row();
										
									echo  $res11->first_name;
			
			//echo $fetch_list->lead_type_id;
									
										?>

</th>
<th><?php echo $fetch_list->communication;?></th>
<th><?php echo $fetch_list->date;?></th>
<th>
<?php //select id of unit id
 echo $fetch_list->next_action;
?>

</th>
<th><?php echo $fetch_list->next_act_date;?></th>
<th >
<?php if($view!=''){ ?>
<a href="#" onClick="openpopup('view_lead_log',1200,500,'view',<?=$fetch_list->lead_id;?>)"><i class="glyphicon glyphicon-zoom-in"></i></a>&nbsp;&nbsp;&nbsp;
<?php } if($edit!=''){ ?>
<a href="#" onClick="openpopup('add_lead',1200,500,'id',<?=$fetch_list->lead_id;?>)"><i class="glyphicon glyphicon-pencil"></i>
<?php }
$pri_col='lead_id';
$table_name='tbl_leads';
if($delete!=''){ 
if($checkProduct=='1')
{
?>
	&nbsp;&nbsp;&nbsp;<a href="#" id="<?php echo $fetch_list->lead_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"><i class="glyphicon glyphicon-remove"></i></a> 
<?php
}
else

{
?>
<a href="#" id="<?php echo $fetch_list->lead_id."^".$table_name."^".$pri_col ; ?>" onclick="return confirm('Invoice already ctrated for this product.you can not delete ?');" class="delbutton icon"><i class="glyphicon glyphicon-remove"></i></a>
<?php

}

 } ?>

</th>
</tr>
<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_leads">  
<input type="text" style="display:none;" id="pri_col" value="lead_id">
</table>
</div>
</div>
</div>
</div>
</div>
<?php }?>
<?php
$this->load->view("footer.php");

?>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
 
 

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

function getCatType(catType) {	





		var strURL="get_pro_typ?catType="+catType;



		



		var req = getXMLHTTP();



		



		if (req) {



			



			req.onreadystatechange = function() {



				if (req.readyState == 4) {



					// only if "OK"



					if (req.status == 200) {



						//alert(req.responseText);



						document.getElementById('catTypeDiv').innerHTML=req.responseText;						



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
</script>
