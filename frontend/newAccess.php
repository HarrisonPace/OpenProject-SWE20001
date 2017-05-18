<?php
	// connection info
	$host = "127.0.0.1";
	$user = "root";
	$pwd = "redtango";
	$sql_db = "openproject";

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

		//Retrieve Username & Password from DB
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];

		$email = sanitise_input($email);
		$username = sanitise_input($username);
		$password = sanitise_input($password);
		$repassword = sanitise_input($repassword);

		$query_username_check = "SELECT username FROM Users WHERE username='$username'";

		if ($password != $repassword)
		{
			echo "<p>Passwords do not match</p>";
		}
		else
		{

			//Define Database
			$sql_table="users";

			//Query to add new user
			$query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password');";

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
