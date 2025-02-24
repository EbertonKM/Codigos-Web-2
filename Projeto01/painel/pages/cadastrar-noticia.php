<?php
	verificaPermissaoPagina(2);
?>

<div class="box-content">
	<h2><i class="fa-regular fa-newspaper"></i> Adicionar Notícia</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
		if(isset($_POST['acao'])) {
			$categoria_id = $_POST['categoria_id'];
			$titulo = $_POST['titulo'];
			$conteudo = $_POST['conteudo'];
			$capa = $_FILES['capa'];

			if($titulo == '' || $conteudo == '') {
				Painel::messageToUser('erro', 'Campos vazios não são permitidos');
			}else if($capa['tmp_name'] == '') {
				Painel::messageToUser('erro', 'É necessário selecionar uma imagem de capa');
			}else {
				if(Painel::validImage($capa) == false) {
					Painel::messageToUser('erro', 'A imagem precisa estar no formato jpeg, jpg ou png de até 750kb');
				}else {
					$tabela = TABELA_NOTICIAS;
					$verificarNoticia = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE titulo = ? AND categoria_id = ?");
					$verificarNoticia->execute(array($titulo, $categoria_id));
					if($verificarNoticia->rowCount() == 0) {
						$imagem = Painel::uploadFile($capa);	
						$slug = Painel::generateSlug($titulo);
						$arr = ['categoria_id' => $categoria_id,
								'titulo' => $titulo,
								'conteudo' => $conteudo,
								'capa' => $imagem,
								'order_id' => '0',
								'slug' => $slug];
						if(Painel::insert($arr, TABELA_NOTICIAS)) {
							Painel::messageToUser('sucesso', 'O cadastro foi realizado com sucesso');
						}else
							Painel::messageToUser('erro', 'Não foi possível cadastrar a notícia');
					}else
						Painel::messageToUser('erro', 'Já existe uma notícia com esse nome');
				}
			}
		}
		?>
		<div class="form-group">
			<label for="categoria_id">Categoria: </label>
			<select name="categoria_id" id="">
				<?php
				$categorias = Painel::getAll(TABELA_CATEGORIAS);
				foreach($categorias as $key => $value) { ?>
					<option <?php if($value['id'] == @$_POST['categoria_id']) echo 'selected'?> value="<?php echo $value['id']?>"><?php echo $value['nome']?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="titulo">Título: </label>
			<input type="text" name="titulo" value="<?php recoverPost('titulo')?>" required>
		</div>
		<div class="form-group">
			<label for="conteudo">Conteúdo: </label>
			<textarea class="tinymce" name="conteudo" id=""><?php recoverPost('conteudo')?></textarea>
		</div>
		<div class="form-group">
			<label for="imagem">Imagem: </label>
			<input type="file" name="capa">
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Adicionar">
		</div>
	</form>
</div>