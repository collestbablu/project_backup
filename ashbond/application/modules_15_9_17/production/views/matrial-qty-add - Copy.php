<?php

$tableName='cybercodex_production_hdr';
$location='';
$this->load->view('htmltop');


?>
<h1>Show Raw Material</h1>



<script>

function submitfun1(){

var x = document.forms["out"]["process"].value;
var y = document.forms["out"]["vender"].value;
var z = document.forms["out"]["date"].value;

    if (x == null || x == "") 
	{
        alert("Please select process");
          return false;
     }
	 
	 if (y == null || y == "") 
	{
        alert("Please select vender");
          return false;
     }
	  if (z == null || z == "") 
	{
        alert("Please select date");
          return false;
     }

document.getElementById("form1").action=""; // Setting form action to "role_function_permision" page
document.getElementById("form1").submit();

}




function submitfun(){




//alert(qtyamount1);
document.getElementById("form1").action="insert_stockout_qty"; // Setting form action to "role_function_permision" page
document.getElementById("form1").submit();

//document.form1.submit();

}

</script>
<script>

function value1(q){

values = $('#vender').val();
var len=values.length;

$.ajax({

    type: "POST",
    data: {'test' : len,'val' : values},
    url: 'vender_input',
    success: function(response) {
	
    document.getElementById('vender_value').innerHTML=response;
	
    }
});

}
</script>	

	
<script>

function checkvalue(q){

var zz=document.getElementById(q).id;


var myarra = zz.split(",");

var asx = myarra[1];

var pidrqty = document.getElementById("rqty,"+asx).value;

 var b=document.getElementById('fill').value;

var rr=0;
for(var a=0;a<b;a++){
//alert('enterqty,'+asx+','+a);
var value1=document.getElementById('enterqty,'+asx+','+a).value;

if(value1==''){
value1=0;
}


var rr=parseInt(rr)+parseInt(value1);



}


  
if(parseInt(pidrqty)<parseInt(rr)){

alert('fill value is less than compare to required qty');
for(var a=0;a<b;a++){
document.getElementById('enterqty,'+asx+','+a).value='';
}
}
}

</script> 	
<form  method="post" name="out" id="form1">



