<?php
@$tableName="tbl_bill_sundry";

@$location="manage_sundry";

//session_start();
//echo $_SESSION['comp_id_se'];
//include("includes/include.inc.php"); 
//protect_admin_page();
//$tableName="dizypro_saleorder_hdr";
extract($_POST);

$quantity=1;

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php //include('includes/title.php'); ?>

<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">

<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

$(function(){

$("#special1").hide();

$("#special").click(function(){

$("#special1").show();

});



});



</script>
<script>
function tab(){
  document.getElementById("contact_id_copy").focus();
}
</script>

<script>
function getXMLHTTP() { //fuction to return the xml http object

var xmlhttp=false;

try{

xmlhttp=new XMLHttpRequest();

}

catch(e) {

try{

xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

}

catch(e){

try{

xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

}

catch(e1){

xmlhttp=false;

}

}

}



return xmlhttp;

}



function getadd(Productctg_id) {	


		var strURL="get_pro_typ_function?Productctg_id="+Productctg_id;

		

		var req = getXMLHTTP();

		

		if (req) {

			

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {

						//alert(req.responseText);

						document.getElementById('adddiv').innerHTML=req.responseText;						

					} else {

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}

				

	}

	var amt_before_vat;

	

function vat()

{

var vatp=document.getElementById("vat_purchase").value;





var uprice=document.getElementById("unitprice_sale").value;

 

 

 

 var va=vatp/100;

 //alert(va);



	 amt_before_vat=uprice/(1+va);

	

	//alert(amt_before_vat);

	

	 

	var vata=uprice-amt_before_vat;

	vata=Number(vata).toFixed(2);

	//alert(vata);

	document.getElementById("st_purchase").value=vata;

	

	

	

}




</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script type="text/javascript">
     $(document).ready(function(){
        $('#bill_name').change(function(){
		            var val = $('#bill_name').val();
            $('#print_name').val(val);
        });
     });
	</script>
	<script>
	//function getSubmit(){
			//alert("2");
		//var a=document.getElementById("billdiv").value;
		//alert(a);
		//if(a!=''){
			//	alert("raj");
		//}else{
		//alert("rajj");
		//document.getElementById("form_id").action = "insert_bill"; 
		//document.getElementById("form_id").submit();
		//}
		//}
 	</script>

<script>



function qrfn(v)
{
//alert(v);


 // alert('okkkkkkkkkk');
		    if(xobj)
			 {
			 var obj=document.getElementById("getqt");
			 xobj.open("GET","get-quote.php?con="+v,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
			   }
			  }
			  
			  
			 }
			 xobj.send(null);


document.getElementById("qrf").value=v;
}


function idetails()
{


}

</script>
<script>
///GULSHAN////


function fsv(v)
{
//var rc=document.getElementById("invoice").rows.length;
//alert(rc);
//document.getElementById("f1").action="index.php";
v.type="submit";
}
window.addEventListener("keydown", checkKeyPressed, false);

function checkKeyPressed(e) {
var s=e.keyCode;
//alert(s);
 
 
 
 
 
 
 /*

var ppp=document.getElementById("prd").value;
var sspp=document.getElementById("spid").value;

var sspp=document.getElementById(sspp).value;*/
   /* if (e.keyCode == "13")
	 {
	
	 if(ppp==sspp)
	 {
        adda();
		//alert("Added.......");
		document.getElementById("prd").value="";
		
				document.getElementById("prd").focus;	
	 }
	 else
	 {
	   alert("Enter Correct Product");
	 
	 }
	 
	}*/
 
 
var ppp=document.getElementById("prd").value;
var sspp=document.getElementById("spid").value;

var sspp=document.getElementById(sspp).value;



var ef=document.getElementById("ef").value;
		ef=Number(ef);
			//alert(ef);
//return false;
var countids=document.getElementById("countid").value;
//alert(countids);
for(n=1;n<=countids;n++)
{
//alert(n);
document.getElementById("tyd"+n).onkeyup = function (e) {

document.getElementById("lph").focus();
document.getElementById("prdsrch").innerHTML=" ";
}
}

document.getElementById("lph").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
	
document.getElementById("qn").focus();
}
}
document.getElementById("qn").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
document.getElementById("dispr").focus();
}
if(document.getElementById("qn").value=="" && entr==08){
document.getElementById("lph").focus();
}

    if (e.keyCode == "13")
	 {
	 
	// alert(ef);
	 
	 e.preventDefault();
       e.stopPropagation();
	
       if(ppp==sspp || df==1)
	 {
       
        adda();
	//document.getElementById("prd").value="";document.getElementById("prd").focus;	
		vcharge(Number(document.getElementById("vtcharge").value));
		icharge(Number(document.getElementById("icp").value));
		scharge(Number(document.getElementById("scp").value))
		//alert("Added.......");
		//document.getElementById("prd").value="";
		
		document.getElementById("ef").value=0;
				document.getElementById("prd").focus;	
				
				//alert(ef);
				
/*				
var ddid=document.getElementById("d");

ddid.id=document.getElementById("spid").value;

//document.getElementByName("did").value=document.getElementById("spid").value;

alert(ddid.id);
*/

var ddid=document.getElementById("spid").value;

var ddi=document.getElementById(ddid);
ddi.id="d";
//document.getElementByName("did").value=document.getElementById("spid").value;

//alert(ddid.id);
				
			}
			
	       else
			{
			
	   alert("Enter Correct Product");
			
			}
			
			
			
			
		return false;
			
							
				
    }
	}
}


function FillBilling(f) 
{ 
var c=document.getElementById("billingto").value;
//alert(c);

if(c=='on') 
  {
	  
//alert('kkkkkkkkkkkkk');

	var po=document.getElementById("po").value;
	
	//alert(po);
	
	
	  document.getElementById("po1").value=document.getElementById("po").value;
	  document.getElementById("add11").value=document.getElementById("ad1").value;
	  document.getElementById("ad21").value=document.getElementById("ad2").value;
	  document.getElementById("st1").value=document.getElementById("st").value;
	  document.getElementById("ct1").value=document.getElementById("ct").value;
	  document.getElementById("stt1").value=document.getElementById("stt").value;
	  document.getElementById("cot1").value=document.getElementById("cot").value;
	  document.getElementById("pin1").value=document.getElementById("pin").value;
	
	
	
	  
	   
	  
	 
	
	
  }
  
  else
  {
  
  
	  document.getElementById("po1").value="";
	  document.getElementById("add11").value="";
	  document.getElementById("ad21").value="";
	  document.getElementById("st1").value="";
	  document.getElementById("ct1").value="";
	  document.getElementById("stt1").value="";
	  document.getElementById("cot1").value="";
	  document.getElementById("pin1").value="";
	
	
  
  
  }
  
}





function addbill(v)
{
if(v>0)

alert('add....');

adda();
}

function Delt(i,r)
{

    //alert(r);
var t =i;
var regex = /(\d+)/g;
nn= i.match(regex)
//ssalert(nn);
r=nn;
 var np=document.getElementById("netprh"+r).value;
 
  // np=document.getElementById("np"+r).value;
//alert(np);

 
 var table = document.getElementById("invoice");
 	//var rowCount = (table.rows.length)-1;
alert(table.rows.length-1);
//alert(r);
 var cnf = confirm('Are You Sure..??? you want to Delete line no.'+r);
if (cnf== true)
 {
 
  var total=document.getElementById("sub_total").value;
 
 total=Number(total);
 
 total=total-np;
 total=Number((total).toFixed(2));
 document.getElementById("sub_total").value=total;
 document.getElementById("gtotal").value=total;
 r=r-1;
 


	if(table.rows.length==1)
	{
		table.deleteRow(-1); rw=0;
	}


 
table.deleteRow(r);
 
//rw=rowCount;
 rw=rw-1;
 }
  else
   {
    txt = "You pressed Cancel!";
   }
 

}



function editselectrow(d,r)
 {
	 
  
      //alert(r);

var regex = /(\d+)/g;
nn= d.match(regex)
//ssalert(nn);
id=nn;
//alert(id);
 var pnm=document.getElementById("prdh"+id).value;
 
 
//document.getElementById("prdsrch").innerHTML=pnm;


//alert(pnm);
 
  var lpr=document.getElementById("lpr"+id).value;

 //var unit=document.getElementById("usunit").value;
  
//alert(lpr);
 
  var qn=document.getElementById("qn"+id).value;
  
//alert(qn);
 
 
  var disa=document.getElementById("disa"+id).value;
   
//alert(disa);
 
  var dispr=document.getElementById("dispr"+id).value;
   
//alert(dispr);
 
  var dvat=document.getElementById("dvat"+id).value;
   
//alert(dvat);
 
  //var dvatA=document.getElementById("dvatA"+id).value;
   
//alert(dvatA);
 
   var tx=document.getElementById("tx"+id).value;
    
//alert(tx);
 
  var tds=document.getElementById("tds"+id).value;
 
   
//alert(tds);
 
  var tot=document.getElementById("tp"+id).value;
  var net=document.getElementById("netprh"+id).value;
 
  
 
//alert(tot);
 
  
//alert(net);
 
//alert(np);

document.getElementById("ef").value=1;


var ddid=document.getElementById("d");

ddid.id=document.getElementById("spid").value;

//document.getElementByName("did").value=document.getElementById("spid").value;

//alert(ddid.id);
ddid.value=pnm;


			
document.getElementById("prd").value=pnm;


document.getElementById("lpr").innerHTML=lpr;



document.getElementById("lph").value=lpr;


document.getElementById("qn").value=qn;

document.getElementById("disa").value=disa;

document.getElementById("dispr").value=dispr;

document.getElementById("dvatA").value=dvatA;

document.getElementById("dvat").value=dvat;

document.getElementById("tpr").innerHTML=tot;


document.getElementById("tph").value=tot;


document.getElementById("ttax").innerHTML=tx;


document.getElementById("ttaxh").value=tx;
//document.getElementById("usunit").value=unit;

document.getElementById("dsct").innerHTML="-"+tds;

 document.getElementById("dscth").value=tds;

 
document.getElementById("np").innerHTML=net;
 
document.getElementById("nph").value=net;
document.getElementById("qn").focus();

 //document.getElementById(prd).readOnly=true;
 

   //////////////////////IMRAN////////
    var i = r.parentNode.parentNode.rowIndex;
	document.getElementById("invoice").deleteRow(i);
	
	/*//alert(i);
     var cnf = confirm('Are You Sure..??? you want to Delete line no.'+(id));
if (cnf== true)
 {
	//
	*/
	//document.getElementById("invoice").deleteRow(i);
	
	var total=document.getElementById("sub_total").value;
 
 total=Number(total);
 
 //alert(net);
 total=total-net;
 total=Number((total).toFixed(2));
 
 
 
 
 document.getElementById("sub_total").value=total;
 document.getElementById("gtotal").value=total;
	
	
	
	
	

	//}*/
	
	
	
}




