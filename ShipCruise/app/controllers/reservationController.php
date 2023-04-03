<?php

class reservationController extends Controller
{
	public $roomModel;
	public $reservationModel;
	public $reservationCardModel;

	public function __construct()
	{
		$this->roomModel = $this->model('room');
		$this->reservationModel = $this->model('reservation');
		$this->reservationCardModel = $this->model('ReservationCard');
	}



	public function reservation()
	{
		$id_user = $_POST['id_user'];
		$id_cruise = $_POST['id_cruise'];
		$chambre = $_POST['chambre'];
		$added = $this->reservationModel->addReservation($id_cruise, $id_user, $chambre);
		if ($added == 1) {
			// redirect to reservations
			$this->cardReservation();
		} else {
			//redirect to home
			header('location:' . URLROOT . 'home');
		}
	}

	

	public function cardReservation()
	{
		//instanciate from Model:
		$reaservationArray = $this->reservationCardModel->user_reservation($_SESSION['user_id']);
		// creation array's items data:
		$data =
			[
				'reservationRow'  =>  $reaservationArray,
			];
		// affichage sur le views, avec galleryrow:
		$this->view('reservationCards', $data);
	}



	public function deleteReservation()
	{
		$id = $_POST['id'];

		$this->model('reservationCard')->deleteReservation($id);
		header('location:' . URLROOT . '/reservationController/cardReservation');
	}
}
