<?php
	class Util {
		public static function dateFormat($date) {
			$data = explode('-', $date);
			$data = $data[2].'/'.$data[1].'/'.$data[0];
			return $data;
		}
		
		public static function getSiteInfo() {
			$tabela = TABELA_CONFIGURACOES;
			$siteInfo = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
			$siteInfo->execute();
			return $siteInfo->fetch();
		}
	}
?>