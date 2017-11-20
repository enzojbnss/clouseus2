/**
 * 
 */
var ParticipanteViewModel = function() {
	this.txtID = ko.observable('0');
	this.txtNomeCompleto = ko.observable();
	this.txtNomeCracha = ko.observable();
	this.txtNomeEmpresa = ko.observable();
	this.txtCargo = ko.observable();
	this.txtDataNascimento = ko.observable();
	this.txtEndereco = ko.observable();
	this.txtEmailProfissional = ko.observable();
	this.txtEmailPessoal = ko.observable();
	this.txtTelefone = ko.observable();
	this.txtCelular = ko.observable();
	this.txtPropagandaMedica = ko.observable("n");
	this.txtHospitalar = ko.observable("n");
	this.txtAcesso = ko.observable("n");
	this.txtVarejo = ko.observable("n");
	this.txtConsumer = ko.observable("n");
	this.txtOutro = ko.observable();
	this.txtMusica = ko.observable();
	this.txtLugar = ko.observable();
	this.hierarquias = [];
	this.hierarquias.push("Diretor");
	this.hierarquias.push("Gerente");
	this.hierarquias.push("Coordenador");
	this.hierarquias.push("Supervisor");
	this.hierarquias.push("Analista");
	this.hierarquia = new Object();
	this.hierarquia.id = 0;
	this.hierarquia.descricao = "";

	this.getOBject = function() {
		idHierarquia = this.hierarquia.id;
		descricaoHierarquia = this.hierarquia.descricao;
		hierarquia = new Hierarquia(idHierarquia, descricaoHierarquia);
		id = this.txtID();
		nomeCompleto = this.txtNomeCompleto();
		nomeCracha = this.txtNomeCracha();
		nomeEmpresa = this.txtNomeEmpresa();
		cargo = this.txtCargo();
		dataNascimento = this.txtDataNascimento();
		endereco = this.txtEndereco();
		emailProfissional = this.txtEmailProfissional();
		emailPessoal = this.txtEmailPessoal();
		telefone = this.txtTelefone();
		celular = this.txtCelular();
		propagandaMedica = this.txtPropagandaMedica();
		hospitalar = this.txtHospitalar();
		acesso = this.txtAcesso();
		varejo = this.txtVarejo();
		consumer = this.txtConsumer();
		outro = this.txtOutro();
		musica = this.txtMusica();
		lugar = this.txtLugar();
		participante = new Participante(id, nomeCompleto, nomeCracha,
				nomeEmpresa, cargo, dataNascimento, hierarquia, endereco,
				emailProfissional, emailPessoal, telefone, celular,
				propagandaMedica, hospitalar, acesso, varejo, consumer, outro,
				musica, lugar)
		return participante;
	};

	this.setHierarquia = function(id) {
		this.hierarquia.id = id;
		if (id > 0) {
			index = id - 1;
		} else {
			index = id;
		}
		this.hierarquia.descricao = this.hierarquias[index];
	}
}