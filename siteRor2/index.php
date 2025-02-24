<?php include('config.php');?>
<?php Site::updateUserOnline();?>
<?php Site::countUser();?>

<!DOCTYPE html>
<html lang="en, pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site descritivo do jogo Risk Of Rain 2">
    <meta name="keywords" content="risk-of-rain-2, rougue-like, jogos-online, terceira-pessoa, cartoon">

    <!--Link do Google Icons-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!--Link do css do Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Link do FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Link do css personalizado-->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>assets/css/style.css">

    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH;?>assets/img/logos/ror-fav.png" type="image/x-icon">
    <title>Risk of Rain 2</title>
</head>

<body>

    <?php
        //Obtendo a url se existir ou home
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        switch ($url) {
            case 'suporte':
                echo '<target target="suporte"/>';
                break;
            case 'sobre':
                echo '<target target="sobre"/>';
                break;
            case 'banner':
                echo '<target target="banner"/>';
                break;
            case 'informacoes':
                echo '<target target="informacoes"/>';
                break;
            case 'sobreviventes':
                echo '<target target="sobreviventes"/>';
                break;
            case 'mapas':
                echo '<target target="mapas"/>';
                break;
        }
    ?>

    <!--Background da página-->
    <?php
        $slides = Painel::getAll(TABELA_SLIDES);
        foreach($slides as $key => $value) {
    ?>
    <img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['slide']?>" alt="background-image" class="background">
    <?php } ?>
    

    <!--Header com uso do Bootstrap-->
    <header class="bg-fosco">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo INCLUDE_PATH;?>banner"><img src="<?php echo INCLUDE_PATH;?>assets/img/logos/ror-logo.png" alt="Logo" height="60px"
                        width="140px" class="hover-scale"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" aria-current="page" href="<?php echo INCLUDE_PATH;?>informacoes">Informações</a>
                        </li>
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>sobreviventes">Sobreviventes</a>
                        </li>
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>mapas">Mapas</a>
                        </li>
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>suporte">Suporte</a>
                        </li>
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>sobre">Sobre</a>
                        </li>
                        <li class="nav-item hover-scale ms-auto">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>painel"><i class="fa-solid fa-circle-user"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php
        //Se $url existe na pasta pages
        $arrayUrl = ['banner', 'informacoes', 'sobreviventes', 'mapas'];
        $paginaAtual = isset($paginaAtual) ? $paginaAtual : 'home';
        if(file_exists('pages/'.$url.'.php')) {
            include('pages/'.$url.'.php');
            $paginaAtual = $url;
            if($url == 'suporte' || $url == 'sobre') {
                $needsFooterFixing = true;
            }
        } else {
            if(in_array($url, $arrayUrl) && !in_array($paginaAtual, $arrayUrl)) {
                include('pages/home.php');
                $paginaAtual = $url;
            }else if (in_array($url, $arrayUrl) && in_array($paginaAtual, $arrayUrl)){
                //evita incluir o home duas vezes
            }else {
                include('pages/404.php');
                $paginaAtual = '404';
                $needsFooterFixing = true;
            }
        }
    ?>

    <!--Footer da página - Display grid-->
    <footer class="bg-fosco <?php if(isset($needsFooterFixing) && $needsFooterFixing) echo 'fixed-bottom'?>">
            <img src="assets/img/logos/hopoo-logo.png" alt="hopoo-logo" class="footer-logo">
            <h6 class="footer-texto">© Copyright 2012 - 2023 Hopoo Games, LLC</h6>
            <nav class="footer-opcoes">
                <a class="hover-scale" href="suporte.html">Suporte</a>
                <a class="hover-scale" href="sobre.html">Sobre</a>
            </nav>
    </footer>

    <!--Link do script do Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--Link do jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Link dos meus scripts-->
    <script src="<?php echo INCLUDE_PATH;?>assets/js/background.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/scroll.js"></script>
    <?php if($url == 'home' || in_array($url, $arrayUrl)) {?>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/tags.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/suporteFeedBack.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/novidades.js"></script>
    <?php }?>
</body>

</html>