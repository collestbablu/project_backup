<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 <style>
  .ui-autocomplete {
    max-height: 200px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: auto;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
  }
 
  </style>
        <script type="text/javascript">
		//var asx=0;
	
	    function getdata1(){
		document.getElementById("idd").value=1;
		 }
		 
		 function get(zz)
	{
		
		var zz=document.getElementById(zz).id;
		var myarra = zz.split("item"); 
		var rownum= myarra[1]; ;
		document.getElementById("idd").value=rownum;
		return true;
	}

	
$(document).ready(function(){


var asx =0;	
	$(".rounddefault-width-input").keydown(function() {
	var	 asx=($('#idd').val());	
	<?php 
	$queryy="select * from tbl_product_stock  where Product_typeid='row_material'"; 
	$result=$this->db->query($queryy);
	?> 
     var projects =[
	<?php 
	
	foreach($result->result() as $line){ ?>
      {
        id: "<?php echo $line->Product_id; ?>",
        label:"<?php echo $line->productname.'^'.$line->Product_id; ?>",
        pname:"<?php echo $line->productname; ?>",
        		
	<?php	
	$qurty=$this->db->query("select * from tbl_master_data where serial_number='$line->usageunit'  ");
	$qurtyf=$qurty->row();
	?>
		
		 unt:"<?php echo $qurtyf->keyvalue; ?>"
      },
	  <?php  }?>
     
    ];
		

//$("#item"+asx).on('keypress', function(autocomplete) {

	$("#item"+asx).autocomplete({
      		minLength: 1,
		 source:projects,
		 autoFocus: true,

		
	open: function(event, ui) { 
	$('#updn').val(1);
      		
	},
	close: function(event, ui) { 
      	 $('#updn').val(0);
			          },
	response: function(event, ui) {
            // ui.content is the array that's about to be sent to the response callback.
            if (ui.content.length === 0) {
              alertify.alert("Product not Found");
		 } else {
            }
        },
	  
	   focus: function( event, ui ) {
	    event.preventDefault(); 
		
	   $('#price'+asx).val(ui.item.amnt);
	   },
	 
		
		
      select: function( event, ui ) {
                    $('#item'+asx).val(ui.item.pname);
                  	$('#unit'+asx).val(ui.item.qnty);
                    //$('#price'+asx).val(ui.item.amnt);
					$('#qnty'+asx).val(ui.item.unt);
					$('#pid'+asx).val(ui.item.id);
					
					$('#updn').val(0);
					//unique_check(ui.item.id,asx);
					//$('#qnty'+asx).focus();
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
	  return $( "<li>" )
        .append( "<a>" +item.label+ "</a>" )
        .appendTo( ul );
    };
	

});

$('input:text,#series').on('keyup', function(e) {

    var $this = $(this);
    var $tr = $this.closest("tr");
	var id =e.target.id;
   id = id.replace(/[0-9]/g, '');
    if(e.keyCode == 38){
	 e.preventDefault();
	 if( $('#updn').val()==0){
        $tr.prev().find('input[id^='+id+']').focus();
		}
    }
    else if(e.keyCode == 40)
    {
	 e.preventDefault();
	  if( $('#updn').val()==0){
       $tr.next().find("input[id^='"+id+"']").focus();
	   }
    }
	
 var n = $("input:text").length;
   if (e.which == 13) 
   { //Enter key
     e.preventDefault(); //to skip default behavior of the enter key
     var nextIndex = $('input:text').index(this) + 1;
     if(nextIndex < n)
       $('input:text')[nextIndex].focus();
	   // e.Default();
     else
     {
       $('input:text')[nextIndex-1].blur();
            }
			
   }
    if (e.which == 39) 
   { //Right key
     e.preventDefault(); //to skip default behavior of the enter key
     var nextIndex = $('input:text').index(this) + 1;
     if(nextIndex < n)
       $('input:text')[nextIndex].focus();
     else
     {
       $('input:text')[nextIndex-1].blur();
            }
   }
    if (e.which == 37) 
   { //Left key
     //e.preventDefault(); //to skip default behavior of the enter key
     var nextIndex = $('input:text').index(this) - 1;
     if(nextIndex < n)
       $('input:text')[nextIndex].focus();
     else
     {
       $('input:text')[nextIndex-1].blur();
            }
   }
   
    if (e.which == 9) 
   { //Left key
    // e.preventDefault(); 
	 //to skip default behavior of the enter key
     var nextIndex = $('input:text').index(this) + 1;
	 
     if(nextIndex < n)
	{ 
		
	var table_name = ($('#'+e.target.id).parents('table').data('uid'));
	switch(table_name) {
    case "items1":
        {
		 $('#bil1').focus();
		}
        break;
		case "bilsdy":
        {
		 $('#series').focus();
		}
        break;
		case "hdr":
        {
		 $('#item1').focus();
		}
        break;
		
  	} 
	
	
    }
     else
     {
       $('input:text')[nextIndex-1].blur();
            }
   }
});







}); // End DOM



 </script>
	
	
<script>
function saveFunction()
{
var x = document.forms["tempalte"]["finish_goods"].value;


    if (x == null || x == "") 
	{
        alert("Please select Finish Goods");
          return false;
     }
	 
	
	
	   
$("#form_id").submit();
//window.close();
}
</script>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		
	
	<title>Invoice</title>
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/css/sale.css' />
		 <link rel="stylesheet"  href="<?php echo base_url();?>assets/billing/js/alert.css" >
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/billing/js/editeselectbox.css">



		
<style>
td{
font-size: 14px;
}
th{
font-size: 13px;

}
select {
  -webkit-appearance: button;
  -webkit-border-radius: 2px;
  -webkit-padding-end: 20px;
  -webkit-padding-start: 2px;
  -webkit-user-select: none;
  background-repeat: no-repeat;
  border: 1px solid #AAA;
  color: #555;
  font-size: inherit;
  margin: 0;
  overflow: hidden;
  padding-top: 2px;
  padding-bottom: 2px;
  text-overflow: ellipsis;
  white-space: nowrap;
  }
 



</style>
  
</style>
</head>
<?php
/*********29 dec***************/


//************************/


$idfetch10=$this->db->query("SELECT * FROM production_production_hdr ORDER BY invoiceid DESC");
$id_fetch10=$idfetch10->row();
 $q=$id_fetch10->invoiceid;

 $invoiceID=$q+1;
?>

<body><?php 
$this->load->view('hotkey');	?>
<form  method="post" name="tempalte" action="insert_sale" id="form_id">
<div style="width:100%; height:90%;  margin-top:2%;">
<nav class="navbar navbar-default">
 <div class="navbar-center navbar-brand" href="#"><a class="navbar-brand">Add Template</a></div>
 <?php 
$this->load->view('header');?>
  </nav>
  


  <span style="boder:none;">
 <input name="idd"  type="hidden" id="idd"  maxlength="200"  class="round  my_with"   />
<input name="row"  type="hidden" id="row"  value="25" maxlength="200"  class="round  my_with"   />
<input name="updn"  type="hidden" id="updn"  value="" maxlength="200"  class="round  my_with"   />
<input type="hidden" name="invoiceid" id="invoiceid" value="<?php echo $invoiceID; ?>">
  </span>
  <div style="width:auto%; height:auto;  margin-top:2%;">
  <table id="hdr" data-uid="hdr"  class ="items" style="margin-top:1%; width:98%; height:25%; margin-left:1%; margin-right:1%;" border="0" cellspacing="1" cellpadding="1">
		<tr>
			<td align="right">Finish Goods:-</td>
			<td>
				<select name="finish_goods" id="finish_goods">
						<option value="">--select--</option>
						<?php 
							$Query=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods' and templateid='0'");
							foreach($Query->result() as $fetchQ){
						?>
						<option value="<?php echo $fetchQ->Product_id; ?>"><?php echo $fetchQ->productname; ?></option>
						<?php } ?> 
				</select>
			</td>
			<td align="right" ></td>
			<td>
			</td>
		</tr>
		
  </table>
</div>  
<div style="width:95%; height:32%;  margin-left:3%;margin-top:2%; overflow-x:auto;  margin-right:1%; border-style:hidden; ">
<table id="items1" data-uid="items1" class ="items"    align="center" style="width:99%;   margin-left:1%; margin-right:1%;">
<tr>
<th width="1%" >S.NO</th>
<th width="43%">Item</th>

<th width="8%">Unit</th>
<th width="8%">Quantity</th>
</tr>

<script>
//for(i=1;i<=2;i++){
</script>

<?php $f=2; for($i=1;$i<=25;$i++){ ?>

<tr  id="tra<?php echo $i;?>">
<td style="background-color:#eee" onClick="showall(<?php echo $i;?>)" id="slr<?php echo $i;?>" ><?php echo $i;?>
 </td>
<td> <input name="pid[]" id="pid<?php echo $i;?>" style="border:hidden;width:100%;" type="hidden" value="" />
<input type="hidden" value="" id="dupli<?php echo $i;?>" class="dupli<?php echo $i;?>" name="dupli<?php echo $i;?>">

<input name="item[]" id="item<?php echo $i;?>" style="border:hidden;width:100%; height:100%;" type="text" onFocus="getdata1();get(this.id);" onKeyUp="getdata1();get(this.id);" onKeyPress="getdata1();get(this.id);" class="rounddefault-width-input"/>

</td>

<td>
<input name="qnty[]"  type="text" id="qnty<?php echo $i;?>"  maxlength="200"   class="round default-width-input my_with" onKeyPress="quantity_change(this.id);return isNumber(event);" onKeyUp="quantity_change(this.id);return isNumber(event);"<?php if($f==1) {?> onFocus="" <?php }?> style="border:hidden;width:100%; height:100%;" tabindex="-1"  />
<input type="hidden" size="10" id="hqnty<?php echo $i;?>" name="hqnty<?php echo $i;?>" value=""/>
</td>
<td class="total-line">


<input type="text" name="unit[]" id="unit<?php echo $i;?>" style="border:hidden;width:100%; height:100%;" value="" /></td>
</tr>

<?php 
}
?>
</table>
</div>

<!-- bill sundry part-->
<div style="width:100%; height:auto%;  margin-top:2%;">

<table id="items" align="center" style="width:98%;    margin-left:1%; margin-right:1%;">
<tr style="border:hidden">
<td style="border:hidden" align="right"><input type="button" class="btn-success btn-sm" onClick="return saveFunction();" value="Save"/>&nbsp;&nbsp;<a href="manage_template" class="btn-success btn-sm" />Cancel</a></td>
<td style="border:hidden"></td>
</tr>
</table>
<script>
function buttonFun(){
window.location='manage_template';
}



$('input:text,#series').on('keyup', function(e) {

    var $this = $(this);
    var $tr = $this.closest("tr");
	var id =e.target.id;
   id = id.replace(/[0-9]/g, '');
    if(e.keyCode == 38){
	 e.preventDefault();
	 if( $('#updn').val()==0){
        $tr.prev().find('input[id^='+id+']').focus();
		}
    }
    else if(e.keyCode == 40)
    {
	 e.preventDefault();
	  if( $('#updn').val()==0){
       $tr.next().find("input[id^='"+id+"']").focus();
	   }
    }
	
 var n = $("input:text").length;
   if (e.which == 13) 
   { //Enter key
     e.preventDefault(); //to skip default behavior of the enter key
     var nextIndex = $('input:text').index(this) + 1;
     if(nextIndex < n)
       $('input:text')[nextIndex].focus();
	   // e.Default();
     else
     {
       $('input:text')[nextIndex-1].blur();
            }
			
   }
    if (e.which == 39) 
   { //Right key
     e.preventDefault(); //to skip default behavior of the enter key
     var nextIndex = $('input:text').index(this) + 1;
     if(nextIndex < n)
       $('input:text')[nextIndex].focus();
     else
     {
       $('input:text')[nextIndex-1].blur();
            }
   }
    if (e.which == 37) 
   { //Left key
     e.preventDefault(); //to skip default behavior of the enter key
     var nextIndex = $('input:text').index(this) - 1;
     if(nextIndex < n)
       $('input:text')[nextIndex].focus();
     else
     {
       $('input:text')[nextIndex-1].blur();
            }
   }
   
    if (e.which == 9) 
   { //Left key
     e.preventDefault(); 
	 //to skip default behavior of the enter key
     var nextIndex = $('input:text').index(this) + 1;
	 
     if(nextIndex < n)
	{ 
		
	var table_name = ($('#'+e.target.id).parents('table').data('uid'));
	switch(table_name) {
    case "bilsdy":
        {
		 $('#natation').focus();
		}
        break;
		case "bilsdy":
        {
		 $('#series').focus();
		}
        break;
		case "hdr":
        {
		 $('#item1').focus();
		}
        break;
		
  	} 
	
	
    }
     else
     {
       $('input:text')[nextIndex-1].blur();
            }
   }

});

}); // End DOM



</script>
</div></div>
</form>
</body>
</html>