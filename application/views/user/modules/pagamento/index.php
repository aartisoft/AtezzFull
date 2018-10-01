<style>
	#tab-menu{
		background: #FFF;
		padding: 10px;
	}
</style>

<div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-body">
			<button type="button" id="remove_popuptop_provider" class="close" data-dismiss="modal">&times;</button>		
			<div id="register_errtext"></div>
			
			<form id="moduloPagamento" method="post" action="<?php echo base_url().'user/Pagamento_Service/pagamento/'; ?>" class="form-horizontal">
				<span id="register_success_provider"> </span>

				<div class="col-lg-12" align="center" style="margin: 0px 0px 20px 0px;">

					<h2><b>Conta Premium Atezz</b></h2> 
					<p class="member-text">Seja um prestador Atezz e conquiste ainda mais clientes. </p><br/>
					<table class="table">
						<tr>
							<th> Plano <th>
							<th> Valor <th>
						</tr>
						<tr>
							<td> <?php echo $plano['nome']; ?> <td>
							<td> R$ <?php echo number_format($plano['preco'], 2, ',', '.'); ?> <td>
						</tr>						
					</table>
				</div>
				<div style="clear:both"></div>

				<div id="tab-menu" class="tab-content">
					<div id="step1" class="tab-pane fade in active">				
						<fieldset>
							<legend>Informações do Plano:</legend>

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Instituição que apoiarei* </label>
								<div class="col-lg-6">
									<select name="instituicoes" id="instituicoes" class="form-control">
										<option value="">Selecionar..</option>
										<option value="0">Lar dos Idosos - Maria de Fátima</option>
										<option value="1"> Sopão da madrugada</option>
										<option value="2">Resgate amigo - Pets</option>
										<option value="3">Orfanato Joãozinho</option>
										<option value="4">AACD São Paulo</option>
									</select>
								</div>
							</div>	

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Porcentagem que será doado* </label>
								<div class="col-lg-6">
									<select name="porcentagem" id="porcentagem" class="form-control">
										<option value="">Selecionar..</option>
										<option value="5">5%</option>
										<option value="10">10%</option>
										<option value="15">15%</option>
										<option value="20">20%</option>
										<option value="30">30% ou mais..</option>

									</select>

								</div>
							</div>								
							
							<div class="form-group">
								<label class="col-lg-4 col-form-label">Cupom de Desconto </label>
								<div class="col-lg-6">
									<input type="text" value=""  placeholder="" id="cupom_desconto" name='cupom_desconto' class="form-control">
								</div>
							</div>
							
						</fieldset>
					</div>
					<div id="step2" class="tab-pane fade">					
						<fieldset>
							<legend>Endereço de Pagamento:</legend>

							<div class="form-group">
								<label class="col-lg-4 col-form-label">CEP*</label>
								<div class="col-lg-6">
									<input id="cep" name='cep' class="form-control cep">
								</div>
							</div>	

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Endereço*</label>
								<div class="col-lg-6">
									<input id="endereco" name='endereco' class="form-control">
								</div>
							</div>	

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Numero*</label>
								<div class="col-lg-3">
									<input id="numero" name='numero' class="form-control">
								</div>
							</div>	

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Complemento</label>
								<div class="col-lg-6">
									<input id="complemento" name='complemento' class="form-control">
								</div>
							</div>	

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Bairro*</label>
								<div class="col-lg-6">
									<input id="bairro" name='bairro' class="form-control">
								</div>
							</div>	

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Cidade*</label>
								<div class="col-lg-6">
									<input id="cidade" name='cidade' class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Estado*</label>
								<div class="col-lg-6">
									<select name="estado" id="estado" class="form-control">
										<option value="">Selecionar..</option>
										<option value="AC">AC</option>
										<option value="AL">AL</option>
										<option value="AM">AM</option>
										<option value="AP">AP</option>
										<option value="BA">BA</option>
										<option value="CE">CE</option>
										<option value="DF">DF</option>
										<option value="ES">ES</option>
										<option value="GO">GO</option>
										<option value="MA">MA</option>
										<option value="MT">MT</option>
										<option value="MS">MS</option>
										<option value="MG">MG</option>
										<option value="PA">PA</option>
										<option value="PB">PB</option>
										<option value="PR">PR</option>
										<option value="PR">PR</option>
										<option value="PI">PI</option>
										<option value="RJ">RJ</option>
										<option value="RN">RN</option> 
										<option value="RO">RO</option>
										<option value="RS">RS</option>
										<option value="RR">RR</option>
										<option value="SC">SC</option>
										<option value="SE">SE</option>
										<option value="SP">SP</option>
										<option value="TO">TO</option>
									</select>
								</div>
							</div>							
																											
						</fieldset>																
					</div>
					<div id="step3" class="tab-pane fade">					
						<fieldset>
							<legend>Dados do Pagamento:</legend>

							<div class="form-group">
								<label class="col-lg-4 col-form-label">Cartão*</label>
								<div class="col-lg-6">
									<input id="cartao" name='cartao' value="4111111111111111" onchange="Load('<?php  echo $tokenSecao ?>');" class="form-control">
								</div>
							</div>	

							<div class="form-group">
								<label class="col-lg-4 col-form-label">CVV*</label>
								<div class="col-lg-3">
									<input id="cvv" name='cvv' value="" onchange="Load('<?php  echo $tokenSecao ?>');" class="form-control">
								</div>
							</div>	
							<div class="form-group">
								<label class="col-lg-4 col-form-label">Validade*</label>
								<div class="col-lg-3">
									<input id="validade" name='validade' value='12/30' onchange="Load('<?php  echo $tokenSecao ?>');" class="form-control validade">
								</div>
							</div>	
							<div class="form-group">
								<label class="col-lg-4 col-form-label">Nome (igual ao cartão)*</label>
								<div class="col-lg-6">
									<input id="nome_cartao" name='nome_cartao' class="form-control">
								</div>
							</div>	
							<div class="form-group">
								<label class="col-lg-4 col-form-label">CPF*</label>
								<div class="col-lg-6">
									<input id="cpf" name='cpf' class="form-control cpf">
								</div>
							</div>	
							<div class="form-group">
								<label class="col-lg-4 col-form-label">Nascimento*</label>
								<div class="col-lg-6">
									<input id="nascimento" name='nascimento' class="form-control data">
								</div>
							</div>		
							<div class="form-group">
								<label class="col-lg-4 col-form-label">Telefone*</label>
								<div class="col-lg-6">
									<input id="telefone" name='telefone' class="form-control telefone">
								</div>
							</div>														
							<div class="form-group">
								<div class="col-lg-12">
									<div class="terms-text text-center">
										Leia o <a href="<?php echo base_url().'terms';?>" target="_blank"> Termos e condições ATezz</a>.    <br/>           
									</div>		
								</div>										
							</div>
							<div class="form-group">
								<input type="hidden" name="token" id="token">
								<input type="hidden" name="plano" id="plano" value=<?php echo $plano['id']; ?> >	
								<input type="hidden" name="planCode" id="planCode" value=<?php echo $plano['chave']; ?> >						
								<div class="col-lg-12 text-center"><button name="form_submit" type="submit" class="btn btn-primary finalizar">Continuar para Pagamento</button></div>
							</div>																						
						</fieldset>																
					</div>					
				</div>
				<input type="hidden" id="pagePanel" value="1" disabled>

				<button id="voltar" class="btn btn-default hidden" onclick="return carregarPanel(this,-1);">Voltar</button>
				<button id="continuar" class="btn btn-primary block continuar" onclick="return carregarPanel(this,1);">Continuar</button>						
			</form>
		</div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>
	validarPagamento();

    $('#cep').change(function (e) {

		$('#endereco').val('');
		$('#numero').val('');
		$('#complemento').val('');
		$('#bairro').val('');
		$('#cidade').val('');
		$('#estado').val('');

		var cep = $('#cep').val().replace("-", "")

		$.getJSON("http://cep.republicavirtual.com.br/web_cep.php?cep=" + cep + "&formato=json",{}, function (data) {
			if (data.resultado_txt == "sucesso - cep completo")
			{
				$('#endereco').val(data.tipo_logradouro + ' ' + data.logradouro);
				$('#bairro').val(data.bairro);
				$('#cidade').val(data.cidade);
				$('#estado').val(data.uf);
			}
		});	

	});	

	$(".validade").mask("99/99", { placeholder: "__/__" });
	$(".data").mask("99/99/9999", { placeholder: "__/__/____" });
	//$(".rg").mask("99.999.999-*");
	$(".cep").mask("99999-999", { placeholder: "___-____" });
	$(".cpf").mask("999.999.999-99", { placeholder: "___.___.___-__" });
	var SPMaskBehavior = function (val) {
	return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	};

	spOptions = {
	onKeyPress: function (val, e, field, options) {
		field.mask(SPMaskBehavior.apply({}, arguments), options);
	},
	placeholder: "(__) ____-____"
	};
	$('.telefone').mask(SPMaskBehavior, spOptions);		
</script>