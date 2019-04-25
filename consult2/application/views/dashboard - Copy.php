<?php $tableName='tbl_bill_of_material_hdr';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php $this->load->view('title');?>
<link href="<?php echo base_url();?>assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jsapi.js"></script>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/bootstrap.min.css">
</head>

<body>

<div class="wrapper"><!--header close-->
 
<?php $this->load->view('sidebar');?>

<div class="container-left"><!--left-menu close-->

</div><!--container-left close-->

<div id="b2" class="right-colum" style="width:95%">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>
DASH BOARD LIST
</h1>
<!--
<div class="search-row-to">
<div class="search-row-l"><input type="text" readonly="readonly" placeholder="Search here..." required=""></div>
<div class="search-row-r"><button type="submit">Go</button>
</div>
</div><!--search-row-to close-->

</div>

<div class="col-md-12">
<h3>Production List</h3>

<table class="bordered" id="dataTables-example">

    <thead>



    <tr>

           

        <th>Lot. No</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
       	 
      
        
        

       

    </tr>

    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by bill_of_material_id_hdr desc";
		  
			  $result=$this->db->query($queryy);
 $i=1;
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->bill_of_material_id_hdr; ?>">


   

                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo"> <?php echo $line->serial_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
                       
                       <td><?php 
												if($line->product_type=='finish_goods'){
										
										echo "Finish Goods"; }elseif($line->product_type=='row_material'){ echo "Row Material"; }
										elseif($line->product_type=='semi_finish_goods'){ echo "Semi Finish Goods";}
										else{}?></td>
                      <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					  
   </tr>
	<div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModalw<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1380px;height:500px;overflow: auto;margin-left:-380px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">BOM Details</h4>
      </div>
<div class="modal-body" style="font-size:12px;">
<div class="col-lg-2" style="width:220px;height: 42px;">
<strong>Finish Goods</strong>
</div>
<div class="col-lg-2" style="width:80px; height:42px;">
<strong>Date</strong>
</div>
<div class="col-lg-2" style="width:70px; height:42px;">
<strong>Unit</strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>Machine Name</strong>
</div>
<div class="col-lg-2" style="width:60px; height:42px;">
<strong>Shift</strong>
</div>
<div class="col-lg-2" style="width:95px; height:42px;">
<strong>Supervisor</strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>Operator</strong>
</div>
<div class="col-lg-2" style="width:60px; height:42px;">
<strong>Hours</strong>
</div>
<div class="col-lg-2" style="width:70px; height:42px;">
<strong>Act Hours</strong>
</div>
<div class="col-lg-2" style="width:80px; height:42px;">
<strong>Total Qty</strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>Completed</strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>Runner Weight</strong>
</div>
<div class="col-lg-2" style="width:70px; height:42px;">
<strong>Lumps</strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>Rejection</strong>
</div>
<div class="col-lg-2" style="width:70px; height:42px;">
<strong>Stage</strong>
</div>


<?php

$detailsQuery=$this->db->query("select *from tbl_production_log where lot_no='$line->serial_no'"); 
foreach($detailsQuery->result() as $getData)
{
$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$getData->p_id'");
	$getproduct=$productQuery->row();
	$supervisorQuery=$this->db->query("select *from tbl_contact_m where contact_id='$getData->supervisor'");
	$getSupervisor=$supervisorQuery->row();
	
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
?>
<div class="col-lg-2" style="width:220px;height: 42px;">
<strong><?=$getproduct->productname;?></strong>
</div>
<div class="col-lg-2" style="width:80px; height:42px;">
<strong><?=$getData->date;?></strong>
</div>
<div class="col-lg-2" style="width:70px; height:42px;">
<strong><?=$getunit->keyvalue;?></strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>Machine-1</strong>
</div>
<div class="col-lg-2" style="width:60px; height:42px;">
<strong>1</strong>
</div>
<div class="col-lg-2" style="width:95px; height:42px;">
<strong><?=$getSupervisor->first_name;?></strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>anoj</strong>
</div>
<div class="col-lg-2" style="width:60px; height:42px;">
<strong><?=$getData->hours;?></strong>
</div>
<div class="col-lg-2" style="width:70px; height:42px;">
<strong><?=$getData->act_hour;?></strong>
</div>
<div class="col-lg-2" style="width:80px; height:42px;">
<strong><?=$line->quantity;?></strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>898 Piece</strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong><?=$getData->scrap;?></strong>
</div>
<div class="col-lg-2" style="width:70px; height:42px;">
<strong><?=$getData->lumbs;?></strong>
</div>
<div class="col-lg-2" style="width:90px; height:42px;">
<strong>2 Piece</strong>
</div>
<div class="col-lg-2" style="width:70px; height:42px;">
<strong><?=$getData->stage;?></strong>
</div>

<?php }?>

