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
<script>
$(window).load(function() {
	$(".loader1").fadeOut("fast");
});

</script>

	</head>
<body>
  <script>tinymce.init({ selector:'#templateId' });</script>

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
<div class="title">
	<h1>Update Invoice Order</h1> 
<form id="f1" name="f1" method="POST" action="insertSalesOrder">
<div class="actions-right">
 <div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<div>
<?php
$cusdetail=$this->db->query("select * from tbl_sales_order_hdr where salesid='".$_GET['id']."'");
$detail=$cusdetail->row();

$id=$detail->vendor_id;
$id;

$cusdetail1=$this->db->query("select * from tbl_contact_m where contact_id='$id'");
$detail1=$cusdetail1->row();

?>

<?php
if(@$_GET['id']!=''){
@$branchQuery = $this->db->query("SELECT * from tbl_sales_order_hdr where salesid='".$_GET['id']."'");
$branchFetch = $branchQuery->row();
// echo $branchFetch->invoiceid;
}

 if(@$_GET['id']!='' ){
 
  ?>         

<td style="display:none"><input type="hidden" name="invoiceid" class="span6 " value="<?php echo $branchFetch->salesid;?>" readonly size="22" aria-required='true' /></td>

<?php } ?>
		<table class="bordered">
					<tr>
					<th class="text-r"><star>*</star> Contact Name:</th>
					<th><select name="contact_id" style="width:100px;" required id="contact_id_copy" <?php if(@$_GET['id']!=''){ ?> <?php }else{ ?> onChange="contactfun()" <?php } ?> class="rounded" <?php if(@$_GET['id']!=''){ ?> <?php }else{ ?> onClick="contactperson()" <?php } ?>>
					<option value="">---select---</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_contact_m where status='A'  order by first_name");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
						<option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$branchFetch->vendor_id){?> selected="selected" <?php }?>>
						<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
						<?php } ?>
			</select>	
					<a onClick="openpopup('<?php echo base_url(); ?>master/Contact/add_contact',900,630,'add','add')"><img src="<?php echo base_url();?>/assets/images/addcontact.png" width="25px" height="25px"/>&nbsp;
					<a style="color:#fff" onClick="pricehistory('<?php echo base_url(); ?>VendorHistoryPrice/price_history_function',900,630,'','')">PRICE HISTORY</a>
					</th>
					<th class="text-r"><star>*</star> Case Id:</th>
					<th id="caseiddiv">

<select id="case_id" name="case_name" onChange="loadDoc()" <?php if(@$_GET['view']!=''){ ?> disabled="disabled"<?php } ?>>
	<?php if(@$_GET['id']!='' or @$_GET['view']!=''){ ?>
		<option value="<?php echo $branchFetch->case_id; ?>"><?php echo $branchFetch->totalcaseid; ?></option>
	<?php }else{ ?>
	<option value="">---select---</option>
	<?php }
	 ?>
</select>
<a onClick="openpopup('<?php echo base_url(); ?>master/CreateCase/add_case',900,300,'add','case')"><img src="<?php echo base_url();?>/assets/images/add.png" width="25px" height="25px"/></a>
</th>	
<th>&nbsp;</th>
				<tr>
				<th class="text-r"><star>*</star> Ref.No:</th>
					<th>
				<div id="demo">
				<input type="text"  required name="refno" readonly id="refno_id" value="<?php echo $branchFetch->refno;?>" style="width: 85%;float: left;border: none;"/>
				</div>				</th>
			<input type="hidden" name="totalcaseid" id="totalcaseid" value="<?php echo $branchFetch->totalcaseid;?>"/>
				<th id="commiddiv" style="color:red"></th>
				<th></th><th></th>
				</tr>	
				
		<tr>
					<th class="text-r"><star>*</star>Date</th>
					<th>
	<input type="date" required name="date" readonly  value="<?php echo $branchFetch->delivery_date;?>"  style="width:120px;;"/></th>
					<th class="text-r">Remark</th>
					<th><input type="text"  name="remark_name"  readonly value="<?php echo $branchFetch->remark;?>"/></th><th></th>
				</tr>		
	<tr>	
	
			<th class="text-r"><star>*</star> Subject</th>
	
	<th>
	<input type="text" required name="subject" readonly  value="<?php echo $branchFetch->subject;?>" style="width:400px;"/>	</th>
	<th class="text-r"><star>*</star> Contact Person:</th>
	<th id="periddiv"><select name="person_name" required  disabled="disabled">
	<option value="">--select--</option>
	<?php
					 
					 $caseQuery=$this->db->query("select * from tbl_contact_person where status='A'");
					 foreach($caseQuery->result() as $caseRow)
					{
					
	
					  ?>
						<option value="<?php echo $caseRow->person_id; ?>" <?php if($caseRow->person_id==$branchFetch->contact_person_id){?> selected="selected" <?php }?>>
						<?php echo $caseRow->p_name; ?></option>
						<?php } ?>
	</select></th><th></th>
		</tr>	
		<tr>
				<th class="text-r">Content:</th>
				
				<th colspan="4"><textarea name="contant_name" readonly style="width:405px;height:40px;"><?php echo $branchFetch->contant; ?></textarea></th>			
			</tr>
		</table>

