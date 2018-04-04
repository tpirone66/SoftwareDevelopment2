<!DOCTYPE html>
<html>
    <head>
        <title>Marist Room Reservation Recommender</title>
    </head>
    <body>
        <h1><center>Marist Room Reservation Recommender Dorm Selection Page!</center></h1>
        <?php
            session_start();
            require 'sql.php';
            if ($_SESSION['login_user']) { 
                if ($_SESSION['Admin']) { 
                    header("location: admin_main.php?message=You%20need%20to%20be%20a%20non-admin%20user%20to%20access%20reservations%20page.");
                }
                else {
                    $year = $_SESSION['Year'];
                    if ($year == "Freshman") {
                        $year = 1;
                    }
                    if ($year == "Sophomore") {
                        $year = 2;
                    }
                    if ($year == "Upperclassman") {
                        $year = 3;
                    }
                    echo "<form action=\"confirm.php\" method=\"POST\">";
                    echo "<h3>Choose a residence area!</h3><br>";
                    $sql = "SELECT Dorm, Available FROM Dorms WHERE Year = $year";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
        				$dormName = $row["Dorm"];
        				$dormAvailable = $row["Available"];
        				if ($dormAvailable) {
        					echo "<input type=\"radio\" name=\"Dorm\" value=\"$dormName\"> $dormName ($dormAvailable)<br>";
    				    } 
    			    	else {
    					    echo "<input type=\"radio\" name=\"Dorm\" value=\"$dormName\" disabled> $dormName ($dormAvailable)<br>";
    			    	}
    			    }
                    echo '<br><input type="submit" value="Submit"></form>';
                } 
            }
            else {
                header('location:login.php?message=You%20must%20sign%20in%20first.');
            }
        ?>
    </body>
</html>