<?php
	verificaPermissaoPagina(1);
	if(isset($_GET['excluir'])) {
		$idExcluir = intval($_GET['excluir']);
		$tabela = TABELA_SLIDES;
		$selectImagem = MySql::conectar()->prepare("SELECT slide FROM `$tabela` WHERE id = ?;");
		$selectImagem->execute(array($idExcluir));
		$imagem = $selectImagem->fetch()['slide'];
		Painel::deleteFile($imagem);
		Painel::delete(TABELA_SLIDES, $idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'gerir-slide');
	}else if(isset($_GET['order']) && isset($_GET['id'])) {
		Painel::orderItem(TABELA_SLIDES, $_GET['order'], $_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
	$porPagina = 5;
	$slides = Painel::getAll(TABELA_SLIDES, (($paginaAtual - 1)*$porPagina), $porPagina);
?>

<div class="box-content">
	<h2><i class="fa-solid fa-table-list"></i> Listar Slides</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td>Nome</td>
				<td>Imagem</td>
				<td>Editar</td>
				<td>Excluir</td>
				<td>Descer</td>
				<td>Subir</td>
			</tr>
			<?php foreach($slides as $key => $value) {?>
			<tr>
				<td><?php echo $value['nome']?></td>
				<td><img class="img-gerir-slide" src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$value['slide'];?>" alt="<?php echo $value['slide'];?>"></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slide?id=<?php echo $value['id'];?>" class="edit"><i class="fa-solid fa-pen"></i></a></td>
				<td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerir-slide?excluir=<?php echo $value['id'];?>" class="delete"><i class="fa-solid fa-trash"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-slide?order=up&id=<?php echo $value['id'];?>" class="order-down"><i class="fa-solid fa-circle-down"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-slide?order=down&id=<?php echo $value['id'];?>" class="order-up"><i class="fa-solid fa-circle-up"></i></a></td>
			</tr>
			<?php }?>
		</table>
	</div>
	<div class="paginacao">
		<?php
		$totalPaginas = ceil(count(Painel::getAll(TABELA_SLIDES)) / $porPagina);
		for($i = 1; $i <= $totalPaginas; $i++) {
			if($i == $paginaAtual)
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-slide?pagina='.$i.'" class="page-selected">'.$i.'</a>';
			else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-slide?pagina='.$i.'">'.$i.'</a>';
		}
		?>
	</div>
</div>