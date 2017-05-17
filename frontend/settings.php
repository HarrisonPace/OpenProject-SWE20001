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
						<li><a href="settings.php" class="current">Settings</a></li>
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
						<div id="content">
							<!-- Content -->
							<article>
								<header>
									<h2><span class="image"><img src="images/gear.png" alt="Settings" height="40" width="40"/></span> &nbsp; Settings</h2>
									<p>Change <em>Global</em> Meeting Settings and Configure Account</p>
								</header>
								<?php
									if (!isset($_SESSION)) session_start();
									if (isset($_SESSION['username'])) {
										//echo "<p>You are logged in as " . $_SESSION['username'] . "</p>";
										echo "<form name=\"schedule\" method=\"post\" action=\"processemail.php\">";
										echo "<p><label for=\"email\">Recieve Emails? :</label> <input type=\"checkbox\" name=\"email\" value= \"1\"  ></p>";
										echo "<p><label for=\"timezone\">Use Default Timezone Settings? :</label> <input type=\"checkbox\" name=\"timezone\"  value= \"1\" checked></p>";

										echo "<p><input type=\"submit\" name=\"Submit\" value=\"Set\"></p>";
										echo "</form>";
										echo "<p></p>";
									} else {
										echo "<p style=\"text-align:center;\">You are not logged in. <strong>Please login to see change settings.</strong></p>";
									}
								?>
							</article>
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
