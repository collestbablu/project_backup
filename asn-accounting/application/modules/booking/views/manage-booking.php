<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_sales_order_hdr';

?>
	 <!-- Main content -->
	 <div class="main-content">			
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Connection Sheet</a></li> 
				
				<li class="active"><strong><a href="#">Manage Connection Sheet</a></strong></li> 
				<div class="pull-right">
				<a class="btn btn-sm" href="<?=base_url();?>booking/add_booking">Add Connection Sheet</a>
				</div>
			</ol>
<?php
            if($this->session->flashdata('flash_msg')!='')
{
            ?>
<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php }?>
			<div class="row">
				<div class="col-lg-12">
					
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
<th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	   <th>CD No.</th>
	   <th>Vendor</th>
		<th>Date Of Booking</th>
        <th>Exp. Reach Date	</th>
        
		<th>Mode</th>
		<th>Vendor Weight</th>
        <th>Grand Total</th>
         <th>Action</th>
</tr>
</thead>

<tbody>
<?php
$i=1;
	foreach($result as $sales)
  {
  ?>

<tr class="gradeC record">
<th style="display:none;"><input type="checkbox" /></th>
<th><?=$sales->cd_no;?></th>
<th><?php 
		$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$sales->vendor_id'");
		$res1 = $sqlgroup->row();
		echo $res1->first_name;?></th>

<th><?=$sales->date_of_booking;?></th>
<th><?=$sales->exp_reach_date;?></th>
<th><?=$sales->mode;?></th>


<th><?=$sales->vendor_weight;?></th>
<th><?=$sales->grand_total;?></th>

<th>
<button class="btn btn-default" onClick="openpopup('<?=base_url();?>booking/edit_booking',1400,600,'id',<?=$sales->bookingrid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-pencil"></i></button>
	


<?php
$pri_col='bookingrid';
$table_name='tbl_bookong_order_hdr';
	?>
   
    
<button class="btn btn-default delbuttonPurchase" id="<?=$sales->bookingrid."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>

</th>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php

$this->load->view("footer.php");
?>