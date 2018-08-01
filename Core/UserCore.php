<?php
include_once('../Controllers/control.php');
$sql_cntrl = new control ();

$logged_user = null;

if(isset($_SERVER['HTTP_X_TOKEN'])) {
	$res = $sql_cntrl->get_user_from_token($_SERVER['HTTP_X_TOKEN']);
	if((mysqli_num_rows($res)) > 0){
		$logged_user = mysqli_fetch_array($res);
	}
}