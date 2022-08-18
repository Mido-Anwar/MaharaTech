<?php

session_start();

define('INDEX', 'http://localhost/MaharaTech/');
define('ASSET', 'http://localhost/MaharaTech/asset/sass/style.css');
define('CONFIG', 'http://localhost/MaharaTech/config/app.php');
define('USER', 'http://localhost/MaharaTech/users/');
define('USERPROCESS', 'http://localhost/MaharaTech/users/userprocess.php');
define('AUTH', 'http://localhost/MaharaTech/auth/');









$conn = mysqli_connect('localhost', 'root', '', 'blog');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$time = date('H:i:s jS F Y ');
