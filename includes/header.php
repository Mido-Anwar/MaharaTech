<header class="header">
    <nav>
        <div class="logo">
            <h3>
                <a href="<?php echo INDEX; ?>">Mahara Tech</a>
            </h3>
        </div>
        <div class="welcome">
            <?php if (isset($_SESSION['id'])) {
                echo "<p>welcome " . $_SESSION['name'] . "</p>";
            }
            ?>
        </div>
        <div class="authlinks">
            <a href="<?php echo AUTH . "/adduser.php" ?> ">Regstration</a>
            <a href="<?php echo AUTH . "/login.php" ?> ">Login</a>

            <a href="<?php echo AUTH . "/logout.php" ?> ">Logout</a>

            <div class="search">
                <form action="<?= USER; ?>" method="GET">
                    <input type="text" name="search" placeholder="Search">
                    <input type="submit" value="search">
                </form>
            </div>
        </div>


    </nav>
</header>