

<?php
$this->load->view("header.php");
	$tableName='tbl_contact_m';
	$location='manage_contact';
			
	$userQuery = $this -> db
	    -> select('*')
	    -> where('contact_id',$_GET['id'])
	    -> or_where('contact_id',$_GET['view'])
	    -> get('tbl_contact_m');
	$branchFetch = $userQuery->row();
	$quryinv=$this->db->query("select *from tbl_sales_order_hdr");
	$getInv=$quryinv->row();

?>
 <!-- Main content -->
  <div class="main-content">
	<!-- Breadcrumb -->
		<ol class="breadcrumb breadcrumb-2"> 
			<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	        <li><a href="#">Master</a></li> 
	        <li class="active"><strong>Add Purchase Order</strong></li>
			
	        <div class="pull-right">
	           <a href="<?=base_url('purchaseorder/manage_purchase_order');?>" class="btn btn-sm btn-black btn-outline"><i class="fa fa-list" aria-hidden="true"></i>Manage Purchase Order</a>
	          <!--  <button type="button" class="btn btn-sm btn-black btn-outline delete_all" ><i class="fa fa-trash-o"></i>Delete</button> -->
	        </div>
		</ol>
        <div class="row">
				<div class="col-lg-12" id="listingData">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title">Add Purchase Order</h4>
							<div id="massageData" class="text-center " style="font-size: 15px;color: red;position: absolute;
    left: 37%;"></div> 
							
						      <ul class="panel-tool-options"> 
								<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
								<li><a data-rel="reload"><i class="icon-arrows-ccw"></i></a></li>
								<!-- <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li> -->
							  </ul> 
						 </div>
		<form action="insertPurchaseOrder" method="post">
		 <div class="panel-body">
          <div class="row">
			<div class="col-lg-12">

				<div class="panel panel-default">
				   <div class="panel-body">
				   <div class="row">
					 <div class="form-group">
					  <div class="col-sm-6">
					 	<label for="company">STORAGE LOCATION:</label>
					    <select name="company"  class="form-control" id="company"  onchange="get_suplier(this.value);" required>
						   <option value="">----Select ----</option>
							<?php 
								$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=22");
								foreach ($sqlprotype->result() as $fetch_protype){
							?>
					 	   <option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
							<?php } ?>
	                    </select>

					  </div>
                      
                       <div class="col-sm-6">
						  <label for="supplier_contact">SUPPLIER CONTACT:</label>
						   <select name="supplier_contact" required  id="supplier_contact" class="form-control">
							<option value="">Select</option>
							<?php
							$contQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='4'");
							foreach($contQuery->result() as $contRow)
							{
							?>
								<option value="<?php echo $contRow->contact_id; ?>">
								<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?>
								</option>
							<?php } ?>
					   	 </select>
						<!--   <input type="text"  class="form-control" required name="supplier_contact" value="" id="supplier_contact" /> -->
					    </div>


					  </div>
					</div>
				<div class="row">
					<div class="form-group">

					   <div class="col-sm-3">
					 	<label for="po_order">PURCHASE ORDER:</label>
					    <input type="text"  class="form-control" id="po_order"  name="po_order" value="" onblur="CheckPo(this.value,this);"  autocomplete="off" required  />
                       </div>
                       <?php
						$this->load->helper('date');

 $date = date('Y-m-d'); 

						?>
					   <div class="col-sm-3">
						<label for="order_date">ORDER DATE:</label>
						  <input type="date"  class="form-control" id="order_date"  name="order_date" value="<?=$date;?>" />
					    </div>
					    <div class="col-sm-3">
						<label for="contact_id_copy">PURCHASER CONTACT:</label>
						<select name="vendor_id"   id="contact_id_copy" required class="form-control">
							<option value="" >Select</option>
							<?php
							$contQuery=$this->db->query("select * from tbl_contact_m where status='A' and group_name='5'");
							foreach($contQuery->result() as $contRow)
							{
							?>
								<option value="<?php echo $contRow->contact_id; ?>">
								<?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?>
								</option>
							<?php } ?>
						</select>
					    </div>

						
					   
					  
					  	<div class="col-sm-3">
						<label for="fob_incoterms">FOB/INCOTERMS:</label>
							<input type="text" name="fob_incoterms" id="fob_incoterms" class="form-control"   >
                       </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="form-group">

						<div class="col-sm-3">
						 <label for="revised_date">REVISED DATE:</label>
						  <input type="date"  class="form-control"  id="revised_date" name="revised_date" value="" />
					    </div>

					     <div class="col-sm-3">
						  <label for="revised_by">REVISED BY:</label>
						  <input type="text"  class="form-control"  id="revised_by" name="revised_by" value="" />
						 </div>

						<div class="col-sm-3">
						<label for="ship_method">SHIP METHOD:</label>
						<input type="text" name="ship_method" id="ship_method" class="form-control"   >
					    </div>
					   
					  
					  	<div class="col-sm-3">
						 <label for="ship_vip">SHIP VIA:</label>
						 <input type="text" name="ship_vip" id="ship_vip" class="form-control"   >
                        </div>
                    </div>
 				</div>
 				<div class="row">
                    <div class="form-group">
                    	
						<div class="col-sm-3">
						 <label for="supplier">SUPPLIER SITE ID:</label>
						  <input type="text"  class="form-control"  name="supplier" value="" id="supplier" />
					    </div>
					    <div class="col-sm-3">
						<label for="terms">TERMS:</label>
						<input type="text" name="terms"  id="terms" class="form-control"   >
					    </div>
						<div class="col-sm-3">
						<label for="freight">FREIGHT:</label>
						  <input type="text" name="freight" id="freight" class="form-control"   >
					    </div>
					    <div class="col-sm-3">
						</div>
					</div>
			       </div>
				  </div>
				</div>
			</div>
		</div>
	<!-- <div class="table-responsive-">
   </div> -->
        <div class="table-responsive ">
				<table class="table table-striped table-bordered table-hover" >
					<tbody>
					 <tr class="gradeA">
						<th>Product Name</th>
						<th>Unit</th>
						<th>Quantity</th>
						<th>Actual Qty</th>
						<th colspan="2"></th>
						<!-- <th>Ordered Qty</th> -->
						<!-- <th>Effective Qty</th> -->
					 </tr>

					<tr class="gradeA">
						<td style="width:280px;">
							<div class="input-group"> 
							<div style="width:100%; height:28px;">
							<input type="text" name="prd"  onkeyup="getdata()" class="form-control" onClick="getdata()" id="prd" style=" width:230px;"  placeholder=" Search Items..." autocomplete="off">
							<input type="hidden"  name="pri_id" id='pri_id'  value="" style="width:80px;"  />
								<!-- <img  style="display:none" src="<?php echo base_url();?>/assets/images/search11.png"  onClick="openpopup('<?=base_url();?>SalesOrder/all_product_function',1200,500,'view',<?=$sales[$i]['1'];?>)" /> -->
						    </div>
	                        </div>
							<div id="prdsrch" style="color:black;padding-left:0px; width:83%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
							 <?php
							   $this->load->view('getproduct');
	                         ?>
							</div>
						</td>
                        <td>
						<input type="text" readonly="" id="usunit" style="width:100px;" class="form-control"> 
						</td>
	                    <td>
						  <b id="lpr"></b>
						  <input type="number" step="any" id="lph" min="1"  value="" class="form-control" style="width:100px;">
					    </td> 
						<td><input type="text"   id="qty_stock" class="form-control"  style="width:100px;" readonly></td>
						<td colspan="2"></td>
						<!-- <td><input type="text"   id="ordered_qty" class="form-control"   style="width:70px;" readonly></td>
						<td><input type="text"   id="effective_qty" class="form-control" style="width:70px;"readonly / ></td> -->
					</tr>
				  </tbody>
			</table>
        </div>
		
		<div class="" id="style-3-y">
		<div class="force-overflow-y">
		<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover dataTables-example_1" id="invo">
		<thead>
		<tr>
		<th class="tdcenter"> Sl No</th>
		<th class="tdcenter">Item Number & Description</th>
		<th class="tdcenter">UOM</th>
		<th class="tdcenter">Ordered Qty</th>
		<!-- <th class="tdcenter">Actual Qty</th> -->
		<th class="tdcenter">Action</th>
		</tr>
		</thead>
		<tbody  id="invoice">

		</tbody>
		</table>
		</div>	  

		</div>
		</div><!--scrollbar-y close-->		

		


		<!-- <div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid "> -->
		


				<!-- <div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
				<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

				<tr></tr>
				</table> -->
			<!-- </div> -->
		</div>

