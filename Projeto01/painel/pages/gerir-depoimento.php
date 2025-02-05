<?php
	verificaPermissaoPagina(2);
	$depoimentos = Painel::getAll('tb_admin.depoimentos');
?>

<div class="box-content">
	<h2><i class="fa-solid fa-table-list"></i> Listar Depoimentos</h2>
	
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