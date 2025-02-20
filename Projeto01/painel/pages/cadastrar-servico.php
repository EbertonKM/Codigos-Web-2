<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa-regular fa-newspaper"></i> Cadastrar Serviço</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])) {
				$arr = array_merge($_POST, array('order_id' => '0'));
				if(Painel::insert($arr, TABELA_SERVICOS)) {
					Painel::messageToUser('sucesso', 'Serviço cadastrado com sucesso');
				}else {
					Painel::messageToUser('erro', 'Não foi possivel cadastrar o serviço');
				}
			}
		?>
		<div class="form-group">
			<label for="servico">Serviço: </label>
			<textarea name="servico"></textarea>
		</div>		
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar">
		</div>
	</form>
</div>