<?php include "../../include/imageBase.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Read Game | Gameshop</title>
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
                <p>Here, you can add a new game to the date. You can add a title, price, genre, rating, console, and cover art.</p>
            </aside>
            <main>
                <h1>Retrieve Records</h1>
<?php
// Get image and other data from database
$result = $conn->query("SELECT * FROM GameCatalog ORDER BY ID DESC");
?>
<?php if($result->num_rows > 0){ ?>
<div class="gallery">
<?php
while($row = $result->fetch_assoc()){
echo "ID: ".$row['ID']." Title: ".$row['Title']." Price : $".$row['Price']. " Console: ".$row['Console']." Genre: ".$row['Genre']." Rating: ".$row['Rating']." Sales: ".$row['Sales'];
?>
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['PosterData']); ?>" width="150" height="225"/>
<br>
<?php
}
?>
</div>
<?php
}else{
?>
<p class="status error">Image(s) not found...</p>
<?php
}
?>
</main>
        </div>
        <?php include "../footer.php" ?>
    </body>
</html>
