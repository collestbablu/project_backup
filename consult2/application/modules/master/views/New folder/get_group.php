<?php

 
  //$tableName="tbl_city_m";

  $group=$_GET['group']; 
  //$con=$_GET['con'];

  //primary ref id 
  

  ?>

  <Select class="rounded" id="url" name="maingroupname" required >

  <?php

  
if($group=='gledger' or $group=='sledger' ){ @$engQuery=$this->db->query("SELECT act.account_name as gname, act.account_id as gid FROM tbl_contact_m ct, tbl_account_mst act ");}else{
  @$engQuery=$this->db->query("SELECT act.account_name as gname, act.account_id as gid FROM tbl_contact_m ct, tbl_account_mst act where ct.contact_id ='$group' and act.account_id=ct.group_name");
  }
  foreach(@$engQuery->result() as $custRow){

  

  ?>

  

  

  <option value="<?php echo @$custRow->gid; ?>"><?php echo @$custRow->gname; ?></option>

  <?php } ?>
<option value="">--select--</option>
  </Select>

  