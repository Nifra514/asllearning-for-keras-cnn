<?php
ob_start ();
session_start ();
$title = 'ASL Learning | Home';
include ('../Controllers/control.php');
$obj = new control ();

include ('Header&Footer/header_login.php');

$obj->logged_in_redirect ();

?>

<div class="container">
	<div class="row">
		<div class="col-md-6" style="margin-top: 20px;">
			<img src="http://localhost:8888/asllearning/assets/img/aslr.jpg"
				height="600px" class="d-inline-block align-top img-responsive"
				alt="">
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5">
			<div class="well">
				<form class="form-horizontal" action="login_ver.php" method="POST">
					<legend>User Login</legend>
					<div class="form-group">
						<div class="col-md-12">
							<label for="uname">Username</label> <input type="text"
								name="uname" class="form-control" required autofocus>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<label for="password">Password</label> <input type="password"
								name="password" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" id="submit" value="submit" name="login"
								class="btn btn-success form-control">Login</button>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button id="regidter" value="register" name="register"
								class="btn btn-primary form-control" onclick="reg()">Register
								Here</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include ('Header&Footer/footer.php');
?>
