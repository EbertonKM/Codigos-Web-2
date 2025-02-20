<?php
	verificaPermissaoPagina(2);

	if(isset($_GET['id'])) {
		$id = (int) $_GET['id'];
		$categoria = Painel::get(TABELA_CATEGORIAS, 'id = ?', array($id));
	}else {
		Painel::messageToUser('erro', 'ID não existe');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa-solid fa-pen"></i> Editar Categoria</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])) {
				$slug = Painel::generateSlug($_POST['nome']);
				$arr = array_merge($_POST, array('slug' => $slug));
				$tabela = TABELA_CATEGORIAS;;
				$verificarCategoria = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ? AND id != ?");
				$verificarCategoria->execute(array($_POST['nome'], $id));
				if($verificarCategoria->rowCount() == 1) {
					Painel::messageToUser('erro', 'A categoria já existe');
				}else {
					if(Painel::update($arr, $tabela, $id)) {
						Painel::messageToUser('sucesso', 'Serviço editado com sucesso');
						$categoria = Painel::get($tabela, 'id = ?', array($id));
					}else {
						Painel::messageToUser('erro', 'Não foi possivel editar o serviço, campos vazios não são permitidos');
					}	
				}
			}
		?>
		<div class="form-group">
			<label for="categoria">Categoria: </label>
			<input type="text" name="nome" value="<?php echo $categoria['nome']?>">
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>
</div>