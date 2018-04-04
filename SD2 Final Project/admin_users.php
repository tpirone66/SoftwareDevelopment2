<?php
  session_start(); 
  require 'sql_helper.php'; 
  if ($_SESSION['login_user']) {
    if ($_SESSION['Admin']) {?>
    <table>
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>CWID</td>
        <td>Class</td>
        <td>Gender</td>
        <td>Kitchen</td>
        <td>Laundry</td>
        <td>Special Needs</td>
        <td>Email</td>
        <td>Admin</td>
        <td></td>
      </tr>
  <?php
      $sql = "SELECT * FROM Users";
      $result = mysqli_query($conn,$sql);
      while ($aRow = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$aRow['ID']."</td>";
        echo "<td>".$aRow['Name']."</td>";
        echo "<td>".$aRow['CWID']."</td>";
        echo "<td>".$aRow['Year']."</td>";
        echo "<td>".$aRow['Gender']."</td>";
        echo "<td>".$aRow['Kitchen']."</td>";
        echo "<td>".$aRow['Laundry']."</td>";
        echo "<td>".$aRow['Needs']."</td>";
        echo "<td>".$aRow['Email']."</td>";
        echo "<td>".$aRow['Admin']."</td>";
        echo "<td>
              <form action='admin_delete_user.php' method='POST'>
              <input type='hidden' value=".$aRow['Name']." name='record'>
              <input type='hidden' value='Users' name='table'>
              <input type='hidden' value='Name' name='column'>
              <input type='submit' value='Delete User'>
          </td></form>";
          echo "</tr>";
      }
      echo "</table>\n";
      echo "<form action='admin_create_user.php' method='POST'>
           <input type='hidden' value='Users' name='table'>
  	       <input name='submit' type='submit' value='Create User'></form>"; 
  	  echo "<a href=admin_main.php>Return to Admin Menu</a><br>";
    } 
    else {
        header('location:profile.php?message=You%20do%20not%20have%20access%20to%20this%20admin%20page.');
    }
  } 
  else { 
      header('location: login.php?message=You%20are%20not%20logged%20in.');
  }
?>