function deleteselectrow(d,r)
 {
   
      //alert(r);

var regex = /(\d+)/g;
nn= d.match(regex)
//ssalert(nn);
id=nn;
//alert(id);
 var np=document.getElementById("netprh"+id).value;
 
  // np=document.getElementById("np"+r).value;
//alert(np);

 
   //////////////////////IMRAN////////
    var i = r.parentNode.parentNode.rowIndex;
	//alert(i);
     var cnf = confirm('Are You Sure..??? you want to Delete line no.'+(id));
if (cnf== true)
 {
	document.getElementById("invoice").deleteRow(i);
	
	
	var total=document.getElementById("sub_total").value;
 
 total=Number(total);
 
 total=total-np;
 total=Number((total).toFixed(2));
 document.getElementById("sub_total").value=total;
 document.getElementById("gtotal").value=total;
 document.getElementById("balance_total").value=total;
	
	}
	/*document.getElementsByName("rawquantity")[i-1].value=i;
	var le=document.getElementById("tbl").rows.length;
	for(var i=1;i<le;i++)
	{
		document.getElementById("tbl").rows[i].cells[0].innerHTML=i-1;
	*/
}



function cust1(v,ky)
{
//alert(v);
if(ky=='cname')
{
document.getElementById("cn").value=v;
}
if(ky=='mob')
{
document.getElementById("cmob").value=v;
}
if(ky=='adrs')
{
document.getElementById("cadrs").value=v;
}

}
 
function billQunt(d,rw,v)
{
	//alert(v);
	//alert(d);
    //alert(r);
var t =d;
var regex = /(\d+)/g;
r= d.match(regex)
//alert(r);
//alert(text.match(regex));
			var pr=document.getElementById("lpr"+r).value;
		 //document.getElementById("lp"+r).innerHTML="22";
		  
		   var dv=document.getElementById("dv"+r).value;
		   var vt=document.getElementById("vt"+r).value;
		    var sa=document.getElementById("sa"+r).value;
		   var se=document.getElementById("se"+r).value;
		    
			var tt=document.getElementById("tt"+r).value;		  
			 var tx=document.getElementById("tx"+r).value;
			  var tds=document.getElementById("tds"+r).value;
		  // var np=document.getElementById("np"+r).value;
		 
		   
		//alert(pr);
		
		//alert(dv);
		//alert(vt);
		//alert(sa);
		//alert(se);
		
		//alert(tt);
		
		//alert(tx);
		//alert(tds);
		//alert(np);
		
		   
		//document.getElementById("dvatA1").value=tpr;
		//alert(document.getElementById("tp1").value);
		
					    var qn=v;
						if(v=="" || v==0)
						{
						qn=1;
						}
						
						var prt='prt'+r;
						//alert(prt);
						var tp='tp'+r; 
						
						var tph='tph'+r;
						
						var npn='netprh'+r;
						
						var nps='np'+r;
			     

				
						//document.getElementById("tpr").innerHTML=qn*pr;
						document.getElementById(tp).value=qn*pr;
						document.getElementById(tph).value=qn*pr;
						//document.getElementById("np").innerHTML=qn*pr;
						document.getElementById(npn).value=qn*pr;
						document.getElementByName(nps).value=qn*pr;
//////////////////////////////CALLING FUNCTION AFTER CHANGES QUANTITY...////////////////////////////
			/*		var da=document.getElementById("disa").value;
					
					var dp=document.getElementById("dispr").value;					
				var dv=document.getElementById("dvat").value;
				//alert(dv);
				var vt=document.getElementById("vat").value;
				var sl=document.getElementById("sale").value;
				var sr=document.getElementById("ser").value;
				taxf(dp,'disc');
				taxf(dv,'dv');
				taxf(vt,'vt');
				taxf(sl,'sl');
				taxf(sr,'sr');*/

}
 
 function vcharge(v)
 {

 var subtl=document.getElementById("sub_total").value;
var ic=document.getElementById("ic").value;
 v=Number(v);
 ic=Number(ic);
  subtl= Number(subtl);
  
  document.getElementById("gtotal").value=subtl+v+ic;
  scharge(Number(document.getElementById("scp").value));
	
 
 
 }
 function advcharge(v)
{
   v=Number(v);
   var gtotal=Number(document.getElementById("gtotal").value);
   tl=(v*gtotal)/100;
   document.getElementById("advance_total").value=tl;
   document.getElementById("balance_total").value=(gtotal-tl).toFixed(2);
}
 
 function icharge(v)
 {
   v=Number(v);
   subtl=document.getElementById("sub_total").value;
   subtl= Number(subtl);
   tl=(v*subtl)/100;
   document.getElementById("ic").value=tl;
   var vc=Number(document.getElementById("vtcharge").value);
   gt=subtl-tl+vc;
   gt=Number(gt).toFixed(2);
   document.getElementById("gtotal").value=gt;
   scharge(Number(document.getElementById("scp").value));
}
 

 function scharge(v)
 {
	v=Number(v);
	var ic=document.getElementById("ic").value;
	var vtcharge=document.getElementById("vtcharge").value;
	var subt=document.getElementById("sub_total").value;
	//alert(subt);
	s= Number(vtcharge)-Number(ic);
	sc=(subt*v)/100;
	sc=Number(sc).toFixed(2);
	document.getElementById("sc").value=sc;
	sc= Number(sc);
	
	subtl=document.getElementById("sub_total").value;
	subtl= Number(subtl);
    gt=subtl+sc+s;
	gt=Number(gt).toFixed(2);
	document.getElementById("gtotal").value=gt;
	 advcharge(document.getElementById("advance_totalper").value);
  }
  
 
var eid=0;



function eidf(v)
		  {
		//alert(i);
			var contact=document.getElementById("entityfl").value; 
var cr=false;
		if(contact!="" && contact!=v)
		{
			var table = document.getElementById("invoice");
			//			alert(table.rows.length);
			if(table.rows.length>0)
			{
	            cr=confirm('Previous Invoice will be Loss..\n Are You Sure..??')
			
			}
			else
			{
				cr=true;
			}
			if(cr==true)
			{
				
//or use :  var table = document.all.tableid;
for(var i = table.rows.length - 1; i >=0; i--)
{
    table.deleteRow(i);
}
				
document.getElementById("entityfl").value=v; 				
				document.getElementById("contact_id").value = document.getElementById("entityfl").value;
	 eid=v;	
							//window.location.reload();
		    }else
			{
	//			 eid=v;
//document.getElementById("entityfl").value=v;
				//alert(document.getElementById("entityfl").value);
			document.getElementById("contact_id").value = document.getElementById("entityfl").value;
		}
		}
		else
		{
		 eid=v;
		 document.getElementById("entityfl").value=v;
		 document.getElementById("contact_id").value = document.getElementById("entityfl").value;
		
		 
		               //var x = 
			 // document.getElementById("contact_id").selectedIndex.text='ooooo';
	 

		}
		 
		  }
 
 //function showall1()
 //{

 // var product_catid=document.getElementById("Productctg_id").value;
	//	 if(product_catid=='')
		// {
		 //alert("Please select School.");
	//	 }
// }
 //anoj
 
 
 function deletedata(v,r,p,t)

 {


  var cnf = confirm('Are You Sure..???');

if (cnf== true)

 {

 			

var oRows = document.getElementById('invoice2').getElementsByTagName('tr');

var iRowCount = oRows.length;



//alert('Your table has ' + iRowCount + ' rows.');



if(iRowCount==1)

{

r=0;

}



 var i = t.parentNode.parentNode.parentNode.rowIndex;

 //alert(i);

			

			document.getElementById("invoice2").deleteRow(i);

			

	
	
	
	
	
	var subtotal=document.getElementById("sub_total").value;

	subtotal=Number(subtotal);

	nptl=Number(p);

	//alert(nptl);
//alert(nptl);
	var subtl=subtotal-nptl;

	subtl=Number((subtl).toFixed(2));

	document.getElementById("sub_total").value=subtl;

	document.getElementById("gtotal").value=subtl;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
			

}			

			

 

 }

 
 
function getdata(v)
		  {
		 
		 currentCell = 0;
		 //var product_catid=document.getElementById("Productctg_id").value;
	
		 
		 //if(product_catid=='')
		 //{
		 //alert("Please select School.");
		 //}
		 //alert(product_catid);
		 var tp='Contact';
		 var product1=document.getElementById("prd").value;
		 var product=product1;
		 
		    if(xobj)
			 {
			 var obj=document.getElementById("prdsrch");
			 xobj.open("GET","getproduct_fun?con="+product,true);
			 //alert(product);
			 
  		 
			 
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
			   }
			  }
			  
			  
			 }
			 xobj.send(null);
		  }
  

 
 
