<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName='tbl_machine_breakdown';
$location='manage_machine_breakdown';
$this->load->view('softwareheader'); 
?>

<h1> Add Breakdown Details</h1>

<form action="insert_machine_breakdown" method="post" enctype="multipart/form-data">

<div class="actions-right">

<?php if(@$_GET['view']!='' ){

 }

 else

 { 

 if(@$_GET['id']==''){?>

 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>

	  <?php }else {?>

      <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

	   <?php } }?>

<?php if(@$_GET['popup'] == 'True') {?>

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">
<div id="container">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10%"><div style="width: 130px;"><input type="date" class="input-small" name="machine_date" id="itemdate"   required/></div></td>
<td width="90%"><star>*</star>Date:</td>
</tr>
</table>

<div id="right-fixedHeader-" class="section-">
<div id="tableContainer" class="container-tb">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead style="background:#436E90; color:#FFFFFF;">
<tr>
<th style="width: 138px;">M/C NO. | M/C Name</th>
<?php 
$i=0;
	$sqlunit=$this->db->query("select * from tbl_master_data where param_id=17");
	foreach ($sqlunit->result() as $fetchunit){
?>
<th><div><?php echo $fetchunit->keyvalue; ?></div><input type="hidden" name="m_b_d_name[][]" value="<?php echo $fetchunit->serial_number; ?>" /></th>
<?php $i++; } ?>
</tr>
</thead>

<tbody>
<?php 
$j=0;
	$sqlunit=$this->db->query("select * from tbl_machine where status='A'");
	foreach ($sqlunit->result() as $fetchunit){	
?>
<tr>
	<th><div><?php echo $fetchunit->machinename; ?></div><input type="hidden" name="machine_id[]"  value="<?php echo $fetchunit->Machine_id;?>" /></th>
	
	<?php for($m=0;$m<$i;$m++){ ?>
	
	<th><input type="number" step="any" class="input-small" name="hoursname[]" id="hours" value="" /> </th>	
		<?php } ?>
<input type="hidden" name="clmname[]" value="<?php echo $i; ?>" />		
</tr>
<?php $j++; } ?>
<input type="hidden" name="rowname" value="<?php echo $j; ?>" />
</tbody>
</table>
</div>
</div>


</div>
</div>

<div class="actions-right">

<?php 

 if(@$_GET['view']!='' ){

 }

 else

 {

if(@$_GET['id']==''){?>

 <td> <input name="save" type="submit" value="Save" class="submit" /> </td>

 <?php }else {?>

	   <td> <input name="edit" type="submit" value="Save" class="submit" /> </td>

	      <?php }}?>


<?php if(@$_GET['popup'] == 'True') {?>

<a href="javascript:window.close();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?>

</div><!--paging-right close-->

</form>

<?php $this->load->view('softwarefooter'); ?>


<script>
$(document).ready(function() {
  $('.JStableOuter table').scroll(function(e) { 
   
    $('.JStableOuter thead').css("left", -$(".JStableOuter tbody").scrollLeft()); 
    $('.JStableOuter thead th:nth-child(1)').css("left", $(".JStableOuter table").scrollLeft() -0 ); 
    $('.JStableOuter tbody td:nth-child(1)').css("left", $(".JStableOuter table").scrollLeft()); 

    $('.JStableOuter thead').css("top", -$(".JStableOuter tbody").scrollTop());
    $('.JStableOuter thead tr th').css("top", $(".JStableOuter table").scrollTop()); 

  });
});
 
</script>

    <!-- fix Table Header  -->
    <script src="<?php echo base_url();?>/assets/fixtableheader/jQuery.fixTableHeader.min.js"></script>
    <script src="<?php echo base_url();?>/assets/fixtableheader/tooltip.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/fixtableheader/style.css" />
	
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('#tableContainer').fixTableHeader();


            $('.tab-toggle').click(function() {
                $('.section').each(function() {
                    $(this).addClass(" hidden");
                })

                $('#left-' + $(this).attr('data-target') + '').removeClass("hidden");
                $('#right-' + $(this).attr('data-target') + '').removeClass("hidden");

                $('#tableContainer1').fixTableHeader({
                    fixHeader: false,
                    fixFooter: true
                });
                $('#tableContainer4').fixTableHeader({
                    fixHeader: true,
                    fixFooter: true
                });
                $('#tableContainer2').fixTableHeader({
                    fixHeader: true,
                    fixFooter: true
                });
                $('#tableContainer5').fixTableHeader({
                    fixHeader: true,
                    fixFooter: true
                });
                $('#tableContainer3').fixTableHeader();
                $('#tableContainer6').fixTableHeader({
                    fixHeader: true,
                    fixFooter: true
                });
            })
        })

        function toggleProfile() {
            if ($('#profile').height() == 0) {
                $('#profile').height(285);
            } else {
                $('#profile').height(0);
            }
        }
    </script>

 <!-- fix Table Header  -->	
