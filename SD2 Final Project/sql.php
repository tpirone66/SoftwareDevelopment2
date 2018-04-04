<?php
    require 'sql_helper.php';
    
    if (!mysqli_select_db($conn, $dbname)) { 
        $sql = "CREATE DATABASE $dbname";
        if (mysqli_query($conn, $sql)) {
            mysqli_select_db($conn, $dbname);
        } 
        else {
            echo "Error creating database: ".mysqli_error($conn);
            die;
        }
    } 

    $dormTable = "Dorms";
    $reservationsTable = "Reservations";
    $usersTable = "Users";
    
    if (!dormTableExists($dormTable)) { // if the $table does not exist, then create it
    
        createDormTable($dormTable, ["ID INT(6) AUTO_INCREMENT UNIQUE", "Dorm VARCHAR(100)", "Year TINYINT(1)",
                                     "Capacity INT", "Available INT", "Kitchen TINYINT(1)", "Laundry TINYINT(1)", 
                                     "Needs TINYINT(1)"]);
        
        createRecord($dormTable, ["'Champagnat Hall'", "1", "5", "5", "1", "1", "1"]);                        
        createRecord($dormTable, ["'Leo Hall'", "1", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Marian Hall'", "1", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Sheahan Hall'", "1", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Midrise Hall'", "2", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Lower West Cedar'", "2", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Foy Townhouses'", "2", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'New Townhouses'", "2", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Upper West Townhouses'", "2", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Building A'", "3", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'New Fulton Townhouses'", "3", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Fulton Street Townhouses'", "3", "5", "5", "1", "1", "1"]);
        createRecord($dormTable, ["'Talmadge Court'", "3", "5", "5", "1", "1", "1"]);
        
    } 
    
    if (!reservationsTableExists($reservationsTable)) { // if the $table does not exist, then create it
    
        createReservationTable($reservationsTable, ["ID INT(6) AUTO_INCREMENT UNIQUE", "reservationRecordID VARCHAR(10) UNIQUE", "reservationTime TIMESTAMP", 
                                                    "Dorm VARCHAR(100)","Name VARCHAR(100)", "Username VARCHAR(100)"]);
    }
    
    if (!usersTableExists($usersTable)) {
        
        createUserTable($usersTable, ["ID INT(6) AUTO_INCREMENT UNIQUE", "Name VARCHAR(100)", "Username VARCHAR(100)", "Password VARCHAR(100)", "Email VARCHAR(100)", "Year TINYINT(1)", 
                                      "CWID VARCHAR(10)", "Gender TINYINT(1)", "Kitchen TINYINT(1)", "Laundry TINYINT(1)", "Needs TINYINT(1)", "Admin TINYINT(1)"]);
                                        
        insertIntoUser($usersTable, ["Name", "Username", "Password", "Admin",], ["'Admin'", "'Admin'", "password('root')", "1"]);
    }
?>