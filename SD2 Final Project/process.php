<?php
    require 'sql.php';
    $name = $_POST["Name"];
    $cwid = $_POST["CWID"];
    $year = $_POST["Year"];
    $gender = $_POST["Gender"];
    $email = $_POST["Email"];
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $kitchen = $_POST["Kitchen"];
    $laundry = $_POST["Laundry"];
    $needs = $_POST["Needs"];

    $sql = "INSERT INTO Users (Name, CWID, Year, Gender, Email, Username, Password, Kitchen, Laundry, Needs, Admin)
            VALUES ( '$name', '$cwid', '$year', '$gender', '$email', '$username', password('$password'), '$kitchen',
            '$laundry', '$needs', '0')";
            
    if ($conn->query($sql) === TRUE) {
        echo "<center><a href=\"login.php\">Your account has been created! You can now login!.</a></center>";
    }
    else {
        echo "Oops! Something went wrong!: " . $sql . "<br>" . $conn->error;
   }
   
?>