<input type="hidden" name="rows" id="rows">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />

<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" >
	<tbody>
	<!-- 	<tr class="gradeA">
		<th>Sub Total</th>
		<th>&nbsp;</th>
		<th>
		<input type="text" placeholder="Placeholder" id="sub_total" readonly="" name="sub_total" class="form-control">
		</th>
		</tr>

		

        <tr class="gradeA">
		<th>Grand Total</th>
		<th>&nbsp;</th>
		<th><input type="number" readonly="" step="any" id="grand_total" name="grand_total" placeholder="Placeholder" class="form-control"></th>
		</tr>
		<tr class="gradeA">
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		</tr>
		<tr class="gradeA">
		<th> -->

		<!-- <th>&nbsp;</th>
		<th >
		
		</th></th> -->
		</tr>
	  </tbody>
    </table>
   </div>
   
   </div>
   <div class ="pull-right">
   <input class="btn btn-sm btn-black btn-outline" type="button" value="SAVE"   id="sv1" onclick="fsv(this)" >
		&nbsp;<a href="<?=base_url();?>purchaseorder/manage_purchase_order" class="btn btn-sm btn-black btn-outline">Cancel</a>
   </div>
</form>
  </div>
  </div>
</div>
<!-- /.modal-dialog -->

<script>
//add item into showling list
	window.addEventListener("keydown", checkKeyPressed, false);
	      //funtion to select product
	      function checkKeyPressed(e) {
			      var s=e.keyCode;
			      var ppp   = document.getElementById("prd").value;
			      var sspp  = document.getElementById("spid").value;//
			      var ef    = document.getElementById("ef").value;
					ef      = Number(ef);
			
			      var countids = document.getElementById("countid").value;
			      for(n=1;n<=countids;n++)
			       {
			          document.getElementById("tyd"+n).onkeyup  = function (e) {
			          var entr =(e.keyCode);
			          if(entr==13){
			            document.getElementById("lph").focus();
			            document.getElementById("prdsrch").innerHTML=" ";
	                  }
			       }
			     }
    
            document.getElementById("lph").onkeyup = function (e) {
            var entr = (e.keyCode);
            if (e.keyCode == "13")
	        {
	          e.preventDefault();
              e.stopPropagation();
		   if(ppp!=='' || ef==1)
	        {
        	 adda();	  	
	   		 var ddid = document.getElementById("spid").value;
		     var ddi  = document.getElementById(ddid);
		     ddi.id   = "d";
            }
	       else
	       {
	        alert("Enter Correct Product");
	       }
	       return false;
       }
    }

}




