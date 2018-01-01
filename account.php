<?php
session_start(); // start session to check that the user is already logged-in

if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in'] == 'YES'){	?>
	   <html>
		    <body>
			<h2>You have logged in.</br>Welcome to your account!</h2>
			</body>
		</html>
	<?php
	} else {	?>
		<html>	
		    <body>
			<h2>You are logged out!</br>Please <a href="index.php">log in</a></h2>
			</body>
		</html>
<?php } 
?>
<?php } 
?>

