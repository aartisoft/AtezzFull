<?php	$this->load->view('user/includes/search_include'); ?>
  		<section class="profile-section">
				<div class="container">
				<?php if($this->session->userdata('message')) {					 ?>
                     <div class="alert alert-success text-center fade in alert-dismissable" id="flash_succ_message"><?php echo $this->session->userdata('message');?></div>
								<?php } ?>
					<div class="row">	
						<div class="col-md-12">
							<ol class="breadcrumb menu-breadcrumb">
								<li><a href="<?php echo base_url(); ?>">Início</a> <i class="fa fa fa-chevron-right"></i></li>
								<li class="active">Perfil</li>        
							</ol>
						</div>
					</div>
					<div class="row">	
						<div class="col-md-12">
							<div class="user-block"  >
								<div class="user-image">
                                      <div id="crop-avatar">
                	<?php $image =  base_url().'assets/images/avatar-lg.jpg' ;
					if(!empty($profile['user_profile_image']))
					{
						$image = base_url().$profile['user_profile_image'];
					}
					 ?>
                    <div id="profile-avatar"> 
                        <div class="avatar-view" id="img_view" title="Click to change picture">
                      <img style="cursor:pointer;" src="<?php  echo $image; ?>" alt="Avatar">
                     </div>        			 
                     <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                </div> 
                <!-- Cropping modal -->
                <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form class="avatar-form" action="<?php echo base_url().'prf_crop';?>" enctype="multipart/form-data" method="post">
                        <div class="modal-header">
                          <button class="close" data-dismiss="modal" type="button">&times;</button>
                          <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                        </div>
                        <div class="modal-body">
                          <div class="avatar-body">
                            <div class="avatar-upload">
                              <input class="avatar-src" name="avatar_src" type="hidden">
                              <input class="avatar-data" name="avatar_data" type="hidden"> 
                               <label for="avatarInput">Local upload</label>
                              <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                            </div>
                            <div class="row">
                              <div class="col-md-9">
                                <div class="avatar-wrapper"></div>
                              </div>
                              <div class="col-md-3">
                                <div class="avatar-preview preview-lg"></div>
                                <div class="avatar-preview preview-md"></div>
                                <div class="avatar-preview preview-sm"></div>
                              </div>
                            </div>
                             <div class="row avatar-btns"> 
                              <div class="col-md-3 pull-right">
                                <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                              </div>
                            </div>
                          </div>
                        </div> 
                      </form>
                    </div>
                  </div>
                </div>
                <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div> 
		</div>
									
								</div>
								<div class="user-details">
									<div class="user-name-block">
                                                                            <input type="text" name="show_user_name" id="show_user_name" value="<?php echo $profile['fullname'];  ?>" style="display: none" >
                                                                            <input type="button" name="save" id="save" value="save" style="display: none" >  <input type="button" name="cancel" id="cancel" value="cancel" style="display: none">
										<h3 id="uname-edit" class="user-name"><?php echo ucfirst($profile['fullname']);  ?></h3>
                                                                                <input type="hidden" name="hidden_user_name" id="hidden_user_name" value="<?php echo $profile['fullname'];  ?>" > 
									</div>
									<div class="user-contact">
										<ul class="list-inline">
                                        	 <?php 
											$query_feed = $this->db->query("SELECT AVG(rating),count(id) FROM `feedback` WHERE rating !=0 AND `to_user_id` = ".$profile['USERID']."");
											$fe_count = $query_feed->row_array();
											$rat=0;
											$rat_count=0;
											if($fe_count['AVG(rating)']!='')
											{
											$rat=round($fe_count['AVG(rating)']);
											$rat_count=$fe_count['count(id)'];
											}
											?>
											<li class="user-rating feedback-area"> <span id="stars-existing" class="starrr" data-rating="<?php echo $rat;?>"> </span>(<?php echo $rat_count;?>)</li>
			<?php if(!empty($country_name)) { ?>									<li class="user-country2">FROM <?php echo $country_name; ?> <span class="ppcn country <?php echo $country_shortname; ?>"></span></li> <?php } ?> 
										</ul>
									</div>
									<div class="user-description">
									<p class="user-desc"> <?php echo ucfirst($profile['description']); ?> <span class="more-desc"></span></p>
									</div>
                                      <?php if(!empty($profile['lang_speaks'])) { ?>
									<div class="user-language">
										<span><img src="<?php echo base_url(); ?>assets/images/li-world.png"></span>
                                                                                Speaks: <span id="language_list"><?php echo ucfirst($profile['lang_speaks']);  ?></span> 										<input type="hidden" value="" id="lang_speaks">
										</span>
									</div>
                                    <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="tab-section">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="tab-list">
								<ul>
									<li>
										<a href="<?php echo base_url().'password'; ?>">
											<span class="visible-xxs"><i class="fa fa-key" aria-hidden="true"></i></span> 
											<span class="hidden-xxs">Senha</span> 
										</a>
									</li>
									<li>
										<a href="<?php echo base_url().'profile'; ?>">
											<span class="visible-xxs"><i class="fa fa-user" aria-hidden="true"></i></span>
											<span class="hidden-xxs">Perfil</span>
										</a>
									</li>
									<li class="active">
										<a href="#">
											<span class="visible-xxs"><i class="fa fa-money" aria-hidden="true"></i></span>
											<span class="hidden-xxs">Assinatura</span>
										</a>
									</li>
								</ul>    
							</div>		
						</div>
					</div>
				</div>
			</div>

			<div class="tab-content">
					<div class="container">
							<?php if($user_provider != null) { 
									$date_end = date_create_from_format('Y-m-d H:i:s', $user_provider['end']);
									$data_atual =	date("Y-m-d");
									?>
							<div class="row">
									<?php if($user_provider['status'] == 2){ ?>
											<div class="col-md-6">
													<div id="ativo" class="btn btn-green">Plano Vitalício(Sem Expiração)</div>
											</div>
											<div class="col-md-6" class="text-right">
															
											</div>
									<?php } else if($user_provider['end'] != '' && $date_end < $data_atual){ ?>
											<div class="col-md-6">
													<div id="ativo" class="btn btn-green">Plano Ativo <?php echo date_format($date_end, 'd/m/Y'); ?></div>
											</div>
											<div class="col-md-6" class="text-right">
													<a id="cancelar" class="btn btn-yellow">Cancelar Plano</a>		
											</div>
									<?php } else { ?>
											<div class="col-md-6">
													<div id="ativo" class="btn btn-green">Plano Inativo <?php echo date_format($date_end, 'd/m/Y'); ?></div>
											</div>
											<div class="col-md-6" class="text-right">
													Assinatura expirada para continuar com acesso efetue uma nova assinatura.
											</div>							
									<?php } ?>												
							</div>
							<div class="row">
									<?php if($user_provider['status'] != 2){ ?>
									<h4>Lista de Pagamentos</h4>
									<?php if(!empty($list)) { ?>
											<div class="col-md-12">
													<div class="table-responsive order-table">
															<table class="table table-actions-bar">
																	<thead>
																			<tr>
																					<th>Data</th>
																					<th>Status</th>
																					<th>Valor</th>
																			</tr>
																	</thead>
																	<tbody>											
																			<?php foreach($list as $item) { ?>
																					<tr>									
																							<td><?php echo $item['date']; ?></td>
																							<td><?php echo $item['status']; ?></td>
																							<td><?php echo $item['grossAmount']; ?></td>
																					</tr>												
																			<?php } ?>
																	</tbody>								
															</table>
													</div>
											</div>
									<?php } else { ?>					
											<b>Nenhum Pagamento até o momento.</b>
									<?php } ?>
									<?php } ?>	
							</div>
							<?php } else{ ?>	
									Para ver informações nesta tela é nescessario efetuar uma assinatura.
							<?php } ?>		
																			
					</div>
			</div>    