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
<h4 class="panel-title">REPORTS </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<div class="form-group"> 
<div class="wizard-navbar">
<ul class="wizard-steps">
<li class=""><a href="#tab1" data-toggle="tab" aria-expanded="false"><span>1</span><a href="<?=base_url();?>report/Report/searchStock/">Consignee/consigner Report</a></a></li>
<li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false"><span>2</span><a href="<?=base_url();?>report/Report/searchDocket/">Docket Report</a></a></li>
<li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false"><span>2</span><a href="<?=base_url();?>report/Report/searchConsignorInvoice/">Consigner Invioce Report</a></a></li>
<li class="" style="display:none"><a href="#tab3" data-toggle="tab" aria-expanded="false"><span>3</span> Sale Order Report</a></li>
<li class="active" style="display:none"><a href="#tab4" data-toggle="tab" aria-expanded="true"><span>4</span> Stock Summary Report</a></li>
</ul>
</div>
</div>
<div class="form-group"> 
</div>
</div>
</div>
</div>
</div>
<script>
function productstock(){
window.location.href = '<?php echo base_url();?>report/Report/searchStock/';
}
function purchaseorder(){
window.location.href = '<?php echo base_url();?>report/Report/searchTotalStock/';
}
function saleorder(){
window.location.href = '<?php echo base_url();?>report/Report/searchSalesOrder/';
}
</script>
<?php
$this->load->view("footer.php");
?>