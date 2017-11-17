<?php 
namespace src\dao;
use src\database\Commad;
use src\model\UF;

require_once 'database/Commad.php';
require_once 'src/model/UF.php';


class UFDao {
	public function getLista() {
		$ufs = [ ];
		$db ["sql"] = "SELECT idUF id,descricao,sigla from uf ";
		$command = new Commad();
		$dados = $command->pesquisar ( $db );
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					array_push ( $ufs, new UF($valorLInha ["id"],$valorLInha ["sigla"], $valorLInha ["descricao"]) );
				}
			}
		}
		return $ufs;
	}
}

