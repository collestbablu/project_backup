<?php
$tableName='tbl_product_stock';
$location='manage_production';
$this->load->view('softwareheader'); 
?>

<h1>VIEW QA</h1>

<form  id="form1" method="post">

<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 { 

 if(@$_GET['id']==''){?>

 <td></td>



	  <?php }else {?>

      <td>  </td>



	   <?php } }?>



<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">

<table class="bordered">

<thead>



<tr>

<th colspan="6">VIEW QA</th>        
</tr>
</thead>

<tr>

<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_wip_hdr where status='A' and wip_hdr_id='".$_GET['id']."' or wip_hdr_id='".$_GET['view']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!='' ){
 


  ?>         


<input type="hidden" name="Productss_id" class="span6 "value="<?php echo $branchFetch->wip_hdr_id;?>" readonly size="22" aria-required='true' />

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by wip_hdr_id desc limit 0,1");
$row = $query->row();

}
?>

<td class="text-r"><star>*</star>Product Type:</td>  
<td><select name="product_type"    <?php if(@$_GET['id']!=''){ ?> disabled="disabled" <?php }?> required>
              <option value="">----Select ----</option>
              <option value="finish_goods"<?php  if($branchFetch->product_type=='finish_goods'){ ?> selected <?php } ?>>Finish Goods</option>
             
            </select>
 </td>
<td class="text-r"><star>*</star>
 Product Name:</td>     
       
	<td><select name="product_name" <?php if(@$_GET['id']!=''){ ?> disabled="disabled" <?php }?> required>
					<option value="">----Select----</option>
				<?php 
							
							$Query=$this->db->query("select * from tbl_product_stock ");
							foreach($Query->result() as $fetchQ){

					?>
				<option value="<?php echo $fetchQ->sku_no; ?>" <?php if($branchFetch->product_name==$fetchQ->sku_no){ ?> selected="selected"<?php }?> /><?php  echo $fetchQ->productname;  ?></option>
					<?php } ?>
			</select>
		</td>

<td class="text-r"><star>*</star>
Lot No:</td> 			
<td><input type="number" name="lot_no" value="<?php echo $branchFetch->lot_no; ?>" readonly required/></td>	
</tr>        
<tr>
<td class="text-r"><star>*</star>
Machine Name:</td> 			
<td><select name="machine_name" <?php if(@$_GET['id']!=''){ ?> disabled="disabled" <?php }?> required>
					<option value="">----Select----</option>
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_machine");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->Machine_id; ?>" <?php if($branchFetch->machine_name==$fetchQM->Machine_id){?> selected="selected"<?php }?> /><?php  echo $fetchQM->machinename;  ?></option>
					<?php } ?>
			</select>
 </td>
<td class="text-r"><star>*</star>
Date:</td> 			
<td><input type="date" name="date" value="<?php echo $branchFetch->date; ?>" readonly="" required/></td>	

<td class="text-r"><star>*</star>
Shift:</td> 			
<td><select name="shift" <?php if(@$_GET['id']!=''){ ?> disabled="disabled" <?php }?> required>
					<option value="">----Select----</option>
					<option value="1" <?php if($branchFetch->shift=='1'){ ?> selected="selected" <?php } ?>>1</option>
					<option value="2" <?php if($branchFetch->shift=='2'){ ?> selected="selected" <?php } ?>>2</option>
			</select>
 </td>

</tr>
<tr>
<td class="text-r"><star>*</star>Quantity</td>
<td><input name="qnty" type="number" required value="<?php echo $branchFetch->quantity; ?>" readonly /></td>
<td class="text-r"></td>
<td class="text-r"></td>
		
	<td><input name="Show" type="button" value="Show"  class="submit" /></td>
	<td class="text-r"></td>	
</tr>
</table>
<table class="bordered">

  <?php 
extract(@$_POST);
 
	
	@$cybercodex_sql="select * from tbl_bill_of_material_dtl where product_name='$branchFetch->product_name'";
	@$mod_sql = $this->db->query($cybercodex_sql);
	
	?>
	 
	 <tr>
