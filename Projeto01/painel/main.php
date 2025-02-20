<?php
	if(isset($_GET['logout'])){
		Painel::logout();
	}           
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Font awsome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
		integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL;?>css/style.css">
	<link rel="shortcut icon" href="<?php echo INCLUDE_PATH;?>favicon.ico" type="image/x-icon">
	<title>Painel de controle</title>
</head>
<body>
	<aside>
		<div class="box-usuario">
			<?php if($_SESSION['img'] == '') { ?>
			<div class="avatar-usuario">
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>perfil">
					<i class="fa-solid fa-user"></i>
				</a>
			</div>
			<?php }else { ?>
			<div class="imagem-usuario">
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>perfil">
					<img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $_SESSION['img'];?>">
				</a>
			</div>
			<?php } ?>
			<div class="nome-usuario">
				<h2><?php echo $_SESSION['nome']?></h2>
				<p><?php echo Painel::pegaCargo($_SESSION['cargo']);?></p>
			</div>
		</div>
		<div class="items-menu">
			<h2 <?php verificaPermissaoMenu(2)?>>Cadastro</h2>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-slide"><?php selecionarMenu('cadastrar-slide')?> Slide</a>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-depoimento"><?php selecionarMenu('cadastrar-depoimento')?> Depoimentos</a>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-servico"><?php selecionarMenu('cadastrar-servico')?> Serviços</a>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-categoria"><?php selecionarMenu('cadastrar-categoria')?> Categorias</a>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-noticia"><?php selecionarMenu('cadastrar-noticia')?> Notícias</a>
			<h2 <?php verificaPermissaoMenu(2)?>>Gestão</h2>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-slide"><?php selecionarMenu('gerir-slide')?> Slide</a>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-depoimento"><?php selecionarMenu('gerir-depoimento')?> Depoimentos</a>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-servico"><?php selecionarMenu('gerir-servico')?> Serviços</a>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-categoria"><?php selecionarMenu('gerir-categoria')?> Categorias</a>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>gerir-noticia"><?php selecionarMenu('gerir-noticia')?> Notícias</a>
			<h2>Usuário</h2>
			<a <?php verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL;?>adicionar-usuario"><?php selecionarMenu('adicionar-usuario')?> Adicionar</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL;?>editar-usuario"><?php selecionarMenu('editar-usuario')?> Editar</a>
			<h2 <?php verificaPermissaoMenu(3)?>>Configuração</h2>
			<a <?php verificaPermissaoMenu(3)?> href="<?php echo INCLUDE_PATH_PAINEL;?>editar-configuracao"><?php selecionarMenu('editar-configuracao')?> Editar</a>
		</div>
	</aside>
	<header>
		<div class="center">
			<div class="menu-btn header-button">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>
		<div class="center">
			<div class="logout header-button">
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>?logout">
					<i class="fa-solid fa-right-from-bracket"></i>
				</a>
			</div>
			<div class="home-btn header-button" <?php verificaPermissaoMenu(1)?>>
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>">
					<i class="fa-solid fa-table-columns"></i>
				</a>
			</div>
			<div class="home-page-btn header-button">
				<a href="<?php echo INCLUDE_PATH;?>">
					<i class="fa-solid fa-house"></i>
				</a>
			</div>
			<div class="clear"></div>
		</div>
	</header>
	<div class="content">
		<?php 
			Painel::loadPage();
		?>
	</div>
	<!--Link do jQuery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
		integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!--Meu javascript-->
	<script src="<?php echo INCLUDE_PATH_PAINEL;?>js/main.js"></script>
	<!--jQuery Mask-->
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery_mask.js"></script>
</body>
</html>