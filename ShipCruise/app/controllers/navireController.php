<?php

class navireController extends Controller
{
	public $navireModel;
  public $cruiseModel;

	public function __construct()
	{
    $this->navireModel = $this->model('Navire');
		$this->cruiseModel = $this->model('Cruises');
  }

  public function index()
  {
    $this->view('addnavire');
  }

  public function insertNavire()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $name = $_POST['name'];
      $number = $_POST['number'];
      $place = $_POST['place'];

    $done = $this->navireModel->insertNavireModel($name,$place,$number);
		if ($done == 1)
    {
			// redirect to dashbord
			$this->cruiseModel->cruisesDash();
		}
    else
    {
			//redirect to home
		header('location:' . URLROOT . 'navireController/insertNavire');
		}
  }
  else{
    $cruises = $this->cruiseModel->getForDash();
        $data = [
            'cruises' => $cruises
        ];
        $this->view('cruisesDash',$data);
  }
}



public function getnavire(){

  $navirearray = $this->navireModel->selectNavireModel();

  // creation array's items data:
  $data =
      [
          'navirerow'  =>  $$navirearray,
      ];

  // affichage sur le views, avec galleryrow:
  $this->view('addcruise', $data);

}

}