<!--===================================== Start search item row======================================================================-->
		
		<table class="table table-bordered blockContainer lineItemTable ui-sortable" id="lineItemTab" style="margin-bottom:1px">

			<tbody>

				<tr>
					<th style="width:30%;"><div align="center"><b>Product Name </b></div></th>
					<th>  <div align="center"><b>Description</b></div></th>
						<th>  <div align="center"><b>Cost Price</b></div></th>
					<th>  <div align="center"><b>Purchase Price</b></div></th>
					<th><div align="center"><b>Quantity     </b></div></th>
					<th><div align="center"><b>Unit    </b></div></th>
					<th><div align="center"><b>Discount</b></div></th>
					<th><div align="center"><b>Dis.Amt</b></div></th>
                    <th><div align="center"><b>CGST</b></div></th>
                    <th><div align="center"><b>SGST</b></div></th>
                    <th><div align="center"><b>IGST</b></div></th>
                    <th><div align="center"><b>GST Total</b></div></th>
					<th style="width:100px;"> <div align="center"><b> Remark</b></div></th>
					<th style="width:200px; display:none"> <div align="center"><strong>VAT</strong></div></th>

					
					<th><div align="center"><b>Total</b></div></th>
					<th><b>Net Price</b></th>
				
				</tr>
				<tr style="height:20px;">
					<td>
					<input type="hidden" name="productid" id="productid">
					<div style="width:100%; height:28px;" >
					<input type="text" name="prd"  onkeyup="getdata()" onChange="getdataT()" onClick="getdata()" id="prd" style=" width:75%;"  placeholder=" Search Items..."><img   src="<?php echo base_url();?>/assets/images/search11.png"  onclick="showall()" onMouseOver="showall1()" />

					</div>

					<div id="prdsrch" style="color:black;padding-left:0px; width:22%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
					<?php
				
					$this->load->view('getproduct');

					?>
					</div></td>
					
						<td><textarea name="desss" style="width:100px;" id="desss"></textarea></td>
						<td>
					<center>
					<label name="lpr" id="lpr"   > 0.00 </label> </center>
					<input type="number" name="lph" id="lph" style="width:65px;"/>  </td>
					 <td> 
						 <input type="number" name="" id="purchasepid"  onfocus="this.select()" style="width:60px;" readonly></td>
					<td><input type="number"  name="qnt" onKeyUp="quan(this.value)" onChange="quan(this.value)" id='qn' value="<?php //echo $queryTempfetch->quantity?>"   onfocus="this.select()" style="width:55px;"  /><input type="hidden" name="abqt" id="abqt" /></td>

					<td> 
					
						<input type="hidden" id="unitiddd" onFocus="this.select()" style="width:80px;" readonly value="">		
								
								<input type="text" id="usunit" onFocus="this.select()" style="width:60px;" readonly value="">
								
				
					 <input type="hidden" id="quantity" name="qutyyyyy"  readonly="readonly"></td>
					  <td> 
						 <input type="number" name="descid" id="descid"  onfocus="this.select()" style="width:60px;"></td>
						 
					<td> 
						 <input type="text" name="disamt" id="disamt"  onfocus="this.select()" style="width:62px;" readonly></td>
                         
                         <td> 
						 <input type="text" id="cgst"  onfocus="this.select()" style="width:62px;" readonly></td>	
                         
                         <td> 
						 <input type="text"  id="sgst"  onfocus="this.select()" style="width:62px;" readonly></td>	
                         
                         <td> 
						 <input type="text" id="igst"  onfocus="this.select()" style="width:62px;" readonly></td>
                          <td><input type="text" id="gstTotal"  onfocus="this.select()" style="width:62px;" readonly></td>	
                         	 
					 <td> 
						 <input type="text" name="remark" id="remark" style="width:60px;" placeholder="Remark" onKeyUp="taxf(this.value,'disc')" >	</td>
					  <td style="display:none">
					
			<table>
  
					 <tr style="height:35px;">
					 
						 <td align="right">(%):</td>
						 <td> 
						 <input type="number" name="disp" id="dispr" style="width:50px;" placeholder=" 0%" onKeyUp="taxf(this.value,'disc')" >	</td>
							
						  <td align="right">
						  
						 Amount: </td> <td><input type="number" tab="3" name="disa" id="disa"   style="width:50px;" onKeyUp="disf(this.value,'d')" placeholder="0.00"  /></td>
					 </tr>
				</table>
    
    <!-- discount percent -->&nbsp;
    
    <!-- discount direct price --></td>
	
		  <td style="display:none" >
		  
		  <table>
		  <tr style="height:35px;"> <td>
			<div align="right">
			  
			 Percent(%):</div> </td><td> <input type="number" name="idvat_rate_on_total" id="dvat"  style="width:60px;" onKeyUp="taxf(this.value,'dv')" placeholder=" 0 %"  value="0"/>  </td>
			 </tr>
			 
			 <tr style="height:35px;"> <td style="height:35px;"><div align="right">Amount: </div></td><td><input type="number" tab="3" name="dvatA"   id="dvatA" style="width:60px;" onKeyUp="disf(this.value,'t')" onBlur="addbill1(this.value)" placeholder="0.00"   value="0"/></td>
			 </tr>
			 </table>
			<table>
				<tr style="height:25px;">
					  
			</tr>
				<tr style="height:25px;">
				 
				  </tr>
				<tr style="height:25px;">
				 
				  </tr>
				<tr style="height:25px;">
								  
				  </tr>  
				</table>     </td>
				  <input type="hidden" name="idvat_rate_on_total" id="vat"  style="width:50px;" onKeyUp="taxf(this.value,'vt')" placeholder=" 0 %"/>
			 			   
			   <input type="hidden" name="idvat_rate_on_total2" id="sale" style="width:50px;" onKeyUp="taxf(this.value,'sl')" placeholder=" 0 %"/>
			   			 
			  <input type="hidden" name="ser" id="ser"  style="width:50px;" placeholder=" 0 %" onKeyUp="taxf(this.value,'sr')" />	
			
			   <input type="hidden" tab="3" name="vatA" id="vatA" style="width:50px;" onblur='testRate<?php echo $i?>();' value="0"  placeholder="0.00" readonly="" />
			 
			   <input type="hidden" tab="3" name="direct_reduction" id="saleA" style="width:50px;" onblur='testRate<?php echo $i?>();' value="0" placeholder="0.00" readonly=""/>
			   <input type="hidden" tab="3" name="direct_reduction" id="serA" style="width:50px;" onblur='testRate<?php echo $i?>();' value="0"  placeholder="0.00"  readonly=""/>	    <!--</td>-->

		<td align="center">

		<label name="tpr" id="tpr"  style="width:60px;" > 0.00 </label> 
			<input type="hidden" name="tph" id="tph" />


		<label name="ttax" id="ttax"  style="width:80px;display:none;" > 0.00 (DVAT) </label> 
		<input type="hidden" name="ttaxh" id="ttaxh" />


		<label style="display:none;width:80px;" name="dsct" id="dsct"   > 0.00 (Dis.)</label> 
		<input type="hidden" name="dscth" id="dscth" /></td>


		<td>
		<center>
		<label id="np" style="width:61px;">0.00</label>
		</center>
		<input type="hidden" name="nph" id="nph" /></td>
		</tr>
						
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
				<td style="width:220px;"><div align="center"><u>Product</u></div></td>
				<td style="width:45px;"> <div align="center"><u>Cost Price</u></div></td>
				<td style="width:50px;  "><div align="right"><u>Quantity</u></div></td>

				<td style="width:50px;"> <div align="right"><u>Unit</u></div></td>
				<td style="width:75px;"><div align="right"><u>Discount</u></div></td>
                
                <td style="width:75px;"><div align="right"><u>CGST</u></div></td>
                <td style="width:75px;"><div align="right"><u>SGST</u></div></td>
                <td style="width:75px;"><div align="right"><u>IGST</u></div></td>
                <td style="width:75px;"><div align="right"><u>GST Total</u></div></td>
                
				<td style="width:50px;"><div align="right"><u>Remark</u></div></td>
				<td style="width:65px;"><div align="right"><u>Total</u></div></td>
				
				<td style="width:70px;"><div align="right"><u>Net Price</u></div></td>
				<td style="width:70px;"><div align="right"><u>Action</u></div></td>
			</tr>
		
		</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">

<table id="invoice2"  style="width:97.6%;  background:white; border-collapse: separate; border-spacing: 3px 10px;" title="Invoice"  cellspacing="2" cellpadding="0" border="0" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

	<caption> Old Items </caption>

<?php

