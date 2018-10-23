<div class="content-page">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title m-b-20 m-t-0">Adicionar Cupom</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card-box">
						<form id="add" action="<?php echo base_url().'admin/Custom_Cupom/add'; ?>" method="post"  enctype="multipart/form-data"  >
							
							<div class="form-group">
								<div class="text-center text-error" id="error-exist"></div>
								<label for="">Código</label>
								<input type="text" name="cupom_codigo" id="cupom_codigo" placeholder="Digite o código do Cupom..." class="form-control" required>
							</div>

							<div class="form-group">
								<div class="text-center text-error" id="error-exist"></div>
								<label for="">Qtd</label>
								<input type="text" name="cupom_qtd" id="cupom_qtd" placeholder="Digite a quatidade do Cupom..." class="form-control" required>
							</div>																	
																												
							<div class="form-group m-b-0 m-t-30">
								<button class="btn btn-primary" name="form_submit" value="submit" type="submit">Enviar</button>
							</div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>