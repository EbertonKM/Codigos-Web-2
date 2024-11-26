<?php 
    class Painel {
        public static function logado() {
            //Operador ternário
            return isset($_SESSION['login']) ? true : false;
        }

        public static function logout() {
            session_destroy();
        }
    }
?>