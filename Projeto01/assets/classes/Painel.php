<?php 
    class Painel {

        public static $cargos = [
            '0' => 'Usuário',
            '1' => 'Funcionário',
            '2' => 'Gerente',
            '3' => 'CEO',
            '4' => 'Desenvolvedor'
        ];

        public static function pegaCargo($cargo) {
            return Painel::$cargos[$cargo];
        }

        public static function logado() {
            //Operador ternário
            return isset($_SESSION['login']) ? true : false;
        }

        public static function logout() {
            setcookie('lembrar', true, time() - 3600, '/');
            session_destroy();
            header('Location:'.INCLUDE_PATH_PAINEL);
        }

        public static function loadPage() {
            if(isset($_GET['url'])) {
                $url = explode('/', $_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')) {
                    include('pages/'.$url[0].'.php');
                } else {
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }
            } else {
                if($_SESSION['cargo'] == 0) {
                    include('pages/perfil.php');
                }else {
                    include('pages/home.php');
                }
            }
        }

        private static function deleteUserOnline() {
            $date = date('Y-m-d H:i:s');
            MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 30 MINUTE;");
        }

        public static function listUserOnline() {
            self::deleteUserOnline();
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`;");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function getUserTotalToday() {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
            $sql->execute(array(date('Y-m-d')));
            return $sql->rowCount();
        }

        public static function getUserTotal() {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
            $sql->execute();
            return $sql->rowCount();
        }

        public static function messageToUser($type, $message) {
            if($type == 'sucesso') {
                echo '<div class="box-alert sucesso"><i class="fa-solid fa-check"></i> '.$message.'</div>';
            }else {
                echo '<div class="box-alert erro"><i class="fa-solid fa-times"></i> '.$message.'</div>';
            }
        }

        public static function validImage($image) {
            if($image['type'] == 'image/jpeg' || $image['type'] == 'image/jpg' || $image['type'] == 'image/png') {
                $size = intval($image['size']/1024);
                if($size < 750) {
                    return true;
                }else {
                    Painel::messageToUser('erro', 'Limite de tamanho da imagem é 750KB');
                }
            }
        }

        public static function uploadFile($file) {
            $formatoArquivo = explode('.', $file['name']);
            $nomeImagem = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'uploads/'.$nomeImagem)) {
                return $nomeImagem;
            }
            return false;
        }

        public static function deleteFile($file) {
            @unlink('uploads/'.$file);
        }

        public static function painelUsers() {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function insert($arr, $nomeTabela) {
            $certo = true;
            $query = "INSERT INTO `$nomeTabela` VALUES (null";
            foreach($arr as $key => $value) {
                $nome = $key;
                if($nome = 'acao' || $nome == 'nomeTabela')
                    continue;
                if($value == '') {
                    $certo = false;
                    break;
                }
                $query.=",?";
                $parametros[] = $value;
            }
            $query.=")";
            if($certo) {
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
            }
            return $certo;
        }
    }
?>