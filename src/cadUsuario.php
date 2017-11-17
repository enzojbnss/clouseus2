<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulário DPIE</title>
<meta name="keywords" content="" />
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body >
<div id="cadastro">
<div id="middle">
<div id="right">
<div class="post">
<div class="post_content">
<form>
<h1><span class="style2"> <?php

require_once("CommandSQL.php");

$id = $_POST[id_cidadao];

if ($id>0) {
	Alterar($id);
}else {
	Incluir();
}

function Incluir() {
	$con = new cmd_SQL();

	setlocale(LC_CTYPE,"pt_BR");

	$db[tab]="cidadao";
	$db[campos]="
                                                cpf_cid, 
                                                nome_cid,                                                
                                                mae_cid,
                                                pai_cid,
                                                sexo_cid,
                                                dt_nasc_cid,
                                                endereco_cid,
                                                num_res_cid,
                                                cep_cid, 
                                                cidade,
                                                bairro,
                                                uf,
                                                tel_1_cid,
                                                tel_2_cid,
                                                tel_cel_cid, 
                                                email_cid,
                                                id_escolaridade,
                                                id_renda_familiar,
                                                obs_cid,
                                                dt_cadastro_cid
                                                ";
	$db[values]= "'".
	mb_strtoupper(utf8_decode($_POST["txtCPF"])) . "','".
	mb_strtoupper(utf8_decode($_POST["txtNome"])). "','" .
	mb_strtoupper(utf8_decode($_POST["txtNomeMae"])) . "','" .
	mb_strtoupper(utf8_decode($_POST["txtNomePai"])) . "','" .
	mb_strtoupper(utf8_decode($_POST["cboSexo"])) . "','" .
	mb_strtoupper(utf8_decode($_POST["cboNascAno"] . "-" . $_POST["cboNascMes"] . "-" . $_POST["cboNascDia"])) . "','".
	mb_strtoupper(utf8_decode($_POST["txtEndereco"]))."','".
	mb_strtoupper(utf8_decode($_POST["txtNumero"]))."','".
	mb_strtoupper(utf8_decode($_POST["txtCEP"]))."','".
	mb_strtoupper(utf8_decode($_POST["txtCidade"]))."','".
	mb_strtoupper(utf8_decode($_POST["txtBairro"]))."','".
	mb_strtoupper(utf8_decode($_POST["cboUF"]))."','".
	mb_strtoupper(utf8_decode($_POST["txtTelefone"]))."','".
	mb_strtoupper(utf8_decode($_POST["txtTelefone2"]))."','".
	mb_strtoupper(utf8_decode($_POST["txtCelular"]))."','".
	mb_strtolower($_POST["txtEmail"])."',".
	"'1'," .
	"'1','".
	mb_strtoupper(utf8_decode($_POST["txtObs"]))."','".
	date('Y/m/d')."'";
	

	if ($con->incluir($db)) {
		echo " Cadastro realizado com Sucesso!";
		echo " <br><br>";
		echo " <a href='../inscricao.php'><img src='../imagem/sombra_fundo.png' width='50'>Inscrição</a>";
		
	}
	else {
		echo "insert into " . $db[tab] . "(" . $db[campos] . ")values(" . $db[values] . ")";
		echo " Erro na inclusão!";
	}
}

function Alterar(Usuario $usu, $id, $dados) {
	$con = new cmd_SQL();
	$db[sql]=" UPDATE cidadao SET
                                                rg_cid = " . mb_strtoupper (utf8_decode("'" . $usu->getRG() . "',")) .
                                                "cpf_cid = " . mb_strtoupper (utf8_decode("'" . $usu->getCPF() . "',")) .
                                                "nome_cid = " . mb_strtoupper (utf8_decode(("'" . $usu->getNome() . "',"))) .
                                                "mae_cid = " . mb_strtoupper (utf8_decode(("'" . $usu->getNomeMae() . "',"))).
                                                "pai_cid = " . mb_strtoupper (utf8_decode(("'" . $usu->getNomePai() . "',"))) .
                                                "sexo_cid = " . mb_strtoupper (("'" . $usu->getSexo() . "',")) .
                                                "dt_nasc_cid = " . mb_strtoupper (utf8_decode("'" . $usu->getDataNasc() . "',")) .
                                                "endereco_cid = " . mb_strtoupper (utf8_decode(("'" . $usu->getEndereco() . " ',"))) .
                                                "num_res_cid = " . mb_strtoupper (("'" . $usu->getNumero() . "',")) .
                                                "cep_cid = " . mb_strtoupper (("'" . $usu->getCEP() . "',")) .
                                                "cidade = " . mb_strtoupper (utf8_decode("'" . $usu->getCidade() . "',")) .
                                                "bairro = " . mb_strtoupper (utf8_decode("'" . $usu->getBairro() . "',")) .
                                                "tel_1_cid = " . mb_strtoupper (utf8_decode("'" . $usu->getTelefone() . "',")) .
                                                "tel_2_cid = " . mb_strtoupper (utf8_decode("'" . $usu->getTelefone2() . "',")) .
                                                "tel_cel_cid = " . mb_strtoupper (utf8_decode("'" . $usu->getCelular() . "',")) .
                                                "email_cid = " .mb_strtolower("'" . $usu->getEmail() . "',") .
                                                "obs_cid = " . mb_strtoupper (utf8_decode(("'" . $usu->getObs() . "',"))) .  
                                                "dt_cadastro_cid = " . mb_strtoupper (utf8_decode("'" . date('Y/m/d') . "'"));                                                

	$db[sql]= $db[sql] . " WHERE id_cidadao = " . $id;
	//echo $db[sql]; exit;

	if ($con->alterar($db)) {
		echo " Alterado com Sucesso!";
	}else {
		echo " Erro na alteração!";
	}
}


?> </span>
</h3>
<p>&nbsp;</p>
<p></p>
<br />
<br />

</form>
</div>
</div>
<div class="post"></div>
</div>
</div>
<div id="footer">
<div id="footer2">
<p>Prefeitura de Guarulhos - Secretaria de Educação</p>
</div>
</div>
</div>
<div style="text-align: center; font-size: 0.75em;"></div>
</body>
</html>
