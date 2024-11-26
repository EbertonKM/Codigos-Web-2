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
        
    </aside>
    <header>
        <div class="center">
            <div class="logout">
                <a href="<?php echo INCLUDE_PATH_PAINEL;?>?logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </header>
</body>
</html>