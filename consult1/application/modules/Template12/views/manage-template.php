<?php
$tableName='tbl_template_hdr';
$this->load->view('softwareheader'); 
?>

<h1><b></b>Template List</h1> 

<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->


<div class="add">
<a href="addTemplate"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Template</a>
</div>



<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">

<table class="bordered"id="dataTables-example">

    <thead>



    <tr>

       <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>    

        <th>Finish Goods</th>
        <th>Raw Material & Process</th>
        <th>Unit</th>   

        <th style="width:100px;">Action</th>

    </tr>

    <tr>

		<td><input type="checkbox"></td>   
        <td><input type="text" id="id1" onKeyUp="search_row(this.id,1)" class="input-small"></td>
		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)" class="input-small"></td>
        <td><input type="text" id="id3" onKeyUp="search_row(this.id,3)" class="input-small"></td>
        
		<td></td>
    </tr>
    </thead>


<?php

		  $queryy="select * from $tableName where status='A' order by template_id desc";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->template_id; ?>">
<?php 
			$Query12=$this->db->query("select * from tbl_template_dtl where template_id='$line->template_id'");
						$fetchQ123=$Query12->row();
	
		?>
   <td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $line->template_id; ?>"  value="<?php echo $line->template_id?>" /></td>

   

                       <td><?php 
					  
					  			
					
					    $Query=$this->db->query("select * from tbl_product_stock where Product_id='$fetchQ123->finish_goods'");
						$fetchQ=$Query->row();
					    echo $fetchQ->productname; ?></td>

					   <td>
					  
					    <a target="_blank"><i onClick="openpopup('show_qty',400,300,'show_row',<?php echo $fetchQ123->template_id; ?>)"  alt="v" border="0" class="icon" title="show row matrial"/>Show Raw Materials</i></td>
                       <td><?php 
	$sql =$this->db->query("select * from tbl_master_data where serial_number ='".$fetchQ123->unit."'");
	$resultname = $sql->row();
						echo $resultname->keyvalue;
					   ?></td>
                      
                       
                        
<td><a target="_blank" onClick="openpopup('viewTemplate',1000,600,'id',<?php echo $line->template_id; ?>)"><img src="<?php echo base_url();?>/assets/images/view.png" alt="v" border="0" class="icon" title="View"/></a>
<img src="<?php echo base_url();?>/assets/images/edit.png"  alt="" height="26" border="0" class="icon" title="Edit" onClick="openpopup('updateTempalte',1000,600,'id',<?php echo $line->template_id; ?>)" />
<?php
$pri_col='template_id';
$table_name='tbl_template_hdr';
$table_name_dtl='tbl_template_dtl';
$pri_col_dtl='template_id';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->template_id."^".$table_name."^".$pri_col."^".$table_name_dtl."^".$pri_col_dtl ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
    </td></tr>
	<?php } ?>
<input type="text" style="display:none;" id="table_name" value="tbl_template_hdr^tbl_template_dtl">  
<input type="text" style="display:none;" id="pri_col" value="template_id^template_id"> 	
</table>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</div><!--paging-row close-->

<script src="<?php echo base_url();?>/assets/jsw/jquery.js"></script>
<script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;

 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_multiple_table_data",
   data: info,
   success: function(){
  
   }
 });

         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<?php $this->load->view('softwarefooter'); ?>