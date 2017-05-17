<?php
	// connection info
	require_once("dbSettings.php");

	$conn = @mysqli_connect("$host:$port", $user, $pwd, $sql_db);

	function sanitise_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	// Checks if connection is successful
	if (!$conn)
	{
		// Displays an error message
		echo "<p>Database connection failure</p>";
	}
	else
	{ // Upon successful connection

		//Retrieve Username & Password from DB
		$teamname=$_POST['teamname'];
		$teamleaderid=$_POST['teamleaderid'];

		$teamname = sanitise_input($teamname);
		$teamleaderid = sanitise_input($teamleaderid);

		$sql_table="users";

		//Query to add new user
		$query = "INSERT INTO teams (teamname, teamleaderid) VALUES ('$teamname', '$teamleaderid');";

		$result = mysqli_query($conn, $query);
		if(!$result)
		{
			echo "<p>Something is wrong with ", $query, "</p>";
		}

	} //end else no connection

	echo "<p>Done</p>";
?>

<?php
header("Location: login.php");
die();
?>
