<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>

<div class="container py-3">
    <div class="card card_reserv">
      <?php foreach($data['cruises'] as $cruise) : ?>
        <div class="row">
            <div class="col-md-5">
                <img class="d-block w-100" src="<?= URLROOT . 'img/' . $cruise->image ?>">
            </div>
            <div class="col-md-7 px-3">
                <div class="card-block">
                    <p><?= $cruise->nombr_nuit ?> jours</p>
                    <p>date de depart : <?= $cruise->date_depart ?></p>

                    <form action="<?= URLROOT ?>reservationController/reservation" method="POST" class="form_reserv">

                        <input type="hidden" name="id_user" value="<?= $_SESSION['user_id'] ?>">
                        <input type="hidden" name="id_cruise" value="<?= $cruise->id_croisiere ?>">
                        <input type="hidden" name="price" id="price" class="input_reserv">


                        <select id="chambre" class="selectpicker" onchange="setPrice()" data-size="4" name="chambre">
                            <option value="" name="type" disabled selected>Select Room</option>
                            <?php foreach($data['roomtype'] as $room): ?>
                             <option value="<?=$room->id_chambre?>" data-price="<?=$room->prix_chambre?>">room <?=$room->id_chambre?> | <?=$room->type_chambre ?> | <?=$room->prix_chambre?>DH</option>
                            <?php endforeach?>
                        </select>
                        <input type="submit" value="book now" class="btn btn_reserv btn-primary btn-sm float-right">
                    </form>
                </div>
            </div>

        </div>
        <?php endforeach?>
    </div>
</div>