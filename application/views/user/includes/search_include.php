<div class="search-area location-search" id="mobile_only_nav">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<div class="search-box">
					<h2>Pesquisar Serviço</h2>
					<form class="search_form" action="<?php echo base_url()."search"; ?>" method="post">

						 	<span class="search-input">

						 	<input type="hidden" name="selected_category" id="selected_category" value="">

						<?php 			 									 

						if((!isset($searched_value)))

						{							

							 $searched_value = ''; 							 

						}

						if(isset($searched_value)&&$searched_value==0)

						{							

							 $searched_value = ''; 							 

						}

						if(!isset($selected_category_value)){ $selected_category_value = ''; } 					
						$common_search = (!empty($_POST['common_search']))?$_POST['common_search']:''; 
						 ?>
						 	<input style="font-family: helvetica; font-size: 15px; color: #595959" class="text form-control" name="common_search" id="common_search" type="text" value="<?php echo $searched_value; ?>" placeholder="Buscar por Serviço"/>



						 	</span>

						 	<span class="search-category ">

						 		<select class="select form-control form-control-lg" id="changecatetext" name="search_category" style="height:39px;">
								<option value="">Categoria</option>
								<?php 

																                                                                                   

								foreach($categories_subcategories as $cat)

								{ 

									if($cat['parent']==0)

									{

										$query  = $this->db->query("SELECT `CATID` , `name` FROM `categories` WHERE `parent` = ". $cat['CATID']." and status=0 and delete_sts = 0");

										$result = $query->result_array(); 

										$result_count = $query->num_rows();

									?>

									<option class="category_main_menu" value="<?php echo $cat['CATID']; ?>" 

									<?php if($cat['CATID']==$selected_category_value){ echo "selected";} ?> > <?php echo $cat['name']; ?> </option>    

									<?php 

										if($result_count>0)

										{

											foreach($result as $sub_category_list)

											{ ?>

												<option class="sub_category_menu" value="<?php echo $sub_category_list['CATID']; ?>"

                                       <?php if($sub_category_list['CATID']==$selected_category_value){ echo "selected";} ?>> <?php echo $sub_category_list['name']; ?> </option>    

									<?php   }

										}

									}

								}

								?>

							</select>

						 	</span>

						 	

						 	<div class="search-country" hidden="true" >

								<select hidden="true" class="country select form-control" id="country" onload="country_id_chnage(this)" name="change_country">

									<option value=30  selected>Brasil</option>
								</select>
						 	</div>

							 <div class="search-country" style="width:30,5% !important; margin-top: 6px; margin-letf: 10px !important;">
							 <select class="state select form-control" id="uf"  data-target="#cidade" onloader="country_id_chnage(30)" name="uf"> <!--name="state" id="search_state" -->
										<option value="">--Estado--</option>
										<?php 

										if(!empty($gigs_state)){

											foreach($gigs_state as $state){

												$selected  = ($gigs_state_id==$state['id'])?'selected':'';

												echo '<option value="'.$state['id'].'" '.$selected.' >'.$state['state'].'</option>';		

											}

										}

										?>
								</select>	
							
							</div>

						 	<div class="search-state" style="margin-top: 5px; margin-letf: -1px;">

								<select class="cidade select form-control" id="cidade"  onloader="country_id_chnage(30)" name="cidade"> <!-- -->
									<option value="">--Cidade--</option>
									<?php 

									if(!empty($gigs_state)){

										foreach($gigs_state as $state){

											$selected  = ($gigs_state_id==$state['id'])?'selected':'';

											echo '<option value="'.$state['id'].'" '.$selected.' >'.$state['state'].'</option>';		

										}

									}

									?>

								</select>				 		

						 	</div>


						 	<span class="search-btn" >
						 		<button type="submit" name="search_submit" value="search" class="btn btn-primary btn-block search_btn" style="width:100px; font-family:helvetica; font-size:15px; margin-tpo:50px" >Pesquisar</button>	
						 	</span>

						

						

					</form>

				</div>

			</div>

		</div>

	</div>

</div>