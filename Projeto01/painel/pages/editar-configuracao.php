<?php
	verificaPermissaoPagina(3);

	$site = Painel::get(TABELA_CONFIGURACOES, false);
?>
<div class="box-content">
	<h2><i class="fa-solid fa-pen"></i> Editar Configurações do Site</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])) {
				if(Painel::update($_POST, TABELA_CONFIGURACOES, 1,  true)) {
					Painel::messageToUser('sucesso', 'Site editado com sucesso');
					$site = Painel::get(TABELA_CONFIGURACOES, false);
				}else {
					Painel::messageToUser('erro', 'Não foi possivel editar o serviço, campos não podem estar vazios');
				}
			}
		?>
		<div class="form-group">
			<label for="titulo">Titulo do Site: </label>
			<input type="text" name="titulo" value="<?php echo $site['titulo']?>">
		</div>
		<div class="form-group">
			<label for="nome_autor">Nome do Autor do Site: </label>
			<input type="text" name="nome_autor" value="<?php echo $site['nome_autor']?>">
		</div>
		<div class="form-group">
			<label for="descricao">Descrição do Autor do Site: </label>
			<textarea name="descricao"><?php echo $site['descricao'];?></textarea>
		</div>
		<?php for($i = 1; $i <= 3; $i++) {?>
		<div class="form-group">
			<i class="<?php echo $site['icone'.$i]?>"></i>
			<label for="icone<?php echo $i?>">Nome do Ícone <?php echo $i?>: </label>
			<input type="text" name="icone<?php echo $i?>" value="<?php echo $site['icone'.$i]?>">
		</div>
		<div class="form-group">
			<label for="descricao<?php echo $i?>">Descrição do Ícone <?php echo $i?>: </label>
			<textarea name="descricao<?php echo $i?>"><?php echo $site['descricao'.$i];?></textarea>
		</div>
		<?php }?>
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>
</div>