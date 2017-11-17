<?php

require_once("cmd_sql.php");

switch ( $_POST["acao"] ) {
	case 'Incluir':
		Incluir();
		break;
		
	case 'Excluir':
		Excluir();
		break;
		
	default:
		break;
}

function Incluir() {
	$con = new cmd_SQL();

	setlocale(LC_CTYPE,"pt_BR");

	$db[tab]="atv_matricula";
	$db[campos]="id_cidadao," .
				"id_turma," .
				"status_mat, " .
				"dt_mat ";
	$db[values]= "".
	mb_strtoupper(utf8_decode($_POST["idCidadao"])) . ",".
	mb_strtoupper(utf8_decode($_POST["idTurma"])). ",'" .
	mb_strtoupper(utf8_decode($_POST["status"]))."','".
	date('Y/m/d')."'";
	

	if ($con->incluir($db)) {
		echo "true";
	}
	else {
		echo "Erro na inclusão!<br>";
		echo "insert into " . $db[tab] . "(" . $db[campos] . ")values(" . $db[values] . ")";
	}
}

function Excluir() {
	$con = new cmd_SQL();

	setlocale(LC_CTYPE,"pt_BR");

	$db[tab]="atv_matricula";
	$db[cond]="id_cidadao = " . ($_POST["idCidadao"]) . " and id_turma = "  . ($_POST["idTurma"]);
	
	if ($con->excluir($db)) {
		echo "true";
	}
	else {
		echo "Erro na exclusão!<br>";
	}
}

?>
