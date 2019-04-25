
<!--Loader Js-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<!--<script src="<?=base_url();?>assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>-->
<script src="<?=base_url();?>assets/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/jszip.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/pdfmake.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/vfs_fonts.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/dataTables-script.js"></script>

<link href="<?=base_url();?>assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet">
<link href="<?=base_url();?>assets/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
<!-----------------drop down select start here------------->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<link href="<?=base_url();?>assets/dropsrc/jquery-customselect.css" rel="stylesheet">
<script src="<?=base_url();?>assets/dropsrc/jquery-customselect.js"></script>
  <script>
      $(function() {
        $("#standard").customselect();
      });
      </script>
<!-----------------drop down select ends here------------->
<script>
	
$(window).load(function() {
	$(".loader1").fadeOut("fast");
});
</script><div class="loader1"></div>
<script src="<?php echo base_url();?>assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/menu-js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dragscroll.js"></script>
  <script>

    $(document).ready(function() {

        $('#dataTables-example').dataTable();

    });

    </script>

</div><!--paging-right close-->
</div><!--paging-row close-->

<!--footer--row START-->
<div class="table-row">
<div class="title">
<center>Copyright &copy;  2014 all right reserved</center></div></div>
<!--footer--row close-->

</div><!--table-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->

</div><!--container LEFT close-->
<div class="clear"></div>
</div><!--wrapper close-->
<!--left-menu-js-->
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
var myWindow;
function openpopup(url,width,height,ev,id) {
	var width = width;
    var height = height;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open(url+"?&popup=True&"+ev+"="+id, "subWind"+url, windowFeatures);
 }

	
</script>
<script src="<?php echo base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/sb-admin.js"></script>
	
<script>
function itmvel(model){
  document.getElementById(model).style.display = "block";
}
function itmveldis(model){
   document.getElementById(model).style.display = "none";
}
</script>	
<script>	
function disable_f5(e)
{
  if ((e.which || e.keyCode) == 116)
  {
    e.preventDefault();
  }
}
$(document).ready(function(){
$(".submit").click(function(){
   save_rp();
});

//$(".loader1").fadeOut("fast");
//$(document).bind("keydown", disable_f5);
$(document).bind("contextmenu",function(e){
              //return false;
       });

	   
});
function save_rp(){
$(".loader1").fadeOut("fast");
return;
}	 
</script>

<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
<script>
 	
function Start_exam(){
alert("asd");
 
WindowObjectReference = window.open("user_dashboar", "CNN_WindowName",
"height=1600,width=1800,menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes");

window.location.replace("user_dashboar");
}	
</script>
<style>
p{font-size: 40px;}
.loader1 {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url("<?php echo base_url();?>assets/images/Preloader_8.gif") 50% 50% no-repeat #ffffff;
    opacity: .8;
}
</style>
<!--For right click Disable-->

<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
	
}

/* The Close Button */
.close {
    color: #990033;
    float: right;
    font-size:22px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>	
<style>
.tile {
   	width:60%;
	height:100%;
    background-image:url(<?php echo base_url();?>assets/images/cars/dent_diag1.jpeg) !important;
	
  }

.level1 {
   width:15%;
    height:29%;
	float:left;
	text-align:center;
	text-align:justify;
	display: inline-block;
}
.pos{
text-align: center;
vertical-align: middle;
line-height: 90px;
}
a:hover,
a:focus{
 cursor: pointer;
}
</style>

</body>
</html>
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

function getCid(cid){	
alert(cid);
		var strURL="<?php echo base_url();?>master/Item/get_cid?cid="+cid;

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

</script>

<script>
function checkall(objForm)
{

	//alert(objForm);
//getCid(this.value);
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

<script>
function popupclose(){
window.close();
}
</script>
<!-- This query is for multiple_delete -->
<script type="text/javascript">
$(document).ready(function(){
	jQuery('#master').on('click', function(e) {
		if($(this).is(':checked',true))  
		{
			$(".sub_chk").prop('checked', true);  
		}  
		else  
		{  
			$(".sub_chk").prop('checked',false);  
		}  
	});
	jQuery('.delete_all').on('click', function(e) { 
		var allVals = [];  
		$(".sub_chk:checked").each(function() {  
			allVals.push($(this).attr('data-id'));
		});  
		//alert(allVals.length); return false;  
		if(allVals.length <=0)  
		{  
			alert("Please select row.");  
		}  
		else {  
			//$("#loading").show(); 
			WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";  
			var check = confirm(WRN_PROFILE_DELETE);  
			if(check == true){  
				//for server side
				
				var table_name=document.getElementById("table_name").value;
				var pri_col=document.getElementById("pri_col").value;
				var join_selected_values = allVals.join(","); 
			//alert(join_selected_values);
				$.ajax({   
				  
					type: "POST",  
					url: "multiple_delete_two_table",  
					cache:false,  
					data: "ids="+join_selected_values+"&table_name="+table_name+"&pri_col="+pri_col,  
					success: function(response)  
					{   
						$("#loading").hide();  
						$("#msgdiv").html(response);
						//referesh table
					}   
				});
              //for client side
			  $.each(allVals, function( index, value ) {
				  $('table tr').filter("[data-row-id='" + value + "']").remove();
			  });
				

			}  
		}  
	});
	jQuery('.remove-row').on('click', function(e) {
		WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";  
			var check = confirm(WRN_PROFILE_DELETE);  
			if(check == true){
				$('table tr').filter("[data-row-id='" + $(this).attr('data-id') + "']").remove();
			}
	});
});
</script> 

<!-- Close This query is for multiple_delete -->








