<?php
session_start();

switch ($_POST["filtro"]) {
	case "isLogado" :
		isLogado();
		break;
}

function isLogado(){
	if(isset($_SESSION['idUsuario'])){
		$conteudo = "<logado>s</logado>";
	}else{
		$conteudo = "<logado>n</logado>";
	}
	gerarXML($conteudo);
}


function gerarXML($conteudo){
	$meuxml = "<?xml version=\"1.0\" ?>";
	$meuxml .= "<dados>";
	$meuxml .= $conteudo;
	$meuxml .= "</dados>";
	header("Content-type: application/xml");
	echo $meuxml;
}