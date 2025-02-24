<?php 
	class Painel {

		public static $cargos = [
			'0' => 'Usuário',
			'1' => 'Desenvolvedor'
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
				if($size < 2048) {
					return true;
				}else {
					Painel::messageToUser('erro', 'Limite de tamanho da imagem é 2MB');
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
			$parametros = [];
			$query = "INSERT INTO `$nomeTabela` VALUES (null";
			foreach($arr as $key => $value) {
				if($key == 'acao')
					continue;
				if($value == '') {
					return false;
				}
				$query.=",?";
				$parametros[] = $value;
			}
			$query.=");";
			$sql = MySql::conectar()->prepare($query);
			$sql->execute($parametros);
			$lastId = MySql::conectar()->lastInsertId();
			$sql = MySql::conectar()->prepare("UPDATE `$nomeTabela` SET order_id = ? WHERE id = $lastId");
			return $sql->execute(array($lastId));
		}

		public static function update($arr, $tabela, $id, $single = false) {
			$parametros = [];
			$first = true;
			$query = "UPDATE `$tabela` SET ";
			foreach($arr as $key => $value) {
				if($key == 'acao') //ignora o input ação que vem com o post
					continue;
				if($value == '') //rejeita o update em caso de campos vazios
					return false;
				if($first) {
					$first = false;
					$query.="$key = ?";
				}else {
					$query.=", $key = ?";
				}
				$parametros[] = $value;
			}
			if($single == false) {
				$parametros[] = $id;
				$sql = MySql::conectar()->prepare($query.' WHERE id = ?');
				return $sql->execute($parametros);
			}else {
				$sql = MySql::conectar()->prepare($query);
				return $sql->execute($parametros);
			}
			
		}

		public static function get($tabela, $query = '', $arr = '') {
			if($query != false) {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE $query");
				$sql->execute($arr);
				return $sql->fetch();
			}else {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
				$sql->execute();
				return $sql->fetch();	
			}
		}
		
		//Só funciona para tabelas com o campo order_id ;-;
		public static function getAll($tabela, $start = null, $end = null) {
			if($start === null || $end === null) {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id DESC;");
				$sql->execute();
			}else {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id DESC LIMIT $start, $end;");
				$sql->execute();
			}
			return $sql->fetchAll();
		}

		public static function delete($tabela, $id = false) {
			if($id == false) {
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
				return $sql->execute();
			}else {
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = ?");
				return $sql->execute(array($id));
			}
		}

		public static function redirect($url) {
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		public static function orderItem($tabela, $orderType, $id) {
			if($orderType == 'up') {
				$infoItemAtual = Painel::get($tabela, 'id = ?', array($id));
				$order_id = $infoItemAtual['order_id'];
				$itemBefore = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id < $order_id ORDER BY order_id DESC LIMIT 1;");
				$itemBefore->execute();
				if($itemBefore->rowCount() == 0)
					return;
				$itemBefore = $itemBefore->fetch();
				Painel::update(array('order_id' => $infoItemAtual['order_id']), $tabela, $itemBefore['id']);
				Painel::update(array('order_id' => $itemBefore['order_id']), $tabela, $infoItemAtual['id']);
			}else if($orderType == 'down'){
				$infoItemAtual = Painel::get($tabela, 'id = ?', array($id));
				$order_id = $infoItemAtual['order_id'];
				$itemBefore = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id > $order_id ORDER BY order_id ASC LIMIT 1;");
				$itemBefore->execute();
				if($itemBefore->rowCount() == 0)
					return;
				$itemBefore = $itemBefore->fetch();
				Painel::update(array('order_id' => $infoItemAtual['order_id']), $tabela, $itemBefore['id']);
				Painel::update(array('order_id' => $itemBefore['order_id']), $tabela, $infoItemAtual['id']);
			}
		}
		
		public static function generateSlug($str) {
			$str = mb_strtolower($str);
			$str = preg_replace('/(â|á|à|ã)/', 'a', $str);
			$str = preg_replace('/(ê|é)/', 'e', $str);
			$str = preg_replace('/(í|Í)/', 'i', $str);
			$str = preg_replace('/(ú)/', 'u', $str);
			$str = preg_replace('/(ó|ô|õ|Ô|º)/', 'o', $str);
			$str = preg_replace('/(_|\/|!|\?|#)/', '', $str);
			$str = preg_replace('/( )/', '-', $str);
			$str = preg_replace('/ç/', 'c', $str);
			$str = preg_replace('/(-[-]{1,})/', '', $str);
			$str = preg_replace('/(,)/', '-', $str);
			$str = strtolower($str);
			return $str;
		}
	}
?>