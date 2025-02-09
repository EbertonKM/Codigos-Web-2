<?php
	verificaPermissaoPagina(2);
	if(isset($_GET['excluir'])) {
		$idExcluir = intval($_GET['excluir']);
		Painel::delete(TABELA_DEPOIMENTOS, $idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'gerir-depoimento');
	}else if(isset($_GET['order']) && isset($_GET['id'])) {
		Painel::orderItem(TABELA_DEPOIMENTOS, $_GET['order'], $_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
	$porPagina = 5;
	$depoimentos = Painel::getAll(TABELA_DEPOIMENTOS, (($paginaAtual - 1)*$porPagina), $porPagina);
?>

<div class="box-content">
	<h2><i class="fa-solid fa-table-list"></i> Listar Depoimentos</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td>Data</td>
				<td>Nome</td>
				<td>Editar</td>
				<td>Excluir</td>
				<td>Descer</td>
				<td>Subir</td>
			</tr>
			<?php foreach($depoimentos as $key => $value) {?>
			<tr>
				<td><?php echo Util::dateFormat($value['data'])?></td>
				<td><?php echo $value['nome'];?></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-depoimento?id=<?php echo $value['id'];?>" class="edit"><i class="fa-solid fa-pen"></i></a></td>
				<td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerir-depoimento?excluir=<?php echo $value['id'];?>" class="delete"><i class="fa-solid fa-trash"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-depoimento?order=up&id=<?php echo $value['id'];?>" class="order-down"><i class="fa-solid fa-circle-down"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-depoimento?order=down&id=<?php echo $value['id'];?>" class="order-up"><i class="fa-solid fa-circle-up"></i></a></td>
			</tr>
			<?php }?>
		</table>
	</div>
	<div class="paginacao">
		<?php
		$totalPaginas = ceil(count(Painel::getAll(TABELA_DEPOIMENTOS)) / $porPagina);
		for($i = 1; $i <= $totalPaginas; $i++) {
			if($i == $paginaAtual)
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-depoimento?pagina='.$i.'" class="page-selected">'.$i.'</a>';
			else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-depoimento?pagina='.$i.'">'.$i.'</a>';
		}
		?>
	</div>
</div>