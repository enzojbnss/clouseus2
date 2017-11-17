<?php
namespace src\dao;
use src\database\Commad;
use src\model\Cargo;
require_once 'src/database/Commad.php';
require_once 'src/model/Cargo.php';
class CargosDao {
	public function getLista() {
		$cargos = [ ];
		$db ["sql"] = "SELECT idCargo id,descricao from cargo ";
		$command = new Commad ();
		$dados = $command->pesquisar ( $db );
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					array_push ( $cargos, new Cargo ( $valorLInha ["id"], $valorLInha ["descricao"] ) );
				}
			}
		}
		return $cargos;
	}
}