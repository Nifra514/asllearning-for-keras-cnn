<?php
require_once '../Models/mysqldb.php';
class control extends mysqldb {
	public function __construct() {
		parent::__construct ();
	}
	
	function write_log($user_id, $type, $data, $action, $status, $risk){
		$encoded_data = json_encode($data);
		$query = "INSERT INTO `log_details` (`u_id`, `type`, `data`, `action`, `status`, `timestamp`, `risk`) VALUES ('$user_id', '$type', '$encoded_data', '$action', '$status', NOW(), '$risk')";
		$this->comq($query);
	}
	
	
	function get_user_from_token($token) {
		$sql = "SELECT * FROM user_details WHERE token='".$token."'";
		return $this->comq($sql);
	}
	
	function token_up($token, $uname) {
		$sql = "UPDATE user_details SET token='$token' WHERE username='$uname'";
		return $this->comq($sql);
	}

	function exists($uname) {
		$sql = "SELECT u_id FROM user_details WHERE username = '$uname'";
		return $this->comq($sql);
	}
	
	function pwd_exists($password) {
		$sql = "SELECT u_id FROM user_details WHERE password = '$password'";
		return $this->comq($sql);
	}
	
	function email_exists($email) {
	
		$sql = "SELECT u_id FROM user_details WHERE email_id = '$email'";		
		return $this->comq($sql);
	}
	
	function output_errors($errors = array()) {
		return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
	}
	
	public function reg_user($name,$email,$phone,$uname,$password1,$mailcode){		
		$sql ="INSERT INTO `user_details`(`name`, `email_id`,`tp_no`, `username`, `password`, `mailcode`,`date`)
		VALUES ('$name','$email','$phone','$uname','$password1','$mailcode',NOW())";
	
		return $this->comq($sql);	
	}
	
	function login($uname, $password1) {
	
		$sql = "SELECT * FROM user_details WHERE username = '$uname' AND password = '$password1'";
		
		return $this->comq($sql);
	}
	
	function logged_in() {
		return (isset($_SESSION['id'])) ? true : false;
	}
	
	function protect_page() {
		if($this->logged_in() === false) {
			header('Location: index.php');
			exit();
		}
	}
	
	function logged_in_redirect() {
		if($this->logged_in() === true) {
			header('Location: download.php');
			exit();
		}
	}
	
	function select_user() {
		if($this->logged_in() === true) {
			
			$uid = $_SESSION['id'];
			
			$sql = "SELECT * FROM user_details WHERE u_id = '$uid'";
			
			return $this->comq($sql);

		}
	}
	
/*	function select_score() {
		if($this->logged_in() === true) {
				
			$uid = $_SESSION['id'];
				
			$sql = "SELECT * FROM score WHERE u_id = '$uid'";

			return $this->comq($sql);
	
		}
	}

	
		
	function activation($name, $email, $mailcode) {
		return $this->act_mail($email, 'Activate your account', "Hi " . $name. ", \n\nYou need to activate your account in order to use the features of Safra Travels. Please click the link below: \n\nhttp://localhost:8888/Views/activate.php?mailid=" . $email . "&mailcode=" . $mailcode . " \n\nRegards,\nasllearning.", 'From: asllearning.com');
		
	}	
	
	function act_mail($to, $subject, $body) {
		mail($to, $subject, $body, 'From: asllearning.info');
	}

	function f_activate($f_mailid, $f_mailcode) {
		$f_mailid = mysql_real_escape_string($f_mailid);
		$f_mailcode = mysql_real_escape_string($f_mailcode);
		if(mysql_result(mysql_query("SELECT COUNT(f_uid) FROM flight_users WHERE f_mailid = '$f_mailid' AND f_mailcode = '$f_mailcode' AND f_active = 0"), 0) == 1) {
			mysql_query("UPDATE flight_users SET f_active = 1 WHERE f_mailid = '$f_mailid' ");
			return true;
		}
		else {
			return false;
		}
	}
*/
	
}

?>
