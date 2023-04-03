<?php
class Room
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addChambre($id_t_ch)
    {
        $this->db->query("INSERT INTO chambre (id_type_chambre) VALUES (:id_t_ch)");
        $this->db->bind(':id_t_ch', $id_t_ch);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getChambreByTypeId($id_t_ch)
    {
        $this->db->query('SELECT * FROM `chambre` WHERE `chambre`.`id_type_chambre` = :id_t_ch ORDER BY `chambre`.`id_chambre` DESC ');
        $this->db->bind(':id_t_ch', $id_t_ch);
        $chambre = $this->db->fetch();
        if ($chambre)
            return $chambre;
        else
            return false;
    }


    public function getAvailableRoomsByCruise($id_cruise, $id_navire)
    {
        $this->db->query('SELECT chambre.*,type_chambre.*FROM chambre
        INNER JOIN type_chambre ON chambre.id_type_chambre = type_chambre.id_type_chambre
        WHERE chambre.id_navire = :id_navire
        AND chambre.id_chambre NOT IN (SELECT reservation.id_chambre FROM reservation WHERE reservation.id_croisiere = :id_cruise);');


        $this->db->bind(':id_navire', $id_navire);
        $this->db->bind(':id_cruise', $id_cruise);

        $rooms = $this->db->fetchAll();

        if ($rooms)
            return $rooms;
        else
            return false;
    }


}

//ikram kanbghik bzf
