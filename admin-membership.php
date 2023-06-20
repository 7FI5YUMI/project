
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin-membership.css">
    <title>Document</title>
</head>

<body>

    <table class="membership" border="1">
        <tr>
        <th>s.n</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>username</th>
        <th>phone</th>
        <th>email</th>
        <th>join date</th>
        </tr>
        <?php
        include("./database/databaseconn.php");

        $sql = "SELECT *  from membership";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $phone = $row['phone'];
                $email = $row['email'];
                $joinDate = $row['joinDate'];
                echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $firstname . '</td>
                        <td>' . $lastname . '</td>
                        <td>' . $username . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $email . '</td>
                        <td>' . $joinDate . '</td>
                        <td>
                         <button class="button"><a href="parking_delete.php?deleteid=' . $id . '">Delete</a></button>
                        </td>    
                                
                        </tr>';
            }
            echo "</table>";
        } else {
            echo "0 result";
        }
        ?>
    </table>

</body>

</html>