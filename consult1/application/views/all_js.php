
<link href="<?php echo base_url();?>assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/bootstrap.min.css">

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

function getCid(cid) {	
		var strURL="get_cid?cid="+cid;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
						document.getElementById('ciddiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}


function checkall(objForm)
{
getCid(this.value);
	var ele,len,i;
	ele= document.getElementsByTagName("input");
	len=ele.length;
	for(i=0;i<len;i++){
	if(ele[i].type=='checkbox'){
		ele[i].checked=objForm;
		}
	}
}

</script>