/////////////////////////////////////////////

function fsv(v)
{
var rc=document.getElementById("rows").value;
if(rc!=0)
{
v.type="submit";
}
else
{
	alert('No Item To Save..');	
}
}


function getdata()
	{
		// alert('sss');
	currentCell          = 0;
    var product1         = document.getElementById("prd").value;	 
    var product          = product1;
	var company          = document.getElementById("company").value;
	var supplier_contact = document.getElementById("supplier_contact").value;
   // var state        = document.getElementById("state").value;
   //alert(product);
      var prdId            =  getvalues();
      
	if(company =='')
	{
		alert('Please Select Storage Location !');
		document.getElementById("company").focus();
	}	
	if(supplier_contact=='')
	{
		alert('Plaese Select Sipplier Contact !');
		document.getElementById("supplier_contact").focus();
	}
		
	if(xobj)
    {
		var obj=document.getElementById("prdsrch");
		//alert("getproduct?con="+product1+"&con_id="+company+"&supplier_contact="+supplier_contact);
		xobj.open("GET","getproduct?con="+product+"&con_id="+company+"&supplier_contact="+supplier_contact+"&commonproduct="+prdId,true);
		xobj.onreadystatechange=function()
		{
		if(xobj.readyState==4 && xobj.status==200)
		  {
			console.log(xobj.responseText);
			obj.innerHTML=xobj.responseText;
		  }
		}
	}
	xobj.send(null);
}
  
