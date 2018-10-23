			<?php //	$this->load->view('user/includes/search_include');

				// Setting Price Option 0 - Fixed, 1 - Dynamic.  

				 $allow	= ($price_option['value'] == 'dynamic')?1:0; 
				 $currency_option = (!empty($currency_option))?$currency_option:'USD';
				 $currency_sign = currency_sign($currency_option);
			 ?>

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

			<!-- <div class="milestone-area">	

				<div class="container">				

					<div class="row milestone-section">

						<div class="col-sm-2 text-center">

							<span class="circle-bg orange-bg"><img src="<?php// echo base_url(); ?>assets/images/circle-map.png"></span>

							<p class="miles-title">Crie seus serviços</p>

						</div>

						<div class="col-sm-2 text-center">

							<span class="circle-bg orange-bg"><img src="<?php //echo base_url(); ?>assets/images/publish-icon.png"></span>

							<p class="miles-title">Publique</p>

						</div>

						<div class="col-sm-2 text-center">

							<span class="circle-bg orange-bg"><img src="<?php //echo base_url(); ?>assets/images/receive-orders-icon.png"></span>

							<p class="miles-title">Receba mais pedidos</p>

						</div>

						<div class="col-sm-2 text-center">

							<span class="circle-bg green-bg"><img src="<?php// echo base_url(); ?>assets/images/deliver-work-icon.png"></span>

							<p class="miles-title">Divulgue seus serviços</p>

						</div>

						<div class="col-sm-2 text-center">

							<span class="circle-bg green-bg"><img src="<?php //echo base_url(); ?>assets/images/get-paid-icon.png"></span>

							<p class="miles-title">Contribua com causas sociais</p>

						</div>

						<div class="col-sm-2 text-center">

							<span class="circle-bg green-bg"><img src="<?php// echo base_url(); ?>assets/images/money-bag.png"></span>

							<p class="miles-title">Receba mais propostas</p>

						</div>

						<div class="col-sm-12 text-center">

							<img src="<?php //echo base_url(); ?>assets/images/side-arrow.png">

						</div>

						<div class="col-sm-12">

							<span class="left-arrow"><img src="<?php //echo base_url(); ?>assets/images/down-arrow.png"></span>

						</div>

					</div>

				</div>

			</div> -->

			<section id="post_gig_area" class="post-gig-area">	

				<div class="container">		

					<div class="row">

						<div class="col-md-8 col-sm-12">                                                   

							<h3 class="post-gig-title">Publique em alguns minutos.</h3>

							<p class="sub-title">Compartilhe com as pessoas o serviço social que sua Ong realiza.</p>

							<input type="hidden" id="payment_option" value="<?php echo $price_option['value']; ?>">	

							<input type="hidden" class="gig_title_valid" value="0">	



							<form id="sell_service"   action="<?php echo base_url()."user/sell_service_ong/add_gigs"; ?>" method="post" class="sell-service-form" enctype= "multipart/form-data" >

								<input type="hidden" name="country_name" id="country_name" value="">

								<input type="hidden" name="client_timezone" id="client_timezone" value="">

								<input type="hidden" name="full_country_name" id="full_country_name" value="<?php echo @$full_country_name; ?>">

								<input type="hidden" name="extra_gig_rate" id="extra_gig_rate" value="<?php echo $extra_gig_price['value']; ?>">

								<input type="hidden" name="dollar_rate" id="dollar_rate" value="<?php echo $dollar_rate; ?>">

								<input type="hidden" name="rupee_rate" id="rupee_rate" value="<?php echo $rupee_rate; ?>">

								<input type="hidden" name="youtube_url" id="youtube_url" value="">

								<input type="hidden" name="vimeo_url" id="vimeo_url" value="">

								<input type="hidden" name="vimeo_video_id" id="vimeo_video_id" value="">

								<div class="form-group clearfix">

									<label class="label-title">Titulo <span class="required">*</span></label>

									<div class="name-block">

										<span class="name-input">

											<input type="text" name="gig_title" id="gig_title" onkeyup="gig_title_check(this)" onchange="gig_title_check(this)" value="" class="form-control gig-name " maxlength="80" placeholder="Titulo">	

										</span>

										<!-- <span class="currency" hidden="true" >

											Preço <span class="currency-group">
												<?php 
												// $rate = $gig_price['value'];
												// $extra_gig_price = $extra_gig_price['value'];
											?>

												 <?php// echo $currency_sign; ?>	 <input type="text" class="form-control amount numberonly" name="gig_price" onfocusout="inputfocusout(this)" id="gig_price" <?php //echo ($allow==1)?'':'readonly'; ?>  value="<?php //echo ($allow==1)?'':$rate; ?>"> 

												</span>

										</span> -->

									</div>

									<small class="error_msg help-block gig_title_error" style="display: none;">Por favor, adicione um título</small>

									<small class="error_msg help-block gig_title_already_error" style="display: none;">Este título já está sendo usado</small>

									<small class="error_msg help-block gig_price_error" style="display: none;">Por favor, adicione o preço de seu serviço</small>

									

								</div>

								<!-- <div class="form-group clearfix delivery-day" hidden="true" > 

								<label class="label-title">Prazo <span class="required">*</span></label>

								<input type="text" name="delivering_time" id="delivering_time" class="form-control" maxlength="2" onkeyup="max_lenght(this)" onblur="checkinput(this)" onchange="max_lenght(this)" placeholder="Digite apenas números (ex : 2 Days)"><span class="actual_delivery_days" id="main_delivery_days"> </span> 

								<small class="error_msg help-block main_delivery_days_error" style="display: none;">Por favor, adicione uma estimativa de tempo</small>

								<small class="error_msg help-block delivery_days_error" style="display: none;">Por favor, adicione entre 1 e 29</small>

								</div> -->

                                                  

								<div class="form-group clearfix">

									<label class="label-title">Categoria <span class="required">*</span></label>

									<div class="category-select">

									<select class="select gig-category" id="gig_category_id" name="gig_category_id">										

									<option value="">Selecione uma categoria</option>

									<?php foreach($categories_subcategories as $cat) { 

										if($cat['parent']==0){
									?>
										<option  class="category_main_menu" value="<?php echo $cat['ID']; ?>"> <?php echo $cat['DESCRICAO']; ?> </option>    

									<?php

									    	}

										}

									?>

									</select>	


									<small class="error_msg help-block gig_category_id_error" style="display: none;">Please select a category</small>

									</div>

								</div>

								<div class="form-group clearfix">

									<label class="label-title">Adicione Tag <span class="small-title">(separado por virgula)</span></label>

									<input type="text" placeholder="Adicionar tag" name="gig_tags" id="gig_tags" data-role="tagsinput" class="form-control">	

								</div>

								<div class="form-group add-image clearfix">

                                    <input type="hidden" name="image_array" id="image_array" value="" />

                                    <input type="hidden" name="image_div_id" id="image_div_id" value="1" />

                                    <input type="hidden" name="delete_image_array" id="delete_image_array" value="" />

                                    <input type="hidden" name="deleted_image_array" id="deleted_image_array" value=""  />

                                    <input type="hidden" name="video_array" id="video_array" value="" />

                                    <input type="hidden" name="video_div_id" id="video_div_id" value="1" />

									<label class="label-title">Envie Fotos ou vídeos <span class="text-muted" style="color:#999;">(jpg <span class="required">*</span>)</span></label>

									<div class="upload-block">

										<div class="photos-upload image_upload" id="upload_image_btn">	

												<div id="show_loader" style="display:none;">

                                                    <img src="<?php echo base_url().'assets/images/loader.gif'; ?>" >

												</div>

											<h4>Upload</h4>

											<p> Fotos</p>

										</div>

                                        <div class="photos-upload">

											<div id="video_show_loader" style="display: none;">

												<img src="<?php echo base_url().'assets/images/loader.gif'; ?>" >

											</div>

                                            <input class="gig-img-upload" id="video_files" name="gig_video" size="20" type="file">

											<h4>Upload </h4>

											<p> Videos </p>                                                                                            

                                        </div>  

										<div class="embedded" id="third_party">

											<h4>Copiar link</h4>

											<p>de sites de terceiros</p>

										</div>											 

									</div>

									<div class="embedded-url" style="display:none">

										<label class="label-title">Add Url</label>

										<input class="form-control" type="text">

									</div>

                                <small class="error_msg help-block pull-left" id="image_video_error_msg" ></small> 

								</div>

                                <div class="form-group clearfix uploaded-section" style="display: none"> </div> 

                                <small class="error_msg help-block image_error_error" style="display: none;">Please upload a file</small>



								<div class="form-group item-description clearfix">

									<label class="label-title">Detalhes <span class="required">*</span></label>

									<textarea rows="5" placeholder="Explain in more detail what exactly you will deliver to the Buyer..." name="gig_details" id="gig_details" class="form-control"></textarea>

									<?php echo display_ckeditor($ckeditor_editor); ?>

									<small  class="error_msg help-block" id="desc_err" ></small>

									<small class="error_msg help-block  gig_details_error" style="display: none;">Please enter about your gig details</small>

								</div>

								<div class="form-group clearfix" hidden="true">

									<label class="label-title">Ganhe dinheiro extra - ofereça serviços adicionais opcionais ao Comprador</label>

									<div class="add-more-items clearfix">

                                  	<input type="hidden" name="extra_gig_rate_symbol" id="extra_gig_rate_symbol" value="<?php echo $currency_sign; ?>"> 

                                    <div class="clearfix" id="row_id_1">

									<span class="close-offer"><i class="fa fa-times" onclick="remove_div(1);" aria-hidden="true"></i></span>

								<div class="name-block2">

									<span class="name-input2"><input type="text" name="extra_gigs[]" value="" id='label_name_1'  class="form-control extra_money_price gig-name gigs_name_opt" placeholder="Descrição"  date-no="1" ></span>

									<span class="currency">

									Por R <span class="currency-group">	                                                                                 

									<?php// echo $currency_sign; ?> 

									<input type="text" class="form-control amount numberonly" name="extra_gigs_amount[]" data-bv-field="extra_gigs_amount[]" <?php echo ($allow==1)?'':'readonly'; ?> onfocusout="inputfocusout(this)" id='label_val_1' value="<?php  echo $ex_price = ($allow==1)?'':$extra_gig_price ?>">

									<input type="hidden"  id="readonly_dynamic" value="<?php echo ($allow==1)?'':'readonly'; ?>"> 

									</span> em <input type="text"  value="1"  onkeyup="extra_gig_days(this,1)" onfocusout="inputfocusout(this)" class="form-control amount2 numberonly"  name="extra_gigs_delivery[]">

									<span class="sub_delivery_days">Dias</span></span>                                                

								</div>	

										</div> 



				<!-- <div id="add_extra_gig">

					<input type="hidden" name="table_content" id="table_content" value="2"> 

				</div>       -->

					<div class="add-more">	

						<a href="javascript:;" class="add-more-btn" onclick="add_extra_service();">+ Add more items</a>

					</div>

				</div>

				</div>

				<small class="error_msg help-block extra_gigs_validate" style="display: none;" >Please enter the price for extra gig</small>

				<small class="error_msg help-block extra_gigs_gig_name" style="display: none;" >Please enter the gig name </small>



				<div class="form-group clearfix" hidden="true">

                <label class="label-title">Entrega super rápida</label>

				<div class="delivery-block clearfix">                                                                                   

					<div class="checkbox checkbox-primary checkbox-inline pull-left">

						<!-- <input type="checkbox" name="super_fast_delivery" class="validdays" id="super_fast_delivery" value="yes" disabled="disabled" > -->

						<label for="super_fast_delivery">&nbsp; </label>

					</div>

					<span class="super-fast">Super rápido</span>

					

					<div class="name-block2 superfast-block">

					<span class="name-input2"><input name="super_fast_delivery_desc" id="super_fast_delivery_desc" value="" class="form-control gig-name" placeholder="Posso entregar" type="text" disabled="disabled"></span>

						<span class="currency">

					 <!-- por R <?php// echo $currency_sign; ?> <span class="currency-group"><input type="text" disabled="disabled" class="form-control validdays  amount numberonly" name="super_fast_charges" id="super_fast_charges" value="<?php echo ($allow==1)?'':$extra_gig_price; ?>" <?php echo ($allow==1)?'':''; ?> ></span> em <input type="text" value="1" onfocusout="inputfocusout(this)" onkeyup="extra_gig_days(this,2)" onmouseup="extra_gig_days(this,2)" class="form-control amount2 numberonly" name="super_fast_delivery_date" maxlength="2" id="super_fast_delivery_date" disabled="disabled" > -->

					 <span class="sub_delivery_days">Dias</span></span>                                             

					</div>	

					<div class="name-block3">                                               

					</div>	

				</div>

				<small class="error_msg" id="super_fast_delivery_time_error"> </small>

				<small class="error_msg help-block super_fast_error" style="display: none;" >Please enter a description</small>

				<small class="error_msg help-block super_fast_priece_error" style="display: none;" >Please enter a super fast price</small>

				</div>

								<div class="form-group select-condition clearfix" hidden="true">

									<label class="label-title">Como você planeja trabalhar com o comprador?<span class="required">*</span></label>

									<div class="buyer-option">

										<div class="radio radio-primary">

											<!-- <input type="radio" value="0" id="radio3" name="work_option"> -->

											<label for="radio3">

												Remoto

											</label>

										</div>

										<div class="radio radio-primary">

											<!-- <input type="radio"  value="1" id="radio4" name="work_option"> -->

											<label for="radio4">

												No local 

											</label>

										</div>

										<small class="error_msg help-block work_option_error" style="display: none;" >Please select any option</small>

									</div>

								</div>

								<div class="form-group item-description clearfix" hidden="true">

									<label class="label-title">O que você precisa do Comprador para começar</label>

                                     <!-- <textarea rows="4" placeholder="Explain what you will need from the Buyer to deliver the world..." name="requirements" id="requirements" class="form-control"></textarea> -->

                                     <?php //echo display_ckeditor($ckeditor_editor_one); ?>

								</div>

								<div class="form-group agreement clearfix">

									<div class="checkbox checkbox-primary checkbox-inline">

                                      <input type="checkbox" name="terms_conditions" id="terms_conditions" value="terms_conditions"  >

									<label for="terms_conditions">&nbsp; </label>

									</div>

									Confirmo que me responsabilizo pelas informações prestadas na plataforma e sobre qualquer pena de irregularidade tenho total responsabilidade. <span class="sitename2"><?php  if(!empty($site_name)) {echo  $site_name; } ?></span> and will

									entitle the Buyer to a refund. See <a href="<?php echo base_url().'tandc'?>" target="_blank" class="chk-link"> Termos e condições</a>

									<small class="error_msg help-block terms_conditions_error" style="display: none;">Please accept terms & conditions</small>

								</div>

								<input type="hidden" name="form_submit" value="add"> 

								<a href="javascript:void(0)" onclick="sell_services_add()" class="btn btn-yellow sell_service_submit"  >Publicar</a> 

                                

							</form>

						</div>

						<div class="col-md-4 hidden-xs hidden-sm">

							<div class="left-sidebar">	

								<div class="testimonials">	

									<p>"If people understood the banking system they would revolt."</p>

									<span class="client-name">Henry Ford</span>			

								</div>	

								<div class="daily-figures">	

									<span>.</span><br>

									<span><p class="figure-title">“Latest <br>Daily Figures”</p></span>

									<span>.</span><br>	

									<span><i class="fa fa-chevron-down"></i></span>	

								</div>

							</div>

						</div>

					</div>	

				</div>	

			</section>

