<?php


 $contactid=$id;
 
 ?>
 <select name="person_name" required>
	<option value="">---select---</option>
	<?php
					 
					 $caseQuery=$this->db->query("select * from tbl_contact_person where status='A' and contact_id='$contactid'");
					 foreach($caseQuery->result() as $caseRow)
					{
					
	
					  ?>
						<option value="<?php echo $caseRow->person_id; ?>" <?php if($caseRow->contact_id==$kkcontactid){?> selected="selected" <?php }?>>
						<?php echo $caseRow->p_name; ?></option>
						<?php } ?>
</select>