////////////////////////////////////////////////////

 function slr(){
		var table    = document.getElementById('invoice');
        var rowCount = table.rows.length;
		  for(var i=1;i<rowCount;i++)
		  {    
              table.rows[i].cells[0].innerHTML=i;
		  }
   }  
        //////////////////////////////////////////////////////////////

    var rw=0;
	function adda()
		{ 
		    var qn      =   document.getElementById("qty_stock").value;
		    var unit    =   document.getElementById("usunit").value;  // unit value
			var lph     =   document.getElementById("lph").value;     // enter quantity
		        //default
			var rows    =   document.getElementById("rows").value;     //row value
			var pri_id  =   document.getElementById("pri_id").value;  //item id
				var pd 		=   document.getElementById("prd").value;    //item id
		   	    var table   =   document.getElementById("invoice");
				var rid     =   Number(rows)+1;
	
				document.getElementById("rows").value=rid;

				if(lph == 0 || lph == ""){
                   alert('Please Enter Quantity Value !');
                   return false;
                }
				//totalSum();	
				clear();

                currentCell = 0;
              if(pd!="" && qn!=0 || qn==0)
			     {
			       //alert(pd);
			       var indexcell=0;
			       var row = table.insertRow(-1);
			       rw = rw+0;
				   //cell 0st

				    var cell=cell+indexcell;		
				 	cell = row.insertCell(0);
					//cell.style.width=".20%";
					cell.align="center"
				  	cell.innerHTML=rid;
				
				
				    //cell 1st item name
	                indexcell=Number(indexcell+1);		
	                var cell=cell+indexcell;	
	 		
	                cell = row.insertCell(indexcell);
				    //cell.style.width = "11%";
				    cell.align = "center";

    //============================item text ============================

				    var prd = document.createElement("input");
					prd.type="text";
					prd.border ="0";
					prd.value=pd;
					prd.setAttribute("class", "form-control");	
					prd.name='pd[]';//
					prd.id='pd'+rid;//
					prd.readOnly = true;
					prd.style="text-align:center";  
					//	prd.style.width="100%";
					prd.style.border="hidden"; 
					cell.appendChild(prd);
				    var priidid = document.createElement("input");
					priidid.type="hidden";
					priidid.border ="0";
					priidid.value=pri_id;	
					priidid.name='main_id[]';//
					priidid.id='main_id'+rid;//
					priidid.readOnly = true;
					priidid.style="text-align:center";  
					//	priidid.style.width="100%";
					priidid.style.border="hidden"; 
					cell.appendChild(priidid);
							
							
					var unitt = document.createElement("input");
					unitt.type="hidden";
					unitt.border ="0";
					unitt.value=unit;	
					unitt.name='unit[]';//
					unitt.id='unit'+rid;//
					unitt.readOnly = true;
					unitt.style="text-align:center";  
	//	unitt.style.width="100%";
					unitt.style.border="hidden"; 
					cell.appendChild(unitt);
					
						// ends here
	
	
	//#################cell 2nd starts here####################//
	
	
	
	
	indexcell = Number(indexcell+1);		
	var cell  = cell+indexcell;
        cell  = row.insertCell(indexcell);
			//	cell.style.width="3%";
			//	cell.style.display="none";
				cell.align="center"
				var qty_stockK = document.createElement("input");
							qty_stockK.type         = "text";
							qty_stockK.border       = "0";
							qty_stockK.value        = unit;	    
							qty_stockK.name         ='unit[]';
							qty_stockK.id           ='unit'+rid;
							qty_stockK.readOnly     = true;
							qty_stockK.style        = "text-align:center";
						    qty_stockK.style.border ="hidden"; 
							cell.appendChild(qty_stockK);
	
	
	
	
	
	indexcell = Number(indexcell+1);		
	var cell  = cell+indexcell;
        cell  = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"
				var salepr = document.createElement("input");
							salepr.type="text";
							salepr.border ="0";
							salepr.value=lph;	    
							salepr.name ='qty[]';
							salepr.id='qty'+rid;
							salepr.readOnly = true;
							salepr.style="text-align:center";
						//	salepr.style.width="100%";
							salepr.style.border="hidden"; 
							cell.appendChild(salepr);
					

	
	
	
	
	
		// //==============================close 2nd cell =========================================
		
		// //#################cell 3rd starts here####################//					
	 //    indexcell=Number(indexcell+1);		
	 //    var cell=cell+indexcell;		
	 //    cell = row.insertCell(indexcell);
		// 		cell.style.width="3%";
		// 		cell.align="center"
		// //========================================start qnty===================================	
		// 		        var qtty = document.createElement("input");
		// 					qtty.type         = "text";
		// 					qtty.border       = "0";
		// 					qtty.value        = qn;	    
		// 					qtty.name         = 'actual_qty[]';
		// 					qtty.id           = 'actual'+rid;
		// 					qtty.readOnly     = true;
		// 					qtty.style        = "text-align:center";
		// 					//qtty.style.width="100%";
		// 					qtty.style.border = "hidden"; 
		// 					cell.appendChild(qtty);
								
		//======================================defult Edit And Delete========================================
		
		        indexcell=Number(indexcell+1);		
		        var cell=cell+indexcell;
		        var imageloc="/mr_bajaj/";
		        var cell = row.insertCell(indexcell);
				//cell.style.width="3%";
				cell.align="center";
				

					
		            var edt = document.createElement("button");
						edt.type ="button";
						edt.setAttribute("class", "btn btn-xs btn-black");
						edt.name ='ed';
						edt.style="margin-right: 10px;";
						edt.id='ed'+rid;
						edt.innerHTML='<i class="icon-pencil"> </i>';
						edt.onclick= function() { editselectrow(delt.id,edt); };
						cell.appendChild(edt);

   

			        var delt =document.createElement("button");
			        	delt.type ="button";
						delt.setAttribute("class", "btn btn-xs btn-black");
						delt.innerHTML='<i class="icon-trash"> </i>';
						delt.name ='dlt';
						delt.id='dlt'+rid;
						delt.onclick= function() { deleteselectrow(delt.id,delt); };
					    cell.appendChild(delt);
               
             $("#style-3-y").addClass("scrollbar-y");
				
			}
			else
			{
			   if(qn==0)
			 	{
				  alert('***Quantity Can not be Zero ***');
				}
				else
				{
			      alert('***Please Select PRODUCT ***');
			    }
	        }

}

  function clear()
   {
    // this finction is use for clear data after adding invoice
    document.getElementById("qty_stock").value = "";
	document.getElementById("usunit").value    = "";  // unit value
	document.getElementById("lph").value       = "";     // enter quantity
	document.getElementById("prd").value       = "";
    document.getElementById("pri_id").value    = "";
    document.getElementById("prd").focus();	
   }






