<?php

 
  $tableName="tbl_city_m";

  $state=$_GET['state'];
  //$con=$_GET['con'];

  //primary ref id 

  ?>

  <Select class="rounded" id="url" name="City" required onChange="getCitya(this.value)">

<?php
if($con!='' and $state!='')
{
echo "hi";
}
?>

    <option value="">--Select--</option>

  <?php

  

  $engQuery=$this->db->query("select * from $tableName where stateid ='$state'");
  
  foreach($engQuery->result() as $custRow){

  

  ?>

  

  

  <option value="<?php echo $custRow->cityid; ?>"><?php echo $custRow->city_name; ?></option>

  <?php } ?>

  </Select>

  