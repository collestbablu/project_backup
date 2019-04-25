<?php


$tableName='cybercodex_production_hdr';
$location='';

$this->load->view('htmltop');

?>
<h1>Show Raw Material</h1>

<script>
function submitfun1(){


var x = document.forms["in"]["process"].value;
var y = document.forms["in"]["vender"].value;
var z = document.forms["in"]["date"].value;

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
document.getElementById("form1").action="insert_stockin_qty"; // Setting form action to "role_function_permision" page
document.getElementById("form1").submit();

//document.form1.submit();

}

</script>


<form  method="post" name="in" id="form1">



<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 

 }

 else

 { 

 if(@$_GET['id']==''){?>

 <td> <input name="save" type="button" value="FactoryIn" class="submit" /> </td>



	  <?php }else {?>

      <td> <input name="edit" type="button" value="FactoryIn" class="submit" /> </td>



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


		@$cybercodex_sql1="select * from $tableName where invoiceid='".$_GET['id']."'";
		@$mod_sql1 = $this->db->query($cybercodex_sql1) ;
	    @$mod_sql12=@$mod_sql1->row();
		
		
		
		$sql1c = $this->db->query("select * from cybercodex_stock_in_hdr where finish_goods='$mod_sql12->finish_goods' and statusf='out'");
					@$mod_sc12=$sql1c->row();
		
		///------------------------	
		$sql1 = $this->db->query("select * from cybercodex_production_dtl where finish_goods='$mod_sql12->finish_goods'");
					@$mod_s12=$sql1->row();
					
				 
			?>		
					
	<tr>
		<td>Finish Good:- &nbsp;&nbsp;
					
					<?php 
					
					
					
				     
				
					$Query=$this->db->query("select * from cybercodex_product_stock where Product_id='$mod_s12->finish_goods'");
					
					
				     $pro_name = $Query->row();
					
					
					 ?>
					 <input type="hidden" name="serial_number" id="serial_number1" value="<?php echo $_GET['id'];?>"  readonly/>
					 <input type="text" name="finish_goods" id="" value="<?php echo $pro_name->productname;?>"  readonly/>
					 <input type="hidden" name="finish_goods" id="" value="<?php echo $pro_name->Product_id;?>"/>					</td>
					<td>
					
					
						
					
<select id="processpid" name="process"  tabindex="1" required >

<option value="">----select---</option>
<?php 


$sql1c1 = $this->db->query("select * from cybercodex_stock_in_hdr where finish_goods='$mod_sql12->finish_goods' and statusf='out' and contact_id in($mod_sc12->contact_id)");
					
					

  foreach($sql1c1->result() as $proces21){

$process =$this->db->query("select * from cybercodex_master_data where serial_number='$proces21->process' ");
       $pro11=$process->row(); 
 ?>

<option value="<?php echo $pro11->serial_number; ?>" <?php if($_REQUEST['process']==$pro11->serial_number){?>selected<?php }?>><?php echo $pro11->keyvalue;?></option>
<?php }?>
</select></td>
					<td colspan="2">
					
					
					
					<?php  $sql1c12 = $this->db->query("select * from cybercodex_stock_in_hdr where finish_goods='$mod_sql12->finish_goods' and statusf='out' ");
					 
					 $str=array(); 
					
					
					foreach($sql1c12->result() as $proces2){
					
					$str[]=$proces2->contact_id;
					$idval=implode(',',$str); 
					}
					
					 
					 ?>
					 
					Vander:- 	
					<select name="vender" id="vender" required>
                      <option value="">---select--</option>
                     
					 
					  <?php
						
					$contact1 =$this->db->query("select * from cybercodex_contact_m where contact_id in ($idval) GROUP BY  contact_id");
      			
					foreach($contact1->result() as $contat_n){ 
					
					 ?>
                      <option value="<?php echo $contat_n->contact_id; ?>"<?php if($_REQUEST['vender']==$contat_n->contact_id){?>selected<?php }?>><?php echo $contat_n->first_name;?></option>
                      <?php }
					 ?>
                    </select></td>
</tr>
<tr>
<td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE:-&nbsp;&nbsp;<input type="date" name="date" id="" value="<?php if($_REQUEST['date']!=''){ echo $_REQUEST['date'];}else{ echo date("Y-m-d");}?>"/></td><td></td><td></td><td><input name="Show" type="submit" value="Show" id="Show" onClick="submitfun1()" class="submit" /></td></tr>
<tr><td colspan="4"></td></tr>

<tr>
<th>Row Matrial</th>
<th >Matrial quantity in stock</th>
<th>Matrial in</th>
<th colspan="">Add Quantity</th>
</tr>
</thead>

<?php }?>

<?php  if($_GET['id']!=''){

	
extract(@$_POST);



  if(@$Show!='')
  {
  $i=0;
  				   
   $querry = "select * from cybercodex_stock_in_dtl where finish_goods='$finish_goods'";
 
 if($vender!='' && $process!='' ){

//echo "select * from cybercodex_stock_in_hdr where FIND_IN_SET('$vender',contact_id)>0 and process='$process' and serial_number='$serial_number' and statusf='out'";

 $Que2=$this->db->query("select * from cybercodex_stock_in_hdr where FIND_IN_SET('$vender',contact_id)>0 and process='$process' and serial_number='$serial_number' and statusf='in'");
  

$Que1=$this->db->query("select * from cybercodex_stock_in_hdr where FIND_IN_SET('$vender',contact_id)>0 and process='$process' and serial_number='$serial_number' and statusf='out'");
   
 $numrow=$Que2->num_rows();
  
  if($numrow>0){
  
  $fetQ=$Que2->row();
  $fetQ1=$Que1->row();
  
  
  
  
  $Queryz=$this->db->query("select * from cybercodex_stock_in_hdr where stockin_id='$fetQ1->stockin_id' and contact_id='$vender' and process='$process' and statusf='out'");
	
  
   }else{
   
    $fetQ=$Que1->row();
	
	
   
   }
						 
						   
						   
$querry.="and process='$fetQ->process' and stockin_id='$fetQ->stockin_id' and contact_id='$vender' group by product_id";					   
 }
 
 
	$Quequerry=$this->db->query($querry);
	
	//echo "select * from cybercodex_stock_in_hdr where stockin_id='$fetQ->stockin_id' and contact_id='$vender' and process='$process' and statusf='in'";

	
	
	
	}
	
	
	
//$fet1Q=$querry->row();
	
	
	foreach(@$Quequerry->result() as $fetch){
	
	
	
	$Query=$this->db->query("select * from cybercodex_product_stock where product_id='$fetch->product_id'");
						   $fetchQ=$Query->row();
							
		?>				
							<tr>
								
								
								<td><input type="hidden" name="countrow" id="countrow" value="<?php echo $i++; ?>"/>
								  <input type="hidden" name="product_id[]" value="<?php echo $fetchQ->Product_id;?>" />
								  
								<?php echo $fetchQ->productname; ?>	</td>
								
								
								
								<td>
								
								<?php
								
								 if($numrow>0){
								 
								 
								 
					 $quer2 = "select * from cybercodex_stock_in_dtl where finish_goods='$fetch->finish_goods' and process='$fetch->process' and stockin_id='$fetQ1->stockin_id' and product_id='$fetch->product_id'";
								
								$Queq5=$this->db->query($quer2);
								$roewse=$Queq5->row();
								//echo $fetch->qntyt.$roewse->qntyt;
								?>
								<input type="text" value="<?php echo $roewse->qntyt-$fetch->qntyt;?>" name="Input" id="Input" />
								<?php }else{
						
						
						?>
							  <input type="text" value="<?php echo $fetch->qntyt;?>" name="" id="rqty<?php echo $i; ?>"  ><?php }?>								</td> 
								
								<?php 
								//echo ("select * from cybercodex_stock_in_dtl where process='$fetQ->process' and finish_goods='$fetQ->finish_goods' and product_id='$fetch->product_id'");
								$Que1=$this->db->query("select * from cybercodex_stock_in_dtl where process='$fetQ->process' and finish_goods='$fetQ->finish_goods' and product_id='$fetch->product_id'");
						        $fet1Q=$Que1->row();
			
						 ?>
							<td><?php if($numrow>0){echo $fetch->qntyt;}?> </td>
								<td colspan=""> 
								<input type="text" name="qty[]" value="" id="enterqty<?php echo $i; ?>" onkeyup="checkvalue(this.id);"/>
								
								
								
								
								
							
								
								<input type="hidden" name="" value="" id="checkqty<?php echo $i; ?>"/>
							
								
								<?php //if($fetch->qntyt==$quqty122->qnty*$mod_sql12->qty && $fetch->qntyt!=''){
								
								?><?php //echo $fetch->qntyt;?>
								<!--<div style="display:inline-block;float:right;" id="comp<?php //echo $i; ?>"><img src="<?php echo base_url()?>assets/images/right.png" /></div>-->
								
								<?php //}?>								</td>
	</tr>
							



  

	<?php } } ?>




		
		
      

	
<script>





function checkvalue(q){

var zz=document.getElementById(q).id;
//alert(zz);

	var myarra = zz.split("enterqty");

	var asx= myarra[1];
	
	
	
var pid=document.getElementById("enterqty"+asx).value;
var pidrqty=document.getElementById("rqty"+asx).value;



//alert(pid);
//alert(pidrqty);



//alert(pidcheckqty);
//alert(pidcheckqty);


if(parseInt(pidrqty)<parseInt(pid)){


alert('fill value is less than compare to required qty');
document.getElementById("enterqty"+asx).value=0;

}


}



</script>
		
		

<tr>
	<input type="hidden" name="row_material" value="row_material" />
</tr>
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





 <td> <input name="save" type="button" value="FactoryIn" class="submit" onClick="submitfun();"/> </td>



 <?php }else {?>

	   <td> <input name="edit" type="button" value="FactoryIn" class="submit" onClick="submitfun();"/> </td>



	      <?php }}?>





<?php if(@$_GET['popup'] == 'True') {?>

<a href="#" onClick="window.close()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?></form>

<?php
$this->load->view('htmlbottom');
?>

