<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>
<div class="container-fluid vh-100 pt-md-5 d-md-flex flex-column justify-content-between" style="background-image: url(http://localhost/breifs/ShipCruise/img/b1.jpg);
    background-size: cover;
    background-position: center;">
    <div class="row px-md-5 py-md-5 mt-md-5">
        <div class="col-md-10 text-md-start text-center px-5 ms-md-5 text-box">
            <h1 class="pt-5 fw-bold" style="font-size: 50px;">Book your cruise</h1>
            <p class="fw-normal p-header">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                Similique enim ducimus unde accusamus laudantium quasi labore animi sed! <br>
                Eveniet doloremque accusamus reprehenderit,<br>
                amet id consequuntur explicabo repellat minima debitis enim.
            </p>
            <button type="button" class="btn btn-primary">Learn more</button>
        </div>
    </div>
    <div class="row mb-md-5">

        <form action="<?= URLROOT . 'cruisesController/cruisesFilter' ?>" method="POST">
            <div class="col-8 mx-auto bg-light py-md-4 px-md-4 bg-opacity-25 d-flex flex-md-row flex-column align-items-center justify-content-md-evenly">



                <div>
                    <p class="fw-bold pr">Where</p>
                    <select name="where" class="form-select selct" >
                        <option value="0" selected>Select a destination</option>
                        <?php foreach ($data['ports'] as $port) : ?>
                            <option value="<?= $port->id_port ?>"><?= $port->nom_port ?> - <?= $port->pays ?></option>
                        <?php endforeach ?>
                    </select>
                </div>


                <div>
                    <p class="fw-bold par">When</p>
                    <input name="when" class="form-control" type="date" >
                </div>



                <button class
                ="btn btn-primary align-self-end mb-md-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include_once APPROOT . '/views/includes/footer.php';

?>