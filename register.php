<?php
session_start();
include "../include/imageBase.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register | Gameshop</title>
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
            <aside>
                <h1>Welcome</h1>
                <p>To the right, you will find the registration form. Please fill out all the details before clicking "Submit".</p>
            </aside>
            <main>
                <?php include "registerBusinessLogic.php" ?>
            </main>
        </div>
    </body>
</html>