<?php include "../../include/imageBase.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Delete Game | Gameshop</title>
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
            <p>This page allows you to remove games from the GameCatalog table. Be careful, changes cannot be undone</p>
        </aside>
        <main>
<h1>Delete Game</h1>
<p>Result: </p>
<?php
$idToDelete = $_POST['ID']; // collect value of input field
$sql = "DELETE FROM GameCatalog WHERE ID = $idToDelete"; // sql to delete a record
if (mysqli_query($conn, $sql))
{
echo "Record deleted successfully";
} else {
echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
</main>
        </div>
        
        <?php include "../footer.php" ?>
    </body>
</html>
