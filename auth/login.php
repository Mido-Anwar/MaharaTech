<?php
require_once('../config/app.php');
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
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo  ASSET;  ?> ">
</head>

<body>
    <?php include_once('../includes/header.php') ?>
<!--login form -->
<section class="container">
        <div class="form-group">
            <form action="<?=  USERPROCESS; ?>" method="POST" class="form" enctype="multipart/form-data">
             
                <label for="useremail">Email</label>
                <input type="email" name="useremail" id="useremail" placeholder="">
                <?php if (in_array("useremail", $error_arr)) echo "Please enter your email  "; ?>
                <label for="userpassword">Password</label>
                <input type="password" name="userpassword" id="password" placeholder="">
                <?php if (in_array("userpassword", $error_arr)) echo "Please enter your password  "; ?>
            
            
                <input type="submit" value="Login" name="Login" >
            </form>
            
        </div>

    </section>
</body>

</html>