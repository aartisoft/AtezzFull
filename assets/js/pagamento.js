$(document).ready(function () {

    $(".pagamento").click(function () {
        var plano = $(this).attr("data-plano");
        $("#modal").load("/user/pagamento_service/index/" + plano, function () {
            $("#modal").modal();
        })
    });
       
});


function Load(token){
    PagSeguroDirectPayment.setSessionId(token);
    var data = new Date();
    var validade = $("input#validade").val().split('/');
    var mes = validade[0];
    var ano = data.getFullYear().toString().substr(0,2) + validade[1];
    var param = {
        cardNumber: $("input#cartao").val(),
        cvv: $("input#cvv").val(),
        expirationMonth: mes,
        expirationYear: ano,
        success: function(response) {
            $('#token').val(response.card.token);
        }							
    };
    PagSeguroDirectPayment.createCardToken(param);
}

function validarPagamento()
{
    $('#moduloPagamento').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        live: 'enabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        submitButtons: ".finalizar",
        fields: {
            instituicoes: {
                validators: {
                    notEmpty: {
                        message: 'Selecione Uma Instituição.'
                    }
                }
            },
            porcentagem: {
                validators: {
                    notEmpty: {
                        message: 'Selecione Uma Porcentagem.'
                    }
                }
            },
            cep: {
                validators: {
                    notEmpty: {
                        message: 'CEP é um campo Obrigatório.'
                    },
                    stringLength: {
                        min: 9,
                        max: 9,
                        message: 'CEP deve conter 9 caracteres.'
                    }                   
                }
            },
            endereco: {
                validators: {
                    notEmpty: {
                        message: 'Endereço é um campo Obrigatório.'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'Endereço deve conter até 100 caracteres.'
                    }   
                }
            },
            numero: {
                validators: {
                    notEmpty: {
                        message: 'Número é um campo Obrigatório.'
                    },
                    integer: {
                        message: 'Valor deve ser um número.'
                    }
                }
            },
            bairro: {
                validators: {
                    notEmpty: {
                        message: 'Bairro é um campo Obrigatório.'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'Bairro deve conter até 30 caracteres.'
                    }   
                }
            },
            cidade: {
                validators: {
                    notEmpty: {
                        message: 'Cidade é um campo Obrigatório.'
                    },
                    stringLength: {
                        min: 1,
                        max: 20,
                        message: 'Cidade deve conter até 20 caracteres.'
                    }   
                }
            },
            estado: {
                validators: {
                    notEmpty: {
                        message: 'Estado é um campo Obrigatório.'
                    },
                    stringLength: {
                        min: 1,
                        max: 2,
                        message: 'Estado deve conter até 2 caracteres.'
                    }   
                }
            },
            cartao: {
                validators: {
                    notEmpty: {
                        message: 'Cartão é um campo Obrigatório.'
                    },
                    integer: {
                        message: 'Cartão deve conter apenas número.'
                    },
                    stringLength: {
                        min: 16,
                        max: 16,
                        message: 'Cartão deve conter 16 caracteres.'
                    }                       
                }
            },
            cvv: {
                validators: {
                    notEmpty: {
                        message: 'CVV é um campo Obrigatório.'
                    },
                    integer: {
                        message: 'CVV deve conter apenas número.'
                    },
                    stringLength: {
                        min: 3,
                        max: 3,
                        message: 'Cartão deve conter 3 caracteres.'
                    }                       
                }
            },
            validade: {
                validators: {
                    notEmpty: {
                        message: 'Validade é um campo Obrigatório!'
                    },
                    stringLength: {
                        min: 3,
                        max: 5,
                        message: 'Validade deve conter 5 caracteres.'
                    } 
                }
            },
            nome_cartao: {
                validators: {
                    notEmpty: {
                        message: 'Nome é um campo Obrigatório!'
                    },
                    stringLength: {
                        min: 3,
                        max: 50,
                        message: 'Nome deve conter até 50 caracteres.'
                    } 
                }
            },
            cpf: {
                validators: {
                    notEmpty: {
                        message: 'CPF é um campo Obrigatório!'
                    },
                    stringLength: {
                        min: 14,
                        max: 14,
                        message: 'CPF deve conter 14 caracteres.'
                    } 
                }
            },    
            nascimento: {
                validators: {
                    notEmpty: {
                        message: 'Nascimento é um campo Obrigatório!'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Nascimento deve conter 10 caracteres.'
                    } 
                }
            },    
            telefone: {
                validators: {
                    notEmpty: {
                        message: 'Telefone é um campo Obrigatório!'
                    },
                    stringLength: {
                        min: 14,
                        max: 15,
                        message: 'Telefone deve conter entre 14 e 15 caracteres.'
                    } 
                }
            }                                                                                              
        }
    }); 
}


function carregarPanel(btn,count){
	page = parseInt($('#pagePanel').val());
    pageNew = page + count;
    voltar = count == -1 ? true : false;
	if(pageNew >= 1 && pageNew <= 3){
		if(voltar || validarPagamentoStep(page)){
            hiddenButton(pageNew);
			$('#step' + page).removeClass("in active");	
			$('#step' + pageNew).addClass("in active");
			$('#pagePanel').val(pageNew);
		}
    }
    $(btn).blur();
	return false;
}

function hiddenButton(pageNew){
    if(pageNew == 1){
        $('#voltar').removeClass("block");
        $('#voltar').addClass("hidden");
        $('#continuar').removeClass("hidden");
        $('#continuar').addClass("block");	        	
    }
    else if(pageNew == 2){
        $('#voltar').removeClass("hidden");
        $('#voltar').addClass("block");
        $('#continuar').removeClass("hidden");
        $('#continuar').addClass("block");	              
    }
    else if(pageNew == 3){
        $('#voltar').removeClass("hidden");
        $('#voltar').addClass("block");
        $('#continuar').removeClass("block");
        $('#continuar').addClass("hidden");	          	     
    }    

}


function validarPagamentoStep(step){
	retorno = true;
	if(step == 1){
        if(
            $('#instituicoes').val() == '' || 
            $('#porcentagem').val() == ''
        ){
            alert("Preencha os campos com * para ir para o próximo passo.");
            return false;
        }
        else($('#cupom_desconto').val() != '')
        {
            $.post(
                "/user/pagamento_service/cupom",
                {
                    instituicoes: $('#instituicoes').val(),
                    porcentagem: $('#porcentagem').val(),
                    cupom: $('#cupom_desconto').val()
                },
                function(result){
                    if(result==''){
                        window.location.href = '/payment-settings';
                    }
                    else{
                        alert(result);
                    }
                }
            );
            return false;
        }
		return retorno;
	}
	else if(step == 2){
        if(
            $('#cep').val() == '' || 
            $('#endereco').val() == '' ||
            $('#numero').val() == '' || 
            $('#bairro').val() == '' || 
            $('#cidade').val() == '' || 
            $('#estado').val() == ''
        ){
            alert("Preencha os campos com * para ir para o próximo passo.");
            return false;
        }        
		return retorno;
	}
	else if(step == 3){
		return retorno;
	}
	else
		return false;
}