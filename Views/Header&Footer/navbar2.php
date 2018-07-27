
</div>
</div>
</div>

<nav class="nav navbar-inverse" style="margin-bottom: 0px;">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse"
				data-target="#navbar-main">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-main">
		
		<ul class="nav navbar-nav">
				
				<li><img src="http://localhost:8888/asllearning/assets/img/asllogo2.png" height="50px" class="d-inline-block align-top" alt=""></li>
				
				<?php 
				if (($obj->logged_in() === true) && ($_SESSION ['utype'] === "admin")){				
				?>

				<li><a href="http://localhost:8888/asllearning/Views/download.php">Download</a></li>
				<li><a href="http://localhost:8888/asllearning/Views/system_log.php">View Log</a></li>
				
				<?php 
				} else if ($obj->logged_in() === true) {				
				?>
				
				<li><a href="http://localhost:8888/asllearning/Views/download.php">Download</a></li>
								
				<?php 
				} 				
				?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
			<li><a>Hi! <?php echo $_SESSION['name']; ?></a></li>
				<li><a href="http://localhost:8888/asllearning/Views/logout.php">Logout</a></li>
				
			</ul>

		</div>
	</div>
</nav>

