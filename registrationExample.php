<?php
// create a database connection
$db_server = "localhost";
$db_username = "root";
$db_password = "root";
$db_database = "scotchbox";

// Create connection
$mysql_connection = new mysqli($db_server, $db_username, $db_password, $db_database);

// Check connection
if ($mysql_connection->connect_error) {
    die("Connection failed: " . $mysql_connection->connect_error);
} 

// set defaults
$error_messages = [];
$error = false;
$email = '';
$password = '';

// check to see if the form has been submitted
if ($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // if it has, check the inputs
    if ($email){
        // they have provided an email
    }else{
        $error_messages[] = 'Please provide an email';
        $error = true;
    }

    if ($password){
        // they have provided an email
    }else{
        $error_messages[] = 'Please provide an password';
        $error = true;
    }

    if ($error){
        // there was a problem, don't continue
    }else{
        // we can continue to next steps

        // create activation code
        $activation_code = 'blah';

        // creating an account in the database
        $query = "INSERT INTO `users`
                        (`email`, `password`, `activation_code`)
                    VALUES
                        ('$email', '$password', '$activation_code');";

        $result = mysqli_query($mysql_connection, $query);
        if ($result){
            // query ran okay
            if (mysqli_affected_rows($mysql_connection) > 0){
                // and we changed 1 or more rows of data
                echo 'SUCCESS, now send email';
                // send email

                // show a success message, and hide form

            }else{
                $error_messages[] = 'There was a problem creating your account';
                $error = true;
            }
        }else{
            // Uh oh, query didn't run! A problem with the query
            $error_messages[] = 'There was a problem creating your account';
            $error = true;
        }
    }
}


if ($error){ ?>
    <div style="color:red;">
        <h2>There were some problems</h2>


        <?php 
        foreach($error_messages AS $error_message){
            echo $error_message.'<br>';
        } ?>
    </div>
<?php }


        


?>

<form action="" method="post">
    <label for="email">Email:*</label> <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
    
    <label for="password">Password:*</label> <input type="password" name="password" value="<?php echo $password; ?>"><br><br>
    
    <input type="submit" value="Create account">
</form>