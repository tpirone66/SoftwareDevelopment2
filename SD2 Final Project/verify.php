<?php
	session_start();
	require 'sql.php';

	if (isset($_POST['submit'])) {
		if (empty($_POST['Username']) || empty($_POST['Password'])) {
			echo "<center>No username or password has been entered. <br></center>";
			echo "<center><a href=\"login.php\">Click here to login to the account.</a></center>";
		} 
		else {
    		$username=$_POST['Username'];
    		$password=$_POST['Password'];
    		
    		$sql = "SELECT * FROM Users WHERE Password=password('$password') AND Username='$username'";
    		
    		$result = mysqli_query($conn, $sql);
    		

    		if(mysqli_num_rows($result) == 1) {
    			$_SESSION['login_user']=$username;
    			$aUser = mysqli_fetch_assoc($result);
    			
    			$_SESSION['Name'] = $aUser['Name'];
    			$_SESSION['CWID'] = $aUser['CWID'];
    			$_SESSION['Gender'] = $aUser['Gender'];
    			$_SESSION['Year'] = $aUser['Year'];
    			$_SESSION['Email'] = $aUser['Email'];
    			$_SESSION['Username'] = $aUser['Username'];
    			$_SESSION['Kitchen'] = $aUser['Kitchen'];
    			$_SESSION['Laundry'] = $aUser['Laundry'];
    			$_SESSION['Needs'] = $aUser['Needs'];
    			$_SESSION['Admin'] = $aUser['Admin'];
    			
    			if ($aUser['Admin']) {
    				header('location: admin_main.php');
    			} 
    			else {
    				header('location: profile.php');
    			}
    		
    		}
    		else {
    			echo "<center>The entered username or password is invalid.</center><br>";
    			echo "<center><a href=\"login.php\">Click here to login to the account.</a></center>";
    		}
    		
    		mysqli_close($conn);
		}
    }
?>