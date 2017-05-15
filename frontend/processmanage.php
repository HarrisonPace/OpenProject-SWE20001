<?php
	$host = "127.0.0.1";
    $user = "root";
    $pwd = "redtango";
    $sql_db = "openproject";

    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
     );

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
		$delete=$_POST['delete'];
		if($delete == "") {
			//do nothing
		} else {
			
		

		
      	//echo $_SESSION['username'];

			//Define Database
			$sql_table="users";

			//Query to add new user
			$query = "DELETE FROM meetings WHERE title = '$delete';";

			
			$result = mysqli_query($conn, $query);
			if(!$result)
			{
				echo "<p>Something is wrong with ", $query, "</p>";
			}
			
		}
	} //end else no connection

	echo "<p>Done</p>";
?>
</article>
<?php
header("Location: manage.php");
die();
?>
