<?php include('config.php')?>

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
        }
    ?>

    <!--Background da página-->
    <img src="<?php echo INCLUDE_PATH;?>assets/img/backgrounds/background3.jpg" alt="background-image" class="background">
    <img src="<?php echo INCLUDE_PATH;?>assets/img/backgrounds/background2.jpg" alt="background-image" class="background">
    <img src="<?php echo INCLUDE_PATH;?>assets/img/backgrounds/background.jpg" alt="background-image" class="background">

    <!--Header com uso do Bootstrap-->
    <header class="bg-fosco">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo INCLUDE_PATH;?>home#banner"><img src="<?php echo INCLUDE_PATH;?>assets/img/logos/ror-logo.png" alt="Logo" height="60px"
                        width="140px" class="hover-scale"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" aria-current="page" href="<?php echo INCLUDE_PATH;?>home#informacoes">Informações</a>
                        </li>
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>home#sobreviventes">Sobreviventes</a>
                        </li>
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>home#mapas">Mapas</a>
                        </li>
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>suporte">Suporte</a>
                        </li>
                        <li class="nav-item hover-scale">
                            <a class="nav-link active" href="<?php echo INCLUDE_PATH;?>sobre">Sobre</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php
        //Se $url existe na pasta pages
        if(file_exists('pages/'.$url.'.php')) {
            include('pages/'.$url.'.php');
            if($url == 'suporte' || $url == 'sobre') {
                $needsFooterFixing = true;
            }
        } else {
            include('pages/404.php');
            $needsFooterFixing = true;
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
    <?php if($url == 'home') {?>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/tags.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/suporteFeedBack.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/novidades.js"></script>
    <?php }?>
</body>

</html>