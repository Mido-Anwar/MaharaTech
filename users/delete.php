<?php

require_once('../config/app.php');

//delete for users

$id= filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$sql = "DELETE FROM `users` WHERE `users`.`id` = " . $id;

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}