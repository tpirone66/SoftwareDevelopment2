<?php
    session_start();
    unset($_SESSION['login_user']);
    header ("location: login.php?message=You%20are%20logged%20out.");
?>