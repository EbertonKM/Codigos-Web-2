<?php
if (isset($_GET['logout'])) {
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

	<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
	<link rel="shortcut icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon">
	<title>Painel de controle</title>
</head>

<body>
	<aside class="bg-fosco">
		<div class="box-usuario">
			<?php if ($_SESSION['img'] == '') { ?>
				<div class="avatar-usuario">
					<a href="<?php echo INCLUDE_PATH_PAINEL; ?>perfil">
						<i class="fa-solid fa-user"></i>
					</a>
				</div>
			<?php } else { ?>
				<div class="imagem-usuario">
					<a href="<?php echo INCLUDE_PATH_PAINEL; ?>perfil">
						<img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img']; ?>">
					</a>
				</div>
			<?php } ?>
			<div class="nome-usuario">
				<h2><?php echo $_SESSION['nome'] ?></h2>
				<p><?php echo Painel::pegaCargo($_SESSION['cargo']); ?></p>
			</div>
		</div>
		<div class="items-menu">
			<h2 <?php verificaPermissaoMenu(1) ?>>Cadastro</h2>
			<a <?php verificaPermissaoMenu(1) ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-slide"><?php selecionarMenu('cadastrar-slide') ?> Slide</a>
			<a <?php verificaPermissaoMenu(1) ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-informacao"><?php selecionarMenu('cadastrar-informacao') ?> Informações</a>
			<h2 <?php verificaPermissaoMenu(1) ?>>Gestão</h2>
			<a <?php verificaPermissaoMenu(1) ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>gerir-slide"><?php selecionarMenu('gerir-slide') ?> Slide</a>
			<a <?php verificaPermissaoMenu(1) ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>gerir-informacao"><?php selecionarMenu('gerir-informacao') ?> Informações</a>
			<h2>Usuário</h2>
			<a <?php verificaPermissaoMenu(1) ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>adicionar-usuario"><?php selecionarMenu('adicionar-usuario') ?> Adicionar</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-usuario"><?php selecionarMenu('editar-usuario') ?> Editar</a>
		</div>
	</aside>
	<header class="bg-fosco">
		<div class="center">
			<div class="menu-btn header-button">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>
		<div class="center">
			<div class="logout header-button">
				<a href="<?php echo INCLUDE_PATH_PAINEL; ?>?logout">
					<i class="fa-solid fa-right-from-bracket"></i>
				</a>
			</div>
			<div class="home-btn header-button" <?php verificaPermissaoMenu(1) ?>>
				<a href="<?php echo INCLUDE_PATH_PAINEL; ?>">
					<i class="fa-solid fa-table-columns"></i>
				</a>
			</div>
			<div class="home-page-btn header-button">
				<a href="<?php echo INCLUDE_PATH; ?>">
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
	<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
	<!--jQuery Mask-->
	<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery_mask.js"></script>
	<!--TinyMCE-->
	<!-- Place the first <script> tag in your HTML's <head> -->
	<script src="https://cdn.tiny.cloud/1/0r7kae7pvvmsdf8p40emry9yqa5dnerhc52bp07ce1ry7h42/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

	<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: [
				// Core editing features
				'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
				// Your account includes a free trial of TinyMCE premium features
				// Try the most popular premium features until Mar 9, 2025:
				'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
			],
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
			tinycomments_mode: 'embedded',
			tinycomments_author: 'Author name',
			mergetags_list: [{
					value: 'First.Name',
					title: 'First Name'
				},
				{
					value: 'Email',
					title: 'Email'
				},
			],
			ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
		});
	</script>
</body>

</html>