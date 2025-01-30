<?php
    class Usuario {
        public function updateUser($nome, $usuario, $senha, $imagem) {
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, usuario = ?, senha = ?, img = ? WHERE usuario = ?;");
            if($sql->execute(array($nome, $usuario, $senha, $imagem, $_SESSION['user'])))
                return true;
            return false;
        }

        public static function userExists($login) {
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE usuario = ?;");
            $sql->execute(array($login));
            if($sql->rowCount() == 1)
                return true;
            return false;
        }

        public function registerUser($nome, $usuario, $cargo, $senha) {
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null, ?, ?, '', ?, ?);");
            if($sql->execute(array($usuario, $senha, $nome, $cargo)))
                return true;
            return false;
        }
    }
?>