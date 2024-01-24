<?php
session_start();
include "../include/imageBase.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Management System</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="main">
            <?php
            if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['SessionUsername'])) {
                //Member area is below (shown after successful log in)
                ?>
                <h1>Member Area</h1>
                <p>Welcome to the members-only area. You are <code><?=$_SESSION['SessionUsername']?></code> and your email address is 
                <code><?=$_SESSION['Email']?></code>.</p>
                <?php //insert below 6 lines on "nav.php" Be careful where to put it.
                
                if($_SESSION['Role']=="Admin")
                {
                    echo "<p>Welcome Administrator! In the navbar above, you'll find the Admin menu, allowing you to modify the Game table. (CRUD)</p>";
                }
                
                ?>
                <p><a href="logoutBusinessLogic.php">Log Out</a></p>
                <?php
            } elseif (!empty($_POST['username']) && !empty($_POST['password'])) {
                //Processing login (after user enters credentials)
                $username = $conn -> real_escape_string($_POST['username']);
                $password = md5($conn -> real_escape_string($_POST['password']));
                $query = "SELECT * FROM User WHERE Username = '".$username."' AND Password = '".$password."'";
                $result = $conn -> query($query);
                if (!$result) {
                    echo "<p>Database query error.</p>";
                }
                if ($result -> num_rows == 1) {
                    $row = $result -> fetch_assoc();
                    $email = $row['Email'];
                    $role = $row['Role'];

                    $_SESSION['SessionUsername'] = $username;
                    $_SESSION['Email'] = $email;
                    $_SESSION['Role'] = $role;
                    $_SESSION['LoggedIn'] = 1;

                    echo "<h1>Success</h1>";
                    echo "<p>You will now be taken to the member area.</p>";
                    echo "<p>Click <a href='index.php'>here if you are not redirected.";
                    echo "<meta http-equiv='refresh' content='2;index.php' />";
                } else {
                    echo "<h1>Error</h1>";
                    echo "<p>Sorry, but we could not find your account (incorrect username and/or password). Click <a href='loginBusinessLogic.php'>here</a> to try again.</p>";
                }
            } else {
                //Login form (before user enters info)
                ?>
                <h1>Member Log In</h1>
                <p>Thanks for visting! To access the shopping catalog/cart, please log in below or <a href="register.php">register</a> if you don't already have a account.</p>
                <form method="post" action="loginBusinessLogic.php" name="loginform" id="loginform">
                    <fieldset>
                        <label for="username">Username:</label><input type="text" name="username" id="username"><br>
                        <label for="password">Password:</label><input type="password" name="password" id="password"><br>
                        <input type="submit" name="login" value="Log In" id="login">
                    </fieldset>
                </form>
                <?php
            }
            ?>
        </div>
    </body>
</html>