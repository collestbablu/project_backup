<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
			$("#postid").hide();
			$("#broker10").hide();
		$("#broker9").click(function(){
			$("#postid").show();
			$("#broker10").show();
	
		});
					
		});
$(function () {
			$("#defaultid").hide();
			$("#broker6").hide();
			$("#brokeid").hide();
	        $("#broker5").change(function () {
            var selectedText = $("#broker5").find("option:selected").text();	
            var selectedValue = $("#broker5").val();
			
		if(selectedValue == 1){
		
			$("#defaultid").show();
			$("#broker6").show();
			
		}
		if(selectedValue == 2){
			
			$("#defaultid").hide();
			$("#broker6").hide();
			$("#brokeid").hide();
			}
				
        });
    });
	
$(function () {

			$("#brokeid").hide();
	        $("#broker6").change(function () {
            var selectedText = $("#broker6").find("option:selected").text();	
            var selectedValue = $("#broker6").val();
			
		if(selectedValue == 1){
		
			$("#brokeid").hide();
		}
		if(selectedValue == 2){
			
			$("#brokeid").hide();
			
			
			}
		if(selectedValue == 3){
			
			$("#brokeid").show();
		
			}
				
        });
    });
		
</script>
<script language="Javascript" type="text/javascript">

function okk()
{
if(document.getElementById("broker1").value){
window.opener.document.getElementById("a").value = document.getElementById("broker1").value;
}else{window.opener.document.getElementById("a").value ='0';}
if(document.getElementById("broker2").value){
window.opener.document.getElementById("bbb").value = document.getElementById("broker2").value;
}else{window.opener.document.getElementById("bbb").value ='0';}
if(document.getElementById("broker3").value){
window.opener.document.getElementById("c").value = document.getElementById("broker3").value;
}else{window.opener.document.getElementById("c").value ='0';}
if(document.getElementById("broker4").value){
window.opener.document.getElementById("d").value = document.getElementById("broker4").value;
}else{window.opener.document.getElementById("d").value ='0';}
if(document.getElementById("broker5").value){
window.opener.document.getElementById("e").value = document.getElementById("broker5").value;
}else{window.opener.document.getElementById("e").value ='0';}
if(document.getElementById("broker6").value){
window.opener.document.getElementById("f").value = document.getElementById("broker6").value;
}else{window.opener.document.getElementById("f").value ='0';}
if(document.getElementById("broker7").value){
window.opener.document.getElementById("g").value = document.getElementById("broker7").value;
}else{window.opener.document.getElementById("g").value ='0';}
if(document.getElementById("broker8").value){
window.opener.document.getElementById("h").value = document.getElementById("broker8").value;
}else{window.opener.document.getElementById("h").value ='0';}
if(document.getElementById("broker9").checked){
window.opener.document.getElementById("i").value = document.getElementById("broker9").value;
}else{window.opener.document.getElementById("i").value ='0';}
if(document.getElementById("broker10").checked){
window.opener.document.getElementById("j").value = document.getElementById("broker10").value;
}else{window.opener.document.getElementById("j").value ='0';}

window.close();
}


</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php //include("includes/title.php"); ?>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">

</head>
<body>
<form action="" method="post">
<div class="container-right-text">

<div class="table-row">

<table class="bordered">
<?php
$queryAA=$this->db->query("select * from tbl_account");
$row=$queryAA->row();
?>
<tr>
	<td class="text-r">Brokerage to be applied at</td>
	<td class="text-r">
		<select name="brok_to_applied_at" id="broker1">
				<option value="">---select---</option>
				<option value="1" <?php if($row->brok_to_applied_at =='1'){ ?> selected="selected" <?php } ?>>Voucher Level</option>
				<option value="2" <?php if($row->brok_to_applied_at =='2'){ ?> selected="selected" <?php } ?>>Item Level</option>
		</select>
	</td>
	<td class="text-r">Broker</td>
	<td class="text-r"><input type="text" id="broker2" value="<?php if($row->broker!=''){ echo $row->broker; } ?>"></td>
</tr>
<tr>
	<td class="text-r">Brokerage</td>
	<td class="text-r"><input type="text" id="broker3" value="<?php if($row->brokerage!=''){ echo $row->brokerage; } ?>"></td>
	<td class="text-r">Enable In</td>
	<td class="text-r">
		<select id="broker4">
				<option value="">---select---</option>
				<option value="1" <?php if($row->enable_in =='1'){ ?> selected="selected" <?php } ?>>Sales</option>
				<option value="2" <?php if($row->enable_in =='2'){ ?> selected="selected" <?php } ?>>Purchase</option>
		</select>
	</td>
</tr>
<tr>
	<td class="text-r">Specify Default Brokerage</td>
	<td class="text-r">
		<select id="broker5">
				<option value="">---select---</option>
				<option value="1" <?php if($row->specify_default_brok =='1'){ ?> selected="selected" <?php } ?>>Yes</option>
				<option value="2" <?php if($row->specify_default_brok =='2'){ ?> selected="selected" <?php } ?>>No</option>
		</select>
	</td>
	<td class="text-r"><a id="defaultid">Default Brokerage to be picked from</a></td>
	<td class="text-r">
		<select id="broker6">
				<option value="">---select---</option>
				<option value="1" <?php if($row->default_brok_to_pick_fro =='1'){ ?> selected="selected" <?php } ?>>Broker Master</option>
				<option value="2" <?php if($row->default_brok_to_pick_fro =='2'){ ?> selected="selected" <?php } ?>>Party Master</option>
				<option value="3" <?php if($row->default_brok_to_pick_fro =='3'){ ?> selected="selected" <?php } ?>>As specified Below</option>
		</select>
	</td>
</tr>


<tr id="brokeid">
	<td class="text-r"><a >Brokerage Mode and Rate</a></td>
	<td class="text-r">
		<select id="broker7">
				<option value="">---select---</option>
				<option value="1" <?php if($row->brok_mode_rate =='1'){ ?> selected="selected" <?php } ?>>percentage</option>
				<option value="2" <?php if($row->brok_mode_rate =='2'){?> selected="selected" <?php } ?>>Lumpsum Amount</option>
				<option value="3" <?php if($row->brok_mode_rate =='3'){ ?> selected="selected" <?php } ?>>per main qty</option>
		</select>
	</td>
	<td class="text-r"><a id="brokerageid">Brokerage  Rate</a></td>
	<td class="text-r"><input type="text" id="broker8" value="<?php if($row->brokerage_rate!=''){ echo $row->brokerage_rate; } ?>"></td>
</tr>
<tr>
	<td class="text-r">separate Brokerage In Each Voucher</td>
	<td class="text-r"><input type="checkbox" id="broker9" value="1" <?php if($row->sep_brok_in_each_voucher==1){?> checked="checked"<?php }if($row->sep_brok_in_each_voucher==0){ }?>></td>
	<td class="text-r"><a id="postid">Post Brokerage In Accounts</a></td>
	<td class="text-r"><input type="checkbox" id="broker10" value="1" <?php if($row->post_brok_in_account==1){?> checked="checked"<?php }if($row->post_brok_in_account==0){ }?>></td>
</tr>

<tr>
	<td class="text-r"></td>
	<td class="text-r"></td>
	<td class="text-r"></td>
	<td class="text-r"><input type="button" onClick="okk()" value="Ok" /></td>
</tr>
</table>
</div>
</div>
</form>
</body>
</html>