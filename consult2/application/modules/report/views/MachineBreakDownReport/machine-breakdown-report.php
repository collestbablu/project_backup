<?php
$tableName="tbl_machine_breakdown";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to CRM</title>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>

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
<script>
function popupclose(){
window.close();
}
</script>
</head>
<body>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"> 
<?php $this->load->view('sidebar'); ?>
<div class="container-left"><!--left-menu close-->
</div><!--container-left close-->
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>Machine BreakDown Report</h1> 
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

<form method="get">
<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Search Machine BreakDown Report </b></th>        
</tr>
</thead>

<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>


     <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded"  value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
 
</tr>
<tr>
 <td class="text-r">&nbsp;</td>
	<td>&nbsp;</td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>

<a href="print_machine_performance_report<?php echo $_SERVER['REQUEST_URI'];?>" target="_blank" class="submit" style="display:none"><strong>Print</strong></a>&nbsp; <a href="export_machine_performance_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit" style="display:none"><strong>Export</strong></a>

<div class="table-row">
<table class="bordered"id="dataTables-example">
    
<thead>
    <tr>

        <th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>        

        <th>Serial No. </th>
	    <th>Machine Name</th>
	  	<th>Date</th>
		<th>Machine Breakdown Name</th>
		<th style="display:none;">Hours</th>
        <th>Action</th>

		

    </tr>
    </thead>

<?php

@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from $tableName where status='A' ";
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			 $queryy  = $queryy . "and machine_date >='$fdate1' and machine_date <='$todate1' "; 
		}		  
		 
		 $queryy  = $queryy . "group by machine_date";
		 
		}
if($Search==''){
		  $queryy="select * from $tableName  group by machine_date";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){

	

?>
<tr class="record" data-row-id="<?php echo $line->m_id; ?>">
   <td style="display:none">
   <input name="cid[]" class="sub_chk" type="checkbox" id="cid[]" data-id="<?php echo $line->m_id; ?>" value="<?php echo $line->m_id; ?>"  />
   </td>
    <td><?php 
      $sqlgroup1=$this->db->query("select M.machinename,T.mb_id from tbl_machine M,tbl_machine_breakdown T where T.machine_date='$line->machine_date' AND M.machine_id = T.Machine_id limit 0,2");
		$res1 = $sqlgroup1->result_array();


    //echo $res1[0]['mb_id'].', '.$res1[1]['mb_id'].'......';
	echo $i;?></td>
	<td>
	<?php
	
		  echo 	$res1[0]['machinename'].', '.$res1[1]['machinename'].'......';
		
	?>
	 <?php //echo $res1->machinename;?>
		
	</td>
	<td><?php echo $line->machine_date;?></td>
	<td>
	<?php
	
	$replaceval = str_replace('^', ',', $line->m_b_d_name);
	
	$sqlgroup=$this->db->query("select * from tbl_master_data where serial_number IN ($replaceval) limit 0,2");
	$res1 = $sqlgroup->result_array();
	?>
	<?php echo $res1[0]['keyvalue'].', '.$res1[1]['keyvalue'].'......';?></td>

    <td style="display:none;"><?php echo round($line->hours/60,2);?>&nbsp;Hours</td>
    <td>
   <?php if($view!=''){ ?>
     <img src="<?php echo base_url();?>/assets/images/view.png" onClick="openpopup('view_machine_breakdown',1900,1400,'view','<?php echo $line->machine_date ;?>')"  alt="" border="0" class="icon" title="View" />
   <?php } ?>
    </td>
    </tr>


<?php
$i++;
 } ?>
</table>
</form>
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</div><!--paging-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
<div class="clear"></div><!--footer--row close-->
</div><!--wrapper close-->

    <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>/assets/js/sb-admin.js"></script>
    <script>

    $(document).ready(function() {

        $('#dataTables-example').dataTable();

    });

    </script>

</body>
</html>