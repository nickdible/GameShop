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
<?php
$idToUpdate = $_POST['ID']; // collect value of input field
$sql = "SELECT * FROM GameCatalog WHERE ID = '$idToUpdate' ";
$result = mysqli_query($conn, $sql); //Apply $sql statement on $conn
if (mysqli_num_rows($result) > 0)
{ // output data of each row
while($row = mysqli_fetch_assoc($result))
{
$id= $row["ID"];
$title=$row["Title"];
$price=$row["Price"];
$genre=$row['Genre'];
$system=$row['Console'];
$rating=$row['Rating'];
}
} else {
echo "0 results";
}
mysqli_close($conn);
?>
<form method="post" action="update_Data.php">
Update Information below!<br>
ID________ : <input type="text" name="ID" <?php echo "value =".$id ?> readonly> *ID will be given automatically.<br>
Title: <input type="text" name="Title" <?php echo "value =".$title ?>><br>
Price_____ : <input type="text" name="Price" <?php echo "value =".$price ?>><br>
Genre: <input type="text" name="Genre" <?php echo "value =".$genre ?> required><br>
Rating: <input type="text" name="Rating" <?php echo "value =".$rating ?> required><br>
Console: <input type="text" name="System" <?php echo "value =".$system ?> required><br>
<br> <input type="submit">
</form>
            </main>
        </div>
        <?php include "../footer.php" ?>
    </body>
</html>
