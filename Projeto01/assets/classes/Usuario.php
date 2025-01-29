<?php
    class Usuario {
        public function updateUser($nome, $usuario, $senha, $imagem) {
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, usuario = ?, senha = ?, img = ? WHERE usuario = ?;");
            if($sql->execute(array($nome, $usuario, $senha, $imagem, $_SESSION['user']))){
                return true;
            }
            return false;
        }
    }
?>