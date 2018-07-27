<?php
include_once ('../Core/UserCore.php');
if (!$logged_user) {
	echo "you need to login";
	exit();
}

echo json_encode(array(
		'id'=> $logged_user['u_id'],
		'u_name' => $logged_user['name'],		
));
exit();
