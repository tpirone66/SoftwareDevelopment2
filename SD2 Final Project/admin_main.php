<?php
    session_start();
    echo $_GET['message']."\n<br>";
    
        if ($_SESSION['login_user']) {
            if ($_SESSION['Admin']) { 
                echo "<center><h1>Administrative Menu</h1></center>\n";
                echo "Hello  ".$_SESSION['login_user'].", it's nice to have you here.\n<br>";
                echo "<a href=admin_users.php>Manage Users</a><br>\n";
                echo "<a href=admin_dorms.php>Manage Dorms</a><br>\n";
                echo "<a href=admin_reservations.php>Manage Reservations</a><br>\n";
                echo "<a href=logout.php>Logout</a>\n";
            } 
            else {
                header('location: profile.php?message=You%20do%20not%20have%20access%20to%20this%20admin%20page.');
            }
        } 
        else {
            header('location: index.php?message=You%20are%20not%20logged%20in.');
        }

?>