$inviceQ=$this->db->query("select * from tbl_sales_order_dtl where salesid='".$_GET['id']."'");

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

			?>
			<tr>
			<?php

			$query_dtl=$this->db->query("select * from tbl_sales_order_dtl where salesid='".$_GET['id']."'");
			$query_fetch_dtl=$query_dtl->row();

			$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->product_id'");
			$pfetch=$productQ->row();

			@extract($pfetch);

			?>

			<td width="12" height="44" style="width:4%;">
				<div align="center" >
				<input type="text"  name="" id='<?php echo $nn;?>' value="<?php echo $nn;?>" readonly onblur='testRate<?php echo $i?>();' style="width:10px;border:none;" >
				</div>
			</td>

			<td width="122" style="width:13%; ">
				<div align="center">
				<input type="hidden" name="productid" id="productid">
				<input type="text"  name="<?php $pname="prdh[]"; $pname.=$i; echo $pname;?>" id='<?php $pnameD="prdhD"; $pnameD.=$i; echo $pnameD;?>' value="<?php echo $pfetch->productname;?>^<?php echo $pfetch->Product_id;?>" readonly onblur='testRate<?php echo $i?>();' style="width:100%;border:none" />
				</div>
			</td>
			
			<td width="150" align="right" style="width:35px;border:none; ">
				<div align="center">
				  <input type="hidden" name="<?php $pprice="desid[]"; $pprice.=$i; echo $pprice;?>" id="<?php $ppriceD="prD"; $ppriceD.=$i; echo $ppriceD;?>"  value="<?php echo $invoiceFetch->description;?>" onKeyUp="quandata(this.id)"  readonly onblur='testRate<?php echo $i ?>();'  style="width:100%;" />
				</div>
			</td>
			
			<td width="150" align="right" style="width:35px;border:none; ">
				<div align="center">
				  <input type="number" name="<?php $pprice="pr[]"; $pprice.=$i; echo $pprice;?>" id="<?php $ppriceD="prD"; $ppriceD.=$i; echo $ppriceD;?>"  value="<?php echo $invoiceFetch->list_price;?>" onKeyUp="quandata(this.id)"  readonly onblur='testRate<?php echo $i ?>();'  style="width:100%;" />
				</div>
			</td>

			<td width="105" align="left" style="width:27px;border:none;">
			
				<input type="number"  name="<?php $qunt="qn[]"; $qunt.=$i; echo $qunt;?>" id='<?php $quntD="qnD"; $quntD.=$i; echo $quntD;?>' onKeyUp="quandata(this.id)" readonly value="<?php echo $invoiceFetch->quantity; ?>" style="width:100%;" />

			</td>
			<?php
			$UnitMasterQ=$this->db->query("select * from tbl_master_data where serial_number='$invoiceFetch->unit'");
			$Mfetch=$UnitMasterQ->row();
			?>
			<td width="105" align="left" style="width:30px;border:none;">
			<input type="hidden" name="unitid[]" id="<?php $quantyD="unt"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->unit;?>"   readonly   style="width:100%;" />
			
			<input type="text" name="unt[]" id="<?php $quantyD="unt"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->unit;?>"   readonly   style="width:100%;" />
			
			</td>
			<td width="105" align="left" style="width:30px;border:none;">
			<input type="text" name="discount[]" id="<?php $quantyD="discount"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->per_discount;?>"   readonly   style="width:120%;" />
			
			
			<input type="hidden" name="desid[]" id="<?php $quantyD="desid"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->description;?>"   readonly   style="width:120%;" />
			
			<input type="hidden" name="discountamount[]" id="<?php $quantyD="discountamount"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->discountamount;?>"   readonly   style="width:120%;" />
			
			</td>

<td width="105" align="left" style="width:30px;border:none;">
			<input type="text" name="cgst[]" id="<?php $quantyD="cgst"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->cgst;?>"   readonly   style="width:120%;" />
			</td>
            
<td width="105" align="left" style="width:30px;border:none;">
			<input type="text" name="sgst[]" id="<?php $quantyD="sgst"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->sgst;?>"   readonly   style="width:120%;" />
			</td>
 <td width="105" align="left" style="width:30px;border:none;">
			<input type="text" name="igst[]" id="<?php $quantyD="igst"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->igst;?>"   readonly   style="width:120%;" />
			</td>
 <td width="105" align="left" style="width:30px;border:none;">
			<input type="text" name="gstTotal[]" id="<?php $quantyD="gstTotal"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->gstTotal;?>"   readonly   style="width:120%;" />
			</td>                                  
            
            <td width="105" align="left" style="width:30px;border:none;">
			<input type="text" name="rem[]" id="<?php $quantyD="rem"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->remark;?>"   readonly   style="width:120%;" />
			</td>
			
			<td width="105" align="left" style="width:10%;border:none;" >
				
				<input type="text" name="<?php $total="tp[]"; $total.=$i; echo $total;?>" id="<?php $total="ttD"; $total.=$i; echo $total;?>" value="<?php echo $invoiceFetch->total;?>" readonly  onblur='testRate<?php echo $i ?>();'  style="width:100%;"  >
			
			</td>
			
			
			<td align="left" style="width:40px;border:none;">
				
				<span id="netPrice0" class="pull-right netPrice">
				<input type="number" name="<?php $qunt="np[]"; $qunt.=$i; echo $qunt;?>" id="<?php $netD="npD"; $netD.=$i; echo $netD;?>" value="<?php echo $invoiceFetch->net_price;?>" readonly style="width:%;" >
		
			</td>
			
			

			<td width="15" align="RIGHT" style="width:20px; display:none;">
				<span id="netPrice0" class="pull-right netPrice">
				<img src="<?php echo base_url();?>/assets/images/edit.png" alt="" border="0" class="icon"  onclick="editdata('<?php echo $pnameD;?>','<?php echo $ppriceD;?>','<?php echo $quntD;?>','<?php echo $quantyD;?>','<?php echo $total;?>','<?php echo $netD;?>','<?php echo $i;?>','<?php echo $invoiceFetch->sales_dtl_id; ?>','<?php echo $invoiceFetch->unit; ?>','<?php echo $invoiceFetch->remark; ?>',this)"/>
				
			</td>

			<td width="25" align="center" style="width:20px;border:none; ">
				<span id="netPrice0" class="pull-right netPrice">
				<img src="<?php echo base_url();?>/assets/images/delete.png" alt="" border="0" class="icon" onClick="deletedata(<?php echo $invoiceFetch->sales_dtl_id; ?>,<?php echo $i; ?>,<?php echo $invoiceFetch->total;?>,this)" />
			</td>
			</tr>

			<?php

			 $i=$i+1;

			$subt=$subt+$invoiceFetch->net_price; 

			 } 
			 
			 ?>

</table>

		<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice"   class="table table-bordered blockContainer lineItemTable ui-sortable"  >

			<caption>New Items</caption>

		</table>
<?php		

$q=$row->invoiceid;
$invoiceID=$q+1;

?>
			<input type="hidden" name="rows" id="rows" value="<?php echo $i;?>">
			<input type="hidden" name="invoiceID" id="invoiceID" value="<?php echo $invoiceID; ?>">
			<input type="hidden" name="c_name2" id="cn">
			<input type="hidden" name="cust_phone2" id="cmob" />
			<input type="hidden" name="cust_address" id="cadrs">
			<!--//////////ADDING TEST/////////-->
			<input type="hidden" name="spid" id="spid" value="d1"/>
			<input type="hidden" name="ef" id="ef" value="0" />
			<input type="hidden" name="Input" id="did1" value="d1" />
			<input type="hidden" name="dddd1" id="d" value="0" />
			<input type="hidden" name="alal" id="dd1" value="0" />
			<input type="hidden" name="all" id="all" value="0" />
			
</div>

</div>

