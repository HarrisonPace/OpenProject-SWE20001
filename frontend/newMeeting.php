
<?php
	// connection info
	require_once("dbSettings.php");

	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

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

		//Retrieve Username & Password from form
		$teamname = $_POST['teamname'];
		$teamleader = $_POST['teamleader'];

		$teamname = sanitise_input($teamname);
		$teamleader = sanitise_input($teamleader);

		//Define Database
		$sql_table = "meetings";

		//Query to add new user
		$query = "INSERT INTO meetings (teamname, teamleader) VALUES ('$teamname', '$teamleader', '$password');";

		$result = mysqli_query($conn, $query);
		if(!$result)
		{
			echo "<p>Something is wrong with ", $query, "</p>";
		}

		} //end else passwords not matching
	} //end else no connection

	echo "<p>Done</p>";
?>

<?php
header("Location: login.php");
die();
?>
