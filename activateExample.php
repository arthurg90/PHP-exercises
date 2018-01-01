<?php
// connect to database (we'll need it later)
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

// we'll probably set some variables here
$error_messages = [];
$error = false;
$success = false;

// check the code exists (in query string)
if (isset($_GET['code'])){
    // get code from query string
    $activation_code = $_GET['code'];

    // sanitise the activation code from the URL
    $clean_activation_code = mysqli_real_escape_string($mysql_connection, $activation_code);

    // go into the database and check there is a matching code in database
    $query = "SELECT * FROM `users` WHERE `activation_code` = '$clean_activation_code'";
    $result = mysqli_query($mysql_connection, $query);
    if ($result){
        // query ran okay
        if (mysqli_num_rows($result) > 0){
            // matching a record in database
            $row = mysqli_fetch_assoc($result);

            // check to see if that account already activated
            // check activation_status field == pending
            if ('pending' == $row['activation_status']){
                // that means account isn't activated yet

                // build and run a query to activate (read: update) the account
                $activate_query = "UPDATE `users` SET `activation_status` = 'active' WHERE `activation_code` = '$clean_activation_code'";
                $activate_result = mysqli_query($mysql_connection, $activate_query);

                if ($activate_result){
                    // query ran okay
                    if (mysqli_affected_rows($mysql_connection) > 0){
                        // and we changed 1 or more rows of data

                        // show a message to the user, we have succeeded, prompt them to log in next
                        $success = true;

                    }else{
                        $error_messages[] = 'Something went wrong with the database';
                        $error = true;
                    }
                }else{
                    $error_messages[] = 'Something went wrong with the database';
                    $error = true;
                }

                

            }else{
                $error_messages[] = 'Account already activated, please login';
                $error = true;
            }


        }else{
            $error_messages[] = 'Can\'t find activation code in database, try registering again';
            $error = true;
        }
    }else{
        $error_messages[] = 'Something went wrong with the database';
        $error = true;
    }

}else{
    $error_messages[] = 'You\'re missing the activation code, please follow the link in the email again.';
    $error = true;
} ?>
<html>
    <head></head>
<body>        

    <?php
    if ($error){ ?>
        <div style="color:red;">
            <h2>There were some problems</h2>

            <?php 
            foreach($error_messages AS $error_message){
                echo $error_message.'<br>';
            } ?>
        </div>
    <?php }

    if ($success){ ?>
        We activated your account, you can login now <a href="login.php">here</a>
    <?php } ?>
</body>
</html>