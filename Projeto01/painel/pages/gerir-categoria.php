<?php
	verificaPermissaoPagina(2);
	if(isset($_GET['excluir'])) {
		$idExcluir = intval($_GET['excluir']);
		$tabela = TABELA_CATEGORIAS;
		Painel::delete($tabela, $idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'gerir-categoria');
	}else if(isset($_GET['order']) && isset($_GET['id'])) {
		Painel::orderItem($tabela, $_GET['order'], $_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
	$porPagina = 5;
	$categorias = Painel::getAll(TABELA_CATEGORIAS, (($paginaAtual - 1)*$porPagina), $porPagina);
?>

<div class="box-content">
	<h2><i class="fa-solid fa-table-list"></i> Categorias Cadastradas</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td>Nome</td>
				<td>Editar</td>
				<td>Excluir</td>
				<td>Descer</td>
				<td>Subir</td>
			</tr>
			<?php foreach($categorias as $key => $value) {?>
			<tr>
				<td><?php echo $value['nome']?></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-categoria?id=<?php echo $value['id'];?>" class="edit"><i class="fa-solid fa-pen"></i></a></td>
				<td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerir-categoria?excluir=<?php echo $value['id'];?>" class="delete"><i class="fa-solid fa-trash"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-categoria?order=up&id=<?php echo $value['id'];?>" class="order-down"><i class="fa-solid fa-circle-down"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-categoria?order=down&id=<?php echo $value['id'];?>" class="order-up"><i class="fa-solid fa-circle-up"></i></a></td>
			</tr>
			<?php }?>
		</table>
	</div>
	<div class="paginacao">
		<?php
		$totalPaginas = ceil(count(Painel::getAll(TABELA_CATEGORIAS)) / $porPagina);
		for($i = 1; $i <= $totalPaginas; $i++) {
			if($i == $paginaAtual)
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-categoria?pagina='.$i.'" class="page-selected">'.$i.'</a>';
			else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-categoria?pagina='.$i.'">'.$i.'</a>';
		}
		?>
	</div>
</div>