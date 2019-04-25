<?php

//echo "df".$Productctg_id=$_REQUEST['Productctg_id'];

 //$con1=$_REQUEST['con'];
 $con1=$_GET['con'];
//echo "fff".$con1;

$con2=explode("^",$con1);
 $product=$con2[0];
   $quantity=$con2[1];

?>
<table id="invoice2"  style="width:97.6%;  background:white; border-collapse: separate; border-spacing: 3px 10px;" title="Invoice"  cellspacing="2" cellpadding="0" border="0" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

	<caption> Old Items </caption>

<?php

$inviceQ=$this->db->query("select * from tbl_template_dtl where product_name='$product'");

$nn=0;

$i=$nn;

$subt=0;

$pnm="prdh";

$price="lpr";

$qnt="qn";

$dis="disa";

$vat="dvat";

$total="tp";

$net="netprh";

foreach($inviceQ->result() as $invoiceFetch)
			{

			$nn++;
			$total_taxx=explode("+",$total_tax);
			$tt=$total_taxx[1];
			$t=$t+$tt;

			///////TOTAL DISCOUNT/////
			$d=$discount_item_amt;
			$ds=$ds+$d;

			///////TOTAL AMOUNT////
			$ta=$total_price;
			$tamt=$tamt+$ta;

			///////TOTAL AMOUNT////
			$nta=$net_price;
			$nett=$nett+$nta;

$sum +=$i;

		    $qtotal=$quantity*$invoiceFetch->quentity;
		   	 $gross=$quantity*$invoiceFetch->gross_weight;	
			$net_weight=$quantity*$invoiceFetch->net_weight;
			$scrap_weight=$quantity*$invoiceFetch->scrap_weight;	 
			  
			?>
			<tr>
			<?php

			$query_dtl=$this->db->query("select * from tbl_template_dtl where template_hdr_id='".$_GET['id']."'");
			$query_fetch_dtl=$query_dtl->row();

			$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->item_name'");
			$pfetch=$productQ->row();

			@extract($pfetch);

			?>

			<td width="12" height="44" style="width:4%;">
				<div align="center" >
				<input type="text"  name="" id='<?php echo $nn;?>' value="<?php echo $nn;?>" readonly onblur='testRate<?php echo $i?>();' style="width:10px;border:none;" >
				</div>
			</td>

			<td width="122" style="width:30%; ">
				<div align="center">
				<input type="hidden" name="prdids[]" id="" value="<?php echo $pfetch->Product_id;?>">
				<input type="text"  name="<?php $pname="prdh[]"; $pname.=$i; echo $pname;?>" id='<?php $pnameD="prdhD"; $pnameD.=$i; echo $pnameD;?>' value="<?php echo $pfetch->productname;?>^<?php echo $pfetch->Product_id;?>" readonly onblur='testRate<?php echo $i?>();' style="width:100%;border:none" />
				</div>
			</td>

			<td width="110" align="center" style="width:35px;border:none; ">
				
			</td>
			<td width="110" align="center" style="width:35px;border:none; ">
			<input type="text" name="unt[]" id="<?php $quantyD="unt"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->unit;?>"   readonly   style="width:100%;" />
			</td>
			<td width="105" align="left" style="width:30px;border:none;">
			
				<input type="number"  name="<?php $qunt="qn[]"; $qunt.=$i; echo $qunt;?>" id='<?php $quntD="qnD"; $quntD.=$i; echo $quntD;?>' onKeyUp="quandata(this.id)" readonly value="<?php echo $qtotal; ?>" style="width:100%;" />

			</td>

			<td width="124" style="width:10%;border:none;" >
				
				<input type="text" name="<?php $total="rem[]"; $total.=$i; echo $total;?>" readonly id="<?php $total="ttD"; $total.=$i; echo $total;?>" value="<?php echo $net_weight;?>" readonly style="width:100%;"  >
			
			</td>
			<td align="left" style="width:40px;border:none;">
			<div align="center">
				  <input type="number" name="<?php $pprice="tp[]"; $pprice.=$i; echo $pprice;?>" id="<?php $ppriceD="netprh"; $ppriceD.=$i; echo $ppriceD;?>"  value="<?php echo $gross;?>" onKeyUp="quandata(this.id)"  readonly onblur='testRate<?php echo $i ?>();'  style="width:100%;" />
				</div>
			</td>	
			
			<td align="left" style="width:40px;border:none;">
				
				<span id="netPrice0" class="pull-right netPrice">
				<input type="number" name="<?php $qunt="np[]"; $qunt.=$i; echo $qunt;?>" id="<?php $netD="nph"; $netD.=$i; echo $netD;?>" value="<?php echo $scrap_weight;?>" readonly style="width:%;" >
		
			</td>

			<td width="15" align="RIGHT" style="display:none">
				<span id="netPrice0" class="pull-right netPrice">
				<img src="<?php echo base_url();?>/assets/images/edit.png" alt="" border="0" class="icon"  onclick=" editdata('<?php echo $pnameD;?>','<?php echo $ppriceD;?>','<?php echo $quntD;?>','<?php echo $quantyD;?>','<?php echo $total;?>','<?php echo $netD;?>','<?php echo $i;?>','<?php echo $invoiceFetch->template_dtl_id; ?>',this)")"/>
			</td>

			<td width="25" align="center" style="width:20px;border:none; ">
				<span id="netPrice0" class="pull-right netPrice">
				<img src="<?php echo base_url();?>/assets/images/delete.png" alt="" border="0" class="icon" onClick="deletedata(<?php echo $invoiceFetch->template_dtl_id; ?>,<?php echo $i; ?>,'<?php echo $invoiceFetch->total;?>',this)" />
			</td>
			</tr>

			<?php

			 $i=$i+1;

			$subt=$subt+$invoiceFetch->net_price; 
 
			 } 
			 
			 ?>
<input type="hidden" name="rows" value="<?php echo $sum; ?>">
</table>