<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahara Tech</title>
    <link rel="stylesheet" href="asset\sass\style.css">
</head>

<body>

    <!-- Header -->
    <nav class="header-1">
        <?php
        echo "<h2>Welcome to Mahara Tech</h2>";

        ?>
        <h1><?php echo date('H:i:s jS F Y '); ?></h1>
    </nav>
    <section class="container">
        <div class="form-group">
            <form action="process.php" method="post" class="form">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
             
                <input type="submit" value="Login">

            </form>
        </div>
<h1>mido</h1>
    </section>

</body>

</html>