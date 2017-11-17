$().ready(function() {
	// Validação de formulário de adicionar e editar produtos
	$("#frmPessoa").validate({
		
		rules: {
			"txtNome": { required: true},
			"cboVinculo": { required: true },
			"cboCadastrados": { required: true },
			"txtRG": { required: true },
			"txtCPF": { required: true },
			"cboDia": { required: true },
			"cboMes": { required: true },
			"cboAno": { required: true },
			"txtEmail": { required: false,
							email: true}
		},
		messages: {
			"txtNome": "Preencha o campo Nome",
			"cboVinculo": "Escolha o v&iacute;nculo",
			"cboCadastrados": "Escolha o cadastro",
			"cboDia": "Escolha o Dia",
			"cboMes": "Escolha o M&ecirc;s",
			"cboAno": "Escolha o Ano",
			"txtCPF": "Preencha o campo CPF",
			"txtRG": "Preencha o campo RG",
			"txtEmail": "Preencha o campo Email"
		}
	});
	
	$("#cmdSalvarPessoa").click(function(){
	    if($("#frmPessoa").valid()){ 
	    	submit();	
	    }
	    
	});
	
	$("#frmVoluntario").validate({
		rules: {
			"txtNome": { required: true},
			"txtSobrenome": { required: true },
			"cboSexo": { required: true },
			"cboDia": { required: true },
			"cboMes": { required: true },
			"cboAno": { required: true },
			"txtCPF": { required: true },
			"txtRG": { required: true },
			"txtCEP": { required: true },
			"txtRua": { required: true },
			"txtNumero": { required: true },
			"txtBairro": { required: true },
			"txtCidade": { required: true },
			"txtFuncao": { required: true },
			"txtOrgao": { required: true },
			"txtEmail1": { required: false,
							email: true}
		},
		messages: {
			"txtNome": "Preencha o campo Nome",
			"txtSobrenome": "Preencha o campo &Uacute;ltimo Nome",
			"cboSexo": "Escolha o Sexo",
			"cboDia": "Escolha o Dia",
			"cboMes": "Escolha o M&ecirc;s",
			"cboAno": "Escolha o Ano",
			"txtCPF": "Preencha o campo CPF",
			"txtRG": "Preencha o campo RG",
			"txtCEP": "Preencha o campo CEP",
			"txtRua": "Preencha o campo Rua",
			"txtNumero": "Preencha o campo N&uacute;mero",
			"txtBairro": "Preencha o campo Bairro",
			"txtCidade": "Preencha o campo Cidade",
			"txtFuncao": "Preencha o campo Fun&ccedil;&atilde;o",
			"txtOrgao": "Preencha o campo &Oacute;rg&atilde;o",
			"txtEmail1": "Preencha o campo Email"
		}
	});
	
	$("#cmdSalvarVoluntario").click(function(){
	    if($("#frmVoluntario").valid()){
	    	submit();	
	    }
	    
	});
	
	$("#frmfrmSubstituicao").validate({
		rules: {
			"cboSegmento": { required: true},
			"cboSuplente": { required: true },
			"cboDelegado": { required: true }
		},
		messages: {
			"cboSegmento": "Escolha o Segmento",
			"cboSuplente": "Escolha o Suplente",
			"cboDelegado": "Escolha o Delegado"
		}
	});
	
	$("#cmdSalvarSubstituicao").click(function(){
	    if($("#frmSubstituicao").valid()){
	    	submit();	
	    }
	    
	});
});
