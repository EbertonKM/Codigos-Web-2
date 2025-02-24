<?php
	verificaPermissaoPagina(2);
	if(isset($_GET['id'])) {
		$id = (int) $_GET['id'];
		$noticia = Painel::get(TABELA_NOTICIAS, 'id = ?', array($id));
	}else {
		Painel::messageToUser('erro', 'ID não existe');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa-solid fa-user-pen"></i> Editar Notícia</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
		if(isset($_POST['acao'])) {
			$titulo = $_POST['titulo'];
			$conteudo = $_POST['conteudo'];
			$imagem = $_FILES['imagem'];
			$imagem_atual = $_POST['imagem_atual'];
			$tabela = TABELA_NOTICIAS;
			$verificarNoticia = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE titulo = ? AND categoria_id = ? AND id != ?");
			$verificarNoticia->execute(array($titulo, $_POST['categoria_id'], $id));
			if($verificarNoticia->rowCount() == 0) {
				if($imagem['name'] != ''){
				//O usuário selecionou uma imagem
					if(Painel::validImage($imagem)) {
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$slug = Painel::generateSlug($titulo);
						$arr = ['categoria_id' => $_POST['categoria_id'], 'titulo' => $titulo, 'conteudo' => $conteudo, 'capa' => $imagem, 'slug' => $slug];
						Painel::update($arr, TABELA_NOTICIAS, $id);
						$noticia = Painel::get(TABELA_NOTICIAS, 'id = ?', array($id));
						Painel::messageToUser('sucesso', 'Notícia atualizada com a imagem');
					}else
						Painel::messageToUser('erro', 'A imagem precisa estar no formato jpeg, jpg ou png de até 750kb');	
				}else {
				//O usuário não selecionou uma imagem
				$imagem = $imagem_atual;
				$slug = Painel::generateSlug($titulo);
				$arr = ['categoria_id' => $_POST['categoria_id'], 'titulo' => $titulo, 'conteudo' => $conteudo, 'capa' => $imagem, 'slug' => $slug];
				Painel::update($arr, TABELA_NOTICIAS, $id);
				$noticia = Painel::get(TABELA_NOTICIAS, 'id = ?', array($id));
				Painel::messageToUser('sucesso', 'Notícia atualizada');
				}
			}else
				Painel::messageToUser('erro', 'Já existe uma notícia com esse título');
		}
		?>
		<div class="form-group">
			<label for="categoria_id">Categoria: </label>
			<select name="categoria_id" id="">
				<?php
				$categorias = Painel::getAll(TABELA_CATEGORIAS);
				foreach($categorias as $key => $value) { ?>
					<option <?php if($value['id'] == $noticia['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id']?>"><?php echo $value['nome']?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="titulo">Titulo: </label>
			<input type="text" name="titulo" required value="<?php echo $noticia['titulo'];?>">
		</div>
		<div class="form-group">
			<label for="conteudo">Conteúdo: </label>
			<textarea class="tinymce" name="conteudo" id=""><?php echo $noticia['conteudo'];?></textarea>
		</div>
		<div class="form-group">
			<label for="imagem">Imagem: </label>
			<input type="file" name="imagem">
			<input type="hidden" name="imagem_atual" value="<?php echo $noticia['capa'];?>">
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>
</div>