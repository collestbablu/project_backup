<?php
$tableName='tbl_contact_m';
$this->load->view('softwareheader'); 
?>

<h1>Contact List </h1> 
<div class="actions">
<div class="blogroll">
<div id="">
	<a type="button" class="btn btn-primary pull-right delete_all">Delete Selected</a>
   </div>
	</div>
</div><!--actions close-->

<div class="add">
<?php if($add!=''){ ?>

<a href="add_contact"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" /> Add Contact</a>
<?php } ?>
</div><!--add close-->
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">



<table class="bordered table-hover dataTables-example">


    <thead>
    <tr>
        <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>        

        <th> Name</th>
		 <th>Group Name</th>
		
        <th>Email</th>

		<th>Mobile</th>
		

<th >Action</th>
        
    </tr>
 
    </thead>

	<?php
   
		  $queryy="select * from $tableName";
	
		  $result=$this->db->query($queryy);

  foreach(@$result->result() as $line){

   ?>



   <tr class="record" data-row-id="<?php echo $line->contact_id; ?>">
 
   
<td><input name="cid[]" type="checkbox" id="checkbox-1" class="sub_chk" data-id="<?php echo $line->contact_id; ?>"  value="<?php echo $line->contact_id?>" /></td>

    <td><?php echo $line->first_name;?></td>
	
	
	<?php $ugroup1=$this->db->query("SELECT * FROM tbl_account_mst where account_id='".$line->group_name."'" );
			
			$ungroup2 = $ugroup1->row(); 
			?>

 <td><?php echo $ungroup2->account_name;?></td>

    <td><?php echo $line->email;?></td>
  
    <td><?php echo $line->mobile;  ?></td> 
	

           <td>
		   <?php if($view!=''){ ?>           
<img src="<?php echo base_url();?>/assets/images/view.png" onclick="openpopup('add_contact',900,600,'view',<?php echo $line->contact_id; ?>)"  alt="" border="0" class="icon" title="View" />
<?php } if($edit!=''){ ?>

<img src="<?php echo base_url();?>/assets/images/edit.png" onclick="openpopup('add_contact',900,600,'id',<?php echo $line->contact_id; ?>)"  alt="" border="0" class="icon" title="Edit" />
    <?php } if($delete!=''){ 
$pri_col='contact_id';
$table_name='tbl_contact_m';
	?>
<img src="<?php echo base_url();?>/assets/images/delete.png" id="<?php echo $line->contact_id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"  alt="" border="0"  title="Delete" />
<?php } ?>
</td>



    </td></tr>



	<?php } ?>

<input type="text" style="display:none;" id="table_name" value="tbl_contact_m">  
<input type="text" style="display:none;" id="pri_col" value="contact_id"> 	
</table>

<div class="clear"></div>

</div><!--table-row close-->
</div><!--div close-->

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