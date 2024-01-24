<?php include "../../include/imageBase.php"; ?>
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
<p>Result: </p>
<?php // collect value of input field
$id = $_POST['ID'];
$title = $_POST['Title'];
$price = $_POST['Price'];
$genre = $_POST['Genre'];
$system = $_POST['System'];
$rating = $_POST['Rating'];
$sql = "UPDATE GameCatalog SET Title='$title', Price='$price', Genre='$genre', Console='$system', Rating='$rating' WHERE ID='$id' ";
if (mysqli_query($conn, $sql))
{
echo "Record updated successfully";
} else {
echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
    </main>
        </div>
        <?php include "../footer.php" ?>
    </body>
</html>