<!----BILL CLOSE------>
<div class="table-row">

		<table class="bordered"> 

			<tr>

				<td width="60%" class="text-r" style="font-size:14px;">Sub Total</td>        

				<td width="53%" class="text-rig"><input type="text" name="sub_total" id="sub_total" value="<?php echo $branchFetch->sub_total; ?>" style="width:150px; text-align:right; font-size:16px;" onBlur="calculation()" readonly="" /></td>
			
			</tr>  						
			<tr style=" display:none" >

				<td class="text-r" style="font-size:14px;">Service Charge</td>         

				<td class="text-rig"> 
				<input type="number" name="service_chargeper" value="" id="scp" style="width:80px; font-size:16px; text-align:right;"   placeholder="0%" onKeyUp="scharge(this.value)"/> 
				%
				   <input type="text" name="service_charge" value="" style="width:150px; font-size:16px; text-align:right;" id="sc" readonly=""/></td>
			</tr>
			<tr style="display:none" >
				<td class="text-r" style="font-size:14px;">Gross Discount </td>         

				<td class="text-rig"> <input type="number" name="installation_chargeper" value="" id="icp" style="width:80px; font-size:16px; text-align:right;" placeholder="0%" onKeyUp="icharge(this.value)" /> %
				  
				  <input type="text" name="installation_charge" value="" id="ic" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
            
            
            <tr>
				<td class="text-r" style="font-size:14px;">CGST @ 18% Total</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" id="cgst_per_total" name="cgst_per_total" value="<?php echo $branchFetch->cgst_per_total; ?>" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
                      
            <tr>
				<td class="text-r" style="font-size:14px;">CGST @ 28% Total</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" id="cgst_per_total_two" name="cgst_per_total_two" value="<?php echo $branchFetch->cgst_per_total_two; ?>" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
                        
            <tr>
				<td class="text-r" style="font-size:14px;">SGST@ 18% Total</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" id="sgst_per_total" name="sgst_per_total" value="<?php echo $branchFetch->sgst_per_total; ?>" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
            <tr>
				<td class="text-r" style="font-size:14px;">SGST@ 28 % Total</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" id="sgst_per_total_two" name="sgst_per_total_two" value="<?php echo $branchFetch->sgst_per_total_two; ?>" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
             <tr>
				<td class="text-r" style="font-size:14px;">IGST @ 18% Total</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" id="igst_per_total" name="igst_per_total" value="<?php echo $branchFetch->igst_per_total; ?>" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
<tr>
				<td class="text-r" style="font-size:14px;">IGST @ 28% Total</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" id="igst_per_total_two" name="igst_per_total_two" value="<?php echo $branchFetch->igst_per_total_two; ?>" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
<tr>
				<td class="text-r" style="font-size:14px;">GST Total</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" id="gst_total_two" name="gst_total_two" value="<?php echo $branchFetch->gst_total_two; ?>" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
            <tr>
				<td class="text-r" style="font-size:14px;">Discount Amount</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" id="discount_amount_total" name="discount_amount_total" value="<?php echo $branchFetch->discount_amount_total; ?>" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>

<tr style="display:none"  >
				<td class="text-r" style="font-size:14px;">Round Off Value</td>         

				<td class="text-rig"> &nbsp;
				  
				  <input type="text" name="installation_charge" value="" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
            
			<tr>
				<td class="text-r" style="font-size:14px;">Grand Total</td>         

				<td class="text-rig">  <input type="text" name="nett" id="gtotal" value="<?php echo $branchFetch->grand_total; ?>"  style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>

			</tr>
			

<tr>
				<td class="text-r" style="font-size:14px;"><star>*</star>Template</td>         
				<td class="text-rig"><select name="template" id="template" required onChange="getTemplate(this.value);" disabled>
				<option value="">--Select Template--</option>
				<?php
				$templateQuery=$this->db->query("select *from tbl_termandcondition");
				foreach($templateQuery->result() as $templateFetch){
				?>
				<option value="<?=$templateFetch->id;?>" <?php if($templateFetch->id==$branchFetch->template){ ?> selected <?Php } ?>><?=$templateFetch->type;?></option>
				<?php }?>
				</select>
				</td>

			</tr>
         <tr>
				<td class="text-r" style="font-size:14px;">Term & Condition</td>         

				<td class="text-rig" style="width:auto; height:500px;">  <textarea style="width:auto; height:500px;" id="templateId" name="termandcondition"><?=$branchFetch->termandcondition;?></textarea></td>

			</tr>   

<?php
$this->load->view("template_term_condition");

?>
			<tr> 
				<td>&nbsp;</td>
				<td>
				<input type="button" value="SAVE"  id="sv1" onClick="fsv(this)" class="submit">
				<a><input type="button" value="Cancel"  onClick="closeWinCan()" class="submit"></a>
				</td>
			</tr>
		</table>

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
var rc=document.getElementById("invoice").rows.length;
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

//======================================================Start Search Images Function ============================================

function showall()
		{

	 var w = 200;

        var h = 200;

        var left = Number((screen.width/2)-(w/2));

        var tops = Number((screen.height/2)-(h/2));
   var myWindow = window.open('all_product_function', "myWindow", "width=600, height=600,top=10, left=500");
  
   }
   
//======================================================Close Search Images Function ============================================

