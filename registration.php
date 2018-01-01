
<?php
session_start(); // start session to check that the user is already logged-in
?>


<h1>Register</h1>
<?php

$_SESSION['logged_in'] = 'NO'; // use session start NO as default on log in page and will change to YES when email and password are matched on log in page

$server = "localhost";
$username = "root";
$password = "root";
$database = "scotchbox";

// Create connection with mySQL
$mysql_connection = new mysqli($server, $username, $password, $database);

// Check connection
if ($mysql_connection->connect_error) {
    die("Connection failed: " . $mysql_connection->connect_error);
}

// to check if connection works put "echo 'it works!'" in here to check

$show_form = true;

// set defaults
$email = '';
$password = '';
$hash = md5(rand(0,1000));
$activation = '';
$error = false;
$success = false;

//check to see if the form has been submitted
if ($_POST){
	$inputEmail = $_POST['email'];
	$inputPassword = $_POST['password'];

//check the inputs - the password length is min 12 chars, email address must be certain format - everything else should be an error

	if (!$inputEmail){ //checks if there is an email
		echo 'Please provide an email</br>';
  		$error = true;
	}elseif (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) { //AND check if the email is valid
  		echo 'Invalid email format</br>';
  		$error = true;
	}

	if (!$inputPassword){
		echo 'Please provide a password</br>'; //check if there is a password
  		$error = true;
  // 	}elseif (strlen($inputPassword) < 8) { //check if the password has at least 8 chars.
		// echo 'Password must be minimum 8 characters';
		// $error = true;
  //   }
    // check that password has a letter, number and symbol
	}elseif (!preg_match('/^\d[A-Za-z][0-9A-Za-z!@#$%]{8,12}$/', $inputPassword)) {
		echo 'Password must be minimum 8-12 characters, contain a letter, number and symbol!';
		$error = true;
	}

    // we've done our input checks, now check to see if we continue
    if ($error == false) {
    	// everything is good, continue
	////create the account in the database in mySql:
    	$show_form = false;
        $activation = $hash;

  		// $query = "INSERT INTO users (email, password, hash) VALUES ('$inputEmail', '$inputPassword', '$activation');";
		// $result = mysqli_query($mysql_connection, $query);

		//sanitize the user input:

		$clean_email = mysqli_real_escape_string($mysql_connection, $inputEmail);

		$clean_password = mysqli_real_escape_string($mysql_connection, $inputPassword);

		$clean_activation_code = mysqli_real_escape_string($mysql_connection, $activation);

		$query = "INSERT INTO users (email, password, hash) VALUES ('$clean_email', '$clean_password', '$clean_activation_code');";
		$result = mysqli_query($mysql_connection, $query);


		if ($result){
			// query ran okay
			if (mysqli_affected_rows($mysql_connection) > 0){  ////check if the edited table row is on the database (mysqli_affected_rows used when selecting or checking the rows)
				echo 'New record ID is '.mysqli_insert_id($mysql_connection); // and we changed 1 or more rows of data id of the record is displayed on the page
				//email message
				$subject = "Activate your account!";
				$message = 'This is an automated email - Click <a href="http://192.168.33.10/day3/activate.php?code=' .$activation. '">this link</a> to activate account';
				$headers = "From: Dev Me <team@example.com>\r\n"; 
				$headers .= "Reply-To: Help <help@example.com>\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html;\r\n";
				$to_email = "$clean_email";

				if (mail($to_email, $subject, $message, $headers)); {
    				  $success = true;    	
				}		//send the email to the provided address with the corresponding $headers	
				if ($success = true) {
					echo '</br>Success - Form Submitted! Follow the activation link on your email';
				}
				else {
					echo 'Something is wrong - Form not submitted!';
				}	
			}
		}else{
			// Uh oh, query didn't run! A problem with the query
			echo "Problem with the query!";
		}
    	
   }
}
	

// FORM in html shows if $show_form = true

if ($show_form){ ?>
    <form action="registration.php" method="post">
        Email: <input type="text" name="email" /><br>
        Password: <input type="password" name="password" /><br><br>
        <input type="submit" value="Create account" />
    </form>
<?php } 
?>


