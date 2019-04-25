<?php

error_reporting (E_ALL ^ E_NOTICE);
 
 $tableName="tbl_prodcatg_mst";
 $alias_idd;
if($alias_idd!=''){
  
  $engQuery=$this->db->query("select * from $tableName where alias='$alias_idd'");
 foreach($engQuery->result() as $custRow){

}
  
 if($custRow->alias==$alias_idd){
echo "Name Already exist";
} }

 $prodcatg_id; 
  if($prodcatg_id!=''){
 $engQueryy=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_name='$prodcatg_id'");
 foreach($engQueryy->result() as $custRoww){

  }  
 if($custRoww->prodcatg_name==$prodcatg_id){
echo "Name Already exist";
} }

 $alias_godowid; 
  if($alias_godowid!=''){
 $godowQueryy=$this->db->query("select * from tbl_godown_mst where alias='$alias_godowid'");
 foreach($godowQueryy->result() as $custGodow){

   }   
 if($custGodow->alias==$alias_godowid){
echo "Name Already exist";
} }

 $godown_id; 
  if($godown_id!=''){
 $godownameQueryy=$this->db->query("select * from tbl_godown_mst where godown_name='$godown_id'");
 foreach($godownameQueryy->result() as $custGodowname){

   }   
 if($custGodowname->godown_name==$godown_id){
echo "Name Already exist";
} }

 $taxationid; 
  if($taxationid!=''){
 $taxnameQueryy=$this->db->query("select * from tbl_taxation_mst where taxation_name='$taxationid'");
 foreach($taxnameQueryy->result() as $custTaxname){

   }   
 if($custTaxname->taxation_name==$taxationid){
echo "Name Already exist";
} }

 $unitid; 
  if($unitid!=''){
 $unitnameQueryy=$this->db->query("select * from tbl_unit where unit_name='$unitid'");
 foreach($unitnameQueryy->result() as $custUnitname){

   }   
 if($custUnitname->unit_name==$unitid){
echo "Name Already exist";
} }

 $mainid; 
  if($mainid!=''){
 $mainnameQueryy=$this->db->query("select * from tbl_unit_conversion where main_unit='$mainid'");
 foreach($mainnameQueryy->result() as $custmainname){

   }   
 if($custmainname->main_unit==$mainid){
echo "Name Already exist";
} }

 $accountid; 
  if($accountid!=''){
 $accountnameQueryy=$this->db->query("select * from tbl_account_mst where account_name='$accountid'");
 foreach($accountnameQueryy->result() as $custaccountname){

   }   
 if($custaccountname->account_name==$accountid){
echo "Name Already exist";
} }

$ac_alies_id;
 if($ac_alies_id!=''){
 $aliesNameQueryy=$this->db->query("select * from tbl_account_mst where alias='$ac_alies_id'");
 foreach($aliesNameQueryy->result() as $custaliesName){

   }   
 if($custaliesName->alias==$ac_alies_id){
echo "Name Already exist";
} }

$firstid;
 if($firstid!=''){
 $firstNameQueryy=$this->db->query("select * from tbl_contact_m where first_name='$firstid'");
 foreach($firstNameQueryy->result() as $custfirstName){

   }   
 if($custfirstName->first_name==$firstid){
echo "Name Already exist";
} }

$aliesnameid;
 if($aliesnameid!=''){
 $aliesNameQueryyy=$this->db->query("select * from tbl_contact_m where alias='$aliesnameid'");
 foreach($aliesNameQueryyy->result() as $custaliesNames){

   }   
 if($custaliesNames->alias==$aliesnameid){
echo "Name Already exist";
} }


$stformid;
 if($stformid!=''){
 $stformQuery=$this->db->query("select * from tbl_stform_mst where stform_name='$stformid'");
 foreach($stformQuery->result() as $custStform){

   }   
 if($custStform->stform_name==$stformid){
echo "Name Already exist";
} }



$saleid;
 if($saleid!=''){
 $saleTypeQuery=$this->db->query("select * from tbl_sale_type_master where sale_type='$saleid'");
 foreach($saleTypeQuery->result() as $custsaleType){

   }   
 if($custsaleType->sale_type==$saleid){
echo "Name Already exist";
} }

$purchaseid;
if($purchaseid!=''){
 $purchaseTypeQuery=$this->db->query("select * from tbl_sale_type_master where purchase_type='$purchaseid'");
 foreach($purchaseTypeQuery->result() as $custpurchaseType){

   }   
 if($custpurchaseType->purchase_type==$purchaseid){
echo "Name Already exist";
} }

$brockerid;
if($brockerid!=''){
 $brockerQuery=$this->db->query("select * from tbl_brocker_mst where brocker_name='$brockerid'");
 foreach($brockerQuery->result() as $cosebrockerName){

   }   
 if($cosebrockerName->brocker_name==$brockerid){
echo "Name Already exist";
} }

$alias_brocker_id;
if($alias_brocker_id!=''){
 $aliasBrockerQuery=$this->db->query("select * from tbl_brocker_mst where alias_name='$alias_brocker_id'");
 foreach($aliasBrockerQuery->result() as $custAliesBrocker){

   }   
 if($custAliesBrocker->alias_name==$alias_brocker_id){
echo "Name Already exist";
} }

$billid;
if($billid!=''){
 $billQuery=$this->db->query("select * from tbl_bill_sundry where bill_name='$billid'");
 foreach($billQuery->result() as $custbill){

   }   
 if($custbill->bill_name==$billid){
echo "Name Already exist";
} }


$alias_bill_id;
if($alias_bill_id!=''){
 $aliasBillQuery=$this->db->query("select * from tbl_bill_sundry where alias_name='$alias_bill_id'");
 foreach($aliasBillQuery->result() as $custAliesBill){

   }   
 if($custAliesBill->alias_name==$alias_bill_id){
echo "Name Already exist";
} }
?>