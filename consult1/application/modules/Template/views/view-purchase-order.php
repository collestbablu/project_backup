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
	<h1>View Template</h1> 
<form id="f1" name="f1" method="POST" action="">
<div class="actions-right">
 <div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<?php
$cusdetail=$this->db->query("select * from tbl_bill_of_material_hdr where bill_of_material_id_hdr='".$_GET['id']."'");
$detail=$cusdetail->row();

$id=$detail->product_name;
$id;

$cusdetail1=$this->db->query("select * from tbl_contact_m where contact_id='$id'");
$detail1=$cusdetail1->row();

?>

<?php
if(@$_GET['id']!=''){
@$branchQuery = $this->db->query("SELECT * from tbl_template_hdr where template_hdr_id='".$_GET['id']."'");
$branchFetch = $branchQuery->row();
// echo $branchFetch->invoiceid;
}

 if(@$_GET['id']!='' ){
 
  ?>         

<td style="display:none"><input type="hidden" name="invoiceid" class="span6 " value="<?php echo $branchFetch->bill_of_material_id_hdr;?>" readonly size="22" aria-required='true' /></td>

<?php } ?>
<div>

		<table class="bordered">
				<tr>
																	
						<th>Product Code</th>
						<th><input type="text" name="product_code" id="product_code" placeholder="Product Code" style="width:80px;" onKeyUp="filterProductCode3()" value="<?php echo $branchFetch->product_code;?>" readonly=""></th>
										
										
									<th class="text-r">Product Name</th>
					<th> 
					<div id="divprocode">
					<select name="product_name" class="rounded" <?php if($_GET['id']!=''){ ?> disabled="disabled" <?php } ?>>
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
		
		</table>

<!--===================================== Start search item row======================================================================-->
		
		<table class="table table-bordered blockContainer lineItemTable ui-sortable" id="lineItemTab" style="margin-bottom:1px">

			<tbody>

				<tr>
					<th style="width:30%;"><div align="center"><b>Item Name </b></div></th>
					<th>  <div align="center"><!--<b> Rate</b>--></div></th>
					<th><div align="center"><b>Unit</b></div></th>
					<th><div align="center"><b>Quantity</b></div></th>
					<th style="width:100px;"> <div align="center"><b>Gross Weight</b></div></th>
					<th style="width:200px; display:none"> <div align="center"><strong>VAT</strong></div></th>

					
					<th><div align="center"><b>Net Weight</b></div></th>
					<th><b>Scrap Weight</b></th>
				
				</tr>
				<tr style="height:20px;">
					<td>
					<input type="hidden" name="productid" id="productid">
					<div style="width:100%; height:28px;" >
					<input type="text" name="prd" readonly=""  onkeyup="getdata()" onChange="getdataT()" onClick="getdata()" id="prd" style=" width:85%;"  placeholder=" Search Items..." tabindex="5" ><!--<img   src="<?php echo base_url();?>/assets/images/search11.png"  onclick="showall2()" onMouseOver="showall12()" />-->

					</div>

					<div id="prdsrch" style="color:black;padding-left:0px; width:22%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
					<?php
				
					$this->load->view('getproduct');

					?>
					</div></td>
					<td style="display:none">
					<center>
					<label name="lpr" id="lpr"   > 0.00 </label> </center>
					<input type="number" readonly="" name="lph" id="lph" />  </td>
					<td></td>
					<td> 
					
						<input type="hidden" id="unitiddd" onFocus="this.select()" style="width:80px;" readonly value="">		
								
								<input type="text" id="usunit" onFocus="this.select()" style="width:80px;" readonly value="">
												
					 <input type="hidden" id="quantity" name="qutyyyyy"  readonly="readonly"></td>
					<td><input type="number" readonly=""  name="qnt" onKeyUp="quan(this.value)" onChange="quan(this.value)" id='qn' value=""   onfocus="this.select()" style="width:80px;"  /><input type="hidden" name="abqt" id="abqt" /></td>

					
					 <td> 
						 <input type="number" name="remark" id="remark" readonly=""  style="width:120px;" placeholder="Gross Weight" value="">	
						 
						 </td>						
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

		
			<input type="text" name="tph" id="tph" readonly placeholder=" Net Weight" />


		<label name="ttax" id="ttax"  style="width:80px;display:none;" > 0.00 (DVAT) </label> 
		<input type="hidden" name="ttaxh" id="ttaxh" />


		<label style="display:none;width:80px;" name="dsct" id="dsct"   > 0.00 (Dis.)</label> 
		<input type="hidden" name="dscth" id="dscth" /></td>


		<td>
		<center>
		<label id="np" style="width:80px;"></label>
		</center>
		<input type="text" name="nph" id="nph" readonly="" /></td>
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
				<td style="width:220px;"><div align="center"><u>Item Name</u></div></td>
				
				<td style="width:50px;  "><div align="right"><u>Unit</u></div></td>

				<td style="width:50px;"> <div align="right"><u>Quantity</u></div></td>
				<td style="width:70px;"><div align="right"><u>Gross Weight</u></div></td>
				<td style="width:65px;"><div align="right"><u>Net Weight</u></div></td>
				
				<td style="width:70px;"><div align="right"><u></u>Scrap Weight</div></td>
				<td style="width:70px;"><div align="right"><u>Action</u></div></td>
			</tr>
		
		</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
