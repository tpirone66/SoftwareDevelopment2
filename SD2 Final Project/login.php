<?php
	require 'sql.php';
	if(isset($_SESSION['login_user'])) {
		header("location: profile.php");
	}
?>
<html>
	<body>
		<h1><center>Welecome to Marist Room Reservation Recommender</center></h1>
		<?php echo $_GET[message];?>
		<center><h2>Login Form</h2>
    		<form action="verify.php" method="post">
    			<label>Username :</label>
    			<br><input id="Username" name="Username" placeholder="Username" type="text"><br>
    			<br><label>Password :</label>
    			<br><input id="Password" name="Password" placeholder="*********" type="password"><br>
    			<br><input name="submit" type="submit" value=" Login ">
    		</form>
		<a href="signup.php">Click here to create an account!</a></center>
	</body>
</html>