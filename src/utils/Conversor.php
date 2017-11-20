<?php
namespace src\utils;

use src\model\Participante;
class Conversor {
	private $objJson;
	public function getObject($objJson, $className, $param) {
		$this->objJson = $objJson;
		switch ($className) {
			case "Participante" :
				$id = $objJson->id;
				$nomeCompleto = $objJson->nomeCompleto;
				$nomeCracha = $objJson->nomeCracha;
				$nomeEnpresa = $objJson->nomeEnpresa;
				$cargo = $objJson->cargo;
				$dataNascimento = $objJson->dataNascimento;
				$endereco = $objJson->endereco;
				$emailProfissional = $objJson->emailProfissional;
				$emailPessoal = $objJson->emailPessoal;
				$telefone = $objJson->telefone;
				$celular = $objJson->celular;
				$propagandaMedica = $objJson->propagandaMedica;
				$hospitalar = $objJson->hospitalar;
				$acesso = $objJson->acesso;
				$varejo = $objJson->varejo;
				$consumer = $objJson->consumer;
				$outro = $objJson->outro;
				$musica = $objJson->musica;
				$lugar = $objJson->lugar;
				return new Participante ($id, $nomeCompleto, $nomeCracha, $nomeEnpresa, $cargo,
			 $dataNascimento, $endereco,  $emailProfissional,  $emailPessoal,  $telefone,
			 $celular,  $propagandaMedica,  $hospitalar,  $acesso,  $varejo,  $consumer,
			 $outro,  $musica,  $lugar);
				break;
		}
	}
	private function getItem($item) {
		try {
			return $this->objJson->$item;
		} catch ( Exception $e ) {
			return null;
		}
	}
}