<?php 
$tableName="tbl_quotation_hdr";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<script src="<?php echo base_url();?>assets/js/jst/jquery.min.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php $this->load->view('title'); ?>
<style>
p{font-size: 40px;}
.loader1 {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url("<?php echo base_url();?>assets/images/ajax-loader.gif") 50% 50% no-repeat #ffffff;
    opacity: .8;
}

</style>
<script>
$(window).load(function() {
	$(".loader1").fadeOut("fast");
});

</script>
<?php $this->load->view('phpfunction'); ?>

<body>
<div class="loader1" id=></div>
<?php $this->load->view('all_js'); ?>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->
<?php 
	$this->load->view('sidebar');
  ?>
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<script>
function search_row(id,row)
{

var value= document.getElementById(id).value;

var table = $('#dataTables-example').DataTable();
$('#'+id).on( 'keyup', function () {
    table
        .columns( row )
        .search( this.value )
        .draw();
});

} 	
</script>
<form method="get">
<h1>Quotation Report </h1> 
<div class="actions">
<div class="blogroll">
</div>
</div><!--actions close-->
<div class="search-row-to">
</div><!--search-row-to close-->
<div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">

<div class="table-row">
<table class="bordered"id="dataTables-example">
<thead>
<tr>

<th>Date</th>
<th>Customer Name</th>
<th>Remarks</th>
<th>Subject</th>

<th>Ref.No.</th>
<th>Ground Total</th>
<th>Status</th>
</tr>
</thead>

	<?php
@extract($_GET);
	
	
		
		 $queryy="select * from $tableName order by quotation_id_hdr desc";
		
	$result1=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	$i=1;
	foreach(@$result1->result() as $line){
	
    @extract($line);
   ?>
   
   <tr>
   	
	<td>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo"> <?php echo $line->maker_date;?></button>
	
                        </td>
	
	<td >
	<?php 
		$sql = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$line->vendor_id'");
		$linecategory=$sql->row();
			
		
	?>
	<a data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo"><?php echo $linecategory->first_name;?></a>
	</td>
  
	<td><?php echo $line->remark;?></td>
    	

  <td><?php echo $line->subject;?></td>

	<td><?php echo $line->refno;?></td>
	<td><?php echo $line->grand_total; ?></td>
	<td><?php echo $line->send_status; ?></td>

    </tr>

	
						
					
                       <div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1200px;height:200px;; margin-left:-297px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">View</h4>
      </div>
      <div class="modal-body">
	  <div  class="border row">
      <div class="border col-lg-2">
	  <strong>Date</strong>
	  </div>
	  <div class="border col-lg-7">
	  <strong>Product Name</strong>
	  </div>
	  <div class="border col-lg-1">
	  <strong>Qty</strong>
	  </div>
	  <div class="border col-lg-2">
	 <strong>List Price</strong>
	  </div>
	  
	  
	  
	  </div>
	  	
	  
	  <?php
						$queryProduct=$this->db->query("select *from tbl_quotation_dtl where quotation_id='$line->quotation_id_hdr'");
						
						foreach($queryProduct->result() as $getProduct){
						$productName=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->product_id'");
						$getProductName=$productName->row();
						?>
      <div class="row">
	  <div class="col-lg-2">
	  <?=$line->maker_date;?>
	  </div>
	  <div class="col-lg-7">
	  <?=$getProductName->productname;?>
	  </div>
	  <div class="col-lg-1">
	  <?=$getProduct->quantity;?>
	  </div>
	  <div class="col-lg-2">
	   <?=$getProduct->list_price;?>
	  </div>
	  </div>
<?php }?>	  
	  </div>

	  
     
    </div>
  </div>
</div>

	</div>
</div>
						<?php 
						
						$i++;
						}?>
						
	     <input type = "hidden" value ="<?php  echo $tt;?>" id = "tol" />
		 <script>
		 var total = document.getElementById('tol').value;
		 
		 document.getElementById('tol1').value = total;
		 </script>   

</table>


<!--bordered close-->

<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</form>
<?php $this->load->view('softwarefooter'); ?>
