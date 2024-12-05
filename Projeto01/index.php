<?php include('config.php')?>

<!DOCTYPE html>
<html lang="en, pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <!--Font awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Style.css-->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>assets/css/style.css">
    <!--Fav Icon-->
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH;?>favicon.ico" type="image/x-icon">

    <title>IFPR</title>
</head>

<body>
    <?php
        //Obtendo a url se existir ou home
        $url = isset($_GET['url']) ? $_GET['url'] : 'home'; //equivalente a lógica de if(exists(get('url'))) {url = get(url)} else {url = 'home'}

        switch ($url) {
            case 'depoimentos':
                echo '<target target="depoimentos"/>';
                break;
            
            case 'servicos':
                echo '<target target="servicos"/>';
                break;
        }
    ?>

    <!--Header-->
    <header>
        <div class="center">
            <div class="logo left">
                <a href="<?php echo INCLUDE_PATH;?>"><img class="header-icon" src="<?php echo INCLUDE_PATH;?>ifpr-logo.png" alt="LOGOMARCA"></a>
            </div>
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>pagenotfound">404</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>painel"><i class="fa-solid fa-user"></i></a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="bars-mobile fa-solid fa-bars"></div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>pagenotfound">404</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>painel"><i class="fa-solid fa-user"></i></a></li>
                </ul>
            </nav>
            <!--Clear float-->
            <div class="clear"></div>
        </div>
    </header>

    <?php
        //Se $url existe
        if(file_exists('pages/'.$url.'.php')) {
            include('pages/'.$url.'.php');
        } else {
            if($url != 'depoimentos' && $url != 'servicos') {
                $is404 = true;
                include('pages/404.php');
            } else {
                include('pages/home.php');
            }
            
        }
    ?>

    <!--Footer-->
    <footer <?php if(isset($is404) && $is404) echo 'class="fixed-bottom"'?>>
        <div class="center">
            <p>Todos os direitos reservados!</p>
        </div>
    </footer>

    <!--Link do jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Meu JS-->
    <script src="<?php echo INCLUDE_PATH;?>assets/js/scripts.js"></script>

    <?php 
        if($url == 'home' || $url == 'depoimentos' || $url == 'servicos' || $url == '') {?>
            <script src="<?php echo INCLUDE_PATH;?>assets/js/slider.js"></script>
            <script src="<?php echo INCLUDE_PATH;?>assets/js/melhorEmail.js"></script>
            <!--Botão do Whats-->
            <a href="https://wa.me/5547969696969" class="btnWhatsapp" target="_blank">
                <i class="fa-brands fa-square-whatsapp"></i>
            </a>
    <?php } ?>

    <?php 
        if($url == 'home' || $url == '') {?>
            <script src="<?php echo INCLUDE_PATH;?>assets/js/especialidades.js"></script>
    <?php } ?>

</body>

</html>