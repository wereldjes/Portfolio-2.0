<?php
require 'MysqlConnector.php';
require $_SERVER['DOCUMENT_ROOT'] .'/Beroepsproduct 1/php/model/Project.php';

class ContentDB {

    public function addContent($projectTitle, $projectDescription, $projectLink) {
        $connection = new MysqlConnector();
        $db = $connection->getConnection();
        $query = ("INSERT INTO project (project_name, project_description, project_link) VALUES (?, ?, ?)");

        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $projectTitle);
        $stmt->bindParam(2, $projectDescription);
        $stmt->bindParam(3, $projectLink);

        try {
            return $stmt->execute();
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function getAllContent() {
        $connection = new MysqlConnector();
        $db = $connection->getConnection();
        $contentList = array();
        $query = ("SELECT project_name, project_description, project_link FROM project");

        $stmt = $db->prepare($query);
        if($stmt->execute()){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($result as $value) {
                $project = new Project($value->project_name, $value->project_description, $value->project_link);
                array_push($contentList, $project);
            }

            return $contentList;
        } else {
            echo "Something went wrong";
        }
    }

}