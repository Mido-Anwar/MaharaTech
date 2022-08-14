<?php include_once('../config/app.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>user</title>
    <link rel="stylesheet" href="<?php echo "../" . ASSET; ?>">

</head>

<body>
    <?php require_once('../includes/header.php'); ?>
    <div class="container">
        <?php
        $sql = "SELECT * FROM  users";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)

            echo "<h1>Users</h1>";

        else {
            echo "0 results";
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th> ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
<tbody>
     
                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                
                ?>

</tbody>
           

        </table>
    </div>


</body>

</html>