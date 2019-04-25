	<link rel="stylesheet" href="css/cmxform.css">
	<script src="<?php echo base_url();?>assets/js1/lib/shortcuts_v1.js" type="text/javascript"></script>
	
<script>
	$(document).ready(function() {
			// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
			shortcut("ctrl+f1",function() {
			window.location = "<?php echo base_url();?>billing/dashboar";
			});
			shortcut("f3",function() {
			 document.activeElement.nextSibling.focus();
			});
			
					
		});
	</script>
