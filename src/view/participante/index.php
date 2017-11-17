<style>
.logo {
	width: 100px;
	height: 100px;
}
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
					<input name="txtNome" type="text" class="form-control" id="txtNome"
						required="required" size="45" maxlength="70"
						placeholder="Nome Completo" /> <input name="txtID" type="hidden"
						id="txtID" size="45" />
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtNome" type="text" class="form-control" id="txtNome"
						size="45" maxlength="70" placeholder="Nome para o crachá" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtNome" type="text" class="form-control" id="txtNome"
						size="45" maxlength="70" placeholder="Nome empresa"
						required="required" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<br> <input name="txtNome" type="text" class="form-control"
						id="txtNome" size="45" maxlength="70" placeholder="Cargo" />
				</div>
				<div class="col-md-3">
					<input title="Data de nascimento" id="txtDataNascimento"
						class="form-control" type="date" />
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtRua" type="text" class="form-control" id="txtRua"
						size="20" maxlength="60" placeholder="Endereco" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<br> <input name="txtEmail" type="email" class="form-control"
						id="txtEmail" size="50" maxlength="60"
						placeholder="Email Profissional" r />
				</div>
				<div class="col-md-6">
					<br> <input name="txtEmail" type="email" class="form-control"
						id="txtEmail" size="50" maxlength="60" placeholder="Email Pessoal" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<br> <input name="txtEmail" type="email" class="form-control"
						id="txtEmail" size="50" maxlength="60" placeholder="Telefone" />
				</div>
				<div class="col-md-6">
					<br> <input name="txtEmail" type="email" class="form-control"
						id="txtEmail" size="50" maxlength="60"
						placeholder="Celular Pessoal" />
				</div>
			</div>


			<div class="form-group">
				<div class="col-md-12">
					<br>Área de responsabilidade:
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
				<div class="col-md-1" style="width: 100px;" >
					<div class="checkbox">
						<label for="optHospitalar" style="left: 0px;"><input id="optHospitalar"
							type="checkbox" style="width: 15px; height: 15px; top: 3px;" />Hospitalar</label>
					</div>
				</div>
				<div class="col-md-1">
					<div class="checkbox">
						<label for="optAcesso" style="left: 0px;"><input id="optAcesso" type="checkbox"
							style="width: 15px; height: 15px; top: 3px;" />Acesso</label>
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
					<input name="txtNome" type="text" class="form-control" id="txtNome"
						size="45" maxlength="70" placeholder="Outros" />
				</div>
				<div class="col-md-1">&nbsp;</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<br>
					<textarea rows="3" cols="5" name="txtEmail" type="text"
						class="form-control" id="txtEmail" size="50" maxlength="60"
						placeholder="Qual sua música favorita?"></textarea>
				</div>
				<div class="col-md-6">
					<br>
					<textarea rows="3" cols="5" name="txtEmail" type="text"
						class="form-control" id="txtEmail" size="50" maxlength="60"
						placeholder="Qual seu lugar favorito no mundo?"></textarea>
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-md-12">
					<label>Anexe aqui uma foto sua de formato JPG para o seu crachá: <input
						type="file" name="arquivos" accept="image/png, image/jpeg"
						multiple /></label>
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-md-12">
					<button type="button" name="cmdSalvar" id="cmdSalvarPessoa">Salvar
					</button>
					<button type="reset" name="cmdLimpar" id="cmdLimparPessoa">Limpar</button>
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