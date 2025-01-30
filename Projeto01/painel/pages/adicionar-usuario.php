<?php
    verificaPermissaoPagina(2);
?>

<div class="box-content">
    <h2><i class="fa-solid fa-user-plus"></i> Adicionar Usuário</h2>

    <form method="post" enctype="multipart/form-data">
        <?php
        if(isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $login = $_POST['usuario'];
            $cargo = $_POST['cargo'];
            $senha = $_POST['senha'];
            $confirmacao = $_POST['confirmacao'];

            if($nome == '' || $login == '' || $cargo == '' || $senha == '') {
                Painel::messageToUser('erro', 'Preencha todos os campos');
            }else if($senha != $confirmacao) {
                Painel::messageToUser('erro', 'Senhas não coincidem');
            }else {
                if($cargo > $_SESSION['cargo']) {
                    Painel::messageToUser('erro', 'Não é possivel selecionar cargos superiores ao seu');
                }else if(Usuario::userExists($login)){
                    Painel::messageToUser('erro', 'Usuário já existe');
                }else {
                    //Pronto para inserir
                    $usuario = new Usuario();
                    if($usuario->registerUser($nome, $login, $cargo, $senha)) {
                        Painel::messageToUser('sucesso', 'Usuário '.$login.' cadastrado com sucesso');
                    }else {
                        Painel::messageToUser('erro', 'Ocorreu algum erro ao realizar o cadastro');
                    }
                }
            }
        }
        ?>
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" required>
        </div>
        <div class="form-group">
            <label for="usuario">Usuário de login: </label>
            <input type="text" name="usuario" required>
        </div>
        <div class="form-group">
            <label for="cargo">Cargo: </label>
            <select name="cargo" required>
                <?php 
                    foreach (Painel::$cargos as $key => $value) {
                        if($key <= $_SESSION['cargo'])
                        echo '<option value="'.$key.'" >'.$value.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nome">Senha: </label>
            <input type="password" name="senha" required>
        </div>
        <div class="form-group">
            <label for="confirmacao">Confirme a senha: </label>
            <input type="password" name="confirmacao" required>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Adicionar">
        </div>
    </form>
</div>