<table id="invoice2"  style="width:97.6%;  background:white; border-collapse: separate; border-spacing: 3px 10px;" title="Invoice"  cellspacing="2" cellpadding="0" border="0" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

	<caption> Old Items </caption>

<?php

$inviceQ=$this->db->query("select * from tbl_template_dtl where template_hdr_id='".$_GET['id']."'");

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
				<input type="hidden" name="productid" id="productid">
				<input type="text"  name="<?php $pname="prdh[]"; $pname.=$i; echo $pname;?>" id='<?php $pnameD="prdhD"; $pnameD.=$i; echo $pnameD;?>' value="<?php echo $pfetch->productname;?>^<?php echo $pfetch->Product_id;?>" readonly onblur='testRate<?php echo $i?>();' style="width:100%;border:none" />
				</div>
			</td>

			<td width="110" align="center" style="width:35px;border:none; ">
				
			</td>
			<td width="110" align="center" style="width:35px;border:none; ">
			<input type="text" name="unt[]" id="<?php $quantyD="unt"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $invoiceFetch->unit;?>"   readonly   style="width:100%;" />
			</td>
			<td width="105" align="left" style="width:30px;border:none;">
			
				<input type="number"  name="<?php $qunt="qn[]"; $qunt.=$i; echo $qunt;?>" id='<?php $quntD="qnD"; $quntD.=$i; echo $quntD;?>' onKeyUp="quandata(this.id)" readonly value="<?php echo $invoiceFetch->quentity; ?>" style="width:100%;" />

			</td>

			<td width="124" style="width:10%;border:none;" >
				
				<input type="text" name="<?php $total="rem[]"; $total.=$i; echo $total;?>" readonly id="<?php $total="ttD"; $total.=$i; echo $total;?>" value="<?php echo $invoiceFetch->gross_weight;?>" readonly  onblur="testRate<?php echo $i ?>();"  style="width:100%;"  >
			
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
				<img src="<?php echo base_url();?>/assets/images/edit.png" alt="" border="0" class="icon"  onclick=" editdata('<?php echo $pnameD;?>','<?php echo $ppriceD;?>','<?php echo $quntD;?>','<?php echo $quantyD;?>','<?php echo $total;?>','<?php echo $netD;?>','<?php echo $i;?>','<?php echo $invoiceFetch->bill_of_material_dtl_id; ?>',this)")"/>
			</td>

			<td width="25" align="center" style="width:20px;border:none; ">
				<span id="netPrice0" class="pull-right netPrice">
				<img src="<?php echo base_url();?>/assets/images/delete.png" alt="" border="0" class="icon" onClick="deletedasta(<?php echo $invoiceFetch->bill_of_material_dtl_id; ?>,<?php echo $i; ?>,'<?php echo $invoiceFetch->total;?>',this)" />
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
			<input type="hidden" name="rows" id="rows" value="<?php echo $i; ?>">
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

			<tr style="display:none">

				<td width="60%" class="text-r" style="font-size:14px;">Sub Total</td>        

				<td width="53%" class="text-rig"><input type="text" name="sub_total" id="sub_total" value="<?php echo $branchFetch->balance_total; ?>" style="width:150px; text-align:right; font-size:16px;" onBlur="calculation()" readonly="" /></td>
			
			</tr>  						
			<tr style="display:none">

				<td class="text-r" style="font-size:14px;">Service Charge</td>         

				<td class="text-rig"> 
				<input type="number" tabindex="6" name="service_chargeper" value="" id="scp" style="width:80px; font-size:16px; text-align:right;"   placeholder="0%" onKeyUp="scharge(this.value)"/> 
				%
				   <input type="text" name="service_charge" value="" style="width:150px; font-size:16px; text-align:right;" id="sc" readonly=""/></td>
			</tr>
			<tr style="display:none">
				<td class="text-r" style="font-size:14px;">Gross Discount </td>         

				<td class="text-rig"> <input type="number" tabindex="7" name="installation_chargeper" value="" id="icp" style="width:80px; font-size:16px; text-align:right;" placeholder="0%" onKeyUp="icharge(this.value)" /> %
				  
				  <input type="text" name="installation_charge" value="" id="ic" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
			</tr>
			<tr style="display:none">
				<td class="text-r" style="font-size:14px;">Grand Total</td>         

				<td class="text-rig">  <input type="text" name="nett" id="gtotal" value=""  style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>

			</tr>
			<tr> 
				<td style="width:80%"></td>
				<td>
				
				<a><input type="button" value="Cancel"  tabindex="8" onClick="closeWinCan()" class="submit"></a>
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
		
		    if(xobj)
			 {
			 var obj=document.getElementById("prdsrch");
			 xobj.open("GET","getproduct_fun?con="+product,true);
			
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
function remarkfunwwww()
  {
  
	alert("aa");
				
	  }
//======================================================CLOSE QUANTITY ADDISON Function ============================================

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

document.getElementById("qn").focus();
document.getElementById("prdsrch").innerHTML=" ";
}
}


