<?php
include_once('../Controllers/control.php');
$sql_cntrl = new control ();

$logged_user = null;

if(isset($_SERVER['HTTP_X_TOKEN'])) {
	$res = $sqlCntrl->get_user_from_token($_SERVER['HTTP_X_TOKEN']);
	if($res->num_rows > 0){
		$logged_user = $res->fetch_assoc();
	}
}