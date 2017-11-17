<?php
namespace src\model;

require_once 'src/model/TipoEmail.php';

class Email {
	
	private $id;
	private $endereco;
	private $tipoEmail;
	
	public function __construct($id,$endereco,$tipoEmail){
		$this->id = $id;
		$this->endereco = $endereco;
		$this->tipoEmail = $tipoEmail;
	}
	
	public function getID(){
		return $this->id;
	}
	
	public function setID($id){
		$this->id = $id;
	}
	
	public function getEndereco(){
		return $this->endereco;
	}
	
	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}
	
	public function getTipoEmail(){
		return $this->tipoEmail;
	}
	
	public function setTipoEmail($tipoEmail){
		$this->tipoEmail = $tipoEmail;
	}
}