function getdata111()
		  {
		 // alert('okkkkkkkkkk');
		    if(xobj)
			 {
			 var obj=document.getElementById("prdsrch");
			 xobj.open("GET","getproduct.php?con="+document.getElementById("prd").value,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
			   }
			  }
			  
			  
			 }
			 xobj.send(null);
		  }
          function cust()
		  {
		    if(xobj)
			 {
			 var obj=document.getElementById("cl");
			 xobj.open("GET","cust.php?con="+document.getElementById("cd").value,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
			   }
			  }
			  
			  
			 }
			 xobj.send(null);
		  }




function quan(q)
  {
	  
		var abq=document.getElementById("abqt").value; 
 var qn=q;
	 qn=Number(qn);
		  abq=Number(abq);
	
		if(qn<=abq)
		{
	if(q=="" || q==0)
				qn=1;
	            var pr=document.getElementById("lph").value;
					//alert(pr);
				 //var tph=Number(qn*pr);
				 var tph=Number((qn*pr).toFixed(2));
				document.getElementById("tpr").innerHTML=tph;
				document.getElementById("tph").value=tph;
				document.getElementById("np").innerHTML=tph;
				document.getElementById("nph").value=tph;
//////////////////////////////CALLING FUNCTION AFTER CHANGES QUANTITY...////////////////////////////
				var da=document.getElementById("disa").value;
				var dp=document.getElementById("dispr").value;					
				var dv=document.getElementById("dvat").value;
				//alert(dv);
				var vt=document.getElementById("vat").value;
				var sl=document.getElementById("sale").value;
				var sr=document.getElementById("ser").value;
				taxf(dp,'disc');
				taxf(dv,'dv');
				taxf(vt,'vt');
				taxf(sl,'sl');
				taxf(sr,'sr');
		}
		else
		{
//var qcf=confirm('Available Qnt. ('+abq+') is Less than Required Qnt.('+q+') ...');
     //alrt(qcf);                 document.getElementById("qn").value=abq;
					 // quan(abq); 
					///// this is alert message ///////
					/*var qq=confirm('Available Qnt. ('+abq+') is Less than Required Qnt.('+q+')\n Please Confirm to Add..?');
					if(qq==true)
					{*/
	if(q=="" || q==0)
				qn=1;
	            var pr=document.getElementById("lph").value;
						//alert(pr);
					 //var tph=Number(qn*pr);
					 var tph=Number((qn*pr).toFixed(2));
					document.getElementById("tpr").innerHTML=tph;
					document.getElementById("tph").value=tph;
					document.getElementById("np").innerHTML=tph;
					document.getElementById("nph").value=tph;
//////////////////////////////CALLING FUNCTION AFTER CHANGES QUANTITY...////////////////////////////
					var da=document.getElementById("disa").value;
					var dp=document.getElementById("dispr").value;					
      				var dv=document.getElementById("dvat").value;
				//alert(dv);
				var vt=document.getElementById("vat").value;
     			var sl=document.getElementById("sale").value;
				var sr=document.getElementById("ser").value;
				taxf(dp,'disc');
				taxf(dv,'dv');
				taxf(vt,'vt');
				taxf(sl,'sl');
				taxf(sr,'sr');
		document.getElementById("qn").value;			
					/////// this code for alert avilable quantity //////// 
					//}
					/*else
					{
						document.getElementById("qn").value=0;
						quan(abq); 	
						document.getElementById("qn").select();					
					}
					///////////////end//////////////////////////
					 */ 
		}
///////////////////////////////////////////////////////////////////////////////////////////////////
	  }
<!----------------------------------CALCULATION---------------------------->
function taxf(p,m)
{

//alert(m);
	var dvatA=document.getElementById("dvatA").value;
	  var prcc=document.getElementById("tph").value;
	  //alert(dvatA);
	 var dn=((prcc*p)/100);
	//var dn=Number((dn));
	
	var dn=Number((dn).toFixed(2));
	 
	 
	 var zx=document.getElementById("ttaxh").value;
	 		ttax=Number(zx);
			
			
	 
	//alert(netp);
	//txx=txx+dn;
	//var t=document.getElementById("ttaxh").value;
	
	//var txx=parseFloat();
		
		//txx=dn;
	
	//alert(t);
	  var zz=document.getElementById("nph").value;
	 		netp=Number(zz);
	// alert(dn);
	  if(m=='dv')
	  {
	  
	  document.getElementById("dvatA").value=dn;
	  
	  
	  //dn=dn+ttax;
	   //document.getElementById("ttax").innerHTML="+"+t1+"(Tax)";
	   
	 
	 
	  }
	  
	  	  if(m=='vt')
	  {
	  
	  document.getElementById("vatA").value=dn;
	  // dn=dn+ttax;
	 // document.getElementById("ttax").innerHTML="+"+dn+"(Tax)";
	  //document.getElementById("ttaxh").value=dn;
	  }
	  	  if(m=='sl')
	  {
	  document.getElementById("saleA").value=dn;
	  // dn=dn+ttax;
	  //document.getElementById("ttax").innerHTML="+"+dn+"(Tax)";
	 // document.getElementById("ttaxh").value=dn;
	  }
	  	  if(m=='sr')
	  {
	  document.getElementById("serA").value=dn;
	  
	  }
	   	  if(m=='disc')
	  {
	  document.getElementById("disa").value=dn;
	  //document.getElementById("dsct").value=dn;
	  document.getElementById("dsct").innerHTML="-"+dn+"(dis.)";
	  document.getElementById("dscth").value=dn;
	  var totl=document.getElementById("tph").value;
	 // alert(totl);
	// parseFloat(totl-dn).toFixed(2);
	  var x=totl-dn;
	  var df=Number((x).toFixed(1)); 
	  //alert(df);
	   document.getElementById("np").innerHTML= df;
	    document.getElementById("nph").value=totl-dn;
	  }
	  
	  
	     t1=document.getElementById("dvatA").value
	     t2=document.getElementById("vatA").value
	     t3=document.getElementById("saleA").value
		 t4=document.getElementById("serA").value
		 t1=Number(t1); t2=Number(t2); t3=Number(t3); t4=Number(t4);
		 t1=t1+t2+t3+t4;
		 
		 var t1=Number((t1).toFixed(2));
		  document.getElementById("ttaxh").value=t1;
		   document.getElementById("ttax").innerHTML="+"+t1+"(Tax)";
		   //NET///
		 //ss alert(t1);
		 var tldis= document.getElementById("dscth").value;
		   tds=Number(tldis);
		    var totl=document.getElementById("tph").value; 
			totl=Number(totl);
			 //alert(tds);
			tot=totl+t1-tds;
			 nptl=Number((tot).toFixed(2));
		 document.getElementById("nph").value=nptl;
	    document.getElementById("np").innerHTML=nptl;
	    
}
  	function disf(a,m)
   {
   //var dvatA=document.getElementById("dvatA").value;
	  var prcc=document.getElementById("tph").value;
	  //alert(dvatA);
	 var dn=((100*a)/prcc);
	 var dn=Number((dn).toFixed(2));
	//var a=Number((a).toFixed(2));
	// alert(dn);
 if(m=='t')
 {
 document.getElementById("dvat").value=dn;
 document.getElementById("ttaxh").value=a;
		   document.getElementById("ttax").innerHTML="+"+a+"(Tax)";
		   
 var tldis= document.getElementById("dscth").value;
		   tds=Number(tldis);
		    var totl=document.getElementById("tph").value; 
			totl=Number(totl);
			 //alert(tds);
			 a=Number(a);
			tot=totl+a-tds;
			 nptl=Number((tot).toFixed(2));
		 document.getElementById("nph").value=nptl;
	    document.getElementById("np").innerHTML=nptl;
	  		   
 }
 else
 {
 		document.getElementById("dispr").value=dn;
	  document.getElementById("dsct").innerHTML=a;
	  document.getElementById("dscth").value=a;
	  
	  
	   document.getElementById("dsct").innerHTML="-"+a+"(dis.)";
	  document.getElementById("dscth").value=a; 
	  //////////Net Price///////
	  t1=document.getElementById("dvatA").value
	   t2=document.getElementById("vatA").value
	    t3=document.getElementById("saleA").value
		 t4=document.getElementById("serA").value
		 t1=Number(t1); t2=Number(t2); t3=Number(t3); t4=Number(t4);
		 t1=t1+t2+t3+t4;
		 
		 var t1=Number((t1).toFixed(2));
		  document.getElementById("ttaxh").value=t1;
		   document.getElementById("ttax").innerHTML="+"+t1+"(Tax)";
		   //NET///
		 //ss alert(t1);
		 var tldis= document.getElementById("dscth").value;
		   tds=Number(tldis);
		    var totl=document.getElementById("tph").value; 
			totl=Number(totl);
			 //alert(tds);
			tot=totl+t1-tds;
			 nptl=Number((tot).toFixed(2));
		 document.getElementById("nph").value=nptl;
	    document.getElementById("np").innerHTML=nptl;
	}
	}
