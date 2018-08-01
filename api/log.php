<?php
include_once ('../Core/UserCore.php');
if (!$logged_user) {
	echo "you need to login";
	exit();
}

$json = file_get_contents ( 'php://input' );

// insert query log here
$user_id = $_POST['user_id'];
$type = $_POST['lg_type'];
$data = $_POST['data'];
$action = $_POST['action'];
$risk = $_POST['risk'];

// insrt qury generate
$sql_cntrl->write_log($user_id, $type, $data, $action, $risk);

?>