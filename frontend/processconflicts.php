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
		if (!isset($_SESSION)) session_start();
		//Retrieve Username & Password from DB
		$select=$_POST['select'];
		$title=$_POST['meeting'];
		$user=$_SESSION['username'];
		
		
		
		if ($select == "meet1") {
			$selection = "meetpref1";
		} elseif ($select == "meet2") {
			$selection = "meetpref2";
		} elseif ($select == "meet3") {
			$selection = "meetpref3";
		}
		
		//echo $selection;
		//echo $title;

		
      	//echo $_SESSION['username'];

			//Define Database
			$sql_table="meetings";

			//Query to add new user
			$query = "UPDATE meetings SET $selection = $selection + 1 WHERE meetings.title = '$title';";

			
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
header("Location: conflictsresolved.php");
die();
?>
