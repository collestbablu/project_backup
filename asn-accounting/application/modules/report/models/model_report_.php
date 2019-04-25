<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class model_report extends CI_Model {

function getSearchSalary($emp,$loc,$f_date,$t_date,$range) {

//---------------------Duration Search-----------------

//--------------------------first & last day of last month----------------
$date = new DateTime();
$date->sub(new DateInterval('P1M'));
$dt = $date->format('Y-m');
$first = $dt . '-01';
$last = $dt . date("-t", (strtotime('last day of last month')));
//echo $first.' '.$last;

//----------first & last day of last week----------
$previous_week = strtotime("-1 week +1 day");

$start_week = strtotime("last sunday midnight",$previous_week);
$end_week = strtotime("next saturday",$start_week);

$start_week = date("Y-m-d",$start_week);
$end_week = date("Y-m-d",$end_week);
//echo $start_week.' '.$end_week ;

//----------first & last day of last year---------
$year = date('Y') - 1; // Get current year and subtract 1
$starty = "{$year}-01-01";
$endy = "{$year}-12-31";
//echo $starty.' '.$endy;

//--------------------first & last day of quarter-----------

$curMonth = date("m", time());
$curQuarter = ceil($curMonth/3);
//$curQuarter=4;
if($curQuarter != 1)
{
 $curQuarter=$curQuarter-1;
}
if($curQuarter==1)
{
$year = new DateTime('first day of January   ');
$firstday=$year->format('Y-m-d');
$year1 = new DateTime('first day of March   ');
$lastday=$year1->format('Y-m-t');
}
else if($curQuarter==2)
{
$year = new DateTime('first day of April  ');
$firstday=$year->format('Y-m-d');
$year1 = new DateTime('first day of June  ');
$lastday=$year1->format('Y-m-t');
}
else if($curQuarter==3)
{
$year = new DateTime('first day of July ');
$firstday=$year->format('Y-m-d');
$year1 = new DateTime('first day of September   ');
$lastday=$year1->format('Y-m-t');
}
else if($curQuarter==4)
{
$year = new DateTime('first day of October');
$firstday=$year->format('Y-m-d');
$year1 = new DateTime('first day of December');
$lastday=$year1->format('Y-m-t');
}

//------------------------------------end-------------------------

$crdate = date('Y-m-d');

$fdw= date("Y-m-d", strtotime('monday  this week'));
//$end_date = date("Y-m-d", strtotime('this sunday'));
 

$d = new DateTime('first day of this month');
$fdm=$d->format('Y-m-d');

$year = new DateTime('first day of January ');
$fdy=$year->format('Y-m-d');

$curMonth = date("m", time());
$curQuarter = ceil($curMonth/3);
//$curQuarter =4;
if($curQuarter==1)
{
$year = new DateTime('first day of January   ');
$fdq=$year->format('Y-m-d');
}
else if($curQuarter==2)
{
$year = new DateTime('first day of April  ');
$fdq=$year->format('Y-m-d');
}
else if($curQuarter==3)
{
$year = new DateTime('first day of July ');
$fdq=$year->format('Y-m-d');
}
else if($curQuarter==4)
{
$year = new DateTime('first day of October');
$fdq=$year->format('Y-m-d');
}

if($range == 1)
{
 $fdate=$crdate;
 $idate= $fdw;
}
else if($range == 2)
{
 $fdate=$crdate;
 $idate= $fdm;
}
else if($range == 3)
{
 $fdate=$crdate;
 $idate= $fdq;
}
else if($range == 4)
{
 $fdate=$crdate;
 $idate= $fdy;
}
else if($range == 5)
{
 $fdate=$end_week;
 $idate= $start_week;
 //echo $start_week.' '.$end_week ;
}
else if($range == 6)
{
 $fdate=$last;
 $idate= $first;
//echo $first.' '.$last;
}
else if($range == 7)
{
 $fdate=$lastday;
 $idate= $firstday;
//echo $firstday.' '. $lastday; 
}
else if($range == 8)
{
 $fdate=$endy;
 $idate= $starty;
//echo $starty.' '.$endy;
}
 
//-----------------------End Duration Search------------
	
    $select_query = "Select * from tbl_salary where status='A'";
    if($emp!='')
		{			
			$sql1 = $this->db->query("select * from tbl_contact_m where first_name like '$emp%' ");
			$sql2 = $sql1->row();
			$select_query.=" and contact_id ='$sql2->contact_id'";	  
		}
	    if($range!='')
		{			
				$select_query.=" and maker_date <='$fdate' and maker_date>='$idate'";	  
		}

		if($loc!='')
		{				
		
			$select_query.=" and loc_id  = '$loc'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
	
	$query = $this->db->query($select_query);
    return $query->result();
}

function getSearchInvoice($inv_no,$cust_name,$f_date,$t_date,$range) {

 $fdate=date("Y-m-d");
 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));
	
    $select_query = "Select * from tbl_invoice_hdr where status='A'";
    if($inv_no!='')
		{			
				$select_query.=" and invoiceid ='$inv_no'";	  
		}
	    if($range!='')
		{			
				$select_query.=" and invoice_date <='$fdate' and invoice_date>='$idate'";	  
		}

		if($cust_name!='')
		{				
			$sql1 = $this->db->query("select * from tbl_contact_m where first_name like '$cust_name%' ");
			$sql2 = $sql1->row();
			$select_query.=" and vendor_id  = '$sql2->contact_id'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and invoice_date >='$fdate1' and invoice_date <='$todate1'";
		}
	
	$query = $this->db->query($select_query);
    return $query->result();
}


