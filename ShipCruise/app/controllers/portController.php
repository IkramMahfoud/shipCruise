<?php

class portController extends Controller
{
  public $portsModel;
  public $cruiseModel;

  public function __construct()
  {
    $this->portsModel = $this->model('Ports');
    $this->cruiseModel = $this->model('Cruises');
  }

  public function index()
  {
    $this->view('addport');
  }

  public function insertPort()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $place = $_POST['place'];
      $nom = $_POST['nom'];

      $done = $this->portsModel->insertPortModel($place, $nom);
      if ($done == 1) {
        // redirect to dashbord
        $this->cruiseModel->cruisesDash();
      } else {
        //redirect to home
        header('location:' . URLROOT . 'portController/insertPort');
      }
    } else {
      $cruises = $this->cruiseModel->getForDash();
      $data = [
        'cruises' => $cruises
      ];
      $this->view('cruisesDash', $data);
    }
  }
}