<th>Item Name</th><th>Unit</th><th>Quantity</th><th>Gross Weight</th><th>Net Weight</th><th>Scrap Weight</th><th>Remaining Quantity</th><th>New Quantity</th><th>scrap</th><th>Completed</th><th>Not Completed</th><th></th>
</tr> 
	
	 <?php 
		foreach (@$mod_sql->result() as $line)
			{
			$i=1;	
				$sum +=$i;
	?>	
	<tr>
	
	<td>
	<?php
	@$cybercodex_sql1="select * from tbl_product_stock where sku_no='$line->item_name'";
	@$mod_sql1 = $this->db->query($cybercodex_sql1);
	 @$mod_sql12=@$mod_sql1->row();
	 
	 $wipNewQty=$this->db->query("select * from tbl_wip_dtl where product_name='$line->bill_of_material_dtl_id' and lot_no='$branchFetch->lot_no'");
	$fetchWipNewQty=$wipNewQty->row();
	
	
	$q=$fetchWipNewQty->quentity;
	 $n=$fetchWipNewQty->new_quantity;
	 $enterq=$q-$n;
	
	
	 ?>
	 <input type="hidden" name="lot_id[]" readonly value="<?php echo $fetchWipNewQty->lot_no; ?>">
	 
	 <input type="hidden" name="product_id[]" readonly value="<?php echo $line->bill_of_material_dtl_id; ?>">
	 
		<input type="text" name="" readonly value="<?php echo $mod_sql12->productname; ?>">
	
	</td>
	<td><input type="text" name="unit[]" readonly value="<?php echo $line->unit; ?>"></td>
	
	<td>
	<input type="text" name="total_quantity[]" id="available_quantity<?php echo $sum; ?>" readonly="" value="<?php echo $branchFetch->quantity*$line->quentity; ?>">
	</td>
	<td>
	<input type="text" name="gross_weight[]"  readonly value="<?php echo $branchFetch->quantity*$line->gross_weight;?>">
	</td>
	<td><input type="text" name="net_weight[]" readonly value="<?php echo $branchFetch->quantity*$line->net_weight; ?>"></td>
	<td><input type="text" name="scrap_weight[]" readonly value="<?php echo $branchFetch->quantity*$line->scrap_weight; ?>"></td>
	<td>
	<input type="text" name="enter_quantity[]" id="enter_quantity<?php echo $sum; ?>" readonly=""  value="<?php echo  $enterq; ?>">
	</td>
<?php 
if( $fetchWipNewQty->quentity==$n){
?>	
	<td><input type="text" name="new_quantity[]" readonly="" id="required_quantity<?php echo $sum; ?>" value=""></td>
	<td><input type="number" name="scrap[]" value="<?php echo $fetchWipNewQty->scrap; ?>" readonly=""></td>
<?php }else{ ?>	

<td><input type="text" name="new_quantity[]" readonly="" id="required_quantity<?php echo $sum; ?>" value=""></td>
<td><input type="number" name="scrap[]" value="<?php echo $fetchWipNewQty->scrap; ?>" readonly=""></td>
<?php } ?>
<td><input type="number" name="completed[]" value="<?php echo $fetchWipNewQty->completed; ?>" readonly ></td>
<td><input type="number" name="not_completed[]" value="<?php echo $fetchWipNewQty->not_completed; ?>" readonly ></td>
	<?php 
if( $fetchWipNewQty->quentity==$n){
?>
<td><a><input type="hidden" id="imgidone" name="" value="1"><img src="<?php echo base_url();?>assets/images/yes.jpg" width="55" height="51" alt="" border="0" /></a></td>
<?php }else{ ?>
	<td><input type="hidden" id="imgidone" name="" value="3"><input type="hidden" id="imgid" name="" value="2"></td>
<?php } ?>
	</tr>
	
			<?php }
			$i++;
		?>	
		
<input type="hidden" id="submitval" name="rowiddd" value="<?php echo $sum; ?>">
 
 </table>
 
 

<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">

<div class="paging-right">

<div class="actions-right">

<?php 

 if(@$_GET['view']!='' ){

 

 }

 else

 {

if(@$_GET['id']==''){?>


 <td>  </td>

 <?php }else {?>

	   <td> </td>



	      <?php }}?>

<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>
	   
</div><!--paging-right close-->
</div><!--paging-row close-->
</div><!--table-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
 
 <script>

function submitfun(){

var submitval=document.getElementById("submitval").value;
for(var i=1;i<=submitval;i++)
{

var req=document.getElementById("required_quantity"+i).value;
var ent=document.getElementById("enter_quantity"+i).value;
//alert(ent);
var avl=document.getElementById("available_quantity"+i).value;
//alert(avl);
var equl=Number(avl)-Number(ent);
//alert(equl);
if(Number(ent)>=Number(req))
{


}
else
{
var ab='1';

}

}

if(ab=='1')
{
alert("Quantity Is Less Then New Quantity");
}
else
{
//alert("ss");
document.getElementById("form1").action="insert_production_stock_out"; // Setting form action to "role_function_permision" page
document.getElementById("form1").submit();
}
}

</script>
<?php $this->load->view('softwarefooter'); ?>