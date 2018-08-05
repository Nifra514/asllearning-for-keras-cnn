<?php
ob_start ();
session_start ();
$title = 'ASL Learning | Download';
include ('../Controllers/control.php');
$obj = new control ();
include ('Header&Footer/header.php');

$obj->protect_page ();
?>

<div class="container">
	<div class="row">
		<div class="col-md-4"></div>

		<div class="col-md-4">
		
	<div class="col-md-12">	    
    <img src="../assets/img/keep1.jpg" height="auto" width="auto" class="d-inline-block align-top img-responsive" alt="">
	</div>

			<div class="col-md-12">
				<a href="../sys/ASL_logo.png" download><button
						class="btn btn-success form-control" onclick="download()">Download ASL
						Learning App</button></a>
			</div>


	<div class="col-md-12">	    
    <img src="../assets/img/keep2.jpg" height="auto" width="auto" class="d-inline-block align-top img-responsive" alt="">
	</div>
		</div>

	</div>
</div>

<!-- including footer -->

<?php include ('Header&Footer/footer.php'); ?>
	