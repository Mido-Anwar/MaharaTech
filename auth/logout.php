<?php
include_once '../config/app.php';
$_SESSION = array();
session_destroy();
header("Location: " . INDEX);