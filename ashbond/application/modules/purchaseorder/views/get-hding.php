<select style="width:100%" name="heading_idd" onFocus="customertermfun()">
						<option value="">---Select---</option>															
			<?php					 
					 $hdQuery=$this->db->query("select * from tbl_heading_po where status='A'");
					 foreach($hdQuery->result() as $hdRow)
					{
					
	
					  ?>
						<option value="<?php echo $hdRow->hd_id; ?>">
						<?php echo $hdRow->heading_name; ?></option>
						<?php } ?>
														
						</select>