<div class="modal fade" id="avatar-gig-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" data-backdrop="static" data-keyboard="false" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">   

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<h4 class="modal-title">Upload Image</h4>

                <span id="image_size" > Please Upload a Image of size above 680*460 </span> 

			</div>

			<div class="modal-body">

				<div id="gigimg_loader" class="loader-wrap" style="display: none;">

					<div class="loader">Loading...</div>

				</div>

				<div class="image-editor">

					<input type="hidden" name="select_row_id" id="select_row_id" value="1" />

					<input type="file" id="fileopen"  name="file" class="cropit-image-input">

					<span class="error_msg help-block" id="error_msg_model" ></span> 

					<div class="cropit-preview"></div>

					<div class="row resize-bottom">

						<div class="col-md-4">

							<div class="image-size-label">Resize image</div>

						</div>

						<div class="col-md-4"><input type="range" class="custom cropit-image-zoom-input"></div>

						<div class="col-md-4 text-right"><button class="btn btn-primary export">Done</button></div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>



<div class="modal custom-popup fade" id="third-party-gig-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" data-backdrop="static" data-keyboard="false" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">   

			<div class="modal-header text-center">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<h5 class="modal-title"> Upload Video Link </h5>

			</div>

			<div class="modal-body">

				<div class="form-group">

					<label> Youtube Link : </label>	 <input type="url" name="" class="form-control" id="youtube_url_link" value="" />

					<span id ="error_youtube_link" class="error_msg" >  </span>

				</div>

				<div class="form-group">

					<label> Vimeo 	Link : </label>	 <input type="url" name="" class="form-control" id="vimeo_url_link"  value="" />

					<span id ="error_vimeo_link" class="error_msg" >  </span>

				</div>   

                 <button type="button" class="btn btn-primary logon-btn" id="third_party_videos" value="submit" >Submit</button>

			</div>

		</div>

	</div>

