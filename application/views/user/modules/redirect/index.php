
			<!--TITULO DE DESTAQUE -->
			<section class="profile-section">
				<div class="container">
                
					<div class="row">	
						<div class="col-md-12">
							<ol class="breadcrumb menu-breadcrumb">
								<li><a href="<?php echo base_url(); ?>">Home</a> <i class="fa fa fa-chevron-right"></i></li>
								<li class="active">Status da Solicitação</li>        
							</ol>
						</div>
					</div>

					<div class="row">	
						<div class="col-md-12">
							<h3 class="header-title"> 
                                Status da Solicitação
                            </h3>
						</div>
					</div>

				</div>
			</section>

			<section class="container">

				<div class="col-md-12" style="margin:40px 0px 40px 0px;">
					<h3>

						<?php if($status == 'sucesso'){ ?>
							Os dados foram enviados corretamento ao PagSeguro aguarde os próximos emails para confirmação!
						<?php }elseif($status == 'cancelado'){ ?>
							Plano Cancelado. Caso tenha interesse em voltar é so assinar um novo plano.
						<?php }else{  ?>
							Erro ao enviar os dados ao pagseguro tente novamente mais tarde.
						<?php } ?>

					</h3>
				</div>	

            </section>