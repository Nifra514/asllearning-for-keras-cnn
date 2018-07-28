<?php
ob_start ();
session_start ();
$title = 'ASL Learning | Registration';
include ('../Controllers/control.php');
$obj = new control ();
include ('Header&Footer/header_login.php');

$obj->logged_in_redirect ();

$user_id = 0;
$type = "Log"; // log, warning,error
$data = array (
		'action' => "New user accessing asllearning.info/Views/registration.php" 
);
$action = "User registration";
$risk = "None";

$obj->write_log ( $user_id, $type, $data, $action, $risk );

?>

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">

			<div class="well">

				<form class="form-horizontal" action="registration_submit.php"
					method="POST">
					<legend>User Registration</legend>

					<div class="form-group">
						<div class="col-md-6">
							<label for="name">Name</label> <input type="text"
								class="form-control" name="name" id="name" required autofocus>
						</div>

						<div class="col-md-6">
							<label for="mailid">Email ID</label> <input type="text"
								class="form-control" name="mailid" id="mailid" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6">
							<label for="phone">Phone Number</label> <input type="text"
								class="form-control" id="phone" name="phone" maxlength="10"
								onkeypress="return isNumber(event)" required>
						</div>

						<div class="col-md-6">
							<label for="uname">Username</label> <input type="text"
								class="form-control" name="uname" id="uname" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6">
							<label for="password">Password</label> <input type="password"
								class="form-control" name="password" id="password" required>

						</div>
						<div class="col-md-6">
							<label for="password_again">Confirm Password</label> <input
								type="password" class="form-control" name="password_again"
								id="password_again" required>
						</div>
					</div>

					<div class="form-group">
						<div class=" col-md-12">
							<label style="color: #ff0000;"><input type="checkbox" name="con"
								value="Yes" required="Please Accept Our Terms & Conditions!"> I
								Agree To The Terms & Conditions Of ASL Learning</label>
						</div>
					</div>

					<div class="form-group">
						<div class=" col-md-12">
							<br> <input type="submit" id="register" value="Register"
								name="register" class="btn btn-primary form-control">
						</div>
					</div>
				</form>

			</div>
		</div>

	</div>
</div>

<!-- including footer -->

<?php include ('Header&Footer/footer.php'); ?>
	