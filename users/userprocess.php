<?php

// connect to the database
require_once('../config/app.php');
print_r($_POST);

$error_fields = array();

if (!(isset($_POST['username']) && !empty($_POST['username']))) {
    $error_fields[] = 'username';
}

if (!(isset($_POST['useremail']) && filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL))) {
    $error_fields[] = 'useremail';
}
if (!(isset($_POST['userpassword']) && strlen($_POST['userpassword']) > 5)) {
    $error_fields[] = 'userpassword';
}

if ($error_fields) {
     header("Location: adduser.php?error_fields=".implode(",",$error_fields));
    exit;
}

// prepare the insert statement

$name = mysqli_escape_string($conn, $_POST['username']);

$email = mysqli_escape_string($conn, $_POST['useremail']);

$password = mysqli_escape_string($conn, $_POST['userpassword']);

// 
$sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('".$name."', '".$email."', '".$password."')";


if(mysqli_query($conn, $sql)){
    header("Location: index.php");
} else{
    echo "ERROR: Could not able to execute " . mysqli_error($conn);
}