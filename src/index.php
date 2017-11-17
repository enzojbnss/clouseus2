<?php
/**********************************************************************
 *  PREFEITURA MUNUCIPLA DE GUARULHOS                                 *
 *  SECRETARIA MUNICIPAL DA EDUCA��O                                  *
 *  DPIE - DEPARTAMENTO DE PLANEJANMENTO E INFORMÁTICA NA EDUCA��O   *
 *  PROVINHA BRASIL                                                   *
 *                                                                    *
 *  Copyright 2010, 2011, 2012 da Prefeitura Municipal de Guarulhos - *
 *  Secretaria de Educa��o                                            *
 *  Este arquivo � parte do programa Provinha Brasil.                 *
 *  O Provinha Brasil � um software livre; voc� pode redistribu�-lo   *
 *   e/ou modific�-lo dentro dos termos da Licen�a P�blica Geral GNU  *
 *   como publicada pela Funda��o do Software Livre (FSF); na vers�o 2*
 *  da  licen�a.                                                      *
 *  Este programa � distribu�do na esperan�a que possa ser �til,      *
 *   mas SEM NENHUMA GARANTIA;uma garantia impl�cita de ADEQUA��O a   *
 *   qualquer MERCADO ou APLICA��O EM PARTICULAR.                     *
 *  Veja a Licen�a P�blica Geral GNU/GPL em portugu�s para            *
 *   maiores detalhes.                                                *
 *  Voc� deve ter recebido uma c�pia da Licen�a P�blica Geral GNU,    *
 *   sob o t�tulo "LICENCA.txt",                                      *
 *  junto com este programa, se n�o, acesse o Portal do Software      *
 *   P�blico Brasileiro no endere�o www.softwarepublico.gov.br ou     *
 *   escreva para a Funda��o do Software Livre (FSF) Inc.,            *
 *   51 Franklin St, Fifth Floor, Boston, MA 02110-1301, USA          *
 **********************************************************************
 EXECUTA UM QUERY PARA SABER SE O USUARIO EXISTE OU SE A SENHA DIGITADA
 EST� CORRETA, VERIFITANBEM SE O USUARIO EST� VINCULADO A UMA ESCOLA
 AO FINAL ELE RETORNA UMA RESPOSTA PARA APLICA��O NUM DOCUMENTO NO
 FORMATO XML
 */
//SELECT idUsuario FROM `mostraeducficha`.`usuario` where login = '' and senha = '';
session_start();
require_once("cmd_sql.php");
$con = new cmd_SQL();
$db[sql]="SELECT idUsuario,senha FROM usuario ";
$db[sql]= $db[sql] . " WHERE login = '" . $_POST['nome'] . "'";
$db[ret] = "php";
$rs = $con->pesquisar($db);
$i = 0;
if($rs){
	foreach ($rs as $lin) {
		$idUsuario = $rs[$i]['idUsuario'];
		$senha = $rs[$i]['senha'];
		if ($senha == $_POST['senha']) {
			$_SESSION['idUsuario'] = $idUsuario;
			$dadosxml = '<men>ok</men>';
			$db[sql]="SELECT IF(COUNT(idEscola)= 1,IF(idEscola=0,true,false),false) teste ";
			$db[sql].="FROM `mostraeducficha`.`usuarioescola` ";
			$db[sql].="GROUP BY idUsuario HAVING idUsuario = '" . $idUsuario . "'";
			$db[ret] = "php";
			$rs = $con->pesquisar($db);
			if($rs){
				foreach ($rs as $lin) {
					$teste = $rs[$i]['teste'];
					if($teste){
						$_SESSION['restringeEscola'] = "n";
					}else{
						$_SESSION['restringeEscola'] = "s";
					}
				}
			}
		} else {
			$dadosxml = "<men>Usuário inexistente!</men>";
		}
	}
}else {
	$dadosxml = "<men>Usuário inexistente!</men>";
}
$meuxml = "<?xml version=\"1.0\" ?>";
$meuxml .= "<dados>$dadosxml </dados>";
header("Content-type: application/xml");
echo $meuxml;
