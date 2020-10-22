<?php
session_start();

require '../php/controller/LoginController.php';

$lc = new LoginController();

if(isset($_POST['submitLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $lc->validate($username, $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Login</title>
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
                <div class="form-row">
                    <h2>Login</h2>
                </div>
                <div class="form-row">
                    <label for="username">Username</label>
                    <input name="username" id="username" type="text" required>
                </div>
                <div class="form-row">
                    <label for="password" >Password</label>
                    <input name="password" id="password" type="password" required>
                </div>
                <button name="submitLogin" id="submitLogin" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <footer class="footer">
    </footer>
</body>
</html>