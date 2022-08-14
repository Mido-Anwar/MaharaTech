<?php

const ASSET = 'asset/sass/style.css';
const CONFIG = 'configapp.php';
const AUTH = "auth/";










$conn = mysqli_connect('localhost', 'root', '', 'blog');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//

$time= date('H:i:s jS F Y ');

