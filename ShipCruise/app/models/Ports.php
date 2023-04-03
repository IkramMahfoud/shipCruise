<?php

class Ports
{
    public $itemDB;
    public function __construct()
    {
        $this->itemDB = new Database;
    }

    public function insertPortModel($place, $nom)
    {
        $this->itemDB->query("INSERT INTO `port` (`nom_port`,`pays`) VALUES (:place,:nom)");
        $this->itemDB->bind(":place", $place);
        $this->itemDB->bind(":nom", $nom);
        $this->itemDB->execute();
    }

    public function getall(){
        $this->itemDB->query("SELECT * FROM  `port` ");
        $this->itemDB->execute();
        return $data = $this->itemDB->fetchall();
    }
  }