<!------------------------------------CALCULATION--CLOSE----------------------->
<!--ADD-- ROW- FUNCTION--->
         
		 

		var rows=document.getElementById("rows").value;

		

         function adda()

		  { 

		  

		  currentCell = 0;

		  var rw=document.getElementById("rows").value;

		  

		  rw=Number(rw);

		  

		 

		  

		document.getElementById("rows").value=rw+1;

		  

		  

                   var subtl=0;       

var qantyy=document.getElementById("quantity").value

				var pd=document.getElementById("prd").value;

				

		        var qn=document.getElementById("qn").value;

			    var pr=document.getElementById("lph").value;

				

				var nptl=document.getElementById("nph").value;

				nptl=Number(nptl);

					var disa=document.getElementById("disa").value;

					var dispr=document.getElementById("dispr").value;

					////////totl TAXX///////

					 //document.getElementById("ttaxh").value=t1;

		   var ttaxx= document.getElementById("ttaxh").value;

		   ////////totl dic///////

		 var tldis= document.getElementById("dscth").value;

		////////////////

///////////////////////TAX//////////////// %//////////////////////////////////////

					var dvat=document.getElementById("dvat").value;

					var vat=document.getElementById("vat").value;

					var sale=document.getElementById("sale").value;

					var ser=document.getElementById("ser").value;

					//////

///////////////////////////////////TAX//AMOUNT/////////////////////////////////////

					

					var dvatA=document.getElementById("dvatA").value;

					var vatA=document.getElementById("vatA").value;

					var saleA=document.getElementById("saleA").value;

					var serA=document.getElementById("serA").value;

					

					///////////////////

					

					

					

				var nt=qn*pr; 

				 



	            document.getElementById("nph").value=qn*pr;    

				

			  // var total=document.getElementById("nth").value;

			

				//var tx=document.getElementById("tx").value;

               // var  tax=Number(total)*Number(tx)/100;				

          	   var table = document.getElementById("invoice");

			 // var str="A";

//alert(e.keyCode); 

//alert(disa.charCodeAt(0)); 

var qtyInStk=document.getElementById("quantity").value;
var qty=document.getElementById("qn").value;

					if(pd!=""  && Number(qty)<=Number(qtyInStk) && Number(qty)!=0)

					{

						var row = table.insertRow(-1);

						rw=rw+1;

        	//alert(rw);

			

				

						var cell0 = row.insertCell(0);

						//cell0.innerHTML="1";

						var cell1 = row.insertCell(1);

						var cell2 = row.insertCell(2);

			            var cell3 = row.insertCell(3);

				     	 var cell4 = row.insertCell(4);

						var cell5 = row.insertCell(5);

				     	 var cell6 = row.insertCell(6);

						var cell7 = row.insertCell(7);

				     	 var cell8 = row.insertCell(8);

						  var cell9 = row.insertCell(9);

						   //var cell10= row.insertCell(10);

						 cell0.style.width="4%";

						  cell1.style.width="40%"; //cell1.style.backgroundColor="red";

						   cell2.style.width="35px";

						    cell3.style.width="20px";

							 cell4.style.width="8%";

							  cell5.style.width="8%";

							   cell6.style.width="8%";   

							    cell7.style.width="20px"; cell7.align="center" ;

							cell8.style.width="20px";

							cell9.style.width="20px";

							//cell10.style.width="40px";

								  //cell0.style.width="40px";

				 //row.insertCell(6).with=55;

						 

						    

		  	            cell1.align="center";cell2.align="left";cell3.align="left"; cell4.align="right" ; cell5.align="left" ; cell6.align="center" ;

						 cell7.align="center" ;  cell8.align="center" ; cell9.align="center" ;

	

	//salert(rw);

							cell0.innerHTML=rw;

////Colunm-2/////





	var prd = document.createElement("input");

						prd.type="text"; prd.value=pd;	    

			prd.name='a'+rw;//

								//alert(prd.name);

								

								//prd.id='ts'+rw;

							   

								

						prd.readOnly = true;

								prd.style.width="100%";

								//cell1.appendChild("\n",);

								cell1.appendChild(prd);

//////////////////////////////////////HIDDEN//LIST//PRICE//////////////////////

								var prdh = document.createElement("input");

							  		  prdh.type = "hidden";

										prdh.value =pd;

							  		  prdh.name ='prdh'+rw;

							  			prdh.id='prdh'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								cell1.appendChild(prdh);

//////////////////////////////////////////////////////////////////////////////////

		

	var prc = document.createElement("input");
	
							  // prd.id='u';

								

							    prc.innerHTML=pr; 
								prc.id='lp'+rw;
								prc.name='lp'+rw;
								  prc.value=pr;

								 //prc.style.width="30px";

								prc.style.width="100%";

								prc.readOnly = true;

									cell2.appendChild(prc);

									

							

									

				//////////////////////////////////////HIDDEN//LIST//PRICE//////////////////////

								var prch = document.createElement("input");

							  		  prch.type = "hidden";

										prch.value =pr;

							  		  prch.name ='pr'+rw;

							  			prch.id='lpr'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								cell2.appendChild(prch);

			//////////////////////////////////////////////////////////////////////////////////

							

								

	//alert(nt);

	var element2 = document.createElement("input");

							   element2.type = "text";

							    element2.name ='qn'+rw;

							    element2.id='qn'+rw;

							element2.readOnly = true;

								element2.value =qn;

									//element2.onKeyUp="fun1();";

							 element2.onkeyup = function() { billQunt(element2.id,rw,element2.value); };

							 

								

								

														 element2.style.width="100%";

								cell3.appendChild(element2);

	var disp = document.createElement("input");

							    disp.type = "hidden";

							  disp.name ='dispr'+rw;

							   disp.id='dispr'+rw;

							   disp.value=dispr;

							   disp.readOnly = true;



							   //alert(dispr);

								disp.style.display="none";

								cell4.appendChild(disp);

	        

			 var pp=document.createElement("label");

								//dvl.style.width="40px";

							    //tx.type = "text";

							     pp.style.width="10%";

							    pp.innerHTML="%";

					//cell4.appendChild(pp);

					

					

					

	var element3 = document.createElement("input");

							    element3.type = "text";

							  element3.name ='disa'+rw;

							  element3.id='disa'+rw;

							   element3.value=disa;

							  element3.readOnly = true;

								element3.style.width="105%";

								//element3.style.display="none"; //modify date 20/11/2015 for discount text box hide

								cell5.appendChild(element3);

	//////TAX///////

	

	

//////////////////lavel///////////////////////////

	

	var dvl= document.createElement("label");

								dvl.style.width="40px";

							    //tx.type = "text";

							    

							    dvl.innerHTML="DVAT:";

								//cell5.appendChild(dvl);

								

var vtl= document.createElement("label");

							    //tx.type = "text";

							    vtl.style.width="40px";

							    vtl.innerHTML="VAT: ";

								//cell5.appendChild(vtl);		

								

								

var sel= document.createElement("label");

							    //tx.type = "text";

							     sel.style.width="40px";

							    sel.innerHTML="Sale: ";

								//cell5.appendChild(sel);	

var serl= document.createElement("label");

							    //tx.type = "text";

							     serl.style.width="100%";

							    serl.innerHTML="Service:";

								//cell5.appendChild(serl);

									//cell4.style.width="40px";

																					

//////////////////////////////////////////////////////////////////////





	var dv= document.createElement("input");

							    dv.type = "hidden";

							    dv.name ='dvat'+rw;

								 dv.id='dvat'+rw;

							    dv.value =dvat;

								dv.style.width="90%";

									dv.readOnly = true;

								cell6.appendChild(dv);

								

								

								 var p1=document.createElement("label");

								//dvl.style.width="40px";

							    //tx.type = "text";

							     p1.style.width="10%";

							    p1.innerHTML="%";

								 //cell6.appendChild(p1);

								

	var vt= document.createElement("input");

							    vt.type = "text";

							    vt.name ='vat'+rw;

								 vt.id='vat'+rw;

							   vt.value =vat;

								vt.style.width="90%"; 

								

								//cell6.appendChild(vt);

								

								 var p2=document.createElement("label");

								//dvl.style.width="40px";

							    //tx.type = "text";

							     p2.style.width="10%";

							    p2.innerHTML="%";

								//cell6.appendChild(p2);

	

	var se= document.createElement("input");

							    se.type = "text";

							    se.name ='sale'+rw;

								 se.id='sale'+rw;

							    se.value =sale;

								

								//se.width=20;

								se.style.width="90%";

								//cell6.appendChild(se);

								

								 var p3=document.createElement("label");

								//dvl.style.width="40px";

							    //tx.type = "text";

							     p3.style.width="10%";

							    p3.innerHTML="%";

								//cell6.appendChild(p3);

	

	var serc= document.createElement("input");

							    serc.type = "text";

							    serc.name ='ser'+rw;

								serc.id='ser'+rw;

							    serc.value =ser;

								serc.style.width="90%";

								

								//cell6.appendChild(serc);

								 var p4=document.createElement("label");

								//dvl.style.width="40px";

							    //tx.type = "text";

							     p4.style.width="10%";

							    p4.innerHTML="%";

								//cell6.appendChild(p4);

									//cell7.style.width="30px";

								

				////////********TAx*** amount**/	

				

	var dv= document.createElement("input");

							    dv.type = "text";

							  dv.name ='tol'+rw;

								 dv.id='tolD'+rw;

							    dv.value =nt-disa;

							dv.readOnly = true;

								dv.style.width="100%";

								//dv.style.display="none"; // hide vat text box 20/11/2015

								dv.readOnly = true;

								cell6.appendChild(dv);

						

								

				//////////////////////////////////////HIDDEN//TAX//DVAT//////////////////////

								var dvh = document.createElement("input");

							  		  dvh.type = "hidden";

									dvh.value =dvatA;

							  		 dvh.name ='dv'+rw;

							  		dvh.id='dv'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								//cell7.appendChild(dvh);

			//////////////////////////////////////////////////////////////////////////////////				

						

								

	var vt= document.createElement("input");

							    vt.type = "text";

							    vt.name ='vatA'+rw;

								vt.id='vatA'+rw;

							   vt.value =vatA;

							 //  alert(vatA);

								vt.style.width="100%";

								vt.readOnly = true;

								//cell7.appendChild(vt);

								

								//////////////////////////////////////HIDDEN//TAX//VAT//////////////////////

								var vth = document.createElement("input");

							  		  vth.type = "hidden";

									vth.value =vatA;

							  		vth.name ='vt'+rw;

							  		vth.id='vt'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								//cell7.appendChild(vth);

			//////////////////////////////////////////////////////////////////////////////////				

						

								

	

	var se= document.createElement("input");

							    se.type = "text";

							    se.name ='saleA'+rw;

								 se.id='saleA'+rw;

							    se.value =saleA;

								se.style.width="100%";

								se.readOnly = true;

								//cell7.appendChild(se);

								

									//////////////////////////////////////HIDDEN//TAX//VAT//////////////////////

								var seh = document.createElement("input");

							  		  seh.type = "hidden";

									seh.value =saleA;

							  		seh.name ='sa'+rw;

							  		seh.id='sa'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								//cell7.appendChild(seh);

			//////////////////////////////////////////////////////////////////////////////////				

						

	

	var ser= document.createElement("input");

							    ser.type = "text";

							    ser.name='serA'+rw;

								 ser.id='serA'+rw;

							    ser.value =serA;

								ser.style.width="100%";

								ser.readOnly = true;

								//cell7.appendChild(ser);	

								//	//cell6.style.width="30px";		

									

					

			//////////////////////////////////////HIDDEN//TAX//VAT//////////////////////

								var serh = document.createElement("input");

							  		  serh.type = "hidden";

									serh.value =serA;

							  		serh.name ='se'+rw;

							  		serh.id='se'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								//cell7.appendChild(serh);

			//////////////////////////////////////////////////////////////////////////////////						

	

	/////////TAX//CLOSE///////

	

	var ttl = document.createElement("input");

							    ttl.type = "text";

							  ttl.name ='tp'+rw;

							  ttl.id='tp'+rw;

							   ttl.value=nt;

								ttl.readonly;

								ttl.style.width="100%";

								ttl.readOnly = true;

								

								

								

	var ttxx = document.createElement("input");

							    ttxx.type = "hidden";

							  ttxx.name ='tx'+rw;

							   ttxx.id='tx'+rw;

							  ttxx.value="+"+ttaxx;

								ttxx.readOnly = true;

								ttxx.style.width="100%";

	var tldi= document.createElement("input");

							    tldi.type = "hidden";

							   tldi.name ='tsc'+rw;

							  tldi.id='tsc'+rw;

							 tldi.value=tldis;

								tldi.readOnly = true;

								tldi.style.display="none";														

									//cell8.style.width="30px";

////////////////////////////////////////////////HIDDEN OF TOTAL///////////////////////////////////



//////////////////////////////////////HIDDEN//TAX//VAT//////////////////////

								var ttlh = document.createElement("input");

							  		  ttlh.type = "hidden";

									ttlh.value =nt;

							  		ttlh.name ='tt'+rw;

							  		ttlh.id='tt'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								cell8.appendChild(ttlh);

								

								

								

								var ttxxh = document.createElement("input");

							  		ttxxh.type = "hidden";

									ttxxh.value ="+"+ttaxx;

							  		ttxxh.name ='tx'+rw;

							  		ttxxh.id='tx'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								cell8.appendChild(ttxxh);

								

								

								var tldih = document.createElement("input");

							  		tldih.type = "hidden";

									tldih.value =tldis;

							  		tldih.name ='tds'+rw;

							  		tldih.id='tds'+rw;

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								cell8.appendChild(tldih);

			//////////////////////////////////////////////////////////////////////////////////		



/////////////////////////////////



								cell4.appendChild(ttl);cell4.appendChild(ttxx);cell4.appendChild(tldi);

								

								

								

								//cell6.appendChild("kkkk");

	

	var ntp = document.createElement("input");

							 ntp.type = "text";

							    ntp.name ='ntpsh'+rw;

								ntp.id='ntpsh'+rw;

								

							   ntp.value=nptl;

								ntp.readonly;

								ntp.style.display="none"

								ntp.readOnly = true;

									cell8.style.display="none";

								cell7.appendChild(ntp);//cell6.appendChild("kkkk");

								

							//////////////////NET TOAL HIDDEN////////////

								var ntph = document.createElement("input");

							  		ntph.type = "hidden";

									ntph.value =nptl;

							  		ntph.name ='np'+rw;

							  		ntph.id='netprh'+rw;
									cell7.style.display="none";

								 //prd.onClick= function() { billQunt(prd.id,rw,prd.value); };

							   //alert(prd.id);

							   

								cell7.appendChild(ntph);

								

								
								
								
								
								
								
								
								
								
								
							
								

	////////////SUB//TOTAL/////////

	

	

//////////////////DELETE BUTTON////////////

		var delt =document.createElement("img");

			

			

			delt.src ="<?php echo base_url();?>/assets/images/delete.png";

			delt.class ="icon";

			delt.border ="0";

			
delt.style.width="30%";
						delt.style.height="25%";
			

			

			delt.name ='dlt'+rw;

			delt.id='dlt'+rw;

				delt.onclick= function() { deleteselectrow(delt.id,delt); };

				//cell8.style.width="15px";			   

		cell9.appendChild(delt);

								

								

	/////////DELETE BUTTON/////////

	

	

//////////////////EDIT BUTTON////////////

		var edt = document.createElement("img");
			//edt.type = "button";
			edt.src ="<?php echo base_url();?>/assets/images/edit.png";
			edt.class ="icon";
			edt.border ="0";
			edt.style.width="30%";
						edt.style.height="25%";
			
			edt.name ='ed'+rw;
			edt.id='ed'+rw;
				edt.onclick= function() { editselectrow(delt.id,delt); };
				//cell8.style.width="15px";	
				
				//<img src="images/edit.png" alt="" border="0" class="icon" />
				//var sps="  ";
						 // cell8.appendChild(sps); 
		cell9.appendChild(edt);

								

								

	/////////EDIT BUTTON/////////

	



	

	

	var subtotal=document.getElementById("sub_total").value;

	subtotal=Number(subtotal);

	nptl=Number(nptl);

	
//alert(nptl);
	var subtl=subtotal+nptl;

	subtl=Number((subtl).toFixed(2));

	document.getElementById("sub_total").value=subtl;

	document.getElementById("gtotal").value=subtl;

/////////////////////////////////////////////////////////////////////////

	

						//alert('rowCount'); 		          

	document.getElementById('m').scrollTop = 9999999;

 							//var t=qn*pr;

/////////////////////////////////////////////*********INITIOLIZING** ALL VALUE*******///////////////////////////////////////////////////////////////////



			document.getElementById("prd").value="";

				

		       document.getElementById("qn").value=0;

			   document.getElementById("lph").value=0;

			   

				document.getElementById("lpr").innerHTML=0;

				document.getElementById("nph").value=0;

				document.getElementById("np").innerHTML=0;



document.getElementById("disa").value=0;

document.getElementById("dispr").value=0;		

			

		

			document.getElementById("ttaxh").value=0;

			document.getElementById("ttax").innerHTML=0;

			document.getElementById("tpr").innerHTML=0;

			

		document.getElementById("dscth").value=0;

		document.getElementById("dsct").innerHTML=0;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

					///TAX/ %///

					document.getElementById("dvat").value=0;

					document.getElementById("vat").value=0;

					document.getElementById("sale").value=0;

					document.getElementById("ser").value=0;

					//////

					///////TAX//AMOUNT/////

					document.getElementById("dvatA").value=0;

					document.getElementById("vatA").value=0;

					document.getElementById("saleA").value=0;

				document.getElementById("serA").value=0;

					

//////////////////////////////////////////////////////////////////////////////////////////////////////////////							

							

							

		var rows=document.getElementById("rows").value;

		rows=Number(rows);

		rows=1+rw;	

		rows=Number(rows);

	

				

							 document.getElementById("prd").focus();		}

			else

			{

			alert('***PRODUCT qty in less then in stock ***');
			 document.getElementById("qn").focus();
						/*document.getElementById("lph").value='';
						document.getElementById("qn").value='';
						document.getElementById("lpr").innerHTML='';
						document.getElementById("tpr").innerHTML='';
						document.getElementById("np").innerHTML='';*/

			}

				//var tv=document.getElementById("ttl").value;

				

                                                          



   }

