<!-- Activation data GET the activation code from the registration and match with the sql database, if it is match put a new entry in the Status column (Active/Inactive) -->
<!-- Put php logic first and then html/css/js stuff after -->

<?php
// Create connection with mySQL database

$server = "localhost";
$username = "root";
$password = "root";
$database = "scotchbox";

$mysql_connection = new mysqli($server, $username, $password, $database);

// Check connection
if ($mysql_connection->connect_error) {
    die("Connection failed: " . $mysql_connection->connect_error);
}

//get code from query string
$valid = false; //activation validator
$showMessage = false; //shows the activation success message

if (isset($_GET['code'])){  //checks if the variable is set to code in the url (when writing if, pu the else statement under straight away to keep track of it)
	
	$getCode = $_GET['code'];

	$clean_activation_code = mysqli_real_escape_string($mysql_connection, $getCode);  //sanitise the activationcode

	$databaseCheck_query = "SELECT status FROM users WHERE hash='$clean_activation_code'"; 	//setting the variable for selecting a query

	$result = mysqli_query($mysql_connection, $databaseCheck_query);			//query for checking the database

	if ($result){
		if (mysqli_num_rows($result) > 0){   	//check if the table rows exist in the database
			$row = mysqli_fetch_assoc($result);	//fetches the specific row
			if ($row['status'] == ''){				//if the row entry for 'status' is empty -means not activated yet
				//build and run update query
				$query_updateDatabase	= "UPDATE users SET status = 'Activated' WHERE hash ='$clean_activation_code'"; //this sets the variables to a query for updating the database
				$result_update = mysqli_query($mysql_connection, $query_updateDatabase);			//this runs the query to update the database
				if ($result_update) {		// query ran okay		
					if (mysqli_affected_rows($mysql_connection) > 0){	// and we changed some rows of data
						// echo "Database updated";						//show a message to the user, we have succeeded, prompt them to log in next
						$showMessage = true;
						$valid=true;
					}	
				}else {
					echo "Problem updating the database";
					$showMessage = false;
				}
			} else{
				echo 'This Account has already been activated!';	//if '', then the account is already activated - give feedback on page to say this
				$showMessage = false;
			}
		}else {
			echo "Couldn't find code in database";
		}	
	}else {
		echo "Uh oh! There has been a problem - Contact administrator";
	}	
}else{
	echo "Uh oh! There has been a problem - Contact administrator";
}			


if ($showMessage==true){ ?>
<html>
    <head>
        <link rel="stylesheet">
    </head>
    <body>
	<h1>Success!</h1>
	<h2>Your Account Has Been Activated</h2>
	<p>You can now <a href="index.php">log in</a></p>
	</body>
</html>
<?php } 
?>