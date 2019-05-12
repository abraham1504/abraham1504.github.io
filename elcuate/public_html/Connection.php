<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('DB_HOST', 'localhost');
define('DB_USER', 'id812928_almaguer');
define('DB_PASSWORD', 'abrahamlokillo17');
define('DB_NAME', 'id812928_comercio');
define('DB_CHARSET', 'utf-8');
define('DB_PORT', 3306);
class Connection {
	public $_db;
	public $host = DB_HOST;
	public $port = DB_PORT;
	public $database = DB_NAME;
	public $username = DB_USER;
	public $password = DB_PASSWORD;
	protected $serverName = "id812928_comercio";
	public function connect() {
		try{
			$dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
			$this -> _db = new PDO ($dns, DB_USER, DB_PASSWORD);
			$this -> _db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $ex){
				print "Hubo un error: " . $ex -> getMessage();
				die();
				}
		}
	public function executeQuery($query,$arreglo){
		$this->connect();
		$statement = $this->_db->prepare($query);
		for($i = 0; $i < count($arreglo);  $i++){
			$variable = $arreglo[$i];
			$statement->bindParam($i + 1, $arreglo[$i]);
		}
		$statement->execute();
		$this->closeConection();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	public function executeTransaction($query, $arreglo){
		try {
			$this -> connect();
			$statement = $this -> _db -> prepare($query);
			echo $query;
			for($i = 0; $i < count($arreglo); $i++){
				$variable =$arreglo[$i];
				echo "el count de arreglo es " .count($arreglo)."//////////////////////";
				$statement -> bindParam($i + 1, $arreglo[$i]);
				echo "la variable es ".$arreglo[$i]."////////////////////////";
				}
			$statement -> execute();
			$this -> closeConection();
			return 1;
			} catch (Exception $ex) {
				return 2;
				}
		}
		public function closeConection() {
			$this ->_db =null;
			}
}
?>
