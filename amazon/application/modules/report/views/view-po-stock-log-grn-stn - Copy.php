<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_sales_order_hdr';

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}

$pri_col='purchaseid';
$table_name='tbl_purchase_order_hdr';

?>
<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=42epwf1jarbwose89sqt3dztyfu7961g4cs5xoib4kordvbd"></script>
  <script>tinymce.init({ selector:'#tem' });</script>
<style type="text/css">
/*	.error{
		position: absolute;
    	z-index: 9999;
    	background: #fff;
    	top: -2px;
    	right: 17px; 
   }*/
</style>
    <!-- Main content -->
	<div class="main-content">
			<!-- Breadcrumb -->
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
                <li><a class="active">Manage Purchase Order</a></li> 
              <!--   <li ><strong>Add Item11</strong></li> -->
			
                <div class="pull-right">
                   <a class="btn btn-sm btn-black btn-outline" href="<?=base_url();?>purchaseorder/add_purchase_order"><i class="fa fa-plus" aria-hidden="true"></i>Add Purchase Order</a>
                  <!--  <button type="button" class="btn btn-sm btn-black btn-outline delete_all" ><i class="fa fa-trash-o"></i>Delete</button> -->
               </div>
			</ol>
	     <div class="row">
	   	   <div class="col-lg-12" id="listingData">
			 <div class="panel panel-default">
				<div class="panel-heading clearfix">
				  <h4 class="panel-title">Manage Purchase Order</h4>
				  <ul class="panel-tool-options"> 
					<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
					<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
				  </ul> 
				</div>
						
				<div class="panel-body" style="padding-bottom:0px;">
				<div class="row">

				<div class="col-sm-5">
				<label>Show 
                <select   name="DataTables_Table_0_length" url="<?=base_url();?>master/Item/manage_item?<?='sku_no='.$_GET['sku_no'].'&productname='.$_GET['productname'].'&contract='.$_GET['contract'].'&usages_unit='.$_GET['usages_unit'].'&comodity='.$_GET['comodity'].'&supplier='.$_GET['supplier'].'&filter='.$_GET['filter'];?>" id="entries" class="form-control">
				<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
				<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
				<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
				<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
				</select> entries
				</label>
				<p>Showing <?=$dataConfig['page']+1;?>  to  <?php
				$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
				echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
				?> of <?=$dataConfig['total'];?> Entries</p>
				</div>
				
                <div class="col-sm-7">
				<div class="pull-right">
				<label>Search: &nbsp;&nbsp;<input type="text" id="searchTerm" class="form-control input-sm" onkeyup="doSearch()"  placeholder="What you looking for?" aria-controls="" style="float:right; width:auto;"></label>&nbsp;&nbsp;
				<!-- <button type="button" class="btn btn-sm btn-black btn-outline">Copy</button> -->
				<button type="button" class="btn btn-sm btn-black btn-outline" onclick="exportTableToExcel('tblData')">Excel</button>
				<!-- <button type="button" class="btn btn-sm btn-black btn-outline">PDF</button>
				<button type="button" class="btn btn-sm btn-black btn-outline">Column visibility</button> -->
				</div>
				</div>
				</div> 
				
				</div>
						
				<div class="panel-body">
                <div class="table-responsive">
		         <table class="table table-striped table-bordered table-hover " >
		<thead>
		<tr>
		<th class="tdcenter"> Sl No</th>
		<th class="tdcenter">Item Number & Description</th>
		<th class="tdcenter">UOM</th>
        
		<th class="tdcenter">GRN Qty</th>
       <th class="tdcenter">STN Qty</th>
       
      
		
		<th>Balance</th>
		</tr>
		</thead>
        
      <?php
		$productQuery=$this->db->query("select * from tbl_inbound_outbound_details where poid='".$_GET['poid']."' and product_id='".$_GET['pid']."' ");
			$i=1;
		foreach($productQuery->result() as $getProduct){
		####### get product #######
		$productStockQuery=$this->db->query("select *from tbl_product_stock where Product_id='$getProduct->product_id'");
		$getProductStock=$productStockQuery->row();
		####### ends ########
		
		####### get UOM #######
		$productUOMQuery=$this->db->query("select *from tbl_master_data where serial_number='$getProductStock->usageunit'");
		$getProductUOM=$productUOMQuery->row();
		####### ends ########
		
		?>
       <tr class="gradeX odd" role="row">
                                            <td class="size-60 text-center sorting_1"><?=$i;?></td>
																								
											<td><?=$getProductStock->productname;?>
                                            
                                            
                                            <input type="hidden"  name="productid[]" value="<?=$getProduct->productid;?>" class="form-control">
                                            </td>
											<td><?=$getProductUOM->keyvalue;?></td>
                                           
						
                     
                                        
										
                                               <td><?php if($getProduct->type=='inbound'){?><?php echo $getProduct->qty; }?>
                                               </td>
                                               <td><?php if($getProduct->type=='outbond'){?><?php echo $getProduct->qty; }?></td>
                                               <td>
                                               <?php if($getProduct->type=='inbound'){?><?php echo $c-=$getProduct->qty;?><?php }elseif($getProduct->type=='inbound'){echo $c+=$getProduct->qty;}else {?><?php echo $c; } ?>
                                               </td>
                                               
                                            
                                            <input type="hidden" name="inboundrhdr" value="<?=$getProduct->purchaseorderhdr?>" />
                                            </td>
                                           
						</tr>
                        <?php 
						$i++;
						}?>
		</table>
	
                 </div>
					<nav aria-label="Page navigation" class="pull-right">
			             <?php echo $pagination; ?>
			        </nav> 
                  </div>
               </div>
              </div>
            </div>

               <div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content" >
						<div class="modal-header">
						<button  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Purchase Order</h4>
						<div id="msgdata" class="text-center " style="font-size: 15px;color: red;"></div> 
						</div>
						<form  class ="editPurchaseOrder">
                         <div class="panel-body" id ="purchaseData">
					     </div>
                        </form>
							
					 </div><!-- /.modal-content -->
			      </div><!-- /.modal-dialog -->
             </div>
             <div id="modal-1" class="modal fade" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content" >
						<div class="panel-body" id ="purchaseDataView">
					    </div>

					  </div><!-- /.modal-content -->
			      </div><!-- /.modal-dialog -->
             </div>

              <div id="modal-2" class="modal fade" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content">
						<div class="panel-body" id ="inbondlogs">
							
					    </div>
                      </div><!-- /.modal-content -->
			      </div><!-- /.modal-dialog -->
             </div>

    <script>