</div>
</div>
</div>
</div>

	</div>
</div>
	<?php $i++;} ?>
<input type="text" style="display:none;" id="table_name" value="tbl_bill_of_material_hdr^tbl_bill_of_material_dtl">  
<input type="text" style="display:none;" id="pri_col" value="bill_of_material_id_hdr^bill_of_material_hdr_id"> 	
</table>


</div>
<div class="clear"></div>


<div class="col-md-6">
<h3>Moulding List</h3>
<table class="bordered"id="dataTables-example">

    <thead>
    <tr>
        <th>Lot. No</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
       	 <th>Status</th>
    </tr>
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by bill_of_material_id_hdr desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->bill_of_material_id_hdr; ?>">


   

                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo"> <?php echo $line->serial_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
                       
                       <td><?php 
												if($line->product_type=='finish_goods'){
										
										echo "Finish Goods"; }elseif($line->product_type=='row_material'){ echo "Row Material"; }
										elseif($line->product_type=='semi_finish_goods'){ echo "Semi Finish Goods";}
										else{}?></td>
                      <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					    <td><?php 
	
						echo $line->approval_status;
					   ?></td>
                        
</tr>
	<div class="container">
	<div class="row">

<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:931px;height:100%; padding-bottom: 95px; margin-left:-302px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Moulding Details</h4>
      </div>
      <div class="modal-body">
	  <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong>Item Name</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong>Quantity</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong>Unit</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Gross Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Net Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Runner Weight</strong>
	  </div>
	  </div>
	  	  <?php 
						
$sql1 = $this->db->query("select * from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$line->bill_of_material_id_hdr'");
						$i=1;
						foreach($sql1->result() as $getProduct){
						
							$Query=$this->db->query("select * from tbl_product_stock where product_id='$getProduct->item_name'");
						    $getProductName=$Query->row();
					
			
						?>
	    <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong><?=$getProductName->productname;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong><?=$getProduct->quentity;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong><?=$getProduct->unit;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong><?=$getProduct->gross_weight;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->net_weight;?> </strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->scrap_weight;?></strong>
	  </div>
	  </div>
	
      <?php }?>

	  </div> 
	 <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Work In Progress</h4>
      </div>
	<div class="modal-body">
	  <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong>Date</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong>Finish Goods</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong>Unit</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Machine Name</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Shift</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Supervisor</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Operator</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Hours</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Act Hours</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Total Qty</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Completed</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Runner Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Lumps</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Rejection</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Stage</strong>
	  </div>
	  </div>
	  
	  
	  	  <?php 

	$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='$line->bill_of_material_id_hdr' ");
	
	foreach($wipLogQuery->result() as $liness){
	
	
	$machineQuery=$this->db->query("select *from tbl_machine where Machine_id='$liness->machine_id'");
	$getMachine=$machineQuery->row();
	
	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$liness->p_id'");
	$getproduct=$productQuery->row();
	$supervisorQuery=$this->db->query("select *from tbl_contact_m where contact_id='$liness->supervisor'");
	$getSupervisor=$supervisorQuery->row();
	
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
						?>
	    <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong><?=$getProductName->productname;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong><?=$getProduct->quentity;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong><?=$getProduct->unit;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong><?=$getProduct->gross_weight;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->net_weight;?> </strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->scrap_weight;?></strong>
	  </div>
	  </div>
	
      <?php }?>

	  </div>  
	  
    </div>
  </div>
</div>

	</div>
</div>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_bill_of_material_hdr^tbl_bill_of_material_dtl">  
<input type="text" style="display:none;" id="pri_col" value="bill_of_material_id_hdr^bill_of_material_hdr_id"> 	
</table>
</div>

