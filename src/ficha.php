<?php
session_start();
require_once("CommandSQL.php");

switch ( $_POST["acao"] ) {
	case 'getLista':
		getLista($_POST["idEscola"]);
		break;
	case 'getDadosATVEscola':
		getDadosATVEscola($_POST['idEscola']);
		break;
	case 'cadastra':
		$teste = dadosEscolaExiste($_POST["idEscola"]);
		if(!$teste){
			inserirAtvEscola($_POST["idEscola"],$_POST["qtdPeriodo"],$_POST["gestor"],$_POST["categoria"],$_POST["titulo"]);
		}else{
			alterarAtvEscola($_POST["idEscola"],$_POST["qtdPeriodo"],$_POST["gestor"],$_POST["categoria"],$_POST["titulo"]);
		}
		break;
	case 'getDadosATVEscola':
		getDadosATVEscola;
		break;
	case 'verificaVagas':
		verificaVagas($_POST['idCategoria'],$_POST['idEscola']);
		break;
	default:
		break;

}
// getDadosATVEscola($idEscola){
function getLista($idEscola){
	$con = new cmd_SQL();
	$db[sql]="SELECT descCategoria categoria,titulo,idStatus,idFicha,idCategoria ";
	$db[sql].="FROM `mostraeducficha`.`ficha` ";
	$db[sql].="INNER JOIN  `mostraeducficha`.`categoria` USING(idCategoria) ";
	$db[sql].="INNER JOIN  `mostraeducficha`.`atvEscola` USING(idATVEscola,ano) ";
	$db[sql].=" WHERE ano = YEAR(NOW()) AND idEscola = ".$idEscola;
	$db[ret] = "xml";
	$con->pesquisar($db);
}

function getDadosATVEscola($idEscola){
	$con = new cmd_SQL();
	$db[sql]="SELECT qtdPeriodo, gestor FROM `mostraeducficha`.`atvescola` ";
	$db[sql].=" WHERE ano = YEAR(NOW()) AND idEscola = ".$idEscola;
	$db[ret] = "xml";
	$con->pesquisar($db);
}


function getDados($idFicha) {
	$teste = false;

}


function inserirAtvEscola($idEscola,$qtdPeriodo,$gestor){
	$con = new cmd_SQL();
	setlocale(LC_CTYPE,"pt_BR");
	$db[tab]="atvescola";
	$db[campos]="qtdPeriodo, gestor, idEscola, ano";
	$db[values]= "'".mb_strtoupper($qtdPeriodo). "'";
	$db[values].= ",'".mb_strtoupper(utf8_decode($gestor)) . "'";
	$db[values].= ",".$idEscola ;
	$db[values].= ",YEAR(NOW())";
	if ($con->incluir($db)) {
		echo "ok";
	}else {
		echo "erro "."INSERT INTO ". $db[tab]."(".$db[campos].") VALUES (".$db[values].")";
	}
}

function inserir($titulo,$idCategoria,$idEscola){
	$idATVEscola = getIDATVEscola($idEscola);
	$con = new cmd_SQL();
	setlocale(LC_CTYPE,"pt_BR");
	$db[tab]="ficha";
	$db[campos]="titulo,ano,idCategoria,idATVEscola,idStatus";
	$db[values]= "'".mb_strtoupper(utf8_decode($titulo)). "'";
	$db[values].= ",YEAR(NOW())";
	$db[values].= ",".$idCategoria;
	$db[values].= ",".$idATVEscola;
	$db[values].= ",1";
	if($con->incluir($db)){
		//echo "Salvo com sucesso !";
	}else {
		//echo "INSERT INTO ". $db[tab]."(".$db[campos].") VALUES (".$db[values].")";
	}
	return getID($titulo,$idCategoria,$idEscola);
}


function alterarAtvEscola($idEscola,$qtdPeriodo,$gestor,$catgoria,$titulo){
	$con = new cmd_SQL();
	$db[sql]="UPDATE atvescola SET ";
	$db[sql].= "qtdPeriodo = '".mb_strtoupper($qtdPeriodo). "'";
	$db[sql].= ",gestor ='".mb_strtoupper(utf8_decode($gestor)) . "'";
	$db[sql].= " WHERE idEscola = ".$idEscola ;
	$db[sql].= " AND ano = YEAR(NOW())";
	echo $db[sql];
	if ($con->alterar($db)) {
		echo "ok";
	}else {
		echo "erro";
	}
}


function dadosEscolaExiste($idEscola) {
	$teste = false;
	$con = new cmd_SQL();
	$db[sql]=" SELECT COUNT(idATVEscola) qtd FROM `mostraeducficha`.`atvescola`  ";
	$db[sql].=  " WHERE idEscola = ".$idEscola." AND ano = YEAR(NOW())" ;
	$db[ret] = "php";
	$rs = $con->pesquisar($db);
	$i = 0;
	if($rs){
		foreach ($rs as $lin) {
			$qtd = $rs[$i]['qtd'];
		}
	}
	if($qtd > 0){
		$teste = true;
	}
	return $teste;
}




