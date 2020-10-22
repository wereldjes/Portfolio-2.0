<?php
session_start();

require 'php/controller/ContentController.php';
$cc = new ContentController();

$projectList = $cc->getAllContent();

$projectListChunk = array_chunk($cc->getAllContent(), 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/general.css">
    <title>Portfolio Dominique</title>
</head>
<body class="wrapper">
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="#projects">Projects</a>
        <a href="html/contact.php">Contact</a>
        <?php if(!isset($_SESSION['loggedin'])) {
                echo '<a href="html/login.php" class="nav-float-right">Login</a>';
              } else {
                echo '<a href="html/logout.php" class="nav-float-right">Log out</a> . 
                      <a href="html/content.php" class="nav-float-right">Add content</a>';
              }
        ?>
    </div>
    <div class="content">
        <div class="jumbotron flex-container">
            <div class="container">
                <div class="personal-info">
                    <img class="profile-image">
                    <h2>Dominique van Voorst</h2>
                    <h4>Student software development</h4>
                </div>
            </div>
        </div>
        <div class="flex-container" id="personal-message">
            <p>“Software development isn't a job, it's a form of art„</p>
        </div>
        <div class="flex-container">
            <div class="row">
                <div>
                    <h2 id="projects">Projects</h2>
                </div>
            </div>
        </div>
        <div class="flex-container flex-grid last-content">
            <?php
                foreach($projectListChunk as $row) {
                    echo '<div class="row">';
                    foreach($row as $card){
                        echo'<div class="project-card">
                            <h4>'.$card->getProjectName().'</h4>
                            <p>'.$card->getProjectDescription().'</p>
                            <a href="'.$card->getProjectLink().'">Github</a>
                            </div>';
                    }
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <footer class="footer">
    </footer>
</body>
</html>