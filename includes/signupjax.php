<?php

/* this is signupjax code for the sign up page 
	@author udeme.samuel
	@author-email udemesamuel256@gmail.com
*/


/* the ajax code here */

		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		echo "udeme is here...";

 
/* do an insert to the database with pdo gateway ... !!! oops */

		include_once('config.php');

		$foisql="
				INSERT INTO `foivault_base`.`users`
				(
				  `validated`,
				  `firstname`,
				  `lastname`,
				  `email`,
				  `password`
				)
				VALUES
				(
				  ?,
				  ?,
				  ?,
				  ?,
				  ?
				)";

		$query = $conn->prepare($foisql);

		$foisqlenter=$query->execute(array($validated,$firstname,$lastname,$email,$password));

		if ( $foisqlenter == true ) {
			$message=['message':'wow'];
			echo json_decode($message);
		}



?>s