<?php
namespace src\database;
require_once ("Banco.php");
require_once ("DadosConectaBanco.php");






class Commad {
	
	// ||||||||||||| COMANDOS DE SQL PARA OPERAÇÕES B�?SICAS |||||||||||||||||||||

	public function pesquisar($db) {
		// $msg = false;
		$retorno = null;
		$banco = new Banco ();
		$connection = $banco->conectar($banco);
		if ($connection) {
			try {
				$recordSet = $connection->prepare($db["sql"], array());
				$recordSet->execute();
				$retorno = $recordSet->fetchAll ();
			} catch ( Exception $e ) {
				// $msg = "Erro: Código: " . $e->getCode () . "Mensagem " . $e->getMessage ();
				// if ($db[ret]=='xml')$msg .= "<reg> $msg </reg>";
			}
		}
		$connection = null;
		return $retorno;
	}

	public function incluir($db) {
		$banco = new Banco();
		$connection = $banco->conectar($banco);
		if ($connection != false) {
			try {
				$sql = "INSERT INTO " . $db [tab] . "(" . $db [campos] . ") VALUES (" . $db [values] . ")";
				// echo $sql; exit;
				$res = $connection->prepare ( $sql );
				$res->execute ();
				$retorno = true;
			} catch ( Exception $e ) {
				//$msg = "Erro de inclusão: Código: " . $e->getCode () . "Mensagem " . $e->getMessage ();
				//$msg .= "<reg> $msg </reg>";
				$retorno = false;
			}
		} else {
			if (! $retorno)
				$retorno = $msg;
				$retorno = false;
		}
		$connection = null;
		return $retorno;
	}

	public function alterar($db) {
		$banco = new Banco ();
		$connection = $banco->conectar($banco);
		if ($connection != false) {
			try {
				$sql = $db [sql];
				$res = $connection->prepare ( $sql );
				$res->execute ();
				unset ( $connection );
				return true;
			} catch ( Exception $e ) {
				//$msg = "Erro de inclusão: Código: " . $e->getCode () . "Mensagem " . $e->getMessage ();
				//$msg .= "<reg> $msg </reg>";
				$retorno = false;
			}
		} else {
			if (! $retorno)
				$retorno = false;
		}
		$connection = null;
		return $retorno;
	}

	public function excluir($db) {
		$banco = new Banco ();
		$connection = $banco->conectar($banco);
		if ($connection) {
			try {
				$sql = "DELETE FROM " . $db [tab] . " WHERE " . $db [cond];
				// echo $sql; exit;
				$res = $connection->prepare ($sql);
				$res->execute ();
				$retorno = 'exclusão efetuada com sucesso"';
				$connection = null;
				return $retorno;
			} catch ( Exception $e ) {
				//$msg = "Erro de inclusão: Código: " . $e->getCode () . "Mensagem " . $e->getMessage ();
				//$msg .= "<reg> $msg </reg>";
				$retorno = false;
			}
		} else {
			if (! $retorno)
				$retorno = false;
		}
		/*$retorno = "<?xml version='1.0' encoding='utf-8' ?>" . $retorno;
		 header ( "Content-type: application/xml;charset=UTF-8" );*/
		return $retorno;
	}
	
}

