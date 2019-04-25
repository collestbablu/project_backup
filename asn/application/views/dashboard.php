<?php $this->load->view("header.php");?>
<div class="main-content">

<h1 class="page-title">Dashboard</h1>&nbsp;
<br>
<a href="<?=base_url();?>master/Account/add_docket"><h1><u>Add Docket</u></h1></a>
<!-- Row-->
<div class="row">

<!-- Online Signup -->
<a href="<?=base_url();?>master/Account/manage_delivery">
<div class="col-lg-3 col-sm-6">
<div class="panel minimal secondary-bg">
<div class="panel-body">
<?php
$deliveryQuery=$this->db->query("select *from tbl_docket_entry where booked_status='Delivered'");
 $cntDelivery=$deliveryQuery->num_rows();

?>
<h2 class="no-margins"><strong><?=$cntDelivery;?></strong></h2>
<p>Docket Delivered</p>
<div class="float-chart-sm pt-15">
<div id="online-signup" class="flot-chart-content"></div>
</div>
</div>
</div>
</div>
</a>
<!-- /Online Signup -->

<!-- Last Month Sale -->
<a href="<?=base_url();?>master/Account/manage_not_delivery_or_return">
<div class="col-lg-3 col-sm-6">
<div class="panel minimal royalblue-bg">
<div class="panel-body">
<?php
$notDeliveryQuery=$this->db->query("select *from tbl_docket_entry where booked_status='Not Delivered Return'");
 $cntNotDelivery=$notDeliveryQuery->num_rows();

?>
<h2 class="no-margins"><strong><?=$cntNotDelivery;?></strong></h2>
<p>Docket Not Delivered/return</p>
</div>
<div class="float-chart-sm">
<div class="last-month-outer">
<div id="last-month-sale" class="flot-chart-content"></div>
</div>
</div>
</div>
</div>
</a>
<!-- /last month sale -->
<a href="<?=base_url();?>master/Account/manage_booked">
<!-- New Visits -->
<div class="col-lg-3 col-sm-6">
<div class="panel minimal royalblue-bg">
<div class="panel-body">
<?php
$bookedQuery=$this->db->query("select *from tbl_docket_entry where booked_status='Booked'");
 $cntbookedQuery=$bookedQuery->num_rows();

?>
<h2 class="no-margins"><strong><?=$cntbookedQuery?></strong></h2>
<p>Docket Booked</p>
</div>
<div class="float-chart-sm">
<div class="last-month-outer">
<div id="last-month-sale" class="flot-chart-content"></div>
</div>
</div>
</div>
</div>
</a>
<!-- /new visits -->
<a href="<?=base_url();?>master/Account/manage_edd_fail">
<!-- Total Revenu -->
<div class="col-lg-3 col-sm-6">
<div class="panel minimal info-bg">
<div class="panel-body">
<?php
$eddQuery=$this->db->query("select *from tbl_docket_entry where booked_status='Not Delivered'");
 $cntbookedQuery=$eddQuery->num_rows();

?>
<h2 class="no-margins"><strong><? //$cntbookedQuery?></strong></h2>
<p>EDD FAILURE</p>
<div class="float-chart-sm pt-15">
<div id="total-revenue" class="flot-chart-content"></div>
</div>
</div>
</div>
</div>
</a>
<!-- /total revenu -->
</div>
<!-- /row-->

<!-- Row -->

<!-- /row-->

<!-- Row-->

<!-- /row-->

<!-- Row-->

<!-- /row-->

<!-- Row-->
<div class="row">

<div class="col-md-12"> 
<div class="panel panel-default">

<!-- Panel body --> 
<div class="panel-body"> 
<div class="jvectormap-section" id="world-map-markers" style="height: 400px"></div>
</div> 
<!-- /panel body -->
</div> 
</div>
</div>
<?php $this->load->view("footer.php");?>