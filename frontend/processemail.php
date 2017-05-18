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
		if (!isset($_SESSION)) session_start();
		//Retrieve Username & Password from DB
		$timezone=$_POST['timezone'];
		$email=$_POST['email'];
		$user=$_SESSION['username'];
		if($timezone == "") {
			$timezone = 0;
		}
		if($email == "") {
			$email = 0;
		}
		
      	//echo $_SESSION['username'];

			//Define Database
			$sql_table="users";

			//Query to add new user
			$query = "UPDATE users SET subscribe = '$email', timezone='$timezone' WHERE users.username = '$user';";

			
			$result = mysqli_query($conn, $query);
			if(!$result)
			{
				echo "<p>Something is wrong with ", $query, "</p>";
			}


	} //end else no connection

	echo "<p>Done</p>";
?>
</article>
<?php
header("Location: settings.php");
die();
?>
