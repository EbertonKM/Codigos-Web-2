<?php

    /*Cria uma sessão ou retorna a atual com base em um identificador
    passado por meio de uma solicitação GET ou POST, ou passado
    por meio de um cookie*/
    session_start();

    //fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    //nome da empresa
    define('NOME_EMPRESA', 'IFPR');

    //definição do domínio do site
    define('INCLUDE_PATH', 'http://localhost/Projeto01/');

    //definição da URL do paiel
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');

    //diretório base das imagens
    define('BASE_DIR_PAINEL', __DIR__.'/painel/');

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

    //função para os cargos dentro do paiel
    function pegaCargo($cargo) {
        $vetor = [
            '0' => 'Usuário',
            '1' => 'Funcionário',
            '2' => 'Gerente',
            '3' => 'CEO',
            '4' => 'Desenvolvedor'
        ];
        return $vetor[$cargo];
    }

    //função para o menu selecionado
    function selecionarMenu($menuItem) {
        $url = explode('/',@$_GET['url'])[0];
        if($url == $menuItem) {
            echo 'class="menu-active"';
        }
    }

    //função para verificar a permissão por usuário
    function verificaPermissaoMenu($permissao) {
        if($_SESSION['cargo'] >= $permissao) {
            return true;
       }else {
            echo 'style="display:none"';
       }
    }

    //função para verificar a permissão para exibir a página na url
    function verificaPermissaoPagina($permissao) {
        if($_SESSION['cargo'] >= $permissao) {
            return true;
        }else {
            include('painel/pages/permissao-negada.php');
            die();
        }
    }
?>