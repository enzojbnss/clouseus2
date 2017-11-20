<style>
.logo {
	width: 100px;
	height: 100px;
}
</style>
<script type="text/javascript" src="js/model/Hierarquia.js"></script>
<script type="text/javascript" src="js/model/Participante.js"></script>
<script type="text/javascript"
	src="js/viewModel/ParticipanteViewModel.js"></script>
<script type="text/javascript" src="js/service/ParticipanteService.js"></script>
<script type="text/javascript" src="js/participante/index.js"></script>
<div class="container">
	<div style="width: 80px;"></div>
	<div class="jumbotron"
		style="margin-bottom: 10px; padding-bottom: 10px;">
		<img class="logo" alt="" src="img/logo_350.png">
		<div class="letreiro">
			<h2>
				<label>4º Encontro Nacional dos Gestores</label><br> <label>de
					Treinamento da Indústria Farmacêutica</label>
			</h2>
		</div>
	</div>
	<div class="jumbotron"
		style="background-color: #FFFFFF; opacity: 0.65; margin-top: 10px; padding-top: 10px;">
		<div class="form-horizontal">
			<h4>
				<label style="font-weight: lighter;">Não fique de fora! Garanta o
					seu lugar no encontro mais esperado do ano.</label>
			</h4>
			<div class="form-group">
				<div class="col-md-12">
					<input id="txtNomeCompleto" type="text" class="form-control"
						data-bind="value: txtNomeCompleto" required="required" size="45"
						maxlength="70" placeholder="*Nome Completo" /><input id="txtID"
						data-bind="value: txtID" type="hidden" id="txtID" size="45" />
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-md-12">
					<input id="txtNomeCracha" type="text" class="form-control"
						data-bind="value: txtNomeCracha" size="45" maxlength="70"
						placeholder="Nome para o crachá" />
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-md-12">
					<input id="txtNomeEmpresa" type="text" class="form-control"
						data-bind="value: txtNomeEmpresa" size="45" maxlength="70"
						placeholder="Nome da empresa" required="required" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<br> <input id="txtCargo" type="text" class="form-control"
						data-bind="value: txtCargo" size="45" maxlength="70"
						placeholder="*Cargo" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<select id="cboHierarquia" class="form-control"
						data-bind="foreach: answers">
						<option value="0">Selecione uma Hierarquia</option>
						<option value="1">Diretor</option>
						<option value="2">Gerente</option>
						<option value="3">Coordenador</option>
						<option value="4">Supervisor</option>
						<option value="5">Analista</option>
					</select>
				</div>
				<div class="col-md-2"
					style="height: 70px; width: 131px; text-align: right; border-right: 0px; padding-right: 0px;">
					<br> <label>Data de Nascimento</label>
				</div>
				<div class="col-md-3" style="width: 372px;">
					<input id="txtDataNascimento" title="Data de nascimento"
						data-bind="value:txtDataNascimento" class="form-control"
						type="date" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<input id="txtEmailProfissional" type="email" class="form-control"
						data-bind="value:txtEmailProfissional" size="50" maxlength="60"
						placeholder="*Email Profissional" r />
				</div>
				<div class="col-md-6">
					<input id="txtEmailPessoal" type="email" class="form-control"
						data-bind="value:txtEmailPessoal" size="50" maxlength="60"
						placeholder="Email Pessoal" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<br> <input id="txtTelefone" type="email" class="form-control"
						data-bind="value:txtTelefone" size="50" maxlength="60"
						placeholder="*Telefone" />
				</div>
				<div class="col-md-6">
					<br> <input id="txtCelular" type="email" class="form-control"
						size="50" maxlength="60" data-bind="value:txtCelular"
						placeholder="Celular Pessoal" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<br>*Área de responsabilidade:
				</div>
			</div>
			<br>
			<div class="form-group" style="text-align: left;">
				<div class="col-md-3">&nbsp;</div>
				<div class="col-md-2" style="width: 158px;">
					<div class="checkbox">
						<label for="optPropagandaMedica"><input id="optPropagandaMedica"
							type="checkbox" style="width: 15px; height: 15px; top: 3px;" />Propaganda
							Médica</label>
					</div>
				</div>
				<div class="col-md-1" style="width: 100px;">
					<div class="checkbox">
						<label for="optHospitalar" style="left: 0px;"><input
							id="optHospitalar" type="checkbox"
							style="width: 15px; height: 15px; top: 3px;" />Hospitalar</label>
					</div>
				</div>
				<div class="col-md-1">
					<div class="checkbox">
						<label for="optAcesso" style="left: 0px;"><input id="optAcesso"
							type="checkbox" style="width: 15px; height: 15px; top: 3px;" />Acesso</label>
					</div>
				</div>
				<div class="col-md-1">
					<div class="checkbox">
						<label for="optVarejo"><input id="optVarejo" type="checkbox"
							style="width: 15px; height: 15px; top: 3px;" />Varejo</label>
					</div>
				</div>
				<div class="col-md-1">
					<div class="checkbox">
						<label for="optConsumer"><input id="optConsumer" type="checkbox"
							style="width: 15px; height: 15px; top: 3px;" />Consumer</label>
					</div>
				</div>
				<div class="col-md-3">&nbsp;</div>
			</div>
			<div class="form-group">
				<div class="col-md-1">&nbsp;</div>
				<div class="col-md-10">
					<input id="txtOutro" type="text" class="form-control"
						data-bind="value: txtOutro" size="45" maxlength="70"
						placeholder="Outros" />
				</div>
				<div class="col-md-1">&nbsp;</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<br>
					<textarea id="txtMusica" rows="3" cols="5" name="txtEmail"
						data-bind="value: txtMusica" class="form-control"
						placeholder="Qual sua música favorita?"></textarea>
				</div>
				<div class="col-md-6">
					<br>
					<textarea id="txtLugar" rows="3" cols="5" type="text"
						class="form-control" size="50" maxlength="60"
						data-bind="value: txtLugar"
						placeholder="Qual seu lugar favorito no mundo?"></textarea>
				</div>
			</div>
			<br>
			<form  id="formImage" method="post" enctype="multipart/form-data" action="">
				<div class="form-group">
					<div class="col-md-12">
						<label>Anexe aqui uma foto sua de formato JPG para o seu crachá: <input
							id="txtImg" type="file" name="txtImg"
							accept="image/png, image/jpeg" multiple /></label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<img id="objImg" alt="" src="" width="100" height="100">
					</div>
				</div>
			</form>
			<div class="form-group">
				<div class="col-md-12">
					<label style="font-size: 12px">todos os campos com * são de
						preenchimento Obrigatiro</label>
				</div>
				<div class="col-md-12">
					<button type="button" name="cmdSalvar" id="cmdSalvar">Salvar</button>
					<button type="reset" name="cmdLimpar" id="cmdLimpar">Limpar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="jumbotron">
		<div>
			<img class="logos" alt="" src="img/logos.png">
		</div>
	</div>
</div>
<input id="txtEndereco" type="hidden" data-bind="value:txtEndereco"
	placeholder="Endereco" value="Campo inativado a pedido do cliente" />