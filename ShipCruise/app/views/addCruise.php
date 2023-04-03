<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>

<div class="container">
  <div style="margin-top: 80px;">
    <form class="container" method="POST" action="<?= URLROOT . 'cruiseController/insertCruise' ?>">

      <div id="AllForm">
        <p class="fw-light  text-black text-center py-2">New Cruise</p>

        <hr class="border border-danger border-1 opacity-75 mb-5">

        <div class="input-group mb-3">
          <input name="name" type="text" class="form-control" placeholder="nom du navire" aria-describedby="basic-addon2" required>
          <span class="input-group-text" id="basic-addon2">Name</span>
        </div>

        <div class="input-group mb-3">
          <input name="image" type="file" class="form-control" id="inputGroupFile" required>
          <label class="input-group-text" for="inputGroupFile">image</label>
        </div>

        <div class="input-group mb-3">
          <input name="number" type="text" class="form-control" placeholder="room's number" aria-describedby="basic-addon2" required>
          <span class="input-group-text" id="basic-addon2">nombr_nuit</span>
        </div>

        <div class="input-group mb-3">
          <select class="form-select " name="selctNavire">
          <option value="" name="type" disabled selected>Select navire</option>

            <?php foreach ($data['navirerow'] as $navire) : ?>
              <option value="<?= $navire->id_navire ?>">
                ship name:<?= $navire->nom_navire ?>
              </option>
            <?php endforeach ?>
          </select>
          <span class="input-group-text" id="basic-addon2">NAVIRE</span>
        </div>

        <div class="input-group mb-3">
          <input name="place" type="text" class="form-control" placeholder="place's number" aria-describedby="basic-addon2" required>
          <span class="input-group-text" id="basic-addon2">Places</span>
        </div>

        <div class="input-group mb-3">
          <input name="place" type="date" class="form-control" placeholder="place's number" aria-describedby="basic-addon2" required>
          <span class="input-group-text" id="basic-addon2">DATE</span>
        </div>

        <div class="input-group mb-3">
          <select class="form-select" name="selctNavire">
          <option value="" name="type" disabled selected>Select port de depart</option>

            <?php foreach ($data['navirerow'] as $navire) : ?>
              <option value="<?= $navire->id_navire ?>">
                ship name: <?= $navire->nom_navire ?>
              </option>
            <?php endforeach ?>
          </select>
          <span class="input-group-text" id="basic-addon2">PORT DE DEPART</span>
        </div>

        <div class="d-flex flex-col" style="display: flex;flex-direction: column !important;">
          <div class="d-flex" style="justify-content: space-between;">
            <p class="bg-dark text-light px-5  rounded-3  ">ITENERY :</p>
            <div onclick="addInputPort()" style="cursor: pointer;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                <path d="M5 21h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2zm2-10h4V7h2v4h4v2h-4v4h-2v-4H7v-2z"></path>
              </svg>
            </div>
          </div>

          <div class="d-flex flex-col" id="InputAddItenery" style="display: flex;flex-direction: column !important;">
            <div class="input-group mb-3">
              <select class="form-select" name="itenerie[]">
              <option value="" name="type" disabled selected>Select Ship cruise plases</option>
                <?php foreach ($data['navirerow'] as $navire) : ?>
                  <option value="<?= $navire->id_navire ?>">
                    ship name: <?= $navire->nom_navire ?> | ship place's number: <?= $navire->nombr_place ?>
                  </option>
                <?php endforeach ?>
              </select>
              <span class="input-group-text " id="basic-addon2">itenerie</span>
            </div>
          </div>
        </div>
      </div>

      <div>
        <input type="submit" class="btn btn-primary" style="width: 94px;height: 34px;font-size: 13px;" value="submit">
      </div>
    </form>



    <script>
      function addInputPort() {
        document.getElementById('InputAddItenery').outerHTML += `
        <div class="input-group mb-3">
              <select class="form-select" name="itenerie[]">
              <option value="" name="type" disabled selected>Select Ship cruise plases</option>
                <?php foreach ($data['navirerow'] as $navire) : ?>
                  <option value="<?= $navire->id_navire ?>">
                    ship name: <?= $navire->nom_navire ?> | ship places° <?= $navire->nombr_place ?>
                  </option>
                <?php endforeach ?>
              </select>
              <span class="input-group-text" id="basic-addon2">itenerie</span>
            </div>
        `
      }
    </script>