<?php
	// connection info
	require_once("dbSettings.php");

	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function datetime($date, $time) {
		return $date . " " . $time . ":00";
	}

	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else { // Upon successful connection

		// Retrieve data from form
		$title=$_POST['title'];
		$description=$_POST['description'];
		$team=$_POST['team'];
		$meet1=$_POST['meet1'];
		$meet1sel=$_POST['meet1time'];
		$meet2=$_POST['meet2'];
		$meet2sel=$_POST['meet2time'];
		$meet3=$_POST['meet3'];
		$meet3sel=$_POST['meet3time'];

		$title = sanitise_input($title);
		$description = sanitise_input($description);
		$team = sanitise_input($team);

		$meet1full = datetime($meet1, $meet1sel);
		$meet2full = datetime($meet2, $meet2sel);
		$meet3full = datetime($meet3, $meet3sel);

		// Define Database
		$sql_table="meetings";

		// query to get team id from team name
		$query_getteamid = "SELECT teamid FROM teams WHERE teamname='$team'";
		$result_getteamid = mysqli_query($conn, $query_getteamid);

		if (!$result_getteamid) {
			echo "<p>Something is wrong with", $query_getteamid, "</p>";
		} else {
			$record_getteamid = mysqli_fetch_assoc($result_getteamid);
			$teamid = $record_getteamid["teamid"];

			// query to insert meeting into db
			$query_insertmeeting = "INSERT INTO meetings (title, description, teamid, meet1, meet2, meet3) VALUES ('$title', '$description', '$teamid', '$meet1full', '$meet2full', '$meet3full');";
			$result_insertmeeting = mysqli_query($conn, $query_insertmeeting);

			if (!$result_insertmeeting) {
				echo "<p>Something is wrong with ", $query_insertmeeting, "</p>";
			}
		}
	} // end else no connection

	echo "<p>Done</p>";
?>
</article>
<?php
header("Location: manage.php");
die();
?>
