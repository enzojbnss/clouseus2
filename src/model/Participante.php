<?php
namespace src\model;
require_once 'model/Cargo.php';



class Participante{
    
	private $id;
	private $nome;
	private $dataNascimento;
	private $endereco;
	private $cargo;
	private $emails;
	private $musica;
	private $lugar;
	
	public function getID(){
		return $this->id;
	}
	
	public function setID($id){
		$this->id = $id;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getDataNascimento(){
		return $this->dataNascimento;
	}
	
	public function setDataNascimento($dataNascimento){
		$this->dataNascimento = $dataNascimento;
	}
}

