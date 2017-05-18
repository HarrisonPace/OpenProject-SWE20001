<?php
	session_start();
?>
<!DOCTYPE HTML>
<!--
	Template Theme modified for Development Project 1: Tools and Practices Open Project Assignment - "Arcana by HTML5 UP"
	Lisence: Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Group Assignment - Scheduler</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/modal.css" />
			<!-- css file for javascript -->
	
	</head>
	<body>
		<div id="page-wrapper">
			<div id="header">
				<h1><a href="index.php" id="logo">Group Assignment <em>Scheduler</em></a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="teams.php">Teams</a></li>
						<li>
							<a href="schedule.php">Scheduler</a>
							<ul>
								<li><a href="schedule.php">New Meeting</a></li>
								<li><a href="conflicts.php">Conflicts</a></li>
								<li><a href="manage.php">Management</a></li>
							</ul>
						</li>
						<li><a href="meetings.php">Scheduled Meetings</a></li>
						<li><a href="settings.php">Settings</a></li>
						<?php
							if (isset($_SESSION['username'])) {
								echo "<li><a href='logout.php'>Logout</a></li>";
							} else {
								echo "<li><a href='login.php'>Login</a></li>";
							}
						?>
					</ul>
				</nav>
			</div>
			<!-- Main -->
			<section class="wrapper style1">
				<div class="container">
					<div class="row 200%">
						<section class="6u 12u(narrower)">
							<header>
								<h2>Register</h2>
								<p>Create a new Group Scheduler Account</p>
							</header>
							<form name="register" method="post" action="newAccess.php" id="loginset">  <!-- Form is submitted here -->
							<fieldset id="registerdetails">
								<p><label for="email">Email</label></p>
								<p><input name="email" type="email" id="sid"></p>
								<p><label for="username">Username</label></p>
								<p><input name="username" type="text" id="uname"></p>

								<p><label for="password">Password</label></p>
								<p><input name="password" type="password" id="pwd1"></p>
								<p><label for="repassword">Re-Enter Password</label></p>
								<p><input name="repassword" type="password" id="pwd2"></p>

								<p><input type="submit" name="Submit" value="Register"></p>
							</fieldset>
							</form>
						</section>
					</div>
				</div>
			</section>
			<!-- Footer -->
			<div id="footer">
				<!-- Icons -->
				<ul class="icons">
					<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li> <!-- Link Back to Github -->
					<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li> <!-- Leave for Google Cal API Integration -->
				</ul>
				<!-- Copyright -->
				<div class="copyright">
					<ul class="menu">
						<li>&copy; Swinburne University. All rights reserved</li><li>Design: <a href="#">Lachlan Haggart, Harrison Pace ,Hoang Nguyen, Amritpal Thind &  Jason Liew</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/register.js"></script> 
	</body>
</html>