////////////////////////////////// starts edit code ////////////////////////////////


		function editselectrow(d,r) //modify dyanamicly created rows or product detail
		 {
		 	//alert(d);
	 	    var regex = /(\d+)/g;
			nn = d.match(regex)
			id = nn;
		    if(document.getElementById("prd").value!=''){
				document.getElementById("lph").focus();
				alert("Product already in edit Mode");
			 	return false;
		    }
           // ####### starts ##############//
            var pd       = document.getElementById("pd"+id).value;
		    var main_id  = document.getElementById("main_id"+id).value;
	        var unit     = document.getElementById("unit"+id).value;
            var qn       = document.getElementById("qty"+id).value;
		 //	var actual   = document.getElementById("actual"+id).value;
		
			document.getElementById("pri_id").value    = main_id;
		    document.getElementById("prd").value       = pd;
			document.getElementById("usunit").value    = unit;
			document.getElementById("lph").value       = lph;
			//document.getElementById("qty_stock").value = actual;
			
            // ####### ends ##############//
			//editDeleteCalculation();
            // $("#"+d).parent().parent().remove();
            // document.getElementById("prd").focus();

            $(r).parent().parent().remove();
            var rows    = document.getElementById("rows").value; 

		    var rid     = Number(rows)-1;
		    
            document.getElementById("rows").value = rid;
            document.getElementById("prd").focus();

		}

