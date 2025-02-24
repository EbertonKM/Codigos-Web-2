<div class="box-content">
    <h2><i class="fa-solid fa-user-pen"></i> Editar Usuário</h2>

    <form method="post" enctype="multipart/form-data">
        <?php
        if(isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];
            $objeto_usuario = new Usuario();

            //verificação de nulos e usuarios repetidos
            if($nome == '' || $usuario == '' || $senha == '') {
                Painel::messageToUser('erro', 'Todos os campos básicos precisam estar preenchidos');
            }else if(Usuario::userExists($usuario) && $usuario != $_SESSION['user']) {
                Painel::messageToUser('erro', 'O usuário informado esta indisponível');
            }else if($imagem['name'] != '') { 
                //O usuário selecionou uma imagem
                if(Painel::validImage($imagem)) {
                    Painel::deleteFile($imagem_atual);
                    $imagem = Painel::uploadFile($imagem);
                    if($objeto_usuario->updateUser($nome, $usuario, $senha, $imagem)){
                        $_SESSION['img'] = $imagem;
                        Painel::messageToUser('sucesso', 'Atualizado com sucesso');
                    }else {
                        Painel::messageToUser('erro', 'Erro ao atualizar informações, não foi possível atualizar com a imagem'); 
                    }
                }
            }else {
                //O usuário não selecionou uma imagem
                $imagem = $imagem_atual;
                if($objeto_usuario->updateUser($nome, $usuario, $senha, $imagem)) {
                    Painel::messageToUser('sucesso', 'Atualizado com sucesso');
                }else {
                    Painel::messageToUser('erro', 'Erro ao atualizar informações');
                }
            }
        }
        ?>
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome'];?>">
        </div>
        <div class="form-group">
            <label for="usuario">Usuário de login: </label>
            <input type="text" name="usuario" required value="<?php echo $_SESSION['user'];?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha: </label>
            <input type="password" name="senha" required value="<?php echo $_SESSION['password'];?>">
        </div>
        <div class="form-group">
            <label for="imagem">Imagem: </label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];?>">
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>