<!----ADD- ROW--CLOSE--->
//GULSHAN////
//var item_total_global=0;




























function editdata(pnm,lpr,qn,quantyD,tot,net,r,v,t)
 {
	//alert(quantyD);
    var qn1=document.getElementById(qn).value;
    var pnm1=document.getElementById(pnm).value;
	var q=document.getElementById("qn").value;
	var totP=document.getElementById(tot).value;
	
	var netP=document.getElementById(tot).value;
	var quantyDP=document.getElementById(quantyD).value;
	//alert(quantyDP);
	
	
  	if(q==0)
	{
		
	
	  var lpr1=document.getElementById(lpr).value;
	  document.getElementById("tpr").innerHTML=totP;
	var net1=document.getElementById("np").innerHTML=netP;
	
	document.getElementById("nph").value=netP;
	
	document.getElementById("quantity").value=quantyDP;
	  //var dvat1=document.getElementById(dvatA).value;
	  //var dvatA1=document.getElementById(dvatA).value;
      //var tx1=document.getElementById(tx).value;
	  var tot1=document.getElementById(tot).value;
	 
	  var net1=document.getElementById(net).value;
	
	 document.getElementById("prd").value=pnm1;
     document.getElementById("lpr").innerHTML=lpr1;
     document.getElementById("lph").value=lpr1;
     document.getElementById("qn").value=qn1;
     document.getElementById("qn").focus();
     
    
	





document.getElementById("ef").value=1;
var ddid=document.getElementById("d");
var sp=document.getElementById("spid").value;
ddid.id=sp;
if(document.getElementById(sp))
{
var flg=1;
}
if(flg==0)
{
document.getElementById("d1").value=pnm1;
}
else
{
document.getElementById(sp).value=pnm1;
}
}

  else
  {
    alert('Already in Edit mode..');
    document.getElementById("qn").focus();
  }

  
  
  
  
  
  
  var i = t.parentNode.parentNode.parentNode.rowIndex;
document.getElementById("invoice2").deleteRow(i);


var total=document.getElementById("sub_total").value;
 
 total=Number(total);
 
 //alert(net);
 total=total-tot1;
 total=Number((total).toFixed(2));
 
 
 
 
 document.getElementById("sub_total").value=total;
 document.getElementById("gtotal").value=total;
}


