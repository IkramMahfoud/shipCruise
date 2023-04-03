<?php

class Navire
{
    public $itemDB;
    public function __construct()
    {
        $this->itemDB = new Database;
    }


    public function insertNavireModel($name,$place,$number)
    {
        $this->itemDB->query("INSERT INTO `navire` (`nom_navire`,`nombr_chambre` ,`nombr_place`) VALUES (:name,:number,:place)");

        $this->itemDB->bind(":place", $place);
        $this->itemDB->bind(":name", $name);
        $this->itemDB->bind(":number", $number);

        $this->itemDB->execute();
    }



    public function selectNavireModel()
    {
        $this->itemDB->query("SELECT * FROM  `navire` ");
        $this->itemDB->execute();
        return $data = $this->itemDB->fetchall();
    }
  }