<?php $tableName='tbl_bill_of_material_hdr';
$idd=explode('^',$_GET['id']);
$id=$idd[0];
$grossWeightQueryHdr=$this->db->query("select * from tbl_bill_of_material_hdr where serial_no='$id'");
$getgrossWeightHdr=$grossWeightQueryHdr->row();
/*
$grossWeightQuery=$this->db->query("select * from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$getgrossWeightHdr->bill_of_material_id_hdr'");
foreach($grossWeightQuery->result() as $getNetWeight)
{

$totWeight=$totWeight+$getNetWeight->net_weight;
}
*/
$grossWeightQuery=$this->db->query("select * from tbl_template_dtl where product_name='$getgrossWeightHdr->product_name'");
foreach($grossWeightQuery->result() as $getNetWeight)
{

  $totWeight=$totWeight+$getNetWeight->net_weight;
}

?>
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
 
<?php //$this->load->view('sidebar');?>

<div class="container-left"><!--left-menu close-->

</div><!--container-left close-->

<div id="b2" class="right-colum" style="width:95%; margin:0 0 0 30px;">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>
<?php echo $idd[1];?> List
</h1>
<!--
<div class="search-row-to">
<div class="search-row-l"><input type="text" readonly="readonly" placeholder="Search here..." required=""></div>
<div class="search-row-r"><button type="submit">Go</button>
</div>
</div><!--search-row-to close-->

</div>

<div class="row">
<div class="col-sm-12">
<h3><?php echo $idd[1];?> List</h3>
<table class="bordered" id="dataTables-example">
<thead>
<tr>
  <th>Finish Goods</th>
        <th>Date</th>
		<th>Unit</th>
        <th>Machine Name</th>
		 <th>Shift</th>
       	 <th>Supervisor</th>
		  <th>Operator</th>
		   <th>Hours</th>
		     <th>Act Hours</th>
			<th>Total Qty</th>
			
			  <th>Completed</th>
			  <?php
			 
			  if($idd[1]=='Production' || $idd[1]=='Moulding'){
			  
			  ?>
			  <th>Runner Weight </th>
			  <th>Lumbs Weight </th>
			  <?php }?>
			  <th>Rejection </th>
			  <?php
			   if($idd[1]=='Production' || $idd[1]=='Moulding'){
			  ?>
			  <th>Raw material consume </th>
			  <?php }?>
			  <th>Stage </th>
			  
    
	  	 
</tr>
</thead>
<tbody>

<?php
if($idd[1]=='Production'){
$detailsQuery=$this->db->query("select *from tbl_production_log where lot_no='$id'"); 
}
if($idd[1]=='Moulding'){
$detailsQuery=$this->db->query("select *from tbl_production_log where lot_no='$id' and stage='Moulding'"); 
}

if($idd[1]=='Defleshing'){
$detailsQuery=$this->db->query("select *from tbl_production_log where lot_no='$id' and stage='Defleshing'"); 
}

if($idd[1]=='QA'){
$detailsQuery=$this->db->query("select *from tbl_production_log where lot_no='$id' and stage='QA'"); 
}


if($idd[1]=='Packing'){
$detailsQuery=$this->db->query("select *from tbl_production_log where lot_no='$id' and stage='Packing'"); 
}
foreach($detailsQuery->result() as $getData)
{
$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$getData->p_id'");
	$getproduct=$productQuery->row();
	$supervisorQuery=$this->db->query("select *from tbl_contact_m where contact_id='$getData->supervisor'");
	$getSupervisor=$supervisorQuery->row();
	$machineQuery=$this->db->query("select *from tbl_machine where Machine_id='$getData->machine_id'");
	$getMachine=$machineQuery->row();
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
?>
  <tr class="record" data-row-id="<?php echo $line->wip_hdr_id; ?>">

  

   

                       <td><?=$getproduct->productname;?></td>

					   <td><?=$getData->date;?></td>
					  <td><?=$getunit->keyvalue;?></td>
                       <td><?php echo $getMachine->machinename; ?></td>
					   <td><?php echo $getData->shift; ?></td>
					   <td><?php echo $getSupervisor->first_name;?></td>
					  
					    <td><?php
						
	 @$dataID=$getData->operator;
	 if($getData->operator!='')
						{
	//print_r($dataID);
	$operatorQuery=$this->db->query("select *from tbl_contact_m where  contact_id in ($dataID)");
	foreach ($operatorQuery->result() as $getOperator){
	?>
	
	<?php echo @$getOperator->first_name;?>
	<?php } }else {}?>
	
	</td>
					    <td><?=$getData->hours;?></td>
						<td><?=$getData->act_hour;?></td>
						<td><?=$getData->quantity;?></td>
						<td><?php echo $compl=$getData->quantity-$getData->rejection_qty; ?></td>
				<?php
			  if($idd[1]=='Production' || $idd[1]=='Moulding'){
			  ?>
						<td><?=$getData->scrap;?></td>
						<td><?=$getData->lumbs;?></td>
				<?php }?>
						<td><?php echo $reg=$getData->rejection_qty; ?></td>
				<?php
			  if($idd[1]=='Production' || $idd[1]=='Moulding'){
			  ?>
						<td><?php if($getData->stage=='Moulding'){?><?php //echo $compl*$totWeight/1000;
						
						echo $conTot=$getData->quantity*$totWeight+$getData->scrap+$getData->lumbs;
						//echo $totWeight; ?><?php }?></td>
				<?php }?>
						<td><?=$getData->stage;?></td>
						
						
						
						
		</tr>
		
	<?php
	if($getData->stage=='Moulding')
	{
	//$totalCom=$totalCom+$compl*$totWeight/1000;
	$totalCom=$totalCom+$conTot;
	}
	 } ?>
	 <?php
	 if($idd[1]=='Production' || $idd[1]=='Moulding'){
			  //if($idd[1]!='Defleshing' or $idd[1]!='QA' or $idd[1]!='Packing') {
			  ?>
<tr>

               <td>&nbsp;</td>

					   <td>&nbsp;</td>
					  <td>&nbsp;</td>
                       <td>&nbsp;</td>
					   <td>&nbsp;</td>
					   <td>&nbsp;</td>
					  
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
						<td>&nbsp;</td>
						
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><strong>Total</strong></td>
						<td><?=$totalCom;?></td>
						<td>&nbsp;</td>
						
						

</tr>



<?php }?>



</tbody>
</table>

</div>
</div><!--row close-->

<!--row close-->

<div class="clear"></div>

<!--row close-->



</div><!--title close-->

<div class="container-right-text" >

</div><!--two-colum-->


</div><!--two-colum-->
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

