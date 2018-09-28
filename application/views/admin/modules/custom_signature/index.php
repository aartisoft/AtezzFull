<div class="content-page">

	<div class="content">

		<div class="container">

			<div class="row">
				<div class="col-sm-8">
					<h4 class="page-title m-b-20 m-t-0">Visualizar Assinaturas</h4>
				</div>
			</div>
			<?php if($this->session->flashdata('message')) { ?>
				<?php echo $this->session->userdata('message');?>
			<?php }	?> 

             <div class="row">

				<div class="col-lg-12">

					<div class="card-box">

						<div class="table-responsive">

							<table class="table table-actions-bar datatable table-striped"> 

								<thead>

									<tr>

										<th>#</th>                                                  

										<th>Nome</th>

										<th>Status</th> 			                                        

										<th>Pagamento</th>

										<th>Data Criação</th>
										
										<th>Data Fim Assinatura</th>

									</tr>

								</thead>

								<tbody>

									<?php 

									 if(!empty($list)) 

									{

									$i=1;

									$admin_country_name = $this->session->userdata('admin_country_name');

									$doller_rate 		= $this->session->userdata('dollar_rate');

									$rupee_rate         = $this->session->userdata('rupee_rate');

								

									foreach($list as $item) { 

										 $status = 'Active'; if($item['status']==1){$status = 'Inactive';}    

										?>

									<tr>

										<td><?php echo $item['id']; ?></td>    

										<td><?php echo $item['fullname']; ?></td>                                                    

										<td>
											<?php 
												if($item['status'] == 1){
													echo 'Ativo';
												}
												else if($item['status'] == 0){
													echo 'Cancelado';
												}
											?>
										</td>

										<td>
											<?php 

												if($item['status_pay'] == 1){
													echo 'PagSeguro';
												}
												else if($item['status_pay'] == 0){
													echo 'Cupom';
												}											
										
											?>
										</td>
										
										<td><?php echo date_format(date_create($item['start']),"d/m/Y H:i:s"); ?></td>

										<td><?php echo date_format(date_create($item['end']),"d/m/Y H:i:s"); ?></td>

									</tr>

									<?php $i = $i+1; } } else { ?>

									<tr>

										<td colspan="10"><p class="text-danger text-center m-b-0">Nenhum item encontrado</p></td>

									</tr>

									<?php } ?>

								</tbody>

							</table>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript">
		var BASE_URL = "<?php echo base_url(); ?>";
		function admin_delete_cupom(id) {
			if(confirm("Tem certeza que deseja deletar este cupom?")){
				$.post(BASE_URL+'admin/custom_cupom/delete',{id:id},function(result){
					if(result){
						 location.reload();
					}
				});
			
			}	
		}

</script>