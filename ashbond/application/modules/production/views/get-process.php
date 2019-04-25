




								<?php 
								
								
								$expl[]=array();
								$expl=explode(',',$_GET['procc']);
								//print_r($expl);die;
								$Que=$this->db->query("select * from cybercodex_stock_in_hdr where serial_number='$expl[1]'");
						   $fetQ=$Que->row();
						   
						   
						   			
					$Query=$this->db->query("select * from cybercodex_product_stock where product_id='$fetch->product_id'");
						   $fetchQ=$Query->row();
								
								echo "select * from cybercodex_stock_in_dtl where process='$expl[0]' and finish_goods='$fetQ->finish_goods' and product_id='$fetch->product_id'";die;
								$Que1=$this->db->query("select * from cybercodex_stock_in_dtl where process='$expl[0]' and finish_goods='$fetQ->finish_goods' and product_id='$fetch->product_id'");
						   $fet1Q=$Que1->row();
			
								
						   
						   ?>
								
							<input type="text" name="" value="<?php echo $fet1Q->qntyt;?>" id="checkqty<?php echo $i; ?>"/>
								
								
							
							



  
