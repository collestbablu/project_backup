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
$table_name='tbl_order_hdr';

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
                <li><a class="active">Manage  Outbound</a></li> 
              <!--   <li ><strong>Add Item11</strong></li> -->
			
                <div class="pull-right" style="display:none">
                   <a class="btn btn-sm btn-black btn-outline" href="<?=base_url();?>order/add_order"><i class="fa fa-plus" aria-hidden="true"></i>Add  Outbound</a>
                  <!--  <button type="button" class="btn btn-sm btn-black btn-outline delete_all" ><i class="fa fa-trash-o"></i>Delete</button> -->
               </div>
			</ol>
	     <div class="row">
	   	   <div class="col-lg-12" id="listingData">
			 <div class="panel panel-default">
				<div class="panel-heading clearfix">
				  <h4 class="panel-title">Manage Outbound</h4>
				  <ul class="panel-tool-options"> 
					<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
					<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
				  </ul> 
				</div>
						
				<div class="panel-body" style="padding-bottom:0px;">
				<div class="row">

				<div class="col-sm-5">
				<label>Show 
                <select   name="DataTables_Table_0_length" url="<?=base_url();?>order/manage_order?<?='location='.$_GET['location'].'&destination='.$_GET['destination'].'&order_date='.$_GET['order_date'].'&puchase_contact='.$_GET['puchase_contact'].'&filter='.$_GET['filter'];?>" id="entries" class="form-control">
				<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
				<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
				<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
				<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
				</select> entries
				</label>
				<p>Showing <?=$dataConfig['page']+1;?>  to  <?php
				$m = $dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
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
		          <table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
					<thead>
					 <tr>  
					 	   <th>S.No&nbsp;</th>
						   <th>Storage Location</th>
                           <th>Destination </th>
                           <th>ORDER DATE</th>
						   <th>CONTACT</th>
                           <!-- <th>Order Date</th>
                           <th>Revised Date</th>
                           <th>REVISED BY</th>
                           <th>Purchase Status</th> -->
                           <th><div style="width:100px;">Action</div></th>
					 </tr>
					</thead>

						<tbody id="dataTable">
						<tr>
						    <form method="get">
								<td><!-- <input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /> --></td>
								<td><input  name="location"  type="text"  class="search_box form-control input-sm" value="" /></td>
	                            <td><input  name="destination"  type="text"  class="search_box form-control input-sm" value="" /></td>
								<!-- <td><input  name="category"  type="text"  class="search_box form-control input-sm" value="" /></td> -->
								<td><input  name="order_date"  type="date"  class="search_box form-control input-sm"  value="" /></td>
								<td><input  name="puchase_contact"  type="text"  class="search_box form-control input-sm" value="" /></td>
							
								<!-- <td><input  name="reivied_date"  type="date"  class="search_box form-control input-sm" value="" /></td>
								<td><input  name="reivied_by" type="text"  class="search_box form-control input-sm" value="" /></td>
							 -->
								<!-- <td><input  name="purchase_status" type="text"  class="search_box form-control input-sm" value="" /></td> -->
								<td>
									<button type="submit" class="btn btn-sm btn-black btn-outline" name="filter" value="filter">
									  <span>Search</span>
								    </button>
								</td>
							</form>
						</tr>
						

						<?php
						$i=1;
						foreach($result as $sales)
					    {
						?>
                         <tr class="gradeC record">
							<td><?=$i++;?><!-- <input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="40" value="40"> --></td>
							<td>
                            <?php 
                               $sqlpoComp  = $this->db->query("select * from tbl_master_data  where serial_number='".$sales->company."'");
							   $getComp    = $sqlpoComp->row();
							   echo $getComp->keyvalue;
							?>
                            </td>
                            <?php $sqlpoSupplier  = $this->db->query("select first_name from tbl_contact_m  where contact_id='".$sales->destination_contact."'");
							   $getSupplier  = $sqlpoSupplier->row();
							?>

                            <td><?=$getSupplier->first_name;?>
                            <!-- <a data-toggle="modal" data-target="#modal-2" onclick="inbondviewlog('<?=$sales->purchaseid;?>');"></a>--></td>
                            
							<td><?=$sales->order_date;?></td>
							  <?php $sqlpoSupplier  = $this->db->query("select first_name from tbl_contact_m  where contact_id='".$sales->contact_id."'");
							       $getSupplier  = $sqlpoSupplier->row();
							  ?>
                            <td><?=$getSupplier->first_name;?></td>
							<td>
                             <button class="btn btn-xs btn-black"  type="button" data-toggle="modal" data-target="#modal-1" onclick="viewPO('<?=$sales->purchaseid;?>');"> <i class="icon-eye"></i></button>
                             <button class="btn btn-xs btn-black" data-toggle="modal" data-target="#modal-0" onclick="editPO('<?=$sales->purchaseid;?>');" type="button"><i class="icon-pencil"></i></button>
						    
                            </td>
						    <?php } ?>
						 </tr>
						</tbody>
					    <input type="text" style="display:none;" id="table_name" value="tbl_product_stock">  
					    <input type="text" style="display:none;" id="pri_col" value="Product_id">
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
						<h4 class="modal-title">Edit  Order</h4>
						<div id="msgdata" class="text-center " style="font-size: 15px;color: red;"></div> 
						</div>
						<form action="insertDispatchFifo" method="post">
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
		  // slr();
		  // editDeleteCalculation();
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
	var conatctId        = document.getElementById("contact_id_copy").value;
	//var supplier_contact = document.getElementById("supplier_contact").value;
   // var state        = document.getElementById("state").value;
   // alert();
	if(conatctId=='')
	{
		alert('Please Select Purchase Contact !');
		document.getElementById("contact_id_copy").focus();
	}	
	
		
	if(xobj)
    {
		var obj=document.getElementById("prdsrch");
		//alert(obj);
		xobj.open("GET","getproduct?con="+product+"&con_id="+conatctId,true);
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
               if(pd!="")
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
			   if(pd==0)
			 	{
			      alert('***Please Select PRODUCT ***');
			    }
	        }
}


  function clear()
   {
    // this finction is use for clear data after adding invoice
   // document.getElementById("qty_stock").value = "";
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
 function viewPO(viewId){

 	$.ajax({   
	    type: "POST",  
		url: "<?=base_url();?>order/view_purchase_order",  
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
		url: "dispatch_order",  
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
