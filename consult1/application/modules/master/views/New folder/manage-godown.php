<?php
$tableName='tbl_godown_mst';

if(@$_POST['del']!='')

{

 	@extract($_POST);

	if(is_array($cid))

	{

		$mem_id=implode(',',$cid);

	}

	else

	{

		$mem_id=$cid;

	}

	if(count($cid)>1)

	{

			$tbl_sql="delete from $tableName  where godown_id	 in ($mem_id)";

		

	}

	else

	{

		$tbl_sql="delete from $tableName where godown_id='$mem_id'";

	}

	

	$tbl_res=$this->db->query($tbl_sql);


}
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

</head>

<body>
<form method="post" >
<div class="wrapper"><!--header close-->
<div class="clear"></div>

<div class="container"> 

<?php
$this->load->view('sidebar');

 ?>
<div class="container-left"><!--left-menu close-->

</div><!--container-left close-->

<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<div class="title">
<h1>GROUP LIST</h1> 
<div class="actions">
<div class="blogroll">
<div id="ciddiv">
		<p>Actions <img src="<?php echo base_url();?>/assets/images/arrow.png" alt="" /></p>



		<ul>
        
		</ul>
   </div>
	</div>
</div><!--actions close-->

<div class="add">
<?php if($add!=''){ ?>
<a href="add_godown"><img src="<?php echo base_url();?>/assets/images/plus.png" alt="" border="0" />Create New godown Grop</a>
<?php } ?>
</div><!--add close-->
<!--
<div class="search-row-to">
<div class="search-row-l"><input type="text" placeholder="Search here..." required=""></div>
<div class="search-row-r"><button type="submit">Go</button>
</div>
</div><!--search-row-to close-->

<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">


<table class="bordered"id="dataTables-example">
    <thead>

    <tr>
        <th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>        
      
        <th style="width: 200px;">Group Name</th>
		<th>Primary</th>
		<th>Under Group</th>
        <th>Alias Name</th>
		<th>Print Name</th>
        <th>Action</th>
		
    </tr>
    </thead>
   <tr>
      <td><input type="checkbox"></td>  
        <td><input type="text" name="godown_name" class="input-small"></td>
		<td><select name="main_godown_id" id="main_godown_id"  class="span6">
	<option value=""></option><option value="1">Y</option><option value="0">N</option> </select></td>
		<td><input type="text" name="ugroup" class="input-small"></td>
		<td><input type="text" name="alias" class="input-small"></td>
		<td><input type="text" name="printname" class="input-small"></td>
        <td><input type="submit" class="submit" name="Search" value="Search" /></td>
    </tr>
	<?php
	
		  extract($_POST);
	if(@$Search!='')
	  {

		  @$queryy="select *from $tableName where status='A' and comp_id = '".$this->session->userdata('comp_id')."'";
		    if(@$godown_name!='')
		  {
		  		  	@$queryy.=" and godown_name like '%$godown_name%'";
		  }
	    if(@$main_godown_id!='')
	    {	
			if(@$main_godown_id==1){
  		  	@$queryy.=" and main_godown_id = 1";}else{
			@$queryy.=" and main_godown_id !=1";}
	    }
 if(@$alias!='')
	    {
  		  	@$queryy.=" and alias like '%$alias%'";
	    }
			 if(@$ugroup!='')
	    {
			@$aa.=" and ";
			@$z=0;
			@$group=$this->db->query("select godown_id from $tableName where status='A' and godown_name like '%$ugroup%' and comp_id = '".$this->session->userdata('comp_id')."'");
  		  //	while($a=mysql_fetch_array($group))
			foreach (@$group->result() as $a){
				if(@$z==0){
			  @$aa.=" main_godown_id =".@$a->godown_id;
				}else{
				 @$aa.=" or main_godown_id =".@$a->godown_id;
					}
				@$z=1;
			}

			if($z==1){
			 $queryy.=$aa;
			}else{
				$queryy.=" and main_godown_id =-1 ";	

			}
			
			}	


			//$queryy.=" and main_godown_id = '$godown_id'";
	    
 if(@$Description!='')
		  {
		  		  	@$queryy.=" and Description like '%$Description%'";
		  }
}
if(@$Search=='')
	  {
		  @$queryy="select *from $tableName where status='A' and comp_id = '".$this->session->userdata('comp_id')."'";
			}
 
