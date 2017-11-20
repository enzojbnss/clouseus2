<?php
require_once 'src/model/Hierarquia.php';
require_once 'src/model/Participante.php';
require_once 'src/dao/ParticipanteDao.php';
require_once 'src/utils/Result.php';

use src\dao\PartcipanteDao;
use src\model\Cargo;
use src\model\Participante;
use src\utils\Result;
use src\model\Hierarquia;
class ParticipanteController {
	private $page;
	public function __construct($page) {
		$this->page = $page;
	}
	public function index() {
		include $this->page->getRaiz ();
	}
	public function salvar() {
		$dao = new PartcipanteDao ();
		$participante = $this->getParticipante ();
		$foto = $_FILES ["image"];
		try {
			$file = file_get_contents ( $foto ['tmp_name'] );
		} catch ( Exception $e ) {
			$file = "";
		}
		$execute = $dao->incluir ( $participante, $file );
		$result = new Result ( [] );
		$result->useSimpleJson ($execute );
	}
	public function teste() {
		var_dump ( $_FILES ['image'] );
		$file = $_FILES ['image'];
		echo $file ['tmp_name'];
	}
	private function getParticipante() {
		$idHierarquia = $_POST ["participante_hierarquia_id"];
		$descricaoHierarquia = $_POST ["participante_hierarquia_descricao"];
		$id = $_POST ["participante_id"];
		$nomeCompleto = $_POST ["participante_nomeCompleto"];
		$nomeCracha = $_POST ["participante_nomeCracha"];
		$nomeEnpresa = $_POST ["participante_nomeEnpresa"];
		$cargo = $_POST ["participante_cargo"];
		$dataNascimento = $_POST ["participante_dataNascimento"];
		$endereco = $_POST ["participante_endereco"];
		$emailProfissional = $_POST ["participante_emailProfissional"];
		$emailPessoal = $_POST ["participante_emailPessoal"];
		$telefone = $_POST ["participante_telefone"];
		$celular = $_POST ["participante_celular"];
		$propagandaMedica = $_POST ["participante_propagandaMedica"];
		$hospitalar = $_POST ["participante_hospitalar"];
		$acesso = $_POST ["participante_acesso"];
		$varejo = $_POST ["participante_varejo"];
		$consumer = $_POST ["participante_consumer"];
		$outro = $_POST ["participante_outro"];
		$musica = $_POST ["participante_musica"];
		$lugar = $_POST ["participante_lugar"];
		$hierarquia = new Hierarquia ( $idHierarquia, $descricaoHierarquia );
		return new Participante ( $id, $nomeCompleto, $nomeCracha, $nomeEnpresa, $cargo, $dataNascimento, $hierarquia, $endereco, $emailProfissional, $emailPessoal, $telefone, $celular, $propagandaMedica, $hospitalar, $acesso, $varejo, $consumer, $outro, $musica, $lugar );
	}
}