<div class="col-md-6">
<h3>Defleshing List</h3>
<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

      

        <th>Lot. No</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
       	 <th>Status</th>
      
        
        

        

    </tr>

   
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by bill_of_material_id_hdr desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->bill_of_material_id_hdr; ?>">

  

   

                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo"> <?php echo $line->serial_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
                       
                       <td><?php 
												if($line->product_type=='finish_goods'){
										
										echo "Finish Goods"; }elseif($line->product_type=='row_material'){ echo "Row Material"; }
										elseif($line->product_type=='semi_finish_goods'){ echo "Semi Finish Goods";}
										else{}?></td>
                      <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					    <td><?php 
	
						echo $line->approval_status;
					   ?></td>
                        
</tr>
	<div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:931px;height:200px;; margin-left:-302px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">BOM Details</h4>
      </div>
      <div class="modal-body">
	  <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong>Row Material</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong>Unit</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong>Qty</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Gross Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Net Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Scrap Weight</strong>
	  </div>
	  </div>
	  
	  
	  	  <?php 
						$queryProduct=$this->db->query("select *from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$line->bill_of_material_id_hdr'");
						$i=1;
						foreach($queryProduct->result() as $getProduct){
						$productName=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->item_name'");
						$getProductName=$productName->row();
			
						?>
	    <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong><?=$getProductName->productname;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong><?=$getProduct->unit;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong><?=$getProduct->quentity;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong><?=$getProduct->gross_weight;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->net_weight;?> </strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->scrap_weight;?></strong>
	  </div>
	  </div>
	
      <?php }?>

	  </div>

	  
     
    </div>
  </div>
</div>

	</div>
</div>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_bill_of_material_hdr^tbl_bill_of_material_dtl">  
<input type="text" style="display:none;" id="pri_col" value="bill_of_material_id_hdr^bill_of_material_hdr_id"> 	
</table>
</div>
<div class="clear"></div>

<div class="col-md-6">
<h3>QA List</h3>
<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

      

        <th>Lot. No</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
       	 <th>Status</th>
      
        
        

        

    </tr>
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by bill_of_material_id_hdr desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->bill_of_material_id_hdr; ?>">


   

                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo"> <?php echo $line->serial_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
                       
                       <td><?php 
												if($line->product_type=='finish_goods'){
										
										echo "Finish Goods"; }elseif($line->product_type=='row_material'){ echo "Row Material"; }
										elseif($line->product_type=='semi_finish_goods'){ echo "Semi Finish Goods";}
										else{}?></td>
                      <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					    <td><?php 
	
						echo $line->approval_status;
					   ?></td>
                        
</tr>
	<div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:931px;height:200px;; margin-left:-302px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">BOM Details</h4>
      </div>
      <div class="modal-body">
	  <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong>Row Material</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong>Unit</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong>Qty</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Gross Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Net Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Scrap Weight</strong>
	  </div>
	  </div>
	  
	  
	  	  <?php 
						$queryProduct=$this->db->query("select *from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$line->bill_of_material_id_hdr'");
						$i=1;
						foreach($queryProduct->result() as $getProduct){
						$productName=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->item_name'");
						$getProductName=$productName->row();
			
						?>
	    <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong><?=$getProductName->productname;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong><?=$getProduct->unit;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong><?=$getProduct->quentity;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong><?=$getProduct->gross_weight;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->net_weight;?> </strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->scrap_weight;?></strong>
	  </div>
	  </div>
	
      <?php }?>

	  </div>

	  
     
    </div>
  </div>
</div>

	</div>
</div>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_bill_of_material_hdr^tbl_bill_of_material_dtl">  
<input type="text" style="display:none;" id="pri_col" value="bill_of_material_id_hdr^bill_of_material_hdr_id"> 	
</table>
</div>

<div class="col-md-6">
<h3>Packing List</h3>
<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

      
        <th>Lot. No</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
       	 <th>Status</th>
      
        
        

        

    </tr>

    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by bill_of_material_id_hdr desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->bill_of_material_id_hdr; ?>">


   

                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo"> <?php echo $line->serial_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
                       
                       <td><?php 
												if($line->product_type=='finish_goods'){
										
										echo "Finish Goods"; }elseif($line->product_type=='row_material'){ echo "Row Material"; }
										elseif($line->product_type=='semi_finish_goods'){ echo "Semi Finish Goods";}
										else{}?></td>
                      <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					    <td><?php 
	
						echo $line->approval_status;
					   ?></td>
                        
