<?php
class Reservation
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addReservation($id_cruise,$id_user,$id_chambre){


        $this->db->query("INSERT INTO reservation (id_croisiere, id_client, id_chambre)
        VALUES(:id_croisiere,:id_client,:id_chambre)");

        $this->db->bind(':id_croisiere', $id_cruise);
        $this->db->bind(':id_client', $id_user);
        $this->db->bind(':id_chambre',$id_chambre);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}