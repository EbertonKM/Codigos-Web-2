<?php
	verificaPermissaoPagina(2);
?>

<div class="box-content">
	<h2><i class="fa-solid fa-square-poll-vertical"></i> Adicionar Categoria</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
		if(isset($_POST['acao'])) {
			$nome = $_POST['nome'];

			if($nome == '') {
				Painel::messageToUser('erro', 'Preencha o nome da categoria');
			}else {
				$tabela = TABELA_CATEGORIAS;
				$verificarCategoria = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ?");
				$verificarCategoria->execute(array($_POST['nome']));
				if($verificarCategoria->rowCount() == 0) {
					$slug = Painel::generateSlug($nome);
					$arr = ['nome' => $nome, 'slug' => $slug, 'order_id' => '0'];
					if(Painel::insert($arr, $tabela)) {
						Painel::messageToUser('sucesso', 'O cadastro da categoria foi realizada com sucesso');
					}else
						Painel::messageToUser('erro', 'Não foi possível cadastrar a categoria');
				}else
					Painel::messageToUser('erro', 'Já existe uma categoria com o nome informado');
			}
		}
		?>
		<div class="form-group">
			<label for="nome">Nome da Categoria: </label>
			<input type="text" name="nome" required>
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Adicionar">
		</div>
	</form>
</div>