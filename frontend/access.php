<?php
	// connection info
	$host = "127.0.0.1";
	$user = "root";
	$pwd = "redtango";
	$sql_db = "openproject";

// To set up the connection to the database
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// Checks Whether connection is succesful or
	if (!$conn) {
		
			echo "<p>Database connection failure</p>"; 	// Displays an error message in case of connection failure
	} else {                                            // Upon successful connection

		//Retrieve Username & Password from Database
		$username=$_POST['username'];
		$password=$_POST['password'];

		$username = sanitise_input($username);   // Check username and password with database data
		$password = sanitise_input($password);

		//Define Database
		$sql_table="users";

		//Query to Check if User Exists
		$query_login = "SELECT * FROM users WHERE username='$username' and password='$password';";

		$result_login = mysqli_query($conn, $query_login);

		//Check if User Exists on database 
			echo "<p>Something is wrong with ", $query_login, "</p>"; //if User doesnot exist in database show error
		} else {
			$record = mysqli_fetch_assoc($result_login);
			
			if (!$username or !$password) {    //If user put in-correct values than re-direct it again to login page
				header("Location: login.php");
			} elseif (($record["username"] == $username) && ($record["password"] == $password)) { // otherwise if values are true than start the sessonss
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
