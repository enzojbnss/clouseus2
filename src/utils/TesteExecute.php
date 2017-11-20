<?php
namespace src\utils;

class TesteExecute {
	private $status;
	private $menssagem;
	public function __construct($status, $menssagem) {
		$this->status = $status;
		$this->menssagem = $menssagem;
	}
	
	public function jsonSerialize() {
		return get_object_vars($this);
	}
}