<?php
//Ignore Error 269
error_reporting (E_ALL ^ E_NOTICE);

$tableName='tbl_product_stock';

$location='manage_item';

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
        $('#productName').change(function(){
            var val = $('#productName').val();
            $('#print_name').val(val);
        });
     });
	 
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php //include("includes/title.php"); ?>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
<body>

<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"><!--container-left close-->
<?php if(@$_GET['popup']=='True') {
	} else { 

	$this->load->view('sidebar');

	  } ?><div id="b2" class="right-colum">

<div class="right-colum-text">

<div class="table-row">

<div class="title">

<div class="title">

<h1>Import Product </h1>

<form action="import_item" method="post" enctype="multipart/form-data">



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

<a href="" onclick="popupclose(this.value)" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo @$location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?><div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">

 <table class="bordered">

<thead>
<?php
if(@$_GET['id']!='' or @$_GET['view']!=''){
@$branchQuery = $this->db->query("SELECT * FROM $tableName where Product_id='".$_GET['id']."' or Product_id='".$_GET['view']."'");
$row = $branchQuery->row();
 
}


 if(@$_GET['id']!=''){
 


  ?>         
<td><input type="hidden" name="Product_id" class="span6 "value="<?php echo $row->Product_id?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM $tableName where status='A' order by Product_id desc limit 0,1");
$rowwww = $query->row();
  
?>
<input name="Product_id" type="hidden" class="span6 " value="" readonly size="22" aria-required='true' />
              

                <?php }?>


<tr>
			<?php 
					$query=$this->db->query("select * from tbl_product_stock order by Product_id desc");
					$fetchR=$query->row();
					
					$productId=$fetchR->Product_id+1;
			?>
            <td class="text-r"><star>*</star>
            Import CSV:</td>
			
			<td><input type="file" name="file" required></td>
			
			<td ><a href="<?php echo base_url();?>assets/images/product_format.csv">Download Sample CSV Format</a></td>
			<td>&nbsp;</td>	
		</tr>
		
</table>

    
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
</script>
<!--bordered close-->

<div class="clear"></div>



<div class="paging-row">

<div class="paging-right">



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

       <?php } ?></form>




</div><!--paging-right close-->

</div><!--paging-row close-->



</div><!--table-row close-->

</div><!--container-right-text close-->





</div><!--container-right close-->







</div><!--container close-->



<div class="clear"></div><!--footer--row close-->



</div><!--wrapper close-->





<!--left-menu-js-->

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

<!--left-menu-js-close-->

<script>
function popupclose(){
window.close();
}
</script>


</body>

</html>

<?php //include('includes/footer.php') ?>






