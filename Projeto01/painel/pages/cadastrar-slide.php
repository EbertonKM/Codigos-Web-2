<?php
	verificaPermissaoPagina(2);
?>

<div class="box-content">
	<h2><i class="fa-solid fa-file-circle-plus"></i> Adicionar Slide</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
		if(isset($_POST['acao'])) {
			$nome = $_POST['nome'];
			$imagem = $_FILES['imagem'];

			if($nome == '') {
				Painel::messageToUser('erro', 'Preencha o nome do slide');
			}else if(Painel::validImage($imagem) == false) {
				Painel::messageToUser('erro', 'A imagem precisa estar no formato jpeg, jpg ou png de até 750kb');
			}else {
				$imagem = Painel::uploadFile($imagem);
				$arr = ['nome' => $nome, 'slide' => $imagem, 'order_id' => '0'];
				if(Painel::insert($arr, TABELA_SLIDES)) {
					Painel::messageToUser('sucesso', 'O cadastro do slide foi realizado com sucesso');
				}else
					Painel::messageToUser('erro', 'Não foi possível cadastrar o slide');
			}
		}
		?>
		<div class="form-group">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" required>
		</div>
		<div class="form-group">
            <label for="imagem">Imagem: </label>
            <input type="file" name="imagem">
        </div>
		<div class="form-group">
			<input type="submit" name="acao" value="Adicionar">
		</div>
	</form>
</div>