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

		//Retrieve Username & Password from DB
		$title=$_POST['title'];
		$description=$_POST['description'];
		$team=$_POST['team'];
		$meet1=$_POST['meet1'];
		$meet1sel=$_POST['meet1time'];
		$meet2=$_POST['meet2'];
		$meet2sel=$_POST['meet2time'];
		$meet3=$_POST['meet3'];
		$meet3sel=$_POST['meet3time'];

		$title = sanitise_input($title);
		$description = sanitise_input($description);
		$team = sanitise_input($team);

		$meet1full = $meet1 . " " . $meet1sel . ":00";
		$meet2full = $meet2 . " " . $meet2sel . ":00";
		$meet3full = $meet3 . " " . $meet3sel . ":00";



			//Define Database
			$sql_table="meetings";

			//Query to add new user
			$query = "INSERT INTO meetings (title, description, team, meet1, meet2, meet3) VALUES ('$title', '$description', '$team', '$meet1full', '$meet2full', '$meet3full');";


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
header("Location: manage.php");
die();
?>
