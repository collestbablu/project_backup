<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">		
	<!--select box codex end-->
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

 $invoiceID=$_GET['id'];

?>
<?php
$invoice_hdrQ=$this->db->query("select * from production_production_dtl where invoice_id='".$_GET['id']."'");
$invoiceQuery=$invoice_hdrQ->row();
//$id=$detail->contactid;
//$id;

?>

<?php
if(@$_GET['id']!=''){
@$branchQuery = $this->db->query("SELECT * FROM production_production_dtl where invoice_id='".$_GET['id']."'");
$branchFetch = $branchQuery->row();
}


 if(@$_GET['id']!='' ){
 


  ?>         


<td style="display:none"><input type="hidden" name="invoiceid123" class="span6 " value="<?php echo $branchFetch->invoice_id; ?>" readonly size="22" aria-required='true' /></td>

<?php } else {

                 }?>

<body><?php 
$this->load->view('hotkey');	?>
<input type="hidden" size="10" id="hqnty<?php echo $i;?>2" name="hqnty<?php echo $i;?>2" value=""/>
<form method="post" action="insert_sale" name="edit_sale" id="edit_sale">
<div style="width:100%; height:90%;  margin-top:2%;">
<nav class="navbar navbar-default">
 <div class="navbar-center navbar-brand" href="#"><a class="navbar-brand">View Sale invoice</a></div>
 <?php 
$this->load->view('header');?>
  </nav>
  


  <span style="boder:none;">
 <input name="idd"  type="hidden" id="idd"  maxlength="200"  class="round  my_with"   />
<input name="row"  type="hidden" id="row"  value="25" maxlength="200"  class="round  my_with"   />
<input name="updn"  type="hidden" id="updn"  value="" maxlength="200"  class="round  my_with"   />
<input type="hidden" name="invoiceid1" id="invoiceid" value="<?php echo $invoiceID; ?>">
  </span>
  <div style="width:auto%; height:auto%;  margin-top:2%;">
  <table id="hdr" data-uid="hdr"  class ="items" style="margin-top:1%; width:98%; margin-left:1%; margin-right:1%;" border="0" cellspacing="1" cellpadding="1">
    <tr>
			<td>Finish Goods</td>
			<td>
				<select name="finish_goods">
						<option value="">--select--</option>
						<?php 
							$Query=$this->db->query("select * from tbl_product_stock where Product_typeid='finish_goods'");
							foreach($Query->result() as $fetchQ){
						?>
						<option value="<?php echo $fetchQ->Product_id; ?>" <?php if($fetchQ->Product_id==$branchFetch->finish_goods){ ?> selected="selected" <?php } ?>><?php echo $fetchQ->productname; ?></option>
						<?php } ?> 
				</select>
			</td>
			
		</tr>
  </table>
</div>  
<div style="width:95%; height:32%;  margin-left:3%;margin-top:2%; overflow-x:auto;  margin-right:1%; border-style:hidden; ">
<table id="items1" data-uid="items1" class ="items"    align="center" style="width:99%;   margin-left:1%; margin-right:1%;">
<tr>
<th width="1%" >S.NO</th>
<th width="43%">Product</th>

<th width="8%">Unit</th>
<th width="8%">Quantity</th>
</tr>

<script>
//for(i=1;i<=2;i++){

</script>

<?php
$j=1;

