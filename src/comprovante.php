<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
require_once ("CommandSQL.php");
	
	
	MontaRelatorio($_GET["id"]);

	
	function MontaRelatorio($idCidadao){
		$varConteudo = ConsultaLista($idCidadao);
		$i = 0;
		$varPosicao = 0;
		$ultimoIDTurma = 0;
		if ($varConteudo) {
			echo "<style type=text/css>
			.par{
			background-color: #CCCCCC;
			font: 14px verdana, arial, helvetica, sans-serif;
			color: #000000;
			border:1px solid  #000000;
			border-bottom-style: outset;
			margin-top:7px;
			margin-right: 15px;
			height:30px;
			width: auto;
			}
			.impar{
			background-color: white;
			font: 14px verdana, arial, helvetica, sans-serif;
			color: #000000;
			border:1px solid  #000000;
			border-bottom-style: outset;
			margin-top:7px;
			margin-right: 15px;
			height:30px;
			width: auto;
			}		
			.tabela{
			background-color: #AAAAAA;
			font: 20px verdana, arial, helvetica, sans-serif;
			color: black;
			border:1px solid  #CCCCCC;
			border-bottom-style: outset;
			margin-top:7px;
			margin-right: 15px;
			height:30px;
			width: auto;	
			}
			.corpo{
			font: 12px verdana, arial, helvetica, sans-serif;
			margin-top:7px;
			margin-right: 15px;
			width: auto;	
			}	
			</style>
			
			<style type=text/css media='print'>
			#landscape { 
			writing-mode: tb-rl;
			height: 80%;
			margin: 10% 0%;
			}
			
			.esconde{
			visibility: hidden;
			}
			.par{
			background-color: #CCCCCC;
			font: 14px verdana, arial, helvetica, sans-serif;
			color: #000000;
			border:1px solid  #000000;
			border-bottom-style: outset;
			margin-top:7px;
			margin-right: 15px;
			height:30px;
			width: auto;
			}
			.impar{
			background-color: white;
			font: 14px verdana, arial, helvetica, sans-serif;
			color: #000000;
			border:1px solid  #000000;
			border-bottom-style: outset;
			margin-top:7px;
			margin-right: 15px;
			height:30px;
			width: auto;
			}		
			.tabela{
			background-color: #AAAAAA;
			font: 20px verdana, arial, helvetica, sans-serif;
			color: black;
			border:1px solid  #CCCCCC;
			border-bottom-style: outset;
			margin-top:7px;
			margin-right: 15px;
			height:30px;
			width: auto;	
			}
			.corpo{
			font: 12px verdana, arial, helvetica, sans-serif;
			margin-top:7px;
			margin-right: 15px;
			width: auto;	
			}	
			</style>
			<html><head></head>
			<body>
			<a href='#' class=esconde onclick='window.print();'>[Imprimir Lista]</a>
			<table width=950>
			<tr>
			<td width=130><div align=center><img src=../imagem/Educacao_Quadrado.jpg width=71></div></td>
			<td class=corpo width=690 height=38><center><b><font size=6>Mostra da Educa&ccedil;&atilde;o 2011</font></b></center>
			<div align=center><i>Revelando Saberes, socializando pr&aacute;ticas na constru&ccedil;&atilde;o da qualidade social da Educa&ccedil;&atilde;o</i></div></td>
			<td width=130 height=38></td>
			</tr>
			</table>
			<table border=0px width=950>
			<tr>
			<td class=corpo width=949><center><i><b><font size=5>" . $varConteudo[0]['nome_cid'] . "</b><br>CPF: " . $varConteudo[0]['cpf_cid'] . "</font></i></center></td>
			</tr>
			<tr>
			<td class=corpo width=949><center><font size=4><p></p>Parab&eacute;ns!<br>Voc&ecirc; est&aacute; participando das atividades da Mostra Educa&ccedil;&atilde;o 2011.<br>Preste aten&ccedil;&atilde;o nos locais e hor&aacute;rios abaixo:</font></center></td>
			</tr>
			</table>
			<table width=950>
			<thead>
			<tr>
			<th class=tabela><center>Atividades</center></th>
			</tr>
			</thead>
			<tbody>";
			$i = 0;
			if ($varConteudo) {
				foreach ($varConteudo as $lin) {
					$varNomeAtividade = $varConteudo[$i]['nome_turma'];
					$varDataTurma = $varConteudo[$i]['dt_turma'];
					$varLocal = $varConteudo[$i]['local_palestra'];
					$varHora = $varConteudo[$i]['hora'];
					$linhas = "";
					if (($i+1) % 2) {
						$cor = "impar";
					} else {
						$cor = "par";
					}
					
					$linhas .= "<td class=" . $cor . " >" .
								"<center>" . utf8_encode($varNomeAtividade) . "<br>" .
								"Local: " . utf8_encode($varLocal) . " - Data: " . $varDataTurma . "<br>" .
								"" . utf8_encode($varHora) .
								"</center></td>";

					
					echo "<tr>" . $linhas . "</tr>";
					$i++;
				}
				echo '<tbody>
				<tfoot>
				<tr>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				</tr>
				</tfoot>
				</table>';
			}
		}
	}
	
	function ConsultaLista($idCidadao) {
		$sql = new cmd_SQL();
		$bd[sql] = "SELECT am.id_cidadao, c.nome_cid, c.cpf_cid, at.nome_turma, DATE_FORMAT(at.dt_inic_curso, '%d-%m-%Y') as dt_turma, local_palestra,
					concat(ad.desc_dia, ' - de ', ap.hora_inicio, ' a ', ap.hora_fim) hora
					FROM atv_matricula am inner join cidadao c using(id_cidadao)
					inner join atv_turma at using (id_turma)
					inner join atv_periodo ap using (id_turma)
					inner join atv_dia ad using (id_dia)
					where am.id_cidadao = " . $idCidadao . "
					order by at.dt_inic_curso, ap.id_dia";
		$bd[ret] = "php";
		$rs = $sql->pesquisar($bd);
		return $rs;
	}

?>

</body>
</html>