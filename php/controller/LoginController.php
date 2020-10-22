<?php
require '../php/datalayer/LoginDB.php';

class LoginController {
    private $ldb;

    public function __construct() {
        $this->ldb = new LoginDB();
    }

    public function validate($username, $password) {
        $user = $this->ldb->getUser($username);

        if(!is_null($user) && !is_null($user->getPassword())){
            if($username == $user->getUsername() && password_verify($password, $user->getPassword())) {
                session_start();
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['username'] = $username;
                header("Location: content.php");
            } else {
                echo "Credentials are incorrect";
            }
        } else {
            echo "Something went wrong";
        }
    }

}