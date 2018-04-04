<html>
    <body><h1>Manage Reservations</h1>        
        <?php
            session_start(); 
            require 'sql.php'; 
            
            if ($_SESSION['login_user']) {
              if ($_SESSION['Admin']) {?>
              <table>
                <tr>
                  <td>Username</td><td></td>
                  <td>Residence Area</td><td></td>
                  <td>Reservation Record ID</td><td></td>
                  <td>Timestamp</td><td></td>
                </tr>
            <?php
                $sql = "SELECT * FROM Reservations";
                $result = mysqli_query($conn,$sql);
                while ($aRow = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$aRow['Username']."</td>"; echo "<td></td>";
                    echo "<td>".$aRow['Dorm']."</td>";echo "<td></td>";
                    echo "<td>".$aRow['reservationRecordID']."</td>"; echo "<td></td>";
                    echo "<td>".$aRow['reservationTime']."</td>"; echo "<td></td>";
            
                    echo "<td></td><td>
                        <form action='admin_delete_reservation.php' method='POST'>
                        <input type='hidden' value=".$aRow['Username']." name='record'>
                        <input type='hidden' value='Reservations' name='table'>
                        <input type='hidden' value='Username' name='value'>
                        <input type='hidden' value='Name' name='column'>
                        <input type='hidden' value=".$aRow['Dorm']." name='ra'>
                        <input type='submit' value='Delete Reservation' name='submit'>
                    </td></form>";
                    echo "</tr>";
                }
                echo "</table>\n";
                echo "<a href=admin_main.php>Return to Admin Menu</a><br>";
              } 
              else {
                  header('location:profile.php?message=You%20do%20not%20have%20access%20to%20this%20admin%20page.');
              }
            } 
            else { 
                header('location: index.php?message=You%20are%20not%20logged%20in.');
            }
        ?>
    </body>
</html>