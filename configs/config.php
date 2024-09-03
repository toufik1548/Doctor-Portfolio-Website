<?php

	$host		=	"localhost"; 			// Host name
	$username	=	"root"; 		// Mysql username
	$password	=	""; 				// Mysql password
	$db_name	=	"dr_marufalhasan"; 	// Database name

	$site_url	=	"http://localhost/dr";


// Connect to the database server and select databse.
	$con = mysqli_connect("$host", "$username", "$password","$db_name");
	
	if (mysqli_connect_errno())
	{
	  die ("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	
// Set character set and collation to utf8mb4
mysqli_query($con, "SET NAMES 'utf8mb4'");
mysqli_query($con, "SET CHARACTER SET utf8mb4");
mysqli_query($con, "SET SESSION collation_connection ='utf8mb4_general_ci'");

?>