<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 { 

 if(@$_GET['id']==''){?>

 <td> <input name="save" type="button" value="FactoryOut" class="submit" /> </td>



	  <?php }else {?>

      <td> <input name="edit" type="button" value="FactoryOut" class="submit" /> </td>



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

<th colspan="4">Show Raw Material</th>
</tr>
<?php if($_GET['id']!=''){



				@$cybercodex_sql1= ("select * from $tableName where invoiceid='".$_GET['id']."'");
				@$mod_sql1 = $this->db->query($cybercodex_sql1) ;
				 @$mod_sql12=@$mod_sql1->row();
			
				$sql1 = $this->db->query("select * from cybercodex_production_dtl where finish_goods='$mod_sql12->finish_goods'");
					@$mod_s12=$sql1->row();
					
				 
			?>		
					
	<tr>
		<td>Finish Good:- &nbsp;&nbsp;
					
					<?php 
					
					
					
				     
				
					$Query=$this->db->query("select * from cybercodex_product_stock where Product_id='$mod_s12->finish_goods'");
					
					
				     $pro_name = $Query->row();
					
					
					 ?>
					 <input type="hidden" name="serial_number" id="serial_number1" value="<?php echo $mod_sql12->invoiceid;?>"  readonly/>
					 <input type="text" name="finish_goods" id="" value="<?php echo $pro_name->productname;?>"  readonly/>
					 <input type="hidden" name="finish_goods" id="" value="<?php echo $pro_name->Product_id;?>"/>					</td>
					<td>
					
					<?php 

								
						?>
						
						Process:-
					
					
					<?php $proc[]=array();
			$proc=explode('^',@$mod_s12->process);
			$proc11=implode(',',$proc);
			
			?>
			<select id="processpid" name="process"  tabindex="1" onchange="getQty(this.value);" required >
<option value="">----select---</option>
<?php 
$process1 =$this->db->query("select * from cybercodex_master_data where param_id=17 and serial_number in($proc11)");


  foreach($process1->result() as $proces2){

 ?>

<option value="<?php echo $proces2->serial_number; ?>" <?php if($_REQUEST['process']==$proces2->serial_number){?>selected<?php }?>><?php echo $proces2->keyvalue;?></option>
<?php } ?>
</select>

</td>
					<td colspan="2">
					
					
					 Vander:-
					 <select name="vender[]" id="vender" required multiple="multiple" onchange="value1(this.value);">
					 <option value="">---select--</option>
					 <?php 
					 $contat_nam1 =$this->db->query("select * from cybercodex_contact_m where group_name=3");
					$j=0;
				
					  foreach($contat_nam1->result() as $contat_n){
					
					 ?>
					
				<option value="<?php echo $contat_n->contact_id; ?>" <?php if($_REQUEST['vender']!=''){if(in_array($contat_n->contact_id,$_REQUEST['vender'])){?>selected<?php }}?> id="select<?php echo $j++;?>" ><?php echo $contat_n->first_name;?></option>
					<?php } ?>
					</select>					 </td>
</tr>
<tr>
<td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE:-&nbsp;&nbsp;
  <input type="date" name="date" id="date" value="<?php if($_REQUEST['date']!=''){ echo $_REQUEST['date'];}else{ echo date("Y-m-d");}?>" required/></td>
<td id="vender_value"></td>
<td><input name="Show" type="submit" value="Show" id="Show" onClick="submitfun1()" class="submit" /></td></tr>
<tr><td colspan="4"></td></tr>
</thead>

<?php }?>

<?php  if($_GET['id']!=''){


extract(@$_POST);



  if(@$Show!='')
  {
 
  $i=0;
  			   
  $querry = "select * from cybercodex_stock_in_dtl where finish_goods='$finish_goods'";
 
if($vender!='' && $process!='' ){

for($venn=0;$venn<count($vender);$venn++){


$Que=$this->db->query("select * from cybercodex_stock_in_hdr where contact_id like '%$vender[$venn],%' or contact_id like '%,$vender[$venn],%' and process='$process' and serial_number='$serial_number' and statusf='out'");
						   
		 
		 foreach($Que->result() as $fetQ){
		 if($fetQ->stockin_id!=''){
		 
		 $stockin_id11[]=$fetQ->stockin_id;
		 
			}
			}
		 }
		
		if($stockin_id11!=''){	
		$stockin_val = implode(',',array_unique($stockin_id11));
		
		}
		
		
		
		
		
		
		if($stockin_val!='') {
		
		
		
		
 for($ven=0;$ven<count($vender);$ven++){	
 		
		
	 $quer=$this->db->query("select * from cybercodex_stock_in_dtl where finish_goods='$finish_goods' and process='$process' and stockin_id in($stockin_val) and contact_id='$vender[$ven]'");	
	 
	 $quer1=$quer->row();
	 	
	 if($quer1->invoice_dtl_id!=''){
	 $dtl_id[]=$quer1->contact_id;
	 
	 }
  }
  }
  
  
  
  
  
  if(is_array($dtl_id)!=''){
 $dtl_id1=implode(',',$dtl_id); 
	 
   $querry .= " and contact_id in($dtl_id1) group by product_id" ; 
 }
  else{ 
  
  
   $querry .= " and contact_id='' group by product_id" ; 
  
  }
 
 }
	$Quequerry=$this->db->query($querry);
	$rowq=$Quequerry->num_rows();
	if($rowq>0){
	
	$Quequerry1=$this->db->query($querry);
	$flag='true';
	}
	else{
	
	$querry = "select * from cybercodex_production_dtl where finish_goods='$finish_goods'";
	$Quequerry1=$this->db->query($querry);
	$flag='false';
	}

	
	?>
	
<tr>
<td align="right"></td>
<td>

<?php 
$countlen =count($vender_input);


?></td>
<td>
	<input type="hidden" name="row_material" value="row_material" />	</td>
</tr>
	
	<tr>
<th>Row Matrial</th>
<th>Required Quantity</th>
<th style="display:none;">Available Quantity</th>
<td colspan="2">
<?php 


for($m=0;$m<$countlen;$m++){

 $contat_nam1=$this->db->query("select * from cybercodex_contact_m where group_name=3 and contact_id='$vender_input[$m]'");
 $rowq = $contat_nam1->row();
 
 
 ?>
 
 
<label style="float:left; margin-left:3.5%"><?php echo $rowq->first_name;?><br /></label>
<input type="text" name="vender_input[]" id="" value="<?php echo $price;?>" class="col-xs-2" <?php if($countlen==1 || $countlen==2){?>style="width: 27.666667%;"<?php }else{?> class="col-xs-2"<?php }?> style="float:left; margin-top:5%;margin-left:-8%;"  placeholder="price"/>

<?php 
 
}
 
?></td>
</tr>
	
	
	<?php 
//$fet1Q=$querry->row();
	
	}
	$n=0;
	foreach(@$Quequerry1->result() as $fetch){
	
	$Query=$this->db->query("select * from cybercodex_product_stock where product_id='$fetch->product_id'");
						   $fetchQ=$Query->row();
							
	
	
	
	?>				
							<tr>
								
								
								<td><input type="hidden" name="countrow" id="countrow" value="<?php echo $i++; ?>"/>
							      <input type="hidden" name="product_id[]" value="<?php echo $fetchQ->Product_id;?>" />
						      <?php echo $fetchQ->productname;
								
							
								?></td>
								
								<td><?php 
								
								
								if($flag=='true'){ 
								 
								$quqty = "select * from cybercodex_production_dtl where product_id='$fetch->product_id' and finish_goods='$fetch->finish_goods'";
								$quqty1=$this->db->query($quqty);	
								$quqty122=$quqty1->row();
								
								
						$total_qty1=0;
						
	
	
$que_qty = "select sum(qntyt) as qty_sum from cybercodex_stock_in_dtl where process='$process' and finish_goods='$finish_goods'  and product_id='$fetch->product_id' and stockin_id in($stockin_val)";
 
             $Qu_qty2=$this->db->query($que_qty);
			 
			 foreach(@$Qu_qty2->result() as $Qu_qty1s){
            
			    $total_qty1=$total_qty+$Qu_qty1s->qty_sum;	
					
					}		
								?>
								  <input type="text" value="<?php echo $quqty122->qnty*$mod_sql12->qty-$total_qty1;?>" name="Input"  id="rqty,<?php echo $i; ?>"/>
								  <?php } ?>
								
							  <?php if($flag=='false'){ 
								
							?>
							  <input type="text" value="<?php echo $fetch->qnty*$mod_sql12->qty;?>" name="Input2" id="rqty,<?php echo $i; ?>" />
							  <?php } ?></td> 
								<td style="display:none;">
								<input type="text" value="<?php echo $fetchQ->qtyinstock;?>" name="" id="avqty" style="border:none;" readonly /></td> 
								
								<?php 
								
								//echo ("select * from cybercodex_stock_in_dtl where process='$fetQ->process' and finish_goods='$fetQ->finish_goods' and product_id='$fetch->product_id'");
								$Que1=$this->db->query("select * from cybercodex_stock_in_dtl where process='$process' and finish_goods='$fetQ->finish_goods' and product_id='$fetch->product_id'");
						   $fet1Q=$Que1->row();
			
							 ?>
								
								<td colspan="2"> 
								
								
 <?php 
     $total_qty=0;
	for($m=0;$m<=$countlen-1;$m++){

 ?>

 <input type="hidden" name="n_vender[<?php echo $n?>][<?php echo $m?>]" value="<?php echo $vender_input[$m];?>"  class="col-xs-2" style="float:left;" />
 
 <label style="float:left; margin-left:6%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="qty[<?php echo $n ?>][<?php echo $m ?>]" value="" id="enterqty,<?php echo $i.",".$m;?>" onkeyup="checkvalue(this.id);" class="col-xs-2"   style="float:left; margin-left:-7.9%;"/>
<?php
 if($flag=='true'){ 
 
$que_qty = "select sum(qntyt) as qty_sum from cybercodex_stock_in_dtl where process='$process' and finish_goods='$finish_goods'  and product_id='$fetch->product_id' and contact_id = '$vender_input[$m]' and stockin_id in($stockin_val)";
 
 $Qu_qty2=$this->db->query($que_qty);
 $Qu_qty1s=$Qu_qty2->row();

   
 ?> 
 
 <input type="hidden" name="" value="<?php echo $Qu_qty1s->qty_sum;?>" id="checkqty<?php echo $i; ?>" <?php if($countlen==1 || $countlen==2){?>style="width: 27.666667%;"<?php }else{?> class="col-xs-2"<?php }?>class="col-xs-2" style="float:left;"/>	
	
<?php }
								
								if($flag=='false'){
								?>
								<input type="hidden" name="" value="" id="checkqty<?php echo $i; ?>"  class="col-xs-2"/>
								<?php 
								}
								
								
								
								?>
								
									
												

<?php 
 
}


?>
<?php if($quqty122->qnty*$mod_sql12->qty-$total_qty1==0 && $flag=='true'){
								
								?>
								
								
								<div style="display:inline-block;float:right;" id="comp<?php echo $i; ?>"><img src="<?php echo base_url()?>assets/images/right.png" /></div>
								
								<?php }?>

	<input type="hidden" name="" value="<?php echo $m; ?>" id="fill"  class="col-xs-2"/>							</td>
	</tr>
							


  

	<?php 
	
	$n++;
	
	}  ?>




<?php }?>
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






 <td> <input name="save" type="button" value="FactoryOut" class="submit" onClick="submitfun();"/> </td>



 <?php }else {?>

	   <td> <input name="edit" type="button" value="FactoryOut" class="submit" onClick="submitfun();"/> </td>



	      <?php }}?>





<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

<?php
$this->load->view('htmlbottom');
?>


