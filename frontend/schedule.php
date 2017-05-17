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
								<li><a href="schedule.php" class="current">New Meeting</a></li>
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
			<section class="wrapper style2">
				<div class="container">
					<header class="major">
						<h2>Schedule</h2>
						<p>Schedule New Meeting</p>
					</header>
					<form name="schedule" method="post" action="processmeetings.php">
						<fieldset id="schedule">
							<p><label for="title">Meeting Title</label>
							<input name="title" type="text" id="title"></p>
							<p><label for="description">Description</label>
							<textarea name="description" placeholder="Enter Short Description..."></textarea></p>
							<?php 
								// connection info
								require_once("dbSettings.php");
								$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

								$username = $_SESSION['username'];
							
								$query_getteams = "SELECT * FROM teams NATURAL JOIN userteams NATURAL JOIN users WHERE username='$username';";
								$result_getteams = mysqli_query($conn, $query_getteams);

								echo "
									<p><label for='teams'>Team</label>
									<select name='team'>
								";

								while ($row = mysqli_fetch_assoc($result_getteams)){
								    echo "<option value='" . $row['teamname'] . "'>" . $row['teamname'] . "</option>";
								}

								echo "
									</select></p>
								";
							?>

							<p><label for="meet1">Meeting Schedule</label>
							Select 3 Possible Meeting Times: (Actual Times will be determined according to availability)</p>
							<p><input type="date" name="meet1">
							<input type="time" name="meet1time"></p>
							<p><input type="date" name="meet2">
							<input type="time" name="meet2time"></p>
							<p><input type="date" name="meet3">
							<input type="time" name="meet3time"></p>

							<p><input type="submit" name="Submit" value="Set"></p>
						</fieldset>
					</form>
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
