<?php
include_once('../config/app.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>user</title>
    <link rel="stylesheet" href="<?php echo ASSET; ?>">

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

        <?php
        if (isset($_GET['search'])) {

            $search = mysqli_escape_string($conn, $_GET['search']);
            $sqls = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
            $result = mysqli_query($conn, $sqls);
        }


        ?>
        <table>
            <thead>
                <tr>
                    <th> ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>Admin</th>
                    <th>Avatar</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?= ($row['admin']) ? 'yes' : 'no' ?></td>
                        <td><img src="<?= $row['avatar'] ?>" alt=""></td>
                        <td><a href="<?php echo "edit.php?id=" . $row['id']; ?>">Edit</a></td>
                        <td><a href="<?php echo "delete.php?id=" . $row['id']; ?>">Delete</a></td>
                    </tr>

                <?php
                }
                ?>



            </tbody>
            <tfoot>
                <tr>

                    <td colspan="3">
                        <?= mysqli_num_rows($result) ?> Users
                    </td>
                    <td colspan="4">
                        <a href="../auth/adduser.php" class="btn btn-primary">Add User</a>
                    </td>

                </tr>
            </tfoot>

        </table>
    </div>


</body>

</html>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>