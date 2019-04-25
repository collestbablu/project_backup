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
 <?php 
	$this->load->view('sidebar');
  ?>

<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<div class="title">
	<h1>New Production Planning</h1> 
<form id="f1" name="f1" method="POST" action="insertBillOfMaterial">
<div class="actions-right">
 <div class="clear"></div>
</div><!--title close-->
<div class="container-right-text">
<div class="table-row">
<div>

		<table class="bordered">
				<tr>
					<th class="text-r">Product Type</th>
					<th><select name="Product_typeid"    <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> required>
              <option value="">----Select ----</option>
              <option value="finish_goods"<?php  if($row->Product_typeid=='finish_goods'){ ?> selected <?php } ?>>Finish Goods</option>
			  <option value="finish_goods"<?php  if($row->Product_typeid=='semi_finish_goods'){ ?> selected <?php } ?>>Semi Finish Goods</option>
             
            </select>
									
										
									<th class="text-r">Product Name</th>
					<th> 
					
					<select name="product_name" id="prdidd"  class="rounded ui fluid search dropdown email" required >
					<option value="">--select--</option>
					 <?php
					 
					 $contQuery=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods'");
					 foreach($contQuery->result() as $contRow)
					{
					  ?>
					  
						<option value="<?php echo $contRow->sku_no; ?>">
						<?php echo $contRow->productname; ?></option>
						<?php } ?>
					</select>
					
					
										</th>	
					<th class="text-r">Date</th>
					<th><input type="date" id="date" required name="date_name" value="<?php echo $detail->date;?>"  style="  min-width: 80%;"/>
					<input type="time" id="time" required name="time" value="<?php ?>" style="  min-width: 80%;"></th>
					
			</tr>
			<tr>
								
										
					
					<th class="text-r">Change Note  No/Remarks</th>
					<th><input type="text"  name="remark_name" value="<?php echo $detail->remark_name;?>" required/></th>
				
				<th class="text-r">Quantity</th>
				<th><input type="text"  name="quantity" id="quantity_id" value="" required/></th>
				<th class="text-r">Lot No</th>
			<th><input type="text"  name="serial_no" value="" required/></th>
				</tr>
		<tr>
			
			<th class="text-r">Machine Name</th>
			<th><select name="machine_name" id="mach_name" onChange="prin(this.value)" <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> >
					<option value="">----Select----</option>
				<?php 
							
							$MQuery=$this->db->query("select * from tbl_machine");
							foreach($MQuery->result() as $fetchQM){

					?>
				<option value="<?php echo $fetchQM->Machine_id; ?>" <?php if($_REQUEST['machine_name']==$fetchQM->Machine_id){?> selected="selected"<?php }?> /><?php  echo $fetchQM->machinename;  ?></option>
					<?php } ?>
			</select></th>
			<th></th>
			<th class="text-r"><input type="button"  name="Search" id="search" onClick="addrow()" value="Search"/></th><th></th><th></th>
		</tr>
		</table>
<!----multiple dropdown search start here--->
<script type="text/javascript" src="<?php echo base_url();?>assets/dropdown-customer/semantic.js"></script>
<link type="text/css" href="<?php echo base_url();?>assets/dropdown-customer/semantic.css" rel="stylesheet" />
<script>

$('.email.dropdown').dropdown();

$('.emails.form').form({
    fields: {
        email: {
            identifier: 'country',
            rules: [
                {
                    type   : 'empty',
                    prompt : 'Please select or add at least one to email address'
                }
            ]
        }
    }
});


</script>
<!---------ends here------->
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
				<td style="width:70px;"><div align="right"><u>Gross Weight</u></div></td>
				<td style="width:65px;"><div align="right"><u>Net Weight</u></div></td>
				
				<td style="width:70px;"><div align="right"><u>Scrap Weight</u></div></td>
				<td style="width:70px;"><div align="right"><u>Action</u></div></td>
			</tr>
		
		</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">

<div id="rowsrch"></div>
		<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice"   class="table table-bordered blockContainer lineItemTable ui-sortable"  >

			<caption></caption>

		</table>

			
</div>

</div>

<!----BILL CLOSE------>
<div class="table-row">

		<table class="bordered"> 

			
			<tr> 
				<td style="width:80%"></td>
				<td>
				<input type="button" value="SAVE"  tabindex="8" id="sv1" onClick="fsv(this)" class="submit">
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


function getXMLHTTP() { //fuction to return the xml http object

var xmlhttp=false;

try{

xmlhttp=new XMLHttpRequest();

}

catch(e) {

try{

xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

}

catch(e){

try{

xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

}

catch(e1){

xmlhttp=false;

}

}

}



return xmlhttp;

}

function prin(mach_name) {	
var prod_name=document.getElementById("prdidd").value;
var date=document.getElementById("date").value;
var time=document.getElementById("time").value;
		var strURL="getAlert?p_name="+prod_name+"&m_name="+mach_name+"&date="+date+"&time="+time;

		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					if (req.status == 200) {
					if(req.responseText=='Machine is running. Please choose another machine'){
alert(req.responseText);
						//document.getElementById('catTypeDiv').innerHTML=req.responseText;						
					}else{
						alert("This Machine is free Now.");
					}
					} else {

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}

	}
</script>

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
    window.location.assign("<?php echo base_url();?>BillOfMaterial/BillOfMaterial/manageBillMaterial");  
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