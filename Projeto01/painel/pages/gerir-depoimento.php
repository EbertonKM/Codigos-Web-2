<?php
	verificaPermissaoPagina(2);
	$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
	$porPagina = 2;
	$depoimentos = Painel::getAll(TABELA_DEPOIMENTOS, ($paginaAtual - 1)*$porPagina, $porPagina);
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
			</tr>
			<?php foreach($depoimentos as $key => $value) {?>
			<tr>
				<td format="data">
				<?php
					$data = explode('-', $value['data']);
					$data = $data[2].$data[1].$data[0];
					echo $data;
				?></td>
				<td><?php echo $value['nome'];?></td>
				<td><a href="" class="edit"><i class="fa-solid fa-pen"></i></a></td>
				<td><a href="" class="delete"><i class="fa-solid fa-trash"></i></a></td>
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