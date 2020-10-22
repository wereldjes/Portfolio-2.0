<?php
require 'MysqlConnector.php';
require '../php/model/User.php';

class LoginDB {

    public function getUser($username) {
        $connection = new MysqlConnector();
        $getUser = null;
        $db = $connection->getConnection();

        $stmt = $db->prepare("SELECT firstname, lastname, username, password FROM user WHERE username = ?");
        $stmt->bindParam(1, $username);

        try {
            $stmt->execute();
            $resultSet = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach($resultSet as $user) {
                $userSet = new User($user->firstname, $user->lastname, $user->username, $user->password);
                $getUser = $userSet;
            }

            return $getUser;
        } catch(PDOException $exception) {
            return null;
        }
    }

}