<?php
session_start ();
include ('../Controllers/control.php');
$obj = new control ();

$user_id = $_SESSION ['id'];
$type = "Log"; // log, warning,error
$data = array (
		'action' => "User: " . $user_id . " successfully logged out from asllearning.info" 
);
$action = "Logout";
$status = 1;
$risk = "None";

$obj->write_log ( $user_id, $type, $data, $action, $status, $risk );

session_destroy ();
$_SESSION = [ ];

header ( 'Location:index.php' );
?>