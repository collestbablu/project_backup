<?php
$this->load->view("header_to.php");

$id=$_GET['lead_id'];		  

$quryinv=$this->db->query("select *from tbl_leads where lead_id='$id' ");
$getInv=$quryinv->row();

$pricelist=$this->db->query("select * from tbl_master_data where param_id='20' AND serial_number='$getInv->price_list'");
$getPriceList=$pricelist->row();

$prt=$this->db->query("select * from tbl_master_data where serial_number='$getInv->priority'");
$getprt=$prt->row();

$src=$this->db->query("select * from tbl_master_data where serial_number='$getInv->source'");
$getsrc=$src->row();

$territory=$this->db->query("select * from tbl_state_m M,tbl_tour T where T.tour_id = '$getInv->tour_id' AND M.stateid = T.state ");
$getTrty=$territory->row();

$stage=$this->db->query("select * from tbl_master_data where serial_number='$getInv->lead_status'");
$getStage=$stage->row();

$indstry=$this->db->query("select * from tbl_master_data where serial_number='$getInv->industry'");
$getInd=$indstry->row();

$cntdata=$this->db->query("select * from tbl_contact_m where contact_id='$getInv->contact_id'");
$getcnt=$cntdata->row();

$leadsdata=$this->db->query("select * from tbl_user_mst where user_id='$getInv->sales_person_id'");
$cntldata=$leadsdata->row();

?>
<form id="f1" name="f1" method="POST" >

<div class="main-content">
<div class="row datatable-wrapper form-inline">
<div class="col-lg-6">
<div class="data-col-first clearfix">
<div class="col-checkbox col-space">
<div class="form-checkbox">
</div>
</div>
</div>
<div class="data-col-last clearfix">
<strong>LEAD NUMBER - <?=$getInv->lead_number;?></strong>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; Activities</h4>
<ul class="panel-tool-options"> 
<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
</ul>
</div>
<div class="panel-body">
<div class="row datatable-wrapper form-inline">
<div class="col-lg-12">
<div class="data-col-first clearfix">
<div class="col-checkbox col-space">
<div class="form-checkbox">
</div>
</div>
</div>

</div>
</div>

<div class="span8">
<?php 
	$sqlgroup=$this->db->query("select * from tbl_activity_log where lead_id='$id'");
	foreach ($sqlgroup->result() as $fetchgroup){

$sqlgroup11=$this->db->query("select * from tbl_master_data where serial_number='$fetchgroup->nxt_action' and param_id='23'");
$rows=$sqlgroup11->row();
	
?>
<p> <samp><b>Next Action :</b> <?=$rows->keyvalue;?> <samp><b>Next Action Date : </b> <?=$fetchgroup->nxt_action_date ?> </samp></p>
<?php  } ?>
</div>
</div>
</div><!--panel panel-default close-->

<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title"><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;&nbsp;  Contact Details</h4>
<ul class="panel-tool-options"> 
<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form>

<div class="form-group">
<label>Contact Person : </label>
<?=$getInv->contact_person;?>
</div>

<div class="form-group">
<label>Email : </label>
<?=$getInv->email_id;?>
</div>

<div class="form-group">
<label>Phone : </label>
<?=$getInv->phone;?>
</div>

</form>
</div>
</div><!--panel panel-default close-->

<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;&nbsp;   Lead Details</h4>
<ul class="panel-tool-options"> 
<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form>

<div class="form-group">
<label>Customer : </label>
<?=$getcnt->first_name;?>
</div>

<div class="form-group">
<label>Address : </label>
<?=$getcnt->address1;?>
</div>

<?php if($getInv->tour_id != ''){ ?>

<div class="form-group">
<label>State : </label>
<?=$getTrty->stateName;?>
</div>

<div class="form-group">
<label>Tour Id : </label>
<?=$getInv->tour_id;?>
</div>

<?php } ?>

<div class="form-group">
<label>Subject : </label>
<?=$getInv->subject;?>
</div>

<div class="form-group">
<label>Sales Person : </label>
<?=$cntldata->user_name;?>
</div>

<div class="form-group">
<label>Priority : </label>
<?=$getprt->keyvalue;?>
</div>

<div class="form-group">
<label for="password">Expected Closure Date : </label>
<?=$getInv->exptd_closer_date;?>
</div>

