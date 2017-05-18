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

	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else {
		//Retrieve Username & Password from DB
		$teamname=$_POST['teamname'];
		$teamleaderid=$_POST['teamleaderid'];
		$teamname = sanitise_input($teamname);
		$teamleaderid = sanitise_input($teamleaderid);

		//Query to add new team
		$query_newteam = "INSERT INTO teams (teamname, teamleaderid) VALUES ('$teamname', '$teamleaderid');";
		$result_newteam = mysqli_query($conn, $query_newteam);

		if(!$result_newteam) {
			echo "<p>Something is wrong with ", $query_newteam, "</p>";
		} else {
			$last_id = mysqli_insert_id($conn);
			
			//Query to add team creator to team
			$query_adduser = "INSERT INTO userteams (userid, teamid) VALUES ('$teamleaderid', '$last_id');";
			$result_adduser = mysqli_query($conn, $query_adduser);

			if(!$result_adduser) {
				echo "<p>Something is wrong with ", $query_adduser, "</p>";
			} 
		}
	} //end else no connection
	echo "<p>Done</p>";
?>