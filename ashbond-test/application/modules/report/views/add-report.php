<?php $this->load->view('softwareheader'); ?>
<div class="clear"></div>
</div><!--title close-->
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Report</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Report</div>
<div class="panel-body">

<div class="#">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            
                            <li class=""><a href="#tab2primary" data-toggle="tab"></a></li>
                           
                        </ul>
                </div>
				<div class="clear"></div>
                <div class="panel-body">
                    <div class="tab-content">
                        
                         <div id="tab2primary">
												<section class="block">
    <article id="tab2" style="display: block; background-color: ivory; double rgb(242, 242, 242);border-style: double;font-size: large;">
<?php /*?><a  href="<?php echo base_url()?>report/ProductStockReport/product_stock_report_1" style="text-decoration:none; color:#000000">Product In Stock</a> |<?php */?>
<a  href="<?php echo base_url()?>report/PartPurductionReport/part_purduction_report" style="text-decoration:none; color:#000000">PURCHASE ORDER</a>

<br><hr>
<a  href="<?php echo base_url()?>report/MachinePerformanceReport/machine_performance_report" style="text-decoration:none; color:#000000">PRICE AFTER GST</a>

<br><hr>

<a  href="<?php echo base_url()?>report/ProductQuantityReport/product_stockreport_function" style="text-decoration:none; color:#000000">SALE RECORDS</a>

<br><hr>

<a  href="<?php echo base_url()?>report/SalePurchaseReport/sale_purchase_report" style="text-decoration:none; color:#000000">PURCHASE RECORDS</a>

<br><hr>
<a  href="<?php echo base_url()?>report/CustomerSaleProductReport/customer_sale_product_report" style="text-decoration:none; color:#000000">SALE ORDER</a>

<br><hr>
<a  href="<?php echo base_url()?>report/AllProductReport/product_report" style="text-decoration:none; color:#000000">ALL PRODUCT RECORDS</a>
    </article>
  </section>
						</div>
   
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!--container-right close-->
</div><!--container close-->
<div class="clear"></div><!--footer--row close-->
</div><!--wrapper close-->
<?php $this->load->view('softwarefooter'); ?>
