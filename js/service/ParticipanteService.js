/**
 * 
 */
var ParticipanteService = function() {

	this.salvar = function(paticipante) {
		var email = paticipante.email;
		var endereco = paticipante.endereco;
		var cargo = paticipante.cargo;
		var tipoEmail = email.tipoEmail;
		var uf = endereco.uf
		var caminho = "/cadastro/participante/salvar"
		var dados = {
			"email" : {
				"id" : email.id,
				"descricao" : email.descricao
			},
			"endereco" : {
				"id" : endereco.id,
				"cep" : endereco.cep,
				"logradouro" : endereco.logradouro,
				"bairro" : endereco.bairro,
				"cidade" : endereco.cidade
			},
			"cargo" : {
				"id" : cargo.id,
				"descricao" : cargo.descricao
			},
			"tipoEmail" : {
				"id" : tipoEmail.id,
				"descricao" : tipoEmail.descricao
			},
			"uf" : {
				"id" : uf.id,
				"descricao" : uf.descricao
			},
			"participante" : {
				"id" : paticipante.id,
				"nome" : paticipante.nome,
				"dataNascimento" : paticipante.dataNascimento,
				"numeroEndereco" : paticipante.numeroEndereco,
				"complementoEndereco" : paticipante.complementoEndereco,
				"musica" : paticipante.musica,
				"lugar" : paticipante.lugar
			}
		}
		this.enviar(caminho, dados, "finalizaEnvio");
	}

	this.enviar = function(caminho, dados, funcao) {
		$.ajax({
			method : 'POST',
			url : caminho,
			xhrFields : {
				withCredentials : true
			},
			data : dados
		}).success(function(retorno) {
			eval(funcao + "(retorno)");
		}).error(function(retorno) {
			alert(retorno);
			return [];
		});
	}

}