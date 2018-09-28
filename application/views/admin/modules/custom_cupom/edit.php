<div class="content-page">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title m-b-20 m-t-0">Editar Cupom</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card-box">
						<form id="edit" action="<?php echo base_url().'admin/custom_cupom/edit/'.$list['cupom_id']; ?>" method="post"  enctype="multipart/form-data"  >
							
							<input type ="hidden" name="cupom_id" value="<?php if(!empty($list['cupom_id'])){echo $list['cupom_id']; } ?>" id="cupom_id">
							
							<div class="form-group">
								<div class="text-center text-error" id="error-exist"></div>
								<label for="">Código</label>
								<input type="text" name="cupom_codigo" value="<?php if(!empty($list['codigo'])){echo $list['codigo']; } ?>" id="cupom_codigo" placeholder="Digite o código do Cupom..." class="form-control" required>
							</div>

							<div class="form-group">
								<div class="text-center text-error" id="error-exist"></div>
								<label for="">Qtd</label>
								<input type="text" name="cupom_qtd" value="<?php if(!empty($list['qtd'])){echo $list['qtd']; } ?>" id="cupom_qtd" placeholder="Digite a quatidade do Cupom..." class="form-control" required>
							</div>	

							<div class="form-group">
								<label class="control-label">Status</label>
								<div>
									<div class="radio radio-primary radio-inline">
										<input type="radio" id="cupom_status1" value="ATIVO" name="cupom_status" <?php
										if ($list['status'] == 'ATIVO') {
											echo 'checked=""';
										}
										?>>
										<label for="cupom_status1">Ativo</label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" id="cupom_status2" value="INATIVO" name="cupom_status" <?php
										if ($list['status'] == 'INATIVO') {
											echo 'checked=""';
										}
										?>>
										<label for="cupom_status2">Inativo</label>
									</div>
								</div>
							</div>

							<div class="form-group m-b-0 m-t-30">
								<button class="btn btn-primary" name="form_submit" value="submit" type="submit">Enviar</button>
								<a href="<?php echo base_url().'admin/custom_cupom'?>" class="btn btn-default m-l-5">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>