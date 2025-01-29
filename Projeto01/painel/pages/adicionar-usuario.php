<?php
    verificaPermissaoPagina(2);
?>

<div class="box-content">
    <h2><i class="fa-solid fa-user-plus"></i> Adicionar Usuário</h2>

    <form method="post" enctype="multipart/form-data">
        <?php
        if(isset($_POST['acap'])) {

        }
        ?>
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" required>
        </div>
        <div class="form-group">
            <label for="usuario">Usuário de Login: </label>
            <input type="text" name="usuario" required>
        </div>
        <div class="form-group">
            <label for="nome">Senha: </label>
            <input type="password" name="senha" required>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem: </label>
            <input type="file" name="imagem">
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Adicionar">
        </div>
    </form>
</div>