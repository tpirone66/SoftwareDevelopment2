<?php
    $servername = "localhost";
    $username = "tdixon24";
    $password = "";
    $dbname = "P3";
    
    $conn = mysqli_connect($servername, $username, $password);
    
    if (!$conn) 
        die("Connection failed: ".mysqli_connect_error());
    else 
        mysqli_select_db($conn, $dbname); // at this point, we have (1) a connection to the MySQL instance, and (2) we've selected our project database


    function dormTableExists($dormTable) {
        $sql = "SELECT * FROM $dormTable";
        if (query($sql) !== FALSE) 
            return true;
        else 
            return false; 
    }
    
    function reservationsTableExists($reservationsTable) {
        $sql = "SELECT * FROM $reservationsTable";
        if (query($sql) !== FALSE) 
            return true;
        else 
            return false; 
    }
    
    function usersTableExists($usersTable) {
        $sql = "SELECT * FROM $usersTable";
        if (query($sql) !== FALSE) 
            return true;
        else 
            return false; 
    }
    
    function query($sql) {
        global $conn;
        return mysqli_query($conn, $sql);
    }
    
    function createDormTable($dormTable, $columns) {
        $sql = "CREATE TABLE $dormTable (" . implode(", ", $columns) . ")";
        echo "Creating table with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
    function createReservationTable($reservationsTable, $columns) {
        $sql = "CREATE TABLE $reservationsTable (" . implode(", ", $columns) . ")";
        echo "Creating table with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
    function createUserTable($usersTable, $columns) {
        $sql = "CREATE TABLE $usersTable (" . implode(", ", $columns) . ")";
        echo "Creating table with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
    function createRecord($dormTable, $values) {
        return insertInto($dormTable, ["Dorm","Year","Capacity","Available","Kitchen","Laundry","Needs"], $values);
    }
    
    function insertInto($dormTable, $columns, $values) {
        $sql = "INSERT INTO $dormTable (" . implode(", ", $columns). ") VALUES (" . implode(", ", $values) . ")";
        echo "Inserting a new record with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
    function insertIntoUser($usersTable, $columns, $values) {
        $sql = "INSERT INTO $usersTable (" . implode(", ", $columns). ") VALUES (" . implode(", ", $values) . ")";
        echo "Inserting a new record with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
?>










