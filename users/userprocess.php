<?php

// connect to the database
require_once('../config/app.php');
//auth


$error_fields = array();
print_r($_POST['Register']);
if (isset($_POST['Register'])) {


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
        header("Location: ../auth/adduser.php?error_fields=" . implode(",", $error_fields));
        exit;
    }
    // prepare the insert statement
    else {

        $name = mysqli_escape_string($conn, $_POST['username']);
        $email = mysqli_escape_string($conn, $_POST['useremail']);
        $password = sha1($_POST['userpassword']);
        //upload image
        $avatar = $_FILES['useravatar'];
        $avatarName = $_FILES['useravatar']['name'];
        $fileext = explode('.', $avatarName);
        $fileactualext = strtolower(end($fileext));
        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
        if (in_array($fileactualext, $allowed)) {
            if ($avatar['size'] < 1000000) {
                $avatarNameNew = uniqid('', true) . '.' . $fileactualext;
                $avatarDestination = '../uploads/' . $avatarNameNew;
                move_uploaded_file($avatar['tmp_name'], $avatarDestination);
            } else {
                echo "Your file is too big";
            }
        } else {
            echo "You cannot upload files of this type";
        }



        $admin = (isset($_POST['admin'])) ? 1 : 0;
        $sql = "INSERT INTO `users` (`name`, `email`, `password`,`avatar`,`admin`) VALUES ('" . $name . "', '" . $email . "', '" . $password . "','" . $avatar . "','" . $admin . "')";
        $result = mysqli_query($conn, $sql);
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {


        echo "ERROR: Could not able to execute " . mysqli_error($conn);
        mysqli_close($conn);
    }
}


//edit the user


if (isset($_POST['edit'])) {

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
        header("Location: edit.php?error_fields=" . implode(",", $error_fields));
        exit;
    } else {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $name = mysqli_escape_string($conn, $_POST['username']);
        $email = mysqli_escape_string($conn, $_POST['useremail']);
        $password = sha1($_POST['userpassword']);
        $admin = (isset($_POST['admin'])) ? 1 : 0;
        $sql = "UPDATE `users` SET `name` = '" . $name . "', `email` = '" . $email . "', `password` = '" . $password . "', `admin` = '" . $admin . "' WHERE `users`.`id` = '" . $id . "'";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "ERROR: Could not able to execute " . mysqli_error($conn);
        mysqli_close($conn);
    }
}

//login the user

if (isset($_POST['Login'])) {
    $email = mysqli_escape_string($conn, $_POST['useremail']);
    $password = sha1($_POST['userpassword']);
    $sql = "SELECT * FROM `users` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['admin'] = $row['admin'];

        if ($_SESSION['admin'] == 1) {

            header("Location: " . USER);
        } else {
            header("Location: " . INDEX);
        }
    } else {
        if (mysqli_error($conn)) {
            echo "ERROR: Could not able to execute " . mysqli_error($conn);
        } else {

            echo "Email or password is incorrect";
        }
    }
    //close the connection
    mysqli_close($conn);
}
