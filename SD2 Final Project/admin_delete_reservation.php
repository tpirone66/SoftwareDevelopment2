<?php
    session_start();
    require 'sql.php';
    
    function deleteRecord($reservationsTable, $column, $value) {
        $sql = "DELETE FROM $reservationsTable WHERE $column='$value';";
        return $sql;
    }
    
    if ($_SESSION['login_user']) {
        if ($_SESSION['Admin']) {
            if (isset($_POST['submit'])) {
                echo "Successfully removed '".$_POST['record']. "' from the ".$_POST['table']. " Table!<br>";
                $sql = deleteRecord($_POST['table'],$_POST['column'],$_POST['record']);
                $result = mysqli_query($conn, $sql);
                echo "<br> <a href=admin_reservations.php>Complete!</a>";
            }
        } 
        else {
            header('location: profile.php?message=You%20do%20not%20have%20access%20to%20this%20admin%20page.');
        }
    } 
    else {
        header('location: index.php?message=You%20are%20not%20logged%20in.');
    }
?>