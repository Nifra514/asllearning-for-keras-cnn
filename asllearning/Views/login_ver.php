<?php 
ob_start();
session_start();
$title = 'ASL Learning | Login';
include ('../Controllers/control.php');
$obj = new control ();
include ('../Views/Header&Footer/header_login.php');


if (empty ( $_POST ) === false) {
	$required_fields = array (
			'uname',
			'password'
	);
	foreach ( $_POST as $key => $value ) {
		if (empty ( $value ) && in_array ( $key, $required_fields ) === true) {
			$errors [] = 'All the fields are required!';
			break;
		}
	}
}


$error = false;

$insertErr = array ();
if (isset ( $_POST ['login'] )) {

	$uname = mysqli_real_escape_string ( $obj->link, trim($_POST ['uname']) );
	$password = mysqli_real_escape_string ( $obj->link, trim($_POST ['password']) );
	$password1 = md5 ( $_POST ['password'] );

     
// 	$unameVer = $obj->exists ( $uname );
// 	$countUname = mysqli_num_rows ( $unameVer );

// 	$emailVer = $obj->email_exists ( $email );
// 	$countVer = mysqli_num_rows ( $emailVer );

	if (strlen ( $uname ) < 6) {
		$error = true;
		$insertErr [] = "Your username must be atleast 6 characters!";
	}

	if (strlen ( $password ) < 6) {
		$error = true;
		$insertErr [] = "Your password must be atleast 6 characters!";
	}

	
	if (! $error) {

		$varLogin = $obj->login ( $uname, $password1);

		
		if((mysqli_num_rows($varLogin))>0){
			
			$user_data = mysqli_fetch_array($varLogin);
			
			$_SESSION['id'] = $user_data['u_id'];
			$_SESSION['name'] = $user_data['name'];


			header('Location:download.php');


			}
			else
			{				
				?>				
				&nbsp;
				<div class="container">
	<div class="alert alert-danger alert-dismissible" role="alert"
		style="margin-left: auto; margin-right: auto;">
		<button type="button" class="close" data-dismiss="alert"
			aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<strong>Error!</strong><?php echo "<br> Invalid Username or Password";?>
	            
	            </div>
</div>
<script type="text/javascript">
			      
				setTimeout("location.href = 'index.php';",2000);	// Page Dillay 2 Second
				
				</script>
				
				<?php  			
			}
			
		}
		
	 else {
		?>
		&nbsp;
<div class="container">
	<div class="alert alert-danger alert-dismissible" role="alert"
		style="margin-left: auto; margin-right: auto;">
		<button type="button" class="close" data-dismiss="alert"
			aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<strong>Error!</strong><?php echo $obj->output_errors($insertErr);?>
	            
	            </div>
</div>
<script type="text/javascript">
			      
				setTimeout("location.href = 'index.php';",2000);	// Page Dillay 2 Second
				
				</script>
<?php
	}
}
?>

&nbsp;
<!-- including footer -->

<?php include ('../Views/Header&Footer/footer.php'); ?>
