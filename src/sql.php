<?php
session_start();
//$_POST["filtro"]='CarregarBairro';
//$_POST["cidade"]=2037;
require_once("CommandSQL.php");
switch ($_POST["filtro"]) {

	case 'PesquisaCPF':
		PesquisaCPF($_POST["txtCPF"]);
		break;
	case 'CPFDuplicado':
		CPFDuplicado($_POST["txtCPF"], $_POST["txtNome"]);
		break;
	case 'InscricaoCidadao':
		InscricaoCidadao($_POST["idCidadao"]);
		break;
	case 'MaxInscricao':
		MaxInscricao();
		break;
	case 'VerificaHorario':
		VerificaHorario($_POST["idCidadao"], $_POST["idTurma"]);
		break;
	case 'TotalVagas':
		TotalVagas($_POST["idTurma"]);
		break;
	case 'PesqCurso':
		PesqCurso();
		break;
	case 'PesqTurma':
		PesqTurma();
		break;
	case 'PesqHorario' :
		PesqHorario();
		break;
	case 'CarregaEscola' :
		CarregaEscola();
		break;
	case 'CarregaCategoria' :
		CarregaCategoria();
		break;
	default:
		break;
}
//carregaCategoria()
function PesquisaCPF($CPF) {
	$sql = new cmd_SQL();
	$bd[sql]="SELECT c.id_cidadao, c.nome_cid, id_turma
			  FROM cidadao c left join atv_matricula am on c.id_cidadao = am.id_cidadao where cpf_cid = " . $CPF . "";
	$bd[ret]="xml";
	$sql->pesquisar($bd);
}

function CPFDuplicado($CPF, $nome) {
	$sql = new cmd_SQL();
	$bd[sql]="SELECT nome_cid, cpf_cid FROM cidadao WHERE cpf_cid = '" . $CPF . "' and nome_cid <> '" . mb_strtoupper($nome) . "'";
	$bd[ret]="xml";
	$sql->pesquisar($bd);
}

function InscricaoCidadao($idCidadao) {
	$sql = new cmd_SQL();
	$bd[sql]="SELECT count(id_cidadao) as qtd FROM atv_matricula where id_cidadao = " . $idCidadao ;
	$bd[ret]="xml";
	$sql->pesquisar($bd);
}

function MaxInscricao() {
	$sql = new cmd_SQL();
	$bd[sql]="SELECT inscricao as qtd FROM totais";
	$bd[ret]="xml";
	$sql->pesquisar($bd);
}

function TotalVagas($idTurma) {
	$sql = new cmd_SQL();
	$bd[sql]="select qtd, qtd_vagas from
			(SELECT count(id_cidadao) as qtd FROM atv_matricula where id_turma = " . $idTurma . ") as matriculados,
			(Select qtd_vagas from atv_turma where id_turma = " . $idTurma . ") as vagas";
	$bd[ret]="xml";
	$sql->pesquisar($bd);
}

function VerificaHorario($idCidadao, $idTurma) {
	$sql = new cmd_SQL();
	$bd[sql]="SELECT matIDTurma, matData, matHoraInicio, matHoraFim, inscData, inscHoraInicio, inscHoraFim from

			(SELECT at.id_turma as matIDTurma, at.dt_inic_curso as matData, ap.hora_inicio as matHoraInicio, ap.hora_fim as matHoraFim
			FROM atv_matricula am inner join atv_turma at using (id_turma)
			inner join atv_periodo ap using(id_turma)
			where am.id_cidadao = " . $idCidadao . ") as mat,
			
			(SELECT at.id_turma as inscIDTurma, at.dt_inic_curso as inscData, ap.hora_inicio as inscHoraInicio, ap.hora_fim as inscHoraFim
			FROM atv_turma at inner join atv_periodo ap using(id_turma)
			where at.id_turma = " . $idTurma . ") as insc";
	$bd[ret]="xml";
	$sql->pesquisar($bd);
}

function exibe_xml($xml) {
	$xml = "<?xml version='1.0' encoding='utf-8' ?><raiz> $xml </raiz> ";
	header("Content-type: application/xml");
	echo $xml;
}

function PesqCurso() {

	$sql = new cmd_SQL();
	$bd[sql] = "SELECT distinct atividade FROM atv_turma order by atividade";
	$bd[ret] = "xml";
	$sql->pesquisar($bd);

}

function PesqTurma() {
	$condicao = "";
	if (isset ($_POST["curso"])) {
		$condicao = "atividade like '" . $_POST["curso"] . "%'";
	}

	if (isset ($_POST["turma"])) {
		$condicao = "nome_turma like '" . $_POST["turma"] . "%'";
	}

	$sql = new cmd_SQL();
	$bd[sql] = "SELECT * FROM atv_turma ";
	if ($condicao != "") {
		$bd[sql] .= "where " . $condicao;
	}
	$bd[sql] .= " order by nome_turma";
	$bd[ret] = "xml";
	$sql->pesquisar($bd);

}

function PesqHorario() {
	$sql = new cmd_SQL();
	$bd[sql] = "SELECT ap.id_periodo, ap.id_dia, ad.desc_dia as dia, ap.hora_inicio as inicio, ap.hora_fim as termino, ap.id_turma
				FROM atv_periodo ap inner join atv_dia ad on ap.id_dia = ad.id_dia
     			WHERE ap.id_turma = " . $_POST["turma"] . "";
	$bd[ret] = "xml";
	$sql->pesquisar($bd);
}

function CarregaEscola() {
	$sql = new cmd_SQL();
	$bd[sql] = "SELECT nome,idEscola FROM escola ";
	if($_SESSION['restringeEscola'] == "s"){
		$bd[sql] .= "INNER JOIN `mostraeducficha`.`usuarioEscola` ";
		$bd[sql] .= "USING(idEscola) WHERE idUsuario = '" . $_SESSION['idUsuario'] . "'";
	}
	$bd[sql] .= " order by nome ";
	$bd[ret] = "xml";
	$sql->pesquisar($bd);
}

function CarregaCategoria() {
	$sql = new cmd_SQL();
	$bd[sql] = "SELECT idCategoria,descCategoria  FROM categoria order by descCategoria ";
	$bd[ret] = "xml";
	$sql->pesquisar($bd);
}
?>