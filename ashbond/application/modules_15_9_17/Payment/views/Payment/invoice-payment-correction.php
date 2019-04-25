
<?php  

	
  $tableName="tbl_prodcatg_m";
  $location="manage-itemctg";
   extract($_POST);
  
  if($save!=''){
  extract($_POST);
 
 
  
 $contact=$this->db->query("select * from  tbl_invoice_payment where id='".$_GET['id']."'");
 $contat_id=$contact->row();
 	$this->db->query("update  tbl_invoice_payment set receive_billing_mount = '$camnt' where id='".$_GET['id']."'");
  
 $enty=$this->db->query("select * from tbl_invoice_report where contact_id='".$contat_id->contact_id."' and billamount != remaining_amt ORDER BY  remaining_amt DESC ");
   $iamnt;
   foreach($enty->result() as $line)   {    //while($line=mysql_fetch_array($enty)){
   $rmainamnt=$line['remaining_amt'];
   $billamnt=$line['billamount'];
   if($iamnt>0){
   $acamnt=($rmainamnt+$contat_id['receive_billing_mount'])-$camnt;
   $this->db->query("update  tbl_invoice_report set remaining_amt = '$acamnt' where invoice_rid='".$line['invoice_rid']."'");
   $iamnt=$iamnt-$acamnt;
   }
   
   }
   
   echo "<script type='text/javascript'>";
  echo "window.close();";
echo "window.opener.location.reload();";
echo "</script>";
   
  
  
  }
			?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



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
  <div id="b2" class="right-colum" >

<div class="right-colum-text">

<div class="table-row">

<div class="title">

<h1> Error Rectification</h1> 

<form action="" method="post">

<div class="actions-right">

<?php if($_GET['view']!='' ){

 

 }

 else

 {

if($_GET['id']==''){?>

     <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



	  <?php }else {?>

	   <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



	   <?php } }?>



<?php if($_GET['popup'] == 'True') {?>

<a href="javascript:closepopup();" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?>

<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div class="table-row">

<form action="" method="post">
  <table class="bordered">

<thead>



<tr>

<th colspan="4"><b>Please Input corrected amount</b></th>        
</tr>
</thead>
<tr>
<td class="text-r"><star>*</star>

Correct amnt:</td>

 <td><input type="text" name="camnt" class="span6 "value=""  size="22" required aria-required='true' style="width:150px;" /></td>
 
 <td class="text-r"><star>*</star>

Incorect amnt:</td>

 <td><input type="text" name="iamnt" class="span6 "value=""  size="22" required aria-required='true' style="width:150px;" /></td>
</tr> 



<!--<tr>

<td class="text-r"><star>*</star>

Industry Name:</td>

<td>-->

<?php //echo param_dropdown('Industry Name','industryid',$industryid); ?>

<!--</td>-->
  </table>

  <!--bordered close-->
  <div class="paging-row">
  <div class="paging-right">
  <div class="actions-right">
  <?php if($_GET['view']!='' ){

 

 }

 else

 {

if($_GET['id']==''){?>
<td> <input name="save" type="submit" value="Save" class="submit" /> </td>



	  <?php }else {?>

	   <td> <input name="save" type="submit" value="Save" class="submit" /> </td>



	   <?php }}?>



<?php if($_GET['popup'] == 'True') {?>

<a onclick="closepopup()" title="Cancel" class="submit"> Cancel</a>

	   	 <?php }else {  ?>

       <a href="<?php echo $location; ?>" title="Cancel" class="submit"> Cancel</a>

       <?php } ?>

</form></div></div></div></div>



</div><!--paging-right close-->

</div><!--paging-row close-->



</div><!--table-row close-->

</div><!--container-right-text close-->





</div><!--container-right close-->







</div><!--container close-->



<div class="clear"></div><!--footer--row close-->



</div><!--wrapper close-->





<!--left-menu-js-->

<script src="js/menu-js/jquery.min.js"></script>

<script src="js/menu-js/bootstrap.min.js"></script>

<script src="js/menu-js/metisMenu.min.js"></script>


<script>
function closepopup(){
	window.close();
}
</script>
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







</body>

</html>

