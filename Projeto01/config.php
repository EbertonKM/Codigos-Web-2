<?php
    //definição do domínio do site
    define('INCLUDE_PATH', 'http://localhost/Projeto01/');

    //carregando a classe
    $autoload = function($class) {
        include('assets/classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

?>