document.getElementById("qn").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){

document.getElementById("remark").focus();
}
}

document.getElementById("remark").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
var qnq=document.getElementById("qn").value;
var re=document.getElementById("remark").value;
var qq=qnq*re;
document.getElementById("tph").value=qq;
document.getElementById("nph").focus();
}
}

document.getElementById("nph").onkeydown = function (e) {

var entr =(e.keyCode);
if(entr==13){
document.getElementById("tph").value="";
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
		
		icharge(Number(document.getElementById("icp").value));
		scharge(Number(document.getElementById("scp").value));		
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
		  
		  	var rw=document.getElementById("rows").value;
				rw=Number(rw);
				document.getElementById("rows").value=rw+1;
		  
                  var subtl=0;                                               
				var pd=document.getElementById("prd").value;
				
				var pidss=document.getElementById("productid").value;
				
		        var qn=document.getElementById("qn").value;
			    var pr=document.getElementById("remark").value;
				
				var unitid=document.getElementById("unitiddd").value;
				
				var unt=document.getElementById("usunit").value;
				var rem=document.getElementById("remark").value;
				
				var nptl=document.getElementById("nph").value;
				nptl=Number(nptl);
						
				var nt=qn*pr; 
				 
	            document.getElementById("nph").value=qn*pr;    
						
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
						 cell0.style.width="4%";
						  cell1.style.width="30%"; //cell1.style.backgroundColor="red";
						   cell2.style.width="60px";
						    cell3.style.width="60px";
							 cell4.style.width="8%";
							  cell5.style.width="8%";
							   cell6.style.width="8%";   
							   cell7.style.width="60px"; cell7.align="center";
							cell8.style.width="20px";
							cell9.style.width="20px";
							cell10.style.width="40px";
								
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
							 	prc.style.display="none";//2015
							 cell2.appendChild(prc);
	//========================HIDDEN LIST PRICE ============================
	
	var prch = document.createElement("input");
							  		  prch.type = "hidden";
										prch.value =pr;
							  		  prch.name ='pr[]'+rw;
										prch.id='lpr'+rw;								 
								cell2.appendChild(prch);
									
//========================================ClOSE LIST PRICE TEXT BOX ================================================			
					
//========================================START UNIT TEXT BOX ================================================
							
							var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='unt[]'+rw;
							  element10.id='unt'+rw;
							   element10.value=unt;
							  element10.readOnly = true;
								element10.style.width="105%";
								//element10.style.display="none";//2015
								cell3.appendChild(element10);		
								
			//================================HIDDEN UNIT ID ===================-=====
			
			
							var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='unitid[]'+rw;
							  element10.id='unitid'+rw;
							   element10.value=unitid;
							  element10.readOnly = true;
								element10.style.width="105%";
								element10.style.display="none";//2015
								cell3.appendChild(element10);							
								
//========================================ClOSE UNIT TEXT BOX ================================================


//========================================START Remark TEXT BOX ================================================
							
							var element10 = document.createElement("input");
							    element10.type = "text";
							  element10.name ='rem[]'+rw;
							  element10.id='rem'+rw;
							   element10.value=rem;
							  element10.readOnly = true;
								element10.style.width="115%";
								//element10.style.display="none";//2015
								cell5.appendChild(element10);		
								
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
							cell4.appendChild(element2);
							
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
								cell6.appendChild(ttl);
																
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
									
								cell7.appendChild(ntp);
								
			//====================NET TOAL HIDDEN======================================
					
					var ntph = document.createElement("input");
							  		ntph.type = "hidden";
									ntph.value =nptl;
							  		ntph.name ='np[]'+rw;
							  		ntph.id='netprh'+rw;
								cell7.appendChild(ntph);
								
//==========================================================Close NET TOTAL TEXT================================									

//====================================================START ADDISON SUB TOTAL AND Grand TOTAL ===================
	
	var subtotal=document.getElementById("sub_total").value;
	subtotal=Number(subtotal);
	nptl=Number(nptl);	
	var subtl=subtotal+nptl;
	subtl=Number((subtl).toFixed(2));
	document.getElementById("sub_total").value=subtl;
	document.getElementById("gtotal").value=subtl;
	
//====================================================CLOSE ADDISON SUB TOTAL AND Grand TOTAL ===================	

//====================================START DELETE BUTTON ===========================================================
		
		var delt =document.createElement("img");						
			delt.src ="<?php echo base_url();?>/assets/images/delete.png";
			delt.class ="icon";
			delt.border ="0";
			delt.name ='dlt'+rw;
			delt.id='dlt'+rw;
			delt.onclick= function() { deleteselectrow(delt.id,delt); };				   
			cell9.appendChild(delt);											
		
//====================================ClOSE DELETE BUTTON ===========================================================

//=====================================START EDIT BUTTON=============================================================
		var edt = document.createElement("img");
			edt.src ="<?php echo base_url();?>/assets/images/edit.png";
			edt.class ="icon";
			edt.border ="0";
			edt.name ='ed'+rw;
			edt.id='ed'+rw;
			edt.onclick= function() { editselectrow(delt.id,delt); };			
			cell8.appendChild(edt);
														
//=====================================ClOSE EDIT BUTTON=============================================================
	
	//==================================== scroll Top =================================							          
			document.getElementById('m').scrollTop = 9999999;
 							
//==========================================*START INITIOLIZING** ALL VALUE*=============================================

				document.getElementById("prd").value="";				
		        document.getElementById("qn").value=0;
			    document.getElementById("usunit").value="";
				 document.getElementById("remark").value="";
			    document.getElementById("lph").value=0;
				document.getElementById("lpr").innerHTML=0;
				document.getElementById("nph").value="";
				document.getElementById("tph").innerHTML=0;
				document.getElementById("disa").value=0;
				document.getElementById("dispr").value=0;		
				document.getElementById("ttaxh").value=0;
				document.getElementById("ttax").innerHTML=0;			
				document.getElementById("dscth").value=0;
				document.getElementById("dsct").innerHTML=0;					
					document.getElementById("vat").value=0;

//==========================================*CLOSE INITIOLIZING** ALL VALUE*=============================================						
														
		var rows=document.getElementById("rows").value;
		rows=Number(rows);
		rows=rows+rw;	
		rows=Number(rows);
		//document.getElementById("rows").value=rows;			
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


function deletedata(v,r,p,t)
{
 
 var cnf = confirm('Are You Sure..???');

if (cnf== true)
 {
var oRows = document.getElementById('invoice2').getElementsByTagName('tr');
var iRowCount = oRows.length;

if(iRowCount==1)
{

r=0;

}

 var i = t.parentNode.parentNode.parentNode.rowIndex;
	document.getElementById("invoice2").deleteRow(i);
	var subtotal=document.getElementById("sub_total").value;

	subtotal=Number(subtotal);
	nptl=Number(p);
	var subtl=subtotal-nptl;
	subtl=Number((subtl).toFixed(2));
	document.getElementById("sub_total").value=subtl;
	document.getElementById("gtotal").value=subtl;

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
  var usunit=document.getElementById("unt"+id).value;
  var qn=document.getElementById("qn"+id).value;
  var tot=document.getElementById("tp"+id).value;
  
  var net=document.getElementById("netprh"+id).value;
   var remarks=document.getElementById("rem"+id).value;
  
  
  var ef=document.getElementById("ef").value=1;
var ddid=document.getElementById("d");

ddid.id=document.getElementById("spid").value;

ddid.value=pnm;
		
document.getElementById("prd").value=pnm;
document.getElementById("lpr").innerHTML=lpr;
document.getElementById("lph").value=lpr;
document.getElementById("tph").value=tot;
document.getElementById("usunit").value=usunit;
document.getElementById("qn").value=qn;
//document.getElementById("np").innerHTML=net;
document.getElementById("nph").value=net;
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


function editdata(pnm,lpr,qn,quantyD,tot,net,r,v,t)
 {
    var qn1=document.getElementById(qn).value;
	//alert(qn1);
    var pnm1=document.getElementById(pnm).value;
	var q=document.getElementById("qn").value;
	var totP=document.getElementById(tot).value;	
	var netP=document.getElementById(tot).value;
	var quantyDP=document.getElementById(quantyD).value;

  	if(q==0)
	{

	  var lpr1=document.getElementById(lpr).value;
	  document.getElementById("tpr").innerHTML=totP;
	var net1=document.getElementById("np").innerHTML=netP;	
	document.getElementById("nph").value=netP;
	document.getElementById("quantity").value=quantyDP;	
	  var tot1=document.getElementById(tot).value;	 
	  var net1=document.getElementById(net).value;	
	 document.getElementById("prd").value=pnm1;
     document.getElementById("lpr").innerHTML=lpr1;
     document.getElementById("lph").value=lpr1;
     document.getElementById("qn").value=qn1;
     document.getElementById("qn").focus();
    
document.getElementById("ef").value=1;
var ddid=document.getElementById("d");
var sp=document.getElementById("spid").value;
ddid.id=sp;
if(document.getElementById(sp))
{
var flg=1;
}
if(flg==0)
{
document.getElementById("d1").value=pnm1;
}
else
{
document.getElementById(sp).value=pnm1;
}
}
else
 {
    alert('Already in Edit mode..');
    document.getElementById("qn").focus();
  }

  var i = t.parentNode.parentNode.parentNode.rowIndex;
	document.getElementById("invoice2").deleteRow(i);
var total=document.getElementById("sub_total").value;
 total=Number(total);
 //alert(net);
 total=total-tot1;
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