<?php
$this->load->view("header.php");
?>
	<!-- Main content -->
	<div class="main-content">
	
<?php
$this->load->view("reportheader");
?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title">REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<div class="form-group"> 
<div class="wizard-navbar">
<ul class="wizard-steps">
<li class=""><a href="#tab1" data-toggle="tab" aria-expanded="false"><span>1</span><a href="<?=base_url();?>report/Report/searchStock/">Product Stock Report</a></a></li>
<li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false"><span>2</span><a href="<?=base_url();?>report/Report/searchLead/"> Lead Report</a></a></li>
<li class="" style="display:none"><a href="#tab4" data-toggle="tab" aria-expanded="true"><span>3</span><a href="<?=base_url();?>report/Report/searchActivity/">Activity Report</a></a></li>
<li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false"><span>4</span><a href="<?=base_url();?>report/Report/searchTourReport/">Tour Report</a></a></li>
<li class="" style="display:none"><a href="#tab2" data-toggle="tab" aria-expanded="false"><span>5</span><a href="<?=base_url();?>report/Report/searchPaymentReport/">Payment Report</a></a></li>
<li class="" style="display:none"><a href="#tab2" data-toggle="tab" aria-expanded="false"><span>6</span><a href="<?=base_url();?>report/Report/searchPaymentReceivedReport/">Payment Recived Report</a></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
$this->load->view("footer.php");
?>