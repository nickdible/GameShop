<?php
session_start();
include "../../include/imageBase.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Game | Gameshop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../banner.css">
        <link rel="stylesheet" href="../style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="banner">
            <?php include "../header.php" ?>
            <?php include "nav.php" ?>
        </div>
        <div class="row">
            <aside>
                <p>Here, you can add a new game to the database. You can add a title, price, genre, rating, console, and cover art.</p>
            </aside>
            <main>
                <h1>Add Game</h1>
                <form method="post" action="insert_new.php" enctype="multipart/form-data">
                    Put Information below!<br>
                    ID will be given automatically.<br>
                    Title: <input type="text" name="title" size ="65" required><br>
                    Price_: $<input type="text" name="price" required><br>
                    Genre: <input type="text" name="genre" required><br>
                    Rating: <input type="text" name="rating" required><br>
                    Console: <input type="text" name="system" required><br>
                    <label>Select Image File:</label>
                    <input type="file" name="image" required>
                    <br>*Choose file first before click Submit.
                    <br> <input type="submit" name="submit" value="Submit">
                </form>
            </main>
        </div>
        <?php include "../footer.php" ?>
    </body>
</html>
