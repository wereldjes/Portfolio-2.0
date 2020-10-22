<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}
require '../php/controller/ContentController.php';
$cc = new ContentController();

if(isset($_POST['submitContent'])){
    $projectTitle = $_POST['projectTitle'];
    $projectDescription = $_POST['projectDescription'];
    $projectLink = $_POST['projectLink'];

    $cc->addContent($projectTitle, $projectDescription, $projectLink);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Content managing</title>
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
        <div class="form">
            <form method="post" action="#">
                <h2>Add new project</h2>
                <div class="form-row">
                    <label for="project-title">Project title</label>
                    <input name="projectTitle" id="project-title" type="text" required>
                </div>
                <div class="form-row">
                    <label for="project-description">Project Description</label>
                    <textarea name="projectDescription" id="project-description" rows="5" cols="50" maxlength="255"></textarea>
                </div>
                <div class="form-row">
                    <label for="project-link">Project Link</label>
                    <input name="projectLink" id="project-link" type="url">
                </div>
                <button name="submitContent" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <footer class="footer">
    </footer>
</body>
</html>