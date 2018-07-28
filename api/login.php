<?php
include_once ('../Controllers/control.php');

$obj = new control ();
$json = file_get_contents ( 'php://input' );

$uname = $_POST ['uname'];
$password = md5 ( $_POST ['password'] );

// $uname = 'qweqwe';
// $password = md5 ( 'asd456' );

$unameVer = $obj->exists ( $uname );
$countUname = mysqli_num_rows ( $unameVer );

$passwordVer = $obj->pwd_exists ( $password );
$countPWD = mysqli_num_rows ( $passwordVer );

$resp_status = false;
$resp_data = "";

if (($countUname >= 1) && ($countPWD >= 1)) {
	$token = sha1 ( $uname . microtime () );
	
	$resp_status = true;
	$resp_data = $token;
	
	$obj->token_up ( $token, $uname );
	
	$res = $obj -> get_user_from_token($token);
	if($res->num_rows > 0){
		$logged_user = $res->fetch_assoc();
	}
		
	$user_id = $logged_user['u_id'];	
	$type = "Log"; // log, warning,error
	$data = array('action'=>"User: ".$user_id." successfully logged in at ASLapp");
	$action  = "Login";
	$risk = "None";
	
	$obj->write_log($user_id, $type, $data, $action, $risk);
	
	
} else {
	
	$user_id = 0;
	$type = "Log"; // log, warning,error
	$data = array('action'=>"login failed at ASLapp with Username: ".$uname." Password: ".$password);
	$action  = "Login";
	$risk = "High";
	
	$obj->write_log($user_id, $type, $data, $action, $risk);
	
	$resp_status = false;
	$resp_data = "Invalid Username or Password!!!";
}

header ( 'Content-Type: application/json' );

echo json_encode ( array (
		'status' => $resp_status,
		'data' => $resp_data 
) );
?>