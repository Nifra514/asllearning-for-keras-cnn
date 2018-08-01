<?php
include_once ('../Controllers/control.php');

$obj = new control ();
$json = file_get_contents ( 'php://input' );

$uname = $_POST ['uname'];
$password = md5 ( $_POST ['password'] );

$passwordVer = $obj->un_pwd_exists ( $uname, $password );
$countUN_PWD = mysqli_num_rows ( $passwordVer );

$resp_status = false;
$resp_data = "";

if ($countUN_PWD >= 1) {
	$token = sha1 ( $uname . microtime () );
	
	$resp_status = true;
	$resp_data = $token;
	
	$obj->token_up ( $token, $uname, $password );
	
	$res = $obj->get_user_from_token ( $token );
	if ((mysqli_num_rows ( $res )) > 0) {
		$logged_user = mysqli_fetch_array ( $res );
	}
	
	$user_id = $logged_user ['u_id'];
	$type = "Log"; // log, warning,error
	$data = array (
			'action' => "User: " . $user_id . " successfully logged in at ASLapp" 
	);
	$action = "Login";
	$risk = "None";
	
	$obj->write_log ( $user_id, $type, $data, $action, $risk );
} else {
	
	$user_id = 0;
	$type = "Log"; // log, warning,error
	$data = array (
			'action' => "login failed at ASLapp with Username: " . $uname . " Password: " . $password 
	);
	$action = "Login";
	$risk = "High";
	
	$obj->write_log ( $user_id, $type, $data, $action, $risk );
	
	$resp_status = false;
	$resp_data = "Invalid Username or Password!!!";
}

header ( 'Content-Type: application/json' );

echo json_encode ( array (
		'status' => $resp_status,
		'data' => $resp_data 
) );
?>