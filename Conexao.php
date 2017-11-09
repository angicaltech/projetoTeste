<?php
	abstract class Conexao
	{
		const USER = "root";
		const PASS = "root";

		private static $instancia = null;

		private static function conectar(){
			try{
				if(self::$instancia == null){
					$dsn = "mysql:host=localhost;dbname=teste";
					self::$instancia = new PDO($dsn, self::USER, self::PASS);
					self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
			}catch(PDOExeption $e){
				echo "Erro: " . $e->getMenssage();
			}

			return self::$instancia;
		}

		protected static function getDB(){
			return self::conectar();
		}

	}
?>