//======================================================Start Fillter Search Function ============================================
function getdata(v)
		  {
		 
		 currentCell = 0;		
		 var tp='Contact';
		 var product1=document.getElementById("prd").value;
		 var product=product1;
		
		var conatctId=document.getElementById("contact_id_copy").value;
		if(conatctId=='')
		{
		alert('Plase Select Contact First');
		document.getElementById("contact_id_copy").focus();
		}
		
		
		    if(xobj)
			 {
			 var obj=document.getElementById("prdsrch");
			 xobj.open("GET","getproduct_fun?con="+product+"&con_id="+conatctId,true);
			
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

//======================================================Close Fillter Search Function ============================================

//======================================================START QUANTITY ADDISON Function ============================================
function quan(q)
  {
	  
		var abq=document.getElementById("abqt").value; 
		
 var qn=q;
	 qn=Number(qn);
		  abq=Number(abq);
	
		if(qn<=abq)
		{
	if(q=="" || q==0)
				qn=1;
	            var pr=document.getElementById("lph").value;
					
				 var tph=Number((qn*pr).toFixed(2));
				
				document.getElementById("tpr").innerHTML=tph;
				document.getElementById("tph").value=tph;
				document.getElementById("np").innerHTML=tph;
				document.getElementById("nph").value=tph;

		}
		else
		{

	if(q=="" || q==0)
				qn=1;
	            var pr=document.getElementById("lph").value;
						
					 var tph=Number((qn*pr).toFixed(2));
					document.getElementById("tpr").innerHTML=tph;
					document.getElementById("tph").value=tph;
					//document.getElementById("np").innerHTML=tph;
					//document.getElementById("nph").value=tph;

		document.getElementById("qn").value;			
					
		}

	  }
//======================================================CLOSE QUANTITY ADDISON Function ============================================
function dicfun(v){
//alert("ss");

	va=document.getElementById("descid").value;
	//alert(va);	
	//var totp=document.getElementById("tph").value;
	var totp=document.getElementById("tpr").innerHTML;
	var disamt=document.getElementById("disamt").value;
	//alert(totp);
	if(va!=''){
		
	//alert(totp);
	dispr=(totp*va)/100;
	//alert(dispr);	
	//subdis=totp-dispr;
	var igst=document.getElementById("igst").value;
	
	if(Number(igst)!='')
		{
			
					
	var disTot=Number(totp)-Number(dispr);
	//alert(disTot);
	var cgst=document.getElementById("igst").value;
	
var igstCal=Number(disTot)*Number(cgst)/100;
//alert(igstCal);
			document.getElementById("np").innerHTML=totp;
	var gstt=document.getElementById("gstTotal").value=igstCal;
	
	var totalnetpri=Number(disTot)+Number(igstCal);
	//alert();
	document.getElementById("np").innerHTML=totalnetpri;
	document.getElementById("nph").value=totalnetpri;
		}
		else
		{
			
						
	var disTot=Number(totp)-Number(dispr);
	
	var cgst=document.getElementById("cgst").value;
	
var igstCal=Number(disTot)*Number(cgst*2)/100;

			document.getElementById("np").innerHTML=totp;
	var gstt=document.getElementById("gstTotal").value=igstCal;
		var totalnetpri=Number(disTot)+Number(igstCal);
	document.getElementById("np").innerHTML=totalnetpri;
	document.getElementById("nph").value=totalnetpri;
		
		}
	
	document.getElementById("disamt").value=dispr;
	document.getElementById("np").innerHTML=subdis;
	document.getElementById("nph").value=subdis;
	}else{
		var igst=document.getElementById("igst").value;
		if(Number(igst)!='')
		{
			
	document.getElementById("np").innerHTML=totp;
	var gstt=document.getElementById("gstTotal").value;
	document.getElementById("np").innerHTML=Number(totp)+Number(gstt);
	document.getElementById("nph").value=Number(totp)+Number(gstt);
		}
		else
		{
			
			document.getElementById("np").innerHTML=totp;
	var gstt=document.getElementById("gstTotal").value;
	document.getElementById("np").innerHTML=Number(totp)+Number(gstt);
	document.getElementById("nph").value=Number(totp)+Number(gstt);
		
		}
	}
}
//======================================================Start Enter Function ============================================

window.addEventListener("keydown", checkKeyPressed, false);
//Anoj///
function checkKeyPressed(e) {
	
var s=e.keyCode; 
 
var ppp=document.getElementById("prd").value;
var sspp=document.getElementById("spid").value;

var sspp=document.getElementById(sspp).value;

var ef=document.getElementById("ef").value;
		ef=Number(ef);

var countids=document.getElementById("countid").value;

for(n=1;n<=countids;n++)
{

document.getElementById("tyd"+n).onkeyup = function (e) {

document.getElementById("desss").focus();
document.getElementById("prdsrch").innerHTML=" ";
}
}

document.getElementById("desss").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
document.getElementById("lph").focus();
}
}
document.getElementById("lph").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
costpriceadd();
document.getElementById("qn").focus();
}
}

document.getElementById("qn").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
	var qty=document.getElementById("qn").value;
	var tpr=document.getElementById("tpr").innerHTML;
	var gstTotal=document.getElementById("gstTotal").value;
	
	
	var igstCal=Number(gstTotal)*Number(qty);
	
document.getElementById("gstTotal").value=Number(igstCal);
document.getElementById("np").innerHTML=Number(igstCal)+Number(tpr);
document.getElementById("nph").innerHTML=Number(igstCal)+Number(tpr);
	
	

document.getElementById("usunit").focus();
}
}

document.getElementById("usunit").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("descid").focus();
}
}
document.getElementById("descid").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("remark").focus();
dicfun();
}
}
document.getElementById("remark").onkeydown = function (e) {

var entr =(e.keyCode);
if(entr==13){

document.getElementById("dispr").focus();

}

if(document.getElementById("qn").value=="" && entr==08){

document.getElementById("lph").focus();
}

    if (e.keyCode == "13")
	 {		 
	 e.preventDefault();
       e.stopPropagation();
	
       if(ppp==sspp || df==1)
		 {
       
         adda();
	
		document.getElementById("ef").value=0;	
		document.getElementById("usunit").value="";
		
		//icharge(Number(document.getElementById("icp").value));
	//	scharge(Number(document.getElementById("scp").value));		
			document.getElementById("prd").focus;	
							
var ddid=document.getElementById("spid").value;
var ddi=document.getElementById(ddid);
ddi.id="d";
				
			}
			
	       else
			{
			
	   alert("Enter Correct Product");
			
			}
						
		return false;							
				
    	}
	}
}
//======================================================Close Enter Function ============================================

//======================================================ADD ROW FUNCTION===================================================
  var rw=0;	
		var rows=document.getElementById("rows").value;
