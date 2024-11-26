<?php

    /*Cria uma sessão ou retorna a atual com base em um identificador
    passado por meio de uma solicitação GET ou POST, ou passado
    por meio de um cookie*/
    session_start();

    //definição do domínio do site
    define('INCLUDE_PATH', 'http://localhost/Projeto01/');

    //definição da URL do paiel
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');

    //banco de dados
    define('HOST', 'localhost');
    define('DATABASE', 'projeto_01');
    define('USER', 'root');
    define('PASSWORD', '');

    //carregando a classe
    $autoload = function($class) {
        include('assets/classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

?>