////////////////////////////////// ends edit code ////////////////////////////////




////////////////////////////////// starts delete code ////////////////////////////////

function deleteselectrow(d,r) //delete dyanamicly created rows or product detail
 {
	// alert('sasd');
	var regex = /(\d+)/g;

	nn = d.match(regex)
	id = nn;
		if(document.getElementById("prd").value!=''){
			document.getElementById("qn").focus();
		    alert("Product already in edit Mode");
		    return false;
		}
		
        // var i = $("#"+d).parent().parent();
        // var cnf = confirm('Are You Sure..??? you want to Delete line no1.'+(id));
		// if (cnf== true)
		//  {
		//  var rows    = document.getElementById("rows").value; 
		//  var rid     = Number(rows)-1;
		//  document.getElementById("rows").value = rid;
		   
		//  i.remove();
		 
		// }

		var i = $(r).parent().parent();
        var cnf = confirm('Are You Sure..??? you want to Delete line no1.'+(id));
		if (cnf== true)
		 {
            var rows    = document.getElementById("rows").value; 
		 	var rid     = Number(rows)-1;
            document.getElementById("rows").value = rid;
            i.remove();
		  
		}
			
}
		////////////////////////////////// ends delete code ////////////////////////////////



// ##### ends ###########



  
  
  
  



function getVendor()
{

var state=document.getElementById("state").value;
var xhttp = new XMLHttpRequest();
xhttp.open("GET", "getVendor?state="+state, false);
xhttp.send();
document.getElementById("contact_id_copy").innerHTML = xhttp.responseText;
	
	
}

      
</script>
<?php
$this->load->view("footer.php");
?>

<script type="text/javascript">
function getvalues(){
    var inps  = document.getElementsByName('main_id[]');
    var myarr = [];
	    for (var i = 0; i <inps.length; i++) {
	      var inp = inps[i];
	      //alert("main_id["+i+"].value="+inp.value);
	      myarr.push(inp.value);
	    }
       var webcamval = myarr;
    return webcamval.join(",");
}

   function CheckPo(val,ths){
   	$("#massageData").empty().append("").fadeIn();
		 	$.ajax({   
			    type: "POST",  
				url: "CheckPurchaseOrderNo",  
				cache:false,  
				data: {'id':val},  
				success: function(data)  
				{  
			      $("#massageData").empty().append(data).fadeIn();
			      if(data != ""){
				    $('#po_order').val("");
				   }
				}   
		});
   }
   function get_suplier(val){
       	$.ajax({  
		    type: "POST",  
			url: "getSuplier",  
			cache:false,  
			data: {'id':val},  
			success: function(data)  
			{
				//supplier_contact
				$("#supplier_contact").empty().append(data).fadeIn();
				//alert(data);
				//console.log(data);
			}   
	    });
    }
</script>