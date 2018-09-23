<div class="content-page">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title m-b-20 m-t-0">Pedidos Recusados</h4>
				</div>
			</div>
			<?php if($this->session->userdata('message')) {  ?>
			<?php echo $this->session->userdata('message');?>
			<?php } ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="card-box m-b-0">
						<div class="table-responsive">
							<table class="table table-actions-bar datatable m-b-0">
								<thead>
									<tr>                                                    
										<th>Id</th>
										<th>Data de Criação</th>
										<th>Id da Transação</th>
										<th>Prestador</th>
										<th>Cliente</th>
										<th>ID paypal Cliente</th>
										<th>Valor</th>
										<th>Status Pedido</th>
										<!-- <th>Action</th> -->
									</tr>
								</thead>
								<tbody>
									<?php
									 if(!empty($list)) 
									{
									foreach($list as $item) { 


											$case = $item['currency_type'];
										 switch ($case) {
								 			case 'USD':
								 			$rate_symbol = "$";	
								 			break;
								 		case 'EUR':
								 			$rate_symbol = "€";	
								 			break;
								 		case 'GBP':
								 			$rate_symbol = "£";	
								 			break;
								 		
								 		default:
								 			$rate_symbol = "$";	
								 			break;
								 	}

										$status = 'Active'; if($item['status']==1){$status = 'Inactive';} 
										$parent_category = 'None' ;
										$status = $item['seller_status']; 
										$process='<button type="submit" class="btn btn-primary btn-sm btn-border">Process Payment</button>';
										if($status ==1) {
											$sts='New';
											$class='label-success';
										}elseif($status ==2){
											$sts='Pending';
											$class='label-warning';
										}elseif($status ==3){
											$sts='Process';
											$class='label-primary';
										}elseif($status ==4){
											$sts='Refunded';
											$class='label-danger';
										}elseif($status ==5){
											if($item['decline_accept'] ==0)
											{
												$sts='Decline Request';
												$process='-';
											}
											else{
												$sts='Declined';
												$process='<button type="submit" class="btn btn-primary btn-sm btn-border">Process Payment</button>';
											}
											$class='label-danger';
										}elseif($status ==6){
											$sts='Completed';
											$class='label-success';
										}
										 $created_on = '-';
										if (isset($item['created_at'])) {
											if (!empty($item['created_at']) && $item['created_at'] != "0000-00-00 00:00:00") {
												$created_on = '<span>' . date('d M Y', strtotime($item['created_at'])) . '</span>';
											}
										}	
										$payment_status = $item['payment_status']; 
										if($payment_status ==1) {
											$pay_status='Request';
											$class_1='label-primary';
										}elseif($payment_status ==2){
											$pay_status='Transfer Completed';
											$class_1='label-success';
										}
										else
										{
											$pay_status='New';
											$class_1='label-success';
										}
										?>
									<tr>                                                    
										<td><?php echo $item['id']; ?></td>
										<td><?php echo $created_on; ?></td>
										<td><?php echo $item['paypal_uid']; ?></td>
										<td><?php echo $item['seller_name']; ?></td>    
										<td><?php echo $item['buyer_name']; ?></td>
										<td><?php echo $item['paypal_email_id']; ?></td>  
										<td><?php echo $rate_symbol.$item['item_amount']; ?></td>
										<td><span class="label <?php echo $class;?>"><?php echo $sts;?></span></td>
										<!--<td>
																	<?php  if($sts!= 'Declined')
											{
												echo $process;
											}else{
												if($item['pay_status']==''){
												?>
												
											<form action="<?php echo base_url().'admin/rel_service/declined_paymrent';?>" method="post" id="payment_formid" name="payment_submit">
												<input type="hidden" name="gigs_rate" id="gigs_rate" value="<?php  echo $item['item_amount'];?>" />
												<input type="hidden" name="converted_india_gigs_rate" id="converted_india_gigs_rate" value="500" />
												<input type="hidden" name="gigs_actual_rate" id="gigs_actual_rate" value="<?php  echo $item['item_amount'];?>" />
												<input type="hidden" name="extra_gig_row_id" id="extra_gig_row_id" value="<?php  echo $item['id'];?>" />
												<input type="hidden" name="buyer_email" id="buyer_email" value="<?php  echo $item['paypal_email_id'];?>" />
												<input type="hidden" value="" name="currency_type" id="currency_type" />
												<input type ="hidden" name="hidden_super_fast_delivery" value="" id="hidden_super_fast_delivery"  />
												<input type ="hidden" name="total_delivery_days" value="" id="total_delivery_days"  />
												<input type="hidden" id="hidden_super_fast_delivery_charges" name="hidden_super_fast_delivery_charges" value="" />
												<div>
													<button type="submit" class="btn btn-primary btn-sm btn-border" value="true" name="submit">Process Payment</button>
												</div>
											</form>
							<?php
							   }else{ echo "Payment Done";
												
											}
											}
											?>
										</td>-->
									</tr>
									<?php } } else { ?>
									<tr>
										<td colspan="9"><p class="text-danger text-center m-b-0">No Records Found</p></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							 <?php echo $links; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 </div>
<script>
function change_payments_status(id,ele)
{
	 bootbox.confirm("Are you sure want to UPDATE ? ", function(result) {
     if(result ==true)                {
	 var url        = BASE_URL+'admin/request/update_payment_status';
              $.ajax({
			  url:url,
			  data:{id:id}, 
			  type:"POST",
			  success:function(res){ 
		        if(res==1)
                        {
                            $("#"+ele).html('<span class="label label-success">Transfer Completed</span>');
                        }
			  }
		});  
		}
     });
 }
 </script>