</script>

<script>

//this code for get product type

function getXMLHTTP() { //fuction to return the xml http object

var xmlhttp=false;

try{

xmlhttp=new XMLHttpRequest();

}

catch(e) {

try{

xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

}

catch(e){

try{

xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

}

catch(e1){

xmlhttp=false;

}

}

}



return xmlhttp;

}

	</script>

<script>
function showall()

 {
 var productcatid=document.getElementById("Productctg_id").value;
 //alert(productcatid);
 
	 var w = 200;

        var h = 200;

        var left = Number((screen.width/2)-(w/2));

        var tops = Number((screen.height/2)-(h/2));
   var myWindow = window.open('all_product_function?productcatid='+productcatid, "myWindow", "width=600, height=600,top=10, left=500");
  
   }
</script>

</head>

<body>

<div class="wrapper"><!--header close-->



<div class="clear"></div>


<div class="container"><!--container-left close-->



<?php if(@$_GET['popup']=='True') {

	} else { 



	$this->load->view('sidebar');



	  } ?>


<div id="b2" class="right-colum">

<div class="right-colum-text">

<div class="table-row">

<div class="title">

<div class="title">
	<h1>Edit INVOICE  </h1> 
<form id="f1" name="f1" method="POST" action="insert_corporateinvoice_Sale" onsubmit="return checkKeyPressed(a)">

<div class="actions-right">

 <div class="clear"></div>

</div><!--title close-->

<div class="container-right-text">

<div class="table-row">


<div id="bb">
<?php
$cusdetail=$this->db->query("select * from tbl_invoice_hdr where invoiceid='".$_GET['id']."'");
$detail=$cusdetail->row();

$id=$detail->contactid;
$id;

$cusdetail1=$this->db->query("select * from tbl_contact_m where contact_id='$id'");
$detail1=$cusdetail1->row();

?>

<?php
if(@$_GET['id']!=''){
@$branchQuery = $this->db->query("SELECT * FROM tbl_invoice_hdr where invoiceid='".$_GET['id']."'");
$branchFetch = $branchQuery->row();
 
}


 if(@$_GET['id']!='' ){
 


  ?>         


<td style="display:none"><input type="hidden" name="invoiceid" class="span6 " value="<?php echo $branchFetch->invoiceid;?>" readonly size="22" aria-required='true' /></td>

<?php } else {

$query = $this->db->query("SELECT * FROM tbl_invoice_hdr where status='A' order by invoiceid desc limit 0,1");
$row = $query->row();

?>

    <td style="display:none"><input type="text" name="invoiceiddd" value="<?php if (count($row)!=''){ echo $row->invoiceid+1; } else{ echo 1; }?>" readonly size="22" class="span6 " aria-required='true' /></td>

                <?php }?>

<table id="" class="bordered">

<tr>
<th class="text-r">Contact Name </th>
<th><select name="contact_id_copy" id="contact_id_copy" class="rounded" tabindex="1" onchange="document.getElementsByName('contactid')[0].value=this.value;">
<option value="">---select---</option>
 <?php
 
 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' order by first_name");
 foreach($contQuery->result() as $contRow)
{
  ?>
    <option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$detail->contactid){?> selected="selected" <?php }?>>
    <?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
    <?php } ?>
</select><a href="#" onclick="openpopup('add-contact',900,630,'','')"> <img style="display:none" src="<?php echo base_url();?>/assets/images/addcontact.png" width="25px" height="25px"/></a>
</th>
<th class="text-r">Delivery Date</th>
<th><input type="date" name="delivery_date_copy" value="<?php echo $detail->invoice_date;?>"  style="  min-width: 80%;"/></th>
</tr>

<tr>

<th class="text-r" >Invoice Type</th>
<th>
<table>
<tr>
<th style="display:none">
<select name="Productctg_id" id="Productctg_id" class="rounded" tabindex="3" onChange="getadd(this.value)" disabled="disabled" style="display:none">
<option value="">---select---</option>
 <?php 
 $cont1=$this->db->query("select * from tbl_prodcatg_m");
 foreach($cont1->result() as $conRow1)
{
  ?>
    <option value="<?php echo $conRow1->product_Catid; ?>" <?php if($conRow1->product_Catid==$detail->schoolname){?> selected="selected" <?php }?>>
    <?php echo $conRow1->categoryName; ?></option>
    <?php } ?>
</select>
</th>
<th>
<select tabindex="4" name="tax_retail">
<option value="">---Select---</option>

	<option value="Taxable" <?php if($detail->tax_retail=='Taxable'){?> selected="selected" <?php }?>>
    Taxable</option>
<option value="Non-Taxable" <?php if($detail->tax_retail=='Non-Taxable'){?> selected="selected" <?php }?>>
    Non-Taxable</option>
    <option value="Retail" <?php if($detail->tax_retail=='Retail Invoice'){?> selected="selected" <?php }?>>
   Retail Invoice</option>
   <option value="Tax Invoice"  <?php if($detail->tax_retail=='Tax Invoice'){?> selected="selected" <?php }?>>Tax Invoice</option>
</select>
</th>
</tr>
</table>
</th>
<th class="text-r">&nbsp;</th>
<th>&nbsp;</th>

</tr>

</table>

<table class="table table-bordered blockContainer lineItemTable ui-sortable" id="lineItemTab" style="margin-bottom:1px">

<tbody>

<tr>
<th style="width:30%;"><div align="center"><b>Item Name </b></div></th>
<th>  <div align="center"><b> Rate</b></div></th>
<th><div align="center"><b>Quantity     </b></div></th>
<th><div align="center"><b>Unit    </b></div></th>
<th style="width:200px; display:none"> <div align="center"><b> Discount </b></div></th>
<th style="width:200px; display:none"> <div align="center"><strong>VAT</strong></div></th>

<!--<td> <div align="center"><b>Amount</b></div></td>-->
<th><div align="center"><b>Total</b></div></th>
<th><b>Net Price</b></th>
</tr>
<tr style="height:20px;">
<td>
<div style="width:100%; height:28px;" >
<input type="text" name="prd"  onkeyup="getdata()" onchange="getdataT()" onclick="getdata()" id="prd" style=" width:85%;"  placeholder=" Search Items..." tabindex="5" ><img   src="<?php echo base_url();?>/assets/images/search11.png"  onclick="showall()" onmouseover="showall1()" />

<!--<a href="#" onclick="openpopup('add-NewInvoice',900,630,'','')"> <img src="images/search11.png" width="15px" height="15px"/></a>-->

</div>

<div id="prdsrch" style="color:black;padding-left:0px; width:22%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
<?php
//include("getproduct.php");
$this->load->view('getproduct');

?>
</div></td>
<td>
    <center>
    <label name="lpr" id="lpr"   > 0.00 </label> </center>
	<input type="number" name="lph" id="lph" />  </td>
  <td><input type="number"  name="qnt" onkeyup="quan(this.value)" onchange="quan(this.value)" id='qn' value="<?php echo $queryTempfetch->quantity?>" onfocus="this.select()"   onfocus="quan(this.value)" style="width:80px;"  />
    <input type="hidden" name="abqt" id="abqt" />
	 </td>
	<td style="display:none" ><input type="text" id="quantity" readOnly></td>
	<td> <input type="text" name="usageunit" id="usunit" style="width:80px;" readonly="readonly" /> </td>
	  <td style="display:none">
	
    
    
    
    <table>
  
 <tr style="height:35px;">
 
 <td align="right">(%):</td>
 <td> 
 <input type="number" name="disp" id="dispr" style="width:50px;" placeholder=" 0%" onkeyup="taxf(this.value,'disc')" >	</td>
	
  <td align="right">
  
 Amount: </td> <td><input type="number" tab="3" name="disa" id="disa"   style="width:50px;" onkeyup="disf(this.value,'d')" placeholder="0.00"  /></td>
 </tr>
	</table>
    
    <!-- discount percent -->&nbsp;
    
    
    
    <!-- discount direct price --></td>

	
  <td style="display:none" >
  
  <table>
  <tr style="height:35px;"> <td>
    <div align="right">
      
     Percent(%):</div> </td><td> <input type="number" name="idvat_rate_on_total" id="dvat"  style="width:60px;" onkeyup="taxf(this.value,'dv')" placeholder=" 0 %"  value="0"/>  </td>
	 </tr>
	 
     <tr style="height:35px;"> <td style="height:35px;"><div align="right">Amount: </div></td><td><input type="number" tab="3" name="dvatA"   id="dvatA" style="width:60px;" onkeyup="disf(this.value,'t')" onblur="addbill1(this.value)" placeholder="0.00"   value="0"/></td>
	 </tr>
	 </table>
    <table>
        <tr style="height:25px;">
        
	  
	</tr>
        <tr style="height:25px;">
          <?php /*?><td align="right">VAT: </td><?php */?>
          </tr>
        <tr style="height:25px;">
          <?php /*?> <td align="right">Sales:</td>
<?php */?>
          </tr>
        <tr style="height:25px;">
          <?php /*?> <td align="right">Service: </td><?php */?>
          
          </tr>  
        </table>     </td>
	  
	  
	  
	 <!-- <td>
	  
	  <table>
	  
	  <tr style="height:25px;">
      <td align="left"> </td>
  </tr>
  
	<tr style="height:25px;">
      <td align="left">--->
		  <input type="hidden" name="idvat_rate_on_total" id="vat"  style="width:50px;" onkeyup="taxf(this.value,'vt')" placeholder=" 0 %"/>	<!-- </td>
	 </tr>-->
	 
	 <!--<tr style="height:25px;">-->
       <!--<td align="left">-->
	   <input type="hidden" name="idvat_rate_on_total2" id="sale" style="width:50px;" onkeyup="taxf(this.value,'sl')" placeholder=" 0 %"/>
	   
	 <!--  </td>
	 </tr>
	 
	 <tr style="height:25px;">
      <td align="left">-->
	  <input type="hidden" name="ser" id="ser"  style="width:50px;" placeholder=" 0 %" onkeyup="taxf(this.value,'sr')" />	
	<!--</tr>
	</table>
	 </td>
	   <td>
	   <br/>-->
	   <input type="hidden" tab="3" name="vatA" id="vatA" style="width:50px;" onblur='testRate<?php echo $i?>();' value="0"  placeholder="0.00" readonly="" />
	   <!--<br/>-->
	   <input type="hidden" tab="3" name="direct_reduction" id="saleA" style="width:50px;" onblur='testRate<?php echo $i?>();' value="0" placeholder="0.00" readonly=""/>
	   <input type="hidden" tab="3" name="direct_reduction" id="serA" style="width:50px;" onblur='testRate<?php echo $i?>();' value="0"  placeholder="0.00"  readonly=""/>	    <!--</td>-->
	