$saleQ=$this->db->query("select * from production_production_dtl where invoice_id='".$_GET['id']."'");
$i=1;
$num= $saleQ->num_rows();
foreach($saleQ->result() as $saleFetch){


$saleQ=$this->db->query("select * from tbl_product_stock where Product_id='$saleFetch->product_id'");
$fetchSale=$saleQ->row();
?>
<tr  id="tra<?php echo $i;?>">
<td style="background-color:#eee" onClick="showall(<?php echo $i;?>)" id="slr<?php echo $i;?>" ><?php echo $j;?>
 </td>
<td><input name="pid[]" id="pid<?php echo $i;?>" style="border:hidden;width:100%;" type="hidden" value="<?php echo $saleFetch->product_id; ?>" />
<input type="hidden" value="" id="dupli<?php echo $i;?>" class="dupli<?php echo $i;?>" name="dupli<?php echo $i;?>">

<input name="item[]" id="item<?php echo $i;?>" style="border:hidden;width:100%; height:100%;" type="text"   onfocus="getdata1();get(this.id);" onKeyUp="getdata1();get(this.id);" onKeyPress="getdata1();get(this.id);" class="rounddefault-width-input" value="<?php if($saleFetch->product_id==$fetchSale->Product_id){ echo $fetchSale->productname; } else { echo $saleFetch->product_id; } ?>"  /></td>

<td><input name="qnty[]"  type="text" id="qnty<?php echo $i;?>"  maxlength="200"   class="round default-width-input my_with" onKeyPress="quantity_change(this.id);return isNumber(event);" onKeyUp="quantity_change(this.id);return isNumber(event);"<?php if($f==1) {?> onFocus="" <?php }?> style="border:hidden;width:100%; height:100%;" tabindex="-1"  value="<?php if($_GET['id']!=''){ echo $saleFetch->unit; } ?>" readonly /></td>
<td class="total-line"><input type="text" name="unit[]" id="unit<?php echo $i;?>" style="border:hidden;width:100%; height:100%;" value="<?php if($_GET['id']!=''){ echo $saleFetch->qnty; } ?>"  /></td>
</tr>
<?php 
 $sum=$num+1;
$i=$i+1;
$j++;
}  
 $sum1=$sum;

?>
<?php $f=2; for($i=$sum1;$i<=25;$i++){ ?>

<tr  id="tra<?php echo $i;?>">
<td style="background-color:#eee" onClick="showall(<?php echo $i;?>)" id="slr<?php echo $i;?>" ><?php echo $i;?>
 </td>
<td> <input name="pid[]" id="pid<?php echo $i;?>" style="border:hidden;width:100%;" type="hidden" value="" />
<input type="hidden" value="" id="dupli<?php echo $i;?>" class="dupli<?php echo $i;?>" name="dupli<?php echo $i;?>">
<input name="item[]" id="item<?php echo $i;?>" style="border:hidden;width:100%; height:100%;" type="text"  onfocus="getdata1();get(this.id);" onKeyUp="getdata1();get(this.id);" onKeyPress="getdata1();get(this.id);" class="rounddefault-width-input"/></td>
<td><input name="qnty[]"  type="text" id="qnty<?php echo $i;?>"  maxlength="200"   class="round default-width-input my_with" onKeyPress="quantity_change(this.id);return isNumber(event);" onKeyUp="quantity_change(this.id);return isNumber(event);"<?php if($f==1) {?> onFocus="" <?php }?> style="border:hidden;width:100%; height:100%;" tabindex="-1"  />
<input type="hidden" size="10" id="hqnty<?php echo $i;?>" name="hqnty<?php echo $i;?>" value=""/>
</td>
<td class="total-line"><input type="text" name="unit[]" id="unit<?php echo $i;?>" style="border:hidden;width:100%; height:100%;" value="" /></td>
</tr>

<?php 
}
?>
</table>
</div>

<!-- bill sundry part-->
<div style=" width:85%; height:15%;  margin-left:3%; margin-top:1%; overflow-x:auto;  margin-right:1%; border-style:hidden;">

</div>

<div style="width:100%; height:auto%;  margin-top:2%;">

<table id="items" align="center" style="width:98%;    margin-left:1%; margin-right:1%;">
<tr style="border:hidden">
<td style="border:hidden" align="right"><input type="button"  class="btn-success btn-sm" value="Save" onClick="saveFunction()"/>&nbsp;&nbsp;<input class="btn-danger btn-sm " type="button"  onClick="cancelform()"   value="Cancel"/></td>
<td style="border:hidden"></td>
</tr>
</table>
</div>

