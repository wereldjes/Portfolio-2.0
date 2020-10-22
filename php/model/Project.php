<?php


class Project {
    private $projectName;
    private $projectDescription;
    private $projectLink;

    public function __construct($projectName, $projectDescription, $projectLink)
    {
        $this->projectName = $projectName;
        $this->projectDescription = $projectDescription;
        $this->projectLink = $projectLink;
    }

    public function getProjectName()
    {
        return $this->projectName;
    }

    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;
    }

    public function getProjectDescription()
    {
        return $this->projectDescription;
    }

    public function setProjectDescription($projectDescription)
    {
        $this->projectDescription = $projectDescription;
    }

    public function getProjectLink()
    {
        return $this->projectLink;
    }

    public function setProjectLink($projectLink)
    {
        $this->projectLink = $projectLink;
    }



}