<td align="center">

<label name="tpr" id="tpr"  style="width:80px;" > 0.00 </label> 
	<input type="hidden" name="tph" id="tph" />


<label name="ttax" id="ttax"  style="width:80px;display:none;" > 0.00 (DVAT) </label> 
<input type="hidden" name="ttaxh" id="ttaxh" />


<label name="dsct" id="dsct"  style="width:80px; display:none" > 0.00 (Dis.)</label> 
<input type="hidden" name="dscth" id="dscth" /></td>


<td>
<center>
<label id="np" style="width:80px;">0.00</label>
</center>
<input type="hidden" name="nph" id="nph" /></td>
</tr>
</tbody></table>

</div>

<!--bordered close-->
<!--paging-row close-->
</div>
<!--table-row close-->
<div class="clear"></div>




<!---BILL--->
<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
<table id="invo" style="width:95%;  background:#dddddd;  height:10px;" title="Invoice"  >
<tr>
<td style="width:40px;"><div align="center"><u>Sl No</u>.</div></td>
<td style="width:240px;"><div align="center"><u>Item</u></div></td>
<td style="width:60px;"> <div align="center"><u>List Price</u></div></td>
<td style="width:80px;  "><div align="right"><u>Quantity</u></div></td>

<td style="width:70px;"> <div align="right"><u>Total</u></div></td>
<td style="width:60px;"><div align="right"><!--<u>Discount</u>--></div></td>
<td style="width:65px;"><div align="right"><!--<u>DVAT</u>--></div></td>
<!--<td style="width:70px;"><div align="center"><u>%</u></div></td>
<td style="width:70px;"><div align="center"><u>Amount</u></div></td>-->


<td style="width:70px;"><div align="right"><u>Net Price</u></div></td>
<td style="width:70px;"><div align="right"><u>Action</u></div></td>
</tr>

 
</table>


<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">



<table id="invoice2"  style="width:97.6%;  background:white; border-collapse: separate;

    border-spacing: 3px 10px;" title="Invoice"  cellspacing="2" cellpadding="0" border="0" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

	

	<caption>

	Old Items 

	</caption>

<?php /*?>



<?php



	$idqp = "SELECT *FROM dizypro_quote_dtl   where quoteid='".$_GET['id']."' ";



$idq1p = mysql_query($idqp) or die(mysql_error());

$nn=0;

	while($id_fetchp=mysql_fetch_array($idq1p))

	{

	$nn++;

	?>

	<tr> 

	

	<td><echo $nn;</td>

	<td><input type="text" name="" id="" value="" /></td>

	<td> <input type="text" name="" id="" value="<?php echo $id_fetchp['productid'];?>" /></td>

	

	<td><input type="text" name="" id="" value="" /></td>

	<td> <input type="text" name="" id="" value="" /></td>

	<td><input type="text" name="" id="" value="" /></td>

	<td><input type="text" name="" id="" value="" /> </td>

	

	<td><input type="text" name="" id="" value="" /></td>

	<td> <input type="text" name="" id="" value="" /></td>

	

	

	

   

   <?php

     }

	//@extract($id_fetch);









?><?php */?>



<?php



$inviceQ=$this->db->query("select * from tbl_invoice_dtl where invoiceid='".$_GET['id']."'");



$nn=0;

$i=$nn;



$subt=0;



$pnm="prdh";

$price="lpr";

$qnt="qn";

$dis="disa";

$vat="dvat";

$total="tp";

$net="netprh";



foreach($inviceQ->result() as $invoiceFetch)

{





$nn++;

//dvat totl cal//



$total_taxx=explode("+",$total_tax);

$tt=$total_taxx[1];

$t=$t+$tt;



///////TOTAL DISCOUNT/////



$d=$discount_item_amt;



$ds=$ds+$d;

/////////////////////





///////TOTAL AMOUNT////



$ta=$total_price;



$tamt=$tamt+$ta;





///





///////TOTAL AMOUNT////



$nta=$net_price;



$nett=$nett+$nta;





///



?>

<tr style="height:10px !important;">





<?php



// product name by id
$query_dtl=$this->db->query("select * from tbl_invoice_dtl where invoiceid='".$_GET['id']."'");
$query_fetch_dtl=$query_dtl->row();

$productQ=$this->db->query("select *from tbl_product_stock where Product_id='$invoiceFetch->productid'");

$pfetch=$productQ->row();

@extract($pfetch);




?>



	<!-- cell0.style.width="4%";

						  cell1.style.width="30%"; //cell1.style.backgroundColor="red";

						   cell2.style.width="60px";

						    cell3.style.width="60px";

							 cell4.style.width="8%";

							  cell5.style.width="8%";

							   cell6.style.width="8%";   

							    cell7.style.width="60px"; cell7.align="center" ;

							cell8.style.width="20px";

							cell9.style.width="20px"; -->







<td width="12" height="44" style="width:4%;"><div align="center" >



<input type="text"  name="" id='<?php echo $nn;?>' value="<?php echo $nn;?>" readonly onblur='testRate<?php echo $i?>();' style="width:10px;border:none;" ></td>



<td width="122" style="width:40%; "><div align="center"><input type="text"  name="<?php $pname="prdh"; $pname.=$i; echo $pname;?>" id='<?php $pnameD="prdhD"; $pnameD.=$i; echo $pnameD;?>' value="<?php echo $pfetch->productname;?>^<?php echo $pfetch->Product_id;?>" readonly onblur='testRate<?php echo $i?>();' style="width:100%;border:none" /></div></td>

<td width="124" align="center" style="width:35px;border:none; "><div align="center">

  <input type="number" name="<?php $pprice="pr"; $pprice.=$i; echo $pprice;?>" id="<?php $ppriceD="prD"; $ppriceD.=$i; echo $ppriceD;?>"  value="<?php echo $invoiceFetch->list_price;?>" onkeyup="quandata(this.id)"  readonly onblur='testRate<?php echo $i ?>();'  style="width:100%;" />













</div></td>



<td width="124" align="center" style="width:20px;border:none; "><input type="number"  name="<?php $qunt="qn"; $qunt.=$i; echo $qunt;?>" id='<?php $quntD="qnD"; $quntD.=$i; echo $quntD;?>' onkeyup="quandata(this.id)" readonly value="<?php echo $invoiceFetch->qty; ?>" style="width:100%;" />



</td>




<td width="124" style="width:10%;border:none;" >
<input type="text" name="<?php $total="tt"; $total.=$i; echo $total;?>" readonly id="<?php $total="ttD"; $total.=$i; echo $total;?>" value="<?php echo $invoiceFetch->total_price;?>" readonly  onblur='testRate<?php echo $i ?>();'  style="width:100%;"  ></td>
<td width="124" style="width:8%;border:none; " >

<input type="number" id="<?php $disAD="disaD"; $disAD.=$i; echo $disAD;?>" name="<?php $disA="disa"; $disA.=$i;echo $disA;?>"  value="<?php if($invoiceFetch->discount_item_amt==0){ $invoiceFetch->discount_item_amt=0; } echo $invoiceFetch->discount_item_amt?>" readonly onkeyup="disamt(this.id)" style="width:100%; " ></td>
<td width="15" style="width:8%;border:none;">

<input type="text" id="<?php $dvatD="tolD";$dvatD.=$i; echo $dvatD;?>" name="<?php $dvat="tol"; $dvat.=$i;echo $dvat;?>"  value="<?php if($invoiceFetch->total_tax==0){ $invoiceFetch->total_tax=0; }  echo $invoiceFetch->total_price - $invoiceFetch->discount_item_amt;?>" readonly style="width:100%;" ></td>





<td width="124" align="left" style="width:40px;border:none; display:none "><span id="netPrice0" class="pull-right netPrice">

<input type="number" name="<?php $qunt="np"; $qunt.=$i; echo $qunt;?>" id="<?php $netD="npD"; $netD.=$i; echo $netD;?>" value="<?php echo $invoiceFetch->net_price;?>" readonly style="width:%;" ></td>





<input type="hidden" name="qsk" id="<?php $quantyD="qntD"; $quantyD.=$i; echo $quantyD;?>"  value="<?php echo $pfetch->quantity;?>"   readonly   style="width:100%;" />

<td width="35" align="center" style="width:20px;border:none;  "><span id="netPrice0" class="pull-right netPrice">

<img src="<?php echo base_url();?>/assets/images/edit.png" alt="" border="0" class="icon"  onclick=" editdata('<?php echo $pnameD;?>','<?php echo $ppriceD;?>','<?php echo $quntD;?>','<?php echo $quantyD;?>','<?php echo $total;?>','<?php echo $netD;?>','<?php echo $i;?>',<?php echo $invoiceFetch->invoice_dtl_id; ?>,this)")"/></td>




