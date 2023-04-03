<?php

class RoomType
{
    public $itemDB;
    public function __construct()
    {
        $this->itemDB = new Database;
    }

    // ________________ Type_Chambre method____________________
    public function getAll()
    {
        $this->itemDB->query("SELECT * FROM type_chambre");
        $this->itemDB->execute();
        return $rows = $this->itemDB->fetchall();
    }

    public function getOne($id)
    {
        $this->itemDB->query("SELECT * FROM type_chambre WHERE id_type_chambre = :id");
        $this->itemDB->bind(":id",$id);
        $this->itemDB->execute();
        return $this->itemDB->fetch();
    }
}