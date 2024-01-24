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
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $username = $conn -> real_escape_string($_POST['username']);
                $password = md5($conn -> real_escape_string($_POST['password']));
                $email = $conn -> real_escape_string($_POST['email']);
                $role = $_POST['userType'];

                
                $query = "SELECT * FROM User WHERE Username = '".$username."'";
                $result = $conn -> query($query);
                //Query error (connection issue)
                if (!$result) {
                    echo "<p>Database query error</p>";
                }
                //Username conflict (user tries to use a taken username)
                if ($result-> num_rows == 1) {
                    echo "<h1>Error</h1>";
                    echo "<p>Sorry, that username is taken. Please enter a different username.</p>";
                } else {
                    //Successful query (no username conflict)
                    $query = "INSERT INTO User (Username, Password, Email, Role) VALUES ('".$username."', '".$password."', '".$email."', '".$role."')";
                    $result = $conn -> query($query);
                    //Account creation successful (no username conflict and values inserted sucessfully)
                    if ($result) {
                        echo "<h1>Success</h1>";
                        echo "<p>Account created successfully! Please click <a href='index.php'>here</a> to log in.";
                    } else {
                        //Issue with inserting new user data in table
                        echo "<h1>Error</h1>";
                        echo "<p>Sorry, your registration was not successful. Reload the page and try again.";
                    }
                }
            } else {
                ?>
                <h1>Registration Form</h1>
                <p>Please enter your details below to sign up.</p>
                <form method="post" action="registerBusinessLogic.php" name="registerform" id="registerform">
                    <fieldset>
                        <label for="username">Username:</label><input type="text" name="username" id="username" required><br>
                        <label for="password">Password:</label><input type="password" name="password" id="password" required><br>
                        <label for="email">Email:</label><input type="text" name="email" id="email" required><br>
                        <input type="radio" name="userType" value="User" checked><label for="userType">User</label>
                        <input type="radio" name="userType" value="Admin"><label for="userType">Admin</label><br>
                        <input type="submit" name="register" id="register" value="Register">
                    </fieldset>
                </form>
                <?php
            }
            ?>
        </div>
    </body>
</html>