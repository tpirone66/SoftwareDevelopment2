<html>
    <body><h1>Manage Reservations</h1>  
        <?php
            session_start();
            require 'sql.php';
            
            if ($_SESSION['login_user']) {
            
                $username = $_SESSION['Username'];
                
                if(isset($_POST['submitted'])){
                    
                    $sql = "SELECT * FROM $reservationsTable WHERE Username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $dormChoice = $row['Dorm'];
                    
                    $delete = "DELETE FROM Reservations WHERE Username = '$username'";
                    mysqli_query($conn, $delete);
                    
                    $update = "UPDATE Dorms SET Available = (Available + 1) WHERE Dorm = '$dormChoice'";
                    mysqli_query($conn, $update);
                    
                    header('location: reservations.php');
                }
                        
                
                $sql = "SELECT * FROM $reservationsTable WHERE Username = '$username'";
                $result = mysqli_query($conn, $sql);
                
                echo "Number of reservations for $username: " . mysqli_num_rows($result) . "<br>";
                
                if (mysqli_num_rows($result) == 1) {
                    $aRow = mysqli_fetch_assoc($result);
            
                    echo "<br><table>
                        <tr>
                            <td>Residence Area: </td> <td>" . $aRow['Dorm'] . "</td>
                        </tr>
                        <tr>
                            <td>Reservation Time: </td> <td>" . $aRow['reservationTime'] . "</td>
                        </tr>
                        <tr>
                            <td>Reservation Record ID: </td> <td>". $aRow['reservationRecordID'] . "</td>
                        </tr>
                    </table>
                    
                    <br>
                        
                    <form action='reservations.php' method='post'>
                        <input type='hidden' value=".$aRow['Username']." name='record'>
                        <input type='hidden' value='Reservations' name='table'>
                        <input type='hidden' value='Username' name='value'>
                        <input type='hidden' value='Reservations' name='page'>
                        <input type='hidden' value='submitted' name='submitted'>
                        <input type='submit' value='Delete Reservation'>
                    </form>";
                  
                    
                } 
                elseif (mysqli_num_rows($result) > 1) { // this should not happen
                    die("User has multiple reservations");
                } 
                else {
                    echo "<br><a href=dorm.php>Create a reservation!</a>";
                }
            } 
            else {
                header('location:index.php?message=You%20must%20sign%20in%20first.');
            }
        ?>
    </body>
</html>