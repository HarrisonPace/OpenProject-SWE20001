<?php
	// connection info
	$host = "127.0.0.1";
	$user = "root";
	$pwd = "redtango";
	$sql_db = "openproject";

	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// Checks if connection is successful
	if (!$conn) {
		
			echo "<p>Database connection failure</p>"; 	// Displays an error message
	} else {                                            // Upon successful connection

		//Retrieve Username & Password from DB
		$username=$_POST['username'];
		$password=$_POST['password'];

		$username = sanitise_input($username);
		$password = sanitise_input($password);

		//Define Database
		$sql_table="users";

		//Query to Check if User Exists
		$query_login = "SELECT * FROM users WHERE username='$username' and password='$password';";

		$result_login = mysqli_query($conn, $query_login);

		//Check if User Exists on dB and if so, Log User in with session
		if(!$result_login) {
			echo "<p>Something is wrong with ", $query_login, "</p>";
		} else {
			$record = mysqli_fetch_assoc($result_login);
			
			if (!$username or !$password) {
				header("Location: login.php");
			} elseif (($record["username"] == $username) && ($record["password"] == $password)) {
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['id'] = $record["userid"];
				header("Location: meetings.php");
			} else {
				echo "<p>Wrong Username or Password!</p>";
				echo "<p><a href=\"login.php\">Return to Login Page.</a></p>";
				//sleep(3); -- optional automatic redirection
				//header("location:login.php");
			}
		}
	}
?>
