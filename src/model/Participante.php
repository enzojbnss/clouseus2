<?php

namespace src\model;

class Participante {
	private $id;
	private $nomeCompleto;
	private $nomeCracha;
	private $nomeEmpresa;
	private $cargo;
	private $dataNascimento;
	private $hierarquia;
	private $endereco;
	private $emailProfissional;
	private $emailPessoal;
	private $telefone;
	private $celular;
	private $propagandaMedica;
	private $hospitalar;
	private $acesso;
	private $varejo;
	private $consumer;
	private $outro;
	private $musica;
	private $lugar;
	public function __construct($id, $nomeCompleto, $nomeCracha, $nomeEmpresa, $cargo, $dataNascimento, $hierarquia, $endereco, $emailProfissional, $emailPessoal, $telefone, $celular, $propagandaMedica, $hospitalar, $acesso, $varejo, $consumer, $outro, $musica, $lugar) {
		$this->id = $id;
		$this->nomeCompleto = $nomeCompleto;
		$this->nomeCracha = $nomeCracha;
		$this->nomeEmpresa = $nomeEmpresa;
		$this->cargo = $cargo;
		$this->dataNascimento = $dataNascimento;
		$this->hierarquia = $hierarquia;
		$this->endereco = $endereco;
		$this->emailProfissional = $emailProfissional;
		$this->emailPessoal = $emailPessoal;
		$this->telefone = $telefone;
		$this->celular = $celular;
		$this->propagandaMedica = $propagandaMedica;
		$this->hospitalar = $hospitalar;
		$this->acesso = $acesso;
		$this->varejo = $varejo;
		$this->consumer = $consumer;
		$this->outro = $outro;
		$this->musica = $musica;
		$this->lugar = $lugar;
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id->$id;
	}
	public function getNomeCompleto() {
		return $this->nomeCompleto;
	}
	public function setNomeCompleto($nomeCompleto) {
		$this->nomeCompleto->$nomeCompleto;
	}
	public function getNomeCracha() {
		return $this->nomeCracha;
	}
	public function setNomeCracha($nomeCracha) {
		$this->nomeCracha->$nomeCracha;
	}
	public function getNomeEmpresa() {
		return $this->nomeEmpresa;
	}
	public function setNomeEmpresa($nomeEmpresa) {
		$this->nomeEmpresa->$nomeEmpresa;
	}
	public function getCargo() {
		return $this->cargo;
	}
	public function setCargo($cargo) {
		$this->cargo->$cargo;
	}
	public function getDataNascimento() {
		return $this->dataNascimento;
	}
	public function setDataNascimento($dataNascimento) {
		$this->dataNascimento->$dataNascimento;
	}
	public function getHierarquia() {
		return $this->hierarquia;
	}
	public function setHierarquia($hierarquia) {
		$this->hierarquia->$hierarquia;
	}
	public function getEndereco() {
		return $this->endereco;
	}
	public function setEndereco($endereco) {
		$this->endereco->$endereco;
	}
	public function getEmailProfissional() {
		return $this->emailProfissional;
	}
	public function setEmailProfissional($emailProfissional) {
		$this->emailProfissional->$emailProfissional;
	}
	public function getEmailPessoal() {
		return $this->emailPessoal;
	}
	public function setEmailPessoal($emailPessoal) {
		$this->emailPessoal->$emailPessoal;
	}
	public function getTelefone() {
		return $this->telefone;
	}
	public function setTelefone($telefone) {
		$this->telefone->$telefone;
	}
	public function getCelular() {
		return $this->celular;
	}
	public function setCelular($celular) {
		$this->celular->$celular;
	}
	public function getPropagandaMedica() {
		return $this->propagandaMedica;
	}
	public function setPropagandaMedica($propagandaMedica) {
		$this->propagandaMedica->$propagandaMedica;
	}
	public function getHospitalar() {
		return $this->hospitalar;
	}
	public function setHospitalar($hospitalar) {
		$this->hospitalar->$hospitalar;
	}
	public function getAcesso() {
		return $this->acesso;
	}
	public function setAcesso($acesso) {
		$this->acesso->$acesso;
	}
	public function getVarejo() {
		return $this->varejo;
	}
	public function setVarejo($varejo) {
		$this->varejo->$varejo;
	}
	public function getConsumer() {
		return $this->consumer;
	}
	public function setConsumer($consumer) {
		$this->consumer->$consumer;
	}
	public function getOutro() {
		return $this->outro;
	}
	public function setOutro($outro) {
		$this->outro->$outro;
	}
	public function getMusica() {
		return $this->musica;
	}
	public function setMusica($musica) {
		$this->musica->$musica;
	}
	public function getLugar() {
		return $this->lugar;
	}
	public function setLugar($lugar) {
		$this->lugar->$lugar;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
}

