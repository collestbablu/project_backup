<?php
if($_GET['al']==1){
?>
<script>alert('stock out finish goods successfully');window.location='stock_out_finish_goods';</script>;
<?php } 

if($_GET['al']==2){
?>
<script>alert('stock in finish goods less than');window.location='stock_out_finish_goods';</script>;
<?php } ?>
	<!--select box codex end-->
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>assets/billing/js/calculation.js"></script>
   <script src="<?php echo base_url();?>assets/billing/js/editeselectbox.js"></script>
   
  <script type="text/javascript" src="/s/code.jquery.com/jquery-1.8.3.js"></script>
      
    
	 
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
	
   function getregion(comp_id) {	
		var strURL="getregion?zone_id="+comp_id;
		//
		var req = getXMLHTTP();
		//alert(comp_id);
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
						document.getElementById('regiondiv').innerHTML=req.responseText;
										
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
	    function getdata1(){
		document.getElementById("updn").value=0;
		 }

	
$(document).ready(function(){

$("#series").select2({
		maximumSelectionLength: 2,
    placeholder: "Select Series"
	});
	$("#sale_type").select2({
		maximumSelectionLength: 2,
    placeholder: "Select Sale type"
	});
	$("#party").select2({
		maximumSelectionLength: 2,
    placeholder: "Select Party" 
	});
	$("#mcentr").select2({
		maximumSelectionLength: 2,
    placeholder: "Select Mcentr"
	});
 
$(".bisdy").click(function(event){
//alert(event.target.id);
	var regex = /(\d+)/g;
	var rownum=(event.target.id.match(regex));
 		
        var row = $(this).parents("tr:first");
        if ($(this).is(".up")) {
            row.insertBefore(row.prev());
        } else if ($(this).is(".down")) {
            row.insertAfter(row.next());
        } else if ($(this).is(".top")) {
            //row.insertAfter($("table tr:first"));
            row.insertBefore($("#bilsdy tr:first"));
        }else {
            row.insertAfter($("#bilsdy tr:last"));
        }
		slr("bilsdy");
		renametble(rownum);
    });




<?php if($_GET['save']=='y'){?>
//
alertify.alert("Invoice Genrated");
<?php } ?>

   // $( "#items1" ).selectable();

$( "#datepicker" ).datepicker();

var asx =0;	
	$(".rounddefault-width-input").keydown(function() {
var	 asx=($('#idd').val());	
	<?php 
	$queryy="select * from cybercodex_product_stock  where Product_typeid='finish_goods'"; 
	$result=$this->db->query($queryy);
	?> 
     var projects =[
	<?php 
	
	foreach($result->result() as $line){ ?>
      {
        id: "<?php echo $line->Product_id; ?>",
        label:"<?php echo $line->productname.'^'.$line->Product_id; ?>",
        pname:"<?php echo $line->productname.'^'.$line->Product_id; ?>",
		 prevQty:"<?php echo $line->qtyinstock; ?>",
        		
	<?php	
	$qurty=$this->db->query("select * from cybercodex_master_data where serial_number='$line->usage_unit'  ");
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
	   // event.preventDefault(); 
	   //$('#qty'+asx).val(ui.item.id);

	   },
	 
		
		
      select: function( event, ui ) {
                    $('#pid'+asx).val(ui.item.id);
					$('#item'+asx).val(ui.item.pname);
                  	$('#unit'+asx).val(ui.item.qnty);
                    $('#price'+asx).val(ui.item.amnt);
					$('#qnty'+asx).val(ui.item.unt);
					$('#prevQty'+asx).val(ui.item.prevQty);
					$('#updn').val(0);
					unique_check(ui.item.id,asx);
					//$('#qnty'+asx).focus();
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
	  return $( "<li>" )
        .append( "<a>" +item.label+ "</a>" )
        .appendTo( ul );
    };
	
$("#bil"+asx).autocomplete({
      		minLength:1,
    	 source: billsundry12,
		 autoFocus: true,
		 close: function(event, ui) { 
      		 $('#updn').val(0);
			          },
	response: function(event, ui) {
            // ui.content is the array that's about to be sent to the response callback.
            if (ui.content.length === 0) {
              alertify.alert("Product not Found");
            } else {    }
        },
	  focus: function( event, ui ) {
	    event.preventDefault(); 
	   $('#cal'+asx ).val( ui.item.sundry_to_be_fed);
	   $('#calt'+asx).val(ui.item.sundry_to_be_fed);
	   },
      select: function( event, ui ) {
			 // Populate the input fields from the returned values
                 	clearamnt("bil"+asx);
					$('#bil'+asx).val(ui.item.bill_name);
                  	$('#bill_sundry_id'+asx).val(ui.item.bill_sundry_id);
				   	$('#cal'+asx).html(ui.item.sundry_to_be_fed);
					$('#nart'+asx).val(ui.item.default_value);
					$('#calt'+asx).val(ui.item.bill_type);
					 $('#updn').val(0);
						unique_check_bill(ui.item.bill_sundry_id, asx);
					// Give focus to the next input field to recieve input from user
                    //$('#nart'+asx).focus();

 
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul,item ) {
	  return $( "<li>" )
        .append( "<a>" + item.label + "</a>" )
        .appendTo( ul );
    };
});



$('input:text').on('keyup', function(e) {

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


$idfetch10=$this->db->query("SELECT * FROM cybercodex_production_hdr ORDER BY invoiceid DESC");
$id_fetch10=$idfetch10->row();
 $q=$id_fetch10->invoiceid;

 $invoiceID=$q+1;
?>

<body><?php 
$this->load->view('hotkey');	?>
<form  method="post" action="insert_stock_out_finish" id="form_id">
<div style="width:100%; height:90%;  margin-top:2%;">
<nav class="navbar navbar-default">
 <div class="navbar-center navbar-brand" href="#"><a class="navbar-brand">Stock Out Finish Goods</a></div>
 <?php 
$this->load->view('header');?>
  </nav>
  


  <span style="boder:none;">
  
 <input name="idd"  type="hidden" id="idd"  maxlength="200"  class="round  my_with"   />
<input name="row"  type="hidden" id="row"  value="25" maxlength="200"  class="round  my_with"   />
<input name="updn"  type="hidden" id="updn"  value="" maxlength="200"  class="round  my_with"   />
<input type="hidden" name="invoiceid" id="invoiceid" value="<?php echo $invoiceID; ?>">
  </span>
  <div style="width:auto%; height:auto%;  margin-top:2%;">
  
</div>  
<div style="width:95%; height:32%;  margin-left:3%;margin-top:2%; overflow-x:auto;  margin-right:1%; border-style:hidden; ">
<table id="items1" data-uid="items1" class ="items"    align="center" style="width:99%;   margin-left:1%; margin-right:1%;">
<tr>
<th width="1%" >S.NO</th>
<th width="43%">Item</th>
<th width="43%">Quantity in Stock</th>
<th width="8%">Qnty</th>
<th width="8%">location</th>
</tr>

<script>
//for(i=1;i<=2;i++){

</script>
<?php $f=2; for($i=1;$i<=25;$i++){ ?>

<tr  id="tra<?php echo $i;?>">
<td style="background-color:#eee" onClick="showall(<?php echo $i;?>)" id="slr<?php echo $i;?>" ><?php echo $i;?>
 </td>
<td> <input name="piddd[]" id="pid<?php echo $i;?>" style="border:hidden;width:100%;" type="hidden" value="" />
<input type="hidden" value="" id="dupli<?php echo $i;?>" class="dupli<?php echo $i;?>" name="dupli<?php echo $i;?>">
<input name="item[]" id="item<?php echo $i;?>" style="border:hidden;width:100%; height:100%;" type="text"  onFocus="return data(this.id);textbox(this.id);" onKeyPress="getdata1();return get(this.id,(this.parentNode.parentNode.rowIndex));textbox(this.id);" onKeyUp="return get(this.id,(this.parentNode.parentNode.rowIndex));textbox(this.id);" class="rounddefault-width-input"/></td>

<td style="">
<input name="pre" id="prevQty<?php echo $i;?>" style="border:hidden;width:100%;" type="text" value="" onChange="qun(this.id)" readonly />
</td>
<td class="total-line"><input type="text" name="qty[]" id="qty<?php echo $i;?>" style="border:hidden;width:100%; height:100%;" onChange="qun(this.id)" value="" /></td>


<td class="total-line"><select  name="location[]">

	<option value="">---Select---</option>

	  <?php 

			$industry_idQuery=$this->db->query("select * from cybercodex_location where status='A'");

			foreach($industry_idQuery->result() as $industry_idFetch){

	   ?>

		<option value="<?php echo $industry_idFetch->id;?>"<?php if($industry_idFetch->id==$location_id) {  ?> selected <?php } ?>> <?php echo $industry_idFetch->location_name;  ?> </option>

	  <?php } ?>

 </select> </td>
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
<td style="border:hidden" align="right"><input type="button" class="btn-success btn-sm" onClick="return saveFunction();" value="Save"/>&nbsp;&nbsp;<a href="" class="btn-success btn-sm" />Cancel</a></td>
<td style="border:hidden"></td>
</tr>
</table>
<script>
function buttonFun(){
window.location='manage_corporateinvoice';
}



$('input:text').on('keyup', function(e) {

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

<script>

function qun(q){	

  	//var abq=document.getElementById("abqt".value;
//alert(q);
var zz=document.getElementById(q).id;
//alert(zz);
var myarra = zz.split("qty");

var asx= myarra[1];

//alert(asx);

var pri=document.getElementById("qty"+asx).value;

var qnty=document.getElementById("prevQty"+asx).value;
//alert(qnty);
//	alert(pri);

if(Number(pri)>Number(qnty)){
alert("***New Quantity Exceed The Actual Quantity In Stock***");
document.getElementById("qty"+asx).focus();
}
}

</script>
</div></div>
</form>
</body>
</html>