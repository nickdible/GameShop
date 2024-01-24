<?php
session_start();
include "../include/imageBase.php";
?>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        if((!empty($_SESSION['SessionUsername']))&&($_SESSION['LoggedIn'] == 1)) {
            echo '<li class="dropdown">';
            echo '<a href="javascript:void(0)" class="dropbtn">Store</a>';
            echo '<div class="dropdown-content">';
                echo '<a href="shopPage.php">All Games</a>';
            echo '</div>';
        echo '</li>';
        echo '<li><a href="shopPage.php?cart">Cart</a></li>';
        }
        ?>
        
        <?php
        if($_SESSION['Role'] == "Admin") {
            echo "<li class='dropdown-right'>";
            echo "<a href='javascript:void(0)' class='dropbtn'>Admin</a>";
            echo "<div class='dropdown-content' style='right:0'>";
                echo "<a href='GameAdmin/newitem.php'>Create</a>";
                echo "<a href='GameAdmin/retrieval.php'>Read</a>";
                echo "<a href='GameAdmin/updateStart.php'>Update</a>";
                echo "<a href='GameAdmin/delStart.php'>Delete</a>";
            echo "</div>";
        echo "</li>";
        }
        ?>
    </ul>
</nav>