<script>

	function cancelform(){
	window.close();
	}
	function myCreateFunction() {
 			
 				
				var row = document.getElementById("row").value;
				var zzz=Number(row)+1;
				document.getElementById("row").value=zzz;

	 		var table = document.getElementById("items1");
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
			row.id= "tra"+zzz;
			
			var cell1 = row.insertCell(0);
            cell1.innerHTML = zzz;
			cell1.style="background-color:#eee"
			
			var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name="item[]";
			element2.id="item"+zzz;
			element2.class="rounddefault-width-input;"
			element2.style="border:hidden;width:100%; height:100%;"
			element2.setAttribute('onKeyUp', 'return get(this.id); textbox(this.id);');
			element2.setAttribute('onFocus', 'return data(this.id); textbox(this.id);');
			cell2.appendChild(element2);
			
			var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name="qnty[]";
			element3.id="qnty"+zzz;
			element3.style="border:hidden;width:100%;"
			element3.setAttribute('onKeyPress', 'quantity_change(this.id);return isNumber(event);');
			element3.setAttribute('onKeyUp', 'quantity_change(this.id);return isNumber(event);');
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name="unit[]";
			element4.id="unit"+zzz;
			element4.style="border:hidden;width:100%;"
            cell4.appendChild(element4);
			
			var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "text";
            element5.name="price[]";
			element5.id="price"+zzz;
			element5.style="border:hidden;width:100%;"
			element5.setAttribute('onKeyPress', 'quantity_change(this.id);return isNumber(event);');
			element5.setAttribute('onKeyUp', 'quantity_change(this.id);return isNumber(event);');
			cell5.appendChild(element5);
			
			 var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "text";
            element6.name="amt[]";
			element6.id="amt"+zzz;
			element6.style="border:hidden;width:100%;"
            cell6.appendChild(element6);
			
			var cell7 = row.insertCell(6);
            cell7.innerHTML = "cancel";
			cell7.id= "del"+Number(zzz);
			//cell7.addEventListener("onClick", function() {return get(cell7.id);});
			cell7.setAttribute('onclick', 'myDeleteFunction(this.id)');
			//cell7.onClick="return get(this.id);"
			
            
			
			 

	}
	
	function get(zz,tr)
	{
		//alert("xcxcx");
		var zz=document.getElementById(zz).id;
		var myarra = zz.split("item"); 
		var rownum= myarra[1]; ;
		document.getElementById("idd").value=rownum;
		if(tr>1){
		var ss=Number(rownum-1);
		if(document.getElementById("item"+ss).value==""){
		alertify.alert('Above Row Emptyaa!');
	
		document.getElementById("item"+rownum).value ="";
		document.getElementById("item"+ss).value ="";
		document.getElementById("hqnty"+ss).value ="";
		document.getElementById("qnty"+ss).value ="";
		document.getElementById("price"+ss).value ="";
		document.getElementById("amt"+ss).value ="";
		//document.getElementById("item"+rownum).focus();
		
		return false;
		}
		}
		
		return true;
	}
	
	function bilsndry(zz,tr)
	{
		
	
   		
		var zz=document.getElementById(zz).id;
		var myarra = zz.split("bil");
		var asx= myarra[1];
		if(tr>1){
		var ss=Number(asx-1);
		if(document.getElementById("bil"+ss).value==""){
		alertify.alert('Above Row Empty');
		document.getElementById("bil"+asx).value ="";
		return false;
		}
		
		}
		if(document.getElementById("item1").value==""){
		alertify.alert('No Item Selected');
		document.getElementById("bil"+asx).value ="";
		document.getElementById("item1").focus();
		return false;
		}
		asx=document.getElementById("idd").value=asx;
		return true;
	}
	
	function quantity_change(id)
	{
	 
	 	document.getElementById("updn").value=0;
		var regex = /(\d+)/g;
		var rownum=(id.match(regex));
		var zz=0;
		var res = new Array();
		var totalqnty=document.getElementById("totalqnty").value;
		var totalamnt=document.getElementById("totalamnt").value;
		var hqnty=document.getElementById("hqnty"+rownum).value;
		var qnty=document.getElementById("qnty"+rownum).value;
		var price=document.getElementById("price"+rownum).value;
		var amt=document.getElementById("amt"+rownum).value;
		var granamnt=document.getElementById("granamnt").value;
		//var alttotalqnty=document.getElementById("alttotalqnty").value;
		
		res = qnty.split("+");
		if(res.length<3){}else{
		document.getElementById("qnty"+rownum).value=res[0]+"+"+res[1];
		return false;
		}
		 if(res[0]!=''){
		 qnty=res[0];
		 }
		 if(res[1]>0){
		 zz=res[1];
		 }
		var total=Number(price*res[0]);
		
		if(total==0){
			total='';
			}
		var granamnta= Number(granamnt-amt);
		totalamnt=Number(totalamnt-amt);
		document.getElementById("amt"+rownum).value=total;
		document.getElementById("hqnty"+rownum).value=Number(qnty)+Number(zz);
		document.getElementById("totalamnt").value=(totalamnt+total);
		//document.getElementById("alttotalqnty").value=Number(alttotalqnty)+Number(qnty)-Number(zz);
		document.getElementById("totalqnty").value=Number(totalqnty-hqnty)+Number(zz)+Number(qnty);
		document.getElementById("granamnt").value=Number(granamnta+total);
		
		getbillsndry("nart1");
	}

