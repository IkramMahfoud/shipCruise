<?php

class Gallery
{
    public $itemDB;
    public function __construct()
    {
        $this->itemDB = new Database;
    }



    // _________________Gallery method____________________
    public function getAll()
    {
        $this->itemDB->query('SELECT c.* , MIN(rt.prix_chambre) AS cheapest_price FROM croisiere c INNER JOIN navire n ON n.id_navire = c.id_navire INNER
                             JOIN chambre ch ON ch.id_navire = n.id_navire INNER JOIN type_chambre rt ON rt.id_type_chambre = ch.id_type_chambre WHERE
                            c.date_depart >= current_date() GROUP BY
                            c.id_croisiere ;');

        $this->itemDB->execute();
        return $rows = $this->itemDB->fetchall();
    }

    public function getOne($id)
    {
        $this->itemDB->query("SELECT * FROM croisiere WHERE id_croisiere = :id");
        $this->itemDB->bind(":id", $id);
        $this->itemDB->execute();
        return $this->itemDB->fetch();
    }
}
