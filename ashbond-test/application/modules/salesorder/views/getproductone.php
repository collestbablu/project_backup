<?php


 $contactid=$main_menu;
 
 $con2=explode("^",$contactid);
 $contact_id=$con2[0];
 $caseid=$con2[1];
  $serid=$con2[2];
 
$query=$this->db->query("select * from tbl_contact_m where contact_id='$contact_id'");
$fetch=$query->row();

$caseQuery=$this->db->query("select * from tbl_sales_order_hdr where status='A'  order by salesid DESC");
$fetchCase=$caseQuery->row();
$caseidd=$fetchCase->salesid;
 $ddd=$fetchCase->refno;
$sadj=explode("/",$ddd);

 $ss=$sadj[5];

$year=date("y");
$nextyear=date('y', strtotime('+1 year'));
$totalyear=$year."-".$nextyear;
if($fetch->group_name==3){
  $var = str_pad(++$ss,1,'0',STR_PAD_LEFT);
 $numbercase = sprintf('%04d',$var);
 
 $das=$fetch->code_name;
 $case=$caseid;
 $con2=explode("/",$case);
 $mm=$con2[0];
  $mkk=$numbercase;
 $comnum=$serid."/";
}else{
	
 $das=$fetch->first_name;	
$case=$caseid;

 $var = str_pad(++$ss,1,'0',STR_PAD_LEFT);
 $numbercase = sprintf('%04d',$var);
 $comp=$serid."/";
$mkk=$numbercase;
}
 
 //$number = $case;
//$numbercase = sprintf('%04d',$number);
?>
 	
 <input type="hidden" id="caseiddd" value="<?php echo $mkk; ?>" />
<input type="text" name="refno"  value="AEPL/<?php echo $case; ?>/<?php echo $totalyear; ?>/<?php if($fetch->group_name==3){ echo $comnum; }else{ echo $comp; } ?>" readonly style="width: 85%;float: left;border: none;"/><input type="text" name="communication_name" style="width: 12%;margin: 0 0 0 10px; border: none;" id="commid" onkeyup="communication_fun()"  value="<?php echo $mkk; ?>" />
