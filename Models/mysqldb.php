<?php
class mysqldb {
	public $link;
	public function __construct() {
		$db = parse_ini_file("dbcon.ini");
		
		$sqltype = $db['sqltype'];
		$host = $db['host'];
		$user = $db['user'];
		$pass = $db['pass'];
		$dbname = $db['dbname'];		
		
		
		$con = new $sqltype ( $host, $user, $pass, $dbname );
		if ($con->connect_error) {
			die ( 'Connection error' );
		} else
			$this->link = $con;

	}
	
	public function comq($sql) {

		return $this->link->query ( $sql );
	
	}
	
	public function comql($sql) {
		return $this->link->query ( $sql ); 
	}
}
?>