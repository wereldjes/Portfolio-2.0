<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Contact</title>
</head>
<body class="wrapper">
    <div class="navbar">
        <a href="../index.php">Home</a>
        <a href="../index.php#projects">Projects</a>
        <a href="contact.php">Contact</a>
        <?php if(!isset($_SESSION['loggedin'])) {
            echo '<a href="login.php" class="nav-float-right">Login</a>';
        } else {
            echo '<a href="logout.php" class="nav-float-right">Log out</a> . 
                      <a href="content.php" class="nav-float-right">Add content</a>';
        }
        ?>
    </div>
    <div class="content">
        <div class="contact-info">
            <div class="flex-grid">
                <h2>Contact information</h2>
                <p>Dominique van Voorst</p>
                <p>0622447562</p>
                <p>Dominique_voorst@hotmail.com</p>
                <a href="https://github.com/wereldjes">Github</a>
            </div>
        </div>
    </div>
    <footer class="footer">
    </footer>
</body>
</html>