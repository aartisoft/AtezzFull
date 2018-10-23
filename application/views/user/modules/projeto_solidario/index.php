
			<!--TITULO DE DESTAQUE -->

			<section class="sell-banner parallax">

				<div class="container">

					<div class="row">

						<div class="col-md-12 sell-banner-cont">
								<div class="banner-solidario" style="background-color:rgba(36,72,54,0.3);padding:10px 0px 10px 0px" width="200px" height="100px" >
									<h1 style="color: #ffffff; padding:10px 0px 10px 0px"><strong>JUNTOS PARA FAZER O BEM! </strong></h1>
									<h3 style="color: #ffffff; line-height: 1px">Nos ajude a transformar vidas.</h3><br/><br/><br/>
								</div>
								<div class="create-gig">		


								<?php if(empty($verify_user_premium)){ ?> 								 

									<a href="javascript:;"  data-toggle="modal" data-target="#login-popup">
										<button type="button" id="create_gig_btn" class="btn btn-yellow">Cadastrar Ong</button>
									</a>

									<a href="javascript:;"  data-toggle="modal" data-target="#login-popup">
										<button type="button" class="btn btn-success btn-lg">Indicar ONG</button>
									</a>										

								<?php } else {?>	

									<a href="javascript:;"  data-toggle="modal" data-target="#register-popup_provider">
										<button type="button" id="create_gig_btn" class="btn btn-yellow">Cadastrar Ong</button>
									</a>

									<a href="javascript:;"  data-toggle="modal" data-target="#login-popup">
										<button type="button" class="btn btn-success btn-lg">Indicar ONG</button>
									</a>										

								<?php }?>	

								</div>	

						</div>

					</div>

				</div>

			</section>			
			<section class="profile-section">

				<div class="container">

					<div class="row">	

						<div class="col-md-12">

							<ol class="breadcrumb menu-breadcrumb">

								<li><a href="<?php echo base_url(); ?>">Home</a> <i class="fa fa fa-chevron-right"></i></li>

								<li class="active"><?php echo ucfirst($search_value); ?></li>        

							</ol>

						</div>

					</div>

					<div class="row">	

						<div class="col-md-12">

							<h3 class="header-title"> <?php echo ucfirst($search_value); ?> 

                              </h3>

						</div>

					</div>

				</div>

			</section>

			<section class="container">

							<div class="col-md-12" style="margin:40px 0px 40px 0px;" align="center">
								<h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie tellus tincidunt nunc aliquam, at imperdiet sapien dapibus. Nullam suscipit, sapien id porttitor mollis, ex mauris dictum est, eget tempus sapien sem sit amet arcu. </p></h3>
							</div>	


				<div class="row" align="center" >

							<div class="col-md-6" align="left">
								<div class="col-md-6" style=" margin: 20px 0px 20px 0px; width: 100%; height: 350px;">
								<img src="assets/images/como_posso_ajudar.jpg" width="100%">
								</div>

									<h3><b>Lorem ipsum dolor sit amet, consectetur.</b></h3>

							</div>

							<div class="col-md-6" align="left">
								<h1><b><span text-align="left">Como posso ajudar</span></b></h1> <br/>
								<h3><b> Lorem ipsum dolor sit amet </b> </h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie tellus tincidunt nunc aliquam, at imperdiet sapien dapibus. Nullam suscipit</p> <br/>

								<h3><b> Lorem ipsum dolor sit amet </b> </h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie tellus tincidunt nunc aliquam, at imperdiet sapien dapibus. Nullam suscipit</p>								
								
							</div>

				</div>	
				<div class="row" align="center"style="margin:40px 0px 40px 0px;" >
					<h1><b>Causas Recentes</b></h1><br/>
					<p>Lorem ipsum dolor sit amet, vitae mattis vehicula scelerisque suscipit donec, tortor duis phasellus vivamus wisi placerat, pellentesque augue leo. Orci nullam, nonummy nam sed, sapien temporibus ac ac, velit ante volutpat enim we help 22,4780 pepole</p>

				</div>	
				<div class="row" align="cente" style="text-align: center;">

				<div class="row" style="margin:30px">

					<?php 

						if(($this->session->userdata('SESSION_USER_ID')))

						{

							$user_id = $this->session->userdata('SESSION_USER_ID'); 

							$favorites_list=array();

							foreach ($user_favorites as $value){

								$favorites_list[]=$value['gig_id'];

							}

							//print_r($favorites_list);

						} 
								if(!empty($list))

								{

								foreach($list as $gigs ) 

								{ 
									$currency_option = (!empty($gigs['currency_type']))?$gigs['currency_type']:'USD';
									$rate_symbol = currency_sign($currency_option);											
										

													//$rate = $gig_price;

													$rate = $gigs['gig_price'];

													$extra_gig_price =  '';

														

													

										$username = $gigs['username'];

										$name = $gigs['username'];

										if(!empty($gigs['fullname']))

										{

											$name = $gigs['fullname'];

										}

											$image = "assets/images/2.jpg";

										if(!empty($gigs['gig_image'])) {

										$image = base_url().$gigs['gig_image']; }  

										

										$user_img = base_url()."assets/images/avatar2.jpg";

										if(!empty($gigs['user_thumb_image']))

										{

										$user_img = base_url().$gigs['user_thumb_image'];    

										}

										$gig_rating=0;

										$gig_rating1=0;

										if(!empty($gigs['gig_rating']))

										{

										$gig_rating1 = round($gigs['gig_rating']);  

										$gig_rating  = $gig_rating1 *2;  

										}                           

										$gig_usercount=0;

										if(!empty($gigs['gig_usercount']))

										{

											$gig_usercount  = $gigs['gig_usercount'];  

										}   

										$gig_idone=$gigs['id']; 

									?>

				   <div class="col-md-3 col-sm-6 product-cols">                                        

					   <div class="product">  

					   <div class="product-img">  

						   <a href="<?php echo base_url().'ong-preview/'.$gigs['title']; ?>"><img width="240" height="250" alt="<?php echo $gigs['title']; ?>" src="<?php echo $image; ?>"></a>

						   <?php if(($this->session->userdata('SESSION_USER_ID'))) {

							   $user_id = $this->session->userdata('SESSION_USER_ID'); 

								   if($gigs['user_id'] != $user_id) 

								   {  

								   if (in_array($gig_idone, $favorites_list)) {?>

								   <div id="favourite_area_list"><a href="javascript:;" class="favourite favourited" title="Remove Favourite" onclick="remove_favourites_list('<?php echo $gig_idone; ?>','<?php echo $user_id; ?>', this)"><i class="fa fa-heart"></i></a></div>

									 <?php } else {?>

									  <div id="favourite_area_list"><a href="javascript:;" class="favourite" title="Add Favourite" onclick="add_favourites_list('<?php echo $gig_idone; ?>','<?php echo $user_id; ?>', this)"><i class="fa fa-heart"></i></a></div>

						   <?php }  } }?>

					   </div>

					   <div class="product-detail">

																   <div class="product-name"><a href="<?php echo base_url().'gig-preview/'.$gigs['title']; ?>"><?php echo ucfirst(str_replace("-"," ",$gigs['title'])); ?></a></div>

						   <div class="author">

							   <span class="author-img">

								   <a href="<?php echo base_url()."user-profile/".$username; ?>"><img src="<?php echo $user_img;?>" title="<?php echo $gigs['fullname']; ?>" alt="" width="50" height="50"></a>

								   <a class="author-name" href="<?php echo base_url()."user-profile/".$username; ?>"><?php echo ucfirst($name); ?></a>

							   </span>

							   <div class="ratings">

								   <span class="stars-block star-<?php echo $gig_rating;?>"></span><span class="ratings-count">(<?php echo $gig_usercount;?>)</span>

							   </div>

						   </div>											 

						   <div class="price-box2" hidden="true">

							   <div class="price-inner">

								   <div class="rectangle">

									   <h2><?php echo $rate_symbol.$rate; ?></h2>

								   </div>

								   <div class="triangle"></div>

							   </div>

						   </div>

						   <div class="product-det">

							   <div class="user-country text-ellipsis"><?php echo ucfirst($gigs['state_name']);?><?php if($gigs['state_name']!=''){ echo ', ';}?><?php echo ucfirst($gigs['country']); ?></div>	 

							   <div class="product-currency">												 

							   </div>	

						   </div>

					   </div>

				   </div>	

				   </div>

				   <?php } } else { ?>   

					   <div class="col-md-12"><p> Desculpe ! Nenhum ítem encontrado </p></div>

				   <?php } ?>

			   </div>

				</div>

			</section>
			<div class="col-lg-12" style="width: 100%; height: 500px; background-color: #efeded; margin-bottom: 40px;">
				<div class="col-md-5" style=" height: 500px; float: left;">
					<img src="assets/images/projeto.jpg" width="100%" height="100%"> 
				</div>
				<div class="col-md-7" style=" height: 500px;  float: left;">
					<h1><b>Lorem ipsum dolor sit amet, vitae mattis vehicula scelerisque.</b></h1><br/>
					<p>Lorem ipsum dolor sit amet, vitae mattis vehicula scelerisque suscipit donec.</p><br/>
						<br>Lorem ipsum dolor sit amet, vitae mattis vehicula scelerisque.</b></h1><br/>
					<p>Lorem ipsum dolor sit amet, vitae mattis vehicula scelerisque suscipit donec, tortor duis phasellus vivamus wisi placerat, pellentesque augue leo. Orci nullam, nonummy nam sed, sapien temporibus ac ac, velit ante volutpat enim we help 22,4780 pepole.</p><br/>
					<br>Lorem ipsum dolor sit amet, vitae mattis vehicula scelerisque.</b></h1><br/>
					<p>Lorem ipsum dolor sit amet. </p><br/><br/>
					
					
					<?php if(empty($verify_user_premium)){ ?> 								 

								<a href="javascript:;"  data-toggle="modal" data-target="#login-popup">
									<button type="button" class="btn btn-success btn-lg">Cadastre sua ONG</button>
								</a>							

							<?php } else {?>	

								<a href="javascript:;"  data-toggle="modal" data-target="#register-popup_provider">
									<button type="button" class="btn btn-success btn-lg">Cadastre sua ONG</button>
								</a>

							<?php }?>
				
				</div>
			</div>
			<div class="row" style="margin: 40px 40px 40px 40px;"></div>

		<!-- POP-UP REGISTER ONG -->
        <?php if(!$this->session->userdata('SESSION_USER_ID')) {} else { ?>
		<div id="register-popup_provider" class="modal fade custom-popup" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<button type="button" id="remove_popuptop_provider" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-header text-center">
					</div>
					<div class="modal-body">
						<div id="register_errtext"></div>
						<div id="register_success"> </div>
						<form id="ong_register" class="form-horizontal">

							<div class="col-lg-12" align="center" style="margin: 0px 0px 20px 0px;">

								<h2><b>Cadastrar ONG</b></h2> 
							    <p class="member-text">Cadastre já sua ONG gratuitamente. </p>	<br/>
							</div>

									<!-- One "tab" for each step in the form: -->
									<div class="tab">SOBRE A ONG: <br/><br/>
										<p><input type="text"  id="nomeOng" class"teste" placeholder="Nome da ONG" oninput="this.className = ''" name="nomeOng"></p>
										<p><input type="text" id="descricao" class"teste" placeholder="Descrição do serviço prestado" oninput="this.className = ''" name="descricao"></p>
										<p><input type="text" id="cnpj" class"teste" placeholder="CPF ou CNPJ" oninput="this.className = ''" name="cnpj"></p>
										<p><input type="text" id="telefone" class"teste" placeholder="Telefone de contato" oninput="this.className = ''" name="telefone"></p>
										<p><input type="text" id="site" class"teste" placeholder="Site ou facebook da ONG" oninput="this.className = ''" name="site"></p>
									</div>

									<div class="tab">Endereço:<br/><br/>
									<p><input type="text" id="rua" class"teste" placeholder="Rua" oninput="this.className = ''" name="rua"></p>
									<p><input type="text" id="numero" class"teste" placeholder="Numero" oninput="this.className = ''" name="numero"></p>
									<p><input type="text" id="complemento" class"teste" placeholder="Complemento" oninput="this.className = ''" name="complemento"></p>
									<p><input type="text" id="bairro" class"teste" placeholder="Bairro" oninput="this.className = ''" name="bairro"></p>
									<p><input type="text" id="cep" class"teste" placeholder="CEP" oninput="this.className = ''" name="cep"></p>
									<p><input type="text" id="estado" class"teste" placeholder="Estado" oninput="this.className = ''" name="estado"></p>
									<p><input type="text" id="cidade" class"teste" placeholder="Cidade" oninput="this.className = ''" name="cidade"></p>
									</div> 

									<div class="tab">Causas relacionadas a sua ONG: <br/><br/>
										<div class="row">
												<div class="col-lg-6">	
													<div class="exemplo-checkbox">														
														<?php
															foreach($input_causas as $item )
															{
																if($item['ID'] <= 7)
																{
														?>																	

														<input type="checkbox"  value="<?php echo $item['ID']; ?>" name="campo-checkbox" />
														<label for="campo-checkbox1"><?php echo $item['DESCRICAO'] ?></label> <br/>

														<?php			
																}
																
															}
														?>
													</div>
												</div>
												<div class="col-lg-6">	
													<div class="exemplo-checkbox">
														<?php
																foreach($input_causas as $item )
																{
																	if($item['ID'] > 7)
																	{
															?>																	

															<input type="checkbox"  value="<?php echo $item['ID']; ?>" name="campo-checkbox" />
															<label for="campo-checkbox1"><?php echo $item['DESCRICAO'] ?></label> <br/>

															<?php		
																	}
																	
																}
															?>
													</div>
												</div> 

										</div>
									</div>
									<div class="tab">Dados para doação: <br/><br/>
										<p><input type="text" id="banco" class"teste" placeholder="Banco" oninput="this.className = ''" name="banco"></p>
										<p><input type="text" id="titular" class"teste" placeholder="Titularidade da Conta" oninput="this.className = ''" name="titular"></p>
										<p><input type="text" id="agencia" class"teste" placeholder="Agência" oninput="this.className = ''" name="agencia"></p>
										<p><input type="text" id="conta" class"teste" placeholder="Conta (Corrente/poupança)" oninput="this.className = ''" name="conta"></p><br/><br/><br/>
										
										<button type="submit" class="btn btn-primary logon-btn" id="registers_ong">enviar</button>  
									</div>
									<div style="overflow:auto;">
										<div style="float:right;">
										<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
										<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
										</div>
									</div>
									<!-- Circles which indicates the steps of the form: -->
									<div style="text-align:center;margin-top:40px;">
										<span class="step"></span>
										<span class="step"></span>
										<span class="step"></span>
										<span class="step"></span>
									</div>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- END POP-UP REGISTER PROVIDER -->


		<?php } ?>



			<!-- <div class="tab-content buy-section">

				<div class="container">

					<div class="row">

                        <input type="text" name="country_name" id="full_country_name" style="display: none" >

						<div class="col-md-12">                                                    

							<div class="top-pagination">

                                <?php echo $links; ?>

							</div>	

						</div>	

					</div>

				<div class="row">

                 <?php 

					  if(($this->session->userdata('SESSION_USER_ID')))

						{

							$user_id = $this->session->userdata('SESSION_USER_ID'); 

							$favorites_list=array();

							foreach ($user_favorites as $value){

								$favorites_list[]=$value['gig_id'];

							}

							//print_r($favorites_list);

						} 

							

						

									if(!empty($list))

									{

									foreach($list as $gigs ) 

                                    { 
										$currency_option = (!empty($gigs['currency_type']))?$gigs['currency_type']:'USD';
										$rate_symbol = currency_sign($currency_option);											
										 

														//$rate = $gig_price;

														$rate = $gigs['gig_price'];

														$extra_gig_price =  $extra_gig_price;

														 

														

										   $username = $gigs['username'];

											$name = $gigs['username'];

											if(!empty($gigs['fullname']))

											{

												$name = $gigs['fullname'];

											}

				 							$image = "assets/images/2.jpg";

											if(!empty($gigs['gig_image'])) {

											$image = base_url().$gigs['gig_image']; }  

											

											$user_img = base_url()."assets/images/avatar2.jpg";

											if(!empty($gigs['user_thumb_image']))

											{

											$user_img = base_url().$gigs['user_thumb_image'];    

											}

                                            $gig_rating=0;

											$gig_rating1=0;

											if(!empty($gigs['gig_rating']))

											{

											$gig_rating1 = round($gigs['gig_rating']);  

											$gig_rating  = $gig_rating1 *2;  

											}                           

                                        	$gig_usercount=0;

											if(!empty($gigs['gig_usercount']))

											{

												$gig_usercount  = $gigs['gig_usercount'];  

											}   

                                        	$gig_idone=$gigs['id']; 

                                        ?>

                                    <div class="col-md-3 col-sm-6 product-cols">                                        

										<div class="product">  

										<div class="product-img">  

                                            <a href="<?php echo base_url().'gig-preview/'.$gigs['title']; ?>"><img width="240" height="250" alt="<?php echo $gigs['title']; ?>" src="<?php echo $image; ?>"></a>

											<?php if(($this->session->userdata('SESSION_USER_ID'))) {

												$user_id = $this->session->userdata('SESSION_USER_ID'); 

													if($gigs['user_id'] != $user_id) 

                                            		{  

													if (in_array($gig_idone, $favorites_list)) {?>

                                                    <div id="favourite_area_list"><a href="javascript:;" class="favourite favourited" title="Remove Favourite" onclick="remove_favourites_list('<?php echo $gig_idone; ?>','<?php echo $user_id; ?>', this)"><i class="fa fa-heart"></i></a></div>

                                              		<?php } else {?>

						                           	<div id="favourite_area_list"><a href="javascript:;" class="favourite" title="Add Favourite" onclick="add_favourites_list('<?php echo $gig_idone; ?>','<?php echo $user_id; ?>', this)"><i class="fa fa-heart"></i></a></div>

                                            <?php }  } }?>

										</div>

										<div class="product-detail">

                                                                                    <div class="product-name"><a href="<?php echo base_url().'gig-preview/'.$gigs['title']; ?>"><?php echo ucfirst(str_replace("-"," ",$gigs['title'])); ?></a></div>

											<div class="author">

												<span class="author-img">

													<a href="<?php echo base_url()."user-profile/".$username; ?>"><img src="<?php echo $user_img;?>" title="<?php echo $gigs['fullname']; ?>" alt="" width="50" height="50"></a>

													<a class="author-name" href="<?php echo base_url()."user-profile/".$username; ?>"><?php echo ucfirst($name); ?></a>

												</span>

												<div class="ratings">

													<span class="stars-block star-<?php echo $gig_rating;?>"></span><span class="ratings-count">(<?php echo $gig_usercount;?>)</span>

												</div>

											</div>											 

											<div class="price-box2">

												<div class="price-inner">

													<div class="rectangle">

														<h2><?php echo $rate_symbol.$rate; ?></h2>

													</div>

													<div class="triangle"></div>

												</div>

											</div>

											<div class="product-det">

                                                <div class="user-country text-ellipsis"><?php echo ucfirst($gigs['state_name']);?><?php if($gigs['state_name']!=''){ echo ', ';}?><?php echo ucfirst($gigs['country']); ?></div>	 

												<div class="product-currency">												 

												</div>	

											</div>

										</div>

									</div>	

                                    </div>

                                    <?php } } else { ?>   

										<div class="col-md-12"><p> Sorry ! No Gigs Found </p></div>

									<?php } ?>

                                </div>

					<div class="row">

						<div class="col-md-12">

							<div class="bottom-pagination">

								<ul class="pagination pagination-sm">

									<li><?php echo $links; ?></li>  

								</ul>

							</div>	

						</div>	

					</div>

				</div>

			</div> -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formStep.js"></script>