function getSearchPickup($p_name,$f_date,$t_date,$range) {

 $fdate=date("Y-m-d");
 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));

    $select_query = "Select * from tbl_pick_up where status='A'";
	
    	if($p_name!='')
		{			
			$sql1 = $this->db->query("select * from tbl_contact_m where group_name='4' and first_name like '$p_name%' ");
			$sql2 = $sql1->row();	
			$select_query.=" and contact_id ='$sql2->contact_id'";	  
		}
		if($range!='')
		{			
				$select_query.=" and date <='$fdate' and date>='$idate'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date >='$fdate1' and date <='$todate1'";
		}
		
	$query = $this->db->query($select_query);
    return $query->result();
}

function getSearchPickupCost($p_name,$f_date,$t_date,$range) {

 $fdate=date("Y-m-d");
 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));

    $select_query = "Select * from tbl_pick_up where status='A'";
	
    	if($p_name!='')
		{			
			$sql1 = $this->db->query("select * from tbl_contact_m where group_name='4' and first_name like '$p_name%' ");
			$sql2 = $sql1->row();	
			$select_query.=" and contact_id ='$sql2->contact_id'";	  
		}
		if($range!='')
		{			
				$select_query.=" and date <='$fdate' and date>='$idate'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date >='$fdate1' and date <='$todate1'";
		}
		
	$query = $this->db->query($select_query);
    return $query->result();
}


function getSearchExpense($pers_name,$exp_account,$exp_type,$paidto,$f_date,$t_date,$range) {

 $fdate=date("Y-m-d");
 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));

    $select_query = "Select * from tbl_expense where status='A'";
	
	 if($pers_name!='')
		{			
			$select_query.=" and contact_id ='$pers_name'";	  
		}
	 if($exp_account!='')
		{			
			$select_query.=" and exp_account ='$exp_account'";	  
		}
		if($exp_type!='')
		{			
			$select_query.=" and exp_type ='$exp_type'";	  
		}
		if($paidto!='')
		{			
			$select_query.=" and paidTo ='$paidto'";	  
		}
			
			if($range!='')
		{			
				$select_query.=" and date <='$fdate' and date>='$idate'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date >='$fdate1' and date <='$todate1'";
		}
	
   
	$query = $this->db->query($select_query);
    return $query->result();
}


function getSearchRental($r_name,$loc,$f_date,$t_date,$range) {

 	 $fdate=date("Y-m-d");
	 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));

    $select_query = "Select * from tbl_rentale where status='A'";
	
	 if($r_name!='')
		{			
			$sql1 = $this->db->query("select * from tbl_contact_m where group_name='8' and first_name like '$r_name%' ");
			$sql2 = $sql1->row();	
			$select_query.=" and rentale_id ='$sql2->contact_id'";	  
		}	
		 if($loc!='')
		{			
			$paymentQuery=$this->db->query("select *from tbl_master_data  where keyvalue like '$loc%'");
			$getPayment=$paymentQuery->row();
			$select_query.=" and loc_id ='$getPayment->serial_number'";	  
		}	
		if($range!='')
		{			
				$select_query.=" and date <='$fdate' and date>='$idate'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date >='$fdate1' and date <='$todate1'";
		}
	
	$query = $this->db->query($select_query);
    return $query->result();
}

function getSearchBooking($c_no,$c_name,$f_date,$t_date,$range) {

 	 $fdate=date("Y-m-d");
	 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));

    $select_query = "Select * from tbl_bookong_order_hdr where status='A'";
	
	 if($c_no!='')
		{
			$select_query.=" and cd_no ='$c_no'";	  
		}	
		 if($c_name!='')
		{			
			$sql1 = $this->db->query("select * from tbl_contact_m where  first_name like '$c_name%' ");
			$sql2 = $sql1->row();
			$select_query.=" and consigner ='$sql2->contact_id'";	  
		}	
		if($range!='')
		{			
				$select_query.=" and date_of_booking <='$fdate' and date_of_booking>='$idate'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date_of_booking >='$fdate1' and date_of_booking <='$todate1'";
		}
	
	$query = $this->db->query($select_query);
    return $query->result();
}


