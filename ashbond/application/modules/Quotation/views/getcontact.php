<?php


 $contactid=$con;
 
 ?>
 <select id="case_id" required name="case_name" onChange="loadDoc()">
	<option value="">---select---</option>
	<?php
					 
					 $caseQuery=$this->db->query("select * from tbl_new_case where status='A' and customer_id='$contactid' order by new_case_id desc");
					 foreach($caseQuery->result() as $caseRow)
					{
					 $Queryww=$this->db->query("select * from tbl_contact_m where status='A' and contact_id='$caseRow->vendor_id'");
					  $fetch=$Queryww->row();
					  
					   $query=$this->db->query("SELECT * FROM tbl_contact_m where contact_id='$caseRow->customer_id'" );
			
						$fetchq=$query->row(); 
	
					  ?>
						<option value="<?php echo $caseRow->case_id; ?>" <?php if($caseRow->new_case_id==$contgactid){?> selected="selected" <?php }?>>
						<?php echo $caseRow->case_id."(".$fetch->first_name.")"." (".$fetchq->first_name.")"." (".$caseRow->currency_name.")"; ?></option>
						<?php } ?>
</select>
<a onClick="openpopup('<?php echo base_url(); ?>master/CreateCase/add_case',900,300,'add','case')"><img src="<?php echo base_url();?>/assets/image_data/add.png" width="25px" height="25px"/></a>