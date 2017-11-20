<style>
.jumbotron {
	background-color: #FFFFFF;
	opacity: 0.65;
}

.logo {
    width : 100px;
    height:100px;
    margin: 30px;
    position: absolute;
    top: 5%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-80%, -60%) }
</style>



<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/select.js"></script>
<script type="text/javascript" src="js/objeto.js"></script>
<script type="text/javascript" src="js/funcoes.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/validacao.js"></script>
<script type="text/javascript" src="js/cadastro_pessoas.js"></script>




<div class="container">
	<div class=container4 >
		<img class="logo" alt="" src="img/logo_350.png">
	</div>
	<br><br><br><br><br><br>
	<div class="letreiro">
		<h2>
			<label>4º Encontro Nacional dos Gestores </label> <label>de
				Treinamento da Indústria Farmacêutica</label>
		</h2>
	</div>
	<div class="jumbotron">
		<div class="form-horizontal">
			<h3>
				<label>Dados Pessoais</label>
			</h3>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtNome" type="text" class="form-control" id="txtNome"
						size="45" maxlength="70" placeholder="Nome" /> <input name="txtID"
						type="hidden" id="txtID" size="45" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<select name="cboTipo" id="cboTipo" onchange=""
						class="form-control"><option value="">Cargo</option>
						<option value="1">Diretor</option>
						<option value="2">Gerente</option>
						<option value="31">Coordenador</option>
						<option value="4">Supervisor</option>
						<option value="5">Analista</option>
					</select>
				</div>
				<div class="col-md-3">
					<input id="txtDataNascimento" class="form-control" type="date" />
				</div>
				<br>
			</div>
		</div>
		<div class="form-horizontal">
			<h3>
				<label>Endereço</label>
			</h3>
			<div class="form-group">
				<div class="col-md-3">
					<input name="txtCEP" type="text" class="form-control" id="txtCEP"
						size="15" maxlength="8" placeholder="Cep"
						onkeypress="return EntradaNumerico(event)" />
				</div>
				<div class="col-md-3">
					<img src="img/lupa.gif" width="20" height="20" id="buscaCEP"
						style="cursor: pointer"></img><i> Ex: 99999999</i>

				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtRua" type="text" class="form-control" id="txtRua"
						size="20" maxlength="60" placeholder="Rua" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<select name="cboUF" id="cboUF" onchange="" class="form-control">
						<option value="">UF</option>
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="GO">Goiás</option>
						<option value="ES">Espírito Santo</option>
						<option value="MA">Maranhão</option>
						<option value="MT">Mato Grosso</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraiba</option>
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RN">Rio Grande do Norte</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Rorâima</option>
						<option value="SP">São Paulo</option>
						<option value="SC">Santa Catarina</option>
						<option value="SE">Sergipe</option>
						<option value="TO">Tocantins</option>
					</select>
				</div>
				<div class="col-md-3">
					<br> <input name="txtNumero" type="text" class="form-control"
						id="txtNumero" size="5" maxlength="6" placeholder="Número" />
				</div>
				<div class="col-md-4">
					<br> <input name="txtComplemento" type="text" class="form-control"
						id="txtComplemento" size="45" maxlength="60"
						placeholder="Complemento" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4">
					<input name="txtBairro" type="text" class="form-control"
						id="txtBairro" size="45" maxlength="60" placeholder="Bairro" />
				</div>
				<div class="col-md-4">
					<input name="txtCidade" type="text" class="form-control"
						id="txtCidade" size="45" maxlength="60" placeholder="Cidade" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<br> <input name="txtEmail" type="text" class="form-control"
						id="txtEmail" size="50" maxlength="60" placeholder="Email" />
				</div>
				<div class="col-md-2">
					<select name="cboTipo" id="cboTipo" onchange=""
						class="form-control"><option value="">Tipo</option>
						<option value="1">pessoal</option>
						<option value="2">profissional</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4">
					<button type="button" name="cmdSalvarPessoa" id="cmdSalvarPessoa">Salvar
					</button>
				</div>
				<div class="col-md-4">
					<button type="reset" name="cmdLimparPessoa" id="cmdLimparPessoa">Limpar
					</button>
				</div>
			</div>
		</div>
	</div>
</div>


