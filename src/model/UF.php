<?php

namespace src\model;

class UF {
	private $id;
	private $sigla;
	private $descricao;
	public function __autoload($id, $sigla, $descricao) {
		$this->id = $id;
		$this->sigla = $sigla;
		$this->descricao = $descricao;
	}
	
	public function getID(){
		return $this->id;
	}
	
	public function setID($id){
		$this->id = $id;
	}
	
	public function getSigla(){
		return $this->sigla;
	}
	
	public function setSigla($sigla){
		$this->sigla = $sigla;
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