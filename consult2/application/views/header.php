<style>
.navbar-brand {
  float: none;
  }
.navbar-center
{
    position: absolute;
    width: 100%;
    left: 0;
    top: 0;
    text-align: center;
    margin: auto;
 	 height:100%;
}
</style>

<?php
$role=$this->session->userdata('role');

$mod_sql = $this->db->query("select module_id,module_name,module_url from tbl_module_mst where status='A' and module_id='19'");
$countsss=1;

$mod_fetch = $mod_sql->row();
//foreach ($mod_sql->result() as $mod_fetch){
$module_sqldata = $this->db->query("select COUNT(function_url) as ct from tbl_role_func_action where role_id='".$role."' and module_id='".$mod_fetch->module_id."' and action_id !='Inactive'");
$module_fetchdata = $module_sqldata->row();
$module_fetchdata->ct;
 
?>



<div class="container-fluid">
   <ul class="nav navbar-nav">
      <li><a href="dashboar">Home</a>    
      </li>
	  
	  <?php /*?><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Billing</a>
        <ul class="dropdown-menu">
		<?php
		$mod_sql2 = $this->db->query("select distinct f.function_group from tbl_module_function f  join tbl_role_func_action rf on f.func_id=rf.function_url where rf.role_id='".$role."' and rf.action_id !='Inactive' and f.module_name='".$mod_fetch->module_id."'");
	foreach ($mod_sql2->result() as $mod_fetch2){
			$mod_sql3 = $this->db->query("select func_id,function_name,function_url from tbl_module_function where status='A' and module_name='".$mod_fetch->module_id."' and function_group='".$mod_fetch2->function_group."'");
           foreach ($mod_sql3->result() as $mod_fetch3){
                if( @$rr != 'Inactive')
                {
			
			
			?>
          <li class="dropdown">
		  <li><a href="<?php echo $mod_fetch3->function_url; ?>"><?php echo  $mod_fetch3->function_name; ?></a></li>
		          <?php }}}?>
        </ul>
      </li>	  
      <li></li>
    </ul>
	</li><?php */?>
	<ul class="nav navbar-nav navbar-right">
	 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('user_name');?></a>
        <ul class="dropdown-menu">
		
         <li><a <a href="../master/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
         
        </ul>
		</li>
      </ul>
  </div>
 