</div>





<div class="extra_gig_content" style="display: none;">

<div class='clearfix extra-gig-option' id='row_id_#' >

	<span class='close-offer'><i class='fa fa-times' aria-hidden='true' onclick='remove_div(#);' ></i></span>

    <div class='name-block2'>

        <span class='name-input2'>

        	<!-- <input type='text' name='extra_gigs[]' value='' class='form-control extra_money_price gig-name gigs_name_opt' date-no="#" id='label_name_#' placeholder='I can'></span> -->

        <span class='currency'>for 
        	<span class='currency-group'><?php echo $currency_sign; ?> 
        	<!-- <input type='text' class='form-control amount numberonly' name='extra_gigs_amount[]' data-bv-field='extra_gigs_amount[]' onfocusout="inputfocusout(this)" <?php // echo ($allow==1)?'':'readonly'; ?> id='label_val_#' value='<?php //echo $ex_price; ?>'> -->
        </span> in 
        <!-- <input type='text'   class='form-control amount2 numberonly addmore' value='1' onkeypress='return event.charCode >= 48 && event.charCode <= 57'  onkeyup='extra_gig_days(this,1)'  onfocusout='inputfocusout(this)' onmouseup='extra_gig_days(this,1)'  name='extra_gigs_delivery[]'> -->

        <span class='sub_delivery_days'>Day</span></span>

	</div>	

</div>	

</div>	