<?php
$tableName='tbl_prodcatg_mst';

?>

<h1>Category LIST</h1> 
<!--actions close-->

<!--add close-->
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">


<table class="bordered"id="dataTables-example">
    <thead>

    <tr>
       
        <th style="width: 200px;">Group Name</th>
		<th>Primary</th>
		<th>Under Group</th>
       
    </tr>
	<tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </thead>
   
	<?php
	
		  @$queryy="select *from $tableName where status='A' and comp_id = '".$this->session->userdata('comp_id')."' order by prodcatg_id desc";
		
$mod_sql = $this->db->query($queryy);

foreach ($mod_sql->result() as $line){
		 
   ?>
   <tr class="record" data-row-id="<?php echo $line->prodcatg_id; ?>">
 	  	
    	<td><?php echo $line->prodcatg_name;?></td>
		
		 <?php if(
$line->main_prodcatg_id==1){$Primary="Y";}else{$Primary="N";}?>
	<td><?php echo $Primary; ?></td>

		 <td><?php if($line->main_prodcatg_id!='1'){ @$ugrou="select * from $tableName where status='A' and prodcatg_id='".@$line->main_prodcatg_id."'"; 
   
@$ung = $this->db->query(@$ugrou);
@$row = @$ung->row();

		?><?php echo @$row->prodcatg_name; }?></td>
		
                     
    </td></tr>
	<?php } ?>
       
</table>
</form>
<!--bordered close-->
<div class="clear"></div>
</div><!--table-row close-->