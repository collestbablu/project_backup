<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>
<body>
<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=42epwf1jarbwose89sqt3dztyfu7961g4cs5xoib4kordvbd"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>

<script>

    $(function () {


        $('#menu').metisMenu();
        $('#menu2').metisMenu({

            toggle: false

        });

         $('#menu3').metisMenu({

            doubleTapToGo: true

        });

    });
</script>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->
 
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<div class="title">
	<h1>view Bill of Material</h1> 
<form id="f1" name="f1" method="POST" action="">
<div class="actions-right">
 <div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<div>
<?php
if(@$_GET['id']!=''){
@$branchQuery = $this->db->query("SELECT * from tbl_bill_of_material_hdr where bill_of_material_id_hdr='".$_GET['id']."'");
$branchFetch = $branchQuery->row();
// echo $branchFetch->invoiceid;
}

 if(@$_GET['id']!='' ){
 
  ?>         

<td style="display:none"><input type="hidden" name="invoiceid" class="span6 " value="<?php echo $branchFetch->bill_of_material_id_hdr;?>" readonly size="22" aria-required='true' /></td>

<?php } ?>
		<table class="bordered">
				<tr>
					<th class="text-r">Product Type</th>
					<th><select name="Product_typeid"    <?php if(@$_GET['id']!=''){ ?> disabled="disabled" <?php }?> required>
              <option value="">----Select ----</option>
              <option value="finish_goods"<?php  if($branchFetch->product_type=='finish_goods'){ ?> selected <?php } ?>>Finish Goods</option>
			  <option value="finish_goods"<?php  if($branchFetch->product_type=='semi_finish_goods'){ ?> selected <?php } ?>>Semi Finish Goods</option>
             
            </select>
					<th>Search Product Code:</th>							
					<th><input type="text" name="product_code" id="product_code" placeholder="Product Code" style="width:80px;" onKeyUp="filterProductCode()" value="<?php echo $branchFetch->product_code;?>" readonly=""></th>					
										
									<th class="text-r">Product Name</th>
					<th> 
					<div id="divpr2ocode">
					<select name="product_name" id="prdidd" class="rounded" required  <?php if(@$_GET['id']!=''){ ?> disabled="disabled" <?php }?>>
					<option value="">--select--</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods'");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
					  
						<option value="<?php echo $contRow->sku_no; ?>" <?php if($branchFetch->product_name==$contRow->sku_no){ ?> selected <?php } ?>>
						<?php echo $contRow->productname; ?></option>
						<?php } ?>
					</select>
					
					</div>
						</th>						
					
			</tr>
			<tr>
								
										
					<th class="text-r">Date</th>
					<th><input type="date" required readonly name="date_name" value="<?php echo $branchFetch->date;?>"  style="  min-width: 80%;"/></th>
					<th class="text-r">Change Note  No/Remarks</th>
					<th><input type="text"  name="remark_name" readonly value="<?php echo $branchFetch->remark;?>" required/></th>
				
				<th class="text-r">Quantity</th>
				<th><input type="text"  name="quantity" readonly id="quantity_id" value="<?php echo $branchFetch->quantity;?>" required/></th>
				
				</tr>
		<tr>
			<th class="text-r">Lot No</th>
			<th><input type="text"  name="serial_no" readonly value="<?php echo $branchFetch->serial_no;?>" required/></th>
			<th class="text-r">Machine Name</th>
			<th><select name="machine_name" disabled="disabled" <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> required>
					<option value="">----Select----</option>
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_machine");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->Machine_id; ?>" <?php if($fetchQM->Machine_id==$branchFetch->machine_name){?> selected="selected"<?php }?> /><?php  echo $fetchQM->machinename;  ?></option>
					<?php } ?>
			</select></th>
			<th></th>
			<th class="text-r"><input type="button"  name="Search" id="search" onClick="addrow()" value="Search"/></th>
		</tr>
		</table>

<!--===================================== Start search item row======================================================================-->
		
		<table class="table table-bordered blockContainer lineItemTable ui-sortable" id="lineItemTab" style="margin-bottom:1px">

			<tbody>
				 
				<tr style="height:20px;">
					<td>
					

					<div id="prdsrch" style="color:black;padding-left:0px; width:22%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
					<?php
				
					$this->load->view('getproduct');

					?>
					</div></td>
				
						
					</tbody>
				</table>
<!--=========================================== close search Items row =============================-->
</div>

<!--bordered close-->
<!--paging-row close-->
</div>
<!--table-row close-->
<div class="clear"></div>

