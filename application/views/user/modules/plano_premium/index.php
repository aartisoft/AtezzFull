
			<!--TITULO DE DESTAQUE -->
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


				<div class="row">
						<div class="col-md-12" style="text-align: center; margin-top: 30px; font-size: 15pt;">
							<h2><b>Contrate o seu Plano</b></h2><br/>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam viverra scelerisque nisl, vel dignissim risus imperdiet non. Donec at quam augue. Maecenas vel purus ut mi accumsan fringilla non ut dolor. Nam accumsan, diam eleifend commodo placerat, justo dui dapibus nunc, ac imperdiet orci nisi sed tortor.</p> <br/>
						</div>		
				</div>

				<div class="row">
						
						<?php $i= 1; foreach($list_plans as $item ){ $cifrao = 'R$';?>

							<div class="col-md-4">
							
								<h2 align="center"> <?php echo $item['title']; ?></h2>
								<h1 align="center"><?php echo $cifrao ?> <?php echo $item['price'];?></h1>
								<p align="center"><?php echo $item['description']; ?></p>							


								<?php 
								if(empty($verify_user_premium)){ ?> 

								<a href="javascript:;"  data-toggle="modal" data-target="#login-popup">
									<button type="button" class="btn btn-primary btn-plano" id="<?php echo 'plano-'.$i ;?>">
											Contratar Plano
									</button>
								</a>	

								<?php } else {?>	

								<div id="<?php echo 'plano-'.$i ;?>">
									<button type="button" class="btn btn-primary pagamento" data-plano="<?php echo $i ;?>">
										Contratar Plano
									</button>										
								</div>	

							 	<?php }?>										

							</div>

						<?php $i = $i+1; }?>

				</div>

				<div class="row list-beneficio">

							<div class="col-md-4">
								<table>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste  </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste  </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste  </td></tr>
										<tr><td> <span class="glyphicon glyphicon-remove text-danger"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-remove text-danger"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-remove text-danger"> </span> teste </td></tr>
								</table>
							</div>

							<div class="col-md-4">
								<table>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-remove text-danger"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-remove text-danger"> </span> teste </td></tr>
								</table>
							</div>

							<div class="col-md-4">
								<table>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
										<tr><td> <span class="glyphicon glyphicon-ok text-success"> </span> teste </td></tr>
								</table>								
							</div>														

				</div>				
				<br/><br/><br/><br/>

			</section>
			<div class="modal" id="modal"></div>					
			<script type="text/javascript">
				
					function checkbox(child) {
					    var parent = child.parentElement || child.parentNode;
					    var id_plano = parent.getAttribute('id');
					    
					    if(id_plano == "plano-1")
					    {
					    	document.getElementById("txtP").innerHTML=  "MENSAL";
					    }
					    else if(id_plano == "plano-2")
					   	{
					   		document.getElementById("txtP").innerHTML=  "TRIMESTRAL";
						}
					    else
					    {
					    	document.getElementById("txtP").innerHTML=  "SEMESTRAL";
					    }
					}

			</script>


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