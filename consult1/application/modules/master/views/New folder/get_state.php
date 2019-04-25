<?php
$tableName="tbl_state_m";
$country=$_GET['country'];
  
   
  //primary ref id 

  ?>

  <Select class="rounded" id="url" name="state" onchange="getCity(this.value)" required >

    <option value="">--Select--</option>

  <?php

  

  @$engQuery=$this->db->query("select * from $tableName where countryid = '$country'");

foreach(@$engQuery->result() as $custRow)

 {

  

  ?>

  

  

  <option value="<?php echo @$custRow->stateid; ?>"><?php echo @$custRow->stateName; ?></option>

  <?php } ?>

  </Select>

  