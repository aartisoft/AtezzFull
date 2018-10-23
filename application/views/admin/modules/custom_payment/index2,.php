<div class="content-page">
	<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
	<script type="text/javascript">
		PagSeguroDirectPayment.setSessionId('<?php  echo $tokenSecao ?>');
		function Load(){
			PagSeguroDirectPayment.getBrand({
			cardBin: $('#cartao').val(),
				success:  function(response) {
					$('#bandeira').val(response.brand.name);
				},
			});
			var param = {
				cardNumber: $("input#cartao").val(),
				cvv: $("input#cvv").val(),
				expirationMonth: $("input#validadeMes").val(),
				expirationYear: $("input#validadeAno").val(),
				success: function(response) {
					$('#token').val(response.card.token);
				}							
			};
			PagSeguroDirectPayment.createCardToken(param);
		}
	</script>

	<div class="content">

		<div class="container">

			<div class="row">

				<?php if($this->session->flashdata('message')) { ?>
					<?php echo $this->session->userdata('message');?>
				<?php }	?>  
				<div id="register_errtext"></div>
				<form id="provider_register" method="post" action="<?php echo base_url().'admin/custom_payment/pagamento'; ?>" class="form-horizontal">
					<span id="register_success_provider"> </span>
					token<br>
					<input name="token" id="token" type="text" ><br>
					cartao<br>
					<input name="cartao" value="4111111111111111" id="cartao" type="text" ><br>
					bandeira<br>
					<input name="bandeira" id="bandeira" type="text" ><br>
					cvv<br>
					<input name="cvv" value="123" id="cvv" type="text" >					
					validademes<br>
					<input name="validadeMes" value="12" id="validadeMes" type="text" >
					validadeAno<br>
					<input name="validadeAno" value="2030" id="validadeAno" type="text" >

					<div class="form-group">							
						<div class="col-lg-12 text-center"><button type="submit" class="btn btn-primary logon-btn" id="registers_provider">Confirmar</button></div>
					</div>
				</form>
				<!-- END POP-UP REGISTER PROVIDER -->

			</div>

		</div>

	</div>

</div>
