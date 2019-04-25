<style>
.booking-padding{padding: 0px;}
.booking-step {
    /*margin-top: 35px;
    margin-bottom: 10px;*/
	padding:20px;
}

.step-item {
    color: #636363;
    display: block;
    text-align: center;
    text-transform: uppercase;
    font-size: 13px;
    margin:0 0 30px 0px;

}

.step-item .line {
    width: 100%;
    height: 1px;
    background: #D1D1D1;
}

.step-item .step-item {
    margin-top: -26px;
    margin-bottom: 5px;
	height:90px;
}

.step-item .number {
    width: 40px;
    height: 40px;
    background: #EDEDED;
    margin: 5px auto 0;
    padding: 5px;
    border-radius: 50%;
}

.step-item .number .inner {
    background: #D1D1D1;
    height: 100%;
    color: #FFF;
    font-size: 16px;
    font-weight: 400;
    line-height: 30px;
    border-radius: 50%;
}

.step-item.active a:hover {
    cursor: pointer;
    opacity: 0.4;
    text-decoration: none;
}

.step-item.active .line {
    background: #424C70;
}

.step-item.active .number .inner {
    background: #424C70;
}

</style>


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
<div class="booking-step">
<div class="row gap-0">

<div class="col-xs-12 col-sm-2" style="padding:0px;"> 
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchPickUp/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">1</div>
</div>
<p>Pick Up Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchPickUpCost/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">2</div>
</div>
<p>Pick Up Cost Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchDelivery/"> 
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">3</div>
</div>
<p>Delivery Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchDeliveryCost/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">4</div>
</div>
<p>Delivery Cost Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchBranchDelivery/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">5</div>
</div>
<p>Branch Delivery Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchBranchDeliveryCost/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">6</div>
</div>
<p>Branch Delivery Cost Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchExpense/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">7</div>
</div>
<p>Expense Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchRental/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">8</div>
</div>
<p>Rental Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchContact/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">9</div>
</div>
<p>Contact Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchInvoice//">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">10</div>
</div>
<p>Invoice Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchBooking/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">11</div>
</div>
<p>Connection List Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchSalary/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">12</div>
</div>
<p>Salary Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;display:none;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchPI/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">13</div>
</div>
<p>PI Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;display:none;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchDelhiStock/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">14</div>
</div>
<p>Delhi Stock Report</p>
</div>
</a> </div>
</div>

<div class="col-xs-12 col-sm-2"  style="padding:0px;display:none;">
<div class="step-item active"><a href="<?=base_url();?>report/Report/searchPgGroup/">
<div class="line"></div>
<div class="step-item">
<div class="number">
<div class="inner">15</div>
</div>
<p>72 Report</p>
</div>
</a> </div>
</div>









</div>
</div><!--container booking-step close-->
</div>
</div>
</div>
</div>
<?php
$this->load->view("footer.php");
?>