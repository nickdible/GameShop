<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Catalog | Gameshop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="banner.css">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="banner">
            <?php include "header.php" ?>
            <?php include "nav.php" ?>
        </div>
        <div class="row">
            <aside>
                <p>You are now logged out. Have a nice day!</p>
            </aside>
            <main>
                <?php
                echo "<p>Please click <a href='index.php'>here</a> if you are not redirected.";
                echo "<meta http-equiv='refresh' content='2;index.php' />";
                ?>
            </main>
        </div>
        <?php include "footer.php" ?>
    </body>
</html>