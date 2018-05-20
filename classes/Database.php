<?php
include "config.php";
define('DB_NAME', 'student');
define('DSN', 'mysql:dbname=student;host:localhost');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
class DB{
	private static $pdo;
	public static function connection(){
		if(!isset(self::$pdo)){
			try {
				self::$pdo=new PDO(DSN,DB_USER,DB_PASS);
				
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		return self::$pdo;
	}

	public static function prepare($q){
		return self::connection()->prepare($q);
	}
}

?>