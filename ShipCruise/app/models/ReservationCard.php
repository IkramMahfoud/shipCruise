<?php
class ReservationCard
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function user_reservation($user_id)
    {
        $this->db->query('SELECT * FROM `reservation`
        INNER JOIN `chambre` ON `reservation`.`id_chambre` = `chambre`.`id_chambre`
        INNER JOIN `type_chambre` ON `chambre`.`id_type_chambre` = `type_chambre`.`id_type_chambre`
        INNER JOIN `croisiere` ON `reservation`.`id_croisiere` = `croisiere`.`id_croisiere`
        WHERE `reservation`.`id_client` = :user_id');
        $this->db->bind(':user_id', $user_id);
        $reserved = $this->db->fetchAll();
        if ($reserved)
            return $reserved;
        else
            return false;
    }


    public function deleteReservation($id)
    {
        //delete query for row with id,  $id
        $this->db->query("DELETE reservation
         FROM reservation
         INNER JOIN croisiere ON croisiere.id_croisiere = reservation.id_croisiere
         WHERE reservation.id_reservation = :id
         AND (croisiere.date_depart > DATE_ADD(CURDATE(), INTERVAL 2 DAY));
         ");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function cancelReservation($id)
    {
    }
}
