<?php


 $contactid=$main_menu;
 
 $con2=explode("^",$contactid);
 $contact_id=$con2[0];
 $caseid=$con2[1];
 
$query=$this->db->query("select * from tbl_contact_m where contact_id='$contact_id'");
$fetch=$query->row();
 $dassss=$fetch->code_name;
$caseQuery=$this->db->query("select * from tbl_communication where status='A' and communication_type!='SaleOrder' order by communication_id DESC");
$fetchCase=$caseQuery->row();
$caseidd=$fetchCase->id;
 $ddd=$fetchCase->refno;
$sadj=explode("/",$ddd);

 $ss=$sadj[5];

$year=date("y");
$nextyear=date('y', strtotime('+1 year'));
$totalyear=$year."-".$nextyear;
if($fetch->group_name==3){
  $var = str_pad(++$ss,1,'0',STR_PAD_LEFT);
 $numbercase = sprintf('%04d',$var);
 

 $case=$caseid;
 $con2=explode("/",$case);
 $mm=$con2[0];
  $mkk=$numbercase;
 $comnum=$mm."/";
}else{
	
 $das=$fetch->first_name;	
$case=$caseid;

 $var = str_pad(++$ss,1,'0',STR_PAD_LEFT);
 $numbercase = sprintf('%04d',$var);
 $comp=$das."/";
$mkk=$numbercase;
}
 
 //$number = $case;
//$numbercase = sprintf('%04d',$number);
?>
 	
 <input type="hidden" id="caseiddd" value="<?php echo $mkk; ?>" />
<input type="text" name="refno"  value="AEPL/<?php echo $case; ?>/<?php echo $totalyear; ?>/<?php echo $dassss; ?>/" readonly style="width: 85%;float: left;border: none;"/><input type="text" name="communication_name" style="width: 12%;margin: 0 0 0 10px; border: none;" id="commid" onkeyup="communication_fun()"  value="<?php echo $mkk; ?>" />
