<?php
$title = 'ASL Learning | Account Activation';
include ('../Controllers/control.php');
$obj = new control ();
// f_logged_in_redirect ();
// including header
include ('Header&Footer/header_login.php');

if (isset ( $_GET ['success'] ) === true && empty ( $_GET ['success'] ) === true) {
	?>

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			&nbsp;
			<h4>You have successfully activated your account!</h4>

<?php
	header ( "refresh:5; url=index.php" );
} else if (isset ( $_GET ['f_mailid'], $_GET ['f_mailcode'] ) === true) {
	$f_mailid = trim ( $_GET ['f_mailid'] );
	$f_mailcode = trim ( $_GET ['f_mailcode'] );
	if (f_email_exists ( $f_mailid ) === false) {
		$errors [] = 'Sorry, we couldn\'t find that Email Address';
		header ( "refresh:5; url=index.php" );
	} else if (f_activate ( $f_mailid, $f_mailcode ) === false) {
		$errors [] = 'Sorry, there was some problem activating that account';
		header ( "refresh:5; url=index.php" );
	}
	if (empty ( $errors ) === false) {
		?>
		
<h4>Ooops...</h4>

<?php
		
		echo output_errors ( $errors );
	} else {
		header ( 'Location: http://localhost:8888/SafraTravels/activate.php?success' );
		exit ();
	}
} else {
	header ( 'Location: index.php' );
	exit ();
}
?>
	
</div>
	</div>
</div>
&nbsp;
<?php
include $_SERVER ["DOCUMENT_ROOT"] . '/SafraTravels/includes/all/footer.php';
?>