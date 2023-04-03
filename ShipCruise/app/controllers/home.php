<?php

class Home extends Controller
{
    public $userModel;
    public $portModel;
    public $roomTypeModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->portModel = $this->model('Ports');
        $this->roomTypeModel = $this->model('RoomType');
    }


    public function index()
    {
        $data = [
            "ports" => $this->portModel->getall(),
            "roomtypes" => $this->roomTypeModel->getall()
        ];
        $this->view('homepage',$data);
    }

}