<?php
include_once('../config/app.php');

//check for data errors
$error_arr = array();
if (isset($_GET['error_fields'])) {
    $error_arr = explode(",", $_GET['error_fields']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="  <?php echo  ASSET; ?>">
    <title>Document</title>
</head>

<body>
 <?php require_once('../includes/header.php'); ?>
<?php

?>
    <section class="container">
        <div class="form-group">
            <form action="<?=  USERPROCESS; ?>" method="POST" class="form" enctype="multipart/form-data">
                <label for="username">Name</label>
                <input type="text" name="username" id="username" placeholder="Username">
                <?php if (in_array("username", $error_arr)) echo "Please enter your name "; ?>
                <label for="useremail">Email</label>
                <input type="email" name="useremail" id="useremail" placeholder="Useremail">
                <?php if (in_array("useremail", $error_arr)) echo "Please enter your email  "; ?>
                <label for="userpassword">Password</label>
                <input type="password" name="userpassword" id="password" placeholder="Password">
                <?php if (in_array("userpassword", $error_arr)) echo "Please enter your password  "; ?>
                <label for="useravatar">Choose your avatar</label>
                <input type="file" name="useravatar" id="useravatar" placeholder="avatar">
                <label for="admin">Admin</label>
                <input type="checkbox" name="admin" id="" <?= (isset($_POST['admin'])) ? 'cheked' : ''?>>
                <input type="submit" value="Register" name="Register">

            </form>
        </div>

    </section>
</body>

</html>