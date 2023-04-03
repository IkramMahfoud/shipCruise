<?php

class cruisesController extends Controller
{
    public $cruisesModel;
    public $navireModel;
    public $roomTypeModel;

    public function __construct()
    {
        $this->cruisesModel = $this->model('Cruises');
        $this->navireModel = $this->model('Navire');
        $this->roomTypeModel = $this->model('RoomType');
    }


    public function index()
    {
        $data = [
            "navirerow" => $this->navireModel->selectNavireModel()
        ];

        $this->view('addcruise', $data);
    }


    public function gallery()
    {
        $cruises = $this->cruisesModel->getAll();
        $this->view('gallery', [$cruises]);
    }




    public function cruisesFilter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);

            $mainArray = [];
            // creation array's data:
            $where = $_POST['where'];
            $when = $_POST['when'];
            array_push($mainArray,$where);
            array_push($mainArray,$when);

            if ($mainArray[0] == 0) {
                unset($mainArray[0]);
                $sqlWhere='';
            }else{
                $sqlWhere=' c.id_port_arrive = '.$mainArray[0];
            }
            if ($mainArray[1] == '' || empty($mainArray[1])) {
                unset($mainArray[1]);
                $sqlWhen='';
            }else{
                $sqlWhen=' c.date_depart = "'.$mainArray[1].'"';
            }
            $sqlArray = [];
            array_push($sqlArray,$sqlWhere);
            array_push($sqlArray,$sqlWhen);
            $sqlArrayNotEmpty= [];
            for ($i=0; $i < count($sqlArray); $i++) {
                if ($sqlArray[$i] != '' || !empty($sqlArray[$i])) {
                    array_push($sqlArrayNotEmpty,$sqlArray[$i]);
                }
            }
            if (count($sqlArrayNotEmpty) == 0) {
                $sql = '';
            }
            if (count($sqlArrayNotEmpty) == 1) {
                $sql = ' WHERE '.$sqlArrayNotEmpty[0];
            }
            if (count($sqlArrayNotEmpty) == 2) {
                $sql = ' WHERE '.$sqlArrayNotEmpty[0].' AND '.$sqlArrayNotEmpty[1];
            }
            $cruises = $this->cruisesModel->getFilter($sql);
            $roomType = $this->roomTypeModel->getAll();
            if ($cruises) {
                $data = [
                    'cruises' => $cruises,
                    'roomtype' => $roomType
                ];
                $this->view('filter', $data);
            }
        }else {
            header('location:' . URLROOT . 'home');
        }
    }



    public function cruisesDash()
    {
        $cruises = $this->cruisesModel->getForDash();
        $data = [
            'cruises' => $cruises
        ];
        $this->view('cruisesDash', $data);
    }




    public function insert()
    {
        //CHECKING SUBMIT BUTTON PRESS or NOT.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            for ($i = 0; $i < count($_POST['name']); $i++) {
            }
            header('location:' . URLROOT . 'cruisesController/insert');
        } else {
            $this->view('add');
        }
    }

    public function delete($id_croisiere)
    {
        $this->model('Cruises')->delete($id_croisiere);
        header('location:' . URLROOT . 'cruiseDash');
    }
}
