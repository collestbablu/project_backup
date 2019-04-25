<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

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
function getTemplate(template) {


		var strURL="<?php echo base_url();?>purchaseorder/PurchaseOrder/template?id="+template;





		var req = getXMLHTTP();



		



		if (req) {



			



			req.onreadystatechange = function() {



				if (req.readyState == 4) {



					// only if "OK"



					if (req.status == 200) {



						//alert(req.responseText);



					var editorData=	req.responseText;						

CKEDITOR.instances['templateId'].setData(editorData)
document.getElementById('termCondition').style.display ='';

//document.getElementById('templateId').value=aa;


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
<tr id="termCondition" style="display:none;">
				<td class="text-r">Term And Condition</td>      
				<td style="height:500px;width:auto;"><textarea name="termandcondition" style="height:500px;width:auto;"   id="templateId"></textarea></td>

			</tr>
            <script>
	CKEDITOR.replace( 'termandcondition' );
</script>