<!---BILL--->
<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
		<table id="invo" style="width:95%;  background:#dddddd;  height:10px;" title="Invoice"  >
			
			<tr>
				<td style="width:40px;"><div align="center"><u>S.No</u>.</div></td>
				<td style="width:220px;"><div align="center"><u>Item Name</u></div></td>
				
				<td style="width:50px;  "><div align="right"><u>Unit</u></div></td>

				<td style="width:50px;"> <div align="right"><u>Quantity</u></div></td>
				
				<td style="width:65px;"><div align="right"><u>Net Weight</u></div></td>
				<td style="width:70px;"><div align="right"><u>Gross Weight</u></div></td>
				<td style="width:70px;"><div align="right"><u></u>Runner Weight</div></td>
				<td style="width:70px; display:none"><div align="right"><u>Action</u></div></td>
			</tr>
		
		</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">

<table id="invoice2"  style="width:97.6%;  background:white; border-collapse: separate; border-spacing: 3px 10px;" title="Invoice"  cellspacing="2" cellpadding="0" border="0" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

	<caption> Old Items </caption>

<?php

$inviceQ=$this->db->query("select * from tbl_bill_of_material_dtl where bill_of_material_hdr_id='".$_GET['id']."'");

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



		    $qtotal=$invoiceFetch->quentity;
		   	$gross=$qtotal*$invoiceFetch->gross_weight;	   
			?>
			<tr>
			<?php

			$query_dtl=$this->db->query("select * from tbl_bill_of_material_dtl where bill_of_material_hdr_id='".$_GET['id']."'");
			$query_fetch_dtl=$query_dtl->row();

			
			
			$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->item_name'");
			$pfetch=$productQ->row();
			
			$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$pfetch->usageunit'");
			$unitfetchQ=$unitQuery->row();
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
			<input type="text" name="unt[]" id="<?php $quantyD="unt"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $unitfetchQ->keyvalue;?>"   readonly   style="width:100%;" />
			</td>
			<td width="105" align="left" style="width:30px;border:none;">
			
				<input type="number"  name="<?php $qunt="qn[]"; $qunt.=$i; echo $qunt;?>" id='<?php $quntD="qnD"; $quntD.=$i; echo $quntD;?>' onKeyUp="quandata(this.id)" readonly value="<?php echo $query_fetch_dtl->quentity; ?>" style="width:100%;" />

			</td>

			<td width="124" style="width:10%;border:none;" >
				
				<input type="text" name="<?php $total="rem[]"; $total.=$i; echo $total;?>" readonly id="<?php $total="ttD"; $total.=$i; echo $total;?>" value="<?php echo $invoiceFetch->gross_weight;?>"  style="width:100%;"  >
			
			</td>
			<td align="left" style="width:40px;border:none;">
			<div align="center">
				  <input type="number" name="<?php $pprice="tp[]"; $pprice.=$i; echo $pprice;?>" id="<?php $ppriceD="netprh"; $ppriceD.=$i; echo $ppriceD;?>"  value="<?php echo $invoiceFetch->net_weight;?>" onKeyUp="quandata(this.id)"  readonly onblur='testRate<?php echo $i ?>();'  style="width:100%;" />
				</div>
			</td>	
			
			<td align="left" style="width:40px;border:none;">
				
				<span id="netPrice0" class="pull-right netPrice">
				<input type="number" name="<?php $qunt="np[]"; $qunt.=$i; echo $qunt;?>" id="<?php $netD="nph"; $netD.=$i; echo $netD;?>" value="<?php echo $invoiceFetch->scrap_weight;?>" readonly style="width:%;" >
		
			</td>

			<td width="15" align="RIGHT" style="display:none">
				<span id="netPrice0" class="pull-right netPrice">
				<img src="<?php echo base_url();?>/assets/images/edit.png" alt="" border="0" class="icon"  onclick=" editdata('<?php echo $pnameD;?>','<?php echo $ppriceD;?>','<?php echo $quntD;?>','<?php echo $quantyD;?>','<?php echo $total;?>','<?php echo $netD;?>','<?php echo $i;?>','<?php echo $invoiceFetch->template_dtl_id; ?>',this)")"/>
			</td>

			<td width="25" align="center" style="width:20px;border:none; ">
				<span id="netPrice0" class="pull-right netPrice">
				<img style="display:none;" src="<?php echo base_url();?>/assets/images/delete.png" alt="" border="0" class="icon" onClick="deletedata(<?php echo $invoiceFetch->template_dtl_id; ?>,<?php echo $i; ?>,'<?php echo $invoiceFetch->total;?>',this)" />
			</td>
			</tr>

			<?php

			 $i=$i+1;

			$subt=$subt+$invoiceFetch->net_price; 

$totalWeight=$totalWeight+$qtotal;

$groswt=$groswt+$invoiceFetch->gross_weight;
$totalNeWeight=$totalNeWeight+$invoiceFetch->net_weight;
$totalScrapWeight=$totalScrapWeight+$invoiceFetch->scrap_weight;


			 } 
			 


			 ?>


</table>
		<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice"   class="table table-bordered blockContainer lineItemTable ui-sortable"  >

			<caption></caption>

		</table>

			
</div>

</div>

<!----BILL CLOSE------>
<div class="table-row">

<table class="bordered"> 

