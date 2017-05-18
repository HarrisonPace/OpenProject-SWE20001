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
		<link rel="stylesheet" href="assets/css/main.css" />    <!-- Upload and Apply main css file on the webpage -->
	</head>
	<body>
	<!-- Navigation bar code is written in division named page-wrapper -->
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
						// if user is logged in than show logout in navigation panel otherwise show login 
							if (isset($_SESSION['username'])) {
								echo "<li><a href='logout.php'>Logout</a></li>";
							} else {
								echo "<li><a href='login.php'>Login</a></li>";
							}
						?>
					</ul>
				</nav>
			</div>
			<div>
				<?php
					// Show logged in as "username" if connection is established
					if (isset($_SESSION['username'])) {
						echo "<p style=\"text-align:center;\">Logged in as <strong>" . $_SESSION['username'] . "</strong>.</p>";
					}
				?>
			</div>
			<!-- Main -->
			<section class="wrapper style1">
				<div class="container">
					<header class="major">
						<h2>Teams</h2>
						<p>Create and Manage your Teams</p>
					</header>
					<div id="content">
						<!-- Content -->
						<article>
							<?php
								if (!isset($_SESSION)) session_start();

								if (isset($_SESSION['username'])) {
									// connection info
									$host = "127.0.0.1";
									$user = "root";
									$pwd = "redtango";
									$sql_db = "openproject";

									$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

									function display_table($result){
										// Display the retrieved records
										echo "<table border=\"1\">";
										echo "<tr>"
										."<th scope=\"col\"><strong>Team Name</strong></th>"
										."<th scope=\"col\"><strong>Team Leader</strong></th>"
										."</tr>";
										// retrieve current record pointed by the result pointer
										while ($row = mysqli_fetch_assoc($result)){
											global $conn;

											$teamleaderid = $row["teamleaderid"];    // Retreive team-leaderId from the database and check whether it matched with User Id or not
											$query_leader = "SELECT username FROM users WHERE userid='$teamleaderid';";
											$result_leader = mysqli_query($conn, $query_leader);
											$record = mysqli_fetch_assoc($result_leader);
 
											if(!$result_leader) {  // If connection doesnot established show the error message
												echo "<p>Something is wrong with ", $query_leader, "</p>";
											}
											// Add rows and columns to the table
											echo "<tr>";
											echo "<td>",$row["teamname"],"</td>";
											echo "<td>",$record["username"],"</td>";
											echo "</tr>";
										}
										echo "</table>";

										// Frees up the memory, after using the result pointer
										mysqli_free_result($result);
									}

									$id = $_SESSION['id'];
									// query for getting teams the current logged in user is in
									$query_teams = "SELECT * FROM teams NATURAL JOIN userteams NATURAL JOIN users WHERE userid='$id';";
									// query for getting all teams in db
									$query_allteams = "SELECT * FROM teams" ;
									$result_teams = mysqli_query($conn, $query_teams);
									$result_allteams = mysqli_query($conn, $query_allteams);
									
										// Create a new team
									echo "<h3>Your teams</h3>";

									if(!$result_teams) {
										echo "<p>Something is wrong with ", $query_teams, "</p>";
									} elseif (mysqli_num_rows($result_teams) == 0) {
										echo "<p>Looks like you don't have any teams. Why not join or create one?</p>";
									} else {
										display_table($result_teams);
									}

									echo "<h3>Join Team</h3>"; //Code for joining the team
									// create a label named teams
									echo "
										<form name='jointeam' method='post' action='joinTeam.php'>
											<fieldset id='teams'>
												<p><label for='teamname'>Teams</label>  
												<select name='teamname'>
									";

									while ($row = mysqli_fetch_assoc($result_allteams)) {  //fetch team data from the databse
									    echo "<option value='" . $row['teamname'] . "'>" . $row['teamname'] . "</option>";
									}

									echo "
												</select></p>
												<p><input type='submit' name='Submit' value='Join'></p>
												<input type='hidden' name='userid' value=$id>
											</fieldset>
										</form>
									";
										// this is used a create a new item when user is logged in to the website
									echo "<h3>Create New Team</h3>";
									echo "
										<form name='teamcreate' method='post' action='newTeam.php'>
											<fieldset id='teamdetails'>
												<p><label for='teamname'>Team Name</label>
												<input name='teamname' type='text' id='teamname'></p>
												<input type='hidden' name='teamleaderid' value=$id>

												<p><input type='submit' name='Submit' value='Create'></p>
											</fieldset>
										</form>
									";
								} else {
									echo "<p style='text-align:center;'>You are not logged in. <strong>Please login to see change settings.</strong></p>";
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
	</body>
</html>
