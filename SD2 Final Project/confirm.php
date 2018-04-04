<!DOCTYPE html>
<html>
     <head>
        <title>Marist Room Reservation Recommender</title>
    </head>
    <body>
        <h1><center>You are all set! Here are the results!</center></h1>
        <?php
            require 'sql.php';
            session_start();
            if ($_SESSION['login_user']) {
                $username = $_SESSION['login_user'];
                $name = $_SESSION['Name'];
                $reservationTime = date('Y-m-d g:i:s');
                $reservationRecordID = substr(md5(uniqid(rand(), true)), 10, 10);
                $dormChoice = $_POST["Dorm"];
                
                $reservationRecord = "INSERT INTO Reservations (reservationRecordID, reservationTime, Name, Dorm, Username)
                VALUES ('$reservationRecordID', '$reservationTime', '$name', '$dormChoice', '$username')";
                
                $available = "UPDATE Dorms SET Available = (Available - 1) WHERE Dorm = '$dormChoice'";
                if ($conn->query($reservationRecord) === TRUE and $conn->query($available) === TRUE) {
                    echo '<b>Name:</b> ' . $name . '<br>';
                    echo '<b>Username:</b> ' . $username . '<br>';
                    echo '<b>Residence Area:</b> ' . $dormChoice . '<br>';
                    echo '<b>Reservation Time:</b> ' . $reservationTime . '<br>';
                    echo "<b>Reservation Record Number:</b> $reservationRecordID <br>";
                    echo "<br>Your recommendation has been saved! Thank you for using our platform!";
                    echo "<br><a href=profile.php>Manage profile</a>";
                } 
                else {
                    echo "Oops! Something went wrong!: " . $sql . "<br>" . $conn->error;
                }
            }
            else {
                echo "You are not logged in! Sign in now!";
                header('location: index.php?message=You%20must%20sign%20in%20first.');
            }
            $conn->close();
        ?>
    </body>
</html>