function adda()
		  {  
		  
		  currentCell = 0;
                  var subtl=0;                                               
				var pd=document.getElementById("prd").value;
				
				var pidss=document.getElementById("productid").value;
				
		        var qn=document.getElementById("qn").value;
			    var pr=document.getElementById("lph").value;
					var desid=document.getElementById("desss").value;
				var unitid=document.getElementById("unitiddd").value;
				
				var unt=document.getElementById("usunit").value;
				var discount=document.getElementById("descid").value;
				var cgst=document.getElementById("cgst").value;
				var sgst=document.getElementById("sgst").value;
				var igst=document.getElementById("igst").value;
				
				//document.getElementById("igst_per_total").value=igst;
				
				var gstTotal=document.getElementById("gstTotal").value;				
				var rem=document.getElementById("remark").value;
				var discountamount=document.getElementById("disamt").value;
				var nptl=document.getElementById("nph").value;
				nptl=Number(nptl);
		
		var tph=document.getElementById("tph").value;		
				//alert(tph);	
				var igst=document.getElementById("igst").value;		
				var nt=(qn*pr); 
				 
	            document.getElementById("nph").value=qn*pr;    
						document.getElementById("np").value=(qn*pr)+igst;    
          	   var table = document.getElementById("invoice");
			
var qtyInStk=document.getElementById("quantity").value;
var qty=document.getElementById("qn").value;

					if(pd!=""  && Number(qty)!=0)
					{	
						
						var row = table.insertRow(-1);
						rw=rw+1;
        	
						var cell0 = row.insertCell(0);
						//cell0.innerHTML="1";
						var cell1 = row.insertCell(1);
						var cell2 = row.insertCell(2);
			            var cell3 = row.insertCell(3);
				     	 var cell4 = row.insertCell(4);
						var cell5 = row.insertCell(5);
				     	 var cell6 = row.insertCell(6);
						var cell7 = row.insertCell(7);
				     	 var cell8 = row.insertCell(8);
						  var cell9 = row.insertCell(9);
						   var cell10= row.insertCell(10);
						   var cell11= row.insertCell(11);
						   var cell12= row.insertCell(12);
						   var cell13= row.insertCell(13);
						   var cell14= row.insertCell(14);
						 cell0.style.width="4%";
						  cell1.style.width="20%"; //cell1.style.backgroundColor="red";
						   cell2.style.width="5px";
						    cell3.style.width="40px";
							 cell4.style.width="5%";
							  cell5.style.width="6%";
							   cell6.style.width="8%";   
							   cell7.style.width="33px"; cell7.align="center";
							cell8.style.width="30px";
							cell9.style.width="28px";
							cell10.style.width="40px";
							cell11.style.width="40px";
							cell12.style.width="40px";
							cell13.style.width="40px";
							cell14.style.width="40px";
															
   cell1.align="center";cell2.align="left";cell3.align="left"; cell4.align="right" ; cell5.align="left" ; cell6.align="center" ;
		 cell7.align="center" ;  cell8.align="center" ; cell9.align="center" ;
//====================================START SERIAL Number ===========================================================	
							
							cell0.innerHTML=rw;
							
//====================================CLOSE SERIAL NUMBER ===========================================================							
//====================================START PRODUCT Name===========================================================

	var prd = document.createElement("input");
						prd.type="text"; prd.value=pd;	    
			            prd.name='a'+rw;
		   				prd.readOnly = true;
						prd.style.width="100%";
						cell1.appendChild(prd);
						
	//==========================HIDDEN PRODUCT Name========================
			var prdh = document.createElement("input");
					  		  prdh.type = "hidden";
		    					prdh.value =pd;
						  		  prdh.name ='prdh[]'+rw;
			    			  		prdh.id='prdh'+rw;
									cell1.appendChild(prdh);			
										
	//==========================HIDDEN PRODUCT ID ========================									
				var prdid = document.createElement("input");
					  		  prdid.type = "hidden";
		    					prdid.value =pidss;
						  		  prdid.name ='prdids[]'+rw;
			    			  		prdid.id='productid'+rw;
										cell1.appendChild(prdid);						
										
//====================================CLOSE PRODUCT ID===========================================================

//========================================START LIST PRICE TEXT BOX ================================================		
	
	var prc = document.createElement("label");
							 prc.innerHTML=pr; prc.id='lp'+rw;							
							 prc.style.width="90%";
							 cell2.appendChild(prc);
	//========================HIDDEN LIST PRICE ============================
	
	var prch = document.createElement("input");
							  		  prch.type = "hidden";
										prch.value =pr;
							  		  prch.name ='pr[]'+rw;
										prch.id='lpr'+rw;								 
								cell2.appendChild(prch);
									
//========================================ClOSE LIST PRICE TEXT BOX ================================================			
//==================================== Start description ==================================
	var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='desid[]'+rw;
							  element10.id='desid'+rw;
							   element10.value=desid;
							  element10.readOnly = true;
								element10.style.width="105%";
								element10.style.display="none";//2015
								cell10.appendChild(element10);		
//================================	Close Description  ======================================						
//========================================START UNIT TEXT BOX ================================================
							
							var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='unt[]'+rw;
							  element10.id='unt'+rw;
							   element10.value=unt;
							  element10.readOnly = true;
								element10.style.width="105%";
								//element10.style.display="none";//2015
								cell4.appendChild(element10);		
								
			//================================HIDDEN UNIT ID ===================-=====
			
			
							var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='unitid[]'+rw;
							  element10.id='unitid'+rw;
							   element10.value=unitid;
							  element10.readOnly = true;
								element10.style.width="105%";
								element10.style.display="none";//2015
								cell4.appendChild(element10);							
								
//========================================ClOSE UNIT TEXT BOX ================================================
//========================================= start Discount =============================================

					var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='discount[]'+rw;
							  element10.id='discount'+rw;
							   element10.value=discount;
							  element10.readOnly = true;
								element10.style.width="105%";
								//element10.style.display="none";//2015
								cell5.appendChild(element10);

//========================================= Close Discount ===========================================

//========================================= start Discount Amount =============================================

					var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='discountamount[]'+rw;
							  element10.id='discountamount'+rw;
							   element10.value=discountamount;
							  element10.readOnly = true;
								element10.style.width="105%";
								element10.style.display="none";//2015
								cell5.appendChild(element10);

//========================================= Close Discount Amount ===========================================
//==++===============================


//========================================= start CGST =============================================

					var elementcgst = document.createElement("input");
							    elementcgst.type = "text";
							  elementcgst.name ='cgst[]'+rw;
							  elementcgst.id='cgst'+rw;
							   elementcgst.value=cgst;
							  elementcgst.readOnly = true;
								elementcgst.style.width="105%";
								//elementcgst.style.display="none";//2015
								cell6.appendChild(elementcgst);

//========================================= Close CGST ===========================================

//========================================= start SGST =============================================

					var elementsgst = document.createElement("input");
							    elementsgst.type = "text";
							  elementsgst.name ='sgst[]'+rw;
							  elementsgst.id='sgst'+rw;
							   elementsgst.value=sgst;
							  elementsgst.readOnly = true;
								elementsgst.style.width="105%";
								//elementsgst.style.display="none";//2015
								cell7.appendChild(elementsgst);

//========================================= Close SGST ===========================================

//========================================= start IGST =============================================

					var elementigst = document.createElement("input");
							    elementigst.type = "text";
							  elementigst.name ='igst[]'+rw;
							  elementigst.id='igst'+rw;
							   elementigst.value=igst;
							  elementigst.readOnly = true;
								elementigst.style.width="105%";
								//elementigst.style.display="none";//2015
								cell8.appendChild(elementigst);

//========================================= Close IGST ===========================================

//========================================= start GST Total =============================================

					var elementgstTotal = document.createElement("input");
							    elementgstTotal.type = "text";
							  elementgstTotal.name ='gstTotal[]'+rw;
							  elementgstTotal.id='gstTotal'+rw;
							   elementgstTotal.value=gstTotal;
							  elementgstTotal.readOnly = true;
								elementgstTotal.style.width="105%";
								//elementgstTotal.style.display="none";//2015
								cell9.appendChild(elementgstTotal);

//========================================= Close GST Total===========================================





//++=================================

//========================================START Remark TEXT BOX ================================================
							
							var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='rem[]'+rw;
							  element10.id='rem'+rw;
							   element10.value=rem;
							  element10.readOnly = true;
								element10.style.width="115%";
								//element10.style.display="none";//2015
								cell10.appendChild(element10);		
								
//========================================ClOSE Remark TEXT BOX ================================================
					
//========================================START QUANTITY TEXT BOX ================================================	
	
	var element2 = document.createElement("input");
							   element2.type = "text";
							    element2.name ='qn[]'+rw;
							    element2.id='qn'+rw;
							element2.readOnly = true;
							element2.value =qn;
							element2.onkeyup = function() { billQunt(element2.id,rw,element2.value); };								
							element2.style.width="105%";
							cell3.appendChild(element2);
							
//========================================CLOSE QUANTITY TEXT BOX ================================================
	
//========================================START TOTAL TEXT BOX ===================================================
	
	var ttl = document.createElement("input");
							    ttl.type = "text";
							  ttl.name ='tp[]'+rw;
							  ttl.id='tp'+rw;
							   ttl.value=nt;
								ttl.readonly;
								ttl.style.width="100%";
								ttl.readOnly = true;
								cell11.appendChild(ttl);
																
//========================================ClOSE TOTAL TEXT BOX ===================================================		
								
//==========================================================Start NET TOTAL TEXT================================								
	
	var ntp = document.createElement("input");
							    ntp.type = "text";
							    ntp.name ='ntpsh'+rw;
								ntp.id='ntpsh'+rw;
								
							   ntp.value=nptl;
								ntp.readonly;
								ntp.style.width="100%";
								ntp.readOnly = true;
									
								cell12.appendChild(ntp);
								
			//====================NET TOAL HIDDEN======================================
					
					var ntph = document.createElement("input");
							  		ntph.type = "hidden";
									ntph.value =nptl;
							  		ntph.name ='np[]'+rw;
							  		ntph.id='netprh'+rw;
								cell12.appendChild(ntph);
								
//==========================================================Close NET TOTAL TEXT================================									

//====================================================START ADDISON SUB TOTAL AND Grand TOTAL ===================
	
	var subtotal=document.getElementById("sub_total").value;
	subtotal=Number(subtotal);

	var gtotal=document.getElementById("gtotal").value;
	gtotal=Number(gtotal);
	
	tph=Number(tph);
	nptl=Number(nptl);	
	var subtl=subtotal+tph;
	var subtl22=gtotal+nptl;
	subtl=Number((subtl).toFixed(2));
	document.getElementById("sub_total").value=subtl;
	document.getElementById("gtotal").value=subtl22;
	
//====================================================CLOSE ADDISON SUB TOTAL AND Grand TOTAL ===================	

				var cgstcheck=document.getElementById("cgst").value;
				var sgstcheck=document.getElementById("sgst").value;
				var igstcheck=document.getElementById("igst").value;
if(cgstcheck!=''){

var bothgst=Number(cgstcheck)+Number(sgstcheck);
//alert(bothgst);
if(bothgst==18){
	
	var cgst_pertotal=document.getElementById("cgst_per_total").value;
	cgstpertotal=Number(cgst_pertotal);
	cgs=Number(gstTotal)/2;	
	var cgst1=cgstpertotal+cgs;
	cgstl2=Number((cgst1).toFixed(2));
	document.getElementById("cgst_per_total").value=cgstl2;
	
	var sgst_pertotal=document.getElementById("sgst_per_total").value;
	sgstpertotal=Number(sgst_pertotal);
	sgst=Number(gstTotal)/2;	
	var sgstl=sgstpertotal+sgst;
	sgstl2=Number((sgstl).toFixed(2));
	document.getElementById("sgst_per_total").value=sgstl2;
	
}else{
	
	var cgst_pertotal=document.getElementById("cgst_per_total_two").value;
	cgstpertotal=Number(cgst_pertotal);
	cgs=Number(gstTotal)/2;	
	var cgst1=cgstpertotal+cgs;
	cgstl2=Number((cgst1).toFixed(2));
	document.getElementById("cgst_per_total_two").value=cgstl2;
	
	var sgst_pertotal=document.getElementById("sgst_per_total_two").value;
	sgstpertotal=Number(sgst_pertotal);
	sgst=Number(gstTotal)/2;	
	var sgstl=sgstpertotal+sgst;
	sgstl2=Number((sgstl).toFixed(2));
	document.getElementById("sgst_per_total_two").value=sgstl2;
}

}else if(igstcheck!=''){
	//alert('3');
if(igstcheck==18){
	var igst_pertotal=document.getElementById("igst_per_total").value;
	igstpertotal=Number(igst_pertotal);
	ig=Number(gstTotal);	
	var gstl=igstpertotal+ig;
	gstl2=Number((gstl).toFixed(2));
	document.getElementById("igst_per_total").value=gstl2;
}else{
	var igst_pertotal_two=document.getElementById("igst_per_total_two").value;
	igstpertotaltwo=Number(igst_pertotal_two);
	ig=Number(gstTotal);	
	var gstl=igstpertotaltwo+ig;
	gstl2=Number((gstl).toFixed(2));
	document.getElementById("igst_per_total_two").value=gstl2;
}

}else{
//alert("hello");	
}

				var cgst_ptotal=document.getElementById("cgst_per_total").value;
				var cgst_ptotal_two=document.getElementById("cgst_per_total_two").value;
				var sgst_ptotal=document.getElementById("sgst_per_total").value;
				var sgst_ptotal_two=document.getElementById("sgst_per_total_two").value;
				var igst_ptotal=document.getElementById("igst_per_total").value;
				var igst_ptotal_two=document.getElementById("igst_per_total_two").value;
				
				var sumallgst=Number(cgst_ptotal)+Number(cgst_ptotal_two)+Number(sgst_ptotal)+Number(sgst_ptotal_two)+Number(igst_ptotal)+Number(igst_ptotal_two);
				
				document.getElementById("gst_total_two").value=sumallgst;
				
	var disamttotal=document.getElementById("discount_amount_total").value;
	disamttotalq=Number(disamttotal);
	disamtp=Number(discountamount);	
	var disamtpa=disamttotalq+disamtp;
	disamtpa1=Number((disamtpa).toFixed(2));
	document.getElementById("discount_amount_total").value=disamtpa1;
				
//====================================START DELETE BUTTON ===========================================================
		
		var delt =document.createElement("img");						
			delt.src ="<?php echo base_url();?>/assets/images/delete.png";
			delt.class ="icon";
			delt.border ="0";
			delt.name ='dlt'+rw;
			delt.id='dlt'+rw;
			delt.onclick= function() { deleteselectrow(delt.id,delt); };				   
			cell13.appendChild(delt);											
		
//====================================ClOSE DELETE BUTTON ===========================================================

//=====================================START EDIT BUTTON=============================================================
		var edt = document.createElement("img");
			edt.src ="<?php echo base_url();?>/assets/images/edit.png";
			edt.class ="icon";
			edt.border ="0";
			edt.name ='ed'+rw;
			edt.id='ed'+rw;
			edt.onclick= function() { editselectrow(delt.id,delt); };			
			cell14.appendChild(edt);
														
//=====================================ClOSE EDIT BUTTON=============================================================
	
	//==================================== scroll Top =================================							          
			document.getElementById('m').scrollTop = 9999999;
 							
//==========================================*START INITIOLIZING** ALL VALUE*=============================================

				document.getElementById("sgst").value="";
				document.getElementById("cgst").value="";
				document.getElementById("igst").value="";
				document.getElementById("gstTotal").value="";
				document.getElementById("prd").value="";				
		        document.getElementById("qn").value=0;
				document.getElementById("desss").value="";
			    document.getElementById("descid").value="";
				document.getElementById("purchasepid").value="";
			    document.getElementById("usunit").value="";
				 document.getElementById("disamt").value=0;
				 document.getElementById("remark").value="";
			    document.getElementById("lph").value=0;
				document.getElementById("lpr").innerHTML=0;
				document.getElementById("nph").value=0;
				document.getElementById("np").innerHTML=0;
				document.getElementById("disa").value=0;
				document.getElementById("dispr").value=0;		
				document.getElementById("ttaxh").value=0;
				document.getElementById("ttax").innerHTML=0;
				document.getElementById("tpr").innerHTML=0;			
				document.getElementById("dscth").value=0;
				document.getElementById("dsct").innerHTML=0;					
					document.getElementById("vat").value=0;

//==========================================*CLOSE INITIOLIZING** ALL VALUE*=============================================						
														
		var rows=document.getElementById("rows").value;
		rows=Number(rows);
		rows=rows+rw;	
		rows=Number(rows);
		document.getElementById("rows").value=rows;			
			document.getElementById("prd").focus();
			}
			else
			{						
			alert('***PRODUCT qty in less then in stock ***');
			 document.getElementById("qn").focus();				
			}
				
   }
  
