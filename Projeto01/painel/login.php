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
    <div class="box-login">
        <div class="cabecalho">
            <img src="../ifpr-logo.png">
            <h3>Entrar na sua conta:</h3>
        </div>
        <?php
            if(isset($_POST['acao'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $sql = MySql::conectar() -> prepare("SELECT * FROM `tb_admin.usuarios` WHERE usuario = ? AND senha = ?;");
                $sql -> execute(array($user, $password));
                if($sql->rowCount() == 1) {
                    $info = $sql->fetch();
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['img'] = $info['img'];
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['cargo'] = $info['cargo'];
                    header('Location:'.INCLUDE_PATH_PAINEL);
                    die();
                } else {
                    echo '<div class="erro-box">Usuário ou senha incorretos</div>';
                }
            }
        ?>
        <form method="post">
            <input type="text" name="user" placeholder="Login" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit" name="acao" value="Login">
        </form>
        <a href="<?php echo INCLUDE_PATH;?>" class="voltar">Voltar</a>
    </div>
</body>
</html>