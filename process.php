<?php
var_dump($_POST);
echo "<br>";
echo $_POST['username'];
$hash= password_hash($_POST['password'],PASSWORD_BCRYPT);

echo "<br>";
echo $hash;