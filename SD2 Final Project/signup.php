<html>
    <head>
        <title>Marist Room Reservation Recommender</title>
    </head>
    <body>
        <h1><center>Welcome to Marist Room Reservation Recommender!</center></h1>
    <?php
            require 'sql.php';
            echo "<form action=\"process.php\" method=POST>\n";
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
            echo "<br>" . "<input type=submit value=Submit></form>";
    ?>

    </body>
</html>