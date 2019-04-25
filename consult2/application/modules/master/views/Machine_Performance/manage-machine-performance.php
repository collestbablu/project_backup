<?php
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
	extract($_POST);
$tableName='tbl_machine_prformance';

$this->load->view('softwareheader'); 
?>

<div id="load_me"></div>
<form method="post">
<h1>Breakdown List</h1> 
<div class="actions">
<div class="blogroll">
<div id="">
		<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>

		<ul>        
		</ul>
   </div>
	</div>
</div><!--actions close-->

<div class="add">
<?php if($add!=''){ ?>

<a href="add_machine_performance"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Breakdown</a>
<?php } ?>
</div><!--add close-->
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">


<table class="bordered" id="dataTables-example">

    <thead>
    <tr>

        <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>        

        <th>Machine id </th>
		
        <th>Machine Name</th>

      	<th>Date</th>
		
		<th>Machine Breakdown Name</th>
<th>Hours</th>
        <th>Action</th>

		

    </tr>
<tr>
      	<td><input type="checkbox"></td>  
        <td><input type="number" name="m_id" id="id1" onKeyUp="search_row(this.id,1)"  class="input-small"></td>
		<td><input type="text" id="id2" onKeyUp="search_row(this.id,2)"  name="module_id" class="input-small"></td>
		<td><input type="date" name="machine_date" id="id3" onKeyUp="search_row(this.id,3)"  class="input-small"></td>
		<td><input type="text" name="m_b_d_name" id="id3" onKeyUp="search_row(this.id,3)"  class="input-small"></td>
		<td><input type="text" name="m_b_d_name" id="id3" onKeyUp="search_row(this.id,4)"  class="input-small"></td>
		<td></td>

    </tr>
    </thead>

	<?php

@$mod_sql=$this->db->query("select * from $tableName ");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
   <tr class="record" data-row-id="<?php echo $line->m_id; ?>">

   <td>
   <input name="cid[]" class="sub_chk" type="checkbox" id="cid[]" data-id="<?php echo $line->m_id; ?>" value="<?php echo $line->m_id; ?>"  />
   </td>

										<td><?php echo $line->m_id;?></td>
										
										<td>
										<?php
										$sqlgroup=$this->db->query("select * from tbl_machine where Machine_id='$line->machine_id'");
										$res1 = $sqlgroup->row();
										
										?>
										<?php echo $res1->machinename;?></td>
										
										<td><?php echo $line->machine_date;?></td>
										
										<td>
										<?php
										$sqlgroup=$this->db->query("select * from tbl_master_data where serial_number='$line->m_b_d_name'");
										$res1 = $sqlgroup->row();
										
										?>
										<?php echo $res1->keyvalue;?></td>
									
                                      <td><?php echo round($line->hours/60,2);?>&nbsp;Hours</td>
<td>
  <?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/view.png" onClick="openpopup('add_machine_performance',900,400,'view',<?php echo $line->m_id ;?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onClick="openpopup('add_machine_performance',900,400,'id',<?php echo $line->m_id ;?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } 
if($delete!=''){ 
$pri_col='m_id';
$table_name='tbl_machine_prformance';
?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->m_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php



 } ?>
 
</td>
    </tr>

	<?php 
	$i++;
	} 
	
	?>
<input type="text" style="display:none;" id="table_name" value="tbl_machine_prformance">  
<input type="text" style="display:none;" id="pri_col" value="m_id">  
</table>

<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->

</div><!--div close-->
</div><!--container close-->

</div><!--paging-right close-->

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
//alert(info);
 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_data",
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
<style>
/* Popup container - can be anything you want */
.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: ;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style>
<script>
// When the user clicks on div, open the popup
function myFunction(id) {

    var popup = document.getElementById("myPopup"+id);
	
    popup.classList.toggle("show");
	popup.classList.toggle("hide");
}
</script>