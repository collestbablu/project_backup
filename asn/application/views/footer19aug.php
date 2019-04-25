<!-- Footer -->
<footer class="footer-main"> 
Copyright &copy; 2016 <a target="_blank" href="http://www.techvyas.com/"> techvyas</a> All rights reserved.
</footer>	
<!-- /footer -->
</div>
<!-- /main content -->
</div>
  <!-- /main container -->
</div>
<!-- /page container -->

<!--Load JQuery-->
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/plugins/metismenu/js/jquery.metisMenu.js"></script>
<script src="<?=base_url();?>assets/plugins/blockui-master/js/jquery-ui.js"></script>
<script src="<?=base_url();?>assets/plugins/blockui-master/js/jquery.blockUI.js"></script>

<!--Knob Charts-->
<script src="<?=base_url();?>assets/plugins/knob/js/jquery.knob.min.js"></script>

<!--Jvector Map-->
<script src="<?=base_url();?>assets/plugins/jvectormap/js/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?=base_url();?>assets/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>

<!--ChartJs-->
<script src="<?=base_url();?>assets/plugins/chartjs/js/Chart.min.js"></script>

<!--Morris Charts-->
<script src="<?=base_url();?>assets/plugins/morris/js/raphael-min.js"></script>
<script src="<?=base_url();?>assets/plugins/morris/js/morris.min.js"></script>

<!--Float Charts-->
<script src="<?=base_url();?>assets/plugins/flot/js/jquery.flot.min.js"></script>
<script src="<?=base_url();?>assets/plugins/flot/js/jquery.flot.tooltip.min.js"></script>
<script src="<?=base_url();?>assets/plugins/flot/js/jquery.flot.resize.min.js"></script>
<script src="<?=base_url();?>assets/plugins/flot/js/jquery.flot.pie.min.js"></script>
<script src="<?=base_url();?>assets/plugins/flot/js/jquery.flot.time.min.js"></script>

<!--Functions Js-->
<script src="<?=base_url();?>assets/js/functions.js"></script>

<!--Dashboard Js-->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
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

<!--Loader Js-->
<script src="<?=base_url();?>assets/js/loader.js"></script>

<script src="<?=base_url();?>assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/jszip.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/pdfmake.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/vfs_fonts.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/js/dataTables-script.js"></script>

<link href="<?=base_url();?>assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet">
<link href="<?=base_url();?>assets/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">

</body>

</html>
<!-- starts here this javascript code is for multiple delete -->



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

<!-- ends here this javascript code is for multiple delete -->

<!-- starts here this javascript code is for single delete -->
<script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;

 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_data",
   data: info,
   success: function(){
  
   }
 });

         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<!-- ends here this javascript code is for single delete -->














<!-- starts here this javascript code is for  sales delete -->
<script type="text/javascript">
$(function() {


$(".delbuttonSales").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;

 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_sales_order_data",
   data: info,
   success: function(){
  
   }
 });

         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<!-- ends here this javascript code is for purchase delete -->

<!-- starts here this javascript code is for  sales delete -->
<script type="text/javascript">
$(function() {


$(".delbuttonPurchase").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;

 if(confirm("Are you sure you want to delete ?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_purchase_order_data",
   data: info,
   success: function(){
  
   }
 });

         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<!-- ends here this javascript code is for purchase delete -->






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



</script>



    