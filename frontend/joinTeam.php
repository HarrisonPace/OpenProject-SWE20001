<?php
	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// connection info
	$host = "127.0.0.1";
	$user = "root";
	$pwd = "redtango";
	$sql_db = "openproject";
	
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	// checks if connection is successful
	if (!$conn) {
		// displays an error message
		echo "<p>Database connection failure</p>";
	} else {
		// retrieve data from form
		$teamname = $_POST['teamname'];
		$userid = $_POST['userid'];

		// query to get team id
		$query_teamid = "SELECT teamid FROM teams WHERE teamname='$teamname';";
		$result_teamid = mysqli_query($conn, $query_teamid);


		$record_teamid = mysqli_fetch_assoc($result_teamid);
		$teamid = $record_teamid["teamid"];

		// query to add user to team
		$query_adduser = "INSERT INTO userteams (userid, teamid) VALUES ('$userid', '$teamid');";
		$result_adduser = mysqli_query($conn, $query_adduser);


		if (!$result_adduser) {
			echo "<p>Something is wrong with ", $query_adduser, "</p>";
		} else {
			header("Location: teams.php");
		}

	} // end else no connection
?>