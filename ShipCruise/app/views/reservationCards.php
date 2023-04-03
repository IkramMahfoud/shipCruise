<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>

<div class="containerfluid" style="background-color: #e2eafc;">
  <div class="container">
    <div class="row ">
      <?php if ($data['reservationRow']) {
        foreach ($data['reservationRow'] as $rsrvd_cruise) : ?>

          <div class="col-lg-4 mt-4">
            <div class="card card-margin">
              <div class="card-header no-border">
              </div>
              <div class="card-body pt-0">
                <div class="widget-49">
                  <div class="widget-49-title-wrapper">

                    <div class="widget-49-date-primary">
                      <span class="imgDisplay"><img src="<?= URLROOT . 'img/' . $rsrvd_cruise->image ?>" alt=""></span>
                    </div>

                    <div class="widget-49-meeting-info">
                      <span class="widget-49-pro-title">Start in- <?= $rsrvd_cruise->date_depart ?>
                        <!-- //PRO-08235 DeskOpe. Website -->
                      </span>
                      <span class="widget-49-meeting-time"><?= $rsrvd_cruise->nombr_nuit . ' Days.' ?></span>
                    </div>

                  </div>

                  <ul class="widget-49-meeting-points">
                    <li class="widget-49-meeting-item"><span><?= $rsrvd_cruise->description_croisire ?>.</span></li>
                  </ul>
                  <ul class="widget-49-meeting-points">
                    <li class="widget-49-meeting-item"><span>Price- <?= $rsrvd_cruise->prix_chambre ?> DH.</span></li>
                  </ul>

                  <div class="widget-49-meeting-action">
                    <form action="<?= URLROOT . 'reservationController/deleteReservation' ?>" method="POST">
                      <input type="hidden" value="<?= $rsrvd_cruise->id_reservation ?>" name="id">
                      <button type="submit" class="btn btn-outline-danger btn text-danger btn-sm btn btn-border-danger">Cancel !</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach;
      } else { ?>
        <h1>
          not reservation !
        </h1>
      <?php }; ?>
    </div>
  </div>
</div>