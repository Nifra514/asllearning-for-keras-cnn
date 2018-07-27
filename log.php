<?php
include_once ('../Core/UserCore.php');
if (!$logged_user) {
	echo "you need to login";
	exit();
}

// insert query log here
$user_id = $logged_user['id'];
$type = $_POST['type'];
$data = $_POST['data'];
$action = $_POST['action'];
$action = $_POST['action'];
$status = $_POST['status'];
$risk = $_POST['risk'];

// insrt qury generate
$sql_cntrl->write_log($user_id, $type, $data, $action, $status, $risk);

?>