<?php if($comm==5){ ?>
<div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Contract From Date.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="contact_from_date" value="<?php echo $branchFetch->contact_from_date; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">Contract To Date.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="contact_to_date" value="<?php echo $branchFetch->contact_to_date; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Other Contact.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="other_contact" value="<?php echo $branchFetch->other_contact; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">FOV(%).:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" min="0" name="fov" value="<?php echo $branchFetch->fov; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Docket Charge.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="docket_charge" value="<?php echo $branchFetch->docket_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">DOD / COD Charge:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="cod_charge" value="<?php echo $branchFetch->cod_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Fuel Charge(%):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="fuel_charge" value="<?php echo $branchFetch->fuel_charge; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">CFT Train:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="cft_train" value="<?php echo $branchFetch->cft_train; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*CFT Surface:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="cft_surface" value="<?php echo $branchFetch->cft_surface; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">CFT Air:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="cft_air" value="<?php echo $branchFetch->cft_air; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Minimum weight(Air):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="min_weight_air" value="<?php echo $branchFetch->min_weight_air; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">Minimum weight(Train):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="min_weight_train" value="<?php echo $branchFetch->min_weight_train; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Minimum weight(Surface):</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" min="0" step="any" name="min_weight_surface" value="<?php echo $branchFetch->min_weight_surface; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">Goods:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" min="0" step="any" name="goods" value="<?php echo $branchFetch->goods; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" ></div> 
</div>
<div class="form-group"> 
<div class="well">
<div class="col-sm-12">Destination & Rate Charge</div>
</div> 
</div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >
<tbody>
<tr class="gradeA">
<th>From(Origin)</th>
<th>To(Destination)</th>
<th>Rate/Kg(Air)</th>
<th>Rate/Kg(Train</th>
<th>Rate/Kg(Surface)</th>
<th>Other Charges</th>
<th>ODA Charget</th>

</tr>

<tr class="gradeA">
<th style="width:280px;">
<div class="input-group"> 
<div style="width:100%; height:28px;" >
<!--<input type="text"  name="prd"   id="frmOrg" style=" width:190px;" class="form-control" placeholder=" Search Items..." tabindex="5" >-->
<select name="frmOrg"   id="frmOrg" style=" width:190px;" class="form-control" placeholder=" Search Items..." tabindex="5">
		<option value="">---select---</option>
        <?php
		 $masterdata=$this->db->query("select * from tbl_master_data where param_id='16'");
		 foreach($masterdata->result() as $fetchq){				 
		?>
        <option value="<?php echo $fetchq->serial_number; ?>"><?php echo $fetchq->keyvalue; ?></option>
        <?php } ?>
</select>
 <input type="hidden"  name="pri_id" id='pri_id'  value="" style="width:80px;"  />
<img style="display:none"   src="<?php echo base_url();?>/assets/images/search11.png"  onClick="openProduct();" /></div>

</div>
<div id="prdsrch" style="color:black;padding-left:0px; width:30%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
<?php
//include("getproduct.php");
//$this->load->view('getproduct');

?>
</div>
</th>
<th>
<!--<input type="text"  name="prd"   id="toOrg" style=" width:230px;" class="form-control" placeholder=" Search Items..." tabindex="5" >-->
<select name="toOrg"   id="toOrg" style=" width:230px;" class="form-control"  tabindex="6">
		<option value="">---select---</option>
        <?php
		 $masterdata=$this->db->query("select * from tbl_master_data where param_id='16'");
		 foreach($masterdata->result() as $fetchq){				 
		?>
        <option value="<?php echo $fetchq->serial_number; ?>"><?php echo $fetchq->keyvalue; ?></option>
        <?php } ?>
</select>
</th>
<th>
<b id="lpr"></b>
<input type="number" step="any" id="rateAir" min="1"  value="" class="form-control" style="width:70px;" tabindex="7"></th>
<th><input type="number" step="any" id="rateTrain" min="1" style="width:100px;"   class="form-control" tabindex="8"></th>
<th><input type="number" step="any" id="rateSurface" min="1" style="width:100px;"   class="form-control" tabindex="9"></th>

<th><input type="number" step="any" name="saleamnt" id="otherCharge"  style="width:70px;" tabindex="10"/ ></th>
<th><input type="number" step="any" name="saleamnt" id="odaCharge"   style="width:70px;" tabindex="11"/ ></th>

</tr>
</tbody>
</table>
</div>
<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
<table id="invo" style="width:100%;  background:#dddddd;  height:70%;" title="Invoice"  >
<tr>
<td style="width:1%;"><div align="center"><u>Sl No</u>.</div></td>
<td style="width:11%;"><div align="center"><u>From(Origin)</u></div></td>
<td style="width:3%;"> <div align="center"><u>To(Destination)</u></div></td>
<td style="width:3%;"><div align="center"><u>Rate/Kg(Air)</u></div></td>
<td style="width:3%;"> <div align="center"><u>Rate/Kg(Train)</u></div></td>
<td style="width:3%;"> <div align="center"><u>Rate/Kg(Surface)</u></div></td>
<td style="width:3%;"> <div align="center"><u>Other Charges</u></div></td>
<td style="width:3%;"> <div align="center"><u>ODA Charget</u></div></td>
<td style="width:3%;"> <div align="center"><u>Action</u></div></td>
</tr>
</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

<tr></tr>
</table>


<input type="hidden" name="rows" id="rows">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />

</div>


</div>
<div class="form-group">

</div>
</div>
<?php } ?>