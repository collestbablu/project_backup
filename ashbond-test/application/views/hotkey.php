	<link rel="stylesheet" href="css/cmxform.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  		<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/css/sale.css' />
		 <link rel="stylesheet"  href="<?php echo base_url();?>assets/billing/js/alert.css" >
	<script src="<?php echo base_url();?>assets/js1/lib/shortcuts_v1.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/billing/js/alert.js"></script>
<script>
	$(document).ready(function() {
			// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
			shortcut("ctrl+f1",function() {
			window.location = "<?php echo base_url();?>billing/dashboar";
			});
			shortcut("f10",function(event) {
			var aa=(event.target.id);
			 myDeleterow(event)
			
			});
						
					
		});
	</script>
	
	<script>
  function tin(aaa){
   
   //	$("#aws").hide("scale", 500); 
   // $(body).css("background-color":"blue");
    alertify.prompt("Password to login ", function (e, str) {
               if (e) {
			   if(str=="aa"){
                   alertify.alert("WELCOMNE BACK");
				   $("#aws").show("scale", 500)
               }else{
			    alertify.alert("Password in Wrong");
				 tin();
			   }
			   } else {
			 //  get("item5");
                tin();
               }
            });
   
   }
  
	
$(document).ready(function(){



///tesing part
idleTimer = null;
idleState = false;
idleWait = 1000;


$('*').bind('mousemove keydown scroll', function () {
        
            clearTimeout(idleTimer);
                    
                     
            idleState = false;
            
            idleTimer = setTimeout(function () { 
                
                // Idle Event
                $("body").append(function (){
				
				//tin(idleWait);
				});

                idleState = true; }, idleWait);
        });        
        $("body").trigger("mousemove");
});
</script>
