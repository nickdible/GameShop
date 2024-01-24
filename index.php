<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home | Gameshop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="banner.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="banner">
            <?php include "header.php" ?>
            <?php include "nav.php" ?>
        </div>
        <div class="row">
            <?php include "aside.php" ?>
            <main>
                <h1>Best Sellers</h1>
                <?php include "bestSellers.php" ?>
            </main>
            
        </div>
        <?php include "footer.php" ?>
    </body>
</html>