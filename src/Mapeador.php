<?php
require_once ('ficha.php');
require_once("CommandSQL.php");


switch ($_POST['funcao']){
	case 'getDados':
		getDadosFicha($_POST['idFicha']);
		break;
	case 'setDados':
		setDados($_POST['titulo'],$_POST['idCategoria'],$_POST['idEscola'],$_POST['atributos'],$_POST['idFicha']);
		break;
}



function setDados($titulo,$idCategoria,$idEscola,$atributos,$idFicha){
	$existeDados = existe($titulo,$idCategoria,$idATVEscola);
	if($idFicha == 0){
		$idFicha = inserir($titulo,$idCategoria,$idEscola);
		incluirDados($idFicha,$atributos);
	}else{
		alterarDados($idFicha,$atributos);
	}
}


function getDadosFicha($idFicha) {
	$teste = false;
	$con = new cmd_SQL();
	$db[sql]=" SELECT id,value FROM `mostraeducficha`.`atributo`  ";
	$db[sql]= $db[sql] . " WHERE idFicha = ".$idFicha;
	$db[ret] = "xml";
	$con->pesquisar($db);
}


function existeDados($idFicha) {
	$teste = false;
	$con = new cmd_SQL();
	$db[sql]=" SELECT COUNT(idAtributo) qtd FROM `mostraeducficha`.`atributo`  ";
	$db[sql]= $db[sql] . " WHERE idFicha = ".$idFicha;
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



function incluirDados($idFicha,$atributos){
	$retorno = true;
	$testes[0]=false;
	$valor=false;
	$contadorTeste = 0;
	$con = new cmd_SQL();
	$db[tab]="atributo";
	$conteudo = explode("|",$atributos);
	foreach ($conteudo as $dados){
		$matriz = explode(">",$dados);
		$idCampo = 0;
		$i = 0;
		$campos="idFicha";
		$valores=$idFicha;
		foreach ($matriz as $value){
			if($i==0){
				if($campos!=""){
					$campos .=",";
				}
				$campos .= $value;
				$i = 1;
				if ($idCampo == 0){
					$idCampo ++;
				}else{
					$idCampo = 0;
				}
			}else{
				if($valores!=""){
					$valores .=",";
				}
				if ($idCampo == 0){
					$valores .= "'".mb_strtoupper(utf8_decode($value)) . "'";
				}else{
					$valores .= "'".$value . "'";
				}
				$i = 0;
			}
		}
		$db[campos]=$campos;
		$db[values]=$valores;
		if($con->incluir($db)){
			$testes[$contadorTeste] = true;
		}else {
			$testes[$contadorTeste] = false;
		}
		$contadorTeste++;
	}
	foreach ($testes as $teste){
		if($retorno){
			if(!$teste){
				$retorno = $teste;
			}
		}
	}
	if($retorno){
		echo "ok";
	}else{
		echo "erro";
	}
}

function alterarDados($idFicha,$atributos){
	$retorno = true;
	$testes;
	$valor=false;
	$contadorTeste = 0;
	$con = new cmd_SQL();
	$db[tab]="atributo";
	$conteudo = explode("|",$atributos);
	foreach ($conteudo as $dados){
		$matriz = explode(">",$dados);
		$idCampo = 0;
		$i = 0;
		$campo=" ";
		$clausula=" ";
		foreach ($matriz as $value){
			if($i==0){
				if ($idCampo == 0){
					$clausula = $value." = ";
				}else{
					$campo = $value." = ";
				}
				$i = 1;
			}else{
				if ($idCampo == 0){
					$clausula .= "'".$value . "'";
					$idCampo ++;
				}else{
					$campo .= "'".mb_strtoupper(utf8_decode($value)) . "'";
					$idCampo = 0;
				}
				$i = 0;
			}
		}
		$db[sql]= "UPDATE atributo SET ".$campo." WHERE idFicha = ".$idFicha." and ".$clausula;
		if($con->alterar($db)){
			$testes[$contadorTeste] = true;
		}else {
			$testes[$contadorTeste] = false;
		}
		$contadorTeste++;
	}
	foreach ($testes as $teste){
		if($retorno){
			if(!$teste){
				$retorno = $teste;
			}
		}
	}
	if($retorno){
		echo "ok";
	}else{
		echo "erro";
	}
}




