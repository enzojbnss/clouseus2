<?php
namespace src\model;

class TipoEmail {
	private $id;
	private $descricao;
	public function __construct($id, $descricao) {
		$this->id = $id;
		$this->descricao = $descricao;
	}
	
	public function getID(){
		return $this->id;
	}
	
	public function setID($id){
		$this->id = $id;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}
	
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	
	public function jsonSerialize() {
		return get_object_vars($this);
	}
	
}