<?php
	verificaPermissaoPagina(2);

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $servico = Painel::get(TABELA_SERVICOS, 'id = ?', array($id));
    }else {
        Painel::messageToUser('erro', 'ID não existe');
        die();
    }
?>
<div class="box-content">
	<h2><i class="fa-solid fa-pen"></i> Editar Serviço</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])) {
				if(Painel::update($_POST, TABELA_SERVICOS, $id)) {
					Painel::messageToUser('sucesso', 'Serviço editado com sucesso');
                    $servico = Painel::get(TABELA_SERVICOS, 'id = ?', array($id));
				}else {
					Painel::messageToUser('erro', 'Não foi possivel editar o serviço');
				}
			}
		?>
		<div class="form-group">
			<label for="servico">Serviço: </label>
			<textarea name="servico"><?php echo $servico['servico'];?></textarea>
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>
</div>