<html>
    <head>
        <title>Marist Room Reservation Recommender</title>
    </head>
    <body>
        <h1><center>Welcome to Marist Room Reservation Recommender!</center></h1>
    <?php
            session_start();
            require 'sql.php';
            
            function insertUser($usersTable, $columns, $values) {
                $sql = "INSERT INTO $usersTable $columns VALUES $values;";
                return $sql;
            }
            if ($_SESSION['login_user']) {
                if ($_SESSION['Admin']) {
                    echo "<form method=\"POST\">\n";
                    echo "Name: <br> <input type=\"text\" name=\"Name\" required>\n<br>";
                    echo "CWID: <br> <input type=\"text\" name=\"CWID\" required>\n<br>";
                    echo "<br>Gender: <br> Male: <input type=\"radio\" name=\"Gender\" value=\"1\" required>";
                    echo "Female: <input type=\"radio\" name=\"Gender\" value=\"2\"><br>";
                    echo "<br>Class: <br> <input type=\"radio\" name=\"Year\" value=\"1\" required>\nFreshman<br>";
                    echo "<input type=\"radio\" name=\"Year\" value=\"2\" required>\nSophomore<br>";
                    echo "<input type=\"radio\" name=\"Year\" value=\"3\" required>\nUpperclassman<br>";
                    echo "<br>Email Address: <br> <input type=\"Email\" name=\"Email\" required><br>\n";
                    echo "Username: <br> <input type=\"text\" name=\"Username\" required><br>\n";
                    echo "Password: <br> <input type=\"password\" name=\"Password\" required><br>\n";
                    echo "<br>Perferences: <br>";
                    echo "<input type=checkbox name=\"Needs\" value=\"1\"> Special Needs<br />\n" .
                         "<input type=checkbox name=\"Laundry\" value=\"1\"> Laundry on Premise<br />\n" .
                         "<input type=checkbox name=\"Kitchen\" value=\"1\"> Fully Equipped Kitchen<br />\n";
                    echo "<br>Admin: <br> Admin User <input type=checkbox name=Admin value=1><br>";
                    echo "<br>" . "<input type=submit name=confirm value=Submit></form>";
                        if (isset($_POST['confirm'])) {
            	    		$name = $_POST["Name"];
            	    		$cwid = $_POST["CWID"];
            	    		$gender = $_POST["Gender"];
            	    		$year = $_POST["Year"];
            	    		$email = $_POST["Email"];
            	    		$username = $_POST["Username"];
            			    $password = $_POST["Password"];
            			    $kitchen = $_POST["Kitchen"];
            			    $laundry = $_POST["Laundry"];
            			    $specialNeeds = $_POST["Needs"];
            			    $admin = $_POST["Admin"];
            			    
            			    $sql = insertUser("Users", "(Name, CWID, Gender, Year, Email, Username, Password, Kitchen, Laundry, Needs, Admin)",
            			    "('$name', '$cwid', '$gender', '$year',  '$email', '$username', password('$password'), '$kitchen', '$laundry', '$needs', '$admin');");
            	           
            	            $result = mysqli_query($conn,$sql);
            	            unset($_POST['confirm']);
            	            echo "<br>Succesfully created new user $username.";
            	            echo "<br> <a href=admin_users.php>Done</a>";
                    }
                }
                else {
                    header('location:profile.php?message=You%20do%20not%20have%20access%20to%20this%20page.');
                }
            }
            else {
                header('location: login.php?message=You%20are%20not%20logged%20in.');
            }
    ?>
    </body>
</html>