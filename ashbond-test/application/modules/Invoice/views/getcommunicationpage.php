<?php


  $contactid=$comm;
 $con2=explode("^",$contactid);
 $contact_id=$con2[0];
  $commnicatonid=$con2[1];
  $numbercase = sprintf('%0d',$commnicatonid);
 
 if($numbercase==0){
 }else{
 if($contact_id<=$commnicatonid){
 
 }else{
 ?>
Communication Id Aready Exits.
 <?php } } ?> 