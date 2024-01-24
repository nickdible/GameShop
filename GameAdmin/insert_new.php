<?php include "../../include/imageBase.php"; ?>
<?php include "../validation.php"; ?>
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
                <p>In the section to the right, you will see the result of your addition to the GameCatalog table.</p>
            </aside>
            <main>
<h1>Add Game</h1>
<p>Result: </p>
<?php
// If file upload form is submitted
$status = $statusMsg = '';
if(isset($_POST["submit"])){
$status = 'error';
if(!empty($_FILES["image"]["name"])) {
$title = test_input($_POST['title']);
$price = test_input($_POST['price']);
$genre = test_input($_POST['genre']);
$rating = test_input($_POST['rating']);
$system = test_input($_POST['system']);
// Get file info
$fileName = basename($_FILES["image"]["name"]);
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
// Allow certain file formats
$allowTypes = array('jpg','png','jpeg','gif');
if(in_array($fileType, $allowTypes)){
$image = $_FILES['image']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));
// sql to insert user input
$insert = $conn->query("INSERT into GameCatalog (ID, PosterData, Title, Price, Genre, Rating, Console, Sales) VALUES (NULL, '$imgContent', '$title', $price, '$genre', '$rating', '$system', 0)");
if($insert){
$status = 'success';
$statusMsg = "File uploaded successfully.";
}else{
$statusMsg = "File upload failed, please try again.";
}
}else{
$statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
}
}else{
$statusMsg = 'Please select an image file to upload.';
}
}
// Display status message
echo $statusMsg;
?>
</main>
</div>
<?php include "../footer.php" ?>
</body>
</html>