<div class="form-group">
<label>Source : </label>
<?=$getsrc->keyvalue;?>
</div>

<div class="form-group">
<label>Potential Revenue : </label>
<?=$getInv->potential_revenue;?>
</div>

<div class="form-group">
<label>Price List : </label>
<?=$getPriceList->keyvalue;?>
</div>

<div class="form-group">
<label>Competitor : </label>
<?=$getInv->competitor;?>
</div>

<div class="form-group">
<label>Stage : </label>
<?=$getStage->keyvalue;?>
</div>

<div class="form-group">
<label>Industry : </label>
<?=$getInd->keyvalue;?>
</div>

</form>
</div>
</div><!--panel panel-default close-->

<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;  Lead Items</h4>
<ul class="panel-tool-options"> 
<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form>
<div class="form-group">

<?php

$LeadItm=$this->db->query("select *from tbl_lead_product where lead_id='$id' ");
foreach ($LeadItm->result() as $getItm){

$leadPro=$this->db->query("select *from tbl_product_stock where Product_id='$getItm->product_id' ");
$getPro=$leadPro->row();

?>


<p style="display:none">
<samp><b>Item Name :</b> <?=$getPro->productname;?></samp> &nbsp;&nbsp;
<samp><b>Rate :</b> <?=$getItm->rate;?></samp> &nbsp;&nbsp;
<samp><b>Quantity :</b> <?=$getItm->qty;?></samp> &nbsp;&nbsp;
<samp><b>Total Amount:</b> <?=$getItm->total;?></samp> &nbsp;&nbsp;
</p>

<div class="col-md-4 mb-4">
<label>Item Name : </label>
<?=$getPro->productname; ?>
</div>

<div class="col-md-2 mb-3">
<label>Rate : </label>
<?=$getItm->rate; ?>
</div>

<div class="col-md-2 mb-3">
<label>Quantity : </label>
<?=$getItm->qty; ?>
</div>


<div class="col-md-2 mb-3">
<label>Total Amount : </label>
<?=$getItm->total; ?>
</div>


<?php 
$grand_total = $grand_total + $getItm->total;
} 
?>
</div>
</form>


<div style="margin:30px 0 0 0px; width:66%; float:right;"> 

<form class="form-horizontal">

<div class="form-group">
<label class="col-md-2 control-label" for="name" style="padding:0px;" >Grand Total Amount :</label>
<div class="col-md-2"><?php echo $grand_total; ?></div>
</div>

</form>
</div>

</div>
</div><!--panel panel-default close-->

<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;   Additional Information</h4>
<ul class="panel-tool-options"> 
<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
</ul>
</div>
<div class="panel-body">
<br />
<p>
<samp><b>Subject:</b> <?=$getInv->subject;?></samp> &nbsp;&nbsp;
<samp><b>Sales Person:</b> <?=$cntldata->user_name;?></samp> &nbsp;&nbsp;
<samp><b>Priority:</b> <?=$getprt->keyvalue;?></samp> &nbsp;&nbsp;
<samp><b>Source:</b> <?=$getsrc->keyvalue;?></samp> &nbsp;&nbsp;
<samp><b>Customer:</b> <?=$getcnt->first_name;?></samp> &nbsp;&nbsp;
</p>
<P>
<samp><b>Pricelist:</b> <?=$getPriceList->keyvalue;?></samp> &nbsp;&nbsp;
<samp><b>Expected Closure Date:</b> <?=$getInv->exptd_closer_date;?></samp> &nbsp;&nbsp;
<samp><b>Lead No:</b> <?=$getInv->lead_number;?></samp> &nbsp;&nbsp;
<samp><b>Lead Stage:</b> <?=$getStage->keyvalue;?></samp> &nbsp;&nbsp;
</p>
<?php 
$user=$this->db->query("select * from tbl_user_mst where comp_id='".$getInv->comp_id."' ");
$getUser=$user->row();
?>
<p><samp>Created by <?=$getUser->user_name;?> On : <?=$getInv->maker_date ?> </samp></p>
<br />
</div>
</div><!--panel panel-default close-->

</form>

<b style="display:none">
<?php
$this->load->view("footer.php");
?>
</b>