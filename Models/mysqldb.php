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
		$res = $this->link->query ( $sql );
// 		if(!$res){
// 			$error = mysqli_errno($this->link);
// 			$this->write_log('NULL', 'error', $error, 'none', 1, 'High');
// 		}
		return $res;
	
	}
	
// 	public function comq($sql) {
// 		return $this->link->query ( $sql ); 
// 	}
	
// 	function write_log($user_id, $type, $data, $action, $status, $risk){
// 		$encoded_data = json_encode($data);
// 		$query = "INSERT INTO `log_details` (`u_id`, `type`, `data`, `action`, `status`, `timestamp`, `risk`) VALUES ('$user_id', '$type', '$encoded_data', '$action', '$status', NOW(), '$risk')";
// 		$this->comq($query);
// 	}
}
?>