<?php
namespace src\dao;
require_once 'src/database/Commad.php';
require_once 'src/model/TipoEmail.php';
use src\database\Commad;
use src\model\TipoEmail;


class TipoEmailDao {
	public function getLista() {
		$tipos = [ ];
		$db ["sql"] = "SELECT idTipoEmail id,descricao from tipoEmail ";
		$command = new Commad();
		$dados = $command->pesquisar ( $db );
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					array_push ( $tipos, new TipoEmail( $valorLInha ["id"], $valorLInha ["descricao"] ) );
				}
			}
		}
		return $tipos;
	}	
}