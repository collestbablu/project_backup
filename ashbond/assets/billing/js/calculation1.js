function submitform(){
//alert();
if(document.getElementById("productName").value == ""){
		 alert("Product Name emty");
	 return;
	}
if(document.getElementById("productName").value!= ""){
		 alert("Product 12");
	 window.open("opening_stock_detail", "myWindow", "width=350,height=300");
	}
	//alert("submit form");
}

function saveFunction(){
		alert("submit form");
	$("#form_id").submit();
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
	
	

	
