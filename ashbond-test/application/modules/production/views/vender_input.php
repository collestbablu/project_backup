<?php 
$test = $_POST['test'];
$val = $_POST['val'];

?>
<td>
<?php
if($test!=''){

for($i=0;$i<=$test-1;$i++){
$contat_nam11 =$this->db->query("select * from cybercodex_contact_m where group_name=3 and contact_id='$val[$i]'");
$contat_n1=$contat_nam11->row();
?>
<input type="hidden" name="vender_input[]" id="" value="<?php echo $val[$i];?>" class="col-xs-2" />
<input type="text" name="" id="" value="<?php echo $contat_n1->first_name;?>" class="col-xs-2" />
<?php 

}

}

?>
</td>