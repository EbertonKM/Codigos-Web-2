<?php
$tabela = TABELA_SLIDES;
$slides = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
$slides->execute();
$slides = $slides->fetchAll();
?>
<!--Banner-Principal-->
<section class="banner-principal">
	<?php foreach($slides as $key => $value) {?>
		<div style="background-image:url('<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['slide']?>');"class="banner-single"></div><!--Banner single-->
	<?php }?>
		<div class="overlay"></div>
		<div class="center">
			<form action="">
				<h2>Qual o seu melhor e-mail?</h2>
				<input type="email" name="email" id="email" required>
				<input type="submit" name="enviar" value="Enviar">
			</form>
		</div>
		<div class="bullets"></div> <!--Bullets do carrossel-->
	</section>

	<!--Descricao-autor-->
	<section class="descricao-autor">
		<div class="center">
			<div class="w50 left">
				<h2><?php echo $infosite['nome_autor']?></h2>
				<p><?php echo $infosite['descricao']?></p>
			</div>
			<div class="w50 left">
				<img src="<?php echo INCLUDE_PATH;?>assets/img/local-trabalho.png" alt="Local de trabalho">
			</div>
			<!--Clear float-->
			<div class="clear"></div>
		</div>
	</section>

	<!--Especialidades-->
	<section class="especialidades">
		<div class="center">
			<h2 class="title">Especialidades</h2>
			<div class="w33 left box-especialidades">
				<h3><i class="<?php echo $infosite['icone1']?>"></i></h3>
				<p><?php echo $infosite['descricao1']?></p>
			</div>
			<div class="w33 left box-especialidades">
				<h3><i class="<?php echo $infosite['icone2']?>"></i></h3>
				<p><?php echo $infosite['descricao2']?></p>
			</div>
			<div class="w33 left box-especialidades">
				<h3><i class="<?php echo $infosite['icone3']?>"></i> </h3>
				<p><?php echo $infosite['descricao3']?></p>
			</div>
			<!--Clear float-->
			<div class="clear"></div>
		</div>
	</section>

	<!--Extras-->
	<section class="extras">
		<div class="center">
			<div id="depoimentos" class="w50 left depoimentos-container">
				<h2 class="title">Depoimentos</h2>
				<?php
				$tabela = TABELA_DEPOIMENTOS;
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id DESC LIMIT 3");
				$sql->execute();
				$depoimentos = $sql->fetchAll();
				foreach($depoimentos as $key => $value) { ?>
					<div class="depoimento-single">
						<p class="depoimento-descricao">
							<?php echo $value['depoimento']; ?>
						</p>
						<p class="nome-autor"><?php echo $value['nome']?> - <?php echo Util::dateFormat($value['data'])?></p>
					</div>
				<?php } ?>
			</div>
			<div id="servicos" class="w50 left serviços-container">
				<h2 class="title">Serviços</h2>
				<div class="servicos">
					<ul>
					   <?php
					   	$tabela = TABELA_SERVICOS;
					 	$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id DESC LIMIT 3");
						$sql->execute();
						$servicos = $sql->fetchAll();
						foreach($servicos as $key => $value) {?>
							<li>
								<?php echo $value['servico'];?>
							</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</section>