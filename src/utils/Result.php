<?php

namespace src\utils;

class Result {
	
	private $lista;
	
	public function __construct($lista){
		$this->lista = $lista; 
	}
	public function useXML() {
		// conta a qtde de elementos da matriz
		$numeroLinha = count ( $this->lista );
		$linhaAtual = 0;
		// EXTRAI A MATRIZ QUE CONTEM AS LINHAS DA TABELA
		foreach ( $this->lista as $chaveLinha => $valorLinha ) {
			
			if (is_array ( $valorLinha )) {
				$numeroColuna = count ( $valorLinha );
				$colunaAtual = 0;
				$mod = 0;
				// EXTRAI A MATRIZ DA COLUNA DA LINHA
				foreach ( $valorLinha as $chaveColuna => $valorColuna ) {
					
					if (($mod % 2) == 0) {
						$valorColuna = utf8_encode ( $valorColuna );
						$col .= "<$chaveColuna>$valorColuna</$chaveColuna>";
					}
					$colunaAtual ++;
					$mod ++;
					if ($colunaAtual > $numeroColuna)
						break;
				}
			} else {
				echo $chaveLinha . "<br>";
				$valorLinha = utf8_encode ( $valorLinha );
				$col .= "<$chaveLinha>$valorLinha</$chaveLinha>";
			}
			$linha .= "<linha>$col</linha>";
			$col = null;
			$linhaAtual ++;
			// $n = $this->lista->rowCount(); echo $n; exit;
			// echo $linha."<br>"; //LINHA SÓ P/ TESTE
			if ($linhaAtual > $numeroLinha) {
				break;
			}
		}
		// teste_xml($linha); //LINHA SÓ PARA TESTE
		$linha .= "<n_reg>$linhaAtual</n_reg>";
		$linha = "<?xml version='1.0' encoding='utf-8' ?>"."<reg>".$linha."</reg>";
		header("Content-type: application/xml;charset=UTF-8");
		echo  $linha;
	}
	
	public function useText($conteudo) {
		$numeroLinha = count ( $this->lista );
		$linhaAtual = 0;
		foreach ( $this->lista as $chaveLinha => $valorLinha ) {
			if (is_array ( $valorLinha )) {
				$numeroColuna = count ( $valorLinha );
				$colunaAtual = 0;
				$mod = 0;
				foreach ( $valorLinha as $chaveColuna => $valorColuna ) {
					if (($mod % 2) == 0) {
						
						$col .= "||ci" . $chaveColuna . "||cf" . $valorColuna . "||ci" . $chaveColuna . "|cf";
					}
					$colunaAtual ++;
					$mod ++;
					if ($colunaAtual > $numeroColuna)
						break;
				}
			} else {
				$col .= "||li" . $chaveLinha . "||lf" . $valorLinha . "||li" . $chaveLinha . "||lf";
			}
			$linha .= "||d_i" . $col . "||d_f";
			$col = null;
			$linhaAtual ++;
			if ($linhaAtual > $numeroLinha) {
				break;
			}
		}
		echo $linha; 
	}
	
	public function getObject(){
		return $this->lista;
	}
	
	public function useJson(){
		$obj = [];
		foreach ($this->lista as $index=>$objeto){
			array_push($obj, $objeto->jsonSerialize());
		}
		header("Content-type:application/json");
		echo json_encode($obj);
		
	}
	
	
}