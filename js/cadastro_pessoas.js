  $(document).ready(function(){
                //Preenche os campos na a&#231;&#227;o "Blur" (mudar de campo)
                $("#buscaCEP").click(function(){
					
                	document.getElementById('loading').innerHTML = "<img src='images/loading.gif'>";
                	
        			cep = $("#txtCEP").val()

        			 //$.getScript("http://www.toolsweb.com.br/webservice/clienteWebService.php?cep="+cep+"&formato=javascript", function(){
               		 //$.getScript("http://correiosapi.apphb.com/cep/"+consulta, function(){
               		 $.getScript("http://cep.republicavirtual.com.br/web_cep.php?cep="+cep+"&formato=javascript", function(){
               			 
                        //unescape - Decodifica uma string codificada com o m&#233;todo escape.
                        rua=unescape(resultadoCEP.tipo_logradouro) + " " + unescape(resultadoCEP.logradouro)
                        bairro=unescape(resultadoCEP.bairro)
                        cidade=unescape(resultadoCEP.cidade)
                        uf=unescape(resultadoCEP.uf)
                        
                        // preenche os campos
                        $("#txtRua").val(rua)
                        $("#txtBairro").val(bairro)
                        $("#txtCidade").val(cidade)
                        $("#cboUF").val(uf)

                        document.getElementById('loading').innerHTML = "";

                        });
              		
                });
                
                $(".cb-enable").click(function(){
        			var parent = $(this).parents('.switch');
        			$('.cb-disable',parent).removeClass('selected');
        			$(this).addClass('selected');
        			$('.checkbox',parent).attr('checked', true);
        			esconder($('.checkbox',parent).attr('name'));
        		});
                
        		$(".cb-disable").click(function(){
        			var parent = $(this).parents('.switch');
        			$('.cb-enable',parent).removeClass('selected');
        			$(this).addClass('selected');
        			$('.checkbox',parent).attr('checked', false);
        			esconder($('.checkbox',parent).attr('name'));
        		});
        		
        		
        		
    });
   

function iniciar(){

	comboDataNasc();
	
	

	if (varXML != null) {
		CarregaCampos(varXML);
	}
}


function comboDataNasc() {
	
	for ( var int = 1; int <= 31; int++) {
		document.getElementById("cboDia")[int-1] = new Option(int, int);
	}
	
	for ( var int = 1; int <= 12; int++) {
		document.getElementById("cboMes")[int-1] = new Option(int, int);
	}
	
	var cont=0;
	hoje = new Date();
	ano = hoje.getFullYear();
	
	for ( var int = ano-16; int >= 1930; int--) {
		document.getElementById("cboAno")[cont] = new Option(int, int);
		cont++;
	}
}



function validar(){
	
	var cpf = document.getElementById("txtCPF").value;
	
	//Testa CPF v�lido
	if (cpf.length > 0 && cpf.length < 12) {
		if (testaCPF(cpf)==false) {
			alert(unescape("Preencha um CPF v%E1lido!"));
			return false;
		}
	}
		
	//Verifica CPF Duplicado
	/*var varXML = chamar_ajax('../php/sql.php', 'filtro=VerificaCPFDuplicado&cpf=' + cpf, false, 'xml', null);
	if (valor_xml(varXML, 'n_reg', 0)>0) {
		alert("O CPF digitado j� foi cadastrado!");
		return false;
	}*/
	
	
	return true;
	
}

function submit() {
	
	//Valida��o OK - Inserindo no banco
	if (validar()) {
		frmPessoa.submit();
		
	}
	
}

function CarregaCampos(varXML) {
	
	document.getElementById('txtID').value = valor_xml(varXML,'id_filiado', 0);
	document.getElementById('txtNome').value = valor_xml(varXML,'nome', 0);
	document.getElementById('cboDia').value = valor_xml(varXML,'data_nascimento', 0).substr(0,2);
	document.getElementById('cboMes').value = valor_xml(varXML,'data_nascimento', 0).substr(3,2);
	document.getElementById('cboAno').value = valor_xml(varXML,'data_nascimento', 0).substr(6,4);
	document.getElementById('cboVinculo').value = valor_xml(varXML, 'id_vinculo_filiado', 0);
	document.getElementById('txtRG').value = valor_xml(varXML, 'rg',	0);
	document.getElementById('txtCPF').value = valor_xml(varXML,'cpf', 0);
	document.getElementById('txtCEP').value = valor_xml(varXML,'cep', 0);
	document.getElementById('txtRua').value = valor_xml(varXML,'rua', 0);
	document.getElementById('cboTipo').value = valor_xml(varXML,'tipo', 0);
	document.getElementById('txtNumero').value = valor_xml(varXML,'numero', 0);
	document.getElementById('txtComplemento').value = valor_xml(varXML,'complemento', 0);
	document.getElementById('txtBairro').value = valor_xml(varXML,'bairro', 0);
	document.getElementById('txtCidade').value = valor_xml(varXML,'cidade', 0);
	document.getElementById('cboUF').value = valor_xml(varXML,'estado', 0);
	document.getElementById('cboRegiao').value = valor_xml(varXML,'macro_regiao', 0);
	document.getElementById('txtFone').value = valor_xml(varXML,'telefone_residencial', 0);
	document.getElementById('txtComercial').value = valor_xml(varXML,'telefone_comercial', 0);
	document.getElementById('txtCelular').value = valor_xml(varXML,'celular', 0);
	document.getElementById('txtEmpresa').value = valor_xml(varXML,'empresa', 0);
	document.getElementById('txtEmail').value = valor_xml(varXML,'email', 0);
	document.getElementById('txtFacebook').value = valor_xml(varXML,'facebook', 0);
	document.getElementById('txtTwiter').value = valor_xml(varXML,'twiter', 0);
	document.getElementById('txtTitulo').value = valor_xml(varXML,'titulo_eleitor', 0);
	document.getElementById('txtZona').value = valor_xml(varXML,'zona', 0);
	document.getElementById('txtSecao').value = valor_xml(varXML,'secao', 0);
	
	if (valor_xml(varXML,'part_movimento', 0)!="") {
		document.getElementById('chkMovimento').checked = true;
		document.getElementById('txtQual').value = valor_xml(varXML,'part_movimento', 0);
	}
	$("#chkMovimento").change();
	
	if (valor_xml(varXML,'id_partido', 0)!="") {
		document.getElementById('chkFiliado').checked = true;
		document.getElementById('cboPartido').value = valor_xml(varXML,'id_partido', 0);
	}
	$("#chkFiliado").change();
	
}