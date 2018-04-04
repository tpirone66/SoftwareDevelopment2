<!DOCTYPE HTML>
<html>
  <head>
    <title>Manage Dorms</title>
  </head>
  
  <body>
      <center><h1>Manage Dorms</h1></center>
  <?php
    session_start(); 
    require 'sql.php'; 
    if ($_SESSION['login_user']) {
      if ($_SESSION['Admin']) {
        if(isset($_POST["submitted"])) {
          $dormChoice = $_POST['Dorm'];
          $delete = "DELETE FROM Dorms WHERE Dorm = '$dormChoice'";
          mysqli_query($conn, $delete);
          header('location: admin_dorms.php');
        }
        if(isset($_POST["Submit"])) {
          $insert = "INSERT INTO Dorms (Dorm, Year, Capacity, Available, Kitchen, Laundry, Needs)
                        VALUES('$_POST[Dorm]', '$_POST[Year]', '$_POST[Capacity]', '$_POST[Available]',
                        '$_POST[Kitchen]', '$_POST[Laundry]', '$_POST[Needs]')";
          mysqli_query($conn, $insert);
          header('location: admin_dorms.php');
        }
  ?>
        <table>
          <tr>
            <td>Name</td><td></td>
            <td>Class</td><td></td>
            <td>Capacity</td><td></td>
            <td>Available</td><td></td>
            <td>Kitchen</td><td></td>
            <td>Laundry</td><td></td>
            <td>Special Needs</td><td></td>
          </tr>
  <?php
        $sql = "SELECT * FROM Dorms";
        $result = mysqli_query($conn, $sql);
        while ($aRow = mysqli_fetch_assoc($result)) {
          echo "<tr>";
            echo "<td>".$aRow['Dorm']."</td>"; echo "<td></td>";
            echo "<td>".$aRow['Year']."</td>"; echo "<td></td>";
            echo "<td>".$aRow['Capacity']."</td>"; echo "<td></td>";
            echo "<td>".$aRow['Available']."</td>"; echo "<td></td>";
            echo "<td>".$aRow['Kitchen']."</td>"; echo "<td></td>";
            echo "<td>".$aRow['Laundry']."</td>"; echo "<td></td>";
            echo "<td>".$aRow['Needs']."</td>"; echo "<td></td>";
            
            echo "<td>
              <form action='admin_dorms.php' method='POST'>
                <input type='hidden' value='$aRow[Dorm]' name='Dorm'>
                <input type='hidden' value='Dorms' name='table'>
                <input type='hidden' value='submitted' name='submitted'>
                <input type='submit' value='Delete Residence Area'>
              </form>
            </td>
        </tr>";
        }
        echo "</table>";
        ?>
        <br><h3>Add New Residence Area:</h3><br>
        <form action="admin_dorms.php" method="POST">
        <table>
          <tr>
            <td>Name</td><td>Class</td><td>Capacity</td><td>Available</td><td>Kitchen</td><td>Laundry</td><td>Special Needs</td>
          </tr>
          <tr>
            <td><input type="text" name="Dorm" required></td>
            <td><input type="number" value="1" name="Year" min="1" max="3" required></td>
            <td><input type="number" value="5" name="Capacity" min="1" max="5" required></td>
            <td><input type="number" value="5" name="Available" min="1" max="5" required></td>
            <td><input type="number" value="1" name="Kitchen" min="0" max="1"></td>
            <td><input type="number" value="1" name="Laundry" min="0" max="1"></td>
            <td><input type="number" value="1" name="Needs" min="0" max="1"></td>
          </tr>
          <tr>
            <td><input type="submit" value="Submit" name="Submit"></form></td>
          </tr>
        </table>
        
        <?php
        echo "<a href=admin_main.php>Return to Admin Menu</a><br>";
      }
      else {
          header('location:profile.php?message=You%20do%20not%20have%20access%20to%20this%20page.');
      }
    } 
    else { 
        header('location: index.php?message=You%20are%20not%20logged%20in.');
    }
  ?>
  </body>
</html>