function isNumber(evt) {
  evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57 )  ) {
        if( charCode == 43){
		 return true;
		}
		return false;
    }
    return true;
}


	
function getbillsndry(id)

	{
		document.getElementById("updn").value=0;
		var regex = /(\d+)/g;
		var rownum=(id.match(regex));
		do{
		var cal= document.getElementById("cal"+rownum).innerHTML;
		var calt= document.getElementById("calt"+rownum).value;
		var nart = document.getElementById("nart"+rownum).value;
		var totalamnt=document.getElementById("totalamnt").value;
		var granamnt=document.getElementById("granamnt").value;
		var totalqnty=document.getElementById("totalqnty").value
		var dic=document.getElementById("dis"+rownum).value;
		var nart=document.getElementById("nart"+rownum).value;

	if(cal=="/Unit")
		{
		cal="Per Man Qty";
		}
	if(cal=="%")
		{
		cal="Percentage";
		}
	if(cal=="Percentage")
		{
		 var peramnt=Number(nart*totalamnt)/100;
		 document.getElementById("cal"+rownum).innerHTML="%";
		 document.getElementById("dis"+rownum).value=Number(peramnt);
		}
	if(cal=="Per Man Qty")
		{
	 	var peramnt=Number(nart*totalqnty);
		document.getElementById("cal"+rownum).innerHTML="/Unit";
		document.getElementById("dis"+rownum).value=Number(peramnt);
		}
	 if(calt=="Subtractive")
	 	{
			
	 		 var granamnta=Number(granamnt)+Number(dic);
			 document.getElementById("granamnt").value=Number(granamnta)-Number(peramnt);
		}
	 if(calt=="Adactive")
	 	{
	 	var granamnta=Number(granamnt)-Number(dic);
	 	document.getElementById("granamnt").value=Number(granamnta)+Number(peramnt);
		}
		rownum++;
		}while(document.getElementById("bil"+rownum).value!="");
			
	}
	
