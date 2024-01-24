<!DOCTYPE html>
<html>
    <head>
        <title>Update Game | Gameshop</title>
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
                <p>This page allows you to update games in the GameCatalog table. Be careful, changes cannot be undone</p>
            </aside>
            <main>
                <h1>Update Game</h1>
            <!--This page is for the admin to type in the id of a game to be updated and passed to the selectID_to_Update script to generate the update form with proper data-->
            <form method="post" action="selectID_to_Update.php">
            Type id to Update!<br>
            ID: <input type="text" name="ID">
            <br> <input type="submit">
            </form><br>
            </main>
        </div>
        
        <?php include "../footer.php" ?>
    </body>
</html>
