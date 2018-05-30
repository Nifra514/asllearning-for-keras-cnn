<?php
ob_start ();
session_start ();
$title = 'ASL Learning | Profile';
include ('../Controllers/control.php');
$obj = new control ();
include ('Header&Footer/header.php');

$obj->protect_page ();

$u_data = $obj->select_user ();

$user_data = mysqli_fetch_array ( $u_data );

$name = $user_data ['name'];
$email = $user_data ['email_id'];
$tp = $user_data ['tp_no'];

$s_data = $obj->select_score ();

?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="well">
				<div class="form-horizontal">

					<legend>User Details</legend>

					<div class="form-group">
						<div class="col-md-6">
							<label for="name">Name:</label>
						</div>
						<div class="col-md-6">
							<label style="font-weight: bold;"><?php echo $name;?></label>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6">
							<label for="name">Email Id:</label>
						</div>
						<div class="col-md-6">
							<label style="font-weight: bold;"><?php echo $email;?></label>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6">
							<label for="name">Contact No.:</label>
						</div>
						<div class="col-md-6">
							<label style="font-weight: bold;"><?php echo '0'.$tp;?></label>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col-md-4">

			<div style="overflow-x: auto;">
				<table>
					<tr>
						<th>No.</th>
						<th>Score</th>
						<th>Date & Time</th>
					</tr>
							<?php 
		$i = 1;
		while ($score_data = mysqli_fetch_array ( $s_data )){
			
			$score = $score_data ['score'];
			$date = $score_data ['date'];
		
		?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $score;?></td>
						<td><?php echo $date;?></td>
					</tr>
							<?php 
			$i++;
		}
			?>
					
				</table>
			</div>
			
	
		</div>

	</div>
</div>

<!-- including footer -->

<?php include ('Header&Footer/footer.php'); ?>
	