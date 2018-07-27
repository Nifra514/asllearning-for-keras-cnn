<?php
ob_start ();
session_start ();
$title = 'ASL Learning | Download_Seccess';
include ('../Controllers/control.php');
$obj = new control ();
include ('../Views/Header&Footer/header_login.php');

?>				
				&nbsp;
<div class="container">
	<div class="alert alert-success alert-dismissible" role="alert"
		style="margin-right: auto%; margin-left: auto%;">
		<button type="button" class="close" data-dismiss="alert"
			aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<span class="glyphicon glyphicon-thumbs-up">&nbsp;&nbsp;</span><strong>Success!</strong>
		<?php echo "<br> Thank you for downloadiong ASLapp!";?>
	</div>
</div>

<?php

$user_id = $_SESSION ['id'];
$type = "Log"; // log, warning,error
$data = array (
		'action' => "User: " . $user_id . " successfully downloaded the ASLapp from asllearning.info" 
);
$action = "Download";
$status = 1;
$risk = "None";

$obj->write_log ( $user_id, $type, $data, $action, $status, $risk );

?>
<script type="text/javascript">
			      
				setTimeout("location.href = 'download.php';",2000);	// Page Dillay 2 Second
				
				</script>


&nbsp;
<!-- including footer -->

<?php include ('../Views/Header&Footer/footer.php'); ?>
