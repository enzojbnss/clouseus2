<?php

namespace src\dao;

require_once 'src/model/Participante.php';
require_once 'src/database/Banco.php';
require_once 'src/utils/TesteExecute.php';
use \PDO;
use src\database\Banco;
use src\model\Participante;
use src\utils\TesteExecute;

class PartcipanteDao {
	public function incluir($participante, $conteudo) {
		$execute = "";
		$mensagem = "";
		$status = true;
		$banco = new Banco ();
		$connection = $banco->conectar ( $banco );
		if ($connection != false) {
			try {
				$db ["tab"] = "participante";
				$campos = "nomeCompleto, nomeCracha, nomeEnpresa, cargo,";
				$campos .= "dataNascimento, endereco, emailProfissional, emailPessoal, telefone,";
				$campos .= "celular, propagandaMedica, hospitalar, acesso, varejo, consumer,";
				$campos .= "outro, musica, lugar,idHierarquia,image";
				$sql = "INSERT INTO participante (" . $campos . ") VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				$res = $connection->prepare ( $sql );
				$nomeCompleto = $participante->getNomeCompleto ();
				$nomeCracha = $participante->getNomeCracha ();
				$nomeEmpresa = $participante->getNomeEmpresa ();
				$cargo = $participante->getCargo ();
				$dataNascimento = $participante->getDataNascimento ();
				$endereco = $participante->getEndereco ();
				$emailProfissional = $participante->getEmailProfissional ();
				$emailPessoal = $participante->getEmailPessoal ();
				$telefone = $participante->getTelefone ();
				$celular = $participante->getCelular ();
				$propagandaMedica = $participante->getPropagandaMedica ();
				$hospitalar = $participante->getHospitalar ();
				$acesso = $participante->getAcesso ();
				$varejo = $participante->getVarejo ();
				$consumer = $participante->getConsumer ();
				$outro = $participante->getOutro ();
				$musica = $participante->getMusica ();
				$lugar = $participante->getLugar ();
				$idHierarquia = $participante->getHierarquia ()->getID ();
				$res->bindParam ( 1, $nomeCompleto, PDO::PARAM_STR );
				$res->bindParam ( 2, $nomeCracha, PDO::PARAM_STR );
				$res->bindParam ( 3, $nomeEmpresa, PDO::PARAM_STR );
				$res->bindParam ( 4, $cargo, PDO::PARAM_STR );
				$res->bindParam ( 5, $dataNascimento, PDO::PARAM_STR );
				$res->bindParam ( 6, $endereco, PDO::PARAM_STR );
				$res->bindParam ( 7, $emailProfissional, PDO::PARAM_STR );
				$res->bindParam ( 8, $emailPessoal, PDO::PARAM_STR );
				$res->bindParam ( 9, $telefone, PDO::PARAM_STR );
				$res->bindParam ( 10, $celular, PDO::PARAM_STR );
				$res->bindParam ( 11, $propagandaMedica, PDO::PARAM_STR );
				$res->bindParam ( 12, $hospitalar, PDO::PARAM_STR );
				$res->bindParam ( 13, $acesso, PDO::PARAM_STR );
				$res->bindParam ( 14, $varejo, PDO::PARAM_STR );
				$res->bindParam ( 15, $consumer, PDO::PARAM_STR );
				$res->bindParam ( 16, $outro, PDO::PARAM_STR );
				$res->bindParam ( 17, $musica, PDO::PARAM_STR );
				$res->bindParam ( 18, $lugar, PDO::PARAM_STR );
				$res->bindParam ( 19, $idHierarquia, PDO::PARAM_INT );
				$res->bindParam ( 20, $conteudo, PDO::PARAM_LOB );
				if ($res->execute () === false) {
					echo "<pre>";
					print_r ( $res->errorInfo () );
					$status = false;
				}
			} catch ( Exception $e ) {
				echo $e->getMessage ();
				$status = false;
			}
		}
		if ($status == true) {
			$mensagem = "Inscrição feita com Sucesso!";
		} else {
			$mensagem = "Falha ao fazer a inscrição!";
		}
		$execute = new TesteExecute ( $status, $mensagem );
		return $execute;
	}
}