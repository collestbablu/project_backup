<?php


 $contact_id=$main_menu;

$query=$this->db->query("select * from tbl_contact_m where contact_id='$contact_id'");
$fetch=$query->row();
$codename=$fetch->code_name;
 //$lastid=1;
 $sumlastid=1;
$querycase=$this->db->query("select * from tbl_new_case where status='A' and vendor_id='$contact_id'");
foreach($querycase->result() as $fetchcase){ 

 $pp=$fetchcase->case_id;

}
 $var =$pp;

$var = str_pad(++$var,1,'0',STR_PAD_LEFT);
//echo "$var<br />";
if($fetchcase->new_case_id!=''){
	 $var;
 }else{
	$number =1; 
 }

$numbercase = sprintf('%04d',$number);
$total=$codename."/".$numbercase;
?>
 	
 <input type="text" name="case_id" value="<?php if($fetchcase->new_case_id!=''){ echo $var; }else{ echo $total; } ?>" required />
