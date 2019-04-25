<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Item</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_lead_product where lead_id='$ID'");
         $fetch_list=$ItemQuery->row();

?>
<div class="form-group">
<div class="col-sm-2">
Product Name
</div>
<div class="col-sm-2">
Quantity In Stock
</div>
<div class="col-sm-2">
Unit
</div>
<div class="col-sm-2">
Rate
</div>
<div class="col-sm-2">
Quantity
</div>
<div class="col-sm-2">
Total
</div>

</div>
<div class="form-group"> 
<div class="col-sm-2"> 
<input type="text" name="prd" onkeyup="getdata()" onClick="getdata()" id="prd" placeholder=" Search Items..." class="form-control" >
<input type="hidden"  name="pri_id" id='pri_id'  value=""  />
<input type="hidden"  name="lead_id" value="<?php echo $_GET['id'];?>"  />
<div id="prdsrch" style="color:black;padding-left:0px; width:80%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
<?php
//include("getproduct.php");
$this->load->view('getproduct');

?>
</div>
</div> 
<div class="col-sm-2"> 
<input type="text" readonly="" id="qty_stock" style="width:100px;" class="form-control"> 
</div>
<div class="col-sm-2"> 
<input type="text" readonly="" id="usunit" class="form-control">
</div>
<div class="col-sm-2"> 
<b id="lpr"></b>
<input type="number" step="any" id="lph" min="1"  value="" class="form-control">
</div>
<div class="col-sm-2"> 
<input type="number" id="qn" min="1"  class="form-control">
</div>
<div class="col-sm-2"> 
<input type="text" name="saleamnt" readonly="" id="tot" class="form-control" >
</div>
<div class="form-group">
</div>
<table id="invo" style="width:100%;  background:#dddddd;  height:70%;" title="Invoice"  >
<tr>
<td style="width:1%;"><div align="center"><u>Sl No</u>.</div></td>
<td style="width:11%;"><div align="center"><u>Item</u></div></td>
<td style="width:3%;"><div align="center"><u>Rate</u></div></td>
<td style="width:3%;"><div align="center"><u>Quantity</u></div></td>
<td style="display:none"><div align="center"><u>Discount</u></div></td>
<td style="display:none"><div align="center"><u>Discount Amount</u></div></td>
<td style="width:3%;"><div align="center"><u>Total</u></div></td>
<td style="display:none"><div align="center"><u>Net Price</u></div></td>
<td style="width:3%;"><div align="center"><u>Action</u></div></td>
</tr>
</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

<tr></tr>
</table>
</div>
</div>
<input type="text" name="rows" id="rows">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />
</div>
<div class="modal-footer">
<input type="button" class="btn btn-sm" id="sv1" onclick="fsv(this)" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>