//add item into showling list
	window.addEventListener("keydown", checkKeyPressed, false);
	      //funtion to select product
	      function checkKeyPressed(e) {
                 // e.preventDefault();
			      var s=e.keyCode;
			      var ppp   = document.getElementById("prd").value;
			      var sspp  = document.getElementById("spid").value;//
			      var ef    = document.getElementById("ef").value;
					ef      = Number(ef);
			
			     var countids = document.getElementById("countid").value;
			     // alert(countids);
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

function deleteselectrow(d,r) //delete dyanamicly created rows or product detail
 {
 	//alert('sdd');
	var regex = /(\d+)/g;
    nn = d.match(regex);
    id = nn;

	if(document.getElementById("prd").value!=''){
			document.getElementById("qn").focus();
	    alert("Product already in edit Mode");
	    return false;
	}
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


////////////////////////////////// starts edit code ////////////////////////////////


	function editselectrow(d,r) //modify dyanamicly created rows or product detail
	{
		var regex = /(\d+)/g;
		nn        = d.match(regex)
		id        = nn;
		
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
	    // var actual   = document.getElementById("actual"+id).value;
		
		document.getElementById("pri_id").value    = main_id;
		document.getElementById("prd").value       = pd;
		document.getElementById("usunit").value    = unit;
		document.getElementById("lph").value       = qn;
	    //document.getElementById("qty_stock").value = actual;
			
        $(r).parent().parent().remove();
        var rows    = document.getElementById("rows").value; 
		var rid     = Number(rows)-1;
        document.getElementById("rows").value = rid;
        document.getElementById("prd").focus();
	}

////////////////////////////////// ends edit code ////////////////////////////////

  function getdata()
	{
    // alert('sss');
	currentCell          = 0;
    var product1         = document.getElementById("prd").value;	 
    var product          = product1;
	var company          = document.getElementById("company").value;
	var supplier_contact = document.getElementById("supplier_contact").value;
    // var state         = document.getElementById("state").value;
    //alert(company);
    var prdId            =  getvalues();
	if(company=='')
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
	//	alert("getproduct?con="+product1+"&con_id="+company+"&supplier_contact="+supplier_contact);
		xobj.open("GET","getproduct?con="+product+"&con_id="+company+"&supplier_contact="+supplier_contact+"&commonproduct="+prdId,true);
		xobj.onreadystatechange=function()
		{
		if(xobj.readyState==4 && xobj.status==200)
		  {
			//console.log(xobj.responseText);
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
				var rows    = document.getElementById("rows").value;     //row value
				var pri_id  = document.getElementById("pri_id").value;  //item id
				var pd 		= document.getElementById("prd").value;    //item id
		   	    var table   = document.getElementById("invoice");
				var rid     = Number(rows)+1;
              
              	if(lph == 0 || lph == ""){
                   alert('Please Enter Quantity Value !');
                   return false;
                }

				document.getElementById("rows").value=rid;
				//totalSum();	
				
                currentCell = 0;
               if(pd!="" && qn!=0 || qn==0)
			     {

			     	clear();
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
					prd.setAttribute("class", "form-control");
					prd.value=pd;	
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
						edt.onclick= function() { editselectrow(edt.id,edt); };
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
				  document.getElementById("prd").focus();
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









////////////////////////////////// starts delete code ////////////////////////////////




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
<script>

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

 function viewPO(viewId){

 	$.ajax({   
	    type: "POST",  
		url: "view_purchase_order",  
		cache:false,  
		data: {'id':viewId},  
		success: function(data)  
		{  
		// /alert(data); 
		// $("#loading").hide();  
		 $("#purchaseDataView").empty().append(data).fadeIn();
		//referesh table
		}   
	});

 }

function inbondviewlog(poid){
    $.ajax({   
	    type: "POST",  
		url: "ajax_inbondview",  
		cache:false,  
		data: {'id':poid},  
		success: function(data)  
		{  
		// /alert(data); 
		// $("#loading").hide();  
		 $("#inbondlogs").empty().append(data).fadeIn();
		//referesh table
		}   
	});
}

 function editPO(editId){
 
 	$.ajax({   
	    type: "POST",  
		url: "edit_purchase_order",  
		cache:false,  
		data: {'id':editId},  
		success: function(data)  
		{  
		// /alert(data); 
		// $("#loading").hide();  
		 $("#purchaseData").empty().append(data).fadeIn();
		//referesh table
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

function exportTableToExcel(tableID, filename = ''){
 
 	//alert();
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'PurchaseOrder_<?php echo date('d-m-Y'); ?>.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{

        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
