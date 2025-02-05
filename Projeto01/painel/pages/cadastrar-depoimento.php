<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa-regular fa-newspaper"></i> Cadastrar Depoimento</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])) {
				if(Painel::insert($_POST, TABELA_DEPOIMENTOS)) {
					Painel::messageToUser('sucesso', 'Depoimento cadastrado com sucesso');
				}else {
					Painel::messageToUser('erro', 'Não foi possivel cadastrar o depoimento');
				}
			}
		?>
		<div class="form-group">
			<label for="nome">Nome: </label>
			<input type="text" name="nome">
		</div>
		<div class="form-group">
			<label for="depoimento">Depoimento: </label>
			<textarea name="depoimento"></textarea>
		</div>
		<div class="form-group">
			<label for="data">Data: </label>
			<input type="date" name="data">
		<!--<input format="data" type="date" name="data">-->
		</div>
		
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar">
		</div>
	</form>
</div>