<td width="35" align="center" style="width:20px;border:none; "><span id="netPrice0" class="pull-right netPrice">
<img src="<?php echo base_url();?>/assets/images/delete.png" alt="" border="0" class="icon" onclick="deletedata(<?php echo $invoiceFetch->invoice_dtl_id; ?>,<?php echo $i; ?>,<?php echo $invoiceFetch->total_price;?>,this)" /></td>

<?php /*?><td style="width:20px;border:none; " align="center"><span id="netPrice0" class="pull-right netPrice">

<?php /*?><img src="images/add.png" height="20" width="20" alt="" border="0" class="icon" onclick="deletedata(<?php echo $quote_dtl_id; ?>,<?php echo $i; ?>,<?php echo $net_price;?>)" /><?php */?>



<!----onclick="return confirm('Are you sure you want to delete ?');"---><?php ?>

</tr>

<?php

$i=$i+1;



$subt=$subt+$invoiceFetch->net_price; 

 }?>

</table>

<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice"   class="table table-bordered blockContainer lineItemTable ui-sortable"  >

	<caption>New Items</caption>

</table>


<?php
/*********29 dec***************/


//************************/


$idfetch10=$this->db->query("SELECT *FROM tbl_invoice_hdr ORDER BY invoiceid DESC limit 0 ,1 ");
$id_fetch10=$idfetch10->row();

 $q=$id_fetch10->invoiceid;

if($q==0)
{

 $p=$this->db->query("insert into  tbl_invoice_hdr set status='in'");
 
$this->db->query($p);


$query = $this->db->query("SELECT * FROM tbl_invoice_hdr ");
$row = $query->row();


$q=$row->invoiceid;



}

$invoiceID=$q+1;

?>
<input type="hidden" name="rows" id="rows" value="<?php echo $i;?>">
<input type="hidden" name="invoiceID" id="invoiceID" value="<?php echo $invoiceID; ?>">
<input type="hidden" name="c_name2" id="cn">
<input type="hidden" name="cust_phone2" id="cmob" />
<input type="hidden" name="cust_address" id="cadrs">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />
<input type="hidden" name="Input" id="did1" value="d1" />
<input type="hidden" name="dddd1" id="d" value="0" />
<input type="hidden" name="alal" id="dd1" value="0" />
<input type="hidden" name="all" id="all" value="0" />
</div>


</div>

<!----BILL CLOSE------>
<div class="table-row">

<table class="bordered"> 

<tr>



<td width="60%" class="text-r" style="font-size:14px;">Sub Total</td>        


<td width="53%" class="text-rig"><input type="text" name="sub_total" id="sub_total" value="<?php echo $branchFetch->balance_total; ?>" style="width:150px; text-align:right; font-size:16px;" onblur="calculation()" readonly="" /></td>
</tr>  




<tr style="display:none">



<td class="text-r" style="font-size:14px;">Visitation Charge</td>         



<td class="text-rig">  <input type="text" name="visiting_charge" id="vtcharge" paceholder="0.00"  style="width:150px; font-size:16px; text-align:right;" onkeyup="vcharge(this.value)" placeholder="0.00"/></td>
</tr>








<tr>



<td class="text-r" style="font-size:14px;">Service Charge</td>         




<td class="text-rig"> 
<input type="number" tabindex="6" name="service_chargeper" value="<?php echo $branchFetch->service_tax_per ;?>" id="scp" style="width:80px; font-size:16px; text-align:right;"   placeholder="0%" onkeyup="scharge(this.value)"/> 
%
   <input type="text" name="service_charge" value="<?php echo $branchFetch->service_tax ;?>" style="width:150px; font-size:16px; text-align:right;" id="sc" readonly=""/></td>
</tr>

<tr>



<td class="text-r" style="font-size:14px;">Gross Discount </td>         




<td class="text-rig"> <input type="number" tabindex="7" name="installation_chargeper" value="<?php echo $branchFetch->installation_charge_per ;?>" id="icp" style="width:80px; font-size:16px; text-align:right;" placeholder="0%" onkeyup="icharge(this.value)" /> %<input type="text" name="installation_charge" value="<?php echo $branchFetch->installation_charge ;?>" id="ic" style="width:150px; font-size:16px; text-align:right;" readonly="" /></td>
</tr>
<tr>


<td class="text-r" style="font-size:14px;">Grand Total</td>         




<td class="text-rig">  <input type="text" name="nett" id="gtotal" value="<?php echo $detail->grand_total; ?>"  style="width:150px; font-size:16px; text-align:right;" readonly="" />



</td>
</tr>
<tr style="display:none">
<td class="text-r" style="font-size:14px;">Advance</td>         
<td class="text-rig"> <input type="text" name="advance_totalper" value="" id="advance_totalper" style="width:80px; font-size:16px; text-align:right;" placeholder="0%" onkeyup="advcharge(this.value)" /> %<input type="text" name="advance_total" id="advance_total" style="width:150px; font-size:16px; text-align:right;" readonly /></td>
</tr>

<tr style="display:none">
<td class="text-r" style="font-size:14px;">Balance</td>         
<td class="text-rig">  <input type="text" name="balance_total" id="balance_total" value="0.00"  style="width:150px; font-size:16px; text-align:right;" readonly="" />
</td>
</tr>
<tr> 
<td>&nbsp;


</td>

<td>

<input type="button" value="SAVE"  tabindex="8" id="sv1" onclick="fsv(this)" class="submit">

</td>

</tr>

</table>


<!--bordered close-->

<div class="clear"></div>

<div class="paging-row">



<div class="paging-right">



<div class="actions-right">


</form>

</div></div></div></div>





</div><!--paging-right close-->



</div><!--paging-row close-->







</div>

<?php /*?><select name="Product_typeid2" id="Product_typeid" onchange="document.getElementsByName('vendorid')[0].value=this.value;">

  <option value="">--Select--</option>

  <?php

$qtr=mysql_query("select *from tbl_producttype_m where status='A'");

while($qtrFetch=mysql_fetch_array($qtr)){

?>

  <option value="<?php echo $qtrFetch['Product_typeid']; ?>"><?php echo $qtrFetch['categoryName']; ?></option>

  <?php }?>

</select><?php */?>

<!--table-row close-->



</div><!--container-right-text close-->











</div><!--container-right close-->















</div><!--container close-->







<div class="clear"></div><!--footer--row close-->







</div><!--wrapper close-->


<!-- input type shadow-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>
<!-- select field shadow-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("select").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("select").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>
<!-- select field shadow-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("textarea").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("textarea").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>



<!--onload focus-->
<script>
function tab(){
  document.getElementById("Productctg_id").focus();
}
</script>





<!--left-menu-js-->



<script src="js/menu-js/jquery.min.js"></script>



<script src="js/menu-js/bootstrap.min.js"></script>



<script src="js/menu-js/metisMenu.min.js"></script>







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



<!--  Multiple check box start-->



<script>

    var expanded = false;

    function showCheckboxes() {

        var checkboxes = document.getElementById("checkboxes");

        if (!expanded) {

            checkboxes.style.display = "block";

            expanded = true;

        } else {

            checkboxes.style.display = "none";

            expanded = false;

        }

    }

 	



function multiplyQuantity(val){ 

	

	var qtyperunit = document.getElementById('qtyperunit').value; 

	var unitinstock = document.getElementById('unitinstock').value;

	

	var totalQut =  eval(qtyperunit*unitinstock);

	

	document.getElementById('qtyinstock').value = totalQut;

	

}	



function stax()

{

	

var st_per = document.getElementById('st_sale').value;





//alert(amt_before_vat);





//var unitprice_sale = document.getElementById('unitprice_sale').value;



 

	var st_amount = (st_per*amt_before_vat)/100;

	

	st_amount=Number(st_amount).toFixed(2);

	

	document.getElementById('commission_sale').value=st_amount;

	





}



	

</script>



<!--  Multiple check box End-->


<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>



<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>



<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>







<script>

 

function openpopup(url,width,height,ev,id) {

      //   newWindow = window.open("add-address.php", null, "height=400,width=1000,status=yes,toolbar=no,menubar=no,location=");  

	var width = width;

    var height = height;

    var left = parseInt((screen.availWidth/2) - (width/2));

    var top = parseInt((screen.availHeight/2) - (height/2));

    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;

    myWindow = window.open(url+".php?&popup=True&"+ev+"="+id, "subWind", windowFeatures);



 }

	

</script>

<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>

<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>

<script>
function getXMLHTTP() { //fuction to return the xml http object
var xmlhttp=false;
try{
xmlhttp=new XMLHttpRequest();
}
catch(e) {
try{
xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
}
catch(e){
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}
catch(e1){
xmlhttp=false;
}
}
}
return xmlhttp;
}



function billfun(bill_name){
		
		var strURL="billfunction?billid="+bill_name;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
				
					document.getElementById('billdiv').innerHTML=req.responseText;
			
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}



function aliesbillfun(alias_name){
		
		var strURL="aliasbillfunction?alias_bill_id="+alias_name;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
				
					var aa=document.getElementById('aliesbilldiv').innerHTML=req.responseText;
						//alert(aa);						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}










































</script>
</body>

</html>