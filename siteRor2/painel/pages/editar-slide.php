<?php
	verificaPermissaoPagina(1);
	if(isset($_GET['id'])) {
		$id = (int) $_GET['id'];
		$slide = Painel::get(TABELA_SLIDES, 'id = ?', array($id));
	}else {
		Painel::messageToUser('erro', 'ID não existe');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa-solid fa-user-pen"></i> Editar Slide</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
		if(isset($_POST['acao'])) {
			$nome = $_POST['nome'];
			$imagem = $_FILES['imagem'];
			$imagem_atual = $_POST['imagem_atual'];

			if($imagem['name'] != '') {
				//O usuário selecionou uma imagem
				if(Painel::validImage($imagem)) {
					Painel::deleteFile($imagem_atual);
					$imagem = Painel::uploadFile($imagem);
					$arr = ['nome' => $nome, 'slide' => $imagem];
					Painel::update($arr, TABELA_SLIDES, $id);
					$slide = Painel::get(TABELA_SLIDES, 'id = ?', array($id));
					Painel::messageToUser('sucesso', 'Slide atualizado com a imagem');
				}else {
					Painel::messageToUser('erro', 'A imagem precisa estar no formato jpeg, jpg ou png de até 750kb');
				}
			}else {
				//O usuário não selecionou uma imagem
				$imagem = $imagem_atual;
				$arr = ['nome' => $nome, 'slide' => $imagem];
				Painel::update($arr, TABELA_SLIDES, $id);
				$slide = Painel::get(TABELA_SLIDES, 'id = ?', array($id));
				Painel::messageToUser('sucesso', 'Slide atualizado');
			}
		}
		?>
		<div class="form-group">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" required value="<?php echo $slide['nome'];?>">
		</div>
		<div class="form-group">
			<label for="imagem">Imagem: </label>
			<input type="file" name="imagem">
			<input type="hidden" name="imagem_atual" value="<?php echo $slide['slide'];?>">
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>
</div>