//=====================================================START SERVICE TEXT========================================
 
 function scharge(v)
 {
	v=Number(v);
	var ic=document.getElementById("ic").value;
	var subt=document.getElementById("sub_total").value;
	sc=(subt*v)/100;
	sc=Number(sc).toFixed(2);
	document.getElementById("sc").value=sc;
	sc= Number(sc);
	subtl=document.getElementById("sub_total").value;
	subtl= Number(subtl);
    gt=subtl+sc;
	gt=Number(gt).toFixed(2);
	document.getElementById("gtotal").value=gt;
	icharge(Number(document.getElementById("icp").value));
} 
function icharge(v)
 {
   v=Number(v);
   gtotal=document.getElementById("gtotal").value;
   subtl=document.getElementById("sub_total").value;
   sc=document.getElementById("sc").value;
   sumg=Number(subtl)+Number(sc);  
   subtl= Number(subtl);
   tl=(v*subtl)/100;
   document.getElementById("ic").value=tl;
   gt=sumg-tl;
   gt=Number(gt).toFixed(2);
   document.getElementById("gtotal").value=gt;
}
 
//====================================ClOSE SERVICE TEXT ===========================================================    
//================================================ UPDATE COST PRICE===================================
function costpriceadd(){
var priceget=document.getElementById("lph").value;
var productid=document.getElementById("productid").value;
var url='addpurprice';
var width='350';
var height='100';
var ev='view';
var id=priceget+"^"+productid;


var width = width;

    var height = height;

    var left = parseInt((screen.availWidth/2) - (width/2));

    var top = parseInt((screen.availHeight/2) - (height/2));

    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;

    myWindow = window.open(url+"?&popup=True&"+ev+"="+id, "subWind"+url, windowFeatures);


}
//============================================== CLOSE UPDATE COST PRICE===================================
//====================================START DELETE ROW ===========================================================
function deleteselectrow(d,r)
 {  
var regex = /(\d+)/g;
nn= d.match(regex)
id=nn;
 var np=document.getElementById("netprh"+id).value; 
    var i = r.parentNode.parentNode.rowIndex;
	     var cnf = confirm('Are You Sure..??? you want to Delete line no.'+(id));
if (cnf== true)
 {
	document.getElementById("invoice").deleteRow(i);	
	var total=document.getElementById("sub_total").value;
 total=Number(total);
 total=total-np;
 total=Number((total).toFixed(2));
 document.getElementById("sub_total").value=total;
 document.getElementById("gtotal").value=total;
 
	}
	
}
//====================================CLOSE DELETE ROW ===========================================================