function clearamnt(id)
	{
		
	var regex = /(\d+)/g;
		var rownum=(id.match(regex));
		var cal= document.getElementById("cal"+rownum).innerHTML;
		var calt= document.getElementById("calt"+rownum).value;
		var nart = document.getElementById("nart"+rownum).value;
		var totalamnt=document.getElementById("totalamnt").value;
		var granamnt=document.getElementById("granamnt").value;
		var totalqnty=document.getElementById("totalqnty").value;
		var dic=document.getElementById("dis"+rownum).value;
		var nart=document.getElementById("nart"+rownum).value;
if(calt=="Subtractive")
	 	{
			
	 		 var granamnta=Number(granamnt)+Number(dic);
			 document.getElementById("granamnt").value=Number(granamnta);
			 document.getElementById("cal"+rownum).innerHTML="";
			document.getElementById("calt"+rownum).value="";
		 document.getElementById("nart"+rownum).value="";
		document.getElementById("dis"+rownum).value="";
		document.getElementById("nart"+rownum).value="";
		}
	 if(calt=="Adactive")
	 	{
	 	var granamnta=Number(granamnt)-Number(dic);
	 	document.getElementById("granamnt").value=Number(granamnta);
		 document.getElementById("cal"+rownum).innerHTML="";
			document.getElementById("calt"+rownum).value="";
		 document.getElementById("nart"+rownum).value="";
		document.getElementById("dis"+rownum).value="";
		document.getElementById("nart"+rownum).value="";
		}
	
	}
	
	function unique_check(zz,rownum){
   if((!document.getElementById("itm"+zz)) || ( zz == document.getElementById("pid"+rownum).value)){
	  	if(zz == document.getElementById("pid"+rownum).value)
			{}
			else{
			if(document.getElementById("pid"+rownum).value!="")
			{document.getElementById("itm"+document.getElementById("pid"+rownum).value).id = "itm"+zz;}
			else{document.getElementById("dupli"+rownum).id="itm"+zz;}
			}
			document.getElementById("pid"+rownum).value =zz;
			// document.getElementById("qnty"+rownum).focus();
		 		   }else{
		document.getElementById("hqnty"+rownum).value ="";
		document.getElementById("qnty"+rownum).value ="";
		document.getElementById("price"+rownum).value ="";
		document.getElementById("amt"+rownum).value = null;
		document.getElementById("unit"+rownum).value ="";
		document.getElementById("item"+rownum).value ="";
		//document.getElementById("item"+rownum).focus();
		
		
		alertify.alert(zz+" already in list");
			return false;
				  
				   
				  // return false;
		   }
        }
		
		function unique_check_bill(zz,rownum){
    if((!document.getElementById("bsd"+zz)) || ( zz == document.getElementById("bid"+rownum).value)){
	  	if(zz == document.getElementById("bid"+rownum).value)
			{}
			else{
			if(document.getElementById("bid"+rownum).value!="")
			{document.getElementById("bsd"+document.getElementById("bid"+rownum).value).id = "bsd"+zz;}
			else{document.getElementById("duplisdy"+rownum).id="bsd"+zz;}
			}
			document.getElementById("bid"+rownum).value =zz;
					 		   }else{
		document.getElementById("bil"+rownum).value ="";
		document.getElementById("natation"+rownum).value ="";
		document.getElementById("nart"+rownum).value ="";
		document.getElementById("calt"+rownum).value = null;
		document.getElementById("dis"+rownum).value ="";
		document.getElementById("cal"+rownum).innerHTML ="";
		alertify.alert(zz+" already in list");
		return false;
		   }
		          }
	
	
	function showall(row)
 {
	 var w = 200;
     var h = 200;
	 var left = Number((screen.width/2)-(w/2));
	 var tops = Number((screen.height/2)-(h/2));
   	 var myWindow = window.open('all_product_function?row='+row, "myWindow", "width=600, height=600,top=10, left=500");
  
   }
   
   function myDeleterow(event) {
	var regex = /(\d+)/g;
	var rownum=(event.target.id.match(regex));
 		
        var row = $(this).parents("tr:first");
        if ($(this).is(".up")) {
            row.insertBefore(row.prev());
        } else if ($(this).is(".down")) {
            row.insertAfter(row.next());
        } else if ($(this).is(".top")) {
            //row.insertAfter($("table tr:first"));
            row.insertBefore($("#items1 tr:first"));
        }else {
            row.insertAfter($("#items1 tr:last"));
        }
		slr("items1");
		renameitem(rownum);
			
}
	
	function slr(zz){
		var table = document.getElementById(zz);
        var rowCount = table.rows.length;
		  for(var i=1;i<rowCount;i++)
		  {    
              table.rows[i].cells[0].innerHTML=i;
		  }
			 
			  
}
function renametble(rownum)
{
		document.getElementById("bil"+rownum).value ="";
		var a = document.getElementById("bid"+rownum).value;
			
		document.getElementById("bid"+rownum).value ="";
		document.getElementById("bsd"+a).value='';
		document.getElementById("bsd"+a).id="duplisdy"+rownum;
		
		document.getElementById("natation"+rownum).value ="";
		document.getElementById("nart"+rownum).value ="";
		document.getElementById("calt"+rownum).value = null;
		document.getElementById("dis"+rownum).value ="";
		document.getElementById("cal"+rownum).innerHTML ="";
	}
 
 
 function renameitem(rownum)
{
		document.getElementById("item"+rownum).value ="";
		var a = document.getElementById("pid"+rownum).value;
			
		document.getElementById("pid"+rownum).value ="";
		document.getElementById("itm"+a).value='';
		document.getElementById("itm"+a).id="dupli"+rownum;
		
		document.getElementById("qnty"+rownum).value ="";
		document.getElementById("hqnty"+rownum).value ="";
		document.getElementById("unit"+rownum).value = null;
		document.getElementById("price"+rownum).value ="";
		document.getElementById("amt"+rownum).value ="";
	}
	
	
function saveFunction()
{
	   
$("#edit_sale").submit();
//window.close();
}
	

</script>

<script>

});
</script>
	
</div>
</form>
</body>
</html>