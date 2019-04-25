<?php 
$tableName="tbl_purchase_order_hdr";
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
<form method="post">
<h1>Vendor Price List History</h1> 
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

<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Search Vendor Price List History</b></th>        
</tr>
</thead>

<tr>
<td width="19%" class="text-r">
Remark:</td>
 <td width="33%"><input type="text" name="remark"   id="id1" onKeyUp="search_row(this.id,2)" /></td>
<td width="19%" class="text-r">
Subject:</td>
<td width="29%"><input type="text" name="subject"  id="id2" onKeyUp="search_row(this.id,3)" /></td></tr>   

<tr>
<td width="19%" class="text-r">
Ref.No.:</td>
 <td width="33%"><input type="text" name="refno"   id="id3" onKeyUp="search_row(this.id,4)" /></td>
<td width="19%" class="text-r">
Grand Total:</td>
<td width="29%"><input type="text" name="grand_total"  id="id4" onKeyUp="search_row(this.id,5)" /></td></tr>     
<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate" size="22" class="rounded"/> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate" size="22" class="rounded"/> </td>
</tr>
<tr>
    <td class="text-r" align="right"></td>
	<td>&nbsp;
	</td>
	<td class="text-r">&nbsp;</td>
	
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>

<div class="table-row">
<table class="bordered"id="dataTables-example">
<thead>
<tr>

<th>Date</th>
<th>Vendor Name</th>
<th>Remarks</th>
<th>Subject</th>

<th>Ref.No.</th>
<th>Grand Total</th>
</tr>
</thead>

	<?php
@extract($_POST);
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A' and vendor_id='".$_GET['id']."'";
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy.=" and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
		if($remark!=''){
				 $queryy.=" and remark like '%$remark%'";
		}
		if($subject!=''){
				 $queryy.=" and subject like '%$subject%'";
		}
		
		if($refno!=''){
				 $queryy.=" and refno like '%$refno%'";
		}
		if($grand_total!=''){
				 $queryy.=" and grand_total like '%$grand_total%'";
		}
	}
	
	if($_GET['id']!='' and $Search=='')
	{
		
		 $queryy="select * from $tableName where status='A' and vendor_id='".$_GET['id']."'";
		
		}
	
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

    </tr>

	
						
					
                       <div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1210px;height:200px;; margin-left:-302px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">View</h4>
      </div>
      <div class="modal-body">
	  <div  class="border row">
      <div class="border col-lg-3">
	  <strong>Date</strong>
	  </div>
	  <div class="border col-lg-3">
	  <strong>Product Name</strong>
	  </div>
	  <div class="border col-lg-3">
	  <strong>Qty</strong>
	  </div>
	  <div class="border col-lg-3">
	 <strong>List Price</strong>
	  </div>
	  
	  
	  
	  </div>
	  	
	  
	  <?php
						$queryProduct=$this->db->query("select *from tbl_purchase_order_dtl where purchase_order_hdr_id='$line->purchase_order_id'");
						
						foreach($queryProduct->result() as $getProduct){
						$productName=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->product_id'");
						$getProductName=$productName->row();
						?>
      <div class="row">
	  <div class="border col-lg-3">
	  <?=$getProduct->maker_date;?>
	  </div>
	  <div class="border col-lg-3">
	  <?=$getProductName->productname;?>
	  </div>
	  <div class="border col-lg-3">
	  <?=$getProduct->quantity;?>
	  </div>
	  <div class="border col-lg-3">
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
