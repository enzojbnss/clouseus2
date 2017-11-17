<?php
session_start();

switch ($_POST["filtro"]) {
	case "sair" :
		sair();
		break;
}

function sair(){
	$_SESSION['idUsuario']= null;
}