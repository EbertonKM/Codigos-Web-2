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
    <title>Painel de controle</title>
</head>
<body>
    <aside>
        <div class="box-usuario">
            <?php if($_SESSION['img'] == '') { ?>
            <div class="avatar-usuario">
                <i class="fa-solid fa-user"></i>
            </div>
            <?php }else { ?>
            <div class="imagem-usuario">
                <img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $_SESSION['img'];?>">
            </div>
            <?php } ?>
            <div class="nome-usuario">
                <h2><?php echo $_SESSION['nome']?></h2>
                <p><?php echo pegaCargo($_SESSION['cargo']);?></p>
            </div>
        </div>
        <div class="items-menu">
            <h2>Cadastro</h2>
            <a href="">Slide</a>
            <a href="">Depoimentos</a>
            <a href="">Serviços</a>
            <h2>Gestão</h2>
            <a href="">Slide</a>
            <a href="">Depoimentos</a>
            <a href="">Serviços</a>
            <h2>Usuário</h2>
            <a href="">Adicionar</a>
            <a href="">Editar</a>
            <h2>Configuração</h2>
            <a href="">Editar</a>
        </div>
    </aside>
    <header>
        <div class="center">
            <div class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="center">
            <div class="logout">
                <a href="<?php echo INCLUDE_PATH_PAINEL;?>?logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </header>
    <div class="content">

    </div>
    <!--Link do jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Meu javascript-->
    <script src="<?php echo INCLUDE_PATH_PAINEL;?>js/main.js"></script>
</body>
</html>