<tbody>
<tr>
<td width="12" height="44" style="width:4%; border:none;">&nbsp;</td>

<td width="122" style="width:30%; border:none;">&nbsp;</td>

<td width="110" align="center" style="width:35px;border:none; ">

</td>
<td width="110" align="center" style="width:35px;border:none; ">&nbsp;

</td>
<td width="105" align="left" style="width:30px;border:none;">
<strong>Total Qty:-<?=$totalWeight;?>KG</strong>
</td>

<td width="124" style="width:10%; border:none;">
<strong>Total Gross Weight:-<?=$totalNeWeight;?></strong>

</td>

<td width="124" style="width:10%;border:none;">
<strong>Total Net Weight:-<?=$groswt;?></strong>
</td>	

<td align="left" style="width:40px;border:none;">

<span id="netPrice0" class="pull-right netPrice">
<strong>Total Runner Weight:-<?=$totalScrapWeight;?></strong>

</span></td>

<td width="15" align="RIGHT" style="display:none">
<span id="netPrice0" class="pull-right netPrice">
<img src="http://192.168.0.85/consult//assets/images/edit.png" alt="" border="0" class="icon" onClick=" editdata('prdhD0','netprh0','qnD0','unt0','ttD0','nph0','0','',this)" )"="">
</span></td>

<td width="25" align="center" style="width:20px;border:none; ">
<span id="netPrice0" class="pull-right netPrice">
<img style="display:none;" src="http://192.168.0.85/consult//assets/images/delete.png" alt="" border="0" class="icon" onClick="deletedata(,0,'',this)">
</span></td>
</tr>

<tr>
<td width="12" height="44" style="width:4%; border:none;">&nbsp;</td>
<td width="122" style="width:30%; border:none;">&nbsp;</td>
<td width="110" align="center" style="width:35px;border:none; ">&nbsp;</td>
<td width="110" align="center" style="width:35px;border:none;">&nbsp;</td>
<td width="105" align="left" style="width:30px;border:none;">&nbsp;</td>
<td width="124" style="width:10%;border:none;">&nbsp;</td>
<td align="left" style="width:40px;border:none;">
<a><input type="button" value="Cancel"  tabindex="8" onClick="closeWinCan()" class="submit"></a>
</td>	

<td align="left" style="width:40px;border:none;">&nbsp;</td>

<td width="15" align="RIGHT" style="display:none">
<span id="netPrice0" class="pull-right netPrice">
<img src="http://192.168.0.85/consult//assets/images/edit.png" alt="" border="0" class="icon" onClick=" editdata('prdhD1','netprh1','qnD1','unt1','ttD1','nph1','1','',this)" )"="">
</span></td>

<td width="25" align="center" style="width:20px;border:none; ">
<span id="netPrice0" class="pull-right netPrice">
<img style="display:none;" src="http://192.168.0.85/consult//assets/images/delete.png" alt="" border="0" class="icon" onClick="deletedata(,1,'',this)">
</span></td>
</tr>
</tbody>

</table>
</div>
<!--bordered close-->
<div class="clear"></div>
<div class="paging-row">
<div class="paging-right">
<div class="actions-right">

</form>

</div></div></div></div>
</div><!--paging-right close-->
</div><!--paging-row close-->
</div>
<!--table-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
<div class="clear"></div><!--footer--row close-->
</div><!--wrapper close-->


<script>
//======================================================*Anoj* Start Save Function ============================================
function fsv(v)
{
var rc=document.getElementById("invoice2").rows.length;
//alert(rc);

if(rc!=0)
{
v.type="submit";
}
else
{
	alert('No Item To Save..');	
}
}
//======================================================close Save Function ==================================================

//======================================================Start Cancel Function ================================================
function closeWinCan(){
    window.close();  
}
//======================================================Close Cancel Function ================================================

//======================================================Start Fillter Search Function ============================================



function addrow()
		  {
		 
		 currentCell = 0;		
		 var tp='Contact';
		 var product1=document.getElementById("prdidd").value;
		  var quantity=document.getElementById("quantity_id").value;
		 if(product1 && quantity!=''){
		 var product=product1+"^"+quantity;
		
		    if(xobj)
			 {
			 var obj=document.getElementById("rowsrch");
			 xobj.open("GET","getRowData?con="+product,true);
			
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
			   }
			  }
			  			  
			 }
			 }else{
			 	alert("Please Select Product Name And Quantity");
			 }
			 xobj.send(null);
		  }

//======================================================Close Fillter Search Function ============================================


</script>
<script>
		function filterProductCode(){		 
		 currentCell = 0;		
		 var tp='Contact';
		 var product1=document.getElementById("product_code").value;
		 var product=product1;
		
		    if(xobj)
			 {
			 var obj=document.getElementById("divprocode");
			 xobj.open("GET","getproductcode?con="+product,true);
			
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
			   }
			  }
			  			  
			 }
			 xobj.send(null);
		  }
</script>		
</body>
</html>