<?php
	verificaPermissaoPagina(2);
	if(isset($_GET['excluir'])) {
		$idExcluir = intval($_GET['excluir']);
		Painel::delete(TABELA_SERVICOS, $idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'gerir-servico');
	}else if(isset($_GET['order']) && isset($_GET['id'])) {
		Painel::orderItem(TABELA_SERVICOS, $_GET['order'], $_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
	$porPagina = 5;
	$servicos = Painel::getAll(TABELA_SERVICOS, (($paginaAtual - 1)*$porPagina), $porPagina);
?>

<div class="box-content">
	<h2><i class="fa-solid fa-table-list"></i> Listar Serviços</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td>Serviço</td>
				<td>Editar</td>
				<td>Excluir</td>
				<td>Descer</td>
				<td>Subir</td>
			</tr>
			<?php foreach($servicos as $key => $value) {?>
			<tr>
				<td><?php echo $value['servico'];?></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-servico?id=<?php echo $value['id'];?>" class="edit"><i class="fa-solid fa-pen"></i></a></td>
				<td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerir-servico?excluir=<?php echo $value['id'];?>" class="delete"><i class="fa-solid fa-trash"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-servico?order=up&id=<?php echo $value['id'];?>" class="order-down"><i class="fa-solid fa-circle-down"></i></a></td>
				<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-servico?order=down&id=<?php echo $value['id'];?>" class="order-up"><i class="fa-solid fa-circle-up"></i></a></td>
			</tr>
			<?php }?>
		</table>
	</div>
	<div class="paginacao">
		<?php
		$totalPaginas = ceil(count(Painel::getAll(TABELA_SERVICOS)) / $porPagina);
		for($i = 1; $i <= $totalPaginas; $i++) {
			if($i == $paginaAtual)
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-servico?pagina='.$i.'" class="page-selected">'.$i.'</a>';
			else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'gerir-servico?pagina='.$i.'">'.$i.'</a>';
		}
		?>
	</div>
</div>