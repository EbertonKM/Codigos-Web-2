<?php
	verificaPermissaoPagina(2);

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $depoimento = Painel::get(TABELA_DEPOIMENTOS, 'id = ?', array($id));
    }else {
        Painel::messageToUser('erro', 'ID não existe');
        die();
    }
?>
<div class="box-content">
	<h2><i class="fa-solid fa-pen"></i> Editar Depoimento</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])) {
				if(Painel::update($_POST, TABELA_DEPOIMENTOS, $id)) {
					Painel::messageToUser('sucesso', 'Depoimento editado com sucesso');
                    $depoimento = Painel::get(TABELA_DEPOIMENTOS, 'id = ?', array($id));
				}else {
					Painel::messageToUser('erro', 'Não foi possivel editar o depoimento, preencha todos os campos');
				}
			}
		?>
		<div class="form-group">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" value="<?php echo $depoimento['nome'];?>">
		</div>
		<div class="form-group">
			<label for="depoimento">Depoimento: </label>
			<textarea name="depoimento"><?php echo $depoimento['depoimento'];?></textarea>
		</div>
		<div class="form-group">
			<label for="data">Data: </label>
			<input type="date" name="data" value="<?php echo $depoimento['data'];?>">
		<!--<input format="data" type="date" name="data">-->
		</div>
		
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>
</div>