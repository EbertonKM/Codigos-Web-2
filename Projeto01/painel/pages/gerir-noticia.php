<?php
	verificaPermissaoPagina(2);
	if(isset($_GET['excluir'])) {
		$idExcluir = intval($_GET['excluir']);
		$tabela = TABELA_NOTICIAS;
		$selectImagem = MySql::conectar()->prepare("SELECT capa FROM `$tabela` WHERE id = ?;");
		$selectImagem->execute(array($idExcluir));
		$imagem = $selectImagem->fetch()['capa'];
		Painel::deleteFile($imagem);
		Painel::delete(TABELA_NOTICIAS, $idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'gerir-noticia');
	}else if(isset($_GET['order']) && isset($_GET['id'])) {
		Painel::orderItem(TABELA_NOTICIAS, $_GET['order'], $_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
	$porPagina = 5;
	$noticias = Painel::getAll(TABELA_NOTICIAS, (($paginaAtual - 1)*$porPagina), $porPagina);
?>

<div class="box-content">
	<h2><i class="fa-regular fa-newspaper"></i> Notícias Cadastradas</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td>Título</td>
				<td>Categoria</td>
				<td>Imagem</td>
				<td>Editar</td>
				<td>Excluir</td>
				<td>Descer</td>
				<td>Subir</td>
			</tr>
			<?php foreach($noticias as $key => $value) {
				$nomeCategoria = Painel::get(TABELA_CATEGORIAS, 'id = ?', array($value['categoria_id']))['nome'];	
			?>
			<tr>
				<td><?php echo $value['titulo']?></td>
				<td><?php echo $nomeCategoria ?></td>
				<td><img class="img-gerir-slide" src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$value['capa'];?>" alt="<?php echo $value['capa'];?>"></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-noticia?id=<?php echo $value['id'];?>" class="edit"><i class="fa-solid fa-pen"></i></a></td>
				<td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerir-noticia?excluir=<?php echo $value['id'];?>" class="delete"><i class="fa-solid fa-trash"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-noticia?order=up&id=<?php echo $value['id'];?>" class="order-down"><i class="fa-solid fa-circle-down"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-noticia?order=down&id=<?php echo $value['id'];?>" class="order-up"><i class="fa-solid fa-circle-up"></i></a></td>
			</tr>
			<?php }?>
		</table>
	</div>
	<div class="paginacao">
		<?php
		$totalPaginas = ceil(count(Painel::getAll(TABELA_NOTICIAS)) / $porPagina);
		for($i = 1; $i <= $totalPaginas; $i++) {
			if($i == $paginaAtual)
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-noticia?pagina='.$i.'" class="page-selected">'.$i.'</a>';
			else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-noticia?pagina='.$i.'">'.$i.'</a>';
		}
		?>
	</div>
</div>