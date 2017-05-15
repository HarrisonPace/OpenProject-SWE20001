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
	</head>
	<body>
		<div id="page-wrapper">
				<div id="header">
						<h1><a href="index.php" id="logo">Group Assignment <em>Scheduler</em></a></h1>
						<nav id="nav">
							<ul>
								<li><a href="index.php" class="current">Home</a></li>
                                <li><a href="login.php">Login</a></li>
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
									if (!isset($_SESSION)) session_start();
									if (isset($_SESSION['username'])) {
										echo "<li><a href='logout.php'>Logout</a></li>";
									} else {
										//nothing
									}
								?>
							</ul>
						</nav>
				</div>
				<div>
					<?php
						if (isset($_SESSION['username'])) {
							echo "<p style=\"text-align:center;\">Logged in as <strong>" . $_SESSION['username'] . "</strong>.</p>";
						} else {
							// echo "<p>You are not logged in</p>"; -- Leave blank (ugly)
						}
					?>
				</div>
				<section id="banner">
					<header>
						<h2>Group Assignment - Scheduler: <em>v0.1 (beta) by <a href="#">Lachlan Haggart, Harrison Pace & Hoang Nguyen</a></em></h2>
						<a href="#" class="button">Learn More</a>
					</header>
				</section>
				<section class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<section class="4u 12u(narrower)">
								<div class="box highlight">
									<i class="icon major fa-paper-plane"></i>
									<h3>Set Meeting</h3>
									<p>Set New Meetings, easily by visiting the Scheduler Page  (Scheduler -> New Meeting).</p>
								</div>
							</section>
							<section class="4u 12u(narrower)">
								<div class="box highlight">
									<i class="icon major fa-pencil"></i>
									<h3>Edit Meeting</h3>
									<p>Edit existing Meetings, easily by visiting the Schedule Management Page  (Scheduler -> Management)..</p>
								</div>
							</section>
							<section class="4u 12u(narrower)">
								<div class="box highlight">
									<i class="icon major fa-wrench"></i>
									<h3>Meeting Settings</h3>
									<p>Change Meeting Settings, Account Information and Times by visiting the Settings Page.</p>
								</div>
							</section>
						</div>
					</div>
				</section>
				<section class="wrapper style2">
					<div class="container">
						<header class="major">
							<h2>Meetings made Easy</h2>
							<p>Group Assignment <em>Scheduler</em> was designed by Students for Students. Scheduling is a challenge, but with Group Assignment <em>Scheduler</em> it's as easy as 1, 2, 3.</p>
						</header>
					</div>
				</section>


			<!-- CTA -->
				<section id="cta" class="wrapper style3">
					<div class="container">
						<header>
							<h2>Login Page:</h2>
							<a href="login.php" class="button">Click here</a>
						</header>
					</div>
				</section>

			<!-- Footer -->
		<div id="footer">

				<!-- Icons -->
					<ul class="icons">
						<li><a href="https://github.com/thehaxxa/OpenProject-SWE20001" class="icon fa-github"><span class="label">GitHub</span></a></li> <!-- Link Back to Github -->
						<li><a href="calendar.google.com" class="icon fa-google-plus"><span class="label">Google+</span></a></li> <!-- Leave for Google Cal API Integration -->
					</ul>

				<!-- Copyright -->
					<div class="copyright">
						<ul class="menu">
							<li>&copy; Swinburne University. All rights reserved</li><li>Design: <a href="#">Lachlan Haggart, Harrison Pace & Hoang Nguyen</a></li>
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

	</body>
</html>