function getIDATVEscola($idEscola){
	$con = new cmd_SQL();
	$db[sql]= " SELECT idATVEscola FROM `mostraeducficha`.`atvescola`  ";
	$db[sql].= " WHERE idEscola = ".$idEscola." AND ano = YEAR(NOW())" ;
	$db[ret] = "php";
	$rs = $con->pesquisar($db);
	$i = 0;
	if($rs){
		foreach ($rs as $lin) {
			$idATVEscola = $rs[$i]['idATVEscola'];
		}
	}
	return $idATVEscola;
}


function getID($titulo,$idCategoria,$idEscola){
	$idATVEscola = getIDATVEscola($idEscola);
	$con = new cmd_SQL();
	$db[sql]=" SELECT idFicha FROM `mostraeducficha`.`ficha` ";
	$db[sql]= $db[sql] . " WHERE idATVEscola = ".$idATVEscola. " ";
	$db[sql]= $db[sql] . " AND titulo =  '".mb_strtoupper($titulo). "' "  ;
	$db[sql]= $db[sql] . " AND idCategoria = ".$idCategoria." " ;
	$db[sql]= $db[sql] . " AND ano = YEAR(NOW())" ;
	$db[ret] = "php";
	$rs = $con->pesquisar($db);
	$i = 0;
	$id = 0;
	//echo $db[sql];
	if($rs){
		foreach ($rs as $lin) {
			$id = $rs[$i]['idFicha'];
		}
	}
	return $id;
}


function existe($titulo,$idCategoria,$idATVEscola) {
	$teste = false;
	$con = new cmd_SQL();
	$db[sql]=" SELECT COUNT(idFicha) qtd FROM `mostraeducficha`.`ficha` ";
	$db[sql]= $db[sql] . " WHERE idATVEscola = ".$idATVEscola. " ";
	$db[sql]= $db[sql] . " AND titulo =  '".mb_strtoupper($titulo). "' "  ;
	$db[sql]= $db[sql] . " AND idCategoria = ".$idCategoria." " ;
	$db[sql]= $db[sql] . " AND ano = YEAR(NOW())" ;
	$db[ret] = "php";
	$rs = $con->pesquisar($db);
	$i = 0;
	if($rs){
		foreach ($rs as $lin) {
			$qtd = $rs[$i]['qtd'];
		}
	}
	if($qtd > 0){
		$teste = true;
	}
	return $teste;
}

function verificaVagas($idCategoria,$idEscola) {
	$teste = false;
	$con = new cmd_SQL();
	$db[sql]="Select vagasRestantes, totalCategoria, totalCom2vagas ";
	$db[sql].="FROM (SELECT IF(qtdMaxVagas - COUNT(idFicha)< 0,0,";
	$db[sql].="qtdMaxVagas - COUNT(idFicha)) vagasRestantes FROM ficha ";
	$db[sql].="RIGHT JOIN atvEscola USING(idATVEscola) ";
	$db[sql].="RIGHT JOIN escolaPorte USING(idEscola) " ;
	$db[sql].="RIGHT JOIN porte USING(idPorte) WHERE idEscola = ".$idEscola."  ) vagasTotal " ;
	$db[sql].="JOIN (SELECT Count(idFicha)totalCategoria FROM ficha ";
	$db[sql].="INNER JOIN atvEscola USING(idATVEscola) ";
	$db[sql].="INNER JOIN escolaPorte USING(idEscola) ";
	$db[sql].="INNER JOIN porte USING(idPorte) WHERE idCategoria =" ;
	$db[sql].=$idCategoria ." AND idEscola = ".$idEscola." ) vagasCategoria ";
	$db[sql].="JOIN (SELECT COUNT(QTDfICHAS) totalCom2vagas FROM " ;
	$db[sql].="(SELECT Count(idFicha) qtdFichas FROM ficha ";
	$db[sql].="INNER JOIN atvEscola USING(idATVEscola) ";
	$db[sql].="INNER JOIN escolaPorte USING(idEscola) ";
	$db[sql].="INNER JOIN porte USING(idPorte) " ;
	$db[sql].="WHERE idEscola = ".$idEscola." " ;
	$db[sql].="GROUP BY idCategoria " ;
	$db[sql].="HAVING Count(idFicha) >= 2) totalCom2Vagas) categoriasCOM2vagas " ;
	$db[ret] = "php";
	$rs = $con->pesquisar($db);
	$i = 0;
	$teste = false;
	if($rs){
		foreach ($rs as $lin) {
			$vagasRestantes = $rs[$i]['vagasRestantes'];
			$totalCategoria = $rs[$i]['totalCategoria'];
			$totalCom2vagas = $rs[$i]['totalCom2vagas'];
			if($vagasRestantes > 0){
				if($totalCom2vagas > 0){
					if($totalCategoria == 0){
						$teste= true;
					}
				}else{
					$teste = true;
				}
			}
		}
	}
	//echo $db[sql]."\n";
	//echo $vagasRestantes .":".$totalCategoria.":".	$totalCom2vagas."\n";
	if($teste){
		echo "s";
	}else{
		echo "n";
	}
}


?>