function editselectrow(d,r)
 {
var regex = /(\d+)/g;
nn= d.match(regex)
//ssalert(nn);
id=nn;
//alert(id);
 var pnm=document.getElementById("prdh"+id).value;
 var lpr=document.getElementById("lpr"+id).value; 
  var desssid=document.getElementById("desid"+id).value;
  var usunit=document.getElementById("unt"+id).value;
  var qn=document.getElementById("qn"+id).value;
  var tot=document.getElementById("tp"+id).value;


var sgst=document.getElementById("sgst"+id).value;
  var igst=document.getElementById("igst"+id).value;
  var gstTotal=document.getElementById("gstTotal"+id).value;





  
  var net=document.getElementById("netprh"+id).value;
   var remarks=document.getElementById("rem"+id).value;
   var discount=document.getElementById("discount"+id).value;
  
  var ef=document.getElementById("ef").value=1;
var ddid=document.getElementById("d");

ddid.id=document.getElementById("spid").value;

ddid.value=pnm;
		
document.getElementById("prd").value=pnm;
document.getElementById("lpr").innerHTML=lpr;
document.getElementById("lph").value=lpr;

document.getElementById("sgst").value=sgst;
document.getElementById("igst").value=igst;
document.getElementById("gstTotal").value=gstTotal;

document.getElementById("tpr").innerHTML=tot;
document.getElementById("tph").value=tot;
document.getElementById("desss").value=desssid;
document.getElementById("usunit").value=usunit;
document.getElementById("qn").value=qn;
document.getElementById("np").innerHTML=net;
document.getElementById("nph").value=net;
document.getElementById("descid").value=discount;
document.getElementById("remark").value=remarks;

document.getElementById("qn").focus();

    var i = r.parentNode.parentNode.rowIndex;
	document.getElementById("invoice").deleteRow(i);	
	var total=document.getElementById("sub_total").value;
 
 total=Number(total);
 
 total=total-net;
 total=Number((total).toFixed(2));
 
 document.getElementById("sub_total").value=total;
 document.getElementById("gtotal").value=total;
		
}

</script>
<script>

function pricehistory(url,width,height,ev,id) {

      //   newWindow = window.open("add-address.php", null, "height=400,width=1000,status=yes,toolbar=no,menubar=no,location=");  

 var id=document.getElementById("contact_id_copy").value;
 
	 
	var width = width;

    var height = height;

    var left = parseInt((screen.availWidth/2) - (width/2));

    var top = parseInt((screen.availHeight/2) - (height/2));

    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
if(id!=''){
    myWindow = window.open(url+"?&popup=True&"+ev+"id="+id, "subWind"+url, windowFeatures);
 }else{
	
	alert("Please Select Vendor");
 }


 }

 </script>
<script>
function contactfun(){
var contactid=document.getElementById("contact_id_copy").value;
var pro=contactid;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getproductcont_fun?con="+pro, false);
  xhttp.send();
  document.getElementById("caseiddiv").innerHTML = xhttp.responseText;
 } 
 
function contactperson(){
var contactid=document.getElementById("contact_id_copy").value;
var pro=contactid;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getcontactper_fun?con="+pro, false);
  xhttp.send();
  document.getElementById("periddiv").innerHTML = xhttp.responseText;
  
} 

function communication_fun(){
var contactid=document.getElementById("caseiddd").value;
var v=document.getElementById("commid").value;
var pro=contactid+"^"+v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getcommunicationfun?comm="+pro, false);
  xhttp.send();
  document.getElementById("commiddiv").innerHTML = xhttp.responseText;
  
} 

function loadDoc() {
var sel = document.getElementById("case_id");
var text= sel.options[sel.selectedIndex].text;

var contactid=document.getElementById("contact_id_copy").value;
var caseid=document.getElementById("case_id").value;
var pro=contactid+"^"+caseid;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getsofunction?con="+pro, false);
  xhttp.send();
  document.getElementById("sodiv").innerHTML = xhttp.responseText;
  //abcde();
//  document.getElementById("totalcaseid").value=text;
}

function sofunction(){
var sel = document.getElementById("case_id");
var text= sel.options[sel.selectedIndex].text;

var contactid=document.getElementById("contact_id_copy").value;
var caseid=document.getElementById("case_id").value;
var idservice=document.getElementById("idser").value;
var pro=contactid+"^"+caseid+"^"+idservice;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getproductcase_fun?con="+pro, false);
  xhttp.send();
  document.getElementById("demo").innerHTML = xhttp.responseText;
  //abcde();
  document.getElementById("totalcaseid").value=text;
}
function savessfun(v){
var rc=document.getElementById("caseiddd").value;
var commid=document.getElementById("commid").value;

if(rc<=commid)
{
v.type="submit";
}
else
{
	alert('Communication Id Aready Exits.');	
}
}
</script> 
</body>
</html>
<?php 
//$this->load->view("softwarefooter")
?>