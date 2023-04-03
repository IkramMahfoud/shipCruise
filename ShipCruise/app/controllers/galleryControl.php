<?php

class GalleryControl extends Controller
{
    public $galleryModel;
    public $roomModel;

    public function __construct()
    {
        $this->galleryModel = $this->model('Gallery');
        $this->roomModel = $this->model('Room');
    }



    public function showGallery()
    {
        $galleryarray = $this->galleryModel->getAll();

        // creation array's items data:
        $data =
            [
                'galleryrow'  =>  $galleryarray,
            ];

        // affichage sur le views, avec galleryrow:
        $this->view('gallery', $data);
    }


    public function showCruise()
    {
        if ($_SESSION['user_id'] == 'null' || empty($_SESSION['user_id'])) {
            $file='usercontroller/login';
            header('location:'.URLROOT.$file);
        } else {
            $id_cruise = $_POST['id_cruise'];
            $id_navire = $_POST['id_navire'];

            $cruise = $this->galleryModel->getOne($id_cruise);
            $available_rooms = $this->roomModel->getAvailableRoomsByCruise($id_cruise,$id_navire);

            $data =
                [
                    'cruise' => $cruise,
                    'available_rooms' => $available_rooms,
                    'user_id' => $_SESSION['user_id']
                ];

            // affichage sur le views, avec galleryrow:
            $this->view('reservation', $data);
        }
    }
}