</tr>
	<div class="container">
	<div class="row">
		


<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:931px;height:200px;; margin-left:-302px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="exampleModalLabel">BOM Details</h4>
      </div>
      <div class="modal-body">
	  <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong>Row Material</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong>Unit</strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong>Qty</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Gross Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Net Weight</strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong>Scrap Weight</strong>
	  </div>
	  </div>
	  
	  
	  	  <?php 
						$queryProduct=$this->db->query("select *from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$line->bill_of_material_id_hdr'");
						$i=1;
						foreach($queryProduct->result() as $getProduct){
						$productName=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->item_name'");
						$getProductName=$productName->row();
			
						?>
	    <div  class="row">
	  <div class="col-lg-2" style="width:297px;">
	  <strong><?=$getProductName->productname;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;">
	  <strong><?=$getProduct->unit;?></strong>
	  </div>
	  <div class="col-lg-2" style="width:70px;" >
	 <strong><?=$getProduct->quentity;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong><?=$getProduct->gross_weight;?></strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->net_weight;?> </strong>
	  </div>
	   <div class="col-lg-2" style="width:150px;">
	 <strong> <?=$getProduct->scrap_weight;?></strong>
	  </div>
	  </div>
	
      <?php }?>

	  </div>

	  
     
    </div>
  </div>
</div>

	</div>
</div>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_bill_of_material_hdr^tbl_bill_of_material_dtl">  
<input type="text" style="display:none;" id="pri_col" value="bill_of_material_id_hdr^bill_of_material_hdr_id"> 	
</table>
</div>


</div><!--title close-->

<div class="container-right-text" >

</div><!--two-colum-->


</div><!--two-colum-->

<!--two-colum close-->


</div><!--paging-row close-->
<!--paging-row close-->







</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->

<div class="clear"></div><!--footer--row close-->
<?php //include('includes/footer.php') ?>

</div><!--wrapper close-->


<!--Scroll js-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dragscroll.js"></script>
<script>
		$(document).ready(function() { 
			$('#container').dragScroll({});
		});
	</script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--Scroll js close-->

<!--left-menu-js-->
<script src="<?php echo base_url();?>assets/js/menu-js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/menu-js/metisMenu.min.js"></script>

<script>
    $(function () {

        $('#menu').metisMenu();

        $('#menu2').metisMenu({
            toggle: false
        });

         $('#menu3').metisMenu({
            doubleTapToGo: true
        });
    });
</script>
<!--left-menu-js-close-->

 <!-- Page-Level Plugin Scripts - Tables -->

    <script src="<?php echo base_url();?>js/plugins/dataTables/jquery.dataTables.js"></script>

    <script src="<?php echo base_url();?>js/plugins/dataTables/dataTables.bootstrap.js"></script>



    <!-- SB Admin Scripts - Include with every page -->

    <script src="<?php echo base_url();?>js/sb-admin.js"></script>



    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script>

    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });

    $(document).ready(function() {
        $('#dataTables-example1').dataTable();
    });
    </script>

<script type="text/javascript">
   /* var theButton = document.getElementById('pursal');

    theButton.onclick = function() { 
        if(document.getElementById('divps').style.visibility='hidden'=true){
			document.getElementById('divps').style.visibility='visible';
		}else if(document.getElementById('divps').style.visibility='visible'=true){
			document.getElementById('divps').style.visibility='hidden';
		}   
    }*/

   function showhide(id)
     {
        var div = document.getElementById(id);
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "";
    }
     }


	 	 function hidealldiv(id1,id2,id3,id4)
     {
    var div1 = document.getElementById(id1);
    var div2 = document.getElementById(id2);
    var div3 = document.getElementById(id3);
	var div4 = document.getElementById(id4);
    if (div2.style.display !== "none" && div3.style.display !== "none" && div3.style.display !== "none" && div1.style.width != '100%') {
        div2.style.display = "none";
        div3.style.display = "none";
        div4.style.display = "none";
		
		
	  document.getElementById(id1).style.width = '100%';
    }
    else {
        div2.style.display = "block";
        div3.style.display = "block";
        div4.style.display = "block";
	  document.getElementById(id1).style.width = '47%';
    }
	 }




</script>

</body>
</html>

