<?php

namespace src\database;

class DadosConectaBanco {
	
	private $tipo;
	private $host;
	private $bd;
	private $user;
	private $pass;
	
	public function __construct(){
		$this->tipo = "mysql";
		$this->host = "localhost";
		$this->bd = "cadastro";
		$this->user = "app";
		$this->pass = "app";
	}
	
	public function getTipo(){
		return $this->tipo;
	}
	
	public function getHost(){
		return $this->host;
	}
	
	public function getBD(){
		return $this->bd;
	}
	
	public function getUser(){
		return $this->user;
	}
	
	public function getPass(){
		return $this->pass;
	}
}

?>