$mod_sql = $this->db->query($queryy);

foreach ($mod_sql->result() as $line){
		 

		
					//echo $queryy;
		  
   @$i=$start;

    @$j=1;

  // while($line=mysql_fetch_array($result)){

   @$i++;

   if($i%2!=0){

   	$color='#ECE9D8';

   }else{

   	$color='#F1FEFD';

   }

   @extract($line);

   ?>
   <tr>
   <td><input name="cid[]" type="checkbox" id="cid[]" value="<?php echo $line->godown_id;?>" onclick="getCid(this.value)" /></td>
 	  	
    	<td><?php echo $line->godown_name;?></td>
		
		 <?php if(
$line->main_godown_id==1){$Primary="Y";}else{$Primary="N";}?>
	<td><?php echo $Primary; ?></td>

		 <td><?php if($line->main_godown_id!='1'){ @$ugrou="select * from $tableName where status='A' and godown_id='".@$line->main_godown_id."'"; 
   
@$ung = $this->db->query(@$ugrou);
@$row = @$ung->row();

		?><?php echo @$row->godown_name; }?></td>
		 <td><?php echo $line->alias;?></td>
		<td><?php echo $line->printname;?></td>
	 	
                     
<td>
<?php if($view!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/add.png" onclick="openpopup('add_godown',900,400,'mid',<?php echo $line->godown_id; ?>)"  alt="" border="0" class="icon" title="add" />
<?php } if($edit!=''){ ?>
<img src="<?php echo base_url();?>/assets/images/edit.png" onclick="openpopup('add_godown',900,400,'id',<?php echo $line->godown_id; ?>)"  alt="" border="0" class="icon" title="Edit" />
<?php } if($delete!=''){ ?>
<a href="delete_godown?id=<?php echo $line->godown_id; ?>"><img src="<?php echo base_url();?>/assets/images/delete.png" onclick="return confirm('Are you sure you want to delete ?');" alt="" border="0" class="icon" title="Delete" /></a>
<?php } ?>
</td>
    </td></tr>
	<?php } ?>
	       
</table>
</form>
<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->

</div><!--div close-->
</div><!--container close-->

</div><!--paging-right close-->
</div><!--paging-row close-->
<!--paging-row close-->


</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->

<div class="clear"></div><!--footer--row close-->
<?php //include('includes/footer.php') ?>

</div><!--wrapper close-->


<!--Scroll js-->


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



		//alert(strURL);



		var req = getXMLHTTP();



		



		if (req) {



			



			req.onreadystatechange = function() {



				if (req.readyState == 4) {



					// only if "OK"



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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery.dragscroll.js"></script>
<script>
		$(document).ready(function() { 
			$('#container').dragScroll({});
		});
	</script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setgodown', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--Scroll js close-->

<!--left-menu-js-->
<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>

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

 <!-- Page-Level Plugin Scripts - Tables -->

    <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/jquery.dataTables.js"></script>

    <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>



    <!-- SB Admin Scripts - Include with every page -->

    <script src="<?php echo base_url();?>/assets/js/sb-admin.js"></script>



    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script>

    $(document).ready(function() {

        $('#dataTables-example').dataTable();

    });

    </script>
<script>	
var myWindow;

 

	 

function openpopup(url,width,height,ev,id) {

      //   newWindow = window.open("add-address.php", null, "height=400,width=1000,status=yes,toolbar=no,menubar=no,location=");  

	var width = width;

    var height = height;

    var left = parseInt((screen.availWidth/2) - (width/2));

    var top = parseInt((screen.availHeight/2) - (height/2));

    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,toolbar,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;

    myWindow = window.open(url+"?&popup=True&"+ev+"="+id, "subWind"+url, windowFeatures);



 }

	

    </script>



</body>
</form>
</html>
