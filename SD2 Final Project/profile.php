<html>
    <body>
		<h1><center>Manage Profile</center></h1>
            <?php
                session_start();
                echo $_POST['message']."<br>\n";
                if ($_SESSION['login_user']) {
                    echo "<center><h3>Welcome back, ".$_SESSION['login_user']."!</h3></center><br>";
                    echo "<table>
                        <tr>
                            <td>Name: </td> <td> " . $_SESSION['Name'] . " </td>
                        </tr>
                        <tr>
                            <td>Class: </td> <td> " . $_SESSION['Year'] . " </td>
                        </tr>
                        <tr>
                            <td>CWID: </td> <td> " . $_SESSION['CWID'] . " </td>
                        </tr>
                        <tr>
                            <td>Email: </td> <td> " . $_SESSION['Email'] . " </td>
                        </tr>
                        <tr>
                            <td>Gender: </td> <td> " . $_SESSION['Gender'] . " </td>
                        </tr>
                    </table>";
                } 
                else {
                    echo "No user has signed in! Please login!";
                    header('location: index.php?message=You%20must%20sign%20in%20first.');
                }
            echo "&nbsp<a href=reservations.php>Manage Reservations</a>\n";
            echo "&nbsp<a href=logout.php>Logout</a>\n";
            ?>
    </bpdy>            
</html>
