<?php
	/*Simple Scipt to Remove session thereby logging User out*/
	session_start();
	session_destroy(); //when called will end session preventing access to supervisor interface
	header("location:login.php"); //return user to login page
?>
