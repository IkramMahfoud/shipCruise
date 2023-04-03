<?php

class Cruises
{
    public $itemDB;
    public function __construct()
    {
        $this->itemDB = new Database;
    }




    // _________________Cruises method____________________
    public function getAll()
    {
        $this->itemDB->query("SELECT * FROM croisiere ");
        $this->itemDB->execute();
        return $rows = $this->itemDB->fetchAll();
    }


    public function getForDash()
    {
        $this->itemDB->query('SELECT c.*, start_port.nom_port AS start_port_name, start_port.pays AS start_port_country,
         end_port.nom_port AS end_port_name, end_port.pays
         AS end_port_country FROM croisiere c
         JOIN port start_port ON c.id_port_depart = start_port.id_port
         JOIN port end_port ON c.id_port_arrive = end_port.id_port;');

        $this->itemDB->execute();
        return $rows = $this->itemDB->fetchAll();
    }

    //INSERT QUERY:
    public function insertPort($name, $Price, $Image)
    {
        $this->itemDB->query("INSERT INTO `item`(`_name`, `_price`, `_img`, `_category`) VALUES (:name,:price,:image,:catg)");
        $this->itemDB->bind(":name", $name);
        $this->itemDB->bind(":price", $Price);
        $this->itemDB->bind(":image", $Image);
        $this->itemDB->execute();
    }


    public function getFilter($sql)
    {
        $query = 'SELECT *
        FROM croisiere c '.$sql;

        $this->itemDB->query($query);

        $rows = $this->itemDB->fetchAll();

        return $rows = $this->itemDB->fetchAll();
    }




    public function delete($id_croisiere)
    {
        $this->itemDB->query("DELETE FROM croisiere WHERE id_croisiere = :id");
        $this->itemDB->bind(':id', $id_croisiere);
        $this->itemDB->execute();
    }
}
