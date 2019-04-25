<?php
$this->load->view('softwareheader'); 
?>

<h1>Record Payment</h1> 

<div class="actions">

<div class="blogroll">

  
	</div>

</div><!--actions close-->


<div class="search-row-to">


</div><!--search-row-to close-->



<div class="clear"></div>

</div><!--title close-->



<div class="container-right-text">

<div id="container">

<div>

<div class="table-row">
<form method="post">
<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Record Payment</b></th>        
</tr>
</thead>
<tr>
<td class="text-r">
Customer Name :</td>
 <td>
 <select name="customerfname" id="cf" onchange="contactfun()" class="rounded" required >
<option value="">---select---</option>
 <?php
 $contQuery=$this->db->query("select * from tbl_contact_m where comp_id='".$this->session->userdata('comp_id')."' and group_name='4' order by first_name");
 foreach($contQuery->result() as $contRow)
{

  ?>
    <option value="<?php echo $contRow->contact_id; ?>" <?php if($contRow->contact_id==$customerfname){?> selected="selected" <?php }?>>
    <?php echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></option>
    <?php } ?>
</select>
 </td>
</tr>        
</table>
<div id="caseiddiv"></div>
<script>
function contactfun(){
var contactid=document.getElementById("cf").value;
var pro=contactid;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "getproductcont_fun?con="+pro, false);
  xhttp.send();
  document.getElementById("caseiddiv").innerHTML = xhttp.responseText;
 } 

function payamtfun(objForm)
{
	//alert(objForm);
	if(objForm==true){	
    var tamt=document.getElementById("payidd").value;
	document.getElementById("amtid").value=tamt;
	document.getElementById("totalamt").value=tamt;
	var sum=0;
	var cost = document.getElementsByName('amtdue[]');
	for(var i=0;i<cost.length;i++)
	{
	sum =Number(cost[i].value);
	 document.getElementById('paymm'+i).value =sum;
	}
	
	}else{
	document.getElementById("amtid").value='';
	document.getElementById("totalamt").value='';
	var sum=0;
	var cost = document.getElementsByName('amtdue[]');
	for(var i=0;i<cost.length;i++)
	{
	 document.getElementById('paymm'+i).value ='';
	}

	}
}

</script>

<script type="text/javascript">
function GrandTotal(){
var sum=0;
var cost = document.getElementsByName('paymentid[]');
for(var i=0;i<cost.length;i++)
{
sum = Number(sum)+Number(cost[i].value);
	
}
document.getElementById('totalamt').value = sum;
}
</script>
</form>

<!--bordered close-->

<div class="clear"></div>

</div><!--table-row close-->

</div><!--div close-->

</div><!--container close-->
<?php $this->load->view('softwarefooter'); ?>