function getDelivery($v_name,$range,$f_date,$t_date) {

 $fdate=date("Y-m-d");
 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));
 
    $select_query = "Select * from tbl_delivery where status='A'";
	
	 if($v_name!='')
		{			
			$sql1 = $this->db->query("select * from tbl_contact_m where group_name='5' and first_name like '$v_name%' ");
			$sql2 = $sql1->row();	
			$select_query.=" and contact_id ='$sql2->contact_id'";	  
		}	
			if($range!='')
		{			
				$select_query.=" and date <='$fdate' and date>='$idate'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date >='$fdate1' and date <='$todate1'";
		}
	
	$query = $this->db->query($select_query);
    return $query->result();
}


function getBranchDelivery($branch,$range,$f_date,$t_date) {

 $fdate=date("Y-m-d");
 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));
 
    $select_query = "Select * from tbl_branch_delivery where status='A'";
	
	 if($branch!='')
		{			
			//$sql1 = $this->db->query("select * from tbl_master_data where first_name = '$branch' ");
			//$sql2 = $sql1->row();	
			$select_query.=" and branch ='$branch'";	  
		}	
		if($range!='')
		{			
				$select_query.=" and date <='$fdate' and date>='$idate'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date >='$fdate1' and date <='$todate1'";
		}
	
	$query = $this->db->query($select_query);
    return $query->result();
}

function getBranchDeliveryCost($branch,$range,$f_date,$t_date) {

 $fdate=date("Y-m-d");
 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));
 
    $select_query = "Select * from tbl_branch_delivery where status='A'";
	
	 if($branch!='')
		{			
			//$sql1 = $this->db->query("select * from tbl_contact_m where group_name='5' and first_name like '$v_name%' ");
			//$sql2 = $sql1->row();	
			$select_query.=" and branch ='$branch'";	  
		}	
		if($range!='')
		{			
				$select_query.=" and date <='$fdate' and date>='$idate'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date >='$fdate1' and date <='$todate1'";
		}
	
	$query = $this->db->query($select_query);
    return $query->result();
}

function getDeliveryCost($v_name,$range,$f_date,$t_date) {

 $fdate=date("Y-m-d");
 $idate= date('Y-m-d', strtotime($fdate. " - $range days"));
 
    $select_query = "Select * from tbl_delivery where status='A'";
	
	 if($v_name!='')
		{			
			$sql1 = $this->db->query("select * from tbl_contact_m where group_name='5' and first_name like '$v_name%' ");
			$sql2 = $sql1->row();	
			$select_query.=" and contact_id ='$sql2->contact_id'";	  
		}	
			if($range!='')
		{			
				$select_query.=" and date <='$fdate' and date>='$idate'";	  
		}
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query.="and date >='$fdate1' and date <='$todate1'";
		}
	
	$query = $this->db->query($select_query);
    return $query->result();
}


function getSearchContact($p_name,$groupname) {
	
	$select_query = "Select * from tbl_contact_m where status='A'";
	
		if($p_name!='')
		{			
			$select_query.=" and first_name  like '$p_name%'";	  
		}
		
		if($groupname!='')
		{			
		$sql1 = $this->db->query("select * from tbl_account_mst where account_id='$groupname' ");
			$sql3 = $sql1->row();	
			$select_query.=" and group_name  = '$sql3->account_id'";	  
		}

	$query = $this->db->query($select_query);
    return $query->result();
}


function getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date,$g_total) {
	if($p_no!='' || $v_name!='' || $f_date!='' || $t_date!='' || $g_total!=''){
//	echo $g_total;die;
   $select_query = "Select * from tbl_purchase_order_hdr";
		if($p_no!='')
		{				
			$select_query.=" where purchaseorderid  = '$p_no'";	  
		}
		
		if($v_name!='')
		{				
			$select_query.=" and vendor_id  = '$v_name'";	  
		}
		
		if($g_total!='')
		{				
			$select_query.=" and grand_total  = '$g_total'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy .="and invoice_date >='$fdate1' and invoice_date <='$todate1'";
		}
    	}else{
	$select_query = "Select * from tbl_purchase_order_hdr";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}

function getSearchSaleOrder($p_no,$v_name,$f_date,$t_date,$g_total) {
	if($p_no!='' || $v_name!='' || $f_date!='' || $t_date!='' || $g_total!=''){
//	echo $g_total;die;
   $select_query = "Select * from tbl_invoice_hdr";
		if($p_no!='')
		{				
			$select_query.=" where salesid  = '$p_no'";	  
		}
		
		if($v_name!='')
		{				
			$select_query.=" and vendor_id  = '$v_name'";	  
		}
		
		if($g_total!='')
		{				
			$select_query.=" and grand_total  = '$g_total'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy .="and invoice_date >='$fdate1' and invoice_date <='$todate1'";
		}
    }else{
			$select_query = "Select * from tbl_invoice_hdr";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}
}
?>