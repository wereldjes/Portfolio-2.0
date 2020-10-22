<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Beroepsproduct 1/php/datalayer/ContentDB.php';

class ContentController {
    private $cdb;

    public function __construct() {
        $this->cdb = new ContentDB();
    }

    public function addContent($projectTitle, $projectDescription, $projectLink) {
        if($this->cdb->addContent($projectTitle, $projectDescription, $projectLink)) {
            echo "Project Added";
        } else {
            echo "Something went wrong, please try again";
        }
    }

    public function getAllContent() {
        return $this->cdb->getAllContent();
    }

}